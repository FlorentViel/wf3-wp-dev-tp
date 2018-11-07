<?php
// Template Name: Modele Films

get_header();

$args = [
    "post_type" => "movies"
];
$query = new WP_Query( $args );

?>

<div class="container">

    <?php if($query->have_posts()) : ?>
        <?php while($query->have_posts()) : $query->the_post(); ?>
            <div>
                <h3><?php the_title() ?></h3>
                <div><?php the_content(); ?></div>

                <?php if (!empty(get_post_meta(get_the_ID(), "actors", true))) {
                    echo "<div>Acteurs : ".get_post_meta(get_the_ID(), "actors", true)."</div>";
                } ?>

                <?php 
                $editor = get_post_meta(get_the_ID(), "editor", true);
                if (!empty($editor)) { ?>
                    <div>Editeur : <?= $editor ?></div>
                <?php } ?>

                <?php 
                $date = get_post_meta(get_the_ID(), "release_date", true);
                if (!empty($date)): ?><div>Date de sortie : <?= $date ?></div>
                <?php endif; ?>
                
                
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

<?php
get_footer();