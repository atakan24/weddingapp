
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Organizasyon Kanalı Ekle</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="col-md-6">
<form action="" method="post">

    <table class="table">

        <tr>
            <td>Organizasyon Kanalı</td>
            <td><input type="text" name="organization_channel_name" class="form-control" ></td>
        </tr>

        <tr>
            <td></td>
            <td><input class="btn btn-primary"  type="submit" value="Ekle"></td>
        </tr>

    </table>

</form>


<?php
require('connect.php');

if ($_POST) {

    $organization_channel_name = $_POST['organization_channel_name'];
    if ($organization_channel_name<>"") {
    // Veri alanlarının boş olmadığını kontrol ettiriyoruz. Başka kontrollerde yapabilirsiniz.

         // Veri ekleme sorgumuzu yazıyoruz.
        if ($conn->query("INSERT INTO organization_channel (organization_channel_name) VALUES ('$organization_channel_name')"))
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

<div class="col-md-7">
<table class="table">

    <tr>
        <th>No</th>
        <th>Birimler</th>
        <th></th>
        <th></th>
    </tr>

<?php

$sorgu = $conn->query("SELECT * FROM organization_channel");

while ($sonuc = $sorgu->fetch_assoc()) {

$organization_channel_id = $sonuc['organization_channel_id'];
$organization_channel_name = $sonuc['organization_channel_name'];

?>

    <tr>
        <td><?php echo $organization_channel_id; ?></td>
        <td><?php echo $organization_channel_name; ?></td>
        <td><a href="organization_channel_sil.php?organization_channel_id=<?php echo $organization_channel_id; ?>" class="btn btn-danger">Sil</a></td>
    </tr>

<?php
}

?>

</table>
</div>
</div>
</body>
</html>
