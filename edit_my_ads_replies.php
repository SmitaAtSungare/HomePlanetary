<?php
include 'login.php'; // Includes Login Script
if(isset($_SESSION['login_user'])) {
    include('header.php');
    include_once("analyticstracking.php");
    $user_type = $_SESSION['user_type'];
    $user_name = $_SESSION['user_name'];
    $user_email = $_SESSION['user_email'];
    $user_id = $_SESSION['user_id'];
?>
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
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div id="sticky-anchor"></div>
    <!--header end-->
    <div class="clearfix"></div>
    <!---->
    <div class="container" style="background:#FDFDFD; box-shadow:0px 7px 11px #ccc;  margin-top: 5px;">
        <div class="myqkr-hdiv" style="margin-left: 360px;"><h3>Edit Ads Replies</h3></div>
        <?php
        $id = $_GET['id'];
        //execute the SQL query and return records
        $result = $mysqli->query("SELECT * FROM enquiry WHERE enq_id='$id'");
        while ($row = $result->fetch_array()) :
        ?>
        <form method="post" name="f1" id="f1" enctype="multipart/form-data" action="">
            <div class="estate-form2">
                <center>
                    <div class="form-group">
                        <b><font color="#DD0A16"><?php echo $row['property_name']; ?></font></b>
                    </div>
                    <input type="hidden" name="property_name" id="property_name"
                           value="<?php echo $row['property_name']; ?>">
                    <input type="hidden" name="mobile1" id="mobile1" value="<?php echo $row['username']; ?>">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>"/>
                    <input type="hidden" name="enq_id" id="enq_id" value="<?php echo $_GET['id']; ?>"/>
                    <input type="hidden" name="property_id" id="property_id"
                           value="<?php echo $row['property_id']; ?>"/>
                    <div class="col-md-12" style="margin-left: 276px;">
                        <br/>
                        <div class="row">
                            <div class="form-group realestateform has-feedback">
                                <label class="sr-only" for="exampleInputEmail3">Enter your name</label>
                                <div class="col-xs-8">
                                    <div class="col-xs-12">
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="Enter your name" value="<?php echo $row['name']; ?>"
                                               required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group realestateform has-feedback">
                                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                <div class="col-xs-8">
                                    <div class="col-xs-12">
                                        <input type="email" name="email" class="form-control" id="email"
                                               placeholder="Email" value="<?php echo $row['email']; ?>" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="form-group realestateform has-feedback">
                                <label class="sr-only" for="exampleInputAmount">Mobile</label>

                                <div class="col-xs-8">
                                    <div class="col-xs-12">
                                        <input type="text" name="mobile" class="form-control" id="mobile"
                                               placeholder="10 digit number" value="<?php echo $row['mob']; ?>"
                                               required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="form-group realestateform has-feedback">
                                <label class="sr-only" for="exampleInputEmail3">Comments</label>
                                <div class="col-xs-8">
                                    <div class="col-xs-12">
                                        <input type="text" name="comments" class="form-control" id="comments"
                                               placeholder="Comments here..." value="<?php echo $row['comments']; ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="form-group realestateform has-feedback">
                                <div class="col-xs-8">
                                    <div class="col-xs-12">
                                        <div class="g-recaptcha"
                                             data-sitekey="6LeHLQcUAAAAAJ_PF_c3x6UiaHi8NHUzQmlFY1mt"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="form-group realestateform has-feedback">
                                <div class="col-xs-8">
                                    <div class="col-xs-12">
                                        <button type="button" name="send" class="price-btn" onclick="updateenquiry()">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
            </div>
    </div>
    <div class="clear"></div>
    </form>

<?php endwhile; ?>
    </div>
    </div>
    <?php
    include('footer.php');
    ?>
    <script>
        function loadenquiry() {
            var frmdata = new FormData();
            frmdata.append('act', 'loadenquiry');
            frmdata.append('enquiry_id', $("#enq_id").val());

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
                        var list = JSON.parse(response);
                        var arr = list.result;
                        document.getElementById("property_name").value = arr[0].property_name;
                        document.getElementById("property_id").value = arr[0].property_id;
                        document.getElementById("mobile1").value = arr[0].mobile1;
                        document.getElementById("name").value = arr[0].name;
                        document.getElementById("email").value = arr[0].email;
                        document.getElementById("mobile").value = arr[0].mobile;
                        document.getElementById("comments").value = arr[0].comments;
                    }
                    else if (response.msgtype = "error") {
                        showmessage("error","Error Occoured!"+response.desc);
                    }
                },
                error: function (xhr) {
                    showmessage("error","Ajax Call Error");
                }
            });
        }

        function updateenquiry() {
            if (!$("#f1").valid()) {
                //alert("Invalid form");
                return;
            }
            var frmdata = new FormData();
            frmdata.append('act', 'updateenquiry');
            frmdata.append('enquiry_id', $("#enq_id").val());
            frmdata.append('property_id', $("#property_id").val());
            frmdata.append('property_name', $("#property_name").val());
            frmdata.append('username', $("#mobile1").val());
            frmdata.append('name', $("#name").val());
            frmdata.append('email', $("#email").val());
            frmdata.append('mobile', $("#mobile").val());
            frmdata.append('comments', $("#comments").val());
            frmdata.append('user_id', $("#user_id").val());

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
                        showmessage("success","Updated Successfully");
                        window.location.href = "MyEnquiries/";
                    }
                    else if (response.msgtype = "error") {
                        showmessage("error","Error Occoured!"+response.desc);
                    }
                },
                error: function (xhr) {
                    showmessage("error","Ajax Call Error");
                }
            });
        }

        $(document).ready(function () {
            loadenquiry();
        });
    </script>
<?php
}
else
{
    header('location:'.$base.'Home/');
}
?>