<?php
/**
 * The Header for Dev Theme
 * Displays all of the <head> content and <header> section and main site <nav>
 * Date: 7/15/14
 * Time: 11:29 AM
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name'); ?> </title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oswald' type='text/css'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato' type='text/css'>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/foundation.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class($class); ?>>

<header id="masthead" class="site-header" role="banner">
    <div class="bgnd">
        <div class="row">
            <div id="site-title" class="large-6 medium-6  show-for-medium-up columns">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/ees_hdr_grfx_logo.png"></a>
            </div>
            <div id="social-container" class="large-6 medium-6 columns show-for-medium-up">
                <?php do_action( 'social_icons', 'header' ); ?>
                <!--<a href="#" id="find-a-dealer" class="button tiny secondary radius dropdown custom-dropdown" data-dropdown="find-drop">Find A Madico Window Film Dealer</a>
                <ul id="find-drop" class="content small f-dropdown" data-dropdown-content>
                    <li><a href="http://www.madico.com/window-film/distribution/" target="_blank">Madico Window Films</a></li>
                    <li><a href="http://www.sun-gard.com/where-to-buy" target="_blank">Sun-Gard Window Films</a></li>
                    <li><a href="http://www.sunscapefilms.com/dealer-listings" target="_blank">Sunscape Window Films</a></li>
                </ul>-->
            </div>

            <!-- Start Mobile Only Header -->
            <script type="text/javascript">
                jQuery(function($){
                    $( '.menu-btn' ).click(function(){
                        $('.responsive-menu').addClass('expand')
                        $('.menu-btn').addClass('btn-none')
                    })

                    $( '.close-btn' ).click(function(){
                        $('.responsive-menu').removeClass('expand')
                        $('.menu-btn').removeClass('btn-none')
                    })
                })
            </script>
            <div id="mobile-header" class="small-12 show-for-small-only columns">
                <a><img id="nav-hb" class="menu-btn" src="<?php echo get_template_directory_uri(); ?>/img/ees_hdr_grfx_hbr_blue.png"></a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img id="mobile-logo" src="<?php echo get_template_directory_uri(); ?>/img/ees_hdr_grfx_logo.png"></a>
            </div>
            <div id="mobile-menu" class="phone-menu responsive-menu">
                <div class="phone-menu-top">
                    <a><img id="nav-alt-hb" class="close-btn" src="<?php echo get_template_directory_uri(); ?>/img/ees_hdr_grfx_hbr_white.png"></a>
                    <?php $custom_option = get_option('custom_option_name');
                    echo '<div style="margin-left:90px;">';
                    echo '<a href="'.$custom_option['fb_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_ico_smw_fb.png"></a>&nbsp;';
                    echo '<a href="'.$custom_option['tw_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_ico_smw_tw.png"></a>&nbsp;';
                    echo '<a href="'.$custom_option['gp_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_ico_smw_gp.png"></a>&nbsp;';
                    echo '<a href="'.$custom_option['li_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/ees_grfx_ico_smw_li.png"></a>';
                    echo '</div>'; ?>
                </div>
                <div class="phone-menu-main">
                    <h5><img src="<?php echo get_template_directory_uri() ?>/img/ees_grfx_logo_wtiny.png"> Categories</h5>
                    <?php
                    $defaults = array(
                        'theme_location'  => 'primary',
                        'menu'            => 'main-menu',
                        'container'       => false,
                        'fallback_cb'     => 'wp_page_menu',
                        'items_wrap'      => '<ul>%3$s</ul>',
                        'depth'           => 3
                    );
                    wp_nav_menu( $defaults );
                    ?>
                    <h5><img src="<?php echo get_template_directory_uri() ?>/img/ees_grfx_logo_wtiny.png"> Site Sponsor</h5>
                    <ul>
                        <li><a href="http://madico.com" target="_blank">About Madico Window Film</a></li>
                    </ul>
                    <h5><img src="<?php echo get_template_directory_uri() ?>/img/ees_grfx_logo_wtiny.png"> Find Madico Window Film Dealers</h5>
                    <ul>
                        <li><a href="http://www.madico.com/window-film/distribution/" target="_blank">Madico Window Films</a></li>
                        <li><a href="http://www.sun-gard.com/where-to-buy" target="_blank">Sun-Gard Window Films</a></li>
                        <li><a href="http://www.sunscapefilms.com/dealer-listings" target="_blank">Sunscape Window Films</a></li>
                    </ul>

                    <ul>
                        <li>Copyright &copy;<?php echo date("Y") ?> Madico, Inc.&nbsp;</li>
                        <li><a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Mobile Only Header -->

        </div>
    </div>
</header>

<div id="nav-container-row" class="contain-to-grid show-for-medium-up">
    <div id="nav-container-head" class="small-12 columns">
        <nav class="top-bar" data-topbar>
            <ul class="title-area">
                <li class="name"><!-- leave empty --></li>
                <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
            </ul>
            <section class="top-bar-section">
                <?php
                $defaults = array(
                    'theme_location'  => 'primary',
                    'menu'            => 'main-menu',
                    'container'       => false,
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'mcl',
                    'menu_id'         => 'mid',
                    'fallback_cb'     => 'wp_page_menu',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 3,
                    'walker'          => new foundation_walker_nav_menu
                );
                wp_nav_menu( $defaults );
                ?>
            </section>
        </nav>
    </div>
</div>

<main role="main"><!-- start main -->
    <div class="row"><span class="show-for-medium-up"></span>