<?php
?>
<?php get_header('shop');?>
<div class="caption">
	<div class="wrapper">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="woocommerce-products-header__title caption__title"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?>
			 <?php woocommerce_breadcrumb();?> 
	</div>
</div>


<?php if(have_posts()) : while(have_posts()) : the_post();?>

<h1><?php the_title();?></h1>
<p><?php the_content();?></p>

<?php endwhile; else:?>
    Не чего нет
<?php endif;?>


<?php get_footer();?>