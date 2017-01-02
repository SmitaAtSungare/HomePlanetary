<?php
include('login.php'); // Includes Login Script
$phno=$_SESSION['s_phno'];
if(isset($_SESSION['login_user'])) {
include('header.php');
include_once("analyticstracking.php");
$user_id=$_SESSION['user_id'];
?>
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
	<!--header end-->
	<div class="clearfix"></div>
	<!---->
	<div class="container">
		<div class="myprofile-sidebar2">
			<div id="main" class="white_box">
				<div class="quik_points">
					<div class="ok" style="display:none;padding:5px 5px 5px 25px;margin-bottom:5px;">Profile has been
						updated successfully.
					</div>
					<div id="errors_header" style="display:none;">
						<span id="errors_header_img">&nbsp;X&nbsp;</span><span id="errors_header_msg">Please‌ complete‌ the‌ missing‌ fields.</span>
					</div>
					<div>
						<span id="pdicon" class="grey-down-arrow-ico">&nbsp;&nbsp;&nbsp;</span>
						<p style="margin-left:3px;font-family:Arial; display:inline; font-weight:bold; font-size:16px;color:#333333;">
							Personal Details</p>
						<div class="blank5"></div>
					</div>
						<form method="post" id="updateProfile" name="updateProfile">
	                         <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id;?>"/>
                                <div id="pdetails">
								<!-- Profile Image START -->
								<div class="post_ad_jobs_labels">Name<span style="color:#F00;"></span></div>
								<div class="post_ad_jobs_forms">
									<input type="text" maxlength="150" name="name" id="name"
										   value="" placeholder="Name"
										   class="post_ad_field" required />
								</div>
								<div class="blank10"></div>
								<div class="clearfix"></div>
								<div class="post_ad_jobs_labels">Email</div>
								<div class="post_ad_jobs_forms">
									<input type="text" maxlength="150" name="email" id="email"
										   value="" placeholder="Email"
										   class="post_ad_field" required />
								</div>
								<div class="blank10"></div>
								<div class="clearfix"></div>
								<div class="post_ad_jobs_labels">Gender</div>
								<div class="post_ad_jobs_forms">
									 <select  class="post_ad_field"  id="gender" name="gender" required>
									   <option value="Male">Male</option>
									   <option value="Female">Female</option>
								    </select>
								</div>
								<div class="blank10"></div>
								<div class="clearfix"></div>
								<div class="post_ad_jobs_labels">Are You a</div>
								<div class="post_ad_jobs_forms">
										<select  class="post_ad_field" id="areu" name="areu" required>
										   <option value="Owner">Owner</option>
										   <option value="Builder">Builder</option>
										   <option value="Agent">Agent</option>
										   <option value="Customer">Customer</option>
									    </select>
								</div>
								<div class="blank10"></div>
								<div class="clearfix"></div>
								<div class="post_ad_jobs_labels">City</div>
								<div class="post_ad_jobs_forms">
	                                         <select  class="post_ad_field" name="city" id="city" required>
											   <option>Pune</option>
											   <option>Mumbai</option>
											   <option>Banglore</option>
											   <option>Nasik</option>
											   <option>Aurangabad</option>
										   </select>
								</div>
								<div class="blank10"></div>
								<div class="clearfix"></div>
								<div class="post_ad_jobs_labels">Mobile Number<span style="color:#F00;"></span></div>
								<div class="post_ad_jobs_forms">
									<input style="width:35px;" type="text" maxlength="10" name=""
										   class="post_ad_field" id="" class="form_input_type" value="+91"
										   disabled="disabled">
									<input style="width:160px;" type="text" maxlength="10" name="mob"
										   value="" id="mob" class="post_ad_field"
										   placeholder="Mobile Number" required />
								</div>
								<div class="blank10"></div>
								<div class="clearfix"></div>
								<a id="cptext" class="bluecol" style="text-decoration:none"><span id="cpicon"
                                  class="grey-right-arrow-ico"></span>
									<p style="margin-left:3px;font-family:Arial; display:inline; font-weight:bold; font-size:16px;">
										Change Your Password</p></a>
								<div class="blank10"></div>
								<div class="clearfix"></div>
								<div class="post_ad_jobs_labels">Password</div>
								<div class="post_ad_jobs_forms">
									<input type="text" maxlength="150" name="password" id="password"
										   value="" class="post_ad_field"
										   placeholder="Password" required />
								</div>
								<div class="blank10"></div>
								<div class="clearfix"></div>
								<div class="updatebutton3">
									<div class="myqkr_yellow_button myqkr_button">
                                        <button type="button" name="update" id="update" onclick="updateuserInfo()">Update</button>
                                    </div>
									<div class="myqkr_grey_button myqkr_button" style="margin-left:10px;"><input
											type="reset" name="cancel" value="Cancel"></div>
								</div>
								<div class="blank10"></div>
								<div class="clearfix"></div>
								<div class="blank20"></div>
						</form>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	</div>
	<!-- end registration -->
<?php  include('footer.php'); ?>

<script>
    function getuserInfo()
    {
        var frmdata = new FormData();
        frmdata.append('act','getuserInfo');
        frmdata.append('user_id',$("#user_id").val());
        var varurl="ajaxwebapi/service.php";
        $.ajax({
            url:varurl,
            type:"POST",
            data:frmdata,
            cache:false,
            contentType:false,
            processData:false,
            success:function(response){
               if(response.msgtype="success")
               {
                   var list=JSON.parse(response);
                   var arr=list.result;
                   document.getElementById("name").value = arr[0].name;
                   document.getElementById("email").value = arr[0].email;
                   document.getElementById("gender").value = firstToUpperCase(arr[0].gender);
                   document.getElementById("areu").value = firstToUpperCase(arr[0].areu);
                   document.getElementById("city").value =firstToUpperCase(arr[0].city);
                   document.getElementById("mob").value = arr[0].mob;
                   document.getElementById("password").value = arr[0].pass;
               }
               else if(response.msgtype="error")
               {
				   showmessage("error","Error Occured!"+response.desc);
               }
            },
            error:function(xhr){
				showmessage("error","Ajax Call Error");
            }
        });
    }
    function firstToUpperCase( str ) {
        return str.substr(0, 1).toUpperCase() + str.substr(1);
    }
    function updateuserInfo()
    {
        if(!$("#updateProfile").valid())
        {
            return;
        }
        var frmdata = new FormData();
        frmdata.append('act','updateuserInfo');
        frmdata.append('user_id',$("#user_id").val());
        frmdata.append('name',$("#name").val());
        frmdata.append('email',$("#email").val());
        frmdata.append('gender',$("#gender").val());
        frmdata.append('areu',$("#areu").val());
        frmdata.append('city',$("#city").val());
        frmdata.append('mob',$("#mob").val());
        frmdata.append('password',$("#password").val());
        var varurl="ajaxwebapi/service.php";
        $.ajax({
            url:varurl,
            type:"POST",
            data:frmdata,
            cache:false,
            contentType:false,
            processData:false,
            success:function(response){
                if(response.msgtype="success")
                {
					showmessage("success","Updated Successfully");
                    window.location.href="Home/";
                }
                else if(response.msgtype="error")
                {
					showmessage("error","Error Occured!"+response.desc);
                }
            },
            error:function(xhr){
				showmessage("error","Ajax Call Error");
            }
        });
    }
    $(document).ready(function () {
        getuserInfo();
            var usedNames = {};
            $("select[name='gender'] > option").each(function () {
                if(usedNames[this.text]) {
                    $(this).remove();
                } else {
                    usedNames[this.text] = this.value;
                }
            });
            var usedNames = {};
            $("select[name='areu'] > option").each(function () {
                if(usedNames[this.text]) {
                    $(this).remove();
                } else {
                    usedNames[this.text] = this.value;
                }
            });
            var usedNames = {};
            $("select[name='city'] > option").each(function () {
                if(usedNames[this.text]) {
                    $(this).remove();
                } else {
                    usedNames[this.text] = this.value;
                }
            });
    });
</script>
<?php
}
else
{
   header('location:'.$base.'Home/');
}
?>