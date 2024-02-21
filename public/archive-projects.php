<?php get_header('page'); ?>
    <?php get_template_part('assets/parts/hamburger'); ?>
    <?php get_template_part('assets/parts/drawer'); ?>
    <main>
        <div class="p-page-projects">
            <div class="u-text-align-center">
                <h1 class="c-section-title p-page-projects__title">実績・制作物</h1>
            </div>
            <div class="p-page-projects__inner">
                    <?php 
                        $args = [
                            'post_type' => 'projects',
                        ];
                        $the_query = new WP_Query($args);
                    ?>
                <div class="p-page-projects__content <?php if (!$the_query->have_posts()) echo 'no-posts'; ?>">
                    <?php if ($the_query->have_posts()): ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="p-page-projects-card wow fadeInUp" data-wow-duration="1s">
                        <div class="p-page-projects__img">
                            <a href=""class="p-page-projects-card__link">
                                <?php
                                    if(has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } else {
                                        echo '<img src="' . get_template_directory_uri() . '/noimg.png" alt="No Image">';
                                    }
                                ?>
                            </a>
                        </div>
                        <div class="p-page-projects-card__content">
                            <div class="u-text-align-center">
                                <p class="p-page-projects-card__genre">
                                <?php
                                    $id = $post->ID;
                                    $terms = get_the_terms($id, 'genre');
                                    foreach($terms as $term):
                                        echo $term->name;
                                    endforeach;
                                ?>
                                </p>
                            </div>
                            <h2 class="p-page-projects-card__title"><a href=""><?php the_title(); ?></a></h2>
                            <p class="p-page-projects-card__date">2023</p>
                            <ul class="p-page-projects-card__tags">
                                <li class="p-page-projects-card__tag">
                                    <!--タグ出力のコードを書く-->
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <div class="p-page-projects__no-posts">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/no-post.png" alt="">
                            <p class="p-page-projects__no-posts__text">現在投稿がありません</p>
                        </div>
                    <?php endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>
