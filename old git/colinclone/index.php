<?php

   session_start();

   if( isset( $_SESSION['counter'] ) ) {

      $_SESSION['counter'] += 1;

   }else {

      $_SESSION['counter'] = 1;

   }

   $my_Msg = "This page is visited ".  $_SESSION['counter'];

   $my_Msg .= " time during this session.";

?>

 <?php  echo ( $my_Msg ); ?>

<!DOCTYPE html>

<html>

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

    <section class="header">

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

                    <li><a href="test.php?id=6">Random Dog</a></li>

                    <li>
                        <?php 
                        
                        if(isset($_SESSION['UserID']))
                        {
                            echo "<a href='logout.php'>Log Out</a>";
                            
                        }
                        else
                        {
                            echo "<a href='login.php'>Log In</a>";;
                        }
                        ?></li>

                    <li><a href="CONTACT US">Contact Us</a></li>

                </ul>

            </div>

            <!--Menu-->

            <i class="fa fa-bars" onclick="showMenu()"></i>

        </nav>

        <!--title-->

        <h1>Rate My Dog</h1>

<div class ="text-box">

    <!--Introduction To Webpage-->

    <h1>Welcome to Rate My Dog!</h1>

    <p>

    Here we rate your dogs and you rate other dogs to see which is the cutest of them all.

    </p>

    <!--button to start rating-->

    <a href="" class="hero-btn">Click Here to Start Rating Dogs!</a>

    

</div>

</section>

    

<!----------AboutUs----------------------------->

<section class="myProfile">

    <h1>About Us</h1>

    <p>We are a Group of Students Working on a Webpage for RateMyDog</p>

    

    <div class="row">

        <div class="profile-col">

        <h3>Contact Us</h3>

        <p>xxxxxx@gmail.com</p>

        <p>(407)123-4567</p>

        </div>

    </div>

    

</section>

    

    

    

    

<!----------Javascript for Toggle Menu------------->    

<script>

    var navLinks = document.getElementById("navLinks");



    /* Adding and removing menu for mobile */

    function showMenu() {

        navLinks.style.right = "0";

    }



    function hideMenu() {

        navLinks.style.right = "-200px";

    }

</script>

    

</body>

</html>
