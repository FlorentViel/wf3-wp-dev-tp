<?php

// Activer la gestion des menus avec un menu fictif
add_action('init', 'register_my_menu');
function register_my_menu() {
    register_nav_menu('my-fake-menu', __( 'My Fake Menu' ));
}

function my_theme_styles() {
    wp_enqueue_style("main-style", get_template_directory_uri()."/assets/css/style.css" );
}
add_action( 'wp_loaded', 'my_theme_styles' );