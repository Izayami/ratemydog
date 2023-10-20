<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "id21253754_dogdata";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
