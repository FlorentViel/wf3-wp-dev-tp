<?php

// Activer la gestion des menus avec un menu fictif
add_action('init', 'register_my_menu');
function register_my_menu() {
    register_nav_menu('my-fake-menu', __( 'My Fake Menu' ));
}