<?php
	include("session.php");
	include("globalfunctions.php");

	if(isset($_POST["id"])) {
		// database connection variables
		$id = $_POST["id"];
		$table = "";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// insert code set notificationStatus = 1 when user clicks notification area
		$query = "SELECT CONCAT_WS(' ', firstName, lastName) AS fullname FROM ministryparticipation_tbl JOIN ministrydetails_tbl ON ministryparticipation_tbl.ministryID = ministrydetails_tbl.ministryID JOIN member_tbl ON ministryparticipation_tbl.memberID = member_tbl.memberID WHERE ministrydetails_tbl.ministryID = $id";

		$lquery = "SELECT CONCAT_WS(' ', firstName, lastName) AS leader FROM ministrydetails_tbl INNER JOIN member_tbl ON ministryHeadID = memberID WHERE ministryID = $id";

		$table .= '
		<tr> <!-- only 4 table data cells for balanced layout then add another row -->
		';

		$lresult = mysqli_query($conn, $lquery);
		
		if(mysqli_num_rows($lresult) > 0) {
			while($lrow = mysqli_fetch_assoc($lresult)) {
				$leader = $lrow["leader"];
				$table .= '
		<td>
			<a class="ministry-names"><i class="material-icons prefix-leader ministry-icons">person</i><br>'.$leader.'<br><br><label>LEADER</label></a>
		</td>
				';
			}
		}
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0) {
			$counter_row = 1;
			while($row = mysqli_fetch_assoc($result)) {
				$fullname = $row["fullname"];
				$table .= '
			<td>
				<a class="ministry-names"><i class="material-icons prefix ministry-icons">person</i><br>'.$fullname.'</a>
			</td>
				';
				$counter_row++;
				if($counter_row == 4) {
					$table .= '
		</tr>
		<tr>
					';
					$counter_row = 0;
				}
			}
			$table .= '
		</tr>';
		}

		echo $table;
		mysqli_close($conn);
	}
?>