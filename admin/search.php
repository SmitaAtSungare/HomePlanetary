<?php include 'header.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Approved Property List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Approved Property List</li>
      </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <form method="post" name="delete_action_form" enctype="multipart/form-data">
                          <section class="content">
                               <div class="clear"></div>
                                  <br/>
                                     <div class="row">
                                        <div class="col-xs-12">
                                            <div class="box">
                                                <div class="box-body">
                                                    <?php
                                                        echo "<h2>Search Results:</h2><p>";
                                                        if(isset($_POST['search']))
                                                        {
                                                        $find =$_POST['find'];
                                                        $find1 =$_POST['find1'];
                                                        if (($find == "") && ($find1 == ""))
                                                        {
                                                        echo "<p>You forgot to enter a search term!!!";
                                                        exit;
                                                        }
                                                        $find = strtoupper($find);
                                                        $find = strip_tags($find);
                                                        $find = trim ($find);
                                                        $find1 = strtoupper($find1);
                                                        $find1 = strip_tags($find1);
                                                        $find1 = trim ($find1);
                                                        $result1 = $mysqli->query("SELECT * FROM add_posting where property_name LIKE '%".$find."%' and name LIKE '%".$find1."%'");
                                                        $anymatches = mysql_num_rows($result1);
                                                        if ($anymatches == 0)
                                                        {
                                                        echo "Sorry, but we can not find an entry to match your query...<br><br>";
                                                        }
                                                        }
                                                     ?>
                                                     <table id="example2" class="table table-bordered table-hover">
                                                        <thead>
                                                          <tr style="text-align:center;">
                                                            <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;"><input type="checkbox" name="select_all" id="select_all" value=""/></th>
                                                            <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Property Name</th>
                                                            <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Location</th>
                                                            <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Property Details</th>
                                                            <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">User Name</th>
                                                            <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Mobile</th>
                                                            <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Action</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody id="show">
                                                        <?php
                                                                  while( $row = mysqli_fetch_array( $result1) ) : ?>
                                                            <tr>
                                                                <td bgcolor="#FFFFFF"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['property_id']; ?>"/></td>
                                                                <td><?php echo $row['property_name']; ?></td>
                                                                <td><?php echo $row['locality'].' , '.$row['city']; ?></td>
                                                                <td><?php echo $row['property_details']; ?></td>
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td><?php echo $row['mob']; ?></td>
                                                                <td><a href="EditAds/<?php echo $row['property_id']?>"><input type="button" value="EDIT"></a></td>
                                                            </tr>
                                                           <?php endwhile; ?>
                                                        </tbody>
                                                      </table>
                                      <div class="modal-footer">
                                             <a href="NewPropertyList/"><input type="button"  name="" value="Back"/></a>
                                            <input type="submit" onsubmit="return deleteConfirm();" name="delete_submit" value="Delete"/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                           </div>
                         </section>
                     </form>
		  	    </div>
<?php
include 'footer.php';
if ( ! empty( $_POST ) ) {
    if(isset($_POST['delete_submit'])){
        $idArr = $_POST['checked_id'];
        foreach($idArr as $property_id)
		{
			$qry = "DELETE FROM add_posting WHERE property_id=$property_id";
            $mysqli->query($qry);
            header('location:'.$base.'NewPropertyList/');

           // echo '<META HTTP-EQUIV="Refresh" Content="0; approved_list.php">';
        }
    }
}
?>