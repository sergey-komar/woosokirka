<?php
// ИЗОБРАЖЕНИЕ НА СТРАНИЦЕ 1 ТОВАРА

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids && $product->get_image_id() ) {
	foreach ( $attachment_ids as $attachment_id ) {
		echo '<div class="product__item">';
		// echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

//Я ПИСАЛ САМ
		$img_element = '<img class="product__pic" src="'. wp_get_attachment_image_url( $attachment_id, 'full' ).'">';
		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $img_element, $attachment_id); 
		echo '</div>';
	}
}
