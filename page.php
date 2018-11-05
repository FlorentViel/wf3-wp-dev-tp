<?php get_header(); ?>
<?php
$post_id = get_the_ID();
?>

<br>
<br>
<br>
page.php
<br>
<br>
<br>

<h2><?= get_the_title() ?></h2>

<?php if ( have_posts() ): while( have_posts() ):  the_post();
    the_title();
    the_content();
endwhile; else: ?>
    <p>Pas de contenu.</p>
<?php endif; ?>




<?php 
if ( have_posts() ) {
    while( have_posts() ) {
        the_post();
        the_content();
    }
}
else {
    echo "<p>Pas de contenu.</p>";
}
?>








<?php get_footer(); ?>