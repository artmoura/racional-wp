<?php
/*

Template Name: Home

*/
get_header();
$prefix = 'tk_';
?>


    <div class="content left contenthome">
        <div class="wrapper">
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
                <?php }

                    $show_home_content= get_theme_option(tk_theme_name.'_home_use_home_content');
                        if($show_home_content == 'yes') {
                ?>
            <div class="bg-content left">

     
                    <div class="flexslider">
                        <ul class="slides">
                            <?php
                                $args=array('post_status' => 'publish', 'ignore_sticky_posts'=> 1,  'posts_per_page' => -1, 'meta_key' =>'_thumbnail_ID', 'post_type' => 'pt_slides');
                                query_posts($args);
                                //The Loop
                                if ( have_posts() ) : while ( have_posts() ) : the_post();
                                $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-image');
                                $title = the_title('','',FALSE);

                                if ($title<>substr($title,0,90)) {
                                    $dots = "...";
                                    $title=substr($title,0,90);
                                }else {
                                    $dots = "";
                                }
                            ?>
                            <li>
                                
                                <div class="slider-images "><img src=" <?php echo $img_src[0]; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></div><!--/slider-images-->
                              
                                <div class="flex-caption right"><div class="flex-caption-help"><a href="<?php echo get_permalink(); ?>"><?php echo $title.$dots; ?></a></div>
                                   <div class="flex-caption-helps" style="display:none;" ><a href="<?php echo get_permalink(); ?>"><?php _e('Ver Mais', tk_theme_name); ?></a></div>
                                </div><!--/flex-caption-->
                                 
                            </li>
                         <?php endwhile; endif; ?>


                        </ul>
                    </div><!--/flexslider-->




                <div class="shortcodes home_div">
                        <?php
                        /* Run the loop to output the page.
                                                 * If you want to overload this in a child theme then include a file
                                                 * called loop-page.php and that will be used instead.
                        */
                        wp_reset_query();
                        query_posts( 'page_id=' . get_theme_option(tk_theme_name.'_home_home_content') );
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                the_content();
                            endwhile;
                        else:
                        endif;
                        wp_reset_query();
                        ?>
                </div><!--/wrapper-->


        <?php }?>

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


                <?php if(!$recent_projects) {
                ?>

                    <div class="news-home left">

                        <div class="news-home-first left">
                            <span><?php _e('Últimos Projetos', tk_theme_name()); ?></span>
                            <p><?php if($recent_projects_text){ echo $recent_projects_text; } ?></p>
                            <a href="<?php echo get_permalink($project_id); ?>"><?php _e('Conheça Todos os Projetos', tk_theme_name()) ?></a>
                        </div><!--/news-home-first-->

                        <?php
                        $args=array('post_status' => 'publish', 'ignore_sticky_posts'=> 1,  'posts_per_page' => 3, 'post_type' => 'pt_projects');
                        $i=1;
                        //The Query
                        query_posts($args);

                        //The Loop
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $video_link = get_post_meta($post->ID, 'tk_video_link', true);
                        $attachments  = get_post_meta($post->ID, $prefix.'repeatable', true);
                        ?>

                        <div class="latest-projects-home-one delete-<?php echo $i; ?> left">
                         <?php if($video_link || !empty($attachments) || has_post_thumbnail()){?>
                                    <?php
                                        if($video_link) {
                                            tk_video_player($video_link);
                                        } elseif (has_post_thumbnail()) {?>
                                        <div class="latest-projects-images left">
                                            <a href="<?php the_permalink() ?>"><span></span></a>
                                            <?php the_post_thumbnail('latest-news', array('class' => "load-image")); ?>
                                        </div>
                                        <?php } elseif (!empty($attachments[0])) { ?>
                                         <div class="latest-projects-images left">
                                                    <a href="<?php the_permalink()?>"><span></span></a>
                                                    <img src="<?php echo tk_get_thumb_new(213, 160, $attachments[0])?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>" />
                                        </div>
                                            <?php } ?>
                                    <?php }?>                      
                            <div class="latest-projects-border-down left"></div><!--/latest-projects-border-down-->
                            <div class="latest-projects-title left"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div><!--/latest-projects-title-->
                        </div><!--/latest-projects-home-one-->

                        <?php $i++; endwhile; endif; ?>


                    </div><!--/news-home-->
                <?php }
                
                 if(!$recent_posts) { ?>
                    <div class="news-home left">

                        <div class="news-home-first left">
                            <span><?php _e('Últimas Notícias', tk_theme_name()) ?></span>
                            <p><?php if($recent_posts_text) { echo $recent_posts_text; } ?></p>
                            <a href="<?php echo get_permalink($page_id); ?>"><?php _e('Veja Todas as Notícias', tk_theme_name()) ?></a>
                        </div><!--/news-home-first-->

                        <?php
                        $args=array('post_status' => 'publish', 'ignore_sticky_posts'=> 1,  'posts_per_page' => 3, 'post_type' => 'post');
                        $i = 1;
                        //The Query
                        query_posts($args);

                        //The Loop
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $video_link = get_post_meta($post->ID, 'tk_video_link', true);
                        $attachments  = get_post_meta($post->ID, $prefix.'repeatable', true);
                        ?>

                        <div class="news-home-one delete-<?php echo $i; ?> left">
                            <div class="news-home-images left">
                         <?php if($video_link || !empty($attachments) || has_post_thumbnail()){?>
                                    <?php
                                    if ($video_link) {
                                        tk_video_player($video_link);
                                    } elseif (has_post_thumbnail()) {
                                        ?>
                                        <?php the_post_thumbnail('latest-news', array('class' => "load-image")); ?>
                                    <?php } elseif (!empty($attachments[0])) { ?>
                                        <img src="<?php echo tk_get_thumb_new(213, 160, $attachments[0]) ?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>" />                                        
                                    <?php } ?>
                                    <a href="<?php the_permalink() ?>"><span></span></a>
                                    <?php } ?>        
                            </div><!--/news-home-images-->
                            <div class="news-home-title left"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div><!--/news-home-title-->
                            <div class="news-home-text left"><?php echo the_excerpt_length(100); ?> </div><!--/news-home-text-->
                            <div class="news-home-read-more left"><a href="<?php the_permalink(); ?>"><?php _e('Ver Mais', tk_theme_name()); ?></a></div><!--/news-home-read-more-->
                            <div class="news-home-border-down left"></div><!--/news-home-border-down-->
                        </div><!--/news-home-one-->

                        <?php $i++; endwhile; endif; ?>


                    </div><!--/news-home-->
                <?php } ?>





            </div><!--/bg-content-->

            <div class="content-border left"></div><!--/content-border-->
        </div><!--/wrapper-->
    </div><!--/content-->



<?php get_footer(); ?>