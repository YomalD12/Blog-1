<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php espressionista_entry_meta(); ?>
	</header>
	<?php the_excerpt(); ?>
	<?php espressionista_post_video(); ?>
	<div class="entry-content">
		<?php the_content( __( 'Keep Reading &rarr;', 'espressionista' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<p class="post-pagination">' . __( 'Pages:', 'espressionista' ), 'after' => '</p>' ) ); ?>
	</div>
	<div class="clear"></div>
</article>