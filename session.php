<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['user'];
   
   $ses_sql = mysqli_query($db,"SELECT memberID, username, password FROM member_tbl WHERE username = '$user_check';");
   $sql_companyID = mysqli_query($db,"SELECT companyID FROM member_tbl WHERE username = '$user_check';");
   $sql_schoolID = mysqli_query($db,"SELECT schoolID FROM member_tbl WHERE username = '$user_check';");
   $sql_spouseID = mysqli_query($db,"SELECT spouseID FROM member_tbl WHERE username = '$user_check';");
   $sql_prefID = mysqli_query($db,"SELECT prefID FROM member_tbl WHERE username = '$user_check';");
   
   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
   $row_company = mysqli_fetch_array($sql_companyID, MYSQLI_ASSOC);
   $row_school = mysqli_fetch_array($sql_schoolID, MYSQLI_ASSOC);
   $row_spouse = mysqli_fetch_array($sql_spouseID, MYSQLI_ASSOC);
   $row_pref = mysqli_fetch_array($sql_prefID, MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $_SESSION['userid'] = $row['memberID']; //userID is memberID
   $_SESSION['companyID'] = $row_company['companyID'];
   $_SESSION['schoolID'] = $row_school['schoolID'];
   $_SESSION['spouseID'] = $row_spouse['spouseID'];
   $_SESSION['prefID'] = $row_pref['prefID'];
   $_SESSION['username'] = $row['username'];
   $_SESSION['active'] = true;
   
   if(!isset($_SESSION['user'])){
      header("Location: login.php");
   }
?>