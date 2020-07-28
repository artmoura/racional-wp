<?php
//loading wordpress functions
require( '../../../wp-load.php' );

                echo "<div class='ajax-wrapper' style='display: inline-block'><ul class='pagingx'>";
                $id = $_GET['id'];
                $id_array = explode(',', $id);
                $prefix = 'tk_';
                
                $args=array('tax_query' => array(array('taxonomy' => 'ct_projects','field' => 'term_id', 'terms' => $id_array)), 'post_type' => 'pt_projects',  'post_status' => 'publish', 'ignore_sticky_posts'=> 1,'posts_per_page'=>10000);

                //The Query
                $the_query = new WP_Query( $args );

                //The Loop
                if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
                $video_link = get_post_meta($post->ID, 'tk_video_link', true);
                $attachments  = get_post_meta($post->ID, $prefix.'repeatable', true);
                ?>

                        <div class="latest-projects-home-one left">
                            <div class="latest-projects-images left">
                                
                                <?php if($video_link || $attachments[0] != '' || has_post_thumbnail()){?>
                                    <?php
                                        if($video_link) {
                                            tk_video_player($video_link);
                                        }else{
                                            if ($attachments[0] != '') {
                                        ?>
                                                    <img src="<?php echo tk_get_thumb_new(213, 160, $attachments[0])?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>"/>
                                        <?php 
                                        }elseif(has_post_thumbnail()){ ?>
                                            <?php the_post_thumbnail('latest-news', array('class' => "load-image")); ?>
                                        <?php }?>
                                                    <a href="<?php the_permalink()?>"><span></span></a>
                                            <?php } ?>
                                    <?php }?>                       

                            </div><!--/latest-projects-images-->
                            <div class="latest-projects-border-down left"></div><!--/latest-projects-border-down-->
                            <div class="latest-projects-title left"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div><!--/latest-projects-title-->
                        </div><!--/latest-projects-home-one-->

                        <?php
                    endwhile;
                    // Reset Post Data
                    wp_reset_postdata();
                    echo "</ul></div>";
                    ?>

                <?php else: ?>
                <?php endif;?>


                      <script type="text/javascript">
                        jQuery(document).ready(function(){

    // PIRO BOX
    jQuery().piroBox({
        my_speed: 300, //animation speed
        bg_alpha: 0.5, //background opacity
        slideShow : 'true', // true == slideshow on, false == slideshow off
        slideSpeed : 3, //slideshow
        close_all : '.piro_close' // add class .piro_overlay(with comma)if you want overlay click close piroBox
    });
    




    // HOVER-IMAGES
    jQuery('.news-home-images').hover(function(){
        jQuery('a',this).attr('style', 'display: block;');
    },function(){
        jQuery('a',this).attr('style', 'display: none;');
    });

    jQuery('.latest-projects-images').hover(function(){
        jQuery('a',this).attr('style', 'display: block;');
    },function(){
        jQuery('a',this).attr('style', 'display: none;');
    });

    jQuery('.blog-one-images').hover(function(){
        jQuery('a',this).attr('style', 'display: block;');
    },function(){
        jQuery('a',this).attr('style', 'display: none;');
    });
    
                            jQuery('.pagingx').imagesLoaded(function(){
                                var test1 = jQuery('.ajax_holder').height();
                                var test2 = jQuery('.ajax-wrapper').height();
                                var calculate;
                                if ( test1 > test2 ){
                                    calculate = test1 - test2;
                                    calculate = '-='+calculate;
                                }
                                if( test2 > test1 ){
                                    calculate = test2 - test1;
                                    calculate = '+='+calculate;
                                }
                                if (test1 == test2){
                                    calculate = 0;
                                    calculate = '+='+calculate;
                                }
                                jQuery('.ajax_holder').animate({
                                    opacity:1,
                                    height: calculate
                                },1000);
                            })

                            jQuery('.speakers-img a').hover(function(){
                               jQuery('img',this).stop().animate({opacity:0.4},500);
                            },function(){
                               jQuery('img',this).stop().animate({opacity:1},300);
                            });

                        })
                        </script>
