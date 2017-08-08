<?php
	include("session.php");
	include("globalfunctions.php");
?>
<?php
	/*
		REMINDERS:
		1. set data-length maxlength to length of sql fields dynamically

	*/
	// database connection variables
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dbccf";

	// ====================UPDATING DATA====================
	if(isset($_POST["submit_cpinfo"])) {
		$lastname = $_POST["Lastname"];
		$firstname = $_POST["Firstname"];
		$middlename = $_POST["Middlename"];
		$nickname = $_POST["Nickname"];
		$birthdate = date("Y-m-d", strtotime($_POST["Birthdate"]));

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_cpinfo = "UPDATE member_tbl SET lastName = '$lastname', firstName = '$firstname', middleName = '$middlename', nickName = '$nickname', birthdate = '$birthdate' WHERE memberID = ".$_SESSION['userid'];
		mysqli_query($conn, $sql_cpinfo);
	}

	if(isset($_POST["submit_coinfo"])) {
		$gender = $_POST["Gender"];
		if ($gender == "Male") {
			$gender = 0;
		}
		else {
			$gender = 1;
		}
		$civilstatus = $_POST["CivilStatus"];
		$citizenship = $_POST["Citizenship"];
		$mobilenumber = $_POST["MobileNumber"];
		$email = $_POST["Email"];
		$profession = $_POST["Profession"];
		$homeaddress = $_POST["HomeAddress"];
		$homephonenumber = $_POST["HomePhoneNumber"];
		$companyname = $_POST["CompanyName"];
		$companyaddress = $_POST["CompanyAddress"];
		$companycontactnum = $_POST["CompanyContactNum"];
		$schoolname = $_POST["SchoolName"];
		$schooladdress = $_POST["SchoolAddress"];
		$schoolcontactnum = $_POST["SchoolContactNum"];
		$spousename = $_POST["SpouseName"];
		$spousemobilenumber = $_POST["SpouseMobileNumber"];
		$spousebirthdate = date("Y-m-d", strtotime($_POST["SpouseBirthdate"]));

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_coinfo = "UPDATE member_tbl SET gender = '$gender', civilStatus = '$civilstatus', citizenship = '$citizenship', contactNum = '$mobilenumber', emailAd = '$email', occupation = '$profession', homeAddress = '$homeaddress', homePhoneNumber = '$homephonenumber' WHERE memberID = ".$_SESSION['userid'];
		$sql_company = "UPDATE companydetails_tbl SET companyName = '$companyname', companyContactNum = '$companycontactnum', companyAddress = '$companyaddress' WHERE companyID = ".$_SESSION['companyID'];
		$sql_school = "UPDATE schooldetails_tbl SET schoolName = '$schoolname', schoolContactNum = '$schoolcontactnum', schoolAddress = '$schooladdress' WHERE schoolID = ".$_SESSION['schoolID'];
		$sql_spouse = "UPDATE spousedetails_tbl SET spouseName = '$spousename', spouseContactNum = '$spousemobilenumber', spouseBirthdate = '$spousebirthdate' WHERE spouseID = ".$_SESSION['spouseID'];
		mysqli_query($conn, $sql_coinfo);
		mysqli_query($conn, $sql_company);
		mysqli_query($conn, $sql_school);
		mysqli_query($conn, $sql_spouse);
	}

	if(isset($_POST["submit_cprefer"])) {
		$language = $_POST["Language"];
		$venue1 = $_POST["Option1Venue"];
		$venue2 = $_POST["Option2Venue"];
		$timepicker1opt1 = date("H:i:s", strtotime($_POST["timepicker1opt1"]));
		$timepicker1opt2 = date("H:i:s", strtotime($_POST["timepicker1opt2"]));
		$timepicker2opt1 = date("H:i:s", strtotime($_POST["timepicker2opt1"]));
		$timepicker2opt2 = date("H:i:s", strtotime($_POST["timepicker2opt2"]));
		$day1 = $_POST["Option1Day"];
		$day2 = $_POST["Option2Day"];
		$receivedChrist = $_POST["receivedChrist"];
		$attendCCF = $_POST["attendCCF"];
		$regularlyAttendsAt = $_POST["regularlyAttendsAt"];

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_cprefer = "UPDATE preferencedetails_tbl SET prefLanguage = '$language', prefVenue1 = '$venue1', prefVenue2 = '$venue2', prefStartTime1 = '$timepicker1opt1', prefEndTime1 = '$timepicker1opt2', prefStartTime2 = '$timepicker2opt1', prefEndTime2 = '$timepicker2opt2', prefDay1 = '$day1', prefDay2 = '$day2' WHERE prefID = ".$_SESSION['prefID'];
		$sql_dgroupmember = "UPDATE discipleshipgroupmembers_tbl SET receivedChrist = '$receivedChrist', attendCCF = '$attendCCF', regularlyAttendsAt = '$regularlyAttendsAt' WHERE memberID = ".$_SESSION['userid'];
		mysqli_query($conn, $sql_cprefer);
		mysqli_query($conn, $sql_dgroupmember);
	}

	if(isset($_POST["submit_cpass"])) {
		$regpassword = $_POST["confirm-password"];

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_pass = "UPDATE member_tbl SET password = '$regpassword' WHERE memberID = ".$_SESSION['userid'];
		mysqli_query($conn, $sql_pass);
	}

	if(isset($_POST["submit_register"])) {
		$citizenship = $_POST["Citizenship"];
		$email = $_POST["Email"];

		$homeaddress = $_POST["HomeAddress"];
		$homephonenumber = $_POST["HomePhoneNumber"];

		$companyaddress = $_POST["CompanyAddress"];
		$companycontactnum = $_POST["CompanyContactNum"];

		$schooladdress = $_POST["SchoolAddress"];
		$schoolcontactnum = $_POST["SchoolContactNum"];

		$spousename = $_POST["SpouseName"];
		$spousemobilenumber = $_POST["SpouseMobileNumber"];
		$spousebirthdate = date("Y-m-d", strtotime($_POST["SpouseBirthdate"]));

		$language = $_POST["Language"];

		$opt1day = $_POST["Option1Day"];
		$start1 = $_POST["timepicker1opt1"];
		$end1 = $_POST["timepicker2opt1"];
		$venue1 = $_POST["Option1Venue"];

		$opt2day = $_POST["Option2Day"];
		$start2 = $_POST["timepicker1opt2"];
		$end2 = $_POST["timepicker2opt2"];
		$venue2 = $_POST["Option2Venue"];

		$recchrist = $opt1day = $_POST["receivedChrist"];
		$attccf = $_POST["attendCCF"];
		$regattat = $_POST["regularlyAttendsAt"];

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_coinfo = "UPDATE member_tbl SET citizenship = '$citizenship', emailAd = '$email', homeAddress = '$homeaddress', homePhoneNumber = '$homephonenumber', memberType = 1 WHERE memberID = ".$_SESSION['userid'];
		$sql_dgmem = "INSERT INTO discipleshipgroupmembers_tbl(memberID, dgroupID, dgroupmemberStatus, receivedChrist, attendCCF, regularlyAttendsAt, dateJoinedAsDgroupMember) VALUES (".$_SESSION['userid'].", 4, 1, '$recchrist', '$attccf', '$regattat', '2017-08-08');";
		$sql_company = "INSERT INTO companydetails_tbl(companyContactNum, companyAddress) VALUES('$companycontactnum', '$companyaddress');";
		$sql_school = "INSERT INTO schooldetails_tbl(schoolContactNum, schoolAddress) VALUES('$schoolcontactnum', '$schooladdress');";
		$sql_spouse = "INSERT INTO spousedetails_tbl(spouseName, spouseContactNum, spouseBirthdate_ VALUES('$spousename', '$spousemobilenumber', '$spousebirthdate');";
		$sql_prefs = "INSERT INTO preferencedetails_tbl(prefLanguage, prefDay1, prefDay2, prefVenue1, prefVenue2, prefStartTime1 , prefEndTime1, prefStartTime2, prefEndTime2) VALUES('$language', '$op1day', '$op2day', '$venue1', '$venue2', '$start1', '$end1', '$start2' '$end2');";
		mysqli_query($conn, $sql_coinfo);
		mysqli_query($conn, $sql_dgmem);
		mysqli_query($conn, $sql_company);
		mysqli_query($conn, $sql_school);
		mysqli_query($conn, $sql_spouse);	
		mysqli_query($conn, $sql_prefs);
	}
?>