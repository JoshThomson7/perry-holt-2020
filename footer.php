
    <footer role="contentinfo">
        <div class="max__width">
            <div class="footer__signup">
                <div class="footer__signup__heading">
                    <h3>Sign up to our newsletter</h3>
                    <p>Be the first one to know about all things <?php bloginfo('name'); ?>. Right in your inbox.</p>
                </div><!-- footer__signup__heading -->

                <div id="mc_embed_signup" class="footer__signup__form">
                    <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div class="form__row">
                            <div class="form__field">
                                <input type="text" placeholder="Full name" value="" name="FNAME" class="" id="mce-FNAME">
                            </div><!-- form__field -->

                            <div class="form__field">
                                <input type="email" value="" placeholder="Email address" name="EMAIL" class="required email" id="mce-EMAIL">
                            </div><!-- form__field -->

                            <div class="form__field submit">
                                <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">Sign up</button>
                            </div><!-- form__field -->
                        </div><!-- form__row -->
                    </form>

                    <div class="form__row gdpr">
                        <small>We are GDPR compliant and respect your privacy. You can unsubscribe at any time.</small>
                    </div>
                </div><!-- footer__signup__form -->
            </div><!-- footer__signup -->

            <div class="footer__menus">
                <?php
                    while(have_rows('footer_menus', 'options')) : the_row();

                    $footer_menu = get_sub_field('footer_menu');
                ?>
                    <article class="footer__menu">
                        <h5><?php echo $footer_menu->name; ?> <span class="ion-ios-plus-empty"></span></h5>

                        <?php wp_nav_menu(array('menu' => $footer_menu->name, 'container' => false, 'walker' => new clean_walker)); ?>
                    </article>

                <?php endwhile; ?>
            </div><!-- footer__menus -->


            <div class="subfooter">
                <div class="subfooter__credits">
                    <p>&copy;<?php echo date("Y"); ?> <?php bloginfo('name') ?>. All Rights Reserved.</p>
                    <p><a href="http://www.fl1.digital" target="_blank">Powered by FL1 Digital</a></p>
                </div><!-- subfooter__credits -->
            </div><!-- subfooter -->
        </div><!-- max__width -->
    </footer>

    <?php gf_ajax_form_html(); ?>

    <?php
        // Bloody sheep.
        $footer_sheep = '';

        if(get_field('page_footer_sheep')) {
            $footer_sheep = get_field('page_footer_sheep');
        } elseif(get_field('footer_sheep', 'option')) {
            $footer_sheep = get_field('footer_sheep', 'option');
        }

        if($footer_sheep):
    ?>
        <div class="sheep">
            <img src="<?php echo $footer_sheep; ?>" alt="">
        </div><!-- sheep -->
    <?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
