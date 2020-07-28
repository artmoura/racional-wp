<?php get_header();
$prefix = 'tk_';
$author = get_userdata( $post->post_author );
$post_type = get_post_type();
$video_link = get_post_meta($post->ID, 'tk_video_link', true);
$attachments  = get_post_meta($post->ID, $prefix.'repeatable', true);
$page_id = get_option('id_projects_page');
?>

    <!-- CONTENT -->
    <div class="content-two left">
        <div class="wrapper">
            <div class="bg-content left">
                
                <div class="title-page title-pages-single left">
                    <div class="title-breadcrambs left">
                        <span><?php echo get_the_title($page_id)?></span>
                        <div class="breadcrumbs-content">
                            <ul>
                             <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                            </ul>
                        </div><!--/breadcrumbs-content-->
                    </div>

                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();
                ?>              
  
                    <div class="blog-singe-nav right">
                        <a class="blog-singe-nav-prev" <?php if(!empty($prev_post)){?>href="<?php echo $prev_post->guid; ?>"<?php }else echo 'href="#" style="background-color:#cecece"'?>><?php _e('Prev', tk_theme_name); ?></a>
                        <a class="blog-singe-nav-next" <?php if(!empty($next_post)){?>href="<?php echo $next_post->guid; ?>"<?php }else echo 'href="#" style="background-color:#cecece"'?>><?php _e('Next', tk_theme_name); ?></a>
                    </div><!--/blog-singe-nav-->
                </div><!--/title-page-->
                
                    <div class="projecrs-single-content left">               
                        
                        <div class="projecrs-images left">                                
                            <div class="flexslider">
                                <ul class="slides">
                                    <?php if ($video_link || !empty($attachments) || has_post_thumbnail()) { ?>
                                        <?php
                                        if ($video_link) {
                                            tk_video_player($video_link);
                                        } elseif (has_post_thumbnail()) {
                                            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'projects-single');
                                            ?>
                                                        <!--<img src="<?php echo $img_src[0] ?>" title="<?php the_title() ?>" alt="<?php the_title() ?>" style="float:left;width: 100%"/>-->
                                            <?php
                                            tk_thumbnail($post->ID, 'projects-single');
                                        } elseif (!empty($attachments)) {
                                            foreach ($attachments as $image) {
                                                ?>
                                                <li>
                                                    <div class="slider-images left"><img src="<?php echo $image?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>"/></div>
                                                </li>
                                                       <?php } ?>
                                        <?php } ?>
                                <?php } ?>  
                                </ul>
                            </div><!--/flexslider-->
                            <div class="projecrs-slider-border left"></div>
                        </div><!--/projecrs-images-->    

                        <div class="projecrs-text-content right">     
                            <div class="projecrs-text-title left"><?php the_title()?></div><!--/projecrs-text-title-->
                            <div class="shortcodes left"><div class="projecrs-text left">
                                    <?php
                                    wp_reset_query();
                                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                                            the_content();
                                        endwhile;
                                    else:
                                    endif;
                                    wp_reset_query();
                                    ?>
                                </div><!--/projecrs-text--></div><!-- /shortcodes-right -->
                            
                        </div><!--/projecrs-text-content-->    
                    
                    </div><!--/projecrs-single-content-->
                    
                    
                
                
            </div><!--/bg-content-->
            
            <div class="content-border left"></div><!--/content-border-->
        </div><!--/wrapper-->
    </div><!--/content-two-->

<?php get_footer(); ?>