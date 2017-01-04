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

                <?php
                $result2 = $mysqli->query("SELECT * FROM property_list WHERE property_id=$id");
                $pcount = $result2->num_rows;
                if($pcount>0) {
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <table>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href="javascript:showpropertypopup()" style="color:#05427d;font-size: 16px;">
                                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-plus"></i>&nbsp;&nbsp;Add
                                            Property</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <br/>
                            <input type="hidden" id="hfprotable" name="hfprotable"/>
                            <div id="propertyTbl" style="overflow-x:scroll!important;">
                                <table id="tblProd"
                                       class="table table-hover table-nomargin dataTable table-bordered dataTable-scroller dataTable-tools"
                                       data-ajax-source="js/plugins/datatables/demo.txt">
                                    <thead>
                                    <tr>
                                        <th>Floor Plan</th>
                                        <th>Property Type</th>
                                        <th>SubProperty</th>
                                        <th>Tranasaction</th>
                                        <th>Price</th>
                                        <th>Possession</th>
                                        <th>Size</th>
                                        <th>Rate Sqft.</th>
                                        <th>Floor No.</th>
                                        <th width="30px" align="center">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else
                {
                    ?>
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
                                    <select id="budget" name="budget" class="form-control-realestate"  required />
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
                <?php
                }
                ?>






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
    <div id="property-popup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="clearproperty()">&times;</button>
                    <h4 class="modal-title">Enter Property Details</h4>
                </div>
                <div class="modal-body">

                    <form id="propertyfrm" name="propertyfrm" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="floorpath" name="floorpath"/>
                        <input type="hidden" id="budget" name="budget"/>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Property Type</label>
                                    <select id="property_type" name="property_type" class="form-control" style='width:255px;' onchange="setsubProperty()" required>
                                        <option value="">Property Type</option>
                                        <option value="Residential">Residential</option>
                                        <option value="Commercial">Commercial</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">BEDROOM</label>
                                    <div class="row" id="subPropertyDiv">
                                        <select id="bedroom" name="bedroom" class="" style="width:255px;" required>
                                            <option value=''>SELECT</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Transaction Type</label>
                                    <select id="transaction_type" name="transaction_type" class="form-control" style='width:255px;' required>
                                        <option value="">Transaction Type</option>
                                        <option value="New">New</option>
                                        <option value="Resale">Resale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Price</label>

                                    <div class="dropdown">

                                        <button id="min-max-price-range" class="btn btn-default dropdown-toggle" style="width: 161px;margin-left: -14px;" href="#" data-toggle="dropdown"><span id="bval">Budget</span><strong class="caret" style="margin-left: 80px;"></strong>
                                        </button>
                                        <div class="dropdown-menu col-sm-2" style="padding:10px;height: 340px;overflow-y: scroll;margin-left: -16px;width: 210px;">

                                            <div class="col-xs-5">
                                                <input class="form-control price-label" placeholder="Min" id="minval" style="width: 87px;margin-left: -23px;" data-dropdown-id="price-min"/>
                                            </div>
                                            <div class="col-xs-2"> - </div>
                                            <div class="col-xs-5">
                                                <input class="form-control price-label" placeholder="Max" id="maxval" style="width: 84px;margin-left: 7px;margin-top: -20px;" data-dropdown-id="price-max"/>
                                            </div>
                                            <div class="clearfix"></div>
                                            <ul id="price-min" class="col-sm-12 price-range list-unstyled">
                                                <li data-value="">Min</li>
                                                <li data-value="5 Lakh">5 Lakh</li>
                                                <li data-value="10 Lakh">10 Lakh</li>
                                                <li data-value="15 Lakh">15 Lakh</li>
                                                <li data-value="20 Lakh">20 Lakh</li>
                                                <li data-value="25 Lakh">25 Lakh</li>
                                                <li data-value="30 Lakh">30 Lakh</li>
                                                <li data-value="35 Lakh">35 Lakh</li>
                                                <li data-value="40 Lakh">40 Lakh</li>
                                                <li data-value="45 Lakh">45 Lakh</li>
                                                <li data-value="50 Lakh">50 Lakh</li>
                                                <li data-value="55 Lakh">55 Lakh</li>
                                                <li data-value="60 Lakh">60 Lakh</li>
                                                <li data-value="65 Lakh">65 Lakh</li>
                                                <li data-value="70 Lakh">70 Lakh</li>
                                                <li data-value="75 Lakh">75 Lakh</li>
                                                <li data-value="80 Lakh">80 Lakh</li>
                                                <li data-value="85 Lakh">85 Lakh</li>
                                                <li data-value="90 Lakh">90 Lakh</li>
                                                <li data-value="95 lakh">95 lakh</li>
                                                <li data-value="1 Cr">1 Cr</li>
                                                <li data-value="2 Cr">2 Cr</li>
                                                <li data-value="3 Cr">3 Cr</li>
                                                <li data-value="4 Cr">4 Cr</li>
                                                <li data-value="5 Cr">5 Cr</li>
                                            </ul>
                                            <ul id="price-max" class="col-sm-12 price-range text-right list-unstyled hide">
                                                <li data-value="">Max</li>
                                                <li data-value="5 Lakh">5 Lakh</li>
                                                <li data-value="10 Lakh">10 Lakh</li>
                                                <li data-value="15 Lakh">15 Lakh</li>
                                                <li data-value="20 Lakh">20 Lakh</li>
                                                <li data-value="25 Lakh">25 Lakh</li>
                                                <li data-value="30 Lakh">30 Lakh</li>
                                                <li data-value="35 Lakh">35 Lakh</li>
                                                <li data-value="40 Lakh">40 Lakh</li>
                                                <li data-value="45 Lakh">45 Lakh</li>
                                                <li data-value="50 Lakh">50 Lakh</li>
                                                <li data-value="55 Lakh">55 Lakh</li>
                                                <li data-value="60 Lakh">60 Lakh</li>
                                                <li data-value="65 Lakh">65 Lakh</li>
                                                <li data-value="70 Lakh">70 Lakh</li>
                                                <li data-value="75 Lakh">75 Lakh</li>
                                                <li data-value="80 Lakh">80 Lakh</li>
                                                <li data-value="85 Lakh">85 Lakh</li>
                                                <li data-value="90 Lakh">90 Lakh</li>
                                                <li data-value="95 lakh">95 lakh</li>
                                                <li data-value="1 Cr">1 Cr</li>
                                                <li data-value="2 Cr">2 Cr</li>
                                                <li data-value="3 Cr">3 Cr</li>
                                                <li data-value="4 Cr">4 Cr</li>
                                                <li data-value="5 Cr">5 Cr</li>
                                            </ul>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Possession Date</label>
                                    <input type="text" class="form-control" id="possession" name="possession" placeholder="Possession Date" required/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Size (Sq.feet/sq.mtr)</label>
                                    <input type="text" class="form-control" placeholder="Enter Size(sq.feet/sq.mtr)" id="area" name="area" required/>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Rate Sq.Ft</label>
                                    <input type="text" class="form-control" id="rate_sqft" name="rate_sqft" placeholder="Rate Sq.Ft" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">No Of Floor</label>
                                    <input type="text" class="form-control" id="floor_no" name="floor_no" placeholder="No Of Floor"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Floor Plan Image</label>
                                    <input type="file" id="floor_plan" name="floor_plan" required  class="form-control-realestate2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="button" id="Add" name="Add" class="btn btn-default" onclick="AddProperty()">Add</button>
                                <button type="reset" class="btn btn-default" data-dismiss="modal" onclick="clearproperty()">Close</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <?php
    $property_id = $_GET['id'];
    $result = $mysqli->query("SELECT property_type,bedroom,transaction_type,price,possession,area,rate_sqft,floor_no,floor_plan FROM property_list WHERE property_id=$property_id");
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
//print_r($rows);
    if(count($rows)==0)
    {
        $prod='[]';
    }
    else
    {
        $prod=json_encode($rows);
    }
    ?>
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
            frmdata.append('price', $("#budget").val());
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
            frmdata.append('availability',$("#availability").val());
            frmdata.append('hfprotable',$("#hfprotable").val());
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
            RefreshGrid();
            $("#possession").datepicker({autoclose:true});
            $("#property_type").select2();
            $("#transaction_type").select2();
            $("#owner_type").select2();
            $("#bedroom").select2();
            $("#availability").select2();
            <?php
            if($pcount==0) {
                ?>
            $("#budget").select2();
            var usedNames = {};
            $("select[name='budget'] > option").each(function () {
                if(usedNames[this.text]) {
                    $(this).remove();
                } else {
                    usedNames[this.text] = this.value;
                }
            });
                <?php
            }
            ?>

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
        function showpropertypopup()
        {
            $("#property-popup").modal("show");
        }
        function clearproperty()
        {
            $("#property_type").val("").trigger("change");
            $("#bedroom").val("").trigger("change");
            $("#transaction_type").val("").trigger("change");
            //  $("#price").val("").trigger("change");
            $("#budget").val("");
            $("#bval").html("Budget");
            $("#possession").val("");
            $("#area").val("");
            $("#rate_sqft").val("");
            $("#floor_no").val("");
            $("#floor_plan").val("");
        }
        var Protable=<?php echo $prod; ?> ;
        function AddProperty()
        {
            if(!$("#propertyfrm").valid())
            {
                return;
            }
            var property_type=$("#property_type").val();
            var bedroom=$("#bedroom").val();
            var transaction_type=$("#transaction_type").val();
            var price=$("#budget").val();
            var possession=$("#possession").val();
            var area=$("#area").val();
            var rate_sqft=$("#rate_sqft").val();
            var floor_no=$("#floor_no").val();
            var frmdata = new FormData();
            frmdata.append('act','uploadfloorplan')
            frmdata.append('input',$("#floor_plan").val());
            frmdata.append('file', $("#floor_plan")[0].files[0]);
            var floor_plan=$("#floor_plan").val();
            if(floor_plan!="")
            {
                var varurl="ajaxwebapi/service.php";

                $.ajax({
                    url:varurl,
                    type:"POST",
                    data:frmdata,
                    contentType:false,
                    processData:false,
                    cache:false,
                    success:function(response){
                        if(response.msgtype="success")
                        {
                            var list=JSON.parse(response);
                            var imagepath=list.path;
                            var floor_plan="property_images/floor_plan/"+imagepath;

                            if(property_type =="" && bedroom =="" && transaction_type =="" && price =="" && possession =="" && area =="" && rate_sqft =="" && floor_no =="" && floor_plan =="")
                            {
                                showmessage("warning","Please FIll Up Property Information");
                            }
                            if(property_type !="" && bedroom !="" && transaction_type !="" && price !="" && possession !="" && area !="" && rate_sqft !="" && floor_no !="" && floor_plan !="")
                            {
                                var jsonstr='{"property_type":"'+property_type+'","bedroom":"'+bedroom+'","transaction_type":"'+transaction_type+'","price":"'+price+'","possession":"'+possession+'","area":"'+area+'","rate_sqft":"'+rate_sqft+'","floor_no":"'+floor_no+'","floor_plan":"'+floor_plan+'"}';
                                clearproperty();
                                $("#property-popup").modal("hide");
                            }
                            var jsonobj=JSON.parse(jsonstr);
                            Protable.push(jsonobj);
                            RefreshGrid();
                        }
                        else if(response.msgtype="error")
                        {
                            showmessage("error","Error Occured!");
                        }
                    },
                    error:function(xhr){
                        showmessage("error","Ajax Call Error");
                    }
                });

            }
            else
            {
                var floor_plan="";

                if(property_type =="" && bedroom =="" && transaction_type =="" && price =="" && possession =="" && area =="" && rate_sqft =="" && floor_no =="" && floor_plan =="")
                {
                    showmessage("warning","Please FIll Up Property Information");
                }
                if(property_type !="" && bedroom !="" && transaction_type !="" && price !="" && possession !="" && area !="" && rate_sqft !="" && floor_no !="" && floor_plan !="")
                {
                    var jsonstr='{"property_type":"'+property_type+'","bedroom":"'+bedroom+'","transaction_type":"'+transaction_type+'","price":"'+price+'","possession":"'+possession+'","area":"'+area+'","rate_sqft":"'+rate_sqft+'","floor_no":"'+floor_no+'","floor_plan":"'+floor_plan+'"}';
                    clearproperty();
                    $("#property-popup").modal("hide");
                }
                var jsonobj=JSON.parse(jsonstr);
                Protable.push(jsonobj);
                RefreshGrid();
            }


        }
        function RemoveProduct(rowindex)
        {
            //var r = bootbox.confirm("sure to delte")
            var r = confirm("Sure to delete");
            if (r == true) {
                var path=Protable[rowindex].floor_plan;
                var frmdata = new FormData();
                frmdata.append('act','removefloorplan')
                frmdata.append('path',path);
                var varurl="ajaxwebapi/service.php";
                $.ajax({
                    url:varurl,
                    type:"POST",
                    data:frmdata,
                    contentType:false,
                    processData:false,
                    cache:false,
                    success:function(response){
                        if(response.msgtype="success")
                        {

                        }
                        else if(response.msgtype="error")
                        {
                            showmessage("error","Error Occured!");
                        }
                    },
                    error:function(xhr){
                        showmessage("error","Ajax Call Error");
                    }
                });
                Protable.splice(rowindex,1);
                RefreshGrid();
            }
        }
        function RefreshGrid()
        {
            var str=escape(JSON.stringify(Protable));
            $("#hfprotable").val(str);
            $("#tblProd > tbody").html("");
            var total=0;
            for(i=0;i<Protable.length;i++)
            {
                var trcontent='<tr><td><img id="avatar" name="avatar" alt="Floor Plan Image" src="'+Protable[i].floor_plan+'" style="width: 58px;height: 40px;"/></td><td>'+Protable[i].property_type+'</td><td>'+Protable[i].bedroom+'</td><td>'+Protable[i].transaction_type+'</td><td>'+Protable[i].price+'</td><td>'+Protable[i].possession+'</td><td>'+Protable[i].area+'</td><td>'+Protable[i].rate_sqft+'</td><td>'+Protable[i].floor_no+'</td><td align="center"><a href="javascript:RemoveProduct('+i+')" class="btnlink btn-red"><i class="fa fa-remove"></i></a></td> </tr>';
                $('#tblProd > tbody:last').append(trcontent);
            }
        }
        $('#min-max-price-range').click(function (event) {
            setTimeout(function(){ $('.price-label').first().focus();	},0);
            var str= $("#minval").val()+" to "+$("#maxval").val();
            if($("#minval").val() !="" && $("#maxval").val() !="")
            {
                $("#bval").html(str);
                $("#budget").val(str);
            }
            else
            {
                $("#bval").html("Budget");
            }
        });
        var priceLabelObj;
        $('.price-label').focus(function (event) {
            priceLabelObj=$(this);
            $('.price-range').addClass('hide');
            $('#'+$(this).data('dropdownId')).removeClass('hide');
            var minval=$("#minval").val();
            var res = minval.substring(0, 2);
            var str= res+" to "+$("#maxval").val();
            if($("#minval").val() !="" && $("#maxval").val() !="")
            {
                $("#bval").html(str);
                $("#budget").val(str);
            }
            else
            {
                $("#bval").html("Budget");
            }
        });
        $(".price-range li").click(function(){
            priceLabelObj.attr('value', $(this).attr('data-value'));
            var curElmIndex=$( ".price-label" ).index( priceLabelObj );
            var nextElm=$( ".price-label" ).eq(curElmIndex+1);
            if(nextElm.length){
                $( ".price-label" ).eq(curElmIndex+1).focus();

            }else{
                $('#min-max-price-range').dropdown('toggle');
            }
            var minval=$("#minval").val();
            var res = minval.substring(0, 2);
            var str= res+" to "+$("#maxval").val();
            if($("#minval").val() !="" && $("#maxval").val() !="")
            {
                $("#bval").html(str);
                $("#budget").val(str);
            }
            else
            {
                $("#bval").html("Budget");
            }
        });
    </script>
<?php
}
else
{
    header('location:'.$base.'Home/');
}
?>