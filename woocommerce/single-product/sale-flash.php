<?php
// РАСПРОДАЖА НА СТРАНИЦЕ ОДНОГО ТОВАРА

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ( $product->is_on_sale()) : 
	
 	// СКИДКА В %
	 $regular_price = (float) $product->get_regular_price();
	 $sale_price    = (float) $product->get_price();
	   $precision = 1;
	   if(! $regular_price == 0){
		$percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
	   }else{
		return;
	   }
	?>



<!-- ПОДСТАВЛЯЕМ $percentage В   apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . $percentage .-->
	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . $percentage . '</span>', $post, $product ); ?>

	<?php endif;?>

	


