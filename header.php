<?php
?>
<!DOCTYPE html>
<html lang="<?php language_attributes();?>">

<head>
	<meta charset="<?php bloginfo('charset');?>">
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Styles -->
	<style>body { opacity: 0; overflow-x: hidden; } html { background-color: #fff; }</style>
    <?php wp_head();?>

</head>

<body class="inner-page"  <?php body_class();?>>
    <?php wp_body_open();?>

		<!-- Header -->
		<header class="header header-home" style="background: #fff url(img/bg.jpg) no-repeat center top/ cover;">

			<div class="heading">
				<ul class="social">
					<li class="social__item">
						<span>Vk</span>
						<a class="social__icon social__icon_vk" href="#">
							<svg  width="21" height="18">
								<use xlink:href="#vk"/>
							</svg>
						</a>
					</li>
					<li class="social__item">
						<span>Fb</span>
						<a class="social__icon social__icon_fb" href="#">
							<svg  width="14" height="17">
								<use xlink:href="#facebook"/>
							</svg>
						</a>
					</li>
					<li class="social__item">
						<span>Tw</span>
						<a class="social__icon social__icon_tw" href="#">
							<svg  width="18" height="15">
								<use xlink:href="#twitter"/>
							</svg>
						</a>
					</li>
					<li class="social__item">
						<a class="social__icon social__icon_inst" href="#">
							<svg   width="16" height="16">
								<use xlink:href="#instagram"/>
							</svg>
						</a>
					</li>
				</ul>
				<div class="heading__block">
					<a href="cart.html" class="heading__bag">
						<!-- <svg width="17" height="20">
							<use xlink:href="#bag"/>
						</svg> -->
                        <img style="width:30px"  src="<?php echo get_template_directory_uri()?> . /assets/img/favicon.png" alt="">
						<?php echo count(WC()->cart->get_cart())?>
					</a>
					<div class="language">
						<ul>
							<li class="lang-item active">
								<a href="#">Ru</a>
							</li>
							<li class="lang-item">
								<a href="#">En</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="control">
					<a href="#enter" class="control__enter popup-link-1">
						<svg class="control__icon" width="19" height="17">
							<use xlink:href="#login"/>
						</svg>
						Вход
					</a>
					<a style="display: none;" href="cabinet.html" class="control__enter control__enter_cab">
						<svg class="control__icon" width="16" height="16">
							<use xlink:href="#user"/>
						</svg>
						Личный кабинет
					</a>
					<a href="#reg" class="control__reg noise popup-link-2">Регистрация</a>
				</div>
			</div>

			<div class="navigation">
				<div class="logo noise">
					<p class="logo__icon">JC</p>
					<p class="logo__desc">legal Advisory Services</p>
				</div>

				<div class="navigation__wrap">
					<a href="#call" class="call popup-link-1">
						<div class="call__icon btn">
							<svg width="22" height="22">
								<use xlink:href="#phone-solid"/>
							</svg>
						</div>
						<div class="call__block">
							<p class="call__text">Заказать звонок</p>
							<p class="call__number">+ 7 (495) 567-28-15</p>
						</div>
					</a>
					
					<!-- Main menu -->
					<nav id="nav-wrap" class="menu">
						
						<a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
						<a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

                        <?php
                            wp_nav_menu([
                                'theme_location' => 'menu-header',
                                'menu_class' => 'menu__list',
                                'container' => '',
                                'menu_id' => 'menu'
                            ]);
                        ?>
					</nav><!-- End main menu -->
					
					<div class="widget widget_search">
						<form role="search" method="get" id="searchform" action="#">
					
							<input class="text-search" type="search" value="" placeholder="Поиск">
							<input type="submit" class="submit-search" value="" />
					
						</form>
					</div>
				</div>

			</div>
		
			
		</header><!-- End header -->