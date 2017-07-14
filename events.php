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

	<!-- layout plugin -->
	<script src="isotope.pkgd.min.js"></script>
	<script src="imagesloaded.pkgd.js"></script>

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

		.container-events {
			margin: 0 auto;
			position: relative;
			max-width: 1080px;
			width: 100%;
		}

		body {
			margin-top: 150px;
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
			z-index: 1;
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
			 overflow-y: auto;
		 	 opacity: 0;
		 	 position: absolute !important; /*original: absolute*/
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

		.notifcation-new {
			background-color: #ebebeb;
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
			position: relative !important;
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

		/* ===============CARDS=============== */
		/*headers*/
		h1, h2, h3, h4, h5, h6 {
			color: #292929;
			font-family: proxima-nova;
			text-transform: uppercase;
		}

		@font-face {
			font-family: proxima-nova-header;
			src: url(ccf-fonts/proxima/PROXIMANOVA-BOLD.otf);
			font-weight: bold;
		}
		/*=======END=======*/

		.card {
			position: relative;
			margin: 0.5rem 0 1rem 0;
			background-color: #f4f7f8;
			transition: box-shadow .25s;
			border-radius: 2px;
			width: 330px;
		}

		.card:hover {
			position: relative;
			margin: 0.5rem 0 1rem 0;	
			background-color: #fff;
			transition: box-shadow .25s;
			border-radius: 2px;
		}

		.card .card-title {
			font-size: 24px;
			font-weight: 300;
			font-family: proxima-nova;
			text-transform: uppercase;
		}

		.card .card-image img {
			display: block;
			border-radius: 2px 2px 0 0;
			position: relative;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
			width: 100%;
			cursor: pointer;
		}

		.card .card-action a:not(.btn):not(.btn-large):not(.btn-large):not(.btn-floating) {
			color: #16A5B8;
			margin-right: 24px;
			transition: color .3s ease;
			text-transform: uppercase;
		}

		.card .card-action a:not(.btn):not(.btn-large):not(.btn-large):not(.btn-floating):hover {
			color: #1bcde4;
		}

		.card .card-content p {
			margin: 0;
			color: #6a6a6a;
			font-family: sans-serif;
			font-size: 11px;
			height: inherit;
			text-align: justify;
			line-height: 1.5rem;
		}

		a.events {
		    font-family: proxima-nova;
		    font-size: 21px;
		    color: #292929 !important;
			cursor: pointer;

		}

		a.events:hover {
		    color: #16A5B8 !important;
		}

		a.events:focus {
			color: #1bcde4 !important;
		}

		.schedule {
			background-color: #e4e4e4;
			font-size: 14px !important;
			font-weight: bolder;
			color: #424242 !important;
			text-align: center !important;
			height: 50px !important;
			margin-bottom: 20px !important;
			padding-top: 15px;
		}
		/* ===============END=============== */
	</style>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.dropdown-button + .dropdown-content-notification').on('click', function(event) {
				event.stopPropagation(); // this event stops closing the notification page when clicked upon
			});
		});

		/*
		window.addEventListener("scroll", function() {
			if(window.scrollY > 150) {
				$('nav').slideUp("fast");
			}
			else {
				$('nav').slideDown("fast");
			}
		}, false);
		*/

		setTimeout(function() {
			window.addEventListener("scroll", function() {
				behavior: 'smooth'
			});
		}, 500);
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
		<nav style="margin-bottom: 50px;" id="navbar">
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
		<!-- event cards -->
		<?php
			//position-x interval: 370px
			//position-y interval: 540px
		?>
		<h3 class="center">UPCOMING EVENTS</h3>
		<div class="container-events">
			<div class="row">
				<div class="col s12 m7">
					<div class="card hoverable">
						<div class="card-image">
							<a href="view-event.php"><img src="resources/Elevate Unite Cover.jpg" class="stretch"></a>
						</div>
						<div class="card-content">
							<a href="view-event.php" class="card-title events">ELEVATE UNITE</a>
							<p class="schedule">
								July 15 @ 1:00 pm - 5:30 pm
							</p>
							<p>
								YOU ARE MEANT TO LIVE FOR SOMETHING GREATER!
								YOU ARE MEANT TO MOVE TO GREATER HEIGHTS!

								The time to act is NOW!

								Join us as we tackle God's purpose for you in your own campus! Gear up for the upcoming school year with Elevate Davao's annual event UNITE! Meet students from different campuses who are called to move JUST LIKE YOU! Admission is FREE so bring your friends, classmates, block mates, and maybe even your teachers!
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m7">
					<div class="card hoverable">
						<div class="card-image">
							<img src="resources/Elevate Unite.jpg" class="stretch">
						</div>
						<div class="card-content">
							<a class="card-title events">ELEVATE UNITE</a>
							<p class="schedule">
								July 15 @ 1:00 pm - 5:30 pm
							</p>
							<p>
								YOU ARE MEANT TO LIVE FOR SOMETHING GREATER!
								YOU ARE MEANT TO MOVE TO GREATER HEIGHTS!

								The time to act is NOW!

								Join us as we tackle God's purpose for you in your own campus! Gear up for the upcoming school year with Elevate Davao's annual event UNITE! Meet students from different campuses who are called to move JUST LIKE YOU! Admission is FREE so bring your friends, classmates, block mates, and maybe even your teachers!
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m7">
					<div class="card hoverable">
						<div class="card-image">
							<img src="resources/Elevate Unite Cover.jpg" class="stretch">
						</div>
						<div class="card-content">
							<a class="card-title events">ELEVATE UNITE</a>
							<p class="schedule">
								July 15 @ 1:00 pm - 5:30 pm
							</p>
							<p>
								YOU ARE MEANT TO LIVE FOR SOMETHING GREATER!
								YOU ARE MEANT TO MOVE TO GREATER HEIGHTS!

								The time to act is NOW!

								Join us as we tackle God's purpose for you in your own campus! Gear up for the upcoming school year with Elevate Davao's annual event UNITE! Meet students from different campuses who are called to move JUST LIKE YOU! Admission is FREE so bring your friends, classmates, block mates, and maybe even your teachers!
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m7">
					<div class="card hoverable">
						<div class="card-image">
							<img src="resources/Elevate Unite.jpg" class="stretch">
						</div>
						<div class="card-content">
							<a class="card-title events">ELEVATE UNITE</a>
							<p class="schedule">
								July 15 @ 1:00 pm - 5:30 pm
							</p>
							<p>
								YOU ARE MEANT TO LIVE FOR SOMETHING GREATER!
								YOU ARE MEANT TO MOVE TO GREATER HEIGHTS!

								The time to act is NOW!

								Join us as we tackle God's purpose for you in your own campus! Gear up for the upcoming school year with Elevate Davao's annual event UNITE! Meet students from different campuses who are called to move JUST LIKE YOU! Admission is FREE so bring your friends, classmates, block mates, and maybe even your teachers!
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m7">
					<div class="card hoverable">
						<div class="card-image">
							<img src="resources/Elevate Unite.jpg" class="stretch">
						</div>
						<div class="card-content">
							<a class="card-title events">ELEVATE UNITE</a>
							<p class="schedule">
								July 15 @ 1:00 pm - 5:30 pm
							</p>
							<p>
								YOU ARE MEANT TO LIVE FOR SOMETHING GREATER!
								YOU ARE MEANT TO MOVE TO GREATER HEIGHTS!

								The time to act is NOW!

								Join us as we tackle God's purpose for you in your own campus! Gear up for the upcoming school year with Elevate Davao's annual event UNITE! Meet students from different campuses who are called to move JUST LIKE YOU! Admission is FREE so bring your friends, classmates, block mates, and maybe even your teachers!
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m7">
					<div class="card hoverable">
						<div class="card-image">
							<img src="resources/Elevate Unite.jpg" class="stretch">
						</div>
						<div class="card-content">
							<a class="card-title events">ELEVATE UNITE</a>
							<p class="schedule">
								July 15 @ 1:00 pm - 5:30 pm
							</p>
							<p>
								YOU ARE MEANT TO LIVE FOR SOMETHING GREATER!
								YOU ARE MEANT TO MOVE TO GREATER HEIGHTS!

								The time to act is NOW!

								Join us as we tackle God's purpose for you in your own campus! Gear up for the upcoming school year with Elevate Davao's annual event UNITE! Meet students from different campuses who are called to move JUST LIKE YOU! Admission is FREE so bring your friends, classmates, block mates, and maybe even your teachers!
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m7">
					<div class="card hoverable">
						<div class="card-image">
							<img src="resources/Elevate Unite.jpg" class="stretch">
						</div>
						<div class="card-content">
							<a class="card-title events">ELEVATE UNITE</a>
							<p class="schedule">
								July 15 @ 1:00 pm - 5:30 pm
							</p>
							<p>
								YOU ARE MEANT TO LIVE FOR SOMETHING GREATER!
								YOU ARE MEANT TO MOVE TO GREATER HEIGHTS!

								The time to act is NOW!

								Join us as we tackle God's purpose for you in your own campus! Gear up for the upcoming school year with Elevate Davao's annual event UNITE! Meet students from different campuses who are called to move JUST LIKE YOU! Admission is FREE so bring your friends, classmates, block mates, and maybe even your teachers!
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m7">
					<div class="card hoverable">
						<div class="card-image">
							<img src="resources/Elevate Unite.jpg" class="stretch">
						</div>
						<div class="card-content">
							<a class="card-title events">ELEVATE UNITE</a>
							<p class="schedule">
								July 15 @ 1:00 pm - 5:30 pm
							</p>
							<p>
								YOU ARE MEANT TO LIVE FOR SOMETHING GREATER!
								YOU ARE MEANT TO MOVE TO GREATER HEIGHTS!

								The time to act is NOW!

								Join us as we tackle God's purpose for you in your own campus! Gear up for the upcoming school year with Elevate Davao's annual event UNITE! Meet students from different campuses who are called to move JUST LIKE YOU! Admission is FREE so bring your friends, classmates, block mates, and maybe even your teachers!
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m7">
					<div class="card hoverable">
						<div class="card-image">
							<img src="resources/Elevate Unite.jpg" class="stretch">
						</div>
						<div class="card-content">
							<a class="card-title events">ELEVATE UNITE</a>
							<p class="schedule">
								July 15 @ 1:00 pm - 5:30 pm
							</p>
							<p>
								YOU ARE MEANT TO LIVE FOR SOMETHING GREATER!
								YOU ARE MEANT TO MOVE TO GREATER HEIGHTS!

								The time to act is NOW!

								Join us as we tackle God's purpose for you in your own campus! Gear up for the upcoming school year with Elevate Davao's annual event UNITE! Meet students from different campuses who are called to move JUST LIKE YOU! Admission is FREE so bring your friends, classmates, block mates, and maybe even your teachers!
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>

	<script>
	// initialize
	var $container = jQuery('.container-events');
	$container.isotope({
		// options
		itemSelector: '.row',
		layoutMode: 'masonry',
		masonry: {
			columnWidth: 20
		}
	});

	// re-initialize
	jQuery(function() { // allows to load the image first before layout isotope executes
		var $container = jQuery('.container-events');
		$container.imagesLoaded(function() {
			$container.isotope({
				// options
				itemSelector: '.row',
				layoutMode: 'masonry',
				masonry: {
					columnWidth: 20
				}
			});
		});
	});
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
	</script>
</html>