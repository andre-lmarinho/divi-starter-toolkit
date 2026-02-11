<?php
/**
 * Disable the Divi Projects post type.
 *
 * Purpose: Removes the legacy Divi Projects content type when sites rely on standard posts or custom post types
 * registered elsewhere, preventing unused admin screens from surfacing.
 * Usage context: Load via a child theme, mu-plugin, or Code Snippets plugin before editors start managing content.
 * Author: André Marinho — andremarinho.me
 *
 * @package DST_Disable_Divi_Projects
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'disable_divi_projects_post_type', 50 );

function disable_divi_projects_post_type() {
	if ( ! function_exists( 'unregister_post_type' ) ) {
		return;
	}

	if ( post_type_exists( 'project' ) ) {
		unregister_post_type( 'project' );
	}

	$taxonomies = [ 'project_category', 'project_tag' ];

	foreach ( $taxonomies as $taxonomy ) {
		if ( taxonomy_exists( $taxonomy ) ) {
			unregister_taxonomy( $taxonomy );
		}
	}
}
