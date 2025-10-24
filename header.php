<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- Header & Navigation -->
    <header class="header">
        <nav class="nav">
            <div class="container">
                <div class="nav-brand">
                    <a href="#home" class="logo">DevPortfolio</a>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-menu',
                    'container' => false,
                    'fallback_cb' => false,
                ));
                ?>
            </div>
        </nav>
    </header>