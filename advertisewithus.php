<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])) {
include('header.php');
?>
<body xmlns="http://www.w3.org/1999/html">
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
    <div class="container" style="background:#fff; box-shadow:0px 7px 11px #ccc; padding:30px;">
        <div class="content-main2">
            <form method="post" name="frmad" id="frmad" enctype="multipart/form-data">
                <div class="advertise-main">
                    <div class="">
                        <div class="adverise-labletxt">Enter Name*</div>
                        <input type="text" class="adverise-input" name="nm" id="nm" placeholder="Enter Name" required/>
                    </div>
                    <div class="blank20"></div>
                    <div class="">
                        <div class="adverise-labletxt">E-Mail Id*</div>
                        <input type="text" class="adverise-input" name="email" id="email" placeholder="E-mail Id"
                               required/>
                    </div>
                    <div class="blank20"></div>
                    <div class="">
                        <div class="adverise-labletxt">Mobile Number*</div>
                        <input type="text" class="adverise-input" name="mob" id="mob" placeholder="Mobile Number"
                               required/>
                    </div>
                    <div class="clearfix"></div>
                    <div class="">
                        <div class="adverise-labletxt">Message</div>
                        <textarea style="height:100px;" class="adverise-input " rows="" cols="" id="message" name="msg"
                                  placeholder="Message"></textarea>
                    </div>
                    <div class="blank20"></div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <div class="adverise-labletxt">Select Image</div>
                        <input type="file" name="photo" id="exampleInputFile" required>
                    </div>
                    <button type="button" class="btn btn-small btn-primary" name="submit" onclick="advertisewithus()">
                        Save
                    </button>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
        <!-- end registration -->
    </div>
    <?php include('footer.php'); ?>
    <script>
        function advertisewithus() {
            if (!$("#frmad").valid()) {
                return;
            }
            var frmdata = new FormData();
            frmdata.append('act', 'advertisewithus');
            frmdata.append('nm', $("#nm").val());
            frmdata.append('email', $("#email").val());
            frmdata.append('mob', $("#mob").val());
            frmdata.append('message', $("#message").val());
            frmdata.append('file', $("#exampleInputFile")[0].files[0]);

            var varurl = "ajaxwebapi/service.php";
            $.ajax({
                url: varurl,
                type: "POST",
                data: frmdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.msgtype = "success") {
                        showmessage("success","Inserted Successfully");
                        window.location.href = "Home/";
                    }
                    else if (response.msgtype = "error") {
                        showmessage("error","Error Occoured:" + response.desc);
                    }
                },
                error: function (xhr) {
                    showmessage("error","Ajax Call Error");
                }
            });
        }
    </script>
<?php
}
else
{
    header('location:'.$base.'Home/');
}
?>