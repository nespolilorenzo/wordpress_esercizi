<?php
// creare endpoint personalizzati 
add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1/','ajax', array(
        'methods' => 'GET',
        'callback' => 'my_ajax_func',
    ) );
} );

function my_ajax_func() {
    $data = [];
    $args = [
        'post_type' => 'post',
        'posts_per_page' => -1,
    ];
    $loop = new WP_QUERY( $args );
    while ( $loop->have_posts() ) {
        $loop->the_post();
        global $post;
        array_push($data, [
            'nome' => get_the_title(),
            'content' => get_the_content()
        ]);
    }
    return $data;
    wp_reset_postdata();
    wp_reset_query();
}

// Creo Api per le mie domande quiz game

add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1/','domande', array(
        'methods' => 'GET',
        'callback' => 'my_ajax_question',
    ) );
} );

function my_ajax_question() {
    $data = [];
    $args = [
        'post_type' => 'domande',
        'posts_per_page' => -1,
    ];
    $loop = new WP_QUERY( $args );
    while ( $loop->have_posts() ) {
        $loop->the_post();
        global $post;
        array_push($data, [
            'Domanda' => get_the_title(),
            'Rs1' => get_field('risposta_uno'),
            'Rs2' => get_field('risposta_due'),
            'Rs3' => get_field('risposta_tre'),
            'Rs4' => get_field('risposta_quattro'),
            'RsG' => get_field('risposta_uno')
        ]);
    }
    return $data;
    wp_reset_postdata();
    wp_reset_query();
}