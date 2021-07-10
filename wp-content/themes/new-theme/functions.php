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

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function mytheme_custom_before_main_content() {
	echo "Custom header";
}

add_action('woocommerce_before_main_content', 'mytheme_custom_before_main_content',30);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );


function custom_title_product() {
	global $product;
	$id = $product->get_id();
	if ($id === 35) {
		echo "Sub Title";
	}
}
add_action('woocommerce_single_product_summary', 'custom_title_product', 6);

add_filter( 'woocommerce_product_tabs', 'newtheme_add_newtab', 20 , 1 );

function newtheme_add_newtab($tabs) {
	//unset($tabs['additional_information']);
	$tabs['custom_tab'] = [
		'title' => 'Custom Tab Title',
		'priority' => 25,
		'callback' => 'custom_tab_content'	
	];
	return $tabs;
}

function custom_tab_content() {
	wc_get_template( 'single-product/tabs/custom-tab.php' );
}