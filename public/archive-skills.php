<?php get_header('page'); ?>
    <?php get_template_part('assets/parts/hamburger'); ?>
    <?php get_template_part('assets/parts/drawer'); ?>
    <main>
        <div class="p-page-skills">
            <div class="u-text-align-center">
                <h1 class="c-section-title p-page-skills__title">できること</h1>
            </div>
            <div class="p-page-skills__inner">
                <div class="p-page-skills__content">
                    <?php 
                        $args = [
                            'post_type' => 'skills',
                        ];
                        $the_query = new WP_Query($args);
                    ?>
                    <?php if ($the_query->have_posts()): ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="p-page-skills-card wow fadeInUp" data-wow-duration="1s">
                        <div class="p-page-skills-card__img">
                            <?php
                                if(has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } else {
                                    echo '<img src="' . get_template_directory_uri() . '/noimg.png" alt="No Image">';
                                }
                            ?>
                        </div>
                        <div class="p-page-skills-card__content">
                            <h2 class="p-page-skills-card__title"><?php the_title(); ?></h2>
                            <div class="p-page-skills-card__text">
                                <?php echo get_the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>