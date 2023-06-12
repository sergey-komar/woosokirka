<?php

function debug($data){
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function woosokirka_script(){
    wp_enqueue_style('vendor-style', get_template_directory_uri() . '/assets/css/vendor.min.css', [], '2023', 'all');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.min.css', [], '2023', 'all');
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css', [], '2023', 'all');

    // ПОДКЛЮЧАЕМ jquery КОТОРЫЙ УСТАНОВЛЕН УЖЕ В WORDPRESS
    // wp_enqueue_script('jquery');

    //ПОДКЛЮЧАЕМ jquery
    wp_enqueue_script('jquery3.6.0', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');
    
    wp_enqueue_script('common-js', get_template_directory_uri() . '/assets/js/common.min.js', ['jquery'],'2023', true);
    wp_enqueue_script('vendor-js', get_template_directory_uri() . '/assets/js/vendor.min.js', ['jquery'],'2023', true);
   
}
add_action('wp_enqueue_scripts', 'woosokirka_script');

function woosokirka() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('woocommerce');//Включаем поддержку woocommerce


    register_nav_menus([
        'menu-header' => 'Меню в хедере'
    ]);

}
add_action('after_setup_theme', 'woosokirka');


//САЙДБАР
function woosokirka_sidebar() {
    register_sidebar(
		array(
			'name' => esc_html__( 'Сайдбар', 'woostudy' ),
			'id' => 'sidebar-1',
			'description' => esc_html__( 'Add widgets here.', 'woostudy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
		)
	);
}
add_action('widgets_init', 'woosokirka_sidebar');



require_once get_template_directory() . '/inc/woocommerce-hooks.php';

