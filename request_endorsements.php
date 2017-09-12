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
		$notificationdesc = "Your have received some remarks about your endorsement.";
		$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, endorsementID, notificationDesc, notificationType) VALUES(".$_SESSION['userid'].", ".getDgroupLeaderID($id).", $id, '$notificationdesc', 1)";
		mysqli_query($conn, $sql_notifications);
		mysqli_close($conn);
	}
	else if(isset($_POST['approve'])) {
		$sql_endorsement_approved = "UPDATE endorsement_tbl SET endorsementStatus = 1 WHERE endorsementID = $id";
		mysqli_query($conn, $sql_endorsement_approved);
		$notificationdesc = "Your endorsement hass been approved.";
		$sql_notifications = "UPDATE notifications_tbl SET notificationStatus = 2 WHERE endorsementID = $id";
		mysqli_query($conn, $sql_notifications);
		$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, endorsementID, notificationDesc, notificationType) VALUES(".$_SESSION['userid'].", ".getDgroupLeaderID($id).", $id, '$notificationdesc', 1)";
		mysqli_query($conn, $sql_notifications);
		mysqli_close($conn);
	}
	else if(isset($_POST['id'])) {
		$query = "SELECT endorsementID, baptismalDate, baptismalPlace, edgroupType, ageBracket, eschedDay, eschedStartTime, eschedEndTime, eschedPlace FROM endorsement_tbl WHERE endorsementID = $id";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$bpdate = $row["baptismalDate"];
				$bppplace = $row["baptismalPlace"];
				$dgtype = $row["edgroupType"];
				$agebracket = $row["ageBracket"];
				$meetday = $row["eschedDay"];
				$starttime = date("h:i A", strtotime($row["eschedStartTime"]));;
				$endtime = date("h:i A", strtotime($row["eschedEndTime"]));;
				$meetplace = $row["eschedPlace"];
				$array = array("bpdate"=>$bpdate, "bpplace"=>$bppplace, "dgtype"=>$dgtype, "agebracket"=>$agebracket ,"meetday"=>$meetday, "starttime"=>$starttime, "endtime"=>$endtime, "meetplace"=>$meetplace);
				echo json_encode($array);
			}
		}
		mysqli_close($conn);
	}
?>