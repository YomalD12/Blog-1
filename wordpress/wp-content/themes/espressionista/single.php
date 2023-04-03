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
							<?php espressionista_entry_meta(); ?>
						</header>
						<?php the_excerpt(); ?>
						<?php if( has_post_format( 'video' ) ) : ?>
							<?php espressionista_post_video(); ?>
						<?php elseif( has_post_thumbnail() ) : ?>
							<figure class="entry-media">
								<a href="<?php the_permalink(); ?>" rel="bookmark">
									<?php the_post_thumbnail( 'blog-thumb' ); ?>
								</a>
							</figure>
						<?php endif; ?>
						<?php if( has_post_format( 'audio' ) ) : ?>
							<?php espressionista_post_audio(); ?>
						<?php endif; ?>
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<p class="post-pagination">' . __( 'Pages:', 'espressionista' ), 'after' => '</p>' ) ); ?>
						</div>
						<div class="clear"></div>
						<?php the_tags( '<footer class="entry-utility"><div class="entry-tags">', ' ', '</div></footer>' ); ?>
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