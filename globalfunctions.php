<?php
	function widthRow($rownumber) {
	      return 100/$rownumber;
	}

	function getID($id, $table) {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT $id FROM $table ORDER BY $id DESC LIMIT 1";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$resultID = $row["$id"];
			}
		}
		return $resultID;
	}

	function getDgroupMemberID($memberID) {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT $id FROM $table ORDER BY $id DESC LIMIT 1";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$resultID = $row["$id"];
			}
		}
		return $resultID;
	}

	function getDgroupLeaderID($memberID) {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT dgleader FROM discipleshipgroupmembers_tbl INNER JOIN discipleshipgroup_tbl ON discipleshipgroupmembers_tbl.dgroupID = discipleshipgroup_tbl.dgroupID WHERE memberID = $memberID";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$dgleader = $row["dgleader"];
			}
		}
		return $dgleader;
	}

	function getNotificationDesc($memberID) {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT notificationDesc FROM notification_tbl INNER JOIN member_tbl ON notification_tbl.memberID = member_tbl.memberID WHERE notification_tbl.memberID = ".$memberID;
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$notificationDesc = $row["notificationDesc"];
			}
		}
		return $notificationDesc;
	}

	function getNotificationType($memberID) {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT notificationType FROM notification_tbl INNER JOIN member_tbl ON notification_tbl.memberID = member_tbl.memberID WHERE notification_tbl.memberID = ".$memberID;
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$notificationType = $row["notificationType"];
			}
		}
		return $notificationType;
	}

	function getEndorsementID() {
		// database connection variables
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_endorsement = "SELECT endorsementID FROM endorsement_tbl ORDER BY endorsementID DESC LIMIT 1";
		$result = mysqli_query($conn, $sql_endorsement);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$endorsementID = $row["endorsementID"];
			}
		}
		return $endorsementID;
	}
?>