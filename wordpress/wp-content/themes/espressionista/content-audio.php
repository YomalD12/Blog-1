<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php espressionista_entry_meta(); ?>
	</header>
	<?php if( has_post_thumbnail() ) : ?>
		<figure class="entry-media">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail( 'blog-thumb' ); ?>
			</a>
		</figure>
	<?php endif; ?>
	<?php espressionista_post_audio(); ?>
	<?php the_excerpt(); ?>
</article>