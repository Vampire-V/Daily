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

 <script language="javascript">
function checkvalidate1(){
if (document.addgroup.gname.value == ""){
alert('Please in put Group!!');
document.addgroup.gname.focus();
return false; }
document.addgroup.submit();}
function checkvalidate2(){
  if (document.addsystem.sname.value == ""){
  alert('Please in put System!!');
  document.addsystem.sname.focus();
  return false;
}if (document.addsystem.groupid.value  == "0"  )
    {
        alert('PLEASE SELECT LIST!!');
        return false;
    }
  document.addsystem.submit();
}
</script>
<body>

<div class="container">
  <?php include_once 'manuBar.php'; //เรียกใช้ไฟล์ manuBar.php ?>
</div>

<div class="container">
<form name="addgroup" method="post" action="savegroup.php" onsubmit="javascript:return checkvalidate1();">
  <h1>AddGroupSystem Form</h1>
  <table class="table table-hover">
    <tbody>
      <tr>
        <td>Group</td>
        <td>
          <input name="gname" type="text" id="gname">
        </td>
      </tr>
    </tbody>
    <tr><td colspan="2"><input type="submit" name="Submit" class="btn btn-primary btn-lg btn-block"
            value="AddGroup"></td></tr>
  </table>
</form>
 </div>
  <?php $tbgroup = "SELECT * FROM tbgroup ";
    $rows=@mysqli_query($con,$tbgroup);
    ?>
<div class="container">
<form>
<h1>GroupSystem</h1>


        <table  class="table table-bordered" >
         <tr>
        <th width="5%">No.</th>
        <th width="40%">Groupname</th>
        <th width="10%">Edit</th>
        <th width="10%">Delete</th>

        </tr>

<?php
    while ($num=mysqli_fetch_array($rows)) {
?>
      <tr>
      <td align="left"><? echo $num["g_id"]; ?></td>
      <td align="left"><? echo $num["g_name"]; ?></td>
      <td><input type="button" name="Edit" value="Edit" class="btn btn-info btn-sm edit_data" id="<?php echo $num['g_id'];?>" ></td>
      <td><input type="button" name="Delete" value="Delete" class="btn btn-danger btn-sm delete_data" id="<?php echo $num['g_id'];?>"></td>
      </tr>
              <? } ?>
        </table>
      </form>
  </div>

  <div class="container">
  <form name="addsystem" method="post" action="savegroup.php" onsubmit="javascript:return checkvalidate2();" >
    <h1>AddGroupSystem Form</h1>
    <table class="table table-hover">
      <tbody>

        <tr>
          <td>System</td>
          <td><input name="sname" type="text" id="sname"></td>
        </tr>
        <tr>
          <td> Group No.</td>
          <td>
          <?php $tbgroup = "SELECT * FROM tbgroup ";
                $rows=@mysqli_query($con,$tbgroup);
              ?>

            <select name="groupid" id="groupid">
              <option value="0" >Select Group</option>

              <?php
              while ($show=mysqli_fetch_array($rows)) {
                ?>

              <option value="<?php echo $show['g_id'];?>"> <?php echo $show['g_name'];?>
              </option>
              <? } ?>
            </select></td>

      </tr>
      <tr><td colspan="2"><input type="submit" name="Submit" class="btn btn-primary btn-lg btn-block"
              value="AddSystem"></td></tr>
      </tbody>

    </table>
    </div>
  </form>


<div class="container">
  <form>
  <h1>System</h1>
        <table  class="table table-bordered" >
         <tr>
        <th width="5%">No.</th>
        <th width="40%">System</th>
        <th width="10%">View</th>
        <th width="10%">Delete</th>
        </tr>

 <?php $tbitem = "SELECT * FROM tbitem ";
      $rows=@mysqli_query($con,$tbitem);
    while ($num1=mysqli_fetch_array($rows)) {
 ?>
      <tr>
      <td align="left"><? echo $num1["i_id"]; ?></td>
      <td align="left"><? echo $num1["i_name"]; ?></td>
      <td><input type="button" name="Edit2" value="Edit" class="btn btn-info btn-sm edit_data2" id="<?php echo $num1['i_id'];?>"></td>
      <td><input type="button" name="delete2" value="Delete" class="btn btn-danger btn-sm delete_data2" id="<?php echo $num1['i_id'];?>"></td>
      </tr>
    <? } ?>
      </table>
      </form>
 <?php include_once 'editModal.php'; //เรียกใช้ไฟล์ Modal เมื่อคลิก ?>

</body>
  <script>
    $(document).ready(function(){
      $('.edit_data').click(function(){//ฟังชั่นคลิกแก้ไข
        var uid=$(this).attr('id');//ดึงไอดี
        $.ajax({//ส่งค่าไปที่ url
          url:"select.php",
          method:"post",
          data:{id:uid},
          dataType:"json",
          success:function(data){
            $('#g_id').val(data.g_id);//val รับมาจาก json
            $('#g_name').val(data.g_name);
            $('#g_check').val("Update Group");//เช็คค่าในฟอมที่กดปุ่มว่าเป็น groupหรือเป็น system
            $('#insert').val("Update Group");//ปุ่มอัพเดท
            $('#editModal').modal('show');//อ้างอิงจาก id editmodal
          }
        });
      });
      $('#edit-form').on('submit',function(e){
        e.preventDefault();//ดูการส่งข้อมูลของฟอม #edit-form ไปที่ไฟล์ insert.php
        $.ajax({
          url:"insert.php",
          method:"post",
          data:$('#edit-form').serialize(),//ส่งข้อมูลไปทั้งฟอม
          success:function(data){
            $('#edit-form')[0].reset();//เคลียค่าในเทคบอกออก
            $('#editModal').modal('hide');//close editModal
            location.reload();
          }
        });
      });
// edit item
$('.edit_data2').click(function(){
  var uid=$(this).attr('id');
  $.ajax({
    url:"select2.php",
    method:"post",
    data:{id:uid},
    dataType:"json",
    success:function(data){
      $('#g_id').val(data.i_id);
      $('#g_name').val(data.i_name);
      $('#g_check').val("Update System");
      $('#insert').val("Update System");
      $('#editModal').modal('show');
      //location.reload();
    }
  });
});
$('.delete_data').click(function(){
  var uid=$(this).attr('id');
  var status=confirm('Are you delete!');//ถามสถานะว่า ลบ/ไม่ลบ
  if(status){
  $.ajax({
    url:"deleteGroup.php",
    method:"post",
    data:{id:uid},
    success:function(data){
      location.reload();
    }
  });
  }
});
$('.delete_data2').click(function(){
  var uid=$(this).attr('id');
  var status=confirm('Are you delete!');
  if(status){
  $.ajax({
    url:"deleteSystem.php",
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
