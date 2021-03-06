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
	if(isset($_POST['submit_next'])) {
		// database member_tbl field variables
		// child table fields
		$companyname = $_POST["CompanyName"];
		$companyaddress = $_POST["CompanyAddress"];
		$companycontactnum = $_POST["CompanyContactNum"];
		$schoolname = $_POST["SchoolName"];
		$schooladdress = $_POST["SchoolAddress"];
		$schoolcontactnum = $_POST["SchoolContactNum"];
		$spousename = $_POST["SpouseName"];
		$spousemobilenumber = $_POST["SpouseMobileNumber"];
		$spousebirthdate = date("Y-m-d", strtotime($_POST["SpouseBirthdate"]));
		if($spousebirthdate=="")
			$spousebirthdate="";
		$language = $_POST["Language"];
		$venue1 = $_POST["Option1Venue"];
		$venue2 = $_POST["Option2Venue"];
		$timepicker1opt1 = date("H:i:s", strtotime($_POST["timepicker1opt1"]));
		$timepicker1opt2 = date("H:i:s", strtotime($_POST["timepicker1opt2"]));
		$timepicker2opt1 = date("H:i:s", strtotime($_POST["timepicker2opt1"]));
		$timepicker2opt2 = date("H:i:s", strtotime($_POST["timepicker2opt2"]));
		$day1 = $_POST["Option1Day"];
		$day2 = $_POST["Option2Day"];

		// parent table fields
		$firstname = $_POST["Firstname"];
		$middlename = $_POST["Middlename"];
		$lastname = $_POST["Lastname"];
		$nickname = $_POST["Nickname"];
		$birthdate = date("Y-m-d", strtotime($_POST["Birthdate"]));
		if($birthdate=="")
			$birthdate="";
		$gender = $_POST["Gender"];
		if($gender == "Male") $gender = 0;
		else $gender = 1;
		$civilstatus = $_POST["CivilStatus"];
		$citizenship = $_POST["Citizenship"];
		$homeaddress = $_POST["HomeAddress"];
		$homephonenumber = $_POST["HomePhoneNumber"];
		$mobilenumber = $_POST["MobileNumber"];
		$email = $_POST["EmailAd"];
		$profession = $_POST["Profession"];
		$dateJoined = date("Y-m-d");
		$dgroupid = $_POST["dgroupID"];
		$receivedChrist = $_POST["receivedChrist"];
		$attendCCF = $_POST["attendCCF"];
		$regularlyAttendsAt = $_POST["regularlyAttendsAt"];
		$dgorupmemberstatus = 1;
		$regusername = $_POST["username"];
		$regpassword = $_POST["password"];
		$memberType = 1; // dgroup member type

		$checkCompanyID = false;
		$checkSchoolID = false;
		$checkSpouseID = false;
		$checkPreferenceID = false;
		$checkMemberID = false;

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		/*
		$usernamecheck = mysql_query("SELECT username FROM member_tbl WHERE username = $_POST['username']");
		$userchecker = mysql_fetch_assoc($usernamecheck);

		if($_POST['username'] == userchecker('username')){
			echo 'alert("Username is Already Taken, Sorry")';
		}
		*/
		else {
			$companyIDField = "";
			$schoolIDField = "";
			$spouseIDField = "";
			$preferenceIDField = "";
			//if($companyname != ""){
				$sql_company = "INSERT INTO companydetails_tbl(companyName, companyContactNum, companyAddress) VALUES('$companyname', '$companyaddress', '$companycontactnum');";
				$checkCompanyID = true;
				$companyIDField = ", companyID";
				mysqli_query($conn, $sql_company);
				/*
				if (mysqli_query($conn, $sql_company)) {
					echo '
					<script>
						Materialize.toast("Company Details Inserted", 3000);
					</script>';
				}
				else {
					mysqli_error($conn);
				}
				*/
			//}
			//if($schoolname != "") {
				$sql_school = "INSERT INTO schooldetails_tbl(schoolName, schoolContactNum, schoolAddress) VALUES('$schoolname', '$schooladdress', '$schoolcontactnum');";
				$checkSchoolID = true;
				$schoolIDField = ", schoolID";
				mysqli_query($conn, $sql_school);
				/*
				if (mysqli_query($conn, $sql_school)) {
					echo '
					<script>
						Materialize.toast("School Details Inserted", 3000);
					</script>';
				}
				else {
					mysqli_error($conn);
				}
				*/
			//}
			//if($spousename != "") {
				$sql_spouse = "INSERT INTO spousedetails_tbl(spouseName, spouseContactNum, spouseBirthdate) VALUES('$spousename', '$spousemobilenumber', '$spousebirthdate');";
				$checkSpouseID = true;
				$spouseIDField = ", spouseID";
				mysqli_query($conn, $sql_spouse);
				/*
				if (mysqli_query($conn, $sql_spouse)) {
					echo '
					<script>
						Materialize.toast("Spouse Details Inserted", 3000);
					</script>';
				}
				else {
					mysqli_error($conn);
				}
				*/
			//}
			if($language != "" && $venue1 != "" && $venue2 != "" && $timepicker1opt1 != "" && $timepicker1opt2 != "" && $timepicker2opt1 != "" && $timepicker2opt2 != "" && $day1 != "" && $day2 != "") {
				$sql_preference = "INSERT INTO preferencedetails_tbl(prefLanguage, prefVenue1, prefVenue2, prefStartTime1, prefEndTime1, prefStartTime2, prefEndTime2, prefDay1, prefDay2) VALUES('$language', '$venue1', '$venue2', '$timepicker1opt1', '$timepicker1opt2', '$timepicker2opt1', '$timepicker2opt2', '$day1', '$day2');";
				$checkPreferenceID = true;
				$preferenceIDField = ", prefID";
				mysqli_query($conn, $sql_preference);
				/*
				if (mysqli_query($conn, $sql_preference)) {
					echo '
					<script>
						Materialize.toast("Preference Details Inserted", 3000);
					</script>';
				}
				else {
					mysqli_error($conn);
				}
				*/
			}
			$sql_parent = "INSERT INTO member_tbl(firstName, middleName, lastName, nickName, birthdate, gender, civilStatus, citizenship, homeAddress, homePhoneNumber, contactNum, emailAd, occupation, dateJoined, username, password, companyID, schoolID, spouseID, prefID, memberType) VALUES('$firstname', '$middlename', '$lastname', '$nickname', '$birthdate', '$gender', '$civilstatus', '$citizenship', '$homeaddress', '$homephonenumber', '$mobilenumber', '$email', '$profession', '$dateJoined', '$regusername', '$regpassword', ".getCompanyID($checkCompanyID).", ".getSchoolID($checkSchoolID).", ".getSpouseID($checkSpouseID).", ".getPreferenceID($checkPreferenceID).", $memberType);";
			$checkMemberID = true;
			mysqli_query($conn, $sql_parent);
			/*
			if (mysqli_query($conn, $sql_parent)) {
				echo '
				<script>
					Materialize.toast("Member Details Inserted", 3000);
				</script>';
			}
			else {
				mysqli_error($conn);
			}
			*/
			$sql_dgroupmember = "INSERT INTO discipleshipgroupmembers_tbl(memberID, dgroupID, dgroupmemberStatus, receivedChrist, attendCCF, regularlyAttendsAt, dateJoinedAsDgroupMember) VALUES(".getMemberID($checkMemberID).", $dgroupid, $dgorupmemberstatus, '$receivedChrist', '$attendCCF', '$regularlyAttendsAt', '$dateJoined');";
			mysqli_query($conn, $sql_dgroupmember);
			/*
			if (mysqli_query($conn, $sql_dgroupmember)) {
				echo '
				<script>
					Materialize.toast("Dgroup Member Details Inserted", 3000);
				</script>';
			}
			else {
				mysqli_error($conn);
			}
			*/
			mysqli_close($conn);
			//echo "<meta http-equiv='refresh' content='0'>";
			include("config.php");
			session_start();
			$myusername = mysqli_real_escape_string($db,$_POST['username']);
			$_SESSION['user'] = $myusername;
			sleep(1);
			header("Location: index.php");
			exit();
		}
	}

	function getCompanyID($checkCompanyID) { // gets the recently added company id
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT companyID FROM companydetails_tbl ORDER BY companyID DESC LIMIT 1";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$companyID = $row["companyID"];
			}
		}
		if($checkCompanyID)
			return $companyID;
		else
			return "NULL";
	}

	function getSchoolID($checkSchoolID) { // gets the recently added school id
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT schoolID FROM schooldetails_tbl ORDER BY schoolID DESC LIMIT 1";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$schoolID = $row["schoolID"];
			}
		}
		if($checkSchoolID)
			return $schoolID;
		else
			return "NULL";
	}

	function getSpouseID($checkSpouseID) { // gets the recently added company id
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT spouseID FROM spousedetails_tbl ORDER BY spouseID DESC LIMIT 1";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$spouseID = $row["spouseID"];
			}
		}
		if($checkSpouseID)
			return $spouseID;
		else
			return "NULL";
	}

	function getPreferenceID($checkPreferenceID) { // gets the recently added company id
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT prefID FROM preferencedetails_tbl ORDER BY prefID DESC LIMIT 1";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$preferenceID = $row["prefID"];
			}
		}
		if($checkPreferenceID)
			return $preferenceID;
		else
			return "NULL";
	}

	function getMemberID($checkMemberID) { // gets the recently added member id
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT memberID FROM member_tbl ORDER BY memberID DESC LIMIT 1";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$memberID = $row["memberID"];
			}
		}
		if($checkMemberID)
			return $memberID;
		else
			return "NULL";
	}
?>
<?xml version = ″1.0″?>
<!DOCTYPE html PUBLIC ″-//w3c//DTD XHTML 1.1//EN″ “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns = ″http://www.w3.org/1999/xhtml″>
	<?php include('globalfunctions.php'); ?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="resources/CCF.ico">
	<link href="universal.css" rel="stylesheet">
	<link rel="stylesheet" href="materialize/css/materialize.css" media="screen,projection">
	<script src="jquery-3.2.1.js"></script>
	<script src="materialize/js/materialize.js"></script>
	<script src="universal.js"></script>
	<!-- timepicker link and script -->
	<link href="materialize/timepicker/_old/css/materialize.clockpicker.css" rel="stylesheet" media="screen,projection">
	<script src="materialize/timepicker/src/js/materialize.clockpicker.js"></script>

	<!-- form validation link and script -->
	<script src="validation/dist/jquery.validate.js"></script>
	<script src="validation/dist/additional-methods.js"></script>
	<title>Christ's Commission Fellowship</title>

	<style>
		::selection {
			background-color: #16A5B8;
			color: #fff;
		}
		
		/* containers*/
		div {
			display: block;
		}

		.container {
			margin: 0 auto;
			max-width: 1280px;
			width: 80%;
		}
		/*=======END=======*/

		/*logo*/
		#logo {
			margin-top: 10px;
		}

		img#loginlogo {
			height: 150px;
			width: 300px;
		}
		/*=======END=======*/

		/*
		colors for ccf:
		#16A5B8
		#777
		*/

		/*links*/
		nav {
			color: #777;
			background-color: #fff;
			width: 100%;
			height: 97px;
			line-height: 97px;
		}

		@font-face {
			font-family: proxima-nova;
			src: url(ccf-fonts/proxima/PROXIMANOVA-BOLD.otf);
			font-weight: bold;
		}
		a {

		}
		a:hover {

		}
		/*=======END=======*/

		/*form*/
		.register {
			width: 650px;
		}
		/*=======END=======*/

		/* ============================OVERRIDE CUSTOM MATERIALIZE STYLES=========================== */  
		/* input custom colors*/
		/*Text inputs*/
		input:not([type]):focus:not([readonly]),
		input[type=text]:focus:not([readonly]),
		input[type=password]:focus:not([readonly]),
		input[type=email]:focus:not([readonly]),
		input[type=url]:focus:not([readonly]),
		input[type=time]:focus:not([readonly]),
		input[type=date]:focus:not([readonly]),
		input[type=datetime]:focus:not([readonly]),
		input[type=datetime-local]:focus:not([readonly]),
		input[type=tel]:focus:not([readonly]),
		input[type=number]:focus:not([readonly]),
		input[type=search]:focus:not([readonly]),
		textarea.materialize-textarea:focus:not([readonly]) {
			border-bottom: 1px solid #16A5B8;
			box-shadow: 0 1px 0 0 #16A5B8;
		}

		input:not([type]):focus:not([readonly])+label,
		input[type=text]:focus:not([readonly])+label,
		input[type=password]:focus:not([readonly])+label,
		input[type=email]:focus:not([readonly])+label,
		input[type=url]:focus:not([readonly])+label,
		input[type=time]:focus:not([readonly])+label,
		input[type=date]:focus:not([readonly])+label,
		input[type=datetime]:focus:not([readonly])+label,
		input[type=datetime-local]:focus:not([readonly])+label,
		input[type=tel]:focus:not([readonly])+label,
		input[type=number]:focus:not([readonly])+label,
		input[type=search]:focus:not([readonly])+label,
		textarea.materialize-textarea:focus:not([readonly])+label {
			color: #16A5B8;
		}


		.btn, .btn-large {
		  text-decoration: none;
		  color: #777;
		  background-color: #ebebeb;
		  text-align: center;
		  letter-spacing: .5px;
		  transition: .2s ease-out;
		  cursor: pointer;
		  font-family: proxima-nova;
		  font-size: 13px;
		  /*border-radius: 20px;*/
		}

		.fixbutton {
		  	background-color: #16A5B8;
		  	color: #fff;
		}

		/*background-color for icons if focus is inactive*/
		.input-field .prefix {
			position: absolute;
			width: 3rem;
			font-size: 2rem;
		    transition: color .2s;
		    color: #777;
		}

		/*background-color for icons if focus is active*/
		.input-field .prefix.active {
		  color: #16A5B8;
		}

		/*hover of button*/
		.btn:hover, .btn-large:hover {
			background-color: #1bcde4;
			color: #fff;
		}

		/*focus of button*/
		.btn:focus, .btn-large:focus,
		.btn-floating:focus {
		  	background-color: #1bcde4;
		  	color: #fff;
		}


		.card-panel {
		 	 transition: box-shadow .25s;
		 	 padding: 24px;
		 	 margin: 0.5rem 0 1rem 0;
		 	 border-radius: 2px;
		 	 background-color: #fff;
		}
		/* ============================END=========================== */  

		/*headers*/
		h1, h2, h3, h4, h5, h6 {
			color: #777;
			font-family: proxima-nova;
			text-transform: uppercase;
		}
		/*=======END=======*/

		/*CUSTOM DATEPICKER*/
		.picker__weekday-display {
		 	background-color: #138fa0; /* darker color of #16A5B8 by 5% */
		 	padding: 10px;
		 	font-weight: 200;
		 	letter-spacing: .5;
		 	font-size: 1rem;
			margin-bottom: 15px;
		}

		.picker__date-display {
			text-align: center;
		  	background-color: #16A5B8;
		 	color: #fff;
		 	padding-bottom: 15px;
		  	font-weight: 300;
		}

		.picker__day.picker__day--today {
		 	color: #16A5B8;
		}

		.picker__day--selected,
		.picker__day--selected:hover,
		.picker--focused .picker__day--selected {
		  	border-radius: 50%;
		    -webkit-transform: scale(0.9);
		          transform: scale(0.9);
		 	 background-color: #16A5B8;
		 	 color: #ffffff;
		}

		.picker__close, .picker__today {
		  	font-size: 1.1rem;
		  	padding: 0 1rem;
		 	color: #16A5B8;
		}

		/*page progress bar*/
		.progress {
		 	 position: relative;
		 	 height: 8px;
		 	 display: block;
		 	 width: 100%;
		 	 max-width: 200px;
		 	 background-color: #a4ebf4; /* six levels up of #16A5B8 (40% up)*/
		 	 border-radius: 2px;
		 	 margin: 0.5rem 0 1rem 0;
		 	 overflow: hidden;
		}

		.progress .determinate {
		  	position: absolute;
		  	top: 0;
		  	left: 0;
		  	bottom: 0;
		  	background-color: #16A5B8;
		  	transition: width .3s linear;
		}

		/*radio buttons*/
		[type="radio"]:checked + label:after,
		[type="radio"].with-gap:checked + label:before,
		[type="radio"].with-gap:checked + label:after {
		  	border: 2px solid #16A5B8;
		}

		[type="radio"]:checked + label:after,
		[type="radio"].with-gap:checked + label:after {
		  	background-color: #16A5B8;
		}

		/*selects*/
		.dropdown-content li > a, .dropdown-content li > span {
		  	font-size: 16px;
		  	color: #16A5B8;
		  	display: block;
		  	line-height: 22px;
		  	padding: 14px 16px;
		}

		/*timepicker*/
		.clockpicker-span-am-pm {
		 	 display: inline-block;
		 	 font-size: 30px;
		 	 line-height: 82px;
		 	 color: #b2dfdb;
		}

		/*tables*/
		table.cursor > tbody > tr:hover {
			cursor: hand;
		}

		td {
		  	padding: 15px 5px;
		  	display: table-cell;
		  	text-align: left;
		  	vertical-align: middle;
		  	border-radius: 0px; /* complete horizontal hightlight bar*/
		}
		/* ============================END=========================== */  

		/*validation*/
		.input-field div.error {
			font-size: 0.8rem;
			color: #16A5B8;
		}

		th {
			color: #424242;
		}
		.error-with-icon {
			color: #ff3333;
			margin-left: 43;
		}

		.error {
			color: #ff3333;
		}

		/* ===== PRELOADER ===== */
		.preloader-wrapper.small-username {
			width: 15px;
			height: 15px;
		}

		.spinner-color-theme {
			border-color: #777;
		}
		/* ===== END ===== */
	</style>

	<script>
		$(document).ready(function(){
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 50, // Creates a dropdown of 15 years to control year
				max: true
			});
			 
			$(document).ready(function() {
				$('select').material_select();
			}); 

			// when dynamic changes are applied to textareas, reinitialize autoresize (call it again)
			$('#receivedChrist').val();
  			$('#receivedChrist').trigger('autoresize');

			$('#attendCCF').val();
  			$('#attendCCF').trigger('autoresize');

			$('#regularlyAttendsAt').val();
  			$('#regularlyAttendsAt').trigger('autoresize');
  			
  			//old version of timepicker
  			/*
  			$('#timepicker1opt1').pickatime({
  				autoclose: false
  			});

  			$('#timepicker2opt1').pickatime({
  				autoclose: false
  			});
  			$('#timepicker1opt2').pickatime({
  				autoclose: false
  			});

  			$('#timepicker2opt2').pickatime({
  				autoclose: false
  			});
			*/
  			//new version of timepicker
  			
			$('.timepicker').pickatime({
				default: 'now', // Set default time
				fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
				twelvehour: true, // Use AM/PM or 24-hour format
				donetext: 'DONE', // text for done-button
				cleartext: 'Clear', // text for clear-button
				canceltext: 'Cancel', // Text for cancel-button
				autoclose: false, // automatic close timepicker
				ampmclickable: false, // make AM PM clickable
				aftershow: function(){} //Function for after opening timepicker
			});
		});

		var isCellActive = false;
		function cellActive(id) { // this function allows you to highlight the table rows you select
			// ==========PLEASE FIX HIGHLIGHT EFFECT========== 
			var num_of_rows = document.getElementsByTagName("TR").length;
			var rownumber = id.charAt(3);
			for(var i = 0; i < num_of_rows; i++) {
				//document.getElementsByTagName("TR")[i].appendChild(style);
				document.getElementsByTagName("TR")[i].style.backgroundColor = "#fff"; // default color of rows = #f2f2f2
				document.getElementsByTagName("TR")[i].style.color = "black";
			}
			document.getElementById(id).style.backgroundColor = "#16A5B8";
			document.getElementById(id).style.color = "#fff";
			//document.getElementById("table").setAttribute("class", "highlight centered
			id = id.split("_")[1];
			$('#dgroupID').val(id);
			//$('#next').attr("href", "home.php?id="+id);
			$('#next').removeAttr("disabled", "");
			isCellActive = true;
		}
	</script>

	<header>
	</header>
	<body>
		<div id="response"></div>
		<div class="row">
			<div class="row center" style="margin-top: 30px;">
				<a href="home.php"><img src="resources/CCF Logos3.png" id="loginlogo" /></a>
			</div>
			<div class="col s12 z-depth-4 card-panel" style="margin-top: 10%;">
				<form method="post" class="register" id="registration" name="myForm"> <!--if php is applied, action value will then become the header -->
					<div id="page1">
						<h3 class="center">Personal Information</h3>
						<div class="row">
							<div class="input-field col s12">
								<input type="text" name="Lastname" id="Lastname" data-length="20" maxlength="20" required>
								<label for="Lastname">Last Name</label>
								<small class="error" id="Lastname-required"></small>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Firstname" id="Firstname" data-length="20" maxlength="20" required>
								<label for="Firstname">First Name</label>
								<small class="error" id="Firstname-required"></small>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Middlename" id="Middlename" data-length="20" maxlength="20" required>
								<label for="Middlename">Middle Name</label>
								<small class="error" id="Middlename-required"></small>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Nickname" id="Nickname" data-length="20" maxlength="20" required>
								<label for="Nickname">Nickname</label>
								<small class="error" id="Nickname-required"></small>
							</div>
							<div class="input-field col s12">
								<input type="date" class="datepicker" id="Birthdate" name="Birthdate" value="" required>
								<label for="Birthdate" class>Birthdate</label>
								<small class="error" id="Birthdate-required"></small>
							</div>
						</div>
					</div>
					<div id="page2" style="display: none;">
						<h3 class="center">Other Information</h3>
						<div class="row">
							<p>
								<div class="col s12" style="padding: 0 !important;">
									<label for="Gender" style="margin-left: 10px; font-size:15px;">Gender</label>
									<input type="radio" id="Gender_Male" name="Gender" value="Male" required />
									<label for="Gender_Male">Male</label>
									<input type="radio" id="Gender_Female" name="Gender" value="Female" required />
									<label for="Gender_Female">Female</label><br>
									<small class="error" id="Gender-required" style="margin-left: 11; position: relative; top: 10px;">Please select one.</small>
								</div>
							</p>
							<div class="input-field col s12">
								<input type="text" name="Citizenship" id="Citizenship" data-length="20" maxlength="20" required>
								<label for="Citizenship">Citizenship</label>
								<small class="error" id="Citizenship-required">This field is required.</small>
							</div>
							<div class="row" style="margin-bottom: 0px;"> <!-- margin-bottom removes gap at the bottom of the control -->
								<div class="input-field col s12">
									<select id="CivilStatus" name="CivilStatus" required>
										<option value="" disabled selected>Choose your option...</option>
										<option value="Single">Single</option>
										<option value="Married">Married</option>
										<option value="Single Parent">Single Parent</option>
										<option value="Annulled">Annulled</option>
										<option value="Separated">Separated</option>
										<option value="Widow/er">Widow/er</option>
									</select>
									<label>Civil Status</label>
									<small class="error" id="CivilStatus-required">Please choose one.</small>
								</div>
							</div>
							<div class="input-field col s12">
								<input type="text" name="MobileNumber" id="MobileNumber" onkeypress='return event.charCode >= 48 && event.charCode <= 57 //only numbers on keypress' data-length="18" maxlength="18" placeholder="ex. 0912 345 6789" required>
								<label for="MobileNumber">Mobile Number</label>
								<small class="error" id="MobileNumber-required">This field is required.</small>
							</div>
							<div class="input-field col s12">
								<input type="email" name="EmailAd" id="EmailAd" data-length="30" maxlength="30" required> <!-- increase size of email address -->
								<label for="EmailAd" data-error="Invalid email address">Email Address</label>
								<small class="error" id="EmailAd-required">This field is required.</small>
								<small class="error" id="Invalid-Email">Invalid Email Address</small>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Profession" id="Profession" data-length="30" maxlength="30" required>
								<label for="Profession" name="profession">Profession/Occupation</label>
								<small class="error" id="Profession-required">This field is required.</small>
							</div>
						</div>
					</div>
					<div id="page3" style="display: none;">
						<h3 class="center">Other Information</h3>
						<h4 class="center">Home</h4>
						<div class="row" style="margin-top: 0px;">
							<div class="input-field col s12">
								<input type="text" name="HomeAddress" id="HomeAddress" data-length="50" maxlength="50" required>
								<label for="HomeAddress" style=" font-size:14px;">Address</label>
								<small class="error" id="HomeAddress-required">This field is required.</small>
							</div>
							<div class="input-field col s12">
								<input type="text" name="HomePhoneNumber" id="HomePhoneNumber" onkeypress='return event.charCode >= 48 && event.charCode <= 57 //only numbers on keypress' data-length="18" maxlength="18">
								<label for="HomePhoneNumber">Home Phone Number</label>
							</div>
							<h4 class="center company">Company</h4>
							<div class="input-field col s12 company">
								<input type="text" name="CompanyName" id="CompanyName" data-length="30" maxlength="30" required>
								<label for="CompanyName">Company Name</label>
								<small class="error" id="CompanyName-required">This field is required.</small>
							</div>
							<div class="input-field col s12 company">
								<input type="text" name="CompanyContactNum" id="CompanyContactNum" onkeypress='return event.charCode >= 48 && event.charCode <= 57 //only numbers on keypress' data-length="18" maxlength="18">
								<label for="CompanyContactNum">Company Contact Number</label>
							</div>
							<div class="input-field col s12 company">
								<input type="text" name="CompanyAddress" id="CompanyAddress" data-length="50" maxlength="50">
								<label for="CompanyAddress" style=" font-size:14px;">Company Address</label>
							</div>
							<h4 class="center school">School</h4>
							<div class="input-field col s12 school">
								<input type="text" name="SchoolName" id="SchoolName" data-length="30" maxlength="30" required>
								<label for="SchoolName">School Name</label>
								<small class="error" id="SchoolName-required">This field is required.</small>
							</div>
							<div class="input-field col s12 school">
								<input type="text" name="SchoolContactNum" id="SchoolContactNum" data-length="18" maxlength="18">
								<label for="SchoolContactNum">School Contact Number</label>
							</div>
							<div class="input-field col s12 school">
								<input type="text" name="SchoolAddress" id="SchoolAddress" data-length="50" maxlength="50">
								<label for="SchoolAddress" style=" font-size:14px;">School Address</label>
							</div>
							<h4 class="center spouse">Spouse</h4>
							<div class="input-field col s12 spouse">
								<input type="text" name="SpouseName" id="SpouseName" data-length="30" maxlength="30" required>
								<label for="SpouseName">Spouse Name</label>
								<small class="error" id="SpouseName-required">This field is required.</small>
							</div>
							<div class="input-field col s12 spouse">
								<input type="text" name="SpouseMobileNumber" id="SpouseMobileNumber" data-length="18" maxlength="18">
								<label for="SpouseMobileNumber">Spouse Mobile Number</label>
							</div>
							<div class="input-field col s12 spouse">
								<input type="date" class="datepicker" id="SpouseBirthdate" name="SpouseBirthdate">
								<label for="SpouseBirthdate">Birthdate</label>
							</div>
						</div>
					</div>

					<div id="page4" style="display: none;">
						<h3 class="center">Preferences</h3>
						<div class="row">
							<div class="input-field col s12">
								<input type="text" name="Language" id="Language" data-length="50" maxlength="50" required>
								<label for="Language">Language</label>
								<small class="error" id="Language-required">This field is required.</small>
							</div>
							<div class="row" style="margin-bottom: 0px;"> <!-- margin-bottom removes gap at the bottom of the control -->
								<div class="input-field col s12">
									<select id="DgroupType" name="DgroupType" required>
										<option value="" disabled selected>Choose your option...</option>
										<option value="Youth">Youth</option>
										<option value="Singles">Singles</option>
										<option value="Single Parents">Single Parents</option>
										<option value="Married">Married</option>
										<option value="Couples">Couples</option>
										<option value="All">All (Men/Women)</option>
									</select>
									<label>Type of Dgroup</label>
									<small class="error" id="DgroupType-required">Please choose one.</small>
									<small class="error" id="DgroupType-nospouse">You are not legally married. Please pick a different Dgroup Type.</small>
									<small class="error" id="DgroupType-separated">Your sttll legally married. Please pick a different Dgroup Type.</small>
									<small class="error" id="DgroupType-spouse">You are legally married. Please pick the Married Dgroup Type.</small>
									<small class="error" id="DgroupType-single">You are single. You cannot pick the Couples Dgroup Type.</small>
								</div>
							</div>
							<h4 class="center">Schedule</h4>
							<h5 class="center">Option 1</h5>
							<div class="row" style="margin-bottom: 0px;">
								<div class="input-field col s12">
									<select id="Option1Day" name="Option1Day" required>
										<option value="" disabled selected>Choose your option...</option>
										<option value="Sunday">Sunday</option>
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										<option value="Saturday">Saturday</option>
									</select>
									<label>Day</label>
									<small class="error" id="Option1Day-required">Please choose one.</small>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<label for="timepicker1opt1">Start Time</label>
									<input type="date" class="timepicker" name="timepicker1opt1" id="timepicker1opt1" required>
									<small class="error" id="timepicker1opt1-required">This field is required.</small>
									<small class="error" id="timepicker1opt1-equal1">Both should not be equal.</small>
									<small class="error" id="timepicker1opt1-greater1">Start Time should be before than End Time.</small>
								</div>
								<div class="input-field col s6 right">
									<label for="timepicker1opt2">End Time</label>
									<input type="date" class="timepicker" name="timepicker1opt2" id="timepicker1opt2" required>
									<small class="error" id="timepicker1opt2-required">This field is required.</small>
									<small class="error" id="timepicker1opt2-equal1">Both should not be equal.</small>
									<small class="error" id="timepicker1opt2-greater1">Start Time should be before than End Time.</small>
								</div>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Option1Venue" id="Option1Venue" data-length="50" maxlength="50" required>
								<label for="Option1Venue" style=" font-size:14px;">Venue</label>
								<small class="error" id="Option1Venue-required">This field is required.</small>
							</div>
							<h5 class="center">Option 2</h5>
							<div class="row" style="margin-bottom: 0px;">
								<div class="input-field col s12">
									<select id="Option2Day" name="Option2Day" required>
										<option value="" disabled selected>Choose your option...</option>
										<option value="Sunday">Sunday</option>
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										<option value="Saturday">Saturday</option>
									</select>
									<label>Day</label>
									<small class="error" id="Option2Day-required">Please choose one.</small>
								</div>
							</div>
								<div class="input-field col s6">
									<label for="timepicker2opt1">Start Time</label>
									<input type="date" class="timepicker" name="timepicker2opt1" id="timepicker2opt1" required>
									<small class="error" id="timepicker2opt1-required">This field is required.</small>
									<small class="error" id="timepicker2opt1-equal2">Both should not be equal.</small>	
									<small class="error" id="timepicker2opt1-greater2">Start Time should be before than End Time.</small>
								</div>
								<div class="input-field col s6">
									<label for="timepicker2opt2">End Time</label>
									<input type="date" class="timepicker" name="timepicker2opt2" id="timepicker2opt2" required>
									<small class="error" id="timepicker2opt2-required">This field is required.</small>
									<small class="error" id="timepicker2opt2-equal2">Both should not be equal.</small>
									<small class="error" id="timepicker2opt2-greater2">Start Time should be before than End Time.</small>
								</div>
							<div class="input-field col s12">
								<input type="text" name="Option2Venue" id="Option2Venue" data-length="50" maxlength="50" required>
								<label for="Option2Venue" style=" font-size:14px;">Venue</label>
								<small class="error" id="Option2Venue-required">This field is required.</small>
							</div>
						</div>
					</div>
					<div id="page5" style="display: none;">
						<h3 class="center">Preferences</h3>
						<div class="row">
							<div class="row">
								<div class="input-field col s12">
									<textarea id="receivedChrist" class="materialize-textarea" name="receivedChrist" data-length="300" maxlength="300"></textarea>
									<label for="receivedChrist">When did you receive Christ as your Lord and Savior?</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea id="attendCCF" class="materialize-textarea" name="attendCCF" data-length="300" maxlength="300"></textarea>
									<label for="attendCCF">How long you have been attending CCF?</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea id="regularlyAttendsAt" class="materialize-textarea" name="regularlyAttendsAt" data-length="300" maxlength="300"></textarea>
									<label for="regularlyAttendsAt">Where do you regularly attend?</label>
								</div>
							</div>
						</div>
					</div>
					<div id="page6" style="display: none;">
						<h3 class="center">Account</h3>
						<div class="row">
							<?php
								// database connection variable

								$servername = "localhost";
								$username = "root";
								$password = "root";
								$dbname = "dbccf";
								$conn = mysqli_connect($servername, $username, $password, $dbname);
								if (!$conn) {
									die("Connection failed: " . mysqli_connect_error());
								}
								$query = "SELECT username, password FROM member_tbl ";
								$result = mysqli_query($conn, $query);
								if(mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										$username = $row["username"];
									}
								}
								//checking if username exist
							echo '
								<div class="input-field col s12">
									<i class="material-icons prefix">account_circle</i> <!-- person_outline -->
									<input type="text" name="username" id="username" data-length="16" maxlength="16" required>
									<label for="username">Username</label>
									<small class="error-with-icon" id="username-required">This field is required.</small>
									<small class="error-with-icon" id="notusername">This username is already taken.</small>
								</div>
								<div class="input-field col s12">
									<i class="material-icons prefix">lock</i> <!-- lock_outline -->
									<input type="password" name="password" id="password" data-length="16" maxlength="16" required>
									<label for="password">Password</label>
									<small class="error-with-icon" id="password-required">This field is required.</small>
								</div>
								<div class="input-field col s12">
									<i class="material-icons prefix">lock</i> <!-- lock_outline -->
									<input type="password" name="confirm-password" id="confirm-password" data-length="16" maxlength="16" required>
									<label for="confirm-password">Confirm New Password</label>
									<small class="error-with-icon" id="confirm-password-required">This field is required.</small>
									<small class="error-with-icon" id="checkpass-required">Passwords do not match.</small>
								</div>'; // originally having a value of own password
							?>
						</div>
					</div>
					<div id="page7" style="display: none;">
						<h3 class="center">Choose a Dgroup Leader</h3>
						<div class="row">
							<table class="cursor centered" id="table">
								<thead>
									<th style="width: <?php echo widthRow(4); ?>%; display: none;">Dgroup ID</th>
									<th style="width: <?php echo widthRow(5); ?>%">Dgroup Leader</th>
									<th style="width: <?php echo widthRow(8); ?>%">Gender</th>
									<th style="width: <?php echo widthRow(8); ?>%">Type of Dgroup</th>
									<th style="width: <?php echo widthRow(10); ?>%">Age Bracket</th>
									<th style="width: <?php echo widthRow(8); ?>%">Day</th>
									<th style="width: <?php echo widthRow(5); ?>%">Schedule</th>
								</thead>
								<?php
									// database connection variables

									$servername = "localhost";
									$username = "root";
									$password = "root";
									$dbname = "dbccf";

									$conn = mysqli_connect($servername, $username, $password, $dbname);
									if (!$conn) {
										die("Connection failed: " . mysqli_connect_error());
									}

									/*
									function countDgroups() {
										$conn = mysqli_connect($servername, $username, $password, $dbname);
										if (!$conn) {
											die("Connection failed: " . mysqli_connect_error());
										}

										$sql = "SELECT count(dgroupID) AS numOfDgroup FROM discipleshipgroup_tbl;";
										$result = mysqli_query($conn, $sql);
										if(mysqli_num_rows($result) > 0){
											while($row = mysqli_fetch_assoc($result)){
												$count = $row["numOfDgroup"];
											}
										}
									}*/

									$sql_dgroups = "SELECT discipleshipgroup_tbl.dgroupID, CONCAT(firstName, ' ', lastName) AS fullname, (SELECT
													CASE
														WHEN gender = '0' THEN 'Male'
														ELSE 'Female'
													END) AS gender,
													(SELECT CASE
														WHEN dgroupType = '0' THEN 'Youth'
														WHEN dgroupType = '1' THEN 'Singles'
														WHEN dgroupType = '2' THEN 'Single Parents'
														WHEN dgroupType = '3' THEN 'Married'
														WHEN dgroupType = '4' THEN 'Couples'
														WHEN dgroupType = '5' THEN 'All (Men/Women)'
													END) AS dgroupType, ageBracket, schedDay, schedStartTime AS start_time, schedEndTime AS end_time FROM member_tbl INNER JOIN discipleshipgroup_tbl ON member_tbl.memberID = discipleshipgroup_tbl.dgleader INNER JOIN scheduledmeeting_tbl ON discipleshipgroup_tbl.schedID = scheduledmeeting_tbl.schedID;";
									$result = mysqli_query($conn, $sql_dgroups);
									if(mysqli_num_rows($result) > 0) {
										$count = 1;
										while($row = mysqli_fetch_assoc($result)) {
											$dgroupid = $row["dgroupID"];
											echo '<tr id="row_'.$dgroupid.'" onclick="cellActive('."'".'row_'.$dgroupid.''."'".')">';
											$fullname = $row["fullname"];
											$gender = $row["gender"];
											$dgrouptype = $row["dgroupType"];
											$agebracket = $row["ageBracket"];
											$schedday = $row["schedDay"];
											$start_time = date("g:i A", strtotime($row["start_time"]));
											$end_time = date("g:i A", strtotime($row["end_time"]));
											$schedule = "$start_time - $end_time";
											echo '<td style="display: none;"></td>
											<td>'.$fullname.'</td>
											<td id="gender_'.$count.'">'.$gender.'</td>
											<td id="dgrouptype_'.$count.'">'.$dgrouptype.'</td>
											<td>'.$agebracket.'</td>
											<td>'.$schedday.'</td>
											<td>'.$schedule.'</td>';
											echo '</tr>';
											$count++;
										}
									}
									echo ' ';
								?>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="progress col s6 left" style=" margin-left: 10px;">
							<div class="determinate" style="" id="progressbar"></div>
						</div>&nbsp; &nbsp; <label id="page" onload="labelpage()"></label> <!-- Change when page number adjusts -->
						<span id="submitbuttons">
							<input type="hidden" id="dgroupID" name="dgroupID">
							<button class="waves-effect waves-light btn col s2 right" type="button" name="submit_next" id="next">NEXT</button>
							<button class="waves-effect waves-light btn col s2 right" type="button" name="submit_back" id="back" onclick="pagination(0)" style="margin-right: 10px; display: none;">BACK</button>
						</span>
					</div>
				</form>
			</div>
		</div>
	</body>

	<!-- scripts -->

	<script>
		//filterDgroupTable();
		//algo for displaying forms per page
		var currentpage = 1, no_of_pages=7, percentage=(currentpage/no_of_pages)*100, currentprogress=percentage;

		// initialization of profress bar controls
		document.getElementById('page').innerHTML = document.getElementById('page').innerHTML + "Page "+currentpage+" of "+no_of_pages;
		document.getElementById('progressbar').style.width = currentprogress+"%";
		function labelpage() {
			document.getElementById('page').innerHTML = "Page "+currentpage+" of "+no_of_pages;
		}
		function pagination(direction) {
			if(direction == 0) {
				if(currentpage == 2) {
					document.getElementById('back').style.display = "none";
					document.getElementById('page'+currentpage).style.display = "none";
					currentpage--;
					document.getElementById('page'+currentpage).style.display = "inline";
					currentprogress-=percentage;
					document.getElementById('page').innerHTML = "Page "+currentpage+" of "+no_of_pages;
					document.getElementById('progressbar').style.width = currentprogress+"%";
					document.getElementById('back').href = "#page"+currentpage;
					document.getElementById('back').blur();
				}
				else {
					document.getElementById('page'+currentpage).style.display = "none";
					currentpage--;
					document.getElementById('page'+currentpage).style.display = "inline";
					currentprogress-=percentage;
					document.getElementById('page').innerHTML = "Page "+currentpage+" of "+no_of_pages;
					document.getElementById('progressbar').style.width = currentprogress+"%";
					document.getElementById('back').href = "#page"+currentpage;
					document.getElementById('back').blur();
				}
				// removes color of submit button attached to this button ~bug
				document.getElementById('next').setAttribute("class", "waves-effect waves-light btn col s2 right");
				document.getElementById('next').innerHTML = "NEXT";
			}
			else {
				if(currentpage == no_of_pages) {
					document.getElementById('page'+currentpage).style.display = "none";
					document.getElementById('page'+currentpage).style.display = "inline";
					document.getElementById('page').innerHTML = "Page "+currentpage+" of "+no_of_pages;
					document.getElementById('progressbar').style.width = currentprogress+"%";
					document.getElementById('back').style.display = "inline";
					document.getElementById('next').href = "#page"+currentpage;

					//document.getElementById('next').type = "submit";
					document.getElementById('next').onclick = submitOnClick();
					//document.getElementById('next').onclick = document.getElementById('next').value = "Submit";
					//document.getElementById('next').onclick = document.getElementById('next').setAttribute("type", "submit");
				}
				else {
					document.getElementById('page'+currentpage).style.display = "none";
					currentpage++;
					document.getElementById('page'+currentpage).style.display = "inline";
					currentprogress+=percentage;
					document.getElementById('page').innerHTML = "Page "+currentpage+" of "+no_of_pages;
					document.getElementById('progressbar').style.width = currentprogress+"%";
					document.getElementById('back').style.display = "inline";
					document.getElementById('next').href = "#page"+currentpage;
					document.getElementById('next').blur();
					if(currentpage == no_of_pages) { /*at last page, button changes from next to submit*/
						// fixbutton puts the color of submit button
						document.getElementById('next').innerHTML = "SUBMIT";
						document.getElementById('next').setAttribute("class", "waves-effect waves-light btn col s2 right fixbutton");
					}
				}
			}
		}

		function submitOnClick() {
			document.getElementById('next').setAttribute("type", "submit");
			//document.myForm.submit();
			/*
			$["#next"].click(function() {
				$("button[name='submit_next']").prop("type", "submit"); //jquery-3
			});
			*/
		}

		/*--------------------------code ni paolo-----------------------------------*/
		$('.error, .error-with-icon').hide(); // by default, hide all error classes
		$('div#page1 .error').text("This field is required.");

		function disableDefaultRequired(elem) {
			// disable default required tooltips
			document.addEventListener('invalid', (function () {
			    return function (e) {
			        e.preventDefault();
			    };
			})(), true);
		}

		$("[id^=timepicker]").change(function() {
			var time_value = $(this).val();
			if(time_value.charAt(0) == '0') {
				$(this).val(removeLeadingZero(time_value));
			}
		});
		
		var check_iteration = true, check_username = true, focused_element;
		$("#next").click(function(){
			$('.error, .error-with-icon').hide(); // by default, hide all error classes
			var company = $(".company"), school = $(".school"), spouse = $(".spouse");
			company.show();
			school.show();
			spouse.show();
			$("#CompanyName").prop("required", true);
			$("#SchoolName").prop("required", true);
			$("#SpouseName").prop("required", true);

			//var checkpass = true, checknewpass = true, checkoldpass = true;
			$(this).blur();
			check_iteration = true;



			/* ===== SPOUSE VALIDATION ===== */
			if($(civilstatusid).val() == "Single" || $(civilstatusid).val() == "Single Parent" || $(civilstatusid).val() == "Annulled" || $(civilstatusid).val() == "Widow/er") {
				spouse.hide();
				$(".spouse input").prop("required", false);
				$('.spouse input').val("");
				$('.spouse input').blur();
				//$("h4").find(":contains('Spouse')").hide();
				//$("[id^=Spouse], [for^=Spouse]").hide();
			}

			/* ===== COMPANY AND SCHOOL VALIDATION ===== */
			var professionid = "#Profession";
			if($(professionid).val().toLowerCase() == "student") {
				company.hide();
				$(".company input").prop("required", false);
				$('.company input').val("");
				$('.company input').blur();
			}
			else if($(professionid).val().toLowerCase() == "unemployed" || $(professionid).val().toLowerCase() == "freelancer"){
				company.hide();
				$(".company input").prop("required", false);
				$('.company input').val("");
				$('.company input').blur();
				school.hide();
				$(".school input").prop("required", false);
				$('.school input').val("");
				$('.school input').blur();
			}
			else {
				school.hide();
				$(".school input").prop("required", false);
				$('.school input').val("");
				$('.school input').blur();
			}
			// TIMEPICKER VALIDATION

			if(getCurrentPage() == 'page4') {			

				// convert time values to timestamp; TIME VALIDATION

				// REMINDER: ibaliktad mo ang timepicker2's sa timepicker1's (REVERSE VALIDATION ORDER)
				var start_time = $("#timepicker1opt1").val(), end_time = $("#timepicker1opt2").val();
				d = (new Date()).getYear() + '-' + ((new Date()).getMonth()+1) + '-' + (new Date()).getDate();
				//d = "2015-03-25";
				start_time = spaceAMPM(start_time);
				end_time = spaceAMPM(end_time);
				start_time = new Date(d + " " + start_time);
				end_time = new Date(d + " " + end_time);
				start_time = start_time.getTime();
				end_time = end_time.getTime();
				if((start_time > end_time)  && !($('#timepicker1opt1').val() == "" || $('#timepicker1opt2').val() == "")) {
					$("[id$=greater1]").show();
					focused_element = $("#timepicker1opt1");
					check_iteration = false;
				}

				if(($("#timepicker1opt1").val() == $("#timepicker1opt2").val()) && !($('#timepicker1opt1').val() == "" || $('#timepicker1opt2').val() == "")) {
					$("[id$=equal1]").show();
					focused_element = $("#timepicker1opt1");
					check_iteration = false;
				}

				start_time = $("#timepicker2opt1").val();
				end_time = $("#timepicker2opt2").val();
				d = (new Date()).getYear() + '-' + ((new Date()).getMonth()+1) + '-' + (new Date()).getDate();
				//d = "2015-03-25";
				start_time = spaceAMPM(start_time);
				end_time = spaceAMPM(end_time);
				start_time = new Date(d + " " + start_time);
				end_time = new Date(d + " " + end_time);
				start_time = start_time.getTime();
				end_time = end_time.getTime();
				if((start_time > end_time) && !($('#timepicker2opt1').val() == "" || $('#timepicker2opt2').val() == "")) {
					$("[id$=greater2]").show();
					focused_element = $("#timepicker2opt1");
					check_iteration = false;
				}

				if(($("#timepicker2opt1").val() == $("#timepicker2opt2").val()) && !($('#timepicker2opt1').val() == "" || $('#timepicker2opt2').val() == "")) {
					$("[id$=equal2]").show();
					focused_element = $("#timepicker2opt1");
					check_iteration = false;
				}

				if($('#DgroupType').val() == "Married") {
					if($(civilstatusid).val() == "Single" || $(civilstatusid).val() == "Single Parent" || $(civilstatusid).val() == "Annulled") {
						$('#DgroupType-spouse').show();
						focused_element = $('#DgroupType');
						check_iteration = false;
					}
				}
				else if($('#DgroupType').val() == "Single") {
					if($(civilstatusid).val() == "Married" || $(civilstatusid).val() == "Widow/er" || $(civilstatusid).val() == "Annulled") {
						$('#DgroupType-nospouse').show();
						focused_element = $('#DgroupType');
						check_iteration = false;
					}
				}
				else if($('#DgroupType').val() == "Youth") {
					if($(civilstatusid).val() == "Married" || $(civilstatusid).val() == "Widow/er" || $(civilstatusid).val() == "Annulled") {
						$('#DgroupType-spouse').show();
						focused_element = $('#DgroupType');
						check_iteration = false;
					}
					else if($(civilstatusid).val() == "Separated"){
						$('#DgroupType-separated').show();
						focused_element = $('#DgroupType');
						check_iteration = false;
					}
				}
				else if($('#DgroupType').val() == "Couples"){
					if($(civilstatusid).val() == "Single" || $(civilstatusid).val() == "Single Parent"){
						$('#DgroupType-single').show();
						focused_element = $('#DgroupType');
						check_iteration = false;
					}
				}
				else if($('#DgroupType').val() == "Single Parents"){
					if($(civilstatusid).val() == "Married"){
						$('#DgroupType-spouse').show();
						focused_element = $('#DgroupType');
						check_iteration = false;
					}
				}
			}

			$($('form#registration #'+getCurrentPage()).find('input, select').reverse()).each(function(){
				if($(this).prop('required')) {
					if($(this).val() == "") {
						$('small#'+this.id+'-required').show();
						focused_element = $(this);
						disableDefaultRequired($(this));
						check_iteration = false;
					}
					else if(this.id == "EmailAd") {
						if(!isValidEmailAddress($(this).val())) {
							$('#Invalid-Email').show();
							//$('#'+this.id).focus();
							focused_element = $(this);
							disableDefaultRequired($(this));
							check_iteration = false;
						}
					}
					else if(this.id.split("_")[0] == "Gender"){
						if(!($('#'+this.id.split("_")[0]+'_Male').prop("checked") || $('#'+this.id.split("_")[0]+'_Female').prop("checked"))) {
							$('#Gender-required').show();
							focused_element = $(this);
							disableDefaultRequired($(this));
							check_iteration = false;
						}
					}
					else if(this.id == "CivilStatus") {
						if($(this).val() == null) {
							$('small#'+this.id+'-required').show();
							focused_element = $(this);
							disableDefaultRequired($(this));
							check_iteration = false;
						}
					}
					else if(this.id == "Option1Day") {
						if($(this).val() == null) {
							$('small#'+this.id+'-required').show();
							focused_element = $(this).parent();
							disableDefaultRequired($(this));
							check_iteration = false;
						}
					}
					else if(this.id == "Option2Day") {
						if($(this).val() == null) {
							$('small#'+this.id+'-required').show();
							focused_element = $(this).parent();
							disableDefaultRequired($(this));
							check_iteration = false;
						}
					}
					else if(this.id == "DgroupType") {
						if($(this).val() == null) {
							$('small#'+this.id+'-required').show();
							focused_element = $(this).parent();
							disableDefaultRequired($(this));
							check_iteration = false;
						}
					}
					else if(this.id == "username") {
						checkUsername();
						check_username = false;
					}
				}
			});

			var pass = $("#password").val();
			var confirmpass = $("#confirm-password").val();
			if(confirmpass!=pass) {
				if(confirmpass!="") {
					$("small#checkpass-required").show();
					focused_element = $('#confirm-password');
					disableDefaultRequired($('#confirm-password'));
					check_iteration = false;
				}
			}

			if(check_username)
				nextPage();
		});

		function nextPage() {
			if(getCurrentPage() == 'page6'){
				filterDgroupTable();
			}

			if(!check_iteration) // checks if there is mali in form
				scrollTo(focused_element); // scrolls to focused element

			if(check_iteration && check_username) {
				confirmvalidated = true;
				if(checkLastPage()) {
					confirmvalidated = false;
				}
				pagination(1);

				if(getCurrentPage() == 'page7' && !isCellActive){
					$('#next').prop("disabled", true);
				}
			}
		}

		// USERNAME VALIDATION
		//setup before functions
		var typingTimer;                //timer identifier
		var doneTypingInterval = 500;  //time in ms, 5 second for example
		var $input = $('#username');

		//on keyup, start the countdown
		$input.on('keyup', function () {
		  clearTimeout(typingTimer);
		  typingTimer = setTimeout(doneTyping, doneTypingInterval);
		});

		//on keydown, clear the countdown 
		$input.on('keydown', function () {
		  clearTimeout(typingTimer);
		});

		//user is "finished typing," do something
		function doneTyping() {
			$('#username').trigger("change");
		}

		function checkUsername() {
			// when username error appears, it will be display:none if next is clicked
			$('#username-required').hide();
			$('small#notusername').show();
			var preloader = '\
				<div class="preloader-wrapper small-username active"> \
					<div class="spinner-layer spinner-blue-only spinner-color-theme"> \
						<div class="circle-clipper left"> \
							<div class="circle"></div> \
						</div><div class="gap-patch"> \
							<div class="circle"></div> \
						</div><div class="circle-clipper right"> \
							<div class="circle"></div> \
						</div> \
					</div> \
				</div> \
					  ';
			var url = "check-username.php";
			$('#next').prop("disabled", true);
			$('small#notusername').html(preloader);
			$.ajax({
				type: 'POST',
				url: url,
				data: 'username='+$('#username').val(),
				success: function(data){
					// async should be true if there is bad user experience
					if(data == 1) {
						$('small#notusername').text($('#username').val() + " is already taken.").css("color", "#ff3333");
						focused_element = $('#username');
						disableDefaultRequired($('#username'));
						check_iteration = false;
						$('#next').prop("disabled", false);
						check_username = false;
					}
					else {
						if($('#username').val() != "") {
							$('small#notusername').text($('#username').val() + " is available.").css("color", "#33cc33");
							setTimeout(function() {
								$('#next').prop("disabled", false);
								check_username = true;
								nextPage();
							}, 1000);
						}
						else {
							$('small#notusername').hide();
							$('#next').prop("disabled", false);
						}
					}
				}
			});
		}

		function checkLastPage() {
			var currentpageid = getCurrentPage(), pagelength = currentpageid.length, pagenumber = currentpageid.charAt(pagelength-1);
			pagenumber++; // page that is after the previous
			var lastpage = currentpageid.slice(0, pagelength - 1) + pagenumber;
			if($('#'+lastpage).length > 0) return false;
			else return true;
		}

		function removeLeadingZero(time_value) {
			return time_value.slice(1, time_value.length);
		}

		function spaceAMPM(time_value) {
			// puts a space before AM or PM for formatting purposes
			// Date constructor won't accept spaces like 8:24PM; it should be 8:24 PM
			time_value = time_value.replace("AM", " AM");
			time_value = time_value.replace("PM", " PM");
			return time_value;
		}

		function isValidEmailAddress(emailAddress) { // this function checks if the email is valid or not
			var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
			return pattern.test(emailAddress);
		};

		function getCurrentPage() {
			var cp = "page"+currentpage;
			return cp;
		}

		/*
		 *		INFORMATION ABOUT WILDCARDS
		 *		^=<string> --> elements starting with <string>
		 *		$=<string> --> elements ending with <string>
		 *
		 */
		/* ===== SMOOTH SCROLLING EVENT HANDLER ===== */
		var confirmvalidated = false; // confirms if every form is verified and validated; set flag to true if validated, same as validated flag

		$("[id$=back]").click(function() {
			confirmvalidated = true;
			check_iteration = true;
			check_username = true;
			$('#next').prop("disabled", false);
		});

		$("[id$=next], [id$=back]").click(function() {
			if(confirmvalidated) {
				animateBodyScrollTop();
				confirmvalidated = false;
			}
		});

		function animateBodyScrollTop() {
			$("body").animate({
				scrollTop: 0
			}, 300, "swing");
		}

		function getCurrentPosition(elem) {
		// gets the current top position of an element relative to the document
			var offset = elem.offset();
			return offset.top;
		}

		function scrollTo(elem) {
			var positionscroll = parseInt(getCurrentPosition(elem));
			var positionscrolltop = positionscroll - 200;
		// this function also serves for when focusing an element, it scrolls to that particular element
			$("body").animate({
				scrollTop: positionscrolltop
			}, 300, "swing");
			elem.focus();
		}

		// computes age every change of value of date
		var age;
		$('#Birthdate').change(function() {
			var birthdate = $(this).val();
			var day = birthdate.split(",")[0].split(" ")[0], month = birthdate.split(",")[0].split(" ")[1], year = birthdate.split(",")[1];
			birthdate = month + " " + day + "," + year;
			birthdate = new Date(birthdate);
			var birthyear = birthdate.getYear();
			age = (new Date()).getYear() - birthyear;
		});

		function removeLeadingSpace(value) {
			return value.slice(1, value.length);
		}

		/* ===== END ===== */
		/*----------------------------------end code ni paolo----------------------------------------*/
		var gender = "";
		var dgrouptype = "";

		$('[id^=Gender]').click(function() {
			if($('#Gender_Male').prop("checked"))
				gender = $('#Gender_Male').val();
			else
				gender = $('#Gender_Female').val();
			filterDgroupTable();
		});

		$('#DgroupType').change(function(){
			dgrouptype = $(this).val();
			filterDgroupTable();
		});

		function filterDgroupTable(){
			//alert(gender);
			var gd = 1, a = 1, start_age, end_age, all = false;
			if(dgrouptype == "All")
				all = true;
			$('#table').find('tr').each(function(d){
				$(this).children().each(function(e){

					if(d == 0) { $(this).parent().show(); }
					else if(e == 2) {
						//alert($(this).text());
						if($(this).text() != gender) {
							$(this).parent().hide();
						}
						else {
							$(this).parent().show(); //(caution logic)
						}
					}
					else if(e == 3){
						if($('#gender_'+gd).text() != gender || $(this).text() != dgrouptype){
							$(this).parent().hide();
						}
						else {
							$(this).parent().show();
						}
						gd++;
					}
					else if(e == 4) {
						start_age = parseInt($(this).text().split("-")[0]);
						end_age = parseInt($(this).text().split("-")[1]);
						if($('#gender_'+a).text() != gender || $('#dgrouptype_'+a).text() != dgrouptype || (age < start_age || age > end_age)) {
							$(this).parent().hide();
						}
						else {
							$(this).parent().show();
						}
						a++;
					}
				});
			});
			i = 0;
		}
	</script>
	<footer>
	</footer>
</html>