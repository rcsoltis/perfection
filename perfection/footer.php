<footer>
    <!--footer-->
    <section id="contact-footer">
        <!--contact-footer info-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <?php get_sidebar('contact' ); ?>
                    <!--/contact-address-->
                </div> <!-- /.col-->
                <div class="footer-nav col-md-4">
                    <!--.footer-nav-->
                    <?php
                        wp_nav_menu( array(
                           'menu'              => 'secondary',
                           'theme_location'    => 'secondary',
                           'depth'             => 2,
                           'container'         => 'nav',
                           'container_class'   => 'navbar-list',
                           'container_id'      => 'footer-navbar',
                           'menu_class'        => 'nav nav-pills nav-stacked')
                        );
                    ?>
                    
                </div>
                <!--/.footer-nav-->
                <div class="social col-md-4">
                    <!--.social-->
                    <ul>
                        <?php if ( get_theme_mod('facebook_url') ) : ?>
                            <li><a href="<?php echo get_theme_mod('facebook_url'); ?>" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                        <?php endif; ?>
                        <?php if ( get_theme_mod('instagram_url') ) : ?>
                            <li><a href="<?php echo get_theme_mod('instagram_url'); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <?php endif; ?>
                        
                    </ul>
                    <ul>
                        <?php if ( get_theme_mod('twitter_url') ) : ?>
                            <li><a href="<?php echo get_theme_mod('twitter_url'); ?>" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
                        <?php endif; ?>
                        <?php if ( get_theme_mod('linkedin_url') ) : ?>
                            <li><a href="<?php echo get_theme_mod('linkedin_url'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!--/.social-->

            </div>
            <!--/.row-->
        </div>
        <!--/.container-fluid-->
    </section>
    <!--/.contact-footer info-->
    <p>RCS Copyright&#64;<?php echo date('Y'); ?></p>


</footer>
<!--/footer-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins)
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed --
    <script src="https://rcsoltis.webhostingforstudents.com/cas211w/project/wp-content/themes/perfection/js/bootstrap.min.js"></script> -->

<?php wp_footer(); ?>

</body>

</html>
