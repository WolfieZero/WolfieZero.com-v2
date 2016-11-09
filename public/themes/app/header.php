<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="theme-color" content="#000">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="/themes/app/assets/app.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Sans|PT+Sans+Caption">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/styles/atom-one-dark.min.css">
</head>
<body <?php body_class('app site'); ?>>

    <?php if (! is_front_page()) : ?>
        <header class="site-header">
            <div class="container">

                <a href="/" class="site-header__logo title">
                    <span class="gpx gpx--logo"></span>
                    Wolfie<span>Zero</span>
                </a>

                <?php
                    if (has_nav_menu('home')) {
                        wp_nav_menu([
                            'theme_location'  => 'home',
                            'container'       => 'nav',
                            'container_class' => 'nav nav--header',
                        ]);
                    }
               ?>

               <div class="toggle-full-screen-nav site-header__nav-button">
                   <span class="nav-icon"></span>
               </div>

            </div>
        </header>
    <?php endif; ?>
