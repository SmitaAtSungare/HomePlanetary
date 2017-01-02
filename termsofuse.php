<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
}
include('header.php');
include_once("analyticstracking.php");
?>
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
<div class="ms3">
<div class="right-area-title ">Terms Of Use</div>
<ul>
<b>By using and accessing Homeplanetary.com you are legally bound to following terms and conditions.</b>    
    <li>1. Please note that only one username and password should be created per user.</li>
    <li>2. Username is the contact number provided by the user.</li>
    <li>3. We reserve the right to verify this information before enabling an account.</li>
    <li>4. The account can be rejected or disenabled for any other reason that Homeplanetary finds suitable and which it is not liable to state or justify.</li>
    <li>5. You are responsible for maintaining the confidentiality of your password and account.</li>
    <li>6. Any registration information you provide must be true, accurate, current and complete. We would be displaying this information on the website for other users to access..</li>
    <li>7. Our use of your information is subject to the terms of our Privacy Policy.You must agree to the Privacy Policy before you may access the Site.</li>
    <li>8. Homeplanetary.com can anytime block any user or ban any IP if it found its unauthorized use.</li>
</ul>
</div>
</div>
<div class="clearfix"></div>
<!-- end registration -->
</div>
<?php
include('footer.php');
?>