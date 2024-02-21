<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php wp_head(); ?>
</head>
<body>
    <header class="l-header">
        <nav class="p-header-nav">
            <ul class="p-header-nav__lists">
                <li class="p-header-nav__list"><a href="<?php echo esc_url(home_url('/')); ?>" class="p-header-nav__link">HOME</a></li>
                <li class="p-header-nav__list"><a href="<?php echo esc_url(get_post_type_archive_link('projects')); ?>" class="p-header-nav__link">PROJECTS</a></li>
                <li class="p-header-nav__list"><a href="<?php echo esc_url(get_post_type_archive_link('portfolios')); ?>" class="p-header-nav__link">PORTFOLIOS</a></li>
                <li class="p-header-nav__list"><a href="<?php echo esc_url(get_post_type_archive_link('skills')); ?>" class="p-header-nav__link">SKILLS</a></li>
            </ul>
        </nav>
    </header>