<?php


defined( 'ABSPATH' ) || exit;

global $post;

$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );

?>

<?php //if ( $heading ) : ?>
	<h2><?php // echo esc_html( $heading ); //?></h2>
<?php //endif; //?>
<img style= "width:200px;" src="<?php the_field('tabs');?>" alt="Изображение">

<?php the_content(); ?>
