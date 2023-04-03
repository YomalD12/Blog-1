<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>/" >
	<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'espressionista' ); ?></label>
	<input type="text" value="" placeholder="<?php esc_attr_e( 'Search this website', 'espressionista' ); ?>&#8230;" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'espressionista' ); ?>" />
	<div class="clear"></div>
</form>