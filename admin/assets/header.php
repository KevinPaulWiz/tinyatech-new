<?php
// Turn off all error reporting
error_reporting(0);
//display the date and time
date_default_timezone_set('Africa/Nairobi');
?>
<?php 
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
<!DOCTYPE html>
<html lang="en">
  <head>
  	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116514011-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116514011-1');
</script>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?> - Youth Skilling Organization Uganda</title>
    <meta name="Youth empowering Youth" content="Youth Skilling Organization Uganda is a charity organization working to build a prosperous and violence free young population. It was found directly to benefit and develop each child’s full potential through transforming Education, community development, vocational skills and managing natural resources sustainably. We are working to transform the rural Uganda by educating the less privileged children and investing in a wide range of community development programs to ensure lasting change.">
    <meta name="keywords" content="campaign, cause, charity, donate, donations, event, foundation, fund, fundraising, kids, ngo, non-profit, organization, volunteer">
    <meta name="Youth Skilling Organization Uganda" content="youthskillingorg.org"> 
	<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo '$title'; ?> | Youth Skilling Organization Uganda" />
<meta property="og:url" content="http://youthskillingorg.com/<?php echo '$title'; ?>" />
<meta property="og:site_name" content="Youth Skilling Organization Uganda" />
<meta property="article:publisher" content="https://www.facebook.com/skillingug/" />
<meta property="og:image" content="http://youthskillingorg.com/images/logo.png" />
<meta property="og:image:secure_url" content="http://youthskillingorg.com/images/logo.png" />
<meta property="og:image:width" content="960" />
<meta property="og:image:height" content="640" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="<?php echo '$title'; ?> | Youth Skilling Organization Uganda" />
<meta name="twitter:image" content="http://youthskillingorg.com/images/logo.png" />
	<!-- ==============================================
	Favicons
	=============================================== -->
	<link rel="shortcut icon" href="images/icon.png">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
	<!-- ==============================================
	CSS VENDOR
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="css/vendor/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/animate.min.css">
	
	<!-- ==============================================
	Custom Stylesheet
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	
    <script src="js/vendor/modernizr.min.js"></script>

</head>

<body>

	<!-- LOAD PAGE -->
	<div class="animationload">
		<div class="loader"></div>
	</div>
	
	<!-- BACK TO TOP SECTION -->
	<a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

	<!-- HEADER -->
    <div class="header header-1">
    	<!-- TOPBAR -->
    	<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-sm-7 col-md-6">
						<p><em>News :   <a href="news" class="text-white"><?php 
function truncateString($string) {
if (strlen($string) > 68) {
$string = substr($string, 0, 68) . "...";
}
return $string;
}
include_once 'config/connection.php';
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $sql_query = "SELECT * FROM `post` WHERE  category='News' ORDER BY RAND() LIMIT 1";
  $fetch_query = $pdo->query($sql_query);
  $fetch_query->setFetchMode(PDO::FETCH_ASSOC);
    // $number_of_rows=$stmt->rowCount();
    $result = $conn->query($sql_query);
    $number_of_rows=$result->num_rows;
   while ($rows = $fetch_query->fetch()):
    echo truncateString($rows['newstitle']);
   endwhile;
  ?></a> </em></p>
					</div>
					<div class="col-sm-5 col-md-6">
						<div class="sosmed-icon pull-right">
							<a href="#"><i class="fa fa-facebook"></i></a> 
							<a href="#"><i class="fa fa-twitter"></i></a> 
							<a href="#"><i class="fa fa-instagram"></i></a> 
							<!-- <a href="#"><i class="fa fa-pinterest"></i></a>  -->
		 				</div>
					</div>
				</div>
			</div>
		</div>

    	<!-- MIDDLE BAR -->
		<div class="middlebar">
			<div class="container">
				
				
				<div class="contact-info">
					<!-- INFO 1 -->
					<div class="box-icon-1">
						<div class="icon">
							<div class="fa fa-envelope-o"></div>
						</div>
						<div class="body-content">
							<div class="heading">Mail :</div>
							<a href="mailto:info@youthskillingorg.com">info@youthskillingorg.com</a>
						</div>
					</div>
					<!-- INFO 2 -->
					<div class="box-icon-1">
						<div class="icon">
							<div class="fa fa-phone"></div>
						</div>
						<div class="body-content">
							<div class="heading">Call Us :</div>
							<a target="_blank" href="tel:+256 784 858493">+256 784 858493</a>
						</div>
					</div>
					<!-- INFO 3 -->
					<div class="box-act">
						<a href="javascript::void(0);" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#myModal5">DONATE NOW</a>
					</div>
					
				</div>
			</div>
		</div>

		<!-- NAVBAR SECTION -->
		<div class="navbar-main">
			<div class="container">
			    <nav class="navbar navbar-expand-lg">
			        <a class="navbar-brand" href="http://youthskillingorg.com">
						<img src="images/logo.png" alt="" />
					</a>
			        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			            <span class="navbar-toggler-icon"></span>
			        </button>
			        <div class="collapse navbar-collapse" id="navbarNavDropdown">
			            <ul class="navbar-nav">
			                <li class="nav-item dropdown">
			                    <a class="nav-link " href="http://youthskillingorg.com" >
						          HOME
						        </a>
			                </li>
			                <li class="nav-item dropdown">
			                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          ABOUT
						        </a>
			                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			                    	<a class="dropdown-item" href="about">About Us</a>
	          						<a class="dropdown-item" href="faq">FAQ</a>
	          						<a class="dropdown-item" href="our-team">Our Team</a>
							    </div>
			                </li>
			              <!--   <li class="nav-item dropdown">
			                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          CAUSES
						        </a>
			                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			                    	<a class="dropdown-item" href="cause">Causes</a>
	          						<a class="dropdown-item" href="cause-single">Single Causes</a>
							    </div>
			                </li> -->
			                <li class="nav-item dropdown">
			                    <a class="nav-link dropdown-toggle text-uppercase"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          Our Programs
						        </a>
			                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			                    	<a class="dropdown-item" href="Teaching-and-Education">Teaching and Education</a> 
	          						<a class="dropdown-item" href="Childcare-and-Development">Childcare And Development</a>
	          						<a class="dropdown-item" href="Vocational-skills">Vocational Skills</a>
	          						<a class="dropdown-item" href="Youth-Empowerment">Youth Empowerment</a>
	          						<a class="dropdown-item" href="Healthcare & Medical">Healthcare & Medical</a>
	          						<a class="dropdown-item" href="construction">Construction</a>
	          						<a class="dropdown-item" href="Sport & Cultural Exchange">Sport & Cultural Exchange</a>
							    </div>
			                </li>
			                <li class="nav-item dropdown">
			                    <a class="nav-link " href="events" >
						          EVENTS
						        </a>
			                    </li>
			                   <!--  <li class="nav-item dropdown">
			                    <a class="nav-link  text-uppercase" href="blog" >
						          Blog
						        </a>
			                    </li> -->
			                <li class="nav-item">
			                    <a class="nav-link" href="contact">CONTACT US</a>
			                </li>
			            </ul>
			        </div>
			    </nav> <!-- -->

			</div>
		</div>

    </div>
 