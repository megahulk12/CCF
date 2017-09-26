<?php 
	include('session.php');
	include('globalfunctions.php');
?>
<?xml version = ″1.0″?>
<!DOCTYPE html PUBLIC ″-//w3c//DTD XHTML 1.1//EN″ “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns = ″http://www.w3.org/1999/xhtml″>
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
	<link href="nouislider.css" rel="stylesheet" media="screen,projection">
	<script src="nouislider.js"></script>

	<!-- for alerts -->
	<script src="alerts/dist/sweetalert-dev.js"></script>
	<link rel="stylesheet" type="text/css" href="alerts/dist/sweetalert.css">
	<title><?php if(notifCount() >= 1) echo '('.notifCount().')' ?> Christ's Commission Fellowship</title>	
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
			position: fixed;
			top: 0; /* this is responsible for fixed nav bars */
			color: #777;
			background-color: #fff;
			width: 100%;
			height: 97px;
			line-height: 97px;
			z-index: 2;
		}

		/* this is responsible for fixed nav bars */
		body {
			margin-top: 150px;
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
		 	 max-height: 350px !important;
			 overflow-y: auto;
			 overflow-x: hidden;
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
			 overflow-x: hidden;
		 	 opacity: 0;
		 	 position: relative; /*original: absolute*/
		 	 z-index: 999;
		 	 will-change: width, height;
		 	 margin-top: 97px;
		 	 height: 350px;
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

		.error-with-icon {
			color: #ff3333;
			margin-left: 43;
		}

		.error {
			color: #ff3333;
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
		  	color: #fff;
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
			margin-right: 7px;
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
		 	 /*margin: 0.5rem 0 1rem 0;*/
		 	 margin: 0 !important;
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

		.forms {
			margin-top: 50px;
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
			border-radius: 100%;
			padding: 1 4 1 4;
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

		/*tables*/
		table.cursor > tbody > tr:hover {
			cursor: hand;
		}

		td.choose {
		  	padding: 15px 5px;
		  	display: table-cell;
		  	text-align: left;
		  	vertical-align: middle;
		  	border-radius: 0px; /* complete horizontal hightlight bar*/
		}
		/* ============================END=========================== */  

		/* ===== FOOTER ===== */
		.page-footer {
			margin-top: 20px;
			background-color: #16A5B8;
		}

		p.footer-cpyrght {
			font-family: sans-serif;
			color: #fff;
		}
		/* ===== END ===== */

		/* ===== PRELOADER ===== */
		.preloader-wrapper.small {
			width: 24px;
			height: 24px;
		}

		.spinner-color-theme {
			border-color: rgba(0, 0, 0, 0.2);
		}

		.spinner-notif {
			position: relative;
			left: 190px; /* half of width of notif list*/
			top: 100px; /* half of height of notif list*/
		}

		.spinner-color-notif {
			border-color: #777;
		}
		/* ===== END ===== */
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
				selectYears: 100, // Creates a dropdown of 15 years to control year
				max: true
			});
			 
			$(document).ready(function() {
				$('select').material_select();
			}); 

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
				//default: 'now', // Set default time; do not set default time in viewing of time
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

		// Initialize collapse button
		$(".button-collapse").sideNav();
		// Initialize collapsible (uncomment the line below if you use the dropdown variation)
		//$('.collapsible').collapsible();
		function disableFocus(element) {
			element.blur();
		}

		// functions for side nav
		var prev_active_page;
		function defaultActive() {
			document.getElementById('sidenav1').setAttribute("class", "waves-effect waves-light btn btn-side-nav side-nav-active");
			setNavPage('register', 6);
		}

		function setActive(element) {
			removeActives();
			document.getElementById(element.id).setAttribute("class", "waves-effect waves-light btn btn-side-nav side-nav-active");
			//active_page = element.id[element.id.length - 1];
		}

		function removeActives() {
			var no_of_side_nav_links = $(".sidenav a").length;
			for(var i = 1; i <= no_of_side_nav_links; i++) {
				document.getElementById("sidenav"+i).setAttribute("class", "waves-effect waves-light btn btn-side-nav");
			}
		}

		function setBirthdate(date) {
			document.getElementById("Birthdate").value = date;
		}

		function reTextArea(a, b, c) {
			// re-initializes text areas

			$(document).ready(function(){
				// when dynamic changes are applied to textareas, reinitialize autoresize (call it again)
				$('#receivedChrist').val(a);
				$('#receivedChrist').trigger('autoresize');

				$('#attendCCF').val(b);
				$('#attendCCF').trigger('autoresize');

				$('#regularlyAttendsAt').val(c);
				$('#regularlyAttendsAt').trigger('autoresize');
			});
		}
		var isCellActive = false;
		function cellActive(id) { // this function allows you to highlight the table rows you select
			var num_of_rows = document.getElementsByTagName("TR").length;
			var rownumber = id.charAt(3);
			for(var i = 0; i < num_of_rows; i++) {
				document.getElementsByTagName("TR")[i].style.backgroundColor = "#fff"; // default color of rows = #f2f2f2
				document.getElementsByTagName("TR")[i].style.color = "black"
			}
			document.getElementById(id).style.backgroundColor = "#16A5B8";
			document.getElementById(id).style.color = "#fff";

			id = id.split("_")[1];
			$('#dgroupID').val(id);
			//$('#next').attr("href", "home.php?id="+id);
			$('#next').removeAttr("disabled", "");
			isCellActive = true;
		}
	</script>

	<header class="top-nav">
	<!-- Dropdown Structure Account--> 
		<ul id="account" class="dropdown-content dropdown-content-list">
		  	<?php
		  		include_once("user_options.php");
		  	?>
		</ul>
	<!-- Dropdown Structure Notifications-->
		<ul id="notifications" class="dropdown-content dropdown-content-notification">
			<li><h6 class="notifications-header" id="badge">Notifications</h6></li>
			<li class="divider"></li>
			<div class="preloader-wrapper small active spinner-notif">
				<div class="spinner-layer spinner-blue-only spinner-color-notif">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div><div class="gap-patch">
						<div class="circle"></div>
					</div><div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
		</ul>
		<nav style="margin-bottom: 50px;">
			<div class="container">
			    <div class="nav-wrapper">
			      	<a href="index.php" class="brand-logo"><img src="resources/CCF Logos6" id="logo"/></a>
			      	<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="events.php">EVENTS</a></li>
						<li><a href="ministries.php">MINISTRIES</a></li>
						<?php if($_SESSION['active']) echo '<li><a class="dropdown-button" data-activates="account">'.strtoupper($_SESSION['user']).'<i class="material-icons right" style="margin-top: 14px;">arrow_drop_down</i></a></li>'; ?>
						<li><a class="dropdown-button notifications" data-activates="notifications" onclick="seen()" id="bell"><i class="material-icons material-icon-notification">notifications</i><?php if (notifCount() >= 1 && getNotificationStatus() == 0) echo '<sup class="notification-badge">'.notifCount().'</sup>'; ?></a></li>
			     	 </ul>
			    </div>
			</div>
		</nav>
	</header>

	<body onload="defaultActive()">
		<div id="response"></div>
		<div class="row row-profile">
			<div class="col col-profile s12 card-panel z-depth-4">
				<div class="row" style="width: 1002px; margin: 0;">
					<div class="col s3 fixed" style="padding: 0; margin-top: 70px;">
							<ul class="sidenav">

								<!---Code ni Mark ito-->
								<?php

								if($_SESSION["memberType"] > 0) echo '
									<li class="li-sidenav"><a id="sidenav1" class="waves-effect waves-light btn btn-side-nav" onclick="setActive(this); navigationForms(1);" onfocus="disableFocus(this)">Personal Information</a></li>
									<li class="li-sidenav"><a id="sidenav2" class="waves-effect waves-light btn btn-side-nav" onclick="setNavPage('."'".'coinfo'."'".', 2); setActive(this); navigationForms(2);" onfocus="disableFocus(this)">Other Information</a></li>
									<li class="li-sidenav"><a id="sidenav3" class="waves-effect waves-light btn btn-side-nav"  onclick="setNavPage('."'".'cprefer'."'".', 2); setActive(this); navigationForms(3);" onfocus="disableFocus(this)">Preferences</a></li>
									<li class="li-sidenav"><a id="sidenav4" class="waves-effect waves-light btn btn-side-nav"  onclick="setActive(this); navigationForms(4);" onfocus="disableFocus(this)">Change Password</a></li>';
								else if($_SESSION["memberType"] == 0) echo '
									<li class="li-sidenav"><a id="sidenav1" class="waves-effect waves-light btn btn-side-nav"  onclick="setNavPage('."'".'register'."'".', 6); setActive(this); navigationForms(1);" onfocus="disableFocus(this)">Be a Dgroup Member</a></li>';
								?>
							</ul>
					</div>
					<div class="col s9 content">
						<div class="container">
							<?php
							if($_SESSION["memberType"] > 0) {
							echo '
							<form method="post" class="forms" id="fcpinfo">
								<div id="cpinfo">
									<div class="row">';
											// database connection variables

											$servername = "localhost";
											$username = "root";
											$password = "root";
											$dbname = "dbccf";
											$conn = mysqli_connect($servername, $username, $password, $dbname);
											if (!$conn) {
												die("Connection failed: " . mysqli_connect_error());
											}
											$query = "SELECT lastName, firstName, middleName, nickName, birthdate FROM member_tbl WHERE memberID = ".$_SESSION['userid'];
											$result = mysqli_query($conn, $query);
											if(mysqli_num_rows($result) > 0) {
												while($row = mysqli_fetch_assoc($result)) {
													$lastname = $row["lastName"];
													$firstname = $row["firstName"];
													$middlename = $row["middleName"];
													$nickname = $row["nickName"];
													$birthdate = date("j F, Y", strtotime($row["birthdate"]));
													if(is_null($row["birthdate"]))
														$birthdate = "";
													//$birthdate = $row["birthdate"];
												}
											}
											echo '
											<div class="input-field col s12">
												<input type="text" name="Lastname" id="Lastname" data-length="20" maxlength="20" value="'.$lastname.'" required>
												<label for="Lastname">Last Name</label>
												<small class="error" id="Lastname-required"></small>
											</div>
											<div class="input-field col s12">
												<input type="text" name="Firstname" id="Firstname" data-length="20" maxlength="20" value="'.$firstname.'" required>
												<label for="Firstname">First Name</label>
												<small class="error" id="Lastname-required"></small>
											</div>
											<div class="input-field col s12">
												<input type="text" name="Middlename" id="Middlename" data-length="20" maxlength="20" value="'.$middlename.'" required>
												<label for="Middlename">Middle Name</label>
												<small class="error" id="Middlename-required"></small>
											</div>
											<div class="input-field col s12">
												<input type="text" name="Nickname" id="Nickname" data-length="20" maxlength="20" value="'.$nickname.'" required>
												<label for="Nickname">Nickname</label>
												<small class="error" id="Nickname-required"></small>
											</div>
											<div class="input-field col s12">
												<input type="text" class="datepicker" id="Birthdate" name="Birthdate" value="'.$birthdate.'" required> <!-- originally date type, OC ito haha -->
												<label for="Birthdate">Birthdate</label>
												<small class="error" id="Birthdate-required"></small>
											</div>
									</div>
									<div class="row">
										<button class="waves-effect waves-light btn profile-next-or-submit-button col s2 right fixbutton" type="submit" name="submit_cpinfo" id="submit_cpinfo" onclick="submit_form('."'".'fcpinfo'."'".', this.id)">SUBMIT</button>
									</div>
								</div>
							</form>
								';
								mysqli_close($conn);
							}
							?>
							<?php
							if($_SESSION["memberType"] > 0) {
								echo '
							<form method="post" class="forms" id="fcoinfo">
								<div id="coinfo" style="display: none;">
									<div class="row">
										<!-- page 1 -->
										<div id="coinfo_page1">';
										// database connection variables

										$servername = "localhost";
										$username = "root";
										$password = "root";
										$dbname = "dbccf";
										$conn = mysqli_connect($servername, $username, $password, $dbname);
										if (!$conn) {
											die("Connection failed: " . mysqli_connect_error());
										}
										$query = "SELECT (SELECT CASE
														  WHEN gender = '0' THEN 'Male'
														  ELSE 'Female'
														  END) AS gender, civilStatus, citizenship, contactNum, emailAd, occupation, homeAddress, homePhoneNumber, companyName, companyContactNum, companyAddress, schoolName, schoolContactNum, schoolAddress, spouseName, spouseContactNum, spouseBirthdate FROM member_tbl LEFT OUTER JOIN companydetails_tbl ON member_tbl.companyID = companydetails_tbl.companyID LEFT OUTER JOIN schooldetails_tbl ON member_tbl.schoolID = schooldetails_tbl.schoolID LEFT OUTER JOIN spousedetails_tbl ON member_tbl.spouseID = spousedetails_tbl.spouseID WHERE memberID = ".$_SESSION['userid'];
										$result = mysqli_query($conn, $query);
										if(mysqli_num_rows($result) > 0) {
											while($row = mysqli_fetch_assoc($result)) {
												$gender = $row["gender"];
												$male = "";
												$female = "";
												if($gender == "Male") $male = "checked";
												else $female = "checked";
												$selectedcivilstatus = array("", "", "", "", "", "", ""); // 0 is default
												$civilstatus = $row["civilStatus"];
												if($civilstatus == "Single") $selectedcivilstatus[1] = "selected";
												else if($civilstatus == "Married") $selectedcivilstatus[2] = "selected";
												else if($civilstatus == "Single Parent") $selectedcivilstatus[3] = "selected";
												else if($civilstatus == "Annulled") $selectedcivilstatus[4] = "selected";
												else if($civilstatus == "Separated") $selectedcivilstatus[5] = "selected";
												else if($civilstatus == "Widow/er") $selectedcivilstatus[6] = "selected";
												else $selectedcivilstatus[0] = "selected";
												$citizenship = $row["citizenship"];
												$contactnum = $row["contactNum"];
												$emailad = $row["emailAd"];
												$occupation = $row["occupation"];
											}
										}
										echo '
											<p style="margin-top: 40px;">
												<label for="Gender" style="margin-left: 10px; font-size:15px;">Gender</label>
												<input type="radio" id="Gender_Male" name="Gender" value="Male" '.$male.' disabled />
												<label for="Gender_Male">Male</label>
												<input type="radio" id="Gender_Female" name="Gender" value="Female" '.$female.' disabled />
												<label for="Gender_Female">Female</label>
											</p>
											<div class="input-field col s12">
												<input type="text" class="data-required" name="Citizenship" id="Citizenship" data-length="20" maxlength="20" value="'.$citizenship.'" required>
												<label for="Citizenship">Citizenship</label>
												<small class="error" id="Citizenship-required">This field is required.</small>
											</div>
											<div class="row" style="margin: 0"> <!-- all selects must be margin: 0 -->
												<div class="input-field col s12">
													<select id="CivilStatus" name="CivilStatus">
														<option value="" disabled '.$selectedcivilstatus[0].'>Choose your option...</option>
														<option value="Single" '.$selectedcivilstatus[1].'>Single</option>
														<option value="Married" '.$selectedcivilstatus[2].'>Married</option>
														<option value="Single Parent" '.$selectedcivilstatus[3].'>Single Parent</option>
														<option value="Annulled" '.$selectedcivilstatus[4].'>Annulled</option>
														<option value="Separated" '.$selectedcivilstatus[5].'>Separated</option>
														<option value="Widow/er" '.$selectedcivilstatus[6].'>Widow/er</option>
													</select>
													<label>Civil Status</label>
												</div>
											</div>
											<div class="input-field col s12">
												<input type="text" class="data-required" name="MobileNumber" id="MobileNumber" onkeypress="return event.charCode >= 48 && event.charCode <= 57 //only numbers on keypress" data-length="18" maxlength="18" value="'.$contactnum.'" placeholder="ex. 0912 345 6789" required>
												<label for="MobileNumber" name="mobilenumber">Mobile Number</label>
												<small class="error" id="MobileNumber-required">This field is required.</small>
											</div>
											<div class="input-field col s12">
												<input type="email" class="data-required" name="Email" id="Email" data-length="30" maxlength="30" value="'.$emailad.'" required> <!-- increase size of email address -->
												<label for="Email" data-error="Invalid email address">Email Address</label>
												<small class="error" id="Email-required">This field is required.</small>
												<small class="error" id="Invalid-Email">Invalid Email Address</small>
											</div>
											<div class="input-field col s12">
												<input type="text" class="data-required" name="Profession" id="Profession" data-length="30" maxlength="30" value="'.$occupation.'" required>
												<label for="Profession">Profession/Occupation</label>
												<small class="error" id="Profession-required">This field is required.</small>
											</div>';
											echo '
										</div>

										<!-- page 2 -->
										<div id="coinfo_page2" style="display: none;">';
										// database connection variables

										$servername = "localhost";
										$username = "root";
										$password = "root";
										$dbname = "dbccf";
										$conn = mysqli_connect($servername, $username, $password, $dbname);
										if (!$conn) {
											die("Connection failed: " . mysqli_connect_error());
										}
										$query = "SELECT (SELECT CASE
														  WHEN gender = '0' THEN 'Male'
														  ELSE 'Female'
														  END) AS gender, civilStatus, citizenship, contactNum, emailAd, occupation, homeAddress, homePhoneNumber, companyName, companyContactNum, companyAddress, schoolName, schoolContactNum, schoolAddress, spouseName, spouseContactNum, spouseBirthdate FROM member_tbl LEFT OUTER JOIN companydetails_tbl ON member_tbl.companyID = companydetails_tbl.companyID LEFT OUTER JOIN schooldetails_tbl ON member_tbl.schoolID = schooldetails_tbl.schoolID LEFT OUTER JOIN spousedetails_tbl ON member_tbl.spouseID = spousedetails_tbl.spouseID WHERE memberID = ".$_SESSION['userid'];
										$result = mysqli_query($conn, $query);
										if(mysqli_num_rows($result) > 0) {
											while($row = mysqli_fetch_assoc($result)) {
												$homeaddress = $row["homeAddress"];
												$homephonenumber = $row["homePhoneNumber"];
												$companyname = $row["companyName"];
												$companycontactnum = $row["companyContactNum"];
												$companyaddress = $row["companyAddress"];
												$schoolname = $row["schoolName"];
												$schoolcontactnum = $row["schoolContactNum"];
												$schooladdress = $row["schoolAddress"];
												$spousename = $row["spouseName"];
												$spousecontactnum = $row["spouseContactNum"];
												$spousebirthdate = date("j F, Y", strtotime($row["spouseBirthdate"]));
												if(is_null($row["spouseBirthdate"]))
													$spousebirthdate = "";
											}
										}
										echo'
											<h4 class="center">Home</h4>
											<div class="input-field col s12">
												<input type="text" class="data-required" name="HomeAddress" id="HomeAddress" data-length="50" maxlength="50" value="'.$homeaddress.'" required>
												<label for="HomeAddress">Address</label>
												<small class="error" id="HomeAddress-required">This field is required.</small>
											</div>
											<div class="input-field col s12">
												<input type="text" name="HomePhoneNumber" id="HomePhoneNumber" data-length="18" maxlength="18" value="'.$homephonenumber.'">
												<label for="HomePhoneNumber">Home Phone Number</label>
											</div>
											<h4 class="center company">Company</h4>
											<div class="input-field col s12 company">
												<input type="text" class="data-required" name="CompanyName" id="CompanyName" data-length="30" maxlength="30" value="'.$companyname.'" required>
												<label for="CompanyName">Company Name</label>
												<small class="error" id="CompanyName-required">This field is required.</small>
											</div>
											<div class="input-field col s12 company">
												<input type="text" name="CompanyContactNum" id="CompanyContactNum" data-length="18" maxlength="18" value="'.$companycontactnum.'">
												<label for="CompanyContactNum">Company Contact Number</label>
											</div>
											<div class="input-field col s12 company">
												<input type="text" name="CompanyAddress" id="CompanyAddress" data-length="50" maxlength="50" value="'.$companyaddress.'">
												<label for="CompanyAddress">Company Address</label>
											</div>
											<h4 class="center school">School</h4>
											<div class="input-field col s12 school">
												<input type="text" class="data-required" name="SchoolName" id="SchoolName" data-length="30" maxlength="30" value="'.$schoolname.'" required>
												<label for="SchoolName">School Name</label>
												<small class="error" id="SchoolName-required">This field is required.</small>
											</div>
											<div class="input-field col s12 school">
												<input type="text" name="SchoolContactNum" id="SchoolContactNum" data-length="18" maxlength="18" value="'.$schoolcontactnum.'">
												<label for="SchoolContactNum">School Contact Number</label>
											</div>
											<div class="input-field col s12 school">
												<input type="text" name="SchoolAddress" id="SchoolAddress" data-length="50" maxlength="50" value="'.$schooladdress.'">
												<label for="SchoolAddress">School Address</label>
											</div>
											<h4 class="center spouse">Spouse</h4>
											<div class="input-field col s12 spouse">
												<input type="text" class="data-required" name="SpouseName" id="SpouseName" data-length="30" maxlength="30" value="'.$spousename.'" required>
												<label for="SpouseName">Spouse Name</label>
												<small class="error" id="SpouseName-required">This field is required.</small>
											</div>
											<div class="input-field col s12 spouse">
												<input type="text" name="SpouseMobileNumber" id="SpouseMobileNumber" data-length="18" maxlength="18" value="'.$spousecontactnum.'">
												<label for="SpouseMobileNumber">Spouse Mobile Number</label>
											</div>
											<div class="input-field col s12 spouse">
												<input type="text" class="datepicker" id="SpouseBirthdate" name="SpouseBirthdate" value="'.$spousebirthdate.'"> <!-- originally date type, OC ito haha -->
												<label for="SpouseBirthdate">Birthdate</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="progress col s6 left" style=" margin-left: 0.8rem;">
											<div class="determinate" style="" id="coinfo_progressbar">
											</div>
										</div>&nbsp; &nbsp;
										<label id="coinfo_page"></label> <!-- Change when page number adjusts -->
										<button class="waves-effect waves-light btn profile-next-or-submit-button col s2 right" type="button" name="submit_coinfo" id="coinfo_next">NEXT</button>
										<button class="waves-effect waves-light btn col s2 right" type="button" name="submit_back" id="coinfo_back" onclick="pagination(0,'."'".'coinfo'."'".')" style="margin-right: 10px; display: none;">BACK</button>
									</div>
								</div>
							</form>';
							mysqli_close($conn);
							}
										?>
							<?php
							if($_SESSION["memberType"] > 0) {
							echo '
							<form method="post" class="forms" id="fcprefer">
								<div id="cprefer" style="display: none;">
									<div class="row">
										<!-- page 1 -->
										<div id="cprefer_page1">
										';
										// database connection variables

										$servername = "localhost";
										$username = "root";
										$password = "root";
										$dbname = "dbccf";
										$conn = mysqli_connect($servername, $username, $password, $dbname);
										if (!$conn) {
											die("Connection failed: " . mysqli_connect_error());
										}
										$query = "SELECT prefLanguage, prefVenue1, prefVenue2, prefStartTime1, prefEndTime1, prefStartTime2, prefEndTime2, prefDay1, prefDay2 FROM member_tbl LEFT OUTER JOIN preferencedetails_tbl ON member_tbl.prefID = preferencedetails_tbl.prefID WHERE memberID = ".$_SESSION['userid'];
										$result = mysqli_query($conn, $query);
										if(mysqli_num_rows($result) > 0) {
											while($row = mysqli_fetch_assoc($result)) {
												$preflanguage = $row["prefLanguage"];
												$prefvenue1 = $row["prefVenue1"];
												$prefvenue2 = $row["prefVenue2"];
												$prefstarttime1 = date("H:i", strtotime($row["prefStartTime1"]));
												$prefendtime1 = date("H:i", strtotime($row["prefEndTime1"]));
												$prefstarttime2 = date("H:i", strtotime($row["prefStartTime2"]));
												$prefendtime2 = date("H:i", strtotime($row["prefEndTime2"]));
												$selectedprefday1 = array("", "", "", "", "", "", "", "");
												$prefday1 = $row["prefDay1"];
												if($prefday1 == "Sunday") $selectedprefday1[1] = "Sunday";
												else if($prefday1 == "Monday") $selectedprefday1[2] = "Monday";
												else if($prefday1 == "Tuesday") $selectedprefday1[3] = "Tuesday";
												else if($prefday1 == "Wednesday") $selectedprefday1[4] = "Wednesday";
												else if($prefday1 == "Thursday") $selectedprefday1[5] = "Thursday";
												else if($prefday1 == "Friday") $selectedprefday1[6] = "Friday";
												else if($prefday1 == "Saturday") $selectedprefday1[7] = "Saturday";
												else $selectedprefday1[0] = "selected";
												$selectedprefday2 = array("", "", "", "", "", "", "", "");
												$prefday2 = $row["prefDay2"];
												if($prefday2 == "Sunday") $selectedprefday2[1] = "Sunday";
												else if($prefday2 == "Monday") $selectedprefday2[2] = "Monday";
												else if($prefday2 == "Tuesday") $selectedprefday2[3] = "Tuesday";
												else if($prefday2 == "Wednesday") $selectedprefday2[4] = "Wednesday";
												else if($prefday2 == "Thursday") $selectedprefday2[5] = "Thursday";
												else if($prefday2 == "Friday") $selectedprefday2[6] = "Friday";
												else if($prefday2 == "Saturday") $selectedprefday2[7] = "Saturday";
												else $selectedprefday2[0] = "selected";
											}
										}
										echo '
											<div class="input-field col s12">
												<input type="text" name="Language" id="Language" data-length="50" maxlength="50" value="'.$preflanguage.'" placeholder="ex. English, Bisaya, Tagalog" required>
												<label for="Language">Language</label>
												<small class="error" id="Language-required">This field is required.</small>
											</div>
											<h4 class="center">Schedule</h4>
											<h5 class="center">Option 1</h5>
											<div class="row" style="margin: 0">
												<div class="input-field col s12">
													<select id="Option1Day" name="Option1Day">
														<option value="" disabled '.$selectedprefday1[0].'>Choose your option...</option>
														<option value="Sunday" '.$selectedprefday1[1].'>Sunday</option>
														<option value="Monday" '.$selectedprefday1[2].'>Monday</option>
														<option value="Tuesday" '.$selectedprefday1[3].'>Tuesday</option>
														<option value="Wednesday" '.$selectedprefday1[4].'>Wednesday</option>
														<option value="Thursday" '.$selectedprefday1[5].'>Thursday</option>
														<option value="Friday" '.$selectedprefday1[6].'>Friday</option>
														<option value="Saturday" '.$selectedprefday1[7].'>Saturday</option>
													</select>
													<label>Day</label>
												</div>
											</div>
												<div class="input-field col s6">
													<label for="timepicker1opt1">Start Time</label>
													<input type="text" class="timepicker" name="timepicker1opt1" id="timepicker1opt1" value="'.$prefstarttime1.'">
													<small class="error" id="timepicker1opt1-equal">Both should not be equal.</small>
													<small class="error greater1">Start Time should be before than End Time.</small>
												</div>
												<div class="input-field col s6">
													<label for="timepicker1opt2">End Time</label>
													<input type="text" class="timepicker" name="timepicker1opt2" id="timepicker1opt2" value="'.$prefendtime1.'">
													<small class="error" id="timepicker1opt2-equal">Both should not be equal.</small>	
													<small class="error greater1">Start Time should be before than End Time.</small>
												</div>
											<div class="col s12">
											</div>
											<div class="input-field col s12">
												<input type="text" name="Option1Venue" id="Option1Venue" data-length="50" maxlength="50" value="'.$prefvenue1.'">
												<label for="Option1Venue" style=" font-size:14px;">Venue</label>
											</div>
											<h5 class="center">Option 2</h5>
											<div class="row" style="margin: 0">
												<div class="input-field col s12">
													<select id="Option2Day" name="Option2Day">
														<option value="" disabled '.$selectedprefday2[0].'>Choose your option...</option>
														<option value="Sunday" '.$selectedprefday2[1].'>Sunday</option>
														<option value="Monday" '.$selectedprefday2[2].'>Monday</option>
														<option value="Tuesday" '.$selectedprefday2[3].'>Tuesday</option>
														<option value="Wednesday" '.$selectedprefday2[4].'>Wednesday</option>
														<option value="Thursday" '.$selectedprefday2[5].'>Thursday</option>
														<option value="Friday" '.$selectedprefday2[6].'>Friday</option>
														<option value="Saturday" '.$selectedprefday2[7].'>Saturday</option>
													</select>
													<label>Day</label>
												</div>
											</div>
												<div class="input-field col s6">
													<label for="timepicker2opt1">Start Time</label>
													<input type="text" class="timepicker" name="timepicker2opt1" id="timepicker2opt1" value="'.$prefstarttime2.'">
													<small class="error" id="timepicker2opt1-equal">Both should not be equal.</small>
													<small class="error greater2">Start Time should be before than End Time.</small>
												</div>
												<div class="input-field col s6">
													<label for="timepicker2opt2">End Time</label>
													<input type="text" class="timepicker" name="timepicker2opt2" id="timepicker2opt2" value="'.$prefendtime2.'">
													<small class="error" id="timepicker2opt2-equal">Both should not be equal.</small>
													<small class="error greater2">Start Time should be before than End Time.</small>
												</div>
											<div class="input-field col s12">
												<input type="text" name="Option2Venue" id="Option2Venue" data-length="50" maxlength="50" value="'.$prefvenue2.'">
												<label for="Option2Venue" style=" font-size:14px;">Venue</label>
											</div>';
										echo '
										</div>

										<!-- page 2 -->
										<div id="cprefer_page2" style="display: none;">';
											// database connection variables

											$servername = "localhost";
											$username = "root";
											$password = "root";
											$dbname = "dbccf";
											$conn = mysqli_connect($servername, $username, $password, $dbname);
											if (!$conn) {
												die("Connection failed: " . mysqli_connect_error());
											}
											$query = "SELECT receivedChrist, attendCCF, regularlyAttendsAt FROM discipleshipgroupmembers_tbl WHERE memberID = ".$_SESSION['userid'];
											$result = mysqli_query($conn, $query);
											if(mysqli_num_rows($result) > 0) {
												while($row = mysqli_fetch_assoc($result)) {
													$receivedChrist = trim(preg_replace('/\s+/', '\n', $row["receivedChrist"]));
													$attendCCF = trim(preg_replace('/\s+/', '\n', $row["attendCCF"]));
													$regularlyAttendsAt = trim(preg_replace('/\s+/', '\n', $row["regularlyAttendsAt"]));
												}
											}
										echo '
											<script>
												reTextArea("'.$receivedChrist.'", "'.$attendCCF.'", "'.$regularlyAttendsAt.'");
											</script>
											';
										echo '
											<div class="input-field col s12">
												<textarea id="receivedChrist" class="materialize-textarea" name="receivedChrist" data-length="300" maxlength="300"></textarea>
												<label for="receivedChrist">When did you receive Christ as your Lord and Savior?</label>
											</div>
											<div class="input-field col s12">
												<textarea id="attendCCF" class="materialize-textarea" name="attendCCF" data-length="300" maxlength="300"></textarea>
												<label for="attendCCF">How long you have been attending CCF?</label>
											</div>
											<div class="input-field col s12">
												<textarea id="regularlyAttendsAt" class="materialize-textarea" name="regularlyAttendsAt" data-length="300" maxlength="300"></textarea>
												<label for="regularlyAttendsAt">Where do you regularly attend?</label>
											</div>
										</div>
									</div>
									<!-- progressbar & buttons -->
									<div class="row">
										<div class="progress col s6 left" style=" margin-left: 0.8rem;">
											<div class="determinate" style="" id="cprefer_progressbar"></div>
										</div>&nbsp; &nbsp;<label id="cprefer_page"></label> <!-- Change when page number adjusts -->
										<button class="waves-effect waves-light btn profile-next-or-submit-button col s2 right" type="button" name="submit_cprefer" id="cprefer_next">NEXT</button>
										<button class="waves-effect waves-light btn col s2 right" type="button" name="submit_back" id="cprefer_back" onclick="pagination(0, '."'".'cprefer'."'".')" style="margin-right: 10px; display: none;">BACK</button>
									</div>
								</div>
							</form>';
							}
										?>
							<?php
							if($_SESSION["memberType"] > 0) {
							echo '
							<form method="post" id="fcpass">
								<div id="cpass" style="display: none;">
									<div class="row">';
											// database connection variables

											$servername = "localhost";
											$username = "root";
											$password = "root";
											$dbname = "dbccf";
											$conn = mysqli_connect($servername, $username, $password, $dbname);
											if (!$conn) {
												die("Connection failed: " . mysqli_connect_error());
											}
											$query = "SELECT password FROM member_tbl WHERE memberID = ".$_SESSION['userid'];
											$result = mysqli_query($conn, $query);
											if(mysqli_num_rows($result) > 0) {
												while($row = mysqli_fetch_assoc($result)) {
													$password = $row["password"];
												}
											}
										echo '
										<div class="input-field col s12">
											<i class="material-icons prefix">lock</i> <!-- lock_outline -->
											<input type="password" name="old-password" id="old-password" data-length="16" maxlength="16">
											<label for="old-password">Old Password</label>
											<small class="error-with-icon" id="oldpass">This field is required.</small>
											<small class="error-with-icon" id="notpass">This is not your password.</small>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">lock</i> <!-- lock_outline -->
											<input type="password" name="new-password" id="new-password" data-length="16" maxlength="16">
											<label for="new-password">New Password</label>
											<small class="error-with-icon" id="newpass">This field is required.</small>
											<small class="error-with-icon" id="checkoldnew">Cannot use old password.</small>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">lock</i> <!-- lock_outline -->
											<input type="password" name="confirm-password" id="confirm-password" data-length="16" maxlength="16">
											<label for="confirm-password">Confirm New Password</label>
											<small class="error-with-icon" id="confirmpass">This field is required.</small>
											<small class="error-with-icon" id="checkpass">Passwords do not match.</small>
										</div>
									</div> 
									<div class="row">
										<button class="waves-effect waves-light btn profile-next-or-submit-button col s2 right fixbutton" type="submit" name="submit_cpass" id="submit_cpass" onclick="submit_form('."'".'fcpass'."'".', this.id)">SUBMIT</button>
									</div>
								</div>
							</form>';
							} // originally having a value of own password
								?>
							<?php
								if($_SESSION["memberType"] == 0) {
									echo '
										<form method="post" id="fregister">
											<div id="register">
												<div class="row">
													<div id="register_page1">
														<h3 class="center">Personal Information</h3>';
															$conn = mysqli_connect($servername, $username, $password, $dbname);
															if (!$conn) {
																die("Connection failed: " . mysqli_connect_error());
															}
															$query = "SELECT lastName, firstName, middleName, nickName, birthdate FROM member_tbl WHERE memberID = ".$_SESSION['userid'];
															$result = mysqli_query($conn, $query);
															if(mysqli_num_rows($result) > 0) {
																while($row = mysqli_fetch_assoc($result)) {
																	$lastname = $row["lastName"];
																	$firstname = $row["firstName"];
																	$middlename = $row["middleName"];
																	$nickname = $row["nickName"];
																	$birthdate = date("j F, Y", strtotime($row["birthdate"]));
																	if(is_null($row["birthdate"]))
																		$birthdate = "";
																	//$birthdate = $row["birthdate"];
																}
															}
															echo '
														<div class="input-field col s12">
															<input type="text" name="Lastname" id="Lastname" data-length="20" maxlength="20" value="'.$lastname.'" required>
															<label for="Lastname">Last Name</label>
															<small class="error" id="Lastname-required"></small>
														</div>
														<div class="input-field col s12">
															<input type="text" name="Firstname" id="Firstname" data-length="20" maxlength="20" value="'.$firstname.'" required>
															<label for="Firstname">First Name</label>
															<small class="error" id="Firstname-required"></small>
														</div>
														<div class="input-field col s12">
															<input type="text" name="Middlename" id="Middlename" data-length="20" maxlength="20" value="'.$middlename.'" required>
															<label for="Middlename">Middle Name</label>
															<small class="error" id="Middlename-required"></small>
														</div>
														<div class="input-field col s12">
															<input type="text" name="Nickname" id="Nickname" data-length="20" maxlength="20" value="'.$nickname.'" required>
															<label for="Nickname">Nickname</label>
															<small class="error" id="Nickname-required"></small>
														</div>
														<div class="input-field col s12">
															<input type="text" class="datepicker" id="Birthdate" name="Birthdate" value="'.$birthdate.'" required> <!-- originally date type, OC ito haha -->
															<label for="Birthdate">Birthdate</label>
															<small class="error" id="Birthdate-required"></small>
														</div>
															';
												echo'</div>
													<div id="register_page2" style="display: none;">
														<h3 class="center">Other Information</h3>';
														$query = "SELECT (SELECT CASE
																		  WHEN gender = '0' THEN 'Male'
																		  ELSE 'Female'
																		  END) AS gender, civilStatus, citizenship, contactNum, emailAd, occupation, homeAddress, homePhoneNumber, companyName, companyContactNum, companyAddress, schoolName, schoolContactNum, schoolAddress, spouseName, spouseContactNum, spouseBirthdate FROM member_tbl LEFT OUTER JOIN companydetails_tbl ON member_tbl.companyID = companydetails_tbl.companyID LEFT OUTER JOIN schooldetails_tbl ON member_tbl.schoolID = schooldetails_tbl.schoolID LEFT OUTER JOIN spousedetails_tbl ON member_tbl.spouseID = spousedetails_tbl.spouseID WHERE memberID = ".$_SESSION['userid'];
														$result = mysqli_query($conn, $query);
														if(mysqli_num_rows($result) > 0) {
															while($row = mysqli_fetch_assoc($result)) {
																$gender = $row["gender"];
																$male = "";
																$female = "";
																if($gender == "Male") $male = "checked";
																else $female = "checked";
																$selectedcivilstatus = array("", "", "", "", "", "", ""); // 0 is default
																$civilstatus = $row["civilStatus"];
																if($civilstatus == "Single") $selectedcivilstatus[1] = "selected";
																else if($civilstatus == "Married") $selectedcivilstatus[2] = "selected";
																else if($civilstatus == "Single Parent") $selectedcivilstatus[3] = "selected";
																else if($civilstatus == "Annulled") $selectedcivilstatus[4] = "selected";
																else if($civilstatus == "Separated") $selectedcivilstatus[5] = "selected";
																else if($civilstatus == "Widow/er") $selectedcivilstatus[6] = "selected";
																else $selectedcivilstatus[0] = "selected";
																$citizenship = $row["citizenship"];
																$contactnum = $row["contactNum"];
																$emailad = $row["emailAd"];
																$occupation = $row["occupation"];
															}
														}
														echo '
														<p style="margin-top: 40px;">
															<label for="Gender" style="margin-left: 10px; font-size:15px;">Gender</label>
															<input type="radio" id="Gender_Male" name="Gender" value="Male" '.$male.' disabled />
															<label for="Gender_Male">Male</label>
															<input type="radio" id="Gender_Female" name="Gender" value="Female" '.$female.' disabled />
															<label for="Gender_Female">Female</label>
														</p>
														<div class="input-field col s12">
															<input type="text" class="data-required" name="Citizenship" id="Citizenship" data-length="20" maxlength="20" value="'.$citizenship.'" required>
															<label for="Citizenship">Citizenship</label>
															<small class="error" id="Citizenship-required">This field is required.</small>
														</div>
														<div class="row" style="margin: 0"> <!-- all selects must be margin: 0 -->
															<div class="input-field col s12">
																<select id="CivilStatus" name="CivilStatus">
																	<option value="" disabled '.$selectedcivilstatus[0].'>Choose your option...</option>
																	<option value="Single" '.$selectedcivilstatus[1].'>Single</option>
																	<option value="Married" '.$selectedcivilstatus[2].'>Married</option>
																	<option value="Single Parent" '.$selectedcivilstatus[3].'>Single Parent</option>
																	<option value="Annulled" '.$selectedcivilstatus[4].'>Annulled</option>
																	<option value="Separated" '.$selectedcivilstatus[5].'>Separated</option>
																	<option value="Widow/er" '.$selectedcivilstatus[6].'>Widow/er</option>
																</select>
																<label>Civil Status</label>
															</div>
														</div>
														<div class="input-field col s12">
															<input type="text" class="data-required" name="MobileNumber" id="MobileNumber" onkeypress="return event.charCode >= 48 && event.charCode <= 57 //only numbers on keypress" data-length="18" maxlength="18" value="'.$contactnum.'" placeholder="ex. 0912 345 6789" required>
															<label for="MobileNumber" name="mobilenumber">Mobile Number</label>
															<small class="error" id="MobileNumber-required">This field is required.</small>
														</div>
														<div class="input-field col s12">
															<input type="email" class="data-required" name="Email" id="Email" data-length="30" maxlength="30" value="'.$emailad.'" required> <!-- increase size of email address -->
															<label for="Email" data-error="Invalid email address">Email Address</label>
															<small class="error" id="Email-required">This field is required.</small>
															<small class="error" id="Invalid-Email">Invalid Email Address</small>
														</div>
														<div class="input-field col s12">
															<input type="text" class="data-required" name="Profession" id="Profession" data-length="30" maxlength="30" value="'.$occupation.'" required>
															<label for="Profession">Profession/Occupation</label>
															<small class="error" id="Profession-required">This field is required.</small>
														</div>';
													echo'
													</div>
													<div id="register_page3" style="display: none;">';
													$query = "SELECT (SELECT CASE
																	  WHEN gender = '0' THEN 'Male'
																	  ELSE 'Female'
																	  END) AS gender, civilStatus, citizenship, contactNum, emailAd, occupation, homeAddress, homePhoneNumber, companyName, companyContactNum, companyAddress, schoolName, schoolContactNum, schoolAddress, spouseName, spouseContactNum, spouseBirthdate FROM member_tbl LEFT OUTER JOIN companydetails_tbl ON member_tbl.companyID = companydetails_tbl.companyID LEFT OUTER JOIN schooldetails_tbl ON member_tbl.schoolID = schooldetails_tbl.schoolID LEFT OUTER JOIN spousedetails_tbl ON member_tbl.spouseID = spousedetails_tbl.spouseID WHERE memberID = ".$_SESSION['userid'];
													$result = mysqli_query($conn, $query);
													if(mysqli_num_rows($result) > 0) {
														while($row = mysqli_fetch_assoc($result)) {
															$homeaddress = $row["homeAddress"];
															$homephonenumber = $row["homePhoneNumber"];
															$companyname = $row["companyName"];
															$companycontactnum = $row["companyContactNum"];
															$companyaddress = $row["companyAddress"];
															$schoolname = $row["schoolName"];
															$schoolcontactnum = $row["schoolContactNum"];
															$schooladdress = $row["schoolAddress"];
															$spousename = $row["spouseName"];
															$spousecontactnum = $row["spouseContactNum"];
															$spousebirthdate = date("j F, Y", strtotime($row["spouseBirthdate"]));
															if(is_null($row["spouseBirthdate"]))
																$spousebirthdate = "";
														}
													}
													echo'
														<h4 class="center">Home</h4>
														<div class="input-field col s12">
															<input type="text" class="data-required" name="HomeAddress" id="HomeAddress" data-length="50" maxlength="50" value="'.$homeaddress.'" required>
															<label for="HomeAddress">Address</label>
															<small class="error" id="HomeAddress-required">This field is required.</small>
														</div>
														<div class="input-field col s12">
															<input type="text" name="HomePhoneNumber" id="HomePhoneNumber" data-length="18" maxlength="18" value="'.$homephonenumber.'">
															<label for="HomePhoneNumber">Home Phone Number</label>
														</div>
														<h4 class="center company">Company</h4>
														<div class="input-field col s12 company">
															<input type="text" class="data-required" name="CompanyName" id="CompanyName" data-length="30" maxlength="30" value="'.$companyname.'" required>
															<label for="CompanyName">Company Name</label>
															<small class="error" id="CompanyName-required">This field is required.</small>
														</div>
														<div class="input-field col s12 company">
															<input type="text" name="CompanyContactNum" id="CompanyContactNum" data-length="18" maxlength="18" value="'.$companycontactnum.'">
															<label for="CompanyContactNum">Company Contact Number</label>
														</div>
														<div class="input-field col s12 company">
															<input type="text" name="CompanyAddress" id="CompanyAddress" data-length="50" maxlength="50" value="'.$companyaddress.'">
															<label for="CompanyAddress">Company Address</label>
														</div>
														<h4 class="center school">School</h4>
														<div class="input-field col s12 school">
															<input type="text" class="data-required" name="SchoolName" id="SchoolName" data-length="30" maxlength="30" value="'.$schoolname.'" required>
															<label for="SchoolName">School Name</label>
															<small class="error" id="SchoolName-required">This field is required.</small>
														</div>
														<div class="input-field col s12 school">
															<input type="text" name="SchoolContactNum" id="SchoolContactNum" data-length="18" maxlength="18" value="'.$schoolcontactnum.'">
															<label for="SchoolContactNum">School Contact Number</label>
														</div>
														<div class="input-field col s12 school">
															<input type="text" name="SchoolAddress" id="SchoolAddress" data-length="50" maxlength="50" value="'.$schooladdress.'">
															<label for="SchoolAddress">School Address</label>
														</div>
														<h4 class="center spouse">Spouse</h4>
														<div class="input-field col s12 spouse">
															<input type="text" class="data-required" name="SpouseName" id="SpouseName" data-length="30" maxlength="30" value="'.$spousename.'" required>
															<label for="SpouseName">Spouse Name</label>
															<small class="error" id="SpouseName-required">This field is required.</small>
														</div>
														<div class="input-field col s12 spouse">
															<input type="text" name="SpouseMobileNumber" id="SpouseMobileNumber" data-length="18" maxlength="18" value="'.$spousecontactnum.'">
															<label for="SpouseMobileNumber">Spouse Mobile Number</label>
														</div>
														<div class="input-field col s12 spouse">
															<input type="text" class="datepicker" id="SpouseBirthdate" name="SpouseBirthdate" value="'.$spousebirthdate.'"> <!-- originally date type, OC ito haha -->
															<label for="SpouseBirthdate">Birthdate</label>
														</div>';
											echo '
													</div>
													<div id="register_page4" style="display: none">
														<h3 class="center">Preferences</h3>
														<div class="input-field col s12">
															<input type="text" name="Language" id="Language" data-length="50" maxlength="50" required>
															<label for="Language">Language</label>
															<small class="error" id="Language-required">This field is required.</small>
														</div>
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
																	<small class="error" id="DgroupType-spouse">You are legally married. Please pick the Married Dgroup Type.</small>
																	<small class="error" id="DgroupType-single">You are single. You cannot pick the Couples Dgroup Type.</small>
																</div>
															<h5 class="center">Option 1</h5>
															<div class="row" style="margin: 0;">
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
																	<small class="error" id="Option1Day-required">This field is required.</small>
																</div>
															</div>
															<div class="input-field col s6">
																<label for="timepicker1opt1">Start Time</label>
																<input type="time" class="timepicker" name="timepicker1opt1" id="timepicker1opt1" required>
																<small class="error" id="timepicker1opt1-required">This field is required.</small>
																<small class="error" id="timepicker1opt1-equal1">Both should not be equal.</small>	
																<small class="error greater1" id="timepicker1opt1-greater1">Start Time should be before than End Time.</small>
															</div>
															<div class="input-field col s6 right">
																<label for="timepicker1opt2">End Time</label>
																<input type="time" class="timepicker" name="timepicker1opt2" id="timepicker1opt2" required>
																<small class="error" id="timepicker1opt2-required">This field is required.</small>
																<small class="error" id="timepicker1opt2-equal1">Both should not be equal.</small>	
																<small class="error greater1" id="timepicker1opt2-greater1">Start Time should be before than End Time.</small>
															</div>
														<div class="input-field col s12">
															<input type="text" name="Option1Venue" id="Option1Venue" data-length="50" maxlength="50" required>
															<label for="Option1Venue" style=" font-size:14px;">Venue</label>
															<small class="error" id="Option1Venue-required">This field is required.</small>
														</div>
														<h5 class="center">Option 2</h5>
														<div class="row" style="margin: 0;">
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
																<small class="error" id="Option2Day-required">This field is required.</small>
															</div>
														</div>
															<div class="input-field col s6">
																<label for="timepicker2opt1">Start Time</label>
																<input type="time" class="timepicker" name="timepicker2opt1" id="timepicker2opt1" required>
																<small class="error" id="timepicker2opt1-required">This field is required.</small>
																<small class="error" id="timepicker2opt1-equal2">Both should not be equal.</small>	
																<small class="error greater2" id="timepicker2opt1-greater2">Start Time should be before than End Time.</small>
															</div>
															<div class="input-field col s6">
																<label for="timepicker2opt2">End Time</label>
																<input type="time" class="timepicker" name="timepicker2opt2" id="timepicker2opt2" required>
																<small class="error" id="timepicker2opt2-required">This field is required.</small>
																<small class="error" id="timepicker2opt2-equal2">Both should not be equal.</small>	
																<small class="error greater2" id="timepicker2opt2-greater2">Start Time should be before than End Time.</small>
															</div>
														<div class="input-field col s12">
															<input type="text" name="Option2Venue" id="Option2Venue" data-length="50" maxlength="50" required>
															<label for="Option2Venue" style=" font-size:14px;">Venue</label>
															<small class="error" id="Option2Venue-required">This field is required.</small>
														</div>
													</div>

													<div id="register_page5" style="display: none;">
														<div class="input-field col s12">
															<textarea id="receivedChrist" class="materialize-textarea" name="receivedChrist" data-length="300" maxlength="300"></textarea>
															<label for="receivedChrist">When did you receive Christ as your Lord and Savior?</label>
														</div>
														<div class="input-field col s12">
															<textarea id="attendCCF" class="materialize-textarea" name="attendCCF" data-length="300" maxlength="300"></textarea>
															<label for="attendCCF">How long you have been attending CCF?</label>
														</div>
														<div class="input-field col s12">
															<textarea id="regularlyAttendsAt" class="materialize-textarea" name="regularlyAttendsAt" data-length="300" maxlength="300"></textarea>
															<label for="regularlyAttendsAt">Where do you regularly attend?</label>
														</div>
													</div>
													<div id="register_page6" style="display: none;">
														<h3 class="center">Choose a Dgroup Leader</h3>
														<table class="cursor centered" id="table" style="margin-bottom: 20px;">
															<thead>
																<th style="width: <?php echo widthRow(4); ?>%; display: none;">Dgroup ID</th>
																<th style="width: <?php echo widthRow(5); ?>%">Dgroup Leader</th>
																<th style="width: <?php echo widthRow(8); ?>%">Gender</th>
																<th style="width: <?php echo widthRow(8); ?>%">Type of Dgroup</th>
																<th style="width: <?php echo widthRow(10); ?>%">Age Bracket</th>
																<th style="width: <?php echo widthRow(8); ?>%">Day</th>
																<th style="width: <?php echo widthRow(8); ?>%">Schedule</th>
															</thead>
									';
									// end
																// database connection variables

																$servername = "localhost";
																$username = "root";
																$password = "root";
																$dbname = "dbccf";

																$conn = mysqli_connect($servername, $username, $password, $dbname);
																if (!$conn) {
																	die("Connection failed: " . mysqli_connect_error());
																}

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
																					WHEN dgroupType = '5' THEN 'All'
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
																		//<td class="choose" style="display: none;"><input type="hidden" name="dgroupID'.$dgroupid.'" value="'.$dgroupid.'" /></td>
																		echo '<td class="choose" style="display: none;"></td>
																			<td class="choose">'.$fullname.'</td>
																			<td class="choose" id="gender_'.$count.'">'.$gender.'</td>
																			<td class="choose" id="dgrouptype_'.$count.'">'.$dgrouptype.'</td>
																			<td class="choose">'.$agebracket.'</td>
																			<td class="choose">'.$schedday.'</td>
																			<td class="choose">'.$schedule.'</td>';
																			echo '</tr>';
																			$count++;
																	}
																}
																//WORK HERE

																echo '
														</table>
													</div>
												</div>
												<div class="row">
													<div class="progress col s6 left" style=" margin-left: 0.8rem;">
														<div class="determinate" style="" id="register_progressbar"></div>
													</div>&nbsp; &nbsp;<label id="register_page"></label> <!-- Change when page number adjusts -->
													<input type="hidden" name="dgroupID" id="dgroupID"/> <!--hidden input for dgid-->
													<button class="waves-effect waves-light btn profile-next-or-submit-button col s2 right" type="button" name="submit_register" id="register_next"	>NEXT</button>
													<button class="waves-effect waves-light btn col s2 right" type="button" name="submit_back" id="register_back" onclick="pagination(0, '."'".'register'."'".')" style="margin-right: 10px; display: none;">BACK</button>
												</div>
											</div>
										</form>
									';
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>

	<main>
	</main>
	
	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col 16 s8">
					<img src="resources/CCF Logos7.png" />
				</div>
				<div class="col 14 offset-12 s4">
					<p class="footer-cpyrght">
						Christ's Commission Fellowship © 2016 <br>
						All Rights Reserved.
					</p>
				</div>
			</div>
		</div>
	</footer>

	<script>
	"use strict";
		var currentpage = 1, no_of_pages = 0, percentage=(currentpage/no_of_pages)*100, currentprogress=percentage;
		var page;
		function setNavPage(navpage, num_of_pages) {
			page = navpage;
			// sets number of pages
			no_of_pages = num_of_pages;

			// re-initialize every after visit of side navigation page
			currentpage = 1;
			percentage=(currentpage/no_of_pages)*100;
			currentprogress=percentage;

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
				convertToButton(navpage);
			}	
			else {
				if(currentpage == no_of_pages) {
					document.getElementById(navpage+'_page'+currentpage).style.display = "none";
					document.getElementById(navpage+'_page'+currentpage).style.display = "inline";
					document.getElementById(navpage+'_page').innerHTML = "Page "+currentpage+" of "+no_of_pages;
					document.getElementById(navpage+'_progressbar').style.width = currentprogress+"%";
					document.getElementById(navpage+'_back').style.display = "inline";
					document.getElementById(navpage+'_next').href = "#"+navpage+"page"+currentpage;

					// originally .onclick event
					document.getElementById(navpage+'_next').onsubmit = submitOnClick(navpage);
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
			// if not using ajax, use this
			document.getElementById(navpage+'_next').setAttribute("type", "submit");
			submit_form('f'+navpage, 'submit_'+navpage);
			//convertToButton(navpage);
			//submit_form("submit_"+navpage);
			//document.myForm.submit();
			/*
			$["#next"].click(function() {
				$("button[name='submit_next']").prop("type", "submit"); //jquery-3
			});
			*/
		}

		function getCurrentPage() {
			var cp = page+"_page"+currentpage;
			return cp;
		}

		function convertToButton(navpage) {
			document.getElementById(navpage+'_next').setAttribute("type", "button");
		}

		var navcurrentpage = 1;
		function navigationForms(page) {
			if(page == 1) {
				//$('.content form > div').hide();
				<?php
					if($_SESSION["memberType"] > 0) {
						echo '
							$("#cpinfo").show();
							$("#coinfo").hide();
							$("#cprefer").hide();
							$("#cpass").hide();
						';
					}
					else
						echo '
							$("#register").show();
						';
				?>
			}
			else if (page == 2) {
				<?php
					if($_SESSION["memberType"] > 0) {
						echo '
							$("#cpinfo").hide();
							$("#coinfo").show();
							$("#cprefer").hide();
							$("#cpass").hide();
						';
					}
					else
						echo '
							$("#cpinfo").hide();
							$("#coinfo").show();
							$("#register").hide();
						';
				?>
			}
			else if (page == 3) {
				<?php
					if($_SESSION["memberType"] > 0) {
						echo '
							$("#cpinfo").hide();
							$("#coinfo").hide();
							$("#cprefer").show();
							$("#cpass").hide();
						';
					}
					else
						echo '
							$("#cpinfo").hide();
							$("#coinfo").hide();
							$("#register").show();
						';
				?>
			}
			else if (page == 4) {
				<?php
					if($_SESSION["memberType"] > 0) {
						echo '
							$("#cpinfo").hide();
							$("#coinfo").hide();
							$("#cprefer").hide();
							$("#cpass").show();
						';
					}
				?>
			}
		}

		var validated = false, cpass = false;
		function submit_form(submit_id, submit_name) {
			if(submit_name == "submit_register")
				$('#'+submit_id).trigger("submit");
			else {
				$('#'+submit_id).submit(function(e) {
					if(validated) {
						var preloader = '\
							<div class="preloader-wrapper small active"> \
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
						$('.profile-next-or-submit-button').html(preloader);
						$('.profile-next-or-submit-button').prop("disabled", true);
						var url="update_profile.php";
						$.ajax({
							type: "POST",
							url: url,
							data: submit_name+'=g&'+$('#'+submit_id).serialize(), 
							success: function(data) {
								swal({
									title: "Success!",
									text: "Profile Updated!",
									type: "success",
									allowEscapeKey: true,
									allowOutsideClick: true,
									timer: 10000
								}, function() {
									animateBodyScrollTop();
								});
								if(cpass) { // if true, every success of data val from cpass form, it clears the form
									$('div#cpass input').val("");
								}
								$('.profile-next-or-submit-button').text('Submit');
								$('.profile-next-or-submit-button').prop("disabled", false);
							},
							error: function(data) {
								swal({
									title: "Error!",
									text: "Cannot reach server. Please try again.",
									type: "error",
									allowEscapeKey: true,
									allowOutsideClick: true,
									timer: 10000
								}, function() {
									animateBodyScrollTop();
								});
								$('.profile-next-or-submit-button').text('Submit');
								$('.profile-next-or-submit-button').prop("disabled", false);
							}
						});
					}
					validated = false; // re-initialize validated variable
					confirmvalidated = false; // re=initialize
					e.preventDefault();
				});
			}
		}
	</script>
	
	 <!-- this section is for notification approval of requests -->
	<script>
		function approval() {
			 $('.dropdown-button').dropdown('close');
			swal({
				  title: "Do you approve?",
				  type: "info",
				  showCancelButton: true,
				  confirmButtonColor: "#66ff66",
				  confirmButtonText: "Yes",
				  cancelButtonText: "No",
				  allowEscapeKey: false,
				  closeOnConfirm: false,
				  closeOnCancel: false
				},
				function(isConfirm){
					if(isConfirm) {
						var xhttp;
						xhttp = new XMLHttpRequest();
							xhttp.onreadystatechange = function() {
								if (this.readyState == 4 && this.status == 200) {
								document.getElementById("response").innerHTML = this.responseText;
							}
						};
						xhttp.open("GET", "request.php?apr=y", true);
						xhttp.send();
						swal({
								title: "Approved!",
								text: "You have approved this request.",
								type: "success",
								allowOutsideClick: true
							});
					}
					else {
						var xhttp;
						xhttp = new XMLHttpRequest();
							xhttp.onreadystatechange = function() {
								if (this.readyState == 4 && this.status == 200) {
								document.getElementById("response").innerHTML = this.responseText;
							}
						};
						xhttp.open("GET", "request.php?apr=n", true);
						xhttp.send();
						swal({
								title: "Disapproved!",
								text: "You have disapproved this request.",
								type: "error",
								allowOutsideClick: true
							});
					}
					/*
				setTimeout( 
					swal({
							title: "Approved!",
							text: "You have approved this request.",
							type: "success"
						},
						function() { //window.location here ?apr=y }
						), 1000);
						*/
				});
		}
		
		
		var title = "Christ's Commission Fellowship";
		function seen() { // this function gets rid of the badge every after click event 
			document.getElementById('bell').innerHTML = '<i class="material-icons material-icon-notification">notifications</i>';
			document.getElementById('badge').innerHTML = "Notifications";
			setSeenRequest(); // records in the database that user has seen or read the notifications

			// get Notifications using ajax
			var url = "get_notifs.php";
			var preloader = '\
				<div class="preloader-wrapper small active spinner-notif"> \
					<div class="spinner-layer spinner-blue-only spinner-color-notif"> \
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
			$('title').text(title); // re-initialize the title
			$.ajax({
				type: 'POST',
				url: url,
				data: 'view',
				dataType: 'json',
				success: function(data) {
					if(data.count >= 1) {
						$('#notifications').html(data.view);
					}
					else {
						$('#notifications').html('\
						<li><h6 class="notifications-header" id="badge">Notifications</h6></li>\
						<li class="divider"></li>\
						<li><a class="center">No new notifications</a></li>');
					}
				},
				error: function(data) {
					$('#notifications').html('\
					<li><h6 class="notifications-header" id="badge">Notifications</h6></li>\
					<li class="divider"></li>\
					<li><a>Failed to load. Please check your connection and try again.</a></li>');
				}
			});
		}
		
		function setSeenRequest() {
			var xhttp;
			xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					document.getElementById("response").innerHTML = this.responseText;
				}
			};
			xhttp.open("POST", "globalfunctions.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("seen");
		}

		/* 
		============================================================
		============================================================
		====================FORM VALIDATION=========================
		============================================================
		============================================================
		*/
		$('.error, .error-with-icon').hide(); // by default, hide all error classes
		
		$(document).ready(function() {
			<?php
				if($_SESSION["memberType"] == 0)
					echo '$("#register_page1 small").text("This field is required.");';
				else
					echo '$("div#cpinfo small").text("This field is required.");';
			?>
		});

		function disableDefaultRequired(elem) {
			// disable default required tooltips
			document.addEventListener('invalid', (function () {
			    return function (e) {
			        e.preventDefault();
			    };
			})(), true);
		}

		// personal info form validation
		$("#submit_cpinfo").click(function() {
			$('.error').hide();
			$(this).blur();
			var check_iteration = true, focused_element;

			$($("form#fcpinfo").find('input').reverse()).each(function() {
				if($(this).prop('required')) {
					if($(this).val() == "") {
						$("small#"+this.id+"-required").show();
						focused_element = $(this);
						disableDefaultRequired($(this));
						check_iteration = false;
					}
				}
			});

			if(!check_iteration)
				scrollTo(focused_element);
			
			if(check_iteration) {
				validated = true;
			}
		});

		var civilstatusid = "#CivilStatus";
		$("#coinfo_next").click(function() {
			var focused_element;
			// default and initialization states
			var company = $(".company"), school = $(".school"), spouse = $(".spouse");
			$('.error').hide();
			company.show();
			school.show();
			spouse.show();
			$("#CompanyName").prop("required", true);
			$("#SchoolName").prop("required", true);
			$("#SpouseName").prop("required", true);
			$(this).blur(); // no focus in button once clicked
			var check_iteration = true;
			
			/* ===== SPOUSE VALIDATION ===== */
			if($(civilstatusid).val() == "Single" || $(civilstatusid).val() == "Single Parent" || $(civilstatusid).val() == "Annulled" || $(civilstatusid).val() == "Widow/er") {
				spouse.hide();
				$(".spouse input").prop("required", false);
				//$("h4").find(":contains('Spouse')").hide();
				//$("[id^=Spouse], [for^=Spouse]").hide();
			}

			/* ===== COMPANY AND SCHOOL VALIDATION ===== */
			var professionid = "#Profession";
			if($(professionid).val().toLowerCase() == "student") {
				company.hide();
				$(".company input").prop("required", false);
			}
			else {
				school.hide();
				$(".school input").prop("required", false);
			}

			$($('form#fcoinfo #'+getCurrentPage()).find('input').reverse()).each(function() {
			// [FRONT-END] iterate to show error classes to required fields
			// [BACK-END] iterate to check blank fields and other factors before going to next pages
				if($(this).prop('required')) {
					if($(this).val() == "") {
						$('small#'+this.id+'-required').show();
						//$('#'+this.id).focus();
						focused_element = $(this);
						disableDefaultRequired($(this));
						check_iteration = false;
					}
					else if(this.id == "Email") {
						if(!isValidEmailAddress($(this).val())) {
							$('#Invalid-Email').show();
							//$('#'+this.id).focus();
							focused_element = $(this);
							disableDefaultRequired($(this));
							check_iteration = false;
						}
					}
				}
			});

			if(!check_iteration) // checks if there is mali in form
				scrollTo(focused_element); // scrolls to focused element

			if(check_iteration) {
				confirmvalidated = true;
				if(checkLastPage()) {
					validated = true;
					confirmvalidated = false;
				}
				pagination(1, this.id.split("_")[0]);
			}

		});

		// change event handler removes leading
		$("[id^=timepicker]").change(function() {
			var time_value = $(this).val();
			if(time_value.charAt(0) == '0') {
				$(this).val(removeLeadingZero(time_value));
			}
		});

		$("#cprefer_next").click(function() {
			// default states
			$('.error').hide();
			$(this).blur(); // no focus in button once clicked
			var check_iteration = true;

			// convert time values to timestamp
			var start_time = $("#timepicker2opt1").val(), end_time = $("#timepicker2opt2").val();
			d = (new Date()).getYear() + '-' + ((new Date()).getMonth()+1) + '-' + (new Date()).getDate();
			//d = "2015-03-25";
			start_time = spaceAMPM(start_time);
			end_time = spaceAMPM(end_time);
			start_time = new Date(d + " " + start_time);
			end_time = new Date(d + " " + end_time);
			start_time = start_time.getTime();
			end_time = end_time.getTime();
			if(start_time > end_time) {
				$(".greater2").show();
				focused_element = $("#timepicker2opt1");
				check_iteration = false;
			}

			if(start_time == end_time && !($('[id^=timepicker1]').val() == "")) {
				$("#timepicker2opt1-equal").show();
				$("#timepicker2opt2-equal").show();
				focused_element = $("#timepicker2opt1");
				check_iteration = false;
			}

			// convert time values to timestamp
			start_time = $("#timepicker1opt1").val();
			end_time = $("#timepicker1opt2").val();
			start_time = spaceAMPM(start_time);
			end_time = spaceAMPM(end_time);
			start_time = new Date(d + " " + start_time);
			end_time = new Date(d + " " + end_time);
			start_time = start_time.getTime();
			end_time = end_time.getTime();
			if(start_time > end_time) {
				$(".greater1").show();
				focused_element = $("#timepicker1opt1");
				check_iteration = false;
			}

			if(start_time == end_time && !($('[id^=timepicker2]').val() == "")) {
				$("#timepicker1opt1-equal").show();
				$("#timepicker1opt2-equal").show();
				focused_element = $("#timepicker1opt1");
				check_iteration = false;
			}

			$($('form#fcprefer #'+getCurrentPage()).find('input').reverse()).each(function() {
			// [FRONT-END] iterate to show error classes to required fields
			// [BACK-END] iterate to check blank fields and other factors before going to next pages
				if($(this).prop('required')) {
					if($(this).val() == "") {
						$('small#'+this.id+'-required').show();
						focused_element = $(this);
						disableDefaultRequired($(this));
						check_iteration = false;
					}
				}
			});

			if(!check_iteration)
				scrollTo(focused_element);

			if(check_iteration) {
				confirmvalidated = true;
				if(checkLastPage()) {
					validated = true;
					confirmvalidated = false;
				}
				pagination(1, this.id.split("_")[0]);
			}
		});

		$('#register_page1, #register_page2, #register_page3').find('input, select').each(function() {
			// disable pages 1-3 in register
			$(this).prop("disabled", true);
		});

		$('#register_next').click(function(){
			// default states
			$('.error').hide();
			var focused_element;
			$(this).blur(); // no focus in button once clicked
			var check_iteration = true;
			var company = $(".company"), school = $(".school"), spouse = $(".spouse");
			$('.error').hide();
			company.show();
			school.show();
			spouse.show();
			$("#CompanyName").prop("required", true);
			$("#SchoolName").prop("required", true);
			$("#SpouseName").prop("required", true);

			/* ===== SPOUSE VALIDATION ===== */
			if($(civilstatusid).val() == "Single" || $(civilstatusid).val() == "Single Parent" || $(civilstatusid).val() == "Annulled" || $(civilstatusid).val() == "Widow/er") {
				spouse.hide();
				$(".spouse input").prop("required", false);
				//$("h4").find(":contains('Spouse')").hide();
				//$("[id^=Spouse], [for^=Spouse]").hide();
			}

			/* ===== COMPANY AND SCHOOL VALIDATION ===== */
			var professionid = "#Profession";
			if($(professionid).val().toLowerCase() == "student") {
				company.hide();
				$(".company input").prop("required", false);
			}
			else {
				school.hide();
				$(".school input").prop("required", false);
			}

			// convert time values to timestamp
			var start_time = $("#timepicker2opt1").val(), end_time = $("#timepicker2opt2").val();
			d = (new Date()).getYear() + '-' + ((new Date()).getMonth()+1) + '-' + (new Date()).getDate();
			//d = "2015-03-25";
			start_time = spaceAMPM(start_time);
			end_time = spaceAMPM(end_time);
			start_time = new Date(d + " " + start_time);
			end_time = new Date(d + " " + end_time);
			start_time = start_time.getTime();
			end_time = end_time.getTime();
			if(start_time > end_time) {
				$(".greater2").show();
				focused_element = $("#timepicker2opt1");
				check_iteration = false;
			}

			if(start_time == end_time && !($('[id^=timepicker1]').val() == "")) {
				$("#timepicker2opt1-equal").show();
				$("#timepicker2opt2-equal").show();
				focused_element = $("#timepicker2opt1");
				check_iteration = false;
			}

			// convert time values to timestamp
			start_time = $("#timepicker1opt1").val();
			end_time = $("#timepicker1opt2").val();
			start_time = spaceAMPM(start_time);
			end_time = spaceAMPM(end_time);
			start_time = new Date(d + " " + start_time);
			end_time = new Date(d + " " + end_time);
			start_time = start_time.getTime();
			end_time = end_time.getTime();
			if(start_time > end_time) {
				$(".greater1").show();
				focused_element = $("#timepicker1opt1");
				check_iteration = false;
			}

			if(start_time == end_time && !($('[id^=timepicker2]').val() == "")) {
				$("#timepicker1opt1-equal").show();
				$("#timepicker1opt2-equal").show();
				focused_element = $("#timepicker1opt1");
				check_iteration = false;
			}
			
			if(getCurrentPage().split("_")[1] == 'page4') {
				if($('#DgroupType').val() == "Married") {
					if($(civilstatusid).val() == "Single" || $(civilstatusid).val() == "Single Parent" || $(civilstatusid).val() == "Annulled") {
						$('#DgroupType-nospouse').show();
						focused_element = $('#DgroupType');
						check_iteration = false;
					}
				}
				else if($('#DgroupType').val() == "Single") {
					if($(civilstatusid).val() == "Married" || $(civilstatusid).val() == "Widow/er" || $(civilstatusid).val() == "Annulled") {
						$('#DgroupType-spouse').show();
						focused_element = $('#DgroupType');
						check_iteration = false;
					}
				}
				else if($('#DgroupType').val() == "Youth") {
					if($(civilstatusid).val() == "Married" || $(civilstatusid).val() == "Separated" || $(civilstatusid).val() == "Widow/er" || $(civilstatusid).val() == "Annulled") {
						$('#DgroupType-spouse').show();
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

			$($('form#fregister #'+getCurrentPage()).find('input, select').reverse()).each(function() {
				if($(this).prop('required')) {
					if($(this).val() == "") {
						$('small#'+this.id+'-required').show();
						focused_element = $(this);
						disableDefaultRequired($(this));
						check_iteration = false;
					}
					else if(this.id == "Email") {
						if(!isValidEmailAddress($(this).val())) {
							$('#Invalid-Email').show();
							//$('#'+this.id).focus();
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
				}
			});

			if(!check_iteration)
				scrollTo(focused_element);

			if(check_iteration) {
				confirmvalidated = true;
				if(checkLastPage()) {
					validated = true;
					confirmvalidated = false;
				}
				pagination(1, this.id.split("_")[0]);

				if(getCurrentPage() == 'page3' && !isCellActive){
					$('#next').prop("disabled", true);
				}
			}
		});	

		var gender = "";
		var dgrouptype = "";
		// computes age every change of value of date
		var age;

		$(document).ready(function(){
			if($('#Gender_Male').prop("checked"))
				gender = $('#Gender_Male').val();
			else
				gender = $('#Gender_Female').val();
			filterDgroupTable();
			$('#Birthdate').trigger("change");
			$('#DgroupType').trigger("change");
		});


		$('#Birthdate').change(function() {
			var birthdate = $(this).val();
			var day = birthdate.split(",")[0].split(" ")[0], month = birthdate.split(",")[0].split(" ")[1], year = birthdate.split(",")[1];
			birthdate = month + " " + day + "," + year;
			birthdate = new Date(birthdate);
			var birthyear = birthdate.getYear();
			age = (new Date()).getYear() - birthyear;
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
						/*alert($(this).text());
						alert(gender);*/
						if($(this).text() != gender) {
							//alert("true");
							$(this).parent().hide();
						}
						else {
							//alert("false");
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
						/*alert($(this).text());
						alert(age);*/
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

		
		/*$('#Birthdate').change(function() {
		});*/


		// change password form validation
		$("#submit_cpass").click(function() {
			$('.error-with-icon').hide(); // this jquery function validates the form; order of validation should be reversed, from bottom to top so that .focus() can emhasize the top most input
			$(this).blur();
			var oldpass = $("#old-password").val();
			var newpass = $("#new-password").val();
			var confirmpass = $("#confirm-password").val();
			var checkoldnew = true, checknewpass = true, checkoldpass = true;

			//password form

			// ===== CHECKS IF INPUTS ARE BLANK =====
			if(confirmpass=="") {
				$("small#confirmpass").show();
				$("input#confirm-password").focus();
			}

			if(oldpass==newpass) {
				$("small#checkoldnew").show();
				$("input#new-password").focus();
				checkoldnew = false;
			}

			if(newpass=="") {
				$("small#checkoldnew").hide();
				$("small#newpass").show();
				$("input#new-password").focus();
			}

			if(oldpass=="") {
				$("small#oldpass").show();
				$("input#old-password").focus();
			}
			// ===== END =====

			if(confirmpass!=newpass) {
				$("small#confirmpass").hide();
				$("small#checkpass").show();
				$("input#confirm-password").focus();
				checknewpass = false;
			}

			var url="check.php";
			$.ajax({
				type: "POST",
				url: url,
				async: false, // remove if there is bad user experience
				data: $('#fcpass').serialize(),
				success: function(data) {
					if(data == 0) {
						if(oldpass=="")
							$("small#oldpass").show();
						else
							$("small#notpass").show();
						$("input#old-password").focus();
					}
					else {
						if(oldpass!=""&&newpass!=""&&confirmpass!==""&&checknewpass&&checkoldnew) {
							validated = true;
							cpass = true;
						}
					}
				}
			});

			$("form#fcpass").find('input').each(function() { // scrolls to the current focused element
				if($(this).is(':focus')) {
					scrollTo($(this));
					return false;
				}
			});
		});

		$('#fregister').submit(function(e) {
			// put ajax here
			var url =" update_profile.php";
			$.ajax({
				type: 'POST',
				url: url,
				data: 'submit_register=g&'+$('#fregister').serialize(),
				success: function(data) {
					alert(data);
					window.location.href = "dgroup.php";
				}
			});
			e.preventDefault();
		});

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
		/*

		var unsaved = false;

		$(document).ready(function() {
			unsaved = false;
		});

		$('input, select, textarea').change(function() {
			unsaved = true;
		});

		$(window).bind('beforeunload', function() {
		    if(unsaved){
		        return "You have unsaved changes on this page. Do you want to leave this page and discard your changes or stay on this page?";
		    }
		});

		$('[id^=sidenav]').click(function() {
			if(unsaved) {
				if(this.id[this.id.length - 1] != active_page) {
					alert("Please save your changes.");
					navigationForms(active_page);
				}

				var test = $(this);
				$('[id^=sidenav]').each(function() {
					if($(this) != test) {
						$(this).off("click");
						alert(1);
					}
				});
			}
		});
		*/

		/* ===== END ===== */
	</script>

	<script>
		// real time update notification
		// SSE - Server-Sent Events

		if(typeof(EventSource) !== "undefined") {
			var source = new EventSource("push_notifs.php");
			source.onmessage = function(e) {
				if(e.data >= 1) {
					// data should always be the attribute
					$('#bell').html('<i class="material-icons material-icon-notification">notifications</i>\
									 <sup class="notification-badge">'+e.data+'</sup>');
					$('title').text("("+e.data+") "+title);
				}
			};
		}
		else {
			// pass
		}

	</script>
</html>