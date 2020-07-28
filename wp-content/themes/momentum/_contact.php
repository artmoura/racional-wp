<?php
/*

Template Name: Contact

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


                    <!--SIDBAR-->

                    <div class="content-left <?php echo $float; ?>">


                        <div class="blog-one left">

                            <div class="blog-one-text-date-content left">                               
                                <div class="blog-one-text shortcodes left">
                                   <?php
                                        wp_reset_query();
                                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                                the_content();
                                            endwhile;
                                        else:
                                        endif;
                                        wp_reset_query();
                                    ?>
                                </div><!--/blog-one-text-->
                            </div><!--/blog-one-text-date-content-->

   <?php
                $subject_error_msg = get_option(tk_theme_name.'_contact_subject_error_message');
                $name_error_msg = get_option(tk_theme_name.'_contact_name_error_message');
                $email_error_msg = get_option(tk_theme_name.'_contact_email_error_message');
                $message_error_msg = get_option(tk_theme_name.'_contact_message_error_message');
                $mail_success_msg = get_option(tk_theme_name.'_contact_message_successful');
                $mail_error_msg = get_option(tk_theme_name.'_contact_message_unsuccessful');
                ?>

                <!-- Validate script -->
                <script type="text/javascript">
                    function validate_email(field,alerttxt)
                    {
                        with (field)
                        {
                            apos=value.indexOf("@");
                            dotpos=value.lastIndexOf(".");
                            if (apos<1||dotpos-apos<2)
                            {jQuery('#contact-error').empty().append(alerttxt);return false;}
                            else {return true;}
                        }
                    }

                    function check_field(field,alerttxt,checktext){
                        with (field)
                        {
                            var checkfalse = 0;
                            if(field.value == ""){
                                jQuery('#contact-error').empty().append(alerttxt);
                                field.focus();checkfalse=1;}

                            if(field.value==checktext)
                            {
                                jQuery('#contact-error').empty().append(alerttxt);
                                field.focus();checkfalse=1;}

                            if(checkfalse==1){return false;}else{return true;}
                        }
                    }

                    function checkForm(thisform)
                    {
                        with (thisform)
                        {
                            var error = 0;

                            var contactmessage = document.getElementById('contactmessage');
                            if(check_field(contactmessage,"<?php echo $message_error_msg?>","")==false){
                                error = 1;
                            }

                            var email = document.getElementById('contactemail');
                            if (validate_email(email,"<?php echo $email_error_msg?>")==false)
                            {email.focus();error = 1;}

                            var contactname = document.getElementById('contactname');
                            if(check_field(contactname,"<?php echo $name_error_msg?>","Name")==false){
                                error = 1;
                            }


                            if(error == 0){
                                var contactname = document.getElementById('contactname').value;
                                var email = document.getElementById('contactemail').value;
                                var contactmessage = document.getElementById('contactmessage').value;

                                return true;
                            }
                            return false;
                        }
                    }
                </script>
                <!-- end of script -->

                        </div><!--/blog-one-->
                        <div class="blog-one-border-down left"></div><!--/blog-one-border-down-->


                    </div><!--/content-left-->

                    <?php tk_get_right_sidebar($sidebar_position, 'Contact')?>

                    <div class="silver-big-fake right"></div><!--/silver-big-fake-->

            </div><!--/bg-content-->

            <div class="content-border left"></div><!--/content-border-->
        </div><!--/wrapper-->
    </div><!--/content-two-->


<?php get_footer(); ?>




