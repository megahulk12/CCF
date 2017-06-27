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
	</style>

	<script>
		$(document).ready(function(){
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 15 // Creates a dropdown of 15 years to control year
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
			
  			//new version of timepicker
  			/*
			$('.timepicker').pickatime({
				default: 'now', // Set default time
				fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
				twelvehour: true, // Use AM/PM or 24-hour format
				donetext: 'OK', // text for done-button
				cleartext: 'Clear', // text for clear-button
				canceltext: 'Cancel', // Text for cancel-button
				autoclose: false, // automatic close timepicker
				ampmclickable: true, // make AM PM clickable
				aftershow: function(){} //Function for after opening timepicker  
			});
			*/
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
				<form method="post" class="register" id="registration" name="myForm" action="index.php"> <!--if php is applied, action value will then become the header -->
					<div id="page1">
						<h3 class="center">Personal Information</h3>
						<div class="row">
							<div class="input-field col s12">
								<input type="text" class="validate" name="Lastname" id="Lastname" data-length="20" maxlength="20">
								<label for="Lastname">Lastname</label>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="Firstname" id="Firstname" data-length="20" maxlength="20">
								<label for="Firstname">Firstname</label>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="Middlename" id="Middlename" data-length="20" maxlength="20">
								<label for="Middlename">Middlename</label>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="Nickname" id="Nickname" data-length="20" maxlength="20">
								<label for="Nickname">Nickname</label>
							</div>
							<div class="input-field col s12">
								<input type="date" class="datepicker validate" id="Birthdate" name="Birthdate">
								<label for="Birthdate" class>Birthdate</label>
							</div>
						</div>
					</div>
					<div id="page2" style="display: none;">
						<h3 class="center">Other Information</h3>
						<div class="row">
							<p style="margin-top: 40px;">
								<label for="Gender" style="margin-left: 10px; font-size:15px;">Gender</label>
								<spans>
									<input type="radio" id="Gender_Male" name="Gender" value="Male"/>
									<label for="Gender_Male">Male</label>
									<input type="radio" id="Gender_Female" name="Gender" value="Female"/>
									<label for="Gender_Female">Female</label>
								</span>
							</p>
							<div class="input-field col s12">
								<input type="text" class="validate" name="Citizenship" id="Citizenship" data-length="20" maxlength="20">
								<label for="Citizenship">Citizenship</label>
							</div>
							<div class="row" style="margin-bottom: 0px;"> <!-- margin-bottom removes gap at the bottom of the control -->
								<div class="input-field col s12">
									<select id="CivilStatus" name="CivilStatus">
										<option value="" disabled selected>Choose your option...</option>
										<option value="Single">Single</option>
										<option value="Single Parent">Single Parent</option>
										<option value="Married">Married</option>
										<option value="Annulled">Annulled</option>
										<option value="Separated">Separated</option>
										<option value="Widow/er">Widow/er</option>
									</select>
									<label>Civil Status</label>
								</div>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="mobilenumber" id="mobilenumber" onkeypress='return event.charCode >= 48 && event.charCode <= 57 //only numbers on keypress' data-length="18" maxlength="18">
								<label for="mobilenumber" name="mobilenumber">Mobile Number</label>
							</div>
							<div class="input-field col s12">
								<input type="email" class="validate" name="email" id="email" data-length="30" maxlength="30"> <!-- increase size of email address -->
								<label for="email" name="nickname" data-error="Invalid email address">Email Address</label>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="profession" id="profession" data-length="30" maxlength="30">
								<label for="profession" name="profession">Profession/Occupation</label>
							</div>
						</div>
					</div>
					<div id="page3" style="display: none;">
						<h3 class="center">Other Information</h3>
						<h4 class="center">Home</h4>
						<div class="row" style="margin-top: 0px;">
							<div class="input-field col s12">
								<input type="text" class="validate" name=HomeAddress" id="HomeAddress" data-length="50" maxlength="50">
								<label for="HomeAddress" style=" font-size:14px;">Address</label>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="HomePhoneNumber" id="HomePhoneNumber" data-length="18" maxlength="18">
								<label for="HomePhoneNumber">Home Phone Number</label>
							</div>
							<h4 class="center">Company</h4>
							<div class="input-field col s12">
								<input type="text" class="validate" name="CompanyName" id="CompanyName" data-length="30" maxlength="30">
								<label for="CompanyName">Company Name</label>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="CompanyContactNum" id="CompanyContactNum" data-length="18" maxlength="18">
								<label for="CompanyContactNum">Company Contact Number</label>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name=CompanyAddress" id="CompanyAddress" data-length="50" maxlength="50">
								<label for="CompanyAddress" style=" font-size:14px;">Company Address</label>
							</div>
							<h4 class="center">School</h4>
							<div class="input-field col s12">
								<input type="text" class="validate" name="SchoolName" id="SchoolName" data-length="30" maxlength="30">
								<label for="SchoolName">School Name</label>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="SchoolContactNum" id="SchoolContactNum" data-length="18" maxlength="18">
								<label for="SchoolContactNum">School Contact Number</label>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="SchoolAddress" id="SchoolAddress" data-length="50" maxlength="50">
								<label for="SchoolAddress" style=" font-size:14px;">School Address</label>
							</div>
							<h4 class="center">Spouse</h4>
							<div class="input-field col s12">
								<input type="text" class="validate" name="SpouseName" id="SpouseName" data-length="30" maxlength="30">
								<label for="SpouseName">Spouse Name</label>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="SpouseMobileNumber" id="SpouseMobileNumber" data-length="18" maxlength="18">
								<label for="SpouseMobileNumber">Spouse Mobile Number</label>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="SpouseAddress" id="SpouseAddress" data-length="50" maxlength="50">
								<label for="SpouseAddress" style=" font-size:14px;">Spouse Address</label>
							</div>
						</div>
					</div>

					<div id="page4" style="display: none;">
						<h3 class="center">Preferences</h3>
						<div class="row">
							<div class="input-field col s12">
								<input type="text" class="validate" name=Language" id="Language" data-length="20" maxlength="20">
								<label for="Language">Language</label>
							</div>
							<h4 class="center">Schedule</h4>
							<h5 class="center">Option 1</h5>
							<div class="row" style="margin-bottom: 0px;">
								<div class="input-field col s12">
									<select id="Option1Day" name="Option1Day">
										<option value="" disabled selected>Choose your option...</option>
										<option value="Sunday">Sunnday</option>
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										<option value="Saturday">Saturday</option>
									</select>
									<label>Day</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<label for="timepicker1opt1">Start Time</label>
									<input type="date" class="timepicker" name="timepicker1opt1" id="timepicker1opt1">
								</div>
								<div class="input-field col s6 right">
									<label for="timepicker2opt1">End Time</label>
									<input type="date" class="timepicker" name="timepicker2opt1" id="timepicker2opt1">
								</div>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="Option1Venue" id="Option1Venue" data-length="50" maxlength="50">
								<label for="Option1Venue" style=" font-size:14px;">Venue</label>
							</div>
							<h5 class="center">Option 2</h5>
							<div class="row" style="margin-bottom: 0px;">
								<div class="input-field col s12">
									<select id="Option2Day" name="Option2Day">
										<option value="" disabled selected>Choose your option...</option>
										<option value="Sunday">Sunnday</option>
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										<option value="Saturday">Saturday</option>
									</select>
									<label>Day</label>
								</div>
							</div>
								<div class="input-field col s6">
									<label for="timepicker1opt2">Start Time</label>
									<input type="date" class="timepicker" name="timepicker1opt2" id="timepicker1opt2">
								</div>
								<div class="input-field col s6">
									<label for="timepicker2opt2">End Time</label>
									<input type="date" class="timepicker" name="timepicker2opt2" id="timepicker2opt2">
								</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="Option2Venue" id="Option2Venue" data-length="50" maxlength="50">
								<label for="Option2Venue" style=" font-size:14px;">Venue</label>
							</div>
						</div>
					</div>
					<div id="page5" style="display: none;">
						<h3 class="center">Preferences</h3>
						<div class="row">
							<div class="row">
								<div class="input-field col s12">
									<textarea id="receivedChrist" class="materialize-textarea validate" name="receivedChrist" data-length="300" maxlength="300"></textarea>
									<label for="receivedChrist">When did you receive Christ as your Lord and Savior?</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea id="attendCCF" class="materialize-textarea validate" name="attendCCF" data-length="300" maxlength="300"></textarea>
									<label for="attendCCF">How long you have been attending CCF?</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea id="regularlyAttendsAt" class="materialize-textarea validate" name="regularlyAttendsAt" data-length="300" maxlength="300"></textarea>
									<label for="regularlyAttendsAt">Where do you regularly attend?</label>
								</div>
							</div>
						</div>
					</div>
					<div id="page6" style="display: none;">
						<h3 class="center">Account</h3>
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">account_circle</i> <!-- person_outline -->
								<input type="text" class="validate" name="username" data-length="45" maxlength="45">
								<label for="icon_prefix" name="lblusername">Username</label>
							</div>
							<div class="input-field col s12">
								<i class="material-icons prefix">lock</i> <!-- lock_outline -->
								<input type="password" class="validate" name="password" data-length="45" maxlength="45">
								<label for="password" name="lblpassword">Password</label>
							</div>
						</div>
					</div>
					<div id="page7" style="display: none;">
						<h3 class="center">Choose a Dgroup Leader</h3>
						<div class="row">
							<table class="cursor centered" id="table" width="60%">
								<thead>
									<th style="width: <?php echo widthRow(3); ?>%">Name of Dgroup Leader</th>
									<th style="width: <?php echo widthRow(3); ?>%">Day</th>
									<th style="width: <?php echo widthRow(3); ?>%">Schedule</th>
								</thead>
								<tr id="row1" onclick="cellActive('row1')">
									<td>Sample 1</td>
									<td>Sample 1</td>
									<td>Sample 1</td>
								</tr>
								<tr id="row2" onclick="cellActive('row2')">
									<td>Sample 2</td>
									<td>Sample 2</td>
									<td>Sample 2</td>
								</tr>
								<tr id="row3" onclick="cellActive('row3')">
									<td>Sample 3</td>
									<td>Sample 3</td>
									<td>Sample 3</td>
								</tr>
							</table>
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
	</script>
	<footer>
	</footer>
</html>