<?php
include 'header.php';
   $result = $mysqli->query("SELECT * FROM add_posting WHERE add_status='N'");
   $num_rows = $result->num_rows;
   $result = $mysqli->query("SELECT * FROM add_posting WHERE add_status='Y'");
   $num = $result->num_rows;
   $result = $mysqli->query("SELECT * FROM  signup");
   $n = $result->num_rows;
   $result = $mysqli->query("SELECT * FROM  add_posting WHERE add_status='Featured'");
   $fet = $result->num_rows;
   $result = $mysqli->query("SELECT * FROM add_advertise");
   $ads = $result->num_rows;
   $result = $mysqli->query("SELECT * FROM enquiry");
   $enq = $result->num_rows;
   $result = $mysqli->query("SELECT * FROM advertise_req");
   $adl= $result->num_rows;
?>
<div class="content-wrapper">
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>    
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
        <section class="content">
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo "$num_rows\n"; ?></h3>
                  <p>Number of Property Request</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="unapproved.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo "$num\n"; ?></h3>
                  <p>Number of Property Listed</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="approved_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo "$n\n"; ?></h3>
                  <p>Registered User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="user_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
             <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo "$fet\n"; ?></h3>
                  <p>Number of Featured Property</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="featured_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
           <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3><?php echo "$ads\n"; ?></h3>
                  <p>Posted Ads</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="adlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
           <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3><?php echo "$enq\n"; ?></h3>
                  <p>Enquiries</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="p_enq.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3><?php echo "$adl\n"; ?></h3>
                  <p>Advertise Request</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="adrequest.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </section>
  </div>
<?php include 'footer.php'; ?>      