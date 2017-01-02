<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
}
include('header.php');
?>
<body>
<?php include_once("analyticstracking.php")?>
<!-- header start -->
<div class="top_bg">
	<div class="container">
		<div class="logo">
		 	<a href="Home/"><img src="images/logo1.png" alt=""/></a>			 
		 </div>
		<div class="header_top-sec">
			<div class="header_right" >
			 <div class="cart box_1"><?php if(!empty($_SESSION['logged'])) { ?> <a href="Post/"><h3>Post Free Property Ad </h3></a>
					 <?php }else { ?> <a href='javascript:showloginpopup()'> <h3>Post Free Property Ad </h3></a> <?php } ?>
				<div class="clearfix"> </div>
			 </div>				 
		</div>
			 <?php
                if(isset($_SESSION['logged'])){
                        if($_SESSION['logged'] == "true")
								{
								 $name=$_SESSION['login_user'];	
								 echo "<div class='witlogin1'>";
								 echo "<b>Hi,</b>".$name;
								  echo "</div>";
								  echo "<a href=\"logout.php\" >Sign out</a>\n";
								}
								else
									{
												echo '&nbsp;&nbsp;<button class="btn btn-default" data-toggle="modal" data-target="#LoginRegister">Login / Registration</button>';
												//echo "<div class='city'> <a href='Send-enquiry.php'>Send Enquiry </a> </div>";
                                    }
								}
								else
                                    {
						            				echo "<div class='top_left'><ul><li><a href='SignUp/'>Sign Up</a></li></ul></div>";
                                                    //echo "<div class='top_left' id='login'><ul><li><a href='Authentication/'>Login</a></li></ul></div>";
                                                    //echo "<div class='city'> <a href='Send-enquiry.php'>Send Enquiry </a> </div>";
                                    }
					 ?>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div id="sticky-anchor"></div>
<!--header end-->
<br>
<br>
<br>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="login.php">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Your Mobile Number" name="username" type="text" autofocus>
                                </div>
								<br>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" >
                                </div>
                               <br>
<br>								<input name="login" class="btn btn-lg btn-success btn-block" type="submit" value="Login">
								<a href="Authentication/">Forget Password?</a>								
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="clearfix"></div>
<!---->
<?php
include('footer.php');
?>