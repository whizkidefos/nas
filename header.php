<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . "/images/nas-logo-align-left.png" ?>" type="image/x-icon">
</head>
<?php wp_head(); ?>
<body>

<header class="main-header">
    
    <div class="nav-wrapper">
        <div class="logo-wrapper">
            <a href="/" class="nav-logo"><img src="<?php echo get_template_directory_uri() . "/images/nas-logo-align-left.png" ?>" alt="NAS logo"></a>
        </div>
        
        <div class="desktop-navigation">
            <?php
                $args = array(
                    'theme_location' => 'main-menu',
                    'container'      => 'nav',
                    'container_class'=> 'main-menu'
                );
                wp_nav_menu( $args );
            ?>
        </div>

        <div class="desktop-cta">
            <a href="/join" class="nas-btn-yellow">Join us</a>
        </div>

        <div class="mobile-navigation">
            <?php
                $args = array(
                    'theme_location' => 'main-menu',
                    'container'      => 'nav',
                    'container_class'=> 'main-menu'
                );
                wp_nav_menu( $args );
            ?>

            <a href="/join" class="nas-btn-yellow">Join us</a>
        </div>

        <div class="burger">
            <span class="burger-bar"></span>
        </div>
        
    </div>  
</header>

<main class="main-website-content">