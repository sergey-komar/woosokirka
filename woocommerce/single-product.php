<?php
//СТРАНИЦА ОДНОГО ТОВАРА

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>


<?php get_header( 'shop' ); ?>

<div class="caption">
	<div class="wrapper">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="woocommerce-products-header__title caption__title"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?>
			 <?php woocommerce_breadcrumb();?> 
	</div>
</div>

		<?php
				/**
			 * woocommerce_before_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
		?>
<section class="single card">
	<div class="wrapper">
			<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
		
					<?php wc_get_template_part( 'content', 'single-product' ); ?>
		
				<?php endwhile; // end of the loop. ?>
	</div>
</section>

			<?php
				/**
				 * woocommerce_after_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
			?>

			<?php
				/**
				 * woocommerce_sidebar hook.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
			?>
<?php get_footer( 'shop' );?>

