<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MQTT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css ">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/mqtt/helpers.js', 'resources/js/mqtt/gauge-controller.js', 'resources/js/mqtt/toggle-controller.js'])
    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col gap-5 items-center justify-center">

    <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6 space-y-4">
        <h1 class="text-2xl font-bold text-center text-blue-600">MQTT Dashboard</h1>

        <!-- Conexión -->
        <div>
            <label class="block text-sm font-medium">Broker URL</label>
            <input id="brokerUrl" type="text" value="mqtt://66.97.45.58:8083"
                class="w-full p-2 border rounded mt-1" />
            <button onclick="connectMQTT()" class="mt-2 w-full bg-blue-500 text-white p-2 rounded">Conectar</button>
        </div>

        <!-- Suscripción -->
        <div>
            <label class="block text-sm font-medium">Topic para suscribirse</label>
            <input id="subTopic" type="text" placeholder="ej: test/topic" class="w-full p-2 border rounded mt-1" />
            <button onclick="subscribeTopic()"
                class="mt-2 w-full bg-green-500 text-white p-2 rounded">Suscribirse</button>
        </div>

        <!-- Publicación -->
        <div>
            <label class="block text-sm font-medium">Publicar en topic</label>
            <input id="pubTopic" type="text" placeholder="ej: test/topic" class="w-full p-2 border rounded mt-1" />
            <textarea id="pubMessage" rows="2" placeholder="Escribe un mensaje" class="w-full p-2 border rounded mt-2"></textarea>
            <button onclick="publishMessage()" class="mt-2 w-full bg-purple-500 text-white p-2 rounded">Enviar</button>
        </div>

        <!-- Mensajes -->
        <div>
            <h2 class="font-semibold text-gray-700">Mensajes recibidos:</h2>
            <div id="messages" class="h-40 overflow-y-auto border rounded p-2 bg-gray-50 text-sm"></div>
        </div>

    </div>

    <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-6 space-y-4">
        <h1 class="text-2xl font-bold text-center text-blue-600">Controles</h1>

        <div class="flex flex-col  w-full justify-center gap-12">
            <div id="valve-toggle-container" class="flex flex-1/4 justify-around items-center"></div>
            <div id="pump-toggle-container" class="flex flex-1/4 justify-around items-center"></div>
            <div id="light-toggle-container" class="flex justify-around items-center"></div>
            <div id="motor-toggle-container" class="flex justify-around items-center"></div>
        </div>

        <hr class="my-12" />

        <div class="flex flex-col md:flex-row gap-6 w-full justify-around">
            <div class="w-full">
                <div id="gauge-container-motor-velocity">Velocidad Motor</div>
                <div class="pt-12">
                    <input class="w-full accent-blue-600" type="range" id="gauge-motor-velocity" value="0"
                        min="0" max="100" />
                    <div class="mt-4 flex w-full justify-between">
                        <span class="text-lg text-gray-600">0</span>
                        <span class="text-lg text-gray-600">100</span>
                    </div>
                </div>
            </div>

            <hr class="md:hidden my-6" />

            <div class="w-full">
                <div id="gauge-container-light-dimmer">Intensidad Luz</div>
                <div class="pt-12">
                    <input class="w-full accent-indigo-600" type="range" id="gauge-light-dimmer" value="0"
                        min="0" max="100" />
                    <div class="mt-4 flex w-full justify-between">
                        <span class="text-lg text-gray-600">0</span>
                        <span class="text-lg text-gray-600">100</span>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-12" />

        <div class="flex flex-col gap-6 w-full justify-center items-center">
            <h5 class="font-bold text-gray-700">Selector de Color Luz</h5>
            <div id="gauge-light-picker"></div>
        </div>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.toggleValve = new ToggleController('valve-toggle-container', {
                text: 'Agua',
                initialState: false,
                onChange: Helpers.debounce(state => client?.publish('electrovalvula', state ? 'ON' : 'OFF'),
                    100)
            });

            window.togglePump = new ToggleController('pump-toggle-container', {
                text: 'Bomba',
                initialState: false,
                onChange: Helpers.debounce(state => client?.publish('bomba', state ? 'ON' : 'OFF'), 100)
            });

            window.toggleLight = new ToggleController('light-toggle-container', {
                text: 'Luz&nbsp;&nbsp;&nbsp;&nbsp;',
                initialState: false,
                onChange: Helpers.debounce(state => client?.publish('luz', state ? 'ON' : 'OFF'), 100)
            });

            window.toggleMotor = new ToggleController('motor-toggle-container', {
                text: 'Motor',
                initialState: false,
                onChange: Helpers.debounce(state => client?.publish('motorMQTT', state ? 'ON' : 'OFF'), 100)
            });

            // Crear el gauge
            window.gaugeMotorVelocity = new GaugeController('gauge-container-motor-velocity', {
                initialPercentage: 0,
                text: 'Velocidad Motor',
                gaugeColor: "#3b82f6",
                gaugeBgColor: "#dbeafe",
                borderColor: "#475569",
                centerColor: "#f1f5f9",
                outerRings: [{
                        color: "#5cd65c",
                        percent: 0
                    }, {
                        color: "#5cd65c",
                        percent: 15
                    },
                    {
                        color: "#ffc800",
                        percent: 65
                    },
                    {
                        color: "#ea5353",
                        percent: 85
                    }
                ]
            });

            window.gaugeLightDimmer = new GaugeController('gauge-container-light-dimmer', {
                initialPercentage: 0,
                text: 'Intensidad Luz',
                gaugeColor: "#3b82f6",
                gaugeBgColor: "#dbeafe",
                borderColor: "#475569",
                centerColor: "#f1f5f9",
                outerRings: [{
                        color: "#f5f5f5",
                        percent: 0
                    },
                    {
                        color: "#e4e0ff",
                        percent: 20
                    },
                    {
                        color: "#aab4fd",
                        percent: 40
                    },
                    {
                        color: "#717fea",
                        percent: 60
                    },
                    {
                        color: "#3c2ac6",
                        percent: 80
                    }
                ]
            });

            document
                .getElementById('gauge-motor-velocity')
                .addEventListener('input', Helpers.debounce((e) => {
                    const value = parseInt(e.target.value);
                    if (client && !isNaN(value)) {
                        client.publish('velocidad', value.toString());
                    }
                }, 100));

            document
                .getElementById('gauge-light-dimmer')
                .addEventListener('input', Helpers.debounce((e) => {
                    const value = parseInt(e.target.value);
                    if (client && !isNaN(value)) {
                        client.publish('iluminacion', value.toString());
                    }
                }, 100));

            window.gaugeLightColorPicker = new iro.ColorPicker("#gauge-light-picker", {
                width: 320,
                color: "#f00"
            });

            window.gaugeLightColorPicker.on('color:change', Helpers.debounce(function(color) {
                if (client) {
                    client.publish('rgb', color.rgbString);
                }
            }, 100));
        });
    </script>


    <script>
        var client;

        function log(msg) {
            const box = document.getElementById("messages");
            const line = document.createElement("div");
            line.textContent = msg;
            box.appendChild(line);
            box.scrollTop = box.scrollHeight;
        }

        function connectMQTT() {
            const brokerUrl = document.getElementById("brokerUrl").value;
            const clientId = `mqtt_${Math.random().toString(16).slice(3)}`

            client = mqtt.connect(brokerUrl, {
                clientId,
                clean: true,
                reconnectPeriod: 1000,
                connectTimeout: 30 * 1000,
            });

            client.on("connect", () => {
                log("✅ Conectado al broker " + brokerUrl);
                client.subscribe("velocidad", (err) => {
                    if (err) log("❌ Error al suscribirse: " + err.message);
                    else log("📡 Suscripto a topic velocidad");
                });
                client.subscribe("iluminacion", (err) => {
                    if (err) log("❌ Error al suscribirse: " + err.message);
                    else log("📡 Suscripto a topic iluminacion");
                });
                client.subscribe("electrovalvula", (err) => {
                    if (err) log("❌ Error al suscribirse: " + err.message);
                    else log("📡 Suscripto a topic electrovalvula");
                });
                client.subscribe("bomba", (err) => {
                    if (err) log("❌ Error al suscribirse: " + err.message);
                    else log("📡 Suscripto a topic bomba");
                });
                client.subscribe("luz", (err) => {
                    if (err) log("❌ Error al suscribirse: " + err.message);
                    else log("📡 Suscripto a topic luz");
                });
                client.subscribe("motorMQTT", (err) => {
                    if (err) log("❌ Error al suscribirse: " + err.message);
                    else log("📡 Suscripto a topic motorMQTT");
                });
                client.subscribe("rgb", (err) => {
                    if (err) log("❌ Error al suscribirse: " + err.message);
                    else log("📡 Suscripto a topic rgb");
                });
            });

            client.on("error", (err) => {
                log("❌ Error: " + err.message);
            });

            client.on("reconnect", () => log("Reconectando..."));
            client.on("close", () => log("Conexión cerrada"));

            client.on("message", (topic, payload) => {
                log(`[${topic}] ${payload.toString()}`);
            });

            client.on("message", Helpers.ifTopic("velocidad", (payload) => {
                const velocity = parseFloat(payload.toString());
                if (!isNaN(velocity)) {
                    const percentage = Helpers.percentInRange(velocity, 0, 100);
                    window.gaugeMotorVelocity.setPercentage(percentage);
                    document.getElementById('gauge-motor-velocity').value = percentage;
                }
            }));

            client.on("message", Helpers.ifTopic("iluminacion", (payload) => {
                const dimmer = parseFloat(payload.toString());
                if (!isNaN(dimmer)) {
                    const percentage = Helpers.percentInRange(dimmer, 0, 100);
                    window.gaugeLightDimmer.setPercentage(percentage);
                    document.getElementById('gauge-light-dimmer').value = percentage;
                }
            }));

            client.on("message", Helpers.ifTopic("electrovalvula", (payload) => {
                window.toggleValve.value = payload.toString().toUpperCase() === "ON";
            }));

            client.on("message", Helpers.ifTopic("bomba", (payload) => {
                window.togglePump.value = payload.toString().toUpperCase() === "ON";
            }));

            client.on("message", Helpers.ifTopic("luz", (payload) => {
                window.toggleLight.value = payload.toString().toUpperCase() === "ON";
            }));

            client.on("message", Helpers.ifTopic("motorMQTT", (payload) => {
                window.toggleMotor.value = payload.toString().toUpperCase() === "ON";
            }));

            client.on("message", Helpers.ifTopic("rgb", (payload) => {
                window.gaugeLightColorPicker.rgbString = payload.toString();
            }));
        }

        function subscribeTopic() {
            const topic = document.getElementById("subTopic").value;
            if (client && topic) {
                client.subscribe(topic, (err) => {
                    if (err) log("❌ Error al suscribirse: " + err.message);
                    else log("📡 Suscripto a " + topic);
                });
            }
        }

        function publishMessage() {
            const topic = document.getElementById("pubTopic").value;
            const msg = document.getElementById("pubMessage").value;
            if (client && topic && msg) {
                client.publish(topic, msg);
                log("➡️ Enviado a " + topic + ": " + msg);
            }
        }
    </script>
</body>

</html>
