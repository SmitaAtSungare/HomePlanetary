<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
}
$metakeyword="Home planetary, Homeplanetary.com, Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties ";
$metadesp="India’s Real estate- Homeplanetary.com- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free";
include('header.php');
include_once("analyticstracking.php");
?>
<link rel="stylesheet" href="admin/plugins/select2/select2.min1.css">


<!-- header start -->
<div class="top_bg">
    <div class="container">
        <div class="logo">
            <a href=""><img src="images/logo1.png" alt=""/></a>
        </div>
        <div class="header_top-sec">
            <div class="header_right" >
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
                    echo '&nbsp;&nbsp;<button class="btn btn-default mybtn" data-toggle="modal" data-target="#LoginRegister">Login / Registration</button>';

                }
                ?>
            
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
<div class="slider"  onclick="hidesuggetionBoxes()" >
	<div id="blur-div">
		<figure>
			<img src="images/banner.jpg" alt="">
			<img src="images/banner1.png" alt="">
			<img src="images/banner2.jpg" alt="">
			<img src="images/banner4.jpg" alt="">
			<img src="images/banner5.jpg" alt="">
		</figure>
	</div>
    <form name="search" action="property_listing.php" method="post" id="search" class="f-right">
        <?php
        $cty = "";
        if(isset($_POST['city']))
        {
            $cty = $_POST['city'];
        }
        else if(isset($_GET['city']))
        {
            $cty = $_GET['city'];
        }
        $catgy = "";
        if(isset($_POST['searchid']))
        {
            $catgy = $_POST['searchid'];
        }
        else if(isset($_GET['searchid']))
        {
            $catgy =$_GET['searchid'];
        }
        $bdgt = "";
        if(isset($_POST['budget']))
        {
            $bdgt = $_POST['budget'];
        }
        else if(isset($_GET['budget']))
        {
            $bdgt = $_GET['budget'];
        }
        $ptype = "";
        if(isset($_POST['property_type']))
        {
            $ptype = $_POST['property_type'];
        }
        else if(isset($_GET['property_type']))
        {
            $ptype = $_GET['property_type'];
        }
        $broom = "";
        if(isset($_POST['bedroom']))
        {
            $broom = $_POST['bedroom'];
        }
        else if(isset($_GET['bedroom']))
        {
            $broom = $_GET['bedroom'];
        }
        ?>
		
		<div class="city-search2">	
			<div class="total-ads main-grid-border">
				<div class="container">
					<div class="select-box">
						<div class="browse-category col-md-2">
                            <input type="text" class="form-control" value="<?php echo $val = isset($_SESSION["Gcity"]) && $_SESSION["Gcity"] != '' ? $_SESSION["Gcity"] : ''; ?>" id="city" name="city" placeholder="Select City" autocomplete="off" required />
                            <div id="suggesstion-box" style="position: absolute; background-color: white; width: 125px; border: 3px none black;  height: 152px; overflow-y: scroll; margin-left: -17px; margin-top: 0px;display: none;"></div>
						</div>
						
						
						
						<div class="browse-category col-md-4">
                            <input type="text" class="form-control" value="<?php echo $val = isset($_SESSION["Gcategory"]) && $_SESSION["Gcategory"] != '' ? $_SESSION["Gcategory"] : ''; ?>" name="searchid" id="searchid"  onfocus="check_box()" class="search-category" style="font-size: 16px;"  autocomplete="off" placeholder="Enter a Locality,Builder,Project" />
                            <div id="suggesstion-box1" style="position: absolute; background-color: white; width: 252px; border: 3px none black; margin-left: 0px; height: 146px; overflow-y: scroll; margin-top: 0px;display: none;"></div>
                        </div>
						
						
						
						<div class="browse-category col-md-2">
							
							<select class="selectpicker show-tick" data-live-search="true" id="budget" name="budget">
                                <?php
                                $val = isset($_SESSION["Gbudget"]) && $_SESSION["Gbudget"] != '' ? $_SESSION["Gbudget"] : '';
                                if($val!="")
                                {
                                    echo "<option value='".$val."'>".$val."</option>";
                                }
                                ?>
                                <option value="">Budget</option>
                                <option value="5 to 10 Lakh">5 to 10 Lakh</option>
                                <option value="11 to 15 Lakh">11 to 15 Lakh</option>
                                <option value="15 to 20 Lakh">15 to 20 Lakh</option>
                                <option value="21 to 25 Lakh">21 to 25 Lakh</option>
                                <option value="25 to 30 Lakh">25 to 30 Lakh</option>
                                <option value="31 to 35 Lakh">31 to 35 Lakh</option>
                                <option value="35 to 40 Lakh">35 to 40 Lakh</option>
                                <option value="41 to 45 Lakh">41 to 45 Lakh</option>
                                <option value="45 to 50 Lakh">45 to 50 Lakh</option>
                                <option value="51 to 55 Lakh">51 to 55 Lakh</option>
                                <option value="55 to 60 Lakh">55 to 60 Lakh</option>
                                <option value="61 to 65 Lakh">61 to 65 Lakh</option>
                                <option value="65 to 70 Lakh">65 to 70 Lakh</option>
                                <option value="71 to 75 Lakh">71 to 75 Lakh</option>
                                <option value="75 to 80 Lakh">75 to 80 Lakh</option>
                                <option value="81 to 85 Lakh">81 to 85 Lakh</option>
                                <option value="85 to 90 Lakh">85 to 90 Lakh</option>
                                <option value="91 to 95 Lakh">91 to 95 Lakh</option>
                                <option value="95 to 99 lakh">95 to 99 lakh</option>
                                <option value="1 to 2 Cr">1 to 2 Cr</option>
                                <option value="2 to 3 Cr">2 to 3 Cr</option>
                                <option value="3 to 4 Cr">3 to 4 Cr</option>
                                <option value="4 to 5 Cr">4 to 5 Cr</option>
							</select>
						</div>
						
						
						
						
						
						
						
						<div class="browse-category col-md-2">
							
							<select class="selectpicker show-tick" data-live-search="true" id="property_type" name="property_type" onchange="setsubProperty()">
                                <?php
                                $val = isset($_SESSION["Gproperty_type"]) && $_SESSION["Gproperty_type"] != '' ? $_SESSION["Gproperty_type"] : '';
                                if($val!="")
                                {
                                    echo "<option value='".$val."'>".$val."</option>";
                                }
                                ?>
                                <option value="">Property Type</option>
                                <option value="Residential">Residential</option>
                                <option value="Commercial">Commercial</option>
                                <option value="Other">Other</option>
							</select>
						</div>



						<div class="search-product col-md-2">
							
							<div class="search232">
								<div id="custom-search-input">
								<div class="input-group" onclick="checkproperty()">
                                    <select class="selectpicker show-tick form-control" data-live-search="true" id="bedroom" name="bedroom" >
                                        <?php
                                        $val = isset($_SESSION["Gbedroom"]) && $_SESSION["Gbedroom"] != '' ? $_SESSION["Gbedroom"] : '';
                                        if($val != "")
                                        {
                                            echo "<option value='".$val."'>".$val."</option>";
                                        }
                                        ?>
                                        <option value="">Sub Property </option>
                                        <?php
                                        $prtype = isset($_SESSION["Gproperty_type"]) && $_SESSION["Gproperty_type"] != '' ? $_SESSION["Gproperty_type"] : '';
                                        if($prtype != "")
                                        {
                                            if($prtype == "Residential")
                                            {
                                                echo "<option value='1RK'>1RK</option>";
                                                echo "<option value='1BHK'>1BHK</option>";
                                                echo "<option value='2BHK'>2BHK</option>";
                                                echo "<option value='3BHK'>3BHK</option>";
                                                echo "<option value='4BHK'>4BHK</option>";
                                                echo "<option value='5BHK'>5BHK</option>";
                                                echo "<option value='House/Villa'>House/Villa</option>";
                                                echo "<option value='Plot/Land'>Plot/Land</option>";
                                            }
                                            else if($prtype == "Commercial")
                                            {
                                                echo "<option value='Office Space'>Office Space</option>";
                                                echo "<option value='Shop/Showroom'>Shop/Showroom</option>";
                                                echo "<option value='Commercial Land'>Commercial Land</option>";
                                                echo "<option value='Warehouse/Godown'>Warehouse/Godown</option>";
                                                echo "<option value='Industrial Building'>Industrial Building</option>";
                                                echo "<option value='Industrial Shed'>Industrial Shed</option>";
                                            }
                                            else if($prtype == "Other")
                                            {
                                                echo "<option value='Agriculture Land'>Agriculture Land</option>";
                                                echo "<option value='Farm House'>Farm House</option>";
                                            }
                                        }
                                        ?>
                                    </select>
									
									
									<span class="input-group-btn">
										<button class="btn btn-info btn-lg mysearch" type="button" onclick="setparameters()">
											 <span class="fa fa-search"></span>
										</button>
									</span>
								</div>
							</div>
							</div>
						</div>
						
						
						<div class="clearfix"></div>
					</div>
					
				</div>
			</div>
		</div>	
		

    </form>
</div>
<div class="clearfix"></div>








<div class="container">
  <div class="row" id="slider-text">
    <div class="col-md-6" >
      <h2>Latest Featured Properties</h2>
    </div>
  </div>
</div>

<!-- Item slider-->
<div class="container-fluid">
    <form method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="carousel carousel-showmanymoveone slide" id="itemslider">
        <div class="carousel-inner">


            <?php
            $result = $mysqli->query("SELECT property_id,property_name,city,locality,property_type,bedroom,photos,price FROM add_posting");
           $i=1;
            while( $row =  $result->fetch_array()) :
                if($i==1) {
                    ?>

                    <div class="item active">
                        <div class="col-xs-12 col-sm-6 col-md-2">
                            <?php echo "<a href='Property/" . $row['property_name'] . " - " . $row['locality'] . " , " . $row['city'] . " - " . $row['bedroom'] . " , " . $row['property_type'] . " Property /" . $row['property_id'] . "'><img src='" . $row['photos'] . "' class='img-responsive center-block'/></a>"; ?>
                            <h4>
                                <?php echo "<a href='Property/" . $row['property_name'] . " - " . $row['locality'] . " , " . $row['city'] . " - " . $row['bedroom'] . " , " . $row['property_type'] . " Property /" . $row['property_id'] . "'>" . $row['property_name'] . " - " . $row['locality'] . " , " . $row['city'] . "</a>"; ?>
                            </h4>
                            <p><?php echo $row['bedroom'] . ' Available In prime location of  ' . $row['city']; ?></p>
                            <div class="rupee">
                                <img src="images/rupee.png">
                                <?php echo $row['price']; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <div class="item">
                        <div class="col-xs-12 col-sm-6 col-md-2">
                            <?php echo "<a href='Property/" . $row['property_name'] . " - " . $row['locality'] . " , " . $row['city'] . " - " . $row['bedroom'] . " , " . $row['property_type'] . " Property /" . $row['property_id'] . "'><img src='" . $row['photos'] . "' class='img-responsive center-block'/></a>"; ?>
                            <h4>
                                <?php echo "<a href='Property/" . $row['property_name'] . " - " . $row['locality'] . " , " . $row['city'] . " - " . $row['bedroom'] . " , " . $row['property_type'] . " Property /" . $row['property_id'] . "'>" . $row['property_name'] . " - " . $row['locality'] . " , " . $row['city'] . "</a>"; ?>
                            </h4>
                            <p><?php echo $row['bedroom'] . ' Available In prime location of  ' . $row['city']; ?></p>
                            <div class="rupee">
                                <img src="images/rupee.png">
                                <?php echo $row['price']; ?>
                            </div>
                        </div>
                    </div>
            <?php } $i++; endwhile; ?>

        </div>

        <div id="slider-control">
        <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left" class="img-responsive"></a>
        <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right" class="img-responsive"></a>
      </div>
      </div>
    </div>
  </div>

    </form>
</div>


<?php include("footer.php"); ?>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

      	$("#flexiselDemo1").flexisel({
                        visibleItems: 6,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover:true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint:480,
                                visibleItems: 1
                            },
                            landscape: {
                                changePoint:640,
                                visibleItems: 2
                            },
                            tablet: {
                                changePoint:768,
                                visibleItems: 3
                            }
                        }
                    });

					(function(){

							  $('#itemslider').carousel({ interval: 3000 });
							}());

							(function(){
							  $('.carousel-showmanymoveone .item').each(function(){
								var itemToClone = $(this);

								for (var i=1;i<6;i++) {
								  itemToClone = itemToClone.next();


								  if (!itemToClone.length) {
									itemToClone = $(this).siblings(':first');
								  }


								  itemToClone.children(':first-child').clone()
									.addClass("cloneditem-"+(i))
									.appendTo($(this));
								}
							  });
							}());

            });
</script>