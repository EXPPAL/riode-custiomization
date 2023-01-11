<?php
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

$theme_version = '';
$theme         = wp_get_theme();
if ( is_child_theme() ) {
	$theme = wp_get_theme( $theme->template );
}
$theme_version = $theme->version;
define( 'RIODE_VERSION', $theme_version );                           // set current version

/**
 * WordPress theme check
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1220;
}

require_once get_parent_theme_file_path() . '/inc/init.php';
