<?php

	include("connection.php");
	include("functions.php");

//is cookies set
//redirect to dashboard
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);

					if (password_verify($password, $user_data['password'])) {
					    //echo 'Password is valid!';
							session_start();
							$_SESSION['user_id'] = $user_data['user_id'];
							$_SESSION['user_name'] = $user_data['user_name'];
							//rememberme function call
							//set cookie
							//if($user_data)
							//{
								if(!empty($_POST['remember']) && $_POST['remember'] == 'true' ){
									setcookie('member_login', $_POST['user_name'], time()+(10*365*24*60*60));
									setcookie('member_password', $_POST['password'], time()+(10*365*24*60*60));
								}
								header("Location: index.php");
								die();
							}

							header("Location: login.php");
					} else {
					    echo 'Invalid password.';
					}
				}
			//}
		}else
		{
			header("Location:signup.php");
			echo "wrong username or password!";
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

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login">
			<div>
						<input type="checkbox" name="remember" value="true">
			      <label for="remember-me">Remember me</label>
					</div>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>
