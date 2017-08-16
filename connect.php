<?php


$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "weddingapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
$conn->query("SET collation_connection = utf8_turkish_ci");
// Check connection
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}
?>
