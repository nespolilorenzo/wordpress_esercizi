<?php

function arphabet_widgets_init() {
    if (function_exists('register_sidebar')){
        register_sidebar(array(
            'name'          => 'Footer',
            'id'            => 'footer',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="rounded">',
            'after_title'   => '</h2>'
        ));
    }
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

