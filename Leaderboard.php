
<?php 
  
$con = mysqli_connect("localhost",  
        "root", "", "leaderboard"); 
  
$result = mysqli_query($con, "SELECT userName,  
marks FROM leaderboard ORDER BY marks DESC"); 
  
$ranking = 1; 
  
if (mysqli_num_rows($result)) { 
    while ($row = mysqli_fetch_array($result)) { 
        echo "<td>{$ranking}</td> 
        <td>{$row['userName']}</td> 
        <td>{$row['marks']}</td>"; 
        $ranking++; 
    } 
} 
?> 


<!DOCTYPE html> 
<html> 
    <head> 
        <title>LeaderBoard</title> 
    </head> 
  
    <body> 
        <h2>Rate my Dog</h2> 
        <table> 
            <tr> 
                <td>Ranking</td> 
                <td>UserName</td> 
                <td>Rating</td> 
            </tr> 