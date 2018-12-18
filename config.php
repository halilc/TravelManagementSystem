<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'codegive_cng352');
   define('DB_PASSWORD', 'caneren13?');
   define('DB_DATABASE', 'codegive_cng352');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
   }else{
     //echo  "ok";
   }
?>
