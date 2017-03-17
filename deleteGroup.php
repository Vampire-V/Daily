<?php
require_once("conn.php");

$id=$_POST['id'];
echo 'id'.$id;
$system="SELECT g_id from tbitem where g_id=$id";
$query=mysqli_query($con,$system);
$num=mysqli_num_rows($query);
echo $num;
if($num == '0'){
  $deleteGroup="delete from tbgroup where g_id = $id";
  $result=mysqli_query($con,$deleteGroup);
}

  ?>
