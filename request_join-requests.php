<?php
	include('session.php');
	include('globalfunctions.php');
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dbccf";
	$id = $_POST["id"];

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	if(isset($_POST['notify'])) {
		$sql_ministry_participation_notify = "UPDATE ministryparticipation_tbl SET ministryPartStatus = 2 WHERE ministryParticipationID = $id";
		mysqli_query($conn, $sql_ministry_participation_notify);
		$notificationdesc = "You have received some remarks about your request.<br>Remarks: ".addSlashes($_POST['notifvalue']);
		$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, ministryID, ministryParticipationID, notificationDesc, notificationType) VALUES(".$_SESSION['userid'].", ".getMemberIDFromMinistryPart($id).", ".getMinistryIDFromMinistryPart($id).", $id, '$notificationdesc', 1)";
		mysqli_query($conn, $sql_notifications);
		mysqli_close($conn);
	}
	else if(isset($_POST['approve'])) {
		$dateJoined = date("Y-m-d");
		$sql_ministry_participation_approved = "UPDATE ministryparticipation_tbl SET dateParticipation = '$dateJoined', ministryPartStatus = 1 WHERE ministryParticipationID = $id";
		mysqli_query($conn, $sql_ministry_participation_approved);
		$notificationdesc = "You have joined the event ".getMinistryName(getMinistryIDFromMinistryPart($id)).". We hope to see you there and God bless!";
		$sql_notifications = "UPDATE notifications_tbl SET notificationStatus = 2 WHERE ministryParticipationID = ".$id;
		mysqli_query($conn, $sql_notifications);
		$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, ministryID, ministryParticipationID, notificationDesc, notificationType) VALUES(".$_SESSION['userid'].", ".getMemberIDFromMinistryPart($id).", ".getMinistryIDFromMinistryPart($id).", $id, '$notificationdesc', 1)";
		mysqli_query($conn, $sql_notifications);
		mysqli_close($conn);
	}
	else if(isset($id)) {
		$query = "SELECT lastName, firstName, middleName, nickName, birthdate, gender, citizenship, civilStatus, contactNum, emailAd, occupation, homeAddress, homePhoneNumber, companyName, companyContactNum, companyAddress, schoolName, schoolContactNum, schoolAddress, spouseName, spouseContactNum, spouseBirthdate FROM member_tbl LEFT OUTER JOIN companydetails_tbl ON member_tbl.companyID = companydetails_tbl.companyID LEFT OUTER JOIN schooldetails_tbl ON member_tbl.schoolID = schooldetails_tbl.schoolID LEFT OUTER JOIN spousedetails_tbl ON member_tbl.spouseID = spousedetails_tbl.spouseID WHERE memberID = ".getMemberIDFromMinistryPart($id);
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$lname = $row["lastName"];
				$fname = $row["firstName"];
				$mname = $row["middleName"];
				$nname = $row["nickName"];
				$birthdate = date("j F, Y", strtotime($row["birthdate"]));
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
				$spbirthdate = date("j F, Y", strtotime($row["spouseBirthdate"]));
				$array = array("lname"=>$lname, "fname"=>$fname, "mname"=>$mname, "nname"=>$nname, "birthdate"=>$birthdate, "gender"=>$gender, "citizenship"=>$citizenship, "civilstatus"=>$civilstatus, "contactnum"=>$contactnum, "emailad"=>$emailad, "occupation"=>$occupation, "haddress"=>$haddress, "hphonenumber"=>$hphonenumber, "cname"=>$cname, "ccontactnum"=>$ccontactnum, "caddress"=>$caddress, "sname"=>$sname, "scontactnum"=>$scontactnum, "saddress"=>$saddress, "spname"=>$spname, "spcontactnum"=>$spcontactnum, "spbirthdate"=>$spbirthdate);
				echo json_encode($array);
			}
		}

		mysqli_close($conn);
	}
?>