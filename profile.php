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
			/*position: fixed;
			top: 0; this is responsible for fixed nav bars */
			color: #777;
			background-color: #fff;
			width: 100%;
			height: 97px;
			line-height: 97px;
			z-index: 2;
		}

		/* this is responsible for fixed nav bars 
		body {
			margin-top: 150px;
		}*/
		
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

		.error {
			color: #ff3333;
			margin-left: 43;
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

		/*
		window.addEventListener("scroll", function() {
			if(window.scrollY > 50) {
				$('nav').slideUp(100);
			}
			else {
				$('nav').slideDown(100);
			}
		}, false);
		*/

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

			history.pushState(null, null, "profile.php?id="+id.split("_")[1]);
		}
	</script>

	<header class="top-nav">
	<!-- Dropdown Structure Account--> 
		<ul id="account" class="dropdown-content dropdown-content-list">
		  	<li><a href="profile.php"><i class="material-icons prefix>">mode_edit</i>Edit Profile</a></li>
		  	<li class="divider"></li>
		  	<li><a href="dgroup.php"><i class="material-icons prefix>">group</i>Dgroup</a></li>
		  	<li class="divider"></li>
		  	<li><a href="create-event.php"><i class="material-icons prefix>">library_add</i>Propose Event</a></li>
		  	<li class="divider"></li>
		  	<li><a href="pministry.php"><i class="material-icons prefix>">group_add</i>Propose Ministry</a></li> <!-- for dgroup leaders view -->
		  	<li class="divider"></li>
		  	<li><a href="logout.php"><i class="material-icons prefix>">exit_to_app</i>Logout</a></li>
		</ul>
	<!-- Dropdown Structure Notifications-->
		<ul id="notifications" class="dropdown-content dropdown-content-notification">
			<li><h6 class="notifications-header" id="badge">Notifications<?php if(getNotificationStatus() == 0) echo '<span class="new badge">'.notifCount().'</span>'; ?></h6></li>
			<li class="divider"></li>
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

				// insert code set notificationStatus = 1 when user clicks notification area
				$query = "SELECT notificationDesc, notificationStatus, notificationType, request FROM notifications_tbl WHERE notificationStatus <= 1 AND (receivermemberID = ".$_SESSION['userid'].");";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						//$receivermemberID = $row['receivermemberID']; testing muna ito
						$notificationDesc = $row['notificationDesc'];
						$notificationStatus = $row['notificationStatus'];
						$notificationType = $row['notificationType'];
						$request = $row['request'];
						if($notificationStatus <= 1 && $notificationType == 0 && $request == 1) { // loads notifications if both seen or not seen and endorsement request type; this is also for heads
							echo '<li><a onclick="approval()">'.$notificationDesc.'</a></li>';
						}
						else if($notificationStatus <= 1 && $notificationType == 0 && getEndorsementStatus(getDgroupMemberID($_SESSION['userid'])) == 1) { // for result notifs of request approve
							echo '<li><a href="endorsement.php">'.$notificationDesc.'</a></li>';
						}
						else if($notificationStatus <= 1 && $notificationType == 0 && getEndorsementStatus(getDgroupMemberID($_SESSION['userid'])) == 3) { // for result notifs of request reject/reconsideration
							echo '<li><a>'.$notificationDesc.'</a></li>';
						}
						else if($notificationStatus <= 1 && $notificationType == 1) { // for event notifs

						}
						else if($notificationStatus <= 1 && $notificationType == 2) { // for ministry notifs

						}
						echo '<li class="divider"></li>';
					}
				}
			?>
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
				<table>
					<tr>
						<td class="fixed">
							<ul class="sidenav">
								<li classs="li-sidenav"><a id="sidenav1" class="waves-effect waves-light btn btn-side-nav" href="#cpinfo" onclick="setActive(this); navigationForms(1);" onfocus="disableFocus(this)">Personal Information</a></li>
								<li classs="li-sidenav"><a id="sidenav2" class="waves-effect waves-light btn btn-side-nav" href="#coinfo" onclick="setNavPage('coinfo', 2); setActive(this); navigationForms(2);" onfocus="disableFocus(this)">Other Information</a></li>
								<li classs="li-sidenav"><a id="sidenav3" class="waves-effect waves-light btn btn-side-nav" href="#cprefer" onclick="setNavPage('cprefer', 2); setActive(this); navigationForms(3);" onfocus="disableFocus(this)">Preferences</a</li>
								<li classs="li-sidenav"><a id="sidenav4" class="waves-effect waves-light btn btn-side-nav" href="#cpass" onclick="setActive(this); navigationForms(4);" onfocus="disableFocus(this)">Change Password</a></li>
								<li classs="li-sidenav"><a id="sidenav5" class="waves-effect waves-light btn btn-side-nav" href="#register" onclick="setNavPage('register', 4); setActive(this); navigationForms(5);" onfocus="disableFocus(this)">Be a Dgroup Member</a></li>
							</ul>
						</td>
						<td class="content">
							<div class="container">
								<form method="post" class="forms" id="fcpinfo">
									<div id="cpinfo">
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
													<input type="text" name="Lastname" id="Lastname" data-length="20" maxlength="20" value="'.$lastname.'">
													<label for="Lastname">Last Name</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="Firstname" id="Firstname" data-length="20" maxlength="20" value="'.$firstname.'">
													<label for="Firstname">First Name</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="Middlename" id="Middlename" data-length="20" maxlength="20" value="'.$middlename.'">
													<label for="Middlename">Middle Name</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="Nickname" id="Nickname" data-length="20" maxlength="20" value="'.$nickname.'">
													<label for="Nickname">Nickname</label>
												</div>
												<div class="input-field col s12">
													<input type="text" class="datepicker" id="Birthdate" name="Birthdate" value="'.$birthdate.'"> <!-- originally date type, OC ito haha -->
													<label for="Birthdate">Birthdate</label>
												</div>
												';
											?>
											<div class="row">
												<button class="waves-effect waves-light btn profile-next-or-submit-button col s2 right fixbutton" type="submit" name="submit_cpinfo" id="submit_cpinfo" onclick="submit_form('fcpinfo', this.id)">SUBMIT</button>
											</div>
										</div>
									</div>
								</form>
								<form method="post" class="forms" id="fcoinfo">
									<div id="coinfo" style="display: none;">
										<div class="row">
											<!-- page 1 -->
											<div id="coinfo_page1">
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
													else if($civilstatus == "Single Parent") $selectedcivilstatus[2] = "selected";
													else if($civilstatus == "Separated") $selectedcivilstatus[3] = "selected";
													else if($civilstatus == "Married") $selectedcivilstatus[4] = "selected";
													else if($civilstatus == "Annulled") $selectedcivilstatus[5] = "selected";
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
													<input type="radio" id="Gender_Male" name="Gender" value="Male" '.$male.'/>
													<label for="Gender_Male">Male</label>
													<input type="radio" id="Gender_Female" name="Gender" value="Female" '.$female.'/>
													<label for="Gender_Female">Female</label>
												</p>
												<div class="input-field col s12">
													<input type="text" name="Citizenship" id="Citizenship" data-length="20" maxlength="20" value="'.$citizenship.'">
													<label for="Citizenship">Citizenship</label>
												</div>
												<div class="row" style="margin: 0"> <!-- all selects must be margin: 0 -->
													<div class="input-field col s12">
														<select id="CivilStatus" name="CivilStatus">
															<option value="" disabled '.$selectedcivilstatus[0].'>Choose your option...</option>
															<option value="Single" '.$selectedcivilstatus[1].'>Single</option>
															<option value="Single Parent" '.$selectedcivilstatus[2].'>Single Parent</option>
															<option value="Married" '.$selectedcivilstatus[3].'>Married</option>
															<option value="Annulled" '.$selectedcivilstatus[4].'>Annulled</option>
															<option value="Separated" '.$selectedcivilstatus[5].'>Separated</option>
															<option value="Widow/er" '.$selectedcivilstatus[6].'>Widow/er</option>
														</select>
														<label>Civil Status</label>
													</div>
												</div>
												<div class="input-field col s12">
													<input type="text" name="MobileNumber" id="MobileNumber" onkeypress="return event.charCode >= 48 && event.charCode <= 57 //only numbers on keypress" data-length="18" maxlength="18" value="'.$contactnum.'">
													<label for="MobileNumber" name="mobilenumber">Mobile Number</label>
												</div>
												<div class="input-field col s12">
													<input type="email" name="Email" id="Email" data-length="30" maxlength="30" value="'.$emailad.'"> <!-- increase size of email address -->
													<label for="Email" data-error="Invalid email address">Email Address</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="Profession" id="Profession" data-length="30" maxlength="30" value="'.$occupation.'">
													<label for="Profession">Profession/Occupation</label>
												</div>';
												?>
											</div>

											<!-- page 2 -->
											<div id="coinfo_page2" style="display: none;">
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
													<input type="text" name="HomeAddress" id="HomeAddress" data-length="50" maxlength="50" value="'.$homeaddress.'">
													<label for="HomeAddress">Address</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="HomePhoneNumber" id="HomePhoneNumber" data-length="18" maxlength="18" value="'.$homephonenumber.'">
													<label for="HomePhoneNumber">Home Phone Number</label>
												</div>
												<h4 class="center">Company</h4>
												<div class="input-field col s12">
													<input type="text" name="CompanyName" id="CompanyName" data-length="30" maxlength="30" value="'.$companyname.'">
													<label for="CompanyName">Company Name</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="CompanyContactNum" id="CompanyContactNum" data-length="18" maxlength="18" value="'.$companycontactnum.'">
													<label for="CompanyContactNum">Company Contact Number</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="CompanyAddress" id="CompanyAddress" data-length="50" maxlength="50" value="'.$companyaddress.'">
													<label for="CompanyAddress">Company Address</label>
												</div>
												<h4 class="center">School</h4>
												<div class="input-field col s12">
													<input type="text" name="SchoolName" id="SchoolName" data-length="30" maxlength="30" value="'.$schoolname.'">
													<label for="SchoolName">School Name</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="SchoolContactNum" id="SchoolContactNum" data-length="18" maxlength="18" value="'.$schoolcontactnum.'">
													<label for="SchoolContactNum">School Contact Number</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="SchoolAddress" id="SchoolAddress" data-length="50" maxlength="50" value="'.$schooladdress.'">
													<label for="SchoolAddress">School Address</label>
												</div>
												<h4 class="center">Spouse</h4>
												<div class="input-field col s12">
													<input type="text" name="SpouseName" id="SpouseName" data-length="30" maxlength="30" value="'.$spousename.'">
													<label for="SpouseName">Spouse Name</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="SpouseMobileNumber" id="SpouseMobileNumber" data-length="18" maxlength="18" value="'.$spousecontactnum.'">
													<label for="SpouseMobileNumber">Spouse Mobile Number</label>
												</div>
												<div class="input-field col s12">
													<input type="text" class="datepicker" id="SpouseBirthdate" name="SpouseBirthdate" value="'.$spousebirthdate.'"> <!-- originally date type, OC ito haha -->
													<label for="SpouseBirthdate">Birthdate</label>
												</div>';
											?>
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
								<form method="post" class="forms" id="fcprefer" onsubmit="submit_form(this.id)">
									<div id="cprefer" style="display: none;">
										<div class="row">
											<!-- page 1 -->
											<div id="cprefer_page1">
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
													<input type="text" name="Language" id="Language" data-length="50" maxlength="50" value="'.$preflanguage.'">
													<label for="Language">Language</label>
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
													</div>
													<div class="input-field col s6">
														<label for="timepicker2opt1">End Time</label>
														<input type="text" class="timepicker" name="timepicker1opt2" id="timepicker1opt2" value="'.$prefendtime1.'">
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
														<label for="timepicker1opt2">Start Time</label>
														<input type="text" class="timepicker" name="timepicker2opt1" id="timepicker2opt1" value="'.$prefstarttime2.'">
													</div>
													<div class="input-field col s6">
														<label for="timepicker2opt2">End Time</label>
														<input type="text" class="timepicker" name="timepicker2opt2" id="timepicker2opt2" value="'.$prefendtime2.'">
													</div>
												<div class="input-field col s12">
													<input type="text" name="Option2Venue" id="Option2Venue" data-length="50" maxlength="50" value="'.$prefvenue2.'">
													<label for="Option2Venue" style=" font-size:14px;">Venue</label>
												</div>';
												?>
											</div>

											<!-- page 2 -->
											<div id="cprefer_page2" style="display: none;">
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
												</div>';
											?>
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
								<form method="post" id="fcpass">
									<div id="cpass" style="display: none;">
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
												<small class="error" id="oldpass">This field is required.</small>
												<small class="error" id="notpass">This is not your password.</small>
											</div>
											<div class="input-field col s12">
												<i class="material-icons prefix">lock</i> <!-- lock_outline -->
												<input type="password" name="new-password" id="new-password" data-length="16" maxlength="16">
												<label for="new-password">New Password</label>
												<small class="error" id="newpass">This field is required.</small>
												<small class="error" id="checkoldnew">Cannot use old password.</small>
											</div>
											<div class="input-field col s12">
												<i class="material-icons prefix">lock</i> <!-- lock_outline -->
												<input type="password" name="confirm-password" id="confirm-password" data-length="16" maxlength="16">
												<label for="confirm-password">Confirm New Password</label>
												<small class="error" id="confirmpass">This field is required.</small>
												<small class="error" id="checkpass">Passwords do not match.</small>
											</div>
											'; // originally having a value of own password
											?>
											<div class="row">
												<button class="waves-effect waves-light btn profile-next-or-submit-button col s2 right fixbutton" type="submit" name="submit_cpass" id="submit_cpass" onclick="submit_form('fcpass', this.id)">SUBMIT</button>
											</div>
										</div>
									</div>
								</form>
								<form method="post" id="fregister">
									<div id="register" style="display: none;">
										<div class="row">
											<div id="register_page1">
												<h3 class="center">Other Information</h3>
												<div class="input-field col s12">
													<input type="text" name="Citizenship" id="Citizenship" data-length="20" maxlength="20">
													<label for="Citizenship">Citizenship</label>
												</div>
												<div class="input-field col s12">
													<input type="email" name="EmailAd" id="EmailAd" data-length="30" maxlength="30"> <!-- increase size of email address -->
													<label for="EmailAd" data-error="Invalid email address">Email Address</label>
												</div>
												<h4 class="center">Home</h4>
												<div class="input-field col s12">
													<input type="text" name="HomeAddress" id="HomeAddress" data-length="50" maxlength="50">
													<label for="HomeAddress" style=" font-size:14px;">Address</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="HomePhoneNumber" id="HomePhoneNumber" data-length="18" maxlength="18">
													<label for="HomePhoneNumber">Home Phone Number</label>
												</div>
												<h4 class="center">Company</h4>
												<div class="input-field col s12">
													<input type="text" name="CompanyContactNum" id="CompanyContactNum" data-length="18" maxlength="18">
													<label for="CompanyContactNum">Company Contact Number</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="CompanyAddress" id="CompanyAddress" data-length="50" maxlength="50">
													<label for="CompanyAddress" style=" font-size:14px;">Company Address</label>
												</div>
												<h4 class="center">School</h4>
												<div class="input-field col s12">
													<input type="text" name="SchoolContactNum" id="SchoolContactNum" data-length="18" maxlength="18">
													<label for="SchoolContactNum">School Contact Number</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="SchoolAddress" id="SchoolAddress" data-length="50" maxlength="50">
													<label for="SchoolAddress" style=" font-size:14px;">School Address</label>
												</div>
												<h4 class="center">Spouse</h4>
												<div class="input-field col s12">
													<input type="text" name="SpouseName" id="SpouseName" data-length="30" maxlength="30">
													<label for="SpouseName">Spouse Name</label>
												</div>
												<div class="input-field col s12">
													<input type="text" name="SpouseMobileNumber" id="SpouseMobileNumber" data-length="18" maxlength="18">
													<label for="SpouseMobileNumber">Spouse Mobile Number</label>
												</div>
												<div class="input-field col s12">
													<input type="date" class="datepicker" id="SpouseBirthdate" name="SpouseBirthdate">
													<label for="SpouseBirthdate">Birthdate</label>
												</div>
											</div>

											<div id="register_page2" style="display: none;">
												<h3 class="center">Preferences</h3>
												<div class="input-field col s12">
													<input type="text" name="Language" id="Language" data-length="50" maxlength="50">
													<label for="Language">Language</label>
												</div>
												<h4 class="center">Schedule</h4>
												<h5 class="center">Option 1</h5>
												<div class="row" style="margin: 0;">
													<div class="input-field col s12">
														<select id="Option1Day" name="Option1Day">
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
													</div>
												</div>
													<div class="input-field col s6">
														<label for="timepicker1opt1">Start Time</label>
														<input type="time" class="timepicker" name="timepicker1opt1" id="timepicker1opt1">
													</div>
													<div class="input-field col s6 right">
														<label for="timepicker2opt1">End Time</label>
														<input type="time" class="timepicker" name="timepicker2opt1" id="timepicker2opt1">
													</div>
												<div class="input-field col s12">
													<input type="text" name="Option1Venue" id="Option1Venue" data-length="50" maxlength="50">
													<label for="Option1Venue" style=" font-size:14px;">Venue</label>
												</div>
												<h5 class="center">Option 2</h5>
												<div class="row" style="margin: 0;">
													<div class="input-field col s12">
														<select id="Option2Day" name="Option2Day">
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
													</div>
												</div>
													<div class="input-field col s6">
														<label for="timepicker1opt2">Start Time</label>
														<input type="time" class="timepicker" name="timepicker1opt2" id="timepicker1opt2">
													</div>
													<div class="input-field col s6">
														<label for="timepicker2opt2">End Time</label>
														<input type="time" class="timepicker" name="timepicker2opt2" id="timepicker2opt2">
													</div>
												<div class="input-field col s12">
													<input type="text" name="Option2Venue" id="Option2Venue" data-length="50" maxlength="50">
													<label for="Option2Venue" style=" font-size:14px;">Venue</label>
												</div>
											</div>

											<div id="register_page3" style="display: none;">
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
											<div id="register_page4" style="display: none;">
												<h3 class="center">Choose a Dgroup Leader</h3>
												<table class="cursor centered" id="table" style="margin-bottom: 20px;">
													<thead>
														<th style="width: <?php echo widthRow(4); ?>%; display: none;">Dgroup ID</th>
														<th style="width: <?php echo widthRow(5); ?>%">Dgroup Leader</th>
														<th style="width: <?php echo widthRow(5); ?>%">Gender</th>
														<th style="width: <?php echo widthRow(5); ?>%">Type of Dgroup</th>
														<th style="width: <?php echo widthRow(5); ?>%">Day</th>
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
																		END) AS dgroupType, schedDay, CONCAT(schedStartTime, ' - ', schedEndTime) AS schedule FROM member_tbl INNER JOIN discipleshipgroup_tbl ON member_tbl.memberID = discipleshipgroup_tbl.dgleader INNER JOIN scheduledmeeting_tbl ON discipleshipgroup_tbl.schedID = scheduledmeeting_tbl.schedID;";
														$result = mysqli_query($conn, $sql_dgroups);
														if(mysqli_num_rows($result) > 0) {
															$count = 1;
															while($row = mysqli_fetch_assoc($result)) {
																echo '<tr id="row_'.$count.'" onclick="cellActive('."'".'row_'.$count.''."'".')">';
																$dgroupid = $row["dgroupID"];
																$fullname = $row["fullname"];
																$gender = $row["gender"];
																$dgrouptype = $row["dgroupType"];
																$schedday = $row["schedDay"];
																$schedule = $row["schedule"];
																echo '<td class="choose" style="display: none;"><input type="hidden" name="dgroupID'.$count.'" value="'.$dgroupid.'" />
																<td class="choose">'.$fullname.'</td>
																<td class="choose">'.$gender.'</td>
																<td class="choose">'.$dgrouptype.'</td>
																<td class="choose">'.$schedday.'</td>
																<td class="choose">'.$schedule.'</td>';
																echo '</tr>';
																$count++;
															}
														}
														echo ' ';
													?>
													<!--
													<tr id="row1" onclick="cellActive('row1')">
														<td>Sample 1</td>
														<td>Sample 1</td>
														<td>Sample 1</td>
														<td>Sample 1</td>
													</tr>
													<tr id="row2" onclick="cellActive('row2')">
														<td>Sample 2</td>
														<td>Sample 2</td>
														<td>Sample 2</td>
														<td>Sample 2</td>
													</tr>
													<tr id="row3" onclick="cellActive('row3')">
														<td>Sample 3</td>
														<td>Sample 3</td>
														<td>Sample 3</td>
														<td>Sample 3</td>
													</tr>
													-->
												</table>
											</div>
											<div class="row">
												<div class="progress col s6 left" style=" margin-left: 3.3%;">
													<div class="determinate" style="" id="register_progressbar"></div>
												</div>&nbsp; &nbsp;<label id="register_page"></label> <!-- Change when page number adjusts -->
												<button class="waves-effect waves-light btn profile-next-or-submit-button col s2 right" type="button" name="submit_register" id="register_next" onclick="pagination(1, 'register')">NEXT</button>
												<button class="waves-effect waves-light btn col s2 right" type="button" name="submit_back" id="register_back" onclick="pagination(0, 'register')" style="margin-right: 10px; display: none;">BACK</button>
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

	<footer>
	</footer>

	<script>
	"use strict";
		var currentpage = 1, no_of_pages = 0, percentage=(currentpage/no_of_pages)*100, currentprogress=percentage;
		function setNavPage(navpage, num_of_pages) {
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

		function convertToButton(navpage) {
			document.getElementById(navpage+'_next').setAttribute("type", "button");
		}

		var navcurrentpage = 1;
		function navigationForms(page) {
			if(page == 1) {
				document.getElementById('cpinfo').style.display = "inline";
				document.getElementById('coinfo').style.display = "none";
				document.getElementById('cprefer').style.display = "none";
				document.getElementById('cpass').style.display = "none";
				document.getElementById('register').style.display = "none";
			}
			else if (page == 2) {
				document.getElementById('cpinfo').style.display = "none";
				document.getElementById('coinfo').style.display = "inline";
				document.getElementById('cprefer').style.display = "none";
				document.getElementById('cpass').style.display = "none";
				document.getElementById('register').style.display = "none";
			}
			else if (page == 3) {
				document.getElementById('cpinfo').style.display = "none";
				document.getElementById('coinfo').style.display = "none";
				document.getElementById('cprefer').style.display = "inline";
				document.getElementById('cpass').style.display = "none";
				document.getElementById('register').style.display = "none";
			}
			else if (page == 4) {
				document.getElementById('cpinfo').style.display = "none";
				document.getElementById('coinfo').style.display = "none";
				document.getElementById('cprefer').style.display = "none";
				document.getElementById('cpass').style.display = "inline";
				document.getElementById('register').style.display = "none";
			}
			else if (page == 5) {
				document.getElementById('cpinfo').style.display = "none";
				document.getElementById('coinfo').style.display = "none";
				document.getElementById('cprefer').style.display = "none";
				document.getElementById('cpass').style.display = "none";
				document.getElementById('register').style.display = "inline";
			}
		}

		var validated = false;
		function submit_form(submit_id, submit_name) {
			$('#'+submit_id).submit(function(e) {
				if(validated) {
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
							});
						}
					});
					validated = false; // re-initialize validated variable
				}
				e.preventDefault();
			});
			/*
			var xhttp, params;
			xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					document.getElementById("response").innerHTML = this.responseText;
				}
			};
			xhttp.open("POST", "update_profile.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			if(submit_name=="submit_cpinfo")
				params = getSubmitCpinfo();
			else if(submit_name=="submit_coinfo")
				params = getSubmitCoinfo();
			else if(submit_name=="submit_cprefer")
				params = getSubmitCprefer();
			else if(submit_name=="submit_cpass")
				params = getSubmitCpass();
			xhttp.send(submit_name+"=g&"+params);
			alert(params);
			*/
			//return false;
		}

		/*
		function getSubmitCpinfo() {
			var params="", element=document.cpinfo, length=$("#cpinfo input").length;
			for(var i = 0; i < length; i++) { // replace commas in date inputs because year won't update in database, always current year
				if(i==length-1)
					params += element[i].getAttribute("name") + "=" + element[i].value.replace(",", "");
				else
					params += element[i].getAttribute("name") + "=" + element[i].value.replace(",", "") + "&";
			}
			return params;
		}

		function getSubmitCoinfo() {
			var params="", element=document.coinfo, length=$("#coinfo input").length;
			for(var i = 0; i < length+1; i++) { // replace commas in date inputs because year won't update in database, always current year
			// length is plus 1 because the maximum is SpouseMobileNumber; ugh hardcoded, please fix
			// selects are +1
				if(i==length)
					params += element[i].getAttribute("name") + "=" + element[i].value.replace(",", "");
				else
					params += element[i].getAttribute("name") + "=" + element[i].value.replace(",", "") + "&";
			}
			return params;
		}

		function getSubmitCprefer() {
			var params="", element=document.cprefer, length=$("#cprefer input").length + $("#cprefer select").length + $("#cprefer textarea").length;
			for(var i = 0; i < length; i++) { // replace commas in date inputs because year won't update in database, always current year
			// selects are +1
			// textareas are +1
				if(i==length)
					params += element[i].getAttribute("name") + "=" + element[i].value.replace(",", "");
				else
					params += element[i].getAttribute("name") + "=" + element[i].value.replace(",", "") + "&";
			}
			return params;
		}

		function getSubmitCpass() {
			var params="", element=document.cpass, length=$("#cpass input").length;
			for(var i = 0; i < length; i++) { // replace commas in date inputs because year won't update in database, always current year
				if(i==length)
					params += element[i].getAttribute("name") + "=" + element[i].value.replace(",", "");
				else
					params += element[i].getAttribute("name") + "=" + element[i].value.replace(",", "") + "&";
			}
			return params;
		}
		*/
	</script>
	<?php
		/*
		if(isset($_POST["submit_cpinfo"])||isset($_POST["submit_coinfo"])||isset($_POST["submit_cprefer"])||isset($_POST["submit_cpass"])) { // pop up for updates
			echo '
				<script>
				// profile update success
				setTimeout( 
				swal({
						title: "Success!",
						text: "Profile Updated!",
						type: "success",
						allowEscapeKey: true,
						timer: 10000
					},
					function() { window.location = "profile.php"; }
					), 1000);
				</script>
			';
		}
		*/
	?>
	
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
		
		function seen() { // this function gets rid of the badge every after click event 
			document.getElementById('bell').innerHTML = '<i class="material-icons material-icon-notification">notifications</i>';
			document.getElementById('badge').innerHTML = "Notifications";
			setSeenRequest(); // records in the database that user has seen or read the notifications
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

		$('.error').hide();
		$("#submit_cpass").click(function() {
			$('.error').hide(); // this jquery function validates the form; order of validation should be reversed, from bottom to top so that .focus() can emhasize the top most input
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
						}
					}
				}
			});
		});

		/*

		function checkOldPass() {
		}

		function setCheckOldPass() {
			checkOldPass().done(function(data) {
				checkoldpass = false;
			});
		}

		function confirmValidated() {
			if(checkoldpass)
				validated = true;
		}
		*/
	</script>
</html>