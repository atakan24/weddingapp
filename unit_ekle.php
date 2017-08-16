
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Birim Ekle</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="col-md-6">
<form action="" method="post">

    <table class="table">

        <tr>
            <td>Birim</td>
            <td><input type="text" name="unit_name" class="form-control" ></td>
        </tr>

        <tr>
            <td></td>
            <td><input class="btn btn-primary"  type="submit" value="Ekle"></td>
        </tr>

    </table>

</form>

<!-- Öncelikle HTML düzenimizi oluşturuyoruz. Daha sonra girdiğimiz verileri veritabanına eklemesi için PHP kodlarına geçiyoruz. -->

<?php

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

if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.

    // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
    $unit_name = $_POST['unit_name'];

    if ($unit_name<>"") {
    // Veri alanlarının boş olmadığını kontrol ettiriyoruz. Başka kontrollerde yapabilirsiniz.

         // Veri ekleme sorgumuzu yazıyoruz.
        if ($conn->query("INSERT INTO unit (unit_name) VALUES ('$unit_name')"))
        {
            echo "Veri Eklendi"; // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
        }
        else
        {
            echo "Hata oluştu";
        }

    }

}

?>
</div>
<!-- ############################################################## -->

<!-- Veritabanına eklenmiş verileri sıralamak için önce üst kısmı hazırlayalım. -->
<div class="col-md-7">
<table class="table">

    <tr>
        <th>No</th>
        <th>Birimler</th>
        <th></th>
        <th></th>
    </tr>

<!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

<?php

$sorgu = $conn->query("SELECT * FROM unit"); // Birim tablosundaki tüm verileri çekiyoruz.

while ($sonuc = $sorgu->fetch_assoc()) {

$unit_id = $sonuc['unit_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
$unit_name = $sonuc['unit_name'];

// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz.
?>

    <tr>
        <td><?php echo $unit_id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td>
        <td><?php echo $unit_name; ?></td>
        <td><a href="unit_sil.php?unit_id=<?php echo $unit_id; ?>" class="btn btn-danger">Sil</a></td>
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
