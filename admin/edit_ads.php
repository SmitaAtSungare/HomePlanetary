<?php  include 'header.php';  ?>
<div class="content-wrapper">
	<section class="content-header">
	  <h1>
	  Edit Ads
	  </h1>
	  <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"> Edit Ads</li>
	  </ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<form method="post" enctype="multipart/form-data">
                <section class="content">
                   <div class="clear"></div>
                      <br/>
                        <div class="container" style="background:#FDFDFD; box-shadow:0px 7px 11px #ccc;  margin-top: 5px;" >
                             <?php
                                $id=$_GET['id'];
                                $result = $mysqli->query("SELECT * FROM add_posting WHERE property_id='$id'");
                                while( $row =  $result->fetch_array()) :
                            ?>
                            <form id="frmad" name="frmad" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="property_id" name="property_id" value="<?php echo $_GET['id'];?>"/>
                                 <div class="col-md-12" style="border-bottom:1px solid #ccc;    padding-top: 40px;  padding-bottom:10px; margin-bottom:10px;">
                                    <div class="row">
                                         <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">PROJECT NAME<span style="color:red">*</span></label>
                                                <div class="col-xs-4">
                                                  <input type="text" class="form-control-realestate" value="<?php echo $row['property_name']; ?>" id="property_name" name="property_name" placeholder="Project Name" required />
                                                </div>
                                             </div>
                                    </div>
                                    <div class="row">
                                         <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">CITY<span style="color:red">*</span></label>
                                                <div class="col-xs-4">
                                                  <input type="text" class="form-control-realestate" value="<?php echo $row['city']; ?>" id="city" name="city" placeholder="City" required />
                                                </div>
                                             </div>
                                    </div>
                                    <div class="row">
                                         <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">LOCALITY<span style="color:red">*</span></label>
                                                <div class="col-xs-4">
                                                  <input type="text" class="form-control-realestate" id="locality" value="<?php echo $row['locality']; ?>" name="locality" placeholder="Locality" required />
                                                </div>
                                             </div>
                                    </div>
                                    <div class="row">
                                         <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">ADDRESS<span style="color:red">*</span></label>
                                                <div class="col-xs-4">
                                                <input type="text" class="form-control-realestate" value="<?php echo $row['address']; ?>" id="address" name="address" placeholder="Address"/>
                                                </div>
                                             </div>
                                    </div>
                                    <div class="row">
                                         <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">LANDMARK<span style="color:red">*</span></label>
                                                <div class="col-xs-4">
                                                  <input type="text" class="form-control-realestate" value="<?php echo $row['landmark']; ?>" id="landmark" name="landmark" placeholder="Landmark"/>
                                                </div>
                                             </div>
                                        </div>
                                 </div>
                                  <div class="col-md-12">
                                    <div class="row">
                                         <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">PROPERTY TYPE<span style="color:red">*</span></label>
                                                <div class="col-xs-4">
                                                    <select id="property_type" name="property_type" class="form-control-realestate"
                                                            required>
                                                        <?php
                                                        if ($row['property_type'] == "Residential") {
                                                            echo "<option value='Residential'>Residential</option>";
                                                            echo "<option value='Commercial'>Commercial</option>";
                                                        } else if ($row['property_type'] == "Commercial") {
                                                            echo "<option value='Commercial'>Commercial</option>";
                                                            echo "<option value='Residential'>Residential</option>";
                                                        } else {
                                                            echo "<option value='Residential'>Residential</option>";
                                                            echo "<option value='Commercial'>Commercial</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                             </div>
                                    </div>
                                    <div class="row">
                                         <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">TRANSACTION TYPE<span style="color:red">*</span></label>
                                                <div class="col-xs-4">
                                                    <select id="transaction_type" name="transaction_type" class="form-control-realestate"
                                                            required>
                                                        <?php
                                                        if ($row['transaction_type'] == "Buy") {
                                                            echo "<option value='Buy'>Buy</option>";
                                                            echo "<option value='Sell'>Sell</option>";
                                                        } else if ($row['transaction_type'] == "Sell") {
                                                            echo "<option value='Sell'>Sell</option>";
                                                            echo "<option value='Buy'>Buy</option>";
                                                        } else {
                                                            echo "<option value='Buy'>Buy</option>";
                                                            echo "<option value='Sell'>Sell</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                             </div>
                                    </div>
                                    <div class="row">
                                         <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">BEDROOM<span style="color:red">*</span></label>
                                                <div class="col-xs-4">
                                                  <input type="text" class="form-control-realestate" value="<?php echo $row['bedroom']; ?>" id="bedroom" name="bedroom" placeholder="Bedroom"/>
                                                </div>
                                             </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">POSSESSION DATE<span style="color:red">*</span></label>
                                                    <div class="col-xs-4">
                                                     <input type="text" class="form-control-realestate" value="<?php echo $row['possession']; ?>" id="possession" name="possession" placeholder="Possession Date" required/>
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">PRICE<span style="color:red">*</span></label>
                                                    <div class="col-xs-4">
                                                     <input type="text" class="form-control-realestate" value="<?php echo $row['price']; ?>" id="price" name="price" placeholder="Price" required />
                                                    </div>
                                        </div>
                                    </div>
                                   <div class="clearfix"></div>
                                    <div class="row">
                                    <div class="form-group realestateform has-feedback">
                                                <label for="Price" class="col-sm-3 control-label">AREA SIZE<span style="color:red">*</span></label>
                                                  <div class="col-xs-4">
                                                             <input type="text" placeholder="Enter Size" class="form-control-realestate" value="<?php echo $row['area_sqft']; ?>" id="area" name="area" required />
                                                 </div>
                                    </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">RATE/SQ.FT<span style="color:red">*</span></label>
                                                    <div class="col-xs-4">
                                                     <input type="text" class="form-control-realestate" value="<?php echo $row['rate_sqft']; ?>" id="rate_sqft" name="rate_sqft" placeholder="Rate Sq.Ft." required />
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">NO OF FLOOR<span style="color:red">*</span></label>
                                                    <div class="col-xs-4">
                                                     <input type="text" class="form-control-realestate" value="<?php echo $row['floor_no']; ?>"  id="floor_no" name="floor_no" placeholder="No Of Floor" />
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
                                                     <input type="text" class="form-control-realestate" value="<?php echo $row['amenities']; ?>"  id="amenities" name="amenities" placeholder="Amenities"/>
                                                    </div>
                                        </div>
                                    </div>
                                  </div>
                                    <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
                                      <div class="row">
                                         <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-2 control-label">NEARBY SERVICES<span style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                <div class="col-md-12">
                                                <table class="table table-bordered">
                                                     <tbody>
                                                      <tr class="">
                                                        <td>Airport</td>
                                                         <td> Airport</td>
                                                         <td><input type="text" value="<?php echo $row['airport']; ?>" id="airport" name="airport" placeholder="Airport"/></td>
                                                         <td>KM</td>
                                                      </tr>
                                                      <tr>
                                                         <td>Railway station</td>
                                                         <td> Railway station</td>
                                                         <td><input type="text" value="<?php echo $row['train']; ?>" id="train" name="train" placeholder="Railway Station"/></td>
                                                         <td>KM</td>
                                                      </tr>
                                                     <tr class="">
                                                          <td>Bustop.</td>
                                                          <td>multiple</td>
                                                          <td><input type="text" value="<?php echo $row['bustop']; ?>" id="bustop" name="bustop" placeholder="Bustop"/></td>
                                                          <td>KM</td>
                                                     </tr>
                                                     <tr>
                                                          <td>Nearest School</td>
                                                          <td>multiple</td>
                                                          <td><input type="text" value="<?php echo $row['school']; ?>" id="school" name="school" placeholder="Nearest School"/></td>
                                                          <td>KM</td>
                                                     </tr>
                                                      <tr class="">
                                                         <td>Nearest Hospital</td>
                                                         <td>multiple</td>
                                                         <td><input type="text" value="<?php echo $row['hospital']; ?>" id="hospital" name="hospital" placeholder="Nearest Hospital"/></td>
                                                         <td>KM</td>
                                                     </tr>
                                                      <tr>
                                                           <td>Nearest Restaurant</td>
                                                           <td>multiple</td>
                                                           <td><input type="text" value="<?php echo $row['resto']; ?>" id="resto" name="resto" placeholder="Nearest Restaurant"/></td>
                                                           <td>KM</td>
                                                     </tr>
                                                     <tr>
                                                           <td>Nearest Bank/ ATM</td>
                                                           <td>multiple</td>
                                                           <td><input type="text" value="<?php echo $row['bank']; ?>" id="bank" name="bank" placeholder="Nearest Bank/ATM"/></td>
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
                                                <label for="title" class="col-sm-2 control-label">PROPERTY DETAIL<span style="color:red">*</span></label>
                                                <div class="col-xs-8">
                                                <div class="col-xs-12">
                                                <textarea class="form-control psttext" rows="3" cols="70" data-bv-field="desc" name="property_details" id="property_details" placeholder="Property Detail"><?php echo $row['property_details']; ?></textarea>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                  </div>
                                 <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
                                     <div class="row">
                                         <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">BUILDER/OWNER/AGENT NAME <span style="color:red">*</span></label>
                                                <div class="col-xs-3">
                                                  <input type="text" class="form-control-realestate2" readonly value="<?php echo $row['name']; ?>" id="name" name="uname" placeholder="Builder/Owner/Agent Name" required />
                                                </div>
                                             </div>
                                    </div>
                                <div class="row">
                                    <div class="form-group realestateform has-feedback">
                                        <label for="title" class="col-sm-3 control-label">
                                                ARE YOU A<span style="color:red">*</span></label>
                                                <div class="col-xs-3">
                                                          <input type="text" class="form-control-realestate2" readonly value="<?php echo $row['owner_type']; ?>" id="owner_type" name="owner_type" placeholder="Are You A" required />
                                                </div>
                                    </div>
                                </div>
                                 <div class="row">
                                         <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">E-MAIL ID<span style="color:red">*</span></label>
                                                <div class="col-xs-3">
                                                  <input type="text" class="form-control-realestate2" value="<?php echo $row['email']; ?>" id="email" name="email" placeholder="Email Id" required />
                                                </div>
                                         </div>
                                </div>
                                <div class="row">
                                         <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">MOBILE NUMBER<span style="color:red">*</span></label>
                                                <div class="col-xs-3">
                                                  <input type="text" class="form-control-realestate2" id="mob" readonly name="mob" value="<?php echo $row['mob'];?>" placeholder="Mobile Number"/>
                                                </div>
                                             </div>
                                </div>
                                <div class="row">
                                         <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">LANDLINE NUMBER<span style="color:red">*</span></label>
                                                <div class="col-xs-3">
                                                  <input type="text" class="form-control-realestate2" value="<?php echo $row['landline']; ?>" id="landline" name="landline" placeholder="Landline Number"/>
                                                </div>
                                             </div>
                                </div>
                                <div class="row">
                                       <div class="form-group realestateform has-feedback">
                                                <label for="title" class="col-sm-3 control-label">ABOUT BUILDER<span style="color:red">*</span></label>
                                                <div class="col-xs-3">
                                                <textarea class="form-control psttext" rows="3" cols="70" data-bv-field="desc" id="about_builder" name="about_builder" placeholder="About Builder"><?php echo $row['about_builder']; ?></textarea>
                                                </div>
                                        </div>
                                    </div>
                                    </br>
                                    </br>
                                 <div class="col-md-12" style="border-top:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
                                        <div class="form-group pstAd">
                                                <div class="controls sbt">
                                                    <button type="button" class="btn btn-small btn-primary" id="cmdSubmit" name="update" onclick="updateAd()">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php endwhile; ?>
                                 </div>
                            </div>
                        </section>
					</form>
				</div>
<?php include 'footer.php';?>

<script language="javascript" type="text/javascript">
	function approve_func(myid)
	{
		var ajaxRequest;
		try{
			ajaxRequest = new XMLHttpRequest();
		}
		catch (e){
			try{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					alert("Your browser broke!");
					return false;
				}
			}
		}
		ajaxRequest.onreadystatechange = function(){
			if(ajaxRequest.readyState == 4){
				if(ajaxRequest.status == 200)
				{
					location.reload();
				}
			}
			location.reload();
		}
		var queryString = "?id=" + myid;
		ajaxRequest.open("GET", "update.php" + queryString, true);
		ajaxRequest.send(null);
	}
	function s_reload()
	{
		location.reload();
	}
	$(document).ready(function(){
        loadsingleAd();
	});
    function loadsingleAd()
    {
        var frmdata = new FormData();
        frmdata.append('act','loadsingleAd');
        frmdata.append('property_id',$("#property_id").val());
        var varurl="../ajaxwebapi/service.php";
        $.ajax({
            url:varurl,
            type:"POST",
            data:frmdata,
            cache:false,
            contentType:false,
            processData:false,
            succes:function(response){
                if(response.msgtype="success")
                {
                    var list = JSON.parse(response);
                    var arr = list.result;
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
                }
                else if(response.msgtype="error")
                {
                    alert("Error Occured!"+response.desc);
                }
            },
            error:function(xhr){
               alert("Ajax Call Error");
            }
        });

    }
    function updateAd()
    {
        if(!$("#frmad").valid())
        {
            return;
        }
        var frmdata = new FormData();
        frmdata.append('act','updateAd');
        frmdata.append('property_id',$("#property_id").val());
        frmdata.append('property_name',$("#property_name").val());
        frmdata.append('city',$("#city").val());
        frmdata.append('locality',$("#locality").val());
        frmdata.append('address',$("#address").val());
        frmdata.append('landmark',$("#landmark").val());
        frmdata.append('property_type',$("#property_type").val());
        frmdata.append('transaction_type',$("#transaction_type").val());
        frmdata.append('bedroom',$("#bedroom").val());
        frmdata.append('possession',$("#possession").val());
        frmdata.append('price',$("#price").val());
        frmdata.append('area',$("#area").val());
        frmdata.append('rate_sqft',$("#rate_sqft").val());
        frmdata.append('floor_no',$("#floor_no").val());
        frmdata.append('amenities',$("#amenities").val());
        frmdata.append('airport',$("#airport").val());
        frmdata.append('train',$("#train").val());
        frmdata.append('bustop',$("#bustop").val());
        frmdata.append('school',$("#school").val());
        frmdata.append('hospital',$("#hospital").val());
        frmdata.append('resto',$("#resto").val());
        frmdata.append('bank',$("#bank").val());
        frmdata.append('property_details',$("#property_details").val());
        frmdata.append('name',$("#name").val());
        frmdata.append('owner_type',$("#owner_type").val());
        frmdata.append('email',$("#email").val());
        frmdata.append('mob',$("#mob").val());
        frmdata.append('landline',$("#landline").val());
        frmdata.append('about_builder',$("#about_builder").val());

        var varurl="../ajaxwebapi/service.php";
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
                   alert("Updated Successfully");
                   window.location.href="index.php";
               }
               else if(response.msgtype="error")
               {
                   alert("Error Occured!"+response.desc);
               }
            },
            error:function(xhr){
               alert("Ajax Call Error");
            }
        });
    }
</script>
<?php
if ( ! empty( $_POST ) ) {
    if(isset($_POST['delete_submit'])){
        $idArr = $_POST['checked_id'];
        foreach($idArr as $gallery_id){
			$mysqli->query("DELETE FROM galleries WHERE gallery_id=$gallery_id");
			echo '<META HTTP-EQUIV="Refresh" Content="0;view_album.php">'; 
        }
    }
}
?>