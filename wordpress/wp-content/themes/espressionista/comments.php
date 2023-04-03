<?php if ( have_comments() ) : ?>
	<aside id="comments">
		<?php if ( post_password_required() ) : ?>
			<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'espressionista' ); ?></p>
			<?php return; ?>
		<?php endif; ?>
		<h3 id="comments-title"><?php comments_number( __( 'No Responses to', 'espressionista' ), __( 'One Response to', 'espressionista' ), __( '% Responses to', 'espressionista' ) ); ?> &quot;<?php the_title(); ?>&quot;</h3>

		<div id="comments-nav-above" class="navigation">
			<div class="nav-prev"><?php previous_comments_link() ?></div>
			<div class="nav-next"><?php next_comments_link() ?></div>
			<div class="clear"></div>
		</div>
		
		<ol class="commentlist">
			<?php wp_list_comments( array( 'style' => 'ol', 'avatar_size' => 64 ) ); ?>
		</ol>
		
		<div id="comments-nav-below" class="navigation">
			<div class="nav-prev"><?php previous_comments_link() ?></div>
			<div class="nav-next"><?php next_comments_link() ?></div>
			<div class="clear"></div>
		</div>
	</aside>
<?php endif; ?>

<?php if ( have_comments() && ! comments_open() ) : ?>
	<div id="respond">
		<p class="nocomments"><?php _e( 'Comments are closed.', 'espressionista' ) ?></p>
	</div>
<?php endif; ?>

<?php comment_form(); ?>