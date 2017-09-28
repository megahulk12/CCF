<?php
	include("session.php");
	include("globalfunctions.php");

	if(isset($_SESSION['userid']) && isset($_POST['dgroup'])) {
		$id = $_SESSION["userid"];

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT civilStatus FROM discipleshipgroupmembers_tbl INNER JOIN discipleshipgroup_tbl ON discipleshipgroupmembers_tbl.dgroupID = discipleshipgroup_tbl.dgroupID INNER JOIN member_tbl ON discipleshipgroupmembers_tbl.memberID = member_tbl.memberID WHERE dgroupmemberID != ".getDgroupMemberID($_SESSION['userid'])." AND discipleshipgroup_tbl.dgleader = ".$_SESSION['userid'];
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			$data = "";
			while($row = mysqli_fetch_assoc($result)) {
				$civilstatus = $row["civilStatus"];
				$data .= $civilstatus." ";
			}
			echo $data;
		}
		mysqli_close($conn);
	}
	else {
		$id = $_SESSION["userid"];

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT civilStatus FROM member_tbl WHERE memberID = $id";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$civilstatus = $row["civilStatus"];
				echo $civilstatus;
			}
		}
		mysqli_close($conn);
	}

?>