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
    <link rel="stylesheet" href="admin/plugins/select2/select2.min.css">
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
        <div class="myqkr-hdiv" style="margin-left: 50px;"><h3>Edit Ads</h3></div>
        <?php
        $id = $_GET['id'];
        //execute the SQL query and return records
        $result = $mysqli->query("SELECT * FROM add_posting WHERE property_id='$id'");
        while ($row = $result->fetch_array()) :
            ?>
            <form method="post" id="frmpost" name="frmpost" enctype="multipart/form-data">
                <input type="hidden" id="property_id" name="property_id" value="<?php echo $id; ?>"/>
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>"/>
                <div class="col-md-12"
                     style="border-bottom:1px solid #ccc;    padding-top: 40px;  padding-bottom:10px; margin-bottom:10px;">
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">PROJECT NAME<span
                                    style="color:red">*</span></label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control-realestate" id="property_name"
                                       name="property_name" placeholder="Project Name"
                                       value="<?php echo $row['property_name']; ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">CITY<span
                                    style="color:red">*</span></label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control-realestate" id="city" name="city"
                                       placeholder="City" value="<?php echo $row['city']; ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">LOCALITY<span
                                    style="color:red">*</span></label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control-realestate" id="locality" name="locality"
                                       placeholder="Locality" value="<?php echo $row['locality']; ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">ADDRESS<span
                                    style="color:red">*</span></label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control-realestate" id="address" name="address"
                                       placeholder="Address" value="<?php echo $row['address']; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">LANDMARK<span
                                    style="color:red">*</span></label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control-realestate" id="landmark" name="landmark"
                                       placeholder="Landmark" value="<?php echo $row['landmark']; ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">PROPERTY TYPE<span
                                    style="color:red">*</span></label>
                            <div class="col-xs-4">
                                <select id="property_type" name="property_type" class="form-control-realestate"
                                        onchange="setsubProperty()"  required>
                                    <?php
                                    if ($row['property_type'] == "")
                                    {
                                        echo "<option value=''>SELECT</option>";
                                    }
                                    else {
                                        echo "<option value='".$row['property_type']."'>".$row['property_type']."</option>";
                                    }
                                    echo "<option value='Residential'>Residential</option>";
                                    echo "<option value='Commercial'>Commercial</option>";
                                    echo "<option value='Other'>Other</option>";
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="subPropertyDiv" >
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">BEDROOM<span style="color:red">*</span></label>
                            <div class="col-xs-4">
                                <select id="bedroom" name="bedroom" class="form-control-realestate" required>
                                    <?php
                                    if($row['property_type'] == "Residential")
                                    {
                                        if($row['bedroom'] == "")
                                        {
                                            echo "<option value=''>SELECT</option>";
                                        }
                                        else
                                        {
                                            echo "<option value='".$row['bedroom']."'>".$row['bedroom']."</option>";
                                        }
                                        echo "<option value='1RK'>1RK</option>";
                                        echo "<option value='1BHK'>1BHK</option>";
                                        echo "<option value='2BHK'>2BHK</option>";
                                        echo "<option value='3BHK'>3BHK</option>";
                                        echo "<option value='4BHK'>4BHK</option>";
                                        echo "<option value='5BHK'>5BHK</option>";
                                        echo "<option value='House/Villa'>House/Villa</option>";
                                        echo "<option value='Plot/Land'>Plot/Land</option>";
                                    }
                                    else if($row['property_type'] == "Commercial")
                                    {
                                        if($row['bedroom'] == "")
                                        {
                                            echo "<option value=''>SELECT</option>";
                                        }
                                        else
                                        {
                                            echo "<option value='".$row['bedroom']."'>".$row['bedroom']."</option>";
                                        }
                                        echo "<option value='Office Space'>Office Space</option>";
                                        echo "<option value='Shop/Showroom'>Shop/Showroom</option>";
                                        echo "<option value='Commercial Land'>Commercial Land</option>";
                                        echo "<option value='Warehouse/Godown'>Warehouse/Godown</option>";
                                        echo "<option value='Industrial Building'>Industrial Building</option>";
                                        echo "<option value='Industrial Shed'>Industrial Shed</option>";
                                    }
                                    else if($row['property_type'] == "Other")
                                    {
                                        if($row['bedroom'] == "")
                                        {
                                            echo "<option value=''>SELECT</option>";
                                        }
                                        else
                                        {
                                            echo "<option value='".$row['bedroom']."'>".$row['bedroom']."</option>";
                                        }
                                        echo "<option value='Agriculture Land'>Agriculture Land</option>";
                                        echo "<option value='Farm House'>Farm House</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">TRANSACTION TYPE<span
                                    style="color:red">*</span></label>
                            <div class="col-xs-4">
                                <select id="transaction_type" name="transaction_type" class="form-control-realestate"
                                        required>
                                    <?php
                                    if ($row['transaction_type'] == "") {
                                        echo "<option value=''>SELECT</option>";
                                    }
                                    else {
                                        echo "<option value='".$row['transaction_type']."'>".$row['transaction_type']."</option>";
                                    }
                                    echo "<option value='New'>New</option>";
                                    echo "<option value='Resale'>Resale</option>";

                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">POSSESSION DATE<span
                                    style="color:red">*</span></label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control-realestate" id="possession" name="possession"
                                       placeholder="Possession Date" value="<?php echo $row['possession']; ?>"
                                       required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">PRICE<span
                                    style="color:red">*</span></label>
                            <div class="col-xs-4">
                                 <select id="price" name="price" class="form-control-realestate"  required />
                                           <?php
                                           if($row['price']=="")
                                           {
                                               echo "<option value=''>&nbsp;&nbsp;SELECT</option>";
                                           }
                                           else
                                           {
                                               echo "<option value='".$row['price']."'>&nbsp;&nbsp;".$row['price']."</option>";
                                           }
                                           ?>
                                        <option value="5 to 10 Lakh">&nbsp;&nbsp;5 to 10 Lakh</option>
                                        <option value="11 to 15 Lakh">&nbsp;&nbsp;11 to 15 Lakh</option>
                                        <option value="15 to 20 Lakh">&nbsp;&nbsp;15 to 20 Lakh</option>
                                        <option value="21 to 25 Lakh">&nbsp;&nbsp;21 to 25 Lakh</option>
                                        <option value="25 to 30 Lakh">&nbsp;&nbsp;25 to 30 Lakh</option>
                                        <option value="31 to 35 Lakh">&nbsp;&nbsp;31 to 35 Lakh</option>
                                        <option value="35 to 40 Lakh">&nbsp;&nbsp;35 to 40 Lakh</option>
                                        <option value="41 to 45 Lakh">&nbsp;&nbsp;41 to 45 Lakh</option>
                                        <option value="45 to 50 Lakh">&nbsp;&nbsp;45 to 50 Lakh</option>
                                        <option value="51 to 55 Lakh">&nbsp;&nbsp;51 to 55 Lakh</option>
                                        <option value="55 to 60 Lakh">&nbsp;&nbsp;55 to 60 Lakh</option>
                                        <option value="61 to 65 Lakh">&nbsp;&nbsp;61 to 65 Lakh</option>
                                        <option value="65 to 70 Lakh">&nbsp;&nbsp;65 to 70 Lakh</option>
                                        <option value="71 to 75 Lakh">&nbsp;&nbsp;71 to 75 Lakh</option>
                                        <option value="75 to 80 Lakh">&nbsp;&nbsp;75 to 80 Lakh</option>
                                        <option value="81 to 85 Lakh">&nbsp;&nbsp;81 to 85 Lakh</option>
                                        <option value="85 to 90 Lakh">&nbsp;&nbsp;85 to 90 Lakh</option>
                                        <option value="91 to 95 Lakh">&nbsp;&nbsp;91 to 95 Lakh</option>
                                        <option value="95 to 99 lakh">&nbsp;&nbsp;95 to 99 lakh</option>
                                        <option value="1 to 2 Cr">&nbsp;&nbsp;1 to 2 Cr</option>
                                        <option value="2 to 3 Cr">&nbsp;&nbsp;2 to 3 Cr</option>
                                        <option value="3 to 4 Cr">&nbsp;&nbsp;3 to 4 Cr</option>
                                        <option value="4 to 5 Cr">&nbsp;&nbsp;4 to 5 Cr</option>
                                   </select>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group realestateform has-feedback">
                        <label for="Price" class="col-sm-3 control-label">AREA SIZE<span
                                style="color:red">*</span></label>
                        <div class="col-xs-4">
                            <input type="text" placeholder="Enter Size" class="form-control-realestate" id="area"
                                   name="area" value="<?php echo $row['area_sqft']; ?>" required />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">RATE/SQ.FT<span style="color:red">*</span></label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control-realestate" id="rate_sqft" name="rate_sqft"
                                       placeholder="Rate Sq.Ft" value="<?php echo $row['rate_sqft']; ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">NO OF FLOOR<span
                                    style="color:red">*</span></label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control-realestate" id="floor_no" name="floor_no"
                                       placeholder="No Of Floor" value="<?php echo $row['floor_no']; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">AMENITIES<span style="color:red">*</span></label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control-realestate" id="amenities" name="amenities"
                                       placeholder="Amenities" value="<?php echo $row['amenities']; ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">NEARBY SERVICES<span
                                    style="color:red">*</span></label>
                            <div class="col-md-8">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr class="">
                                            <td>Airport</td>
                                            <td> Airport</td>
                                            <td><input type="text" id="airport" name="airport" placeholder="Airport"
                                                       value="<?php echo $row['airport']; ?>"/></td>
                                            <td>KM</td>
                                        </tr>
                                        <tr>
                                            <td>Railway station</td>
                                            <td> Railway station</td>
                                            <td><input type="text" id="train" name="train" placeholder="Railway Station"
                                                       value="<?php echo $row['train']; ?>"/></td>
                                            <td>KM</td>
                                        </tr>
                                        <tr class="">
                                            <td>Bustop.</td>
                                            <td>multiple</td>
                                            <td><input type="text" id="bustop" name="bustop" placeholder="Bustop"
                                                       value="<?php echo $row['bustop']; ?>"/></td>
                                            <td>KM</td>
                                        </tr>
                                        <tr>
                                            <td>Nearest School</td>
                                            <td>multiple</td>
                                            <td><input type="text" id="school" name="school"
                                                       placeholder="Nearest School"
                                                       value="<?php echo $row['school']; ?>"/></td>
                                            <td>KM</td>
                                        </tr>
                                        <tr class="">
                                            <td>Nearest Hospital</td>
                                            <td>multiple</td>
                                            <td><input type="text" id="hospital" name="hospital"
                                                       placeholder="Nearest Hospital"
                                                       value="<?php echo $row['hospital']; ?>"/></td>
                                            <td>KM</td>
                                        </tr>
                                        <tr>
                                            <td>Nearest Restaurant</td>
                                            <td>multiple</td>
                                            <td><input type="text" id="resto" name="resto"
                                                       placeholder="Nearest Restaurant"
                                                       value="<?php echo $row['resto']; ?>"/></td>
                                            <td>KM</td>
                                        </tr>
                                        <tr>
                                            <td>Nearest Bank/ ATM</td>
                                            <td>multiple</td>
                                            <td><input type="text" id="bank" name="bank" placeholder="Nearest Bank/ATM"
                                                       value="<?php echo $row['bank']; ?>"/></td>
                                            <td>KM</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">Aavailabilty<span style="color:red">*</span></label>
                            <div class="col-xs-8">
                                <select id="availability" name="availability" class="form-control-realestate" required>
                                    <?php
                                    if($row['availability']=="")
                                    {
                                        echo "<option value=''>SELECT</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$row['availability']."'>".$row['availability']."</option>";
                                    }
                                    ?>
                                    <option value="Under Construction">Under Construction</option>
                                    <option value="Ready For Use">Ready For Use</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-2 control-label">PROPERTY DETAIL<span
                                    style="color:red">*</span></label>
                            <div class="col-xs-8">
                                <div class="col-xs-12">
                                    <textarea class="form-control psttext" rows="3" cols="70" data-bv-field="desc"
                                              id="property_details" name="property_details"
                                              placeholder="Property Details"><?php echo $row['property_details']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label"><?php echo strtoupper($user_type);?>&nbsp;NAME <span
                                    style="color:red">*</span></label>
                            <div class="col-xs-3">
                                <input type="text" class="form-control-realestate2" readonly id="name" name="uname"
                                       placeholder="<?php echo strtoupper($user_type)?>&nbsp;Name" value="<?php echo $user_name; ?>"
                                       required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">
                                ARE YOU A<span style="color:red">*</span></label>
                            <div class="col-xs-4">
                                <select name="owner_type" id="owner_type" class="form-control-realestate" style="width:250px;" readonly required>
                                    <?php
                                    if($user_type=="")
                                    {
                                        echo "<option value=''>Select</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$user_type."'>".$user_type."</option>";
                                    }
                                    echo "<option value='Builder'>Builder</option>";
                                    echo "<option value='Agent'>Agent</option>";
                                    echo "<option value='Owner'>Owner</option>";
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">E-MAIL ID<span style="color:red">*</span></label>
                            <div class="col-xs-3">
                                <input type="text" class="form-control-realestate2" id="email" name="email"
                                       placeholder="E-mail Id" value="<?php echo $user_email; ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">MOBILE NUMBER<span
                                    style="color:red">*</span></label>
                            <?php if (!empty($_SESSION['s_phno'])) { ?>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control-realestate2" id="mob" readonly name="mob"
                                           placeholder="Mobile Number" value="<?php echo $_SESSION['s_phno']; ?>"
                                           required />
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">LANDLINE NUMBER<span
                                    style="color:red">*</span></label>
                            <div class="col-xs-3">
                                <input type="text" class="form-control-realestate2" id="landline" name="landline"
                                       placeholder="Landline Number" value="<?php echo $row['landline']; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group realestateform has-feedback">
                            <label for="title" class="col-sm-3 control-label">ABOUT BUILDER<span
                                    style="color:red">*</span></label>
                            <div class="col-xs-3">
                                <textarea class="form-control psttext" rows="3" cols="70" data-bv-field="desc"
                                          id="about_builder" name="about_builder"
                                          placeholder="About Builder"><?php echo $row['about_builder']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="col-md-12" style="border-top:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
                        <div class="form-group pstAd">
                            <div class="controls sbt">
                                <button type="button" class="btn btn-small btn-primary" id="cmdSubmit" name="update"
                                        onclick="updateAd()">Update
                                </button>
                                <!--  <input type="submit" class="btn btn-small btn-primary" id="cmdSubmit" value="Update" name="update"> -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endwhile; ?>
    </div>
    </div>
    <?php  include('footer.php'); ?>
    <script type="text/javascript" src="admin/plugins/select2/select2.min.js"></script>
    <script>
        function loadsingleAd() {
            var frmdata = new FormData();
            frmdata.append('act', 'loadsingleAd');
            frmdata.append('property_id', $("#property_id").val());

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
                        // alert(response.result);
                        var list = JSON.parse(response);
                        var arr = list.result;
                        //arr[0].property_id
                        document.getElementById("property_name").value = arr[0].property_name;
                        document.getElementById("city").value = arr[0].city;
                        document.getElementById("locality").value = arr[0].locality;
                        document.getElementById("address").value = arr[0].address;
                        document.getElementById("landmark").value = arr[0].landmark;
                        document.getElementById("property_type").value = arr[0].property_type;
                        document.getElementById("transaction_type").value = arr[0].transaction_type;
                        document.getElementById("bedroom").value = arr[0].bedroom;
                        document.getElementById("possession").value = arr[0].possession;
                        document.getElementById("price").value = arr[0].price;
                        document.getElementById("area").value = arr[0].area;
                        document.getElementById("rate_sqft").value = arr[0].rate_sqft;
                        document.getElementById("floor_no").value = arr[0].floor_no;
                        document.getElementById("amenities").value = arr[0].amenities;
                        document.getElementById("airport").value = arr[0].airport;
                        document.getElementById("train").value = arr[0].train;
                        document.getElementById("bustop").value = arr[0].bustop;
                        document.getElementById("school").value = arr[0].school;
                        document.getElementById("hospital").value = arr[0].hospital;
                        document.getElementById("resto").value = arr[0].resto;
                        document.getElementById("bank").value = arr[0].bank;
                        document.getElementById("property_details").value = arr[0].property_details;
                        document.getElementById("name").value = arr[0].name;
                        document.getElementById("owner_type").value = arr[0].owner_type;
                        document.getElementById("email").value = arr[0].email;
                        document.getElementById("mob").value = arr[0].mob;
                        document.getElementById("landline").value = arr[0].landline;
                        document.getElementById("about_builder").value = arr[0].about_builder;
                        document.getElementById("availability").value = arr[0].availability;
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

        function updateAd() {
            if (!$("#frmpost").valid()) {
                //alert("Invalid form");
                return;
            }
            var frmdata = new FormData();
            frmdata.append('act', 'updateAd');
            frmdata.append('property_id', $("#property_id").val());
            frmdata.append('user_id', $("#user_id").val());
            frmdata.append('property_name', $("#property_name").val());
            frmdata.append('city', $("#city").val());
            frmdata.append('locality', $("#locality").val());
            frmdata.append('address', $("#address").val());
            frmdata.append('landmark', $("#landmark").val());
            frmdata.append('property_type', $("#property_type").val());
            frmdata.append('transaction_type', $("#transaction_type").val());
            frmdata.append('bedroom', $("#bedroom").val());
            frmdata.append('possession', $("#possession").val());
            frmdata.append('price', $("#price").val());
            frmdata.append('area_sqft', $("#area").val());
            frmdata.append('rate_sqft', $("#rate_sqft").val());
            frmdata.append('floor_no', $("#floor_no").val());
            frmdata.append('amenities', $("#amenities").val());
            frmdata.append('airport', $("#airport").val());
            frmdata.append('train', $("#train").val());
            frmdata.append('bustop', $("#bustop").val());
            frmdata.append('school', $("#school").val());
            frmdata.append('hospital', $("#hospital").val());
            frmdata.append('resto', $("#resto").val());
            frmdata.append('bank', $("#bank").val());
            frmdata.append('property_details', $("#property_details").val());
            frmdata.append('name', $("#name").val());
            frmdata.append('owner_type', $("#owner_type").val());
            frmdata.append('email', $("#email").val());
            frmdata.append('mob', $("#mob").val());
            frmdata.append('landline', $("#landline").val());
            frmdata.append('about_builder', $("#about_builder").val());

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
                        window.location.href = "MyAds/";
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
            loadsingleAd();
            $("#possession").datepicker({autoclose:true});
            $("#price").select2();
            $("#property_type").select2();
            $("#transaction_type").select2();
            $("#owner_type").select2();
            $("#bedroom").select2();
            $("#availability").select2();
            var usedNames = {};
            $("select[name='price'] > option").each(function () {
                if(usedNames[this.text]) {
                    $(this).remove();
                } else {
                    usedNames[this.text] = this.value;
                }
            });
            var usedNames = {};
            $("select[name='transaction_type'] > option").each(function () {
                if(usedNames[this.text]) {
                    $(this).remove();
                } else {
                    usedNames[this.text] = this.value;
                }
            });
            var usedNames = {};
            $("select[name='owner_type'] > option").each(function () {
                if(usedNames[this.text]) {
                    $(this).remove();
                } else {
                    usedNames[this.text] = this.value;
                }
            });
            var usedNames = {};
            $("select[name='availability'] > option").each(function () {
                if(usedNames[this.text]) {
                    $(this).remove();
                } else {
                    usedNames[this.text] = this.value;
                }
            });
        });
        function setsubProperty()
        {
            var property_type=$("#property_type").val();
            var str1 = "<div class='form-group realestateform has-feedback'><label for='title' class='col-sm-3 control-label' style='margin-right: 14px;'>PROPERTY SUB TYPE<span style='color:red'>*</span></label><div id='subProperty'>";
            var str2 = "</div></div><br>";
            if(property_type != "") {
                if (property_type == "Residential") {
                    var str = "<select id='bedroom' name='bedroom' class='' style='width:288px;margin-left:5px;' required><option value=''>SELECT</option><option value='1RK'>1RK</option><option value='1BHK'>1BHK</option><option value='2BHK'>2BHK</option><option value='3BHK'>3BHK</option><option value='4BHK'>4BHK</option><option value='5BHK'>5BHK</option><option value='House/Villa'>House/Villa</option><option value='Plot/Land'>Plot/Land</option></select>";
                }
                else if (property_type == "Commercial") {
                    var str = "<select id='bedroom' name='bedroom' class='' style='width:288px;margin-left:5px' required><option value=''>SELECT</option><option value='Office Space'>Office Space</option><option value='Shop/Showroom'>Shop/Showroom</option><option value='Commercial Land'>Commercial Land</option><option value='Warehouse/Godown'>Warehouse/Godown</option><option value='Industrial Building'>Industrial Building</option><option value='Industrial Shed'>Industrial Shed</option></select>";
                }
                else if (property_type == "Other") {
                    var str = "<select id='bedroom' name='bedroom' class='' style='width:288px;margin-left:5px;' required><option value=''>SELECT</option><option value='Agriculture Land'>Agriculture Land</option><option value='Farm House'>Farm House</option></select>";
                }
                var str3= str1+str+str2;
                $("#subPropertyDiv").html("");
                $("#subPropertyDiv").append(str3);
                $("#bedroom").select2();
                document.getElementById("subPropertyDiv").style.display = "block";
            }
        }
    </script>
<?php
}
else
{
    header('location:'.$base.'Home/');
}
?>