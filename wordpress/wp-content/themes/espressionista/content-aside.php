<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php the_excerpt(); ?>
	<?php if( has_post_thumbnail() ) : ?>
		<figure class="entry-media">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail( 'blog-thumb' ); ?>
			</a>
		</figure>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content( __( 'Keep Reading &rarr;', 'espressionista' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<p class="post-pagination">' . __( 'Pages:', 'espressionista' ), 'after' => '</p>' ) ); ?>
	</div>
	<div class="clear"></div>
	<?php espressionista_entry_meta(); ?>
</article>