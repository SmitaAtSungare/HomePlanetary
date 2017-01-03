
<?php
if($act=="dynamic_search") {
    $city = $_POST['city'];
    if ($city != "") {
        $citysearch ="city LIKE '%".$city."%'";
    } else {
        $citysearch = '';
    }
    $category = $_POST['category'];
    if ($category != "") {
        $categorysearch =" AND (locality LIKE '%".$category."%' OR name LIKE '%".$category."%' OR property_name LIKE '%".$category."%')";
    } else {
        $categorysearch = '';
    }
    $budget = $_POST['budget'];
    if ($budget != "") {
        $budgetsearch = " AND price LIKE '%".$budget."%'";
    } else {
        $budgetsearch = '';
    }
    $property_type = $_POST['property_type'];
    if ($property_type != "") {
        $property_typesearch = " AND property_type LIKE '%".$property_type."%'";
    } else {
        $property_typesearch = '';
    }
    $bedroom = $_POST['bedroom'];
    if ($bedroom != "") {
        $bedroomsearch = " AND bedroom LIKE '%".$bedroom."%'";
    } else {
        $bedroomsearch = '';
    }
    $budgetlist = $_POST['budgetlist'];
    if($budgetlist!="")
    {
        $budgetArray = explode(',', $budgetlist);
        $countbudget = count($budgetArray);
        if ($countbudget >= 0) {
            $budgetlistsearch = ' UNION ';
            for ($i = 0; $i < $countbudget; $i++) {
                $budgetlistsearch = $budgetlistsearch ."SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,
property_type FROM add_posting WHERE ".$citysearch." AND price LIKE '%".$budgetArray[$i]."%'";
                if ($i != $countbudget - 1) {
                    $budgetlistsearch = $budgetlistsearch . ' UNION ';
                }
            }
            $budgetlistsearch = $budgetlistsearch . '';
        }
    }
    else
    {
        $budgetlistsearch = '';
    }

    $saletypelist = $_POST['saletypelist'];
    if($saletypelist!="")
    {
        $saletypeArray = explode(',', $saletypelist);
        $countsaletype = count($saletypeArray);
        if ($countsaletype >= 0) {
            $saletypelistsearch = ' UNION  ';
            for ($i = 0; $i < $countsaletype; $i++) {
                $saletypelistsearch = $saletypelistsearch."SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,
property_type FROM add_posting WHERE ".$citysearch." AND transaction_type LIKE '%".$saletypeArray[$i]."%'";
                if ($i != $countsaletype - 1) {
                    $saletypelistsearch = $saletypelistsearch . ' UNION ';
                }
            }
            $saletypelistsearch = $saletypelistsearch . '';
        }
    }
    else
    {
        $saletypelistsearch='';
    }

    $availabilitylist = $_POST['availabilitylist'];
    if($availabilitylist!="")
    {
        $availabilityArray = explode(',', $availabilitylist);
        $countavailability = count($availabilityArray);
        if ($countavailability >= 0) {
            $availabilitylistsearch = ' UNION ';
            for ($i = 0; $i < $countavailability; $i++) {
                $availabilitylistsearch = $availabilitylistsearch."SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,
property_type FROM add_posting WHERE ".$citysearch." AND availability LIKE '%".$availabilityArray[$i]."%'";
                if ($i != $countavailability - 1) {
                    $availabilitylistsearch = $availabilitylistsearch . ' UNION ';
                }
            }
            $availabilitylistsearch = $availabilitylistsearch . '';
        }
    }
    else
    {
        $availabilitylistsearch='';
    }

    $property_typelist = $_POST['property_typelist'];
    if($property_typelist!="")
    {
        $property_typeArray = explode(',', $property_typelist);
        $countproperty_type = count($property_typeArray);
        if ($countproperty_type >= 0) {
            $property_typelistsearch = ' UNION ';
            for ($i = 0; $i < $countproperty_type; $i++) {
                $property_typelistsearch = $property_typelistsearch."SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,
property_type FROM add_posting WHERE ".$citysearch." AND property_type LIKE '%".$property_typeArray[$i]."%'";
                if ($i != $countproperty_type - 1) {
                    $property_typelistsearch = $property_typelistsearch . ' UNION ';
                }
            }
            $property_typelistsearch = $property_typelistsearch . '';
        }
    }
    else
    {
        $property_typelistsearch='';
    }

    $subpropertylist = $_POST['subpropertylist'];
    if($subpropertylist!="")
    {
        $subpropertyArray = explode(',', $subpropertylist);
        $countsubproperty = count($subpropertyArray);
        if ($countsubproperty >= 0) {
            $subpropertylistsearch = ' UNION ';
            for ($i = 0; $i < $countsubproperty; $i++) {
                $subpropertylistsearch = $subpropertylistsearch."SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,
property_type FROM add_posting WHERE ".$citysearch." AND bedroom LIKE '%".$subpropertyArray[$i]."%'";
                if ($i != $countsubproperty - 1) {
                    $subpropertylistsearch = $subpropertylistsearch . ' UNION ';
                }
            }
            $subpropertylistsearch = $subpropertylistsearch . '';
        }
    }
    else
    {
        $subpropertylistsearch='';
    }
    $searchparameters1=$budgetlistsearch.$saletypelistsearch.$availabilitylistsearch.$property_typelistsearch.$subpropertylistsearch;
    $searchparameters=$citysearch.$categorysearch.$budgetsearch.$property_typesearch.$bedroomsearch.$searchparameters1;
    try
    {
        $db = getDB();
        $sql = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,
property_type FROM add_posting WHERE ".$searchparameters;
//echo $sql;
        $stmt = $db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $jsonmsg->msgtype="success";
        $jsonmsg->desc="";
        $jsonmsg->result=$result;
    }
    catch (PDOException $e)
    {
        throw $e;
    }
}


/*



 if($act=="dynamic_search") {
        $city = $_POST['city'];
        if ($city != "") {
            $citysearch ="city LIKE '%".$city."%'";
        } else {
            $citysearch = '';
        }
        $category = $_POST['category'];
        if ($category != "") {
            $categorysearch =" AND (locality LIKE '%".$category."%' OR name LIKE '%".$category."%' OR property_name LIKE '%".$category."%')";
        } else {
            $categorysearch = '';
        }
        $budget = $_POST['budget'];
        if ($budget != "") {
            $budgetsearch = " AND price LIKE '%".$budget."%'";
        } else {
            $budgetsearch = '';
        }
        $property_type = $_POST['property_type'];
        if ($property_type != "") {
            $property_typesearch = " AND property_type LIKE '%".$property_type."%'";
        } else {
            $property_typesearch = '';
        }
        $bedroom = $_POST['bedroom'];
        if ($bedroom != "") {
            $bedroomsearch = " AND bedroom LIKE '%".$bedroom."%'";
        } else {
            $bedroomsearch = '';
        }
        $budgetlist = $_POST['budgetlist'];
        if($budgetlist!="")
        {
            $budgetArray = explode(',', $budgetlist);
            $countbudget = count($budgetArray);
            if ($countbudget >= 0) {
                $budgetlistsearch = ' AND (';
                for ($i = 0; $i < $countbudget; $i++) {
                    $budgetlistsearch = $budgetlistsearch ."price LIKE '%".$budgetArray[$i]."%'";
                    if ($i != $countbudget - 1) {
                        $budgetlistsearch = $budgetlistsearch . ' OR ';
                    }
                }
                $budgetlistsearch = $budgetlistsearch . ')';
            }
        }
        else
        {
            $budgetlistsearch = '';
        }

        $saletypelist = $_POST['saletypelist'];
         if($saletypelist!="")
         {
            $saletypeArray = explode(',', $saletypelist);
            $countsaletype = count($saletypeArray);
            if ($countsaletype >= 0) {
                $saletypelistsearch = ' AND (';
                for ($i = 0; $i < $countsaletype; $i++) {
                    $saletypelistsearch = $saletypelistsearch."transaction_type LIKE '%".$saletypeArray[$i]."%'";
                    if ($i != $countsaletype - 1) {
                        $saletypelistsearch = $saletypelistsearch . ' OR ';
                    }
                }
                $saletypelistsearch = $saletypelistsearch . ')';
            }
        }
        else
        {
            $saletypelistsearch='';
        }

        $availabilitylist = $_POST['availabilitylist'];
        if($availabilitylist!="")
        {
            $availabilityArray = explode(',', $availabilitylist);
            $countavailability = count($availabilityArray);
            if ($countavailability >= 0) {
                $availabilitylistsearch = ' AND (';
                for ($i = 0; $i < $countavailability; $i++) {
                    $availabilitylistsearch = $availabilitylistsearch."availability LIKE '%".$availabilityArray[$i]."%'";
                    if ($i != $countavailability - 1) {
                        $availabilitylistsearch = $availabilitylistsearch . ' OR ';
                    }
                }
                $availabilitylistsearch = $availabilitylistsearch . ')';
            }
        }
        else
        {
            $availabilitylistsearch='';
        }

        $property_typelist = $_POST['property_typelist'];
        if($property_typelist!="")
        {
            $property_typeArray = explode(',', $property_typelist);
            $countproperty_type = count($property_typeArray);
            if ($countproperty_type >= 0) {
                $property_typelistsearch = ' AND (';
                for ($i = 0; $i < $countproperty_type; $i++) {
                    $property_typelistsearch = $property_typelistsearch."property_type LIKE '%".$property_typeArray[$i]."%'";
                    if ($i != $countproperty_type - 1) {
                        $property_typelistsearch = $property_typelistsearch . ' OR ';
                    }
                }
                $property_typelistsearch = $property_typelistsearch . ')';
            }
        }
        else
        {
            $property_typelistsearch='';
        }

        $subpropertylist = $_POST['subpropertylist'];
        if($subpropertylist!="")
        {
            $subpropertyArray = explode(',', $subpropertylist);
            $countsubproperty = count($subpropertyArray);
            if ($countsubproperty >= 0) {
                $subpropertylistsearch = ' AND (';
                for ($i = 0; $i < $countsubproperty; $i++) {
                    $subpropertylistsearch = $subpropertylistsearch."bedroom LIKE '%".$subpropertyArray[$i]."%'";
                    if ($i != $countsubproperty - 1) {
                        $subpropertylistsearch = $subpropertylistsearch . ' OR ';
                    }
                }
                $subpropertylistsearch = $subpropertylistsearch . ')';
            }
        }
        else
        {
            $subpropertylistsearch='';
        }
        $searchparameters=$citysearch.$categorysearch.$budgetsearch.$property_typesearch.$bedroomsearch.$budgetlistsearch.$saletypelistsearch.$availabilitylistsearch.$property_typelistsearch.$subpropertylistsearch;
        try
        {
            $db = getDB();
         $sql = "SELECT property_id,property_name,locality,city,photos,bedroom,price,possession,area_sqft,owner_type,name,mob,
property_type FROM add_posting WHERE ".$searchparameters;
//echo $sql;
                  $stmt = $db->query($sql);
                  $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="";
            $jsonmsg->result=$result;
        }
        catch (PDOException $e)
        {
            throw $e;
        }
    }





$result = $mysqli->query("SELECT * FROM property_list WHERE property_id=$id");
$pcount = $result->num_rows;
if($pcount>0)
{

}
else
{

}

                        <table class="table table-bordered"  >
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>Area (in sq.ft)</th>
                            <th>Sell Price</th>
                            <th>Floor Number</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="">
                            <td><?php echo $row['bedroom']; ?> Apartments</td>
                            <td><?php echo $row['area_sqft']; ?> Sq. Ft.</td>
                            <td> ₹  <?php echo $row['price']; ?></td>
                            <td><?php echo $row['floor_no']; ?></td>
                        </tr>
                        </tbody>
                        </table>

                     <table class="table table-bordered"  >
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
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result1 = $mysqli->query("SELECT property_type,bedroom,transaction_type,price,possession,area,rate_sqft,floor_no,floor_plan FROM property_list WHERE property_id=$id");
                            while ($row1 = $result1->fetch_array())
                            {
                                echo "<tr><td><img id='avatar' name='avatar' alt='Floor Plan Image' src='".$row1['floor_plan']."' style='width: 58px;height: 40px;'/></td><td>".$row1['property_type']."</td><td>".$row1['bedroom']." Apartments</td><td>".$row1['transaction_type']."</td><td> ₹  ".$row1['price']."</td><td>".$row1['possession']."</td><td>".$row1['area']." Sq. Ft.</td><td>".$row1['rate_sqft']."</td><td>".$row1['floor_no']."</td></tr>";
                            }
                            ?>
                        </tbody>
                        </table>































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



