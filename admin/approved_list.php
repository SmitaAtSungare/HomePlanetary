<?php
include 'header.php';
?>
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
                                   <br>
                                   <form method="post" action="search.php">
                                        Enter Property Name:  <input type="text" name="find" />
                                        Enter Builder Name: <input type="text" name="find1" />
                                        <input type="submit" name="search" value="Search" />
                                    </form>
                                    <form method="post" name="delete_action_form" enctype="multipart/form-data">
                                     <section class="content">
                                           <div class="clear"></div>
                                              <br/>
                                                 <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="box">
                                                            <div class="box-body">
                                                             <?php
                                                              $qr="SELECT * FROM add_posting where transaction_type='New'";
                                                              $result = $mysqli->query($qr);
                                                              ?>
                                                             <table id="example2" class="table table-bordered table-hover">
                                                                <thead>
                                                                  <tr style="text-align:center;">
                                                                    <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">
                                                                    <input type="checkbox" name="select_all" id="select_all" value=""/>
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
                                                                        while( $row =  $result->fetch_array()) :
                                                                ?>
                                                                    <tr>
                                                                        <td bgcolor="#FFFFFF">
                                                                        <input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['property_id']; ?>"/></td>
                                                                        <td><?php echo $row['property_name']; ?></td>
                                                                        <td><?php echo $row['locality'].' , '.$row['city']; ?></td>
                                                                        <td><?php echo $row['property_details']; ?></td>
                                                                        <td><?php echo $row['name']; ?></td>
                                                                        <td><?php echo $row['mob']; ?></td>
                                                                        <td>
                                                                            <a href="EditAds/<?php echo $row['property_id']?>"><input type="button" value="EDIT"></a>
                                                                             <input type='button' id=<?php echo $row['property_id'];?> value='Approve' onclick='approve_func(this.id)'>
                                                                        </td>
                                                                    </tr>
                                                                   <?php endwhile; ?>
                                                                </tbody>
                                                              </table>
                                                  <div class="modal-footer">
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
        ajaxRequest.open("GET", "featured.php" + queryString, true);
        ajaxRequest.send(null);
    }
    function s_reload()
    {
        location.reload();
    }
</script>
<?php
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