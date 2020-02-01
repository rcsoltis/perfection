 <?php get_header(); ?>

 <!-- Page Content Below -->
 <div id="blog-home" class="container">

     <div class="row">


         <!-- Blog Entries Column -->
         <div class="col-md-8">
             <?php
                // Display optional category description
                if ( category_description() ) : ?>
             <div class="archive-meta"><?php echo category_description(); ?></div>
             <?php endif; ?>
             <h1 class="my-4">Blog Posts
             </h1>
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

             <div class="row">
                 <!-- Blog Post -->
                 <article id="post-<?php the_ID(); ?>" <?php post_class( 'card mb-4' ); ?>>

                     <div class="card-body">
                         <h2 class="card-title"><?php the_title(); ?></h2>
                         <?php if ( has_post_thumbnail() ) {
                        echo '<div class="col-sm-4">' . '<a href=' . get_permalink() . '>' . get_the_post_thumbnail() . '</div>';
                            }
                         ?>
                         <div <?php if ( has_post_thumbnail() ) {
                            echo 'class="col-sm-8">';
                            }
                              else {
                                  echo 'class="col-xs-12">';
                              }
                              ?> <?php get_template_part('content', 'comments' ); ?> <?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More &rarr;</a>
                         </div>
                     </div>
                     <div class="card-footer text-muted">
                         Posted on <?php echo get_the_date(); ?> <?php _e('by', 'perfection'); ?> <?php the_author_posts_link(); ?> </a>
                     </div>

                 </article>
             </div>
             <!--/.row-->
             <?php endwhile; else : ?>
             <p><?php _e( 'Sorry, no posts included the words you typed in the search.', 'perfection' ); ?></p>
             <p><?php _e( 'Try the search form again, or try checking in one of these categories:'); ?></p>
             <ul class="searchcatlist">
                 <?php wp_list_categories(array(
                    'title_li' => __( '' ),
                    'orderby' => 'title',
                    'order' => 'ASC',
                  ))
                ?>
             </ul>
             <?php endif; ?>

             <!-- Pagination -->
             <ul class="pagination justify-content-center mb-4">
                 <li><?php next_posts_link('&larr; Older Posts'); ?></li>
                 <li><?php previous_posts_link('Newer Posts &rarr;'); ?></li>
             </ul><!-- /Pagination -->

         </div>

         <!-- Sidebar Widgets Column -->
         <div class="col-md-4">

             <?php get_sidebar(); ?>
             <?php get_sidebar('secondary'); ?>

         </div>

     </div>
     <!-- /.row -->

 </div>
 <!-- /.container -->

 <?php get_footer(); ?>
