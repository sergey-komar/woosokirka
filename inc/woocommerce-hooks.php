<?php
// ОТКЛЮЧАЕМ ВСЕ СТИЛИ woocommerce
 add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

//Хлебные крошки
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_filter( 'woocommerce_breadcrumb_defaults', function() {
	return array(
		'delimiter'   => '&nbsp;/&nbsp;',
		'wrap_before' => '<nav class="caption__bc">',
		'wrap_after'  => '</nav>',
		'before'      => '',
		'after'       => '',
		'home'        => __( 'Главная', 'woostudy' ),
	);
} );



// ОТКРЯПЛЯЕМ САЙДБАР НА СТРАНИЦЕ ОДНОГО ТОВАРА
add_action('template_redirect', function() {
	if(is_product()){
		remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
	}
});

//ПОКАЗАНО РЕЗУЛЬТАТОВ НА СТРАНИЦЕ
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
//Сортировка
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);



//КАРТОЧКА ОДНОГО ТОВАРА НА СТРАНИЦЕ МАГАЗИНА

//ПЕРЕОПРЕДЕЛЯЕМ ССЫЛКУ У КАРТИНКИ ГДЕ БУДЕТ ОТКРЫВАТЬСЯ ТЕГ А , А ГДЕ ЗАКРЫВВАТЬСЯ
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15 );
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
//ДОБАВЛЯЕМ ОБЁРТКУ КАРТИНКЕ
add_action('woocommerce_before_shop_loop_item', function(){
	echo '<div class="products__img">';
},5);
add_action('woocommerce_before_shop_loop_item_title', function(){
	echo '</div>';
},20);

// КНОПКУ В КОРЗИНУ И ПЕРЕНОСИМ НА ДРУГОЕ МЕСТО
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart',10);

//РЕЙТИНГ
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

//РАСПРОДАЖА
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);


//СТРАНИЦА ОДНОГО ТОВАРА
// ОТКРЯПЛЯЕМ САЙДБАР НА СТРАНИЦЕ ОДНОГО ТОВАРА
add_action('template_redirect', function() {
	if(is_product()){
		remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
	}
});

//ВЫВОДИМ АРТИКУЛ И В НАЛИЧИИ
function woo_sokirka_sky_custom() {
	global $product;
?>
 <div class="product__article">
		Артикул:
		<!-- БЕРЁМ ДАННЫЕ ИЗ ФАЙЛА meta.php -->
		<span class="product__article-value"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span>
</div>
<!-- Если у .availability нет класса .true – товара Нет в наличии -->
	<div class="availability <?php $tovar = $product -> get_availability(); 
    if( $tovar['class'] !== 'out-of-stock'){
        echo 'true';
    }
        ?>">
    <span class="true">В наличии</span>
    <span class="false">Нет в наличии</span>
   
</div>

<?php }
add_action('woocommerce_single_product_summary', 'woo_sokirka_sky_custom', 4);


//ОПИСАНИЕ
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
add_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt', 6);

//УДАЛЯЕМ ЦЕНУ И ПЕРЕНОСИМ ЕЁ  НА ХУК ГДЕ КНОПКА КОТОРЫЕ НАХОДИТСЯ В ПАПКЕ SINGLE-PRODUCT->ADD-TO-CART->SIMPLE.PHP
function woosokirka_price_custom() {
	global $product;
?>
	<div class="product__price">
		<span class="currency"><?php echo $product->get_price_html();?></span>
	</div>
<?php }
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
add_action('woocommerce_before_add_to_cart_button', 'woosokirka_price_custom', 5);



//удаляем описание 
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta',40);

//УДАЛЯЕМ upsell И related У ТАБОВ
remove_action('woocommerce_after_single_product_summary','woocommerce_upsell_display',15);
remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);

//ОПУСКАЕМ ФОРМУ ОТЗЫВОВ ВНИЗ ПОД ПОЛЯ НА СТРАНИЦЕ ТОВАРА В ТАБАХ
function comment_form_fields_bottom($fields) {
	$comment_fields = $fields['comment'];
	unset($fields['comment']);
	$fields['comment'] = $comment_fields;
	return $fields;
}
add_filter('comment_form_fields', 'comment_form_fields_bottom');


// СТРАНИЦА ОФОРМЛЕНИЯ ЗАКАЗА
// https://woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
// УБИРАЕМ ПОЛЕ КРЫЛО,ПОДЪЕЗД,ЭТАЖ И НАЗВАНИЕ КОМПАНИИ
add_filter( 'woocommerce_default_address_fields' , function ( $fields ) {
	unset( $fields['address_2']);
	unset( $fields['company']);
	return $fields;
	
} );

//КНОПКА НА СТРАНИЦЕ ОФОРМЛЕНИЯ ЗАКАЗА МЕНЯЕМ КЛАССЫ button alt НА СВОИ btn
add_filter('woocommerce_order_button_html', function($button) {
	return str_replace('button alt', 'btn', $button);
});







