<?php
	include("session.php");
	include("globalfunctions.php");

	if(isset($_POST['get-dgroup'])) {

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if(!$conn) {
			die("Connection failed!: ". mysqli_connect_error());
		}
		$query = "SELECT dgroupType, ageBracket, schedDay, schedStartTime, schedEndTime, schedPlace FROM discipleshipgroup_tbl LEFT OUTER JOIN scheduledmeeting_tbl ON discipleshipgroup_tbl.schedID = scheduledmeeting_tbl.schedID WHERE dgleader = ".$_SESSION['userid'];
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$dgrouptype = $row["dgroupType"];
				if($dgrouptype == 0) $dgrouptype = "Youth";
				else if($dgrouptype == 1) $dgrouptype = "Single";
				else if($dgrouptype == 2) $dgrouptype = "Single Parents";
				else if($dgrouptype == 3) $dgrouptype = "Married";
				else if($dgrouptype == 4) $dgrouptype = "Couples";
				else if($dgrouptype == 5) $dgrouptype = "All";
				$agebracket = $row["ageBracket"];
				$day = $row["schedDay"];
				$starttime = date("h:i A", strtotime($row["schedStartTime"]));
				$endtime= date("h:i A", strtotime($row["schedEndTime"]));
				$place = $row["schedPlace"];

				$data = array("dgrouptype"=>$dgrouptype, "agebracket"=>$agebracket, "day"=>$day, "starttime"=>$starttime, "endtime"=>$endtime, "place"=>$place);
				echo json_encode($data);
			}
		}
		mysqli_close($conn);
	}
	if(isset($_POST["edit-dgroup"])) {
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if(!$conn) {
			die("Connection failed!: ". mysqli_connect_error());
		}

		$dgrouptype = $_POST["DgroupType"];
		if($dgrouptype=="Youth") $dgrouptype = 0;
		else if($dgrouptype=="Singles") $dgrouptype = 1;
		else if($dgrouptype=="Single Parents") $dgrouptype = 2;
		else if($dgrouptype=="Married") $dgrouptype = 3;
		else if($dgrouptype=="Couples") $dgrouptype = 4;
		else if($dgrouptype=="All") $dgrouptype = 5;
		$start_agebracket = $_POST["startAgeBracket"];
		$end_agebracket = $_POST["endAgeBracket"];
		$agebracket = $start_agebracket.'-'.$end_agebracket;
		$meetingday = $_POST["MeetingDay"];
		$meetingplace = $_POST["MeetingPlace"];
		$starttime = date("H:i:s", strtotime($_POST["timepicker1opt1"]));
		$endtime = date("H:i:s", strtotime($_POST["timepicker1opt2"]));

		$query = "UPDATE discipleshipgroup_tbl SET dgroupType = $dgrouptype, ageBracket = '$agebracket' WHERE dgleader = ".$_SESSION['userid'];
		mysqli_query($conn, $query);
		$query = "UPDATE scheduledmeeting_tbl SET schedDay = '$meetingday', schedStartTime = '$starttime', schedEndTime = '$endtime', schedPlace = '$meetingplace' WHERE schedID = ".getLeaderSchedID($_SESSION['userid']);
		mysqli_query($conn, $query);
		mysqli_close($conn);
	}
?>