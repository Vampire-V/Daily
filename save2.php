<?php
require_once("conn.php");
//echo $_REQUEST["run"];
session_start();
for($i=1;$i<$_REQUEST["run"];$i++){

	$detail[$i] = mysqli_real_escape_string($con,$_REQUEST["detail".$i]);
	$item[$i] = $_REQUEST["item".$i];
	$check[$i] = $_REQUEST["y_".$i];
	// $group[$i] = $_REQUEST["group".$i];
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
$date = $_REQUEST['Keydate'];
//echo $date;
/*
$sql = "SELECT t_createday FROM tbtransaction WHERE t_createday = '".date('Y-m-d')."'";
$query = mysqli_query($con,$sql);
$objResult = mysqli_fetch_array($query); // echo $objResult['t_createday'];
*/

	for ($i=1; $i<$run;$i++){  //loop  for ให้เซพไปที่ละฟิว

		$sql_ins= " UPDATE tbtransaction SET
					t_createdby = '".$_SESSION["u_name"]."',
					t_by = '".$check[$i]."',
					t_detail = '".$detail[$i]."'
					WHERE i_id = '".$item[$i]."' and t_createday = '".$date."'";
		// echo $sql_ins;
		$result=mysqli_query($con,$sql_ins);
	}
	echo"<body onload=\"window.alert('SAVE SUCCESS'); return history.back();\">"; 
?>