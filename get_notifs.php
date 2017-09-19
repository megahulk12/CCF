<?php
	// database connection variables
	if(isset($_POST['view'])) {
		include("session.php");
		include("globalfunctions.php");
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// insert code set notificationStatus = 1 when user clicks notification area
		$query = "SELECT eventID, notificationDesc, notificationStatus, notificationType, request FROM notifications_tbl WHERE notificationStatus <= 1 AND (receivermemberID = ".$_SESSION['userid'].") ORDER BY notificationID DESC;";
		$result = mysqli_query($conn, $query);
		$view = '
		<li><h6 class="notifications-header" id="badge">Notifications</h6></li>
		<li class="divider"></li>
		';
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				//$receivermemberID = $row['receivermemberID']; testing muna ito
				$eid = $row["eventID"];
				$notificationDesc = $row['notificationDesc'];
				$notificationStatus = $row['notificationStatus'];
				$notificationType = $row['notificationType'];
				$request = $row['request'];
				if($notificationStatus <= 1 && $notificationType == 0 && $request == 1) { // loads notifications if both seen or not seen and endorsement request type; this is also for heads
					$view .= '<li><a onclick="approval()">'.$notificationDesc.'</a></li>';
				}
				else if($notificationStatus <= 1 && $notificationType == 0 && getEndorsementStatus(getDgroupMemberID($_SESSION['userid'])) == 1) { // for result notifs of request approve
					$view .= '<li><a href="endorsement.php">'.$notificationDesc.'</a></li>';
				}
				else if($notificationStatus <= 1 && $notificationType == 0 && getEndorsementStatus(getDgroupMemberID($_SESSION['userid'])) == 3) { // for result notifs of request reject/reconsideration
					$view .= '<li><a>'.$notificationDesc.'</a></li>';
				}
				else if($notificationStatus <= 1 && $notificationType == 1 && $request == 1 && $_SESSION['memberType'] == 5) { // for event request notifs
					$view .= '<li><a href="event-requests.php">'.$notificationDesc.'</a></li>';
				}
				else if($notificationStatus <= 1 && $notificationType == 1 && $request == 1 && $_SESSION['memberType'] == 3) { // for event participant request notifs
					$view .= '<li><a href="participation-requests.php">'.$notificationDesc.'</a></li>';
				}
				else if($notificationStatus <= 1 && $notificationType == 1 && $request == 0) { // for event notifs
					$view .= '<li><a href="events.php">'.$notificationDesc.'</a></li>';
				}
				else if($notificationStatus <= 1 && $notificationType == 2 && $request == 1 && $_SESSION['memberType'] == 5) { // for ministry request notifs
					$view .= '<li><a href="ministry-requests.php">'.$notificationDesc.'</a></li>';
				}
				else if($notificationStatus <= 1 && $notificationType == 2 && $request == 1 && $_SESSION['memberType'] == 4) { // for ministry participation request notifs
					$view .= '<li><a href="join-requests.php">'.$notificationDesc.'</a></li>';
				}
				else if($notificationStatus <= 1 && $notificationType == 2 && $request == 0) { // for ministry request notifs
					$view .= '<li><a href="ministries.php">'.$notificationDesc.'</a></li>';
				}
				else if($notificationStatus <= 1 && $notificationType == 3 && $request == 0) { // for ministry request notifs
					$view .= '<li><a href="view-event.php?id='.$eid.'">'.$notificationDesc.'</a></li>';
				}
				$view .= '<li class="divider"></li>';
			}
		}
		$count = allNotifCount();
		$data = array("view"=>$view, "count"=>$count);
		echo json_encode($data);
	}
?>