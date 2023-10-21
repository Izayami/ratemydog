<?php

// database connection code
if(isset($_POST['txtName']))
{
$con = mysqli_connect('localhost', 'id21253754_ratemydog', 'Sn00p!!!','id21253754_dogdata');
//***

//Get datas
$txtName = $_POST['txtName'];
$txtBreed = $_POST['txtBreed'];
$txtBio = $_POST['txtBio'];
$txtPicture = $_POST['txtPicture'];
//***

// Datas to SQL
$sql = "INSERT INTO `Dog` (`Uploader_UserID`, `Name`, `Breed`, `Bio`, `Picture`, `Stars1`, `Stars2`, `Stars3`, `Stars4`, `Stars5`) VALUES ('0', '$txtName', '$txtBreed', '$txtBio', '$txtPicture', '0', '0', '0', '0', '0')";
//***


// Run it!
$rs = mysqli_query($con, $sql);
if($rs)
{
	echo "Registration Successful!";
}
}
