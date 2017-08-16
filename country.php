
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


<title>ÜLKELER</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<div class="container">

<!-- Veritabanına eklenmiş verileri sıralamak için önce üst kısmı hazırlayalım. -->
<div class="col-md-7">
<table class="table">

    <tr>
        <th>Sıra</th>
        <th>ÜLKELER</th>
        <th></th>
        <th></th>
    </tr>

<!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "weddingapp";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
$conn->query("SET collation_connection = utf8_turkish_ci");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sorgu = $conn->query("SELECT * FROM country"); // Birim tablosundaki tüm verileri çekiyoruz.

while ($sonuc = $sorgu->fetch_assoc()) {

$country_id = $sonuc['country_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
$country_name = $sonuc['country_name'];

// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz.
?>

    <tr>
        <td><?php echo $country_id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td>
        <td><?php echo $country_name; ?></td>

    </tr>

<?php
}
// Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz.
?>

</table>
</div>
</div>
</body>
</html>
