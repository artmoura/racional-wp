<?php
/*

Template Name: Blog

*/
get_header();
$prefix = 'tk_';
$sidebar_position = get_post_meta($post->ID, $prefix.'sidebar_position', true);
if(empty($sidebar_position)) { $sidebar_position = 'Right'; }
?>

    <!-- CONTENT -->
    <div class="content-two left">
        <div class="wrapper">
            <div class="bg-content left">

                <div class="title-page left">
                    <div class="title-breadcrambs left">
                        <span><?php the_title(); ?></span>
                             <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                        </div>
                </div><!--/title-page-->

        <div class="content-left left">

            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
                $i=1;
                $args=array('post_status' => 'publish', 'paged' => $paged, 'posts_per_page' => get_option('posts_per_page'), 'ignore_sticky_posts'=> 1);

                //The Query
                query_posts($args);

                //The Loop
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                $video_link = get_post_meta($post->ID, 'tk_video_link', true);
                $attachments  = get_post_meta($post->ID, $prefix.'repeatable', true);
                
                ?>

                 <div class="blog-one left">
                                      
                        <?php if($video_link) {?>
                          <div class="blog-one-images left">
                                <?php tk_video_player($video_link);?>
                          </div>
                                         <?php }  elseif (has_post_thumbnail()) {?>

                                    <div class="blog-one-images left">
                                         <?php 
                                         tk_thumbnail($post->ID, 'blog'); ?>
                                        <a href="<?php the_permalink(); ?>"><span></span></a>
                                    </div><!--/blog-one-images-->

                        <?php } else {  ?>

                        <div class="blog-one-slider">
                            <div class="flexslider">
                                <ul class="slides">
                                    <?php
                                       foreach($attachments as $attach) {
                                       echo '<li><a href='.get_permalink().'><img src="'.tk_get_thumb_new(625, 364, $attach).'"/></a></li>';
                                       }
                                    ?>
                                </ul>
                            </div><!-- flex slider -->
                        </div>
                        
                    <?php } ?>



                            <div class="blog-one-text-date-content left">
                                <div class="blog-one-date left">

                                <?php if($video_link) { ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/style/img/blog-images-video.png" />
                                <?php } else { if(count($attachments) > 1) {   ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/style/img/blog-images-date.png" />
                                <?php } elseif (has_post_thumbnail()) { ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/style/img/blog-images-date.png" />
                                <?php } else { ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/style/img/blog-images-none.png" />
                                <?php } } ?>

                                        
                                    <span><?php the_time('d'); ?></span>
                                    <p><?php the_time('M') ?> <?php the_time('y'); ?></p>
                                </div><!--/blog-one-date-->

                                <div class="blog-one-text-content right">
                                    <div class="blog-one-title left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!--/blog-one-title-->
                                    <div class="blog-one-text left">
                                        <?php the_excerpt();  ?>
                                    </div><!--/blog-one-text-->
                                    <div class="blog-one-comment-read-more left">
                                        <div>
                                            <span><?php comments_number(); ?></span>
                                            <p>-</p>
                                            <a href="<?php echo get_permalink(); ?>"><?php _e('Read More', tk_theme_name()); ?></a>
                                        </div>
                                    </div><!--/blog-one-comment-read-more-->
                                </div><!--/blog-one-text-content-->
                            </div><!--/blog-one-text-date-content-->
                        </div><!--/blog-one-->
                        <div class="blog-one-border-down left"></div><!--/blog-one-border-down-->
                        
            <?php endwhile; endif; ?>

                    <!--PAGINATION-->
                    <div class="pagination left">
                        <?php
                        global $wp_query;

                        $big = 999999999; // need an unlikely integer

                        $pageing =  paginate_links( array(
                                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                'format' => '?paged=%#%',
                                'current' => max( 1, get_query_var('paged') ),
                                'total' => $wp_query->max_num_pages
                        ) );
                    
                       
                        echo $pageing;
                        ?>
                    </div><!--/pagination-->


                    </div><!--/content-right-->

                    <?php tk_get_right_sidebar($sidebar_position, 'Blog Template'); ?>
             
                    <div class="silver-big-fake right"></div><!--/silver-big-fake-->

            </div><!--/bg-content-->

            <div class="content-border left"></div><!--/content-border-->
        </div><!--/wrapper-->
    </div><!--/content-two-->











<?php get_footer(); ?>




