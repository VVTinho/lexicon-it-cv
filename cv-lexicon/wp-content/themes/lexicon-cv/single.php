<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */ ?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
        	<?php if ( is_user_logged_in() ): ?>
				<?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post(); ?>

                        <div class="view-cv-form">
                            <?php acf_form(); ?>
                        </div>

                        <div class="view-cv">
                            <button class="close-btn" id="hide-view-cv">Stäng</button>
                            <br />

                            <?php the_field( "first_name_cv" ); ?>  <?php the_field( "last_name_cv" ); ?><br />
                            <?php if( get_field('image_cv') ): ?>
                                <div class="profile-img">
                                    <?php
                                    $image = get_field('image_cv');
                                    $size = 'thumbnail';

                                    if( $image ) {
                                        echo wp_get_attachment_image( $image, $size );
                                    }
                                    ?>
                                </div>
                            <?php
                            else : ?>

                                <div class="profile-img"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/default-profile.png" width="110" height="118" /></div>

                            <?php endif; ?>

    <?php the_field( "cv_name" ); ?><br />
                          <?php the_field( "bith_date_cv" ); ?><br />
                          <?php the_field( "language_cv" ); ?><br />
                            <h2>Profil</h2>
                          <?php the_field( "desc_role_cv" ); ?>

                            <h2>Utbildningar / Kurser</h2>
                            <?php if( have_rows('course_repeater_cv') ): ?>
                                <?php while( have_rows('course_repeater_cv') ): the_row(); ?>

                                    <?php the_sub_field('education_cv'); ?><br />
                                    <?php the_sub_field('school_cv'); ?><br />
                                    <?php the_sub_field('education_from_year_cv'); ?>
                                    <?php the_sub_field('education_from_month_cv'); ?><br />
                                    <?php the_sub_field('education_to_year_cv'); ?>
                                    <?php the_sub_field('education_to_month_cv'); ?><br /><br />

                                <?php endwhile; ?>
                            <?php endif; ?>

                            <h2>Kompetenser</h2>
                            <?php if( have_rows('proglang_repeater_cv') ): ?>
                                <?php while( have_rows('proglang_repeater_cv') ): the_row(); ?>

                                    <?php the_sub_field('the_program_lang_cv'); ?><br />

                                <?php endwhile; ?>
                            <?php endif; ?>

                            <h3>Databaser</h3>

                            <?php if( have_rows('database_repeater_cv') ): ?>
                                <?php while( have_rows('database_repeater_cv') ): the_row(); ?>

                                    <?php the_sub_field('the_database_cv'); ?><br />

                                <?php endwhile; ?>
                            <?php endif; ?>

                            <h3>Verktyg</h3>

                            <?php if( have_rows('tools_repeater_cv') ): ?>
                                <?php while( have_rows('tools_repeater_cv') ): the_row(); ?>

                                    <?php the_sub_field('the_tools_cv'); ?><br />

                                <?php endwhile; ?>
                            <?php endif; ?>

                            <h3>Metoder</h3>

                            <?php if( have_rows('methods_repeater_cv') ): ?>
                                <?php while( have_rows('methods_repeater_cv') ): the_row(); ?>

                                    <?php the_sub_field('the_method_cv'); ?><br />

                                <?php endwhile; ?>
                            <?php endif; ?>

                            <h3>Operativsystem</h3>

                            <?php if( have_rows('os_repeater_cv') ): ?>
                                <?php while( have_rows('os_repeater_cv') ): the_row(); ?>

                                    <?php the_sub_field('the_os_cv'); ?><br />

                                <?php endwhile; ?>
                            <?php endif; ?>

                            <h3>Uppdrag</h3>

                            <?php if( have_rows('mission_repeater_cv') ): ?>
                                <?php while( have_rows('mission_repeater_cv') ): the_row(); ?>
                                    Kund: <?php the_sub_field('mission_customer_cv'); ?><br />
                                    Från<br />
                                    <?php the_sub_field('mission_from_year_cv'); ?>
                                    <?php the_sub_field('mission_from_month_cv'); ?><br />
                                    Till<br />
                                    <?php the_sub_field('mission_to_year_cv'); ?>
                                    <?php the_sub_field('mission_to_month_cv'); ?><br />
                                    Roll: <?php the_sub_field('mission_role_cv'); ?><br /><br />
                                    Teknologier: <?php the_sub_field('mission_tech_cv'); ?><br /><br />
                                    Beskrivning: <?php the_sub_field('mission_desc_cv'); ?><br /><br />

                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php pdf24Plugin_link('Ladda ner ditt CV som pdf'); ?>

                            <script>
                                if (window.print) {
                                    document.write('<form><input type=button name=print value="Skriv Ut CV" onClick="window.print()"></form>');
                                }
                            </script>

                        </div>

                    <?php
                    endwhile;
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

<?php
get_footer();
