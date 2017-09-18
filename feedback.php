<?php
	include("session.php");
	include("globalfunctions.php");
	if(isset($_POST["feedback"]) && isset($_POST["eventID"])) {
		$id = $_POST["feedback"];
		$eid = $_POST["eventID"];
		$themerate = $_POST["themeRate"];
		$themeremarks = addSlashes($_POST["themeRemarks"]);
		$foodrate = $_POST["foodRate"];
		$foodremarks = addSlashes($_POST["foodRemarks"]);
		$venuerate = $_POST["venueRate"];
		$venueremarks = addSlashes($_POST["venueRemarks"]);

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_feedback = "INSERT INTO feedbackdetails_tbl(memberID, eventID, themeRate, themeRemarks, foodRate, foodRemarks, venueRate, venueRemarks) VALUES(".$_SESSION["userid"].", $eid, $themerate, '$themeremarks', $foodrate, '$foodremarks', $venuerate, '$venueremarks')";
		mysqli_query($conn, $sql_feedback);
		mysqli_close($conn);
	}
	if(isset($_POST["get-feedback"])) {
		$id = $_POST["id"];
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT themeRate, themeRemarks, foodRate, foodRemarks, venueRate, venueRemarks FROM feedbackdetails_tbl WHERE feedbackID = $id";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$themerate = $row["themeRate"];
				$themeremarks = $row["themeRemarks"];
				$foodrate = $row["foodRate"];
				$foodremarks = $row["foodRemarks"];
				$venuerate = $row["venueRate"];
				$venueremarks = $row["venueRemarks"];

				$data = array("themerate"=>$themerate, "themeremarks"=>$themeremarks, "foodrate"=>$foodrate, "foodremarks"=>$foodremarks, "venuerate"=>$venuerate, "venueremarks"=>$venueremarks);
				echo json_encode($data);
			}
		}
		mysqli_close($conn);
	}
?>