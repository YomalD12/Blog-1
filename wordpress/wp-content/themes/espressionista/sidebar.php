<?php if( is_active_sidebar( 1 ) ) : ?>
	<div id="sidebar" <?php espressionista_sidebar_class(); ?> role="complementary">
		<?php dynamic_sidebar(); ?>
	</div>
<?php endif; ?>