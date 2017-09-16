<?php
	// insert code for setting 
	include('session.php');
	include('globalfunctions.php');
	$id = $_POST['ministryID'];
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if(isset($_POST['join'])) {
		$date = date("Y-m-d");
		$sql_ministry_participation = "INSERT INTO ministryparticipation_tbl(ministryID, memberID, timeParticipation, dateParticipation) VALUES($id, ".$_SESSION['userid'].", NOW(), '$date')";
		mysqli_query($conn, $sql_ministry_participation);
		$fullname = $_SESSION['firstName']." ".$_SESSION['lastName'];
		$notificationdesc = $fullname." wishes to join ".getMinistryName($id);
		$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, ministryID, ministryParticipationID, notificationDesc, notificationType, request) VALUES(".$_SESSION['userid'].", ".getMinistryHeadID($id).", $id, ".getCurrentMinistryParticipationID().", '$notificationdesc', 2, 1)";
		mysqli_query($conn, $sql_notifications);
		mysqli_close($conn);
	}
	if(isset($_POST['close'])) {
		$sql_close_ministry = "UPDATE ministrydetails_tbl SET ministryStatus = 2 WHERE ministryID = $id";
		mysqli_query($conn, $sql_close_ministry);
		mysqli_close($conn);
	}
?>