<?php get_header('page'); ?>
    <?php get_template_part('assets/parts/hamburger'); ?>
    <?php get_template_part('assets/parts/drawer'); ?>
    <main>
        <div class="p-page-portfolios">
            <div class="u-text-align-center">
                <h1 class="c-section-title p-page-portfolios__title">ポートフォリオ</h1>
            </div>
            <div class="p-page-portfolios__inner">
                <p class="p-page-portfolios__description">
                    過去に取り組んだポートフォリオの一覧になります。
                    <br>これらは全て架空サイトであり、ポートフォリオとして掲載が許可されているデザインカンプをお借りしてコーディングをしています。
                    <br><span>※デザインは記載があるもの以外行っていません。</span>
                    <br>ユーザー名とパスワードを求められた場合は記載されているものを入力してください。
                </p>
                <div class="p-page-portfolios__content">
                    <?php 
                        $args = [
                            'post_type' => 'portfolios',
                        ];
                        $the_query = new WP_Query($args);
                    ?>
                    <?php if ($the_query->have_posts()): ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="p-page-portfolios-card wow fadeInUp" data-wow-duration="1s">
                        <div class="p-page-portfolios__img" id="<?php the_title(); ?>">
                            <a href="
                            <?php if ( get_field( 'url' ) ) : ?>
                                <?php the_field( 'url' ); ?>
                            <?php endif; ?>
                            " class="p-page-portfolios-card__link">
                            <?php
                                if(has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } else {
                                    echo '<img src="' . get_template_directory_uri() . '/noimg.png" alt="No Image">';
                                }
                            ?>
                            </a>
                        </div>
                        <div class="p-page-portfolios-card__content">
                            <div class="u-text-align-center">
                                <p class="p-page-portfolios-card__genre">
                                <?php
                                    $id = $post->ID;
                                    $terms = get_the_terms($id, 'kinds');
                                    foreach($terms as $term):
                                        echo $term->name;
                                    endforeach;
                                ?>
                                </p>
                            </div>
                            <h2 class="p-page-portfolios-card__title">
                                <a href="
                                <?php if ( get_field( 'url' ) ) : ?>
                                    <?php the_field( 'url' ); ?>
                                <?php endif; ?>
                                "><?php the_title(); ?></a></h2>
                            <div class="u-text-align-center">
                                <div class="p-page-portfolios-card__code">
                                    <a href="
                                    <?php if ( get_field( 'source' ) ) : ?>
                                        <?php the_field( 'source' ); ?>
                                    <?php endif; ?>
                                    " class="p-page-portfolios-card__code__link">ソースコード
                                    </a>
                                </div>
                            </div>
                            <?php if(get_field('id') && get_field('password')): ?>
                                <p class="p-page-portfolios-card__id">ID:
                                    <?php if(get_field('id')): ?>
                                            <?php the_field('id'); ?>
                                    <?php endif; ?>
                                </p>
                                <p class="p-page-portfolios-card__password">パス:
                                    <?php if(get_field('pass')): ?>
                                            <?php the_field('pass'); ?>
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>
                            <p class="p-page-portfolios-card__date">2023</p>
                            <ul class="p-page-portfolios-card__tags">
                            <?php
                                // カスタム投稿に関連付けられたタグを取得
                                $tags = get_the_terms(get_the_ID(), 'post_tag');

                                // タグが存在する場合は表示
                                if ($tags && !is_wp_error($tags)) {
                                    // タグをタームIDで逆順にソート
                                    $tags = array_reverse($tags);

                                    foreach ($tags as $tag) {
                                        ?>
                                        <li class="p-page-portfolios-card__tag">#
                                            <?php echo esc_html($tag->name); ?>
                                        </li>
                                        <?php
                                    }
                                }
                            ?>
                            </ul>
                            <p class="p-page-portfolios-card__text">
                                <?php the_content(); ?>
                            </p>
                            <?php if ( get_field( 'reference' ) ) : ?>
                            <p class="p-page-portfolios-card__reference">参照：
                                <a href="
                                <?php if ( get_field( 'referenceurl' ) ) : ?>
                                    <?php the_field( 'referenceurl' ); ?>
                                <?php endif; ?>
                                " class="p-page-portfolios-card__reference__link">
                                <?php if ( get_field( 'reference' ) ) : ?>
                                    <?php the_field( 'reference' ); ?>
                                <?php endif; ?>
                                </a>
                            </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>