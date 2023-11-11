<?php
//Establish basics
include("connection.php");
include("functions.php");
session_start();

$sql = "SELECT DogID, Stars1, Stars2, Stars3, Stars4, Stars5, Score FROM dog";
$result = $con->query($sql);
$score = 0;
$total = 0;

while($row = $result->fetch_assoc()) {
	$total = $row["Stars1"] + $row["Stars2"] + $row["Stars3"] + $row["Stars4"] + $row["Stars5"];
	$score = ($row["Stars1"] + ($row["Stars2"] * 2) + ($row["Stars3"] * 3) + ($row["Stars4"] * 4) + ($row["Stars5"] * 5)) / $total;
	$sql = "UPDATE dog SET Score='" . $score . "' WHERE DogID=" . $row["DogID"];
	$con->query($sql);
}