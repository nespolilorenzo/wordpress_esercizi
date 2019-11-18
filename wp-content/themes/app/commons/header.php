<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php print get_the_title().' | '.get_bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="msapplication-TileColor" content="#0d4d8e">
    <meta name="theme-color" content="#0d4d8e">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <script>
        var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
        var siteurl = "<?php echo get_site_url(); ?>";
    </script>
<?php wp_head(); ?>


</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <?php 
            wp_nav_menu(array(
                'menu'       => 'nav_manu',
                'menu_class'        => 'collapse navbar-collapse',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav mr-auto" role="menu" >%3$s</ul>',
            ));
        ?>

    </nav>
</header>

<body <?php body_class(); ?> >