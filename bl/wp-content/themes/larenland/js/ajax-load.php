<?php
$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header('Content-type: application/x-javascript');

?>
(function ($) {
	"use strict";
    $('.view-more').click(function(){
		$('.masonry').infinitescroll({
 
        navSelector  : ".pagination-box",            
                       // selector for the paged navigation (it will be hidden)
        nextSelector : ".pagination-box .next-link a",    
                       // selector for the NEXT link (to page 2)
        itemSelector : ".masonry .blog-post" ,         
                       // selector for all items you'll retrieve
        loading: {
              finishedMsg: 'No more pages to load.',
              img: '<?php echo get_stylesheet_directory_uri();?>/images/29.gif'
            }
      },
		 function( newElements ) {
            // hide new items while they are loading
            var $newElems = $( newElements ).css({ opacity: 0 });
            // ensure that images load before adding to masonry layout
            $newElems.imagesLoaded(function(){
              // show elems now they're ready
              $newElems.animate({ opacity: 1 });
			  var selector = $filter.find('a.active').attr('data-filter');

				try {
					$('.masonry').isotope({ 
						filter	: selector,
						animationOptions: {
							duration: 750,
							easing	: 'linear',
							queue	: false,
						}
					});
				} catch(err) {
				} 
            });
          }
	  );
	  return false;
	});
     

})(jQuery);