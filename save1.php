<?php
session_start();
require_once("conn.php");

for($i=1;$i<$_REQUEST["run"];$i++){

	$detail[$i] = mysqli_real_escape_string($con,$_REQUEST["name_".$i]);
	$item[$i] = $_REQUEST["item_".$i];
	$check[$i] = $_REQUEST["y_".$i];
	$group[$i] = $_REQUEST["group_".$i];
	/*
	echo "Detail ".$i." : ".$detail[$i]."<br />";
	echo "Item ".$i." : ".$item[$i]."<br />";
	echo "Check ".$i." : ".$check[$i]."<br />";
	echo "Group ".$i." : ".$group[$i]."<br />";
	*/
	if($check[$i]=="N" and $detail[$i]==""){
		?>
		<script language="javascript">
			alert(" Check <?php echo $i;?> is N, Details <?php echo $i;?> can not be null.");
			window.location="table2.php";
		</script>
		<?php
		exit();
	}
}

$run=$i; // echo $run;
$date = $_REQUEST['date'];


$sql = "SELECT t_createday FROM tbtransaction WHERE t_createday = '".$date."'";
$query = mysqli_query($con,$sql);
$objResult = mysqli_fetch_array($query); // echo $objResult['t_createday'];

if (!$objResult['t_createday']){//เช็ควันที่ ในtable
	for ($i=1; $i<$run;$i++){  //loop  for ให้เซพไปที่ละฟิว

		$sql_ins="INSERT into tbtransaction
		(i_id,g_id,t_by,t_detail,t_createday,t_status,t_createdby) values('".$item[$i]."',
		'".$group[$i]."','".$check[$i]."','".$detail[$i]."','".$date."','1','".$_SESSION["u_name"]."')";
		// echo $sql_ins;
		$result=mysqli_query($con,$sql_ins);
	}
	echo"<body onload=\"window.alert('SAVE SUCCESS'); return history.back();\">";
}else{
	echo"<body onload=\"window.alert('DATA IS DUPICATE'); return history.back();\">";//บันทึกไม่ได้
}
?>
