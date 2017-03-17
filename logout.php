<?php
	session_start();

	require_once("conn.php");

	session_destroy();
	?><script language="javascript">
			alert(" ออกจากระบบแล้ว");
			window.location="login.php";
	</script><?
	
?>
