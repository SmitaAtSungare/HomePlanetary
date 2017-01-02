<div id="verification-popup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" id="listTitle" style="color: #109af7;">OTP Verification</h2>
            </div>
            <form method="post" name="frmverify" id="frmverify" class="form-validation" role="form">
                <div class="modal-body">
                    <input type="hidden" name="muser_id" id="muser_id"/>
                    <input type="hidden" name="mverification_type" id="mverification_type"/>
                    <input type="hidden" name="contactenq" id="contactenq"/>
                    <input type="hidden" name="contactmob" id="contactmob"/>
                    <div class="form-group">
                        <input type="text" class="form-control" id="vcode" name="vcode" maxlength="6" minlength="6" placeholder="Type Your Verification Code Here.."  required />
                    </div>
                    <input type="submit" id="verify" name="verify"  value="Submit OTP" class="price-btn"><br/><br/>
                    <div id="resend">
                        &nbsp;&nbsp;  <u><a href="javascript:resendotp()" style="color: #5379FF;">Resend OTP</a></u>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="LoginRegister" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel"> Login/Registration </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mymodal">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                            <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
                                <form role="form" method="post" action="login.php">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Enter Your Mobile Number" name="username" type="text" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <input class="form-control" placeholder="Password" name="password" type="password" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="modal-footer">

                                            <div class="col-sm-10">
                                                <button type="submit" name="login" id="login" class="btn btn-default">
                                                    Login</button>
                                                <a href="javascript:;">Forgot your password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <form id="frmreg" name="frmreg" method="post" role="form">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"  id="name" placeholder="Full Name"  name="name" required/>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" class="form-control"  id="email" placeholder="Email Address"  name="email" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select  class="form-control"  id="gender" name="gender" required>
                                                        <option value="">Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select  class="form-control" id="user_type" name="user_type" required>
                                                        <option value="">Are You A</option>
                                                        <option value="Owner">Owner</option>
                                                        <option value="Builder">Builder</option>
                                                        <option value="Agent">Agent</option>
                                                        <option value="Customer">Customer</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select  class="form-control" name="city" id="city" required>
                                                        <option value="">City</option>
                                                        <option >Pune</option>
                                                        <option >Mumbai</option>
                                                        <option >Banglore</option>
                                                        <option >Nasik</option>
                                                        <option >Aurangabad</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"  id="mob" maxlength="10" placeholder="Mobile Number" name="mob" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" id="password" placeholder="Create Password" name="password" required/>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" id="cnfpsd" placeholder="Confirm Password" name="cnfpsd" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="modal-footer">
                                            <div class="col-sm-10">
                                                <button type="button" id="registeruser" name="registeruser" onclick="javascript:userregistration()" class="btn btn-default">
                                                    Register</button>
                                                <button type="reset" class="btn btn-default">
                                                    Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="footer-content">
 <div class="container">
<div class="categorydescription">
We offer the largest platform for Buyers and sellers. You can search for relevant Property in your city and locality. 
Even better is to search for Property by property-type like Residential and Commercial.Widely known as India’s no. 1 online classifieds platform, 
Homeplanetary is all about you. Whatever Property you’ve got, we promise to get it done. Our goal is to help our community of Buyers and sellers 
address their needs in the simplest and fastest way. Want to buy yours first dream house? We are always Here for you... 
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
				 </ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
		 		<h4>Terms & Conditions</h4>
				 <ul>
					<li><span><a href="PrivacyPolicy/">Privacy Policy</a></span></li>
					<li><span><a href="TermsOfUse/">Terms of Use</a></span></li>		
					<li><span><a href="SiteMap/">Sitemap</a></span></li>
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
						<li><a href="https://www.facebook.com/homeplanetary/"><i class="fa fa-facebook" aria-hidden="true"></a></i></li>
						<li><a href="https://plus.google.com/111873557022197321661"><i class="fa fa-google" aria-hidden="true"></a></i></li>
						<li><i class="fa fa-twitter" aria-hidden="true"></i></li>
					</ul>
					</div>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
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
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<script type='text/javascript' src="js/bootstrap.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/modalEffects.js"></script>
<script type="text/javascript" src="js/paging.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="js/tinybox.js" type="text/javascript"></script>
<script src="js/fixheader.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="js/tinybox.js" type="text/javascript"></script>
<script type="text/javascript" src="js/simple-lightbox.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/additional-methods.min.js"></script>
<script type="text/javascript" src="admin/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="js/moment.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">

			$(document).ready(function() {
                $("#budget").select2();
                $("#property_type").select2();
                $("#bedroom").select2();
                var usedNames = {};
                $("select[name='budget'] > option").each(function () {
                    if(usedNames[this.text]) {
                        $(this).remove();
                    } else {
                        usedNames[this.text] = this.value;
                    }
                });
                var usedNames = {};
                $("select[name='property_type'] > option").each(function () {
                    if(usedNames[this.text]) {
                        $(this).remove();
                    } else {
                        usedNames[this.text] = this.value;
                    }
                });
                var usedNames = {};
                $("select[name='bedroom'] > option").each(function () {
                    if(usedNames[this.text]) {
                        $(this).remove();
                    } else {
                        usedNames[this.text] = this.value;
                    }
                });
				$('.view').bind('click', function (e) {
					e.preventDefault();
					$('#enquiry-popup').bPopup();
				});
				$("#checkAll").change(function ()
				{
					$("input:checkbox").prop('checked', $(this).prop("checked"));
				});
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
				$(document).on('click', function(e) {
					var elem = $(e.target).closest('#click1'),
						box  = $(e.target).closest('#DivMenu1');
					if ( elem.length ) {
						e.preventDefault();
						$('#DivMenu1').toggle();
					}else if (!box.length){
						$('#DivMenu1').hide();
					}
				});
				$(".shop-enquiry2").click(function () {
					var name = $(this).parent().attr('id');
					var mob = $(this).closest("div").attr('name');
					var id = $(this).closest("div").attr('id');
					document.getElementById("property_name").value=name;
					document.getElementById("property_mobile").value=mob;
					document.getElementById("property_id").value=id;
				});
				$('.enp').bind('click', function (e) {
					e.preventDefault();
					$('#contact-popup').bPopup();
				});
				$('.shop-enquiry2').bind('click', function (e) {
					e.preventDefault();
					$('#contact-popup').bPopup();
				});
				$('#pp').bind('click', function (e) {
					e.preventDefault();
					$('#map-view ').bPopup();
				});
				$("#show").click(function(){
					$("#show2").slideToggle();
					$("#show4").hide();

				});
				$('#show3').click(function() {
					$("#show4").slideToggle();
					$("#show2").hide();
				});
				$(document).on('click', function(e) {
					var elem = $(e.target).closest('#click3'),
						box  = $(e.target).closest('#DivMenu3');
					if ( elem.length ) {
						e.preventDefault();
						$('#DivMenu3').toggle();
					}else if (!box.length){
						$('#DivMenu3').hide();
					}
				});
				$(window).scroll(function() {
					if ($(this).scrollTop() >= 660) {
						$('nav.main-nav').addClass('stickytop');
					}
					else {
						$('nav.main-nav').removeClass('stickytop');
					}
				});
				$().UItoTop({ easingType: 'easeOutQuart' });

				$('.dropdown-toggle').dropdown();
			});
            $("#city").keyup(function(){
                var frmdata = new FormData();
                frmdata.append('act','search_city');
                frmdata.append('city',$(this).val());
                $.ajax({
                    type: "POST",
                    url: "ajaxwebapi/service.php",
                    data:frmdata,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success: function(response){
                        if(response.msgtype="success")
                        {
                            var list=JSON.parse(response);
                            var str=list.result;
                            var arr=list.result1;
                            var len=arr.length;
                            if(len<3)
                            {
                                document.getElementById("suggesstion-box").style.height = "auto";
                                document.getElementById("suggesstion-box").style.overflowY = "auto";
                            }
                            else
                            {
                                document.getElementById("suggesstion-box").style.height = "152px";
                                document.getElementById("suggesstion-box").style.overflowY = "scroll";
                            }
                            $("#suggesstion-box").show();
                            $("#suggesstion-box").html("");
                            $("#suggesstion-box").html(str);
                        }
                        else if(response.msgtype="error")
                        {
                            showmessage("error","Error Occured!"+response.desc);
                        }
                    },
                    error: function(xhr){
                        showmessage("error","Ajax Call Error!");
                    }
                });
            });
            $("#searchid").keyup(function(){
                var frmdata = new FormData();
                frmdata.append('act','search_keyword');
                frmdata.append('keyword',$(this).val());
                $.ajax({
                    type: "POST",
                    url: "ajaxwebapi/service.php",
                    data:frmdata,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success: function(response){
                        if(response.msgtype="success")
                        {
                            var list=JSON.parse(response);
                            var str=list.result;
                            var arr=list.result1;
                            var len=arr.length;

                            if(len<3)
                            {
                                document.getElementById("suggesstion-box1").style.height = "auto";
                                document.getElementById("suggesstion-box1").style.overflowY = "auto";
                            }
                            else
                            {
                                document.getElementById("suggesstion-box1").style.height = "146px";
                                document.getElementById("suggesstion-box1").style.overflowY = "scroll";
                            }
                            $("#suggesstion-box1").show();
                            $("#suggesstion-box1").html("");
                            $("#suggesstion-box1").html(str);
                        }
                        else if(response.msgtype="error")
                        {
                            showmessage("error","Error Occured!"+response.desc);
                        }
                    },
                    error:function(xhr){
                        showmessage("error","Ajax Call Error!");
                    }
                });
            });
            function selectCity(val)
             {
                $("#city").val(val);
                $("#suggesstion-box").hide();
            }
            function selectCategory(val)
             {
                $("#searchid").val(val);
                $("#suggesstion-box1").hide();
            }
            function hidesuggetionBoxes()
             {
                $("#suggesstion-box").hide();
                $("#suggesstion-box1").hide();
            }
            function setsubProperty()
             {
                var property_type=$("#property_type").val();
                if(property_type != "") {
                    if (property_type == "Residential") {
                        var str = "<option value='1RK'>1RK</option><option value='1BHK'>1BHK</option><option value='2BHK'>2BHK</option><option value='3BHK'>3BHK</option><option value='4BHK'>4BHK</option><option value='5BHK'>5BHK</option><option value='House/Villa'>House/Villa</option><option value='Plot/Land'>Plot/Land</option><option value=''>Sub Property </option>";
                    }
                    else if (property_type == "Commercial") {
                        var str = "<option value='Office Space'>Office Space</option><option value='Shop/Showroom'>Shop/Showroom</option><option value='Commercial Land'>Commercial Land</option><option value='Warehouse/Godown'>Warehouse/Godown</option><option value='Industrial Building'>Industrial Building</option><option value='Industrial Shed'>Industrial Shed</option><option value=''>Sub Property </option>";
                    }
                    else if (property_type == "Other") {
                        var str = "<option value='Agriculture Land'>Agriculture Land</option><option value='Farm House'>Farm House</option><option value=''>Sub Property </option>";
                    }
                    $("#bedroom").html("");
                    $("#bedroom").append(str);
                    $("#bedroom").select2();
                }
                else
                {
                    var str = "<option value=''>&nbsp;&nbsp;Sub Property </option>";
                    $("#bedroom").html("");
                    $("#bedroom").append(str);
                    $("#bedroom").select2();
                }
            }
            function checkproperty()
             {
                var property_type=$("#property_type").val();
                if(property_type == "")
                {
                    showmessage("warning","Please Select Property Type First");
                }
            }

             function setparameters()
             {
                 if(!$("#search").valid())
                 {
                     return;
                 }
                 var city = $("#city").val();
                 var category = $("#searchid").val();
                 var price = $("#budget").val();
                 var propertyType = $("#property_type").val();
                 var subProperty = $("#bedroom").val();
                 var url = "";
                 if(category!="" && price!="" && propertyType!="" && subProperty!="")
                 {
                 url = "PropertyList/"+city+"/"+category+"/"+price+"/"+propertyType+"/"+subProperty;
                 }
                 else if(category!="" && price!="" && propertyType!="")
                 {
                 url = "PropertyList/"+city+"/"+category+"/"+price+"/"+propertyType;
                 }
                 else if(category!="" && propertyType!="" && subProperty!="")
                 {
                 url = "PropertyList/"+city+"/"+category+"/"+propertyType+"/"+subProperty;
                 }
                 else if(category!="" && price!="")
                 {
                 url = "PropertyList/"+city+"/"+category+"/"+price;
                 }
                 else if(category!="" && propertyType!="")
                 {
                 url = "PropertyList/"+city+"/"+category+"/"+propertyType;
                 }
                 else if(category!="")
                 {
                     url = "PropertyList/"+city+"/"+category;
                 }
                 else if(price!="" && propertyType!="" && subProperty!="")
                 {
                 url = "PropertyList/"+city+"/"+price+"/"+propertyType+"/"+subProperty;
                 }
                 else if(price!="" && propertyType!="")
                 {
                 url = "PropertyList/"+city+"/"+price+"/"+propertyType;
                 }
                 else if(price!="")
                 {
                 url = "PropertyList/"+city+"/"+price;
                 }
                 else if(propertyType!="" && subProperty!="")
                 {
                 url = "PropertyList/"+city+"/"+propertyType+"/"+subProperty;
                 }
                 else if(propertyType!="")
                 {
                 url = "PropertyList/"+city+"/"+propertyType;
                 }
                 else
                 {
                 url = "PropertyList/"+city;
                 }
                 $("#search").attr("action",url);
                 $("#search").attr("method","POST");
                 document.getElementById("search").submit();
             }
            function HtmlEncode(str)
            {
             var str1=str.replace(/%20/g, " ");
                return str1;
            }

             function check_box()
             {
				var value=document.getElementById('city').value;
				if(value == "Select city"){
                    showmessage("warning","Please Choose City First");
				}
			}

			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				body = document.body;
	        if(menuLeft !=null)
			{
				menuLeft.onclick = function() {
					classie.toggle( this, 'active' );
					classie.toggle( menuLeft, 'cbp-spmenu-open' );
					disableOther( 'showLeft' );
				};
			}
			function disableOther( button )
            {
				if( button !== 'showLeft' ) {
					classie.toggle( showLeft, 'disabled' );
				}
			}

            if($(window).width() > 299){
			$('.accordion__content:not(:first)').hide();
			$('.accordion__title:first-child').addClass('active');
			} else {
			$('.accordion__content').hide();
			};
			$( ".accordion__content" ).wrapInner( "<div class='overflow-scrolling'></div>" );
			$('.accordion__title').on('click', function() {
			$('.accordion__content').hide();
			$(this).next().show().prev().addClass('active').siblings().removeClass('active');
			});
            function showloginpopup()
            {
                $("#LoginRegister").modal("show");
            }
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
                            $("#LoginRegister").modal("hide");
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
                           // window.location.href="Verify/"+list.lastid;
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


            function showmessage(type,msg)
            {
                var str='';
                if(type=="success")
                {
                    str="<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Well Done!</strong>&nbsp;&nbsp;"+msg+"</div>";
                }
                else if(type=="error")
                {
                    str="<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Error Occured!</strong>&nbsp;&nbsp;"+msg+"</div></div>";
                }
                else if(type=="warning")
                {
                    str="<div class='alert alert-warning'><strong>Warning!</strong>&nbsp;&nbsp;"+msg+"</div>";
                }
                $("#showmessage").html("");
                $("#showmessage").css("display", "block");
                $("#showmessage").css("height", "35px");
                $("#showmessage").append(str);
                setTimeout(function(){ $("#showmessage").html(""); $("#showmessage").css("display", "none"); }, 5000);
            }
            function resendotp()
            {
                var user_id= $("#muser_id").val();
                var frmdata = new FormData();
                frmdata.append('act','resendotp');
                frmdata.append('user_id',user_id);
                var varurl="ajaxwebapi/service.php";
                $.ajax({
                    type:"POST",
                    url:varurl,
                    data:frmdata,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function (response) {
                       if(response.msgtype="success")
                       {
                           $("#resend").html("");
                           $("#resend").append("&nbsp;&nbsp; OTP Sent.. &nbsp;<u><a href='javascript:resendotp()' style='color: #5379FF;'>Resend OTP</a></u>");
                       }
                       else if(response.msgtype="error")
                       {
                           showmessage("error","Error Occured! "+response.desc);
                       }
                    },
                    error:function (xhr) {
                     showmessage("error","Ajax Call Error!");
                    }
                });
            }
</script>
<?php
function sendMessage($text,$mobile){
    $url = 'http://trans.smsfresh.co/api/sendmsg.php';
    $fields = array(
        'user' => 'magarsham',
        'pass' => 'festivito5555',
        'sender' => 'HOMPLN' ,
        'phone' => $mobile,
        'text' => $text,
        'priority' => 'ndnd',
        'stype' => 'normal'
    );
       //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
    // var_dump($result);
}
if(isset($_POST['verify']))
{
    $verification_type = $_POST['mverification_type'];
    if($verification_type=="R")
    {
        $vcode=$_POST['vcode'];
        $user_id = $_POST['muser_id'];
        $result = $mysqli->query("SELECT mob,email FROM signup WHERE user_id=$user_id");
        while ($row = $result->fetch_array()) {
            $mobile = $row[0];
            $email = $row[1];
        }
        $query="SELECT user_id FROM signup WHERE user_id=$user_id AND verification_code=$vcode";
        $result = $mysqli->query($query);
        $count = $result->num_rows;
        if($count>0)
        {
            $mysqli->query("UPDATE signup SET verification_status='True' WHERE user_id=$user_id");
            $smsmsg = "Registration Successfully Done , Now You Can Login To Homeplanetary.com";
            sendMessage($smsmsg,$mobile);

            $to=$email;
            $subject="Registration Successful";
            // From
            $header="from: Homeplanetary";
            // Your message
            $message="Your Registration Process is Successfully Done.\r\n";
            $message.="Click Below Link To Login. \r\n";
            $message.="http://homeplanetary.com/Authentication/";
            // send email
            $sentmail = mail($to,$subject,$message,$header);
            echo '<script type="text/javascript">showmessage("success","Your Account Is Verified Now You Can Login");showloginpopup();</script>';
        }
        else
        {
            echo '<script type="text/javascript">showmessage("Error","OTP Does Not Match , Please Try Again...");</script>';
        }
    }
    else if($verification_type=="E")
    {
        $vcode=$_POST['vcode'];
        $enq_id=$_POST['muser_id'];
        $contactenq = $_POST['contactenq'];
        $contactmob = $_POST['contactmob'];
        $result = $mysqli->query("SELECT mob,email FROM enquiry WHERE enq_id=$enq_id");
        while ($row = $result->fetch_array()) {
            $mobile = $row[0];
            $email = $row[1];
        }
        $query="SELECT enq_id FROM enquiry WHERE enq_id=$enq_id AND verification_code=$vcode";
        $result = $mysqli->query($query);
        $count = $result->num_rows;
        if($count>0)
        {
            $mysqli->query("UPDATE enquiry SET verification_status='True' WHERE enq_id=$enq_id");
            $smsmsg = "Your Enquiry Sent Successfully , Thanks For Showing Interest In This Property.";
            sendMessage($smsmsg,$mobile);
            $to=$email;
            $subject="Enquiry Sent Successful";
            // From
            $header="from: Homeplanetary";
            // Your message
            $message="Thank you for showing interest in this property...\r\n We will get back to you...\r\n";
            $sentmail = mail($to,$subject,$message,$header);
            if($contactenq=="Yes")
            {
                $smsmsg = "Your Requested Mobile Number is :".$contactmob;
                sendMessage($smsmsg,$mobile);
                echo '<script type="text/javascript">$("#contactdiv").html("");$("#contactdiv").html('.$contactmob.');$("#verification-popup").modal("hide");showmessage("success","Your Enquiry has been submitted successfully.");</script>';
            }
            else
            {
                echo '<script type="text/javascript">$("#verification-popup").modal("hide");showmessage("success","Your Enquiry has been submitted successfully.");</script>';
            }
        }
        else
        {
            echo '<script type="text/javascript">showmessage("error","OTP Does Not Match , Please Try Again...");</script>';
        }
    }
}
?>
</body>
</html>