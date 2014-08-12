<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

    <!-- jQuery hide/show -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
    	jQuery(document).ready(function() {
        jQuery("#show-view-cv").click(function() {
        jQuery(".single-post .view-cv-form").hide();
        jQuery(".single-post .view-cv").show();
        });
        jQuery("#hide-view-cv").click(function() {
        jQuery(".single-post .view-cv-form").show();
        jQuery(".single-post .view-cv").hide();
        });
        jQuery("#hide-cv-form").click(function() {
        jQuery(".page-template-mina-cv-php .acf-form").hide();
        jQuery(".page-template-mina-cv-php .close-btn").hide();
        jQuery(".page-template-mina-cv-php #show-cv").show();
        });
        jQuery("#show-cv").click(function() {
        jQuery(".page-template-mina-cv-php .acf-form").show();
        jQuery(".page-template-mina-cv-php .close-btn").show();
        jQuery(".page-template-mina-cv-php #show-cv").hide();
        });
      });
    </script>

    <!-- Google fonts -->
    <script>
    WebFontConfig = {
      google: { families: [ 'PT+Sans:400,700,400italic,700italic:latin' ] }
    };
    (function() {
      var wf = document.createElement('script');
      wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
      wf.type = 'text/javascript';
      wf.async = 'true';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(wf, s);
    })();
  </script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">


	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( get_header_image() ) : ?>
            <div id="site-header">
                <a href="<?php /* echo esc_url( home_url( '/' ) ); */ ?>" rel="home">
                    <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
                </a>
            </div>
            <?php endif; ?>

			<!--<div class="search-toggle">
				<a href="#search-container" class="screen-reader-text"><?php //_e( 'Search', 'twentyfourteen' ); ?></a>
			</div>-->

			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'Primary Menu', 'twentyfourteen' ); ?></button>
				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
                <div class="logged-in-header">
                <?php wp_loginout( $redirect, $echo ); ?>
                	<ul>
                        <?php if ( is_user_logged_in() ) { ?>
                        <li class="user-name">Inloggad som:
                        	<span><?php global $current_user;
                      			get_currentuserinfo();
                      			echo $current_user->user_login;?>
                            </span>
                         </li>
                         <?php } ?>
                         <li><?php wp_loginout(); ?></li>
					</ul>
                 </div>

				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav>
		</div>

		<div id="search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="main" class="site-main">
