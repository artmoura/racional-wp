<?php wp_footer();?>




    <!-- FOOTER -->
    <div class="footer left">
        <div class="wrapper">

            <div class="footer-others left">
            <?php
                $logo = get_theme_option(tk_theme_name.'_general_footer_logo');
              
                if(empty($logo)) {
                    $logo = get_template_directory_uri()."/style/img/footer-logo.png";
                 }
                 
                $copyright = get_theme_option(tk_theme_name.'_general_footer_copy');
                if(empty($copyright)) {
                    $copyright = "Copyright Information Goes Here © 2012. All Rights Reserved.";
                 }
                ?>

                <div class="footer-first-box left">
                    <a href="<?php bloginfo('homeurl') ?>"><img src="<?php echo $logo; ?>"   alt='<?php bloginfo('name') ?>' title="<?php bloginfo('name') ?>"/></a>
                    <span><?php echo $copyright; ?></span>
                </div><!--footer-first-box-->

                
                 <!--TEXT WIDGET-->
                <div class="footer_box delete-1">
                    <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 1')) : ?>
                    <?php endif; ?>
                </div><!--footer_box-->


                <!--TWITTER WIDGET-->
                <div class="footer_box delete-2">
                    <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 2')) : ?>
                    <?php endif; ?>
                </div><!--footer_box-->


                <!--CATEGORIES-->
                <div class="footer_box delete-3" style="margin-right: 0;">
                    <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 3')) : ?>
                    <?php endif; ?>
                </div><!--footer_box-->

                <div class="footer-first-box-help left">
                    <a href="<?php home_url(); ?>"><img src="<?php echo $logo; ?>" /></a>
                    <span><?php echo $copyright; ?></span>
                </div><!--footer-first-box-help-->

            </div><!--/footer-others-->

        </div><!--/wrapper-->
    </div><!--/footer-->



</div><!--/container-->

</body>
</html>