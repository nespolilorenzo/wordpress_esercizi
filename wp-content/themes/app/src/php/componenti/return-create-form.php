<?php
// funzione per creare post da frontend
if (isset( $_POST['crea_il_post'] )&& wp_verify_nonce( $_POST['crea_il_post'], 'creapost_action' ) ) {
    
    if ( !isset($_POST['Title']) || strlen($_POST['Title']) < 3 ) {
        echo 'Please enter a title. Titles must be at least three characters long.';
        return;
    }

    if (strlen($_POST['Content']) < 3) {
        echo 'Please enter content more than 100 characters in length';
        return;
    }

    // create post object with the form values
    $my_cptpost_args = array(
    'post_title' => $_POST['Title'], 
    'post_content' => $_POST['Content'],
    // 'post_category' => $_POST['cat'], 
    'tags_input'    => $_POST['post_tags'],
    'post_status' => 'pending',
    'post_type' => 'post'
    );
    // insert the post into the database
    $cpt_id = wp_insert_post( $my_cptpost_args);
    
    echo 'Il tuo post è stato inserito ed è in attesa di conferma';
}