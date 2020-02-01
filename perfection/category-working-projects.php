 <?php get_header(); ?>

 <!-- Page Content Below -->
 <div id="blog-home" class="container">

     <div class="row">
         <h1><?php _e( 'Working Projects', 'perfection' ); ?></h1>
         <!-- Blog Entries Column -->
         <div class="col-xs-12">

             <h1 class="my-4">
             </h1>
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

             <div class="row">
                 <!-- Blog Post -->
                 <article class="card mb-4">

                     <div class="card-body">
                         <h2 class="card-title"><?php the_title(); ?></h2>
                         <?php if ( has_post_thumbnail() ) {
                        echo '<div class="col-sm-12">' . '<a href=' . get_permalink() . '>' . '</div>';
                            }
                         ?>
                         <div <?php if ( has_post_thumbnail() ) {
                            echo 'class="col-sm-12">';
                            }
                              else {
                                  echo 'class="col-xs-12">';
                              }
                              ?> <?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More &rarr;</a>
                         </div>
                     </div>
                     <div class="card-footer text-muted">
                         Posted on <?php echo get_the_date(); ?> <?php _e('by', 'perfection'); ?> <?php the_author_posts_link(); ?> </a>

                     </div>

                 </article>
             </div>
             <!--/.row-->
             <?php endwhile; else : ?>
             <p><?php _e( 'Sorry, no posts matched your criteria.', 'perfection' ); ?></p>
             <?php endif; ?>

             <!-- Pagination -->
             <ul class="pagination justify-content-center mb-4">
                 <!--<li class="page-item">
                     <a class="page-link" href="#">&larr; Older</a>
                 </li>
                 <li class="page-item disabled">
                     <a class="page-link" href="#">Newer &rarr;</a>
                 </li>-->
                 <li><?php next_posts_link('&larr; Older Posts'); ?></li>
                 <li><?php previous_posts_link('Newer Posts &rarr;'); ?></li>
             </ul><!-- /Pagination -->

         </div>
         <!--/.col-->

     </div>
     <!-- /.row -->

 </div>
 <!-- /.container -->

 <?php get_footer(); ?>
