<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "okul_MBP_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>