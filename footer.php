
        <!-- FOOTER -->
        <footer class="container">
            <p class="float-right"><a href="#">Back to top</a></p>
            <p>
                &copy; 2017-2018 Company, Inc. 
                <?php foreach (wp_get_nav_menu_items('footer-menu') as $item): ?>
                &middot; <a href="<?= $item->url ?>"><?= $item->title ?></a>
                <?php endforeach; ?>
            </p>
        </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <?php wp_footer() ?>

</body>

</html>