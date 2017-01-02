<?php
error_reporting(E_ERROR  | E_PARSE );
function getDB()
{
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="homeplanetary_db";
    $dbconnection= new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
    $dbconnection->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbconnection;
}
$mysqli = new mysqli( 'localhost', 'root', '', 'homeplanetary_db' );
?>