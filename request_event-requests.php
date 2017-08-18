<?php
	include('session.php');
	include('globalfunctions.php');
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dbccf";
	$id = $_POST["id"];

	if(isset($id)) {
		/* for new event notif purposes
		// set to seen the pending events that have recently been added
		setSeenEventRequest($id);
		*/

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT budget, CONCAT_WS(' ', firstName, lastName) AS fullname, eventPicturePath, eventName, eventDescription, eventStartDay, eventEndDay, eventWeekly, eventStartTime, eventEndTime, eventVenue, remarks, eventSchedStatus FROM eventdetails_tbl LEFT OUTER JOIN budgetdetails_tbl ON eventdetails_tbl.budgetID = budgetdetails_tbl.budgetID LEFT OUTER JOIN member_tbl ON eventHeadID = memberID WHERE eventID = $id";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$budget = $row["budget"];
				$fullname = $row["fullname"];
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
				$array = array("budget"=>$budget, "fullname"=>$fullname, "picturepath"=>$picturepath, "name"=>$name, "description"=>$description, "startday"=>$startday, "endday"=>$endday, "weekly"=>$weekly, "starttime"=>$starttime, "endtime"=>$endtime, "venue"=>$venue, "remarks"=>$remarks, "schedstatus"=>$schedstatus);
				echo json_encode($array);
			}
		}

		mysqli_close($conn);
	}

	if(isset($_POST['notify'])) {
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_notifcations = "INSERT INTO";


		mysqli_close($conn);
	}
?>