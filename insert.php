<?php
require_once("conn.php");

$id=$_POST['g_id'];
$gname=mysqli_real_escape_string($con,$_POST['g_name']);

if ($_POST['g_check'] == "Update Group") {
  $edit="update tbgroup set g_name='$gname' where g_id=$id";
} else {
  $edit="update tbitem set i_name='$gname' where i_id=$id";
}

if (mysqli_query($con,$edit)) {
  echo "Complete";
}

  ?>
