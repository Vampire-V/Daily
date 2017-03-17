<?php
require_once("conn.php");
session_start();
 $username = mysqli_real_escape_string($con,$_REQUEST['user']);
 $password = mysqli_real_escape_string($con,$_REQUEST['pass']);
 
 $sql = "SELECT * FROM tbuser WHERE u_name = '".$username."' AND u_pass = '".$password."'";
// echo $username;
// echo $password; 
	$query = mysqli_query($con,$sql);
 	$result = mysqli_fetch_array($query);



 if(!$result)
	{	?>
		<script language="javascript">
			alert(" ผิดพลาด");
			window.location="login.php";
		</script>
		<?php	die();
		//die(header('refresh:5; url=login.php').'ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง!');	
	}else {

		$_SESSION["u_name"] = $result["u_name"];// SESSION เพื่อใช้ในหน้าอื่น ที่ต้องการตรวจสอบข้อมูลผู้ใช้ในขณะนั้น
 		$_SESSION["status"] = $result["status"];

		
		if($result["status"]=="ADMIN")
		{
			header("location:RegisterForm.php");
		}
		else
		{
		
			header("location:table2.php");

		}
		
	}
  session_write_close();//สิ้นสุดการสร้าง SESSION
mysqli_close();
?>
