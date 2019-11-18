<?php

get_template_part('commons/header');

if( have_posts() ){
    while( have_posts() ){
        the_post();
        global $post, $title, $basePages;
        $basePages = '/src/php/single/';
        $title = get_the_title($post->ID);
        $file = get_template_directory().$basePages.$post->post_type.'.php';
            echo '<div id="page-container">';
                if(@file_exists($file)) {
                    echo '<div id="single-'.get_post_type($post->ID).'" class="'.$post->post_name.'">';
                        get_template_part( $basePages.$post->post_type );
                    echo '</div>';     
                } else {
                    get_template_part( '/src/php/pages/costruzione' );
                }
            echo '</div>';
    }
}

get_template_part('commons/footer');