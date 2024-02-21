    <footer class="l-footer">
        <div class="p-footer-nav">
            <ul class="p-footer-nav__lists">
                <li class="p-footer-nav__list"><a href="<?php echo esc_url(home_url('/')); ?>" class="p-footer-nav__link">HOME</a></li>
                <li class="p-footer-nav__list"><a href="<?php echo esc_url(get_post_type_archive_link('projects')); ?>" class="p-footer-nav__link second">PORTFOLIOS</a></li>
                <li class="p-footer-nav__list"><a href="<?php echo esc_url(get_post_type_archive_link('portfolios')); ?>" class="p-footer-nav__link">PROJECTS</a></li>
                <li class="p-footer-nav__list"><a href="<?php echo esc_url(get_post_type_archive_link('skills')); ?>" class="p-footer-nav__link last">SKILLS</a></li>
            </ul>
        </div>
        <p class="l-footer__copyright">&copy; 2024 HIRO's GALLERY</p>
        <div class="c-to-top"><a href="" class="c-to-top__link"><img  class="c-to-top__img" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrow.png" alt=""></a></div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>