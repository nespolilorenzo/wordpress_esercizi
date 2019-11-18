<?php 
    //loop custom post type privati
    global $current_user;
	$wpquery = new WP_Query(array(
        'post_type'      => 'area-riservata',
        'author'        =>  $current_user->ID, // visualizzo solo quelli creati da lui
	));
	while ($wpquery->have_posts()): $wpquery->the_post();
    ?>
    <div class="post">
        <h2><?php the_title(); ?></h2>
    </div>
    <?php endwhile; ?>

    