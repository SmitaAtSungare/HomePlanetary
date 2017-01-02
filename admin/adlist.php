<?php
include 'header.php';
?>
<div class="content-wrapper">
<section class="content-header">
  <h1>
   Advertise List
  </h1>    
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">  Advertise List</li>
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
                                              $qr="SELECT * FROM add_advertise";
                                              $result = $mysqli->query($qr);
                                              ?>
                                             <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                  <tr style="text-align:center;">
                                                    <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">
                                                    <input type="checkbox" name="select_all" id="select_all" value=""/>
                                                    <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Advertise</th>
                                                    <th style="background-color:#3c8dbc; border-right:1px solid #ccc; color:#fff;">Date</th>
                                                  </tr>
                                                </thead>
                                                <tbody id="show">
                                                    <?php
                                                        while( $row =  $result->fetch_array()) :
                                                    ?>
                                                    <tr>
                                                        <td bgcolor="#FFFFFF">
                                                      <input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['p_id']; ?>"/></td>
                                                                <td><?php echo $row['photo']; ?></td>
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
		</div>
	</div>
</section>

<?php
include 'footer.php';
if ( ! empty( $_POST ) ) {
    if(isset($_POST['delete_submit'])){
        $idArr = $_POST['checked_id'];
        foreach($idArr as $user_id){
        $qry="DELETE FROM add_advertise WHERE p_id=$user_id";
	    $insert = $mysqli->query($qry);
            header('location:'.$base.'ManageAdvertise/');
//        echo '<META HTTP-EQUIV="Refresh" Content="0;ManageAdvertise/">';
        }
    }
}
?>