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
		$notificationdesc = "Your have received some remarks about your endorsement. <br> Remarks: ".$_POST['notifvalue'];
		$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, endorsementID, notificationDesc, notificationType) VALUES(".$_SESSION['userid'].", ".getMemberIDFromDgroupMembers(getDgroupMemberIDFromEndorsement($id)).", $id, '$notificationdesc', 0)";
		mysqli_query($conn, $sql_notifications);
		mysqli_close($conn);
	}
	else if(isset($_POST['approve'])) {
		$sql_endorsement_approved = "UPDATE endorsement_tbl SET endorsementStatus = 1 WHERE endorsementID = $id";
		mysqli_query($conn, $sql_endorsement_approved);
		$sql_sched = "INSERT INTO scheduledmeeting_tbl(schedDay, schedPlace, schedStartTime, schedEndTime) SELECT eschedDay, eschedPlace, eschedStartTime, eschedEndTime FROM endorsement_tbl WHERE endorsementID = $id";
		mysqli_query($conn, $sql_sched);
		$sql_select_dgroup = "SELECT ageBracket, edgleader, edgroupType FROM endorsement_tbl WHERE endorsementID = $id";
		$result = mysqli_query($conn, $sql_select_dgroup);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$agebracket = $row["ageBracket"];
				$dgleader = $row["edgleader"];
				$dgrouptype = $row["edgroupType"];
			}
		}
		$sql_dgroup = "INSERT INTO discipleshipgroup_tbl(ageBracket, schedID, dgendorsementID, dgleader, dgroupType) VALUES('$agebracket', ".getSchedID().", $id, $dgleader, $dgrouptype)";
		mysqli_query($conn, $sql_dgroup);
		$sql_leader = "UPDATE member_tbl SET memberType = 2 WHERE memberID = $dgleader";
		mysqli_query($conn, $sql_leader);
		$notificationdesc = "Your endorsement hass been approved. Congratulations, you are now a Dgroup Leader!";
		//$sql_notifications = "UPDATE notifications_tbl SET notificationStatus = 2 WHERE endorsementID = $id";
		//mysqli_query($conn, $sql_notifications);
		$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, endorsementID, notificationDesc, notificationType) VALUES(".$_SESSION['userid'].", ".getMemberIDFromDgroupMembers(getDgroupMemberIDFromEndorsement($id)).", $id, '$notificationdesc', 0)";
		mysqli_query($conn, $sql_notifications);
		mysqli_close($conn);
	}
	else if(isset($_POST['id'])) {
		$query = "SELECT endorsementID, baptismalDate, baptismalPlace, edgroupType, ageBracket, eschedDay, eschedStartTime, eschedEndTime, eschedPlace FROM endorsement_tbl WHERE endorsementID = $id";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$bpdate = date("j F, Y", strtotime($row["baptismalDate"]));
				$bppplace = $row["baptismalPlace"];
				$dgtype = $row["edgroupType"];
				if($dgtype == 0) $dgtype = "Youth";
				else if($dgtype == 1) $dgtype = "Singles";
				else if($dgtype == 2) $dgtype = "Single_Parents";
				else if($dgtype == 3) $dgtype = "Married";
				else if($dgtype == 4) $dgtype = "Couples";
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