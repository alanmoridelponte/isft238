<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MQTT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css ">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
    </div>

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
