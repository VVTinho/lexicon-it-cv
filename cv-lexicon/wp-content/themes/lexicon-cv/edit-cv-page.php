<?php
/**
 * Template Name: Edit CV
*/
?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <?php rewind_posts(); ?>

            <?php while ( have_posts() ) : the_post(); ?>
                <!-- Do stuff... -->



            <?php if( get_field('image_cv') ) { ?>
                <div class="profile-img">
                    <?php
                    $image = get_field('image_cv');
                    $size = 'thumbnail';

                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    }
                    ?>
                </div>
            <?php } ?>

            <?php endwhile; ?>

        </div><!-- #content -->
    </div><!-- #primary -->

<?php
get_footer();
?>
