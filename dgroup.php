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
			 max-height: 650px;
			 overflow-y: auto;
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

	<script>
			$(document).ready(function(){
				// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
				$('.modal').modal();
			});
 
			
		</script>

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

		  	<?php
		  		if($_SESSION["memberType"] > 0) echo '<li><a href="dgroup.php"><i class="material-icons prefix>">group</i>Dgroup</a></li>
		  		<li class="divider"></li>
			  	<li><a href="create-event.php"><i class="material-icons prefix>">library_add</i>Propose Event</a></li>
			  	<li class="divider"></li>
			  	<li><a href="pministry.php"><i class="material-icons prefix>">group_add</i>Propose Ministry</a></li> <!-- for dgroup leaders view -->
		  		<li class="divider"></li>';
		  	?>
		  	
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
		<div id="response"></div>
		<div class="container">
			<?php 
			if($_SESSION['memberType'] == 1 && getRequestSeen() == "") { //checks if dgroup member and if endorsement has not been made
			echo '
			<form method="post">
				<button class="waves-effect waves-light btn col s2 right dgroup-leader-button" id="request_leader" type="button" name="request_leader" onclick = "window.location.href = '."'".'endorsement.php'."'".'"><font color = "white">I WANT TO BE A DGROUP LEADER</font></button>
				<input type="hidden" name="seen-request" />
			</form>';
			}
			?>
			<div id="view-profilee" style="display: none;"> <!-- remove e -->
				<table class="centered dgroup-table-spacing">
					<tr>
						<td>
							<a id="member" class="dgroup-names" href="#small-group" onclick="viewProfile(0)"><i class="material-icons prefix dgroup-icons">person</i></a>
						</td>
					</tr>
				</table>
			</div>
			<div id="small-group">
				<div id="dgroup">
					<h3>Discipleship Group</h3>
					<table class="centered dgroup-table-spacing">
						<tr> <!-- only 4 table data cells for balanced layout then add another row -->
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
						$query = "SELECT CONCAT(firstName, ' ', lastName) AS fullname FROM discipleshipgroupmembers_tbl INNER JOIN discipleshipgroup_tbl ON discipleshipgroupmembers_tbl.dgroupID = discipleshipgroup_tbl.dgroupID INNER JOIN member_tbl ON discipleshipgroupmembers_tbl.memberID = member_tbl.memberID WHERE discipleshipgroupmembers_tbl.dgroupID = ".getDgroupID()." AND dgroupmemberID != ".getDgroupMemberID($_SESSION['userid']);

						$lquery = "SELECT CONCAT(firstName, ' ', lastName) AS leader FROM discipleshipgroupmembers_tbl INNER JOIN discipleshipgroup_tbl ON discipleshipgroupmembers_tbl.memberID = discipleshipgroup_tbl.dgleader INNER JOIN member_tbl ON discipleshipgroupmembers_tbl.memberID = member_tbl.memberID WHERE dgleader = ".getDgroupLeaderID($_SESSION['userid']);


						$lresult = mysqli_query($conn, $lquery);
						
						if(mysqli_num_rows($lresult) > 0) {
							while($lrow = mysqli_fetch_assoc($lresult)) {
								$leader = $lrow["leader"];
							}
						}

						$result = mysqli_query($conn, $query);
						if(mysqli_num_rows($result) > 0) {
								echo '
						<td>
							<a class="dgroup-names"><i class="material-icons prefix-leader dgroup-icons">person</i><br>
							'.$leader.'<br><br><label>LEADER</label></a>
						</td>
								';
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
					// insert code set notificationStatus = 1 when user clicks notification area
					$query = "SELECT CONCAT(firstName, ' ', lastName) AS fullname, member_tbl.memberID AS memberID FROM discipleshipgroupmembers_tbl INNER JOIN discipleshipgroup_tbl ON discipleshipgroupmembers_tbl.dgroupID = discipleshipgroup_tbl.dgroupID INNER JOIN member_tbl ON discipleshipgroupmembers_tbl.memberID = member_tbl.memberID WHERE dgroupmemberID != ".getDgroupMemberID($_SESSION['userid'])." AND discipleshipgroup_tbl.dgleader = ".$_SESSION['userid'];

					$result = mysqli_query($conn, $query);
						if(mysqli_num_rows($result) > 0) {
							echo '
			<div id="own-dgroup">
				<h3>My Discipleship Group</h3>
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
					</tr>';
					}
					/*if($_SESSION['memberType'] >= 2 ) {
					echo '
					<h3>Own Dgroup</h3>
>>>>>>> Paolo-Edits
					<table id="own-dgroup" class="centered dgroup-table-spacing">
						<tr>
								';
								while($row = mysqli_fetch_assoc($result)) {
									$fullname = $row["fullname"];
									$memberID = $row["memberID"];
									if($_SESSION['memberType'] >= 2 ){
										echo '
							<td>
								<a class="dgroup-names" onclick="view('.$memberID.');" href="#view-profile"><i class="material-icons prefix dgroup-icons">person</i><br>
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
						</tr>';
							}
						/*if($_SESSION['memberType'] >= 2 ) {
						echo '
						<h3>Own Dgroup</h3>
						<table id="own-dgroup" class="centered dgroup-table-spacing">
							<tr>
								<td>
									<a class="dgroup-names" href="#view-profile"><i class="material-icons prefix dgroup-icons">person</i><br>
									Dodong Laboriki</a>
								</td>
								<td>
									<a class="dgroup-names" href="#view-profile"><i class="material-icons prefix dgroup-icons">person</i><br>
									Dodong Laboriki</a>
								</td>
								<td>
									<a class="dgroup-names" href="#view-profile"><i class="material-icons prefix dgroup-icons">person</i><br>
									Dodong Laboriki</a>
								</td>
								<td>
									<a class="dgroup-names" href="#view-profile"><i class="material-icons prefix dgroup-icons">person</i><br>
									Dodong Laboriki</a>
								</td>
							</tr>
						</table>';
						}*/
					?>

			
				<!----------------------THE END------------------------>
	</body>
	</tr>
	</table>
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
<<<<<<< HEAD
				})
			}
					
=======
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
>>>>>>> Jasper-Edits
	</script>
</html>