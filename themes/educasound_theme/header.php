<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
	<title>
	<?php if(is_front_page()) { ?>
		<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>
	<?php } else { ?>
		<?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?>
	<?php } ?>
	</title>
	
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/educasound.ico" rel="icon" type="image/x-icon" />
	
	<meta name="Description" content="<?php bloginfo('description'); ?> ">
	
	<meta itemprop="image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/images/educasound.jpg">
	
	<meta property="og:title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
	<meta property="og:description" content="<?php bloginfo('name'); ?>, <?php bloginfo('description'); ?>">
	<meta property="og:type" content="article">
	<meta property="og:url" content="<?php echo esc_url( home_url() ); ?>">
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
	<meta property="og:image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/images/educasound.jpg">
	
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,600italic&subset=latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> 

	<?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
<?php if(is_front_page()) { ?>
	<header class="home_header flex">
<?php } else { ?>
	<header class="site_header inner flex">
<?php } ?>
		<label for="menutoggle" class="open_menu">Menu</label>
		
		<section class="brand">
			<h1 class="logo">
				<a href="<?php echo home_url(); ?>">
					<?php bloginfo('name'); ?>
				</a>
			</h1>
			<h2 class="tagline"><?php bloginfo('description'); ?></h2>
		</section>

		<input type="checkbox" id="menutoggle">
		<?php
		$defaults = array(
			'theme_location'  => 'prin_menu',
			'menu'            => '',
			'container'       => 'nav',
			'container_class' => 'main_menu',
			'menu_class'      => 'menu_principal',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		);

		wp_nav_menu( $defaults );
		?>
		<label for="menutoggle" class="close_menu">x</label>
	</header>