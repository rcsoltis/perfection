<?php
/**
*Secondary Sidebar
*
*/
if ( is_active_sidebar('sidebar-secondary') ) : ?>
  <?php dynamic_sidebar('sidebar-secondary'); ?>
<?php else: ?>
  <div class="sidebar-module"> 
    <h4><?php _e( 'Add Your Widgets to this Secondary Sidebar', 'perfection' ); ?></h4>
  </div>
<?php endif; ?>

