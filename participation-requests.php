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
		.participation-requests {
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
		  	/* margin-right: 9px; */
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
		 	 padding: 24px !important;
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

		#preloader {
			position: relative;
			width: 0 !important;
		}

		#participation-requests {
			margin: 0 auto;
			height: 400px;
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

		/*tables*/
		.table-wrapper {
			max-height: 300px;
			overflow-y: auto;
		}

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

		th {
			color: #424242;
		}

		tbody tr:hover {
			cursor: pointer;
		}
		/* ========== END ========== */

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
				formatSubmit: 'yyyy-mm-dd'
			});

			$('select').material_select();

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

			id = id.split("_")[1];


			// ajax + preloader
			var url = "request_participation-requests.php";
			preload();
			$('button').prop("disabled", true);
			$("#preloader").css("visibility", "visible");
			$('#form-header').animate({opacity: 0.2}, 400);
			$("#page1").animate({opacity: 0.2}, 400);
			$.ajax({
				type: "POST",
				url: url,
				data: "id="+id,
				dataType: 'json',
				success: function(data) {
					$("#preloader").css("visibility", "hidden");
					$('button').prop("disabled", false);
					$('#eventPartID').val(id);

					//$('#form-header').text(data.fname + ' ' + data.lname);
					changeTitleTransition("#form-header", data.fname + ' ' + data.lname);
					$('#Lastname').val(data.lname);
					$('#Firstname').val(data.fname);
					$('#Middlename').val(data.mname);
					$('#Nickname').val(data.nname);
					$('#Birthdate').val(data.birthdate);
					if(data.gender == "Male")
						$('#Gender_Male').prop("checked", true);
					else
						$('#Gender_Female').prop("checked", true);
					$('#Citizenship').val(data.citizenship);
					$('#CivilStatus').val(data.civilstatus);
					$('#MobileNumber').val(data.contactnum);
					$('#Email').val(data.emailad);
					$('#Profession').val(data.occupation);
					$('#HomeAddress').val(data.haddress);
					$('#HomePhoneNumber').val(data.hphonenumber);
					$('#CompanyName').val(data.cname);
					$('#CompanyContactNum').val(data.ccontactnum);
					$('#CompanyAddress').val(data.caddress);
					$('#SchoolName').val(data.sname);
					$('#SchoolContactNum').val(data.scontactnum);
					$('#SchoolAddress').val(data.saddress);
					$('#SpouseName').val(data.spname);
					$('#SpouseMobileNumber').val(data.spcontactnum);
					$('#SpouseBirthdate').val(data.spbirthdate);

					// re-initialize to update text field
					Materialize.updateTextFields();

					// data validation display part

					// default and initialization states
					var company = $(".company"), school = $(".school"), spouse = $(".spouse");
					
					/* ===== SPOUSE VALIDATION ===== */
					var civilstatusid = "#CivilStatus"
					if($(civilstatusid).val() == "Single" || $(civilstatusid).val() == "Single Parent" || $(civilstatusid).val() == "Separated" || $(civilstatusid).val() == "Widow/er") {
						spouse.hide();
					}

					/* ===== COMPANY AND SCHOOL VALIDATION ===== */
					var professionid = "#Profession";
					if($(professionid).val().toLowerCase() == "student") {
						company.hide();
					}
					else {
						school.hide();
					}

				}
			});
		}

		function disableForm(flag) {
			$('div#page1').children().find('input, textarea, select').each(function() {
				$(this).prop("disabled", flag);
			});
		}

		function preload() {
			$("#preloader").css("visibility", "hidden");
			$('#preloader').css("left", $('#participation-requests').width()/2);
			$('#preloader').css("top", $('#participation-requests').height()/2);
			disableForm(true);
		}

		function changeTitleTransition(title_elem, val) {
			setTimeout(function() {
				$(title_elem).text(val);
				$(title_elem).animate({opacity: 1});
				$("#page1").animate({opacity: 1});
			}, 400);
		}
	</script>

	<header class="top-nav">
	<!-- Dropdown Structure Account--> 
		<ul id="account" class="dropdown-content dropdown-content-list">
		  	<li><a href="profile.php"><i class="material-icons prefix>">mode_edit</i>Edit Profile</a></li>
		  	<?php
		  		include_once("user_options.php");
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
			<h2 class="center">Participation Requests</h2>
			<div class="row">
				<div class="col s12 z-depth-4 card-panel">
					<div class="col s5">
						<div class="col s12">
							<h3 class="center">Requests</h3>
							<table class="centered">
								<thead>
									<tr>
										<th>Participant</th>
										<th>Event to Attend</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$conn = mysqli_connect($servername, $username, $password, $dbname);
										if (!$conn) {
											die("Connection failed: " . mysqli_connect_error());
										}

										$query = "SELECT eventParticipationID, eventparticipation_tbl.eventID AS eid, eventName, CONCAT_WS(' ', firstName, lastName) AS fullname FROM eventparticipation_tbl LEFT OUTER JOIN eventdetails_tbl ON eventparticipation_tbl.eventID = eventdetails_tbl.eventID LEFT OUTER JOIN member_tbl ON eventparticipation_tbl.memberID = member_tbl.memberID WHERE eventPartStatus = 0 ORDER BY eventName ASC;";
										$result = mysqli_query($conn, $query);
										if(mysqli_num_rows($result) > 0) {
											while($row = mysqli_fetch_assoc($result)) {
												$epartid = $row["eventParticipationID"];
												$name = $row["eventName"];
												$fullname = $row["fullname"];
												echo '
												<tr id="row_'.$epartid.'" onclick="cellActive(this.id)">
												    <td>'.$fullname.'</td>
												    <td>'.$name.'</td>
												</tr>
												';
											}
										}
									?>
								</tbody>
								<tfoot></tfoot>
							</table>
						</div>
					</div>
					<div class="col s7" id="form">
						<div class="container">
							<form method="post" id="participation-requests">
								<h3 class="center" id="form-header"></h3>
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
										<div class="row">
											<h4 class="center">Personal Information</h4>
											<div class="input-field col s12">
												<input type="text" name="Lastname" id="Lastname" data-length="20" maxlength="20">
												<label for="Lastname">Last Name</label>
											</div>
											<div class="input-field col s12">
												<input type="text" name="Firstname" id="Firstname" data-length="20" maxlength="20">
												<label for="Firstname">First Name</label>
											</div>
											<div class="input-field col s12">
												<input type="text" name="Middlename" id="Middlename" data-length="20" maxlength="20">
												<label for="Middlename">Middle Name</label>
											</div>
											<div class="input-field col s12">
												<input type="text" name="Nickname" id="Nickname" data-length="20" maxlength="20">
												<label for="Nickname">Nickname</label>
											</div>
											<div class="input-field col s12">
												<input type="text" class="datepicker" id="Birthdate" name="Birthdate"> <!-- originally date type, OC ito haha -->
												<label for="Birthdate">Birthdate</label>
											</div>

											<h4 class="center">Other Information</h4>
											<p style="margin-top: 40px;">
												<label for="Gender" style="margin-left: 10px; font-size:15px;">Gender</label>
												<input type="radio" id="Gender_Male" name="Gender" value="Male"/>
												<label for="Gender_Male">Male</label>
												<input type="radio" id="Gender_Female" name="Gender" value="Female"/>
												<label for="Gender_Female">Female</label>
											</p>
											<div class="input-field col s12">
												<input type="text" class="data-required" name="Citizenship" id="Citizenship" data-length="20" maxlength="20">
												<label for="Citizenship">Citizenship</label>
											</div>
											<div class="row" style="margin: 0"> <!-- all selects must be margin: 0 -->
												<div class="input-field col s12">
													<input type="text" id="CivilStatus" name="CivilStatus">
													<label for="CivilStatus">Civil Status</label>
												</div>
											</div>
											<div class="input-field col s12">
												<input type="text" class="data-required" name="MobileNumber" id="MobileNumber" onkeypress="return event.charCode >= 48 && event.charCode <= 57 //only numbers on keypress" data-length="18" maxlength="18">
												<label for="MobileNumber" name="mobilenumber">Mobile Number</label>
											</div>
											<div class="input-field col s12">
												<input type="email" class="data-required" name="Email" id="Email" data-length="30" maxlength="30">
												<label for="Email" data-error="Invalid email address">Email Address</label>
											</div>
											<div class="input-field col s12">
												<input type="text" class="data-required" name="Profession" id="Profession" data-length="30" maxlength="30">
												<label for="Profession">Profession/Occupation</label>
											</div>


											<h5 class="center">Home</h5>
											<div class="input-field col s12">
												<input type="text" class="data-required" name="HomeAddress" id="HomeAddress" data-length="50" maxlength="50">
												<label for="HomeAddress">Address</label>
											</div>
											<div class="input-field col s12">
												<input type="text" name="HomePhoneNumber" id="HomePhoneNumber" data-length="18" maxlength="18">
												<label for="HomePhoneNumber">Home Phone Number</label>
											</div>
											<h5 class="center company">Company</h5>
											<div class="input-field col s12 company">
												<input type="text" class="data-required" name="CompanyName" id="CompanyName" data-length="30" maxlength="30">
												<label for="CompanyName">Company Name</label>
											</div>
											<div class="input-field col s12 company">
												<input type="text" name="CompanyContactNum" id="CompanyContactNum" data-length="18" maxlength="18">
												<label for="CompanyContactNum">Company Contact Number</label>
											</div>
											<div class="input-field col s12 company">
												<input type="text" name="CompanyAddress" id="CompanyAddress" data-length="50" maxlength="50">
												<label for="CompanyAddress">Company Address</label>
											</div>
											<h5 class="center school">School</h5>
											<div class="input-field col s12 school">
												<input type="text" class="data-required" name="SchoolName" id="SchoolName" data-length="30" maxlength="30">
												<label for="SchoolName">School Name</label>
											</div>
											<div class="input-field col s12 school">
												<input type="text" name="SchoolContactNum" id="SchoolContactNum" data-length="18" maxlength="18">
												<label for="SchoolContactNum">School Contact Number</label>
											</div>
											<div class="input-field col s12 school">
												<input type="text" name="SchoolAddress" id="SchoolAddress" data-length="50" maxlength="50">
												<label for="SchoolAddress">School Address</label>
											</div>
											<h5 class="center spouse">Spouse</h5>
											<div class="input-field col s12 spouse">
												<input type="text" class="data-required" name="SpouseName" id="SpouseName" data-length="30" maxlength="30">
												<label for="SpouseName">Spouse Name</label>
											</div>
											<div class="input-field col s12 spouse">
												<input type="text" name="SpouseMobileNumber" id="SpouseMobileNumber" data-length="18" maxlength="18">
												<label for="SpouseMobileNumber">Spouse Mobile Number</label>
											</div>
											<div class="input-field col s12 spouse">
												<input type="text" class="datepicker" id="SpouseBirthdate" name="SpouseBirthdate">
												<label for="SpouseBirthdate">Birthdate</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<input type="hidden" id="eventPartID" name="eventPartID">
									<button class="waves-effect waves-light btn col s3 right fixbutton" type="submit" name="approve" id="approve">Approve</button>
									<button class="waves-effect waves-light btn col s3 right" type="button" name="notify" id="notify" style="margin-right: 10px;">Notify</button>
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
	
	 <!-- this section is for notification approval of requests -->
	<script>
		// blur clickable elements
		$('a#add-link').click(function() {
			$('a#add-link').blur();
		});

		// preloader section
		$('button').prop("disabled", true);
		$('button').click(function() {
			$('button').blur();
		});

		function checkIfSingle() {
			if(document.getElementById('SingleDay').checked) {
				document.getElementById('Event_Date_End').style.display = "none";
				document.getElementById('Event_Date_Start').setAttribute("class", "input-field col s12");
				document.getElementById('lblEventDateStart').innerHTML = "Event Date";
				document.getElementById('Weekly').checked = false;
			}
			else {
				$('#Event_Date_End').fadeIn(200);
				document.getElementById('lblEventDateStart').innerHTML = "Start";
				document.getElementById('Event_Date_End').style.display = "inline";
				document.getElementById('Event_Date_Start').setAttribute("class", "input-field col s6");
				document.getElementById('Event_Date_End').setAttribute("class", "input-field col s6");
			}
		}

		$(document).ready(function() {
			$('#WeeklyEvent').hide();
		});
		function checkIfWeekly() {
			if(document.getElementById('Weekly').checked) {
				$('#WeeklyEvent').show();
				document.getElementById('SingleDay').checked = false;
			}
			else {
				$('#WeeklyEvent').hide();

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

		$('#notify').click(function() {
			swal({
				title: "Remarks",
				type: "input",
				showCancelButton: true,
				closeOnConfirm: false,
				showLoaderOnConfirm: true,
				inputPlaceholder: "Say something about this request"
			}, function(value) {
				if(value === false) return false
				if(value === "") {
					swal.showInputError("Oops! It seems that you haven't typed anything.");
					return false;
				}
				var url = "request_participation-requests.php";
				$.ajax({
					type: "POST",
					url: url,
					data: "notify=g&id="+$('#eventPartID').val()+"&notifvalue="+value,
					success: function(data) {
						swal({
							title: "Success!",
							type: "success",
							text: "Remarks successfully sent!"
						});
					}
				});
			});
		});

		$('#participation-requests').submit(function(e) {
			/*
				NOTE:
				contentType and processData doesn't coincide with string queries in passing data to server
				so instead of using .serialize() -- which encodes formdata as string -- use FormData to encode
				it as an object.
			*/
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
			var url = "request_participation-requests.php";
			$.ajax({
				type: "POST",
				url: url,
				data: "id="+$('#eventPartID').val()+"&approve",
				success: function(data) {
					$('.fixbutton').text('Approve');
					$('.fixbutton').prop("disabled", false);
					swal({
						title: "Request Approved!",
						text: "Attendance will now be recorded.",
						type: "success",
						allowEscapeKey: true,
						allowOutsideClick: true,
						timer: 10000
					}, function() { window.location.reload(); });
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