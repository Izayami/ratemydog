<?php 

session_start();

include("connection.php");
include("functions.php");

if(isset($_GET['txtName']) && isset($_GET['password'])){


		//something was posted

		$txtName = $_GET['txtName'];

		$txtPw = $_GET['password'];



		if(!empty($txtName) && !empty($txtPw) && !is_numeric($txtName))

		{



			//read from database

			$query = "select * from User where Name = '$txtName' limit 1";

			$result = mysqli_query($con, $query);



			if($result)

			{

				if($result && mysqli_num_rows($result) > 0)

				{



					$user_data = mysqli_fetch_assoc($result);

					

					if($user_data['Password'] === $txtPw)

					{



						$_SESSION['UserID'] = $user_data['UserID'];

						header("Location: index.php");

						die;

					}

                    else{

                        $row=mysqli_fetch_array($query);

                        

                        if(isset($_POST["remember"])){

                            //setup cookie

                            setcookie("User", $row["Name"], time() + (86400 * 30));

                            setcookie("Pass", $row["Password"], time() + (86400 * 30));

                        }

                        $_SESSION['Id'] = $user_data['UserID'];

						header("Location: index.php");

                    }

				}

			}

			

			echo "wrong username or Password!";

		}else

		{

			echo "wrong username or Password!";

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

    <section class="login">

        <nav>

            <!--logo-->

            <a href="index.html"><img src="images/newlogo2.png" alt="Logo"></a>

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

        <h1>Account Login</h1>

    </section>

    

    <!-- Login Form -->

    <section class="login-content">

        <form class="login-form">

            <h1>Welcome! Here you can Log in or sign up!</h1>



            <!-- Input fields for login -->

            <label for="Name">Name:</label>

            <input type="text" id="txtName" name="txtName"><br><br>

            

            <label for="password">Password:</label>

            <input type="password" id="password" name="password"><br><br>

            

            <!-- Buttons for login and creating an account -->

            <div class="buttons">

                <input type="submit" value="Login" class="login-btn">

                <a href="createaccount.php" class="create-account-btn">Create Account</a>

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

