<?php
/* List Block */
if(!class_exists('Pricing_Block')) {
class Pricing_Block extends AQ_Block {
	function __construct() {
		$block_options = array(
		'name' => '<i class="fa fa-gears"></i> Pricing',
		'size' => 'col-md-12',
	);

	//create the widget
	parent::__construct('Pricing_Block', $block_options);

	//add ajax functions

	add_action('wp_ajax_aq_block_pricing_add_new', array($this, 'add_pricing_item'));

	}

   function form($instance){

        $defaults = array(

            'title' => '',          
            'items' => array(
            1 => array(
           'title' => 'Pricing',
            'price' => '$ <span>99</span> month',
            'button_text' => 'Chose Plan',
            'button_link' => '#',
            'content' => '<li><p>Free Setup</p></li>
<li><p>10 GB Storage</p></li>
<li><p>Unlmited Users</p></li>
<li><p>20 GB Bandwith</p></li>',
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
	    	<a href="#" rel="pricing" class="aq-sortable-add-new button">Agregar nuevo</a>
	    <p></p>
    </div>

	

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
					Pricing Name<br/>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][title]" value="<?php echo $item['title'] ?>" />
				</label>
			</div>
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-price">
					Price<br/>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-price" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][price]" value="<?php echo $item['price'] ?>" />
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
					Button text<br/>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-button_link" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][button_link]" value="<?php echo $item['button_link'] ?>" />
				</label>

			</div>
			<div class="tab-desc description">

				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-content">

					Pricing Content <br/>

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

		echo '<div class="pricing-box">';

		if (!empty($items)) {

		foreach( $items as $item ) { ?>
		
			<div class="pricing-item triggerAnimation animated" data-animate="flipInX">
				<ul class="pricing-table basic">
					<li class="title">
						<h1><?php echo $item['title']; ?></h1>
						<p><?php echo do_shortcode(htmlspecialchars_decode($item['price'])); ?></p>
					</li>
					<?php echo do_shortcode(htmlspecialchars_decode($item['content'])); ?>
					<li>
						<a href="<?php echo $item['button_link']; ?>" class="button-third"><?php echo $item['button_text']; ?></a>
					</li>
				</ul>							
			</div>
		
		<?php
		

		}

		}

		    		  
		echo '</div>';

		    }

		/* AJAX add testimonial */

		function add_pricing_item() {

		$nonce = $_POST['security'];	

		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');

		

		$count = isset($_POST['count']) ? absint($_POST['count']) : false;

		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';

		

		//default key/value for the testimonial

		$item = array(

			'title' => 'Pricing',
            'price' => '$ <span>99</span> month',
            'button_text' => 'Chose Plan',
            'button_link' => '#',
            'content' => '<li><p>Free Setup</p></li>
<li><p>10 GB Storage</p></li>
<li><p>Unlmited Users</p></li>
<li><p>20 GB Bandwith</p></li>',

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