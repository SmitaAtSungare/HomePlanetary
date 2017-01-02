<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
}
$metakeyword="Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties ";
$metadesp="India’s Real estate- Homeplanetary.com- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free";
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
							     if($_SESSION['user_type']!='Customer')
								 {
									 echo "<li>\n";
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
<h3>About Us</h3>
Homeplanetary is online real estate platform, a place where people can connect with each other to buy or sell their Properties. Launched in 2016 with the vision for buyers and sellers to “meet online, transact offline”, today we have many listings and have generated over number of replies.
Homeplanetary operates from all cities across India and is accessed by more than 30 million unique users and 26 million brand new customers per month.
At Homeplanetary , we have created an online community which is simple and secure. We are constantly innovating so that users can buy and sell in the easiest and most convenient way possible. If you are a landlord interested in posting your apartments to Homeplanetary, please email us at info@homeplanetary.com and we will get in touch to help you list the property. This way we aim to make people ‘Homeplanetary ’ users, perhaps even before they are internet users.
Happy trading everyone!
</div>
<div class="clearfix"></div>
<!-- end registration -->
</div>
<?php
include('footer.php');
?>