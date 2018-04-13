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
    <link rel="stylesheet" href="//basehold.it/30">
</head>

<body id="top" <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bitsy' ); ?></a>
	<header id="header" class="<?php bitsy_header_class(); ?>">

        <?php
			if ( is_front_page() || is_home() ) { ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php } else { ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                         rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			} ?>
		<?php $description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) { ?>
			<span class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></span>
		<?php
		} ?>
		<?php wp_loginout(); ?>
		<a href="#nav">Menu</a>
	</header><!-- #header -->

	<?php get_template_part( 'components/navigation/navigation', 'primary' ); ?>

	<?php if ( is_front_page() ) { get_template_part( 'components/header/banner', 'hero' ); } ?>

	<div id="main" class="site-content container <?php bitsy_content_class(); ?>" role="main">
