<?php  
session_start();
include 'config.php';
if(isset($_SESSION["ausername"]))
{
  header("Location: index.php");
}
if(isset($_POST["submit"]))
  { 
      $mail=$_POST["username"];
      $password=$_POST["password"];
      $qry = "select * from admin where username='$mail'";      
      $res=$mysqli->query($qry);
      $count = $res->num_rows;
      if($count == 1)
      {
        $row = $res->fetch_assoc();
        $pass = $row["password"];
        if($password == $pass)
        {
          $_SESSION["ausername"] = $row["username"];
          header("Location:index.php");
        }
        else
        {
          echo '<script>alert("Password Doesn\'t Match");</script>';         
        }
      }
      else
      {       
        echo '<script>alert("Username Doesn\'t Match");</script>';         
      }
  }
?>  
<!DOCTYPE HTML>
<html>
<head>
<title>Homeplanetary India’s Real Estate | List your Property for free | Admin Panel</title>
    <base href="<?php echo $base; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="Email Update Form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates,Flat Pricing tables Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/style-home.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="main effect2">
    <div class="login-text">
     <h1>Welcome to ADMIN-PANEL</h1>
      <p>If your are experiencing technical or registration problems, we would advise you to delete your temporary Internet files / Cache. For more information on how to do this, please consult your web browser help.</p>
      <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>
      <div class="text-bottom">
       <h3>Follows on :</h3>
      <ul class="f-icons">
        <li><a href="#" class="facebook"> </a></li>
        <li><a href="#" class="p"> </a></li>
        <li><a href="#" class="twitter"> </a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
    </div>
    <center><a href="../index.php">Home</a></center>
      <div class="login-form">
        <div class="login-inner">
          <h2>ADMIN-LOGIN</h2>
          <p>If you enjoyed this article,subscribe below to get free email updates</p>
          <form method="post">
            <input id="name"  class="textbox" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}" value="User Name" name="username" type="text" >              
                <input id="password"  class="textbox"  onfocus="this.value = '';" value="Password" name="password" onblur="if (this.value == '') {this.value = 'Password';}" type="password">
            <div class="submit"><input name="submit"  class="designbutton" type="submit" value=" Login "></div>
            <div class="clear"></div>
          </form>
        </div>
     </div>
    <div class="clear"></div>
  </div>
      <div class="copy-right">
        <p>Copyright &copy; 2016  All rights Reserved | Developed by<a href="http://sungare.com">Sungare Technologies Pvt. Ltd.</a></p>
    </div>
</body>
</html>