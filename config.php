<?php	
error_reporting(E_ERROR | E_PARSE);
$whitelist = array(
    '127.0.0.1',
    '::1'
);
$base = '';
if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    define("HOST", 'localhost');
    define("USER", 'root');
    define("PSWD", '');
    define("DB", 'homeplanetary_db');
    $base = "/";
}else{
    define("HOST", 'localhost');
    define("USER",'home');
    define("PSWD",'Home@55555');
    define("DB", 'homeplanetary_db');
    $base = 'http://www.homeplanetary.com/';
}
// Connect to MySQL
	 $mysqli = new mysqli( HOST, USER, PSWD,  DB);
?>