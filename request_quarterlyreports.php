<?php
	/*
	*	NOTE: Fatal error: Allowed memory size of 134217728 bytes exhausted (tried to allocate 72 bytes) in C:\wamp64\www\CCF\Classes\PHPExcel\Cell\DefaultValueBinder.php on line 88
	*	fix in the path
	*/


	include("session.php");
	include("globalfunctions.php");

	/** Include PHPExcel */
	require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

	// Create new PHPExcel object
	$excel = new PHPExcel();

	// Add some data; generate columns
	$columns = array("Name", "Civil Status", "Profession", "Contact Nos.", "Email", "Birthdate");
	$column_excel = array("A", "B", "C", "D", "E", "F");
	for($i = 0; $i < count($columns); $i++) {
	$excel->setActiveSheetIndex(0)
            ->setCellValue($column_excel[$i].'1', $columns[$i]);
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
		$y = 1;
		while($row = mysqli_fetch_assoc($result)) {
			$fullname = $row["fullname"];
			$civilstatus = $row["civilStatus"];
			$occupation = $row["occupation"];
			$contactnum = $row["contactNum"];
			$emailad  = $row["emailAd"];
			$birthdate = $row["birthdate"];
			$data = array($fullname, $civilstatus, $occupation, $contactnum, $emailad, $birthdate);
			for($i = 0; $i < count($data); $i++) {
				$excel->getActiveSheet()
			          ->setCellValue($column_excel[$i].($y+1), $data[$i]);
			}
			$y++;
		}
	}

	mysqli_close($conn);

	// Rename worksheet
	$excel->getActiveSheet()->setTitle("Dgroup Leader's Information");

	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$excel->setActiveSheetIndex(0);

	// Redirect output to a client’s web browser (Excel2007)
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="CCF Davao Dgroup Management Database.xlsx"');
	header('Cache-Control: max-age=1');

	$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	$objWriter->save('php://output');	
	exit;
?>