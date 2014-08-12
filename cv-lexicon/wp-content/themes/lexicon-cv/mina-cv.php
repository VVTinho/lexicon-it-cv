<?php
/**
 * Template Name: Mina CV
*/
?>
<?php acf_form_head(); ?>
<?php get_header(); ?>
<?php //the_post(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

        	<?php if ( is_user_logged_in() ): ?>

                    <?php if( get_field('my_cv_header') ): ?>

                        <h1><?php the_field( "my_cv_header" ); ?></h1>
                        <?php the_field( "my_cv_text" ); ?>

					<?php endif; ?>

                    <?php
                    global $current_user;
                    get_currentuserinfo();
                    $author_query = array('pages_per_page' => '-1','author' => $current_user->ID);
                    $author_pages = new WP_Query($author_query); ?>

                    <?php if ( $author_pages->have_posts() ) : ?>
                    	<h2 class="mina-cv-title">Mina CV</h2>

						<?php
                        while( $author_pages->have_posts() ) : $author_pages->the_post();
                        ?>
                            <div class=""><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
                            <?php
                                if ($post->post_author == $current_user->ID) {
                            ?>
                                    <div class="radera-cv">
                                        <a onclick="return confirm('Är du säker du vill radera detta CV?')" href="<?php echo get_delete_post_link( $post->ID ) ?>">Radera CV</a>
                                    </div>
                            <?php
                                }
                            ?>
                            <br />
                        <?php
                        endwhile; ?>

                    <?php endif; ?>


                    <button id="show-cv"><span>Lägg till CV</span></button>
                    <button class="close-btn" id="hide-cv-form">Stäng</button>

                	<?php
                    $args = array(
                        'post_id' => 'new',
                        'field_groups' => array( 70 )
                    );

                    acf_form( $args );

                    ?>

 				<?php
 				else : ?>
                    <header class="page-header">
                        <h1 class="page-title">Du måste vara inloggad för att se denna sidan</h1>
                    </header>
                <?php
				endif; ?>



		</div><!-- #content -->
	</div><!-- #primary -->

</div><!-- #main-content -->

<?php
get_footer();
