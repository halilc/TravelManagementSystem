<?php
$servername = "localhost";
$username = "codegive_cng352";
$password = "caneren13?";
$dbname = "codegive_cng352";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user VALUES ('1','halilcan','halil@halil.com','533833','gunduz')";
$sql1 = "INSERT INTO user VALUES ('2','simge','simge@simge.com','533478','haksal')";
$sql2 = "INSERT INTO user VALUES ('3','testuser','test@test.com','533879','test')";

$sql3 = "INSERT INTO city VALUES ('1','ankara','turkey')";
$sql4 = "INSERT INTO city VALUES ('2','istanbul','turkey')";
$sql5 = "INSERT INTO city VALUES ('3','berlin','germany')";

$sql3 = "INSERT INTO Accommodation VALUES ('1','35353535','2018-05-09','2018-05-11','ankaraRoyal','100','4','1')";
$sql4 = "INSERT INTO Accommodation VALUES ('2','43353535','2018-05-09','2018-05-11','hiltonistanbul','150','3','2')";
$sql5 = "INSERT INTO Accommodation VALUES ('3','82382829','2018-05-09','2018-05-11','berlinplace','200','5','3')";

$sql6 = "INSERT INTO Event VALUES ('BluesConcert','2018-05-09','1','blues','100','bluePlace')";
$sql7 = "INSERT INTO Event VALUES ('Duman','2018-05-11','2','rock','50','jazzrock')";
$sql8 = "INSERT INTO Event VALUES ('Jimi','2018-05-21','3','jazz','130','bluePlace')";

$sql9 = "INSERT INTO Museum VALUES ('Cermodern','1','art')";
$sql10 = "INSERT INTO Museum VALUES ('FikirSanat','2','art')";
$sql11 = "INSERT INTO Museum VALUES ('BerlinNational','3','nature')";

$sql12 = "INSERT INTO Restaurant VALUES ('1','AnkaraKebap','141324243','3','2018-05-09','1')";
$sql13 = "INSERT INTO Restaurant VALUES ('2','KelleciKardesler','56745553','4','2018-05-09','2')";
$sql14 = "INSERT INTO Restaurant VALUES ('3','BerlinDöner','1425231243','5','2018-05-09','3')";

$sql27 = "INSERT INTO RestaurantVisited VALUES ('3','2','2018-05-09','1','1')";
$sql28 = "INSERT INTO RestaurantVisited VALUES ('4','3','2018-05-09','2','2')";
$sql29 = "INSERT INTO ResidenceStayed VALUES ('5','4','2018-05-09','3','3')";

$sql30 = "UPDATE user SET name='halil' AND telephone='05838' WHERE user_id=1";
$sql31 = "UPDATE user SET email='simge@gmail.com' WHERE name='simge'";
$sql32 = "UPDATE Event SET price=price+150 WHERE title='Duman'";

$sql33 = "DELETE FROM user WHERE id =1";
$sql34 = "DELETE FROM Event WHERE date>2017 AND date<2019";
$sql35= "DELETE FROM Museum WHERE typeOfMuseum='art'";


$sql36= "SELECT user_id,name,email FROM user";

//OTHER QUERİES

$sql37= "SELECT * FROM travel WHERE rate > 3"; //List all travels which are ranked as top 10.
$sql38= "SELECT * FROM travel ORDER BY start_Date"; //List all travels according to their dates
$sql39= "SELECT * FROM square WHERE crowdedness = 5"; //Filter all squares which the crowded rate is 5.
$sql40= "SELECT name FROM square WHERE crowdedness = 5"; //Filter all squares which the crowded rate is 5.
$sql41= "SELECT * FROM (SELECT * FROM Accommodation ORDER BY price DESC LIMIT 3) sub ORDER BY price"; //Filter last 3 hotels according to their price.



//PRINTING SELECT QUERY AS A EXAMPLE
$result = $conn->query($sql36);
if ($result->num_rows > 0) {
    // Printing Select Result
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["user_id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}


$conn->close();
?>



