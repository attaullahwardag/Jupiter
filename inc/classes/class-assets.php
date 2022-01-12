<?php
/**
 * Enqueue theme assets
 * 
 * @package Jupiter
 */

namespace JUPITER_THEME\Inc;

use JUPITER_THEME\Inc\Traits\Singleton;
class Assets{
    use Singleton;

    protected function  __construct(){

        $this->setup_hooks();
    }

    protected function setup_hooks(){
        //actions and filters 
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles(){
        //Registration of styles.
        wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all');
        wp_register_style( 'bootstrap-css', JUPITER_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');

        //Enqueue Styles.
        wp_enqueue_style('style-css');
        wp_enqueue_style('bootstrap-css');
    }

    public function register_scripts(){
        // Registration of Scripts.
        wp_register_script( 'main-js', JUPITER_DIR_URI . '/assets/main.js',[], filemtime( get_template_directory() . '/assets/main.js'), true );
        wp_register_script( 'bootstrap-js', JUPITER_DIR_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true );

        //Enqueue Scripts.
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');

    }
}