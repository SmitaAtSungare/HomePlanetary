<?php
include('login.php'); // Includes Login Script
 $phno=$_SESSION['s_phno'];
    if(isset($_SESSION['login_user'])) {
	    $metakeyword = "Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties ";
	    $metadesp = "India’s Real estate- Homeplanetary.com- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free";
	?>
	<!DOCTYPE HTML>
	<html>
	<head>
		<title>Homeplanetary India’s Real Estate | List your Property for free | New Projects in different
			cities</title>
		<base href="<?php echo $base;?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="keywords" content="<?php echo $metakeyword; ?>"/>
		<meta name="description" content="<?php echo $metadesp; ?>"/>
		<meta name="google-site-verification" content="81AGVpf7TGQ1MiizM0H5tk0yoiZvFxS8-1CVwchfWrI"/>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
		<link href="css/style.css" rel='stylesheet' type='text/css'/>
		<link rel="stylesheet" type="text/css" href="css/component.css"/>
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="font/css/font-awesome.min.css">
		<link rel="stylesheet" href="font/css/font-awesome.min.css">
		<link rel="stylesheet" href="font/css/font-awesome.min.css">
		<link rel="stylesheet" href="font/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/dropzone.css"/>
	</head>
	<body>
	<?php include_once("analyticstracking.php") ?>
	<div class="top_bg">
		<div class="container">
			<div class="logo">
				<a href="Home/"><img src="images/logo1.png" alt=""/></a>
			</div>
			<div class="header_top-sec">
				<div class="header_right" style="background-color:#17101b" ;>
					<?php
					if (isset($_SESSION['logged'])) {
						if ($_SESSION['logged'] == "true") {
							$name = $_SESSION['login_user'];
							echo "<div class='witlogin1'>";
							echo "<div class='prmenu_container' id='click1' onclick='toggle_visibility('DivMenu1');' >Welcome " . $name;
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
						} else {
							echo '&nbsp;&nbsp;<button class="btn btn-default" data-toggle="modal" data-target="#LoginRegister">Login / Registration</button>';
						}
					} else {
						echo '&nbsp;&nbsp;<button class="btn btn-default" data-toggle="modal" data-target="#LoginRegister">Login / Registration</button>';
					}
					?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div id="sticky-anchor"></div>
	<div class="clearfix"></div>
	<!---->
	<div class="container" style="background:#FDFDFD; box-shadow:0px 7px 11px #ccc; padding:30px;">
		<center><h3>Drag &amp; Drop Multiple Files to Upload</h3></center>
		<div class="image_upload_div">
			<form action="#" class="dropzone">
			</form>
			<!--<div class = "dropzone dz-clickable"></div>-->
		</div>
		<div class="header_right">
			<div class="cart box_1"><a href="MyAds/"><h3>Back to My Account </h3></a>
				<div class="clearfix"></div>
			</div>
		</div>
		<?php
		if (!empty($_FILES)) {
			include('config.php');
			//database configuration
			$id = $_GET['id'];
			$targetDir = "property_images/";
			$fileName = $_FILES['file']['name'];
			$targetFile = $targetDir . $fileName;
			if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
				//insert file information into db table
				$mysqli->query("INSERT INTO images (img_path, property_id) VALUES('" . $fileName . "','$id')");
			}
		}
		?>
		<div class="clearfix"></div>
		<!-- end registration -->
	</div>
	<div class="footer-content">
		<div class="container">
			<div class="categorydescription">
				We offer the largest platform for Buyers and sellers. You can search for relevant Property in your city
				and locality. Even better is to search for Property by property-type like Residential and
				Commercial.Widely known as India’s no. 1 online classifieds platform, Homeplanetary is all about you.
				Whatever Property you’ve got, we promise to get it done. Our goal is to help our community of Buyers and
				sellers address their needs in the simplest and fastest way. Want to buy yours first dream house? We are
				always Here for you...
			</div>
		</div>
		<div class="container">
			<div class="ftr-grids">
				<div class="col-md-3 ftr-grid">
					<h4>Information</h4>
					<ul>
						<li><span><a href="About/">About Us</a></span></li>
						<li><span><a href="Contact/">Contact Us </a></span></li>
						<li><a href="AdvertiseWithUs/">Advertise with us</a></li>
						<li><a href="careers.php">Careers</a></li>
					</ul>
				</div>
				<div class="col-md-3 ftr-grid">
					<h4>Terms & Conditions</h4>
					<ul>
						<li><span><a href="listing_policy.php">Listing Policy</a></span></li>
						<li><span><a href="PrivacyPolicy/">Privacy Policy</a></span></li>
						<li><span><a href="TermsOfUse/">Terms of Use</a></span></li>
						<li><a href="sitemap.php">Sitemap</a></li>
					</ul>
				</div>
				<div class="col-md-3 ftr-grid">
					<h4>Contact Us</h4>
					<ul>
						<li><span><a href="">info@homeplanetary.com</a></span></li>
						<li><span><a href="">support@homeplanetary.com</a></span></li>
					</ul>
				</div>
				<div class="col-md-3 ftr-grid">
					<div class="follow">
						<h4>Follow Us</h4>
						<ul>
							<li><a href="https://www.facebook.com/homeplanetary/"><i class="fa fa-facebook"
																					 aria-hidden="true"></a></i></li>
							<li><a href="https://plus.google.com/111873557022197321661"><i class="fa fa-google"
																						   aria-hidden="true"></a></i>
							</li>
							<li><i class="fa fa-twitter" aria-hidden="true"></i></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!---->
	<!---->
	<div class="footer">
		<div class="container">
			<br>
			<div class="copywrite">
				<p>Copyright © 2016 Homeplanetary | All Rights Reserved.</p>
			</div>
		</div>
	</div>
	<a href="#" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 0;"></span>
		<span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
	<a href="#" id="toTop">To Top</a>
	<script src="js/classie.js"></script>
	<script src="js/modalEffects.js"></script>
	<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
	<script type='text/javascript' src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/dropzone.js"></script>
	<script src="js/tinybox.js" type="text/javascript"></script>
	<script src="js/fixheader.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$().UItoTop({easingType: 'easeOutQuart'});
			$("#checkAll").change(function () {
				$("input:checkbox").prop('checked', $(this).prop("checked"));
			});
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
			});
			$(document).on('click', function (e) {
				var elem = $(e.target).closest('#click1'),
					box = $(e.target).closest('#DivMenu1');

				if (elem.length) {
					e.preventDefault();
					$('#DivMenu1').toggle();
				} else if (!box.length) {
					$('#DivMenu1').hide();
				}
			});
			// Binding a click event
			// From jQuery v.1.7.0 use .on() instead of .bind()
			$('.view').bind('click', function (e) {
				// Prevents the default action to be triggered.
				e.preventDefault();
				// Triggering bPopup when click event is fired
				$('#enquiry-popup').bPopup();
			});
		});
	</script>
	<!-- city pop up -->
	</body>
	</html>
	</body>
	</html>
<?php
}
else
{
	header('location:'.$base.'Home/');
}
?>