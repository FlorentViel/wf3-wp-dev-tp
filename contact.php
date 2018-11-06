<?php // Template Name: Mon tmpl Contact ?>

<?php get_header() ?>

<div>Google Map</div>
<div>Form Contact</div>


<?= shortcode('contact-form-7', [
    "id" => 45,
    "title" => "Contact form 1",
    "truc" => true
]) 
?>




<?php get_footer() ?>