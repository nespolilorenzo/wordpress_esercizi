<?php
add_theme_support( 'post-thumbnails' ); 

//creo il post type per l'area riservata

add_action('init', 'custompost');
function custompost() {

    $labels = array(
        'name'               => __('Area Riservata'),
        'singular_name'      => __('Contenuto'),
        'add_new'            => __('Aggiungi Contenuto'),
        'add_new_item'       => __('Nuovo Contenuto'),
        'edit_item'          => __('Modifica Contenuto'),
        'new_item'           => __('Nuovo Contenuto'),
        'all_items'          => __('Elenco Contenuti'),
        'view_item'          => __('Visualizza Contenuti'),
        'search_items'       => __('Cerca Contenuto'),
        'not_found'          => __('Contenuto non trovato'),
        'not_found_in_trash' => __('Contenuto non trovato nel cestino'),
    );


    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'rewrite'            => array('slug' => 'contenuti'),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array(
                                'title',
                                'editor',
                                'thumbnail',
                                'comments'
                                ),
    );


    register_post_type('area-riservata', $args);

}

add_action('init', 'domande');
function domande() {

    $labels = array(
        'name'               => __('Domande'),
        'singular_name'      => __('Domanda'),
        'add_new'            => __('Aggiungi Domanda'),
        'add_new_item'       => __('Nuovo Domanda'),
        'edit_item'          => __('Modifica Domanda'),
        'new_item'           => __('Nuovo Domanda'),
        'all_items'          => __('Elenco Contenuti'),
        'view_item'          => __('Visualizza Contenuti'),
        'search_items'       => __('Cerca Domanda'),
        'not_found'          => __('Domanda non trovato'),
        'not_found_in_trash' => __('Domanda non trovato nel cestino'),
    );


    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'rewrite'            => array('slug' => 'domanda'),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array(
                                'title'
                                ),
    );


    register_post_type('domande', $args);

}
