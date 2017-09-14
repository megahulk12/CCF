<?php
	if(isset($_SESSION['userid'])) {
		if($_SESSION["memberType"] > 0 && $_SESSION["memberType"] <= 4) {
			echo '
			<li class="divider"></li>
			<li><a href="dgroup.php"><i class="material-icons prefix>">group</i>Dgroup</a></li>
			<li class="divider"></li>
			<li><a href="ministry.php"><i class="material-icons prefix>">people</i>Ministry</a></li>
			';
	  	if($_SESSION["memberType"] >= 2 ) {
	  		echo '
			<li class="divider"></li>
	  		<li><a href="endorsements.php"><i class="material-icons prefix>">library_books</i>Endorsement Forms</a></li>';
		  	if(checkIfD12Leader())
		  		echo '
		  	<li class="divider"></li>
		  	<li><a href="propose-ministry.php"><i class="material-icons prefix>">group_add</i>Propose Ministry</a></li>
	  		<li class="divider"></li>
		  	<li><a href="proposed-ministries.php"><i class="material-icons prefix>">library_books</i>Proposed Ministries</a></li>
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
	  		<li class="divider"></li>
		  	<li><a href="approved-ministries.php"><i class="material-icons prefix>">library_books</i>Approved Ministries</a></li>
	  		<li class="divider"></li>
		  	<li><a href="join-requests.php"><i class="material-icons prefix>">assignment_turned_in</i>Join Requests</a></li>
	  		<li class="divider"></li>
		  	<li><a href="ministry-summary-reports.php"><i class="material-icons prefix>">library_books</i>Ministry Summaries</a></li>
		  		';
		}
		if($_SESSION["memberType"] == 5)
			echo '
			<li class="divider"></li>
			<li><a href="manage-accounts.php"><i class="material-icons prefix>">supervisor_account</i>Manage Accounts</a></li>
			<li class="divider"></li>
	  		<li><a href="quarterlyreports.php"><i class="material-icons prefix>">library_books</i>Quarterly Reports</a></li>
			<li class="divider"></li>
	  		<li><a href="event-requests.php"><i class="material-icons prefix>">assignment_turned_in</i>Event Requests</a></li>
			<li class="divider"></li>
	  		<li><a href="ministry-requests.php"><i class="material-icons prefix>">assignment_turned_in</i>Ministry Requests</a></li>
			';
	}
?>