<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>

	<title>Inventory Management System</title>
  <script src="https://kit.fontawesome.com/853e0623e4.js" crossorigin="anonymous"></script>
	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">


	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.js"></script>
 <!-- custom css -->
 <link rel="stylesheet" href="custom/css/custom.css">
</head>
<body>


	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
	  <a class="navbar-brand" href="#" style="padding:0px;">
                    <img src="myims-logo.png" alt="" style="height: 50px; width: auto;">
                </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        

      	<li id="navDashboard"><a href="index.php"><i class="fa-solid fa-table-columns"  style="padding-right: 6px;"></i>  Dashboard</a></li>        
        <?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
        <li id="navBrand"><a href="brand.php"><i class="fa-solid fa-tags" style="padding-right: 6px; font-size: 16px"></i>Brand</a></li>        
		<?php } ?>
		<?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
        <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"style="padding-right: 6px;"></i> Category</a></li>        
		<?php } ?>
		<?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
        <li id="navProduct"><a href="product.php"> <i class="fa-solid fa-boxes-packing" style="padding-right: 6px; font-size: 16px"></i> Product </a></li> 
		<?php } ?>
		
        <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa-solid fa-cart-shopping" style="padding-right: 6px; font-size: 16px"></i> Orders <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>            
            <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>            
          </ul>
        </li> 
		
		<?php  if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
        <li id="navReport"><a href="report.php"> <i class="glyphicon glyphicon-check"  style="padding-right: 6px; font-size: 16px"></i> Report </a></li>
		<?php } ?> 
    <?php  if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
        <li id="importbrand"><a href="importbrand.php"> <i class="fa-solid fa-file-import"  style="padding-right: 6px; font-size: 16px"></i> Import Brand </a></li>
		<?php } ?>   
        <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">    
			<?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
            <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li>
            <li id="topNavUser"><a href="user.php"> <i class="glyphicon glyphicon-wrench"></i> Add User</a></li>
<?php } ?>              
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
          </ul>
        </li>        
           
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">