 <?php 

/**
* Template Name: Blog Post Highlights
*/

get_header(); ?>

 <!-- Page Content Below -->
 <div id="blog-home" class="container">

     <div class="row">

         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

         <div class="blog-post">

             <h1 class="blog-post-title"><?php the_title(); ?></h1>

             <?php the_content(); ?>
         </div>
         <!--./blog-post-->

         <?php endwhile; else : ?>
         <p><?php _e( 'Sorry, no posts matched your criteria.', 'perfection' ); ?></p>
         <?php endif; ?>

     </div>
     <!--/.row-->
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
         <div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-4'); ?>>
             <a href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail() ) {
                the_post_thumbnail();
                }       
                else {
                    echo '<img src="' . get_template_directory_uri() . '/images/blog2.jpg" alt="placeholder image">';
                } //Will create placeholder image when one is not available.
                 ?>
             </a><br>
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

 </div>
 <!-- /.container -->

 <?php get_footer(); ?>
