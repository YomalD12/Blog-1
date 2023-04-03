		<footer id="footer" role="contentinfo">
			<div class="wrap">
				<p id="copyright">&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?></p>
				<p id="credits"><?php echo sprintf( __( 'Powered by <a href="%1$s">Espressionista Theme</a> and <a href="%2$s">WordPress</a>', 'espressionista' ), esc_url( 'http://www.onedesigns.com/themes/espressionista' ), esc_url( 'http://wordpress.org/' ) ); ?></p>
				<div class="clear"></div>
			</div>
		</footer>
	</div>
	<?php wp_footer(); ?>
</body>
</html>