<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--head below-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <?php wp_head(); ?>


</head>


<!--body tag below-->

<body <?php body_class(); ?>>

    <header>
        <!--header section-->

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!--nav section-->
            <div class="container container-fluid">
                <!--container fluid-->
                <?php if( display_header_text() ) : ?>
                <?php if( has_custom_logo() ) : ?>
                <?php the_custom_logo() ; ?>
                <?php else : ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php echo get_bloginfo( 'name' ); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown #bs-example-navbar-collapse-1 bs-example-navbar-collapse-1" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">

                    <?php  wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
                        'container' => 'div',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id' => 'bs-example-navbar-collapse-1',
                        'menu_class' => 'navbar-nav mr-auto',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker(),
                    ) );
                    
                 ?>
                </div>

                <!--/navbar-->
            </div>
            <!--/container fluid-->
        </nav>
        <!--/.nav section-->

        <section id="features">
            <!--features section-->
            <div class="container-fluid">
                <div class="row feature">
                    <div class="page-heading col-xs-10 col-md-8 col-lg-6 ">
                        <!--feature-text-->
                        <?php if(is_archive()) : ?>
                        <h1>
                            <?php
                                if(is_tag()) {
                                    single_tag_title('Tag: ');
                                }
                                elseif(is_archive()) {
                                    single_term_title('Category: '); 
                                    if( is_month() ) {
                                        _e ('Posts from ', 'perfection' );
                                        single_month_title(' ');
                                    }
                                }
                            ?>
                        </h1>
                        <?php endif; ?>
                    </div>
                    <!--/feature-text-->
                </div>
                <!--/.row feature-text-->
            </div>
            <!--/.container-fluid-->
        </section>
        <!--end .features-->
    </header>
    <!--end header section-->
