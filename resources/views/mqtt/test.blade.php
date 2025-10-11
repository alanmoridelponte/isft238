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
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/mqtt/gauge-controller.js'])
    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
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

        <hr>

        <div>
            <div class="rounded-lg p-4 shadow-lg">
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
        </div>

        <hr>

        <div class="rounded-lg p-4 shadow-lg">
            <div id="gauge-container-light-dimmer">Intensidad Luz</div>
            <div class="pt-12">
                <input class="w-full accent-blue-600" type="range" id="gauge-light-dimmer" value="0"
                    min="0" max="100" />
                <div class="mt-4 flex w-full justify-between">
                    <span class="text-lg text-gray-600">0</span>
                    <span class="text-lg text-gray-600">100</span>
                </div>
            </div>
        </div>


    </div>




    <script>
        document.addEventListener('DOMContentLoaded', () => {
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
                        color: "#3c2ac6",
                        percent: 0
                    },
                    {
                        color: "#717fea",
                        percent: 20
                    },
                    {
                        color: "#aab4fd",
                        percent: 40
                    },
                    {
                        color: "#e4e0ff",
                        percent: 60
                    },
                    {
                        color: "#f5f5f5",
                        percent: 80
                    }
                ]
            });

            document
                .getElementById('gauge-motor-velocity')
                .addEventListener('input', Helpers.debounce((e) => {
                    const value = parseInt(e.target.value);
                    if (client && !isNaN(value)) {
                        client.publish('lola', value.toString());
                    }
                }, 100));
        });
    </script>


    <script>
        let client;

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
            });

            client.on("error", (err) => {
                log("❌ Error: " + err.message);
            });

            client.on("reconnect", () => log("Reconectando..."));
            client.on("close", () => log("Conexión cerrada"));

            client.on("message", (topic, payload) => {
                log(`[${topic}] ${payload.toString()}`);
            });

            client.on("message", Helpers.ifTopic("lola", (payload) => {
                const dimmer = parseFloat(payload.toString());
                if (!isNaN(dimmer)) {
                    const percentage = Helpers.percentInRange(dimmer, 0, 100);
                    window.gaugeMotorVelocity.setPercentage(percentage);
                }
            }));

            client.on("message", Helpers.ifTopic("home/light/dimmer", (payload) => {
                const dimmer = parseFloat(payload.toString());
                if (!isNaN(dimmer)) {
                    const percentage = Helpers.percentInRange(dimmer, 0, 100);
                    window.gaugeLightDimmer.setPercentage(percentage);
                }
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
