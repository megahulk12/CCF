<?php
	function widthRow($rownumber) {
	      return 100/$rownumber;
	}

	function getID($id, $table) {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT $id FROM $table ORDER BY $id DESC LIMIT 1";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$resultID = $row["$id"];
			}
		}
		return $resultID;
	}

	function getDgroupMemberID($memberID) {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT dgroupmemberID FROM discipleshipgroupmembers_tbl WHERE memberID = $memberID";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$dgmemberID = $row["dgroupmemberID"];
			}
		}
		return $dgmemberID;
	}

	function getDgroupLeaderID($memberID) {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT dgleader FROM discipleshipgroupmembers_tbl INNER JOIN discipleshipgroup_tbl ON discipleshipgroupmembers_tbl.dgroupID = discipleshipgroup_tbl.dgroupID WHERE memberID = $memberID";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$dgleader = $row["dgleader"];
			}
		}
		return $dgleader;
	}

	function getDgroupID() {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT dgroupID FROM discipleshipgroupmembers_tbl WHERE dgroupmemberID = ".getDgroupMemberID($_SESSION['userid']);
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$dgroupID = $row["dgroupID"];
			}
		}
		return $dgroupID;
	}

	function getNotificationDesc($memberID) {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT notificationDesc FROM notification_tbl INNER JOIN member_tbl ON notification_tbl.memberID = member_tbl.memberID WHERE notification_tbl.memberID = ".$memberID;
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$notificationDesc = $row["notificationDesc"];
			}
		}
		return $notificationDesc;
	}

	function getNotificationType($memberID) {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT notificationType FROM notification_tbl INNER JOIN member_tbl ON notification_tbl.memberID = member_tbl.memberID WHERE notification_tbl.memberID = ".$memberID;
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$notificationType = $row["notificationType"];
			}
		}
		return $notificationType;
	}

	function getEndorsementID() {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_endorsement = "SELECT endorsementID FROM endorsement_tbl ORDER BY endorsementID DESC LIMIT 1";
		$result = mysqli_query($conn, $sql_endorsement);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$endorsementID = $row["endorsementID"];
			}
		}
		return $endorsementID;
	}

	function getEndorsementStatus($dgmemberID) {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_endorsement = "SELECT endorsementStatus FROM endorsement_tbl WHERE dgmemberID = $dgmemberID";
		$result = mysqli_query($conn, $sql_endorsement);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$endorsementStatus = $row["endorsementStatus"];
			}
		}
		return $endorsementStatus;
	}

	function getDgEndorsementID($dgmemberID) { // gets endorsementID using dgmemberID
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql_endorsement = "SELECT endorsementID FROM endorsement_tbl WHERE dgmemberID = $dgmemberID";
		$result = mysqli_query($conn, $sql_endorsement);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$endorsementID = $row["endorsementID"];
			}
		}
		return $endorsementID;
	}

	function getRequestDgMemberID() {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT requestdgmemberID FROM notifications_tbl WHERE receivermemberID = ".$_SESSION['userid'];
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$requestdgmemberID = $row["requestdgmemberID"];
			}
		}
		return $requestdgmemberID;
	}

	function getMemberIDFromDgroupMembers($dgmemberID) { // gets memberID using dgmemberID
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT memberID FROM discipleshipgroupmembers_tbl WHERE dgroupmemberID = $dgmemberID";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$memberID = $row["memberID"];
			}
		}
		return $memberID;
	}

	function setNotificationSuccess() {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "UPDATE notifications_tbl SET success = 1 WHERE receivermemberID = ".$_SESSION['userid'];
		$result = mysqli_query($conn, $query);
	}

	function getNotificationSuccess() {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT success FROM notifications_tbl WHERE receivermemberID = ".$_SESSION['userid'];
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$success = $row["success"];
			}
		}
		return $success;
	}

	function getSchedID() {
		// database connection variables

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT schedID FROM scheduledmeeting_tbl ORDER BY schedID DESC LIMIT 1";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$schedID = $row["schedID"];
			}
		}
		return $schedID;
	}

	function notifCount(){
		// <!---------------------------------code ni paolo------------------------------------>
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// insert code set notificationStatus = 1 when user clicks notification area
		$query = "SELECT count(notificationID) AS count FROM notifications_tbl WHERE notificationStatus = 0 AND (receivermemberID = ".$_SESSION['userid'].");" ;
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				//$receivermemberID = $row['receivermemberID']; testing muna ito
				$count = $row['count'];
			}
		}
		// <!----------------------------------------THE END-------------------------------------->
		return $count;
	}
	function allNotifCount(){
		// <!---------------------------------code ni paolo------------------------------------>
		include_once('session.php');
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// insert code set notificationStatus = 1 when user clicks notification area
		$query = "SELECT count(notificationID) AS count FROM notifications_tbl WHERE notificationStatus = 1 AND (receivermemberID = ".$_SESSION['userid'].");" ;
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				//$receivermemberID = $row['receivermemberID']; testing muna ito
				$count = $row['count'];
			}
		}
		// <!----------------------------------------THE END-------------------------------------->
		return $count;
	}
	
	function getNotificationStatus() {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$status = "";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// insert code set notificationStatus = 1 when user clicks notification area
		$query = "SELECT notificationStatus AS status FROM notifications_tbl WHERE receivermemberID = ".$_SESSION['userid'].";" ;
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				//$receivermemberID = $row['receivermemberID']; testing muna ito
				$status = $row['status'];
			}
		}
		return $status;
	}

	if(isset($_POST['seen'])) {
		include_once('session.php'); // this function requires a session call because it is external from the session itself
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// insert code set notificationStatus = 1 when user clicks notification area
		$query = "UPDATE notifications_tbl SET notificationStatus = 1 WHERE receivermemberID = ".$_SESSION['userid'].";" ;
		$result = mysqli_query($conn, $query);
	}

	function getCurrentBudgetID() {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT budgetID FROM budgetdetails_tbl ORDER BY budgetID DESC LIMIT 1;";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$budgetID = $row["budgetID"];
			}
		}
		return $budgetID;
	}

	function getBudgetID($eventID) {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT budgetID FROM eventdetails_tbl WHERE eventID = $eventID;";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$budgetID = $row["budgetID"];
			}
		}
		return $budgetID;
	}

	function getCurrentEventID() {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT eventID FROM eventdetails_tbl ORDER BY eventID DESC LIMIT 1;";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$eventID = $row["eventID"];
			}
		}
		return $eventID;
	}

	function getEventHeadID($eid) {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT eventHeadID FROM eventdetails_tbl WHERE eventID = $eid;";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$eventHeadID = $row["eventHeadID"];
			}
		}
		return $eventHeadID;
	}

	function getEventName($eid) {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT eventName FROM eventdetails_tbl WHERE eventID = $eid;";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$eventName = $row["eventName"];
			}
		}
		return $eventName;
	}

	function setSeenEventRequest($eid) { //  for new event notif purposes
		include_once('session.php'); // this function requires a session call because it is external from the session itself
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// insert code set notificationStatus = 1 when user clicks notification area
		$query = "UPDATE notifications_tbl SET notificationStatus = 1 WHERE eventID = $eid AND receivermemberID = ".$_SESSION['userid'].";" ;
		$result = mysqli_query($conn, $query);
	}

	function escapeString($string) {
		$string = mysqli_real_escape_string($string);
		return $string;
	}

	function getCurrentEventParticipationID() {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT eventParticipationID FROM eventparticipation_tbl ORDER BY eventParticipationID DESC LIMIT 1";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$value = $row["eventParticipationID"];
			}
		}
		return $value;
	}

	function getMemberIDFromEventPart($epartid) {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT memberID FROM eventparticipation_tbl WHERE eventParticipationID = $epartid;";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$value = $row["memberID"];
			}
		}
		return $value;
	}

	function getEventIDFromEventPart($epartid) {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT eventID FROM eventparticipation_tbl WHERE eventParticipationID = $epartid;";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$value = $row["eventID"];
			}
		}
		return $value;
	}

	function countEventParticipationForMember($membID) {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dbccf";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT count(eventParticipationID) AS participation FROM eventparticipation_tbl WHERE memberID = $membID;";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$value = $row["participation"];
			}
		}
		return $value;
	}

	function countNewLines($string) {
		return substr_count($string, '\n');
	}
?>