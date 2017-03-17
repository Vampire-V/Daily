<?php
date_default_timezone_set('ASIA/BANGKOK');
	$server	  = "localhost";
	$user	  = "root";
	$pass	= "facebook";
	$db	  = "daily";

	$con = mysqli_connect($server,$user,$pass,$db);
	$con->query("set names utf8");

	if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " .mysqli_connect_error();
		exit();
	}

	//$query = mysqli_query($con);
?>
