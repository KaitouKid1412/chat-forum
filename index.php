<?php

include 'core.inc.php';

if(loggedin())
{
	$user_name = getfield('user_name');
	if(isset($_POST['message']))
	{
		$message = $_POST['message'];
		if(!empty($message))
		{
			$query = "INSERT INTO messages VALUES ('','".mysql_real_escape_string($user_name)."',
												      '".mysql_real_escape_string($message)."')";
			
			if($query_run = mysql_query($query))
			{
				header ('Location: index.php');
			}
			else
			{
				die(mysql_error());
			}
		}
	}

}

if(loggedin())
{ 
	$query = "SELECT * FROM `messages` ";
	if($query_run = mysql_query($query)) 
	{	
		while($row = mysql_fetch_array($query_run))
		{
			echo $row['user_name']." : ".$row['message'];
			echo nl2br(" \n "); 
		}		            
	}
}

?>

<html>
	
<head>	
</head>

<body>
	<form action="index.php" method="POST">
		<input type="text" name="message" placeholder="Type Your Message">
		<input type="submit" name="submit" value="Send"><br><br>
		<a href="loginform.inc.php">LogIn</a>
		<a href="Registrationform.inc.php">SignUp</a>
	</form>
</body>

</html>