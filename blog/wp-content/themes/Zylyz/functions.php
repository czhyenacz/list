<?php

include 'lib/theme_options.php';
include 'lib/guide.php';
include 'lib/post-types.php';
include 'lib/metabox.php'; 

/* SIDEBARS */
if ( function_exists('register_sidebar') )

	register_sidebar(array(
	'name' => 'Sidebar',
    'before_widget' => '<li class="sidebox %2$s">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="sidetitl ">',
    'after_title' => '</h3>',
	
    ));

	register_sidebar(array(
	'name' => 'Footer',
    'before_widget' => '<li class="botwid">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="bothead">',
    'after_title' => '</h3>',
    ));		
	
	
	
	
/* CUSTOM MENUS */	

register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
	) );

function fallbackmenu(){ ?>
			<div id="submenu">
				<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
			</div>
<?php }	

/* ADD RECIPES TO RSS FEED */



/* CUSTOM EXCERPTS */
	
	
function wpe_excerptlength_slide($length) {
    return 15;
}
function wpe_excerptlength_recipe($length) {
    return 35;
}
function wpe_excerptlength_index($length) {
    return 50;
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

function new_excerpt_more($more) {
return '<a class="rmore" href="'. get_permalink($post->ID) . '">' . '&nbsp;&nbsp; Read More ...' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/* SHORT TITLES */

function short_title($after = '', $length) {
   $mytitle = explode(' ', get_the_title(), $length);
   if (count($mytitle)>=$length) {
       array_pop($mytitle);
       $mytitle = implode(" ",$mytitle). $after;
   } else {
       $mytitle = implode(" ",$mytitle);
   }
       return $mytitle;
}


/* FEATURED THUMBNAILS */

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );


}

/* GET THUMBNAIL URL */


function get_image_url(){
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'large');
	$image_url = $image_url[0];
	echo $image_url;
	}
	
/* PAGE NAVIGATION */


function getpagenavi(){
?>
<div id="navigation">
<?php if(function_exists('wp_pagenavi')) : ?>
<?php wp_pagenavi() ?>
<?php else : ?>
        <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','arclite')) ?></div>
        <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','arclite')) ?></div>
        <div class="clear"></div>
<?php endif; ?>

</div>

<?php
}


function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("mce", $file_dir."/lib/mce.css", false, "1.0", "all");
}
add_action('admin_init', 'mytheme_add_init');


/* Adding a Taxonomy Filter to Admin List for a Custom Post Type*/

add_action( 'restrict_manage_posts', 'my_restrict_manage_posts' );
function my_restrict_manage_posts() {
 
    // only display these taxonomy filters on desired custom post_type listings
    global $typenow;
    if ($typenow == 'recipes') {
 
        // create an array of taxonomy slugs you want to filter by - if you want to retrieve all taxonomies, could use get_taxonomies() to build the list
        $filters = array('cuisine', 'meal','food');
 
        foreach ($filters as $tax_slug) {
            // retrieve the taxonomy object
            $tax_obj = get_taxonomy($tax_slug);
            $tax_name = $tax_obj->labels->name;
 
            // output html for taxonomy dropdown filter
            echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
            echo "<option value=''>Show All $tax_name</option>";
            generate_taxonomy_options($tax_slug,0,0);
            echo "</select>";
        }
    }
}
 
function generate_taxonomy_options($tax_slug, $parent = '', $level = 0) {
    $args = array('show_empty' => 1);
    if(!is_null($parent)) {
        $args = array('parent' => $parent);
    }
    $terms = get_terms($tax_slug,$args);
    $tab='';
    for($i=0;$i<$level;$i++){
        $tab.='--';
    }
    foreach ($terms as $term) {
        // output each select option line, check against the last $_GET to show the current option selected
        echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' .$tab. $term->name .' (' . $term->count .')</option>';
        generate_taxonomy_options($tax_slug, $term->term_id, $level+1);
    }
 
}



?>