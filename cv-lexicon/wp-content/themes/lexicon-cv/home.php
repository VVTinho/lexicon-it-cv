<?php
/**
 * Template Name: Startsida
*/
?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

            <?php
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>

                <h1><?php the_field( "header_home" ); ?></h1>
                <h2><?php the_field( "header_home_second" ); ?></h2>
					<?php the_field( "text_home" ); ?>
                <div class="desc-block">
                	<?php the_field( "desc_home" ); ?>
                </div>
			<?php
				endwhile;
			?>
            <div class="btn-area">
                <a class="btn" href="/cv-lexicon/wp-login.php?action=register"><span>Skapa Konto</span></a>
                <?php if ( is_user_logged_in() ) { ?>
                	<a class="btn" href="/cv-lexicon/min-sida"><span>Min Sida</span></a>
                <?php } else { ?>
                	<a class="btn" href="/cv-lexicon/wp-login.php"><span>Logga In</span></a>
                <?php } ?>

            </div>

		</div><!-- #content -->
	</div><!-- #primary -->

</div><!-- #main-content -->

<?php
get_footer();
