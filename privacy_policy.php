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
		<div class="header_right" style="background-color:#17101b"; >	
		<?php
					if(isset($_SESSION['logged'])){
						if($_SESSION['logged'] == "true")
								{
								 $name=$_SESSION['login_user'];
								 echo "<div class='witlogin1'>";
								 echo "<div class='prmenu_container' id='click1' onclick='toggle_visibility('DivMenu1');' >Welcome ".$name;
								 echo "<img id='click1' onClick='toggle_visibility('DivMenu1');' src='images/down-arrow-circle-hi.png'>";
								 echo "</div>";
								 echo "<div class=\"withlogin\" id=\"DivMenu1\" style=\"display: none;\">\n";
								 echo "<ul  style=\"width: 100%; \">\n";
								 echo "<li>\n";
								 echo "<a href=\"Dashboard/\">Dashboard</a>\n";
								 echo "<li>\n";
				                 if($_SESSION['user_type']!='Customer')
								 {
									 echo "<a href=\"MyAds/\">My Ads</a>\n";
									 echo "</li>\n";
								 }
								 echo "<li>\n";
								 echo "<a href=\"MyEnquiries/\">My Enquiries</a>\n";
								 echo "</li>\n";
								 echo "<li>\n";
								 echo "<a href=\"MyProfile/\">My Profile</a>\n";
								 echo "</li>\n";
								 echo "<li>\n";
								 echo "<a href=\"logout.php\" >Sign out</a>\n";
								 echo "</li>\n";
								 echo "</ul>\n";
								 echo "</div>\n";
 								 echo "</div>";
								}
								else
									{
										echo '&nbsp;&nbsp;<button class="btn btn-default" data-toggle="modal" data-target="#LoginRegister">Login / Registration</button>';
									}
								}
								else
										{
											echo '&nbsp;&nbsp;<button class="btn btn-default" data-toggle="modal" data-target="#LoginRegister">Login / Registration</button>';
										}
					 ?>
		</div>
		<div class="header_right" >
			<?php
			 if($_SESSION['user_type']!='Customer')
			 {
			 	?>
			 <div class="cart box_1"><?php if(!empty($_SESSION['logged'])) { ?> <a href="Post/"><h3>Post Free Property Ad </h3></a>
					 <?php }else { ?> <a href='javascript:showloginpopup()'> <h3>Post Free Property Ad </h3></a> <?php } ?>
				<div class="clearfix"> </div>
			 </div>
				 <?php
			 }
			?>
		</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div id="sticky-anchor"></div>
<!--header end-->
<div class="clearfix"></div>
<!---->
<div class="container" style="background:#FDFDFD; box-shadow:0px 7px 11px #ccc; padding:30px;" >
<div  class="ms3">
<h3>Privacy Policy</h3>
<ul>
<li>1. To access and use some section on Homeplanetary that are restricted only to registered users, you need to create an account on Homeplanetary.com.</li>
<li>2. To create an account we need your verified email address, which could then be used to login to Homeplanetary.com.</li>
<li>3. You have to accept the terms of service before creating an account on Homeplanetary.com.</li>
<li>4. We ask for some personal information when you create a Homeplanetary account, including your email address and a password, which is used to protect your account from unauthorized access.</li>
<li>5. Homeplanetary will have a right to use the information to provide personalized advertisements and offers, or to include that information in compilations developed by Homeplanetary.</li>
<li>6. Any personal information will be used to allow you to login to your account or to resolve specific service issues, inform you of our new services or features and to communicate with you in relation to your use of the Website. </li>
<li>7. Any other information we collect will be used for our business purposes and this may include the viewing or advertising of residential or commercial real estate, rental properties. </li>
<li>8. These policies are subject to change from time to time.</li>
<li>We take the privacy of our users very seriously.</li>
</ul>
</div>
<div class="clearfix"></div>
<!-- end registration -->
</div>
<?php
include('footer.php');
?>