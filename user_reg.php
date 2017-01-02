<?php
//include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
}
include('header.php');
include('ajaxwebapi/db.php');
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

                                    }
								}
								else
                                    {
                                                echo "<div class='top_left' id='login'><ul><li><a href='Authentication/'>Login</a></li></ul></div>";

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
                    <div class="templatemo-line-header" style="margin-top: 0px;" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="span_blog txt_darkgrey txt_orange">User Registration</span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                </div>
<div class="form-container">
    <form id="frmreg" name="frmreg" method="post" role="form">
        <div class="container">
          <div class="row">
          <div class="col-lg-4">
          <div class="form-group">
            <label for="name" > Full Name </label>
            <input type="text" class="form-control"  id="name" placeholder="Full Name"  name="name" required/>
          </div>
          </div>
          <div class="col-lg-4">
          <div class="form-group">
            <label for="email"> Email Address </label>
           <input type="email" class="form-control"  id="email" placeholder="Email Address"  name="email" required/>
          </div>
          </div>
         </div>
        </div>  <!-- col-container-->
         <div class="container">
          <div class="row">
           <div class="col-lg-4">
          <div class="form-group">
          <label for="gender"  >Gender</label>
           <select  class="form-control"  id="gender" name="gender" required>
           <option value="">-------select-------</option>
           <option value="Male">Male</option>
           <option value="Female">Female</option>
           </select>
          </div>
          </div>
         <div class="col-lg-4">
          <div class="form-group">
          <label for="gender"  >Are You a</label>
           <select  class="form-control" id="user_type" name="user_type" required>
           <option value="">-------select-------</option>
           <option value="Owner">Owner</option>
           <option value="Builder">Builder</option>
           <option value="Agent">Agent</option>
           <option value="Customer">Customer</option>
           </select>
          </div>
          </div>
           </div>
          </div><!-- col-container-->
		  <div class="container">
          <div class="row">
            <div class="col-lg-4">
         <div class="form-group">
          <label for="city"  class="col-sm-2 control-label">City</label>
           <select  class="form-control" name="city" id="city" required>
           <option value="">-------select-------</option>
           <option >Pune</option>
           <option >Mumbai</option>
           <option >Banglore</option>
           <option >Nasik</option>
           <option >Aurangabad</option>
           </select>
          </div>
        </div>
          <div class="col-lg-4">
          <div class="form-group">
            <label for="mobile"  >Mobile Number </label>
            <input type="text" class="form-control"  id="mob" maxlength="10" placeholder="Mobile Number" name="mob" required/>
          </div>
          </div>
           </div>
          </div><!-- col-container-->
       <div class="container">
        <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label for="password" >Create Password</label>
            <input type="password" class="form-control" id="password" placeholder="Create Password" name="password" required/>
          </div>
          </div>
          <div class="col-lg-4">
          <div class="form-group">
            <label for="password" >Confirm Password</label>
            <input type="password" class="form-control" id="cnfpsd" placeholder="Confirm Password" name="cnfpsd" required/>
          </div>
          </div>
          </div>
          </div>
          <br><br>
          <div class="ui mini buttons col-sm-offset-3 col-sm-3">
              <!--<button type="button" class="ui mini positive button" name="register" onclick="userregistration()">Register</button>
            -->
              <button type="submit" class="ui mini positive button" id="register" name="register">Register</button>

          <button type="reset" class="ui mini red button" name="back">Clear</button>
          </div>
       </form>
        <br><br>
       </div><!--form-container--> 
       </div> <!--container-->

<!---->
<?php  include('footer.php');  ?>

<?php
if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $user_type = $_POST['user_type'];
    $city = $_POST['city'];
    $mob = $_POST['mob'];
    $password = $_POST['password'];
    $cnfpsd = $_POST['cnfpsd'];

        $db = getDB();
        $sel = "select * from `signup` where mob = '$mob'";
        $res = mysqli_query($mysqli,$sel) or die($mysqli->error);
        $check = mysqli_num_rows($res);
        if($check == 0)
        {
            $code = rand(100000, 999999);
            $text = "Please Verify Your OTP Code is ".$code;
            sendMessage($text,$mob);
            $sql = "INSERT INTO signup(name,email,gender,areu,city,mob,pass,cnfpsd,date,verification_code,verification_status)  VALUES ('$name','$email','$gender','$user_type','$city','$mob','$password','$cnfpsd',now(),$code,'False')";
            $stmt = $db->query($sql);
            $stmt = $db->query("SELECT last_insert_id() AS lid");
            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                $data = $row[0];
            }
            echo '<script type="text/javascript">showmessage("success","Sign Up Successful , Please Verify Your Account.");document.getElementById("mverification_type").value="R";document.getElementById("muser_id").value='.$data.';$("#verification-popup").modal("show");</script>';
           // header('location:'.$base.'Verify/'.$data);
        }
        else
        {
            $result = $mysqli->query($sel);
            while( $row = $result->fetch_array())
            {
                $verification_status = $row['verification_status'];
                $verification_code = $row['verification_code'];
                $user_id = $row['user_id'];
                $mob = $row['mob'];
            }
            if($verification_status == 'False')
            {
                $text = "Please Verify Your OTP Code is ".$verification_code;
                sendMessage($text,$mob);
                echo '<script type="text/javascript">showmessage("warning","Your verification is Pending , Please Verify Your Account.");document.getElementById("mverification_type").value="R";document.getElementById("muser_id").value='.$user_id.';$("#verification-popup").modal("show");</script>';
            }
            else
            {
                echo '<script type="text/javascript">showmessage("warning","This mobile number is already Exist.. Please Signup with another number.....!!!!");</script>';
            }
        }
}
?>
<script>
function userregistration()
{
    if(!$("#frmreg").valid())
    {
        return;
    }
    var frmdata = new FormData();
    frmdata.append('act','registeruser');
    frmdata.append('name',$("#name").val());
    frmdata.append('email',$("#email").val());
    frmdata.append('gender',$("#gender").val());
    frmdata.append('user_type',$("#user_type").val());
    frmdata.append('city',$("#city").val());
    frmdata.append('mob',$("#mob").val());
    frmdata.append('password',$("#password").val());
    frmdata.append('cnfpsd',$("#cnfpsd").val());
    var varurl="ajaxwebapi/service.php";

    $.ajax({
        url:varurl,
        type:"POST",
        data:frmdata,
        cache:false,
        contentType:false,
        processData:false,
        success:function(response){
            if(response.msgtype="success"){
                var list = JSON.parse(response);
                var verify=list.verify;
                var warning=list.warning;
                if(verify=="Yes")
                {
                    if(warning=="Yes")
                    {
                        showmessage("warning",list.desc);
                    }
                    else
                    {
                        showmessage("success",list.desc);
                    }
                    document.getElementById("mverification_type").value="R";
                    document.getElementById("muser_id").value=list.lastid;
                    $("#verification-popup").modal("show");
                }
                else
                {
                    showmessage("error",list.desc);
                }
                window.location.href="Verify/"+list.lastid;
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

</script>
