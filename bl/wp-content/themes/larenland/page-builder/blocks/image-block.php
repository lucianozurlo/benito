<?php
/** A simple text block **/
class Image_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => '<i class="fa fa-picture-o"></i> Image',
			'size' => 'col-md-6',
			'offset' => '',
			'effect' => 'None',
		);
		
		//create the block
		parent::__construct('Image_Block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'text' => '',
			'image' => '',
			'style' => '',
			'effect' => 'None'
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		$options = array(
			'bounceIn' => 'bounceIn',
			'slideInLeft' => 'slideInLeft',
			'tada' => 'tada',
			'slideInRight' => 'slideInRight',
        	'flipInX' => 'flipInX',
        	'slideInUp' => 'slideInUp',
        	'fadeInUp' => 'fadeInUp',
        	'shake' => 'shake',
        	'None' => 'None',
        );
		?>
		
		<p class="description ">
			<label for="<?php echo $this->get_field_id('effect') ?>">
				Effect (optional)
				<?php echo aq_field_select('effect', $block_id, $options, $effect) ?>
			</label>
		</p>
		<p class="description">
			<label for="<?php echo $this->get_field_id('style') ?>">
				Custom Style
				<?php echo aq_field_input('style', $block_id, $style, $size = 'full') ?>
			</label>
		</p>
		<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('image') ?>">
					<b>Upload your Image</b><em style="font-size: 0.8em;"></em>
					<input type="text" id="<?php echo $this->get_field_id('image') ?>" class="input-full input-upload" value="<?php echo $image ?>" name="<?php echo $this->get_field_name('image') ?>">
					<a href="#" class="aq_upload_button button" rel="image">Upload</a><p></p>
				</label>
			</div>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);

		$wp_autop = ( isset($wp_autop) ) ? $wp_autop : 0;
		if($style!=""){
			$c_style = 'style="'.$style.'"';
		}else{
			$c_style = '';
		}
		if($title) echo '<h4 class="aq-block-title">'.strip_tags($title).'</h4>';
		if($effect!='None'){
		echo '<div class="image-place triggerAnimation animated" data-animate="'.$effect.'">';
		}
		echo '<img alt="image" class="img-responsive" '.$c_style.' src="'.$image.'" />';
		if($effect!='None'){
		echo "</div>";
		}
	}
	
}
