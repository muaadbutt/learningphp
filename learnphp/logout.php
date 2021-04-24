<?php

session_start();

if(isset($_SESSION['user_id']))
{
	//unset cookie
	//set cookie expirey date in the past
	unset($_SESSION['user_id']);
	// Finally, destroy the session.
	session_destroy();
}

header("Location: login.php");
die;
