<?php
	include("session.php");
?>
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
		$query = "SELECT dgleader FROM discipleshipgroupmembers_tbl INNER JOIN discipleshipgroup_tbl ON memberID = dgleader WHERE memberID = ".$memberID;
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$dgleader = $row["dgleader"];
			}
		}
		return $dgleader;
	}
?>