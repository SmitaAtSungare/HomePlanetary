<?php
include('login.php'); // Includes Login Script
$phno=$_SESSION['s_phno'];
if(isset($_SESSION['login_user'])) {
include('header.php');
$user_id = $_SESSION["user_id"];
$mobile = $_SESSION["user_mobile"];
?>
<body>
	<?php include_once("analyticstracking.php") ?>
	<!-- header start -->
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
				<div class="header_right">
					<?php
					  if($_SESSION['user_type']!='Customer')
					  {
					 ?>
						  <div class="cart box_1"><?php if (!empty($_SESSION['logged'])) { ?> <a href="Post/"><h3>Post
									  Free Property Ad </h3></a>
							  <?php } else { ?> <a
								  href='javascript:showloginpopup()'>
								  <h3>Post Free Property Ad </h3></a> <?php } ?>
							  <div class="clearfix"></div>
						  </div>
					  <?php
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
		<div id="main" class="white_box">
			<div class="myqkr-hdiv">Active Property Ads Management</div>
			<form id="adsmanagement" name="adsmanagement" method="post" enctype="multipart/form-data">
                 <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id;?>"/>
                 <input type="hidden" id="mobile" name="mobile" value="<?php echo $mobile;?>"/>
				<div class="ManageTitle-tabArea">
					<div class="AdTitleArea1">Ad Title</div>
					<div class="AdTitleArea2">Posted Date</div>
					<div class="AdTitleArea3">Actions</div>
				</div>
                <div id="myad">
				
                </div>
				<div class="checkUncheckBG">
					<input type="checkbox" id="checkAll"/> Check all
					<input type="submit" name="delete_submit" class="myqkr_yellow_button myqkr_button" value="Delete"
						   onClick="showGroupDeleteAdReason();">
				</div>
			</form>
		</div>

		<div class="clearfix"></div>
		<!-- end registration -->
	</div>
<?php include('footer.php'); ?>
<script>
   function myAds()
   {
       var frmdata = new FormData();
       frmdata.append('act','myAds');
       frmdata.append('user_id',$("#user_id").val());
       frmdata.append('mobile',$("#mobile").val());
       var varurl="ajaxwebapi/service.php";
        $.ajax({
           url:varurl,
           type:"POST",
           data:frmdata,
           cache:false,
           contentType:false,
           processData:false,
           success:function(response)
           {
               if(response.msgtype="success")
               {
                   var list=JSON.parse(response);
                   var arr=list.result;
                   $("#myad").html("");
                   $("#myad").append(arr);
               }
               else if(response.msgtype="error")
               {
                   showmessage("error","Error Occured"+response.desc);
               }
           },
           error:function(xhr)
           {
               showmessage("error","Ajax Call Error");
           }
       });
   }
   $(document).ready(function(){
      myAds();
   });
</script>
<?php
    // Only process the form if $_POST isn't empty
    if (!empty($_POST)) {
        if (isset($_POST['delete_submit'])) {
            $idArr = $_POST['defaultAds'];
            foreach ($idArr as $property_id) {
                $qry = "DELETE FROM add_posting WHERE property_id=$property_id";
                $mysqli->query($qry);
              //  echo '<META HTTP-EQUIV="Refresh" Content="0; MyAds/">';
                header('location:'.$base.'MyAds/');
            }
        }
// Close our connection
        $mysqli->close();
    }
    ?>
<?php
}
else
{
   header('location:'.$base.'Home/');
}
?>