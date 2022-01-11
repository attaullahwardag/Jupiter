<?php

/**
 * Theme Functions.
 * 
 * @package Jupiter
 * 
 */

if(! defined('JUPITER_DIR_PATH')){
    define('JUPITER_DIR_PATH', untrailingslashit( get_template_directory() ));
}

if(! defined('JUPITER_DIR_URI')){
    define('JUPITER_DIR_URI', untrailingslashit( get_template_directory_uri() ));
}

require_once JUPITER_DIR_PATH . '/inc/helpers/autoloader.php';

function jupiter_get_theme_instance(){

    \JUPITER_THEME\Inc\JUPITER_THEME::get_instance();
}
 jupiter_get_theme_instance();

function jupiter_enqueue_scripts(){

}
?>