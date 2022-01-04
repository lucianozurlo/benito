<?php
/** A simple text block **/
class Gmap_Block extends AQ_Block {
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => '<i class="fa fa-globe"></i> Gmap',
			'size' => 'col-md-12',
			'offset' => '',
			'effect' => 'None',
		);
		
		//create the block
		parent::__construct('Gmap_Block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'lat' => '41.8744661',
			'image' => get_template_directory_uri().'/images/marker.png',
			'lon' => '-87.6614312',
			'effect' => 'None',
			'zoom' => '15'
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
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('lat') ?>">
				Lat
				<?php echo aq_field_input('lat', $block_id, $lat, $size = 'full') ?>
			</label>
		</p>
		<p class="description">
			<label for="<?php echo $this->get_field_id('lon') ?>">
				Lon
				<?php echo aq_field_input('lon', $block_id, $lon, $size = 'full') ?>
			</label>
		</p>
		<p class="description">
			<label for="<?php echo $this->get_field_id('zoom') ?>">
				Zoom
				<?php echo aq_field_input('zoom', $block_id, $zoom, $size = 'full') ?>
			</label>
		</p>
		<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('image') ?>">
					<b>Map Maker</b><em style="font-size: 0.8em;"></em>
					<input type="text" id="<?php echo $this->get_field_id('image') ?>" class="input-full input-upload" value="<?php echo $image ?>" name="<?php echo $this->get_field_name('image') ?>">
					<a href="#" class="aq_upload_button button" rel="image">Upload</a><p></p>
				</label>
			</div>
		<p class="description ">
			<label for="<?php echo $this->get_field_id('effect') ?>">
				Effect (optional)
				<?php echo aq_field_select('effect', $block_id, $options, $effect) ?>
			</label>
		</p>
		<?php
	}
	
	function block($instance) {
		extract($instance);

		$wp_autop = ( isset($wp_autop) ) ? $wp_autop : 0;
	?>
	<div class="map <?php if($effect!='None'){ ?>triggerAnimation animated<?php } ?>" <?php if($effect!='None'){?> data-animate="<?php echo $effect; ?>" <?php } ?>></div>
	<script type="text/javascript">
		(function($) {
		"use strict"
			$(document).ready(function(){
				var contact = {"lat":"<?php echo $lat; ?>", "lon":"<?php echo $lon; ?>"}; //Change a map coordinate here!

				try {
					var mapContainer = $('.map');
					mapContainer.gmap3({
						action: 'addMarker',
						marker:{
							options:{
								icon : new google.maps.MarkerImage('<?php echo $image; ?>')
							}
						},
						latLng: [contact.lat, contact.lon],
						map:{
							center: [contact.lat, contact.lon],
							zoom: <?php echo $zoom; ?>
							},
						},
						{action: 'setOptions', args:[{scrollwheel:false}]}
					);
				} catch(err) {

				}
			});
		})(jQuery);
	</script>
	<?php
	}
}
?>