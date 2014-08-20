<?php
/**
 * Template Name: Mina CV
*/
?>
<?php acf_form_head(); ?>
<?php get_header(); ?>
<?php // the_post(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

        	<?php if ( is_user_logged_in() ): ?>

                    <?php if( get_field('my_cv_header') ): ?>

                        <div class="welcome-text">
                            <button class="welcome-text-btn">stäng</button>
                            <div id="welcome-title">
                                <?php the_field( "my_cv_header" ); ?>
                            </div>
                            <?php the_field( "my_cv_text" ); ?>
                        </div>

					<?php endif; ?>

                    <?php
                        global $current_user;
                        get_currentuserinfo();
                        $author_query = array('pages_per_page' => '-1','author' => $current_user->ID);
                        $author_pages = new WP_Query($author_query);
                    ?>

                    <?php if ( $author_pages->have_posts() ) : ?>

                    	<h2 class="mina-cv-title">Mina CV</h2>

                        <?php while( $author_pages->have_posts() ) : $author_pages->the_post(); ?>

                            <div class="preview-cv-btn">
                                <?php the_title(); ?>
                            </div>

                            <div class="created-cv-time">
                                <p>Skapat CVet den: <?php the_time('j F, Y'); ?> / tid: <?php the_time('g:i a'); ?></p>
                            </div>

                            <div class="edit-delete-preview-btn">
                                <div class="edit-cv">

                                   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Redigera CV</a>

                                   <!--  <img src="http://vvt-mediadesign.se/cv-lexicon/wp-content/uploads/2014/08/edit-icon.png" alt="Redigera CV" width="36" height="36"> -->

                                   <!--  <a class="" id="show-view-cv-editmode" href="http://vvt-mediadesign.se/cv-lexicon/edit-cv/">Redigera CV</a> -->

                                    <!-- <a href="<?php the_permalink(); #anchor_id ?>">clickable text</a> -->
                                </div>

                                <div class="delete-cv">
                                    <a onclick="return confirm('Är du säker du vill radera detta CV?')" href="<?php echo get_delete_post_link( $post->ID ) ?>">Ta bort CV</a>
                                   <!--  <img src="http://vvt-mediadesign.se/cv-lexicon/wp-content/uploads/2014/08/btn_delete.png" alt="Radera CV" width="36" height="36"> -->
                                </div>

                                <div class="preview-cv">
                                   <!--  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Visa CV</a> -->

                                    <!--  <img src="http://vvt-mediadesign.se/cv-lexicon/wp-content/uploads/2014/08/edit-icon.png" alt="Redigera CV" width="36" height="36"> -->
                                    <!-- <button class="view-cv-btn1" id="show-view-cv1">Visa CV</button> -->
                                    <!-- <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="view-cv-btn1" id="show-view-cv1">Visa CV</a> -->
                                    <!-- <button class="view-cv-btn" id="show-view-cv">Se</button> -->

                                    <!--  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="view-cv-btn" id="show-view-cv1">Se CV</a> -->

                                    <!-- <a href="<?php body_class( 'class-name' ); ?>" title="<?php the_title_attribute(); ?>" class="view-cv-btn" id="show-view-cv1">Se CV</a> -->

                                    <a class="" id="show-view-cv1" href="<?php the_permalink(); ?>">Se CV</a>

                                    <!-- <input id="btnID" type="button" value="button" /> -->

                                    <!-- <a class="favIcon km-icon" href="#" data-rel="external">Fav</a> -->

                                </div>

                            </div>

                            <?php
                                if ($post->post_author == $current_user->ID) {}
                            ?>

                            <br />

                        <?php endwhile; ?>

                    <?php endif; ?>

                    <div class="add-cv-btn">
                        <button id="show-cv"><span>Lägg till CV</span></button>
                    </div>

                    <button class="close-btn" id="hide-cv-form">Stäng</button>

                	<?php
                    $args = array(
                        'post_id' => 'new',
                        'field_groups' => array( 70 )
                    );

                    acf_form( $args );

                    ?>

 				<?php else : ?>
                    <header class="page-header">
                        <h1 class="page-title">Du måste vara inloggad för att se denna sidan</h1>
                    </header>
                <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

</div><!-- #main-content -->

<?php
get_footer();
