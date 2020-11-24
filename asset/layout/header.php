<!DOCTYPE html>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once 'model/user.php';
$userNve= new user();
?>
<html class="no-js"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Aviato E-Commerce Template">

  <meta name="author" content="Themefisher.com">

  <title>MRM | Shop</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="asset/images/favicon.png" />

  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="asset/plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="asset/plugins/bootstrap/css/bootstrap.min.css">

  <!-- Revolution Slider -->
  <link rel="stylesheet" type="text/css" href="asset/plugins/revolution-slider/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
  <link rel="stylesheet" type="text/css" href="asset/plugins/revolution-slider/revolution/fonts/font-awesome/css/font-awesome.css">

  <!-- REVOLUTION STYLE SHEETS -->
  <link rel="stylesheet" type="text/css" href="asset/plugins/revolution-slider/revolution/css/settings.css">
  <link rel="stylesheet" type="text/css" href="asset/plugins/revolution-slider/revolution/css/layers.css">
  <link rel="stylesheet" type="text/css" href="asset/plugins/revolution-slider/revolution/css/navigation.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="asset/css/style.css">

</head>

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="contact-number">
					<i class="tf-ion-ios-telephone"></i>
					<span>+20 01121426196</span>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="index.php">
						<!-- replace logo here -->
						<svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40" font-family="AustinBold, Austin" font-weight="bold">
						        <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
						            <text id="AVIATO">
						                <tspan x="108.94" y="325">PMUP</tspan>
						            </text>
						        </g>
						    </g>
						</svg>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
			<!-- Cart -->
			<ul class="top-menu text-right list-inline">
	          <li class="dropdown cart-nav dropdown-slide">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-android-cart"></i>Cart</a>
	            <div class="dropdown-menu cart-dropdown">
	            	
                    <ul class="text-center cart-buttons">
                    	<li><a href="cart.php" class="btn btn-small">View Cart</a></li>
                    	<li><a href="checkout.php" class="btn btn-small btn-solid-border">Checkout</a></li>
                    </ul>
                </div>

	          </li><!-- / Cart -->
                <?php if($userNve->isGust()){ ?>
                <li class="dropdown cart-nav dropdown-slide">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-android-person"></i> Join</a>
                    <div class="dropdown-menu cart-dropdown">

                        <ul class="text-center cart-buttons">
                            <li><a href="login.php" class="btn btn-small btn-solid-border" > Login </a></li>
                            <li><a href="registration.php" class="btn btn-small btn-solid-border"> Registration </a></li>
                        </ul>
                    </div>

                </li>
                <?php }else{ ?>
                    <li class="dropdown dropdown-slide cart-nav user-info-menu" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="tf-ion-android-person"></i> <?= $userNve->getUsername(); ?>  </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form method="post">
                                    <button type="submit" name="btnLogout" class="btn btn-small" >Sign out</button>
                                    <?php
                                    if(isset($_POST['btnLogout'])){
                                        $userNve->logout();
                                        die("<script>location.href ='index.php'</script>");
                                    }
                                    ?>
                                </form>
                            </li>
                        </ul>
                    </li><!-- / Blog -->
                <?php } ?>
	        </ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
	    <div class="container">
	      <div class="navbar-header">
	      	<h2 class="menu-title">Main Menu</h2>
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	          <span class="sr-only">Toggle navigation</span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	        </button>

	      </div><!-- / .navbar-header -->

	      <!-- Navbar Links -->
	      <div id="navbar" class="navbar-collapse collapse text-center">
	        <ul class="nav navbar-nav">

	          <!-- Home -->
	          <li class="dropdown ">
	            <a href="index.php">Home</a>
	          </li><!-- / Home -->

            <!-- Shop -->
	          <li class="dropdown ">
	            <a href="Shop.php">Shop</a>
	          </li><!-- / Shop -->

              <?php if($userNve->isAdmin()){ ?>
	          <!-- Elements -->
	          <li class="dropdown dropdown-slide">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="tf-ion-ios-arrow-down"></span></a>
	            <div class="dropdown-menu">
	              <div class="row">

	                <!-- Basic -->
	                <div class="col-lg-6 col-md-6 mb-sm-3">
	                	<ul>
							<li class="dropdown-header">ADD</li>
							<li role="separator" class="divider"></li>
							<li><a href="addpump.php">Pumps</a></li>
							<li><a href="addpanel.php">Panel</a></li>
							<li><a href="addcable.php">Cable</a></li>

	                	</ul>
	                </div>

	                <!-- Layout -->
	                <div class="col-lg-6 col-md-6 mb-sm-3">
	                	<ul>
		                  <li class="dropdown-header">View</li>
		                  <li role="separator" class="divider"></li>
		                  <li><a href="pump.php">Pumps</a></li>
		                  <li><a href="panel.php">Panel</a></li>
                      <li><a href="cable.php">Cable</a></li>

	                	</ul>
	                </div>

	              </div><!-- / .row -->
	            </div><!-- / .dropdown-menu -->
	          </li><!-- / Elements -->
              <?php } ?>
	        </ul><!-- / .nav .navbar-nav -->

	      	</div><!--/.navbar-collapse -->
	    </div><!-- / .container -->
	</nav>
</section>
