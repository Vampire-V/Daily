<?php
	session_start();

	require_once("conn.php");

	session_destroy();
	?><script language="javascript">
			alert("Sign out Complete");
			window.location="login.php";
	</script><?

?>
