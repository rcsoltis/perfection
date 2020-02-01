 <?php get_header(); ?>

 <!-- Page Content Below -->
 <div id="blog-home" class="container">

     <div class="row">

         <!-- Blog Entries Column -->
         <div class="col-md-8">

             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
             
             <!-- Blog Post -->
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

             <!-- Pagination
             <ul class="pagination justify-content-center mb-4">
                 <li class="page-item">
                     <a class="page-link" href="#">&larr; Older</a>
                 </li>
                 <li class="page-item disabled">
                     <a class="page-link" href="#">Newer &rarr;</a>
                 </li>
             </ul>/Pagination -->

         </div>

         <!-- Sidebar Widgets Column -->
         <div class="col-md-4">

             <?php get_sidebar(); ?>

         </div>

     </div>
     <!-- /.row -->

 </div>
 <!-- /.container -->

 <?php get_footer(); ?>
