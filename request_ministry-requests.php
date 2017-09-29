<?php
	include('session.php');
	include('globalfunctions.php');
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dbccf";
	$id = $_POST["id"];
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	if(isset($_POST['notify'])) {
		$notificationdesc = "You have received some remarks about ".getMinistryName($id).".<br>Remarks: ".addSlashes($_POST['notifvalue']);
		$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, ministryID, notificationDesc, notificationType) VALUES(".$_SESSION['userid'].", ".getMinistryHeadID($id).", $id, '$notificationdesc', 1)";
		mysqli_query($conn, $sql_notifications);
		mysqli_close($conn);
	}
	else if(isset($_POST['approve'])) {
		$ministryHead = $_POST["MinistryHead"];
		$sql_ministry_approved = "UPDATE ministrydetails_tbl SET ministryHeadID = $ministryHead, ministryStatus = 1 WHERE ministryID = $id";
		mysqli_query($conn, $sql_ministry_approved);
		$sql_promote = "UPDATE member_tbl SET memberType = 4 WHERE memberID = ".getMinistryHeadID($id);
		mysqli_query($conn, $sql_promote);
		$notificationdesc = "You are now head of the ministry - ".getMinistryName($id)." and is now open for people to view and join.";
		$sql_notifications = "UPDATE notifications_tbl SET notificationStatus = 2 WHERE ministryID = ".$id;
		mysqli_query($conn, $sql_notifications);
		$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, ministryID, notificationDesc, notificationType) VALUES(".$_SESSION['userid'].", ".getMinistryHeadID($id).", $id, '$notificationdesc', 2)";
		mysqli_query($conn, $sql_notifications);
		mysqli_close($conn);
	}
	else if(isset($id)) {
		/* for new ministry notif purposes
		// set to seen the pending ministrys that have recently been added
		setSeenMinistryRequest($id);
		*/

		$query = "SELECT budget, ministryHeadID, ministryPicturePath, ministryName, ministryDescription, schedDate, schedDay, schedStartTime, schedEndTime, schedPlace, schedStatus, remarks FROM ministrydetails_tbl LEFT OUTER JOIN budgetdetails_tbl ON ministrydetails_tbl.budgetID = budgetdetails_tbl.budgetID LEFT OUTER JOIN scheduledmeeting_tbl ON ministrydetails_tbl.schedID = scheduledmeeting_tbl.schedID WHERE ministryID = $id";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$budget = $row["budget"];
				$headID = $row["ministryHeadID"];
				$picturepath = $row["ministryPicturePath"];
				$name = $row["ministryName"];
				$description = $row["ministryDescription"];
				$date = date("j F, Y", strtotime($row["schedDate"]));
				$weekly = $row["schedDay"];
				$starttime = date("h:i A", strtotime($row["schedStartTime"]));;
				$endtime = date("h:i A", strtotime($row["schedEndTime"]));
				$venue = $row["schedPlace"];
				$remarks = $row["remarks"];
				$schedstatus = $row["schedStatus"];
				$array = array("budget"=>$budget, "headID"=>$headID, "picturepath"=>$picturepath, "name"=>$name, "description"=>$description, "date"=>$date, "weekly"=>$weekly, "starttime"=>$starttime, "endtime"=>$endtime, "venue"=>$venue, "remarks"=>$remarks, "schedstatus"=>$schedstatus);
				echo json_encode($array);
			}
		}

		mysqli_close($conn);
	}
?>