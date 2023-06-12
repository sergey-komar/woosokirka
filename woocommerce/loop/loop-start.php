<?php
//ОБЁРТКА НА СТРАНИЦЕ МАГАЗИНА
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>" id="products">
