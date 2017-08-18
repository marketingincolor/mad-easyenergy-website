<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Dev Blank
 * @since Dev Blank 0.0
 */

get_header(); ?>
<div class="large-8 medium-12 small-12 columns">
    <div id="primary" class="site-content"><a id="primary-dd" class="show-for-medium-up"></a>
        <div id="content" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php if ( ! post_password_required() && ! is_attachment() ) :
                            the_post_thumbnail( 'full' );
                        endif; ?>

                        <?php if ( is_single() ) : ?>
                        <div class="meta">
                            <time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time(get_option('date_format')); ?></time>
                            <br>
                            <span class="sub-text">
                                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_ico_folder.png">
                                <a href="#" rel="category"><?php the_category(', '); ?></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_ico_comm.png">
                                <a href="<?php comments_link(); ?> "><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a>
                            </span>
                            <h5><a href="http://madico.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_madlogo_sm.png"></a> &nbsp; Sponsored by Madico Window Films</h5>

                            <div class="show-for-medium-down" style="margin-top:10px;">
                                <?php dd_twitter_generate('Compact','twitter_username') ?>
                                <?php dd_fblike_generate('Like Button Count') ?>
								<?php dd_fbshare_generate('Compact') ?> 
                                <?php dd_google1_generate('Compact') ?>
                                <?php dd_linkedin_generate('Compact') ?>
                            </div>

                            <span class="sub-text" style="display:inline-block; margin-top:10px;">
                                <?php do_action( 'sm_dlr_text' ); ?>
                            </span>
                        </div>
                        <h2 class="entry-title"><?php the_title(); ?></h2>

                        <?php else : ?>
                        <div class="meta">
                            <time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time(get_option('date_format')); ?></time>
                            <br>
                            <span class="sub-text">
                                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_ico_folder.png">
                                <a href="#" rel="category"><?php the_category(', '); ?></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_ico_comm.png">
                                <a href="<?php comments_link(); ?> "><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a>
                            </span>
                            <h5><a href="http://madico.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_madlogo_sm.png"></a> &nbsp; Sponsored by Madico Window Films</h5>
                            <span class="sub-text">
                                <?php do_action( 'sm_dlr_text' ); ?>
                            </span>
                        </div>
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                        <?php endif; // is_single() ?>
                        <?php if ( comments_open() ) : ?>

                        <?php endif; // comments_open() ?>
                    </header><!-- .entry-header -->

                    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-summary -->
                    <?php else : ?>
                        <div class="entry-content">
                            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'devtheme' ) ); ?>
                            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'devtheme' ), 'after' => '</div>' ) ); ?>
                        </div><!-- .entry-content -->
                    <?php endif; ?>

                    <footer class="entry-meta">


                    </footer><!-- .entry-meta -->
                </article><!-- #post -->


                <!--<nav class="nav-single">
                    <h3 class="add-icon"><?php _e( 'Related Posts', 'devtheme' ); ?></h3>
                    <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'devetheme' ) . '</span> %title' ); ?></span>
                    <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'devtheme' ) . '</span>' ); ?></span>
                </nav> .nav-single -->

                <div id="related-stories" class="clearfix">
                    <h3 class="widget-title">Related Stories</h3>
                    <?php
                    $thepost = get_the_ID();
                    $categories = get_the_category();
                    if(!empty($categories) and is_array($categories)) {
                        foreach( $categories as $category) $array_ID[] = $category->slug;
                            $cats = implode(",", $array_ID);
                    }else{
                        $cats = 'uncategorized';
                    };
                    echo do_shortcode('[display-posts columns="4" posts_per_page="4" image_size="related-thumb" orderby="comment_count" category="'.$cats.'" not_in="' . $thepost . '"]');?>
                </div>

                <?php comments_template( '', true ); ?>

            <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->
</div>
<div id="mobile-single" class="small-12 show-for-small-only columns">

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>