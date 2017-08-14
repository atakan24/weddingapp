<?php

if ($_GET)
{

// veritabanı bağlantımızı sayfamıza ekliyoruz.
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "weddingapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// id'si seçilen veriyi silme sorgumuzu yazıyoruz.
if ($conn->query("DELETE FROM unit WHERE unit_id =".(int)$_GET['unit_id']))
{
   header("location:unit_ekle.php"); // Eğer sorgu çalışırsa unit_ekle.php sayfasına gönderiyoruz.
}
}

?>
