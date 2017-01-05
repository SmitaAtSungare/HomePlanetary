<?php
include 'header.php';
?>
<div class="content-wrapper">
        <section class="content-header">
          <h1>
          Enquiry List
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Enquiry List</li>
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
                                                      $qr="SELECT * FROM enquiry";
                                                      $result = $mysqli->query($qr);
                                                      ?>
                                                         <table id="example2" class="table table-bordered table-hover">
                                                            <thead>
                                                              <tr style="text-align:center;">
                                                                  <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;"><input type="checkbox" name="select_all" id="select_all" value=""/></th>
                                                                  <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Enquiry to</th>
                                                                  <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Name</th>
                                                                  <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Mobile</th>
                                                                  <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Email ID</th>
                                                                  <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Comments</th>
                                                                  <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Date</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody id="show">
                                                            <?php
                                                                    while( $row =  $result->fetch_array()) :
                                                            ?>
                                                                <tr>
                                                                       <td bgcolor="#FFFFFF"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['user_id']; ?>"/></td>
                                                                       <td><?php echo $row['property_name']; ?></td>
                                                                       <td><?php echo $row['name']; ?></td>
                                                                       <td><?php echo $row['mob']; ?></td>
                                                                       <td><?php echo $row['email']; ?></td>
                                                                       <td><?php echo $row['comments']; ?></td>
                                                                       <td><?php echo $row['date']; ?></td>
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
<?php include 'footer.php';
if ( ! empty( $_POST ) ) {
    if(isset($_POST['delete_submit'])){
        $idArr = $_POST['checked_id'];
        foreach($idArr as $property_id){
            $mysqli->query("DELETE FROM add_posting WHERE property_id=$property_id");
            header('location:'.$base.'approved_list.php');

          //  echo '<META HTTP-EQUIV="Refresh" Content="0;approved_list.php">';
        }
    }
}
?>