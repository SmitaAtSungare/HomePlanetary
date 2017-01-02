<?php
error_reporting(E_ERROR  | E_PARSE );
   include('config.php');
   $id = $_GET['id'];
   $query_c = "update add_posting set add_status = 'Featured' where property_id = '$id'";
   $qry_c = $mysqli->query($query_c);
   $message="Record Approved Successfully";
   echo $message;
?>

