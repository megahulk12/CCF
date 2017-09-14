<?php
	if(isset($_GET['id'])) {
		include("session.php");
		include("globalfunctions.php");
		$id = $_GET['id'];

		/** Include PHPExcel */
		require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

		// Create new PHPExcel object
		$excel = new PHPExcel();

		// Add some data; generate columns
		$columns = array("Ministry Name", "Ministry Description", "Date", "Day Interval", "Start Time", "End Time", "Location", "Remarks", "Schedule Status");
		$column_excel = array("A", "B", "C", "D", "E", "F", "G", "H", "I");
		for($i = 0; $i < count($columns); $i++) {
			$excel->setActiveSheetIndex(0)
		            ->setCellValue($column_excel[$i].'1', $columns[$i]);
		    // bold all column headers and align them to center
		    $excel->getActiveSheet()->getStyle($column_excel[$i].'1')->getFont()->setBold(true);
	    	$excel->getActiveSheet()->getStyle($column_excel[$i].'1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		}

		// establish connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_ministry_details = "SELECT ministryName, ministryDescription, schedDate, schedDay, schedStartTime, schedEndTime, schedPlace, remarks, schedStatus FROM ministrydetails_tbl LEFT OUTER JOIN scheduledmeeting_tbl ON ministrydetails_tbl.schedID = scheduledmeeting_tbl.schedID WHERE ministryID = $id";
		$result = mysqli_query($conn, $sql_ministry_details);
		if(mysqli_num_rows($result) > 0) {
			// initialization states
			$y = 2;
			$strlen = array(strlen($columns[0]), strlen($columns[1]), strlen($columns[2]), strlen($columns[3]), strlen($columns[4]), strlen($columns[5]), strlen($columns[6]), strlen($columns[7]), strlen($columns[8]));
			while($row = mysqli_fetch_assoc($result)) {
				$name = $row["ministryName"];
				$description = $row["ministryDescription"];
				$date = date("F j, Y", strtotime($row["schedDate"]));
				$weekly = $row["schedDay"];
				$starttime = date("g:i A", strtotime($row["schedStartTime"]));
				$endtime = date("g:i A", strtotime($row["schedEndTime"]));
				$venue = $row["schedPlace"];
				$remarks = $row["remarks"];
				$schedstatus = $row["schedStatus"];


				if($schedstatus == 0)
					$schedstatus = "Custom Meeting";
				else if($schedstatus == 1)
					$schedstatus = "Weekly Meeting";

				// stores max length of string of each value per column
				if(strlen($name) > $strlen[0]) $strlen[0] = strlen($name);
				//if(strlen($description) > $strlen[1]) $strlen[1] = strlen($description);
				if(strlen($date) > $strlen[2]) $strlen[2] = strlen($date);
				if(strlen($weekly) > $strlen[3]) $strlen[3] = strlen($weekly);
				if(strlen($starttime) > $strlen[4]) $strlen[4] = strlen($starttime);
				if(strlen($endtime) > $strlen[5]) $strlen[5] = strlen($endtime);
				if(strlen($venue) > $strlen[6]) $strlen[6] = strlen($venue);
				//if(strlen($remarks) > $strlen[7]) $strlen[7] = strlen($remarks);
				if(strlen($schedstatus) > $strlen[8]) $strlen[8] = strlen($schedstatus);

				$data = array($name, $description, $date, $weekly, $starttime, $endtime, $venue, $remarks, $schedstatus);
				for($i = 0; $i < count($data); $i++) {
					$excel->getActiveSheet()
				          ->setCellValue($column_excel[$i].($y), $data[$i]);
				}
				$y++;
			}

			// set width per column based on the maximum length among each of its values
			for($col = 'A', $i = 0; $col <= $column_excel[count($column_excel) - 1]; $col++, $i++) {
				$excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(false);
				$excel->getActiveSheet()->getColumnDimension($col)->setWidth($strlen[$i] + 5);
				if($col == 'B' || $col == 'H') { // this is for the columns who are medium text or long text
					$excel->getActiveSheet()->getStyle($col)->getAlignment()->setWrapText(true);
				}
			}
		}

		// Rename worksheet
		$excel->getActiveSheet()->setTitle("Event Details");

		$members = $excel->createSheet(1);
		$excel->setActiveSheetIndex(1);

		// Add some data; generate columns
		$columns = array("Full Name", "Nick Name", "Birthdate", "Date Joined", "Gender", "Citizenship", "Civil Status", "Mobile Number", "Email Address", "Profession", "Home Address", "Landline", "Company", "Company Contact Number", "Company Address", "School", "School Contact Number", "School Address", "Name of Spouse", "Mobile Number of Spouse", "Birthdate of Spouse");
		$column_excel = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U");
		for($i = 0; $i < count($columns); $i++) {
			$members
		            ->setCellValue($column_excel[$i].'1', $columns[$i]);
		    // bold all column headers and align them to center
		    $excel->getActiveSheet()->getStyle($column_excel[$i].'1')->getFont()->setBold(true);
	    	$excel->getActiveSheet()->getStyle($column_excel[$i].'1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		}

		$sql_list_of_participants_members = "SELECT ministryparticipation_tbl.memberID AS membID, CONCAT_WS(' ', firstName, lastName) AS fullname, nickName, birthdate, dateParticipation, gender, citizenship, civilStatus, contactNum, emailAd, occupation, homeAddress, homePhoneNumber, companyName, companyContactNum, companyAddress, schoolName, schoolContactNum, schoolAddress, spouseName, spouseContactNum, spouseBirthdate FROM member_tbl LEFT OUTER JOIN ministryparticipation_tbl ON member_tbl.memberID = ministryparticipation_tbl.memberID LEFT OUTER JOIN companydetails_tbl ON member_tbl.companyID = companydetails_tbl.companyID LEFT OUTER JOIN schooldetails_tbl ON member_tbl.schoolID = schooldetails_tbl.schoolID LEFT OUTER JOIN spousedetails_tbl ON member_tbl.spouseID = spousedetails_tbl.spouseID WHERE ministryID = $id ORDER BY fullname ASC;";
		$result = mysqli_query($conn, $sql_list_of_participants_members);

		if(mysqli_num_rows($result) > 0) {
			//  initialization states
			$y = 2;
			$strlen = array(strlen($columns[0]), strlen($columns[1]), strlen($columns[2]), strlen($columns[3]), strlen($columns[4]), strlen($columns[5]), strlen($columns[6]), strlen($columns[7]), strlen($columns[8]), strlen($columns[9]), strlen($columns[10]), strlen($columns[11]), strlen($columns[12]), strlen($columns[13]), strlen($columns[14]), strlen($columns[15]), strlen($columns[16]), strlen($columns[17]), strlen($columns[18]), strlen($columns[19]), strlen($columns[20]));
			while($row = mysqli_fetch_assoc($result)) {
				$membID = $row["membID"];
				$fullname = $row["fullname"];
				$nname = $row["nickName"];
				$birthdate = date("F j, Y", strtotime($row["birthdate"]));
				$dateparticipation = date("F j, Y", strtotime($row["dateParticipation"]));
				$gender = $row["gender"];
				if($gender == 0) $gender = "Male";
				else $gender = "Female";
				$citizenship = $row["citizenship"];
				$civilstatus = $row["civilStatus"];
				$contactnum = $row["contactNum"];
				$emailad = $row["emailAd"];
				$occupation = $row["occupation"];
				$haddress = $row["homeAddress"];
				$hphonenumber = $row["homePhoneNumber"];
				$cname = $row["companyName"];
				$ccontactnum = $row["companyContactNum"];
				$caddress = $row["companyAddress"];
				$sname = $row["schoolName"];
				$scontactnum = $row["schoolContactNum"];
				$saddress = $row["schoolAddress"];
				$spname = $row["spouseName"];
				$spcontactnum = $row["spouseContactNum"];
				$spbirthdate = date("F j, Y", strtotime($row["spouseBirthdate"]));

				// stores max length of string of each value per column
				if(strlen($fullname) > $strlen[0]) $strlen[0] = strlen($fullname);
				if(strlen($nname) > $strlen[1]) $strlen[1] = strlen($nname);
				if(strlen($birthdate) > $strlen[2]) $strlen[2] = strlen($birthdate);
				if(strlen($dateparticipation) > $strlen[3]) $strlen[3] = strlen($dateparticipation);
				if(strlen($gender) > $strlen[4]) $strlen[4] = strlen($gender);
				if(strlen($citizenship) > $strlen[5]) $strlen[5] = strlen($citizenship);
				if(strlen($civilstatus) > $strlen[6]) $strlen[6] = strlen($civilstatus);
				if(strlen($contactnum) > $strlen[7]) $strlen[7] = strlen($contactnum);
				if(strlen($emailad) > $strlen[8]) $strlen[8] = strlen($emailad);
				if(strlen($occupation) > $strlen[9]) $strlen[9] = strlen($occupation);
				if(strlen($haddress) > $strlen[10]) $strlen[10] = strlen($haddress);
				if(strlen($hphonenumber) > $strlen[11]) $strlen[11] = strlen($hphonenumber);
				if(strlen($cname) > $strlen[12]) $strlen[12] = strlen($cname);
				if(strlen($ccontactnum) > $strlen[13]) $strlen[13] = strlen($ccontactnum);
				if(strlen($caddress) > $strlen[14]) $strlen[14] = strlen($caddress);
				if(strlen($sname) > $strlen[15]) $strlen[15] = strlen($sname);
				if(strlen($scontactnum) > $strlen[16]) $strlen[16] = strlen($scontactnum);
				if(strlen($saddress) > $strlen[17]) $strlen[17] = strlen($saddress);
				if(strlen($spname) > $strlen[18]) $strlen[18] = strlen($spname);
				if(strlen($spcontactnum) > $strlen[19]) $strlen[19] = strlen($spcontactnum);
				if(strlen($spbirthdate) > $strlen[20]) $strlen[20] = strlen($spbirthdate);

				$data = array($fullname, $nname, $birthdate, $dateparticipation, $gender, $citizenship, $civilstatus, $contactnum, $emailad, $occupation, $haddress, $hphonenumber, $cname, $ccontactnum, $caddress, $sname, $scontactnum, $saddress, $spname, $spcontactnum, $spbirthdate);
				for($i = 0; $i < count($data); $i++) {
					$members
				          ->setCellValue($column_excel[$i].($y), $data[$i]);
				}
				$y++;
			}

			// set width per column based on the maximum length among each of its values
			for($col = 'A', $i = 0; $col <= $column_excel[count($column_excel) - 1]; $col++, $i++) {
				$excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(false);
				$excel->getActiveSheet()->getColumnDimension($col)->setWidth($strlen[$i] + 5);
			}
		}

		// Rename worksheet
		$members->setTitle("Ministry Members");

		mysqli_close($conn);

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$excel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel2007)
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$name.' Summary Report.xlsx"');
		header('Cache-Control: max-age=1');

		$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$objWriter->save('php://output');	
		exit;
	}
?>