    <h1>Area riservata</h1>
    <hr />
    <?php
    
    //se l'utente è loggato mostra messaggio di benvenuto e post
	if ( is_user_logged_in() ) {
        global $current_user; 
        wp_get_current_user(); 
        echo 'Benvenuto, '. $current_user->user_login ; 
        
        ?>
    <hr />
    
    <!-- Mostro contenuti privati  -->
    <?php 
        get_template_part('src/php/componenti/contenuti-privati');
        // se l'utente è loggato mostro possibilità di logout
        get_template_part('src/php/componenti/logaut');
    } else {
    
            // includo modulo Login 
            get_template_part('src/php/componenti/login'); 
            // includo modulo registrazione 
            get_template_part('src/php/componenti/registration'); 
        
    } ?>


