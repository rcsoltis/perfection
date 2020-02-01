 <?php 

/**
* Template Name: Full Width Page (no sidebar)
*/

get_header(); ?>

 <!-- Page Content Below -->
 <div id="blog-home" class="container">



     <!--<h1 class="my-4">Blog Posts
             </h1>-->
     <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
     <div class="row">
         <h1 class="card-title"><?php the_title(); ?></h1>
     </div>
     <div class="row">

         <!-- Blog Post -->
         <div class="card mb-4">

             <div class="card-body">


                 <!--<a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More &rarr;</a>-->
             </div>
             <!--<div class="card-footer text-muted">
                     Posted on <?php echo get_the_date(); ?> <?php _e('by', 'perfection'); ?> <a href="#"><?php the_author(); ?></a>
                 </div>-->

             <?php the_content(); ?>
         </div>

         <?php endwhile; else : ?>
         <p><?php _e( 'Sorry, no posts matched your criteria.', 'perfection' ); ?></p>
         <?php endif; ?>

     </div>
     <!-- /.row -->

 </div>
 <!-- /.container -->

 <?php get_footer(); ?>
