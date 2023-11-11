<html>
<body>


<?php
// Create connection
$conn = mysqli_connect('localhost', 'id21253754_ratemydog', 'Sn00p!!!','id21253754_dogdata');
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$active = $_GET['id'];
$sql = "SELECT Name, Breed, Bio, Picture FROM Dog WHERE DogID = $active";
$result = mysqli_query($conn, $sql);

/*if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "Name: " . $row["Name"]. "<br>Breed: " . $row["Breed"]. "<br>Bio: " . $row["Bio"]. "<br>Picture:<br><img src=/" . $row["Picture"]. "/">"" ;
  }
} else {
  echo "No Result";
}*/

$row = mysqli_fetch_array($result, MYSQLI_NUM);

echo "Name: " . $row["0"]. "<br>Breed: " . $row["1"]. "<br>Bio: " . $row["2"]. "<br>Picture:<br><img src=\"" . $row["3"]. "\">";

mysqli_close($conn);
?>
</body>
</html>