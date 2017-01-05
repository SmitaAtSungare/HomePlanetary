<?php 
session_start();
include('config.php');
$filename = basename($_SERVER["PHP_SELF"],".php");
$user = "";
if(!isset($_SESSION["ausername"]))
{
  header("Location: login.php");
}
else
{
  $user =  ucwords($_SESSION['ausername']);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Homeplanetary India’s Real Estate | List your Property for free | Dashboard</title>
    <base href="<?php echo $base; ?>">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico"  type="image/x-icon">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dropzone.css" >

    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="ionicons/css/ionicons.css" rel="stylesheet" type="text/css" />
    <link href="ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <style>
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }
      .example-modal .modal {
        background: transparent!important;
      }
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <div id="showmessage" style="display:none;height: 35px;"></div>
      <header class="main-header">
        <a href="index.php" class="logo">
          <span class="logo-mini"><b>construction</b></span>
          <span class="logo-lg"><b>Homeplanetary</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">              
              <li class="user">
                <a href="logout.php">              
                  <span class="hidden-xs">Signout</span>
                </a>            
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
				<img src="">
            </div>
            <div class="pull-left info">
              <p><?php echo $user;?></p>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="active treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>              
            </li>            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Property Listing</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">        
                <li><a href="unapproved.php"><i class="fa fa-circle-o"></i>Un-approved List</a></li>
                <li><a href="approved_list.php"><i class="fa fa-circle-o"></i>New Property List</a></li>
                <li><a href="featured_list.php"><i class="fa fa-circle-o"></i>Resale Property List</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Registered User List</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">        
                <li><a href="user_list.php"><i class="fa fa-circle-o"></i>User List</a></li>
              </ul>
            </li>
		   <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Enquiries to Property</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">        
                <li><a href="p_enq.php"><i class="fa fa-circle-o"></i>Enquiries</a></li>
              </ul>
            </li>
		   <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Advertise</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">        
                 <li><a href="adrequest.php"><i class="fa fa-circle-o"></i>Advertise Request</a></li>
                 <li><a href="add_advertise.php"><i class="fa fa-circle-o"></i>Put Advertise</a></li>
	             <li><a href="adlist.php"><i class="fa fa-circle-o"></i>Manage Advertise</a></li>
              </ul>
            </li>
          </ul>
        </section>
      </aside>
      