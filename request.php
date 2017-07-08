<?php
	include('session.php');
	include('globalfunctions.php');
?>
<?php
	if(isset($_GET["apr"])) {
		if($_GET["apr"] == "y" && getNotificationSuccess() == 0) {
			// database connection variables
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "dbccf";

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql_pass = "UPDATE endorsement_tbl INNER JOIN notifications_tbl ON endorsement_tbl.dgmemberID = notifications_tbl.requestdgmemberID SET endorsementStatus = 1 WHERE dgmemberID = ".getRequestDgMemberID();
			mysqli_query($conn, $sql_pass);

			$sql_notificationtype = "UPDATE notifications_tbl SET notificationStatus = 2 WHERE receivermemberID = ".$_SESSION['userid'];
			mysqli_query($conn, $sql_notificationtype);

			$notificationDesc = $_SESSION['firstName']." ".$_SESSION['lastName']." has approved your request to be a Dgroup Leader";
			$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, endorsementID, notificationDesc, notificationStatus, notificationType) VALUES(".$_SESSION['userid'].", ".getMemberIDFromDgroupMembers(getRequestDgMemberID()).", ".getDgEndorsementID(getRequestDgMemberID()).", '$notificationDesc', 0, 0);";
			mysqli_query($conn, $sql_notifications);
		}
		else if($_GET["apr"] == "n" && getNotificationSuccess() == 0) {
			// database connection variables
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "dbccf";

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql_pass = "UPDATE endorsement_tbl INNER JOIN notifications_tbl ON endorsement_tbl.dgmemberID = notifications_tbl.requestdgmemberID SET endorsementStatus = 3 WHERE dgmemberID = ".getRequestDgMemberID();
			mysqli_query($conn, $sql_pass); //sets endorsement request status as rejected/reconsideration

			$sql_notificationtype = "UPDATE notifications_tbl SET notificationStatus = 2 WHERE receivermemberID = ".$_SESSION['userid'];
			mysqli_query($conn, $sql_notificationtype); // sets notification as already completed

			$notificationDesc = $_SESSION['firstName']." ".$_SESSION['lastName']." has disapproved your request to be a Dgroup Leader";
			$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, endorsementID, notificationDesc, notificationStatus, notificationType) VALUES(".$_SESSION['userid'].", ".getMemberIDFromDgroupMembers(getRequestDgMemberID()).", ".getDgEndorsementID(getRequestDgMemberID()).", '$notificationDesc', 0, 0);";
			mysqli_query($conn, $sql_notifications);
		}
	}
?>
<?php
	// <!-- this section is for notification approval of requests -->
	if(isset($_GET['apr'])) {
		if($_GET['apr'] == 'y' && getNotificationSuccess() == 0) {
			echo '
			<script> //reminder: reload
				swal({
						title: "Approved!",
						text: "You have approved this request.",
						type: "success"
					});
			</script>
			';
			setNotificationSuccess();
		}
	}

	if(isset($_GET['apr'])) {
		if($_GET['apr'] == 'n' && getNotificationSuccess() == 0) {
			echo '
			<script> //reminder: reload
				swal({
						title: "disapproved!",
						text: "You have disapproved this request.",
						type: "error"
					});
			</script>
			';
			setNotificationSuccess();
		}
	}
?>