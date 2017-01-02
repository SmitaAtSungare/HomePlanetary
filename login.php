<?php  
session_start();
include 'config.php';
if(isset($_POST) && count($_POST)>0) 
{
if(isset($_POST["login"]))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $qry  = "SELECT * FROM signup WHERE mob ='".$username."' AND pass = '".$password."'";
        $res=$mysqli->query($qry);
        $count = $res->num_rows;
     if($count == 1)
     {
		 $row = $res->fetch_assoc();
		{
      	    $_SESSION['login_user']=$row['name'];
            $_SESSION['s_phno']=$username; // Initializing Session
			$_SESSION['logged']="true";
            $_SESSION['user_type']=$row['areu'];
            $_SESSION['user_name']=$row['name'];
            $_SESSION['user_email']=$row['email'];
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['user_mobile']=$row['mob'];
		}
	         header('location:Dashboard/');
     }
   else
      {
              echo '<script type="text/javascript"> showmessage("warning","Wrong UserName or Password");window.location=\'Authentication/\';</script>';
      }
    }
}
?> 
