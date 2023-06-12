<?php
?>
<?php get_header();?>
<?php if(have_posts()) : while(have_posts()): the_post()?>

<?php
if(is_user_logged_in()){
   echo  '1' . '<a href="' . wp_logout_url(get_permalink()) . '">выйти</a>'  ;
}else{
    wp_login_form();
}
?>
 <?php //wp_login_form()?> 
<h1><?php the_title()?></h1>
<p><?php the_content();?></p>
<?php endwhile; else:?>
    Записей нет
<?php endif;?>
<?php get_footer();?>