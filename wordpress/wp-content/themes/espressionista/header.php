<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php wp_title(); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
	<div id="wrapper">
		<header id="header">
			<div class="wrap">
				<div id="branding">
					<div id="site-title">
						<a href="<?php echo home_url( '/' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</div>
				</div>
				<nav id="site-navigation" role="navigation">
					<h3 class="menu-toggle">
						<?php _e( 'Menu', 'espressionista' ); ?>
						<a class="menu-show" href="#site-navigation"><?php _e( 'Show Menu', 'espressionista' ); ?></a>
						<a class="menu-hide" href="#nogo"><?php _e( 'Hide Menu', 'espressionista' ); ?></a>
					</h3>
					<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'espressionista' ); ?>"><?php _e( 'Skip to content', 'espressionista' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary_nav' ) ); ?>
				</nav>
				<div class="clear"></div>
			</div>
		</header>