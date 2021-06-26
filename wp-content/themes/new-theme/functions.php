<?php
function new_theme_after_setup() {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'new-them-size', 100, 100, true ); 
}

add_action( 'after_setup_theme', 'new_theme_after_setup' );

function new_them_include_assets() {
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css',false,'1.1','all');
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', false, 1.1, true);
}

add_action( 'wp_enqueue_scripts', 'new_them_include_assets' );