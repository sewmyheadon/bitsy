<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bitsy
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>

	<!-- <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bitsy' ); ?></a> -->
	<header id="header">
		<?php
			if ( is_front_page() || is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
		endif; ?>
		<?php $description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<span class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></span>
		<?php
		endif; ?>
		<?php wp_loginout(); ?>
		<a href="#nav">Menu</a>
	</header><!-- #header -->

	<nav id="nav" class="main-navigation" role="navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'bitsy' ); ?></button>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</nav><!-- #site-navigation -->
	
	<section id="banner">
		<h2>Hi, I'm Bitsy</h2>
		<p>A super simple starting point for projects based on <a href="http://skel.io">Skel</a> &amp; <a href="http://underscores.me">_s</a>.</p>
		<ul class="actions">
			<li><a href="#content" class="button special">Content</a></li>
			<li><a href="#elements" class="button">Elements</a></li>
			<li><a href="#grid" class="button alt">Grid System</a></li>
		</ul>
	</section>

	<div id="main" class="site-content container">
