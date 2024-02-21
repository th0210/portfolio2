<?php
    //機能開放
    function my_setup() {
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ));
    }

    add_action("after_setup_theme", "my_setup");

    //headでの読み込み部分
	function my_script_init() {
		wp_enqueue_style("font1", "https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap");
        wp_enqueue_style("font2", "https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;500;700;900&display=swap");
		wp_enqueue_style("swiper", "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css");
        wp_enqueue_style("wow", get_template_directory_uri() . "/assets/css/animate.css");
		wp_enqueue_script("wow", get_template_directory_uri() . "/assets/js/wow.min.js");
		wp_enqueue_style("my", get_template_directory_uri() . "/assets/css/style.css", array(), filemtime(get_theme_file_path('/assets/css/style.css')), "all");
		wp_enqueue_script("swiper", "https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js");
		wp_enqueue_script("my", get_template_directory_uri() . "/assets/js/script.js", array("jquery"), filemtime(get_theme_file_path('/assets/js/script.js')), true);
	}

	add_action("wp_enqueue_scripts", "my_script_init");

    //wow.jsを</body>前で読み込みスマホ表示時に無効
    function my_js_function() {
        echo <<< EOM
        
        <script>
            if(!navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)){new WOW().init();}
        </script>
        
        EOM;
    }
    add_action( 'wp_footer', 'my_js_function' );



    function create_custom_post_types() {
        register_post_type('portfolios',
            array(
                'labels' => array(
                    'name' => __('ポートフォリオ'),
                    'singular_name' => __('ポートフォリオ')
                ),
                'public' => true,
                'has_archive' => true,
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'tags'), // 'tags' をサポート
                'taxonomies' => array('post_tag') // タグをサポート
            )
        );
    
        register_post_type('projects',
            array(
                'labels' => array(
                    'name' => __('実績・制作物'),
                    'singular_name' => __('実績・制作物')
                ),
                'public' => true,
                'has_archive' => true,
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'tags'), // 'tags' をサポート
                'taxonomies' => array('post_tag') // タグをサポート
            )
        );
    }
    add_action('init', 'create_custom_post_types');