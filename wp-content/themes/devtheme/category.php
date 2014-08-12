<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Dev Blank
 * @since Dev Blank 0.0
 */

get_header(); ?>
    <a id="primary-dd"></a>
    <div class="large-8 medium-12 show-for-medium-up columns">
        <div class="sponsor small-12">
            <a href="http://madico.com" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_page_headline.png">
            </a>
        </div>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" class="post post-border" role="article">
                <div class="site-content row">
                    <section class="post-head clearfix">
                        <div class="small-5 columns">
                            <a href="<?php the_permalink() ?>">
                                <?php if ( '' != get_the_post_thumbnail() ) :
                                    the_post_thumbnail( 'main-thumb' );
                                else :
                                    echo '<img class="attachment-main-thumb wp-post-image" src="'.get_template_directory_uri().'/img/ees_grfx_logo_thmb.png">';
                                endif; ?>
                            </a>
                        </div>
                        <div class="meta small-7 columns">
                            <time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time(get_option('date_format')); ?></time>
                            <br>
                            <span class="sub-text">
                                <?php if ( has_category() ) : ?>
                                    <img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_ico_folder.png">
                                    <a href="#" rel="category"><?php the_category(', '); ?></a>
                                <?php endif; ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <?php if ( have_comments() ) : ?>
                                    <img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_ico_comm.png">
                                    <a href="<?php comments_link(); ?> "><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a>
                                <?php endif; ?>
                                <br><?php edit_post_link('Admin Edit', '', ''); ?>
                            </span>

                            <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                            <span class="sub-content">
                                <?php
                                the_excerpt();
                                ?>
                                <a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_btn_readmore.png"></a>
                            </span>
                            <h5><a href="http://madico.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_madlogo_sm.png"></a> &nbsp; Sponsored by Madico Window Films</h5>
                            <span class="sub-text">
                                <?php do_action( 'sm_dlr_text' ); ?>
                            </span>
                        </div>
                    </section>
                </div>
            </article>
        <?php endwhile; ?>

            <div id="popular-stories" class="clearfix">
                <h3 class="widget-title">Popular Stories</h3>
                <?php echo do_shortcode('[display-posts columns="2" image_size="thumbnail" include_date="true" date_format="M j, Y" orderby="comment_count"]');?>
            </div>

        <?php else : ?>
            <article id="post-not-found" class="post">
                <header class="posthead">
                    <h2>Sorry, but this Energy Saving Tip seems to be missing!</h2>
                </header>

                <section class="post-content">
                    <p>We're not sure what happened to it, but it seems to be missing. Double-check the URL or try navigating back via the website menu links.</p>
                </section>
            </article>
        <?php endif; ?>
    </div>

    <!-- Start Mobile Only Body -->
    <div id="mobile-body" class="small show-for-small-only">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" class="post post-border" role="article">
                <div class="site-content row">
                    <section class="post-head clearfix">
                        <div class="small-5 columns">
                            <a href="<?php the_permalink() ?>">
                                <?php if ( '' != get_the_post_thumbnail() ) :
                                    the_post_thumbnail( 'main-thumb' );
                                else :
                                    echo '<img class="attachment-main-thumb wp-post-image" src="'.get_template_directory_uri().'/img/ees_grfx_logo_thmb.png">';
                                endif; ?>
                            </a>
                        </div>
                        <div class="meta small-7 columns">
                            <time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time(get_option('date_format')); ?></time>
                            <br>
                            <span class="sub-text">
                                <?php if ( has_category() ) : ?>
                                    <img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_ico_folder.png">
                                    <a href="#" rel="category"><?php the_category(', '); ?></a>
                                <?php endif; ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <?php if ( have_comments() ) : ?>
                                    <img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_ico_comm.png">
                                    <a href="<?php comments_link(); ?> "><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a>
                                <?php endif; ?>
                            </span>

                            <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                            <span class="sub-content">
                                <?php
                                the_excerpt();
                                ?>
                                <a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_btn_readmore.png"></a>
                            </span>
                            <h5><a href="http://madico.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_madlogo_sm.png"></a> &nbsp; Sponsored by Madico Window Films</h5>
                        </div>
                    </section>
                </div>
            </article>
        <?php endwhile; ?>

        <?php else : ?>
            <article id="post-not-found" class="post">
                <header class="posthead">
                    <h2>Sorry, but this Energy Saving Tip seems to be missing!</h2>
                </header>

                <section class="post-content">
                    <p>We're not sure what happened to it, but it seems to be missing. Double-check the URL or try navigating back via the website menu links.</p>
                </section>
            </article>
        <?php endif; ?>

    </div>
    <!-- End Mobile Only Body -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>