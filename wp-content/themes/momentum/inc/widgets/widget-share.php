<?php
/*---------------------------------------------------------------------------------*/
/* Twitter widget */
/*---------------------------------------------------------------------------------*/
class App_Share extends WP_Widget {

   function App_Share() {
	   $widget_ops = array('description' => 'Twitter Stream Widget display tweets from a any Twitter account in the sidebar of your blog. You can customise the number of updates shown in the sidebar' );
       parent::WP_Widget(false, __(tk_theme_name.' - Share', tk_theme_name),$widget_ops);
   }

   function widget($args, $instance) {
    extract( $args );
	   $title = $instance['title'];

 if(is_single()) {


                 echo $before_widget; ?>
                <?php if ($title) echo $before_title . $title . $after_title; ?>


<?php

    $slug = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $slug .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    }
    else {
        $slug .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }



 ?>

<div class="sharewidget">
    <ul>
        <li>
            <div class="sharewidget-content">
                <!-- PINTEREST -->
                <?php 
                global $post; ?>
                <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink($post->ID)?>&media=<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>" class="pin-it-button" count-layout="vertical"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
                <!-- PINTERESt-->
            </div>
        </li>

        <li>
            <div class="sharewidget-content">
                <!-- linkeding -->
                <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
                <script type="IN/Share" url="<?php echo $slug; ?>" data-counter="top"></script>
            </div>
        </li>
        <li style="margin-right: 0;">
            <div class="sharewidget-content" style="position:relative;left:-8px"><!-- google plus -->
                <g:plusone size="tall" href="<?php echo $slug; ?>"></g:plusone>


                <!-- Place this render call where appropriate -->
                <script type="text/javascript">
                    (function() {
                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                        po.src = 'https://apis.google.com/js/plusone.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                    })();
                </script>
                <!-- google plus -->
            </div>
        </li>
    </ul>

    <ul>
        <li>
            <div class="sharewidget-content">
                <!-- facebook -->
                <div class="fb-like" data-href="<?php echo $slug; ?>" data-send="false" data-layout="box_count" data-width="450" data-show-faces="true"></div>
                <!-- facebook -->
            </div>
        </li>
        <li>
            <div class="sharewidget-content"><!--Twitter-->
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $slug; ?>"  data-count="vertical">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                <!--  twitter-->
            </div>
        </li> 
        <li style="margin-right: 0!important;">
            <div class="sharewidget-content">
                <!--  stumble upon -->
                <su:badge layout="5" location="<?php echo $slug ?>"></su:badge>

                <!-- Place this snippet wherever appropriate -->
                <script type="text/javascript">
                    (function() {
                        var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
                        li.src = 'https://platform.stumbleupon.com/1/widgets.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
                    })();
                </script>
                <!--  stumble upon -->
            </div>
        </li>
    </ul>


</div>



</div>



	<?php }
   }

   function update($new_instance, $old_instance) {
       return $new_instance;
   }

   function form($instance) {

       $title = esc_attr($instance['title']);


       ?>
       <p>
	   	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',tk_theme_name); ?></label>
	       <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
       </p>


      <?php
    }


}
register_widget('App_Share');
?>