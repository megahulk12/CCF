<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['user'];
   
   $ses_sql = mysqli_query($db,"SELECT memberID, username, password FROM member_tbl WHERE username = '$user_check';");
   
   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $_SESSION['userid'] = $row['memberID'];
   $_SESSION['username'] = $row['username'];
   $_SESSION['active'] = true;
   
   if(!isset($_SESSION['user'])){
      header("Location: login.php");
   }
?>