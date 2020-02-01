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
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php echo get_bloginfo( 'name' ); ?></a>
                <?php endif; ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown bs-example-navbar-collapse-1" aria-controls="navbarNavDropdown bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div>
                    

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

                    <!--hero image-->
                    <img src="<?php header_image(); ?>" alt="custom hero image">
                    <!--end hero image-->
                    <div class="feature-text col-xs-10 col-md-8 col-lg-6 offset-lg-1">
                        <!--feature-text-->
                        <p><?php echo html_entity_decode(get_bloginfo('description')); ?></p>
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
