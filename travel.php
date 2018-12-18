<?php
   require('session.php');
   function display_square()
  {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      global $db;
      echo "Display Squares";
      echo "<br>";
      $user = $_SESSION['user'];
      $travel_id = $_POST['travel_id'];
      if($db == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
      }else{
        //echo "okkk";
        echo "<br>";
      }
      //SELECT name from travel,RestaurantVisited,Restaurant WHERE travel.travel_id = 5 and travel.travel_id = RestaurantVisited.travel_id_inc and RestaurantVisited.rest_id_inc = Restaurant.rest_id
      $sql2 = "SELECT name FROM travel,SquareVisited,Square WHERE travel.travel_id='$travel_id' and travel.travel_id = SquareVisited.travelEventID and SquareVisited.squareName = Square.name";
      if($result = mysqli_query($db, $sql2)){
          if(mysqli_num_rows($result) > 0){
              echo "<table>";
                  echo "<tr>";
                      echo "<th>Square Name</th>";
                  echo "</tr>";
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['name'] . "</td>";
                  echo "</tr>";
              }
              echo "</table>";
              // Free result set
              mysqli_free_result($result);
          } else{
              echo "No records matching your query were found.";}
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);}
    }
  }
   function display_hotel()
  {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      global $db;
      echo "Display Hotels";
      echo "<br>";
      $user = $_SESSION['user'];
      $travel_id = $_POST['travel_id'];
      if($db == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
      }else{
        //echo "okkk";
        echo "<br>";
      }
      //SELECT name from travel,RestaurantVisited,Restaurant WHERE travel.travel_id = 5 and travel.travel_id = RestaurantVisited.travel_id_inc and RestaurantVisited.rest_id_inc = Restaurant.rest_id
      $sql2 = "SELECT hotelName FROM travel,Accommodation,ResidenceStayed WHERE travel.travel_id='$travel_id' and travel.travel_id = ResidenceStayed.travelEventID and ResidenceStayed.hotel_id = Accommodation.hotel_id";
      if($result = mysqli_query($db, $sql2)){
          if(mysqli_num_rows($result) > 0){
              echo "<table>";
                  echo "<tr>";
                      echo "<th>Hotel Name</th>";
                  echo "</tr>";
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['hotelName'] . "</td>";
                  echo "</tr>";
              }
              echo "</table>";
              // Free result set
              mysqli_free_result($result);
          } else{
              echo "No records matching your query were found.";}
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);}
    }
  }

   function display_event2()
  {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      global $db;
      echo "Display Event";
      echo "<br>";
      $user = $_SESSION['user'];
      $travel_id = $_POST['travel_id'];
      if($db == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
      }else{
        //echo "okkk";
        echo "<br>";
      }
      //SELECT name from travel,RestaurantVisited,Restaurant WHERE travel.travel_id = 5 and travel.travel_id = RestaurantVisited.travel_id_inc and RestaurantVisited.rest_id_inc = Restaurant.rest_id
      $sql2 = "SELECT title FROM travel,EventAttended,Event WHERE travel.travel_id='$travel_id' and travel.travel_id = EventAttended.travelEventID and EventAttended.eventTitle = Event.title ";
      if($result = mysqli_query($db, $sql2)){
          if(mysqli_num_rows($result) > 0){
              echo "<table>";
                  echo "<tr>";
                      echo "<th>Event Name</th>";
                  echo "</tr>";
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['title'] . "</td>";
                  echo "</tr>";
              }
              echo "</table>";
              // Free result set
              mysqli_free_result($result);
          } else{
              echo "No records matching your query were found.";}
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);}
    }
  }
   function display_museum()
  {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      global $db;
      echo "Display Museum";
      echo "<br>";
      $user = $_SESSION['user'];
      $travel_id = $_POST['travel_id'];
      if($db == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
      }else{
        //echo "okkk";
        echo "<br>";
      }
      $sql = "SELECT user_id FROM user WHERE user.name='$user'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($result);
      $userid = $row['user_id'];
      //SELECT name from travel,RestaurantVisited,Restaurant WHERE travel.travel_id = 5 and travel.travel_id = RestaurantVisited.travel_id_inc and RestaurantVisited.rest_id_inc = Restaurant.rest_id
      $sql2 = "SELECT name FROM travel,MuseumVisited2,Museum WHERE travel.travel_id='$travel_id' and travel.travel_id = MuseumVisited2.travelMuseumID and MuseumVisited2.museumName = Museum.name ";
      if($result = mysqli_query($db, $sql2)){
          if(mysqli_num_rows($result) > 0){
              echo "<table>";
                  echo "<tr>";
                      echo "<th>Museum Name</th>";
                  echo "</tr>";
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['name'] . "</td>";
                  echo "</tr>";
              }
              echo "</table>";
              // Free result set
              mysqli_free_result($result);
          } else{
              echo "No records matching your query were found.";}
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);}
    }
  }
   function display_rest()
  {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      global $db;
      echo "Display Restaurants";
      echo "<br>";
      $user = $_SESSION['user'];
      $travel_id = $_POST['travel_id'];
      if($db == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
      }else{
        //echo "okkk";
        echo "<br>";
      }
      $sql = "SELECT user_id FROM user WHERE user.name='$user'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($result);
      $userid = $row['user_id'];
      //SELECT name from travel,RestaurantVisited,Restaurant WHERE travel.travel_id = 5 and travel.travel_id = RestaurantVisited.travel_id_inc and RestaurantVisited.rest_id_inc = Restaurant.rest_id
      $sql2 = "SELECT name FROM travel,RestaurantVisited,Restaurant WHERE travel.travel_id='$travel_id' and travel.travel_id = RestaurantVisited.travel_id_inc and RestaurantVisited.rest_id_inc = Restaurant.rest_id ";
      if($result = mysqli_query($db, $sql2)){
          if(mysqli_num_rows($result) > 0){
              echo "<table>";
                  echo "<tr>";
                      echo "<th>Restaurant Name</th>";
                  echo "</tr>";
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['name'] . "</td>";
                  echo "</tr>";
              }
              echo "</table>";
              // Free result set
              mysqli_free_result($result);
          } else{
              echo "No records matching your query were found.";}
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);}
    }
  }

  function display_event()
  {
  //echo $_SESSION['user'];
    echo "Display My Travels";
    echo "<br>";
    $user = $_SESSION['user'];
    //$db=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    global $db;
    if($db == false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }else{
      //echo "okkk";
      echo "<br>";
    }
    $sql = "SELECT * FROM travel,user WHERE travel.user_ID = user.user_id and user.name = '$user' ";
    //$sql = "SELECT * FROM travel";
    if($result = mysqli_query($db, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table>";
                echo "<tr>";
                    echo "<th>Travel id</th>";
                    echo "<th>City id</th>";
                    echo "<th>Type</th>";
                    echo "<th>Start Date</th>";
                    echo "<th>End Date</th>";
                    echo "<th>Rate</th>";

                echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>" . $row['travel_id'] . "</td>";
                    echo "<td>" . $row['city_ID'] . "</td>";
                    echo "<td>" . $row['typeOfTravel'] . "</td>";
                    echo "<td>" . $row['start_Date'] . "</td>";
                    echo "<td>" . $row['end_date'] . "</td>";
                    echo "<td>" . $row['rate'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";}
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);}
}


if(array_key_exists('create',$_POST)){
   create_event();
}
function create_event(){
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    global $db;
     // username and password sent from form
     //$db=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     $user = $_SESSION['user'];
     $sql2 = "SELECT user_id FROM user WHERE user.name='$user'";
     $result = mysqli_query($db, $sql2);
     $row = mysqli_fetch_array($result);
     $userid = $row['user_id'];

     $city_id = mysqli_real_escape_string($db,$_POST['city_id']);
     $location = mysqli_real_escape_string($db,$_POST['location']);
     $type = mysqli_real_escape_string($db,$_POST['type']);
     $s_date = mysqli_real_escape_string($db,$_POST['s_date']);
     $e_date = mysqli_real_escape_string($db,$_POST['e_date']);
     $rate= mysqli_real_escape_string($db,$_POST['rate']);
     $sql = "INSERT INTO travel (travel_id,city_ID,user_ID,location,typeOfTravel,start_Date,end_date,rate)
     VALUES (DEFAULT,'$city_id','$userid','$location','$type','$s_date','$e_date','$rate')";
     if(mysqli_query($db, $sql)){
      echo '<div class="alert alert-success"><strong>Success!</strong> </div>';
      
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }
  }
}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<html>
<head>
   <title>My Travels</title>
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
      <div style = "width:800px; border: solid 1px #333333; " align = "left">
         <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b></b></div>
         <div style = "margin:30px">
                <?php if(array_key_exists('display',$_POST)){
                   display_event();
                }
                ?>
                <?php if(array_key_exists('display_rest',$_POST)){
                   display_rest();
                }
                ?>
                <?php if(array_key_exists('display_museum',$_POST)){
                   display_museum();
                }
                ?>
                <?php if(array_key_exists('display_event',$_POST)){
                   display_event2();
                }
                ?>
                <?php if(array_key_exists('display_hotel',$_POST)){
                   display_hotel();
                }
                ?>
                <?php if(array_key_exists('display_square',$_POST)){
                   display_square();
                }
                ?>
               <h1>Travel Page <?php echo $login_session; ?></h1>
               <form method="post">
                 <input type="submit" name="display" id="display" value="Display My Travels" /><br/><br/>
                </form>
                <form action = "" method = "post">
                   <label>Travel id    :</label><input type = "text" name = "travel_id" class = "box"/><br /><br />
                   <!--<button type="button" id="display_rest" name="display_rest" class="btn btn-primary">Display Restaurant</button>-->
                   <input type = "submit" value = " Display Restaurant " name="display_rest" class="btn btn-primary"/><br />
                </form>
                <form action = "" method = "post">
                   <label>Travel id    :</label><input type = "text" name = "travel_id" class = "box"/><br /><br />
                   <input type = "submit" value = " Display Museums " name="display_museum" class="btn btn-success"/><br />
                </form>
                <form action = "" method = "post">
                   <label>Travel id    :</label><input type = "text" name = "travel_id" class = "box"/><br /><br />
                   <input type = "submit" value = " Display Events " name="display_event" class="btn btn-warning"/><br />
                </form>
                <form action = "" method = "post">
                   <label>Travel id    :</label><input type = "text" name = "travel_id" class = "box"/><br /><br />
                   <input type = "submit" value = " Display Hotels " name="display_hotel" class="btn btn-danger"/><br />
                </form>
                <form action = "" method = "post">
                   <label>Travel id    :</label><input type = "text" name = "travel_id" class = "box"/><br /><br />
                   <input type = "submit" value = " Display Squares " name="display_square" class="btn btn-default"/><br />
                </form>
                 <form action = "" method = "post">
                    <label>City id    :</label><input type = "text" name = "city_id" class = "box"/><br /><br />
                    <label>Location :</label><input type = "text" name = "location" class = "box" /><br/><br />
                    <label>Type      :</label><input type = "text" name = "type" class = "box"/><br /><br />
                    <label>Start Date      :</label><input type = "text" name = "s_date" class = "box" /><br/><br />
                    <label>End Date      :</label><input type = "text" name = "e_date" class = "box" /><br/><br />
                    <label>Rate      :</label><input type = "text" name = "rate" class = "box" /><br/><br />
                    <input type = "submit" value = " Create travel " name="create"/><br />
                 </form>


                <!--  <button id="btnfun1" name="btnfun1" onClick='events.href="?button1=1"'>Display Events </button><br/><br/>
                  <button id="btnfun2" name="btnfun2" onClick='events.href="?button2=1"'>Create Events</button> -->

               <h2><a href = "logout.php">Sign Out</a></h2>

               <!--<a class="button" type = "submit" target="_blank">Display Events</a><br />
               //<a class="button" type = "submit" href="events.php" target="_blank">Create Events</a><br /><br />
             -->
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>

         </div>

      </div>

   </div>

</body>



</html>
