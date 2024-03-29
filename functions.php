<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/acf.php',                          	// Load acf functions.
	'/custom-types.php',                          // Load custom posts and taxonomies functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}


function middcreate_creations($category){
	$args = array(
		'category_name' => $category,
		'post_type' => 'example',
		'post_status' => 'publish',
		'per_page' => 3,
	);
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post();
		// Do Stuff
		$id = get_the_ID();
		$title = get_the_title();
		$link = get_permalink();
		$thumb = get_the_post_thumbnail($id, 'example', array('class'=>'example-img'));
		echo "
		<a href='{$link}'>
			<div class='example'>		
				{$thumb}
				<h3>{$title}</h3>	
			</div>
		</a>
		";
	endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata();

}

function middcreate_resource_image(){
	$id = get_the_ID();
	$thumb = get_the_post_thumbnail($id, 'example', array('class'=>'example-img'));
	return $thumb;
}

add_image_size( 'example', 500, 500, true );
