<div class="comment-section">
    <div class="container">
    <?php
        $args = array(
            'post_id'   => get_the_ID(),
        );
        $comments = get_comments($args);
        $count_comment = 0;
        foreach ($comments as $comment) {
            if($comment->comment_approved == 1){
                $count_comment ++;
            }
        }       
        if( $count_comment != 0){
    ?>
    <h2><?php
        if( $count_comment > 1){
            echo  $count_comment.' commenti';
        }else{
            echo  $count_comment.' commento';
        }
        ?>
    </h2>

        <?php
        foreach ($comments as $comment) {
            if($comment->comment_approved == 1){ ?>
                <hr/>
                <div class="comment-head" id="comment-<?php print $comment->comment_ID; ?>">
                    <div class="first-line">
                        <h4><?= $comment->comment_author ?></h4>
                        <span>
                            <?php 
                                $date = date_create($comment->comment_date);
                                $date = date_format($date, 'U');
                                echo human_time_diff( $date, current_time( 'timestamp' ) ). ' fa';
                            ?>
                        </span>
                    </div>
                    <p><?= $comment->comment_content ?></p>
                </div>
            <?php
            }
        }
    }
    $commenter = wp_get_current_commenter();
    $fields =  array(
        'author' =>
            '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ).
          '<span class="required"> *</span></label>' .
            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ).
            '" size="30" aria-required="true" required /></p>',
        'email' =>
            '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ).
            '<span class="required"> (optional)</span></label>' .
            '<input id="email" name="email" type="text" required value="' . esc_attr(  $commenter['comment_author_email'] ).
            '" size="30" aria-required="false" /></p>',
        );

    $comments_args = array(
        // Change the title of send button 
        'label_submit' => 'invia',
        // Remove "Text or HTML to be displayed after/before the set of comment fields".
        'comment_notes_after' => '',
        'comment_notes_before' => '',
        // Redefine your own textarea (the comment body).
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        'comment_field' => '<p class="comment-form-comment"><label for="comment">Messaggio</label><br /><textarea id="comment" name="comment" required aria-required="true"></textarea></p>'
    );
    comment_form($comments_args);
    ?>
    </div>
</div>