<?php
	// code for proposing events and ministries
	include('globalfunctions.php');
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dbccf";

	//if(isset($_POST['propose'])) {
		// Image handling
		$confirmUpload = true;
		$target_dir = "uploads/";
		$target_file = $target_dir.basename($_FILES["EventPicture"]["name"]);
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		if(file_exists($target_file)) { // check if image exists
			echo "File already exists.";
			$confirmUpload = false;
		}

		if($_FILES["EventPicture"]["size"] > 20000000) { // limits the size of image
			echo "File is too large.";
			$confirmUpload = false;
		}

		if($confirmUpload) {
			move_uploaded_file($_FILES["EventPicture"]["tmp_name"], $target_file);
		}
		
		
		// fetch data from form
		$eventname = $_POST["EventName"];
		$eventdesc = $_POST["EventDesc"];
		$eventhead = $_POST["EventHeadName"];
		$eventpicturepath = $target_dir.$_POST["EventPictureName"];
		$eventschedstatus = $_POST["EventSchedStatus"];
		if($eventschedstatus == "SingleDay") $eventschedstatus = 0;
		else if($eventschedstatus == "Weekly") $eventschedstatus = 1;
		$eventstartdate = date("Y-m-d", strtotime($_POST["EventDateStart"]));
		$eventenddate = date("Y-m-d", strtotime($_POST["EventDateEnd"]));
		$weekly = $_POST["WeeklyDay"];
		$starttime = date("H:i:s", strtotime($_POST["EventTime1"]));
		$endtime = date("H:i:s", strtotime($_POST["EventTime2"]));
		$venue = $_POST["EventVenue"];
		$budget = $_POST["Budget"];
		$dateEntry = date("Y-m-d"); // for budget details
		$remarks = $_POST["Remarks"];

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_budget = "INSERT INTO budgetdetails_tbl(budget, dateEntry) VALUES('$budget', '$dateEntry')";

		$sql_propose_event = "INSERT INTO eventdetails_tbl(budgetID, eventHeadID, eventPicturePath, eventName, eventDescription, eventStartDay, eventEndDay, eventStartTime, eventEndTime, eventVenue, remarks, eventSchedStatus) VALUES(".getCurrentBudgetID().", $eventhead, '$eventpicturepath', '$eventname', '$eventdesc', '$eventstartdate', '$eventenddate', '$starttime', '$endtime', '$venue', '$remarks', $eventschedstatus)";

		mysqli_query($conn, $sql_budget);
		mysqli_query($conn, $sql_propose_event);
		mysqli_close($conn);
	//}

	if(isset($_POST['id'])) {
		$array = array('a'=>'a');
		echo json_encode($array);
	}
?>