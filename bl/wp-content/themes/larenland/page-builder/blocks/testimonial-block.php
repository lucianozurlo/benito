<?php

if(!class_exists('Testimonial_Block')) {
class Testimonial_Block extends AQ_Block {
	function __construct() {
		$block_options = array(
		'name' => '<i class="fa fa-comment"></i> Testimonial',
		'size' => 'col-md-12',
		);
		//create the widget
		parent::__construct('Testimonial_Block', $block_options);
		//add ajax functions
		add_action('wp_ajax_aq_block_testimonial_add_new', array($this, 'add_testimonial_item'));
	}
	function form($instance){
		$defaults = array(
            'title' => 'Testimonial',
        	'columm' => '1',           
            'items' => array(
				1 => array(
				'title' => 'Jone Doe - Co-Founder',
				'image' => '',
				'content' => '" Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non "'
				)
            ),
        );
		$instance = wp_parse_args($instance, $defaults);
        extract($instance);
		?>
		<p class="description ">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		<p class="description ">
			<label for="<?php echo $this->get_field_id('columm') ?>">
				Column
				<?php echo aq_field_input('columm', $block_id, $columm, $size = 'full') ?>
				
			</label>
		</p>
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
				<a href="#" rel="testimonial" class="aq-sortable-add-new button">Agregar nuevo</a>
			<p></p>
		</div>
<?php	
	}
	function item($item = array(), $count = 0) {

?>
	<li id="sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
		<div class="sortable-head cf">
			<div class="sortable-title">
				<strong><?php echo htmlspecialchars_decode($item['title']); ?></strong>
			</div>
			<div class="sortable-handle">
				<a href="#">Open / Close</a>
			</div>
		</div>
		<div class="sortable-body">
			
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-title">
					Author <br/>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][title]" value="<?php echo $item['title'] ?>" />
				</label>
			</div>
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-image">
					<b>Avatar </b><em style="font-size: 0.8em;"></em>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-image" class="input-full input-upload" value="<?php echo $item['image'] ?>" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][image]">
					<a href="#" class="aq_upload_button button" rel="image">Upload</a><p></p>
				</label>
			</div>
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-content">
					Content <br/>
					<textarea rows="10" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-content" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][content]"><?php echo $item['content'] ?></textarea>
				</label>
			</div>
		<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
		</div>
	</li>

  <?php  
    }
	function block($instance){
		extract($instance); ?>

			<ul class="bxslider">
				<?php  $t = 1; foreach($items as $item){ ?>
				
					<?php if($columm!=1 and $t%$columm==1){ ?>
					<li>
						<div class="row">
					<?php } ?>
					<?php if($columm!=1){ ?>
						<div class="col-sm-<?php echo 12/$columm; ?>">
					<?php } ?>
					<div class="testimonial-post">
						<img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>">
						<h2> <?php echo do_shortcode(htmlspecialchars_decode($item['title'])); ?> </h2>
						<p><?php echo do_shortcode(htmlspecialchars_decode($item['content'])); ?></p>
					</div>
					<?php if($columm!=1){ ?>
						</div>
					<?php } ?>
					<?php if(($columm!=1 and $t%$columm==0) or ($t == count($items) and $columm!=1)){ ?>
						</div>
						</li>
					<?php } ?>
				
				<?php $t++; } ?>
				
			</ul>
			
	<?php
		
	}
	
	/* AJAX add testimonial */
	function add_testimonial_item() {
	$nonce = $_POST['security'];	
	if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
	
	$count = isset($_POST['count']) ? absint($_POST['count']) : false;
	$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
	
	//default key/value for the testimonial
	$item = array(
				'title' => 'Jone Doe - Co-Founder',
				'image' => '',
				'content' => '" Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non "'
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