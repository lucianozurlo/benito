<?php
/** A simple text block **/
class Banner_Text_Block extends AQ_Block {
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => '<i class="fa fa-building-o"></i> Banner Text',
			'size' => 'col-md-12',
		);
		//create the block
		parent::__construct('Banner_Text_Block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'title' => 'Top reasons to work with us',
			'content' => 'CCLorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.',
			'btn_link' => '#',
			'btn_text' => 'Buy it now'
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
			<label for="<?php echo $this->get_field_id('content') ?>">
				Content
				<?php echo aq_field_textarea('content', $block_id, $content, $size = 'full') ?>
			</label>
		</p>
		<p class="description">
			<label for="<?php echo $this->get_field_id('btn_link') ?>">
				Buttom Link
				<?php echo aq_field_input('btn_link', $block_id, $btn_link, $size = 'full') ?>
			</label>
		</p>
		<p class="description">
			<label for="<?php echo $this->get_field_id('btn_text') ?>">
				Buttom Link
				<?php echo aq_field_input('btn_text', $block_id, $btn_text, $size = 'full') ?>
			</label>
		</p>
		<?php
	}
	
	function block($instance) {
		extract($instance);

		$wp_autop = ( isset($wp_autop) ) ? $wp_autop : 0;
		?>
			<h1><?php echo $title; ?></h1>
			<p><?php echo do_shortcode(htmlspecialchars_decode($content)); ?></p>
			<?php if($btn_text!=''){ ?>
			<a class="button-two" href="<?php echo $btn_link; ?>"><span><?php echo $btn_text; ?></span><i class="fa fa-angle-right"></i></a>
			<?php } ?>
		
		<?php
	}
}
?>