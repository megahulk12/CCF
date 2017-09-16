<?php
	include('session.php');
	include('globalfunctions.php');
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dbccf";

	if(isset($_POST["id"]))
		$id = $_POST["id"];

	if(isset($id)) {
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT budget, eventHeadID, eventPicturePath, eventName, eventDescription, eventStartDay, eventEndDay, eventWeekly, eventStartTime, eventEndTime, eventVenue, remarks, eventSchedStatus FROM eventdetails_tbl LEFT OUTER JOIN budgetdetails_tbl ON eventdetails_tbl.budgetID = budgetdetails_tbl.budgetID WHERE eventID = $id";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$budget = $row["budget"];
				$headID = $row["eventHeadID"];
				$picturepath = $row["eventPicturePath"];
				$name = $row["eventName"];
				$description = $row["eventDescription"];
				$startday = date("j F, Y", strtotime($row["eventStartDay"]));
				$endday = date("j F, Y", strtotime($row["eventEndDay"]));
				$weekly = $row["eventWeekly"];
				$starttime = date("h:i A", strtotime($row["eventStartTime"]));;
				$endtime = date("h:i A", strtotime($row["eventEndTime"]));
				$venue = $row["eventVenue"];
				$remarks = $row["remarks"];
				$schedstatus = $row["eventSchedStatus"];
				$array = array("budget"=>$budget, "headID"=>$headID, "picturepath"=>$picturepath, "name"=>$name, "description"=>$description, "startday"=>$startday, "endday"=>$endday, "weekly"=>$weekly, "starttime"=>$starttime, "endtime"=>$endtime, "venue"=>$venue, "remarks"=>$remarks, "schedstatus"=>$schedstatus);
				echo json_encode($array);
			}
		}
	}
	else {
			
		$confirmUpload = true;
		$target_dir = "uploads/".$_SESSION['userid'].'/';
		if(!is_dir($target_dir)) {
			mkdir($target_dir);
		}
		$default_pic = "CCF Logos5.png";
		copy("resources/CCF Logos5.png", $target_dir.$default_pic);
		$picture_flag = $_FILES["EventPicture"]["name"] == "";
		$picturepath_flag = $_POST["EventPictureName"] == "";
		$flag = false;
		if($picture_flag && $picturepath_flag) {
			$target_file = $target_dir.$default_pic;
			$flag = true;
		}
		else {
			$target_file = $target_dir.basename($_FILES["EventPicture"]["name"]);
			$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

			if(file_exists($target_file)) // check if image exists
				$target_file = getEventPicturePath($_POST["eventID"]);
			else
				$target_file = $target_dir.removeExtension(basename($_FILES["EventPicture"]["name"])).uniqid().'.'.$imageFileType;

			if($_FILES["EventPicture"]["size"] > 20000000) { // limits the size of image
				echo "File is too large.";
				$confirmUpload = false;
			}
		}

		if($confirmUpload) {
			// fetch data from form
			if(!$flag)
				move_uploaded_file($_FILES["EventPicture"]["tmp_name"], $target_file);
			$id = $_POST["eventID"];
			$eventname = addSlashes($_POST["EventName"]);
			$eventdesc = addSlashes($_POST["EventDesc"]);
			$eventpicturepath = $target_file;
			$eventschedstatus = $_POST["EventSchedStatus"];
			if($eventschedstatus == "SingleDay") {
				$eventschedstatus = 0;
				$eventstartdate = date("Y-m-d", strtotime($_POST["EventDateStart"]));
			}
			else if($eventschedstatus == "MultipleDay") {
				$eventschedstatus = 1;
				$eventstartdate = date("Y-m-d", strtotime($_POST["EventDateStart"]));
				$eventenddate = date("Y-m-d", strtotime($_POST["EventDateEnd"]));
			}
			else if($eventschedstatus == "Weekly") {
				$eventschedstatus = 2;
				$eventstartdate = date("Y-m-d", strtotime($_POST["EventDateStart"]));
				$eventenddate = date("Y-m-d", strtotime($_POST["EventDateEnd"]));
				$weekly = $_POST["WeeklyDay"];
			}
			$starttime = date("H:i:s", strtotime($_POST["EventTime1"]));
			$endtime = date("H:i:s", strtotime($_POST["EventTime2"]));
			$venue = addSlashes($_POST["EventVenue"]);
			$budget = $_POST["Budget"];
			$dateEntry = date("Y-m-d"); // for budget details
			$remarks = addSlashes($_POST["Remarks"]); // put addSlashes to escape apostrophes

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql_budget = "UPDATE budgetdetails_tbl SET budget = '$budget', dateEntry = '$dateEntry' WHERE budgetID = ".getBudgetID($id);
			mysqli_query($conn, $sql_budget);

			if($eventschedstatus == 0) {
			$sql_propose_event = "UPDATE eventdetails_tbl SET budgetID = ".getBudgetID($id).", eventHeadID = ".$_SESSION['userid'].", eventPicturePath = '$eventpicturepath', eventName = '$eventname', eventDescription = '$eventdesc', eventStartDay = '$eventstartdate', eventStartTime = '$starttime', eventEndTime = '$endtime', eventVenue = '$venue', remarks = '$remarks', eventSchedStatus = $eventschedstatus WHERE eventID = ".$id;
			}
			else if($eventschedstatus == 1) {
			$sql_propose_event = "UPDATE eventdetails_tbl SET budgetID = ".getBudgetID($id).", eventHeadID = ".$_SESSION['userid'].", eventPicturePath = '$eventpicturepath', eventName = '$eventname', eventDescription = '$eventdesc', eventStartDay = '$eventstartdate', eventEndDay = '$eventenddate', eventStartTime = '$starttime', eventEndTime = '$endtime', eventVenue = '$venue', remarks = '$remarks', eventSchedStatus = $eventschedstatus WHERE eventID = ".$id;
			}
			else if($eventschedstatus == 2) {
			$sql_propose_event = "UPDATE eventdetails_tbl SET budgetID = ".getBudgetID($id).", eventHeadID = ".$_SESSION['userid'].", eventPicturePath = '$eventpicturepath', eventName = '$eventname', eventDescription = '$eventdesc', eventStartDay = '$eventstartdate', eventEndDay = '$eventenddate', eventWeekly = '$weekly', eventStartTime = '$starttime', eventEndTime = '$endtime', eventVenue = '$venue', remarks = '$remarks', eventSchedStatus = $eventschedstatus WHERE eventID = ".$id;
			}

			mysqli_query($conn, $sql_propose_event);
			mysqli_close($conn);
		}
	}

	function removeExtension($filename) {
		return preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
	}
?>