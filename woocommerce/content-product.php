<?php
//КАРТОЧКА ТОВАРА НА СТРАНИЦЕ МАГАЗИНА

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<!-- <?php debug($product);?> -->

<!-- ДОБАВЛЯЕМ СВОЙ КЛАСС products__item-->
<div <?php wc_product_class( 'products__item', $product ); ?>>

	<div class="product-sale">
		<?php woocommerce_show_product_loop_sale_flash();?>
	</div>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );
	?>


	<div class="products__bottom">
		<div class="products__detail">
			<?php

			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );
			?>

			<div class="price">
					<?php woocommerce_template_loop_price();?>
			</div>
			<div class="rate woostudy-rating">
				<?php woocommerce_template_loop_rating();
				if($rating_cnt = $product->get_rating_count()){
					echo'<span class="woostudy-rating-count"><small>('. $rating_cnt .')</small></span>';
				}
				?>
			</div>
			
			<?php
			/**
			 * Hook: woocommerce_after_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );

			/**
			 * Hook: woocommerce_after_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
			?>
		</div><!--products__detail -->

		
		<div class="products__btn">
			<?php woocommerce_template_loop_add_to_cart();?>
		</div><!--products__btn -->

	</div><!--products__bottom -->
</div><!--products__item -->
	
