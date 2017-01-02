<?php include 'header.php';?>
<div class="content-wrapper">
                <section class="content-header">
                  <h1>
                 Advertise
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active"> Advertise</li>
                  </ol>
                </section>
                <section class="content">
                    <div class="example-modal">
                            <div class="modal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                   <h3 class="modal-title">Add Advertise</h3>
                                  </div>
                                  <div class="modal-body">
                                      <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <label for="exampleInputFile">Select Image</label>
                                      <input type="file" name="photo" id="exampleInputFile">
                                    </div>
                                    <div class="modal-footer">
                                    <input type="submit" name="submit" value="Submit">
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="clear"></div>
</div>
<?php include 'footer.php';
if ( ! empty( $_POST ) ) {
$file = $_FILES['photo'];
$name = $file['name'];
$target = "images/".basename($name);
$random5 = rand(10000,99999);
  $sql = "INSERT INTO `add_advertise` (`p_id`, `photo`, `date`) VALUES ('{$mysqli->real_escape_string($random5)}', '{$mysqli->real_escape_string($target)}' ,  now())";
  if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)){ 
		echo "The file ". basename( $_FILES['photo']['name']). " has been uploaded, and your information has been added to the directory";
		}
		else { 
		echo "Sorry, there was a problem uploading your file."; 
		}
  $insert = $mysqli->query($sql);
  if ( $insert ) {
     echo "Success! Row ID: {$mysqli->insert_id}";
  } else {
    die("Error: {$mysqli->errno} : {$mysqli->error}");
  }
}
?>