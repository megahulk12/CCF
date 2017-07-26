<?php
	include("session.php");
	include("globalfunctions.php");
	$myusername = $_SESSION['user'];
	$mypassword = $_POST['old-password'];
	$sql = "SELECT * FROM member_tbl WHERE username = '$myusername' AND password = '$mypassword';";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);
	if($count == 1) {
		echo 1;
	}
	else
		echo 0;
?>