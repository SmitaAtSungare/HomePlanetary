<?php
	include 'config.php';
	$qry = "INSERT INTO `reminders`(`prsn_name`, `dob`, `re_status`) VALUES ('".$_POST["name"]."','".date("Y-m-d" , strtotime($_POST["dob"]))."',0)";
    $mysqli->query($qry);
?>