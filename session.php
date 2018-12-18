<?php
   include('config.php');
   session_start();

   $user_check = $_SESSION['user'];
   //echo $user_check;
   $ses_sql = mysqli_query($db,"select user_id from user where name = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];

   if(!isset($_SESSION['user'])){
      header("location:login.php");
   }
?>
