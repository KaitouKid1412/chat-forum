<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';

$mysql_database = 'users';


$var = mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
$connection = mysqli_select_db($var,$mysql_database);

if(!$connection)
{
	die(mysqli_connection_error());
}


?>