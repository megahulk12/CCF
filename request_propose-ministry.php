<?php
	// code for proposing events and ministries
	include('session.php');
	include('globalfunctions.php');
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dbccf";

	//if(isset($_POST['propose'])) {
		// Image handling
		$confirmUpload = true;
		$target_dir = "uploads/".$_SESSION['userid'].'/';
		if(!is_dir($target_dir)) {
			mkdir($target_dir);
		}
		$target_file = $target_dir.basename($_FILES["MinistryPicture"]["name"]);
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		if(file_exists($target_file)) // check if image exists
			$target_file = getMinistryPicturePath($_POST["ministryID"]);
		else
			$target_file = $target_dir.removeExtension(basename($_FILES["MinistryPicture"]["name"])).uniqid().'.'.$imageFileType;

		if($_FILES["MinistryPicture"]["size"] > 20000000) { // limits the size of image
			echo "File is too large.";
			$confirmUpload = false;
		}

		if($confirmUpload) {
			move_uploaded_file($_FILES["MinistryPicture"]["tmp_name"], $target_file);
			// fetch data from form
			$ministryname = addSlashes($_POST["MinistryName"]);
			$ministrydesc = addSlashes($_POST["MinistryDesc"]);
			$ministrypicturepath = $target_file;
			$ministryschedstatus = $_POST["MeetingStatus"];
			$meetingdate =  date("Y-m-d", strtotime($_POST["MeetingDate"]));
			if($ministryschedstatus == "Weekly") 
				$weekly = $_POST["WeeklyDay"];
			$starttime = date("H:i:s", strtotime($_POST["MinistryTime1"]));
			$endtime = date("H:i:s", strtotime($_POST["MinistryTime2"]));
			$venue = addSlashes($_POST["MinistryVenue"]);
			$budget = $_POST["Budget"];
			$dateEntry = date("Y-m-d"); // for budget details
			$remarks = addSlashes($_POST["Remarks"]); // put addSlashes to escape apostrophes

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql_budget = "INSERT INTO budgetdetails_tbl(budget, dateEntry, budgetType) VALUES('$budget', '$dateEntry', 1)";
			mysqli_query($conn, $sql_budget);


			if($ministryschedstatus == "Weekly") {
				$sql_schedule = "INSERT INTO scheduledmeeting_tbl(schedDate, schedDay, schedPlace, schedStartTime, schedEndtime, schedType) VALUES('$meetingdate', '$weekly', '$venue', '$starttime', '$endtime', 1);";
			}
			else {
				$sql_schedule = "INSERT INTO scheduledmeeting_tbl(schedDate, schedPlace, schedStartTime, schedEndtime, schedType) VALUES('$meetingdate', '$venue', '$starttime', '$endtime', 1);";
			}

			mysqli_query($conn, $sql_schedule);

			$sql_propose_ministry = "INSERT INTO ministrydetails_tbl(budgetID, ministryHeadID, schedID, ministryPicturePath, ministryName, ministryDescription, remarks) VALUES(".getCurrentBudgetID().", ".$_SESSION['userid'].", ".getSchedID().", '$ministrypicturepath', '$ministryname', '$ministrydesc', '$remarks')";
			mysqli_query($conn, $sql_propose_ministry);

			$sql_all_admins = "SELECT memberID FROM member_tbl WHERE memberType = 5";
			$result = mysqli_query($conn, $sql_all_admins);
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$memberid = $row["memberID"];
					$notificationdesc = "You have a new ministry request - $ministryname.";
					$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, ministryID, notificationDesc, notificationType, request) VALUES(".$_SESSION["userid"].", $memberid, ".getCurrentMinistryID().", '$notificationdesc', 2, 1);";
					mysqli_query($conn, $sql_notifications);
				}
			}

			mysqli_close($conn);

		}
	//}
	function removeExtension($filename) {
		return preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
	}
?>