<?php

add_action( 'wp_ajax_nopriv_saluta', 'saluta' );
add_action( 'wp_ajax_saluta', 'saluta' );
function saluta() {
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) { 
            echo 'Ciao';
    }
}





