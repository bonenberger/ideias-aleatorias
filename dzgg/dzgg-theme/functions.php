<?php
function dzgg_enqueue() { wp_enqueue_style('dzgg-style', get_stylesheet_uri()); }
add_action('wp_enqueue_scripts', 'dzgg_enqueue');

add_action('after_setup_theme', function() { register_nav_menus(array('header-menu' => 'Menu Principal')); });

function dzgg_customize_register($wp_customize) {
    if( ! class_exists( 'WP_Customize_Image_Control' ) ) return;
    $wp_customize->add_section('dzgg_hero_section', array(
        'title' => 'Imagem do Hero (Capa)',
        'priority' => 30,
    ));
    $wp_customize->add_setting('dzgg_hero_img', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'dzgg_hero_img_ctrl', array(
        'label' => 'Upload da Imagem do Topo',
        'section' => 'dzgg_hero_section',
        'settings' => 'dzgg_hero_img',
    )));
}
add_action('customize_register', 'dzgg_customize_register');
