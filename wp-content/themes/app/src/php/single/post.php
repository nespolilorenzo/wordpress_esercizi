<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hp-bg-right.svg"  class="bg-hp right-bg" alt="therakhalfmarathon"/>
<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hp-bg-left.svg" class="bg-hp left-bg" alt="therakhalfmarathon"/> 


<div class="single-post-wrapper post-<?php print $post->ID; ?>">
    <?php
    $cover = get_post_thumbnail_id($post->ID);
    $cover = wp_get_attachment_image_src($cover,'large');
    ?>
    <div class="post-cover" style="background-image:url('<?php print $cover[0]; ?>');background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
        <!-- <img src="<?php print $cover[0]; ?>" alt="<?php print $post->post_title; ?>" /> -->
    </div>
    <div class="post-container">
        <div class="post-meta">
            <?php print get_the_date('j M, Y'); ?>
        </div>
        <div class="post-title">
            <h1><?php print get_the_title(); ?></h1>
        </div>
        <div class="post-entry">
            <?php the_content(); ?>
        </div>
        <div class="cont-flex">
        <?php if(get_field('pdfeng')['url'] != ''){ ?>
        <a href="<?php echo get_field('pdfeng')['url']?>" class="button-radius">download english language</a>
        <?php } ?>
        <?php if(get_field('pdfar')['url'] != ''){ ?>
        <a href="<?php echo get_field('pdfar')['url']?>" class="button-radius">download arabic language</a>
        <?php }  ?>
</div>
    </div>
</div>