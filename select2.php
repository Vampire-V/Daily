<?php
require_once("conn.php");
  $id=$_POST['id'];
  $gname=mysqli_real_escape_string($con,$_POST['i_name']);
  //$gname=mysqli_real_escape_string($con,$_POST['i_name']);
  //echo $id;
  $query="select * from tbitem where i_id= $id";
  $result=mysqli_query($con,$query);
  $row=mysqli_fetch_array($result);
  echo json_encode($row);//ส่งค่ากลับเป็น json
/*
  $edit="update tbgroup set g_name='$gname' where g_id='$id'";

  if (mysqli_query($con,$edit)) {
    echo "Complete";
  }
  /*$outp.="<div class = 'table table-responsive'> <table class='table table-bordered'>";
  while ($row=mysqli_fetch_array($result)) {
    $outp.='<tr><td width="30%"><lable>Name</lable></td>
                  <td width="70%">'.$row['g_name'].'</td>
                  </tr>';
  }
  $outp.="</table></div>";
  echo $outp;*/
?>
