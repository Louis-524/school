<?php
	session_start(true);
	session_destroy();
	header("Location:../login_home.php");
?>