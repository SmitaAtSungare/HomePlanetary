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
<div class="container" style="background:#FDFDFD; box-shadow:0px 7px 11px #ccc;margin-top: 30px;" >
<form method="post" id="frmcontact" name="frmcontact" enctype="multipart/form-data">
    <div class="col-md-12" >
		<div class="row">
	        <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-2 control-label">Name<span style="color:red"></span></label>
					<div class="col-xs-8">
						<div class="col-xs-12">
						 <input type="text" class="form-control-realestate " placeholder="Enter Your name"  id="name" name="name" required />
						</div>
					</div>
			</div>
		</div>
		<div class="row">
	        <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-2 control-label">Email<span style="color:red"></span></label>
					<div class="col-xs-8">
						<div class="col-xs-12">
						 <input type="text" class="form-control-realestate " placeholder="Enter email address" id="email" name="email" required />
						</div>
					</div>
			</div>
		</div>
        <div class="clearfix"></div>
		<div class="row">
	        <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-2 control-label">Mobile number<span style="color:red"></span></label>
					<div class="col-xs-8">
						<div class="col-xs-12">
						 <input type="text" class="form-control-realestate " placeholder="Enter mobile number" id="mob" name="mob" required />
						</div>
					</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
	        <div class="form-group realestateform has-feedback">
					<label for="title" class="col-sm-2 control-label">Address<span style="color:red"></span></label>
					<div class="col-xs-8">
						<div class="col-xs-12">
						 <input type="text" class="form-control-realestate " placeholder="Enter address"  id="address" name="address"/>
						</div>
					</div>
			</div>
            <br>
		</div>
		  	 <div class="clearfix"></div>
	  </div>
	 <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">

		</div>

			<div class="form-group pstAd">
					<div class="controls sbt">
						<button type="button" class="btn btn-small btn-primary" id="cmdSubmit" name="save" onclick="contactus()">Save</button>
		                 <!-- <input type="submit" class="btn btn-small btn-primary" id="cmdSubmit" value="Submit" name="save"> -->
					</div>
			</div>
</form>
</div>
			<br>
		</div>
		<br>
	 </div>
</div>

<?php
include('footer.php');
include 'config.php';
?>
<script>
	function contactus()
	{
		if(!$("#frmcontact").valid())
		{
			return;
		}
       var frmdata=new FormData();
		frmdata.append('act','contactus');
		frmdata.append('name',$("#name").val());
		frmdata.append('email',$("#email").val());
		frmdata.append('mobile',$("#mob").val());
		frmdata.append('address',$("#address").val());

        var varurl="ajaxwebapi/service.php";
        $.ajax({
            url:varurl,
            type:"POST",
            data:frmdata,
            cache:false,
            contentType:false,
            processData:false,
            success:function (response) {
                if(response.msgtype="success")
                {
                    showmessage("success","Inserted Successfully");
                    window.location.href="Home/";
                }
                else if(response.msgtype="error")
                {
					showmessage("error","Error Occoured:"+response.desc);
                }
            },
            error:function (xhr) {
				showmessage("error","Ajax Call Error");
            }
        });
	}
</script>
