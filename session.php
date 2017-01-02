<?php
include('config.php');
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=$mysqli->query("select * from signup where mob='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['mob'];
$name=$row['name'];
$ses_sql1=$mysqli->query("select * from add_posting where mob='$user_check'");
$row = mysqli_fetch_assoc($ses_sql1);
$p_name=$row['property_name'];
$_SESSION['user_type']=$row['areu'];
$_SESSION['user_name']=$row['name'];
if(!isset($login_session)){
header('Location: Home/'); // Redirecting To Home Page
}
?>