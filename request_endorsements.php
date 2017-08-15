<?php
	// 
	if(isset($_POST['id'])) {
		// example of json encode, returning an array
		 $array = array('a'=>'a','b'=>'b');
		 echo json_encode($array);
	}

	if(isset($_GET['approve'])) {
		// update the database
	}
?>