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

		div {
			display: block;
		}

		.container {
			margin: 0 auto;
			max-width: 1280px;
			width: 80%;
		}

		.card-panel {
		 	 transition: box-shadow .25s;
		 	 padding: 24px !important;
		 	 margin: 0.5rem 0 1rem 0;
		 	 border-radius: 2px;
		 	 background-color: #fff;
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

		/*===============END===============*/

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
		table > tbody > tr:hover {
			cursor: hand;
			background-color: #f2f2f2 !important;
		}

		table > tbody > tr.active {
			background-color: #16A5B8;
			color: #fff;
		}

		table > tbody > tr.active:hover {
			background-color: #16A5B8 !important;
			color: #fff !important;
		}

		td {
		  	padding: 15px 5px;
		  	display: table-cell;
		  	text-align: left;
		  	vertical-align: middle;
		  	border-radius: 0px; /* complete horizontal highlight bar*/
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

		tbody tr:hover {
			cursor: pointer;
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

		#preloader {
			position: relative;
			width: 0 !important;
		}

		#Eform {
			margin: 0 auto;
			height: 700px;
		}

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
		/* ===== END ===== */
	</style>

	<script type="text/javascript">
		$(document).ready(function(){
			init();
		});

		function init() {
			$('.dropdown-button + .dropdown-content-notification').on('click', function(event) {
				event.stopPropagation(); // this event stops closing the notification page when clicked upon
			});

			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 100, // Creates a dropdown of 15 years to control year
				max: true
			});
			
			$('select').material_select();
				
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
		}

		$(document).ready(function() {
			preload();
		});

		function cellActive(id) { // this function allows you to highlight the table rows you select
			// ==========PLEASE FIX HIGHLIGHT EFFECT========== 
			var num_of_rows = document.getElementsByTagName("TR").length;
			var rownumber = id.charAt(3);
			for(var i = 0; i < num_of_rows; i++) {
				document.getElementsByTagName("TR")[i].setAttribute("class", "");
			}
			document.getElementById(id).setAttribute("class", "active");
			//document.getElementById("table").setAttribute("class", "highlight centered");

			history.pushState(null, null, "endorsements.php?id="+id.split("_")[1]);


			// ajax + preloader

			var url = "request_endorsements.php";
			preload();
			$('button').prop("disabled", true);
			$("#preloader").css("visibility", "visible");
			$("#page1").css("opacity", 0.2);
			$.ajax({
				type: "POST",
				url: url,
				data: "id="+id,
				dataType: 'json',
				success: function(data) {
					$("#preloader").css("visibility", "hidden");
					$("#page1").css("opacity", 1);
					$('button').prop("disabled", false);
					// access echo values data.<key value of array>
					// ex. alert(data.a);
				}
			});
		}

		function disableForm(flag) {
			$('div#page1').children().find('input, select').each(function() {
				$(this).prop("disabled", flag);
			});
		}

		function preload() {
			$("#preloader").css("visibility", "hidden");
			$('#preloader').css("left", $('#Eform').width()/2);
			$('#preloader').css("top", $('#Eform').height()/2);
			disableForm(true);
		}
	</script>

	<header class="top-nav">
	<!-- Dropdown Structure Account--> 
		<ul id="account" class="dropdown-content dropdown-content-list">
		  	<li><a href="profile.php"><i class="material-icons prefix>">mode_edit</i>Edit Profile</a></li>
		  	<?php
		  		if($_SESSION["memberType"] > 0 && $_SESSION["memberType"] <= 4) {
		  			echo '
			  		<li class="divider"></li>
		  			<li><a href="dgroup.php"><i class="material-icons prefix>">group</i>Dgroup</a></li>
			  		<li class="divider"></li>
		  			<li><a href="ministry.php"><i class="material-icons prefix>">people</i>Ministry</a></li>
			  		';
				  	if($_SESSION["memberType"] >= 2 )
				  		echo '
			  		<li class="divider"></li>
				  	<li><a href="endorsements.php"><i class="material-icons prefix>">library_books</i>Endorsement Forms</a></li>
				  	<li class="divider"></li>
				  	<li><a href="propose-ministry.php"><i class="material-icons prefix>">group_add</i>Propose Ministry</a></li> <!-- for dgroup leaders view -->
				  		';
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
				  		<li class="divider"></li>
					  	<li><a href="join-requests.php"><i class="material-icons prefix>">assignment_turned_in</i>Join Requests</a></li>
				  		<li class="divider"></li>
					  	<li><a href="ministry-summary-reports.php"><i class="material-icons prefix>">library_books</i>Ministry Summaries</a></li>
					  		';
		  		}
			  	if($_SESSION["memberType"] == 5)
			  		echo '
			  		<li class="divider"></li>
				  	<li><a href="quarterlyreports.php"><i class="material-icons prefix>">library_books</i>Quarterly Reports</a></li>
			  		<li class="divider"></li>
				  	<li><a href="event-requests.php"><i class="material-icons prefix>">assignment_turned_in</i>Event Requests</a></li>
			  		<li class="divider"></li>
				  	<li><a href="ministry-requests.php"><i class="material-icons prefix>">assignment_turned_in</i>Ministry Requests</a></li>
			  		';
		  	?>
		  	<li class="divider"></li>
		  	<li><a href="logout.php"><i class="material-icons prefix>">exit_to_app</i>Logout</a></li>
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
			<h2 class="center">Endorsements</h2>
			<div class="row">
				<div class="col s12 z-depth-4 card-panel">
					<div class="col s5">
						<div class="col s12">
							<h3 class="center">Request Lists</h3>
							<table class="centered">
								<thead>
									<tr>
										<th>Name(s)</th>
									</tr>
								</thead>
								<tbody>
									<tr id="row_1" onclick="cellActive(this.id)">
										<td> Sample </td>
									</tr>
									<tr id="row_2" onclick="cellActive(this.id)">
										<td> Sample </td>
									</tr>
									<tr id="row_3" onclick="cellActive(this.id)">
										<td> Sample </td>
									</tr>
								</tbody>
								<tfoot></tfoot>
							</table>
						</div>
					</div>
					<div class="col s7" id="form">
						<div class="container">
							<form method="post" id="Eform">
								<h3 class="center">Sample's Form</h3>
								<div class="row">
									<div id="preloader">
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
									<div id="page1" class="">
										<h4 class="center">BAPTISMAL</h4>
										<div class="row">
											<div class="input-field col s12">
												<input type="date" class="datepicker" id="BaptismalDate" name="BaptismalDate" disabled>
												<label for="BaptismalDate" class>When were you baptized?</label>
											</div>
											<div class="input-field col s12">
												<input type="text" name="BaptismalPlace" id="BaptismalPlace" data-length="50" maxlength="50" disabled>
												<label for="BaptismalPlace">Where were you baptized?</label>
											</div>
											<h4 class="center">DGROUP</h4>
												<div class="input-field col s12">
													<select id="DgroupType" name="DgroupType" disabled>
														<option value="" disabled selected>Choose your option...</option>
														<option value="Youth">Youth</option>
														<option value="Singles">Singles</option>
														<option value="Single_Parents">Single Parents</option>
														<option value="Married">Married</option>
														<option value="Couples">Couples</option>
													</select>
													<label>Type of Dgroup</label>
												</div>
											<div class="input-field col s12">
												<input type="text" name="AgeBracket" id="AgeBracket" data-length="5" maxlength="5" placeholder="ex. 13-25" onkeypress='return event.charCode == 45 || ( event.charCode >= 48 && event.charCode <= 57 )//only numbers on keypress' disabled>
												<label for="AgeBracket">Age Bracket</label>
											</div>
											<h4 class="center">MEETING</h4>
												<div class="input-field col s12">
													<select id="MeetingDay" name="MeetingDay" disabled>
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
											<div class="input-field col s6">
												<label for="timepicker1opt1">Start Time</label>
												<input type="date" class="timepicker" name="timepicker1opt1" id="timepicker1opt1" disabled>
											</div>
											<div class="input-field col s6">
												<label for="timepicker1opt2">End Time</label>
												<input type="date" class="timepicker" name="timepicker1opt2" id="timepicker1opt2" disabled>
											</div>
											<div class="input-field col s12">
												<input type="text" name="MeetingPlace" id="MeetingPlace" data-length="50" maxlength="50" disabled>
												<label for="MeetingPlace">Place</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<button class="waves-effect waves-light btn col s3 fixbutton right" type="submit" id="approve" name="approve">Approve</button>
									<button class="modal-action modal-close waves-effect waves-light btn col s3 right" type="button" id="notify" name="notify" data-target="!" style="margin-right: 10px;">Notify</button>
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

		// preloader section
		$('button').prop("disabled", true);
		$('button').click(function() {
			$('button').blur();
		});

		// APPROVE SECTION
		$('#Eform').submit(function(e) {
			var url = "request_endorsements.php";
			$.ajax({
				type: "POST",
				url: url,
				data: "approve",
				success: function(data) {
					
				}
			});
			e.preventDefault();
		});
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