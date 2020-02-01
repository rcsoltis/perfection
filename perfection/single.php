 <?php get_header(); ?>

 <!-- Page Content Below -->
 <div id="blog-home" class="container">

     <div class="row">

         <!-- Blog Entries Column -->
         <div class="col-md-8">

             <!--<h1 class="my-4">Blog Posts
             </h1>-->
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

             <!-- Blog Post -->
             <article id="post-<?php the_ID(); ?>" <?php post_class( 'card mb-4' ); ?>>

                 <div class="card-body">
                     <h1 class="card-title"><?php the_title(); ?></h1>

                     <!--<a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More &rarr;</a>-->
                 </div>
                 <div class="card-footer text-muted">
                     <p>Posted on <?php echo get_the_date(); ?> <?php _e('by', 'perfection'); ?>
                         <?php the_author_posts_link(); ?> <br>

                         <?php _e('Posted in:','snazzy'); ?> <?php the_category(', ');?>
                     </p>
                     <?php get_template_part('content', 'comments' ); ?>
                 </div>
                 <?php the_content(); ?>
                 <?php
    $defaults = array(
         'before'           => '<p class="pagination">',
         'after'            => '</p>',
         'link_before'      => '<span>',
         'link_after'       => '</span>',
         'next_or_number'   => 'number',
         'separator'        => ' &nbsp;&nbsp;',
         'nextpagelink'     => __( 'Next page' ),
         'previouspagelink' => __( 'Previous page' ),
         'pagelink'         => '%',
         'echo'             => 1
    );
    wp_link_pages( $defaults );
?>

                 <p><?php the_tags();?></p>
             </article>

             <?php endwhile; else : ?>
             <p><?php _e( 'Sorry, no posts matched your criteria.', 'perfection' ); ?></p>
             <?php endif; ?>

             <!-- Pagination -->
             <ul class="pagination justify-content-center mb-4">
                 <!-- <li class="page-item">
                     <a class="page-link" href="#">&larr; Older</a>
                 </li>
                 <li class="page-item disabled">
                     <a class="page-link" href="#">Newer &rarr;</a>
                 </li> -->
                 <li><?php previous_post_link('%link', '&larr; Previous post in category', TRUE); ?></li>
                 <li><?php next_post_link( '%link', 'Next post in category &rarr;', TRUE); ?></li>
             </ul><!-- /Pagination -->
             <?php comments_template(); ?>
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
