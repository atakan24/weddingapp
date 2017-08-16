
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ulaşım Ekle</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="col-md-6">
<form action="" method="post">

    <table class="table">

        <tr>
            <td>Ulaşım</td>
            <td><input type="text" name="transportation_name" class="form-control" ></td>
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

    $transportation_name = $_POST['transportation_name'];
    if ($transportation_name<>"") {
    // Veri alanlarının boş olmadığını kontrol ettiriyoruz. Başka kontrollerde yapabilirsiniz.

         // Veri ekleme sorgumuzu yazıyoruz.
        if ($conn->query("INSERT INTO transportation (transportation_name) VALUES ('$transportation_name')"))
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

$sorgu = $conn->query("SELECT * FROM transportation");

while ($sonuc = $sorgu->fetch_assoc()) {

$transportation_id = $sonuc['transportation_id'];
$transportation_name = $sonuc['transportation_name'];

?>

    <tr>
        <td><?php echo $transportation_id; ?></td>
        <td><?php echo $transportation_name; ?></td>
        <td><a href="transportation_sil.php?transportation_id=<?php echo $transportation_id; ?>" class="btn btn-danger">Sil</a></td>
    </tr>

<?php
}

?>

</table>
</div>
</div>
</body>
</html>
