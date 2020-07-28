<?php
/*

Template Name: Projects

*/
get_header();
?>
<style>
    .video-holder{height: 160px!important}
    .video-holder iframe{height: 160px!important;width: 100%!important}
</style>
    <!-- CONTENT -->
    <div class="content-two left">
        <div class="wrapper">
            <div class="bg-content left">
                
                <div class="title-page left">
                    <div class="title-breadcrambs left">
                        <span><?php the_title()?></span>
                        <div class="breadcrumbs-content">
                            <ul>
                             <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                            </ul>
                        </div><!--/breadcrumbs-content-->
                    </div>
                </div><!--/title-page-->
                

                <div class="shortcodes left">

                        <?php
                          global $wpdb;
                          $post_type_ids = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE post_type = 'pt_projects' AND post_status = 'publish'");
                          if(!empty ($post_type_ids )){
                            $post_type_cats = wp_get_object_terms( $post_type_ids, 'ct_projects',array('fields' => 'ids') );
                            if($post_type_cats){
                              $post_type_cats = array_unique($post_type_cats);
                              $allcat = implode(',',$post_type_cats);
                            }
                          }
                          $include_category = null;
                        ?>

                    <div class="projects-filter left">
                            <ul>
                                <li><span style="margin-top: 4px"><?php _e('Filter :', tk_theme_name)?></span></li>
                                <li class="paragraphp cat_cell cat_cell_active" rev="<?php echo $allcat?>"><a href="#"><?php _e('All', tk_theme_name)?></a></li>

                              <?php
                            if(!empty ($post_type_ids )){
                                 foreach ($post_type_cats as $category_list) {
                                    $cat = 	$category_list.",";
                                    $include_category = $include_category.$cat;
                                    $cat_name = get_term($category_list, 'ct_projects');
                                ?>
                                    <li rev="<?php echo $category_list?>" class="cat_cell"><a href="#"><?php echo $cat_name->name?></a></li>
                                <?php } }?>
                            </ul>
                        </div><!--/projects-filter-->
                
                        <div class="projects-content left">
                            <div class="projects-row left">
                            
                                <script type="text/javascript">
                                    jQuery(document).ready(function(){
                                        jQuery('.cat_cell_active').click();
                                    });
                                </script>
                            
                                <script type="text/javascript">
                                    jQuery('.cat_cell').live('click',
                                    function () {
                                        var id = jQuery(this).attr('rev');
                                        jQuery('.cat_cell').removeClass('cat_cell_active');
                                        jQuery(this).addClass('cat_cell_active');
                                        jQuery('.ajax_holder').animate({opacity:0},500,function(){
                                            jQuery('.portfolio-loader').show().animate({opacity:0},0).animate({opacity:1},500,function(){
                                                var randomnumber=Math.floor(Math.random()*100000000);
                                                var postAjaxURL = "<?php echo get_template_directory_uri() ?>/_projectsajax.php?id="+id;
                                        
                                                jQuery('.ajax_holder').load(postAjaxURL, {rand: randomnumber},function(){
                                                    jQuery('.portfolio-loader').animate({opacity:0},500).hide();
                                                });
                                            });
                                        })
                                        return false;
                                    });
                                </script>
                            
                                <div class="portfolio-loader"><img src="<?php echo get_template_directory_uri()?>/style/img/ajax.gif" /></div>
                                    
                                <div class="ajax_holder left"></div><!--AJAX Holder-->
                                    
                            </div><!--/wrapper-->
                        </div><!--/wrapper-->
            
                </div><!-- /shortcodes -->
                
            </div><!--/bg-content-->
            
            <div class="content-border left"></div><!--/content-border-->
        </div><!--/wrapper-->
    </div><!--/content-two-->

<?php get_footer(); ?>



