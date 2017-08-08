<?php
	if(isset($_GET['report'])) {
		include("session.php");
		include("globalfunctions.php");
		require_once 'Spreadsheet/Excel/Writer.php';

		$workbook = new Spreadsheet_Excel_Writer('CCF Davao Dgroup Management Database.xlsx');

		$worksheet =& $workbook->addWorksheet("Dgroup Leader's Information");

		// generate columns
		$format_bold =& $workbook->addFormat();
		$format_bold->setBold();
		$columns = array("Name", "Civil Status", "Profession", "Contact Nos.", "Email", "Birthdate");
		for($i = 0; $i < count($columns); $i++) {
			$worksheet->write(0, $i, $columns[$i], $format_bold);
		}

		// connection variables
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";

		// establish connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_dleader_information = "SELECT CONCAT(firstName, ' ', lastName) AS fullname, civilStatus, occupation, contactNum, emailAd, birthdate FROM discipleshipgroup_tbl LEFT OUTER JOIN member_tbl ON dgleader = memberID;";
		$result = mysqli_query($conn, $sql_dleader_information);

		if(mysqli_num_rows($result) > 0) {
			$y = 0;
			while($row = mysqli_fetch_assoc($result)) {
				$fullname = $row["fullname"];
				$civilstatus = $row["civilStatus"];
				$occupation = $row["occupation"];
				$contactnum = $row["contactNum"];
				$emailad  = $row["emailAd"];
				$birthdate = $row["birthdate"];
				$columns = array($fullname, $civilStatus, $occupation, $contactNum, $emailAd, $birthdate);
				for($x = 0; $x < count($row); $x++) {
					$worksheet->write($y, $x, $columns[$x]);
				}
				$y++;
			}
		}

		$workbook->close();
	}
?>