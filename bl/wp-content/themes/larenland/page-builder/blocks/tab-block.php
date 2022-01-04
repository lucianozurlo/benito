<?php
/** A simple text block **/
class Tab_Block extends AQ_Block {
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => '<i class="fa fa-bars"></i> Tab',
			'size' => 'col-md-12',
			'offset' => '',
			'effect' => 'None',
		);
		
		//create the block
		parent::__construct('Tab_Block', $block_options);
		//add ajax functions
	add_action('wp_ajax_aq_block_tab_add_new', array($this, 'add_tab_item'));
	}
	
	function form($instance){

        $defaults = array(

            'title' => '',               
            'id' => 'Tab',         
            'items' => array(
				1 => array(
				'title' => 'We are trendy',
				'sub_title' => 'Aliquam tincidunt mauris',
				'content' => '<h2>We are passionate about design</h2>
<p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>',
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
		<label for="<?php echo $this->get_field_id('id') ?>">
        Id
        <?php echo aq_field_input('id', $block_id, $id, $size = 'full') ?>
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
	    	<a href="#" rel="tab" class="aq-sortable-add-new button">Agregar nuevo</a>
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
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-content">
					Content <br/>
					<textarea cols="75" rows="5" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-content"  name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][content]" ><?php echo $item['content'] ?></textarea>
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
	
<?php
		
		echo '<div class="tab-box">';
		if (!empty($items)) {

		

?>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" id="<?php echo $id; ?>">
		<?php $n=1;  foreach($items as $item ) { ?>
			<li <?php if($n==1){ ?> class="active"<?php } ?>>
				<a href="#<?php echo $id.$n; ?>" data-toggle="tab">
					<span><?php echo $n; ?></span>
					<h2><?php echo $item['title']; ?></h2>
					<p><?php echo $item['sub_title']; ?></p>
				</a>
			</li>
		<?php $n++; } ?>	
		</ul>
		<div class="tab-content">
		<?php $c=1;  foreach($items as $item ) { ?>
			<div class="tab-pane <?php if($c==1){ ?> active<?php } ?>" id="<?php echo $id.$c; ?>">
				<?php echo do_shortcode(htmlspecialchars_decode($item['content'] )); ?>
			</div>
		<?php $c++; } ?>
		</div>
		
<?php 
		

		}

		    		  
		echo '</div>'; ?>
<?php 

		}
		
		/* AJAX add testimonial */
		function add_tab_item() {
		$nonce = $_POST['security'];	
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		//default key/value for the testimonial
		$item = array(
				'title' => 'We are trendy',
				'sub_title' => 'Aliquam tincidunt mauris',
				'content' => '<h2>We are passionate about design</h2>
<p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>',
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