<?php
include "config.php";
 // Check our connection
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }
// Passkey that got from link 
$passkey=$_GET['passkey'];
$tbl_name1="temp_members_db";
//echo $passkey;
// Retrieve data from table where row that match this passkey 
$sql1= "SELECT * FROM $tbl_name1 WHERE confirm_code = '$passkey'";
$result1=mysqli_query($mysqli,$sql1) or die(mysqli_error());
// If successfully queried 
if($result1){
// Count how many row has this passkey
$count=mysqli_num_rows($result1);
// if found this passkey in our database, retrieve data from table "temp_members_db"
if($count==1){
$rows=mysqli_fetch_array($result1);
$property_name=$rows['property_name'];
$city=$rows['city'];
$locality=$rows['locality'];
$address=$rows['address'];
$landmark=$rows['landmark'];
$property_type=$rows['property_type'];
$transaction_type=$rows['transaction_type'];
$bed = $rows['bedroom'];
$possession=$rows['possession'];
$price=$rows['price'];
$area=$rows['area_sqft'];
$rate_sqft=$rows['rate_sqft'];
$floor_no=$rows['floor_no'];
$ameny =$rows['amenities'];
$airport=$rows['airport'];
$train=$rows['train'];
$bustop=$rows['bustop'];
$school=$rows['school'];
$hospital=$rows['hospital'];
$resto=$rows['resto'];
$bank=$rows['bank'];
$property_details=$rows['property_details'];
$target=$rows['photos'];
$uname=$rows['name'];
$type=$rows['owner_type'];
$email=$rows['email'];
$mob=$rows['mob'];
$landline=$rows['landline'];
$about_builder=$rows['about_builder'];
$target1=$rows['logo'];
$user_id=$rows['user_id'];
$availability=$rows['availability'];
$add_status='Featured';


    $sql2="INSERT INTO `add_posting` (`property_name`, `city`, `locality`, `address`, `landmark`, `property_type`, `transaction_type`,
 `bedroom`, `possession`, `price`, `area_sqft`, `rate_sqft`, `floor_no`, `amenities`, `airport`, `train`, `bustop`, `school`, `hospital`, `resto`, 
 `bank`, `property_details`, `photos`, `name`, `owner_type`, `email`, `mob`, `landline`, `about_builder`, `logo`, `date`, `user_id`, `add_status`, `availability`) VALUES('$property_name','$city','$locality','$address',
 '$landmark','$property_type','$transaction_type','$bed','$possession','$price','$area','$rate_sqft','$floor_no','$ameny','$airport','$train','$bustop',
 '$school','$hospital','$resto','$bank','$property_details','$target','$uname','$type','$email','$mob','$landline','$about_builder','$target1',now(),'$user_id','$add_status','$availability')";
    $result2=mysqli_query($mysqli,$sql2) or die(mysqli_error());
}
// if not found passkey, display message "Wrong Confirmation code" 
else {
    echo "Your Property is Already Activated...\n";
    echo "<a href='Home/'>Please Click Here To Login</a>";
}
// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
if($result2){
    echo "Your Property has been Activated...\n";
    echo "<a href='Home/'>Please Click Here To Login</a>";
    // Delete information of this user from table "temp_members_db" that has this passkey
$sql3="DELETE FROM $tbl_name1 WHERE confirm_code = '$passkey'";
$result3=mysqli_query($mysqli,$sql3);
}
}
?>