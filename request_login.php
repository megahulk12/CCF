<?php
	include("config.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']);
		$sql = "SELECT * FROM member_tbl WHERE username = '$myusername' AND password = '$mypassword';";
		$result = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		if($count == 1) {
			$_SESSION['user'] = $myusername;
			sleep(1);
			$redirect = "index.php";
			echo $redirect;
			exit();
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
		}	
	}
?>