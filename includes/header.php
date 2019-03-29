<?php 
	require_once 'php_action/core.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Stock Management System</title>
</head>
<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme -->
	<!-- <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap-re.min.css"> -->
	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/all.css">
	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="custom/css/custom.css">
	<!-- datatables -->
	<link rel="stylesheet" type="text/css" href="assets/plugins/datatables/datatables.min.css">
	<!-- file-input -->
	<link rel="stylesheet" type="text/css" href="assets/plugins/fileinput/css/fileinput.min.css">
	<!-- jquery -->
	<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
	<!-- jqueryui -->
	<link rel="stylesheet" type="text/css" href="assets/jquery-ui/jquery-ui.min.css">
	<script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script>
	<!-- bootstrap js -->
	<!-- <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script> -->
  
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item" id="navDashboard">
        <a class="nav-link" href="index.php"><i class="fas fa-list-alt"></i> Dasboard</a>
      </li>
      <li class="nav-item" id="navBrand">
        <a class="nav-link" href="brand.php"><i class="fab fa-btc"></i> Brand</a>
      </li>
      <li class="nav-item" id="navCategories">
        <a class="nav-link" href="categories.php"><i class="fas fa-th"></i> Category</a>
      </li> 
      <li class="nav-item" id="navProduct">
        <a class="nav-link" href="product.php"><i class="fab fa-product-hunt"></i> Product</a>
      </li>     
      <li class="nav-item dropdown" id="navOrder">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-shopping-cart"></i>
          Orders
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a id="topnavAddOrder" class="dropdown-item" href="orders.php?o=add"><i class="fas fa-plus"></i> Add Orders</a>
          <a id="topnavManageOrder" class="dropdown-item" href="orders.php?o=manord"><i class="fas fa-edit"></i> Manage Orders</a>
          <li class="nav-item" id="navReport">
        <a class="nav-link" href="report.php"><i class="fas fa-check-square"></i> Report</a>
      </li> 
        </div>
        <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown" id="navSetting">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a id="topnavSetting" class="dropdown-item" href="setting.php"><i class="fas fa-wrench"></i> Settings</a>
          <a id="topnavLogout" class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </li>
  </ul>
      </li>
    </ul>
  </div>
</nav>

<div class="container">