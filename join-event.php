<?php
	// insert code for setting 
	include('session.php');
	include('globalfunctions.php');
	$id = $_POST['eventID'];
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if(isset($_POST['join'])) {
		$date = date("Y-m-d");
		$sql_event_participation = "INSERT INTO eventparticipation_tbl(eventID, memberID, timeParticipation, dateParticipation) VALUES($id, ".$_SESSION['userid'].", NOW(), '$date')";
		mysqli_query($conn, $sql_event_participation);
		$fullname = $_SESSION['firstName']." ".$_SESSION['lastName'];
		$notificationdesc = $fullname." wishes to join ".getEventName($id);
		$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, eventID, eventParticipationID, notificationDesc, notificationType, request) VALUES(".$_SESSION['userid'].", ".getEventHeadID($id).", $id, ".getCurrentEventParticipationID().", '$notificationdesc', 1, 1)";
		mysqli_query($conn, $sql_notifications);
		mysqli_close($conn);
	}
	if(isset($_POST['close'])) {
		$sql_close_event = "UPDATE eventdetails_tbl SET eventStatus = 2 WHERE eventID = $id";
		mysqli_query($conn, $sql_close_event);
		mysqli_close($conn);
	}
?>