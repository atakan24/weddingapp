

<?php

header('Content-type: application/json');

$servername = "127.0.0.1";
$username = "bilal";
$password = "weddingapp";
$dbname = "weddingapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
$conn->query("SET collation_connection = utf8_turkish_ci");

$sql = mysqli_query($conn,"SELECT * FROM city");
$results = array();
while($row = mysqli_fetch_assoc($sql))
{
  $results['user'][] = $row;
  /*
   $results[] = array(
      'id' => $row['city_id']),
      'name' => $row['city_name'],
   );*/
}
echo json_encode($results);

mysqli_close($conn);

?>
