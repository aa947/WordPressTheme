<?php  
function learningWordpressResourses() {
    wp_enqueue_style('style', get_stylesheet_uri());
} 

add_action('wp_enqueue_scripts', 'learningWordpressResourses');


//Navigation Menus 
register_nav_menus(array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu'),
));

//get_top_ancestor_id
function get_top_ancestor_id(){
    global $post;
    if($post->post_parent){
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }

    return $post->ID;
}


//Does oage has children 
function has_children(){
    global $post;
    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);
} 

//customize exerpt word length
function custom_excerpt_length(){
    return 25;
}

//add_filter('excerpt_length', 'custom_excerpt_length')

//add ffeautered image support
 function new_setup1() {
     add_theme_support( 'post-thumbnails' );
     add_image_size('small-thumbnail', 180, 120, true );
     add_image_size('banner-image', 920, 210, array('left', 'top'));
    
     
    }


 add_action( 'after_setup_theme', 'new_setup1' );

// function new_setup2(){
//     //Add post Format Support
//      add_theme_support('post-format', array('aside', 'gallery', 'link'));
// }


// add_action('after_setup_theme', 'new_setup2' );
// add_post_type_support( 'post', 'post-formats' );


add_action( 'after_setup_theme', 'wpsites_child_theme_posts_formats', 11 );
function wpsites_child_theme_posts_formats(){
 add_theme_support( 'post-formats', array(
    'aside',
    'audio',
    'chat',
    'gallery',
    'image',
    'link',
    'quote',
    'status',
    'video',
    ) );
}

// if ( function_exists( 'add_theme_support' ) ) {
//     add_theme_support( 'post-thumbnails' );

//     /**
//      * Add default posts and comments RSS feed links to head
//     */
//     add_theme_support( 'automatic-feed-links' );

//     /**
//      * Enable support for Post Thumbnails on posts and pages
//      *
//      * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
//     */
//     add_theme_support( 'post-thumbnails' );

//     /**
//      * Enable support for Post Formats
//     */
//     add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

//     /**
//      * Setup the WordPress core custom background feature.
//     */
//     add_theme_support( 'custom-background', apply_filters( '_tk_custom_background_args', array(
//         'default-color' => 'ffffff',
//         'default-image' => '',
//     ) ) );

// }


//add Our Widgets
function ourWidgetsInit(){
  
  register_sidebar( array(
    'name' => 'Sidebar',
    'id' => 'sidebar1',
    'before-widget' => '<div class="widget-item">',
    'after-widget' => '</div>'
  ));

  register_sidebar( array(
    'name' => 'Footer Area 1',
    'id' => 'footer1'
  ));

  register_sidebar( array(
    'name' => 'Footer Area 2',
    'id' => 'footer2'
  ));

  register_sidebar( array(
    'name' => 'Footer Area 3',
    'id' => 'footer3'
  ));

  register_sidebar( array(
    'name' => 'Footer Area 4',
    'id' => 'footer4'
  ));
}

add_action('widgets_init','ourWidgetsInit');




add_filter('excerpt_length', 'custom_excerpt_length')






?>