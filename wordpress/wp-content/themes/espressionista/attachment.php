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
						<div class="entry-content">
							<figure class="entry-attachment">
								<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
									<?php if( wp_attachment_is_image() ) : ?>
										<?php echo wp_get_attachment_image( $post->ID, 'blog-thumb' ); ?>
									<?php else : ?>
										<?php _e( 'Download', 'espressionista' ); ?>
									<?php endif; ?>
								</a>
								<?php if ( ! empty( $post->post_excerpt ) ) : ?>
									<figcaption class="entry-caption">
										<?php the_excerpt(); ?>
									</figcaption>
								<?php endif; ?>
							</figure>
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