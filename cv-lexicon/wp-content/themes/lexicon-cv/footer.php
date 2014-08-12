<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info">
				<div class="copyright-lexicon">
            		<p>&copy; Lexicon IT-konsult - 2014 </p>
            	</div>
                <button class="view-cv-btn" id="show-view-cv">Se CV</button>
			</div><!-- .site-info -->

            <?php if (is_front_page()) { ?>

            <div id="footer-facebook">
                <div class="footer-lower-facebook">

                    <div class="fb-like" data-href="https://www.facebook.com/LexiconITKonsult?fref=ts" data-layout="button_count" data-send="true" data-width="200" data-show-faces="false" data-font="arial" data-colorscheme="dark"></div>


                    <script>
                        (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/sv_SE/all.js#xfbml=1";
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                        (document, 'script', 'facebook-jssdk'));
                    </script>
                </div>
            </div><!-- #footer-facebook -->

            <?php } else { ?>

            <?php } ?>

		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
