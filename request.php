<?php
	include('session.php');
	include('globalfunctions.php');
	/*
	if(isset($_GET["apr"])) {
		if($_GET["apr"] == "y" && getNotificationSuccess() == 0) {
			// database connection variables
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "dbccf";

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql_pass = "UPDATE endorsement_tbl INNER JOIN notifications_tbl ON endorsement_tbl.dgmemberID = notifications_tbl.requestdgmemberID SET endorsementStatus = 1 WHERE dgmemberID = ".getRequestDgMemberID();
			mysqli_query($conn, $sql_pass);

			$sql_notificationtype = "UPDATE notifications_tbl SET notificationStatus = 2 WHERE receivermemberID = ".$_SESSION['userid'];
			mysqli_query($conn, $sql_notificationtype);

			$notificationDesc = $_SESSION['firstName']." ".$_SESSION['lastName']." has approved your request to be a Dgroup Leader";
			$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, endorsementID, notificationDesc, notificationStatus, notificationType) VALUES(".$_SESSION['userid'].", ".getMemberIDFromDgroupMembers(getRequestDgMemberID()).", ".getDgEndorsementID(getRequestDgMemberID()).", '$notificationDesc', 0, 0);";
			mysqli_query($conn, $sql_notifications);
		}
		else if($_GET["apr"] == "n" && getNotificationSuccess() == 0) {
			// database connection variables
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "dbccf";

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql_pass = "UPDATE endorsement_tbl INNER JOIN notifications_tbl ON endorsement_tbl.dgmemberID = notifications_tbl.requestdgmemberID SET endorsementStatus = 3 WHERE dgmemberID = ".getRequestDgMemberID();
			mysqli_query($conn, $sql_pass); //sets endorsement request status as rejected/reconsideration

			$sql_notificationtype = "UPDATE notifications_tbl SET notificationStatus = 2 WHERE receivermemberID = ".$_SESSION['userid'];
			mysqli_query($conn, $sql_notificationtype); // sets notification as already completed

			$notificationDesc = $_SESSION['firstName']." ".$_SESSION['lastName']." has disapproved your request to be a Dgroup Leader";
			$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, endorsementID, notificationDesc, notificationStatus, notificationType) VALUES(".$_SESSION['userid'].", ".getMemberIDFromDgroupMembers(getRequestDgMemberID()).", ".getDgEndorsementID(getRequestDgMemberID()).", '$notificationDesc', 0, 0);";
			mysqli_query($conn, $sql_notifications);
		}
	}
	*/
	// database connection variables

	if(isset($_POST['request'])) {
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$baptismaldate = date("Y-m-d", strtotime($_POST["BaptismalDate"]));
		$baptismalplace = $_POST["BaptismalPlace"];
		$dgrouptype = $_POST["DgroupType"];
		if($dgrouptype=="Youth") $dgrouptype = 0;
		else if($dgrouptype=="Singles") $dgrouptype = 1;
		else if($dgrouptype=="Single_Parents") $dgrouptype = 2;
		else if($dgrouptype=="Married") $dgrouptype = 3;
		else if($dgrouptype=="Couples") $dgrouptype = 4;
		else if($dgrouptype=="All") $dgrouptype = 5;
		$agebracket = $_POST["AgeBracket"];
		$meetingday = $_POST["MeetingDay"];
		$meetingplace = $_POST["MeetingPlace"];
		$starttime = date("H:i:s", strtotime($_POST["timepicker1opt1"]));
		$endtime = date("H:i:s", strtotime($_POST["timepicker1opt2"]));
		$dateendorsed = date("Y-m-d");

		$sql_endorsement = "INSERT INTO endorsement_tbl(dgmemberID, baptismalDate, baptismalPlace, ageBracket, eschedDay, eschedStartTime, eschedEndTime, eschedPlace, edgleader, edgroupType, dateEndorsed) VALUES(".$_SESSION['dgroupmemberID'].", '$baptismaldate', '$baptismalplace', '$agebracket', '$meetingday', '$starttime', '$endtime', '$meetingplace', ".$_SESSION['userid'].", $dgrouptype, '$dateendorsed');";
		mysqli_query($conn, $sql_endorsement);

		// notificationStatus: 0 implies not read, 1 implies already read
		// notificationType: 
		// 0 = endorsement; 1 = event; 2 = ministry;
		$notificationDesc = $_SESSION['firstName']." ".$_SESSION['lastName']." is requesting for your approval to be a Dgroup Leader";
		$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, requestdgmemberID, endorsementID, notificationDesc, notificationStatus, notificationType, request) VALUES(".$_SESSION['userid'].", ".getDgroupLeaderID($_SESSION['userid']).", ".$_SESSION['dgroupmemberID'].", ".getEndorsementID().", '$notificationDesc', 0, 0, 1);";
		mysqli_query($conn, $sql_notifications);
		mysqli_close($conn);
	}
?>