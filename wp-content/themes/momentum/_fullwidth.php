<?php
/*

Template Name: Fullwidth page

*/
get_header();
$prefix = 'tk_';
$sidebar_position = get_post_meta($post->ID, $prefix.'sidebar_position', true);

if(empty($sidebar_position)) { $sidebar_position = 'Right'; }

?>




    <!-- CONTENT -->
    <div class="content-two left">
        <div class="wrapper">
            <div class="bg-content left fullwidth">


                <div class="title-page left">
                    <div class="title-breadcrambs left">
                        <span><?php the_title(); ?></span>

                                <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

                    </div>
                </div><!--/title-page-->



                <div class="shortcodes left">

                                  <?php
                                        wp_reset_query();
                                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                                the_content();
                                            endwhile;
                                        else:
                                        endif;
                                        wp_reset_query();
                                    ?>

                </div><!-- /shortcodes-right -->



            </div><!--/bg-content-->

            <div class="content-border left"></div><!--/content-border-->
        </div><!--/wrapper-->
    </div><!--/content-two-->




















<?php get_footer(); ?>




