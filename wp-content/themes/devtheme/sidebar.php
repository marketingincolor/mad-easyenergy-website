<?php
/**
 * The Sidebar for Dev Theme
 * Displays all of the sidebar <div> section on the right side
 * includes Foundation Classes for layout
 * Date: 7/15/14
 * Time: 11:29 AM
 *
 */
?>
<div class="large-4 medium-12 show-for-medium-up columns">
    <div id="sidebar" role="secondary">
        <div id="sidebar-search"><!--Start Search Component-->
            <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                <input type="text" class="search-field rounded" placeholder="" value="" name="s" title="Search for:" />
                <input type="submit" class="search-submit rounded" value="Search" />
            </form>
        </div><!--End Search Component-->
        <div id="post-tabs"><!--Start Post Dual Box-->
            <ul class="tabs" data-tab>
                <li class="tab-title active"><a href="#panel2-1">Popular Posts</a></li>
                <li class="tab-title"><a href="#panel2-2">Recent Posts</a></li>
            </ul>
            <div class="tabs-content">
                <div class="content active" id="panel2-1">
                    <p>
                        <?php echo do_shortcode('[display-posts image_size="thumbnail" include_date="true" date_format="M j, Y" orderby="comment_count" order="DESC" posts_per_page="8"]');?>
                    </p>
                </div>
                <div class="content" id="panel2-2">
                    <p>
                        <?php echo do_shortcode('[display-posts image_size="thumbnail" include_date="true" date_format="M j, Y" orderby="date" posts_per_page="8"]');?>
                    </p>
                </div>
            </div>
        </div><!--End Post Dual Box-->

        <?php if ( is_active_sidebar( 'sidebar-1' ) /*&& ! is_single()*/ ) : ?>
            <div id="primary-sidebar-one" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div><!-- #primary-sidebar-1 -->
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'sidebar-4' ) /*&& ! is_single()*/ ) : ?>
            <div id="primary-sidebar-four" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-4' ); ?>
            </div><!-- #primary-sidebar-4 -->
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'sidebar-2' ) /*&& is_single()*/  ) : ?>
            <div id="primary-sidebar-two" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
            </div><!-- #primary-sidebar-2 -->
        <?php endif; ?>

        <br />
        <!--Start Dropdowns-->

        <dl class="accordion" data-accordion>
            <dd class="accordion-navigation">
                <a href="#arch1a" class="trigger">Archives</a>
                <div id="arch1a" class="content">
                    <?php wp_get_archives(); ?>
                </div>
            </dd>
            <dd>&nbsp;</dd>
            <dd class="accordion-navigation">
                <a href="#arch2a" class="trigger">Categories</a>
                <div id="arch2a" class="content">
                    <?php wp_list_categories('title_li='); ?>
                </div>
            </dd>
        </dl>       <!--End Dropdowns-->

        <!--Start Archive Dropdown-->
        <!--<a href="#" class="button tiny secondary radius dropdown custom-dropdown" data-dropdown="drop-arc">Archives</a>
        <ul id="drop-arc" class="content small f-dropdown" data-dropdown-content>
            <?php //wp_get_archives(); ?>
        </ul>-->       <!--End Archive Dropdown-->


        <!--Start Category Dropdown-->
        <!--<a href="#" class="button tiny secondary radius dropdown custom-dropdown" data-dropdown="drop-cat">Categories</a>
        <ul id="drop-cat" class="content small f-dropdown" data-dropdown-content>
            <?php //wp_list_categories('title_li='); ?>
        </ul>-->        <!--End Category Dropdown-->
        <br />

    </div>
</div>
<div id="mobile-video" class="small show-for-small-only">
    <?php if ( is_active_sidebar( 'sidebar-4' ) /*&& ! is_single()*/ ) : ?>
        <div id="primary-sidebar-four" class="primary-sidebar widget-area" role="complementary">
            <?php dynamic_sidebar( 'sidebar-4' ); ?>
        </div><!-- #primary-sidebar-1 -->
    <?php endif; ?>
</div>