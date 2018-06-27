<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Dev Blank
 * @since Dev Blank 0.0
 */

 $args = array(
    'screen_reader_text' => ' ',
    'mid_size' => 2,
    'prev_text' => __( 'Previous', 'textdomain' ),
    'next_text' => __( 'Next', 'textdomain' )
); 

get_header(); ?>
    <a id="primary-dd"></a>
        <div class="large-8 medium-12 show-for-medium-up columns">
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
                            <!--<h5><a href="http://madico.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_madlogo_sm.png"></a> &nbsp; Sponsored by Madico Window Films</h5>
                            <span class="sub-text">
                                <?php //do_action( 'sm_dlr_text' ); ?>
                            </span>-->
						</div>
                    </section>
                    </div>
                </article>
            <?php endwhile; ?>

                <div id="popular-stories" class="clearfix">
                    <!--<h3 class="widget-title">Popular Stories</h3>-->
                    <?php //echo do_shortcode('[display-posts columns="2" image_size="thumbnail" include_date="true" date_format="M j, Y" orderby="comment_count"]');?>
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

        <?php the_posts_pagination( $args ); ?>

        </div>

        <!-- Start Mobile Only Body -->
        <div id="mobile-main" class="small show-for-small-only">
            <?php echo do_shortcode('[display-posts image_size="main-thumb" columns="3" orderby="date" posts_per_page="3" wrapper="div"]');?>
        </div>
        <div id="mobile-body" class="small show-for-small-only">
            <?php do_action( 'mobile_advert_insert', '1' ); ?>
            <?php echo do_shortcode('[display-posts image_size="thumbnail" orderby="comment_count" posts_per_page="4"]');?>
            <?php do_action( 'mobile_advert_insert', '2' ); ?>
            <?php echo do_shortcode('[display-posts image_size="thumbnail" orderby="date" offset="3"]');?>
        </div>
        <!-- End Mobile Only Body -->

<?php get_sidebar();?>
<?php get_footer();
