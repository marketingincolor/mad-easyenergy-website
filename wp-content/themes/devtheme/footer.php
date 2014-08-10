<?php
/**
 * The Footer for Dev Theme
 * Displays all of the <footer> section and everything up till the first <div>
 * Date: 7/15/14
 * Time: 11:29 AM
 *
 */
?>

    </div>
</main><!-- end main -->

<footer id="footer" class="site-footer" role="contentinfo">
    <div class="row">

        <?php if ( has_nav_menu( 'secondary' ) ) : ?>
        <div id="nav-container-foot" class="medium-10 medium-centered columns show-for-medium-up">
            <nav role="navigation" class="bottom-bar footer-navigation">
                <?php //wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>

                <ul id="secondary-nav">
                    <li class="lead-line">Copyright &copy;<?php echo date("Y") ?> Madico, Inc.&nbsp;</li>
                    <?php
                    $defaults = array(
                        'theme_location'  => 'secondary',
                        'menu'            => '',
                        'container'       => false,
                        'container_class' => '',
                        'container_id'    => '',
                        //'menu_class'      => 'footer-nav',
                        //'menu_id'         => 'secondary',
                        'fallback_cb'     => 'wp_page_menu',
                        'items_wrap'      => '%3$s',
                        //'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0
                    );
                    wp_nav_menu( $defaults );
                    ?>
                </ul>

            </nav>
        </div>
        <?php endif; ?>

        <div id="social-container-foot" class="large-12 medium-12 columns show-for-medium-up">
            <?php do_action( 'social_icons', 'footer' ); ?>
            <br clear="all" /><br /><br />
        </div>

        <div id="mobile-footer" class="small-12 show-for-small-only columns">

        </div>

        <?php wp_footer(); ?>
    </div>
</footer><!-- end footer -->

<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.topbar.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.dropdown.js"></script>
<script>
    $(document).foundation();
</script>

</body>
</html>