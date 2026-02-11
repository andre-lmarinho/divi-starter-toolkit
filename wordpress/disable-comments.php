<?php
/**
 * Disable WordPress comments across the site.
 *
 * Purpose: Removes comment interfaces in the admin and front end so brochure-style sites stay focused on
 * primary content without moderation overhead.
 * Usage context: Load via a child theme, mu-plugin, or Code Snippets plugin when comments are unnecessary.
 * Author: André Marinho — andremarinho.me
 *
 * @package DST_Disable_Comments
 */

defined( 'ABSPATH' ) || exit;

add_action( 'admin_init', function () {
	global $pagenow;

	if ( 'edit-comments.php' === $pagenow ) {
		wp_safe_redirect( admin_url() );
		exit;
	}

	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

	foreach ( get_post_types() as $post_type ) {
		if ( post_type_supports( $post_type, 'comments' ) ) {
			remove_post_type_support( $post_type, 'comments' );
			remove_post_type_support( $post_type, 'trackbacks' );
		}
	}
} );

add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

add_action( 'admin_menu', function () {
	remove_menu_page( 'edit-comments.php' );
} );

add_action( 'init', function () {
	if ( is_admin_bar_showing() ) {
		remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
	}
} );
