<?php 

/* Reviews */

function post_type_recipes() {
register_post_type(
                    'recipes', 
                    array( 'public' => true,
					 		'publicly_queryable' => true,
							'hierarchical' => false,
							'menu_icon' => get_stylesheet_directory_uri() . '/images/rev.png',
                    		'labels'=>array(
    									'name' => _x('Recipes', 'post type general name'),
    									'singular_name' => _x('Recipe', 'post type singular name'),
    									'add_new' => _x('Add New', 'recipe post'),
    									'add_new_item' => __('Add New Recipe post'),
    									'edit_item' => __('Edit Recipe post'),
    									'new_item' => __('New Recipe post'),
    									'view_item' => __('View Recipe post'),
    									'search_items' => __('Search Recipe post'),
    									'not_found' =>  __('No Recipe found'),
    									'not_found_in_trash' => __('No Recipe found in Trash'), 
    									'parent_item_colon' => ''
  										),							 
                            'show_ui' => true,
							'menu_position'=>5,
							'register_meta_box_cb' => 'mytheme_add_box',
							'taxonomies' => array('category'),
                            'supports' => array(
							 			'title',
										'thumbnail',
										'comments',
										'editor'
										)
							) 
					);
				} 
add_action('init', 'post_type_recipes');


/* Cuisine Taxonomy */

function create_cuisine_taxonomy() 
{
  $labels = array(
	  						  'name' => _x( 'Cuisine', 'taxonomy general name' ),
    						  'singular_name' => _x( 'cuisine', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Search Cuisine' ),
   							  'all_items' => __( 'All Cuisine' ),
    						  'parent_item' => __( 'Parent Cuisine' ),
   					   		  'parent_item_colon' => __( 'Parent Cuisine:' ),
   							  'edit_item' => __( 'Edit Cuisine' ), 
  							  'update_item' => __( 'Update Cuisine' ),
  							  'add_new_item' => __( 'Add New Cuisine' ),
  							  'new_item_name' => __( 'New Cuisine Name' ),
  ); 	

  register_taxonomy('cuisine',array('recipes'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'cuisine' ),
  ));

}

/* Meal Taxonomy */

function create_meal_taxonomy() 
{
  $labels = array(
	  						  'name' => _x( 'Meal', 'taxonomy general name' ),
    						  'singular_name' => _x( 'meal', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Search Meal' ),
   							  'all_items' => __( 'All Meals' ),
    						  'parent_item' => __( 'Parent Meal' ),
   					   		  'parent_item_colon' => __( 'Parent Meal:' ),
   							  'edit_item' => __( 'Edit Meal' ), 
  							  'update_item' => __( 'Update Meal' ),
  							  'add_new_item' => __( 'Add New Meal' ),
  							  'new_item_name' => __( 'New Meal Name' ),
  ); 	

  register_taxonomy('meal',array('recipes'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'meal' ),
  ));

}

/* food Taxonomy */

function create_food_taxonomy() 
{
  $labels = array(
	  						  'name' => _x( 'Food item', 'taxonomy general name' ),
    						  'singular_name' => _x( 'food item', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Search food item' ),
   							  'all_items' => __( 'All food items' ),
    						  'parent_item' => __( 'Parent food item' ),
   					   		  'parent_item_colon' => __( 'Parent food item' ),
   							  'edit_item' => __( 'Edit food item' ), 
  							  'update_item' => __( 'Update food item' ),
  							  'add_new_item' => __( 'Add food item' ),
  							  'new_item_name' => __( 'New food item' ),
  ); 	

  register_taxonomy('food',array('recipes'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'food' ),
  ));

}

add_action( 'init', 'create_cuisine_taxonomy', 0 );
add_action( 'init', 'create_meal_taxonomy', 0 );
add_action( 'init', 'create_food_taxonomy', 0 );
?>