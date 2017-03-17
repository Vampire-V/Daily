<?php
	require_once("conn.php");

$name = mysqli_real_escape_string($con,$_REQUEST['txtUsername']);
$password = mysqli_real_escape_string($con,$_REQUEST['txtPassword']);
$conpasword = mysqli_real_escape_string($con,$_REQUEST['txtConPassword']);
$status = $_REQUEST['status'];

	if(trim($name) == "")
	{
		?>
		<script language="javascript">
			alert("Please input Username");
			window.location="RegisterForm.php";
		</script>
		<?	exit();
	}

	if(trim($password) == "")
	{
		?>
		<script language="javascript">
			alert("Please input Password");
			window.location="RegisterForm.php";
		</script>
		<?	exit();
	}

	if( $password != $conpasword )
	{
		?>
		<script language="javascript">
			alert("Password not Match!");
			window.location="RegisterForm.php";
		</script>
		<?	exit();
	}

	$strSQL = "SELECT * FROM tbuser WHERE u_name = '".trim($name)."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
			?>
		<script language="javascript">
			alert("This name is already");
			window.location="RegisterForm.php";
		</script>
		<?
	}
	else
	{

		$strSQL = "INSERT INTO tbuser (u_name,u_pass,status) VALUES ('".$name."',
		'".$password."','".$status."')";
		$objQuery = mysqli_query($con,$strSQL);


		?>
		<script language="javascript">
			alert("Register Completed!");
			window.location="RegisterForm.php";
		</script>
		<?
	}

?>
