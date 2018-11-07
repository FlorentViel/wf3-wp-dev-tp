<?php

// Déclaration de la constante "_THEME" nous permet d'éviter d'ecrire
// plusieurs fois l'appel de la fonction get_template_directory_uri()
if (!defined("_THEME")) {
    define("_THEME", get_template_directory_uri());
}


function dump($arg) {
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
}

// Activer la gestion des menus avec un menu fictif
add_action('init', 'register_my_menu');
function register_my_menu() {
    register_nav_menu('my-fake-menu', __( 'My Fake Menu' ));
}

// Ajout des feuilles de style
function my_theme_styles() {
    if (!is_admin())
    {
        // Bootstrap
        wp_enqueue_style(
            "bootstrap", 
            _THEME."/assets/css/bootstrap.min.css" 
        );
        // My style
        wp_enqueue_style(
            "main", 
            _THEME."/assets/css/style.css",
            [],
            "0.0.2-a"
        );
    }
}
add_action( 'wp_loaded', 'my_theme_styles' );

// Ajout des scripts JS en pied de page
function my_theme_scripts() {
    if (!is_admin())
    {
        // Bootstrap
        wp_enqueue_script(
            "bootstrap",
            _THEME."/assets/js/bootstrap.min.js",
            ["jquery3", "popperjs"],
            "0.1",
            true
        );
        // Jquery
        wp_enqueue_script(
            "jquery3",
            _THEME."/assets/js/jquery-3.3.1.min.js",
            [],
            "3.3.1",
            true
        );
        // Jquery
        wp_enqueue_script(
            "popperjs",
            _THEME."/assets/js/popper.min.js",
            [],
            "1",
            true
        );
    }
}
add_action( 'wp_loaded', 'my_theme_scripts' );


// Active la balise <title>
function add_title_tag() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'add_title_tag' );



if (!function_exists('shortcode'))
{
    function shortcode(string $tag, array $params = []) 
    {
        foreach ($params as $key => $value) 
        {
            if (is_bool($value))
            {
                $value = $value ? "true" : "false";
            }
            elseif(is_string($value))
            {
                $value = "'$value'";
            }

            array_push($params, $key."=".$value);
            unset($params[$key]);
        }
        
        return do_shortcode('['.$tag.' '.implode(" ", $params).']');
    }
}

// Creation d'un shortcode qui affiche la langue du site
//  [lang]
function get_language()  {
    return bloginfo('language');
}
add_shortcode('lang', 'get_language');

// Shortcode addition
// do_shortcode('[addition a=10 b=32]A + B vaux :[/addition]')
function addition($attributes, $content, $tag)
{
    // echo "<h3>Attr</h3>";
    // echo "<pre>".print_r($attributes)."</pre>";

    // echo "<h3>Content</h3>";    
    // echo "<pre>".print_r($content)."</pre>";
    
    // echo "<h3>Tag</h3>";
    // echo "<pre>".print_r($tag)."</pre>";

    return $content .($attributes['a'] + $attributes['b']);
}
add_shortcode('addition', 'addition');


// Custom Post - Post personnalisé
function movie_custom_post_type() {

    // Définition des Labels texte
    $labels = [
        'name' => _x('Film', 'Films'),
        'add_new' => __('Créer une fiche de film'),
        // 'menu_name' => __('Nos films et Séries'),
    ];

    // Définition des paramètres du post personnalisé
    $args = [
        'label' => __("Films et Séries"),
        'labels' => $labels,
        'public' => true,
        // 'supports' => ['title', 'editor']
        'supports' => ['title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields']
    ];


    // Ajout du post au registre de WordPress
    // "movies" est l'identifiant du type de post
    // $args est le tableau de paramètres qui definissent le post personnalisé
    register_post_type("movies", $args);

}
add_action('init', 'movie_custom_post_type');