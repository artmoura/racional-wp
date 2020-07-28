<?php get_header();
$prefix = 'tk_';


?>

<style>
    .video-holder{height: 160px!important}
    .video-holder iframe{height: 160px!important;width: 100%!important}
</style>
           <?php

                            $enable_slider = get_theme_option(tk_theme_name.'_home_show_sliders');
                            $enable_slider_caption = get_theme_option(tk_theme_name.'_home_show_slider_caption');
                            if(!$enable_slider_caption) { ?>
                                <style>
                                    .flex-direction-nav {
                                        display:none !important;
                                    }
                                </style>
                         <?php  } ?>



    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">
            <div class="bg-content left">

     
                  <?php
                    if($enable_slider) { ?>
                    <div class="flexslider">
                        <ul class="slides">
                            <?php
                                $args=array('post_status' => 'publish', 'ignore_sticky_posts'=> 1,  'posts_per_page' => 100, 'meta_key' =>'_thumbnail_ID', 'post_type' => 'pt_slides');
                                query_posts($args);
                                //The Loop
                                if ( have_posts() ) : while ( have_posts() ) : the_post();
                                $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-image');
                                $title = the_title('','',FALSE);

                                if ($title<>substr($title,0,85)) {
                                    $dots = "...";
                                    $title=substr($title,0,100);
                                }else {
                                    $dots = "";
                                }
                            ?>
                            <li>
                                
                                <div class="slider-images left"><img src=" <?php echo $img_src[0]; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></div><!--/slider-images-->
                              
                                <?php if($enable_slider_caption) { ?><div class="flex-caption right"><div class="flex-caption-help"><a href="<?php echo get_permalink(); ?>"><?php echo $title.$dots; ?></a></div>
                                    <div class="flex-caption-helps" style="display:none;" ><a href="<?php echo get_permalink(); ?>"><?php _e('Read More', tk_theme_name); ?></a></div>
                                </div><!--/flex-caption--><?php } ?>
                                 
                            </li>
                         <?php endwhile; endif; ?>


                        </ul>
                    </div><!--/flexslider-->
                <?php } ?>

                <?php
                $calltoaction_title = get_theme_option(tk_theme_name.'_home_call_to_action_heading');
                $calltoaction_link = get_theme_option(tk_theme_name.'_home_call_to_action_link');
                $calltoaction_description = get_theme_option(tk_theme_name.'_home_call_to_action_description');
                $calltoaction_button = get_theme_option(tk_theme_name.'_home_call_to_action_button');
                $calltoaction_button_link = get_theme_option(tk_theme_name.'_home_call_to_action_button_link');
                ?>

                
                <?php if($calltoaction_title || $calltoaction_description) { 
                    if(empty($calltoaction_button)) {$fullwidth = 'fullwidth';}
                    ?>

                <div class="call-action left">


                    <div class="call-action-text left <?php echo $fullwidth; ?>">
                        <?php if(!empty($calltoaction_title)) { ?><a href="<?php echo $calltoaction_link; ?>"><?php echo $calltoaction_title; ?></a><?php } ?>
                        <?php if(($calltoaction_description)) { ?><p><?php echo $calltoaction_description; ?></p> <?php } ?>
                    </div><!--/call-action-text-->
                 <?php if($calltoaction_button) { ?>   <div class="call-action-button right"><a href="<?php echo $calltoaction_link; ?>"><?php echo $calltoaction_button;?></a></div><!--/call-action-button--><?php } ?>
                </div><!--/call-action-->
                <?php } ?>

                <div class="shortcodes home_div">
                        <?php
                        wp_reset_query();
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                the_content();
                            endwhile;
                        else:
                        endif;
                        wp_reset_query();
                    ?>
                </div>


                <?php
                    $recent_posts = get_theme_option(tk_theme_name().'_home_recent_posts');
                    $recent_projects = get_theme_option(tk_theme_name().'_home_recent_projects');
                    $recent_posts_text = get_theme_option(tk_theme_name().'_home_recent_posts_text');
                    $recent_projects_text = get_theme_option(tk_theme_name().'_home_recent_projects_text');

                    $blog_name = get_option('title_blog_page');
                    $page_id = get_page_by_title($blog_name);
                    $page_id = $page_id->ID;
                    
                    $projects_name = get_option('title_projects_page');
                    $project_id = get_page_by_title($projects_name);
                    $project_id = $project_id->ID;


                ?>


                <?php if($recent_posts) { ?>
                    <div class="news-home left">

                        <div class="news-home-first left">
                            <span><?php _e('Latest News', tk_theme_name()) ?></span>
                            <p><?php if($recent_posts_text) { echo $recent_posts_text; } ?></p>
                            <a href="<?php echo get_permalink($page_id); ?>"><?php _e('View All', tk_theme_name()) ?></a>
                        </div><!--/news-home-first-->

                        <?php
                        $args=array('post_status' => 'publish', 'ignore_sticky_posts'=> 1,  'posts_per_page' => 3, 'post_type' => 'post');
                        $i = 1;
                        //The Query
                        query_posts($args);

                        //The Loop
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $video_link = get_post_meta($post->ID, 'tk_video_link', true);
                            $video_args = array(
                                    'order' => 'ASC',
                                    'orderby' => 'menu_order',
                                    'post_type' => 'attachment',
                                    'post_parent' => $post->ID,
                                    'post_mime_type' => 'image',
                                    'post_status' => null,
                                    'numberposts' => -1,
                            );
                            $attachments = get_posts($video_args);
                        ?>

                        <div class="news-home-one delete-<?php echo $i; ?> left">
                            <div class="news-home-images left">
                         <?php if($video_link || !empty($attachments) || has_post_thumbnail()){?>
                                    <?php
                                        if($video_link) {
                                            tk_video_player($video_link);
                                        }else{
                                        if(count($attachments) > 1){
                                            if (!empty($attachments)) {
                                        ?>
                                            <?php
                                                    $image_url_thumb = wp_get_attachment_image_src($attachments[0]->ID, 'latest-news');
                                                    ?>
                                                    <img src="<?php echo $image_url_thumb[0]; ?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>" />
                                        <?php }}
                                            elseif(has_post_thumbnail()){ ?>
                                            <?php the_post_thumbnail('latest-news', array('class' => "load-image")); ?>
                                        <?php }?>
                                                    <a href="<?php the_permalink()?>"><span></span></a>
                                            <?php } ?>
                                    <?php }?>        
                            </div><!--/news-home-images-->
                            <div class="news-home-title left"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div><!--/news-home-title-->
                            <div class="news-home-text left"><?php echo the_excerpt_length(20); ?></div><!--/news-home-text-->
                            <div class="news-home-read-more left"><a href="<?php the_permalink(); ?>"><?php _e('Read More', tk_theme_name()); ?></a></div><!--/news-home-read-more-->
                            <div class="news-home-border-down left"></div><!--/news-home-border-down-->
                        </div><!--/news-home-one-->

                        <?php $i++; endwhile; endif; ?>


                    </div><!--/news-home-->
                <?php }
                
                 if($recent_projects) {
                ?>

                    <div class="news-home left">

                        <div class="news-home-first left">
                            <span><?php _e('Latest Projects', tk_theme_name()); ?></span>
                            <p><?php if($recent_projects_text){ echo $recent_projects_text; } ?></p>
                            <a href="<?php echo get_permalink($project_id); ?>"><?php _e('View All', tk_theme_name()) ?></a>
                        </div><!--/news-home-first-->

                        <?php
                        $args=array('post_status' => 'publish', 'ignore_sticky_posts'=> 1,  'posts_per_page' => 3, 'post_type' => 'pt_projects');
                        $i=1;
                        //The Query
                        query_posts($args);

                        //The Loop
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                        $video_link = get_post_meta($post->ID, 'tk_video_link', true);
                            $video_args = array(
                                    'order' => 'ASC',
                                    'orderby' => 'menu_order',
                                    'post_type' => 'attachment',
                                    'post_parent' => $post->ID,
                                    'post_mime_type' => 'image',
                                    'post_status' => null,
                                    'numberposts' => -1,
                            );
                            $attachments = get_posts($video_args);
                        ?>

                        <div class="latest-projects-home-one delete-<?php echo $i; ?> left">
                         <?php if($video_link || !empty($attachments) || has_post_thumbnail()){?>
                                    <?php
                                        if($video_link) {
                                            tk_video_player($video_link);
                                        }else{
                                        if(count($attachments) > 1){
                                            if (!empty($attachments)) {
                                        ?>
                                        <?php
                                            $image_url_thumb = wp_get_attachment_image_src($attachments[0]->ID, 'latest-news');
                                            ?>
                                         <div class="latest-projects-images left">
                                                    <img src="<?php echo $image_url_thumb[0]; ?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>" />
                                        <?php }}
                                            elseif(has_post_thumbnail()){ ?>
                                            <div class="latest-projects-images left"><?php the_post_thumbnail('latest-news', array('class' => "load-image")); ?>
                                        <?php }?>                                        
                                            <a href="<?php the_permalink()?>"><span></span></a>
                                            <?php if(has_post_thumbnail()) { ?></div><?php } ?> <?php if(count($attachments) > 1){ ?> </div> <?php } ?>
                                            <?php } ?>
                                    <?php }?>                      

                            <div class="latest-projects-border-down left"></div><!--/latest-projects-border-down-->
                            <div class="latest-projects-title left"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div><!--/latest-projects-title-->
                        </div><!--/latest-projects-home-one-->

                        <?php $i++; endwhile; endif; ?>


                    </div><!--/news-home-->
                <?php } ?>





            </div><!--/bg-content-->

            <div class="content-border left"></div><!--/content-border-->
        </div><!--/wrapper-->
    </div><!--/content-->





            
<?php get_footer(); ?>