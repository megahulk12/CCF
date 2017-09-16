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
		$schoolname = $_POST["SchoolName"];

		// parent table fields
		$firstname = $_POST["Firstname"];
		$middlename = $_POST["Middlename"];
		$lastname = $_POST["Lastname"];
		$nickname = $_POST["Nickname"];
		$birthdate = date("Y-m-d", strtotime($_POST["Birthdate"]));
		$gender = $_POST["Gender"];
		if ($gender == "Male") {
			$gender = 0;
		}
		else {
			$gender = 1;
		}
		$civilstatus = $_POST["CivilStatus"];
		$mobilenumber = $_POST["MobileNumber"];
		$profession = $_POST["Profession"];
		$dateJoined = date("Y-m-d");
		$dgorupmemberstatus = 1;
		$regusername = $_POST["username"];
		$regpassword = $_POST["password"];
		$memberType = 0; // dgroup member type

		$checkCompanyID = false;
		$checkSchoolID = false;
		$checkMemberID = false;

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$companyIDField = "";
		$schoolIDField = "";
		if($companyname != ""){
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
		}
		if($schoolname != "") {
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
		}
		$sql_parent = "INSERT INTO member_tbl(firstName, middleName, lastName, nickName, birthdate, gender, civilStatus, contactNum, occupation, dateJoined, username, password, companyID, schoolID, memberType) VALUES('$firstname', '$middlename', '$lastname', '$nickname', '$birthdate', '$gender', '$civilstatus', '$mobilenumber', '$profession', '$dateJoined', '$regusername', '$regpassword', ".getCompanyID($checkCompanyID).", ".getSchoolID($checkSchoolID).", $memberType);";
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
	<link href="materialize/timepicker/_old/css/materialize.clockpicker.css" rel="stylesheet" media="screen,projection">
	<script src="materialize/timepicker/src/js/materialize.clockpicker.js"></script>
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
			width:600px;
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
		/*==========END==========*/

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
		/*==========END==========*/

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

		.error-with-icon {
			color: #ff3333;
			margin-left: 43;
		}

		.error {
			color: #ff3333;
		}
		/* ============================END=========================== */  
	</style>

	<script>
		$(document).ready(function(){
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 100, // Creates a dropdown of 15 years to control year
				max: true
			});
			 
			$(document).ready(function() {
				$('select').material_select();
			}); 
		});

		function cellActive(id) { // this function allows you to highlight the table rows you select
			// ==========PLEASE FIX HIGHLIGHT EFFECT========== 
			var num_of_rows = document.getElementsByTagName("TR").length;
			var rownumber = id.charAt(3);
			for(var i = 0; i < num_of_rows; i++) {
				//document.getElementsByTagName("TR")[i].appendChild(style);
				document.getElementsByTagName("TR")[i].style.backgroundColor = "#fff"; // default color of rows = #f2f2f2
				document.getElementsByTagName("TR")[i].style.color = "black"
			}
			document.getElementById(id).style.backgroundColor = "#16A5B8";
			document.getElementById(id).style.color = "#fff";
			//document.getElementById("table").setAttribute("class", "highlight centered");
		}
	</script>

	<header>
	</header>
	<body>
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
								<small class="error" id="Lastname-required">This field is required.</small>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Firstname" id="Firstname" data-length="20" maxlength="20" required>
								<label for="Firstname">First Name</label>
								<small class="error" id="Firstname-required">This field is required.</small>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Middlename" id="Middlename" data-length="20" maxlength="20" required>
								<label for="Middlename">Middle Name</label>
								<small class="error" id="Middlename-required">This field is required.</small>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Nickname" id="Nickname" data-length="20" maxlength="20" required>
								<label for="Nickname">Nickname</label>
								<small class="error" id="Nickname-required">This field is required.</small>
							</div>
							<div class="input-field col s12">
								<input type="date" class="datepicker" id="Birthdate" name="Birthdate" required>
								<label for="Birthdate">Birthdate</label>
								<small class="error" id="Birthdate-required">This field is required.</small>
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
							<div class="row" style="margin-bottom: 0px;"> <!-- margin-bottom removes gap at the bottom of the control -->
								<div class="input-field col s12">
									<select id="CivilStatus" name="CivilStatus" required>
										<option value="" disabled selected>Choose your option...</option>
										<option value="Single">Single</option>
										<option value="Single Parent">Single Parent</option>
										<option value="Married">Married</option>
										<option value="Annulled">Annulled</option>
										<option value="Separated">Separated</option>
										<option value="Widow/er">Widow/er</option>
									</select>
									<label>Civil Status</label>
									<small class="error" id="Civilstatus-required">This field is required.</small>
								</div>
							</div>
							<div class="input-field col s12">
								<input type="text" name="MobileNumber" id="MobileNumber" onkeypress="return event.charCode >= 48 && event.charCode <= 57 //only numbers on keypress" data-length="18" maxlength="18" required>
								<label for="MobileNumber">Mobile Number</label>
								<small class="error" id="MobileNumber-required">This field is required.</small>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Profession" id="Profession" data-length="30" maxlength="30" required>
								<label for="Profession">Profession/Occupation</label>
								<small class="error" id="Profession-required">This field is required.</small>
							</div>
						</div>
					</div>
					<div id="page3" style="display: none;">
						<h3 class="center">Other Information</h3>
						<div class="row" style="margin-top: 0px;">
							<h4 class="center">Company</h4>
							<div class="input-field col s12">
								<input type="text" name="CompanyName" id="CompanyName" data-length="30" maxlength="30" required>
								<label for="CompanyName">Company Name</label>
								<small class="error" id="CompanyName-required">This field is required.</small>
							</div>
							<h4 class="center">School</h4>
							<div class="input-field col s12">
								<input type="text" name="SchoolName" id="SchoolName" data-length="30" maxlength="30" required>
								<label for="SchoolName">School Name</label>
								<small class="error" id="SchoolName-required">This field is required.</small>
							</div>
						</div>
					</div>
					<div id="page4" style="display: none;">
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
								$query = "SELECT username FROM member_tbl ";
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
								<small class="error-with-icon" id="noInput">This field is required.</small>
								<small class="error-with-icon" id="notusername">This username is already taken.</small>
							</div>
							'; // originally having a value of own password
							?>
							<div class="input-field col s12">
								<i class="material-icons prefix">lock</i> <!-- lock_outline -->
								<input type="password" name="password" data-length="16" maxlength="16" required>
								<label for="password">Password</label>
								<small class="error" id="password-required">This field is required.</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="progress col s6 left" style=" margin-left: 10px;">
							<div class="determinate" style="" id="progressbar"></div>
						</div>&nbsp; &nbsp; <label id="page" onload="labelpage()"></label> <!-- Change when page number adjusts -->
						<span id="submitbuttons">
							<button class="waves-effect waves-light btn col s2 right" type="button" name="submit_next" id="next" onclick="pagination(1)">NEXT</button>
							<button class="waves-effect waves-light btn col s2 right" type="button" name="submit_back" id="back" onclick="pagination(0)" style="margin-right: 10px; display: none;">BACK</button>
						</span>
					</div>
				</form>
			</div>
		</div>
	</body>

	<!-- scripts -->

	<script>
		var currentpage = 1, no_of_pages=4, percentage=(currentpage/no_of_pages)*100, currentprogress=percentage;

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
		/*----------------------code ni paolo---------------------------------------*/
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

		/*var pass = $("#password").val();
		var confirmpass = $("#confirm-password").val();
		if(confirmpass!=pass) {
			$("small#confirmpass-required").hide();
			$("small#checkpass-required").show();
			$("input#confirm-password").focus();
			check_iteration = false;
		}*/

		$("#next").click(function(){
			$('.error, .error-with-icon').hide(); // by default, hide all error classes
			$(this).blur();
			var check_iteration = true;
			var focused_element;

			//alert("hi");
			$($('form#registration #'+getCurrentPage()).find('input,select').reverse()).each(function() {
				if($(this).prop('required')) {
					if($(this).val() == "") {
						$('small#'+this.id+'-required').show();
						focused_element = $(this);
						disableDefaultRequired($(this));
						check_iteration = false;
					}
					else if(this.id.split("_")[0] == "Gender"){
							if(!($('#'+this.id.split("_")[0]+'_Male').prop("checked") || $('#'+this.id.split("_")[0]+'_Female').prop("checked"))) {
								$('#Gender-required').show();
								focused_element = $(this);
								disableDefaultRequired($(this));
								check_iteration = false;
							}
						}
					else if(this.id == 'username') {
						var url = "check-username.php";
						$.ajax({
							type: 'POST',
							url: url,
							async: false,
							data: 'username='+$(this).val(),
							success: function(data){
								// async should be true if there is bad user experience
								if(data == 1){
									$('small#notusername').show();
									focused_element = $(this);
									disableDefaultRequired($(this));
									check_iteration = false;
								}
							}
						});
					}
				}
			});

			if(!check_iteration) // checks if there is mali in form
				scrollTo(focused_element); // scrolls to focused element

			if(check_iteration) {
				confirmvalidated = true;
				if(checkLastPage()) {
					confirmvalidated = false;
				}
				pagination(1);
			}
		});

		function checkLastPage() {
			var currentpageid = getCurrentPage(), pagelength = currentpageid.length, pagenumber = currentpageid.charAt(pagelength-1);
			pagenumber++; // page that is after the previous
			var lastpage = currentpageid.slice(0, pagelength - 1) + pagenumber;
			if($('#'+lastpage).length > 0) return false;
			else return true;
		}

		/*function removeLeadingZero(time_value) {
			return time_value.slice(1, time_value.length);
		}

		function spaceAMPM(time_value) {
			// puts a space before AM or PM for formatting purposes
			// Date constructor won't accept spaces like 8:24PM; it should be 8:24 PM
			time_value = time_value.replace("AM", " AM");
			time_value = time_value.replace("PM", " PM");
			return time_value;
		}

		/*function isValidEmailAddress(emailAddress) { // this function checks if the email is valid or not
			var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
			return pattern.test(emailAddress);
		};*/

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

		/* ===== END ===== */
		/*--------------------------end code ni paolo--------------------------------------------------*/
	</script>
	<footer>
	</footer>
</html>