<?xml version = ″1.0″?>
<!DOCTYPE html PUBLIC ″-//w3c//DTD XHTML 1.1//EN″ “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns = ″http://www.w3.org/1999/xhtml″>
	<?php include('session.php'); ?>
	<?php
		// database connection variables
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";

		if(isset($_POST['request_leader'])) {
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql_endorsement_request = "INSERT INTO endorsement_tbl(dgmemberID) VALUES(".$_SESSION['dgroupmemberID'].");";
			mysqli_query($conn, $sql_endorsement_request);

		}
	?>
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

		.dgroup-icons {
			font-size: 200px;
		}

		.dgroup-names {
			font-family: proxima-nova;
			color: #424242;
			font-size: 13px;
			text-transform: uppercase;
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
	</style>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.dropdown-button + .dropdown-content-notification').on('click', function(event) {
				event.stopPropagation(); // this event stops closing the notification page when clicked upon
			});
		}); 
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
		  	<li><a href="endorsement.php">Dodong Laboriki has approved your endorsement request. Click to see endorsement form.</a></li>
		  	<li class="divider"></li>
		  	<li><a href="endorsement.php">Dodong Laboriki has approved your endorsement request. Click to see endorsement form.</a></li>
		  	<li class="divider"></li>
		  	<li><a href="endorsement.php">Dodong Laboriki has approved your endorsement request. Click to see endorsement form.</a></li>
		  	<li class="divider"></li>
		  	<li><a href="endorsement.php">Dodong Laboriki has approved your endorsement request. Click to see endorsement form.</a></li>
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
						<li><a class="dropdown-button notifications" data-activates="notifications"><i class="material-icons material-icon-notification">notifications</i><sup class="notification-badge">5</sup></a></li>
			     	 </ul>
			    </div>
			</div>
		</nav>
	</header>

	<body>
		<div class="container">
			<?php 
			if($_SESSION['memberType'] == 1 && getRequestSeen() == "") { //checks if dgroup member and if endorsement has not been made
			echo '
			<form method="post" action="dgroup.php">
				<button class="waves-effect waves-light btn col s2 right dgroup-leader-button" id="request_leader" type="submit" name="request_leader">I WANT TO BE A DGROUP LEADER</button>
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
					<h3>Dgroup</h3>
					<table class="centered dgroup-table-spacing">
						<tr> <!-- only 4 table data cells for balanced layout then add another row -->
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
					</table>
				</div>
				<div id="own-dgroup">
				<?php
					if($_SESSION['memberType'] >= 2 ) {
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
					}
				?>
				</div>
			</div>
	</body>

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

		/*
		function requestLeader() {
			swal({
				title: "Success!",
				text: "Request submitted!\nPlease wait for your Dgroup leader to assess your request.",
				type: "success",
				allowEscapeKey: true
			},
				function() {
					//changeToPending();
				}
			);
			
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
		*/
	</script>

	<?php
		if(isset($_POST['seen-request'])) {
			// script also prevents to confirm form resubmission para there are no duplicates in the data
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
</html>