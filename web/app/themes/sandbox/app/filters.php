<?php


namespace App;


/**
 * Add <body> classes
 */
add_filter( 'body_class', function ( array $classes ) {
    
    /** Add page slug if it doesn't exist */
    if ( is_single() || is_page() && ! is_front_page() ) {
        if ( ! in_array( basename( get_permalink() ), $classes ) ) {
            $classes[] = basename( get_permalink() );
        }
    }
    
    /** Add class if sidebar is active */
    if ( display_sidebar() ) {
        $classes[] = 'sidebar-primary';
    }
    
    /** Clean up class names for custom templates */
    $classes = array_map( function ( $class ) {
        
        return preg_replace( [ '/-blade(-php)?$/', '/^page-template-views/' ], '', $class );
    }, $classes );
    
    return array_filter( $classes );
} );

/**
 * Add "… Continued" to the excerpt
 */
add_filter( 'excerpt_more', function () {
    
    return ' &hellip; <a href="' . get_permalink() . '">' . __( 'Continued', 'sage' ) . '</a>';
} );

/**
 * Template Hierarchy should search for .blade.php files
 */
collect( [
    'index',
    '404',
    'archive',
    'author',
    'category',
    'tag',
    'taxonomy',
    'date',
    'home',
    'frontpage',
    'page',
    'paged',
    'search',
    'single',
    'singular',
    'attachment',
] )->map( function ( $type ) {
    
    add_filter( "{$type}_template_hierarchy", __NAMESPACE__ . '\\filter_templates' );
} );

/**
 * Render page using Blade
 */
add_filter( 'template_include', function ( $template ) {
    
    $data = collect( get_body_class() )->reduce( function ( $data, $class ) use ( $template ) {
        
        return apply_filters( "sage/template/{$class}/data", $data, $template );
    }, [] );
    if ( $template ) {
        echo template( $template, $data );
        
        return get_stylesheet_directory() . '/index.php';
    }
    
    return $template;
}, PHP_INT_MAX );

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter( 'comments_template', function ( $comments_template ) {
    
    $comments_template = str_replace(
        [ get_stylesheet_directory(), get_template_directory() ],
        '',
        $comments_template
    );
    
    return template_path( locate_template( [ "views/{$comments_template}", $comments_template ] ) ?: $comments_template );
} );


/**
 * Shortcodes
 */


add_shortcode( 'mrdevis-search-form', function () {
    
    return template( 'partials/artisan-search-form' );
} );


add_shortcode( 'mrdevis-home-top-categories', function () {
    
    return template( 'partials/home-top-categories' );
} );


add_shortcode( 'mrdevis-client-form', function () {
    
    return template( 'partials/client-form' );
} );


/**
 * Ajax callbacks
 */
add_action( 'wp_ajax_client_form', __NAMESPACE__ . '\\client_form_callback' );
add_action( 'wp_ajax_nopriv_client_form', __NAMESPACE__ . '\\client_form_callback' );
function client_form_callback() {
    
    global $wpdb;
    
    $activity_mapping = [
        'Climatisation Réversible' => 16,
        'Cuisine'                  => 12,
        'Cuisine en Kit'           => 12,
        'Cuisine sur Mesure'       => 12,
        'Salle de Bains'           => 13,
        'Salle de Bains Sénior'    => 13,
        'Sauna & Hammam'           => 14,
        'Spa & Bain à Bulles'      => 15,
    ];
    
    $data = [
        'nom'            => stripslashes( $_POST['nom'] ),
        'prenom'         => stripslashes( $_POST['prenom'] ),
        'email'          => stripslashes( $_POST['email'] ),
        'telephone'      => stripslashes( $_POST['telephone'] ),
        'type_propriete' => stripslashes( $_POST['type_propriete'] ),
        'type_batiment'  => stripslashes( $_POST['type_batiment'] ),
        'type_travaux'   => stripslashes( $_POST['type_travaux'] ),
        'delai_souhaite' => stripslashes( $_POST['delai_souhaite'] ),
        'observation'    => stripslashes( $_POST['observation'] ),
    ];
    
    
    $wpdb->insert( $wpdb->prefix . 'particulier', $data );
    
    $data['id_activite'] = $activity_mapping[ stripslashes( $_POST['cat'] ) ];
    
    remote_client_signup( $data );
    
    wp_die();
}


add_action( 'wp_ajax_artisan_form', __NAMESPACE__ . '\\artisan_form_callback' );
add_action( 'wp_ajax_nopriv_artisan_form', __NAMESPACE__ . '\\artisan_form_callback' );
function artisan_form_callback() {
    
    global $wpdb;
    
    
    $activity_mapping = [
        'ALARME'         => 16,
        'CUISINE'        => 12,
        'PISCINE'        => 9,
        'SALLE BAIN'     => 13,
        'CLIMATISATION'  => 16,
        'ENERGIES '      => 16,
        'TRAITEMENT'     => 16,
        'CHAUFFAGE'      => 10,
        'DEMENAGEMENT'   => 16,
        'GROS OEUVRES'   => 16,
        'SECOND OEUVRES' => 16,
        'FENETRE'        => 11,
        'AUTRE'          => 11,
    ];
    
    $data = [
        'nom'                => stripslashes( $_POST['nom'] ),
        'prenom'             => stripslashes( $_POST['prenom'] ),
        'email'              => stripslashes( $_POST['email'] ),
        'telephone_portable' => stripslashes( $_POST['telephone_portable'] ),
        'telephone_fixe'     => stripslashes( $_POST['telephone_fixe'] ),
        'login'              => stripslashes( $_POST['login'] ),
        'pass'               => md5( stripslashes( $_POST['pass'] ) ),
        'horaireRDV'         => stripslashes( $_POST['horaireRDV'] ),
        'code_postal'        => stripslashes( $_POST['code_postal'] ),
        'raison_sociale'     => stripslashes( $_POST['raison_sociale'] ),
        'id_activite'        => $activity_mapping[ stripslashes( $_POST['id_activite'] ) ],
    ];
    
    
    $wpdb->insert( $wpdb->prefix . 'artisan', $data );
    
    
    remote_artisan_signup( $data );
    
    wp_die();
}


function remote_client_signup( $data ) {
    
    
    // TODO: Change to the real remote API
    $url = 'http://www.webonline2018.com/api';
    
    
    // Gathering data
    $data = [
        'PRENOM_PARTICULIER' => urlencode( $data['prenom'] ),
        'NOM_PARTICULIER'    => urlencode( $data['nom'] ),
        'EMAIL'              => urlencode( $data['email'] ),
        'TELEPHONE_PORTABLE' => urlencode( $data['phone'] ),
        'TYPE_PROPRIETE'     => urlencode( $data['type_propriete'] ),
        'TYPE_TRAVAUX'       => urlencode( $data['type_travaux'] ),
        'TYPE_BATIMENT'      => urlencode( $data['type_batiment'] ),
        'DELAIL_SOUHAITE'    => urlencode( $data['delai_souhaite'] ),
        'OBSERVATION'        => urlencode( $data['observation'] ),
        'ID_ACTIVITE'        => urlencode( $data['id_activite'] ),
        'ID_FORM'            => 3,
    ];
    
    // Sending data via cURL
    $ch = curl_init( $url );
    
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt( $ch, CURLOPT_POSTREDIR, 3 );
    curl_exec( $ch );
}


function remote_artisan_signup( $data ) {
    
    
    // TODO: Change to the real remote API
    $url = 'http://www.webonline2018.com/api';
    
    
    // Gathering data
    $data = [
        
        'PRENOM_ARTISAN'     => urlencode( $data['prenom'] ),
        'NOM_ARTISAN'        => urlencode( $data['nom'] ),
        'RAISON_SOCIALE'     => urlencode( $data['raison_sociale'] ),
        'CODE_POSTAL'        => urlencode( $data['code_postal'] ),
        'TELEPHONE_FIXE'     => urlencode( $data['telephone_fixe'] ),
        'TELEPHONE_PORTABLE' => urlencode( $data['telephone_portable'] ),
        'EMAIL_ARTISAN'      => urlencode( $data['email'] ),
        'HORAIRERDV'         => urlencode( $data['horaireRDV'] ),
        'ID_ACTIVITE'        => urlencode( $data['id_activite'] ),
        'LOGIN'              => urlencode( $data['login'] ),
        'PASS'               => urlencode( $data['pass'] ),
        'ID_FORM'            => 2,
    
    ];
    
    // Sending data via cURL
    $ch = curl_init( $url );
    
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt( $ch, CURLOPT_POSTREDIR, 3 );
    curl_exec( $ch );
}
