<?php get_header(); ?>
	<?php espressionista_location(); ?>
	<div id="container" class="wrap">
		<section id="content" <?php espressionista_content_class(); ?> role="main">
			<?php if( have_posts() ) : ?>
				<?php while( have_posts() ) : ?>
					<?php the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>
				<?php espressionista_posts_nav(); ?>
			<?php else : ?>
				<?php espressionista_404(); ?>
			<?php endif; ?>
		</section>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div>
<?php get_footer(); ?>