<?php get_header(); ?>
	<?php espressionista_location(); ?>
	<div id="container" class="wrap">
		<section id="content" <?php espressionista_content_class(); ?> role="main">
			<?php if( have_posts() ) : ?>
				<?php the_post(); ?>
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<div class="entry">
						<header class="entry-header">
							<h1 class="entry-title"><?php the_title(); ?></h1>
						</header>
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<p class="post-pagination">' . __( 'Pages:', 'espressionista' ), 'after' => '</p>' ) ); ?>
						</div>
						<div class="clear"></div>
					</div>
					<?php comments_template(); ?>
				</article>
			<?php else : ?>
				<?php espressionista_404(); ?>
			<?php endif; ?>
		</section>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div>
<?php get_footer(); ?>