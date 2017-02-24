<?php
/**
 * Development Theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 */
if ( ! function_exists( 'devtheme_setup' ) ) :
/**
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 */
    function devtheme_setup() {
        // Add RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );
        // Enable support for Post Thumbnails, and declare two sizes.
        add_theme_support( 'post-thumbnails' );
        //set_post_thumbnail_size( 280, 270 );
        add_image_size( 'main-thumb', 280, 270, true );
        add_image_size( 'related-thumb', 180, 124, true );
        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary'   =>  'Header menu',
            'secondary' => 'Footer menu'
        ) );
        //Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );
        //Enable support for Post Formats. See http://codex.wordpress.org/Post_Formats
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
        ) );
        //Creating custom theme settings
        require get_template_directory() . '/includes/custom-settings.php';
    }
endif;

add_action( 'after_setup_theme', 'devtheme_setup' );

require get_template_directory() . '/includes/foundation-wp-navwalker.php';

//Initialize and Register sidebars for theme
function devtheme_widgets_init() {
    register_sidebar(array(
        'name' => __( 'Main Sidebar', 'devtheme' ),
        'id' => 'sidebar-1',
        'description' => __( 'Main sidebar content for site', 'devtheme' ),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => __('Secondary Sidebar', 'devtheme' ),
        'id' => 'sidebar-2',
        'description' => __( 'Alternate sidebar content for site', 'devtheme' ),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => __( 'Footer Area', 'devtheme' ),
        'id' => 'sidebar-3',
        'description' => __( 'Footer area content for site', 'devtheme' ),
        'before_widget' => '<li class="widget">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => __( 'Video Sidebar', 'devtheme' ),
        'id' => 'sidebar-4',
        'description' => __( 'Special video content for site', 'devtheme' ),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}
add_action( 'widgets_init', 'devtheme_widgets_init' );

// Enqueue scripts and functions specific for theme
function devtheme_scripts () {
    wp_enqueue_script( 'devtheme-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20140319', true );
}
add_action( 'wp_enqueue_scripts', 'devtheme_scripts' );

//Create custom display for Social Media icons as grouped set.
function display_social_media_icons( $pagelocation ){
    $custom_option = get_option('custom_option_name');
    $stringfix = ($pagelocation == 'header' ? '&nbsp' : '<br />');
    echo '<div class="social-icons">';
    echo '<h5>Follow Madico Window Films&nbsp;' . $stringfix ;
    echo '<a href="'.$custom_option['fb_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_ico_sm_fb.png"></a>&nbsp;';
    echo '<a href="'.$custom_option['tw_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_ico_sm_tw.png"></a>&nbsp;';
    echo '<a href="'.$custom_option['gp_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_ico_sm_gp.png"></a>&nbsp;';
    echo '<a href="'.$custom_option['li_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_ico_sm_li.png"></a>';
    echo '</h5></div>';
}
add_action( 'social_icons', 'display_social_media_icons', 10, 1 );

//Create custom display for Display area links
function display_area_dealer_links() {
    //echo 'Find <a href="http://www.madico.com/window-film/distribution/" target="_blank">Madico</a>,'
    //.' <a href="http://sun-gard.com/where-to-buy" target="_blank">Sun-Gard</a>,'
    //.' and <a href="http://sunscapefilms.com/dealer-listings" target="_blank">Sunscape Window Film</a>'
    //.' dealers in your area.';
    echo 'Find a Madico dealer <a href="http://dealerdirectory.madico.com" target="_blank">in your area</a>.';
}
add_action( 'sm_dlr_text', 'display_area_dealer_links', 10 );

//Create custom display for Mobile Adverts.
function display_mobile_advert_insert( $pagelocation ){

    if ($pagelocation == '1') {
        echo '<div id="mobile-adv" class="mob-adv">'
            .'<h6><img src="'. get_template_directory_uri(). '/img/ees_grfx_logo_wtiny.png"> Find Madico Window Film Dealers</h6>'
            .'<a class="a-mob-adv" href="http://www.madico.com/window-film/distribution/" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_mob_btn_mad.png"></a>'
            .'<a class="a-mob-adv" href="http://sun-gard.com/where-to-buy" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_mob_btn_sgd.png"></a>'
            .'<a class="a-mob-adv" href="http://sunscapefilms.com/dealer-listings" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_mob_btn_ssp.png"></a>'
        .'</div>';
    }
    elseif ($pagelocation == '2') {
        echo '<div id="mobile-adv" class="mob-adv">'
            .'<h6><img src="'. get_template_directory_uri(). '/img/ees_grfx_logo_wtiny.png"> Find Madico Window Film Dealers</h6>'
            .'<a class="a-mob-adv" href="http://www.madico.com/window-film/distribution/" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_mob_btn_mad.png"></a>'
            .'<a class="a-mob-adv" href="http://sun-gard.com/where-to-buy" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_mob_btn_sgd.png"></a>'
            .'<a class="a-mob-adv" href="http://sunscapefilms.com/dealer-listings" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_mob_btn_ssp.png"></a>'
            .'</div>';
    }
}
add_action( 'mobile_advert_insert', 'display_mobile_advert_insert', 10, 1 );

// Alter length of the Excerpt.
function custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Alter the more of the Excerpt.
function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Enable Shortcodes in Widgets
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');



/*function be_display_posts_classes( $output, $atts, $image, $title, $date, $excerpt, $inner_wrapper ) {
    $classes = 'listing-item';
// Counter
    global $dps_counter;
    $classes .= ' dps-list-item-' . $dps_counter;
    $dps_counter++;
// Current Page
    global $dps_current_page;
    if( $dps_current_page == get_permalink() )
        $classes .= ' current';

// Now let's rebuild the output.
    $output = '<' . $inner_wrapper . ' class="' . $classes . '">' . $image . $title . $date . $excerpt . '</' . $inner_wrapper . '>';

// Finally we'll return the modified output
    return $output;
}
add_filter( 'display_posts_shortcode_output', 'be_display_posts_classes', 10, 7 );

function be_display_posts_counter_start( $args ) {
    global $dps_counter, $dps_current_page, $post;
    $dps_counter = 0;
    $dps_current_page = get_permalink( $post->ID );
    //echo $dps_current_page;
    return $args;
}
add_filter( 'display_posts_shortcode_args', 'be_display_posts_counter_start' );*/


// Add Column Classes to Display Posts Shortcodes
// @author Bill Erickson
// @link http://www.billerickson.net/code/add-column-classes-to-display-posts-shortcode
function be_display_post_class( $classes, $post, $listing, $atts ) {
    if( !isset( $atts['columns'] ) )
        return $classes;
    $columns = array( '', '', 'one-half', 'one-third', 'one-fourth', 'one-fifth', 'one-sixth' );
    $classes[] = $columns[$atts['columns']];
    if( 0 == $listing->current_post || 0 == $listing->current_post % $atts['columns'] )
        $classes[] = 'first';
    return $classes;
}
add_filter( 'display_posts_shortcode_post_class', 'be_display_post_class', 10, 4 );
function be_display_posts_shortcode_exclude_posts( $args, $atts ) {
    if( isset( $atts['not_in'] ) ) {
        $posts = explode( ',', $atts['not_in'] );
        $args['post__not_in'] = $posts;
    }
    return $args;
}
add_filter( 'display_posts_shortcode_args', 'be_display_posts_shortcode_exclude_posts', 10, 2 );
