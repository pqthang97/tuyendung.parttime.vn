<?php
 

  define( 'THEME_URL', get_stylesheet_directory() );
  define( 'CORE', THEME_URL . '/core' );
 
  require_once( CORE . '/init.php' );
 
  if ( ! isset( $content_width ) ) {
        /*
         * Nếu biến $content_width chưa có dữ liệu thì gán giá trị cho nó
         */
        $content_width = 620;
   }

  if ( ! function_exists( 'tuyendung_theme_setup' ) ) {

        function tuyendung_theme_setup() {

                $language_folder = THEME_URL . '/languages';
                load_theme_textdomain( 'tuyendung', $language_folder );

                add_theme_support( 'automatic-feed-links' );

                add_theme_support( 'post-thumbnails' );

                add_theme_support( 'title-tag' );
 

                add_theme_support( 'post-formats',
                        array(
                                'video',
                                'image',
                                'audio',
                                'gallery'
                        )
                 );
 

                $default_background = array(
                        'default-color' => '#e8e8e8',
                );
                add_theme_support( 'custom-background', $default_background );
 

                 register_nav_menu ( 'primary-menu', __('Primary Menu', 'tuyendung') );
 

                 $sidebar = array(
                    'name' => __('Main Sidebar', 'tuyendung'),
                    'id' => 'main-sidebar',
                    'description' => 'Main sidebar for tuyendung theme',
                    'class' => 'main-sidebar',
                    'before_title' => '<h3 class="widgettitle">',
                    'after_sidebar' => '</h3>'
                 );
                 register_sidebar( $sidebar );
        }
        add_action ( 'init', 'tuyendung_theme_setup' );
 
  }

  if ( ! function_exists( 'tuyendung_logo' ) ) {
    function tuyendung_logo() {?>
      <div class="logo">
   
        <div class="site-name">
          <?php if ( is_home() ) {
            printf(
              '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
              get_bloginfo( 'url' ),
              get_bloginfo( 'description' ),
              get_bloginfo( 'sitename' )
            );
          } else {
            printf(
              '</p><a href="%1$s" title="%2$s">%3$s</a></p>',
              get_bloginfo( 'url' ),
              get_bloginfo( 'description' ),
              get_bloginfo( 'sitename' )
            );
          } // endif ?>
        </div>
        <div class="site-description"><?php bloginfo( 'description' ); ?></div>
   
      </div>
    <?php }
  }

  if ( ! function_exists( 'tuyendung_menu' ) ) {
    function tuyendung_menu( $slug ) {
      $menu = array(
        'theme_location' => $slug,
        'container' => 'nav',
        'container_class' => $slug,
      );
      wp_nav_menu( $menu );
    }
  }


if ( ! function_exists( 'tuyendung_thumbnail' ) ) {
  function tuyendung_thumbnail( $size ) {
    // Chỉ hiển thumbnail với post không có mật khẩu
    if ( ! is_single() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
      <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure><?php
    endif;
  }
}
 

if ( ! function_exists( 'tuyendung_entry_header' ) ) {
  function tuyendung_entry_header() {
    if ( is_single() ) : ?>
 
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
    <?php else : ?>
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h2><?php
 
    endif;
  }
}
 

if( ! function_exists( 'tuyendung_entry_meta' ) ) {
  function tuyendung_entry_meta() {
    if ( ! is_page() ) :
      echo '<div class="entry-meta">';
 
        // Hiển thị tên tác giả, tên category và ngày tháng đăng bài
        printf( __('<span class="author">Posted by %1$s</span>', 'tuyendung'),
          get_the_author() );
 
        printf( __('<span class="date-published"> at %1$s</span>', 'tuyendung'),
          get_the_date() );
 
        printf( __('<span class="category"> in %1$s</span>', 'tuyendung'),
          get_the_category_list( ', ' ) );
 
        // Hiển thị số đếm lượt bình luận
        if ( comments_open() ) :
          echo ' <span class="meta-reply">';
            comments_popup_link(
              __('Leave a comment', 'tuyendung'),
              __('One comment', 'tuyendung'),
              __('% comments', 'tuyendung'),
              __('Read all comments', 'tuyendung')
             );
          echo '</span>';
        endif;
      echo '</div>';
    endif;
  }
}

function tuyendung_readmore() {
  return '...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'tuyendung') . '</a>';
}
add_filter( 'excerpt_more', 'tuyendung_readmore' );
 

  if ( ! function_exists( 'tuyendung_entry_content' ) ) {
    function tuyendung_entry_content() {
 
      if ( ! is_single() ) :
        the_excerpt();
      else :
        the_content();

        $link_pages = array(
          'before' => __('<p>Page:', 'tuyendung'),
          'after' => '</p>',
          'nextpagelink'     => __( 'Next page', 'tuyendung' ),
          'previouspagelink' => __( 'Previous page', 'tuyendung' )
        );
        wp_link_pages( $link_pages );
      endif;
 
    }
  }

if ( ! function_exists( 'tuyendung_entry_tag' ) ) {
  function tuyendung_entry_tag() {
    if ( has_tag() ) :
      echo '<div class="entry-tag">';
      printf( __('Tagged in %1$s', 'tuyendung'), get_the_tag_list( '', ', ' ) );
      echo '</div>';
    endif;
  }
}

function tuyendung_styles() {
  if( !is_admin()){
    wp_deregister_script('jquery');
  }
  wp_register_style( 'main-style', get_template_directory_uri() . '/assets/landing.css', 'all' );
  wp_enqueue_style( 'main-style' );
  wp_register_script('base-script', get_template_directory_uri() .'/assets/base.js', 'all' );
  wp_enqueue_script('base-script');
  wp_register_script('main-script', get_template_directory_uri() .'/assets/script.js', 'all' );
  wp_enqueue_script('main-script');
}
add_action( 'wp_enqueue_scripts', 'tuyendung_styles' );


// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Job Templates', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Job Template', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Job Templates', 'text_domain' ),
		'name_admin_bar'        => __( 'Job Template', 'text_domain' ),
		'archives'              => __( 'Job Template Archives', 'text_domain' ),
		'attributes'            => __( 'Job Template Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Job Template:', 'text_domain' ),
		'all_items'             => __( 'All Job Templates', 'text_domain' ),
		'add_new_item'          => __( 'Add New Job Template', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Job Template', 'text_domain' ),
		'edit_item'             => __( 'Edit Job Template', 'text_domain' ),
		'update_item'           => __( 'Update Job Template', 'text_domain' ),
		'view_item'             => __( 'View Job Template', 'text_domain' ),
		'view_items'            => __( 'View Job Templates', 'text_domain' ),
		'search_items'          => __( 'Search Job Template', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Job Template', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Job Template', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Job Template', 'text_domain' ),
		'description'           => __( 'Job Template Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'jobtemplate_category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'job_template', $args );

}
add_action( 'init', 'custom_post_type', 0 );

// Register Custom Post Type
function custom_post_type_job_order() {

	$labels = array(
		'name'                  => _x( 'Job Orders', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Job Order', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Job Orders', 'text_domain' ),
		'name_admin_bar'        => __( 'Job Order', 'text_domain' ),
		'archives'              => __( 'Job Order Archives', 'text_domain' ),
		'attributes'            => __( 'Job Order Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Job Order:', 'text_domain' ),
		'all_items'             => __( 'All Job Orders', 'text_domain' ),
		'add_new_item'          => __( 'Add New Job Order', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Job Order', 'text_domain' ),
		'edit_item'             => __( 'Edit Job Order', 'text_domain' ),
		'update_item'           => __( 'Update Job Order', 'text_domain' ),
		'view_item'             => __( 'View Job Order', 'text_domain' ),
		'view_items'            => __( 'View Job Orders', 'text_domain' ),
		'search_items'          => __( 'Search Job Order', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Job Order', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Job Order', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Job Order', 'text_domain' ),
		'description'           => __( 'Job Order Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'job_order', $args );

}
add_action( 'init', 'custom_post_type_job_order', 0 );

// Register Custom Taxonomy
function jobtemplate_category() {

	$labels = array(
		'name'                       => _x( 'Job Template Categories', 'Taxonomy General Name', 'tuyendung' ),
		'singular_name'              => _x( 'Job Template Category', 'Taxonomy Singular Name', 'tuyendung' ),
		'menu_name'                  => __( 'Job Template Category', 'tuyendung' ),
		'all_items'                  => __( 'All Items', 'tuyendung' ),
		'parent_item'                => __( 'Parent Item', 'tuyendung' ),
		'parent_item_colon'          => __( 'Parent Item:', 'tuyendung' ),
		'new_item_name'              => __( 'New Item Name', 'tuyendung' ),
		'add_new_item'               => __( 'Add New Item', 'tuyendung' ),
		'edit_item'                  => __( 'Edit Item', 'tuyendung' ),
		'update_item'                => __( 'Update Item', 'tuyendung' ),
		'view_item'                  => __( 'View Item', 'tuyendung' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'tuyendung' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'tuyendung' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'tuyendung' ),
		'popular_items'              => __( 'Popular Items', 'tuyendung' ),
		'search_items'               => __( 'Search Items', 'tuyendung' ),
		'not_found'                  => __( 'Not Found', 'tuyendung' ),
		'no_terms'                   => __( 'No items', 'tuyendung' ),
		'items_list'                 => __( 'Items list', 'tuyendung' ),
		'items_list_navigation'      => __( 'Items list navigation', 'tuyendung' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'jobtemplate_category', array( 'job_template' ), $args );

}
add_action( 'init', 'jobtemplate_category', 0 );

// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Job Template Tags', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Job Template Tag', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Job Template Tag', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'jobtemplate_tag', array( 'job_template' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );


function jobrequest_rewrite_tag() {
	add_rewrite_tag( '%job-request%', '([^&]+)' );
}
add_action('init', 'jobrequest_rewrite_tag', 10, 0);

function jobrequest_rewrite_rule() {
	add_rewrite_rule( '^job-request/([^/]*)/?', 'index.php?post_type=job_template&slug=$matches[1]','top' );
}
add_action('init', 'jobrequest_rewrite_rule', 10, 0);