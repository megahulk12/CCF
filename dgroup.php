<?php
	include('session.php'); 
	include('globalfunctions.php');
	if($_SESSION["memberType"] == 0 || $_SESSION["memberType"] == 5) {
		header("Location: error.php");
		exit();
	}
?>
<?xml version = ″1.0″?>
<!DOCTYPE html PUBLIC ″-//w3c//DTD XHTML 1.1//EN″ “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns = ″http://www.w3.org/1999/xhtml″>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="resources/CCF.ico">
	<link href="materialize/css/materialize.css" rel="stylesheet">
	<script src="jquery-3.2.1.min.js"></script>
	<script src="materialize/js/materialize.js"></script>
	<script src="universal.js"></script>
	<link href="universal.css" rel="stylesheet">
	<link href="materialize/timepicker/_old/css/materialize.clockpicker.css" rel="stylesheet" media="screen,projection">
	<script src="materialize/timepicker/src/js/materialize.clockpicker.js"></script>

	<!-- for alerts -->
	<script src="alerts/dist/sweetalert-dev.js"></script>
	<link rel="stylesheet" type="text/css" href="alerts/dist/sweetalert.css">

	<head>
		<!--nouislider-->
		<link href="nouislider.css" rel="stylesheet" media="screen,projection">
		<script src="nouislider.js"></script>
	</head>

	<title><?php if(notifCount() >= 1) echo '('.notifCount().')' ?> Christ's Commission Fellowship</title>
	<style>
		::selection {
			background-color: #16A5B8;
			color: #fff;
		}

		div {
			display: block;
		}

		.container {
			margin: 0 auto;
			max-width: 1280px;
			width: 80%;
		}

		#logo {
			margin-top: 10px;
		}

		/*
		colors in materliaze:
		#ee6e73
		colors for ccf:
		#16A5B8
		#777
		*/
		nav ul a:hover {
			background-color: transparent;
		}

		nav {
			position: fixed;
			top: 0;
			color: #777;
			background-color: #fff;
			width: 100%;
			height: 97px;
			line-height: 97px;
			z-index: 2;
		}

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

		/*headers*/
		h1, h2, h3, h4, h5, h6 {
			color: #424242;
			font-family: proxima-nova;
			text-transform: uppercase;
		}
		/*=======END=======*/

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

		.dgroup-leader-button {
				background-color: #16A5B8;
				color: #fff;
		}

		.wait-request {
				background-color: #ebebeb;
				color: #777;
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
				margin-left: -139px; /*shift to the left; alignment of link and dropdown; -139 original */
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
			 position: absolute; /*original: absolute*/
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

		ul.account {
			width: 200px;
			position: absolute;
			top: 77px;
			right: 17px;
			opacity: 1;
			display: none;
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
		.prefix {
			color: #16A5B8;
		}

		.prefix:hover {
			transition: 0.3s ease-out;
			color: #1bcde4;
		}

		.prefix-leader {
			color: #777;
		}

		.prefix-leader:hover {
			transition: 0.3s ease-out;
			color: #999;
		}

		.dgroup-icons {
			font-size: 200px;
		}

		.dgroup-names {
			font-family: proxima-nova;
			color: #424242;
			font-size: 13px;
			text-transform: uppercase;
			-webkit-user-select: none;
			cursor: default;
		}

		.dgroup-table-spacing {
			margin-bottom: 100px;
		}

		.dgroup-view-profile {
			animation-name: view-profile;
			animation-duration: 2s;
			animation-timing-function: ease;
		}

		@keyframes view-profile {
			
		}
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

		/* ===== FOOTER ===== */
		.page-footer {
			margin-top: 100px;
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
			border-color: rgba(0, 0, 0, 0.4);
		}

		.spinner-notif {
			position: relative;
			left: 190px; /* half of width of notif list*/
			top: 100px; /* half of height of notif list*/
		}

		.spinner-color-notif {
			border-color: #777;
		}

		#preloader {
			position: relative;
			width: 0 !important;
		}
		/* ===== END ===== */

		.error {
			color: #ff3333;
		}

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

		/* ===================== END ===================== */
	</style>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.dropdown-button + .dropdown-content-notification').on('click', function(event) {
				event.stopPropagation(); // this event stops closing the notification page when clicked upon
			});
			$('.modal').modal();
			$('select').material_select();
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 50, // Creates a dropdown of 15 years to control year
				formatSubmit: 'yyyy-mm-dd',
				max: true
			});
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

	<body>
		<div id="response"></div>
		<div class="container">
			<?php 
				if(getEndorsementStatus($_SESSION['userid']) == "" && $_SESSION["memberType"] == 1) { //checks if dgroup member and if endorsement has not been made
					echo '
					<form method="post">
						<button class="waves-effect waves-light btn col s2 right dgroup-leader-button" id="request_leader" type="button" name="request_leader" onclick = "window.location.href = '."'".'endorsement.php'."'".'"><font color = "white">I WANT TO BE A DGROUP LEADER</font></button>
						<input type="hidden" name="seen-request" />
					</form>';
				}
			?>
		<div id="small-group">
		<div id="dgroup">
			<h3>Discipleship Group</h3>
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

					$dgroup_schedule = "SELECT schedDay, schedStartTime, schedEndTime FROM discipleshipgroup_tbl JOIN scheduledmeeting_tbl ON discipleshipgroup_tbl.schedID = scheduledmeeting_tbl.schedID WHERE dgroupID = ".getDgroupID();
					$result = mysqli_query($conn, $dgroup_schedule);
					if(mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							$day = $row["schedDay"];
							$starttime = date("g:i a", strtotime($row["schedStartTime"]));
							$endtime = date("g:i a", strtotime($row["schedEndTime"]));
							$sched = "Every $day @ $starttime - $endtime";
						}
					}

					// display Schedule
					echo '<dd><h6>'.$sched.'</h6></dd>';

					// insert code set notificationStatus = 1 when user clicks notification area
					$query = "SELECT CONCAT(firstName, ' ', lastName) AS fullname FROM discipleshipgroupmembers_tbl INNER JOIN discipleshipgroup_tbl ON discipleshipgroupmembers_tbl.dgroupID = discipleshipgroup_tbl.dgroupID INNER JOIN member_tbl ON discipleshipgroupmembers_tbl.memberID = member_tbl.memberID WHERE discipleshipgroupmembers_tbl.dgroupID = ".getDgroupID()." AND dgroupmemberID != ".getDgroupMemberID($_SESSION['userid']);

					$lquery = "SELECT CONCAT(firstName, ' ', lastName) AS leader FROM discipleshipgroupmembers_tbl INNER JOIN discipleshipgroup_tbl ON discipleshipgroupmembers_tbl.memberID = discipleshipgroup_tbl.dgleader INNER JOIN member_tbl ON discipleshipgroupmembers_tbl.memberID = member_tbl.memberID WHERE dgleader = ".getDgroupLeaderID($_SESSION['userid']);

					echo '
				<table class="centered dgroup-table-spacing">
					<tr> <!-- only 4 table data cells for balanced layout then add another row -->
					';

					$lresult = mysqli_query($conn, $lquery);
					
					if(mysqli_num_rows($lresult) > 0) {
						while($lrow = mysqli_fetch_assoc($lresult)) {
							$leader = $lrow["leader"];
							echo '
					<td>
						<a class="dgroup-names"><i class="material-icons prefix-leader dgroup-icons">person</i><br>
						'.$leader.'<br><br><label>LEADER</label></a>
					</td>
							';
						}
					}

					$result = mysqli_query($conn, $query);
					if(mysqli_num_rows($result) > 0) {
						$counter_row = 1;
						while($row = mysqli_fetch_assoc($result)) {
							$fullname = $row["fullname"];
							echo '
						<td>
							<a class="dgroup-names"><i class="material-icons prefix dgroup-icons">person</i><br>
							'.$fullname.'<br><br>&nbsp;</a>
						</td>
							';
							$counter_row++;
							if($counter_row == 4) {
								echo'
					</tr>
					<tr>
								';
								$counter_row = 0;
							}
						}
						echo '
					</tr>';
					}
			?>
			</table>
		</div>
		</div>
			<!-----------------code ni paolo------------------>
			<?php

				$servername = "localhost";
				$username = "root";
				$password = "root";
				$dbname = "dbccf";
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				$dgroup_schedule = "SELECT schedDay, schedStartTime, schedEndTime FROM discipleshipgroup_tbl JOIN scheduledmeeting_tbl ON discipleshipgroup_tbl.schedID = scheduledmeeting_tbl.schedID WHERE dgleader = ".$_SESSION['userid'];
				$result = mysqli_query($conn, $dgroup_schedule);
				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						$day = $row["schedDay"];
						$starttime = date("g:i a", strtotime($row["schedStartTime"]));
						$endtime = date("g:i a", strtotime($row["schedEndTime"]));
						$sched = "Every $day @ $starttime - $endtime";
					}
				}

				// insert code set notificationStatus = 1 when user clicks notification area
				$query = "SELECT CONCAT(firstName, ' ', lastName) AS fullname, member_tbl.memberID AS memberID FROM discipleshipgroupmembers_tbl INNER JOIN discipleshipgroup_tbl ON discipleshipgroupmembers_tbl.dgroupID = discipleshipgroup_tbl.dgroupID INNER JOIN member_tbl ON discipleshipgroupmembers_tbl.memberID = member_tbl.memberID WHERE dgroupmemberID != ".getDgroupMemberID($_SESSION['userid'])." AND discipleshipgroup_tbl.dgleader = ".$_SESSION['userid'];

				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) >= 0) {
					if($_SESSION["memberType"] >= 2) { // assuming all high positions are already a Dgroup Leader
						echo '
				<div id="own-dgroup">
					<button class="waves-effect waves-light btn col s2 right dgroup-leader-button tooltipped" id="edit-dgroup" type="button" name="edit-dgroup" data-target="edit-dgroup-form-modal" data-position="top" data-tooltip="Edit Dgroup Details"><i class="material-icons">edit</i></button>
					<h3>My Discipleship Group</h3>
					<dd><h6>'.$sched.'</h6></dd>
					<table id="own-dgroup" class="centered dgroup-table-spacing">
						<tr>';
						$counter_row = 0;
						while($row = mysqli_fetch_assoc($result)) {
							$fullname = $row["fullname"];
							$memberID = $row["memberID"];
							if($_SESSION['memberType'] >= 2 ){
								echo '
									<td>
										<a class="dgroup-names" href="dgroup-memberView.php?id='.$memberID.'"><i class="material-icons prefix dgroup-icons">person</i><br>
											'.$fullname.'<br><br>&nbsp;</a>
									</td>
									';
								$counter_row++;
								if($counter_row == 4) {
								echo'
						</tr>
						<tr>
								';
								$counter_row = 0;
								}
							}
						}
						echo '
						</tr>
					</table>
				</div>';

					echo '

		<div id="edit-dgroup-form-modal" class="modal modal-fixed-footer">
			<div id="preloader" style="visibility: hidden">
				<div class="preloader-wrapper small active">
					<div class="spinner-layer spinner-blue-only spinner-color-theme">
						<div class="circle-clipper left">
							<div class="circle"></div>
						</div><div class="gap-patch">
							<div class="circle"></div>
						</div><div class="circle-clipper right">
							<div class="circle"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-content">
				<form method="post" id="edit-dgroup-form">
				<h4 id="form-header">Edit My Dgroup</h4>
				<div class="row">
					<div>
						<div class="input-field col s12" id="Dgroup">
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
							<small class="error choose" id="DgroupType-required"></small>
							<small class="error" id="DgroupType-nospouse"></small>
							<small class="error" id="DgroupType-spouse"></small>
							<small class="error" id="DgroupType-single"></small>
						</div>
					</div>
					<div>
						<div class="range-field col s12">
							<label id="AgeBracket-label" for="AgeBracket">Age Bracket - ( - )</label>
							<br>
							<br>
							<div id="AgeBracket"></div>
						</div>
					</div>
					&nbsp;
					<h4 class="center">MEETING</h4>
					<div style="margin-bottom: 0px;" id="Meeting">
						<div class="input-field col s12">
							<select id="MeetingDay" name="MeetingDay" required>
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
							<small class="error choose" id="MeetingDay-required"></small>
						</div>
					</div>
					<div class="input-field col s6">
						<label for="timepicker1opt1">Start Time</label>
						<input type="date" class="timepicker" name="timepicker1opt1" id="timepicker1opt1" required>
						<small class="error" id="timepicker1opt1-required"></small>
						<small class="error" id="timepicker1opt1-equaltime"></small>
						<small class="error" id="timepicker1opt1-greatertime"></small>
					</div>
					<div class="input-field col s6">
						<label for="timepicker1opt2">End Time</label>
						<input type="date" class="timepicker" name="timepicker1opt2" id="timepicker1opt2" required>
						<small class="error" id="timepicker1opt2-required"></small>
						<small class="error" id="timepicker1opt2-equaltime"></small>
						<small class="error" id="timepicker1opt2-greatertime"></small>
					</div>
					<div class="input-field col s12">
						<input type="text" name="MeetingPlace" id="MeetingPlace" data-length="50" maxlength="50" required>
						<label for="MeetingPlace">Place</label>
						<small class="error" id="MeetingPlace-required"></small>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="modal-action waves-effect btn-flat" type="submit" name="edit" id="edit">Done</button>
				<button class="modal-close waves-effect btn-flat" type="button" name="cancel" id="cancel">Cancel</button>
				</form>
			</div>
		</div>
					';
					}
				}
			?>
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
		function viewProfile(page) {
			if(page==1) {
				document.getElementById('small-group').style.display = "none";
				document.getElementById('view-profile').style.display = "inline";
				document.getElementById('member').setAttribute("class", "dgroup-names dgroup-view-profile");
			}
			else {
				document.getElementById('small-group').style.display = "inline";
				document.getElementById('view-profile').style.display = "none";
			}
		}

		
		function requestLeader() {
			/*swal({
				title: "Success!",
				text: "Request submitted!\nPlease wait for your Dgroup leader to assess your request.",
				type: "success",
				allowEscapeKey: true
			},
				function() {
					changeToPending();
				}
			);
			*/
			
		}

		function changeToPending() {
			document.getElementById("request_leader").style.backgroundColor = "#ebebeb";
			document.getElementById("request_leader").style.color = "#777";
			document.getElementById("request_leader").innerHTML = "PENDING";
			document.getElementById("request_leader").disabled = true;
		}

		function changeBack() {
			document.getElementById("request_leader").style.backgroundColor = "#16A5B8";
			document.getElementById("request_leader").style.color = "#fff";
			document.getElementById("request_leader").innerHTML = "I WANT TO BE A DGROUP LEADER";
			document.getElementById("request_leader").disabled = false;
		}
	</script>
	<script>
		function requestLeader() {
			var xhttp;
			xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					document.getElementById("response").innerHTML = this.responseText;
				}
			};
			xhttp.open("POST", "request.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("request_leader");
			swal({
				title: "Success!",
				text: "Request submitted!\nPlease wait for your Dgroup leader to assess your request.",
				type: "success",
				allowEscapeKey: true
			},
				function() { window.location.reload(); }
			);
		}
	</script>

	<?php
		if(isset($_POST['seen-request'])) {
			// script also prevents to confirm form resubmission para there are no duplicates in the data
			/*
			echo '
			<script>
			setTimeout( 
				swal({
						title: "Success!",
						text: "Request submitted!\nPlease wait for your Dgroup leader to assess your request.",
						type: "success",
						allowEscapeKey: true
					},
					function() { window.location = "dgroup.php"; }
					), 1000);
			</script>';
			//echo '<script> alert("'.$_SESSION['endorsementStatus'].'"); </script>';
			*/
			setRequestSeen();
		}

		function getRequestSeen() {
			// database connection variables
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "dbccf";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "SELECT request FROM endorsement_tbl WHERE dgmemberID = ".$_SESSION['dgroupmemberID'];
			$result = mysqli_query($conn, $sql);
			$request = "";
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$request = $row["request"];
				}
			}
			return $request;
		}

		function setRequestSeen() {
			// database connection variables
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "dbccf";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql = "UPDATE endorsement_tbl SET request = 1 WHERE dgmemberID = ".$_SESSION['dgroupmemberID'];
			mysqli_query($conn, $sql);
		}
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
				}
			);
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

		<?php
			if($_SESSION['memberType'] >= 2) {
				echo '
					// slider events
					var slider = document.getElementById("AgeBracket");
					noUiSlider.create(slider, {
						start: [30, 70],
						connect: true,
						step: 1,
						orientation: "horizontal",
						range: {
						 "min": 0,
						 "max": 100
						},
						format: wNumb({
							decimals: 0
						})
					});

					slider.noUiSlider.on("update", function(values, handle) {
						// value[handle]
						$("#AgeBracket-label").text("Age Bracket - ("+values[0]+" - "+values[1]+")");
					});
				';
			}
		?>

		var validated = false;
		$('#edit-dgroup-form').submit(function(e) {
			if(validated) {
				var url="request_dgroup.php";
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
				$('#edit').html(preloader);
				$('#edit').prop("disabled", true);
				var start_age = splitAgeBracket(0, slider.noUiSlider.get());
				var end_age = splitAgeBracket(1, slider.noUiSlider.get());
				$.ajax({
					type: "POST",
					url: url,
					data: 'edit-dgroup=g&'+$(this).serialize()+'&startAgeBracket='+start_age+'&endAgeBracket='+end_age, 
					success: function(data) {
						$('#edit').html("DONE");
						$('#edit').prop("disabled", false);
						swal({
							title: "Success!",
							text: "Details of your Dgroup has been updated.",
							type: "success",
							allowEscapeKey: true
						},
							function() { window.location.reload(); }
						);
					}
				});
			}
			e.preventDefault();
		});

		function splitAgeBracket(index, string) {
			string = String(string);
			return string.split(",")[index];
		}


		//--------------------------hello, code to ni pogi hehe----------------------------//

		$('.error').hide(); // by default, hide all error classes

		$(document).ready(function() {
			$('.error').text('This field is required.');
			$('.choose').text('Please choose one.');
			$('#DgroupType-spouse').text('Not all your members are legally married. Please pick a different Dgroup Type.');
			$('#DgroupType-nospouse').text('Some of your members are legally married. Please pick a different Dgroup Type.');
			$('#DgroupType-single').text('Some of your members are still single. Please pick a different Dgroup Type.');
			$('[id$=greatertime]').text('Start Time should be before than End Time.');
			$('[id$=equaltime], [id$=equaldate]').text('Both should not be equal.');
		});

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
		
		var civilstatus = "";
		$(document).ready(function() {
			var url = "get_civilstatus.php";
			$.ajax({
				type: 'POST',
				url: url,
				data: 'dgroup=g',
				success: function(data) {
					civilstatus = data.split(" ");
				}
			});
		});

		var check_iteration = true, focused_element;
		$("#edit").click(function(){
			$('.error, .error-with-icon').hide(); // by default, hide all error classes
			$(this).blur();
			check_iteration = true;

			$($('#edit-dgroup-form').find('input, select').reverse()).each(function(){
				if($(this).prop("required")) {
					if($(this).val() == "") {
						$('small#'+this.id+'-required').show();
						focused_element = $(this);
						disableDefaultRequired($(this));
						check_iteration = false;
					}
					else if($(this).is('select')) {
						if($(this).val() == null) {
							$("small#"+this.id+"-required").show();
							focused_element = $(this);
							disableDefaultRequired($(this));
							check_iteration = false;
						}
					}
					else if($(this).is('[id^=timepicker]')) {
						// convert time values to timestamp; TIME VALIDATION
						var start_time = $("#timepicker1opt1").val(), end_time = $("#timepicker1opt2").val();
						d = (new Date()).getYear() + '-' + ((new Date()).getMonth()+1) + '-' + (new Date()).getDate();
						//d = "2015-03-25";
						start_time = spaceAMPM(start_time);
						end_time = spaceAMPM(end_time);
						start_time = new Date(d + " " + start_time);
						end_time = new Date(d + " " + end_time);
						start_time = start_time.getTime();
						end_time = end_time.getTime();
						if((start_time > end_time) && !($('[id^=timepicker]').val() == "")) {
							$("[id$=greatertime]").show();
							focused_element = $("#timepicker1opt1");
							check_iteration = false;
						}

						if((start_time == end_time) && !($('[id^=timepicker]').val() == "")) {
							$("[id$=equaltime]").show();
							focused_element = $("#timepicker1opt1");
							check_iteration = false;
						}
					}
				}
			});

			for(var i = 0; i < civilstatus.length-1; i++) {
				if($('#DgroupType').val() == "Married") {
					if(civilstatus[i] == "Single" || civilstatus[i] == "Single Parent" || civilstatus[i] == "Annulled") {
						$('#DgroupType-nospouse').show();
						focused_element = $('#DgroupType');
						disableDefaultRequired($('#DgroupType'));
						check_iteration = false;
					}
				}
				else if($('#DgroupType').val() == "Single") {
					if(civilstatus[i] == "Married" || civilstatus[i] == "Widow/er" || civilstatus[i] == "Annulled") {
						$('#DgroupType-spouse').show();
						focused_element = $('#DgroupType');
						disableDefaultRequired($('#DgroupType'));
						check_iteration = false;
					}
				}
				else if($('#DgroupType').val() == "Youth") {
					if(civilstatus[i] == "Married" || civilstatus[i] == "Separated" || civilstatus[i] == "Widow/er" || civilstatus[i] == "Annulled") {
						$('#DgroupType-spouse').show();
						focused_element = $('#DgroupType');
						disableDefaultRequired($('#DgroupType'));
						check_iteration = false;
					}
				}
				else if($('#DgroupType').val() == "Couples"){
					if(civilstatus[i] == "Single" || civilstatus[i] == "Single Parent"){
						$('#DgroupType-single').show();
						focused_element = $('#DgroupType');
						disableDefaultRequired($('#DgroupType'));
						check_iteration = false;
					}
				}
				else if($('#DgroupType').val() == "Single Parents"){
					if(civilstatus[i] == "Married"){
						$('#DgroupType-spouse').show();
						focused_element = $('#DgroupType');
						disableDefaultRequired($('#DgroupType'));
						check_iteration = false;
					}
				}
			}

			if(!check_iteration) // checks if there is mali in form
				scrollTo(focused_element); // scrolls to focused element

			if(check_iteration) {
				validated = true;
			}
		});

		$('#edit-dgroup').click(function() {
			var url = "request_dgroup.php";
			$('.modal-content').animate({opacity: 0.2}, 300);
			preload();
			$('.modal-footer #edit').prop("disabled", true);
			$("#preloader").css("visibility", "visible");
			$.ajax({
				type: 'POST',
				url: url,
				data: 'get-dgroup=g',
				dataType: 'json',
				success: function(data) {
					$("#preloader").css("visibility", "hidden");
					$('.modal-content').animate({opacity: 1}, 300);
					$('.modal-footer #edit').prop("disabled", false);
					disableForm(false);
					$('#DgroupType').val(data.dgrouptype);
					var agebracket = data.agebracket;
					var start_age = agebracket.split("-")[0];
					var end_age = agebracket.split("-")[1];
					slider.noUiSlider.set([start_age, end_age]);
					$('#MeetingDay').val(data.day);
					$('#timepicker1opt1').val(data.starttime);
					$('#timepicker1opt2').val(data.endtime);
					$('#MeetingPlace').val(data.place);

					$('select').material_select();
					Materialize.updateTextFields();
				}
			});
		});

		function preload() {
			$("#preloader").css("visibility", "hidden");
			$('#preloader').css("left", $('#edit-dgroup-form-modal').width()/2);
			$('#preloader').css("top", $('#edit-dgroup-form-modal').height()/2);
			disableForm(true);
		}

		function disableForm(flag) {
			$('#edit-dgroup-form').children().find('input').each(function() {
				$(this).prop("disabled", flag);
			});

			if(flag)
				$('#AgeBracket').attr("disabled", "");
			else
				$('#AgeBracket').removeAttr("disabled");
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

		/*
		 *		INFORMATION ABOUT WILDCARDS
		 *		^=<string> --> elements starting with <string>
		 *		$=<string> --> elements ending with <string>
		 *
		 */
		/* ===== SMOOTH SCROLLING EVENT HANDLER ===== */
		var confirmvalidated = false; // confirms if every form is verified and validated; set flag to true if validated, same as validated flag

		function animateBodyScrollTop() {
			$(".modal-content").animate({
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
			$(".modal-content").animate({
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