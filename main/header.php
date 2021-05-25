
<?php
// Turn off all error reporting
error_reporting(0);
//display the date and time
date_default_timezone_set('Africa/Nairobi');

 // include 'Admin/config/connection.php';
 // extract the filename
 $title = basename($_SERVER['SCRIPT_FILENAME'], '.php');
 // replace dashes with whitespace
 $title = str_replace('-', ' ', $title);
 // check if the file is index, if so assign 'home' to the title instead of index
 if (strtolower($title) == 'index') 
 {
 $title = 'Home';
 $active='active';
 }
 elseif (strtolower($title) == 'schfees') 
 {
   $title='school fees';
 }
 elseif (strtolower($title) == 'staffinfo') 
 {
   $title='Staff Information';
 }
 elseif (strtolower($title) == 'req_schpayment') 
 {
   $title='school requirement';
 }
 // capitalize all words
 $title = ucwords($title);
                     
?>

<!doctype html>
<html lang="en">

<!-- Mirrored from malikhassan.com/blog_designer/finarc/html/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 13:53:26 GMT -->
<head>
<meta charset="utf-8">
<title> Tinyatech Associates Limited  | <?php echo $title; ?> </title>
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="FinArc Interior Design - HTML Template">
<meta name="keywords" content="Tinyatech Associates Limited, Interior Design, corporate, business, Construction">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<!-- favicon -->
<link rel="icon" href="images/favicon.png" type="image/x-icon">
<!-- Stylesheets-->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,500%7CTeko:300,400,500%7CMaven+Pro:500">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/fonts.css">
<link rel="stylesheet" href="css/style.css" id="main-styles-link">
<!--Color Switcher Mockup-->
<link rel="stylesheet" href="dist/color-default.css">
<link rel="stylesheet" href="dist/color-switcher.css">
</head>
<body>
<div class="page"> 
  <!-- Page Header Start -->
  <header class="section page-header"> 
    <!-- RD Navbar-->
    <div class="finarc-navbar-wrap">
      <nav class="finarc-navbar finarc-navbar-modern" data-layout="finarc-navbar-fixed" data-sm-layout="finarc-navbar-fixed" data-md-layout="finarc-navbar-fixed" data-md-device-layout="finarc-navbar-fixed" data-lg-layout="finarc-navbar-static" data-lg-device-layout="finarc-navbar-fixed" data-xl-layout="finarc-navbar-static" data-xl-device-layout="finarc-navbar-static" data-xxl-layout="finarc-navbar-static" data-xxl-device-layout="finarc-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="70px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
        <div class="finarc-navbar-main-outer">
          <div class="finarc-navbar-main"> 
            <!-- RD Navbar Panel-->
            <div class="finarc-navbar-panel"> 
              <!-- RD Navbar Toggle-->
              <button class="finarc-navbar-toggle" data-finarc-navbar-toggle=".finarc-navbar-nav-wrap"><span></span></button>
              <!-- RD Navbar Brand-->
              <div class="finarc-navbar-brand"><a class="brand" href="index"><img src="images/logos/small-logo-default.png" class="logo-sticky" alt="" title=""></a></div>
            </div>
            <div class="finarc-navbar-main-element">
              <div class="finarc-navbar-nav-wrap"> 
                <!-- RD Navbar Basket-->
               <!--  <div class="finarc-navbar-basket-wrap">
                  <button class="finarc-navbar-basket fl-bigmug-line-shopping198" data-finarc-navbar-toggle=".cart-inline"><span>2</span></button>
                  <div class="cart-inline">
                    <div class="cart-inline-header">
                      <h5 class="cart-inline-title">In cart:<span> 2</span> Products</h5>
                      <h6 class="cart-inline-title">Total price:<span> $524</span></h6>
                    </div>
                    <div class="cart-inline-body">
                      <div class="cart-inline-item">
                        <div class="unit align-items-center">
                          <div class="unit-left"><a class="cart-inline-figure" href="single-product.html"><img src="images/products/products-mini-1.jpg" alt="" width="100" height="100"/></a></div>
                          <div class="unit-body">
                            <h6 class="cart-inline-name"><a href="single-product.html">Interior Design</a></h6>
                            <div>
                              <div class="group-xs group-middle-2">
                                <div class="table-cart-stepper">
                                  <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000"/>
                                </div>
                                <h6 class="cart-inline-title">$289</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="cart-inline-item">
                        <div class="unit align-items-center">
                          <div class="unit-left"><a class="cart-inline-figure" href="single-product.html"><img src="images/products/products-mini-2.jpg" alt="" width="100" height="100"/></a></div>
                          <div class="unit-body">
                            <h6 class="cart-inline-name"><a href="single-product.html">Interior Design</a></h6>
                            <div>
                              <div class="group-xs group-middle-2">
                                <div class="table-cart-stepper">
                                  <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000"/>
                                </div>
                                <h6 class="cart-inline-title">$235</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="cart-inline-footer">
                      <div class="group-sm"><a class="button button-md button-default-outline button-wapasha" href="cart-page.html">Go to cart</a><a class="button button-md button-secondary button-pipaluk" href="checkout.html">Checkout</a></div>
                    </div>
                  </div>
                </div> -->
                <a class="finarc-navbar-basket finarc-navbar-basket-mobile fl-bigmug-line-shopping198" href="cart-page.html"><span>2</span></a> 
                <!-- RD Navbar Search-->
                <div class="finarc-navbar-search">
                  <button class="finarc-navbar-search-toggle" data-finarc-navbar-toggle=".finarc-navbar-search"><span></span></button>
                  <form class="finarc-search" action="#" data-search-live="finarc-search-results-live" method="GET">
                    <div class="form-wrap">
                      <label class="form-label" for="finarc-navbar-search-form-input">Search...</label>
                      <input class="finarc-navbar-search-form-input form-input" id="finarc-navbar-search-form-input" type="text" name="s" autocomplete="off"/>
                      <div class="finarc-search-results-live" id="finarc-search-results-live"></div>
                      <button class="finarc-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                    </div>
                  </form>
                </div>
                <!-- RD Navbar Nav-->
                <ul class="finarc-navbar-nav">
                  <li class="finarc-nav-item"><a class="finarc-nav-link" href="index">Home</a> </li>
                  <li class="finarc-nav-item"><a class="finarc-nav-link" href="about-us">About Us</a> </li>
                  <!-- <li class="finarc-nav-item"><a class="finarc-nav-link" href="Services">Services</a></li> -->
                  <li class="finarc-nav-item finarc-navbar--has-dropdown finarc-navbar-submenu"><a class="finarc-nav-link" href="services">Services</a><span class="finarc-navbar-submenu-toggle"></span> 
                    <!-- RD Navbar Dropdown-->
                    <ul class="finarc-menu finarc-navbar-dropdown">
                      <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="#">Architectural Designs</a></li>
                      <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="#">Structural Designs </a></li>
                      <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="#">Interior Design </a></li>
                      <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="services">Construction</a></li>
                      <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="services">Civil Consultancy</a></li>
                      <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="services">Mechanical Designs </a></li>
                      <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="services">Site Supervision </a></li>
                      <li class="finarc-dropdown-item"><a class="finarc-dropdown-link" href="services">Furniture </a></li>
                    </ul>
                  </li>
                  <li class="finarc-nav-item"><a class="finarc-nav-link" href="portfolio">Portfolio</a>  </li>
                  <li class="finarc-nav-item"><a class="finarc-nav-link" href="blog">Blog</a> 
                  </li>
                  <li class="finarc-nav-item"><a class="finarc-nav-link" href="contact-us">Contact Us</a> </li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!-- Page Header End --> 