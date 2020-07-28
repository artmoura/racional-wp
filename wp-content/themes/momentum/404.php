<?php

get_header(); ?>

    <!-- CONTENT -->
    <div class="content-two left">
        <div class="wrapper">
            <div class="bg-content left">

                <div class="title-page left">
                    <div class="title-breadcrambs left">
                        <span><?php _e('404 - ERROR', tk_theme_name); ?></span>
                             <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                        </div>
                </div><!--/title-page-->

                    <div class="content-left">

                        <div class="title-404 left"><?php _e('Looks like the page you were looking for does not exist. Sorry about that.', tk_theme_name); ?></div><!--/title-404-->
                        <div class="text-404 left"><?php _e('Check the web address for typos, or go to', tk_theme_name);?><a href="<?php home_url(); ?>"><?php _e('HOME PAGE', tk_theme_name); ?></a></div><!--/text-404-->

                    </div><!--/content-left-->

                         <?php tk_get_right_sidebar('Right', 'Archive/Search/Author'); ?>

                    <div class="silver-big-fake right"></div><!--/silver-big-fake-->

            </div><!--/bg-content-->

            <div class="content-border left"></div><!--/content-border-->
        </div><!--/wrapper-->
    </div><!--/content-two-->

<?php get_footer(); ?>