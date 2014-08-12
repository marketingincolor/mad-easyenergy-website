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
<div class="large-8 small-12 columns">
    <div id="primary" class="site-content"><a id="primary-dd"></a>
        <div id="content" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="sponsor small-12">
                        <a href="http://madico.com" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_page_headline.png">
                        </a>
                    </div>
                    <header class="entry-header">
                        <?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                        <h2 class="entry-title"><?php the_title(); ?></h2>
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'devtheme' ), 'after' => '</div>' ) ); ?>
                    </div><!-- .entry-content -->
                    <footer class="entry-meta">
                        <?php edit_post_link( __( 'Edit', 'devtheme' ), '<span class="edit-link">', '</span>' ); ?>
                    </footer><!-- .entry-meta -->
                </article><!-- #post -->

                <?php //comments_template( '', true ); ?>
            <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>