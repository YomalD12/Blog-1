<?php

function espressionista_theme_page() {
	add_theme_page(
		__( 'Theme Options', 'espressionista' ),
		__( 'Theme Options', 'espressionista' ),
		'edit_theme_options',
		'espressionista_theme_options',
		'espressionista_theme_options_page'
	);
}

add_action( 'admin_menu', 'espressionista_theme_page' );

function espressionista_theme_scripts( $page_hook ) {
	if( 'appearance_page_espressionista_theme_options' == $page_hook ) {	
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
	}
}

add_action( 'admin_enqueue_scripts', 'espressionista_theme_scripts' );

function espressionista_theme_options_init() {
	register_setting(
		'espressionista_theme_options',
		'espressionista_theme_options',
		'espressionista_validate_theme_options'
	);

	add_settings_section(
		'background_colors', // Unique identifier for the settings section
		__( 'Background Colors', 'espressionista' ), // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'espressionista_theme_options' // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
	);
	add_settings_field(
		'navbar_background',  // Unique identifier for the field for this section
		__( 'Navbar Background', 'espressionista' ), // Setting field label
		'espressionista_color_picker', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'background_colors', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'navbar_background',
			'id'    => 'navbar_background',
			'value' => espressionista_theme_option( 'navbar_background' ),
		)
	);
	add_settings_field(
		'submenu_background',  // Unique identifier for the field for this section
		__( 'Submenu Background', 'espressionista' ), // Setting field label
		'espressionista_color_picker', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'background_colors', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'submenu_background',
			'id'    => 'submenu_background',
			'value' => espressionista_theme_option( 'submenu_background' ),
		)
	);
	add_settings_field(
		'content_background',  // Unique identifier for the field for this section
		__( 'Content Background', 'espressionista' ), // Setting field label
		'espressionista_color_picker', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'background_colors', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'content_background',
			'id'    => 'content_background',
			'value' => espressionista_theme_option( 'content_background' ),
		)
	);
	add_settings_field(
		'sidebar_background',  // Unique identifier for the field for this section
		__( 'Sidebar Background', 'espressionista' ), // Setting field label
		'espressionista_color_picker', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'background_colors', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'sidebar_background',
			'id'    => 'sidebar_background',
			'value' => espressionista_theme_option( 'sidebar_background' ),
		)
	);
	add_settings_field(
		'footer_background',  // Unique identifier for the field for this section
		__( 'Footer Background', 'espressionista' ), // Setting field label
		'espressionista_color_picker', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'background_colors', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'footer_background',
			'id'    => 'footer_background',
			'value' => espressionista_theme_option( 'footer_background' ),
		)
	);

	add_settings_section(
		'layout_template', // Unique identifier for the settings section
		__( 'Layout Template', 'espressionista' ), // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'espressionista_theme_options' // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
	);
	add_settings_field(
		'layout_template',  // Unique identifier for the field for this section
		__( 'Choose your preferred Layout Template', 'espressionista' ), // Setting field label
		'espressionista_radio_buttons', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'layout_template', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'    => 'layout_template',
			'class'   => 'layout-template',
			'buttons' => array(
				array(
					'id'    => 'content-sidebar',
					'value' => 'content-sidebar',
					'label' => 'Content / Sidebar',
				),
				array(
					'id'    => 'sidebar-content',
					'value' => 'sidebar-content',
					'label' => 'Sidebar / Content',
				),
				array(
					'id'    => 'full-width',
					'value' => 'full-width',
					'label' => 'Full Width',
				),
			),
		)
	);

	add_settings_section(
		'typography', // Unique identifier for the settings section
		__( 'Typography', 'espressionista' ), // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'espressionista_theme_options' // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
	);
	add_settings_field(
		'body_font',  // Unique identifier for the field for this section
		__( 'Body Font', 'espressionista' ), // Setting field label
		'espressionista_font_options', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'body',
			'class' => 'body',
		)
	);
	add_settings_field(
		'site_title_font',  // Unique identifier for the field for this section
		__( 'Site Title Font', 'espressionista' ), // Setting field label
		'espressionista_font_options', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'site_title',
			'class' => 'site-title',
		)
	);
	add_settings_field(
		'menu_item_font',  // Unique identifier for the field for this section
		__( 'Menu Item Font', 'espressionista' ), // Setting field label
		'espressionista_font_options', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'menu_item',
			'class' => 'menu-item',
		)
	);
	add_settings_field(
		'menu_item_hover_color',  // Unique identifier for the field for this section
		__( 'Menu Item Hover Color', 'espressionista' ), // Setting field label
		'espressionista_color_picker', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'menu_item_hover_color',
			'id'    => 'menu_item_hover_color',
			'value' => espressionista_theme_option( 'menu_item_hover_color' ),
		)
	);
	add_settings_field(
		'submenu_item_color',  // Unique identifier for the field for this section
		__( 'Submenu Item Color', 'espressionista' ), // Setting field label
		'espressionista_color_picker', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'submenu_item_color',
			'id'    => 'submenu_item_color',
			'value' => espressionista_theme_option( 'submenu_item_color' ),
		)
	);
	add_settings_field(
		'headlines_font',  // Unique identifier for the field for this section
		__( 'Headlines Font', 'espressionista' ), // Setting field label
		'espressionista_font_options', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'headlines',
			'class' => 'headlines',
		)
	);
	add_settings_field(
		'bylines_font',  // Unique identifier for the field for this section
		__( 'Bylines Font', 'espressionista' ), // Setting field label
		'espressionista_font_options', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'bylines',
			'class' => 'bylines',
		)
	);
	add_settings_field(
		'content_font',  // Unique identifier for the field for this section
		__( 'Content Font', 'espressionista' ), // Setting field label
		'espressionista_font_options', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'content',
			'class' => 'content',
		)
	);
	add_settings_field(
		'link_color',  // Unique identifier for the field for this section
		__( 'Link Color', 'espressionista' ), // Setting field label
		'espressionista_color_picker', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'link_color',
			'id'    => 'link_color',
			'value' => espressionista_theme_option( 'link_color' ),
		)
	);
	add_settings_field(
		'link_hover_color',  // Unique identifier for the field for this section
		__( 'Link Hover Color', 'espressionista' ), // Setting field label
		'espressionista_color_picker', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'link_hover_color',
			'id'    => 'link_hover_color',
			'value' => espressionista_theme_option( 'link_hover_color' ),
		)
	);
	add_settings_field(
		'widget_title_font',  // Unique identifier for the field for this section
		__( 'Widget Title Font', 'espressionista' ), // Setting field label
		'espressionista_font_options', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'widget_title',
			'class' => 'widget_title',
		)
	);
	add_settings_field(
		'widget_text_font',  // Unique identifier for the field for this section
		__( 'Widget Text Font', 'espressionista' ), // Setting field label
		'espressionista_font_options', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'widget_text',
			'class' => 'widget_text',
		)
	);
	add_settings_field(
		'widget_link_color',  // Unique identifier for the field for this section
		__( 'Widget Link Color', 'espressionista' ), // Setting field label
		'espressionista_color_picker', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'widget_link_color',
			'id'    => 'widget_link_color',
			'value' => espressionista_theme_option( 'widget_link_color' ),
		)
	);
	add_settings_field(
		'widget_link_hover_color',  // Unique identifier for the field for this section
		__( 'Widget Link Hover Color', 'espressionista' ), // Setting field label
		'espressionista_color_picker', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'widget_link_hover_color',
			'id'    => 'widget_link_hover_color',
			'value' => espressionista_theme_option( 'widget_link_hover_color' ),
		)
	);
	add_settings_field(
		'footer_text_font',  // Unique identifier for the field for this section
		__( 'Footer Text Font', 'espressionista' ), // Setting field label
		'espressionista_font_options', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'footer_text',
			'class' => 'footer_text',
		)
	);
	add_settings_field(
		'footer_link_color',  // Unique identifier for the field for this section
		__( 'Footer Link Color', 'espressionista' ), // Setting field label
		'espressionista_color_picker', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'footer_link_color',
			'id'    => 'footer_link_color',
			'value' => espressionista_theme_option( 'footer_link_color' ),
		)
	);
	add_settings_field(
		'footer_link_hover_color',  // Unique identifier for the field for this section
		__( 'Footer Link Hover Color', 'espressionista' ), // Setting field label
		'espressionista_color_picker', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'typography', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'footer_link_hover_color',
			'id'    => 'footer_link_hover_color',
			'value' => espressionista_theme_option( 'footer_link_hover_color' ),
		)
	);

	add_settings_section(
		'custom_css', // Unique identifier for the settings section
		__( 'Custom CSS', 'espressionista' ), // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'espressionista_theme_options' // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
	);
	add_settings_field(
		'custom_css',  // Unique identifier for the field for this section
		__( 'Enter your custom CSS', 'espressionista' ), // Setting field label
		'espressionista_textarea', // Function that renders the settings field
		'espressionista_theme_options', // Menu slug, used to uniquely identify the page; see twentyeleven_theme_options_add_page()
		'custom_css', // Settings section. Same as the first argument in the add_settings_section() above
		array(
			'name'  => 'custom_css',
			'class' => 'custom-css',
			'cols'  => 70,
			'rows'  => 15,
			'style' => 'width:97%;font-family:Consolas,Monaco,monospace;background:#f9f9f9',
		)
	);
}

add_action( 'admin_init', 'espressionista_theme_options_init' );

function espressionista_theme_options_page() { ?>
	<div class="wrap">
		<div id="icon-themes" class="icon32"><br /></div>
		<h2><?php _e( 'Theme Options', 'espressionista' ); ?></h2>
		<?php if ( isset( $_GET['settings-updated'] ) ) : ?>
			<div class='updated'><p><?php _e( 'Theme settings updated successfully.', 'espressionista' ); ?></p></div>
		<?php endif; ?>
		<form action="options.php" method="post">
			<?php settings_fields( 'espressionista_theme_options' ); ?>
			<?php do_settings_sections('espressionista_theme_options'); ?>
			<p>&nbsp;</p>
			<input name="espressionista_theme_options[submit]" type="submit" class="button-primary" value="<?php _e( 'Save Settings', 'espressionista' ); ?>" />
			<input name="espressionista_theme_options[reset]" type="submit" class="button-secondary" value="<?php _e( 'Reset Defaults', 'espressionista' ); ?>" />
			<script>
				jQuery(document).ready(function($) {
					$('.wp-color-picker').wpColorPicker();
				});
			</script>
		</form>
	</div>
<?php
}

function espressionista_color_picker( $args ) { ?>
	<input name="espressionista_theme_options[<?php esc_attr_e( $args['name'] ); ?>]" type="text" id="<?php esc_attr_e( $args['id'] ); ?>" class="wp-color-picker" value="<?php esc_attr_e( espressionista_theme_option( $args['name'] ) ); ?>" />
	<?php
}

function espressionista_radio_buttons( $args ) {
	foreach( $args['buttons'] as $button ) : ?>
		<label for="<?php esc_attr_e( $button['id'] ); ?>" class="<?php esc_attr_e( $args['class'] ); ?>-label" id="<?php esc_attr_e( $button['id'] ); ?>-label"><input name="espressionista_theme_options[<?php esc_attr_e( $args['name'] ); ?>]" class="<?php esc_attr_e( $args['class'] ); ?>" id="<?php esc_attr_e( $button['id'] ); ?>" value="<?php esc_attr_e( $button['value'] ); ?>" type="radio" <?php checked( $button['value'], espressionista_theme_option( $args['name'] ) ); ?> />
		<?php echo $button['label']; ?></label><?php if( $button != end( $args['buttons'] ) ): ?><br /><?php endif; ?>
		<?php
	endforeach;
}

function espressionista_font_options( $args ) { ?>
	<style>
		.font-options {
			margin: -5px 0;
			line-height: 36px;
		}
		.font-options select {
			max-width: 250px;
		}
	</style>
	<div class="font-options">
		<select name="espressionista_theme_options[<?php esc_attr_e( $args['name'] ); ?>_font_family]">
			<?php foreach( espressionista_available_fonts() as $name => $family ) : ?>
				<?php if( ! ( 'inherit' == $name && 'body' == $args['name'] ) ) : ?>
					<option value="<?php esc_attr_e( $name ); ?>" <?php selected( $name, espressionista_theme_option( $args['name'] . '_font_family' ) ); ?>><?php echo esc_html( str_replace( '"', '', $family ) ); ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
		<input name="espressionista_theme_options[<?php esc_attr_e( $args['name'] ); ?>_font_size]" type="text" class="<?php esc_attr_e( $args['class'] ); ?>" value="<?php esc_attr_e( espressionista_theme_option( $args['name'] . '_font_size' ) ); ?>" size="4" />
		<select name="espressionista_theme_options[<?php esc_attr_e( $args['name'] ); ?>_font_size_unit]">
			<?php foreach( array( 'px', 'pt', 'em', 'rem', '%' ) as $unit ) : ?>
				<?php if( ! ( 'rem' == $unit && 'body' == $args['name'] ) ) : ?>
					<option value="<?php esc_attr_e( $unit ); ?>" <?php selected( $unit, espressionista_theme_option( $args['name'] . '_font_size_unit' ) ); ?>><?php echo esc_html( $unit ); ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
		<select name="espressionista_theme_options[<?php esc_attr_e( $args['name'] ); ?>_font_style]">
			<?php foreach( array( 'inherit' ,'regular', 'bold', 'italic', 'bold-italic' ) as $style ) : ?>
				<?php if( ! ( 'inherit' == $style && 'body' == $args['name'] ) ) : ?>
					<option value="<?php esc_attr_e( $style ); ?>" <?php selected( $style, espressionista_theme_option( $args['name'] . '_font_style' ) ); ?>><?php echo esc_html( ucwords( str_replace( '-', ' ', $style ) ) ); ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
		<input name="espressionista_theme_options[<?php esc_attr_e( $args['name'] ); ?>_font_color]" type="text" class="wp-color-picker" value="<?php esc_attr_e( espressionista_theme_option( $args['name'] . '_font_color' ) ); ?>" />
	</div>
	<?php
}

function espressionista_textarea( $args ) { ?>
	<textarea name="espressionista_theme_options[<?php esc_attr_e( $args['name'] ); ?>]" cols="<?php esc_attr_e( $args['cols'] ); ?>" rows="<?php esc_attr_e( $args['rows'] ); ?>" style="<?php esc_attr_e( $args['style'] ); ?>"><?php echo esc_textarea( espressionista_theme_option( 'custom_css' ) ); ?></textarea>
<?php
}

function espressionista_validate_theme_options( $input ) {
	if( isset( $input['reset'] ) )
		return espressionista_default_theme_options();
	$layouts = array( 'content-sidebar', 'sidebar-content', 'full-width' );
	$input['layout_template']  = in_array( $input['layout_template'], $layouts ) ? $input['layout_template'] : espressionista_theme_option( 'layout_template' );
	$input = espressionista_validate_font_options( $input, array( 'body', 'site_title', 'menu_item', 'headlines', 'bylines', 'content', 'widget_title', 'widget_text', 'footer_text' ) );
	foreach( array( 'navbar_background', 'submenu_background', 'content_background', 'sidebar_background', 'footer_background', 'menu_item_hover_color', 'submenu_item_color', 'link_color', 'link_hover_color', 'widget_link_color', 'widget_link_hover_color', 'footer_link_color', 'footer_link_hover_color' ) as $name )
		$input[$name] = espressionista_validate_color_picker( $input[$name], $name );
	$input['custom_css'] = espressionista_validate_css_options( $input['custom_css'] );
	return $input;
}

function espressionista_validate_color_picker( $input, $name ) {
	$input = substr( $input, 0, 7 );
	if( '#' != $input[0] )
		$input = espressionista_theme_option( $name );
	if( ctype_xdigit( substr( $input, 1, 6 ) ) )
		return $input;
	else
		return espressionista_theme_option( $name );
}

function espressionista_validate_font_options( $input, $names ) {
	$fonts   = espressionista_available_fonts();
	$units   = array( 'px', 'pt', 'em', 'rem', '%' );
	$styles  = array( 'inherit' ,'regular', 'bold', 'italic', 'bold-italic' );
	if( ! is_array( $input ) )
		return;
	foreach( $names as $name ) {
		$input[$name . '_font_family']    = array_key_exists( $input[$name . '_font_family'], $fonts ) ? $input[$name . '_font_family'] : espressionista_theme_option( $name . '_font_family' );
		$input[$name . '_font_size']      = number_format( floatval( $input[$name . '_font_size'] ), 2, '.', '' );
		$input[$name . '_font_size_unit'] = in_array( $input[$name . '_font_size_unit'], $units ) ? $input[$name . '_font_size_unit'] : espressionista_theme_option( $name . '_font_size_unit' );
		$input[$name . '_font_style']     = in_array( $input[$name . '_font_style'], $styles ) ? $input[$name . '_font_style'] : espressionista_theme_option( $name . '_font_style' );
		$input[$name . '_font_color']     = espressionista_validate_color_picker( $input[$name . '_font_color'], $name . '_font_color' );
	}
	return $input;
}

function espressionista_validate_css_options( $input ) {
	$input = strip_tags( $input );
	$input = str_replace( 'behavior', '', $input );
	$input = str_replace( 'expression', '', $input );
	$input = str_replace( 'binding', '', $input );
	$input = str_replace( '@import', '', $input );
	return $input;
}


