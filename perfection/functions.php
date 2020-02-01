<?php

// Add Theme Support below

// Content Width

if ( ! isset( $content_width ) ) {
	$content_width = 1600;
}

// Add Theme Support - Feed Link, Title Tags,Navwalker

function perfection_setup() {
		
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    
        // Register Custom Navigation Walker
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    
        if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
	   // file does not exist... return an error.
        return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
        } else {
        // file exists... require it.
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
        }
    
        // Registering navbars below
        register_nav_menus( array(
	        'primary' => __( 'Primary Menu', 'perfection' ),
            'secondary' => __( 'Footer Menu', 'perfection' ),
        ) );
    
    //Enable custom headers
    $args = array(
		'flex-width'    => 'true',
		'width'         => 2000,
		'flex-height'   => 'true',
		'height'        => 1500,
		'default-image' => get_template_directory_uri() . '/images/hero2.jpg',
		'uploads'       => true,
    );
    add_theme_support( 'custom-header', $args );
    
	}

    // Enable Custom Logo
    add_theme_support( 'custom-logo', array(
       'height'      => 75,
       'width'       => 200,
       'flex-width' => true,
      ) );
	
add_action('after_setup_theme','perfection_setup');

// Enqueuing Script and Style tags

function perfection_scripts() {

    /* Stylesheets */
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Amatic+SC|Open+Sans+Condensed:300&display=swap' );
    wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/c7d9fe6cc2.js' );

    /* Scripts */
    wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.3.1', true );
    
    
    
    /*Commet reply javascript activation*/
    
    if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )  wp_enqueue_script( 'comment-reply' );
    
    if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
    } else {
    // file exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
}

    add_action('wp_enqueue_scripts','perfection_scripts');





//Removes brackets from [...]

function custom_excerpt_more( $more ) {
	    return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

// Change excerpt length from 55 words to 25 words

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Modifies Comment Form Default Input Fields
add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
  function bootstrap3_comment_form_fields( $fields ) {
$commenter = wp_get_current_commenter();

$req      = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

$fields   =  array(
    'author' => '<div class="form-group comment-form-author">' . '<label class="sr-only" for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
'<input class="form-control" id="author" name="author" type="text" placeholder="Name *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
    'email'  => '<div class="form-group comment-form-email"><label class="sr-only" for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
'<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="Email *"' . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
    
);

return $fields;
}

// Modifies Comment Form Textarea Field
add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
function bootstrap3_comment_form( $args ) {
    $args['comment_field'] = '<div class="form-group comment-form-comment">
                <label class="sr-only" for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
                <textarea class="form-control" id="comment" name="comment" cols="45" placeholder="Comment" rows="8" aria-required="true"></textarea>
                </div>';
    $args['class_submit'] = 'btn btn-default'; // since WP 4.1
                                            
    return $args;
} 

// Moves the Comment textarea to the bottom of the group of Comment Fields
function wpb_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
  }
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

//Register Widgets

// Register Sidebars
function perfection_sidebars() {

	$args = array(
		'id'            => 'main-sidebar',
		'class'         => 'main-sidebar-area',
		'name'          => __( 'Main Sidebar', 'perfection' ),
		'description'   => __( 'on default layout and located on right side on blog posts', 'perfection' ),
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'before_widget' => '<div id="%1$s" class="card my-4 %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

	$args = array(
		'id'            => 'sidebar-contact',
		'class'         => 'sidebar-contact-area',
		'name'          => __( 'Footer Widget Area', 'perfection' ),
		'description'   => __( 'This is the contact widget in the footer area.', 'perfection' ),
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
		'before_widget' => '<div id="%1$s" class="card my-4 %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

	$args = array(
		'id'            => 'sidebar-secondary',
		'class'         => 'sidebar-secondary-area',
		'name'          => __( 'Sidebar Secondary Widget', 'perfection' ),
		'description'   => __( 'Widget that displays on blog posts.', 'perfection' ),
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'before_widget' => '<div id="%1$s" class="card my-4 %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'perfection_sidebars' );

//CUSTOM BUSINESS ADDRESS WIDGET

// Business Address Widget - Initial Setup and Registering
add_action( 'widgets_init', 'business_address_widget_init' );
function business_address_widget_init() {
  register_widget( 'business_address_widget' );
  }
class business_address_widget extends WP_Widget {
 public function __construct() {
  $widget_details = array(
  'classname' => 'business_address_widget',
  'description' => 'Your business address. Displays the proper schema for the best SEO benefit.'
  );
 parent::__construct( 'business_address_widget', 'Business Address', $widget_details );
 }

 // Business Address Widget - Back-end display form
 public function form( $instance ) {
  $title = '';
  if( !empty( $instance['title'] ) ) {
  $title = $instance['title'];
  }
  
  $businessname = '';
  if( !empty( $instance['businessname'] ) ) {
  $businessname = $instance['businessname'];
  }
  
  $address1 = '';
  if( !empty( $instance['address1'] ) ) {
  $address1 = $instance['address1'];
  }
  
  $address2 = '';
  if( !empty( $instance['address2'] ) ) {
  $address2 = $instance['address2'];
  }
  
  $businesscity = '';
  if( !empty( $instance['businesscity'] ) ) {
  $businesscity = $instance['businesscity'];
  } 
  
  $businessstate = '';
  if( !empty( $instance['businessstate'] ) ) {
  $businessstate = $instance['businessstate'];
  }
  
  $businesszip = '';
  if( !empty( $instance['businesszip'] ) ) {
  $businesszip = $instance['businesszip'];
  } 
  
  $businessemail = '';
  if( !empty( $instance['businessemail'] ) ) {
  $businessemail = $instance['businessemail'];
  } 
  
  $buscntrycode = '';
  if( !empty( $instance['buscntrycode'] ) ) {
  $buscntrycode = $instance['buscntrycode'];
  }
  
  $businessphone = '';
  if( !empty( $instance['businessphone'] ) ) {
  $businessphone = $instance['businessphone'];
  }
  
  $message = '';
  if( !empty( $instance['message'] ) ) {
  $message = $instance['message'];
  }
 ?>
<p>
    <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title (optional):', 'perfection' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_name( 'businessname' ); ?>"><?php _e( 'Business Name:', 'perfection' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'businessname' ); ?>" name="<?php echo $this->get_field_name( 'businessname' ); ?>" type="text" value="<?php echo esc_attr( $businessname ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_name( 'address1' ); ?>"><?php _e( 'Address line 1:', 'perfection' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'address1' ); ?>" name="<?php echo $this->get_field_name( 'address1' ); ?>" type="text" value="<?php echo esc_attr( $address1 ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_name( 'address2' ); ?>"><?php _e( 'Address line 2 (optional):', 'perfection' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'address2' ); ?>" name="<?php echo $this->get_field_name( 'address2' ); ?>" type="text" value="<?php echo esc_attr( $address2 ); ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_name( 'businesscity' ); ?>"><?php _e( 'City:', 'perfection' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'businesscity' ); ?>" name="<?php echo $this->get_field_name( 'businesscity' ); ?>" type="text" value="<?php echo esc_attr( $businesscity ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_name( 'businessstate' ); ?>"><?php _e( 'State:', 'perfection' ); ?></label>
    <input style="width: 35px; margin-right: 20px;" id="<?php echo $this->get_field_id( 'businessstate' ); ?>" name="<?php echo $this->get_field_name( 'businessstate' ); ?>" type="text" value="<?php echo esc_attr( $businessstate ); ?>" />
    <label for="<?php echo $this->get_field_name( 'businesszip' ); ?>"><?php _e( 'Zip:' ); ?></label>
    <input style="width: 70px;" id="<?php echo $this->get_field_id( 'businesszip' ); ?>" name="<?php echo $this->get_field_name( 'businesszip' ); ?>" type="text" value="<?php echo esc_attr( $businesszip ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_name( 'businessemail' ); ?>"><?php _e( 'Email:', 'perfection' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'businessemail' ); ?>" name="<?php echo $this->get_field_name( 'businessemail' ); ?>" type="text" value="<?php echo esc_attr( $businessemail ); ?>" />
</p>
<p>
    <?php _e( 'Phone', 'perfection' ); ?><br>
    <label for="<?php echo $this->get_field_name( 'buscntrycode' ); ?>"><?php _e( 'Country Code #:', 'perfection' ); ?></label>
    <input style="width: 30px; margin-right: 5px;" id="<?php echo $this->get_field_id( 'buscntrycode' ); ?>" name="<?php echo $this->get_field_name( 'buscntrycode' ); ?>" type="text" value="<?php echo esc_attr( $buscntrycode ); ?>" />
    <label for="<?php echo $this->get_field_name( 'businessphone' ); ?>"><?php _e( '#', 'perfection' ); ?></label>
    <input style="width: 110px;" id="<?php echo $this->get_field_id( 'businessphone' ); ?>" name="<?php echo $this->get_field_name( 'businessphone' ); ?>" type="text" value="<?php echo esc_attr( $businessphone ); ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_name( 'message' ); ?>"><?php _e( 'Message (optional):', 'perfection' ); ?></label>
    <textarea class="widefat" id="<?php echo $this->get_field_id( 'message' ); ?>" name="<?php echo $this->get_field_name( 'message' ); ?>" type="text"><?php echo esc_attr( $message ); ?></textarea>
</p>

<?php
 }
 public function update( $new_instance, $old_instance ) { 
  return $new_instance;
  }

// Business Address Widget - Front-end display HTML
 public function widget( $args, $instance ) {
 extract( $args );
  
  $title = apply_filters( 'widget_title', $instance['title'] );
  $businessname = $instance['businessname'];
  $address1 = $instance['address1'];
  $address2 = $instance['address2']; 
  $businesscity = $instance['businesscity'];
  $businessstate = $instance['businessstate'];
  $businesszip = $instance['businesszip'];
  $businessemail = $instance['businessemail']; 
  $buscntrycode = $instance['buscntrycode'];
  $businessphone = $instance['businessphone']; 
  $message = $instance['message'];
  
  echo $before_widget;
 if ( $title ) {
  echo $before_title . $title . $after_title;
  }
  echo '<div class="businesswidget" itemscope itemtype="http://schema.org/LocalBusiness">';
  echo '<p class="businessname" itemprop="name"><i class="fa fa-map-marker"></i>' . $businessname . '</p>';
  echo '<address itemprop="address"><span style="display: block; padding-left: 22px;">';
 if ($address1) {
  echo $address1 . '<br>';
  }
  if ($address2) {
  echo $address2 . '<br>';
  }
  if ($businesscity) { 
  echo $businesscity . ', ' . $businessstate . '  ' . $businesszip;
  echo '</span></address>';
  }  
  if ($businessemail) {
  echo '<p class="businessemail"><i class="fa fa-envelope-o"></i>' . $businessemail . '</p>';
  }
 if ($businessphone) {
  echo '<p class="businessphone" itemprop="telephone"><i class="fa fa-phone"></i><a href="tel:+' . $buscntrycode . $businessphone . '">' . $businessphone . '</a></p>';
  }
 if ($message) {
  echo $message;
  }
  echo '</div>';
  echo $after_widget;
  }
} // class business_address_widget ends here

//Feature text function

function featuretext() {
   if ( is_front_page() ) {
    _e('Jane B. Smith <br>A Perfect Web Designer', 'perfection');
   }
   elseif( is_home() ) {
   _e('Perfection Blog', 'perfection');
  }
   elseif( is_page_template( 'page_about-single-use.php' ) ) {
  _e('About Perfection', 'perfection');
  }
}

// Theme Customizer

function perfection_customizer_register( $wp_customize ) {

    // Theme Customizer -- Site Identity Section

    $wp_customize->get_control( 'display_header_text' )->label = __('Display Site Title or Logo', 'perfection');
    
    $wp_customize->get_control( 'blogdescription' )->label = __('Feature Text', 'perfection');
    
    $wp_customize->get_control( 'site_icon' )->label = __( 'Site Icon (aka favicon)', 'perfection' );
    
    $wp_customize->get_control( 'blogname' )->priority = 10;
    $wp_customize->get_control( 'display_header_text' )->priority = 20;
    $wp_customize->get_control( 'blogdescription' )->priority = 30;
    $wp_customize->get_control( 'site_icon' )->priority = 40;
    
    // Theme Customizer -- Rename and Describe Header Image Section
    $wp_customize->add_section( 'header_image' , array(
      'title'      => __( 'Large Hero Image', 'perfection' ),
      'description' => 'Change the large hero image that appears on the Home page.',
      'priority' => 40,
      ) );
    
    // Theme Customizer -- Colors Section
    
        // Theme Customizer -- Rename and Describe Color Section
        $wp_customize->add_section( 'colors' , array(
          'title'      => __( 'Site Colors', 'perfection' ),
          'description' => 'Change the colors of the header, footer, and section.',
          'priority' => 20,
          ) );

        // Header Background Color Setting
        $wp_customize->add_setting( 'header_bg_color', array(
                'default' => '#adc1c4'
        ) );

        // Header Background Color Control -- This is a color picker control
        $wp_customize->add_control( 
                new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', 
                    array(
                        'label' => __('Header Background Color', 'perfection'),
                        'section' => 'colors',
                        'settings' => 'header_bg_color',
                    )
        ) );

        // Header Title Color Setting
        $wp_customize->get_setting( 'header_textcolor' )->default = '#ffffff';
        $wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title Color', 'perfection' );
    
          // Footer Background Color Setting
        $wp_customize->add_setting( 'footer_bg_color', array(
                'default' => '#adc1c4'
        ) );
        
        // Footer Background Color Control -- This is a color picker control
        $wp_customize->add_control( 
                new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', 
                    array(
                        'label' => __('Footer Background Color', 'perfection'),
                        'section' => 'colors',
                        'settings' => 'footer_bg_color',
                    )
        ) );
    
        // Footer Title Color Setting
       // $wp_customize->get_setting( 'footer_textcolor' )->default = '#ffffff';
        //$wp_customize->get_control( 'footer_textcolor' )->label = __( 'Footer Title Color', 'perfection' );
    
    
        // Home Page Area Colors
        $wp_customize->add_setting('home_area_colors', array(
                'default'=> 'value1',
        ));

        $wp_customize->add_control( 'home_area_colors', 
          array(
            'label'		 => __('Home Section Colors', 'perfection' ),
            'section'    => 'colors',
            'settings'   => 'home_area_colors',
            'type'       => 'radio',
            'choices'    => array(
                'value1' => __( 'Standard', 'perfection' ),
                'value2' => __( 'Reverse', 'perfection' ),
                'value3' => __( 'Black and White', 'perfection' ),
                ),
             )
        );
    
    // Theme Customizer - Social Icons
        $wp_customize->add_section( 'social_icons_section', array(
                'title'           => __( 'Social Icons', 'perfection' ),
                'description'     => __( 'Add your social media URLs to each field below to display their related social icons in the footer.', 'perfection' ),
                'priority'        => 50,
        ) );
    

        // Control/Setting for Facebook Link
        $wp_customize->add_setting( 'facebook_url', array(
                'default'           => '',
                'sanitize_callback' => 'esc_url',
        ) );
        $wp_customize->add_control( 'facebook_url', array(
                'type'        =>  'url',
                'priority'    => 10,
                'section'     => 'social_icons_section',
                'label'       => __( 'Facebook URL', 'perfection' ),
                'description' => __( 'Enter the complete address, including the http://', 'perfection' ),
        ) );
    
        // Control/Setting for Instagram Link
        $wp_customize->add_setting( 'instagram_url', array(
                'default'           => '',
                'sanitize_callback' => 'esc_url',
        ) );
        $wp_customize->add_control( 'instagram_url', array(
                'type'        =>  'url',
                'priority'    => 20,
                'section'     => 'social_icons_section',
                'label'       => __( 'Instagram URL', 'perfection' ),
                'description' => __( 'Enter the complete address, including the http://', 'perfection' ),
        ) );
    
        // Control/Setting for Twitter Link
        $wp_customize->add_setting( 'twitter_url', array(
                'default'           => '',
                'sanitize_callback' => 'esc_url',
        ) );
        $wp_customize->add_control( 'twitter_url', array(
                'type'        =>  'url',
                'priority'    => 20,
                'section'     => 'social_icons_section',
                'label'       => __( 'Twitter URL', 'perfection' ),
                'description' => __( 'Enter the complete address, including the http://', 'perfection' ),
        ) );
    
          // Control/Setting for LinkedIn Link
        $wp_customize->add_setting( 'linkedin_url', array(
                'default'           => '',
                'sanitize_callback' => 'esc_url',
        ) );
        $wp_customize->add_control( 'linkedin_url', array(
                'type'        =>  'url',
                'priority'    => 20,
                'section'     => 'social_icons_section',
                'label'       => __( 'LinkedIn URL', 'perfection' ),
                'description' => __( 'Enter the complete address, including the http://', 'perfection' ),
        ) );

}
add_action( 'customize_register', 'perfection_customizer_register' );

// Add CSS from Theme Customizer to wp_head

function perfection_customizer_css() {
?>
    <style>

    /*=== Style from The Customizer Colors Section - Header Color ===*/
    .navbar {
        background-color: <?php echo get_theme_mod( 'header_bg_color' ); ?> !important;
    }
    
    .navbar-light .navbar-brand {
        color: #<?php header_textcolor(); ?>;
    }
        
    /*=== Style from The Customizer Colors Section - Footer Color ===*/
        
    #contact-footer {
        background-color: <?php echo get_theme_mod( 'footer_bg_color' ); ?>  
    }
  

    /*==== Style From The Customizer Colors for Welcome Section - Standard or Reverse ===*/
    
    <?php if( get_theme_mod( 'home_area_colors') == 'value2' ) : ?>
    #recent-work {
        background-color: #6e7d7f;
    }
    
    #recent-work a {
        color: #ffffff;
    }
        
    #welcome {
         background-color: #ffffff;
    }
    
    #welcome p, 
    #welcome h2 {
         color: black;
    }
        
    #welcome button {
        background-color: #285f65;
        color: #ffffff;
    }
    <?php endif; ?>
        
        
    <?php if( get_theme_mod( 'home_area_colors') == 'value3' ) : ?>
        
    #recent-work {
        background-color: #000000;
    }
    
    #recent-work a {
        color: #ffffff;
    }
        
    #welcome {
         background-color: #ffffff;
    }
    
    #welcome p, 
    #welcome h2 {
         color: black;
    }
        
    #welcome button {
        background-color: #000000;
        color: #ffffff;
    }
    <?php endif; ?>
        
    </style>
<?php
  }
add_action( 'wp_head', 'perfection_customizer_css' );

//Allow links to logo AND site title text

add_filter('get_custom_logo', 'custom_logo_output', 10);
  function custom_logo_output( $html ){
  $html = str_replace( 'custom-logo-link', 'custom-logo-link navbar-brand page-scroll', $html );
  return $html;
}

//Custom Dashboard link

// Dashboard Footer Customization

function perfection_footer_admin () {

echo '<p>' . __( 'Theme by', 'perfection' ) . ' <a http://rcsoltis.webhostingforstudents.com/portfolio/" target="_blank">' . __( 'RCS', 'perfection' ) . '</a> | ' . __( 'Designed by', 'perfection' ) . ' <a http://rcsoltis.webhostingforstudents.com/portfolio/" target="_blank">Rebecca C. Soltis</a></p>';
}
add_filter('admin_footer_text', 'perfection_footer_admin');

