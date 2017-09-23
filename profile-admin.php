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
		function defaultActive() {
			document.getElementById('sidenav1').setAttribute("class", "waves-effect waves-light btn btn-side-nav side-nav-active");
		}
		function setActive(element) {
			removeActives();
			document.getElementById(element.id).setAttribute("class", "waves-effect waves-light btn btn-side-nav side-nav-active");
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

		function cellActive(id) { // this function allows you to highlight the table rows you select
			var num_of_rows = document.getElementsByTagName("TR").length;
			var rownumber = id.charAt(3);
			for(var i = 0; i < num_of_rows; i++) {
				document.getElementsByTagName("TR")[i].style.backgroundColor = "#fff"; // default color of rows = #f2f2f2
				document.getElementsByTagName("TR")[i].style.color = "black"
			}
			document.getElementById(id).style.backgroundColor = "#16A5B8";
			document.getElementById(id).style.color = "#fff";

			$("#dgroupID").val(id.split("_")[1]);
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
								<li class="li-sidenav"><a id="sidenav1" class="waves-effect waves-light btn btn-side-nav"  onclick="setActive(this); navigationForms(1);" onfocus="disableFocus(this)">Change Password</a></li>
							</ul>
					</div>
					<div class="col s9 content">
						<div class="container">
							<form method="post" class="forms" id="fcpass">
								<div id="cpass">
									<div class="row">
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
											<small class="error-with-icon" id="oldpass"></small>
											<small class="error-with-icon" id="notpass"></small>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">lock</i> <!-- lock_outline -->
											<input type="password" name="new-password" id="new-password" data-length="16" maxlength="16">
											<label for="new-password">New Password</label>
											<small class="error-with-icon" id="newpass"></small>
											<small class="error-with-icon" id="checkoldnew"></small>
										</div>
										<div class="input-field col s12">
											<i class="material-icons prefix">lock</i> <!-- lock_outline -->
											<input type="password" name="confirm-password" id="confirm-password" data-length="16" maxlength="16">
											<label for="confirm-password">Confirm New Password</label>
											<small class="error-with-icon" id="confirmpass"></small>
											<small class="error-with-icon" id="checkpass"></small>
										</div>
										'; // originally having a value of own password
										?>
									</div>
									<div class="row">
										<button class="waves-effect waves-light btn profile-next-or-submit-button col s2 right fixbutton" type="submit" name="submit_cpass" id="submit_cpass" onclick="submit_form('fcpass', this.id)">SUBMIT</button>
									</div>
								</div>
							</form>
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
					if($_SESSION["memberType"] == 5) {
						echo '
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
		$('.error-with-icon').hide(); // by default, hide all error classes
		
		$(document).ready(function() {
			$('.error-with-icon').text('This field is required.');
			$('#notpass').text('This is not your password.');
			$('#checkoldnew').text('Cannot use old password.');
			$('#checkpass').text('Passwords do not match.')
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
			var civilstatusid = "#CivilStatus"
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
			window.location.href = "dgroup.php";
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