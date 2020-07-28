<div class="comment-all left">

  <div class="blog-one left">
        <div class="blog-one-date left">
            <img src="<?php echo get_template_directory_uri(); ?>/style/img/comments-img30x29.png" alt="imagrs" title="images" />
        </div><!--/blog-one-date-->




    <!--COMMENTS-->
    <div class="comment-start right">
<?php
function tk_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
<!-- ONE COMMENT -->
    
<div <?php comment_class(); ?>>
                        <div class="comment-start-one right">
                        <div class="comment-start-title right">
                            <span style="margin-bottom: 5px"><?php echo $comment->comment_author ?></span>
                            <p><?php comment_date('F j Y'); ?> <?php if ($comment->comment_approved == '0') : ?><?php _e('- Your comment is awaiting moderation.', tk_theme_name) ?><?php endif; ?> <?php edit_comment_link(__(' - Edit - ', tk_theme_name),'  ','') ?> <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
                        </div><!--/comment-start-title-->                                                
                            <div class="comment-images left"> <?php echo get_avatar($comment,$size='42',$default='<path_to_url>' ); ?></div>                     
                        <div class="comment-start-text left"><?php comment_text() ?></div><!--/comment-start-text-->
                    </div><!--/comment-start-one-->

</div><!--/comment-start-one-->


<?php } ?>
<!-- COMMENTS LIST -->

        <?php
        if (get_comments_number() == '0') {?>
            <h2><?php _e('No comments so far!', tk_theme_name);?></h2>
        <?php } else {?>
                <h2><?php comments_number( '0', '1', '%' ); ?> <?php _e('Comments', tk_theme_name)?></h2>
        <?php }?>



        <?php wp_list_comments('type=comment&callback=tk_comments'); ?>
    </div>
</div><!-- blog-one -->

  
<?php if ( comments_open() ) : ?>


        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
        <div class="comment-title left"><?php _e('You must be', tk_theme_name)?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in', tk_theme_name) ?></a> <?php _e('to post a comment.', tk_theme_name) ?></div>
                <?php else : ?>


<!-- FORM CHECKING -->


<script type="text/javascript">
function checkForm(){
    var errors = 0;

    if(jQuery('#comment').val() == ''){
        jQuery('#message').html('Please insert your message');
        errors++;jQuery('#comment').focus();
    }

    if(jQuery('#comment-email').val() == ''){
        jQuery('#message').html('Please insert your email');
        errors++;jQuery('#comment-email').focus();
    }

    if(jQuery('#author').val() == ''){
        jQuery('#message').html('Please insert your name');
        errors++;jQuery('#author').focus();
    }

    if(errors == 0){
        return true;
    }else{
        return false;
    }
}
</script>

<!-- COMMENT FORM -->
<div class="blog-one-border-down left"></div>
    <div class="form left">
        <div class="title-form left"><?php _e('Leave a Comment', tk_theme_name)?></div>
            <a id="respond" name="respond"></a>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform contact-form" onSubmit="return checkForm();">
                <?php if ( !$user_ID ){?>
                    <div class="form-input left">
                        <div class="bg-input left"><input class="contact_input_text" type="text" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" name="author" id="author" value="<?php if($req) echo _e('Name (required)', tk_theme_name); ?>"/><span></span></div>
                        <div class="bg-input left"><input class="contact_input_text" type="text" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" name="email" id="comment-email" value="<?php if($req) echo _e('E-mail (required)', tk_theme_name); ?>"/><span></span></div>
                    </div>
                <?php }?>
                    <div class="form-textarea"><textarea onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" name="comment" id="comment" ></textarea></div><!--/form-textarea-->
                    <div id="message"></div>

                    <div class="form-button left">
                        <input class="search-submit-button"  type="submit" name="submit-comment" value="<?php _e('Send', tk_theme_name)?>" />
                    </div>

                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
            </form>
    </div>

        <?php endif; ?>

<?php else : ?>

<div class="comment-title left"><?php _e('Comments are closed', tk_theme_name)?></div>

<?php endif; ?>


</div><!--/comment-all-->
