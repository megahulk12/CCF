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
			font-family: ;
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
			transition: background-color 0.3s, box-shadow 0.3s; /* for transition purposes */
		}

		 /*Note: for rectangle background in navbar same sa original site
		.nav-container-transition {
			padding: 0 40;
			background-color: rgba(233, 233, 233, 0.4);
			transition: all 0.3s;
		}*/

		.transition {
			background-color: transparent;
			box-shadow: none;
			transition: background-color 0.3s;
		}

		header a.transition, .dropdown-content li > a.transition, .dropdown-content li > h6.transition {
			color: #fff;
			transition: color 0.3s;
		}

		header a.transition:hover {
			color: rgba(233, 233, 233, 0.7);
			transition: color 0.3s;
		}

		.dropdown-content li.transition:hover {
			background-color: rgba(233, 233, 233, 0.15);
			transition: background-color 0.3s;
		}

		header > ul.transition, header ul li ul.transition {
			background-color: rgba(255, 255, 255, 0.1);
			transition: background-color 0.3s;
		}

		li a:hover {
			color: #16A5B8;
			transition: color 0.3s;
		}

		/* ===== FONTS =====*/
		@font-face {
			font-family: proxima-nova;
			src: url(ccf-fonts/proxima/PROXIMANOVA-BOLD.OTF);
			font-weight: bold;
		}

		@font-face {
			font-family: proxima-nova-extrabold;
			src: url(ccf-fonts/proxima/PROXIMANOVA-EXTRABOLD.OTF);
			font-weight: 800;
		}
		/* ===== END ===== */

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
		  	color: #777;
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
			 overflow-x: hidden;
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
		  	color: #777;
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

		.cover, .cover span {
			position: relative;
			top: 25;
			font-family: proxima-nova-extrabold;
			font-size: 5rem;
			font-weight: 800;
			line-height: 4rem;
			color: #fff;
			-webkit-user-select: none;
			cursor: default;
		}

		.cover-content, .cover-content span {
			position: relative;
			top: 25;
			font-family: sans-serif;
			font-size: 1.4rem;
			color: #fff;
			-webkit-user-select: none;
			cursor: default;
		}

		.parallax-container {
			height: 100%;
			/*background-color: rgba(216, 216, 216, 0.48); fading opacity filter effect */
		}

		.parallax-container img {
			width: 100%; /* responsible for fitting the image in parallax */
		}
		/* ===== FOOTER ===== */
		.page-footer {
			background-color: #16A5B8;
		}

		p.footer-cpyrght {
			font-family: sans-serif;
			color: #fff;
		}
		/* ===== END ===== */

		/* ===== appearance class ===== */
		.hide {
			display: none;
		}

		.show {
			display: inline;
		}
		/* ===== END ===== */

		/* ===== PRELOADER ===== */
		.preloader-wrapper.small {
			width: 24px;
			height: 24px;
		}

		.spinner-notif {
			position: relative;
			left: 190px; /* half of width of notif list*/
			top: 100px; /* half of height of notif list*/
		}

		.spinner-color-notif {
			border-color: #777;
			transition: border-color 0.3s;
		}

		.spinner-color-notif-transition {
			border-color: #fff !important;
			transition: border-color 0.3s;
		}
		/* ===== END ===== */
	</style>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.parallax').parallax();
		});
        
		$(document).ready(function(){
			$('.dropdown-button + .dropdown-content-notification').on('click', function(event) {
				event.stopPropagation(); // this event stops closing the notification page when clicked upon
			});
		});

		// navbar initial state
		$(document).ready(function() {
			$('nav').addClass('transition');
			//$('nav div.container').addClass('nav-container-transition'); // Note: for rectangle background in navbar same sa original site
			$('header a').addClass('transition');
			$('header ul').addClass('transition');
			$('header ul li ul').addClass('transition');
			/* code for hiding dropdown links 
			$('a.dropdown-button').hide();
			$('ul.dropdown-content').hide();
			$('.dropdown-button').dropdown('close');
			*/
			$('header > a').addClass('transition');
			$('.dropdown-content li').addClass('transition');
			$('.dropdown-content li > a, .dropdown-content li > h6').addClass('transition');
			$('#notifications div.spinner-layer').addClass('spinner-color-notif-transition');
			$('nav a img').attr('src', "resources/CCF Logos8.png");
		});

		// navbar scroll state
		window.addEventListener("scroll", function() {
			if(window.scrollY > 10) {
				$('nav').removeClass('transition');
				//$('nav div.container').removeClass('nav-container-transition'); // Note: for rectangle background in navbar same sa original site
				$('header a').removeClass('transition');
				$('header ul').removeClass('transition');
				$('header ul li ul').removeClass('transition');
				/* code for showing dropdown links
				$('a.dropdown-button').show(300);
				*/
				$('header > a').removeClass('transition');
				$('.dropdown-content li').removeClass('transition');
				$('.dropdown-content li > a, .dropdown-content li > h6').removeClass('transition');
				$('#notifications div.spinner-layer').removeClass('spinner-color-notif-transition');
				$('nav a img').attr('src', "resources/CCF Logos6.png");
			}
			else {
				$('nav').addClass('transition');
				//$('nav div.container').addClass('nav-container-transition'); // Note: for rectangle background in navbar same sa original site
				$('header a').addClass('transition');
				$('header ul').addClass('transition');
				$('header ul li ul').addClass('transition');
				/* code for hiding dropdown links 
				$('a.dropdown-button').hide();
				$('ul.dropdown-content').hide();
				$('.dropdown-button').dropdown('close');
				*/
				$('header > a').addClass('transition');
				$('.dropdown-content li').addClass('transition');
				$('.dropdown-content li > a, .dropdown-content li > h6').addClass('transition');
				$('#notifications div.spinner-layer').addClass('spinner-color-notif-transition');
				$('nav a img').attr('src', "resources/CCF Logos8.png");
			}
		}, false);
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
			<li><h6 class="notifications-header" id="badge">Notifications</h6></li>
			<li class="divider"></li>
		</ul>
		<nav style="margin-bottom: 50px;" class="transition">
			<div class="container nav-container-transition">
			    <div class="nav-wrapper">
			      	<a href="index.php" class="brand-logo"><img src="resources/CCF Logos8" id="logo"/></a>
			      	<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="events.php" class="transition">EVENTS</a></li>
						<li><a href="ministries.php" class="transition">MINISTRIES</a></li>
						<?php if($_SESSION['active']) echo '<li><a class="dropdown-button transition" data-activates="account">'.strtoupper($_SESSION['user']).'<i class="material-icons right" style="margin-top: 14px;">arrow_drop_down</i></a></li>'; ?>
						<li><a class="dropdown-button notifications transition" data-activates="notifications" onclick="seen()" id="bell"><i class="material-icons material-icon-notification">notifications</i><?php if (notifCount() >= 1 && getNotificationStatus() == 0) echo '<sup class="notification-badge">'.notifCount().'</sup>'; ?></a></li>
			     	 </ul>
			    </div>
			</div>
		</nav>
	</header>

	<body>
		<div id="response"></div>
		<div class="parallax-container">
			<p class="cover center"> <!-- always enclose span tag -->
				<span>Y O U <br></span>
				<span>HAVE <br></span>
				<span>Y O U <br></span>
				<span>C A N <br></span>
				<br>
				<span>#GoServe</span>
				<p class="cover-content center">
					<span>Make the most out of every opportunity that the Lord gives you to volunteer where you can and while you can.</span>
				</p>
			</p>
			<div class="parallax">
				<img src="resources/GoServe2017_Background-04-1.jpg">
			</div>
		</div>
		<div class="section white">
			<div class="row container">
				<h2 class="header">Parallax</h2>
				<p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
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
		/*if(isset($_POST['submit'])) {
			echo '
				<script>
				// for congratulations of being a dgroup leader
					swal({
						title: "Congratulations!",
						text: "You are now a Dgroup leader! :)",
						type: "success",
						allowEscapeKey: true,
						timer: 10000
					});
				</script>
			';
		}*/

		if(getWelcome() == 0)  {
			echo '
			<script>
			$(document).ready(function() {
				// to inform that you have been registered
				swal({
					title: "Welcome to CCF!",
					text: "Thank you for filling up the registration form!\nFeel free to explore this website and God bless! :)",
					timer: 10000,
					confirmButtonText: "OK"
				});
				$("body").removeClass("stop-scrolling");
			});
			</script>
			';
			setWelcome();
		}

		function getWelcome() {
			// database connection variables
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "dbccf";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "SELECT welcome FROM member_tbl WHERE memberID = ".$_SESSION["userid"];
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$welcome = $row["welcome"];
				}
			}
			return $welcome;
		}

		function setWelcome() {
			// database connection variables
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "dbccf";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql = "UPDATE member_tbl SET welcome = 1 WHERE memberID = ".$_SESSION["userid"];
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
				  allowOutsideClick: false,
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
							}, function() {
								window.location.reload();
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
							}, function() {
								window.location.reload();
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
				$("body").removeClass("stop-scrolling");
		}
		
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
			$('#notifications').append(preloader);
			$.ajax({
				type: 'POST',
				url: url,
				data: 'view',
				dataType: 'json',
				success: function(data) {
					$('#notifications').html(data.view);
					$('.dropdown-content li').addClass('transition');
					$('.dropdown-content li > a, .dropdown-content li > h6').addClass('transition');
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

		// cover transition
		$(document).ready(function() {
			var cover = $(".parallax-container span");
			var ticker = 0;
			cover.hide();
			cover.each(function(i) { //3
				if(i%2==0) {
					ticker += 1000;
					$(this).delay(ticker).fadeIn(500); //1800
				}
				else {
					ticker += 400;
					$(this).delay(ticker).fadeIn(500); //1800
				}	
			});
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
				}
			};
		}
		else {
			// pass
		}

	</script>
</html>