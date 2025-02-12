<?php
/**
 * Plugin Name: Query Has Results
 * Description: Contains the block elements used to render content when query results are found.
 * Version: 0.1.0
 * Author: HAMWORKS
 * License: GPL-2.0+
 * GitHub Plugin URI: https://github.com/hamworks/query-has-results
 * Release Asset: true
 *
 * @package query-has-results
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ブロックを登録
 */
function register_block_hamworks_query_has_results() {
	register_block_type(
		__DIR__ . '/build',
		array(
			'render_callback' => 'render_query_has_results_block',
		)
	);
}
add_action( 'init', 'register_block_hamworks_query_has_results' );

/**
 * Renders the `hamworks/query-has-results` block on the server.
 *
 * @since 0.1.0
 *
 * @param array    $attributes Block attributes.
 * @param string   $content    Block default content.
 * @param WP_Block $block      Block instance.
 *
 * @return string Returns the wrapper for the no results block.
 */
function render_query_has_results_block( $attributes, $content, $block ) {
	if ( empty( trim( $content ) ) ) {
		return '';
	}

	$page_key = isset( $block->context['queryId'] ) ? 'query-' . $block->context['queryId'] . '-page' : 'query-page';
    // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- This is a read-only operation, no data is being changed.
	$page = empty( $_GET[ $page_key ] ) ? 1 : (int) $_GET[ $page_key ];

	// Override the custom query with the global query if needed.
	$use_global_query = ( isset( $block->context['query']['inherit'] ) && $block->context['query']['inherit'] );
	if ( $use_global_query ) {
		global $wp_query;
		$query = $wp_query;
	} else {
		$query_args = build_query_vars_from_query_block( $block, $page );
		$query      = new WP_Query( $query_args );
	}

	if ( 0 === $query->post_count ) {
		return '';
	}

	return $content;
}
