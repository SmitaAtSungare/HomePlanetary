<?php
	session_start();
	include 'config.php';	
	$qry = "insert into galleries (title,date_added,ga_status) values ('".$_POST["title"]."','".date("Y-m-d")."',0)";
    $mysqli->query($qry);
	$_SESSION["galleryid"] = $mysqli->insert_id;
?>