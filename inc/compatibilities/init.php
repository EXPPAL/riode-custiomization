<?php
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/**
 * Elementor Compatibilities
 */
if ( defined( 'ELEMENTOR_VERSION' ) ) {
	include RIODE_COMPATIBILITY . '/elementor/elementor-compatibility.php';
}

/**
 * Dokan Compatabilities
 */

if ( defined( 'DOKAN_PLUGIN_VERSION' ) ) {
	include RIODE_COMPATIBILITY . '/dokan/dokan-compatibility.php';
}


/**
 * Gutenberg Compatibilities
 */
require RIODE_COMPATIBILITY . '/gutenberg/gutenberg-compatibility.php';

/**
 * WPBakery Compatabilities
 *
 * @since 1.1.0
 */
if ( defined( 'WPB_VC_VERSION' ) ) {
	include RIODE_COMPATIBILITY . '/wpb/wpb-compatibility.php';
}


/**
 * WCFM Compatabilities
 */
if ( class_exists( 'WCFM' ) && class_exists( 'WCFMmp' ) ) {
	include RIODE_COMPATIBILITY . '/wcfm/wcfm-compatibility.php';
}

/**
 * YITH Compatabilities
 */
if ( defined( 'YIT_CORE_PLUGIN' ) ) {
	include RIODE_COMPATIBILITY . '/yith/yith-compatibility.php';
}


/**
 * Child Theme Compatibility
 */
add_action( 'after_switch_theme', 'riode_child_theme_reset_options', 15 );
if ( ! function_exists( 'riode_child_theme_reset_options' ) ) {
	function riode_child_theme_reset_options() {
		if ( is_child_theme() && empty( get_theme_mod( 'container' ) ) ) {
			$parent_theme_options = get_option( 'theme_mods_riode' );
			update_option( 'theme_mods_' . get_option( 'stylesheet' ), $parent_theme_options );
		}
	}
}

/**
 * Uni CPO Compatibility
 */
if ( class_exists( 'Uni_Cpo_Product' ) ) {
	include RIODE_COMPATIBILITY . '/unicpo/unicpo-compatibility.php';
}


/**
 * Rank Math SEO Compatibility
 */
if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
	include RIODE_COMPATIBILITY . '/rank_math_seo/rms-compatibility.php';
}

/**
 * WP Catptcha plugin Compatibility
 *
 * @since 1.4.3
 */
if ( class_exists( 'anr_captcha_class' ) ) {
	include RIODE_COMPATIBILITY . '/captcha/captcha-compatibility.php';
}

/**
 * Kirki Plugin Compatibility
 * 
 * @since 1.4.5
 */
if ( defined( 'KIRKI_VERSION' ) && version_compare( KIRKI_VERSION, '4.0.0', '>' ) ) {
	$typos   = array( 'typo_default', 'typo_heading', 'typo_custom1', 'typo_custom2', 'typo_custom3', 'typo_header', 'typo_menu_skin1_ancestor', 'typo_menu_skin1_content', 'typo_menu_skin1_toggle', 'typo_menu_skin2_ancestor', 'typo_menu_skin2_content', 'typo_menu_skin2_toggle', 'typo_menu_skin3_ancestor', 'typo_menu_skin3_content', 'typo_menu_skin3_toggle', 'typo_footer', 'typo_footer_title', 'typo_footer_widget', 'typo_ptb_title', 'typo_ptb_subtitle', 'typo_ptb_breadcrumb' );

	foreach( $typos as $typo ) {
		add_action( "customize_save_{$typo}", 'riode_customize_save_typography', 10, 1 ); 
	}

	/**
	 * riode_customize_save_typography
	 * 
	 * Action Handler for 'customize_save_{$typo}.
	 * 
	 * @since 1.4.5
	 * 
	 * @param WP_Customiz_Settings $settings
	 */
	if ( ! function_exists( 'riode_customize_save_typography' ) ) {
		function riode_customize_save_typography( &$setting ) {
			$id_data = $setting->id_data();
			$value   = $setting->post_value();

			if ( ! empty( $id_data['keys'] ) ) {
				$setting->type = 'none';
			}
		}
	}
}