
<?php
//Establish basics
include("connection.php");
include("functions.php");
session_start();

// Pull a dog from ?id= in URL
$active = $_GET['id'];
$sql = "SELECT Name, Breed, Bio, Picture, Uploader_UserID FROM Dog WHERE DogID = $active";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_NUM);
$dname = $row["0"];
$dbreed = $row["1"];
$dbio = $row["2"];
$dpic = $row["3"];
$downer = $row["4"];
$isowner = false;
//Check active UserID against active dog uploader
if ($downer == $_SESSION['UserID']) {$isowner = true;}


echo "Name: " . $dname. "<br>Breed: " . $dbreed. "<br>Bio: " . $dbio. "<br>Picture:<br><img src=\"" . $dpic. "\">" . "<br>UploaderID: " . $downer;
if ($isowner) {
	echo "<br>is owner";
}
else {
	echo "<br>not owner";
}


//echo ($_SESSION['counter']);
//echo ($_SESSION['UserID']);

mysqli_close($con);
?>

<html>
<body>


</body>
</html>