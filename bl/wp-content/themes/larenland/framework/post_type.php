<?php

//Portfolio

add_action( 'init', 'codex_portfolio_init' );
/**
 * Register a portfolio post type.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_portfolio_init() {
	global $textdomain;
	
	$labels = array(
		'name'               => __( 'Portfolios', 'post type general name', $textdomain ),
		'singular_name'      => __( 'Portfolio', 'post type singular name', $textdomain ),
		'menu_name'          => __( 'Portfolios', 'admin menu', $textdomain ),
		'name_admin_bar'     => __( 'Portfolio', 'Agregar nuevo on admin bar', $textdomain ),
		'add_new'            => __( 'Agregar nuevo', 'portfolio', $textdomain ),
		'add_new_item'       => __( 'Agregar nueva obra', $textdomain ),
		'new_item'           => __( 'New Portfolio', $textdomain ),
		'edit_item'          => __( 'Edit Portfolio', $textdomain ),
		'view_item'          => __( 'View Portfolio', $textdomain ),
		'all_items'          => __( 'All Portfolios', $textdomain ),
		'search_items'       => __( 'Search Portfolios', $textdomain ),
		'parent_item_colon'  => __( 'Parent Portfolios:', $textdomain ),
		'not_found'          => __( 'No portfolios found.', $textdomain ),
		'not_found_in_trash' => __( 'No portfolios found in Trash.', $textdomain ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'menu_icon' 		 => 'dashicons-portfolio',
		'publicly_queryable' => true,
		'menu_position' 	 => 2,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail')
	);

	register_post_type( 'portfolio', $args );
}

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_portfolio_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_portfolio_taxonomies() {
	global $textdomain;
	// Agregar nuevo taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => __( 'Categorias', $textdomain ),
		'singular_name'     => __( 'Categoría', $textdomain ),
		'search_items'      => __( 'Buscar categorias',$textdomain ),
		'all_items'         => __( 'Totas las Categorias',$textdomain ),
		'parent_item'       => __( 'Lugar',$textdomain ),
		'parent_item_colon' => __( 'Lugar:',$textdomain ),
		'edit_item'         => __( 'Editar catagoría',$textdomain ),
		'update_item'       => __( 'Actualizar categoría',$textdomain ),
		'add_new_item'      => __( 'Agregar nueva categoría',$textdomain ),
		'new_item_name'     => __( 'Nuevo nombre de Categoría',$textdomain ),
		'menu_name'         => __( 'Portfolio Category' ,$textdomain),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio_category' ),
	);

	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );


}

?>