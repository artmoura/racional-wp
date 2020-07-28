<?php


$tabs = array(

        /*************************************************************/
        /************GENERAL OPTIONS*******************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'general',
        'name' => 'General Options',

        'fields' => array(

           array(
                'id' => 'header_logo',
                'name' => 'header_logo',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/logo.png",
                'label' => 'Header Logo',
                'desc' => 'JPEG, GIF or PNG image, 285x78px recommended, up to 500KB',
            ),


           array(
                'id' => 'footer_logo',
                'name' => 'footer_logo',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/footer-logo.png",
                'label' => 'Footer Logo',
                'desc' => 'JPEG, GIF or PNG image, 198x63px recommended, up to 500KB',
            ),

            array(
                'id' => 'favicon',
                'name' => 'favicon',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/favicon.ico",
                'label' => 'Favicon',
                'desc' => 'File format: ICO, dimensions: 16x16',
            ),

            array(
                'id' => 'google_analytics',
                'name' => 'google_analytics',
                'type' => 'textarea',
                'value' => '',
                'label' => 'Google Analytics code',
                'desc' => '',
                'options' => array(
                    'rows' => '5',
                    'cols' => '80'
                )
            ),

            
            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),     

           
            
            array(
                'id' => 'custom_sidebars',
                'name' => 'custom_sidebars',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Use different sidebars on page templates.',
                ),
                'label' => 'Custom Sidebars',
                'desc' => 'Check this box if you want to use custom sidebars on page templates, if unchecked the default sidebar will be used on every page.',
            ),

            array(
                'id' => 'footer_copy',
                'name' => 'footer_copy',
                'type' => 'text',
                'value' => 'Copyright Information Goes Here © 2012. All Rights Reserved.',
                'label' => 'Footer Copy Text',
                'desc' => 'Text which appears in footer as copyright text',
                'options' => array(
                    'size' => '100'
                )
            ),

        ),
    ),


        /*************************************************************/
        /************HOME PAGE OPTIONS****************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'home',
        'name' => 'Home Page',

        'fields' => array(
            


            array(
                'id' => 'show_sliders',
                'name' => 'show_sliders',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Enable Slider',
                ),
                'label' => 'Show slider',
                'desc' => 'If checked slider will be shown.',
            ),

            array(
                'id' => 'show_slider_caption',
                'name' => 'show_slider_caption',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Enable Slider Caption',
                ),
                'label' => 'Show slider caption',
                'desc' => 'If checked slider caption will be shown.',
            ),



            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),

            array(
                'id' => 'use_home_content',
                'name' => 'use_home_content',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Show Page Content On Home Page',
                ),
                'label' => '',
                'desc' => '',
            ),

            array(
                'id' => 'home_content',
                'name' => 'home_content',
                'type' => 'pages',
                'value' => '',
                'label' => 'Chose page to use on Home Content:',
                'desc' => 'only content from this page will be shown on Home Page.',

            ),

            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),
            
            array(
                'id' => 'recent_posts',
                'name' => 'recent_posts',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Disable Recent post section on your Home page',
                ),
                'label' => 'Disable Home Page Recent Posts',
                'desc' => 'Check this box if you want to disable recent posts from home page.',
            ),



            array(
                'id' => 'recent_posts_text',
                'name' => 'recent_posts_text',
                'type' => 'text',
                'value' => '',
                'label' => 'Recent Posts Text',
                'desc' => 'Insert text for recent posts on home page',
                'options' => array(
                    'size' => '100'
                )
            ),

            
            array(
                'id' => 'recent_projects',
                'name' => 'recent_projects',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Disable Recent projects section on your Home page',
                ),
                'label' => 'Disable Home Page Recent Projects',
                'desc' => 'Check this box if you want to disable recent projects from home page.',
            ),

            array(
                'id' => 'recent_projects_text',
                'name' => 'recent_projects_text',
                'type' => 'text',
                'value' => '',
                'label' => 'Recent Projects Text',
                'desc' => 'Insert text for recent projects on home page',
                'options' => array(
                    'size' => '100'
                )
            ),


            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),

            array(
                'id' => 'call_to_action_heading',
                'name' => 'call_to_action_heading',
                'type' => 'text',
                'value' => '',
                'label' => 'Call to action title',
                'desc' => 'Insert title for call to action',
                'options' => array(
                    'size' => '100'
                )
            ),

            array(
                'id' => 'call_to_action_description',
                'name' => 'call_to_action_description',
                'type' => 'text',
                'value' => '',
                'label' => 'Call to action description',
                'desc' => 'Insert call to action description',
                'options' => array(
                    'size' => '100'
                )
            ),

            array(
                'id' => 'call_to_action_link',
                'name' => 'call_to_action_link',
                'type' => 'text',
                'value' => '',
                'label' => 'Call to action link',
                'desc' => 'Insert call to action button link',
                'options' => array(
                    'size' => '100'
                )
            ),

            array(
                'id' => 'call_to_action_button',
                'name' => 'call_to_action_button',
                'type' => 'text',
                'value' => '',
                'label' => 'Call to action button text',
                'desc' => 'Insert call to action button text',
                'options' => array(
                    'size' => '100'
                )
            ),

 

            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            )

        ),
    ),


        /*************************************************************/
        /************COLOR OPTIONS*********************************/
        /*************************************************************/
 
    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'colors',
        'name' => 'Colors',
        
        'fields' => array(


            array(
                'id' => 'body_background',
                'name' => 'body_background',
                'type' => 'colorpicker',
                'value' => 'fff',
                'label' => 'Body background color',
                'desc' => 'Set body background color',
            ),


            array(
                'id' => 'middle_color',
                'name' => 'middle_color',
                'type' => 'colorpicker',
                'value' => '2d2f34',
                'label' => 'Pattern background color',
                'desc' => 'Set pattern background color',
            ),


            array(
                'id' => 'header_color',
                'name' => 'header_color',
                'type' => 'colorpicker',
                'value' => '292b30',
                'label' => 'Navigation background color',
                'desc' => 'Set navigation background color',
            ),

            array(
                'id' => 'nav_color',
                'name' => 'nav_color',
                'type' => 'colorpicker',
                'value' => 'fff',
                'label' => 'Navigation font color',
                'desc' => 'Set color for fonts in navigation',
            ),

            array(
                'id' => 'nav_color_hover',
                'name' => 'nav_color_hover',
                'type' => 'colorpicker',
                'value' => 'dd2c2c',
                'label' => 'Navigation hover font color',
                'desc' => 'Set color for fonts hover in navigation',
            ),


            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),

            array(
                'id' => 'call_to_action_background',
                'name' => 'call_to_action_background',
                'type' => 'colorpicker',
                'value' => '2d2f34',
                'label' => 'Call to action background color',
                'desc' => 'Set background color of call to action',
            ),

            array(
                'id' => 'call_to_action_heading',
                'name' => 'call_to_action_heading',
                'type' => 'colorpicker',
                'value' => 'fff',
                'label' => 'Call to action heading color',
                'desc' => 'Set color for call to action heading',
            ),

            array(
                'id' => 'call_to_action_text',
                'name' => 'call_to_action_text',
                'type' => 'colorpicker',
                'value' => 'fff',
                'label' => 'Call to action text color',
                'desc' => 'Set color for call to action text',
            ),

            array(
                'id' => 'call_to_action_button',
                'name' => 'call_to_action_button',
                'type' => 'colorpicker',
                'value' => 'dd2c2c',
                'label' => 'Call to action button color',
                'desc' => 'Set color for call to action button',
            ),

            array(
                'id' => 'call_to_action_button_hover',
                'name' => 'call_to_action_button_hover',
                'type' => 'colorpicker',
                'value' => 'bd2424',
                'label' => 'Call to action button color hover',
                'desc' => 'Set color for call to action button hover',
            ),

            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),


            array(
                'id' => 'post_title_colors',
                'name' => 'post_title_colors',
                'type' => 'colorpicker',
                'value' => '34363c',
                'label' => 'Post titles colors',
                'desc' => 'Set color for post titles',
            ),

            array(
                'id' => 'post_title_colors_hover',
                'name' => 'post_title_colors_hover',
                'type' => 'colorpicker',
                'value' => 'DD2C2C',
                'label' => 'Post titles hover colors',
                'desc' => 'Set hover color for post titles',
            ),

            array(
                'id' => 'page_titles',
                'name' => 'page_titles',
                'type' => 'colorpicker',
                'value' => '34363c',
                'label' => 'Page titles colors',
                'desc' => 'Set color for page titles',
            ),

            array(
                'id' => 'text_color',
                'name' => 'text_color',
                'type' => 'colorpicker',
                'value' => '666666',
                'label' => 'Paragraph color',
                'desc' => 'Set paragraph color',
            ),

            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),


            array(
                'id' => 'widget_heading',
                'name' => 'widget_heading',
                'type' => 'colorpicker',
                'value' => '34363c',
                'label' => 'Widget titles color',
                'desc' => 'Set color for widget titles',
            ),

            array(
                'id' => 'widget_text_color',
                'name' => 'widget_text_color',
                'type' => 'colorpicker',
                'value' => '666666',
                'label' => 'Widget content color',
                'desc' => 'Set color for widget content',
            ),

            array(
                'id' => 'copyright_color',
                'name' => 'copyright_color',
                'type' => 'colorpicker',
                'value' => '666666',
                'label' => 'Copyright background color',
                'desc' => 'Set copyright background color',
            ),

            

        ),
    ),
    

        /*************************************************************/
        /************SOCIAL OPTIONS*********************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'social',
        'name' => 'Social',
        'fields' => array(

            array(
                'id' => 'enable_rss',
                'name' => 'enable_rss',
                'type' => 'checkbox',
                'value' => array(
                    'yes'

                ),
                'caption' => array(
                    'Enable RSS icon'
                ),
                'label' => 'RSS',
                'desc' => 'Enable RSS Icon Feed',

            ),

            array(
                'id' => 'rss_url',
                'name' => 'rss_url',
                'type' => 'text',
                'value' => '',
                'label' => 'RSS Feed URL',
                'desc' => 'If empty, default WordPress url will be used',
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'google_plus',
                'name' => 'google_plus',
                'type' => 'text',
                'value' => '',
                'label' => 'Google Plus account',
                'desc' => 'Enter Google+ account (e.g. themeskingdom) or leave empty if you dont wish to use Google+',
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'facebook',
                'name' => 'facebook',
                'type' => 'text',
                'value' => '',
                'label' => 'Facebook account',
                'desc' => 'Enter Facebook account (e.g. themeskingdom) or leave empty if you dont wish to use Facebook',
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'twitter',
                'name' => 'twitter',
                'type' => 'text',
                'value' => '',
                'label' => 'Twitter account',
                'desc' => 'Enter Twitter account (e.g. themeskingdom) or leave empty if you dont wish to use Twitter',
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'linked_in',
                'name' => 'linked_in',
                'type' => 'text',
                'value' => '',
                'label' => 'Linkedin account',
                'desc' => 'Enter Linkedin account (e.g. themeskingdom) or leave empty if you dont wish to use Linkedin',
                'options' => array(
                    'size' => '80'
                )
            ),

        ),
    ),


        /*************************************************************/
        /************CONTACT OPTIONS******************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'contact',
        'name' => 'Contact',
        'fields' => array(

            array(
                'id' => 'contact_subject',
                'name' => 'contact_subject',
                'type' => 'text',
                'value' => 'E-mail from '.tk_theme_name().' Theme',
                'label' => 'Subject for your contact form',
                'desc' => 'This will be subject when you receive e-mail from your site',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'name_error_message',
                'name' => 'name_error_message',
                'type' => 'text',
                'value' => 'Please insert your name!',
                'label' => 'Name error message',
                'desc' => 'Enter error message if name is not entered in contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'email_error_message',
                'name' => 'email_error_message',
                'type' => 'text',
                'value' => 'Please insert your e-mail!',
                'label' => 'E-mail error message',
                'desc' => 'Enter error message if e-mail is not entered in contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_error_message',
                'name' => 'message_error_message',
                'type' => 'text',
                'value' => 'Please insert your message!',
                'label' => 'Message text error message',
                'desc' => 'Enter error message if message text is not entered in contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_successful',
                'name' => 'message_successful',
                'type' => 'text',
                'value' => 'Message sent!',
                'label' => 'Message on successful e-mail send',
                'desc' => 'Enter notification text for successfully sent message',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_unsuccessful',
                'name' => 'message_unsuccessful',
                'type' => 'text',
                'value' => 'Some error occured!',
                'label' => 'Message for error on e-mail send',
                'desc' => 'Enter notification text for unsuccessfully sent message',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'googlemap_x',
                'name' => 'googlemap_x',
                'type' => 'text',
                'value' => '',
                'label' => 'Google map X coordinate',
                'desc' => 'Insert google map coordinate for your adress',
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'googlemap_y',
                'name' => 'googlemap_y',
                'type' => 'text',
                'value' => '',
                'label' => 'Google map Y coordinate',
                'desc' => 'Insert google map coordinate for your adress',
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'googlemap_zoom',
                'name' => 'googlemap_zoom',
                'type' => 'text',
                'value' => '15',
                'label' => 'Google map zoom factor',
                'desc' => 'Insert google map zoom factor',
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'marker_title',
                'name' => 'marker_title',
                'type' => 'text',
                'value' => 'Marker',
                'label' => 'Marker Title',
                'desc' => 'Insert marker title.',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'google_map_type',
                'name' => 'google_map_type',
                'type' => 'select',
                'value' => array(
                    'HYBRID',
                    'ROADMAP',
                    'SATELLITE',
                    'TERRAIN'
                ),
                'label' => 'Google Map type',
                'desc' => 'Select map type you want to use.',
            ),


        ),
    ),
        
);

array_splice($tabs[1]['fields'], 10, 0, $new_array);
array_splice($tabs[0]['fields'], 5, 0, $new_array);

?>