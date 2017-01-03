<?php
include 'login.php'; // Includes Login Script
if(isset($_SESSION['login_user'])) {
    include('header.php');
    include_once("analyticstracking.php");
    $user_type = $_SESSION['user_type'];
    $user_name = $_SESSION['user_name'];
    $user_email = $_SESSION['user_email'];
    $user_id = $_SESSION['user_id'];
    $user_mobile = $_SESSION['user_mobile'];
    $result = $mysqli->query("SELECT * FROM add_posting WHERE user_id='$user_id'");
    $count1 = $result->num_rows;
    $result = $mysqli->query("SELECT SUM(total_visits) FROM add_posting WHERE user_id='$user_id'");
    while ($row = $result->fetch_array()) {
        $count2 = $row[0];
    }
    if($count2=="")
    {
        $count2=0;
    }
    $result = $mysqli->query("SELECT * FROM enquiry WHERE username='$user_mobile'");
    $count3 = $result->num_rows;
    $result = $mysqli->query("SELECT * FROM add_posting WHERE user_id='$user_id' AND property_status='True'");
    $count4 = $result->num_rows;
    $result = $mysqli->query("SELECT * FROM enquiry WHERE user_id='$user_id'");
    $customercount1 = $result->num_rows;

    $properties = array();
    $p1=array();
    $result = $mysqli->query("SELECT property_id FROM enquiry WHERE user_id='$user_id'");
    while ($row = $result->fetch_array()) {
        $pid = $row[0];
        array_push($properties,$pid);
    }
    $count=count($properties);
    if($count>=0)
    {
        for($i=0;$i<$count;$i++)
        {
            $result = $mysqli->query("SELECT property_id FROM add_posting WHERE property_status='True' AND property_id=$properties[$i]");
            while ($row = $result->fetch_array()) {
                $pid = $row[0];
                array_push($p1,$pid);
            }
        }
    }
    $customercount2 = count($p1);
    $result = $mysqli->query("SELECT * FROM property_views WHERE user_id=$user_id");
    $customercount3 = $result->num_rows;
    ?>
    <link rel="stylesheet" href="css/dropzone.css">
    <link href="admin/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="admin/ionicons/css/ionicons.css" rel="stylesheet" type="text/css"/>
    <link href="admin/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="admin/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="admin/dist/css/skins/_all-skins.min.css">
    <body>
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
<div class="content-wrapper" style="min-height: 300px;background-color: #fff;margin-left: 10px;margin-right: 7px;">
    <br/>
    <div class="myqkr-hdiv" style="margin-left: 50px;"><h3><?php echo $user_name . " (" . $user_type . ") "; ?>
      Dashboard</h3></div>

    <?php
    if($user_type=="Customer")
    {
        ?>
        <section class="content">
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $customercount1 . "\n"; ?></h3>
                            <p>Number of Requested Properties</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $customercount2 . "\n"; ?></h3>
                            <p>Number of Purchased Properties</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $customercount3 . "\n"; ?></h3>
                            <p>Number Of Viewed Properties</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->

            <div class="row" style="margin-bottom: -20px;">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="font-size: 25px;"><i class="fa fa-th-list"></i>&nbsp;&nbsp;Properties Requested By Me
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <?php
                                $properties = array();
                                $result = $mysqli->query("SELECT DISTINCT property_id FROM enquiry WHERE user_id='$user_id'");
                                while ($row = $result->fetch_array()) {
                                    $pid = $row[0];
                                    array_push($properties,$pid);
                                }
                                $count=count($properties);
                                if($count>=0)
                                {
                                    for($i=0;$i<$count;$i++)
                                    {
                                       $result = $mysqli->query("SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,(SELECT COUNT(*) FROM enquiry where property_id=add_posting.property_id) as total_enquiry,total_visits FROM add_posting WHERE property_id=$properties[$i]");
                                        while ($row = $result->fetch_array()) :
                                    ?>
                                    <a href="mainlisting_details.php?id=<?php echo $row['property_id'];?>" class="list-group-item" style="padding:0px 0px;">
                                        <div class="row"
                                             style="border:1px solid #ccc; margin:3px; box-shadow: 0px 0px 0px #fff; margin-bottom: 0px; padding: 5px;">
                                            <h4><?php echo $row['property_name'] . ' - ' . $row['locality'] . ', ' . $row['city']; ?></h4>
                                            <div class="clearfix"></div>
                                            <div class="col-md-5">
                                                <?php echo "<img src='" . $row['photos'] . "'/>"; ?>
                                            </div>
                                            <div class="col-md-7" style="font-size: 25px;">
                                                <div class="shortlist"><?php echo $row['bedroom']; ?> Apartment</div>
                                                <div class="view-price"><?php echo $row['price']; ?></div>
                                                <div class="view-possesion">Possession</div>
                                                <div class="view-date"><?php echo $row['possession']; ?></div>
                                                <div class="clearfix"></div>
                                                <div class="view-possesion">Builtup Area</div>
                                                <div class="view-date"><?php echo $row['area_sqft']; ?> sq.ft</div>
                                                <div class="clearfix"></div>
                                                <div class="shortlist"
                                                     id="<?php echo $row['property_name'] . ' - ' . $row['locality'] . ', ' . $row['city']; ?>"
                                                     style="border: none;">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endwhile;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="font-size: 25px;"><i class="fa fa-th-list"></i>&nbsp;&nbsp;Properties Viewed By Me
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <?php
                                $properties = array();
                                $result = $mysqli->query("SELECT DISTINCT property_id FROM property_views WHERE user_id=$user_id");

                                while ($row = $result->fetch_array()) {
                                    $pid = $row[0];
                                    array_push($properties,$pid);
                                }
                                $count=count($properties);
                                if($count>=0)
                                {
                                    for($i=0;$i<$count;$i++)
                                    {
                                      $result = $mysqli->query("SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,(SELECT COUNT(*) FROM enquiry where property_id=add_posting.property_id) as total_enquiry,total_visits FROM add_posting WHERE property_id=$properties[$i]");
                                      while ($row = $result->fetch_array()) :
                                    ?>

                                    <a href="mainlisting_details.php?id=<?php echo $row['property_id'];?>" class="list-group-item" style="padding: 0px 0px;">
                                        <div class="row"
                                             style="border:1px solid #ccc; margin:3px; box-shadow: 0px 0px 0px #fff; margin-bottom: 0px; padding: 5px;">
                                            <h4><?php echo $row['property_name'] . ' - ' . $row['locality'] . ', ' . $row['city']; ?></h4>
                                            <div class="clearfix"></div>
                                            <div class="col-md-5">
                                                <?php echo "<img src='" . $row['photos'] . "'/>"; ?>
                                            </div>
                                            <div class="col-md-7" style="font-size: 25px;">
                                                <div class="shortlist"><?php echo $row['bedroom']; ?> Apartment</div>
                                                <div class="view-price"><?php echo $row['price']; ?></div>
                                                <div class="view-possesion">Possession</div>
                                                <div class="view-date"><?php echo $row['possession']; ?></div>
                                                <div class="clearfix"></div>
                                                <div class="view-possesion">Builtup Area</div>
                                                <div class="view-date"><?php echo $row['area_sqft']; ?> sq.ft</div>
                                                <div class="clearfix"></div>
                                                <div class="shortlist"
                                                     id="<?php echo $row['property_name'] . ' - ' . $row['locality'] . ', ' . $row['city']; ?>"
                                                     style="border: none;">
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                <?php endwhile;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    <?php
    }
    else
    {
    ?>
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $count1 . "\n"; ?></h3>
                            <p>Number of Posted Properties</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $count2 . "\n"; ?></h3>
                            <p>Number of Property Views</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $count3 . "\n"; ?></h3>
                            <p>Number Of Property Requests</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo $count4 . "\n"; ?></h3>
                            <p>Number of Property Sold</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
            <div class="row" style="margin-bottom: -20px;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="font-size: 25px;"><i class="fa fa-th-list"></i>&nbsp;&nbsp;My Ads
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <?php
                                //execute the SQL query and return records
                                $result = $mysqli->query("SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,(SELECT COUNT(*) FROM enquiry where property_id=add_posting.property_id) as total_enquiry,total_visits,property_type FROM add_posting WHERE user_id='$user_id'");
                                while ($row = $result->fetch_array()) :
                                    ?>
                                    <a href="javascript:" class="list-group-item">
                                        <div class="row"
                                             style="border:1px solid #ccc; margin:3px; box-shadow: 0px 0px 0px #fff; margin-bottom: 10px; padding: 10px;">
                                            <h4><?php echo $row['property_name'] . ' - ' . $row['locality'] . ', ' . $row['city']; ?></h4>
                                            <div class="clearfix"></div>
                                            <div class="col-md-5">
                                                <?php echo "<img src='" . $row['photos'] . "'/>"; ?>
                                            </div>
                                            <div class="col-md-7" style="font-size: 25px;">
                                                <div class="shortlist"><?php echo $row['bedroom']; ?> Apartment</div>
                                                <div class="view-price"><?php echo $row['price']; ?></div>
                                                <div class="view-possesion">Possession</div>
                                                <div class="view-date"><?php echo $row['possession']; ?></div>
                                                <div class="clearfix"></div>
                                                <div class="view-possesion">Builtup Area</div>
                                                <div class="view-date"><?php echo $row['area_sqft']; ?> sq.ft</div>
                                                <div class="clearfix"></div>
                                                <div class="shortlist"
                                                     id="<?php echo $row['property_name'] . ' - ' . $row['locality'] . ', ' . $row['city']; ?>"
                                                     style="border: none;">
                                                </div>
												<div class="col-md-12">
													<button type="button" class="badge col-md-3 col-xs-12" onclick="setmainlistparameters(<?php echo $row['property_id']; ?>,'<?php echo $row['property_name'];?>','<?php echo $row['city'];?>','<?php echo $row['locality'];?>','<?php echo $row['property_type'];?>','<?php echo $row['bedroom'];?>')">
														View Details
													</button>
													<button type="button" class="badge col-md-3 col-xs-12" onclick="<?php if ($row['total_enquiry'] != 0) { ?>showenquiries(<?php echo $row['property_id'];?>,'<?php echo $row['property_name'].' - '.$row['locality'].', '.$row['city']; ?>')<?php } ?>"> <?php
														if ($row['total_enquiry'] == 0) {
															echo "No Enquiry Found";
														} else {
															echo "Total Enquiries :" . $row['total_enquiry'];
														}
														?>
													</button>
													<button type="button" class="badge col-md-3 col-xs-12" onclick="<?php if ($row['total_visits'] != 0) { ?>visitsdetails(<?php echo $row['property_id'];?>,<?php echo $row['total_visits'];?>)<?php } ?>"><?php
														if ($row['total_visits'] == 0) {
															echo "No Visits Found";
														} else {
															echo "Total Visits :" . $row['total_visits'];
														}
														?>
													</button>
												</div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    <?php
    }
    ?>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" id="listTitle" style="color: #109af7;">Enquiry List</h2>
            </div>
            <div class="modal-body">
                <div id="enquiryListbody"></div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>

<script src="admin/dist/js/app.min.js"></script>
<script src="admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script type="text/javascript" src="admin/js/on-off-switch.js"></script>
<script type="text/javascript" src="admin/js/on-off-switch-onload.js"></script>
<link rel="stylesheet" type="text/css" href="admin/css/on-off-switch.css"/>
<script type="text/javascript" src="admin/js/dropzone.js"></script>
<script>
    function showenquiries(i, j) {
        var frmdata = new FormData();
        frmdata.append('act', 'loadenquirylist');
        frmdata.append('property_id', i);
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
                    var len = arr.length;
                    var str = "";
                    for (var i = 0; i < len; i++) {
                        str = str + "<div style='border: 2px solid silver;padding: 12px;'><b><i class='fa fa-calendar'></i>&nbsp;Enquiry Date:&nbsp;</b>" + arr[i].date + "<br/><b><i class='fa fa-user'></i>&nbsp;Name:&nbsp;</b>" + arr[i].name + "<br/><b><i class='fa fa-mobile' style='font-size: 22px;'></i>&nbsp;Mobile:&nbsp;</b>" + arr[i].mob + "<br/><b><i class='fa fa-envelope'></i>&nbsp;Email:&nbsp;</b>" + arr[i].email + "<br/><b><i class='fa fa-comments'></i>&nbsp;Comments:&nbsp;</b>" + arr[i].comments + "</div><br/>";
                    }
                    $("#enquiryListbody").html("");
                    $("#enquiryListbody").append(str);
                    var str1 = j + "-(Enquiry List)";
                    $("#listTitle").html("");
                    $("#listTitle").append(str1);
                    $('#myModal').modal('show');
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
    function visitsdetails(i,j)
    {
        var total_visits=j;
        var frmdata = new FormData();
        frmdata.append('act','visitsdetails');
        frmdata.append('property_id',i);
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
                    var list = JSON.parse(response);
                    var arr = list.customerlist;
                    var len = arr.length;
                    var str = "";
                    for (var i = 0; i < len; i++) {
                        str = str + "<div style='border: 2px solid silver;padding: 12px;'><b><i class='fa fa-user'></i>&nbsp;Name:&nbsp;</b>" + arr[i].name + "("+arr[i].user_type+")<br/><b><i class='fa fa-mobile' style='font-size: 22px;'></i>&nbsp;Mobile:&nbsp;</b>" + arr[i].mob + "<br/><b><i class='fa fa-envelope'></i>&nbsp;Email:&nbsp;</b>" + arr[i].email + "<br/><b><i class='fa fa-location-arrow'></i>&nbsp;Location:&nbsp;</b>" + arr[i].city + "</div><br/>";
                    }
                    $("#enquiryListbody").html("");
                    $("#enquiryListbody").append(str);
                    var other_visits=parseInt(j)-parseInt(list.customerscount);
                    var str1 = "Visits Details <br>(Total Visits : "+j+",Authorised : "+list.customerscount+",Other : "+other_visits+")";
                    $("#listTitle").html("");
                    $("#listTitle").append(str1);
                    $('#myModal').modal('show');
                }
                else if(response.msgtype="error")
                {
                    showmessage("error","Error Occured!"+response.desc);
                }
            },
            error:function(xhr)
            {
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