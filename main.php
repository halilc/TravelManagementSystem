<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<style>
.content {
    max-width: 500px;
    margin: auto;
    text-align : center;
    margin-top : 250px;
}
</style>

</head>
<body>
<div class="content">
<?php

if(@$_POST) {
    ini_set("soap.wsdl_cache_enabled", "0");
    try {
    $istek = new SoapClient('http://cng453-env-2.jk3qkkiaju.us-east-1.elasticbeanstalk.com/Calculator?wsdl');
    $sonuc = $istek->add(array(
        'p1' => $_POST["first_number"],
        'p2' => $_POST["second_number"])
    );
        $result = $sonuc->return;
    }
    catch (Exception $exc) {
        echo $exc->getMessage();

    }
    echo '<p>'.$result.'</p>';
}

?>

<div>
<form  method="post">
  <span style ='color:red;'>First Number:</span><br>
  <input type="text" name="first_number"><br>
  <span style ='color:red;'>Second Number:</span><br>
  <input type="text" name="second_number">
  <br><br>
  <input type="submit" value="Submit">
</form>
</div>
</div>
</body>
</html>
