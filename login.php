<?php
	include("config.php");
	session_start();
?>
<?xml version = ?1.0??>
<!DOCTYPE html PUBLIC ?-//w3c//DTD XHTML 1.1//EN? “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns = ?http://www.w3.org/1999/xhtml?>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="resources/CCF.ico">
	<link href="materialize/css/materialize.css" rel="stylesheet">
	<link href="universal.css" rel="stylesheet">
	<script src="jquery-3.2.1.min.js"></script>
	<script src="materialize/js/materialize.js"></script>
	<script src="universal.js"></script>

	<!-- for alerts -->
	<script src="alerts/dist/sweetalert-dev.js"></script>
	<link rel="stylesheet" type="text/css" href="alerts/dist/sweetalert.css">

	<title>Christ's Commission Fellowship</title>
	<style>
		::selection {
			background-color: #16A5B8;
			color: #fff;
		}
		
		/*containers*/
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
			width: 315px;
			position: relative;
			right: 15;
		}
		/*=======END=======*/

		/*
		colors for ccf:
		#16A5B8
		#777
		*/

		/*links*/
		nav {
			color: #777;
			background-color: #fff;
			width: 100%;
			height: 97px;
			line-height: 97px;
		}
		a:hover {
			background-color:transparent;
			color: #16A5B8;
			text-decoration: underline;
		}
		@font-face {
			font-family: proxima-nova;
			src: url(ccf-fonts/proxima/PROXIMANOVA-BOLD.otf);
			font-weight: bold;
		}

		a {
			font-family: proxima-nova;
			color: #16A5B8;
			font-size: 13px;
		}
		/*=======END=======*/

		/*============================OVERRIDE CUSTOM MATERIALIZE STYLES===========================*/
		/*input custom colors*/
		/*Text inputs*/
		input:not([type]):focus:not([readonly]),
		input[type=text]:not(.browser-default):focus:not([readonly]),
		input[type=password]:not(.browser-default):focus:not([readonly]),
		input[type=email]:not(.browser-default):focus:not([readonly]),
		input[type=url]:not(.browser-default):focus:not([readonly]),
		input[type=time]:not(.browser-default):focus:not([readonly]),
		input[type=date]:not(.browser-default):focus:not([readonly]),
		input[type=datetime]:not(.browser-default):focus:not([readonly]),
		input[type=datetime-local]:not(.browser-default):focus:not([readonly]),
		input[type=tel]:not(.browser-default):focus:not([readonly]),
		input[type=number]:not(.browser-default):focus:not([readonly]),
		input[type=search]:not(.browser-default):focus:not([readonly]),
		textarea.materialize-textarea:focus:not([readonly]) {
		  border-bottom: 1px solid #16A5B8;
		  -webkit-box-shadow: 0 1px 0 0 #16A5B8;
		}

		input:not([type]):focus:not([readonly]) + label,
		input[type=text]:not(.browser-default):focus:not([readonly]) + label,
		input[type=password]:not(.browser-default):focus:not([readonly]) + label,
		input[type=email]:not(.browser-default):focus:not([readonly]) + label,
		input[type=url]:not(.browser-default):focus:not([readonly]) + label,
		input[type=time]:not(.browser-default):focus:not([readonly]) + label,
		input[type=date]:not(.browser-default):focus:not([readonly]) + label,
		input[type=datetime]:not(.browser-default):focus:not([readonly]) + label,
		input[type=datetime-local]:not(.browser-default):focus:not([readonly]) + label,
		input[type=tel]:not(.browser-default):focus:not([readonly]) + label,
		input[type=number]:not(.browser-default):focus:not([readonly]) + label,
		input[type=search]:not(.browser-default):focus:not([readonly]) + label,
		textarea.materialize-textarea:focus:not([readonly]) + label {
		  color: #16A5B8;
		}

		input:-webkit-text-fill-color {
		    -webkit-box-shadow: 0 0 0px 1000px white inset;
		}

		.btn, .btn-large {
		  text-decoration: none;
		  color: #fff;
		  background-color: #16A5B8;
		  text-align: center;
		  letter-spacing: .5px;
		  transition: .2s ease-out;
		  cursor: pointer;
		  font-family: proxima-nova;
		  font-size: 13px;
		  border-radius: 20px;
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
		}

		/*focus of button*/
		.btn:focus, .btn-large:focus,
		.btn-floating:focus {
		  	background-color: #1bcde4;
		}

		/*form*/
		.login {
			width:300px;
			margin-top: 25%;
		}

		.error {
			background-color: #ffdce0;
			color: #86181d;
			border-color: rgba(27,31,35,0.15);
			height: 50px;
			border-radius: 5px;
			margin-bottom: 20px;
		}

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
			color: #410b0e;
		}
		/*=======END=======*/
		/*============================END===========================*/
	</style>
	<header>
	</header>
		<body>
			<div class="row">
				<main>
				<form method="post" class="login"><!--if php is applied, action value will then become the header -->
					<div class="row">
						<a href="home.php" tabindex="-1"><img src="resources/CCF Logos3.png" id="loginlogo"/></a>
					</div>
					<div class="row">
						<div class="error col s12" style="display: none;">
							<a class="close-error" id="close-error"><i class="material-icons prefix small">close</i></a>
							<p class="center">Wrong username or password.</p>
						</div>
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i><!-- person_outline -->
							<input type="text" id="username" name="username" autocomplete="off">
							<label for="username">Username</label>
						</div>
						<div class="input-field col s12">
							<i class="material-icons prefix">lock</i><!-- lock_outline -->
							<input type="password" id="password" name="password">
							<label for="password">Password</label> <!-- qdaas -->
						</div>
					</div>
					<div class="row">
						<button class="waves-effect waves-light btn col s12" type="submit" name="login-submit" id="login-submit">Login</button>
					</div>
					<div class="row">
						<a href="guest.php" class="col s12 center">LOGIN AS GUEST</a>
					</div>
					<div class="row">
						<a href="register.php" class="col s12 center">I WANT TO BE A DGROUP MEMBER</a>
					</div>
				</form>
				</main>
			</div>
		<footer>
		</footer>
	</body>
	<script>
		$('.error').hide();
		$('#close-error').click(function() {
			$('.error').fadeOut(200);
		});

		$('#login-submit').click(function(e) {
			$('#login-submit').text('Logging In...');
			$('button').prop("disabled", true);
			var url="request_login.php";
			$.ajax({
				type: "POST",
				url: url,
				data: $('form').serialize(),
				success: function(data) {
					if(data == "index.php") {
						window.location.href = data;
					}
					else {
						$('.error').show();
						$('#login-submit').text('Login');
						$('button').prop("disabled", false);
					}
				},
				error: function(data) {
					$('#login-submit').text('Login');
					$('button').prop("disabled", false);
				}
			});
			e.preventDefault();
		});
	</script>
	<?php
		if(isset($_POST['login-submit'])) {
		}
	?>
</html>