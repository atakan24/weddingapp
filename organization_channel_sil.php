<?php

if ($_GET)
{
require('connect.php');

// id'si seçilen veriyi silme sorgumuzu yazıyoruz.
if ($conn->query("DELETE FROM organization_channel WHERE organization_channel_id =".(int)$_GET['organization_channel_id']))
{
   header("location:organization_channel.php"); // Eğer sorgu çalışırsa unit_ekle.php sayfasına gönderiyoruz.
}
}

?>
