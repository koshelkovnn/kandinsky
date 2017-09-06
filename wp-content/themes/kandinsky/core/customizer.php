<?php if( !defined('WPINC') ) die;
/** 
   Customizer options
**/

add_action('customize_register', 'knd_customize_register', 15);
function knd_customize_register(WP_Customize_Manager $wp_customize) {

    // Theme important links started
    class Knd_Important_Links extends WP_Customize_Control {

        public $type = "knd-important-links";

        public function render_content() {

            $important_links = array(
                'theme-info' => array(
                    'link' => esc_url('https://te-st.ru/'),
                    'text' => esc_html__('Theme Info', 'knd'),
                ),
                'support' => array(
                    'link' => esc_url('mailto:support@te-st.ru'),
                    'text' => esc_html__('Support', 'knd'),
                ),
                'documentation' => array(
                    'link' => esc_url('https://drive.google.com/drive/folders/0B5-GQ-OMsbzrRzVmQnNzUm9RVGc'),
                    'text' => esc_html__('Documentation', 'knd'),
                ),
            );
            foreach ($important_links as $important_link) {
                echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . esc_attr($important_link['text']) . ' </a></p>';
            }

        }

    }

    $wp_customize->add_section('knd_important_links', array(
        'priority' => 1,
        'title' => __('Important Links', 'knd'),
    ));

    $wp_customize->add_setting('knd_important_links', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'knd_links_sanitize'
    ));

    $wp_customize->add_control(new Knd_Important_Links($wp_customize, 'important_links', array(
        'label' => __('Important Links', 'knd'),
        'section' => 'knd_important_links',
        'settings' => 'knd_important_links'
    )));
    // Theme Important Links Ended


    //Common settings
    $wp_customize->add_setting('text_in_header', array(
        'default'   => '',
        'transport' => 'postMessage',
        'option' => 'option'
    ));
    
    $wp_customize->add_control('text_in_header', array(
        'type'     => 'textarea',       
        'label'    => __('Header text', 'knd'),
        'section'  => 'title_tagline',
        'settings' => 'text_in_header',
        'priority' => 30
    ));
    
    //Images
    /*$wp_customize->add_setting('default_thumbnail', array(
        'default'   => false,
        'transport' => 'refresh', // postMessage
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'default_thumbnail', array(
        'label'    => 'Миниатюра по умолчанию',
        'section'  => 'title_tagline',
        'settings' => 'default_thumbnail',
        'priority' => 60,
    )));*/
    

    //Design section
    $wp_customize->add_panel('knd_decoration', array(
        'priority'       => 25,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Decoration', 'knd'),
    ));

    $wp_customize->add_section( 'knd_decoration_colors', array(
        'title'         => __('Color scheme', 'knd'),
        'priority'      => 20,
        'capability'    => 'edit_theme_options',
        'panel'         => 'knd_decoration',
    ));

    $wp_customize->add_section( 'knd_decoration_logo', array(
        'title'         => __('Logo', 'knd'),
        'priority'      => 30,
        'capability'    => 'edit_theme_options',
        'panel'         => 'knd_decoration',
    ));

   
    $wp_customize->add_setting('knd_main_color', array(
        'default'           => knd_get_deault_main_color(), 
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_setting('knd_color_second', array(
        'default'           => knd_get_deault_main_color(),
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_setting('knd_color_third', array(
        'default'           => knd_get_deault_main_color(),
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    
    $wp_customize->add_setting('knd_text1_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    
    $wp_customize->add_setting('knd_text2_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    
    $wp_customize->add_setting('knd_text3_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    
    $wp_customize->add_setting('knd_custom_logo', array(
        'default'           => '',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_setting('knd_custom_logo_mod', array(
        'default'           => 'image_only',
    ));

    $wp_customize->add_control( 
            new WP_Customize_Color_Control( 
                    $wp_customize, 
                    'knd_main_color', 
                    array(
                        'label'      => __( 'Main Color', 'knd' ),
                        'section'    => 'knd_decoration_colors',
                        'settings'   => 'knd_main_color',
                        'priority'   => 10
                    )) 
            );

    $wp_customize->add_control(
            new WP_Customize_Color_Control(
                    $wp_customize,
                    'knd_color_second',
                    array(
                        'label'      => __( 'Second Color', 'knd' ),
                        'section'    => 'knd_decoration_colors',
                        'settings'   => 'knd_color_second',
                        'priority'   => 11
                    ))
            );
    
    $wp_customize->add_control(
            new WP_Customize_Color_Control(
                    $wp_customize,
                    'knd_color_third',
                    array(
                        'label'      => __( 'Third Color', 'knd' ),
                        'section'    => 'knd_decoration_colors',
                        'settings'   => 'knd_color_third',
                        'priority'   => 12
                    ))
            );
    
    $wp_customize->add_control(
            new WP_Customize_Color_Control(
                    $wp_customize,
                    'knd_text1_color',
                    array(
                        'label'      => __( 'First Text Color', 'knd' ),
                        'section'    => 'knd_decoration_colors',
                        'settings'   => 'knd_text1_color',
                        'priority'   => 13
                    ))
            );
    
    $wp_customize->add_control(
            new WP_Customize_Color_Control(
                    $wp_customize,
                    'knd_text2_color',
                    array(
                        'label'      => __( 'Second Text Color', 'knd' ),
                        'section'    => 'knd_decoration_colors',
                        'settings'   => 'knd_text2_color',
                        'priority'   => 14
                    ))
            );
    
    $wp_customize->add_control(
            new WP_Customize_Color_Control(
                    $wp_customize,
                    'knd_text3_color',
                    array(
                        'label'      => __( 'Third Text Color', 'knd' ),
                        'section'    => 'knd_decoration_colors',
                        'settings'   => 'knd_text3_color',
                        'priority'   => 15
                    ))
            );
    
    $wp_customize->add_control('knd_custom_logo_mod', array(
        'type'     => 'radio',       
        'label'    => __('Logo mode', 'knd'),
        'section'  => 'knd_decoration_logo',
        'settings' => 'knd_custom_logo_mod',
        'priority' => 20,
        'choices'  => array(
            'image_only'    => __('Image only', 'knd'),
            'image_text'    => __('Image with site name', 'knd'),
            'text_only'     => __('Site name only', 'knd'),
            'nothing'       => __('Do not show', 'knd')
        )
    ));

    $wp_customize->add_control( 
        new WP_Customize_Cropped_Image_Control(
        $wp_customize, 
        'knd_custom_logo', 
            array(
                'label'         => __('Logo', 'knd'),
                'description'   => __('Recommended size 315x66px for Image only mode and 66x66px for Image with site name', 'knd'),
                'section'       => 'knd_decoration_logo',
                'settings'      => 'knd_custom_logo',
                'flex_width'    => true, 
                'flex_height'   => false, 
                'width'         => 315,
                'height'        => 66,
                'priority'      => 30
        )) 
    );


    /* homepage */
    //$wp_customize->remove_section('static_front_page');

    $wp_customize->add_panel('knd_homepage', array(
        'priority'       => 25,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Homepage settings', 'knd'),
        'description'    => __('Homepage settings and blocks'),
    ));

    $wp_customize->add_section( 'knd_homepage_hero', array(
        'title'         => __('Hero Image', 'knd'),
        'priority'      => 20,
        'capability'    => 'edit_theme_options',
        'panel'         => 'knd_homepage',
    ));

    
    $wp_customize->get_section ('static_front_page')->panel = 'knd_homepage';
    $wp_customize->get_section ('static_front_page')->title = __('Static page settings', 'knd');

    // move widgets in home
    $homepage_sidebar = $wp_customize->get_section('sidebar-widgets-knd-homepage-sidebar');
    if($homepage_sidebar) {
        $homepage_sidebar->panel = 'knd_homepage';
    }

    // hero image
    $wp_customize->add_setting('knd_hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'absint'
    ));
    
    $wp_customize->add_setting('knd_hero_image_support_text', array(
        'default'   => '',
    ));
    
    $wp_customize->add_setting('knd_hero_image_support_title', array(
        'default'   => '',
    ));
    
    $wp_customize->add_setting('knd_hero_image_support_url', array(
        'default'   => '',
    ));
    
    $wp_customize->add_setting('knd_hero_image_support_button_caption', array(
        'default'   => '',
    ));
    
    $wp_customize->add_control(
            new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'knd_hero_image',
            array(
                'label'         => __('Hero Image', 'knd'),
                'description'   => __('Recommended size 1400x656px', 'knd'),
                'section'       => 'knd_homepage_hero',
                'settings'      => 'knd_hero_image',
                'flex_width'    => true,
                'flex_height'   => false,
                'width'         => 1400,
                'height'        => 656,
                'priority'      => 40
            ))
    );
    
    $wp_customize->add_control('knd_hero_image_support_title', array(
        'type'     => 'text',
        'label'    => __('Call to action title', 'knd'),
        'section'  => 'knd_homepage_hero',
        'settings' => 'knd_hero_image_support_title',
        'priority' => 45
    ));
    
    $wp_customize->add_control('knd_hero_image_support_url', array(
        'type'     => 'text',
        'label'    => __('Call to action URL', 'knd'),
        'section'  => 'knd_homepage_hero',
        'settings' => 'knd_hero_image_support_url',
        'priority' => 45
    ));
    
    $wp_customize->add_control('knd_hero_image_support_text', array(
        'type'     => 'textarea',
        'label'    => __('Call to action text', 'knd'),
        'section'  => 'knd_homepage_hero',
        'settings' => 'knd_hero_image_support_text',
        'priority' => 50
    ));
    
    $wp_customize->add_control('knd_hero_image_support_button_caption', array(
        'type'     => 'text',
        'label'    => __('Action button caption', 'knd'),
        'section'  => 'knd_homepage_hero',
        'settings' => 'knd_hero_image_support_button_caption',
        'priority' => 55,
    ));


    // cta options
    $wp_customize->add_section('knd_cta_block_settings', array(
        'priority' => 60,
        'title' => __('CTA block settings', 'knd'),
    ));
    
    $wp_customize->add_setting('cta-title', array(
        'default'           => '',
    ));
    
    $wp_customize->add_setting('cta-description', array(
        'default'   => '',
    ));
    
    $wp_customize->add_setting('cta-button-caption', array(
        'default'   => '',
    ));
    
    $wp_customize->add_setting('cta-url', array(
        'default'   => '',
    ));
    
    $wp_customize->add_control('cta-title', array(
        'type'     => 'text',
        'label'    => __('Call to action title', 'knd'),
        'section'  => 'knd_cta_block_settings',
        'settings' => 'cta-title',
        'priority' => 40
    ));
    
    $wp_customize->add_control('cta-url', array(
        'type'     => 'text',
        'label'    => __('Call to action URL', 'knd'),
        'section'  => 'knd_cta_block_settings',
        'settings' => 'cta-url',
        'priority' => 45
    ));
    
    $wp_customize->add_control('cta-description', array(
        'type'     => 'textarea',
        'label'    => __('Call to action text', 'knd'),
        'section'  => 'knd_cta_block_settings',
        'settings' => 'cta-description',
        'priority' => 50
    ));
    
    $wp_customize->add_control('cta-button-caption', array(
        'type'     => 'text',
        'label'    => __('Action button caption', 'knd'),
        'section'  => 'knd_cta_block_settings',
        'settings' => 'cta-button-caption',
        'priority' => 55,
    ));
    
    // Social media links
    $wp_customize->add_section('knd_social_links', array(
        'priority' => 40,
        'title' => __('Social networks links', 'knd'),
    ));

    foreach(knd_get_social_media_supported() as $id => $data) {

        $wp_customize->add_setting('knd_social_links_'.$id, array(
            'capability' => 'edit_theme_options',
//            'type' => 'option',
//            'sanitize_callback' => 'knd_sanitize_social_link_'.$id,
        ));

        $wp_customize->add_control('knd_social_links_'.$id, array(
            'label' => $data['label'],
            'description' => $data['description'],
            'type' => 'url',
            'section' => 'knd_social_links',
        ));

    }
    // Social links ended
    
}

add_filter( 'add_menu_classes', 'knd_show_notification_bubble');
function knd_show_notification_bubble( $menu ) {
    
    $notif_count = knd_get_admin_notif_count();
    
    if( $notif_count > 0 ) {
        foreach( $menu as $menu_key => $menu_data ) {
            if( $menu_data[2] == 'knd-setup-wizard' ) {
                $menu[$menu_key][0] .= " <span class='update-plugins' title='".__('Recommended plugins to install', 'knd')."'><span class='plugin-count'>" . $notif_count . '</span></span>';
            }
        }
    }
    
    return $menu;
}

function knd_get_admin_notif_count() {
    
    $not_installed_plugins = 0;
    
    if(is_admin()) {
    
        if( !is_plugin_active('leyka/leyka.php') ) {
            $not_installed_plugins += 1;
        }
        
        if( !is_plugin_active('wordpress-seo/wp-seo.php') ) {
            $not_installed_plugins += 1;
        }
        
        if( !is_plugin_active('cyr3lat/cyr-to-lat.php') ) {
            $not_installed_plugins += 1;
        }
        
        if( !is_plugin_active('disable-comments/disable-comments.php') ) {
            $not_installed_plugins += 1;
        }
    }
    
    return $not_installed_plugins;
}
