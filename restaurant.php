<?php
   require('session.php');

   function display_event()
{
  echo "Display Restaurants";
  echo "<br>";
  //echo $_SESSION['user'];
  //$db=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  global $db;
  if($db == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }else{
    //echo "okkk";
    echo "<br>";
  }
  $sql = "SELECT * FROM Restaurant";
  if($result = mysqli_query($db, $sql)){
      if(mysqli_num_rows($result) > 0){
          echo "<table>";
              echo "<tr>";
              //$db=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
                  echo "<th>Rest id</th>";
                  echo "<th>Name</th>";
                  echo "<th>Location</th>";
                  echo "<th>Quality</th>";
                  echo "<th>City id</th>";
              echo "</tr>";
          while($row = mysqli_fetch_array($result)){
              echo "<tr>";
                  echo "<td>" . $row['rest_id'] . "</td>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['location'] . "</td>";
                  echo "<td>" . $row['quality'] . "</td>";
                  echo "<td>" . $row['city_ID'] . "</td>";
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
     $rest_id = mysqli_real_escape_string($db,$_POST['rest_id']);
     $name = mysqli_real_escape_string($db,$_POST['name']);
     $location = mysqli_real_escape_string($db,$_POST['location']);
     $quality = mysqli_real_escape_string($db,$_POST['quality']);
     $city_ID = mysqli_real_escape_string($db,$_POST['city_ID']);
     $sql = "INSERT INTO Restaurant (rest_id,name,location,quality,visitedDate,city_ID)
     VALUES ('$rest_id','$name','$location','$quality','01-01-01','city_ID')";
     if(mysqli_query($db, $sql)){
      echo '<div class="alert alert-success"><strong>Success!</strong> </div>';
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }
  }
}

?>
<html>
<head>
   <title>Restaurants</title>
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

               <h1>Restaurant Page <?php echo $login_session; ?></h1>
               <form method="post">
                 <input type="submit" name="display" id="display" value="Display Restaurant" /><br/><br/>
                 <!--<input type="submit" name="create" id="create" value="Create Event" /><br/><br/>-->
                </form>
                 <form action = "" method = "post">
                    <label>Rest id       :</label><input type = "text" name = "rest_id" class = "box"/><br /><br />
                    <label>Name    :</label><input type = "text" name = "name" class = "box"/><br /><br />
                    <label>Location :</label><input type = "text" name = "location" class = "box" /><br/><br />
                    <label>Quality    :</label><input type = "text" name = "quality" class = "box"/><br /><br />
                    <label>City id :</label><input type = "text" name = "city_ID" class = "box" /><br/><br />
                    <input type = "submit" value = " Create Restaurant " name="create"/><br />
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
