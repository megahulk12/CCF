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
	<title>Christ's Commission Fellowship</title>
	<style>

		/*logo*/
		#logo {
			margin-top: 10px;
		}

		img#loginlogo {
			height: 150px;
			width: 300px;
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

		/* ============================OVERRIDE CUSTOM MATERIALIZE STYLES=========================== */  
		/* input custom colors*/
		/* Text inputs */
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

		input:not([type]):focus:not([readonly]) + label,
		input[type=text]:focus:not([readonly]) + label,
		input[type=password]:focus:not([readonly]) + label,
		input[type=email]:focus:not([readonly]) + label,
		input[type=url]:focus:not([readonly]) + label,
		input[type=time]:focus:not([readonly]) + label,
		input[type=date]:focus:not([readonly]) + label,
		input[type=datetime]:focus:not([readonly]) + label,
		input[type=datetime-local]:focus:not([readonly]) + label,
		input[type=tel]:focus:not([readonly]) + label,
		input[type=number]:focus:not([readonly]) + label,
		input[type=search]:focus:not([readonly]) + label,
		textarea.materialize-textarea:focus:not([readonly]) + label {
		  color: #16A5B8;
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

		/*hover of button */
		.btn:hover, .btn-large:hover {
			background-color: #1bcde4;
		}

		/*focus of button*/
		.btn:focus, .btn-large:focus,
		.btn-floating:focus {
		  	background-color: #1bcde4;
		}
	</style>
	<script>

	</script>
	<header>
	</header>
	<body>
		<main>
			<form method="post" class="login">
				<div class="row">
						<a href="home.php" tabindex="-1"><img src="resources/CCF Logos3.png" id="loginlogo"/></a>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i><!-- person_outline -->
							<input type="text" class="validate" name="username">
							<label for="icon_prefix" name="lblusername">Username</label>
						</div>
						<div class="input-field col s12">
							<i class="material-icons prefix">lock</i><!-- lock_outline -->
							<input type="password" class="validate" name="password">
							<label for="password" name="lblpassword">Password</label>
						</div>
					</div>
					<div class="row">
						<button class="waves-effect waves-light btn col s12" type="submit">Login</button>
					</div>
					<div class="row">
						<a href="guest.php" class="col s12 center">LOGIN AS GUEST</a>
					</div>
					<div class="row">
						<a href="register.php" class="col s12 center">I WANT TO BE A DGROUP MEMBER</a>
					</div>
			</form>
		</main>
	</body>
	<?php
			include("config.php");
			session_start();
			
		    if($_SERVER["REQUEST_METHOD"] == "POST") {
				// username and password sent from form 
			  
				$myusername = mysqli_real_escape_string($db,$_POST['username']);
				$mypassword = mysqli_real_escape_string($db,$_POST['password']);
			  
				$sql = "SELECT * FROM member_tbl WHERE username = '$myusername' AND password = '$mypassword';";
				$result = mysqli_query($db, $sql);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				//$active = $row['active'];
				//$id = $row['id'];
			  
				$count = mysqli_num_rows($result);
			  
				// If result matched $myusername and $mypassword, table row must be 1 row
				if($count == 1) {
					$_SESSION['user'] = $myusername;
					sleep(1);
					header("Location: index.php;");
					/*
					if($active == 1) {
							
						$_SESSION['user'] = $myusername;
						//$_SESSION['id'] = $id;
						
						sleep(1);
						header("Location: home.php");
					}
					else {
						echo '
						<script>
							Materialize.toast("Your account is inactive.", 3000);
						</script>';
					}
					*/
				}
				else {
					echo '
					<script>
						Materialize.toast("Your Username or Password is invalid", 3000);
					</script>';
				}
		    } 
		?>