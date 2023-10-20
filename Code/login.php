<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Name = $_POST['Name'];
		$Password = $_POST['Password'];

		if(!empty($Name) && !empty($Password) && !is_numeric($Name))
		{

			//read from database
			$query = "select * from users where Name = '$Name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['Password'] === $Password)
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
						header("Location: success.php");
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
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="Name"><br><br>
			<input id="text" type="Password" name="Password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>