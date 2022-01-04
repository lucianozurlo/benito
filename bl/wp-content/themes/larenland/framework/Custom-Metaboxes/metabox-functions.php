<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {
    global $textdomain;

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';
	
	$meta_boxes[] = array(
		'id'         => 'post_options',
		'title'      => 'Post Options',
		'pages'      => array('post'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
           
			
			
			array(
                'name' => 'oembed URL for post format video',
                'desc' => 'Set Intro video',
                'id'   => $prefix . 'intro_video',
                'type'    => 'oembed',
                
            ),
			array(
                'name' => 'Quote for post quote format',
                'desc' => 'Put quote link',
                'id'   => $prefix . 'quote',
                'type'    => 'textarea_small',
                
            ),
			array(
                'name' => 'Link for post link format',
                'desc' => 'Put your link',
                'id'   => $prefix . 'link',
                'type'    => 'text',
                
            ),
			array(
				'name'         => __( 'Post Gallery Intro for Post Gallery Format', $textdomain ),
				'desc'         => __( 'Upload or add multiple images/attachments.', $textdomain ),
				'id'           => $prefix . 'p_gallery',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'portfolio_options',
		'title'      => 'Información de la obra',
		'pages'      => array('portfolio'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
           array(
                'name' => 'Año',
                'desc' => 'ej: (2015)',
                'id'   => $prefix . 'sub_title',
                'type'    => 'text',
                
            ),
			array(
                'name' => 'Técnica',
                'desc' => 'ej: Acrílico sobre vidrio',
                'id'   => $prefix . 'client',
                'type'    => 'text',
                
            ),
			array(
                'name' => 'Medidas',
                'desc' => 'ej: 50 x 30 cm',
                'id'   => $prefix . 'p_link',
                'type'    => 'text',
                
            ),
		),
	);
	
	$meta_boxes[] = array(
        'id'         => 'page_setting',
        'title'      => 'Page Setting',
        'pages'      => array('page'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            
            array(
                'name' => 'Page Full Width',
                'desc' => 'Set Page Full Width',
                'id'   => $prefix . 'page_fullwidth',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => 'No', 'value' => 'no', ),
                    array( 'name' => 'Yes', 'value' => 'yes', ),
                    )
            ),
             array(
                'name' => 'Show heading area',
                'desc' => '',
                'id'   => $prefix . 'page_heading',
                'type'    => 'select',
                'options' => array(
					array( 'name' => 'Yes', 'value' => 'yes', ),
                    array( 'name' => 'No', 'value' => 'no', ),
                    
                    )
            ),
			
            array(
                'name' => 'Sidebar Position',
                'desc' => 'Select Sidebar position',
                'id'   => $prefix . 'sidebar_position',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => 'Right', 'value' => 'right', ),
                    array( 'name' => 'Left', 'value' => 'left', ),
                    )
            ),
			array(
                'name'         => __( 'Breadcrumb background', $textdomain ),
                'desc'         => __( 'Upload Breadcrumb background.', $textdomain ),
                'id'           => $prefix . 'breadcrumb_bg',
                'type'         => 'file',
                'preview_size' => array( 200, 100 ), // Default: array( 50, 50 )
            ),
        )
    );
	
	$meta_boxes[] = array(
		'id'         => 'seo_fields',
		'title'      => 'SEO Fields',
		'pages'      => array( 'page', 'post','portfolio'), // Post type
		'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields' => array(
			array(
				'name' => 'SEO title',
				'desc' => 'Title for SEO (optional)',
				'id'   => $prefix . 'seo_title',
				'type' => 'text',
			),
            array(
                'name' => 'SEO Keywords',
                'desc' => 'SEO keywords (optional)',
                'id'   => $prefix . 'seo_keywords',
                'type' => 'text',
            ),
            array(
                'name' => 'SEO Description',
                'desc' => 'SEO description (optional)',
                'id'   => $prefix . 'seo_description',
                'type' => 'text',
            ),
		)
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
