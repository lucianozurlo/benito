<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<?php  global $textdomain; ?>
<div class="comment-section">
	<h3><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?> </h3>

	<ul class="comment-tree">
		<?php wp_list_comments('callback=bl_theme_comment'); ?>
	</ul>
	<?php
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
			<footer class="navigation comment-navigation" role="navigation">
				<!--<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', $textdomain ); ?></h1>-->
				<div class="previous"><?php previous_comments_link( __( '&larr; Older Comments', $textdomain ) ); ?></div>
				<div class="next right"><?php next_comments_link( __( 'Newer Comments &rarr;', $textdomain ) ); ?></div>
			</footer><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.' , $textdomain ); ?></p>
		<?php endif; ?>
</div>

<?php
$aria_req = ( $req ? " aria-required='true'" : '' );
$comment_args = array(
	'title_reply'=> 'Leave a Comment',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '
		<div class="row">
			<div class="col-md-4">
				<input type="text" name="author"  placeholder="Name (required)" id="name" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
			</div>
		',
		'email' => '
			<div class="col-md-4">
				<input id="mail" name="email"  placeholder="Email (required)" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />
			</div>
		',
		'url' => '
			<div class="col-md-4">
				<input id="website" name="url"  placeholder="Website" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"  />
			</div>
		</div>
		'
	)),
	'comment_field' => '<textarea cols="45" rows="7" id="comment" placeholder="Your Message (required)"  name="comment"'.$aria_req.'></textarea>',
	'label_submit' => 'Send Comment',
	'comment_notes_after' => '',
);
?>
<?php global $post; ?>
<?php if('open' == $post->comment_status){ ?>
	<?php comment_form($comment_args); ?>
<?php } ?>