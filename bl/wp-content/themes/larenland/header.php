<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php 
global $theme_option; 
global $wp_query;
    $seo_title = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_title", true);
    $seo_description = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_description", true);
    $seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "_cmb_seo_keywords", true);
?>
<head>
	<title>Benito Laren :: Obras</title>
	<meta name="author" content="qktheme">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- For SEO -->
    <link rel="icon" href="../../../../images/favicon.ico">
    <link rel="apple-touch-icon" href="../../../../images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../../../images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../../../images/apple-touch-icon-114x114.png">
    <link rel="stylesheet" href="../../../../assets/elegant-icons/style.css">
    <link rel="stylesheet" href="../../../../assets/app-icons/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,100italic,400,300italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../../../css/owl.theme.css">
    <link rel="stylesheet" href="../../../../css/owl.carousel.css">
    <link rel="stylesheet" href="../../../../css/nivo-lightbox.css">
    <link rel="stylesheet" href="../../../../css/nivo_themes/default/default.css">
    <link rel="stylesheet" href="../../../../css/animate.min.css">
    <link rel="stylesheet" href="../../../../css/styles.css">
    <link rel="stylesheet" href="../../../../css/colors/orange.css">
    <link rel="stylesheet" href="../../../../css/responsive.css">
    <link rel="stylesheet" href="../../../../css/animsition.min.css">
    <link rel="stylesheet" href="../../../../css/bootstrap.css">
    
    
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="preloader">
  <div class="status">&nbsp;</div>
</div>

<header class="header" data-stellar-background-ratio="0.5" id="home"> 
  
  <!-- COLOR OVER IMAGE -->
  <div class="color-overlay"> <!-- To make header full screen. Use .full-screen class with color overlay. Example: <div class="color-overlay full-screen">  --> 
    
    <!-- STICKY NAVIGATION -->
    <div class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation">
      <div class="container">
        <div class="navbar-header"> 
          
          <!-- LOGO ON STICKY NAV BAR -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#larenland-navigation"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="#"><img src="../../../../images/bl_logo2.png" alt=""></a> </div>
        
        <!-- NAVIGATION LINKS -->
        <div class="navbar-collapse collapse" id="larenland-navigation">
          <ul class="nav navbar-nav navbar-right main-navigation">
            <li><a style="color:#ffffff !important" href="#">Obras</a></li>
            <li><a href="#exposiciones">Exposiciones</a></li>
            <li><a href="#prensa">Prensa</a></li>
            <li><a href="#contacto">Contacto</a></li>
            <li class="go_ll"><a href="../../../../../__LL" class="animsition-link" style="padding-left: 18px;">LARENLAND<i class="arrow_right" style="margin: auto 0 auto 8px; position:inherit " ></i></a></li>
          </ul>
        </div>
      </div>
      <!-- /END CONTAINER --> 
    </div>
    <!-- /END STICKY NAVIGATION --> 

  </div>
  <!-- /END COLOR OVERLAY --> 
</header>
<!-- /END HEADER --> 


<!-- =========================
     OBRAS  
============================== -->
<section class="packages" id="obras">
  <div class="container"> 
    
    <!-- SECTION HEADER -->
    <div class="section-header wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s" style="padding-bottom: 0px;"> 
      
      <!-- SECTION TITLE -->
      <h2 class="white-text">Obras</h2>
      <div class="colored-line"> </div>
    </div>
    <!-- /END SECTION HEADER -->
    
  <!-- /END CONTAINER --> 
</section>
<!-- /END PRICING TABLE SECTION -->



	<?php global $theme_option; ?>
	<!-- Container -->
	<div id="container sdfsdf">
