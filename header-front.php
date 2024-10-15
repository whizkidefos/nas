<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . "/images/nas-logo-align-left.png" ?>" type="image/x-icon">
</head>
<?php wp_head(); ?>
<body>

<header class="header-front">
    <nav class="header-front-navigation">
        <div class="logo-wrapper">
            <a href="/" class="nav-logo"><img src="<?php echo get_template_directory_uri() . "/images/nas-logo-align-left.png" ?>" alt="NAS logo"></a>
        </div>

        <div class="alt-desktop-nav">
            <?php
                $args = array(
                    'theme_location' => 'main-menu',
                    'container'      => 'nav',
                    'container_class'=> 'main-menu'
                );
                wp_nav_menu( $args );
            ?>
        </div>

        <div class="cta alt-cta">
            <a href="/join" class="nas-btn-yellow">Join us</a>
        </div>

        <div class="alt-mobile-navigation">
            <?php
                $args = array(
                    'theme_location' => 'main-menu',
                    'container'      => 'nav',
                    'container_class'=> 'main-menu'
                );
                wp_nav_menu( $args );
            ?>

            <div class="cta">
                <a href="/join" class="nas-btn-yellow">Join us</a>
            </div>
            <!-- <i class="fa-solid fa-xmark"></i> -->
        </div>

        <div class="mobile-toggle">
            <i class="fa-solid fa-grip-lines"></i>
        </div>
    </nav>
</header>

<main class="">