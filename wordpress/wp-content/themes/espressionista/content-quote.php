<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php espressionista_first_blockquote(); ?>
	<?php if( has_post_thumbnail() ) : ?>
		<figure class="entry-media">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail( 'blog-thumb' ); ?>
			</a>
		</figure>
	<?php endif; ?>
	<?php the_excerpt(); ?>
	<div class="clear"></div>
	<?php espressionista_entry_meta(); ?>
</article>