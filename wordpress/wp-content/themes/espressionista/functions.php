<?php

// Set default content width based on the theme's layout. This affects the width of post images and embedded media.
if( ! isset( $content_width ) )
	$content_width = 580;

/**
 * Load the theme options page if in admin mode
 */
if ( is_admin() && is_readable( get_template_directory() . '/theme-options.php' ) )
	require_once( get_template_directory() . '/theme-options.php' );

if ( ! function_exists( 'espressionista_theme_setup' ) ) :
	/**
	 * Set up theme specific settings
	 *
	 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
	 * @uses register_nav_menus() To add support for navigation menus.
	 * @uses add_editor_style() To style the visual editor.
	 * @uses load_theme_textdomain() For translation/localization support.
	 * @uses add_image_size() To set custom image sizes.
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_theme_setup() {

		// Automatically add feed links to document head
		add_theme_support( 'automatic-feed-links' );

		// Register Primary Navigation Menu
		register_nav_menus(
			array(
				'primary_nav' => 'Primary Menu', // You can add more menus here
			)
		);

		add_theme_support( 'custom-background' );

		// Add support for Post Formats
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		// Add support for post thumbnails and custom image sizes specific to theme locations
		add_theme_support( 'post-thumbnails', array( 'post' ) );
		add_image_size( 'blog-thumb', 580, 360, 1 );
		
		// Allows users to set a custom background
		add_theme_support( 'custom-background', array(
			'default-color' => 'f4e1b7',
			'default-image' => get_template_directory_uri() . '/images/bg.jpg',
		) );

		// Set background properties for default image
		if( get_template_directory_uri() . '/images/bg.jpg' == get_background_image() ) {
			if( 'center' != get_theme_mod( 'background_position_x' ) )
				set_theme_mod( 'background_position_x', 'center' );
			if( 'fixed' != get_theme_mod( 'background_attachment' ) )
				set_theme_mod( 'background_attachment', 'fixed' );
		}
		
		// Styles the post editor
		add_editor_style();
		
		// Makes theme translation ready
		load_theme_textdomain( 'espressionista', get_template_directory() . '/languages' );
		
	}
endif;

add_action( 'after_setup_theme', 'espressionista_theme_setup' );

if ( ! function_exists( 'espressionista_widgets_init' ) ) :
	/**
	 * Registers theme widget areas
	 *
	 * @uses register_sidebar()
	 *
	 * @since Espressionista 1.0
	 */
	function  espressionista_widgets_init() {
		register_sidebar(
			array(
				'name'          => 'Sidebar',
				'description'   => __( 'Displays in in the main sidebar area.', 'espressionista' ),
				'before_widget' => '<aside id="%1$s" class="widget' . ( 'full-width' == espressionista_theme_option( 'layout_template' ) ? ' column threecol' : '' ) . ' %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>'
			)
		);
		register_sidebar(
			array(
				'name'          => '404 Page',
				'description'   => __( 'Displays on 404 Pages in the content area.', 'espressionista' ),
				'before_widget' => '<aside id="%1$s" class="%2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>'
			)
		);
	}
endif;

add_action( 'widgets_init', 'espressionista_widgets_init' );

if ( ! function_exists( 'espressionista_default_options' ) ) :
/**
 * Returns an array of theme default options.
 *
 * @since Espressionista 1.0
 */
function espressionista_default_theme_options() {
	return array(
		'navbar_background'           => '#30231c',
		'submenu_background'          => '#baa694',
		'content_background'          => '#ffffff',
		'sidebar_background'          => '#b25000',
		'footer_background'           => '#30231c',
		'menu_item_hover_color'       => '#ffffff',
		'submenu_item_color'          => '#ffffff',
		'bylines_color'               => '#999999',
		'content_color'               => '#777777',
		'link_color'                  => '#cc3333',
		'link_hover_color'            => '#4c1313',
		'widget_title_color'          => '#ffffff',
		'widget_text_color'           => '#4c4c4c',
		'widget_link_color'           => '#660000',
		'widget_link_hover_color'     => '#000000',
		'footer_text_color'           => '#ffffff',
		'footer_link_color'           => '#cc3333',
		'footer_link_hover_color'     => '#b25000',
		'layout_template'             => 'content-sidebar',
		'body_font_family'            => 'lustria',
		'body_font_size'              => 15,
		'body_font_size_unit'         => 'px',
		'body_font_style'             => 'regular',
		'body_font_color'             => '#4c4c4c',
		'site_title_font_family'      => 'italianno',
		'site_title_font_size'        => 36,
		'site_title_font_size_unit'   => 'px',
		'site_title_font_style'       => 'regular',
		'site_title_font_color'       => '#ffffff',
		'menu_item_font_family'       => 'inherit',
		'menu_item_font_size'         => 17,
		'menu_item_font_size_unit'    => 'px',
		'menu_item_font_style'        => 'inherit',
		'menu_item_font_color'        => '#baa694',
		'headlines_font_family'       => 'inherit',
		'headlines_font_size'         => 32,
		'headlines_font_size_unit'    => 'px',
		'headlines_font_style'        => 'regular',
		'headlines_font_color'        => '#4c4c4c',
		'bylines_font_family'         => 'inherit',
		'bylines_font_size'           => 13,
		'bylines_font_size_unit'      => 'px',
		'bylines_font_style'          => 'italic',
		'bylines_font_color'          => '#999999',
		'content_font_family'         => 'inherit',
		'content_font_size'           => 17,
		'content_font_size_unit'      => 'px',
		'content_font_style'          => 'inherit',
		'content_font_color'          => '#777777',
		'widget_title_font_family'    => 'inherit',
		'widget_title_font_size'      => 16,
		'widget_title_font_size_unit' => 'px',
		'widget_title_font_style'     => 'inherit',
		'widget_title_font_color'     => '#ffffff',
		'widget_text_font_family'     => 'inherit',
		'widget_text_font_size'       => 15,
		'widget_text_font_size_unit'  => 'px',
		'widget_text_font_style'      => 'inherit',
		'widget_text_font_color'      => '#4c4c4c',
		'footer_text_font_family'     => 'inherit',
		'footer_text_font_size'       => 15,
		'footer_text_font_size_unit'  => 'px',
		'footer_text_font_style'      => 'inherit',
		'footer_text_font_color'      => '#ffffff',
		'custom_css'                  => '',
	);
}
endif;

if ( ! function_exists( 'espressionista_theme_option' ) ) :
/**
 * Used to output theme options is an elegant way
 *
 * @uses get_option() To retrieve the options array
 *
 * @since Espressionista 1.0
 */
function espressionista_theme_option( $option ) {
	global $espressionista_theme_options, $espressionista_default_theme_options;
	if( ! isset( $espressionista_default_theme_options ) )
		$espressionista_default_theme_options = espressionista_default_theme_options();
	if( ! isset( $espressionista_theme_options ) )
		$espressionista_theme_options = get_option( 'espressionista_theme_options', $espressionista_default_theme_options );
	if( ! isset( $espressionista_theme_options[ $option ] ) )
		return $espressionista_default_theme_options[ $option ];
	return $espressionista_theme_options[ $option ];
}
endif;

if ( ! function_exists( 'espressionista_available_fonts' ) ) :
/**
 * Returns an array of fonts available to the theme.
 *
 * @since Espressionista 1.0
 */
function espressionista_available_fonts() {
	return array(
		'inherit' => 'Inherit',
		'helvetica' => '"Helvetica Neue", "Nimbus Sans L", sans-serif',
		'verdana' => 'Geneva, Verdana, "DejaVu Sans", sans-serif',
		'tahoma' => 'Tahoma, "DejaVu Sans", sans-serif',
		'trebuchet' => '"Trebuchet MS", "Bitstream Vera Sans", sans-serif',
		'lucida-grande' => '"Lucida Grande", "Lucida Sans Unicode", "Bitstream Vera Sans", sans-serif',
		'georgia' => 'Georgia, "URW Bookman L", serif',
		'times' => 'Times, "Times New Roman", "Century Schoolbook L", serif',
		'palatino' => 'Palatino, "Palatino Linotype", "URW Palladio L", serif',
		'italianno' => 'Italianno, "Apple Chancery", "Monotype Corsiva", serif',
		'lustria' => 'Lustria, Georgia, "URW Bookman L", serif',
		'courier' => 'Courier, "Courier New", "Nimbus Mono L", monospace',
		'monaco' => 'Monaco, Consolas, "Lucida Console", "Bitstream Vera Sans Mono", monospace',
	);
}
endif;

if ( ! function_exists( 'espressionista_doc_title' ) ) :
/**
 * Output the <title> tag
 *
 * @since Espressionista 1.0
 */
function espressionista_doc_title( $doc_title ) {
	global $page, $paged;
	$doc_title = str_replace( '&raquo;', '', $doc_title );
	if ( is_home() ) {
		$doc_title .= get_bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if( '' != $site_description )
			$doc_title .= ' &ndash; ' . $site_description;
	} elseif( is_front_page() )
		$doc_title .=  get_the_title();
	if ( $paged >= 2 || $page >= 2 )
		$doc_title .=  ', ' . __( 'Page', 'espressionista' ) . ' ' . max( $paged, $page );
	return $doc_title;
}
endif;

add_filter( 'wp_title', 'espressionista_doc_title' );

if ( ! function_exists( 'espressionista_register_styles' ) ) :
	/**
	 * Register theme styles
	 *
	 * Registers stylesheets used by the theme.
	 * Also offers integration with Google Web Fonts Directory
	 * @uses wp_register_style() To register styles
	 *
	 * @since Espressionista 1.0.
	 */
	function espressionista_register_styles() {
		wp_register_style( 'espressionista-web-font', 'http://fonts.googleapis.com/css?family=Lustria|Italianno', false, null );
		wp_register_style( 'espressionista', get_stylesheet_uri(), array( 'espressionista-web-font' ), null );
		wp_register_style( 'colorbox', get_template_directory_uri() . '/styles/colorbox.css', false, null );
		wp_deregister_style( 'wp-mediaelement' );
		wp_register_style( 'wp-mediaelement', get_template_directory_uri() . '/styles/mediaelementplayer.css', false, null );
	}
endif;

add_action( 'init', 'espressionista_register_styles' );

if ( ! function_exists( 'espressionista_enqueue_styles' ) ) :
	/**
	 * Enqueue theme styles
	 *
	 * @uses wp_enqueue_style() To enqueue styles
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_enqueue_styles() {
		wp_enqueue_style( 'espressionista' );
		wp_enqueue_style( 'colorbox' );
	}
endif;

add_action( 'wp_enqueue_scripts', 'espressionista_enqueue_styles' );

if ( ! function_exists( 'Espressionista_register_scripts' ) ) :
	/**
	 * Register theme scripts
	 *
	 * @uses wp_register_scripts() To register scripts
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_register_scripts() {
		wp_register_script( 'ios-orientationchange-fix', get_template_directory_uri() . '/scripts/ios-orientationchange-fix.js', false, null );
		wp_register_script( 'fitvids', get_template_directory_uri() . '/scripts/fitvids.js', array( 'jquery' ), null );
		wp_register_script( 'colorbox', get_template_directory_uri() . '/scripts/jquery.colorbox-min.js', array( 'jquery' ), null );
	}
endif;

add_action( 'init', 'espressionista_register_scripts' );

if ( ! function_exists( 'Espressionista_enqueue_scripts' ) ) :
	/**
	 * Enqueue theme scripts
	 *
	 * @uses wp_enqueue_scripts() To enqueue scripts
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_enqueue_scripts() {
		wp_enqueue_script( 'ios-orientationchange-fix' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'fitvids' );
		wp_enqueue_script( 'colorbox' );
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	}
endif;

add_action( 'wp_enqueue_scripts', 'espressionista_enqueue_scripts' );

if ( ! function_exists( 'espressionista_html5_shiv' ) ) :
	/**
	 * Outputs the html5.js script with IE conditionals
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_html5_shiv() { ?>
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/scripts/html5.js" type="text/javascript"></script>
		<![endif]-->
	<?php
	}
endif;

add_action( 'wp_print_scripts', 'espressionista_html5_shiv' );

if ( ! function_exists( 'espressionista_custom_styles' ) ) :
	/**
	 * Call script functions in document head
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_custom_styles() {
		echo "<style type='text/css'>\n";
		espressionista_print_css_option( '#header', 'navbar_background', 'background' );
		espressionista_print_css_option( '#site-navigation .menu ul', 'submenu_background', 'background' );
		espressionista_print_css_option( '#content', 'content_background', 'background' );
		espressionista_print_css_option( '#sidebar', 'sidebar_background', 'background' );
		espressionista_print_css_option( '#footer', 'footer_background', 'background' );
		$font_option_items = array(
			'body' => 'body',
			'site_title'   => '#site-title, #site-title a',
			'menu_item'    => '#site-navigation .menu a',
			'headlines'    => '.entry-title a',
			'bylines'      => '.entry-meta',
			'content'      => '.entry-summary, .entry-content',
			'widget_title' => '.widget .widget-title',
			'widget_text'  => '.widget',
			'footer_text'  => '#footer',
		);
		foreach( $font_option_items as $name => $selector )
			espressionista_print_font_options( $selector, $name );
		espressionista_print_css_option( '.caret', 'menu_item_font_color', 'border-top-color' );
		espressionista_print_css_option( '#site-navigation .menu a:hover', 'menu_item_hover_color', 'color' );
		espressionista_print_css_option( '#site-navigation .menu ul a', 'submenu_item_color', 'color' );
		espressionista_print_css_option( 'a', 'link_color', 'color' );
		espressionista_print_css_option( 'a:hover', 'link_hover_color', 'color' );
		espressionista_print_css_option( '.widget a', 'widget_link_color', 'color' );
		espressionista_print_css_option( '.widget a:hover', 'widget_link_hover_color', 'color' );
		espressionista_print_css_option( '#footer a', 'footer_link_color', 'color' );
		espressionista_print_css_option( '#footer a:hover', 'footer_link_hover_color', 'color' );
		espressionista_print_css_option( '#site-navigation .menu', 'navbar_background', 'background' );
		echo espressionista_theme_option( 'custom_css' );
		echo "</style>\n";
	}
endif;

add_action( 'wp_head', 'espressionista_custom_styles' );

if ( ! function_exists( 'espressionista_print_css_option' ) ) :
	/**
	 * Prints custom background option for specific selector
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_print_css_option( $selector, $name, $option, $max_width = 0 ) {
		$default_options = espressionista_default_theme_options();
		if( espressionista_theme_option( $name ) != $default_options[$name] ) {
			if( $max_width )
				echo '@media screen and (max-width: ' . intval( $max_width ) . ") {\n";
			echo $selector . " {\n";
			echo $option . ': ' . espressionista_theme_option( $name ) . ";\n";
			echo "}\n";
			if( $max_width )
				echo "}\n";
		}
	}
endif;

if ( ! function_exists( 'espressionista_print_font_options' ) ) :
	/**
	 * Prints custom font options for specific selector
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_print_font_options( $selector, $name ) {
		$default_options = espressionista_default_theme_options();
		$fonts = espressionista_available_fonts();
		if( espressionista_theme_option( $name . '_font_family' ) != $default_options[$name . '_font_family'] ||
			espressionista_theme_option( $name . '_font_size' )   != $default_options[$name . '_font_size']   ||
			espressionista_theme_option( $name . '_font_style' )  != $default_options[$name . '_font_style']  ||
			espressionista_theme_option( $name . '_font_color' )  != $default_options[$name . '_font_color'] ) : ?>
			<?php echo $selector; ?> {
				<?php if( espressionista_theme_option( $name . '_font_family' ) != $default_options[$name . '_font_family'] ) : ?>
					font-family: <?php echo $fonts[espressionista_theme_option( $name . '_font_family' )]; ?>;
				<?php endif; ?>
				<?php if( espressionista_theme_option( $name . '_font_size' ) != $default_options[$name . '_font_size'] ) : ?>
					font-size: <?php echo espressionista_theme_option( $name . '_font_size' ) . espressionista_theme_option( $name . '_font_size_unit' ); ?>;
				<?php endif; ?>
				<?php if( espressionista_theme_option( $name . '_font_style' ) != $default_options[$name . '_font_style'] ) : ?>
					<?php if( 'regular' == espressionista_theme_option( $name . '_font_style' ) ) : ?>
						font-style: normal;
						font-weight: normal;
					<?php endif; ?>
					<?php if( 'bold' == espressionista_theme_option( $name . '_font_style' ) ) : ?>
						font-style: normal;
						font-weight: bold;
					<?php endif; ?>
					<?php if( 'italic' == espressionista_theme_option( $name . '_font_style' ) ) : ?>
						font-style: italic;
						font-weight: normal;
					<?php endif; ?>
					<?php if( 'bold-italic' == espressionista_theme_option( $name . '_font_style' ) ) : ?>
						font-style: italic;
						font-weight: bold;
					<?php endif; ?>
				<?php endif; ?>
				<?php if( espressionista_theme_option( $name . '_font_color' ) != $default_options[$name . '_font_color'] ) : ?>
					color: <?php echo espressionista_theme_option( $name . '_font_color' ); ?>;
				<?php endif; ?>
			}
		<?php endif;
	}
endif;

if ( ! function_exists( 'espressionista_call_scripts' ) ) :
	/**
	 * Call script functions in document head
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_call_scripts() { ?>
	<script>
	/* <![CDATA[ */
		jQuery(document).ready(function($) {
			function espressionista_trim_nav() {
				if($('#header').get(0).offsetHeight < $('#header').get(0).scrollHeight) {
					if( ! $('#more-links').length )
						$('#site-navigation .menu').append('<li id="more-links" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#more-links">More <span class="caret"></span></a><ul class="dropdown-menu"></ul></li>');
					$('#more-links .dropdown-toggle').click(function() {
						return false;
					});
					$($('#site-navigation .menu > .menu-item').get().reverse()).each(function() {
						if($('#header').get(0).offsetHeight < $('#header').get(0).scrollHeight)
							$(this).prependTo('#more-links > .dropdown-menu');
					});
					$('#more-links .dropdown').each(function() {
						$(this).removeClass('dropdown');
						$(this).addClass('dropdown-submenu');
					})
					$('#more-links > a').css('line-height', '66px');
					$('#more-links .caret').css('margin-top', '29px');
				}
			}
			function espressionista_untrim_nav() {
				$('#more-links > .dropdown-menu').children().each(function() {
					$(this).appendTo('#site-navigation .menu');
					if($(this).hasClass('dropdown-submenu')) {
						$(this).removeClass('dropdown-submenu');
						$(this).addClass('dropdown');
					}
				})
				$('#more-links').remove();
			}
			if($(window).width() > 980)
				espressionista_trim_nav();
			$(window).resize(function() {
				if($(window).width() > 980) {
					$('#header').removeClass('header-scroll');
					espressionista_trim_nav();
				} else {
					espressionista_untrim_nav();
					$('#header').addClass('header-scroll');
				}
			});
			$(document).scroll(function() {
				if( document.body && document.body.scrollTop > 0 ) {
					$('#header').addClass('header-fixed');
					$('#wrapper').css('margin-top', 66);
				}
				if( document.body && document.body.scrollTop > 110 ) {
					$('#header').addClass('header-scroll');
				}
				if( document.body && document.body.scrollTop <= 110 ) {
					$('#header').removeClass('header-scroll');
				}
			});
			$('.entry-attachment, .entry-content').fitVids({
				customSelector: "iframe[src*='wordpress.tv'], iframe[src*='www.dailymotion.com'], iframe[src*='blip.tv'], iframe[src*='www.viddler.com']"
			});
			$('.gallery-item').hover(function() {
				var top = $(this).position().top;
				var left = $(this).position().left;
				var width = $(this).width();
				var height = $(this).height();
				var marginLeft = $(this).width() + parseInt($(this).css('marginLeft')) * 2 + parseInt($(this).css('marginRight'));
				var nexttop = $(this).next().position().top;
				var nextleft = $(this).next().position().left;
				console.log(height);
				$(this).css({
					position: 'absolute',
					top: top,
					left: left,
				});
				$(this).after('<dl class="gallery-item dummy">')
				$(this).next('.dummy').css({
					width: width,
					height: height,
				});
				$('.gallery-caption', this).css({
					padding: '10px 10px 0',
					height: 'auto',
				});
			}, function() {
				$('.gallery-caption', this).css({
					padding: 0,
					height: 0,
				});
				$(this).css({
					position: 'static',
				});
				$(this).next('.dummy').remove();
			});
		});
		jQuery(window).load(function() {
			jQuery('.entry-content a[href$=".jpg"],.entry-content a[href$=".jpeg"],.entry-content a[href$=".png"],.entry-content a[href$=".gif"],a.colorbox').colorbox({
				maxWidth: '100%',
				maxHeight: '100%',
			});
		});
	/* ]]> */
	</script>
	<?php
	}
endif;

add_action( 'wp_head', 'espressionista_call_scripts' );

if ( ! function_exists( 'espressionista_body_class' ) ) :
	/**
	 * Add custom classes to <body> tag
	 *
	 * The custom layouts are shared with the custom templates
	 * and use the same style declarations
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_body_class( $classes ) {
		if( ! is_page_template() ) {
			if( 'full-width' == espressionista_theme_option( 'layout_template' ) || ! is_active_sidebar( 1 ) )
				$classes[] = 'page-template-template-full-width-php';
			if( 'sidebar-content' == espressionista_theme_option( 'layout_template' ) )
				$classes[] = 'page-template-template-sidebar-content-php';
		}
		return $classes;
	}
endif;

add_filter( 'body_class', 'espressionista_body_class' );

if ( ! function_exists( 'espressionista_location' ) ) :
	/**
	 * Highlight current location in the archive
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_location() {
		global $pinboard_page_template;
		if ( ! ( is_home() && ! is_paged() ) && ! is_singular() || isset( $pinboard_page_template ) ) {
			if( is_author() )
				$archive = 'author';
			elseif( is_category() || is_tag() ) {
				$archive = get_queried_object()->taxonomy;
				$archive = str_replace( 'post_', '', $archive );
			} else
				$archive = ''; ?>
			<div id="location">
				<div class="wrap">
					<h1 class="page-title">
						<?php if( isset( $pinboard_page_template ) ) {
							echo the_title();
						} elseif( is_search() ) {
							__( 'Search results for', 'pinboard' ) . ': &quot;' .  get_search_query() . '&quot;';
						} elseif( is_author() ) {
							$author = get_userdata( get_query_var( 'author' ) );
							echo $author->display_name;
						} elseif ( is_year() ) {
							echo get_query_var( 'year' );
						} elseif ( is_month() ) {
							echo get_the_time( 'F Y' );
						} elseif ( is_day() ) {
							echo get_the_time( 'F j, Y' );
						} else {
							single_term_title( '' );
						}
						if( is_paged() ) {
							global $page, $paged;
							if( ! is_home() )
								echo ', ';
							echo sprintf( __( 'Page %d', 'pinboard' ), get_query_var( 'paged' ) );
						}
						?>
					</h1>
					<?php if( ( is_category() || is_tag() || is_tax() ) && '' != term_description() ) : ?>
						<div class="category-description">
							<?php echo term_description(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php
		}
	}
endif;

if ( ! function_exists( 'espressionista_content_class' ) ) :
	/**
	 * Outputs the class attribute for the content wrapper
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_content_class( $classes = array() ) {
		$classes[] = 'hfeed';
		$classes[] = 'column';
		if( ! is_active_sidebar( 1 ) || 'full-width' == espressionista_theme_option( 'layout_template' ) )
			$classes[] = 'onecol';
		else
			$classes[] = 'twothirdcol';
		echo 'class="' . esc_attr( implode( ' ', $classes ) ) . '"';
	}
endif;

if ( ! function_exists( 'espressionista_entry_meta' ) ) :
	/**
	 * Output entry-meta tag
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_entry_meta() { ?>
		<aside class="entry-meta">
			<span class="entry-author"><?php echo sprintf( __( 'Posted by <span class="entry-author-link fn">%1$s</span>', 'espressionista' ), espressionista_author_posts_link() ); ?></span>
			<span class="entry-date"><?php echo sprintf( __( 'on <a href="%1$s" rel="bookmark" title="%2$s">%3$s</a>', 'espressionista' ), get_permalink(), esc_attr( strip_tags( get_the_title() ) ), get_the_time( get_option( 'date_format' ) ) ); ?></span>
			<?php if( wp_attachment_is_image() ) : ?>
				<span class="attachment-size"><?php $metadata = wp_get_attachment_metadata(); echo sprintf( __( 'with original size of <a href="%1$s" title="Link to full-size image">%2$s &times; %3$s</a> pixels', 'espressionista' ), wp_get_attachment_url(), $metadata['width'], $metadata['height'] ); ?></span>
			<?php elseif( ! is_attachment() ) : ?>
				<span class="entry-category"><?php echo sprintf( __( 'and filed under %1$s', 'espressionista' ), get_the_category_list( ', ' ) ); ?></span>
			<?php endif; ?>
		</aside>
		<?php
	}
endif;

if ( ! function_exists( 'espressionista_author_posts_link' ) ) :
	/**
	 * Clone of WordPress' the_author_posts_link() function with the difference that it returns the output instead of printing it.
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_author_posts_link() { 
		global $authordata;
		if ( !is_object( $authordata ) )
			return false;
		$link = sprintf(
			'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
			esc_url( get_author_posts_url( $authordata->ID, $authordata->user_nicename ) ),
			esc_attr( sprintf( __( 'Posts by %s', 'espressionista' ), get_the_author() ) ),
			get_the_author()
		);
		return apply_filters( 'the_author_posts_link', $link );
	}
endif;

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );

if ( ! function_exists( 'espressionista_excerpt_microformat' ) ) :
	/**
	 * Automatically wrap the excerpt in <div> tag with "entry-summary" class
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_excerpt_microformat( $excerpt ) {
		if( '' != $excerpt )
			$excerpt = '<div class="entry-summary">' . "\n" . $excerpt . "\n" . '</div>' . "\n";
		return $excerpt;
	}
endif;

add_filter( 'the_excerpt', 'espressionista_excerpt_microformat' );

if ( ! function_exists( 'espressionista_content_more_link' ) ) :
	/**
	 * Customize the read more link
	 *
	 * Replace the default (more...) text with something more pleasing and disable the link scroll
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_content_more_link( $more_link ) {
		$more_link = str_replace( '(more...)', __( 'Keep reading &rarr;', 'espressionista' ), $more_link );
		$more_link = preg_replace( '|#more-[0-9]+|', '', $more_link );
		return $more_link;
	}
endif;

add_filter( 'the_content_more_link', 'espressionista_content_more_link' );

add_filter( 'use_default_gallery_style', '__return_false' );

if ( ! function_exists( 'espressionista_rel_attachment' ) ) :
	/**
	 * Adds rel="attachment" to URLs that link to attachments
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_rel_attachment( $link ) {
		return str_replace( "<a ", "<a rel='attachment' ", $link );
	}
endif;

add_filter( 'wp_get_attachment_link', 'espressionista_rel_attachment' );

if ( ! function_exists( 'espressionista_get_first_image' ) ) :
	/**
	 * Show the first image inserted in the current postimage
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_get_first_image() {
		$document = new DOMDocument();
		$content = apply_filters( 'the_content', get_the_content( '', true ) );
		if( '' != $content ) {
			libxml_use_internal_errors( true );
			$document->loadHTML( $content );
			libxml_clear_errors();
			$images = $document->getElementsByTagName( 'img' );
			$document = new DOMDocument();
			if( $images->length ) {
				$image= $images->item( $images->length - 1 );
				$src = $image->getAttribute( 'src' );
				$width = ( $image->hasAttribute( 'width' ) ? $image->getAttribute( 'width' ) : false );
				$height = ( $image->hasAttribute( 'height' ) ? $image->getAttribute( 'height' ) : false );
				return array( $src, $width, $height );
			}
		}
		return false;
	}
endif;

if ( ! function_exists( 'espressionista_file_types' ) ) :
	/**
	 * Allows uploading of .webm video files
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_file_types( $types ) {
		$types['video'][] = 'webm';
		return $types;
	}
endif;

add_filter( 'ext2type', 'espressionista_file_types' );

if ( ! function_exists( 'espressionista_mime_types' ) ) :
	/**
	 * Registers the webm mime type
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_mime_types( $types ) {
		$types['webm'] = 'video/webm';
		return $types;
	}
endif;

add_filter( 'upload_mimes', 'espressionista_mime_types' );

if ( ! function_exists( 'espressionista_post_video' ) ) :
	/**
	 * Video playback support for post with the video format
	 *
	 * Displays the attached video in a HTML5 <video> tag with flash fallback
	 * If more then one attached video is found, they are used as fallback to the first one
	 * Should work in most if not all browsers :)
	 *
	 * @uses get_posts() To retrieve attached videos
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_post_video() {
		if( ! post_password_required() ) {
			// Get attached videos
			$args = array(
				'numberposts' => -1,
				'post_type' => 'attachment',
				'post_mime_type' => 'video',
				'post_parent' => get_the_ID()
			);
			$attachments = get_posts( $args );
			// Reverse array to display them in chronological order instead of reverse chronological
			$attachments = array_reverse( $attachments );
			if( count( $attachments ) ) {
				// Load MediaElement.js Player and Skin
				wp_enqueue_style( 'wp-mediaelement' );
				wp_enqueue_script( 'wp-mediaelement' );
				// Detect flash video format to use it as fallback
				$mime_types = array(); ?>
				<div class="entry-media entry-attachment">
					<video controls width="700" height="444"<?php if( has_post_thumbnail() ) : ?> poster="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'video-thumb' ); echo $image[0]; ?>"<?php endif; ?> class="wp-video-shortcode" id="video-player-<?php the_ID(); ?>">
						<?php foreach( $attachments as $attachment ) :
							// Show each video file as a fallback source ?>
							<source src="<?php echo wp_get_attachment_url( $attachment->ID ); ?>" type='<?php echo $attachment->post_mime_type; if( $attachment->post_mime_type == 'video/mp4' ) echo '; codecs="avc1.42E01E, mp4a.40.2"'; elseif( $attachment->post_mime_type == 'video/webm' ) echo '; codecs="vp8, vorbis"'; elseif( $attachment->post_mime_type == 'video/ogg' ) echo '; codecs="theora, vorbis"'; ?>'>
						<?php endforeach; ?>
					</video>
				</div>
				<?php
			}
		}
	}
endif;

if ( ! function_exists( 'espressionista_post_audio' ) ) :
	/**
	 * Audio playback support for post with the audio format
	 *
	 * Displays the attached audio files in a HTML5 <audio> tag with flash fallback
	 * If more then one attached audio file is found, they are used as fallback to the first one
	 * Should work in most if not all browsers :)
	 *
	 * @uses get_posts() To retrieve attached audio files
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_post_audio() {
		if( ! post_password_required() ) {
			// Get attached audio files
			$args = array(
				'numberposts' => -1,
				'post_type' => 'attachment',
				'post_mime_type' => 'audio',
				'post_parent' => get_the_ID()
			);
			$attachments = get_posts( $args );
			// Reverse array to display them in chronological form instead of reverse chronological
			$attachments = array_reverse( $attachments );
			if( count( $attachments ) ) {
				// Load MediaElement.js Player and Skin
				wp_enqueue_style( 'wp-mediaelement' );
				wp_enqueue_script( 'wp-mediaelement' );
				// Detect MP3 file to use it as flash fallback
				$mime_types = array();
				foreach( $attachments as $attachment ) :
					if( $attachment->post_mime_type == 'audio/mpeg' )
						$flash_audio = $attachment;
				endforeach; ?>
				<div class="entry-attachment">
					<audio controls class="wp-audio-shortcode" id="audio-player-<?php the_ID(); ?>">
						<?php foreach( $attachments as $attachment ) : ?>
							<source src="<?php echo wp_get_attachment_url( $attachment->ID ); ?>">
						<?php endforeach; ?>
					</audio>
				</div>
				<?php
			}
		}
	}
endif;

if ( ! function_exists( 'espressionista_get_first_image' ) ) :
	/**
	 * Show the first image inserted in the current postimage
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_get_first_image() {
		$document = new DOMDocument();
		$content = apply_filters( 'the_content', get_the_content( '', true ) );
		if( '' != $content ) {
			libxml_use_internal_errors( true );
			$document->loadHTML( $content );
			libxml_clear_errors();
			$images = $document->getElementsByTagName( 'img' );
			$document = new DOMDocument();
			if( $images->length ) {
				$image= $images->item( $images->length - 1 );
				$src = $image->getAttribute( 'src' );
				$width = ( $image->hasAttribute( 'width' ) ? $image->getAttribute( 'width' ) : false );
				$height = ( $image->hasAttribute( 'height' ) ? $image->getAttribute( 'height' ) : false );
				return array( $src, $width, $height );
			}
		}
		return false;
	}
endif;

if ( ! function_exists( 'espressionista_get_first_caption' ) ) :
	/**
	 * Show the first captioned image inserted in the current postimage
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_get_first_caption() {
		$document = new DOMDocument();
		$content = apply_filters( 'the_content', get_the_content( '', true ) );
		if( '' != $content ) {
			libxml_use_internal_errors( true );
			$document->loadHTML( $content );
			libxml_clear_errors();
			$finder = new DomXPath($document);
			$classname = 'wp-caption';
			$images = $finder->query( "//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]" );
			for( $i = 0; $i < $images->length; $i++ ) {
				$image = $images->item($i);
				$document = new DOMDocument();
				$document->appendChild( $document->importNode( $image, true ) );
				return $document->saveHTML();
			}
		}
		return false;
	}
endif;

if ( ! function_exists( 'espressionista_post_image' ) ) :
	/**
	 * Show the last image attached to the current post
	 *
	 * Used in image post formats
	 * Images attached to image posts should not appear in the post's content
	 * to avoid duplicate display of the same content
	 *
	 * @uses get_posts() To retrieve attached image
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_post_image() {
		if( has_post_thumbnail() ) {
			$attachment = get_post( get_post_thumbnail_id() );
			?>
			<figure class="entry-media">
				<a href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); echo $image[0] ?>" title="<?php the_title_attribute(); ?>" class="colorbox" rel="attachment">
					<?php the_post_thumbnail( 'blog-thumb' ); ?>
				</a>
				<?php if( '' != $attachment->post_excerpt ) : ?>
					<figcaption class="entry-summary entry-caption">
						<?php echo $attachment->post_excerpt; ?>
					</figcaption>
				<?php endif; ?>
			</figure>
			<?php
		} else {
			// Retrieve the last image attached to the post
			$args = array(
				'numberposts' => 1,
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'post_parent' => get_the_ID()
			);
			$attachments = get_posts( $args );
			if( count( $attachments ) ) {
				$attachment = $attachments[0];
				if( isset( $attachment ) && ! post_password_required() ) :
					$image = wp_get_attachment_image_src( $attachment->ID, 'full' ); ?>
					<figure class="entry-media">
						<a href="<?php echo $image[0]; ?>" title="<?php the_title_attribute(); ?>" class="colorbox"  rel="attachment">
							<?php echo wp_get_attachment_image( $attachment->ID, 'image-thumb' ); ?>
						</a>
						<?php if( '' != $attachment->post_excerpt ) : ?>
							<figcaption class="entry-summary entry-caption">
								<?php echo $attachment->post_excerpt; ?>
							</figcaption>
						<?php endif; ?>
					</figure>
				<?php endif;
			} elseif( false !== espressionista_get_first_caption() ) {
				echo espressionista_get_first_caption();
			} elseif( false !== espressionista_get_first_image() ) {
				if( ! post_password_required() ) :
					$image = espressionista_get_first_image();
					if( false === $image[1] )
						$image[1] = 580;
					if( false === $image[2] )
						$image[2] = 360;
					$attachment = get_post( get_the_ID() ); ?>
					<figure class="entry-media">
						<a href="<?php echo $image[0]; ?>" title="<?php the_title_attribute(); ?>" class="colorbox"  rel="attachment">
							<img src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" />
						</a>
					</figure>
				<?php endif;
			} else {
				the_content();
			}
		}
	}
endif;

if ( ! function_exists( 'espressionista_post_link' ) ) :
	/**
	 * Replace post permalink with first link in post
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_post_link( $src ) {
		if( has_post_format( 'link' ) ) {
			$document = new DOMDocument();
			$content = apply_filters( 'the_content', get_the_content( '', true ) );
			if( '' != $content ) {
				libxml_use_internal_errors( true );
				$document->loadHTML( $content );
				libxml_clear_errors();
				$links = $document->getElementsByTagName( 'a' );
				for( $i = 0; $i < $links->length; $i++ ) {
					$link = $links->item($i);
					$document = new DOMDocument();
					$document->appendChild( $document->importNode( $link, true ) );
					$src = $link->getAttribute('href');
				}
			}
		}
		return $src;
	}
endif;

add_filter( 'the_permalink', 'espressionista_post_link' );

if ( ! function_exists( 'espressionista_first_blockquote' ) ) :
	/**
	 * Extract first blockquote from post
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_first_blockquote() {
		$document = new DOMDocument();
		$content = apply_filters( 'the_content', get_the_content( '', true ) );
		if( '' != $content ) {
			libxml_use_internal_errors( true );
			$document->loadHTML( $content );
			libxml_clear_errors();
			$blockquotes = $document->getElementsByTagName( 'blockquote' );
			for( $i = 0; $i < $blockquotes->length; $i++ ) {
				$blockquote = $blockquotes->item($i);
				$document = new DOMDocument();
				$document->appendChild( $document->importNode( $blockquote, true ) );
				echo $document->saveHTML();
			}
		}
	}
endif;

if ( ! function_exists( 'espressionista_posts_nav' ) ) :
	/**
	 * Display post pages navigation links
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_posts_nav() {
		global $wp_query;
		if ( $wp_query->max_num_pages > 1 ) {
			switch( 'older/newer' ) {//pinboard_get_option( 'posts_nav_labels' ) ) {
				case 'next/prev' :
					$prev_label = __( 'Previous Page', 'espressionista' );
					$next_label = __( 'Next Page', 'espressionista' );
					break;
				case 'older/newer' :
					$prev_label = __( 'Newer Posts', 'espressionista' );
					$next_label = __( 'Older Posts', 'espressionista' );
					break;
				case 'earlier/later' :
					$prev_label = __( 'Later Posts', 'espressionista' );
					$next_label = __( 'Earlier Posts', 'espressionista' );
					break;
				case 'numbered' :
					$big = 999999999; // need an unlikely integer
					$args = array(
						'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages,
						'prev_text' => '&larr; <span class="text">' . __( 'Previous Page', 'espressionista' ) . '</span>',
						'next_text' => '<span class="text">' . __( 'Next Page', 'espressionista' ) . '</span> &rarr;'
					);
					break;
			}
			if( 0 ) ://'numbered' == pinboard_get_option( 'posts_nav_labels' ) ) : ?>
				<div id="posts-nav" class="navigation">
					<?php if( function_exists( 'wp_pagenavi' ) ) : ?>
						<?php wp_pagenavi(); ?> 
					<?php else : ?>
						<?php echo paginate_links( $args ); ?>
					<?php endif; ?>
				</div>
			<?php else : ?>
				<div id="posts-nav" class="navigation">
					<div class="nav-prev"><?php previous_posts_link( '&larr; ' . $prev_label ); ?></div>
					<?php if( is_home() && ! is_paged() ) : ?>
						<div class="nav-all"><?php next_posts_link( __( 'Read all Articles', 'espressionista' ) . ' &rarr;' ); ?></div>
					<?php else : ?>
						<div class="nav-next"><?php next_posts_link( $next_label . ' &rarr;' ); ?></div>
					<?php endif; ?>
					<div class="clear"></div>
				</div>
			<?php endif;
		}
	}
endif;

if ( ! function_exists( 'espressionista_404' ) ) :
	/**
	 * Output for not found content
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_404() { ?>
		<article class="post hentry" id="post-0">
			<h1 class="entry-title"><?php _e( 'Content not found', 'espressionista' ) ?></h1>
			<div class="entry-content">
				<p><?php _e( 'The content you are looking for could not be found.', 'espressionista' ); ?></p>
				<?php if( is_active_sidebar( 2 ) ) : ?>
					<?php _e( 'Use the information below or try to seach to find what you\'re looking for:', 'espressionista' ); ?></p>
					<?php dynamic_sidebar( 2 ); ?>
				<?php endif; ?>
			</div>
		</article>
		<?php
	}
endif;

if ( ! function_exists( 'espressionista_sidebar_class' ) ) :
	/**
	 * Outputs the class attribute for the sidebar wrapper
	 *
	 * @since Espressionista 1.0
	 */
	function espressionista_sidebar_class( $classes = array() ) {
		$classes[] = 'widget-area';
		$classes[] = 'column';
		if( 'full-width' == espressionista_theme_option( 'layout_template' ) )
			$classes[] = 'onecol';
		else
			$classes[] = 'threecol';
		echo 'class="' . esc_attr( implode( ' ', $classes ) ) . '"';
	}
endif;