<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reign
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-P8KHMDH');</script>
		<!-- End Google Tag Manager -->	
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P8KHMDH"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<?php do_action( 'wbcom_before_page' ) ?>
		<div id="page" class="site">
			<?php do_action( 'wbcom_before_masthead' ); ?>
			<header id="masthead" class="site-header" role="banner">
				<?php do_action( 'wbcom_begin_masthead' ); ?>
				<?php do_action( 'wbcom_masthead' ); ?>
				<?php do_action( 'wbcom_end_masthead' ); ?>
			</header>
			<?php do_action( 'wbcom_after_masthead' ); ?>
			<?php do_action( 'wbcom_before_content' ); ?>
			<div id="content" class="site-content">
				<?php do_action( 'wbcom_content_top' ); ?>