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
		$y = 2;
		while($row = mysqli_fetch_assoc($result)) {
			$fullname = $row["fullname"];
			$civilstatus = $row["civilStatus"];
			$occupation = $row["occupation"];
			$contactnum = $row["contactNum"];
			$emailad  = $row["emailAd"];
			$birthdate = date("F j, Y", strtotime($row["birthdate"]));
			$data = array($fullname, $civilstatus, $occupation, $contactnum, $emailad, $birthdate);
			for($i = 0; $i < count($data); $i++) {
				$excel->getActiveSheet()
			          ->setCellValue($column_excel[$i].($y), $data[$i]);
			}
			$y++;
		}
	}

	// Rename worksheet
	$excel->getActiveSheet()->setTitle("Dgroup Leader Information");

	// Clone 1st worksheet
	$dgleaderschedules = $excel->createSheet(1);

	// Add some data; generate columns
	$columns = array("Dgroup Leader", "Age Bracket", "Dgroup Type", "Day", "Time", "Place");
	$column_excel = array("A", "B", "C", "D", "E", "F");
	for($i = 0; $i < count($columns); $i++) {
	$dgleaderschedules
            ->setCellValue($column_excel[$i].'1', $columns[$i]);
	}

	$sql_dgroup_schedule = "SELECT CONCAT(firstName, ' ', lastName) AS fullname, ageBracket, gender, dgroupType, schedDay, schedStartTime AS start_time, schedEndTime AS end_time, schedPlace FROM discipleshipgroup_tbl LEFT OUTER JOIN member_tbl ON dgleader = memberID LEFT OUTER JOIN scheduledmeeting_tbl ON discipleshipgroup_tbl.schedID = scheduledmeeting_tbl.schedID;";
	$result = mysqli_query($conn, $sql_dgroup_schedule);

	if(mysqli_num_rows($result) > 0) {
		$y = 2;
		while($row = mysqli_fetch_assoc($result)) {
			// added in database eageBracket in endosement_tbl, and ageBracket in discipleshipgroup_tbl
			$fullname = $row["fullname"];
			$gender = $row["gender"];
			if($gender == 0) $gender = "Men";
			else $gender = "Women";
			$agebracket = $row["ageBracket"];
			$dgrouptype = $row["dgroupType"];
			if($dgrouptype==0) $dgrouptype = "Youth ($gender)";
			else if($dgrouptype==1) $dgrouptype = "Singles ($gender)";
			else if($dgrouptype==2) $dgrouptype = "Single Parents ($gender)";
			else if($dgrouptype==3) $dgrouptype = "Married ($gender)";
			else if($dgrouptype==4) $dgrouptype = "Couples ($gender)";
			$day = $row["schedDay"];
			$start_time = date("g:i A", strtotime($row["start_time"]));
			$end_time = date("g:i A", strtotime($row["end_time"]));
			$time = "$start_time - $end_time";
			$place = $row["schedPlace"];
			$data = array($fullname, $agebracket, $dgrouptype, $day, $time, $place);
			for($i = 0; $i < count($data); $i++) {
				$dgleaderschedules
			          ->setCellValue($column_excel[$i].($y), $data[$i]);
			}
			$y++;
		}
	}

	// Rename worksheet
	$dgleaderschedules->setTitle("Dgroup Leader Schedules");

	// Clone 1st worksheet
	$d12Leaders = $excel->createSheet(2);

	// Add some data; generate columns
	$columns = array("D12 Leader", "Dgroup Leader");
	$column_excel = array("A", "B");
	for($i = 0; $i < count($columns); $i++) {
	$d12Leaders
            ->setCellValue($column_excel[$i].'1', $columns[$i]);
	}	

	$sql_d12Leaders = "SELECT dgleader AS dg12Leader, (SELECT CONCAT_WS(' ', firstName, lastName) AS fullname FROM member_tbl WHERE member_tbl.memberID = dg12Leader) AS dg12LeaderName, discipleshipgroupmembers_tbl.memberID AS dgLeader, CONCAT_WS(' ', firstName, lastName) AS dgLeaderName FROM discipleshipgroup_tbl JOIN discipleshipgroupmembers_tbl ON discipleshipgroup_tbl.dgroupID = discipleshipgroupmembers_tbl.dgroupID JOIN member_tbl ON discipleshipgroupmembers_tbl.memberID = member_tbl.memberID WHERE member_tbl.memberType = (SELECT memberType FROM member_tbl WHERE member_tbl.memberID = dgLeader AND member_tbl.memberType = 2)";
	$result = mysqli_query($conn, $sql_d12Leaders);

	if(mysqli_num_rows($result) > 0) {
		$y = 2;
		while($row = mysqli_fetch_assoc($result)) {
			$d12leadername = $row["dg12LeaderName"];
			$dgleadername = $row["dgLeaderName"];
			$data = array($d12leadername, $dgleadername);
			for($i = 0; $i < count($data); $i++) {
				$d12Leaders
			          ->setCellValue($column_excel[$i].($y), $data[$i]);
			}
			$y++;
		}
	}

	// Rename worksheet
	$d12Leaders->setTitle("D12 Leaders");

	// Clone 1st worksheet
	$membersinfo = $excel->createSheet(3);

	// Add some data; generate columns
	$columns = array("Dgroup Leader", "Last Name", "First Name", "Middle Initial", "Gender", "Civil Status", "Birthdate", "Mobile Number", "Landline", "Email Address", "Member Type");
	$column_excel = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K");
	for($i = 0; $i < count($columns); $i++) {
	$membersinfo
            ->setCellValue($column_excel[$i].'1', $columns[$i]);
	}	

	$sql_membersinfo = "SELECT dgleader AS dgLeader, (SELECT CONCAT_WS(' ', firstName, lastName) AS fullname FROM member_tbl WHERE member_tbl.memberID = dgLeader) AS dgLeaderName, discipleshipgroupmembers_tbl.memberID AS dgMember, lastName, firstName, middleName, gender, civilStatus, birthdate, contactNum, homePhoneNumber, emailAd, memberType FROM discipleshipgroup_tbl JOIN discipleshipgroupmembers_tbl ON discipleshipgroup_tbl.dgroupID = discipleshipgroupmembers_tbl.dgroupID JOIN member_tbl ON discipleshipgroupmembers_tbl.memberID = member_tbl.memberID;";
	$result = mysqli_query($conn, $sql_membersinfo);

	if(mysqli_num_rows($result) > 0) {
		$y = 2;
		while($row = mysqli_fetch_assoc($result)) {
			$dgleadername = $row["dgLeaderName"];
			$lastname = $row["lastName"];
			$firstname = $row["firstName"];
			$middlename = substr($row["middleName"], 0, 1);
			$gender = $row["gender"];
			if($gender == 0) $gender = "Male";
			else $gender = "Female";
			$civilstatus = $row["civilStatus"];
			$birthdate = date("F j, Y", strtotime($row["birthdate"]));
			$contactnum = $row["contactNum"];
			$homephonenumber = $row["homePhoneNumber"];
			$emailad = $row["emailAd"];
			$membertype = $row["memberType"];
			if($membertype == 1) $membertype = "Dgroup Member";
			else if($membertype > 1) $membertype = "Dgroup Leader";
			$data = array($dgleadername, $lastname, $firstname, $middlename, $gender, $civilstatus, $birthdate, $contactnum, $homephonenumber, $emailad, $membertype);
			for($i = 0; $i < count($data); $i++) {
				$membersinfo
			          ->setCellValue($column_excel[$i].($y), $data[$i]);
			}
			$y++;
		}
	}

	// Rename worksheet
	$membersinfo->setTitle("Member's Information");

	mysqli_close($conn);

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