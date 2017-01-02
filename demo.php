
<?php
/*
$Rawjson=rawurldecode($_POST['hfprotable']);
$Protable = json_decode($Rawjson, true);
$property_type='';
$bedroom='';
$transaction_type='';
$price='';
$possession='';
$area='';
$rate_sqft='';
floor_no='';
floor_plan='';
foreach($Protable as $key => $value)
{
$property_type=$property_type.$value[property_type].",";
$bedroom=$bedroom.$value[bedroom].",";
$transaction_type=$transaction_type.$value[transaction_type].",";
$price=$price.$value[price].",";
$possession=$transaction_type.$value[possession].",";
$area=$area.$value[area].",";
$rate_sqft=$rate_sqft.$value[rate_sqft].",";
floor_no=$floor_no.$value[floor_no].",";
floor_plan=$floor_plan.$value[floor_plan].",";
}

$stmt = $db->query("SELECT last_insert_id() AS pid");
while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
      $property_id= $row[0];
}
$Rawjson=rawurldecode($_POST['hfprotable']);
$Protable = json_decode($Rawjson, true);

//print_r($Protable);
foreach($Protable as $key => $value)
{
$save="INSERT INTO property_list(property_id,property_type,bedroom,transaction_type,price,possession,area,rate_sqft,floor_no,floor_plan)
 VALUES ($property_id,'$value[property_type]','$value[bedroom]','$value[transaction_type]','$value[price]','$value[possession]',
'$value[area]','$value[rate_sqft]','$value[floor_no]','$value[floor_plan]')";
 $stmt = $db->query($save);
}

<script>

var Protable=[];
function AddProperty()
{
var property_type=$("#property_type").val();
var bedroom=$("#bedroom").val();
var transaction_type=$("#transaction_type").val();
var price=$("#price").val();
var possession=$("#possession").val();
var area=$("#area").val();
var rate_sqft=$("#rate_sqft").val();
var floor_no=$("#floor_no").val();
uploadimage();
var floor_plan="property_images/floor_plan"+$("#floorpath").val();

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
function RemoveProduct(rowindex)
{
//var r = bootbox.confirm("sure to delte")
var r = confirm("Sure to delete");
if (r == true) {
    Protable.splice(rowindex,1);
    RefreshGrid();
}
}
function removeimage()
{
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
}

function RefreshGrid()
{
var str=escape(JSON.stringify(Protable));
$("#hfprotable").val(str);
$("#tblProd > tbody").html("");
var total=0;
for(i=0;i<Protable.length;i++)
{
var trcontent='<tr><td><img id="avatar" name="avatar" alt="Floor Plan Image" src="'+Protable[i].floor_plan+'" style="width: 12px;height: 12px;"/></td><td>'+Protable[i].property_type+'</td><td>'+Protable[i].bedroom+'</td><td>'+Protable[i].transaction_type+'</td><td>'+Protable[i].price+'</td><td>'+Protable[i].possession+'</td><td>'+Protable[i].area+'</td><td>'+Protable[i].rate_sqft+'</td><td>'+Protable[i].floor_no+'</td><td align="center"><a href="javascript:RemoveProduct('+i+')" class="btnlink btn-red"><i class="fa fa-remove"></i></a></td> </tr>';
$('#tblProd > tbody:last').append(trcontent);
}
}


</script>







































<div id="property-popup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enter Property Details</h4>
            </div>
            <div class="modal-body">
                <form id="propertyfrm" name="propertyfrm" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Property Type</label>
                                <select id="property_type" name="property_type" class="form-control" onchange="setsubProperty()" required>
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
                                <div class="row" id="subPropertyDiv" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Transaction Type</label>
                                <select id="transaction_type" name="transaction_type" class="form-control" required>
                                    <option value="">Transaction Type</option>
                                    <option value="New">New</option>
                                    <option value="Resale">Resale</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Price</label>
                                <select id="price" name="price" class="form-control"  required>
                                    <option value="">Price</option>
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="property-popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel"> Enter Property Details </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mymodal">

                            <div id="Registration">
                                <form id="frmreg" name="frmreg" method="post" role="form">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select id="property_type" name="property_type" class="form-control" onchange="setsubProperty()" required>
                                                        <option value="">Property Type</option>
                                                        <option value="Residential">Residential</option>
                                                        <option value="Commercial">Commercial</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select id="transaction_type" name="transaction_type" class="form-control-realestate" required>
                                                        <option value="">Transaction Type</option>
                                                        <option value="New">New</option>
                                                        <option value="Resale">Resale</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row" id="subPropertyDiv" style="display: none;">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <select id="price" name="price" class="form-control-realestate"  required>
                                                        <option value="">Price</option>
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
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control-realestate" id="possession" name="possession" placeholder="Possession Date" required/>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control-realestate" placeholder="Enter Size(sq.feet/sq.mtr)" id="area" name="area" required/>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control-realestate" id="rate_sqft" name="rate_sqft" placeholder="Rate Sq.Ft" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control-realestate" id="floor_no" name="floor_no" placeholder="No Of Floor"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="file" id="floor_plan" name="floor_plan" required  class="form-control-realestate2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="modal-footer">
                                            <div class="col-sm-10">
                                                <button type="button" id="Add" name="Add" class="btn btn-default" onclick="AddProperty()">Add</button>

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


<div class="row">
<div class="col-lg-12">
<table>
<tbody>
<tr>
<td>
 <input type="file" id="floor_plan" name="floor_plan" required  class="form-control-realestate2">
</td>

<td>
<select id="property_type" name="property_type" class="form-control-realestate" onchange="setsubProperty()" required>
        <option value="">Property Type</option>
        <option value="Residential">Residential</option>
        <option value="Commercial">Commercial</option>
        <option value="Other">Other</option>
</select>
</td>
<td>
<div class="row" id="subPropertyDiv" style="display: none;">

</div>
</td>
<td>
<select id="transaction_type" name="transaction_type" class="form-control-realestate" required>
        <option value="">Transaction Type</option>
        <option value="New">New</option>
        <option value="Resale">Resale</option>
</select>
</td>
<td>
<select id="price" name="price" class="form-control-realestate"  required>
      <option value="">Price</option>
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
</td>
<td>
     <input type="text" class="form-control-realestate" id="possession" name="possession" placeholder="Possession Date" required/>
</td>
<td>
   <input type="text" class="form-control-realestate" placeholder="Enter Size(sq.feet/sq.mtr)" id="area" name="area" required/>
</td>
<td>
   <input type="text" class="form-control-realestate" id="rate_sqft" name="rate_sqft" placeholder="Rate Sq.Ft" required/>
</td>
<td>
   <input type="text" class="form-control-realestate" id="floor_no" name="floor_no" placeholder="No Of Floor"/>
</td>
<td>
    <button type="button" name="add" id="add" value="add" class="btn btn-primary" onclick="AddProperty(),cleartext()"><i class="fa fa-plus"></i> Add</button>
</td>
</tr>
</tbody>

</table>
<input type="hidden" id="hfprotable" name="hfprotable"/>
<div id="propertyTbl" style="overflow-x:scroll!important;">
    <table id="tblProd" class="table table-hover table-nomargin dataTable table-bordered dataTable-scroller dataTable-tools" data-ajax-source="js/plugins/datatables/demo.txt">
        <thead>
            <tr>
                <th>Floor Plan</th>
                <th>Product Type</th>
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



*/
?>
<?php
/*
function sendMessage($text,$mobile){
//   echo $text.$mobile;
    echo "<script>"
        ."$.ajax({"
        ."url : 'http://trans.smsfresh.co/api/sendmsg.php',"
        ."type : 'get',"
        ."data : {user:'magarsham', pass:'festivito5555', sender:'HOMPLN' ,phone:'".$mobile."', text:'".$text."', priority:'ndnd', stype:'normal'}"
        ."});"
        ."</script>";
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
            echo '<script type="text/javascript">alert("Your Account Is Verified Now You Can Login.");window.location.href="Authentication/";</script>';
        }
        else
        {
            echo '<script type="text/javascript">alert("OTP Does Not Match");window.location.reload();</script>';
        }
    }
    else if($verification_type=="E")
    {
        $vcode=$_POST['vcode'];
        $enq_id=$_POST['muser_id'];
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
            $message="<h2>Thank you for showing interest in this property...</h2><h3>We will get back to you...</h3>\r\n";
            $sentmail = mail($to,$subject,$message,$header);
            echo '<script type="text/javascript">alert("Your enquiry has been submitted successfully.");window.location.href="Home/";</script>';
        }
        else
        {
            echo '<script type="text/javascript">alert("OTP Does Not Match");window.location.reload();</script>';
        }
    }
}

//javascript function
function showverify(type,user_id)
{
document.getElementById("mverification_type").value=type;
document.getElementById("muser_id").value=user_id;
$('#verification-popup').bPopup();
}
*/
?>



