<?php include('session.php'); ?>
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

		.card {
			width:400px;
			height: 200px;
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
		  	<li><a href="#!">Dodong Laboriki has approved your endorsement request.</a></li>
		  	<li class="divider"></li>
		  	<li><a href="#!">Dodong Laboriki has approved your endorsement request.</a></li>
		  	<li class="divider"></li>
		  	<li><a href="#!">Dodong Laboriki has approved your endorsement request.</a></li>
		  	<li class="divider"></li>
		  	<li><a href="#!">Dodong Laboriki has approved your endorsement request.</a></li>
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
	<center><h1 class="header">Latest Events</h1></center>
		<div class="row">
		<h3 class="header">Walk Through</h2>
		<div class="card horizontal card-panel hoverable">
			<div class="card-image">
				<img src="resources/tree.jpg">
			</div>
		<div class="card-stacked">
			<div class="card-content">
				<p>Set on a new Journey!</p>
			</div>
			<div class="card-action">
				<a href="#">LEARN MORE</a>
			</div>
		</div>
		</div>
		</div>

		<div class="row">
		<h3 class="header">Take a Swim</h2>
		<div class="card horizontal card-panel hoverable">
			<div class="card-image">
				<img src="resources/water.jpg">
			</div>
		<div class="card-stacked">
			<div class="card-content">
				<p>Want to take a swim?</p>
			</div>
			<div class="card-action">
				<a href="#">LEARN MORE</a>
			</div>
		</div>
		</div>
		</div>

		<div class="col s12 m7 row">
		<h3 class="header">Have a Break</h2>
		<div class="card horizontal card-panel hoverable">
			<div class="card-image">
				<img src="resources/coffee.jpg">
			</div>
		<div class="card-stacked">
			<div class="card-content">
				<p>Craving for Coffee?</p>
			</div>
			<div class="card-action">
				<a href="#">LEARN MORE</a>
			</div>
		</div>
		</div>
		</div>

		<div class="row">
			<div class="row col s12 m12 l6"> <!--1st row containing 2 cards-->
			<div class="col s12 m7 row">
		<h3 class="header">Go Somewhere</h2>
		<div class="card horizontal card-panel hoverable">
			<div class="card-image">
				<img src="resources/coffee.jpg">
			</div>
		<div class="card-stacked">
			<div class="card-content">
				<p>Craving for Coffee?</p>
			</div>
			<div class="card-action">
				<a href="#">LEARN MORE</a>
			</div>
		</div>
		</div>
		</div>
			</div><!--END ROW-->

		<div class="row col s12 m12 l6">  <!--2nd row containing 2 cards-->
			<div class="col s12 m7 row">
		<h3 class="header">Find Meaning</h2>
		<div class="card horizontal card-panel hoverable">
			<div class="card-image">
				<img src="resources/coffee.jpg">
			</div>
		<div class="card-stacked">
			<div class="card-content">
				<p>Craving for Coffee?</p>
			</div>
			<div class="card-action">
				<a href="#">LEARN MORE</a>
			</div>
		</div>
		</div>
		</div><!--END ROW-->
		</div>
	</body>

</html>