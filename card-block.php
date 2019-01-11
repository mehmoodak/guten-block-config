<?php
/**
 * Plugin Name: Card Block
 *
 * @package Card Block
 * @author Mehmood Ahmad Khan <https://mehmoodahmad.me>
 */

/**
 * Registering scripts in gutenberg editor and on front end
 */
function my_register_gutenberg_card_block() {
	// Register our block script with WordPress.
	wp_register_script(
		'gutenberg-card-block',
		plugins_url( '/blocks/dist/blocks.build.js', __FILE__ ),
		array( 'wp-blocks', 'wp-element' ),
		'11012019',
		true
	);

	// Register our block's base CSS.
	wp_register_style(
		'gutenberg-card-block-style',
		plugins_url( '/blocks/dist/blocks.style.build.css', __FILE__ ),
		array( 'wp-blocks' ),
		'11012019',
		true
	);

	// Register our block's editor-specific CSS.
	wp_register_style(
		'gutenberg-card-block-edit-style',
		plugins_url( '/blocks/dist/blocks.editor.build.css', __FILE__ ),
		array( 'wp-edit-blocks' ),
		'11012019',
		true
	);

	// Enqueue the script in the editor.
	register_block_type(
		'card-block/main',
		array(
			'editor_script' => 'gutenberg-card-block',
			'editor_style'  => 'gutenberg-card-block-edit-style',
			'style'         => 'gutenberg-card-block-style',
		)
	);
}

add_action( 'init', 'my_register_gutenberg_card_block' );
