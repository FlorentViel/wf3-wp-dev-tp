<?php
// Template Name: Modele Eco
get_header();

// Requete de récupération des article de la catégorie "ecologie"
$args = [
    // "cat" => "5"
    "category_name" => "ecologie, faits-divers"
];
$query = new WP_Query( $args );
?>
<div class="container">

    <?php if($query->have_posts()) : ?>
        <?php while($query->have_posts()) : $query->the_post(); ?>
            <div>
                <h3><?php the_title() ?></h3>
                <div><?php the_content(); ?></div>
                <div><?= get_the_category_list(",", null, get_the_ID()) ?></div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p><?= __("Sorry, no posts matched your criteria.") ?></p>
    <?php endif; ?>

<?php 
// Ré-initialise les requete de WorPress
wp_reset_postdata(); 
?>

</div>
<?php get_footer() ?>