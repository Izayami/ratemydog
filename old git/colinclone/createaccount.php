<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Name = $_POST['Name'];
		$Password = $_POST['Password'];

		if(!empty($txtName) && !empty($txtPw) && !is_numeric($txtName))
		{

			//save to database
			$UserID = random_num(20);
			$query = "insert into users (UserID,Name,Password) values ('$id','$txtName','$txtPw')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!--background for webpage-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate my Dog</title>
	<link rel="icon"  href="images/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
</head>
<body>
    <section class="createaccount">
        <nav>
            <!--logo-->
            <a href="index.php"><img src="images/newlogo2.png" alt="Logo"></a>
            <div class="nav-links" id="navLinks">
                <!--close icon-->
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <!--Toolbar-->
                    <li><a href="index.php">Home</a></li>
                    <li><a href="My Profile">My Profile</a></li>
                    <li><a href="postdog.html">Post</a></li>
                    <li><a href="RANDOM DOG">Random Dog</a></li>
                    <li><a href="login.php">Log In</a></li>
                    <li><a href="CONTACT US">Contact Us</a></li>
                </ul>
            </div>
            <!--Menu-->
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <!--title-->
        <h1>Create an Account</h1>
    </section>

    <!-- Login Form -->
    <section class="createaccount-content">
        <form name="UserRegForm" method="post" action="UserReg.php" class="createaccount-form">
            <h1>Welcome! Time to create an Account!</h1>

            <!-- Input fields for login -->
            <label for="Name">Enter your Name:</label>
            <input type="text" id="txtName" name="txtName"><br><br>

            <label for="password">Create Password:</label>
            <input type="password" id="txtPw" name="txtPw"><br><br>
			
			<label for="email">Enter your Email:</label>
            <input type="text" id="txtEmail" name="txtEmail"><br><br>

            <!-- Buttons for login and creating an account -->
            <div class="buttons">
                <input type="submit" value="Submit" class="submit-btn">
                <a href="login.php" class="relog-btn">Log In</a>
            </div>
        </form> 
    </section>

    <!-- Javascript for Toggle Menu -->
    <script>
        var navLinks = document.getElementById("navLinks");

        /* Adding and removing menu for mobile */
        function showMenu() {
            navLinks.style.right = "0";
        }

        function hideMenu() {
            navLinks.style.right = "200px";
        }
    </script>
</body>
</html>

