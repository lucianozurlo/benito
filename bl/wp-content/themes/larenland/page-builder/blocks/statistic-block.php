<?php
/* List Block */
if(!class_exists('Statistics_Block')) {
class Statistics_Block extends AQ_Block {
	function __construct() {
		$block_options = array(
		'name' => '<i class="fa fa-gears"></i> Statistics',
		'size' => 'col-md-12',
	);
	//create the widget
	parent::__construct('Statistics_Block', $block_options);
	//add ajax functions
	add_action('wp_ajax_aq_block_statistics_add_new', array($this, 'add_statistics_item'));

	}
	function form($instance){

        $defaults = array(

            'title' => '',
        	'columm' => '4',
			'style' => '1',
            'items' => array(
            1 => array(
            'title' => 'Finished Projects',
            'icon' => 'heart-o',
            'number' => '500',
            'content' => '',
            
            )

            ),

        );

        $instance = wp_parse_args($instance, $defaults);

        extract($instance);      

        $columm_options = array(
                '3' => '3 Column',
                '4' => '4 Column',

        );
		$style_options = array(
			'1' => 'Style 1',
			'2' => 'Style 2',
			
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
	    	<a href="#" rel="statistics" class="aq-sortable-add-new button">Agregar nuevo</a>
	    <p></p>
    </div>
	<p class="description half">
		<label for="<?php echo $this->get_field_id('style') ?>">
			Style (optional)
			<?php echo aq_field_select('style', $block_id, $style_options, $style) ?>
		</label>
	</p>
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
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-number">
					Number<br/>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-number" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][number]" value="<?php echo $item['number'] ?>" />
				</label>
			</div>
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-icon">
					Icon<br/>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-icon" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][icon]" value="<?php echo $item['icon'] ?>" />
				</label>
			</div>
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-content">
					Content <br/>
					<textarea cols="70" rows="5" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-content"  name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][content]" ><?php echo $item['content'] ?></textarea>
				</label>
			</div>
		<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
		</div>
	</li>
  <?php  
    }
	
	function block($instance){

    extract($instance);

		if (!empty($items)) {
		
		$i = 0;
		$scolumm = 12/$columm;
		?>
		<div class="statistic-box  <?php if($style=='2'){ ?> style2 <?php } ?>">
		<?php
		foreach( $items as $item ) {

		$i++;	

		if($i%$columm==1){

			$class= "first";
		}else{
			$class = '';
		}
?>

		<div class="col-sm-<?php echo $scolumm; ?> <?php echo $class; ?>">
			<div class="statistic-post">
				<div class="statistic-counter">
					<i class="fa fa-<?php echo $item['icon']; ?>"></i>
					<p><span class="timer" data-from="0" data-to="<?php echo $item['number']; ?>"></span></p>
					<p><?php echo $item['title']; ?></p>
				</div>
				<?php if($item['content']!=''){ ?>
				<div class="statistic-content">
					<?php echo do_shortcode(htmlspecialchars_decode($item['content'])); ?>
				</div>
				<?php } ?>
			</div>
		</div>
		
<?php 
		}
?>
	</div>
<?php
		}

		

		}
		
		/* AJAX add testimonial */
		function add_statistics_item() {
		$nonce = $_POST['security'];	
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		//default key/value for the testimonial
		$item = array(
            'title' => 'Finished Projects',
            'icon' => 'heart-o',
            'number' => '500',
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