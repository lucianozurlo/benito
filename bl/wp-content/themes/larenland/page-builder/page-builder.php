<?php

if(class_exists('AQ_Page_Builder')) {

    define('AQPB_CUSTOM_DIR', get_template_directory() . '/page-builder/');
    define('AQPB_CUSTOM_URI', get_template_directory_uri() . '/page-builder/');

    //include the block files
   
	require_once(AQPB_CUSTOM_DIR . 'blocks/testimonial-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/client-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/services-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/banner-text-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/recent-work-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/recent-work2-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/feature-list-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/image-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/statistic-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/blog-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/blog2-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/pricing-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/accordion-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/skills-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/map-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/team-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/tab-block.php');
	
    //register the blocks
	aq_register_block('Testimonial_Block');
	aq_register_block('Clients_Block');
	aq_register_block('Services_Block');
	aq_register_block('Banner_Text_Block');
	aq_register_block('Portfolio_Block');
	aq_register_block('Portfolio2_Block');
	aq_register_block('Feature_list');
	aq_register_block('Image_Block');
	aq_register_block('Statistics_Block');
	aq_register_block('Blog_Block');
	aq_register_block('Blog2_Block');
	aq_register_block('Pricing_Block');
	aq_register_block('Accordion_Block');
	aq_register_block('Skills_Block');
	aq_register_block('Gmap_Block');
	aq_register_block('Team_Block');
	aq_register_block('Tab_Block');
	
}

?>