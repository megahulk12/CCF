<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dbccf";
	if(isset($_POST['id'])) {
		$id = $_POST["id"];

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
				$startday = $row["eventStartDay"];
				$endday = $row["eventEndDay"];
				$weekly = $row["eventWeekly"];
				$starttime = $row["eventStartTime"];
				$endtime = $row["eventEndTime"];
				$venue = $row["eventVenue"];
				$remarks = $row["remarks"];
				$schedstatus = $row["eventSchedStatus"];
				$array = array("budget"=>$budget, "fullname"=>$fullname, "picturepath"=>$picturepath, "name"=>$name, "description"=>$description, "startday"=>$startday, "endday"=>$endday, "weekly"=>$weekly, "starttime"=>$starttime, "endtime"=>$endtime, "venue"=>$venue, "remarks"=>$remarks, "schedstatus"=>$schedstatus);
				echo json_encode($array);
			}
		}
	}
?>