<?php
/** A simple text block **/
class Accordion_Block extends AQ_Block {
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => '<i class="fa fa-bars"></i> Accordion',
			'size' => 'col-md-6',
			'offset' => '',
			'effect' => 'None',
		);
		
		//create the block
		parent::__construct('Accordion_Block', $block_options);
		//add ajax functions
	add_action('wp_ajax_aq_block_accordion_add_new', array($this, 'add_accordion_item'));
	}
	
	function form($instance){

        $defaults = array(

            'title' => '',          
            'intro' => '<h1>Why choose us?</h1>
<p>BBLorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>',          
            'effect' => '',         
            'items' => array(
				1 => array(
				'title' => 'Our Mission',
				'content' => 'Donec ornare mattis suscipit. Praesent fermentum accumsan vulputate. Sed velit nulla, sagittis non erat id, dictum vestibulum ligula. Maecenas sed enim sem. Etiam scelerisque gravida purus nec interdum.',
				)

            ),

        );
		
		$options = array(
			'bounceIn' => 'bounceIn',
			'slideInLeft' => 'slideInLeft',
			'slideInRight' => 'slideInRight',
        	'flipInX' => 'flipInX',
        	'slideInUp' => 'slideInUp',
        	'shake' => 'shake',
        	'fadeInUp' => 'fadeInUp',
        	'None' => 'None',
        );
		$style_options = array(
			'1' => 'Style 1',
			'2' => 'Style 2',
			'3' => 'Style 3',
			
        );
        $instance = wp_parse_args($instance, $defaults);
        extract($instance);      

		
?>
    <div class="description">
        <label for="<?php echo $this->get_field_id('title') ?>">
        Title
        <?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
        </label>
    </div>
	<label for="<?php echo $this->get_field_id('intro') ?>">
		Intro <br/>
		<textarea rows="4" id="<?php echo $this->get_field_id('intro') ?>" class="input-full" name="<?php echo $this->get_field_name('intro') ?>"><?php echo $intro ?></textarea>
	</label>
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
	    	<a href="#" rel="accordion" class="aq-sortable-add-new button">Agregar nuevo</a>
	    <p></p>
    </div>
	<p class="description half">
			<label for="<?php echo $this->get_field_id('effect') ?>">
				Effect (optional)
				<?php echo aq_field_select('effect', $block_id, $options, $effect) ?>
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
?>
	<div class="accord-box <?php if($effect!='None'){ ?>triggerAnimation animated<?php } ?>" <?php if($effect!='None'){ ?> data-animate="<?php echo $effect; ?> " <?php } ?>>
<?php
		echo do_shortcode(htmlspecialchars_decode($intro));
		echo '<div class="accordion-box">';
		if (!empty($items)) {

		$i = 1;
		foreach( $items as $item ) {

?>
		<div class="accord-elem <?php if($i==1){ ?>active<?php } ?>">
			<div class="accord-title">
				<h2><?php echo $item['title']; ?></h2>
				<a class="accord-link" href="#"></a>
			</div>
			<div class="accord-content">
				<?php echo do_shortcode(htmlspecialchars_decode($item['content'])); ?>
			</div>
		</div>
		
<?php 
		$i++; }

		}

		    		  
		echo '</div>'; ?>
		</div>
<?php 

		}
		
		/* AJAX add testimonial */
		function add_accordion_item() {
		$nonce = $_POST['security'];	
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		//default key/value for the testimonial
		$item = array(
				'title' => 'Our Mission',
				'content' => 'Donec ornare mattis suscipit. Praesent fermentum accumsan vulputate. Sed velit nulla, sagittis non erat id, dictum vestibulum ligula. Maecenas sed enim sem. Etiam scelerisque gravida purus nec interdum. ',
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
?>