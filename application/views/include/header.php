<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>PETSHOP</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>/assets/css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>/assets/css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>/assets/css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>/assets/css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>/assets/css/style.css"/>
 		<style>
 			@media only screen and (min-width: 991px) { 				
 				#logout1{
 					margin-left: 300px;	
 				}
 			}
 		</style>
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container-fluid">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-2">
							<div class="header-logo">
								<a href="<?php echo base_url()?>" class="logo">
									<img src="<?php echo base_url()?>/assets/img/logo1.png" alt="" style="height: 70px; width: 200px;">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<div class="col-md-4 clearfix" id="logout1">
							<div class="header-ctn">
								<!-- Cart -->
								<div class="dropdown">
									<a href="<?php echo base_url()?>View-Cart">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"><?php echo $this->cart->total_items()?></div>
									</a>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
							
						</div>
						<div class="col-md-3" align="right" id="logout">	
						<!-- <div class="col-md-4">	 -->
							<?php if($this->session->logged_in){?>
								<p style="margin-top: 12px; color: white;">
									<a href="<?php echo base_url()?>My-Account" style="color: white;"><i class="fa fa-user"></i> My Account</a>&nbsp;&nbsp;
									<a href="<?php echo base_url()?>Login_cont/logout">
										<button class="primary-btn"><i class="fa fa-sign-out"></i> Logout</button>
									</a>
								</p>
							<?php } else {?>
								<button class="primary-btn" style="margin-top: 12px;" onclick="window.location.href='<?php echo base_url()?>Login'">Login / Register</button>
							<?php } ?>
						</div>
						
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="<?php echo base_url()?>">Home</a></li>
						<?php foreach($cat as $category){?>
							<li class="li-item">
								<a href="<?php echo base_url()?>Categories/?cat_id=<?php echo $category['cat_id']?> ">
									<?php echo $category['cat_name'] ?>
								</a>
							</li>
						<?php }?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
