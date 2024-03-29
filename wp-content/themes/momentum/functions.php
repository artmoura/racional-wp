<?php
global $wpdb;

require(  get_template_directory() . '/inc/theme-settings.php');                //Building theme administration

require(  get_template_directory() . '/inc/meta-boxes.php');                    //Building meta boxes

require(  get_template_directory() . '/inc/post-types.php');                    //Building post types

require(  get_template_directory() . '/inc/custom-taxonomies.php');             //Building post types

function tk_theme_name(){
    return 'momentum';
}
define( 'tk_theme_name', 'momentum' );
update_option('tk_theme_name', tk_theme_name);

$lang = get_template_directory() . '/languages/';                               //Make this theme available for translation.
load_theme_textdomain(tk_theme_name, $lang);

add_theme_support( 'automatic-feed-links' );                                    //Add default posts and comments RSS feed links to <head>

add_theme_support( 'post-thumbnails' );                                         //This enables Post Thumbnails support for this theme.
        add_image_size( 'single-image', 942 , 468 , true );
        add_image_size( 'blog', 625 , 364, true  );
        add_image_size( 'latest-news', 213 , 160 , true );        
        add_image_size( 'projects-single', 584, 9999);   

register_nav_menu( 'primary', __( 'Primary Menu', tk_theme_name ) );                //This theme uses wp_nav_menu()

//THEME NAME
$tk_theme_name = tk_theme_name;

function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

if ( version_compare( $wp_version, '3.4', '>=' ) ) {add_theme_support( 'custom-background' );}else{add_custom_background();}

        /*************************************************************/
        /************VIDEO PLAYER***********************************/
        /*************************************************************/

        function tk_video_player($url) {

		if(!empty($url)){
		$key_str1='youtube';
		$key_str2='vimeo';

		$pos_youtube = strpos($url, $key_str1);
		$pos_vimeo = strpos($url, $key_str2);
			if (!empty($pos_youtube)) {
			$url = str_replace('watch?v=','',$url);
			$url = explode('&',$url);
			$url = $url[0];
			$url = str_replace('http://www.youtube.com/','',$url);
		?>
			<div class="video-holder">
                                                        <iframe src="http://www.youtube.com/embed/<?php echo $url;?>?rel=0" frameborder="0" allowfullscreen></iframe>
			</div>
		<?php  }
		if (!empty($pos_vimeo)) {
			$url = explode('.com/',$url);
		?>

		<div class="video-holder">
                                    <iframe src="http://player.vimeo.com/video/<?php echo $url[1];?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		</div>
		<?php  }
		if (empty($pos_vimeo) && empty($pos_youtube)) {

		  _e("Video only allowes vimeo and youtube!", tk_theme_name);
		}

   }}

   
        /*************************************************************/
        /************GET CUSTOM THUMB SIZE***********************/
        /************************************************************/

            /*
             * $height -> height of new image
             * $width -> width of new image
             * $src -> url of image you want to get thumb from
             */
            function tk_get_thumb($width, $height, $src)
            {
                if(strpos($src, '.jpg')){
                    $new_src = explode('.jpg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpg';
                            /*
                             * THIS STILL NEEDS TO BE TESTED!!!!
                            if(@fopen($new_src, 'r')){
                                echo $new_src;
                            }else{
                                echo $src;
                            }
                            */
                        echo $new_src;
                }elseif(strpos($src, '.jpeg')){
                    $new_src = explode('.jpeg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpeg';
                    echo $new_src;
                }elseif(strpos($src, '.gif')){
                    $new_src = explode('.gif', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.gif';
                    echo $new_src;
                }elseif(strpos($src, '.png')){
                    $new_src = explode('.png', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.png';
                    echo $new_src;
                }
            }

        /*************************************************************/
        /************GET CUSTOM THUMB SIZE v2***********************/
        /************************************************************/  
    function tk_get_thumb_new($width, $height, $src)
            {
                if(strpos($src, '.jpg')){
                    $new_src = explode('.jpg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpg';
                            /*
                             * THIS STILL NEEDS TO BE TESTED!!!!
                            if(@fopen($new_src, 'r')){
                                echo $new_src;
                            }else{
                                echo $src;
                            }
                            */
                        return $new_src;
                }elseif(strpos($src, '.jpeg')){
                    $new_src = explode('.jpeg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpeg';
                    return $new_src;
                }elseif(strpos($src, '.gif')){
                    $new_src = explode('.gif', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.gif';
                    return $new_src;
                }elseif(strpos($src, '.png')){
                    $new_src = explode('.png', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.png';
                    return $new_src;
                }
            }           
            
            

        /*************************************************************/
        /************VIEW COUNTER**********************************/
        /*************************************************************/

            add_filter('manage_posts_columns', 'posts_columns'); //Filter defining new columns
            add_action('manage_posts_custom_column', 'posts_custom_columns', 1, 2); //Action for adding new columns

            function posts_columns($defaults) {
                $defaults['post_stats'] = __('Views', tk_theme_name); // Create a new column called 'Visits'
                return $defaults;
            }

            // Populate the new column with the Visits
            function posts_custom_columns($column_name, $id) {
                if ($column_name === 'post_stats') {
                    $current_stats = get_post_meta($id, 'post_stats', true); //get visit count from database
                    echo (int) $current_stats;
                }
            }

            function set_post_stats() {
                $post_id = get_the_ID(); //get current post id
                if (is_single($post_id)) {//is it post? Otherwise, we don't need to track visits
                    $current_stats = get_post_meta($post_id, 'post_stats', true); //get current visit stats for the post
                    if (!isset($current_stats)) {//this is first visit to this post
                        add_post_meta($post_id, 'post_stats', 1, true); //add first fisit to database
                    } else {
                        update_post_meta($post_id, 'post_stats', $current_stats + 1); //increment number of visits
                    }
                }
            }
            add_action('wp_head', 'set_post_stats', 1000);

function add_twitter_contactmethod( $contactmethods ) {
	// Add Twitter
	$contactmethods['twitter'] = 'Twitter';
	$contactmethods['facebook'] = 'Facebook';
	$contactmethods['linkedin'] = 'Linkedin';
	$contactmethods['google'] = 'Google+';
	$contactmethods['rss'] = 'Author RSS';

	// Remove Yahoo IM
	unset($contactmethods['yim']);
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);

	return $contactmethods;
}
add_filter('user_contactmethods','add_twitter_contactmethod',10,1);

        /*************************************************************/
        /************LOAD WIDGETS**********************************/
        /*************************************************************/

	require_once (TEMPLATEPATH . '/inc/widgets/widget-twitter.php');
	require_once (TEMPLATEPATH . '/inc/widgets/widget-newsletter.php');




        /*************************************************************/
        /************INCREASE IMAGE QUALITY***********************/
        /************************************************************/

            function jpeg_quality_callback($arg)
            {
            return (int)100;
            }

            add_filter('jpeg_quality', 'jpeg_quality_callback');



        /*************************************************************/
        /************EXCERPT LENGTH*******************************/
        /************************************************************/

            function the_excerpt_length($charlength) {
                    $excerpt = get_the_excerpt();
                    $charlength++;

                    if ( mb_strlen( $excerpt ) > $charlength ) {
                            $subex = mb_substr( $excerpt, 0, $charlength - 5 );
                            $exwords = explode( ' ', $subex );
                            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
                            if ( $excut < 0 ) {
                                    echo mb_substr( $subex, 0, $excut );
                            } else {
                                    echo $subex;
                            }
                            echo '...';
                    } else {
                            echo $excerpt;
                    }
            }



        /*************************************************************/
        /************IMAGE WITHOUT DIMENSIONS********************/
        /************************************************************/

            function tk_thumbnail($post_id, $img_size) {
                    $thumbnail = get_the_post_thumbnail($post_id, $img_size);
                    $thumbnail = preg_replace( '/(width|height)=\"\d*\"\s/', "", $thumbnail );
                    echo $thumbnail;
            }


        /*************************************************************/
        /************GET URL OF CURENT PAGE**********************/
        /************************************************************/

function get_page_url(){

	$pageURL = 'http';
	if (isset($_SERVER["HTTPS"])) {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;

}

        /*************************************************************/
        /************CHOSE SIDEBAR POSITION************************/
        /************************************************************/

        function tk_get_left_sidebar($sidebar_position, $sidebar_name) {

            $sidebar_option = get_theme_option(tk_theme_name.'_general_custom_sidebars');
            if($sidebar_position == 'Left'){
                if($sidebar_option !== 'yes') { ?>

                    <div id="sidebar" class="left sidebar-left">
                           <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Default / Page template')) : ?>
                            <?php endif; ?>
                    </div>

               <?php } else { ?>

                    <div id="sidebar" class="left sidebar-left">
                           <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar_name)) : ?>
                           <?php endif; ?>
                    </div>

            <?php }
            }
        }



        function tk_get_right_sidebar($sidebar_position, $sidebar_name) {

            $sidebar_option = get_theme_option(tk_theme_name.'_general_custom_sidebars');
            if($sidebar_position == 'Right'){?>
            <?php
                $sidebar_option = get_theme_option(tk_theme_name.'_general_custom_sidebars');
                if($sidebar_option !== 'yes') { ?>

            <div id="sidebar" class="right sidebar-right">
                   <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Default / Page template')) : ?>
                    <?php endif; ?>
            </div><!--/#sidebar-->

               <?php } else { ?>

            <div id="sidebar" class="right sidebar-right">
                   <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar_name)) : ?>
                   <?php endif; ?>
            </div><!--/#sidebar-->
            <?php }
             }
        }



        /*************************************************************/
        /************REGISTERING SIDEBARS**************************/
        /************************************************************/

        if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Sidebar Default / Page template',
						'before_widget' => '<div class="sidebar_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="border-title-widget"><h3>',
						'after_title'   => '</h3></div>' )
						);
	}


        if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Blog Template',
						'before_widget' => '<div class="sidebar_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="border-title-widget"><h3>',
						'after_title'   => '</h3></div>' )
						);
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Archive/Search',
						'before_widget' => '<div class="sidebar_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="border-title-widget"><h3>',
						'after_title'   => '</h3></div>' )
						);
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Contact',
						'before_widget' => '<div class="sidebar_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="border-title-widget"><h3>',
						'after_title'   => '</h3></div>' )
						);
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Footer Widget 1',
						'before_widget' => '<div class="footer_box_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2>',
						'after_title'   => '</h2>' )
						);
	}

	if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Footer Widget 2',
						'before_widget' => '<div class="footer_box_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2>',
						'after_title'   => '</h2>' )
						);
	}

	if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Footer Widget 3',
						'before_widget' => '<div class="footer_box_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2>',
						'after_title'   => '</h2>' )
						);
	}


        /*************************************************************/
        /************LOAD SHORTCODES******************************/
        /*************************************************************/


require_once (  ABSPATH.'wp-content/themes/'.tk_theme_name.'/inc/shortcodes/tinymce_loader.php');

function enable_more_buttons($buttons) {
  $buttons[] = 'hr';
  return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");

function shortcode_one_half( $atts, $content = null ) {
    	extract(shortcode_atts(array(
		'position'     	 => '',
    ), $atts));

   return '<div class="onehalf '.$position.'">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_half', 'shortcode_one_half');

function shortcode_one_third( $atts, $content = null ) {
    	extract(shortcode_atts(array(
		'position'     	 => '',
    ), $atts));

   return '<div class="one-third '.$position.'">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_third', 'shortcode_one_third');

function shortcode_one_fourth( $atts, $content = null ) {
    	extract(shortcode_atts(array(
		'position'     	 => '',
    ), $atts));

   return '<div class="one-fourth '.$position.'">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_fourth', 'shortcode_one_fourth');


function shortcode_button( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'url'     	 => '#',
		'style'   => 'black',
    ), $atts));

   return '<div class="color-buttons color-button-'.$style.' left"><a href="'.$url.'">' . do_shortcode($content) . '</a></div>';
}

add_shortcode('button', 'shortcode_button');


function shortcode_list( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'style'   => '1'
    ), $atts));

   return '<ul><li class="'.$style.'">' . do_shortcode($content) . '</li></ul>';
}

add_shortcode('list', 'shortcode_list');


        /*************************************************************/
        /************TWITTER SCRIPT*********************************/
        /*************************************************************/


function twitter_script($unique_id,$username,$limit) { ?>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--

	    function twitterCallback2(twitters) {
	      var statusHTML = [];
	      for (var i=0; i<twitters.length; i++){
	        var username = twitters[i].user.screen_name;
	        var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
	          return '<a href="'+url+'">'+url+'</a>';
	        }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
	          return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';
	        });
	        statusHTML.push('<li><div class="bg-widget-center"><img src="<?php echo get_template_directory_uri(); ?>/style/img/twitter-icon.png" /><span class="twitt"></span><span>'+status+'</span></div><p>'+relative_time(twitters[i].created_at)+'</p></li>');
	      }
	      document.getElementById('twitter_update_list_<?php echo $unique_id; ?>').innerHTML = statusHTML.join('');
	    }

	    function relative_time(time_value) {
	      var values = time_value.split(" ");
	      time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
	      var parsed_date = Date.parse(time_value);
	      var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
	      var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
	      delta = delta + (relative_to.getTimezoneOffset() * 60);

	      if (delta < 60) {
	        return '<?php _e('less than a minute ago', tk_theme_name)?>';
	      } else if(delta < 120) {
	        return '<?php _e('about a minute ago', tk_theme_name)?>';
	      } else if(delta < (60*60)) {
	        return (parseInt(delta / 60)).toString() + '<?php _e('minutes ago', tk_theme_name)?>';
	      } else if(delta < (120*60)) {
	        return '<?php _e('about an hour ago', tk_theme_name)?>';
	      } else if(delta < (24*60*60)) {
	        return 'about ' + (parseInt(delta / 3600)).toString() + '<?php _e('hours ago', tk_theme_name)?>';
	      } else if(delta < (48*60*60)) {
	        return '<?php _e('1 day ago', tk_theme_name)?>';
	      } else {
	        return (parseInt(delta / 86400)).toString() + ' <?php _e('days ago', tk_theme_name)?>';
	      }
	    }
	//-->
	</script>
	<script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline.json?screen_name=<?php echo $username; ?>&include_rts=true&callback=twitterCallback2&count=<?php echo $limit; ?>"></script>

 <?php }

  function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}



   function dimox_breadcrumbs() {

  $delimiter = '&raquo;';
  $home = __('Home', tk_theme_name); // text for the 'Home' link
  $before = '<li class="current">'; // tag before the current crumb
  $after = '</li>'; // tag after the current crumb

  if ( !is_home() && !is_front_page() || is_paged() ) {

    echo '  <div class="breadcrumbs-content"><ul><li style="background: none; padding: 0;">'.__('You are here:', tk_theme_name).'</li>';

    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . $homeLink . '">' . $home . '</a></li> ';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before .__('Archive by category', tk_theme_name). ' "'.single_cat_title('', false) . '"' . $after;

    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li>';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo '<li>'.get_category_parents($cat, TRUE, '</li> ');
        echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_search() ) {
      echo $before .__('Search results for', tk_theme_name). ' "'. get_search_query() . '"' . $after;

    } elseif ( is_tag() ) {
      echo $before .__('Posts tagged', tk_theme_name). ' "'. single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before .__('Articles posted by', tk_theme_name). $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before .__('Error 404', tk_theme_name). $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</ul></div>';

  }
} // end dimox_breadcrumbs()



add_action ( 'publish_page', 'saveBlogId' );

function saveBlogId($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_blog.php") {
        update_option('id_blog_page',$post_ID);
        update_option('title_blog_page',$the_title);
    }

    $oldblog = get_option('id_blog_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_blog.php") {
            update_option('id_blog_page','');
        }
    }
}

add_action ( 'publish_page', 'saveProjectId' );
function saveProjectId($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_projects.php") {
        update_option('id_projects_page',$post_ID);
        update_option('title_projects_page',$the_title);
    }

    $oldblog = get_option('id_projects_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_projects.php") {
            update_option('id_projects_page','');
        }
    }
}

        /*************************************************************/
        /************REDIRECT OUR-PROJECTS***********************/
        /************************************************************/

        add_action('init', 'redirect_projects');

        function redirect_projects() {
            $this_url =  get_page_url();
            $test = explode('/', $this_url);
            $projects_ID = get_option('id_projects_page');
            $projects_url = get_permalink($projects_ID);
            if($test[count($test)-2] == 'our-projects'){
                wp_redirect($projects_url);exit;
            }
        }


 include("update_notifier.php");

 ?>