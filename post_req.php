<?php
include 'config.php';
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$mob=$_POST['mob'];
$want=$_POST['want'];
$property_type=$_POST['property_type'];
$property_subtype=$_POST['property_subtype'];
$bedrooms=$_POST['bedrooms'];
$bathrooms=$_POST['bathrooms'];
$budget=$_POST['budget'];
$min_area=$_POST['min_area'];
$max_area=$_POST['max_area'];
$city=$_POST['city'];
$locality=$_POST['locality'];
$query="INSERT INTO `post_requirement` (`name`, `email`, `mob`, `want_to`, `property_type`, `property_subtype`, `bedrooms`, `bathrooms`, `budget`, `min_area`,
 `max_area`, `city`, `locality`) VALUES('$name','$email','$mob','$want','$property_type','$property_subtype','$bedrooms','$bathrooms','$budget','$min_area','$max_area','$city','$locality')";
$insert = $mysqli->query($query);
if ( $insert ) {
    echo '<script type="text/javascript">showmessage("success","Requirement posted successfully");</script>';
  } else {
    die("Error: {$mysqli->errno} : {$mysqli->error}");
  }
         $mysqli->close();
}
?>