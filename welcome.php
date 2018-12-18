<?php
   include('session.php');
   function admin_check()
{
  $user = $_SESSION['user'];
  if($user =='halilcan'){
    echo   '<a class="button" id="city" type = "submit" href="city.php" target="_blank">Cities</a></br></br>';
  }
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("p").hide();
    });
    $("#show").click(function(){
        $("p").show();
    });
});
</script>
<html>
<head>
   <title>Welcome</title>
   <style type = "text/css">
      body {
         font-family:Arial, Helvetica, sans-serif;
         font-size:14px;
      }
      label {
         font-weight:bold;
         width:100px;
         font-size:14px;
      }
      .box {
         border:#666666 solid 1px;
      }
   </style>
</head>
<body bgcolor = "#FFFFFF">
   <div align = "center">
      <div style = "width:300px; border: solid 1px #333333; " align = "left">
         <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b></b></div>
         <div style = "margin:30px">
               <h1>Welcome <?php echo $login_session; ?></h1>
               <h2><a href = "logout.php">Sign Out</a></h2>
               <a class="button" type = "submit" href="events.php" target="_blank">Events</a></br></br>
              <a class="button" type = "submit" href="museum.php" target="_blank">Museums</a></br></br>
              <a class="button" type = "submit" href="hotel.php" target="_blank">Hotels</a></br></br>
              <a class="button" type = "submit" href="square.php" target="_blank">Squares</a></br></br>
              <a class="button" type = "submit" href="restaurant.php" target="_blank">Restaurants</a></br></br>
              <a class="button" type = "submit" href="travel.php" target="_blank">My Travels</a></br></br>
              <?php admin_check(); ?>

            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

         </div>

      </div>

   </div>

</body>



</html>
