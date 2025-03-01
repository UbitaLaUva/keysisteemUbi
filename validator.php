<?php
header("Content-Type: application/json");
$conn = new mysqli("193.203.166.109", "u972882902_2B8UOLu7hm8V", "kU]9=@a#", "u972882902_keySistem");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$key = $_GET['key'];
$result = $conn->query("SELECT * FROM keys WHERE key_value='$key' AND expiration > NOW()");

if ($result->num_rows > 0) {
    echo json_encode(["valid" => true]);
} else {
    echo json_encode(["valid" => false]);
}

$conn->close();
?>