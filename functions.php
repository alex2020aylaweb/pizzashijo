


<?php
function encolar_estilos() {

 $parent_style = 'parent-style'; // Estos son los estilos del tema padre recogidos por el tema hijo.

 wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
 wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css',
 array( $parent_style ),
 wp_get_theme()->get('Version')
 );
}
add_action( 'wp_enqueue_scripts', 'encolar_estilos' );


// registramos entrada personalizada tipo custom post type
add_action( 'init', 'bf_register_custom_post_type' );
/**
* Registro un custom post type 'libro'.
*
* @link http://codex.wordpress.org/Function_Reference/register_post_type
*/

function bf_register_custom_post_type() {

   /* Añado las etiquetas que aparecerán en el escritorio de WordPress */
	$labels = array(

		'name'               => _x( 'Productos', 'post type general name', 'text-domain' ),
		'singular_name'      => _x( 'Producto', 'post type singular name', 'text-domain' ),

		'menu_name'          => _x( 'Productos', 'admin menu', 'text-domain' ),

		'add_new'            => _x( 'Añadir nuevo', 'libro', 'text-domain' ),

		'add_new_item'       => __( 'Añadir nuevo Producto', 'text-domain' ),
		'new_item'           => __( 'Nuevo Producto', 'text-domain' ),
		'edit_item'          => __( 'Editar Producto', 'text-domain' ),
		'view_item'          => __( 'Ver Producto', 'text-domain' ),
		'all_items'          => __( 'Todos los Productos', 'text-domain' ),

		'search_items'       => __( 'Buscar Productos', 'text-domain' ),
		'not_found'          => __( 'No hay Productos.', 'text-domain' ),
		'not_found_in_trash' => __( 'No hay Productos en la papelera.', 'text-domain' )

	);

   /* Configuro el comportamiento y funcionalidades del nuevo custom post type */

	$args = array(

		'labels'             => $labels,

		'description'        => __( 'Descripción.', 'text-domain' ),

		'public'             => true,

		'publicly_queryable' => true,

		'show_ui'            => true,

		'show_in_menu'       => true,

		'query_var'          => true,

		'rewrite'            => array( 'slug' => 'producto' ),

		'capability_type'    => 'post',

		'has_archive'        => true,

		'hierarchical'       => false,

		'menu_position'      => null,

		'supports'           => array( 'title', 'editor', 'thumbnail' )


	);
	register_post_type( 'producto', $args );

}
// TAXONOMIA O CLASIFICACIÓN


// Lo enganchamos en la acción init y llamamos a la función create_book_taxonomies() cuando arranque
add_action( 'init', 'create_producto_taxonomies', 0 ); 
// Creamos dos taxonomías, género y autor para el custom post type "libro"
function create_producto_taxonomies() {
 /* Configuramos las etiquetas que mostraremos en el escritorio de WordPress */
 $labels = array(
   'name'             => _x( 'tipos', 'taxonomy general name' ),
   'singular_name'    => _x( 'tipo', 'taxonomy singular name' ),
   'search_items'     =>  __( 'Buscar por tipo' ),
   'all_items'        => __( 'Todos los tipos' ),
   'parent_item'      => __( 'tipo padre' ),
   'parent_item_colon'=> __( 'tipo padre:' ),
   'edit_item'        => __( 'Editar tipo' ),
   'update_item'      => __( 'Actualizar tipo' ),
   'add_new_item'     => __( 'Añadir nuevo tipo' ),
   'new_item_name'    => __( 'Nombre del nuevo tipo' ),
 );


 /* Registramos la taxonomía y la configuramos como jerárquica (al estilo de las categorías) */
 register_taxonomy( 'tipo', array( 'producto' ), array(
   'hierarchical'       => true,
   'labels'             => $labels,
   'show_ui'            => true,
   'query_var'          => true,
   'rewrite'            => array( 'slug' => 'tipo' ),
 ));


 /* Si quieres añadir la siguiente taxonomía del ejemplo, sustituye esta línea por la del código correspondiente */


}







