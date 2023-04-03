<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<?php if( has_post_thumbnail() ) : ?>
		<figure class="entry-media">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail( 'blog-thumb' ); ?>
			</a>
		</figure>
	<?php endif; ?>
	<?php the_excerpt(); ?>
	<?php espressionista_entry_meta(); ?>
</article>