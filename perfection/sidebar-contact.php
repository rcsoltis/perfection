<?php 
/**
*Contact Sidebar in footer
*
*/
if ( is_active_sidebar('sidebar-contact') ) : ?>
  <?php dynamic_sidebar('sidebar-contact'); ?>
<?php else: ?>
  <div class="sidebar-module"> 
    <h4><?php _e( 'Add Your Widgets to this Contact Sidebar', 'perfection' ); ?></h4>
  </div>
<?php endif; ?>