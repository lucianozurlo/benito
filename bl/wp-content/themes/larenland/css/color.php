<?php

$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css; charset=utf-8");
global $theme_option;
$main_color = $theme_option['main-color'];
$shadow_color = $theme_option['shadow-color'];
?>
.navbar-nav > li > a:hover,
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
	color: <?php echo $main_color; ?> !important;
}
.navbar-nav a.open-search i, .page-template-template-one-page-php .navbar-nav > li a:first-letter,
header.one-page .navbar-nav > li > a span,
.form-search button i,
.tp-caption.large_bold_grey span ,
a.button-two:hover span, a.button-two:hover i,
.blog-section .blog-post .post-content .content-data h2 a:hover ,
.statistic-post i, .portfolio-box.portfolio-style2 .project-post .project-gal .hover-box .inner-hover h2 ,
.features-section3 .container h1, .search-widget button i,
.sidebar .widget ul.category-list li a:hover,
.sidebar .widget ul.category-list li a:hover, .widget_meta ul li a:hover, .widget_categories ul li a:hover, .widget_archive ul li a:hover, .widget_recent_comments ul li a:hover, .widget_recent_entries ul li a:hover ,
.sidebar .widget ul.popular-list li .side-content h2 a:hover,
.single-post .share-tag-box .post-tags li a:hover, .post-tags a:hover,
.single-post .comment-section ul li .comment-content a:hover,
.project-sidebar p a,
.contact-area #contact-form .message.error ,
.accord-title a.accord-link:after , footer .up-footer .tweets-widget ul li p a ,
  .navbar-nav li ul.drop-down li ul.drop-down.level3 li a:hover, ul.filter li a:hover, ul.filter li a.active{
	color: <?php echo $main_color; ?>;
}
.navbar-nav li ul.drop-down li a:hover,
.form-search,
.slider1 .banner-thumbs ul.slider-thumbnails li a span,
.services-section .services-box .services-post:hover .services-head a,
.services-section .services-box .services-post:hover .services-head:after ,
a.button-one:hover ,
a.button-two,
.portfolio-box .project-post .project-gal .hover-box a,
.blog-section .blog-post:hover .post-date ,
.feature-list2 li span, .testimonials-section .bx-wrapper .bx-pager.bx-default-pager a:hover,
.testimonials-section .bx-wrapper .bx-pager.bx-default-pager a.active,
.testimonial-post p ,.testimonial-post p:after ,
.blog-section.second-style .blog-post:hover .post-date, .testimonials-section.transparent-back .bx-wrapper .bx-pager.bx-default-pager a:hover,
.testimonials-section.transparent-back .bx-wrapper .bx-pager.bx-default-pager a.active,
.blog-box.masonry .blog-post .post-gal .hover-box a ,.flexslider .flex-next:hover, .flexslider .flex-prev:hover,
.sidebar .widget ul.category-list li a:hover:before,
.sidebar .widget ul.category-list li a:hover:before, .widget_meta ul li a:hover:before, .widget_categories ul li a:hover:before, .widget_archive ul li a:hover:before, .widget_recent_entries ul li a:hover:before ,
.meter > p, .nav-tabs li a span,
.pricing-box .pricing-item:hover ul.pricing-table li:first-child,
.contact-info a ,.error span,
.shortcodes-section .social-area.with-back, a.button-large ,a.small-btn  ,
ul.social-icons li a, footer .social-section, footer .up-footer .subscribe-form input[type="submit"]{
	background: <?php echo $main_color; ?>;
}
.slider1 .banner-thumbs ul.slider-thumbnails li.active , .flexslider .flex-next:hover, .flexslider .flex-prev:hover ,
a.button-one:hover,
.portfolio-box .project-post:hover .project-content, .testimonials-section .bx-wrapper .bx-pager.bx-default-pager a:hover,
.testimonials-section .bx-wrapper .bx-pager.bx-default-pager a.active, .testimonial-post p:after,
ul.filter li a:hover,
ul.filter li a.active, .testimonials-section.transparent-back .bx-wrapper .bx-pager.bx-default-pager a:hover,
.testimonials-section.transparent-back .bx-wrapper .bx-pager.bx-default-pager a.active, .search-widget input[type="search"]:focus,.sidebar .widget ul.category-list li a:hover:before,
.sidebar .widget ul.category-list li a:hover:before, .widget_meta ul li a:hover:before, .widget_categories ul li a:hover:before, .widget_archive ul li a:hover:before, .widget_recent_entries ul li a:hover:before , .single-post blockquote,
.single-post .comment-form input[type="text"]:focus,
.single-post .comment-form textarea:focus, .nav-tabs li.active, .pricing-box .pricing-item:hover ul.pricing-table ,
.contact-area #contact-form input[type="text"]:focus,
.contact-area #contact-form textarea:focus . #contact-form input[type="email"]:focus, .form-control:focus, .error span:after,
a.small-btn, a.button-one:hover  {
	border-color: <?php echo $main_color; ?>;
}
a.button-one:hover, .flexslider .flex-prev:hover, .flexslider .flex-next:hover,
.portfolio-box .project-post:hover .project-content, .testimonials-section .bx-wrapper .bx-pager.bx-default-pager a:hover, .testimonials-section .bx-wrapper .bx-pager.bx-default-pager a.active, ul.filter li a:hover, ul.filter li a.active,
.parallax .testimonial-post p:after, .pricing-box .pricing-item:hover ul.pricing-table{
	
	border-color: <?php echo $main_color; ?> !important;
}
a.button-one:hover, a.button-two, .flexslider .flex-next:hover, .flexslider .flex-prev:hover,
a.button-large, a.small-btn ,a.button-one:hover {

  box-shadow: 0 3px 0 <?php echo $shadow_color; ?>;
  -webkit-box-shadow: 0 3px 0 <?php echo $shadow_color; ?>;
  -moz-box-shadow: 0 3px 0 <?php echo $shadow_color; ?>;
  -o-box-shadow: 0 3px 0 <?php echo $shadow_color; ?>;
 
  
}
.error span:after{
	
	border-color: <?php echo $shadow_color; ?>;
}
a.button-two i {
	border-color: <?php echo $shadow_color; ?>;
}
<?php if($theme_option['breadcrumb_bg']['url']!=''){ ?>
	.blog-page-banner{
		background-image: url(<?php echo $theme_option['breadcrumb_bg']['url']; ?>);
	}
<?php 
}
?>
<?php if($theme_option['footer_bg']['url']!=''){ ?>
	footer .up-footer{
		background-image: url(<?php echo $theme_option['footer_bg']['url']; ?>);
	}
<?php 
}
?>
<?php echo $theme_option['custom-css']; ?>