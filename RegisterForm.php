<?php
    require_once("conn.php");
    session_start();
    if($_SESSION['u_name'] == "")
    {
        ?>
        <script language="javascript">
            alert("กรุณา Login ก่อน");
            window.location="login.php";
        </script>
        <?
        exit();
    }

    if($_SESSION['status'] != "ADMIN")
    {
        ?>
        <script language="javascript">
            alert("คุณไม่มีสิทธิ์");
            window.location="table2.php";
        </script>
        <?

        exit();
    }

?>
<html>
<head>
<title>Daily Check Sheet</title>
<link rel="shortcut icon" href="img/shortcut.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>


<div class="container">
  <?php include_once 'manuBar.php'; //เรียกใช้ไฟล์ manuBar.php ?>
</div>

<div class="container">
<form name="frmregister" method="post" action="saveform.php">
  <h1>Register Form</h1>
  <table class="table table-hover">
    <tbody>
      <tr>
        <td > Username</td>
        <td >
          <input name="txtUsername" type="text" id="txtUsername">
        </td>
      </tr>
      <tr>
        <td> Password</td>
        <td><input name="txtPassword" type="password" id="txtPassword">
        </td>
      </tr>
      <tr>
        <td> Confirm Password</td>
        <td><input name="txtConPassword" type="password" id="txtConPassword">
        </td>
      </tr>

      <tr>
        <td> Status</td>
        <td>
          <select name="status" id="status">
            <option value="ADMIN">ADMIN</option>
            <option value="USER">USER</option>
          </select>
</td>
      </tr>
    </tbody>
  </table>
  <br>
  <input type="submit" name="Submit" class="btn btn-primary btn-lg btn-block" value="Register">
  </div>
</form>

<div class="container">
<form>
<h1>System users</h1>
<?
$tbuser = "SELECT * FROM tbuser ";
    $rows=@mysqli_query($con,$tbuser);
    ?>

        <table  class="table table-hover" >
         <tr>
        <th>No.</th>
        <th>Username</th>
        <th>Status</th>
        <th>Delete</th>
        </tr>

<?php

    while ($num=mysqli_fetch_array($rows)) {

?>

        <tr>
        <td align="left"><? echo $num["u_id"]; ?></td>
        <td align="left"><? echo $num["u_name"]; ?></td>
        <td align="left"><? echo $num["status"]; ?></td>
        <td><input type="button" name="delete" value="delete" class="btn btn-danger btn-sm delete_user" id="<?php echo $num['u_id'];?>"></td>
        </tr>
<? } ?>
        </table>


      </form></div>
</body>
<script>
  $(document).ready(function(){
$('.delete_user').click(function(){
  var uid=$(this).attr('id');
  var status=confirm('Are you delete!');
  if(status){
  $.ajax({
    url:"deleteUser.php",
    method:"post",
    data:{id:uid},
    success:function(data){
      location.reload();
    }
  });
  }
});
});
</script>
</html>
