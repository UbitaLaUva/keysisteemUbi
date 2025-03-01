<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json");
$conn = new mysqli("193.203.166.109", "u972882902_2B8UOLu7hm8V", "kU]9=@a#", "u972882902_keySistem");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

function generateKey() {
    return bin2hex(random_bytes(16)); // Genera una key de 32 caracteres aleatorios
}

$key = generateKey();
$expiration = date("Y-m-d H:i:s", strtotime("+12 hours")); // Expira en 12 horas

if ($conn->query("INSERT INTO keys (key_value, expiration) VALUES ('$key', '$expiration')") === TRUE) {
    echo json_encode(["key" => $key]);
} else {
    echo json_encode(["error" => $conn->error]);
}

$conn->close();
?>
