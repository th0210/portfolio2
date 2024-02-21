<?php get_header(); ?>
    <?php get_template_part('assets/parts/hamburger'); ?>
    <?php get_template_part('assets/parts/drawer'); ?>
    <div class="p-mv">
        <img class="p-mv__bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/publicdomainq-0070149luesuc.jpg" alt="">
        <h1 class="p-mv__title"><span>HIRO's</span>GALLERY</h1>
    </div>
    <div class="p-mv-menu">
        <div class="p-mv-menu__wrapper">
            <div class="p-mv-button">
                <a href="<?php echo esc_url(get_post_type_archive_link('projects')); ?>" class="p-mv-button__link"><p class="projects">PROJECTS</p></a>
            </div>
            <div class="p-mv-button">
                <a href="<?php echo esc_url(get_post_type_archive_link('portfolios')); ?>" class="p-mv-button__link second"><p class="portfolios">PORTFOLIOS</p></a>
            </div>
            <div class="p-mv-button">
                <a href="<?php echo esc_url(get_post_type_archive_link('skills')); ?>" class="p-mv-button__link last"><p class="skills">SKILLS</p></a>
            </div>
        </div>
    </div>
    <main>
        <section class="p-projects">
            <div class="p-projects__inner">
            <div class="u-text-align-center">
                <h2 class="c-section-title p-projects__title">実績・制作物</h2>
            </div>
            <?php 
                $args = [
                    'post_type' => 'projects',
                ];
                $the_query = new WP_Query($args);
            ?>
            <div class="p-projects__content <?php if (!$the_query->have_posts()) echo 'no-posts'; ?>">
                <?php if ($the_query->have_posts()): ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="p-projects-card wow fadeInUp" data-wow-duration="1s">
                    <div class="p-projects-card__img">
                        <a href="" class="p-projects-card__link">
                            <?php
                                if(has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } else {
                                    echo '<img src="' . get_template_directory_uri() . '/noimg.png" alt="No Image">';
                                }
                            ?>
                        </a>
                    </div>
                    <div class="p-projects-card__texts">
                        <p class="p-projects-card__tag">
                        <?php
                            $id = $post->ID;
                            $terms = get_the_terms($id, 'genre');
                            foreach($terms as $term):
                                echo $term->name;
                            endforeach;
                        ?>
                        </p>
                        <h3 class="p-projects-card__title"><a href="" class="p-projects-card__title__link"><?php the_title(); ?></a></h3>
                        <p class="p-projects-card__date">2023</p>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php else: ?>
                    <div class="p-projects__no-posts">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/no-post.png" alt="">
                        <p class="p-projects__no-posts__text">現在投稿がありません</p>
                    </div>
                <?php endif; wp_reset_postdata(); ?>
            </div>
            <div class="p-projects__button"><a href="<?php echo esc_url(get_post_type_archive_link('projects')); ?>" class="c-button">MORE</a></div>
            </div>
        </section>
        <section class="p-portfolios">
            <div class="p-portfolios__inner">
            <div class="u-text-align-center">
                <h2 class="c-section-title p-portfolios__title">ポートフォリオ</h2>
            </div>
                <div class="p-portfolios-content wow fadeInUp" data-wow-duration="1s">
                    <!-- Slider main container -->
                    <div class="swiper mySwiper2">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <?php 
                                $args = [
                                    'post_type' => 'portfolios',
                                ];
                                $the_query = new WP_Query($args);
                            ?>
                            <?php if ($the_query->have_posts()): ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="swiper-slide">
                                <a href="<?php echo esc_url(get_post_type_archive_link('portfolios')); ?> #<?php the_title(); ?>">
                                    <img src="
                                    <?php
                                        if(has_post_thumbnail()) {
                                            the_post_thumbnail();
                                        } else {
                                            echo '<img src="' . get_template_directory_uri() . '/noimg.png" alt="No Image">';
                                        }
                                    ?>
                                    " alt="">
                                    </a>
                            </div>
                            <?php endwhile; ?>
                            <?php endif; wp_reset_postdata(); ?>
                        </div>
                        <!-- 必要に応じてナビボタン -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="swiper mySwiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <?php 
                                $args = [
                                    'post_type' => 'portfolios',
                                ];
                                $the_query = new WP_Query($args);
                            ?>
                            <?php if ($the_query->have_posts()): ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="swiper-slide">
                                <img src="
                                    <?php
                                        if(has_post_thumbnail()) {
                                            the_post_thumbnail();
                                        } else {
                                            echo '<img src="' . get_template_directory_uri() . '/noimg.png" alt="No Image">';
                                        }
                                    ?>
                                " alt="">     
                            </div>
                            <?php endwhile; ?>
                            <?php endif; wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
                <div class="p-portfolios__button"><a href="<?php echo esc_url(get_post_type_archive_link('portfolios')); ?>" class="c-button">MORE</a></div>
            </div>
        </section>
        <section class="p-skills">
            <div class="p-skills__inner">
                <div class="u-text-align-center">
                    <h2 class="c-section-title p-skills__title">できること</h2>
                </div>
                <div class="p-skills-content">
                    <ul class="p-skills-content__lists">                            
                        <li class="p-skills-content__list wow fadeInUp" data-wow-duration="1s">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/html.png" alt="">
                            <p class="p-skills-content__title">HTML</p>
                        </li>
                        <li class="p-skills-content__list wow fadeInUp" data-wow-duration="1s">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/css.png" alt="">
                            <p class="p-skills-content__title">CSS</p>
                        </li>
                        <li class="p-skills-content__list wow fadeInUp" data-wow-duration="1s">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/sass.png" alt="">
                            <p class="p-skills-content__title">Sass</p>
                        </li>
                        <li class="p-skills-content__list wow fadeInUp" data-wow-duration="1s">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/js.png" alt="">
                            <p class="p-skills-content__title">JavaScript / jQuery</p>
                        </li>
                        <li class="p-skills-content__list wow fadeInUp" data-wow-duration="1s">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/wordpress.png" alt="">
                            <p class="p-skills-content__title">WordPress</p>
                        </li>
                        <li class="p-skills-content__list wow fadeInUp" data-wow-duration="1s">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/gulp.png" alt="">
                            <p class="p-skills-content__title">Gulp</p>
                        </li>
                    </ul>
                </div>
                <div class="p-skills__button"><a href="<?php echo esc_url(get_post_type_archive_link('skills')); ?>" class="c-button">MORE</a></div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>