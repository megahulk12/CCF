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

		// notifications

		// notificationStatus: 0 implies not read, 1 implies already read
		// notificationType: 
		// 0 = endorsement; 1 = event; 2 = ministry;
		$notificationDesc = $_SESSION['firstName']." ".$_SESSION['lastName']." is requesting for your approval to be a Dgroup Leader";
		$sql_notifications = "INSERT INTO notifications_tbl(memberID, receivermemberID, requestdgmemberID, endorsementID, notificationDesc, notificationStatus, notificationType, request) VALUES(".$_SESSION['userid'].", ".getDgroupLeaderID($_SESSION['userid']).", ".$_SESSION['dgroupmemberID'].", ".getEndorsementID().", '$notificationDesc', 0, 0, 1);";
		mysqli_query($conn, $sql_notifications);
	}
?>

<?php
	// database connection variables
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dbccf";
	if(isset($_POST['submit'])) {
		$baptismaldate = date("Y-m-d", strtotime($_POST["BaptismalDate"]));
		$baptismalplace = $_POST["BaptismalPlace"];
		$dgrouptype = $_POST["DgroupType"];
		if($dgrouptype=="Youth") $dgrouptype = 0;
		else if($dgrouptype=="Singles") $dgrouptype = 1;
		else if($dgrouptype=="Single_Parents") $dgrouptype = 2;
		else if($dgrouptype=="Married") $dgrouptype = 3;
		else if($dgrouptype=="Couples") $dgrouptype = 4;
		$agebracket = $_POST["AgeBracket"];
		$meetingday = $_POST["MeetingDay"];
		$meetingplace = $_POST["MeetingPlace"];
		$time1 = date("H:i:s", strtotime($_POST["timepicker1opt1"]));
		$time2 = date("H:i:s", strtotime($_POST["timepicker1opt2"]));
		$dateendorsed = date("Y-m-d");

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_endorsement = "UPDATE endorsement_tbl SET baptismalDate = '$baptismaldate', baptismalPlace = '$baptismalplace', ageBracket = '$agebracket', eschedDay = '$meetingday', eschedStartTime = '$time1', eschedEndTime = '$time2', eschedPlace = '$meetingplace', edgleader = ".$_SESSION['userid'].", edgroupType = $dgroupType, dateEndorsed = '$dateendorsed' WHERE endorsementID = ".getDgEndorsementID(getDgroupMemberID($_SESSION['userid']));
		/*
		$sql_sched = "INSERT INTO scheduledmeeting_tbl(schedDay, schedStartTime, schedEndTime, schedType, schedPlace) VALUES('$meetingday', '$time1', '$time2', 0, '$meetingplace');";
		$sql_dgroup = "INSERT INTO discipleshipgroup_tbl(schedID, dgendorsementID, dgleader, dgroupType) VALUES(".getSchedID().", ".getDgEndorsementID(getDgroupMemberID($_SESSION['userid'])).", ".$_SESSION['userid'].", $dgroupType);";
		*/
		$sql_notifications = "";
		mysqli_query($conn, $sql_endorsement);
		/*
		mysqli_query($conn, $sql_sched);
		mysqli_query($conn, $sql_dgroup);
		*/
		mysqli_close($conn);
	}
?>