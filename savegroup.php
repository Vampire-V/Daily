<?php
	require_once("conn.php");
$gname = mysqli_real_escape_string($con,$_REQUEST['gname']);
$sname = mysqli_real_escape_string($con,$_REQUEST['sname']);
$groupid = $_REQUEST['groupid'];

if($_REQUEST["Submit"]=="AddSystem"){

	$tbitem = "INSERT INTO tbitem (i_name,g_id) VALUES ('".$sname."','".$groupid."')";
	$objQuery = mysqli_query($con,$tbitem);

}else {
	$tbgroup = "INSERT INTO tbgroup (g_name) VALUES ('".$gname."')";
	$objQuery = mysqli_query($con,$tbgroup);
}

if($objQuery) {
?><script>window.location='addsystem.php';</script><?php
}
?>
