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

<h3>Menu avec wp_nav_menu()</h3>
<?php wp_nav_menu(); ?>

<hr>
<h3>wp_get_nav_menu_items()</h3>








<ul class="navbar-nav mr-auto">
<?php 
$items = wp_get_nav_menu_items('main-menu');
foreach ($items as $item) 
{
    ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= $item->url ?>"><?= $item->title ?></a>
    </li>
    <?php
}
?>
</ul>







<?php get_footer(); ?>