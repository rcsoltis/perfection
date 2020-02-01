<?php get_header('alt'); ?>

<main>
    <section id="welcome">
        <!--.welcome section-->
        <div class="container-fluid">
            <h2><?php _e( 'Welcome', 'perfection' ); ?></h2>
            <div class="row">

                <div class="welcome-img col-md-6">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/main_about_img.jpg" height="768" width="1152" alt="women holding a coffe mug that says 'Like a Boss'">
                </div>
                <div class="welcome-text col-md-6">
                    <p><?php _e('Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest. Making websites is the greatest.', 'perfection' ); ?>
                    </p>

                    <button class="btn btn-primary" type="submit"><?php _e( "Let's Connect!", 'perfection'); ?></button>
                </div>
            </div>
        </div>
    </section>
    <!--/.welcome section-->

    <section id="recent-work" class="row">
        <?php
            $args = array(
               'orderby' => 'date',
               'posts_per_page' => 3,
               'category_name' => 'working-projects'
            );
            $recent_posts = new WP_Query( $args );
        ?>
        <?php if ( $recent_posts->have_posts() ) : ?>
        <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
        <div class="col-sm-4">
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a><br>
            <p><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
        </div><!-- /.cols -->
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <div class="col-xs-12 working-projects">
            <p><?php _e( 'No posts have been created yet in the category.<br>
    Add that category and create posts.<br>Be sure to give each post a featured image.', 'perfection'); ?></p>
        </div><!-- /.col -->
        <?php endif; ?>
    </section>
    <!--/.recent-work section-->
</main>

<?php get_footer(); ?>
