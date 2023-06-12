<?php

//ОТЗЫВЫ СТРАНИЦА ОДНОГО ТОВАРА
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
	
	<div class="clients__box" <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		
			<div class="clients__photo">
				<div class="clients__img">
					<?php
					/**
					 * The woocommerce_review_before hook
					 *
					 * @hooked woocommerce_review_display_gravatar - 10
					 */
					do_action( 'woocommerce_review_before', $comment );
					?>
				</div>
				<a href="#" class="clients__link">
					<svg  width="14" height="17">
						<use xlink:href="#facebook"/>
					</svg>
				</a>
			</div>
			<div class="clients__say">
				<p class="clients__name"><?php comment_author(); ?> </p>
				<div class="clients__text">
					<?php
					/**
					 * The woocommerce_review_meta hook.
					 *
					 * @hooked woocommerce_review_display_meta - 10
					 */
					do_action( 'woocommerce_review_meta', $comment );

					do_action( 'woocommerce_review_before_comment_text', $comment );
					?>



					<?php
					/**
					 * The woocommerce_review_comment_text hook
					 *
					 * @hooked woocommerce_review_display_comment_text - 10
					 */
					do_action( 'woocommerce_review_comment_text', $comment );

					do_action( 'woocommerce_review_after_comment_text', $comment );
					?>
					
				</div>

				<?php
					/**
					 * The woocommerce_review_before_comment_meta hook.
					 *
					 * @hooked woocommerce_review_display_rating - 10
					 */
					do_action( 'woocommerce_review_before_comment_meta', $comment );
				?>
				
				
			</div>
			<div class="add-time">
				<svg width="13" height="13">
					<use xlink:href="#time"/>
				</svg>
				<p class="add-time__date"><?php echo esc_html( get_comment_date( wc_date_format() ) ); ?></p>
			</div>
	
	</div>
	




