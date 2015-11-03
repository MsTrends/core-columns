<?php 

/*
Plugin Name: Core Columns
Plugin URI: http://mstrends.com/plugins/trend-shortcodes
Description: Enables columns shortcodes for WordPress.
Version: 1.0
Author: Muhamamd Faisal
Author URI: http://themeforest.net/user/MsTrends
*/


#-----------------------------------------------------------------#
# If this file is called directly, abort.
#-----------------------------------------------------------------# 

    if ( ! defined( 'WPINC' ) ) {
        die;
    }


#-----------------------------------------------------------------#
# Loads the Core Plugin Classes
#-----------------------------------------------------------------# 

    require_once( DIRNAME(__FILE__) . '/inc/class_shortcodes.php' );


#-----------------------------------------------------------------#
# Setup Core Plugin (fires on every page load)
#-----------------------------------------------------------------# 

    function ms_setup_col_shortcodes() {

        // initiate classes
        new MS_COL_SHORTCODES();

    }

    ms_setup_col_shortcodes();


#-----------------------------------------------------------------#
# Register and Enqueue JS & CSS for Shortcodes
#-----------------------------------------------------------------# 


    function ms_enqueue_col_shortcodes_scripts() {
        if ( !is_admin() ) {

            // Register CSS
            wp_register_style('col-shortcodes-style', plugin_dir_url(__FILE__) . 'css/style.css');

            // Enqueue CSS
            wp_enqueue_style('col-shortcodes-style');

        }
    }

    add_action( 'wp_enqueue_scripts', 'ms_enqueue_col_shortcodes_scripts' );