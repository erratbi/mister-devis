<?php


namespace App;


use Sober\Controller\Controller;


class App extends Controller {
    
    public function siteName() {
        
        return get_bloginfo( 'name' );
    }
    
    public static function title() {
        
        if ( is_home() ) {
            if ( $home = get_option( 'page_for_posts', true ) ) {
                return get_the_title( $home );
            }
            
            return __( 'Latest Posts', 'sage' );
        }
        if ( is_archive() ) {
            return get_the_archive_title();
        }
        if ( is_search() ) {
            return sprintf( __( 'Search Results for %s', 'sage' ), get_search_query() );
        }
        if ( is_404() ) {
            return __( 'Not Found', 'sage' );
        }
        
        return get_the_title();
    }
    
    public static function permalink( $id = null ) {
        
        if ( ! $id ) {
            global $post;
            
            return esc_url( get_permalink( $post->ID ) );
        } else {
            return esc_url( get_permalink( $id ) );
        }
    }
    
    public static function sub_pages( $id = null, $exclude = null ) {
        
        if ( ! $id ) {
            global $post;
            
            return get_pages( [ 'exclude' => $exclude, 'sort_column' => 'menu_order', 'parent' => $post->ID ] );
        } else {
            return get_pages( [ 'exclude' => $exclude, 'sort_column' => 'menu_order', 'parent' => $id ] );
        }
    }
    
    
    public function first_level_pages() {
        
        $page = get_page_by_path( 'categories' );
        
        return get_pages( [ 'parent' => $page->ID ] );
    }
}
