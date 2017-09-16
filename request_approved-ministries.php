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

		$query = "SELECT budget, ministryHeadID, ministryPicturePath, ministryName, ministryDescription, schedDate, schedDay, schedStartTime, schedEndTime, schedPlace, schedStatus, remarks FROM ministrydetails_tbl LEFT OUTER JOIN budgetdetails_tbl ON ministrydetails_tbl.budgetID = budgetdetails_tbl.budgetID LEFT OUTER JOIN scheduledmeeting_tbl ON ministrydetails_tbl.schedID = scheduledmeeting_tbl.schedID WHERE ministryID = $id";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$headID = $row["ministryHeadID"];
				$picturepath = $row["ministryPicturePath"];
				$name = $row["ministryName"];
				$description = $row["ministryDescription"];
				$date = date("j F, Y", strtotime($row["schedDate"]));
				$weekly = $row["schedDay"];
				$starttime = date("h:i A", strtotime($row["schedStartTime"]));;
				$endtime = date("h:i A", strtotime($row["schedEndTime"]));
				$venue = $row["schedPlace"];
				$schedstatus = $row["schedStatus"];
				$array = array("headID"=>$headID, "picturepath"=>$picturepath, "name"=>$name, "description"=>$description, "date"=>$date, "weekly"=>$weekly, "starttime"=>$starttime, "endtime"=>$endtime, "venue"=>$venue, "schedstatus"=>$schedstatus);
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
		$picture_flag = $_FILES["MinistryPicture"]["name"] == "";
		$picturepath_flag = $_POST["MinistryPictureName"] == "";
		$flag = false;
		if($picture_flag && $picturepath_flag) {
			$target_file = $target_dir.$default_pic;
			$flag = true;
		}
		else {
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
		}

		if($confirmUpload) {
			if(!$flag)
				move_uploaded_file($_FILES["MinistryPicture"]["tmp_name"], $target_file);
			// fetch data from form
			$id = $_POST["ministryID"];
			$ministryname = addSlashes($_POST["MinistryName"]);
			$ministrydesc = addSlashes($_POST["MinistryDesc"]);
			$ministrypicturepath = $target_file;
			$ministryschedstatus = $_POST["MeetingStatus"];
			if($ministryschedstatus == "Weekly") 
				$weekly = $_POST["WeeklyDay"];
			else
				$meetingdate =  date("Y-m-d", strtotime($_POST["MeetingDate"]));
			$starttime = date("H:i:s", strtotime($_POST["MinistryTime1"]));
			$endtime = date("H:i:s", strtotime($_POST["MinistryTime2"]));
			$venue = addSlashes($_POST["MinistryVenue"]);
			$dateEntry = date("Y-m-d"); // for budget details

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			if($ministryschedstatus == "Weekly") {
				$sql_schedule = "UPDATE scheduledmeeting_tbl SET schedDay = '$weekly', schedPlace = '$venue', schedStartTime = '$starttime', schedEndtime = '$endtime', schedStatus = 1 WHERE schedID = ".getMinistrySchedID($id);
			}
			else {
				$sql_schedule = "UPDATE scheduledmeeting_tbl SET schedDate = '$meetingdate', schedPlace = '$venue', schedStartTime = '$starttime', schedEndtime = '$endtime', schedStatus = 0 WHERE schedID = ".getMinistrySchedID($id);
			}

			mysqli_query($conn, $sql_schedule);

			$sql_propose_ministry = "UPDATE ministrydetails_tbl SET ministryPicturePath = '$ministrypicturepath', ministryName = '$ministryname', ministryDescription = '$ministrydesc' WHERE ministryID = $id";
			mysqli_query($conn, $sql_propose_ministry);

			mysqli_close($conn);
		}
	}

	function removeExtension($filename) {
		return preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
	}
?>