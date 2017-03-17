<?php
require_once("conn.php");

$id=$_POST['id'];
echo $id;
$delete="delete from tbitem where i_id = $id";
$result=mysqli_query($con,$delete);
// Data Leased Line
  ?>
