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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
</head>
<body>
    <section class="profilePage">
        <nav>
            <a href="index.html"><img src="images/newlogo2.png" alt="Logo"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="myProfile.html">My Profile</a></li>
                    <li><a href="postdog.html">Post</a></li>
                    <li><a href="dogRatingPage.html">Rate a Dog</a></li>
                    <li><a href="login.html">Log In</a></li>
                    <li><a href="Log Out">Log Out</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1>Dog Rating</h1>
    </section>
    
    <section class="rateDog-content">
        <div class="row">
            <div class="rateDogPage-col">
                <div class="dogRatingProfile-info">
                    <img src="profile-photo.jpg" alt="Profile Photo">
                    <h2>Dog's Name: <?php echo $dname; ?></h2>
                    <h3>Dog's Breed: </h3>
                    <h3>Owner's Name: Your Name</h3>
                    <p>About this Dog:</p>
                    <p>This is where the description of the dog would be.</p>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        var navLinks = document.getElementById("navLinks");

        function showMenu() {
            navLinks.style.right = "0";
        }

        function hideMenu() {
            navLinks.style.right = "200px";
        }
    </script>
</body>
</html>

