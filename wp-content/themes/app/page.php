<?php
// Smistamento pagine

get_template_part('commons/header');

if( have_posts() ){
    while( have_posts() ){
        the_post();
        global $post, $title, $basePages;
        $basePages = '/src/php/pages/';
        $title = get_the_title($post->ID);
        $file = get_template_directory().$basePages.$post->post_name.'.php';
        
                if(@file_exists($file)) {
                    echo '<div id="page-'.$post->post_name.'" class="container" > ';
                        get_template_part( $basePages.$post->post_name );
                    echo '</div>';     
                } else {
                    get_template_part( '/src/php/pages/costruzione' );
                }

    }
}
get_template_part('commons/footer');
