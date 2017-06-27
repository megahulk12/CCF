<?php include('session.php'); ?>
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
		nav ul a:hover {
			background-color: transparent;
		}

		nav {
			color: #777;
			background-color: #fff;
			width: 100%;
			height: 97px;
			line-height: 97px;
		}
		
		li a:hover {
			color: #16A5B8;
		}
		@font-face {
			font-family: proxima-nova;
			src: url(ccf-fonts/proxima/PROXIMANOVA-BOLD.otf);
			font-weight: bold;
		}

		nav ul li a {
			font-family: proxima-nova;
			color: #777;
			font-size: 13px;
		}

		.dropdown-content-list {
		 	 background-color: #fff;	
		 	 display: none;
		 	 min-width: 250px;
			 max-height: 650px;
			 overflow-y: auto;
		 	 opacity: 0;
		 	 position: absolute; /*original: absolute*/
		 	 z-index: 999;
		 	 will-change: width, height;
		 	 margin-top: 97px;
		 	 margin-left: -139px; /*shift to the left; alignment of link and dropdown */
		}

		.dropdown-content-list li {
		 	  clear: both;
			  color: rgba(0, 0, 0, 0.87);
			  cursor: pointer;
			  min-height: 50px;
			  line-height: 1.5rem;
			  width: 250px;
			  text-align: left;
			  text-transform: none;
		}

		.dropdown-content-list li > a, .dropdown-content-list li > span {
		  	font-size: 16px;
		  	color: #777 !important;
		  	display: block;
		  	line-height: 22px
		  	padding: 14px 16px;
		}

		.dropdown-content-notification {
		 	 background-color: #fff;	
		 	 display: none;
		 	 min-width: 400px;
		 	 max-height: 350px !important;
			 overflow-y: auto;
		 	 opacity: 0;
		 	 position: relative; /*original: absolute*/
		 	 z-index: 999;
		 	 will-change: width, height;
		 	 margin-top: 97px;
		}

		.dropdown-content-notification li {
		 	  clear: both;
			  color: rgba(0, 0, 0, 0.87);
			  cursor: pointer;
			  min-height: 50px;
			  line-height: 1.5rem;
			  width: 400px;
			  text-align: left;
			  text-transform: none;
		}

		.dropdown-content-notification li > a, .dropdown-content-notification li > span {
		  	font-size: 16px;
		  	color: #777 !important;
		  	display: block;
		  	line-height: 22px
		  	padding: 14px 16px;
		}

		/*collapsibles*/
		.collapsible-header {
			display: block;
			cursor: pointer;
		    -webkit-tap-highlight-color: transparent;
			min-height: 3rem;
			line-height: 3rem;
			padding: 0 1rem;
			background-color: #fff;
			color: #424242;
			border-bottom: 1px solid #ddd;
		}

		.collapsible-body {
		  	display: none;
		  	border-bottom: 1px solid #ddd;
		    -webkit-box-sizing: border-box;
		            box-sizing: border-box;
		  	padding: 2rem;
			color: #424242;
		}
		/*=======END=======*/

		/*form*/
		.profile {
			width: 900px;
			margin: 0;
		}

		.row-profile .col-profile {
			float: left;
			box-sizing: border-box;
			padding: 0; /*padding of the contents of card-panel*/
			min-height: 1px;
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

		/*===============BUTTONS===============*/

		/*=====FORM BUTTONS=====*/
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

		/*=====SIDE NAV BUTTONS=====*/
		.btn-side-nav, .btn-large-side-nav {
			text-decoration: none;
			color: #777;
			background-color: #fff;
			text-align: left;
			letter-spacing: .5px;
			transition: .2s ease-out;
			cursor: pointer;
			font-family: proxima-nova;
			font-size: 13px;
			border-radius: 0px;
			width: 250px; /*this width inherits the width of ul; manually change this when width of ul changes*/
			box-shadow: none;
			border-left: 3px solid transparent;
		}

		/*hover of button*/
		.btn-side-nav:hover, .btn-large-side-nav:hover {
			background-color: #f2f2f2;
			color: #424242;
			box-shadow: none;
			border-left: 3px solid #cccccc;
		}

		/*focus of button*/
		.btn-side-nav:focus, .btn-large-side-nav:focus,
		.btn-floating-side-nav:focus {
			color: #ccc;
			border-left: 3px solid #cccccc !important;
		}

		.side-nav-active {
			border-left: 3px solid #424242 !important;
			background-color: #fff !important;
		}

		.fixbutton {
		  	background-color: #16A5B8;
		  	color: #fff;
		}

		.profile-next-or-submit-button {
			margin-right: 20px;
		}

		/*===============END===============*/

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

		/*timepicker*/
		.clockpicker-span-am-pm {
		 	 display: inline-block;
		 	 font-size: 30px;
		 	 line-height: 82px;
		 	 color: #b2dfdb;
		}

		td {
		  	padding: 0;
		  	display: table-cell;
		  	text-align: left;
		  	vertical-align: middle;
		  	border-radius: 0px; /* complete horizontal hightlight bar*/
		}

		ul.sidenav {
			height: inherit;
			width: 250px; /*width for the side nav docked at left side of card panel*/
			/*margin-bottom: 157%;*/
			margin: 0;
			padding: 0;		
		}

		li.li-sidenav {
			width: inherit;
		}

		.content {
			width: 700px;
			border-left: 2px solid #cccccc;
		}

		td.fixed {
			height: 100%;
			padding-top: 4.5%;
		}

		.forms {
			margin-top: 20px;
			margin-bottom: 50px;
		}

		/* for alignment of notification icon and badge */
		nav i.material-icon-notification {
		  display: block;
		  font-size: 24px;
		  height: 0px; /* use this attribute to change vertiical alignment */ 
		  line-height: 56px;
		}

		.notifications {
			padding-top: 15px;
			height: 100%;
			position: relative;
		}

		.notifications-header, .notifications-body {
			font-family: proxima-nova;
			color: #777;
			font-size: 13px;
			text-transform: uppercase;
			margin: 20 0 0 20;
		}

		span.badge.new {
			font-weight: 300;
			font-size: 0.8rem;
			color: #fff;
			background-color: #16A5B8;
			border-radius: 2px;
			position: absolute;
			right: 20px;
			top: 15px;
		}

		.notification-badge {
			background-color: #16A5B8;
			color: #fff;
			border-radius: 50%;
			padding: 1px 3px;
			position: relative;
			top: 19px;
			left: 13px
		}
		/* for animation of notification
		.notifications {
			animation: notification ease-in-out 2s infinite;
			/*
			animation-name: notification;
			animation-duration: 0.3s;
			animation-iteration-count: infinite;
			animation-timing-function: ease-in-out;
			animation-direction: alternate;
		}

		@keyframes notification1 {
			0% { transform: rotate(0deg) }
			5% { transform: rotate(25deg) }
			15% { transform: rotate(-17deg) }
			25% { transform: rotate(13deg) }
			35% { transform: rotate(-7deg) }
			45% { transform: rotate(3deg) }
			55% { transform: rotate(-1deg) }
			60% { transform: rotate(0deg) }
			100% { transform: rotate(0deg) }
		}
		*/

		.extend {
			max-height: 350px !important;
		}
		/* ============================END=========================== */  
	</style>

	<script type="text/javascript">
		$(document).ready(function(){
			/* for dropdown on hover
			$('.dropdown-button-notification').dropdown({
				inDuration: 300,
				outDuration: 225,
				hover: true, // Activate on hover
				alignment: 'right' // Displays dropdown with edge aligned to the left of button
				}
			);
				*/
			$('.dropdown-button + .dropdown-content-notification').on('click', function(event) {
				event.stopPropagation(); // this event stops closing the notification page when clicked upon
			});
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

		// Initialize collapse button
		$(".button-collapse").sideNav();
		// Initialize collapsible (uncomment the line below if you use the dropdown variation)
		//$('.collapsible').collapsible();
		function disableFocus(element) {
			element.blur();
		}

		// functions for side nav
		function defaultActive() {
			document.getElementById('sidenav1').setAttribute("class", "waves-effect waves-light btn btn-side-nav side-nav-active");
		}
		function setActive(element) {
			removeActives();
			document.getElementById(element.id).setAttribute("class", "waves-effect waves-light btn btn-side-nav side-nav-active");
		}

		function removeActives() {
			for(var i = 1; i <= 4; i++) {
				document.getElementById("sidenav"+i).setAttribute("class", "waves-effect waves-light btn btn-side-nav");
			}
		}
	</script>

	<header class="top-nav">
	<!-- Dropdown Structure Account--> 
		<ul id="account" class="dropdown-content dropdown-content-list">
		  	<li><a href="profile.php"><i class="material-icons prefix>">mode_edit</i>Edit Profile</a></li>
		  	<li class="divider"></li>
		  	<li><a href="dgroup.php"><i class="material-icons prefix>">group</i>Dgroup</a></li>
		  	<li class="divider"></li>
		  	<li><a href="pministry.php"><i class="material-icons prefix>">group_add</i>Propose Ministry</a></li> <!-- for dgroup leaders view -->
		  	<li class="divider"></li>
		  	<li><a href="logout.php"><i class="material-icons prefix>">exit_to_app</i>Logout</a></li>
		</ul>
	<!-- Dropdown Structure Notifications-->
		<ul id="notifications" class="dropdown-content dropdown-content-notification">
			<li><h6 class="notifications-header">Notifications<span class="new badge">5</span></h6></li>
		  	<li class="divider"></li>
		  	<li><a href="endorsement.php">Dodong Laboriki has approved your endorsement request.</a></li>
		  	<li class="divider"></li>
		  	<li><a href="endorsement.php">Dodong Laboriki has approved your endorsement request.</a></li>
		  	<li class="divider"></li>
		  	<li><a href="endorsement.php">Dodong Laboriki has approved your endorsement request.</a></li>
		  	<li class="divider"></li>
		  	<li><a href="endorsement.php">Dodong Laboriki has approved your endorsement request.</a></li>
		</ul>
		<nav style="margin-bottom: 50px;">
			<div class="container">
			    <div class="nav-wrapper">
			      	<a href="index.php" class="brand-logo"><img src="resources/CCF Logos6" id="logo"/></a>
			      	<ul id="nav-mobile" class="right hide-on-med-and-down">
			      		<!-- FOR DGROUP MEMERS
			        	<li><a href="profile.php">PROFILE</a></li>
			      	  	<li><a href="dgorup.php">DGROUP</a></li> -->
						<li><a href="events.php">EVENTS</a></li>
						<li><a href="ministry.php">MINISTRIES</a></li>
						<?php if($_SESSION['active']) echo '<li><a class="dropdown-button" data-activates="account" style="position: relative;">'.strtoupper($_SESSION['user']).'<i class="material-icons right" style="margin-top: 14px;">arrow_drop_down</i></a></li>'; ?>
						<li><a class="dropdown-button notifications" data-activates="notifications"><i class="material-icons material-icon-notification">notifications</i><sup class="notification-badge">5</sup></a></li>
					</ul>
			    </div>
			</div>
		</nav>
	</header>

	<body onload="defaultActive()">
		<div class="row row-profile">
			<div class="col col-profile s12 card-panel z-depth-4">
				<table>
					<tr>
						<td class="fixed">
							<ul class="sidenav">
								<li classs="li-sidenav"><a id="sidenav1" class="waves-effect waves-light btn btn-side-nav" href="#cpinfo" onclick="setActive(this); navigationForms(1);" onfocus="disableFocus(this)">Personal Information</a></li>
								<li classs="li-sidenav"><a id="sidenav2" class="waves-effect waves-light btn btn-side-nav" href="#coinfo" onclick="setNavPage('coinfo', 2); setActive(this); navigationForms(2);" onfocus="disableFocus(this)">Other Information</a></li>
								<li classs="li-sidenav"><a id="sidenav3" class="waves-effect waves-light btn btn-side-nav" href="#cprefer" onclick="setNavPage('cprefer', 2); setActive(this); navigationForms(3);" onfocus="disableFocus(this)">Preferences</a</li>
								<li classs="li-sidenav"><a id="sidenav4" class="waves-effect waves-light btn btn-side-nav" href="#cpass" onclick="setActive(this); navigationForms(4);" onfocus="disableFocus(this)">Change Password</a></li>
							</ul>
						</td>
						<td class="content">
							<div class="container">
								<form method="post" class="forms">
									<div id="cpinfo">
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
												<input type="date" class="datepicker" id="Birthdate" name="Birthdate">
												<label for="Birthdate" class>Birthdate</label>
											</div>
											<div class="row">
												<button class="waves-effect waves-light btn profile-next-or-submit-button col s2 right fixbutton" type="submit" name="submit_pinfo">SUBMIT</button>
											</div>
										</div>
									</div>
								</form>
								<form method="post" class="forms">
									<div id="coinfo" style="display: none;">
										<div class="row">

											<!-- page 1 -->
											<div id="coinfo_page1">
												<p style="margin-top: 40px;">
													<label for="Gender" style="margin-left: 10px; font-size:15px;">Gender</label>
													<input type="radio" id="Gender_Male" name="Gender" value="Male"/>
													<label for="Gender_Male">Male</label>
													<input type="radio" id="Gender_Female" name="Gender" value="Female"/>
													<label for="Gender_Female">Female</label>
												</p>
												<div class="input-field col s12">
													<input type="text" class="validate" name="Citizenship" id="Citizenship" data-length="20" maxlength="20">
													<label for="Citizenship">Citizenship</label>
												</div>
												<div class="row" style="margin: 0"> <!-- all selects must be margin: 0 -->
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

											<!-- page 2 -->
											<div id="coinfo_page2" style="display: none;">
												<h4 class="center">Home</h4>
												<div class="input-field col s12">
													<input type="text" class="validate" name=HomeAddress" id="HomeAddress" data-length="50" maxlength="50">
													<label for="HomeAddress">Address</label>
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
													<label for="CompanyAddress">Company Address</label>
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
													<label for="SchoolAddress">School Address</label>
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
													<label for="SpouseAddress">Spouse Address</label>
												</div>
											</div>
											<div class="row">
												<div class="progress col s6 left" style=" margin-left: 3.3%;">
													<div class="determinate" style="" id="coinfo_progressbar"></div>
												</div>&nbsp; &nbsp;<label id="coinfo_page"></label> <!-- Change when page number adjusts -->
												<button class="waves-effect waves-light btn profile-next-or-submit-button col s2 right" type="button" name="submit_coinfo" id="coinfo_next" onclick="pagination(1, 'coinfo')">NEXT</button>
												<button class="waves-effect waves-light btn col s2 right" type="button" name="submit_back" id="coinfo_back" onclick="pagination(0,'coinfo')" style="margin-right: 10px; display: none;">BACK</button>
											</div>
										</div>
									</div>
								</form>
								<form method="post" class="forms">
									<div id="cprefer" style="display: none;">
										<div class="row">
											<!-- page 1 -->
											<div id="cprefer_page1">
												<div class="input-field col s12">
													<input type="text" class="validate" name=Language" id="Language" data-length="20" maxlength="20">
													<label for="Language">Language</label>
												</div>
												<h4 class="center">Schedule</h4>
												<h5 class="center">Option 1</h5>
												<div class="row" style="margin: 0">
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
													<div class="input-field col s6">
														<label for="timepicker1opt1">Start Time</label>
														<input type="date" class="timepicker" name="timepicker1opt1" id="timepicker1opt1">
													</div>
													<div class="input-field col s6">
														<label for="timepicker2opt1">End Time</label>
														<input type="date" class="timepicker" name="timepicker2opt1" id="timepicker2opt1">
													</div>
												<div class="input-field col s12">
													<input type="text" class="validate" name="Option1Venue" id="Option1Venue" data-length="50" maxlength="50">
													<label for="Option1Venue" style=" font-size:14px;">Venue</label>
												</div>
												<h5 class="center">Option 2</h5>
												<div class="row" style="margin: 0">
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

											<!-- page 2 -->
											<div id="cprefer_page2" style="display: none;">
												<div class="input-field col s12">
													<textarea id="receivedChrist" class="materialize-textarea validate" name="receivedChrist" data-length="300" maxlength="300"></textarea>
													<label for="receivedChrist">When did you receive Christ as your Lord and Savior?</label>
												</div>
												<div class="input-field col s12">
													<textarea id="attendCCF" class="materialize-textarea validate" name="attendCCF" data-length="300" maxlength="300"></textarea>
													<label for="attendCCF">How long you have been attending CCF?</label>
												</div>
												<div class="input-field col s12">
													<textarea id="regularlyAttendsAt" class="materialize-textarea validate" name="regularlyAttendsAt" data-length="300" maxlength="300"></textarea>
													<label for="regularlyAttendsAt">Where do you regularly attend?</label>
												</div>
											</div>

											<!-- progressbar & buttons -->
											<div class="row">
												<div class="progress col s6 left" style=" margin-left: 3.3%;">
													<div class="determinate" style="" id="cprefer_progressbar"></div>
												</div>&nbsp; &nbsp;<label id="cprefer_page"></label> <!-- Change when page number adjusts -->
												<button class="waves-effect waves-light btn profile-next-or-submit-button col s2 right" type="button" name="submit_cprefer" id="cprefer_next" onclick="pagination(1, 'cprefer')">NEXT</button>
												<button class="waves-effect waves-light btn col s2 right" type="button" name="submit_back" id="cprefer_back" onclick="pagination(0, 'cprefer')" style="margin-right: 10px; display: none;">BACK</button>
											</div>
										</div>
									</div>
								</form>
								<form method="post">
									<div id="cpass" style="display: none;">
										<div class="row">
											<div class="input-field col s12">
												<i class="material-icons prefix">lock</i> <!-- lock_outline -->
												<input type="password" class="validate" name="password" data-length="45" maxlength="45">
												<label for="password" name="lblpassword">Password</label>
											</div>
											<div class="row">
												<button class="waves-effect waves-light btn profile-next-or-submit-button col s2 right fixbutton" type="submit" name="submit_cpass">SUBMIT</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
	<script>
		var currentpage = 1, no_of_pages = 2, percentage=(currentpage/no_of_pages)*100, currentprogress=percentage;
		function setNavPage(navpage, num_of_pages) {
			// re-initialize every after visit of side navigation page
			currentpage = 1;
			percentage=(currentpage/no_of_pages)*100;
			currentprogress=percentage;

			// sets number of pages
			no_of_pages = num_of_pages;

			// initialization of profress bar controls
			document.getElementById(navpage+'_page').innerHTML = "Page "+currentpage+" of "+no_of_pages;
			document.getElementById(navpage+'_progressbar').style.width = currentprogress+"%";

			// goes back to pages 1 view for other info and preferences
			// page 1
			document.getElementById(navpage+'_page'+currentpage).style.display = "inline";
			document.getElementById(navpage+'_page'+currentpage).style.display = "inline";
			for(var i = 2; i <= no_of_pages; i++) {
				document.getElementById(navpage+'_page'+i).style.display = "none";
				document.getElementById(navpage+'_page'+i).style.display = "none";
			}

			// button stats reset
			document.getElementById(navpage+'_next').setAttribute("class", "waves-effect waves-light btn profile-next-or-submit-button col s2 right");
			document.getElementById(navpage+'_next').innerHTML = "NEXT";
			document.getElementById(navpage+'_back').style.display = "none";
			document.getElementById(navpage+'_next').blur();
			document.getElementById(navpage+'_back').blur();
		}
		function labelpage(navpage) {
			document.getElementById(navpage+'_page').innerHTML = "Page "+currentpage+" of "+no_of_pages;
		}
		function pagination(direction, navpage) {
			if(direction == 0) {
				if(currentpage == 2) {
					document.getElementById(navpage+'_back').style.display = "none";
					document.getElementById(navpage+'_page'+currentpage).style.display = "none";
					currentpage--;
					document.getElementById(navpage+'_page'+currentpage).style.display = "inline";
					currentprogress-=percentage;
					document.getElementById(navpage+'_page').innerHTML = "Page "+currentpage+" of "+no_of_pages;
					document.getElementById(navpage+'_progressbar').style.width = currentprogress+"%";
					document.getElementById(navpage+'_back').href = "#"+navpage+"page"+currentpage;
					document.getElementById(navpage+'_back').blur();
				}
				else {
					document.getElementById(navpage+'_page'+currentpage).style.display = "none";
					currentpage--;
					document.getElementById(navpage+'_page'+currentpage).style.display = "inline";
					currentprogress-=percentage;
					document.getElementById(navpage+'_page').innerHTML = "Page "+currentpage+" of "+no_of_pages;
					document.getElementById(navpage+'_progressbar').style.width = currentprogress+"%";
					document.getElementById(navpage+'_back').href = "#"+navpage+"page"+currentpage;
					document.getElementById(navpage+'_back').blur();
				}
				// removes color of submit button attached to this button ~bug
				document.getElementById(navpage+'_next').setAttribute("class", "waves-effect waves-light btn profile-next-or-submit-button col s2 right");
				document.getElementById(navpage+'_next').innerHTML = "NEXT";
			}
			else {
				if(currentpage == no_of_pages) {
					document.getElementById(navpage+'_page'+currentpage).style.display = "none";
					document.getElementById(navpage+'_page'+currentpage).style.display = "inline";
					document.getElementById(navpage+'_page').innerHTML = "Page "+currentpage+" of "+no_of_pages;
					document.getElementById(navpage+'_progressbar').style.width = currentprogress+"%";
					document.getElementById(navpage+'_back').style.display = "inline";
					document.getElementById(navpage+'_next').href = "#"+navpage+"page"+currentpage;

					document.getElementById(navpage+'_next').onclick = submitOnClick(navpage);
				}
				else {
					document.getElementById(navpage+'_page'+currentpage).style.display = "none";
					currentpage++;
					document.getElementById(navpage+'_page'+currentpage).style.display = "inline";
					currentprogress+=percentage;
					document.getElementById(navpage+'_page').innerHTML = "Page "+currentpage+" of "+no_of_pages;
					document.getElementById(navpage+'_progressbar').style.width = currentprogress+"%";
					document.getElementById(navpage+'_back').style.display = "inline";
					document.getElementById(navpage+'_next').href = "#"+navpage+"page"+currentpage;
					document.getElementById(navpage+'_next').blur();
					if(currentpage == no_of_pages) { /*at last page, button changes from next to submit*/
						// fixbutton puts the color of submit button
						document.getElementById(navpage+'_next').innerHTML = "SUBMIT";
						document.getElementById(navpage+'_next').setAttribute("class", "waves-effect waves-light btn profile-next-or-submit-button col s2 right fixbutton");
					}
				}
			}
		}

		function submitOnClick(navpage) {
			document.getElementById(navpage+'_next').setAttribute("type", "submit");
			//document.myForm.submit();
			/*
			$["#next"].click(function() {
				$("button[name='submit_next']").prop("type", "submit"); //jquery-3
			});
			*/
		}

		var navcurrentpage = 1;
		function navigationForms(page) {
			if(page == 1) {
				document.getElementById('cpinfo').style.display = "inline";
				document.getElementById('coinfo').style.display = "none";
				document.getElementById('cprefer').style.display = "none";
				document.getElementById('cpass').style.display = "none";
			}
			else if (page == 2) {
				document.getElementById('cpinfo').style.display = "none";
				document.getElementById('coinfo').style.display = "inline";
				document.getElementById('cprefer').style.display = "none";
				document.getElementById('cpass').style.display = "none";
			}
			else if (page == 3) {
				document.getElementById('cpinfo').style.display = "none";
				document.getElementById('coinfo').style.display = "none";
				document.getElementById('cprefer').style.display = "inline";
				document.getElementById('cpass').style.display = "none";
			}
			else if (page == 4) {
				document.getElementById('cpinfo').style.display = "none";
				document.getElementById('coinfo').style.display = "none";
				document.getElementById('cprefer').style.display = "none";
				document.getElementById('cpass').style.display = "inline";
			}
		} 
	</script>
	<footer>
	</footer>
</html>