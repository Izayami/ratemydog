<?php



session_start();



if(isset($_SESSION['UserID']))

{

	unset($_SESSION['UserID']);

}


session_destroy();
header("Location: index.php");

die();