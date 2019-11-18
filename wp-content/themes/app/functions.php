<?php

// Widget
require_once('includes/widget.php');

// Richiamo i post type personalizzati
require_once('includes/custom-post-type.php');

// Richiamo le tassonomie personalizzate
require_once('includes/custom-taxonomies.php');

// ACF
require_once('includes/acf-dev.php');

// Ajax con url custom

require_once('includes/ajax.php');

// importo css e js
add_action( 'wp_enqueue_scripts', 'bottega_init' );
function bottega_init(){
    wp_enqueue_style( 'app', get_template_directory_uri().'/assets/css/app.css' );
    wp_enqueue_script( 'app', get_template_directory_uri().'/assets/js/app.js', array(), false, true );

}

//rendo il post type privato di default

// function force_type_private($post){
//     if ($post['post_type'] == 'area-riservata') {
//         if ($post['post_status'] == 'publish') {
//             $post['post_status'] = 'private';
//         } 
//     }
//     return $post;
// }

// add_filter('wp_insert_post_data', 'force_type_private');


//rendo il post privato visibile al ruolo sottoscrittore
// $subRole = get_role( 'subscriber' );
// $subRole->add_cap( 'read_private_posts' );




//nascondo la barra di wordpress tranne che all' admin
if (!current_user_can('manage_options')) {
	add_filter('show_admin_bar', '__return_false');
}

if (!current_user_can('edit_posts')) {
	add_filter('show_admin_bar', '__return_false');
}


// funzione per rimuovere l'avviso di sicurezza  per il logout

add_action('check_admin_referer', 'logout_without_confirm', 10, 2);
function logout_without_confirm($action, $result)
{
    /**
     * Allow logout without confirmation
     */
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
        $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : 'home';
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));
        header("Location: $location");
        die;
    }
}

// richiamo le api custom 
require 'api.php';