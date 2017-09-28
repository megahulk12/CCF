<?php
	include("session.php");
	include("globalfunctions.php");

	if(isset($_POST["revise"])) {
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
		$start_agebracket = $_POST["startAgeBracket"];
		$end_agebracket = $_POST["endAgeBracket"];
		$agebracket = $start_agebracket.'-'.$end_agebracket;
		$meetingday = $_POST["MeetingDay"];
		$meetingplace = $_POST["MeetingPlace"];
		$starttime = date("H:i:s", strtotime($_POST["timepicker1opt1"]));
		$endtime = date("H:i:s", strtotime($_POST["timepicker1opt2"]));

		$query = "UPDATE endorsement_tbl SET baptismalDate = '$baptismaldate', baptismalPlace = '$baptismalplace', ageBracket = '$agebracket', eschedDay = '$meetingday', eschedStartTime = '$starttime', eschedEndTime = '$endtime', eschedPlace = '$meetingplace', edgroupType = $dgrouptype WHERE endorsementID = ".getEndorsementID($_SESSION['userid']);
		mysqli_query($conn, $query);
		mysqli_close($conn);
	}
	else {
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT baptismalDate, baptismalPlace, ageBracket, eschedDay, eschedStartTime, eschedEndTime, eschedPlace, edgroupType FROM endorsement_tbl WHERE endorsementID = ".getEndorsementID($_SESSION['userid']);
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$baptismaldate = date("j F, Y", strtotime($row["baptismalDate"]));
				$baptismalplace = $row["baptismalPlace"];
				$agebracket = $row["ageBracket"];
				$day = $row["eschedDay"];
				$starttime = date("h:i A", strtotime($row["eschedStartTime"]));
				$endtime= date("h:i A", strtotime($row["eschedEndTime"]));
				$place = $row["eschedPlace"];
				$dgrouptype = $row["edgroupType"];
				if($dgrouptype == 0) $dgrouptype = "Youth";
				else if($dgrouptype == 1) $dgrouptype = "Singles";
				else if($dgrouptype == 2) $dgrouptype = "Single Parent";
				else if($dgrouptype == 3) $dgrouptype = "Married";
				else if($dgrouptype == 4) $dgrouptype = "Couples";
				else if($dgrouptype == 5) $dgrouptype = "All";
				$array = array("baptismaldate"=>$baptismaldate, "baptismalplace"=>$baptismalplace, "agebracket"=>$agebracket, "day"=>$day, "starttime"=>$starttime, "endtime"=>$endtime, "place"=>$place, "dgrouptype"=>$dgrouptype);
				echo json_encode($array);
			}
		}
		mysqli_close($conn);
	}

?>