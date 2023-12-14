<?php
/**
 * Plugin Name:       Aroplane Blocks
 * Description:       Aroplane Blocks - Gutenberg blocks smiplified!
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       essential-blocks-for-woocommerce
 *
 * @package           aroplane-blocks
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function aroplane_blocks_init() {
	register_block_type( __DIR__ . '/build/placeholder' );
}
add_action( 'init', 'aroplane_blocks_init' );

if ( is_admin() )
	add_action( 'admin_enqueue_scripts', 'register' , 5 );
else
	add_action( 'wp_enqueue_scripts', 'register', 5 );

if( ! function_exists ('register') ){
	function register(){
		wp_enqueue_style( 'tailwind', plugins_url( '', __FILE__ ) . '/build/tailwind.css', array(), true, 'all' );
	}
}


