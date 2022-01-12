<?php
/**
 * Bootstrap Jupiter Theme.
 * 
 * @package Jupiter
 */
namespace JUPITER_THEME\Inc;

use JUPITER_THEME\Inc\Traits\Singleton;
class JUPITER_THEME {
    use Singleton;

    protected function  __construct(){
        //load classes
        Assets::get_instance();
        Menus::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        //actions
        
        add_action( 'after_setup_theme', [$this, 'setup_theme'] );

    }

    public function setup_theme(){
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo', [
            'header-text' => [ 'site-title', 'site-description' ],
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        ] );

        $defaults = array(
            'default-image'          => '',
            'default-preset'         => 'default', // 'default', 'fill', 'fit', 'repeat', 'custom'
            'default-position-x'     => 'left',    // 'left', 'center', 'right'
            'default-position-y'     => 'top',     // 'top', 'center', 'bottom'
            'default-size'           => 'auto',    // 'auto', 'contain', 'cover'
            'default-repeat'         => 'repeat',  // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
            'default-attachment'     => 'scroll',  // 'scroll', 'fixed'
            'default-color'          => '',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => '',
            'admin-preview-callback' => '',
        );

        add_theme_support( 'custom-background', $defaults);

        add_theme_support('post-thumbnails');
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
        add_editor_style();
        add_theme_support( 'wp-block-styles');
        add_theme_support( 'align-wide');

        global $content_width;
        if( ! isset( $content_width )){
            $content_width = 1240;
        }

    }
}