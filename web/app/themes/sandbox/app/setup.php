<?php


namespace App;


use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;


/**
 * Theme assets
 */
add_action( 'wp_enqueue_scripts', function () {
    
    wp_enqueue_style( 'sage/main.css', asset_path( 'styles/main.css' ), false, null );
    wp_enqueue_script( 'sage/main.js', asset_path( 'scripts/main.js' ), [ 'jquery' ], null, true );
    wp_localize_script( 'sage/main.js', 'wpadmin', [ 'ajax_url' => admin_url( 'admin-ajax.php' ) ] );
}, 100 );

/**
 * Theme setup
 */
add_action( 'after_setup_theme', function () {
    
    /**
     * Enable features from Soil when plugin is activated
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support( 'soil-clean-up' );
    add_theme_support( 'soil-jquery-cdn' );
    add_theme_support( 'soil-nav-walker' );
    add_theme_support( 'soil-nice-search' );
    add_theme_support( 'soil-relative-urls' );
    
    /**
     * Enable plugins to manage the document title
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support( 'title-tag' );
    
    /**
     * Register navigation menus
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus( [
        'primary_navigation'  => __( 'Primary Navigation', 'sage' ),
        'travaux_footer_menu' => __( 'TRAVAUX Mister Devis', 'sage' ),
        'deco_footer_menu'    => __( 'DECO Mister Devis', 'sage' ),
        'jardin_footer_menu'  => __( 'JARDIN Mister Devis', 'sage' ),
    ] );
    
    /**
     * Enable post thumbnails
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );
    
    /**
     * Enable HTML5 markup support
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );
    
    /**
     * Enable selective refresh for widgets in customizer
     *
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support( 'customize-selective-refresh-widgets' );
    
    /**
     * Use main stylesheet for visual editor
     *
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style( asset_path( 'styles/main.css' ) );
}, 20 );

/**
 * Register sidebars
 */
add_action( 'widgets_init', function () {
    
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ];
    register_sidebar( [
                          'name' => __( 'Primary', 'sage' ),
                          'id'   => 'sidebar-primary',
                      ] + $config );
    register_sidebar( [
                          'name' => __( 'Footer', 'sage' ),
                          'id'   => 'sidebar-footer',
                      ] + $config );
} );

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action( 'the_post', function ( $post ) {
    
    sage( 'blade' )->share( 'post', $post );
} );

/**
 * Setup Sage options
 */
add_action( 'after_setup_theme', function () {
    
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton( 'sage.assets', function () {
        
        return new JsonManifest( config( 'assets.manifest' ), config( 'assets.uri' ) );
    } );
    
    /**
     * Add Blade to Sage container
     */
    sage()->singleton( 'sage.blade', function ( Container $app ) {
        
        $cachePath = config( 'view.compiled' );
        if ( ! file_exists( $cachePath ) ) {
            wp_mkdir_p( $cachePath );
        }
        ( new BladeProvider( $app ) )->register();
        
        return new Blade( $app['view'] );
    } );
    
    /**
     * Create @asset() Blade directive
     */
    sage( 'blade' )->compiler()->directive( 'asset', function ( $asset ) {
        
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    } );
} );


/**
 * Create custom tables
 */


add_action( 'after_switch_theme', function () {
    
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $client_table    = $wpdb->prefix . 'particulier';
    $artisan_table   = $wpdb->prefix . 'artisan';
    
    $sql = <<<EOD
    CREATE TABLE {$client_table} (
		id mediumint(9) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		nom VARCHAR(30) NOT NULL,
		prenom VARCHAR(30) NOT NULL,
		email VARCHAR(120) NOT NULL,
		telephone VARCHAR(20) NOT NULL,
		type_propriete VARCHAR(30) NOT NULL,
		type_batiment VARCHAR(30) NOT NULL,
		type_travaux VARCHAR(30) NOT NULL,
		delai_souhaite VARCHAR(30) NOT NULL,
		observation TEXT NULL
	) {$charset_collate};


    CREATE TABLE {$artisan_table} (
		id mediumint(9) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		nom VARCHAR(30) NOT NULL,
		prenom VARCHAR(30) NOT NULL,
		email VARCHAR(120) NOT NULL,
		telephone_portable VARCHAR(20) NOT NULL,
		telephone_fixe VARCHAR(20) NOT NULL,
		login VARCHAR(20) NOT NULL,
		pass VARCHAR(255) NOT NULL,
		horaireRDV VARCHAR(30) NOT NULL,
		code_postal VARCHAR(10) NOT NULL,
		raison_sociale VARCHAR(30) NOT NULL,
		id_activite VARCHAR(30) NOT NULL
	) {$charset_collate};
EOD;
    
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
} );


/*------------------------------------*\
	Breadcrumbs Function
\*------------------------------------*/
function custom_breadcrumbs() {
    
    // Settings
    $breadcrums_id    = 'breadcrumbs';
    $breadcrums_class = 'breadcrumbs';
    $home_title       = 'Accueil';
    
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy = 'product_cat';
    
    // Get the query & post information
    global $post, $wp_query;
    
    // Do not display on the homepage
    if ( ! is_front_page() ) {
        
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
        
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '"><i class="fa fa-home"></i> ' . $home_title . '</a></li>';
        
        if ( is_archive() && ! is_tax() && ! is_category() && ! is_tag() ) {
            
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title( $prefix, false ) . '</strong></li>';
            
        } else if ( is_archive() && is_tax() && ! is_category() && ! is_tag() ) {
            
            // If post is a custom post type
            $post_type = get_post_type();
            
            // If it is a custom post type display name and link
            if ( $post_type != 'post' ) {
                
                $post_type_object  = get_post_type_object( $post_type );
                $post_type_archive = get_post_type_archive_link( $post_type );
                
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                
            }
            
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
            
        } else if ( is_single() ) {
            
            // If post is a custom post type
            $post_type = get_post_type();
            
            // If it is a custom post type display name and link
            if ( $post_type != 'post' ) {
                
                $post_type_object  = get_post_type_object( $post_type );
                $post_type_archive = get_post_type_archive_link( $post_type );
                
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                
            }
            
            // Get post category info
            $category = get_the_category();
            
            if ( ! empty( $category ) ) {
                
                // Get last category post is in
                $last_category = end( array_values( $category ) );
                
                // Get parent any categories and create array
                $get_cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
                $cat_parents     = explode( ',', $get_cat_parents );
                
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach ( $cat_parents as $parents ) {
                    $cat_display .= '<li class="item-cat">' . $parents . '</li>';
                }
                
            }
            
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists( $custom_taxonomy );
            if ( empty( $last_category ) && ! empty( $custom_taxonomy ) && $taxonomy_exists ) {
                
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link( $taxonomy_terms[0]->term_id, $custom_taxonomy );
                $cat_name       = $taxonomy_terms[0]->name;
                
            }
            
            // Check if the post is in a category
            if ( ! empty( $last_category ) ) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                
                // Else if post is in a custom taxonomy
            } else if ( ! empty( $cat_id ) ) {
                
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                
            } else {
                
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                
            }
            
        } else if ( is_category() ) {
            
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title( '', false ) . '</strong></li>';
            
        } else if ( is_page() ) {
            
            // Standard page
            if ( $post->post_parent ) {
                
                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );
                
                // Get parents in the right order
                $anc = array_reverse( $anc );
                
                // Parent page loop
                if ( ! isset( $parents ) ) {
                    $parents = null;
                }
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink( $ancestor ) . '" title="' . get_the_title( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a></li>';
                }
                
                // Display parent pages
                echo $parents;
                
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                
            } else {
                
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                
            }
            
        } else if ( is_tag() ) {
            
            // Tag page
            
            // Get tag information
            $term_id       = get_query_var( 'tag_id' );
            $taxonomy      = 'post_tag';
            $args          = 'include=' . $term_id;
            $terms         = get_terms( $taxonomy, $args );
            $get_term_id   = $terms[0]->term_id;
            $get_term_slug = $terms[0]->slug;
            $get_term_name = $terms[0]->name;
            
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
            
        } else if ( is_day() ) {
            
            // Day archive
            
            // Year link
            echo '<li class="item-year item-year-' . get_the_time( 'Y' ) . '"><a class="bread-year bread-year-' . get_the_time( 'Y' ) . '" href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' Archives</a></li>';
            
            // Month link
            echo '<li class="item-month item-month-' . get_the_time( 'm' ) . '"><a class="bread-month bread-month-' . get_the_time( 'm' ) . '" href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '" title="' . get_the_time( 'M' ) . '">' . get_the_time( 'M' ) . ' Archives</a></li>';
            
            // Day display
            echo '<li class="item-current item-' . get_the_time( 'j' ) . '"><strong class="bread-current bread-' . get_the_time( 'j' ) . '"> ' . get_the_time( 'jS' ) . ' ' . get_the_time( 'M' ) . ' Archives</strong></li>';
            
        } else if ( is_month() ) {
            
            // Month Archive
            
            // Year link
            echo '<li class="item-year item-year-' . get_the_time( 'Y' ) . '"><a class="bread-year bread-year-' . get_the_time( 'Y' ) . '" href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' Archives</a></li>';
            
            // Month display
            echo '<li class="item-month item-month-' . get_the_time( 'm' ) . '"><strong class="bread-month bread-month-' . get_the_time( 'm' ) . '" title="' . get_the_time( 'M' ) . '">' . get_the_time( 'M' ) . ' Archives</strong></li>';
            
        } else if ( is_year() ) {
            
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time( 'Y' ) . '"><strong class="bread-current bread-current-' . get_the_time( 'Y' ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' Archives</strong></li>';
            
        } else if ( is_author() ) {
            
            // Auhor archive
            
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
            
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
            
        } else if ( get_query_var( 'paged' ) ) {
            
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var( 'paged' ) . '"><strong class="bread-current bread-current-' . get_query_var( 'paged' ) . '" title="Page ' . get_query_var( 'paged' ) . '">' . __( 'Page' ) . ' ' . get_query_var( 'paged' ) . '</strong></li>';
            
        } else if ( is_search() ) {
            
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Résultats pour : ' .
                 get_search_query() . '">Résultats pour : ' .
                 get_search_query() . '</strong></li>';
            
        } else if ( is_404() ) {
            
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
        
        echo '</ul>';
        
    }
    
}
