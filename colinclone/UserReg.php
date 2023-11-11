<?php

// database connection code
if(isset($_POST['txtName']))
{
$con = mysqli_connect('localhost', 'id21253754_ratemydog', 'DBDog12!','id21253754_dogdata');
//***

//Get datas
$txtName = $_POST['txtName'];
$txtPw = $_POST['txtPw'];
$txtEmail = $_POST['txtEmail'];
//***

// Datas to SQL
$sql = "INSERT INTO `User` (`Name`, `Password`, `Email`, `IsAdmin`) VALUES ('$txtName', '$txtPw', '$txtEmail', '0')";
//***


// Run it!
$rs = mysqli_query($con, $sql);
if($rs)
{
	echo "Registration Successful!";
}
}
