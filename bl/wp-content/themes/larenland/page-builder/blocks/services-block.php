<?php
/* List Block */
if(!class_exists('Services_Block')) {
class Services_Block extends AQ_Block {
	function __construct() {
		$block_options = array(
		'name' => '<i class="fa fa-gears"></i> Services',
		'size' => 'col-md-12',
	);
	//create the widget
	parent::__construct('Services_Block', $block_options);
	//add ajax functions
	add_action('wp_ajax_aq_block_new_service_add_new', array($this, 'add_new_service_item'));

	}
	
	function form($instance){

        $defaults = array(

            'title' => '',
        	'columm' => '4',           
            'items' => array(
            1 => array(
            'title' => 'High Quality',
            'sub_title' => 'Vestibulum auctor dapibus neque.',
            'icon' => 'thumbs-o-up',
            'button_text' => 'Read More',
            'button_link' => '#',
            'content' => 'Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis  ',
            )

            ),

        );

        $instance = wp_parse_args($instance, $defaults);

        extract($instance);      

        $columm_options = array(
                '3' => '3 Column',
                '4' => '4 Column',

        );
		$icon_options = array(
            'svg' => 'SVG Icon',
            'font' => 'Font Icon',
        );
?>
    <div class="description">
        <label for="<?php echo $this->get_field_id('title') ?>">
        Title
        <?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
        </label>
    </div>
    <div class="cf"></div>
    <div class="description cf">
	    <ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
	    <?php

		    $items = is_array($items) ? $items : $defaults['items'];
		    $count = 1;
		    foreach($items as $item) {	
		    	$this->item($item, $count);
		    	$count++;
		    }
	    ?>
	    </ul>
	    <p></p>
	    	<a href="#" rel="new_service" class="aq-sortable-add-new button">Agregar nuevo</a>
	    <p></p>
    </div>

    <p class="description fourth">
		<label for="<?php echo $this->get_field_id('columm') ?>">
			Select Columm  Per Row <br/>
			<?php echo aq_field_select('columm', $block_id, $columm_options, $columm); ?>
		</label>
	</p> 
<?php

	}
	function item($item = array(), $count = 0) {



?>

	<li id="sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
		<div class="sortable-head cf">
			<div class="sortable-title">
				<strong><?php echo $item['title'] ?></strong>
			</div>
			<div class="sortable-handle">
				<a href="#">Open / Close</a>
			</div>
		</div>
		<div class="sortable-body">
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-title">
					Title<br/>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][title]" value="<?php echo $item['title'] ?>" />
				</label>
			</div>
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-sub_title">
					Sub Title<br/>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-sub_title" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][sub_title]" value="<?php echo $item['sub_title'] ?>" />
				</label>
			</div>
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-icon">
					Icon<br/>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-icon" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][icon]" value="<?php echo $item['icon'] ?>" />
				</label>
			</div>
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-button_text">
					Button text<br/>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-button_text" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][button_text]" value="<?php echo $item['button_text'] ?>" />
				</label>
			</div>
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-button_link">
					Button link<br/>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-button_link" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][button_link]" value="<?php echo $item['button_link'] ?>" />
				</label>
			</div>
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-content">
					Content <br/>
					<textarea cols="75" rows="8" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-content"  name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][content]" ><?php echo $item['content'] ?></textarea>
				</label>
			</div>
		<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
		</div>
	</li>
  <?php  
    }
	
	function block($instance){

    extract($instance);

		 $output = '';
		 $output .='<div class="plans">';

		if (!empty($items)) {

		$i = 0;
		$scolumm = 12/$columm;
		foreach( $items as $item ) {

		$i++;	

		if($i%$columm==1){

			$class= "first";
		}else{
			$class = '';
		}
?>
		<div class="col-sm-<?php echo $scolumm; ?> <?php echo $class; ?>">
			<div class="services-post triggerAnimation animated" data-animate="flipInY">
				<div class="services-head">
					<a href="#" class="icon"><i class="fa fa-<?php echo $item['icon']; ?>"></i></a>
					<h2><?php echo do_shortcode(htmlspecialchars_decode($item['title'])); ?></h2>
					<span><?php echo $item['sub_title']; ?></span>
				</div>
				<p><?php echo do_shortcode(htmlspecialchars_decode($item['content'])); ?></p>
				<a href="<?php echo $item['button_link']; ?>" class="button-one"><?php echo $item['button_text']; ?></a>
			</div>
		</div>
		
<?php 
		}

		}

		    		  
		$output .='</div>';
		  echo $output;

		}
		
		/* AJAX add testimonial */
		function add_new_service_item() {
		$nonce = $_POST['security'];	
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		//default key/value for the testimonial
		$item = array(
            'title' => 'High Quality',
            'sub_title' => 'Vestibulum auctor dapibus neque.',
            'icon' => 'thumbs-o-up',
            'button_text' => 'Read More',
            'button_link' => '#',
            'content' => 'Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis  ',
            );

		if($count) {
		$this->item($item, $count);
		} else {
		die(-1);
		}
		die();
		}		
		function update($new_instance, $old_instance) {
		$new_instance = aq_recursive_sanitize($new_instance);
		return $new_instance;
	}

}
}
?>
