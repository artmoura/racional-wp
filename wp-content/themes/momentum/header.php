<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	    <title>
        <?php
        global $page, $paged;

        wp_title('|', true, 'right');

        bloginfo('name');

        $site_description = get_bloginfo('description', 'display');
        if ($site_description && ( is_home() || is_front_page() ))
            echo " | $site_description";

        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', tk_theme_name), max($paged, $page));
        ?>
    </title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
                <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <link rel="stylesheet" media="screen" href="<?php echo get_template_directory_uri() . "/script/menu/superfish.css"; ?>" type="text/css"/>
        <link rel="stylesheet" media="screen" href="<?php echo get_template_directory_uri() . "/script/pirobox/css/demo5/style.css"; ?>" type="text/css"/>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . "/script/flexslider/flexslider.css"; ?>" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . "/script/scroll-button/scroll-button.css"; ?>" type="text/css" charset="utf-8" />
        
<!--[if lt IE 9]>
   <script>
      document.createElement('nav');
   </script>
<![endif]-->


<?php

        /*************************************************************/
        /*Test user agent and load css for it***************************/
        /*************************************************************/


        $ua = $_SERVER["HTTP_USER_AGENT"];

        // Macintosh
        $mac = strpos($ua, 'Macintosh') ? true : false;

        // Windows
        $win = strpos($ua, 'Windows') ? true : false;


        $browser = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($browser, 'Safari')) {
            if(!empty($win)) {
                if($win == 'Windows') { ?>
                    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/win-safari.css" type="text/css" />
                <?php
                }
            }
        }

        if (strpos($browser, 'Firefox')) {
            if(!empty($win)) {
                if($win == 'Windows') { ?>
                    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/win-firefox.css" type="text/css" />
                <?php
                }
            }
        }

        if (strpos($browser, 'MSIE 8.0')) {
            ?>
                <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/ie8.css" type="text/css" />
                <script src="./script/respond/respond.src.js"></script>
            <?php
        }

        if (strpos($browser, 'MSIE 9.0')) {
            ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/ie9.css" type="text/css" />
            <?php
        }

        if (strpos($browser, 'Chrome')) {?>
           <?php if(!empty($win)) {
                if($win == 'Windows') { ?>
                    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/win-chrome.css" type="text/css" />
                <?php
                }
            }
        }

        if (strpos($browser, 'pera')) {
            ?>
                <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/opera.css" type="text/css" />
            <?php
            if(!empty($win)) {
                if($win == Windows) { ?>
                    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/win-opera.css" type="text/css" />
                <?php
                }
            }
        }
?>

                    
        <?php

        /*************************************************************/
        /************LOAD SCRIPTS***********************************/
        /*************************************************************/


            wp_enqueue_script('jquery');
            wp_enqueue_script('superfish', get_template_directory_uri().'/script/menu/superfish.js' );
            wp_enqueue_script('my-commons', get_template_directory_uri().'/script/common.js' );
            wp_enqueue_script('pirobox', get_template_directory_uri().'/script/pirobox/js/pirobox.js' );
            wp_enqueue_script('contact', get_template_directory_uri().'/script/contact/contact.js' );
            wp_enqueue_script('easing', get_template_directory_uri().'/script/easing/jquery.easing.1.3.js' );
            wp_enqueue_script('elastic', get_template_directory_uri().'/script/elastic/jquery.elastic.source.js' );
            wp_enqueue_script('jscolor', get_template_directory_uri().'/script/jscolor/jscolor.js' );
            wp_enqueue_script('flexslider', get_template_directory_uri().'/script/flexslider/jquery.flexslider.js' );
            wp_enqueue_script('scroll-button', get_template_directory_uri().'/script/scroll-button/scroll-button.js' );
            wp_enqueue_script('isotope', get_template_directory_uri().'/script/isotope/jquery.isotope.min.js' );
            wp_enqueue_script('pinterest', 'http://assets.pinterest.com/js/pinit.js' );
            
            if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
        ?>

        <?php $favicon = get_theme_option(tk_theme_name.'_general_favicon'); if(empty($favicon)) { $favicon = get_template_directory_uri()."/style/img/favicon.ico"; }?>
        <link rel="shortcut icon" href="<?php echo $favicon;?>" />

        
        <?php

         $g_analitics = get_theme_option(tk_theme_name.'_general_google_analytics');

         if( isset ($g_analitics) && $g_analitics != ''){
             echo $g_analitics;
         }

        ?>

        <?php
            $header_color = get_theme_option(tk_theme_name.'_colors_header_color');
            $middle_background = get_theme_option(tk_theme_name.'_colors_middle_color');
            $callto_background = get_theme_option(tk_theme_name.'_colors_call_to_action_background');
            $calltoaction_heading = get_theme_option(tk_theme_name.'_colors_call_to_action_heading');
            $calltoaction_text = get_theme_option(tk_theme_name.'_colors_call_to_action_text');
            $body_background = get_theme_option(tk_theme_name.'_colors_body_background');
            $button_color = get_theme_option(tk_theme_name.'_colors_call_to_action_button');
            $button_color_hover = get_theme_option(tk_theme_name.'_colors_call_to_action_button_hover');
            $post_title_colors = get_theme_option(tk_theme_name.'_colors_post_title_colors');
            $post_title_colors_hover = get_theme_option(tk_theme_name.'_colors_post_title_colors_hover');
            $page_titles = get_theme_option(tk_theme_name.'_colors_page_titles');
            $paragraph_color = get_theme_option(tk_theme_name.'_colors_text_color');
            $widget_heading = get_theme_option(tk_theme_name.'_colors_widget_heading');
            $widget_text = get_theme_option(tk_theme_name.'_colors_widget_text_color');
            $nav_font_color = get_theme_option(tk_theme_name.'_colors_nav_color');
            $nav_font_color_hover = get_theme_option(tk_theme_name.'_colors_nav_color_hover');
            $copyright = get_theme_option(tk_theme_name.'_colors_copyright_color');
            ?>


        <style type="text/css">

            .menu-header, .sf-shadow ul {
                background-color:#<?php echo $header_color; ?>;
            }

            .header {
                background-color:#<?php echo $middle_background; ?>;
            }

            .call-action {
                background-color:#<?php echo $callto_background; ?>;
            }
            .call-action-text a {
                color:#<?php echo $calltoaction_heading ?>;
            }
            .call-action-text p {
                color:#<?php echo $calltoaction_text; ?>;
            }
            body {
                background-color:#<?php echo $body_background; ?>;
            }

            .call-action-button a {
                background:#<?php echo $button_color; ?> url("<?php echo get_template_directory_uri(); ?>/style/img/arrows-link.png") no-repeat 87% 52%;
            }

            .call-action-button a:hover {
                background-color:#<?php echo $button_color_hover; ?>;
            }

            .blog-one-title a, .news-home-title a, .latest-projects-title a, .projecrs-text-title a, .blog-one-title, .projecrs-text-title {
                color:#<?php echo $post_title_colors; ?>;
            }

            .blog-one-title a:hover, .news-home-title a:hover, .latest-projects-title a:hover, .projecrs-text-title a:hover {
                color:#<?php echo $post_title_colors_hover; ?>;
            }

            .title-breadcrambs span, .shortcodes h1, .shortcodes h2, .shortcodes h3, .shortcodes h4, .shortcodes h5, .shortcodes h6{
                color:#<?php echo $page_titles; ?>
            }

            .news-home-first p, .news-home-text p, .shortcodes, .shortcodes p, .projecrs-text p, .shortcodes ul li, .blog-one-text p {
                color:#<?php echo $paragraph_color; ?>
            }

            .sidebar_widget_holder h3, .footer_box_holder h2, thead, #wp-calendar caption {
                color:#<?php echo $widget_heading; ?>;
            }

            .sidebar_widget_holder a, #sidebar .textwidget,  .footer_box_holder .textwidget, #sidebar .textwidget p, .footer_box_holder .textwidget p, .sidebar_widget_holder ul li a, 
            .footer_box_holder ul li a, .sidebar_widget_holder ul li , .footer_box_holder ul li, #sidebar ul li a, .newsletter span, .rssSummary, .rss-date, ul li cite, tbody, #sidebar ul li, .rsswidget,
            .bg-widget-center span{
                color:#<?php echo $widget_text; ?>;
            }

            nav ul li a:link, nav ul li a:visited, .sub-menu a, .header nav .current-menu-item .sub-menu a  {
                color:#<?php echo $nav_font_color; ?>;
            }
            nav ul li a:hover, .header nav ul .current-menu-item a {
                color:#<?php echo $nav_font_color_hover; ?>;
            }

            .footer-first-box-help span, .footer-first-box span {
                color:#<?php echo $copyright?>;
            }

        </style>

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php if ( ! isset( $content_width ) ) $content_width = 980; ?>
    
    
<div id="container">



    <!-- HEADER -->
    <div class="header left">

        <div class="menu-header left">
            <div class="wrapper">


                <!--MENU-->
                <nav>
                        <?php
                        if ( function_exists('has_nav_menu') && has_nav_menu('primary') ) {
                            $nav_menu = array('title_li'=> '', 'theme_location' => 'primary',   'menu_class'      => 'sf-menu');
                            wp_nav_menu($nav_menu);
                        } else { ?>

                        <ul class="sf-menu">
                                <?php
                                $pageargs = array(
                                        'depth'        => 3,
                                        'title_li'     => '',
                                        'echo'         => 1,
                                        'authors'      => '',
                                        'link_before'  => '',
                                        'link_after'   => '',
                                        'walker' => '' );
                                wp_list_pages($pageargs);?>
                        </ul>
                        <?php } ?>
                </nav>

                <div class="stay-tuned right">
              <?php
                    $enable_rss = get_theme_option(tk_theme_name.'_social_enable_rss');
                    $twitter_acc = get_theme_option(tk_theme_name.'_social_twitter');
                    $facebook_acc = get_theme_option(tk_theme_name.'_social_facebook');
                    $rss_acc = get_theme_option(tk_theme_name.'_social_rss_url');
                    $google_acc = get_theme_option(tk_theme_name.'_social_google_plus');
                    $linkedin_acc = get_theme_option(tk_theme_name.'_social_linked_in');
                    $admin_email = get_option('admin_email');
                    if($rss_acc || $twitter_acc == '' || $facebook_acc == '' ||  $rss_acc == '' || $google_acc == '' || $linkedin_acc == '' ){
                ?>
                    <ul>
	                    <?php if(!empty($twitter_acc)){ ?><li><a href="http://twitter.com/<?php echo $twitter_acc; ?>" class="stay-tuned-1 left"></a></li><?php } ?>
                        <?php if(!empty($facebook_acc)){ ?><li><a href="http://facebook.com/<?php echo $facebook_acc; ?>" class="stay-tuned-2 left"></a></li><?php } ?>
                        <?php if(!empty($linkedin_acc)){ ?><li><a href="<?php echo $linkedin_acc; ?>" class="stay-tuned-3 left"></a></li><?php } ?>
                        <?php if(!empty($google_acc)){ ?><li><a href="https://plus.google.com/<?php echo $google_acc; ?>" class="stay-tuned-4 left"></a></li><?php } ?>
                        <?php if ($enable_rss == false || $enable_rss[0] == ''){}else{ if(!empty($rss_acc )){ ?><li><a href="<?php echo $rss_acc; ?>" class="stay-tuned-5 left"></a></li><?php } else { ?><li><a href="<?php echo get_bloginfo('rss2_url'); ?>" class="icon-header-3"></a><div class="social-bg"></div></li><?php } }?>


                        <?php if ($enable_rss == false || $enable_rss[0] == ''){}else{ if(!empty($rss_acc )){ ?><li><a href="<?php echo $rss_acc; ?>" class="stay-tuned-5 left"></a></li><?php } else { ?><li><a href="<?php echo get_bloginfo('rss2_url'); ?>" class="stay-tuned-5 left"></a><div class="social-bg"></div></li><?php } }?>
                    </ul>

                    <?php } ?>
                </div><!--/stay-tuned-->

            </div><!--/wrapper-->
        </div><!--/menu-header-->


        <?php if(is_home()) { ?>
            <div class="bg-triangl left">
        <?php } else { ?>
                <div class="bg-triangl-two left">
        <?php } ?>

            <div class="wrapper">
                <div class="logo left">
               <?php
                    $logo = get_theme_option(tk_theme_name.'_general_header_logo');
                    if(empty($logo)) {
                    $logo = get_template_directory_uri()."/style/img/logo.png";
                 }?>

                   <a href="<?php echo home_url(); ?>"><img src="<?php echo $logo; ?>" alt='<?php bloginfo('name') ?>' title="<?php bloginfo('name') ?>"/></a>

<!--                   <p id="slogan"><?php bloginfo('description'); ?></p>
-->
                </div><!--/logo-->
            </div><!--/wrapper-->
        </div><!--/bg-triangl-->


    </div><!--/header-->