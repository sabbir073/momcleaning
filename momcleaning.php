<?php
/**
* @package Momcleaning
*/
/*
Plugin Name:  Momcleaning API
Plugin URI:   https://github.com/sabbir073
Description:  Momcleaning api support for Vonigo. use shortcode [momcleaning_form_en] [momcleaning_form_fr] to show the form.
Version:      1.0.0
Author:       Md Sabbir Ahmed
Author URI:   https://facebook.com/Fun2uze
License:      GPLv2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  Momcleaning
*/

defined( 'ABSPATH' ) or die( 'Hey! You can not access to this' );

function momcleaning_script(){
    if ( ! wp_script_is( 'jquery', 'enqueued' )) {
        //registering
        wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', null, null, true );
    }
}

add_action( 'wp_enqueue_scripts', 'momcleaning_script' );


function momcleaning_shortcode_en($attr){

    if ( ! wp_script_is( 'jquery', 'enqueued' )) {
        wp_enqueue_script('jquery');
    }

    ob_start();
    require_once(plugin_dir_path( __FILE__ ) . 'includes/form-en.php');
    $includedhtml = ob_get_contents();
    ob_end_clean();

    return $includedhtml;

}

add_shortcode('momcleaning_form_en', 'momcleaning_shortcode_en');

function momcleaning_shortcode_fr($attr){

    if ( ! wp_script_is( 'jquery', 'enqueued' )) {
        wp_enqueue_script('jquery');
    }

    ob_start();
    require_once(plugin_dir_path( __FILE__ ) . 'includes/form-fr.php');
    $includedhtml = ob_get_contents();
    ob_end_clean();

    return $includedhtml;

}

add_shortcode('momcleaning_form_fr', 'momcleaning_shortcode_fr');