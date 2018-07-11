<?php

add_action('wp_enqueue_scripts', 'ma_enqueues', 100);

function ma_enqueues(){
    $ver = '1.0.0';

    //Style:

    wp_register_style('main', get_template_directory_uri() . '/css/style.css', false, $ver);
    wp_enqueue_style('main');

    wp_register_style('mgcs', get_template_directory_uri() . '/css/magnific-popup.css', false, $ver);
    wp_enqueue_style('mgcs');

    wp_register_style('fonts', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900|Noto+Serif', false, $ver);
    wp_enqueue_style('fonts');


    //Script:

    wp_register_script('paralax', get_template_directory_uri() . '/js/parallax.min.js', false, $ver, true);
    wp_enqueue_script('paralax');

    wp_register_script('mgjs', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', false, $ver, true);
    wp_enqueue_script('mgjs');

    wp_register_script('mainjs', get_template_directory_uri() . '/js/main.js', false, $ver, true);
    wp_enqueue_script('mainjs');




//    if(is_front_page()){
//
//    }


}


?>