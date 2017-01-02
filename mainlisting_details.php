<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
	$user_id=$_SESSION['user_id'];
	$property_id=$_GET['id'];
	$result = $mysqli->query("SELECT * FROM property_views WHERE user_id=$user_id AND property_id=$property_id");
	$count = $result->num_rows;
	if($count==0)
	{
		$result = $mysqli->query("INSERT INTO property_views (user_id,property_id,date) VALUES ($user_id,$property_id,now())");
	}
}
include('header.php');
$user_id=$_SESSION['user_id'];
?>
<body>
<?php //include_once("analyticstracking.php")?>
<!-- header -->
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
            <div class="clearfix"> </div>
		</div>
	</div>
</div>
<div id="sticky-anchor"></div>
<div class="header_top">
	 <div class="container">
		 <div class="logo">
             </div>
                <div class="header_right" style="    margin-right: 0px;">
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
		  <div class="clearfix"></div>	
	 </div>
</div>
<!--header end-->
<!--Real estate Start--------------------------------------------------------------------------------------------->
<div class="ponny">
  <div class="container"  style=" width:100%; background:#F7F7F7;">
 <!--<form method="post" enctype="multipart/form-data">-->
<!-------------------Slider end-------------------------------------------------------------------->
    <?php
      $id=$_GET['id'];
      //execute the SQL query and return records
      $result = $mysqli->query("SELECT * FROM add_posting where property_id='$id'");
      while( $row =  $result->fetch_array()) :
      ?>
<div class="container">
       <div class="list-head">
	        <div class="place">
                <input type="hidden" id="pid" name="pid" value="<?php echo $id;?>"/>
                <input type="hidden" id="pname" name="pname" value="<?php echo $row['property_name'];?>"/>
                <input type="hidden" id="pmob" name="pmob" value="<?php echo $row['mob'];?>"/>
	         <h4><?php echo $row['property_name'].' - '.$row['locality'].', '.$row['city']; ?></h4>
			 <p><i class="fa fa-map-marker" aria-hidden="true"></i> <b><?php echo $row['locality'].',  '.$row['city']; ?></b> | <?php echo $row['owner_type'].' '.$row['name']; ?>
			 </p>
			 </div>
	   </div>
</div>
<div class="clearfix"></div>
<div class="container">
    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id'];?>"/>
    <div class="col-md-12" style="border:1px solid #ccc; background:#fff;padding-left: 8px; ">
                <div class="col-md-8" style="box-shadow:0px 0px 0px #ccc; background:#fff; ">
                        <div class="price-details2">
                         <div class="price-main">
                          <h4><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $row['price']; ?></h4>
                             <div id="contactdiv" style="margin-left: 370px;margin-top: -27px;"><a href="javascript:openenq()" style="color: #23507b;">&nbsp;&nbsp;&nbsp;<i class="fa fa-phone-square"></i>Contact Number</a></div>

                          <b> Apartments| Flats | <?php echo $row['bedroom']; ?>| <?php echo $row['area_sqft']; ?> sq.ft</b>
                            <div class="clearfix"></div>
                             <input type="button" class="btn" value="Possession : <?php echo $row['possession']; ?>">
                             <input type="button" class="btn" value="Project Status : Available">
                         </div>
                        </div>
                        <div class="slider2">
                            <?php echo "<img src='".$row['photos']."' width='750' height='350'/>";?>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="google-ad">
                        </div>
                        <form name="form1" id="form1" method="post"  class="form-validation" enctype="multipart/form-data">
                        <div class="estate-form2">
                               <center><div class="form-group">
                        <b><font color="#DD0A16"><?php echo $row['property_name']; ?></font></b>
                        </div>
                        <div class="form-group">
                            <font color="#9ac400">+91xxxxxxxxxxx</font>
                        </div>
                        <h4><font color="#DD0A16">Interested in this project?</font></h4></center>
                         <p>Fill in your details and we will get in touch with you shortly....</p>
                            <input type="hidden" name="enq" id="property_name" value="<?php echo $row['property_name'].' - '.$row['locality'].', '.$row['city']; ?>">
                            <input type="hidden" name="mob1" id="mobile1" value="<?php echo $row['mob'];?>">
                            <input type="hidden" name="property_id" id="property_id" value="<?php echo $_GET['id'];?>"/>
                        <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3">Enter your name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required />
                        </div>
                        <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required />
                        </div>
                        <div class="form-group">
                        <label class="sr-only" for="exampleInputAmount">Mobile</label>
                            <div class="input-group">
                             <div class="input-group-addon">+91</div>
                                <input type="text" name="mobile" class="form-control" id="mobile" minlength="10" maxlength="10" placeholder="10 digit number" required />
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3">Comments</label>
                        <input type="text" name="msg" class="form-control" id="comments" placeholder="Comments here..." required />
                        </div>
                           <button type="button" class="price-btn" onclick="sendenquiry('page')">GET CALL BACK</button>
                            </div>
                        <div class="clear"></div>
                        </form>
                </div>

    </div>

    <div class="clearfix"></div>
    <div class="google-ad">
    <img src="images/google ad.png">
    </div>
    <div class="clearfix"></div>
            <div  class="col-md-12">
            <div class="col-md-9">
                    <div   class="">
                    <nav class="main-nav" >
                        <a href="#p1" class="scroll">Details</a>
                        <a href="#p2" class="scroll">Unit Details</a>
                        <a href="#p3" class="scroll">Amenities</a>
                        <a href="#p4" class="scroll">Locality Info</a>
                        <a href="#p7" class="scroll">About Builder</a>
                        <a href="#p5" class="scroll">Images</a>
                    </nav>
                    </div>
                    <div   class="nfree-estate ">
                        <h2 id="p1">Project Details</h2>
                        <p><?php echo $row['property_details']; ?></p>
                    </div>
                    <div class="nfree-estate">
                        <h2 id="p2">Unit Details</h2>
                        <table class="table table-bordered"  >
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>Area (in sq.ft)</th>
                            <th>Sell Price</th>
                            <th>Floor Number</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="">
                            <td><?php echo $row['bedroom']; ?> Apartments</td>
                            <td><?php echo $row['area_sqft']; ?> Sq. Ft.</td>
                            <td> ₹  <?php echo $row['price']; ?></td>
                            <td><?php echo $row['floor_no']; ?></td>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                    <div  class="nfree-estate">
                        <h2 id="p3">Amenities</h2>
                        <dl class="accordion" style="margin:0px;">
                        <dt class="accordion__title active"> All</dt>
                        <dd class="accordion__content">
                        <?php echo $row['amenities']; ?>
                        </dd>
                        </dl><div id="p4"></div>
                    </div>
                    <div   class="google-ad" style="margin-top:35px;">
                          <img src="images/google ad.png">
                    </div>
                    <div class="nfree-estate"  style="margin-top:30px;">
                        <h2 id="p4">Locality Info</h2>
                    <div class="col-md-8">
                         <iframe src="http://www.map-generator.org/17a7be41-a03d-4193-8d93-49628f0bce29/iframe-map.aspx" scrolling="no" width="520px" height="250px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                    <div   class="col-md-4" >
                        <dl class="accordion1" style="margin:0px;">
                        <dt class="accordion1__title active">Locality</dt>
                        <dd class="accordion1__content" ><div class="overflow-scrolling1"><div class="overflow-scrolling1"><div class="overflow-scrolling1">
                        <div  class="estate-list" >
                        <ul>
                            <li><i class="fa fa-university" aria-hidden="true"></i> <b>Bank/ATMS: <?php echo $row['bank']; ?> km</b></li>
                            <li><i class="fa fa-hospital-o" aria-hidden="true"></i><b>Hospitals: <?php echo $row['hospital']; ?> km</b></li>
                            <li><i class="fa fa-graduation-cap" aria-hidden="true"></i><b>School: <?php echo $row['school']; ?> km</b></li>
                            <li><i class="fa fa-building-o" aria-hidden="true"></i><b>Restuarant: <?php echo $row['resto']; ?> km</b></li>
                        </ul>
                    </div>
                    <br><br>
                    </div></div></div></dd>
                        <dt  class="accordion1__title">Commute</dt>
                        <dd class="accordion1__content" style="display: none;"><div class="overflow1-scrolling"><div class="overflow1-scrolling"><div class="overflow1-scrolling">
                    <div  class="estate-list" >
                    <ul>
                        <li><i class="fa fa-car" aria-hidden="true"></i><b>Bus Stop</b>
                        <h5> - <b><?php echo $row['bustop']; ?> km</b></h5>
                        </li>
                         <li><i class="fa fa-train" aria-hidden="true"></i><b>Railway Station</b>
                         <h5> - <b><?php echo $row['train']; ?> km</b></h5> </li>
                         <li><i class="fa fa-plane" aria-hidden="true"></i><b>Pune International Airport</b>
                         <h5> - <b><?php echo $row['airport']; ?> km</b></h5> </li>
                    </ul>
                    </div>
                    </div></div></div></dd>
                    </dl>
                        <div class="clearfix"></div>
                    </div>
                    </div>
                    <div class="nfree-estate ">
                        <div class="ponny3"></div>
                            <h2 id="p7">About Builder</h2>
                        <div class="col-md-3">
                             <?php echo "<img src='".$row['logo']."'/>";?>
                        </div>
                        <div class="col-md-9"><p><?php echo $row['about_builder']; ?></p></div>
                        </div>
                        <?php endwhile; ?>
                        <div class="clearfix"></div>
                        <div  class="nfree-estate">
                            <h2 id="p5">Property Images</h2>
                            <form method="post" enctype="multipart/form-data">
                            <div class="col-md-12" style="margin:0px;">
                        <dl class="accordion2" >
                            <?php
                            $id=$_GET['id'];
                            //execute the SQL query and return records
                            $result = $mysqli->query("SELECT * FROM images where property_id='$id'");
                            ?>
                    <div class="container">
                        <div class="gallery" >
                        <?php
                        while( $row =  $result->fetch_array()) :
                        ?>
                        <a href="<?php echo "property_images/".$row['img_path'];?>"><?php echo "<img src='property_images/".$row['img_path']."' width='150' height='150'/>";?></a>
                        <?php endwhile; ?>
                        </div>
                    </div>
                </dl>
            </div>
        </form>
    </div>
  <div class="clearfix"></div>
</div>
            <div class="col-md-3"  >
                <div class="clearfix"></div>
                <h6>FEATURED ADS</h6>
                    <?php
                    //execute the SQL query and return records
                    $qr="SELECT * FROM add_advertise ORDER BY date DESC";
                    $result = $mysqli->query($qr);
                    while( $row =  $result->fetch_array()) :
                    ?>
                <div class="estate-new2 estate-new-tenth">
                     <?php echo "<img src='admin/".$row['photo']."'/>";?>
                </div>
                <div class="clearfix"></div>
                <?php endwhile; ?>
        </div>
    </div>
    </div>
    <!--</form>-->
    </div>
    <div  id="contact-popup" style="display:none;">
        <form method="post" name="f1" id="f1"  class="form-validation" enctype="multipart/form-data" action="">
            <div class="b-close"></div>
            <div class="estate-form2">
                <h4>Interested in this property?</h4>
                <input type="hidden" id="menq" name="menq" />
                <input type="hidden" id="mmob" name="mmob" />
                <input type="hidden" name="mproperty_id" id="mproperty_id" value="<?php echo $_GET['id'];?>"/>
                <input type="hidden" name="mcontactenquiry" id="mcontactenquiry"/>
                <input type="hidden" name="euser_id" id="euser_id" value="<?php echo $_SESSION['user_id']; ?>"/>
                <div class="form-group">
                    <label class="sr-only">Enter your name</label>
                    <input type="text" name="mname" class="form-control" id="mname" placeholder="Enter your name" required />
                </div>
                <div class="form-group">
                    <label class="sr-only">Email address</label>
                    <input type="email" name="memail" class="form-control" id="memail" placeholder="Email" required />
                </div>
                <div class="form-group">
                    <label class="sr-only">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-addon">+91</div>
                        <input type="text" name="mmobile" minlength="10" maxlength="10" class="form-control" id="mmobile" placeholder="10 digit number" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only">Comments</label>
                    <input type="text" name="mmsg" class="form-control" id="mmsg" placeholder="Comments here..." required>
                </div>
                 <button type="button" class="price-btn" onclick="sendenquiry('modal')">GET CALL BACK</button>
            </div>
            <div class="clear"></div>
        </form>
    </div>
<!-------------------Real estate end-------------------------------------------------------------------->
<!-- end registration -->
<?php
include('footer.php');
?>
<script>
if($(window).width() > 299){
$('.accordion1__content:not(:first)').hide();
$('.accordion1__title:first-child').addClass('active');
} else {
$('.accordion1__content').show();
};
$( ".accordion1__content" ).wrapInner( "<div class='overflow-scrolling1'></div>" );
$('.accordion1__title').on('click', function() {
$('.accordion1__content').hide();
$(this).next().show().prev().addClass('active').siblings().removeClass('active');
});
function openenq()
{
    $("#menq").val($("#pname").val());
    $("#mmob").val($("#pmob").val());
    $("#mcontactenquiry").val('Yes');
    $('#contact-popup').bPopup();
}
function clearenquiry()
{
    $("#mname").val("")
    $("#memail").val("");
    $("#mmobile").val("");
    $("#mmsg").val("");
    $("#menq").val("");
    $("#mmob").val("");
    $("#mproperty_id").val("");
    $("#mcontactenquiry").val("");
}
function  sendenquiry(i) {
   if(i=="modal")
   {
       if(!$("#f1").valid())
       {
           //alert("Invalid form");
           return;
       }
       var pname=$("#property_name").val();
       var name=$("#mname").val();
       var email=$("#memail").val();
       var mobile=$("#mmobile").val();
       var comments=$("#mmsg").val();
       var username=$("#mobile1").val();
       var user_id=$("#user_id").val();
       var property_id=$("#mproperty_id").val();
       var contactenquiry=$("#mcontactenquiry").val();
   }
   else if(i=="page")
   {
       if(!$("#form1").valid())
       {
           //alert("Invalid form");
           return;
       }
       var pname=$("#property_name").val();
       var name=$("#name").val();
       var email=$("#email").val();
       var mobile=$("#mobile").val();
       var comments=$("#comments").val();
       var username=$("#mobile1").val();
       var user_id=$("#user_id").val();
       var property_id=$("#property_id").val();
       var contactenquiry='No';
   }

    var frmdata=new FormData();
    frmdata.append('act','addenquiry');
    frmdata.append('property_name',pname);
    frmdata.append('name',name);
    frmdata.append('email',email);
    frmdata.append('mobile',mobile);
    frmdata.append('comments',comments);
    frmdata.append('username',username);
    frmdata.append('user_id',user_id);
    frmdata.append('property_id',property_id);

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
                if(i=="modal")
                {
                    clearenquiry();
                    document.getElementById("contact-popup").style.display = "none";
                    $(".b-modal").css('display','none');
                }
                var list=JSON.parse(response);
                var lid=list.lid;
                showmessage("success","Enquiry Successful , Please Verify Your Mobile Number.");
                $("#mverification_type").val("E");
                $("#muser_id").val(lid);
                if(contactenquiry=="Yes")
                {
                    $("#contactenq").val("Yes");
                }
                $("#contactmob").val($("#mobile1").val());
                $("#verification-popup").modal("show");
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


function refreshviews()
{
	var frmdata = new FormData();
	frmdata.append('act','refreshviews');
	frmdata.append('property_id',$("#property_id").val());

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
	<?php
	if(isset($_SESSION['login_user'])){
		$user_id=$_SESSION['user_id'];
		$property_id=$_GET['id'];
		$result = $mysqli->query("SELECT * FROM property_views WHERE user_id=$user_id AND property_id=$property_id");
		$count = $result->num_rows;
		if($count==0)
		{
			?>
   	         refreshviews();
			<?php
		}
	}
	?>
});
</script>