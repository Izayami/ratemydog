<?php

// database connection code
if(isset($_POST['txtName']))
{
include("connection.php");
include("functions.php");
session_start();
//***

//Get datas
$txtName = $_POST['txtName'];
$txtBreed = $_POST['txtBreed'];
$txtBio = $_POST['txtBio'];
$txtPicture = $_POST['txtPicture'];
$UID = $_SESSION['UserID'];
//***

// Datas to SQL
$sql = "INSERT INTO `Dog` (`Uploader_UserID`, `Name`, `Breed`, `Bio`, `Picture`, `Stars1`, `Stars2`, `Stars3`, `Stars4`, `Stars5`) VALUES ('$UID', '$txtName', '$txtBreed', '$txtBio', '$txtPicture', '0', '0', '0', '0', '0')";
//***


// Run it!
$rs = mysqli_query($con, $sql);
if($rs)
{
	echo "Registration Successful!";
}
}
