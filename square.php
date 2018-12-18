<?php
   require('session.php');

   function display_event()
{
  echo "Display Events";
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
  $sql = "SELECT * FROM Square";
  if($result = mysqli_query($db, $sql)){
      if(mysqli_num_rows($result) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Name</th>";
                  echo "<th>Crowdedness</th>";
                  echo "<th>City</th>";
              echo "</tr>";
          while($row = mysqli_fetch_array($result)){
              echo "<tr>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['crowdedness'] . "</td>";
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
     $name = mysqli_real_escape_string($db,$_POST['name']);
     $crawdedness = mysqli_real_escape_string($db,$_POST['crowdedness']);
     $city_id = mysqli_real_escape_string($db,$_POST['city']);
     $sql = "INSERT INTO Square (name,crowdedness,city_ID)
     VALUES ('$name','$crawdedness','$city_id')";
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
   <title>Squares</title>
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

               <h1>Square Page <?php echo $login_session; ?></h1>
               <form method="post">
                 <input type="submit" name="display" id="display" value="Display Squares" /><br/><br/>
                 <!--<input type="submit" name="create" id="create" value="Create Event" /><br/><br/>-->
                </form>
                 <form action = "" method = "post">
                    <label>Name       :</label><input type = "text" name = "name" class = "box"/><br /><br />
                    <label>Crawdedness    :</label><input type = "text" name = "crowdedness" class = "box"/><br /><br />
                      <label>City    :</label><input type = "text" name = "city" class = "box"/><br /><br />
                    <input type = "submit" value = " Create Square " name="create"/><br />
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
