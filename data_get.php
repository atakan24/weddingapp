<?php

header('Content-type: application/json');
require('connect.php');

$conn->set_charset("utf8");
$conn->query("SET collation_connection = utf8_turkish_ci");

$sql = mysqli_query($conn,"SELECT * FROM maincategory");
$results = array();
while($row = mysqli_fetch_assoc($sql))
{
  $results['MAINCATEGORY'][] = $row;
}

$sql = mysqli_query($conn,"SELECT * FROM subcategory");
while($row = mysqli_fetch_assoc($sql))
{
  $results['SUBCATEGORY'][] = $row;
}

$sql = mysqli_query($conn,"SELECT * FROM trademarks");
while($row = mysqli_fetch_assoc($sql))
{
  $results['TRADEMARKS'][] = $row;
}

$sql = mysqli_query($conn,"SELECT * FROM models");
while($row = mysqli_fetch_assoc($sql))
{
  $results['MODELS'][] = $row;
}

$sql = mysqli_query($conn,"SELECT * FROM unit");
while($row = mysqli_fetch_assoc($sql))
{
  $results['UNIT'][] = $row;
}


echo json_encode($results);

mysqli_close($conn);

?>
