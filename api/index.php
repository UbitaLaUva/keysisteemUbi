<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Keys</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
        }

        button {
            padding: 10px 20px;
            background-color: #154721; /* Verde */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #dab668; /* Dorado */
            color: black;
        }

        label {
            display: block;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        p {
            margin-top: 10px;
            font-size: 16px;
            color: #154721; /* Verde */
        }
    </style>
</head>
<body>
<h1>Generador de Keys</h1>
<button onclick="generateKey()">Generar Key</button>

<label for="key">Tu Key Generada:</label>
<p id="key">Aquí aparecerá la key...</p>

<script>
function generateKey() {
    fetch("https://keysisteem-ubi.vercel.app/generator.php") // Llama al archivo PHP
    .then(response => response.json())
    .then(data => {
        if (data.key) {
            document.getElementById("key").innerText = data.key;
        } else {
            document.getElementById("key").innerText = "Error al generar la Key";
        }
    })
    .catch(error => {
        document.getElementById("key").innerText = "Error de conexión con el servidor";
        
    });
}
</script>
</body>
</html>
