<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
}
include('header.php');
?>
<link rel="stylesheet" href="admin/plugins/select2/select2.min1.css">
<body xmlns="http://www.w3.org/1999/html">
<?php //include_once("analyticstracking.php")?>
<!-- header -->
<!-- header start -->
<div class="top_bg">
	<div class="container">
		<div class="header_top-sec">
			<div class="logo">
			 	<a href="Home/"><img src="images/logo1.png" alt=""/></a>
				 </div>
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
				<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div id="sticky-anchor"></div>
<div class="header_top" onclick="hidesuggetionBoxes()">
	 <div class="container">
		 <?php 
			    $cty = "";
				if(isset($_POST['city']))
				{
 		    		$_SESSION['Gcity'] = $_POST['city'];
					$cty = $_POST['city'];
				}
				else if(isset($_GET['city']))
				{
                    $_SESSION['Gcity'] = $_GET['city'];
					$cty = $_GET['city'];
				}
                 $catgy = "";
                 if(isset($_POST['searchid']))
                 {
                     $_SESSION['Gcategory'] = $_POST['searchid'];
                     $catgy = $_POST['searchid'];
                 }
                 else if(isset($_GET['searchid']))
                 {
                     $_SESSION['Gcategory'] = $_GET['searchid'];
                     $catgy = $_GET['searchid'];
                 }
                 $bdgt = "";
                  if(isset($_POST['budget']))
                  {
                      $_SESSION["Gbudget"] = $_POST['budget'];
                      $bdgt = $_POST['budget'];
                  }
                  else if(isset($_GET['budget']))
                  {
                      $_SESSION["Gbudget"] = $_GET['budget'];
                      $bdgt = $_GET['budget'];
                  }
                  $ptype = "";
                  if(isset($_POST['property_type']))
                  {
                      $_SESSION["Gproperty_type"] = $_POST['property_type'];
                      $ptype = $_POST['property_type'];
                  }
                  else if(isset($_GET['property_type']))
                  {
                      $_SESSION["Gproperty_type"] = $_GET['property_type'];
                      $ptype = $_GET['property_type'];
                  }
                  $broom = "";
                  if(isset($_POST['bedroom']))
                  {
                      $_SESSION["Gbedroom"] = $_POST['bedroom'];
                      $broom = $_POST['bedroom'];
                  }
                  else if(isset($_GET['bedroom']))
                  {
                      $_SESSION["Gbedroom"] = $_GET['bedroom'];
                      $broom = $_GET['bedroom'];
                  }
		?>
     <form name="search" action="property_listing.php" method="post" id="search" class="f-right">
         <div class="city-search2" style="top: 76px;left: -15px;">
             <div class="row" style="margin-right: -144px;margin-left: 11px;">
                 <div class="col-lg-12">
                     <div class="col-sm-1" style="width: 147px; margin-left: -24px;">
                         <input type="text" class="city-new2" value="<?php echo $val = isset($_SESSION["Gcity"]) && $_SESSION["Gcity"] != '' ? $_SESSION["Gcity"] : ''; ?>" id="city" name="city" placeholder="Select City" autocomplete="off" required />
                         <div id="suggesstion-box" style="position: absolute; background-color: white; width: 106px; border: 3px none black;  height: 152px; overflow-y: scroll; margin-left: -7px; margin-top: 0px;display: none;"></div>
                     </div>
                     <div class="col-sm-4" style="margin-left: -42px;width: 451px;">
                         <input type="text" value="<?php echo $val = isset($_SESSION["Gcategory"]) && $_SESSION["Gcategory"] != '' ? $_SESSION["Gcategory"] : ''; ?>" name="searchid" id="searchid"  onfocus="check_box()" class="search-category" style="font-size: 16px;" autocomplete="off" placeholder="Enter a Locality,Builder,Project" />
                         <div id="suggesstion-box1" style="position: absolute; background-color: white; width: 252px; border: 3px none black; margin-left: 0px; height: 146px; overflow-y: scroll; margin-top: 0px;display: none;"></div>
                     </div>
                     <div class="col-sm-2" style="margin-left: -197px;">
                         <select id="budget" name="budget" class="">
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
                     <div class="col-sm-2" style="margin-left: -33px;">
                         <select id="property_type" name="property_type" class="" onchange="setsubProperty()">
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
                     <div class="col-sm-2" style="margin-left: -34px;" onclick="checkproperty()">
                         <select id="bedroom" name="bedroom" class="">
                             <?php
                             $val = isset($_SESSION["Gbedroom"]) && $_SESSION["Gbedroom"] !='' ? $_SESSION["Gbedroom"] : '';
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
                     </div>
                     <div class="col-sm-1" style="margin-left: -82px;width: 265px;">
                         <div class="cart box_1">
                             <button type="button" name="submit1" id="submit1" onclick="setparameters()" style="background-color:#dd0a16;color:#fff;border: medium none;height: 50px;margin: 0;outline: medium none;padding: 6px 10px 6px 10px;position: relative;width: 59%;">Search</button>
                             <div class="clearfix"> </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </form>
<!--------------------------------------------------Search------------------------------------------------------------->
     <?php
        $price = $bdgt;
        $property_type = $ptype;
        $category = $catgy;
        $subproperty = $broom;
        $city = $cty;
        if($category!="" && $price!=""  && $property_type!="" && $subproperty!="") //case-1
        {
         $qry = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,property_type FROM add_posting WHERE (locality like '%$category%' OR property_name like '%$category%' OR name like '%$category%') AND (city like '$city%') AND (price like '%$price%') AND (property_type like '%$property_type%') AND (bedroom like '%$subproperty%')";
        }
        else if($category!="" && $price!=""  && $property_type!="") //case-2
        {
         $qry = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,property_type FROM add_posting WHERE (locality like '%$category%' OR property_name like '%$category%' OR name like '%$category%') AND (city like '$city%') AND (price like '%$price%') AND (property_type like '%$property_type%')";
        }
        else if($category!=""  && $property_type!="" && $subproperty!="") //case-3
        {
         $qry = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,property_type FROM add_posting WHERE (locality like '%$category%' OR property_name like '%$category%' OR name like '%$category%') AND (city like '$city%') AND (property_type like '%$property_type%') AND (bedroom like '%$subproperty%')";
        }
        else if($category!="" && $price!="") //case-4
        {
         $qry = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,property_type FROM add_posting WHERE (locality like '%$category%' OR property_name like '%$category%' OR name like '%$category%') AND (city like '$city%') AND (price like '%$price%')";
        }
        else if($category!="" && $property_type!="") //case-5
        {
         $qry = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,property_type FROM add_posting WHERE (locality like '%$category%' OR property_name like '%$category%' OR name like '%$category%')  AND (city like '$city%') AND (property_type like '%$property_type%')";
        }
        else if($category!="") //case-6
        {
         $qry = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,property_type FROM add_posting WHERE (locality like '%$category%' OR property_name like '%$category%' OR name like '%$category%') AND (city like '$city%')";
        }
        else if($price!=""  && $property_type!="" && $subproperty!="")  //case-7
        {
         $qry = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,property_type FROM add_posting WHERE (city like '$city%') AND (price like '%$price%') AND (property_type like '%$property_type%') AND (bedroom like '%$subproperty%')";
        }
        else if($price!="" && $property_type!="") //case-8
        {
         $qry = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,property_type FROM add_posting WHERE (city like '$city%') AND (price like '%$price%') AND (property_type like '%$property_type%')";
        }
        else if($price!="") //case-9
        {
         $qry = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,property_type FROM add_posting WHERE (city like '$city%') AND (price like '%$price%')";
        }
        else if($property_type!="" && $subproperty!="") //case-10
        {
         $qry = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,property_type FROM add_posting WHERE (city like '$city%') AND (property_type like '%$property_type%') AND (bedroom like '%$subproperty%')";
        }
        else if($property_type!="") //case-11
        {
         $qry = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,property_type FROM add_posting WHERE (city like '$city%') AND (property_type like '%$property_type%')";
        }
        else    //case-12
        {
         $qry = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,property_type FROM add_posting WHERE city like '$city%'";
        }
        $result = $mysqli->query($qry);
        $count= mysqli_num_rows($result);
  ?>
<!-----------------------------------------------------------Search end----------------------------------------------------->

		  <div class="clearfix"></div>	
	 </div>
</div>
<!--header end-->
<!--Real estate Start--------------------------------------------------------------------------------------------->
<!-------------------Slider end-------------------------------------------------------------------->
  <div class="container" style="margin-top:10px;" onclick="hidesuggetionBoxes()">
      <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="Post/">Post Property</a></li>
  <li class="active">List Property</li>
</ol>
 </div>


<div class="opti">
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<ul class="nav navbar-nav">
					<li class="dropdown" style="width: 220px;">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Budget <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#"><input type="checkbox" value="25-40 Lakh">&nbsp;&nbsp;&nbsp;&nbsp;25-40 Lakh</a></li>
							<li><a href="#"><input type="checkbox" value="30-40 Lakh">&nbsp;&nbsp;&nbsp;&nbsp;30-40 Lakh</a></li>
							<li><a href="#"><input type="checkbox" value="40-60 Lakh">&nbsp;&nbsp;&nbsp;&nbsp;40-60 Lakh</a></li>
							<li><a href="#"><input type="checkbox" value="50-70 Lakh">&nbsp;&nbsp;&nbsp;&nbsp;50-70 Lakh</a></li>
							<li><a href="#"><input type="checkbox" value="70-90 Lakh">&nbsp;&nbsp;&nbsp;&nbsp;70-90 Lakh</a></li>
							<li><a href="#"><input type="checkbox" value="80-120 Lakh">&nbsp;&nbsp;&nbsp;&nbsp;80-120 Lakh</a></li>
						</ul>
					</li>
				</ul>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown" style="width: 220px;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sale Type<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><input type="checkbox" value="Sell">&nbsp;&nbsp;&nbsp;&nbsp;New</a></li>
								<li><a href="#"><input type="checkbox" value="Buy">&nbsp;&nbsp;&nbsp;&nbsp;Resale</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav">
						<li class="dropdown" style="width: 220px;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Availability<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><input type="checkbox" value="Sell">&nbsp;&nbsp;&nbsp;&nbsp;Under Construction</a></li>
								<li><a href="#"><input type="checkbox" value="Buy">&nbsp;&nbsp;&nbsp;&nbsp;Ready For Use</a></li>
							</ul>
						</li>
					</ul>

					<ul class="nav navbar-nav">
						<li class="dropdown" style="width: 220px;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Property Type<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><input type="checkbox" value="Sell">&nbsp;&nbsp;&nbsp;&nbsp;Sell</a></li>
								<li><a href="#"><input type="checkbox" value="Buy">&nbsp;&nbsp;&nbsp;&nbsp;Buy</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav">
						<li class="dropdown" style="width: 220px;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sub Property<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><input type="checkbox" value="1 RK">&nbsp;&nbsp;&nbsp;&nbsp;1 RK</a></li>
								<li><a href="#"><input type="checkbox" value="1 BHK">&nbsp;&nbsp;&nbsp;&nbsp;1 BHK</a></li>
								<li><a href="#"><input type="checkbox" value="2 BHK">&nbsp;&nbsp;&nbsp;&nbsp;2 BHK</a></li>
								<li><a href="#"><input type="checkbox" value="3 BHK">&nbsp;&nbsp;&nbsp;&nbsp;3 BHK</a></li>
								<li><a href="#"><input type="checkbox" value="4 BHK">&nbsp;&nbsp;&nbsp;&nbsp;4 BHK</a></li>
								<li><a href="#"><input type="checkbox" value="5 BHK">&nbsp;&nbsp;&nbsp;&nbsp;5 BHK</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav">
						<li class="dropdown" style="width: 220px;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BHK<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><input type="checkbox" value="1 RK">&nbsp;&nbsp;&nbsp;&nbsp;1 RK</a></li>
								<li><a href="#"><input type="checkbox" value="1 BHK">&nbsp;&nbsp;&nbsp;&nbsp;1 BHK</a></li>
								<li><a href="#"><input type="checkbox" value="2 BHK">&nbsp;&nbsp;&nbsp;&nbsp;2 BHK</a></li>
								<li><a href="#"><input type="checkbox" value="3 BHK">&nbsp;&nbsp;&nbsp;&nbsp;3 BHK</a></li>
								<li><a href="#"><input type="checkbox" value="4 BHK">&nbsp;&nbsp;&nbsp;&nbsp;4 BHK</a></li>
								<li><a href="#"><input type="checkbox" value="5 BHK">&nbsp;&nbsp;&nbsp;&nbsp;5 BHK</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav">
						<li class="dropdown" style="width: 220px;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BHK<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><input type="checkbox" value="1 RK">&nbsp;&nbsp;&nbsp;&nbsp;1 RK</a></li>
								<li><a href="#"><input type="checkbox" value="1 BHK">&nbsp;&nbsp;&nbsp;&nbsp;1 BHK</a></li>
								<li><a href="#"><input type="checkbox" value="2 BHK">&nbsp;&nbsp;&nbsp;&nbsp;2 BHK</a></li>
								<li><a href="#"><input type="checkbox" value="3 BHK">&nbsp;&nbsp;&nbsp;&nbsp;3 BHK</a></li>
								<li><a href="#"><input type="checkbox" value="4 BHK">&nbsp;&nbsp;&nbsp;&nbsp;4 BHK</a></li>
								<li><a href="#"><input type="checkbox" value="5 BHK">&nbsp;&nbsp;&nbsp;&nbsp;5 BHK</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>
</div>




<div class="container" style="display: -moz-inline-stack;" onclick="hidesuggetionBoxes()">
        <div class="estate-property-div1" style="">
		      <div class="col-md-9" style=" box-shadow: 0px 0px 0px #fff;">
			  <form method="post" enctype="multipart/form-data">
                  <div id="loadProperties">
                        <?php
                         if($count==0)
                         {
                         ?>
                          <div class="row" style="border:1px solid #ccc; margin:3px; box-shadow: 0px 0px 0px #fff; margin-bottom: 10px; padding: 10px;">
					          <h4>No Records Found.</h4>
                          </div>
                         <?php
                         }
								while( $row =  $result->fetch_array()) :
						?>
						 <!----row   1------------------------------------------->
			         <div class="row" style="border:1px solid #ccc; margin:3px; box-shadow: 0px 0px 0px #fff; margin-bottom: 10px; padding: 10px;">
					     <h4><?php
                             echo "<a href='Property/".$row['property_name']." - ".$row['locality']." , ".$row['city']." - ".$row['bedroom']." , ".$row['property_type']." Property /".$row['property_id']."'>".$row['property_name']." - ".$row['locality']." , ".$row['city']."</a>";
                         ?></h4>
                         <div class="clearfix"></div>
					    <div class="col-md-5" >
                            <?php
                              echo "<a href='Property/".$row['property_name']." - ".$row['locality']." , ".$row['city']." - ".$row['bedroom']." , ".$row['property_type']." Property /".$row['property_id']."'><img src='".$row['photos']."'/></a>";
                            ?>
						</div>
			               <div class="col-md-7" >
							<div class="shortlist"><?php echo $row['bedroom']; ?> Apartment</div>
						   <div class="view-price"><?php echo $row['price']; ?></div>
							  <div class="view-possesion">Possession</div>
							<div class="view-date"><?php echo $row['possession']; ?></div>
						     <div class="clearfix"></div>
							 <div class="view-possesion">Builtup Area</div>
							<div class="view-date"><?php echo $row['area_sqft']; ?> sq.ft</div>
							   <div class="clearfix"></div>
							   <div class="shortlist" id="<?php echo $row['property_name'].' - '.$row['locality'].', '.$row['city']; ?>">
							    <div class="owner-name">
									<b><img src="images/broker.png"><?php echo $row['owner_type']; ?> :</b>
									<?php echo $row['name']; ?>
								</div>
									<div class="shop-enquiry2" id="<?php echo $row['property_id'];?>" name="<?php echo $row['mob'];?>"  >
                                        <div class="shop-contact-icon" id="" >
                                                <img src="images/enquiry.png">
												Send  Enquiry
                                        </div>
                                    </div>
							   </div>
						</div>
						</div>
					 <?php endwhile; ?>
                  </div>
			</form>
		  </div>
		  <div  id="contact-popup" style="display:none;">
		  <form method="post" name="f1" id="f1"  class="form-validation" enctype="multipart/form-data" action="">
			   <div class="b-close"></div>
			<div class="estate-form2">
					<h4>Interested in this property?</h4>
				<input type="hidden" name="property_name" id="property_name">
				<input type="hidden" name="property_mobile" id="property_mobile">
				<input type="hidden" name="property_id" id="property_id">
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'];?>"/>
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

	<div class="col-md-3"  >
  	   <div class="clearfix"></div>
		  <h6>FEATURED ADS</h6>
			 <?php
			  //execute the SQL query and return records
			  $qr="SELECT * FROM add_advertise order by date desc";
			  $result = $mysqli->query($qr);
				while( $row =  $result->fetch_array()) :
			?>
				<div class="estate-new2 estate-new-tenth">
					<?php echo "<img src='admin/".$row['photo']."'/>";?>
				</div>	
				 <div class="clearfix"></div> 
				  <?php endwhile; ?>			
		      </div>
			  <div class="clearfix"></div>
		</div>
  </div>
<!-------------------Real estate end-------------------------------------------------------------------->
<!-- end registration -->
<?php include("footer.php");?>

<script>
	function clearenquiry()
	{
		$("#mname").val("")
		$("#memail").val("");
		$("#mmobile").val("");
		$("#mmsg").val("");
		$("#property_id").val("");
		$("#property_name").val("");
		$("#property_mobile").val("");
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
			var username=$("#property_mobile").val();
			var user_id=$("#user_id").val();
			var property_id=$("#property_id").val();
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
</script>
