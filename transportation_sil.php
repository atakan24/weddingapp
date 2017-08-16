<?php

if ($_GET)
{
require('connect.php');

// id'si seçilen veriyi silme sorgumuzu yazıyoruz.
if ($conn->query("DELETE FROM transportation WHERE transportation_id =".(int)$_GET['transportation_id']))
{
   header("location:transportation.php"); // Eğer sorgu çalışırsa unit_ekle.php sayfasına gönderiyoruz.
}
}

?>
