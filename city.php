

<?php

header('Content-type: application/json');
require('connect.php');

$conn->set_charset("utf8");
$conn->query("SET collation_connection = utf8_turkish_ci");

$sql = mysqli_query($conn,"SELECT * FROM city");
$results = array();
while($row = mysqli_fetch_assoc($sql))
{
  $results['user'][] = $row;

}
echo json_encode($results);

mysqli_close($conn);

?>
