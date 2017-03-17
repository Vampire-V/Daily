<?php
require_once("conn.php");
session_start();
if(!isset($_SESSION["u_name"])) {
	header('Location: logout.php');
	die();
}



?>
<html>
<head>

 <title>Daily Check Sheet</title>
 <link rel="shortcut icon" href="img/shortcut.ico">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style type="text/css">
    body {
        background: url(img/) no-repeat center center fixed;
        background-size: cover;
    }
 </style><!--bg img-->
<script language="javascript">
 function fncSubmit(strPage)
 {
	if(strPage == "report2")
	{
		document.form1.action="report2.php";
	}

	if(strPage == "report3")
	{
		document.form1.action="report3.php";
	}

	document.form1.submit();
 }
 </script> <!--report-->

</script>

</head>
<body>


<div class="container">
<?php include_once 'manuBar.php'; //เรียกใช้ไฟล์ manuBar.php ?>
</div>

<div class="container">
<form  align ="right"  method="post"
  name="form1" accept-charset="UTF-8" >

 <table >
 Report Date :  <input type="date" id="sDate" name="sDate" value="<?php echo $_GET["Keydate"];?>">
</table>

 <input name="submitbtn" class="btn btn-primary" type="submit" value="Excel"  onClick="JavaScript:fncSubmit('report2')">
 <input name="submitbtn" class="btn btn-primary" type="submit" value="PDF"  onClick="JavaScript:fncSubmit('report3')">
 </form><!--script report-->





<center><form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <h2><font color="#000000" >สวัสดีคุณ: <?php echo $_SESSION["u_name"]; ?></font></h2>
    <tr>
      <th>Keyword : <input name="Keydate" type="date" id="Keydate"
      		value="<?php echo $_GET["Keydate"];?>">
      <input type="submit" class="btn btn-success" value="Search"></th>
    </tr>

 </form></center><!--form ค้นหาวันที่  -->



<?php

	$sqlq = "SELECT * from tbtransaction where t_createday ='".$_GET["Keydate"]."'" ;
	$query1 = mysqli_query($con,$sqlq) ;
	$objResult = mysqli_fetch_array($query1);

//echo $objResult['t_createday'];

if($objResult['t_createday']){//เช็คตาราง t_createday

?>

<form action="save2.php" method="POST" >
	<input type="hidden" name="Keydate" value="<? echo $_GET["Keydate"]; ?>" >
<center><table class="table table-hover">
<thead>

			<!-- สร้างตาราง-->
			<tr class="info" >
				<th>ID</th>
				<th>GROUP</th>
				<th>OK</th>
				<th>DETAIL</th>


			</tr>

</thead>
			<?php
$tbtran = "SELECT * FROM tbgroup "; //ประกาศ tbtran แสดง table tbgroup
				$rows=@mysqli_query($con,$tbtran); //ประกาศ rows ตรวจสอบ $con,$tbtran

			$run = "1";//เอาไว้เก็บค่าตัวแปร วนรูป while ไม่ให้ซ้ำกัน
					while($qp=@mysqli_fetch_array($rows)){
				$tbtran1 = "SELECT * FROM tbitem WHERE g_id = '".$qp['g_id']."' ";
				$rows1=@mysqli_query($con,$tbtran1);

			?>

			<tr class="danger" >
				<td></td>
				<th bgcolor=''><?=$qp['g_name']?></th>
				<td></td>
				<td></td>

			</tr>

			<?php

				while($qp1=@mysqli_fetch_array($rows1)){

				?>

				<tr>
				<td>

			<input type="hidden" name="item<?=$run?>" value="<?=$qp1['i_name']?>">
			<input type="hidden" name="group<?=$run?>" value="<?=$qp1['g_id']?>">
			<?=$qp1['i_id']?>

				</td>
				<td><?=$qp1['i_name']?></td>

				<?
					$sqlq4 = "SELECT * from tbtransaction where i_id = '".$qp1['i_name']."' and
					t_createday = '".$_GET["Keydate"]."' " ;
					 $query14 = mysqli_query($con,$sqlq4) ;

					 while($qp34=mysqli_fetch_array($query14)){


				?>
				<td><select name="y_<?=$run;?>" >
				<?

					if( $qp34["t_by"] == 'Y' ){
				?>
           		<option value="Y">yes</option>
           		<option value="N">no</option>
           		<option value="-">-</option>
				<?
				}else if( $qp34["t_by"] == 'N' ){
				?>
				<option value="N">no</option>
				<option value="Y">yes</option>
				<option value="-">-</option>
				<?
					}else {

				?>
				<option value="-">-</option>
				<option value="Y">yes</option>
        <option value="N">no</option>

				<? }	?>

					</select></td>
			<td><input type="text" name="detail<?=$run;?>" value="<?=$qp34['t_detail']; ?>"
				 />
			</td>
				<? $run++; } ?>
			</tr>
				<?	} } ?>

		</table></center>
		<center><input type="hidden" name="run" value="<?php echo $run;?>">
				<input type="submit" class="btn btn-primary btn-lg btn-block" value="Update" ></center>
		</form>

<? } else { ?>

<form action="save1.php" method="POST" >

	<input type="hidden" name="date" value="<? echo $_GET["Keydate"]; ?>" >
	<center><table class="table table-hover">
	<thead>

			<tr class="info">
				<th>ID</th>
				<th>GROUP</th>
				<th>OK</th>
				<th>DETAIL</th>

			</tr>

	</thead>
	<?php
				$tb = "SELECT * FROM tbgroup "; //ประกาศ tb เลือก table tbgroup
				$query=@mysqli_query($con,$tb); //ประกาศ query ตรวจสอบ $con,$tb

	$run = "1";//เอาไว้เก็บค่าตัวแปร วนรูป while ไม่ให้ซ้ำกัน
	while($qp=mysqli_fetch_array($query)){
		$tb1 = "SELECT * FROM tbitem WHERE g_id = '".$qp['g_id']."' ";
		$query1=mysqli_query($con,$tb1);
	?>
	<tr class="danger" >
	<td></td>
	<th bgcolor='' ><?=$qp['g_name']?></th>
	<td></td>
	<td></td>


	</tr>

	<?php

		while($qp1=mysqli_fetch_array($query1)){

	?>

	<tr>
	<td>

			<input type="hidden" name="item_<?=$run?>" value="<?=$qp1['i_name']?>">
			<input type="hidden" name="group_<?=$run?>" value="<?=$qp1['g_id']?>">
			<?=$qp1['i_id']?>

	</td>
		<td><?=$qp1['i_name']?></</td>
		<td>
		<select name="y_<?=$run?>">
		<option value="-">-</option>
           <option value="Y">yes</option>
           <option value="N">no</option>
		</select>
		</td>
		<td><input type="text" name="name_<?=$run?>"></td>

		</tr>
	<?
		$run++;
		}
		}
	?>
	</table></center>

	<center>
 <input type="hidden" name="run" value="<?php echo $run;?>">
 <input type="submit" class="btn btn-primary btn-lg btn-block" value="Save" >

 </form>
          	 	<?
					}
				?>
	<h3><marquee direction="right"><font color='red'>ระบบนี้รองรับการแสดงผลกับ Browser Chrome</font></marquee></h3>
</div>
</body>
</html>
