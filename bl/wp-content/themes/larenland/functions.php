<?php
require_once( dirname( __FILE__ ) . '/framework/sample-config.php' );
require_once dirname( __FILE__ ) . '/framework/Custom-Metaboxes/metabox-functions.php';
require_once dirname( __FILE__ ) . '/framework/post_type.php';
require_once dirname( __FILE__ ) . '/framework/widget/popular.php';
require_once dirname( __FILE__ ) . '/framework/BFI_Thumb.php';
require_once dirname( __FILE__ ) . '/framework/wp_bootstrap_navwalker.php';
require_once dirname( __FILE__ ) . '/page-builder/page-builder.php';

$textdomain = 'bl';
function bl_setup() {
	global $textdomain;
	load_theme_textdomain( $textdomain, get_template_directory() . '/languages' );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', $textdomain ),
		'one_page'   => __( 'One Page Menu', $textdomain ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background');
	add_filter('widget_text', 'do_shortcode');

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'bl_setup' );

if ( ! isset( $content_width ) ) {
	$content_width = 665;
}

function bl_widgets_init() {
	global $textdomain;
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', $textdomain ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', $textdomain ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area 1', $textdomain ),
		'id'            => 'footer-1',
		'description'   => __( 'Appears in the footer section of the site.', $textdomain ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area 2', $textdomain ),
		'id'            => 'footer-2',
		'description'   => __( 'Appears in the footer section of the site.', $textdomain ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area 3', $textdomain ),
		'id'            => 'footer-3',
		'description'   => __( 'Appears in the footer section of the site.', $textdomain ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area 4', $textdomain ),
		'id'            => 'footer-4',
		'description'   => __( 'Appears in the footer section of the site.', $textdomain ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'bl_widgets_init' );

function bl_scripts() {

	// Load our main stylesheet.
	global $theme_option;
	//Fonts
    if($theme_option!=null && $theme_option['body-font2']['font-family'] != ''){ 
		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'google-font', "$protocol://fonts.googleapis.com/css?family=".urlencode($theme_option['body-font2']['font-family']).":400,500,600,700,300,100,200" );
	}
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css');
	wp_enqueue_style( 'flexslider', get_template_directory_uri().'/css/flexslider.css');
	wp_enqueue_style( 'carousel', get_template_directory_uri().'/css/owl.carousel.css');
	wp_enqueue_style( 'owl.theme', get_template_directory_uri().'/css/owl.theme.css');
	wp_enqueue_style( 'magnific', get_template_directory_uri().'/css/magnific-popup.css');
	wp_enqueue_style( 'bxslider', get_template_directory_uri().'/css/jquery.bxslider.css');
	wp_enqueue_style( 'settings', get_template_directory_uri().'/css/settings.css');
	wp_enqueue_style( 'bl', get_template_directory_uri().'/css/bl_style.css');
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), '2014-05-19' );
	wp_enqueue_style( 'color', get_template_directory_uri().'/css/color.php');
	
	
	
	wp_enqueue_script("jquery");
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script("bootstrap", get_template_directory_uri()."/js/bootstrap.js",array(),false,true);
	wp_enqueue_script("magnific-popup", get_template_directory_uri()."/js/jquery.magnific-popup.min.js",array(),false,true);
	wp_enqueue_script("bxslider", get_template_directory_uri()."/js/jquery.bxslider.min.js",array(),false,true);
	wp_enqueue_script("flexslider", get_template_directory_uri()."/js/jquery.flexslider.js",array(),false,true);
	wp_enqueue_script("appear", get_template_directory_uri()."/js/jquery.appear.js",array(),false,true);
	wp_enqueue_script("stellar", get_template_directory_uri()."/js/jquery.stellar.min.js",array(),false,true);
	wp_enqueue_script("imagesloaded", get_template_directory_uri()."/js/jquery.imagesloaded.min.js",array(),false,true);
	wp_enqueue_script("isotope", get_template_directory_uri()."/js/jquery.isotope.min.js",array(),false,true);
	wp_enqueue_script("retina", get_template_directory_uri()."/js/retina-1.1.0.min.js",array(),false,true);
	wp_enqueue_script("plugins-scroll", get_template_directory_uri()."/js/plugins-scroll.js",array(),false,true);
	wp_enqueue_script("waypoint", get_template_directory_uri()."/js/waypoint.min.js",array(),false,true);
	wp_enqueue_script("infinitescroll", get_template_directory_uri()."/js/jquery.infinitescroll.min.js",array(),false,true);
	wp_enqueue_script("carousel", get_template_directory_uri()."/js/owl.carousel.min.js",array(),false,true);
	wp_enqueue_script("countTo", get_template_directory_uri()."/js/jquery.countTo.js",array(),false,true);
	wp_enqueue_script("jflickrfeed", get_template_directory_uri()."/js/jflickrfeed.min.js",array(),false,true);
	wp_enqueue_script("map_api", "https://maps.google.com/maps/api/js?sensor=false",array(),false,true);
	wp_enqueue_script("gmap", get_template_directory_uri()."/js/gmap3.min.js",array(),false,true);
	wp_enqueue_script("custom", get_template_directory_uri()."/js/script.js",array(),false,true);
	//wp_enqueue_script( 'ajax-implementation.js', get_template_directory_uri(). "/scripts/ajax-implementation.js", array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'bl_scripts' );

//For IE
function bl_script_ie() {
        echo '
			<!--[if lt IE 9]>
			  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
		';
        
    }
add_action( 'wp_head', 'bl_script_ie' );

function bl_post_nav(){ ?>

	<div class="pagination-box">
	  <span class="prev-link">
	  <?php previous_posts_link('Prev','') ?>
	  </span>
	  <span class="next-link">
	  <?php next_posts_link('Next','') ?>
	  </span>
	</div>
<?php
}
//Custom comment List:
function bl_theme_comment($comment, $args, $depth) {
	global $textdomain; 
     $GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class('clearfix'); ?> id="comment-<?php comment_ID() ?>">
			<div class="comment-box">
				<?php echo get_avatar($comment,$size='60',$default='https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=70' ); ?>
				<div class="comment-content">
					<h4><?php printf(__('%s','white'), get_comment_author_link()) ?></h4>
					<span><?php printf(__('%1$s at %2$s',$textdomain), get_comment_date(), get_comment_time()) ?></span>
					<?php comment_text() ?>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					<?php if ($comment->comment_approved == '0') : ?>
					 <em><?php _e('Your comment is awaiting moderation.','ipressa') ?></em>
					 <br />
				  <?php endif; ?>
				</div>
			</div>
		

<?php

}

// function to display number of posts.
function bl_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count.'';
}
 
// function to count views.
function bl_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//Get thumbnail url
    
function bl_thumbnail_url($size){
    global $post;
    //$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()),$size );
    if($size==''){
        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
         return $url;
    }else{
        $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size);
         return $url[0];
    }
   
}
//pagination
function bl_pagination($prev = 'Prev', $next = 'Next', $pages='') {
    global $wp_query, $wp_rewrite, $textdomain;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
		'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
		'format' 		=> '',
		'current' 		=> max( 1, get_query_var('paged') ),
		'total' 		=> $pages,
		'prev_text' => __($prev,$textdomain),
        'next_text' => __($next,$textdomain),
		'type'			=> 'list',
		'end_size'		=> 3,
		'mid_size'		=> 3
);
    $return =  paginate_links( $pagination );
	echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
}

//Custom Excerpt Function
function marbale_excerpt($limit = 30) {
 
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

//Active Plugin: 
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package       TGM-Plugin-Activation
 * @subpackage Example
 * @version       2.3.6
 * @author       Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author       Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license       https://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/framework/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        
      
        array(
            'name'                     => 'Contact Form 7', // The plugin name
            'slug'                     => 'contact-form-7', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),array(
            'name'                     => 'Redux Framework', // The plugin name
            'slug'                     => 'redux-framework', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),array(
            'name'                     => 'Page Builder', // The plugin name
            'slug'                     => 'Page-Builder', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
            'source'                   => get_template_directory_uri() . '/framework/plugins/Page-Builder.zip', // The plugin source
        ),array(
            'name'                     => 'Twitter Widget', // The plugin name
            'slug'                     => 'tweets', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
            'source'                   => get_template_directory_uri() . '/framework/plugins/tweets.zip', // The plugin source
        ),array(
            'name'                     => 'Revolution Slider', // The plugin name
            'slug'                     => 'revslider', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
            'source'                   => get_template_directory_uri() . '/framework/plugins/revslider.zip', // The plugin source
        )
        
    );

    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'icommerce';

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'               => $theme_text_domain,             // Text domain - likely want to be the same as your theme.
        'default_path'         => '',                             // Default absolute path to pre-packaged plugins
        'parent_menu_slug'     => 'themes.php',                 // Default parent menu slug
        'parent_url_slug'     => 'themes.php',                 // Default parent URL slug
        'menu'                 => 'install-required-plugins',     // Menu slug
        'has_notices'          => true,                           // Show admin notices or not
        'is_automatic'        => false,                           // Automatically activate plugins after installation or not
        'message'             => '',                            // Message to output right before the plugins table
        'strings'              => array(
            'page_title'                                   => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                   => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                   => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                         => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'                 => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                      => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'                => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'            => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                     => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                         => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                         => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                                   => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                               => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                       => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                             => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                     => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
            'nag_type'                                    => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa( $plugins, $config );

}
?>