<?php
header("Content-Type: application/json");
$conn = new mysqli("srv1244.hstgr.io", "u972882902_2B8UOLu7hm8V", "kU]9=@a#", "u972882902_keySistem");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

function generateKey() {
    return bin2hex(random_bytes(16)); // Genera una key de 32 caracteres aleatorios
}

$key = generateKey();
$expiration = date("Y-m-d H:i:s", strtotime("+12 hours")); // Expira en 12 horas

$conn->query("INSERT INTO keys (key_value, expiration) VALUES ('$key', '$expiration')");

echo json_encode(["key" => $key]);

$conn->close();
?>
