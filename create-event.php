<?php
	include('session.php');
	include('globalfunctions.php');
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
			overflow-x: auto;
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

		/*form*/
		.create-event {
			width:600px;
		}
		/*=======END=======*/

		/*headers*/
		h1, h2, h3, h4, h5, h6 {
			color: #777;
			font-family: proxima-nova;
			text-transform: uppercase;
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
		  	margin-right: 9px;
		  	z-index: 1;
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
		/*==========END==========*/

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
			border-radius: 50%;
			padding: 1px 3px;
			position: relative;
			top: 19px;
			left: 13px
		}

		/* checkbox */
		[type="checkbox"].filled-in:checked + label:after {
			top: 0;
			width: 20px;
			height: 20px;
			border: 2px solid #16A5B8;
			background-color: #16A5B8;
			z-index: 0;
		}

		[type="checkbox"].filled-in.tabbed:checked:focus + label:after {
			border-radius: 2px;
			background-color: #16A5B8;
			border-color: #16A5B8;
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

		.close-error {
			background: none;
			float: right;
			padding: 16px;
			text-align: center;
			border: 0;
			opacity: 0.6;
			color: inherit;
			cursor: pointer;
		}

		.small {
			font-size: 1.4rem !important;
			font-weight: bold;
		}

		.close-error:hover {
			text-decoration: none;
			color: rgba(0, 0, 0, 1);
		}

		/* ===== PRELOADER ===== */
		.preloader-wrapper.small {
			width: 24px;
			height: 24px;
		}

		.spinner-color-theme {
			border-color: rgba(0, 0, 0, 0.4);
		}
		/* ===== END ===== */

		.error, .error-picture {
			color: #ff3333;
		}
	</style>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.dropdown-button + .dropdown-content-notification').on('click', function(event) {
				event.stopPropagation(); // this event stops closing the notification page when clicked upon
			});
		}); 
	</script>
	<script>
	$(document).ready(function(){
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 50, // Creates a dropdown of 15 years to control year
				formatSubmit: 'yyyy-mm-dd',
				min: true
			});

			$('select').material_select();

			// when dynamic changes are applied to textareas, reinitialize autoresize (call it again)

  			//old version of timepicker
  			/*
  			$('#timepicker1opt1').pickatime({
  				autoclose: false
  			});

  			$('#timepicker1opt2').pickatime({
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
	</script>

	<header class="top-nav">
	<!-- Dropdown Structure Account--> 
		<ul id="account" class="dropdown-content dropdown-content-list">
		  	<li><a href="profile.php"><i class="material-icons prefix>">mode_edit</i>Edit Profile</a></li>
		  	<?php
		  		if($_SESSION["memberType"] > 0 && $_SESSION["memberType"] <= 2) {
		  			echo '
			  		<li class="divider"></li>
		  			<li><a href="dgroup.php"><i class="material-icons prefix>">group</i>Dgroup</a></li>
			  		';
				  	if($_SESSION["memberType"] == 2 )
				  		echo '
			  		<li class="divider"></li>
				  	<li><a href="endorsements.php"><i class="material-icons prefix>">library_books</i>Endorsement Forms</a></li>
				  	<li class="divider"></li>
				  	<li><a href="propose-ministry.php"><i class="material-icons prefix>">group_add</i>Propose Ministry</a></li> <!-- for dgroup leaders view -->
				  		';
		  		}
			  	if($_SESSION["memberType"] == 3)
			  		echo '
			  		<li class="divider"></li>
				  	<li><a href="create-event.php"><i class="material-icons prefix>">library_add</i>Propose Event</a></li>
			  		<li class="divider"></li>
				  	<li><a href="proposed-events.php"><i class="material-icons prefix>">library_books</i>Proposed Events</a></li>
			  		<li class="divider"></li>
				  	<li><a href="participation-requests.php"><i class="material-icons prefix>">assignment_turned_in</i>Participation Requests</a></li>
			  		<li class="divider"></li>
				  	<li><a href="event-summary-reports.php"><i class="material-icons prefix>">library_books</i>Event Summaries</a></li>
			  		';
			  	if($_SESSION["memberType"] == 4)
			  		echo '
			  		';
			  	if($_SESSION["memberType"] == 5)
			  		echo '
			  		<li class="divider"></li>
				  	<li><a href="quarterlyreports.php"><i class="material-icons prefix>">library_books</i>Quarterly Reports</a></li>
			  		<li class="divider"></li>
				  	<li><a href="event-requests.php"><i class="material-icons prefix>">assignment_turned_in</i>Event Requests</a></li>
			  		';
		  	?>
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
				$query = "SELECT notificationDesc, notificationStatus, notificationType, request FROM notifications_tbl WHERE notificationStatus <= 1 AND (receivermemberID = ".$_SESSION['userid'].") ORDER BY notificationID DESC;";
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
						else if($notificationStatus <= 1 && $notificationType == 1 && $request == 1 && $_SESSION['memberType'] == 5) { // for event request notifs
							echo '<li><a href="event-requests.php">'.$notificationDesc.'</a></li>';
						}
						else if($notificationStatus <= 1 && $notificationType == 1 && $request == 1 && $_SESSION['memberType'] == 3) { // for event participant request notifs
							echo '<li><a href="participation-requests.php">'.$notificationDesc.'</a></li>';
						}
						else if($notificationStatus <= 1 && $notificationType == 1 && $request == 0) { // for event notifs
							echo '<li><a>'.$notificationDesc.'</a></li>';
						}
						else if($notificationStatus <= 1 && $notificationType == 2 && $request == 1) { // for ministry request notifs

						}
						else if($notificationStatus <= 1 && $notificationType == 2 && $request == 0) { // for ministry request notifs

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
		<div class="row">
			<div class="col s12 z-depth-4 card-panel">
				<form method="post" class="create-event" id="create-event" enctype="multipart/form-data"> <!--if php is applied, action value will then become the header -->
					<div id="page1">
						<h3 class="center">Event Proposal</h3>
						<div class="row">
							<div class="input-field col s12">
								<input type="text" name="EventName" id="EventName" data-length="50" maxlength="50" required>
								<label for="EventName">Event Name</label>
								<small class="error" id="EventName-required"></small>
							</div>
							<div class="input-field col s12">
								<textarea id="EventDesc" class="materialize-textarea" name="EventDesc" data-length="500" maxlength="500" required></textarea>
								<label for="EventDesc">Event Description</label>
								<small class="error" id="EventDesc-required"></small>
							</div>
							<div class="file-field input-field col s12">
								<div class="btn col s4">
									<span>Choose a picture</span>
									<input type="file" id="EventPicture" name="EventPicture" accept="image/*">
								</div>
								<div class="file-path-wrapper col s8">
									<input class="file-path" type="text" id="EventPictureName" name="EventPictureName" placeholder="Event Picture" required tabindex="-1">
									<small class="error-picture" id="EventPictureName-required"></small>
								</div>
								<div class="row event-pic">
								</div>
							</div>
							<h4 class="center">Date</h4>
							<p>
								<div class ="row" style="margin-left:5px;">
									<input type="radio" id="SingleDay" name="EventSchedStatus" value="SingleDay" onclick="checkIfSingle();"/>
									<label for="SingleDay">Single Day Event</label>
								</div>
							</p>
							<p>
								<div class ="row" style="margin-left:5px;">
									<input type="radio" id="MultipleDay" name="EventSchedStatus" value="MultipleDay" onclick="checkIfMultiple();"/>
									<label for="MultipleDay">Multiple Day Event</label>
								</div>
							</p>
							<p>
								<div class ="row" style="margin-left:5px;">
									<input type="radio" id="Weekly" name="EventSchedStatus" value="Weekly" onclick="checkIfWeekly();"/>
									<label for="Weekly">Weekly Event</label>
								</div>
							</p>
							<div class="input-field col s12" id="Event_Date_Start">
								<input type="date" class="datepicker" id="EventDateStart" name="EventDateStart" required>
								<label for="EventDateStart" id="lblEventDateStart">Start</label>
								<small class="error" id="EventDateStart-required"></small>
								<small class="error" id="EventDateStart-greaterdate"></small>
								<small class="error" id="EventDateStart-equaldate"></small>
							</div>
							<div class="input-field col s6" id="Event_Date_End" style="display: none">
								<input type="date" class="datepicker" id="EventDateEnd" name="EventDateEnd" required>
								<label for="EventDateEnd">End</label>
								<small class="error" id="EventDateEnd-required"></small>
								<small class="error" id="EventDateEnd-greaterdate"></small>
								<small class="error" id="EventDateEnd-equaldate"></small>
							</div>
							<div class="input-field col s12" id="WeeklyEvent" style="display: none">
								<select id="WeeklyDay" name="WeeklyDay" required>
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
								<small class="error" id="WeeklyDay-required"></small>
							</div>
							<div>
								<h4 class="center">Time</h4>
							</div>
							<div class="input-field col s6">
								<input type="date" class="timepicker" id="EventTime1" name="EventTime1" required>
								<label for="EventTime1">Start</label>
								<small class="error" id="EventTime1-required"></small>
								<small class="error" id="EventTime1-greatertime"></small>
								<small class="error" id="EventTime1-equaltime"></small>
							</div>
							<div class="input-field col s6">
								<input type="date" class="timepicker" id="EventTime2" name="EventTime2" required>
								<label for="EventTime2">End</label>
								<small class="error" id="EventTime2-required"></small>
								<small class="error" id="EventTime2-greatertime"></small>
								<small class="error" id="EventTime2-equaltime"></small>
							</div>
							<h4 class="center">Location</h4>
							<div class="input-field col s12">
								<input type="text" name="EventVenue" id="EventVenue" data-length="50" maxlength="50" required>
								<label for="EventVenue">Event Venue</label>
								<small class="error" id="EventVenue-required"></small>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Budget" id="Budget" data-length="20" maxlength="20" placeholder="ex. 2500-5500" onkeypress='return event.charCode == 45 || ( event.charCode >= 48 && event.charCode <= 57 )//only numbers on keypress' required>
								<label for="Budget">Budget</label>
								<small class="error" id="Budget-required"></small>
							</div>
							<div class="input-field col s12">
								<textarea id="Remarks" class="materialize-textarea" name="Remarks"></textarea>
								<label for="Remarks">Remarks</label>
							</div>
						</div>
					</div>
					<div class="row">
						<button class="waves-effect waves-light btn col s3 right fixbutton" type="submit" name="propose" id="propose">Propose</button>
					</div>
				</form>
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
	
	 <!-- this section is for notification approval of requests -->
	<script>
		function renderImage(input) {
			if(input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#showImage').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);	
			}
			else
				$('.event-pic').html("");
		}

		$('#EventPicture').change(function() {
			$('.event-pic').html('<img src="" id="showImage" style="width: 100%;" />');
			renderImage(this);
		});

		var validated = false;
		$('#create-event').submit(function(e) {
			/*
				NOTE:
				contentType and processData doesn't coincide with string queries in passing data to server
				so instead of using .serialize() -- which encodes formdata as string -- use FormData to encode
				it as an object.
			*/
			if(validated) {
				var url = "propose-event.php";
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
				$('.fixbutton').html(preloader);
				$('.fixbutton').prop("disabled", true);
				$.ajax({
					type: "POST",
					url: url,
					data: new FormData(this),
					contentType: false,
					processData: false,
					success: function(data) {
						$('.fixbutton').text('Propose');
						$('.fixbutton').prop("disabled", false);
						swal({
							title: "Success!",
							text: "Request submitted! Please wait for the CCF Administrator to eveluate your request.",
							type: "success",
							timer: 10000
						}, function() { window.location.href = "index.php"; });
					}
				});
			}
			e.preventDefault();
		});

		function checkIfSingle() {
			if(document.getElementById('SingleDay').checked) {
				document.getElementById('Event_Date_End').style.display = "none";
				document.getElementById('Event_Date_Start').setAttribute("class", "input-field col s12");
				document.getElementById('lblEventDateStart').innerHTML = "Event Date";
				$('#EventDateEnd').prop("required", false);
				checkIfMultiple();
				checkIfWeekly();
			}
			else {
				$('#Event_Date_End').fadeIn(200);
				document.getElementById('lblEventDateStart').innerHTML = "Start";
				document.getElementById('Event_Date_End').style.display = "inline";
				document.getElementById('Event_Date_Start').setAttribute("class", "input-field col s6");
				document.getElementById('Event_Date_End').setAttribute("class", "input-field col s6");
				$('#EventDateEnd').prop("required", true);
			}
		}

		function checkIfMultiple() {
			if($('#MultipleDay').prop("checked")) {
				checkIfSingle();
				checkIfWeekly();
			}
		}

		$(document).ready(function() {
			$('#SingleDay').prop("checked", true);
			checkIfSingle();
		});

		function checkIfWeekly() {
			if($('#Weekly').prop("checked")) {
				$('#WeeklyEvent').show();
				$('#WeeklyDay').prop("required", true);
				checkIfSingle();
				checkIfMultiple();
			}
			else {
				$('#WeeklyEvent').hide();
				$('#WeeklyDay').prop("required", false);
			}
		}

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



		/* 
		============================================================
		============================================================
		====================FORM VALIDATION=========================
		============================================================
		============================================================
		*/
		$('.error, .error-picture').hide(); // by default, hide all error classes
		
		$(document).ready(function() {
			$('.error').text('This field is required.');
			$('.error-picture').text('Please choose a picture.');
			$('[id$=greatertime]').text('Start Time should be before than End Time.');
			$('[id$=equaltime], [id$=equaldate]').text('Both should not be equal.');
			$('[id$=greaterdate]').text('Start Date should be before than End Date.');
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
		$("#propose").click(function() {
			$('.error, .error-picture').hide();
			$(this).blur();
			var check_iteration = true, focused_element;

			// convert time values to timestamp; TIME VALIDATION
			var start_time = $("#EventTime1").val(), end_time = $("#EventTime2").val();
			d = (new Date()).getYear() + '-' + ((new Date()).getMonth()+1) + '-' + (new Date()).getDate();
			//d = "2015-03-25";
			start_time = spaceAMPM(start_time);
			end_time = spaceAMPM(end_time);
			start_time = new Date(d + " " + start_time);
			end_time = new Date(d + " " + end_time);
			start_time = start_time.getTime();
			end_time = end_time.getTime();
			if(start_time > end_time) {
				$("[id$=greatertime]").show();
				focused_element = $("#EventTime1");
				check_iteration = false;
			}

			if(($("#EventTime1").val() == $("#EventTime2").val()) && !($('[id^=EventTime]').val() == "")) {
				$("[id$=equaltime]").show();
				focused_element = $("#EventTime1");
				check_iteration = false;
			}


			// convert date values to timestamp; DATE VALIDATION
			if($('#MultipleDay').prop("checked") || $('#Weekly').prop('checked')) {
				var start_date = $('#EventDateStart').val(), end_date = $('#EventDateEnd').val();
				var day = start_date.split(",")[0].split(" ")[0], month = end_date.split(",")[0].split(" ")[1], year = start_date.split(",")[1];
				start_date = month + " " + day + "," + year;
				day = end_date.split(",")[0].split(" ")[0];
				month = end_date.split(",")[0].split(" ")[1];
				year = end_date.split(",")[1];
				end_date = month + " " + day + "," + year;
				start_date = new Date(start_date);
				end_date = new Date(end_date);
				if(start_date > end_date) {
					$("[id$=greaterdate]").show();
					focused_element = $("#EventDateStart");
					check_iteration = false;
				}

			}

			if(($("#EventDateStart").val() == $("#EventDateEnd").val()) && !($('[id^=EventDate]').val() == "")) {
				$("[id$=equaldate]").show();
				focused_element = $("#EventDateStart");
				check_iteration = false;
			}


			$($(".create-event").find('input, select, textarea').reverse()).each(function() {
				if($(this).prop('required')) {
					if($(this).val() == "") {
						$("small#"+this.id+"-required").show();
						focused_element = $(this);
						disableDefaultRequired($(this));
						check_iteration = false;
					}
					if($(this).is('select')) {
						if($(this).val() == null) {
							$("small#"+this.id+"-required").show();
							focused_element = $(this);
							disableDefaultRequired($(this));
							check_iteration = false;
						}
					}
				}
			});


			if(!check_iteration)
				scrollTo(focused_element);
			
			if(check_iteration) {
				validated = true;
			}
		});

		// change event handler removes leading
		$("[id^=EventTime]").change(function() {
			var time_value = $(this).val();
			if(time_value.charAt(0) == '0') {
				$(this).val(removeLeadingZero(time_value));
			}
		});

		/*
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

			if($("#timepicker1opt1").val() == $("#timepicker1opt2").val()) {
				$("#timepicker1opt1-equal").show();
				$("#timepicker1opt2-equal").show();
				focused_element = $("#timepicker1opt1");
				check_iteration = false;
			}

			if($("#timepicker2opt1").val() == $("#timepicker2opt2").val()) {
				$("#timepicker2opt1-equal").show();
				$("#timepicker2opt2-equal").show();
				focused_element = $("#timepicker2opt1");
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
		*/

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
</html>