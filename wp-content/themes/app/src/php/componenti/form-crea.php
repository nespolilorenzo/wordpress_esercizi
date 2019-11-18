<form method="post">
    <h3>Crea il tuo post</h3>
    
    <div class="form-group">
        <label for="Title">Inserisci il titolo</label>
        <input type="text" name="Title" id="Title" class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="Content">Inserisci il contenuto</label>
        <textarea name="Content" id="Content" rows="4" cols="20" class="form-control"></textarea>
    </div>
    
    <!-- <p><?php //wp_dropdown_categories( 'show_option_none=Category&tab_index=4&taxonomy=category' ); ?></p> -->

    <p><label for="post_tags">Che tag deve avere ?</label>

    <input type="text" value="" tabindex="5" size="16" name="post_tags" id="post_tags" /></p>

    <button type="submit" class="btn btn-primary" id="creapost">Crea post</button>
    
    <input type="hidden" name="post_type" id="post_type" value="my_custom_post_type" />

    <?php wp_nonce_field( 'creapost_action', 'crea_il_post' ); ?>
</form>
