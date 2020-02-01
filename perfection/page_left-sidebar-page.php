 <?php 

/**
* Template Name: Sidebar Content Page (sidebar on left)
*/

get_header(); ?>

 <!-- Page Content Below -->
 <div id="blog-home" class="container">

     <div class="row">
         <!-- Sidebar Widgets Column -->
         <div class="col-md-4">

             <?php get_sidebar(); ?>

         </div>
         <!-- Content Column -->
         <div class="col-md-8">

             <!--<h1 class="my-4">Blog Posts
             </h1>-->
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

             <!-- Content -->
             <div class="card mb-4">

                 <div class="card-body">
                     <h1 class="card-title"><?php the_title(); ?></h1>

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



     </div>
     <!-- /.row -->

 </div>
 <!-- /.container -->

 <?php get_footer(); ?>
