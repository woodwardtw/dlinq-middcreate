<?php
/**
 * UnderStrap custom post types and taxonomies
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


//resource custom post type

// Register Custom Post Type resource
// Post Type Key: resource

function create_resource_cpt() {

  $labels = array(
    'name' => __( 'Resources', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Resource', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Resource', 'textdomain' ),
    'name_admin_bar' => __( 'Resource', 'textdomain' ),
    'archives' => __( 'Resource Archives', 'textdomain' ),
    'attributes' => __( 'Resource Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Resource:', 'textdomain' ),
    'all_items' => __( 'All Resources', 'textdomain' ),
    'add_new_item' => __( 'Add New Resource', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Resource', 'textdomain' ),
    'edit_item' => __( 'Edit Resource', 'textdomain' ),
    'update_item' => __( 'Update Resource', 'textdomain' ),
    'view_item' => __( 'View Resource', 'textdomain' ),
    'view_items' => __( 'View Resources', 'textdomain' ),
    'search_items' => __( 'Search Resources', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into resource', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this resource', 'textdomain' ),
    'items_list' => __( 'Resource list', 'textdomain' ),
    'items_list_navigation' => __( 'Resource list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Resource list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'resource', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'resource', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_resource_cpt', 0 );

add_action( 'init', 'create_objective_taxonomies', 0 );
function create_objective_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Objectives', 'taxonomy general name' ),
    'singular_name' => _x( 'Objective', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Objectives' ),
    'popular_items' => __( 'Popular Objectives' ),
    'all_items' => __( 'All Objectives' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Objectives' ),
    'update_item' => __( 'Update Objective' ),
    'add_new_item' => __( 'Add New Objective' ),
    'new_item_name' => __( 'New Objective' ),
    'add_or_remove_items' => __( 'Add or remove Objectives' ),
    'choose_from_most_used' => __( 'Choose from the most used Objectives' ),
    'menu_name' => __( 'Objectives' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Objectives',array('resource'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'objective' ),
    'show_in_rest'          => true,
    'rest_base'             => 'objective',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}

add_action( 'init', 'create_software_taxonomies', 0 );
function create_software_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Software', 'taxonomy general name' ),
    'singular_name' => _x( 'software', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Software' ),
    'popular_items' => __( 'Popular Software' ),
    'all_items' => __( 'All Software' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Software' ),
    'update_item' => __( 'Update software' ),
    'add_new_item' => __( 'Add New software' ),
    'new_item_name' => __( 'New software' ),
    'add_or_remove_items' => __( 'Add or remove Software' ),
    'choose_from_most_used' => __( 'Choose from the most used Software' ),
    'menu_name' => __( 'Software' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Software',array('resource'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'software' ),
    'show_in_rest'          => true,
    'rest_base'             => 'software',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}

add_action( 'init', 'create_course_taxonomies', 0 );
function create_course_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Courses', 'taxonomy general name' ),
    'singular_name' => _x( 'course', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Courses' ),
    'popular_items' => __( 'Popular Courses' ),
    'all_items' => __( 'All Courses' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Courses' ),
    'update_item' => __( 'Update course' ),
    'add_new_item' => __( 'Add New course' ),
    'new_item_name' => __( 'New course' ),
    'add_or_remove_items' => __( 'Add or remove Courses' ),
    'choose_from_most_used' => __( 'Choose from the most used Courses' ),
    'menu_name' => __( 'Courses' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Courses',array('resource'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'course' ),
    'show_in_rest'          => true,
    'rest_base'             => 'course',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}

// Register Custom Post Type people
// Post Type Key: Example
function create_example_cpt() {
$labels = array(
    'name' => __( 'Example', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Example', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Example', 'textdomain' ),
    'name_admin_bar' => __( 'Example', 'textdomain' ),
    'archives' => __( 'Example Archives', 'textdomain' ),
    'attributes' => __( 'Example Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Example:', 'textdomain' ),
    'all_items' => __( 'All Examples', 'textdomain' ),
    'add_new_item' => __( 'Add New Example', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Example', 'textdomain' ),
    'edit_item' => __( 'Edit Example', 'textdomain' ),
    'update_item' => __( 'Update Example', 'textdomain' ),
    'view_item' => __( 'View Example', 'textdomain' ),
    'view_items' => __( 'View Examples', 'textdomain' ),
    'search_items' => __( 'Search Examples', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into Example', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Example', 'textdomain' ),
    'items_list' => __( 'People list', 'textdomain' ),
    'items_list_navigation' => __( 'Example list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Example list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'Example', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-admin-users',
  );
  register_post_type( 'example', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_Example_cpt', 0 );