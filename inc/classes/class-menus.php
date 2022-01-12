<?php

/**
 * Menus Jupiter theme.
 * 
 * @package Jupiter
 */

namespace JUPITER_THEME\Inc;

use JUPITER_THEME\Inc\Traits\Singleton;

class Menus {
    use Singleton;

    protected function  __construct(){

        $this->setup_hooks();
    }

    protected function setup_hooks(){
        //actions and filters 
        add_action('init', [$this, 'register_menus']);
    }

    public function register_menus(){
        register_nav_menus( [
            'Jupiter-header-menu' => esc_html__( 'Header Menu', 'Jupiter' ),
            'Jupiter-footer-menu'  => esc_html__( 'Footer Menu', 'Jupiter' )
        ] );
    }

    public function get_menu_id( $location ){
        //Get all locations.
        $locations = get_nav_menu_locations();
    
        // Get Object id by location.
        $menu_id = $locations[$location];

        return ! empty( $menu_id ) ? $menu_id : '';
        
    }
    public function get_child_menu_items( $menu_arry, $parent_id){
        $child_menus = [];

        if( ! empty($menu_arry) && is_array( $menu_arry )){
            foreach($menu_arry as $menu ){
                if( intval($menu->menu_item_parent) === $parent_id ){
                    array_push( $child_menus, $menu);
                }

            }
        }

        return $child_menus;

    }

}