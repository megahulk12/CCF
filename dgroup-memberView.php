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

	<!-- for alerts -->
	<script src="alerts/dist/sweetalert-dev.js"></script>
	<link rel="stylesheet" type="text/css" href="alerts/dist/sweetalert.css">

	<title>Christ's Commission Fellowship</title>
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

		#back{
			padding-left: 145px;
		}

		#title{
			padding-left: 400; 
		}

		.header{
			font-family: proxima-nova;
			font-size: 20px;
		}
	</style>

<!--	<script>
			$(document).ready(function(){
				// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
				$('.modal').modal();
			});
 
			
		</script>
-->
	<script type="text/javascript">
		$(document).ready(function(){
			$('.dropdown-button + .dropdown-content-notification').on('click', function(event) {
				event.stopPropagation(); // this event stops closing the notification page when clicked upon
			});
		}); 

		function view(id) {
			history.pushState(null, null, "dgroup.php?id="+id);
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
						<?php if($_SESSION['active']) echo '<li><a class="dropdown-button" data-activates="account">'.strtoupper($_SESSION['user']).'<i class="material-icons right" style="margin-top: 14px;">arrow_drop_down</i></a></li>'; ?>
						<li><a class="dropdown-button notifications" data-activates="notifications" onclick="seen()" id="bell"><i class="material-icons material-icon-notification">notifications</i><?php if (notifCount() >= 1 && getNotificationStatus() == 0) echo '<sup class="notification-badge">'.notifCount().'</sup>'; ?></a></li>
			     	 </ul>
			    </div>
			</div>
		</nav>
	</header>

	<body>
		<div id = "back">
			<div class="nav-wrapper">
				<a href = "dgroup.php"><h5>←</h5></a>
			</div>
		</div>
		<div id = "title">
			<div class = "jumbotron text-center">
				<h1>Personal Information</h1>
			</div>
		</div>
		
		<!--<div class="row row-profile">-->
		<div class="container">
			
				<div id="cpinfo">
					<div class="row">
							<?php
								if(isset($_GET['id'])){
								$memberID = $_GET['id'];
								$servername = "localhost";
								$username = "root";
								$password = "root";
								$dbname = "dbccf";
								$conn = mysqli_connect($servername, $username, $password, $dbname);
								if (!$conn) {
									die("Connection failed: " . mysqli_connect_error());
								}
								$query = "SELECT lastName, firstName, middleName, nickName, birthdate, (SELECT CASE WHEN gender = '0' THEN 'Male' ELSE 'Female' END) AS gender, civilStatus, citizenship, contactNum, emailAd, occupation, dateJoined, schoolID, companyID, spouseID, prefID FROM member_tbl WHERE memberID = ".$memberID;
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
										$gender = $row["gender"];
										$male = "";
										$female = "";
										//if($gender == "Male") $male = "checked";
										//else $female = "checked";
										$civilStatus = $row["civilStatus"];
										$citizenship = $row["citizenship"];
										$contactNum = $row["contactNum"];
										$emailAd = $row["emailAd"];
										$occupation = $row["occupation"];
										$dateJoined = date("j F, Y", strtotime($row["dateJoined"]));
										if(is_null($row["dateJoined"]))
											$dateJoined = "";
										//$birthdate = $row["birthdate"];
										$schoolID = $row["schoolID"];
										$companyID = $row["companyID"];
										$spouseID = $row["spouseID"];
										$prefID = $row["prefID"];
										//<p>'.$lastname.'</p>
									}
								}
								echo '
									<div class = "container">
										<div class = "row">
											<h5 class = "header">Last Name: </h5><p>'.$lastname.'</p>
											<h5 class = "header">First Name: </h5><p>'.$firstname.'</p>
											<h5 class = "header">Middle Name: </h5><p>'.$middlename.'</p>
											<h5 class = "header">Nick Name: </h5><p>'.$nickname.'</p>
											<h5 class = "header">Birthdate: </h5><p>'.$birthdate.'</p>
											<h5 class = "header">Gender: </h5><p>'.$gender.'</p>
											<h5 class = "header">Civil Status: </h5><p>'.$civilStatus.'</p>
											<h5 class = "header">Citizenship: </h5><p>'.$citizenship.'</p>
											<h5 class = "header">Contact Number: </h5><p>'.$contactNum.'</p>
											<h5 class = "header">Email Address: </h5><p>'.$emailAd.'</p>
											<h5 class = "header">Occupation: </h5><p>'.$occupation.'</p>
											<h5 class = "header">Date Joined: </h5><p>'.$dateJoined.'</p>
									
								';
								
								if($schoolID != ""){
									$servername = "localhost";
									$username = "root";
									$password = "root";
									$dbname = "dbccf";
									$conn = mysqli_connect($servername, $username, $password, $dbname);
									if (!$conn) {
										die("Connection failed: " . mysqli_connect_error());
									}
									$query = "SELECT schoolName, schoolContactNum, schoolAddress FROM schooldetails_tbl WHERE schoolID = ".$schoolID;
									$result = mysqli_query($conn, $query);
									if(mysqli_num_rows($result) > 0) {
										while($row = mysqli_fetch_assoc($result)) {
											$schoolName = $row["schoolName"];
											$schoolContactNum = $row["schoolContactNum"];
											$schoolAddress = $row["schoolAddress"];
										}	
									}
									echo '
										<h5 class = "header">School Name: </h5><p>'.$schoolName.'</p>
										<h5 class = "header">School Address: </h5><p>'.$schoolAddress.'</p>
										<h5 class = "header">School Contact Number: </h5><p>'.$schoolAddress.'</p>
									';
								}
								else if($companyID != ""){
									$servername = "localhost";
									$username = "root";
									$password = "root";
									$dbname = "dbccf";
									$conn = mysqli_connect($servername, $username, $password, $dbname);
									if (!$conn) {
										die("Connection failed: " . mysqli_connect_error());
									}
									$query = "SELECT companyName, companyAddress, companyContactNum FROM companydetails_tbl WHERE companyID = ".$companyID;
									$result = mysqli_query($conn, $query);
									if(mysqli_num_rows($result) > 0) {
										while($row = mysqli_fetch_assoc($result)) {
											$companyName = $row["companyName"];
											$companyAddress = $row["companyAddress"];
											$companyContactNum = $row["companyContactNum"];
										}	
									}
									echo '
											<h5 class = "header">Company Name: </h5><p>'.$companyName.'</p>
											<h5 class = "header">Company Address: </h5><p>'.$companyAddress.'</p>
											<h5 class = "header">Company Contact Number: </h5><p>'.$companyContactNum.'</p>
									';
								}
								if($civilStatus == "Married" || $civilStatus == "Seperated" || $civilStatus == "Widow/er"){
									$servername = "localhost";
									$username = "root";
									$password = "root";
									$dbname = "dbccf";
									$conn = mysqli_connect($servername, $username, $password, $dbname);
									if (!$conn) {
										die("Connection failed: " . mysqli_connect_error());
									}
									$query = "SELECT spouseName, spouseContactNum, spouseBirthdate FROM spousedetails_tbl WHERE spouseID = ".$spouseID;
									$result = mysqli_query($conn, $query);
									if(mysqli_num_rows($result) > 0) {
										while($row = mysqli_fetch_assoc($result)) {
											$spouseName = $row["spouseName"];
											$spouseContactNum = $row["spouseContactNum"];
											$spouseBirthdate = date("j F, Y", strtotime($row["spouseBirthdate"]));
											if(is_null($row["spouseBirthdate"]))
												$spouseBirthdate = "";
											//$birthdate = $row["birthdate"];
										}	
									}
									echo '
											<h5 class = "header">Spouse Name: </h5><p>'.$spouseName.'</p>
											<h5 class = "header">Spouse Contact Number: </h5><p>'.$spouseContactNum.'</p>
											<h5 class = "header">Spouse Birthdate: </h5><p>'.$spouseBirthdate.'</p>
										
									';
								}
								if($prefID != ""){
									$servername = "localhost";
									$username = "root";
									$password = "root";
									$dbname = "dbccf";
									$conn = mysqli_connect($servername, $username, $password, $dbname);
									if (!$conn) {
										die("Connection failed: " . mysqli_connect_error());
									}
									$query = "SELECT prefLanguage, prefVenue1, prefVenue2, prefStartTime1, prefStartTime2, prefEndTime1, prefEndTime2, prefDay1, prefDay2 FROM preferencedetails_tbl WHERE prefID = ".$prefID;
									$result = mysqli_query($conn, $query);
									if(mysqli_num_rows($result) > 0) {
										while($row = mysqli_fetch_assoc($result)) {
											$prefLanguage = $row["prefLanguage"];
											$prefVenue1 = $row["prefVenue1"];
											$prefVenue2 = $row["prefVenue2"];
											$prefStartTime1 = date("H:i", strtotime($row["prefStartTime1"]));
											$prefEndTime1 = date("H:i", strtotime($row["prefEndTime1"]));
											$prefStartTime2 = date("H:i", strtotime($row["prefStartTime2"]));
											$prefEndTime2 = date("H:i", strtotime($row["prefEndTime2"]));
											$prefDay1 = $row["prefDay1"];
											$prefDay2 = $row["prefDay2"];
										}	
									}
									echo '
											<h5 class = "header">Prefered Language: </h5><p>'.$prefLanguage.'</p>
											<h5 class = "header">Prefered Venue 1: </h5><p>'.$prefVenue1.'</p>
											<h5 class = "header">Prefered Venue 2: </h5><p>'.$prefVenue2.'</p>
											<h5 class = "header">Prefered Start Time 1: </h5><p>'.$prefStartTime1.'</p>
											<h5 class = "header">Prefered End Time 1: </h5><p>'.$prefEndTime1.'</p>
											<h5 class = "header">Prefered Start Time 2: </h5><p>'.$prefStartTime2.'</p>
											<h5 class = "header">Prefered End Time 2: </h5><p>'.$prefEndTime2.'</p>
											<h5 class = "header">Prefered Day 1: </h5><p>'.$prefDay1.'</p>
											<h5 class = "header">Prefered Day 2: </h5><p>'.$prefDay2.'</p>


										</div>
									';
								}
							}
							?>
						
					</div>
				</div>
			
		</div>
	</body>
