<?php
date_default_timezone_set('Australia/Melbourne');
define('THEME_URI', get_stylesheet_directory_uri());


define('THEME_SCRIPTS', THEME_URI . '/js/scripts');


// DEQUEUE

// Dequeue Emojis
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
	/*  DISABLE GUTENBERG STYLE IN HEADER| WordPress 5.9 */
	 wp_dequeue_style( 'global-styles' );
	 // Dequeue Contact Form 7
	wp_dequeue_script( 'contact-form-7' );
	wp_dequeue_style( 'contact-form-7' );
	 
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

// Remove Parent STyles
    function tdt_dequeue_styles(){
        wp_dequeue_style('twentytwentytwo-style');
        wp_deregister_style('twentytwentytwo-style');
        wp_dequeue_style('parent-style');
        wp_deregister_style('parent-style');
		wp_dequeue_style('dashicons');
		wp_deregister_style( 'dashicons' ); 
		//searchwp-forms
        wp_dequeue_style('searchwp-forms');
        wp_deregister_style('searchwp-forms');
		//	yoast-seo-adminbar
        wp_dequeue_style('yoast-seo-adminbar');
        wp_deregister_style('yoast-seo-adminbar');
		
    }
    add_action( 'wp_print_styles', 'tdt_dequeue_styles', 9999 );





















// Prevent WP from adding <p> tags on all post types
function disable_wp_auto_p( $content ) {
  remove_filter( 'the_content', 'wpautop' );
  remove_filter( 'the_excerpt', 'wpautop' );
  return $content;
}
add_filter( 'the_content', 'disable_wp_auto_p', 0 );

// Prevent CF7 from adding <p> tags on all forms
add_filter('wpcf7_autop_or_not', '__return_false');









function add_scripts() {

	// wp_deregister_script('jquery');
	

	//
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', '', '3.7.1', false);
	

	//	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', '', '2.2.4', false);


	// Footer Library JS

	wp_enqueue_script('modernizr', THEME_SCRIPTS . '/lib/modernizr/modernizr.custom.min.js', '', '', true);
	
	wp_enqueue_script('bxslider', THEME_SCRIPTS . '/lib/jquery/bxslider/jquery.bxslider.js', '', '', true);
	
	wp_enqueue_script('equalize', THEME_SCRIPTS . '/lib/equalize/equalize.min.js', '', '', true);
	
	wp_enqueue_script('hammer', THEME_SCRIPTS . '/lib/hammer/hammer.min.js', '', '', true);
	
	wp_enqueue_script('mailchimp_validate', THEME_SCRIPTS . '/lib/mailchimp/mailchimp-validate.min.js', '', '', true);
	
	wp_enqueue_script('mailchimp', THEME_SCRIPTS . '/lib/mailchimp/mailchimp.min.js', '', '', true);
	
	wp_enqueue_script('swiper', THEME_SCRIPTS . '/lib/swiper/swiper.min.js', '', '', true);
	
	wp_enqueue_script('swiper_full_parallax', THEME_SCRIPTS . '/lib/swiper/swiper_full_paralax.js', '', '', true);
	
	wp_enqueue_script('slider_slick', THEME_SCRIPTS . '/lib/slick/slick.min.js', '', '', true);
	
	wp_enqueue_script('slider_slick_simple', THEME_SCRIPTS . '/lib/slick/slick_simple.min.js', '', '', true);

	wp_enqueue_script('mmenu', THEME_SCRIPTS . '/lib/jquery/mmenu/jquery.mmenu.all.js', '', '', true);
	
	wp_enqueue_script('featherlight', THEME_SCRIPTS . '/lib/featherlight/featherlight.min.js', '', '', true);
	
	wp_enqueue_script('fancybox', THEME_SCRIPTS . '/lib/jquery/fancybox/jquery.fancybox.min.js', '', '', true);
	
	wp_enqueue_script('smoothscroll', THEME_SCRIPTS . '/lib/jquery/smooth-scroll/jquery.smooth-scroll.min.js', '', '', true);
	
	wp_enqueue_script('cookie', THEME_SCRIPTS . '/lib/jquery/cookie/js.cookie.js', '', '', true);


	// Footer Main JS

	wp_enqueue_script('main', THEME_SCRIPTS . '/main.js', '', 'v20191101a', true);

	// Footer Custom JS

	wp_enqueue_script('loadMore', THEME_SCRIPTS . '/load-more.js', '', '', true);
	
	wp_enqueue_script('slideTo', THEME_SCRIPTS . '/slideTo.js', '', '', true);
	
	wp_enqueue_script('text_unfold', THEME_SCRIPTS . '/text-unfold.js', '', '', true);
	
	wp_enqueue_script('accordion-multilevel', THEME_SCRIPTS . '/accordion-multilevel.js', '', '', true);
	
	wp_enqueue_script('sub-menu', THEME_SCRIPTS . '/sub-menu.js', '', '', true);
	
	wp_enqueue_script('headerBG', THEME_SCRIPTS . '/headerBG.js', '', '', true);
	
	wp_enqueue_script('mapplic', THEME_SCRIPTS . '/mapplic.js', '', '', true);

	//wp_enqueue_script('navigation_mobile_conf', THEME_SCRIPTS . '/navigation_mobile_conf.js', '', '', true);
	
	wp_enqueue_script('grid_filtering', THEME_SCRIPTS . '/grid_filtering.js', '', '', true);

	//taxonomy_product_cat and taxonomy_product_type only
	wp_enqueue_script('scroll_fix_stick', THEME_SCRIPTS . '/scrollFixStick.js', '', '', true);
	
	wp_enqueue_script('scroll_fix_stick_mosaic', THEME_SCRIPTS . '/scrollFixStick-mosaic.js', '', '', true);

}


add_action('wp_enqueue_scripts', 'add_scripts');







	
/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );





// Change number of posts per page (default is 10)
$posts_per_archive_page = 9;

function custom_control_search_results() {
	
	global $posts_per_archive_page;

  if ( is_search() )
        set_query_var('posts_per_archive_page', $posts_per_archive_page); // Change  the number of search results to appear per page.
}

add_filter('pre_get_posts', 'custom_control_search_results');










/*
// CREATE CUSTOM POST TYPE
function service_create_custom_taxonomy() {
    register_taxonomy(
        'service-category',
        'service',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'service-category' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'service_create_custom_taxonomy' );
function create_the_custom_post_type_service() {
 $services = array(
    'name'               => _x( 'Services', 'post type general name' ),
    'singular_name'      => _x( 'Service', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Service' ),
    'edit_item'          => __( 'Edit Service' ),
    'new_item'           => __( 'New Service' ),
    'all_items'          => __( 'All services' ),
    'view_item'          => __( 'View Service' ),
    'search_items'       => __( 'Search services' ),
    'not_found'          => __( 'No Service found' ),
    'not_found_in_trash' => __( 'No Service found in the Trash' ), 
    'menu_name'          => 'Services'
  );
  $args = array(
    'labels'        => $services,
    'description'   => 'pages for services',
    'public'        => true,
	'exclude_from_search' => false,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
	"capability_type"=>"page",
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_admin_bar'   => true,
	'show_in_nav_menus '   => true,
	'taxonomies'    => array( 'service-category', 'post_tag' )
  );
  register_post_type( 'service', $args ); 	// 
}
add_action( 'init', 'create_the_custom_post_type_service' );
// END CUSTOM POST TYPE





*/






/* =========================================================
    CUSTOM POST TYPES
    ======================================================== */

// Flush rewrite rules for custom post types
add_action('after_switch_theme', 'bones_flush_rewrite_rules');

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

function create_post_types() {


	add_action('init', 'set_default_post_type', 1);


	register_post_type(
		'products',
		array(
			'labels' => array(
				'name' => __('Products'),
				'singular_name' => __('Product')
			),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8,
			'menu_icon'   => 'dashicons-art',
			'has_archive' => false,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky'),
			'taxonomies' => array('post_tag'),
			'rewrite' => array('slug' => 'products', 'with_front' => false),
		)
	);
	
	
	register_post_type(
		'product_files',
		array(
			'labels' => array(
				'name' => __('Product_files'),
				'singular_name' => __('Product_file')
			),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8,
			'menu_icon'   => 'dashicons-art',
			'has_archive' => false,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky'),
			'taxonomies' => array('post_tag'),
			'rewrite' => array('slug' => 'product_files', 'with_front' => false),
		)
	);
	
	

	register_post_type(
		'projects',
		array(
			'labels' => array(
				'name' => __('Projects'),
				'singular_name' => __('Project')
			),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 9,
			'menu_icon'   => 'dashicons-art',
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky'),
			'taxonomies' => array('post_tag'),
			'rewrite' => array('slug' => 'projects', 'with_front' => false),
		)
	);

	register_post_type(
		'inspiration',
		array(
			'labels' => array(
				'name' => __('Inspirations'),
				'singular_name' => __('Inspiration')
			),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 9,
			'menu_icon'   => 'dashicons-art',
			'has_archive' => false,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky'),
			'taxonomies' => array('post_tag'),
			'rewrite' => array('slug' => 'inspiration', 'with_front' => false),
		)
	);


	register_post_type(
		'press',
		array(
			'labels' => array(
				'name' => __('Press Releases'),
				'singular_name' => __('Press Release')
			),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 9,
			'menu_icon'   => 'dashicons-art',
			'rewrite' => array('slug' => 'press-releases', 'with_front' => true),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky'),
			'taxonomies' => array('post_tag'),
			'rewrite' => array('slug' => 'press-releases', 'with_front' => false),
		)
	);
	
	
	register_post_type(
		'brochures',
		array(
			'labels' => array(
				'name' => __('Brochures'),
				'singular_name' => __('Brochure')
			),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 9,
			'menu_icon'   => 'dashicons-art',
			'rewrite' => array('slug' => 'brochures', 'with_front' => true),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky'),
			'taxonomies' => array('post_tag'),
			'rewrite' => array('slug' => 'brochures', 'with_front' => false),
		)
	);
	
	/*
	register_post_type(
		'collections',
		array(
			'labels' => array(
				'name' => __('Collections'),
				'singular_name' => __('Collection')
			),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 9,
			'menu_icon'   => 'dashicons-art',
			'rewrite' => array('slug' => 'collections', 'with_front' => true),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky'),
			'taxonomies' => array('post_tag'),
			'rewrite' => array('slug' => 'collections', 'with_front' => false),
		)
	);
	*/
	/*
	register_post_type(
		'projects',
		array(
			'labels' => array(
				'name' => __('Projects'),
				'singular_name' => __('Project')
			),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 9,
			'menu_icon'   => 'dashicons-art',
			'rewrite' => array('slug' => 'projects', 'with_front' => true),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky'),
			'taxonomies' => array('post_tag'),
			'rewrite' => array('slug' => 'projects', 'with_front' => false),
		)
	);
	
	*/
	
	
}
add_action('init', 'create_post_types');





/* =========================================================
    REGISTER TAXONOMIES
    ======================================================== */

register_taxonomy(
	'product_cat',
	array('products'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __('Product Styles'),
			'singular_name' => __('Product Style')
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'products-cat', 'with_front' => false),
	)
);

register_taxonomy(
	'product_type',
	array('products', 'product_files'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __('Product Types'),
			'singular_name' => __('Product Type'),
			'search_items' =>  __('Search Product Types')
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'products-types', 'with_front' => false),
	)
);




register_taxonomy(
	'product_colors',
	array('products'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __('Product Colors'),
			'singular_name' => __('Product Color')
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'products-color', 'with_front' => false),
	)
);

register_taxonomy(
	'product_shapes',
	array('products'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __('Product Shapes'),
			'singular_name' => __('Product Shape')
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'products-shape', 'with_front' => false),
	)
);

register_taxonomy(
	'project_cat',
	array('projects'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __('Project Categories'),
			'singular_name' => __('Project Category')
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'projects-cat', 'with_front' => false),
	)
);





register_taxonomy(
	'project_region',
	array('projects'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __('Project Groups'),
			'singular_name' => __('Project Group')
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'projects-region', 'with_front' => false),
	)
);


register_taxonomy(
	'inspiration_cat',
	array('inspiration'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __('Inspiration Categories'),
			'singular_name' => __('Inspiration Category')
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'inspiration-cat', 'with_front' => false),
	)
);

register_taxonomy(
	'press_cat',
	array('press'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __('Press Categories'),
			'singular_name' => __('Press Category')
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'press-releases/category', 'with_front' => true),
	)
);



register_taxonomy(
	'brochures_type',
	array('brochures'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __('Brochure Types'),
			'singular_name' => __('Brochure Type')
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'brochures-type', 'with_front' => false),
	)
);



function getHomepagePostId() {
    // Check if WordPress functions are available
    if (function_exists('get_option')) {
        $pageOnFront = get_option('page_on_front'); // Get the ID of the front page
        return $pageOnFront;
    } else {
        return 'WordPress functions are not available.';
    }
}


// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

// End SVG



function getTaxonomyTermDetails($term_id) {
    // Ensure WordPress functions are available
    if (function_exists('get_term')) {
        $term = get_term($term_id);

        // Check if the term exists
        if ($term && !is_wp_error($term)) {
            return [
                'name' => $term->name,
                'description' => $term->description
            ];
        } else {
            return 'Term not found or invalid term ID.';
        }
    } else {
        return 'WordPress functions are not available.';
    }
}









function getFeaturedImage($postId) {
    // Ensure that WordPress functions are available
    if (function_exists('get_the_post_thumbnail_url')) {
        $imageUrl = get_the_post_thumbnail_url($postId);
        if(empty($imageUrl)){
			return 0;
		} else {
			return $imageUrl;
		}
    } else {
        return 0;
    }

}






	function enableFeaturedImages() {
		// Check if the theme supports post thumbnails
		if (function_exists('add_theme_support')) {
			add_theme_support('post-thumbnails');
		}
	}

	// Hook into 'after_setup_theme' to ensure this function runs when the theme is set up
	add_action('after_setup_theme', 'enableFeaturedImages');

	
	
	
	
		
		



	function theme_child_enqueue_scripts() {



		wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
		

		
	}

	add_action( 'wp_enqueue_scripts', 'theme_child_enqueue_scripts' );





	// Register the AJAX action for logged-in users
	add_action('wp_ajax_get_installations', 'get_installations');
	// Register the AJAX action for non-logged-in users
	add_action('wp_ajax_nopriv_get_installations', 'get_installations');

	function get_installations() {
		// Check the nonce for security
		//check_ajax_referer('load_more_posts_nonce', 'nonce');

		// Get the 'n' parameter from the AJAX request
		$n = isset($_POST['n']) ? intval($_POST['n']) : 0;

		// Define query arguments
		$args = array(
			'post_type'      => 'projects',
			'posts_per_page' => 9,
			'offset'         => $n,
			'orderby'        => 'id',
			'order'          => 'DESC',
			'post_status'    => 'publish'
		);

		// Fetch posts

		$Projects = get_posts( $args );


		foreach($Projects as $proj){
			$project_id = $proj->ID;
			$post_content = $proj->post_content;
			$post_name = $proj->post_name;
			$guid = $proj->guid;
			$title = $proj->post_title;
			 echo '<div>' . $title . '</div>';
		}

		//wp_reset_postdata();
		wp_die();
	}


function text_logger($text){
	$THEME_SCRIPTS = get_stylesheet_directory();

	$file_path = $THEME_SCRIPTS .'/__Test_Log.txt';
	//$writer  = file_put_contents($file_path, $text.PHP_EOL , FILE_APPEND | LOCK_EX);
}



			class Proj {
				// Properties
				public $id;
				public $title;
				public $image;
				public $subtitle;
				public $url;				
				public $slides;
				public $related;

				// Constructor
				public function __construct($id, $title, $image, $subtitle, $description, $url, $related, $slides) {
					$this->id = $id;
					$this->title = $title;
					$this->image = $image;
					$this->subtitle = $subtitle;
					$this->description = $description;
					$this->url = $url;
					$this->related = $related;
					$this->slides = $slides;
				}
				/*
				// Method to display the car details
				public function displayDetails() {
					return "This car is a {$this->year} {$this->make} {$this->model}.";
				}
				*/
			}



	function get_ajax_posts() {
   
		// Get the 'n' parameter from the AJAX request
		$n = isset($_POST['n']) ? intval($_POST['n']) : 0;
		
		
		$category = $_POST['category'];

		/*
		// Query Arguments
		$args = array(
			'post_type'      => 'projects',
			'posts_per_page' => 12,
			'offset'         => $n,

			'post_status'    => 'publish'
		);
		*/
		if($category != "all") {
		$args=[
		        'post_type' => 'projects',
				'posts_per_page' => 12,
				'offset'         => $n,
				'orderby'        => 'id',
				'order'          => 'DESC',
				'tax_query' => [
					[
						'taxonomy' => 'project_cat',
						'field' => 'slug',
						'terms' => $category
					]
				],
				'post_status' => 'publish'
		];

		} else {
			$args=[
		        'post_type' => 'projects',
				'posts_per_page' => 12,
				'offset'         => $n,
				'orderby'        => 'id',
				'order'          => 'DESC',
				'post_status' => 'publish'
		];
			
		}
    // The Query
    $ajaxposts = get_posts( $args ); // changed to get_posts from wp_query, because `get_posts` returns an array
	
	$Count = count($ajaxposts);
	
			
	text_logger("Count=".$Count);
	
	$projectposts = array();
	
	
	$loop=0;
	
	foreach($ajaxposts as $post){
		text_logger("loop=".$loop);
		/*

		*/
		$id = $post->ID;
		
		text_logger("id=".$id);
		
		
		$title = $post->post_title;
		$description = $post->post_content;
		$url = $post->guid;
		
		
		text_logger("title=".$title);
		text_logger("url=".$url);
		
		$image = get_field('hero2_background', $id);
		$images_thumbnail = get_field('thumbnail', $id)['url'];
		

		if(empty($image) && !empty($images_thumbnail)){
			$image = $images_thumbnail;
		}	
		
		
		text_logger("image=".$image);
		
		
		$Z=0;
		
		// Regions
		$regions = get_the_terms($id, 'project_region');
		$subtitle = "";
		foreach ($regions as $region) {
			if(!empty($subtitle)){
				$subtitle = $subtitle . ", ";
			}
			$regionName = $region->name;
			$subtitle = $RegionStr . $regionName;
			$Z++;
		}
		
		// Related
		$related = get_field('related_product', $id);
		
		$relArray = array();
		
		foreach ($related as $relat) {
			$relName = htmlentities($relat->post_title);
			$relID=$relat->ID;
			$rel_url = get_permalink( $relID );
			$relArray[]=[$relID, $relName, $rel_url];
		}
		
		// slides
		$slides = array();
		
		if (have_rows('installation_photos', $id)) :
			while (have_rows('installation_photos', $id)) :
				the_row();
				$slides[] = get_sub_field('photo');
			endwhile;
		else :
		endif;
		
		
		
		

		// makes new Obj from class "Proj"
		$projectposts[] = new Proj($id, $title, $image, $subtitle, $description, $url, $relArray, $slides);
		
	}

    echo json_encode( $projectposts );

    exit; // exit ajax call(or it will return useless information to the response)
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_posts', 'get_ajax_posts');
add_action('wp_ajax_nopriv_get_ajax_posts', 'get_ajax_posts');



function clear_cookies(){
	

	
	$n = $_POST['n'];

	
	if($n=='0' || $n==0){
				
		// Set the cookie with a past expiration date to remove it
		setcookie('apaiser_search_terms_a', '', time() - 3600, '/');

		// Optionally, also unset the $_COOKIE variable
		unset($_COOKIE['apaiser_search_terms_a']);

		
	}
	if($n=='1' || $n==0){

		// Set the cookie with a past expiration date to remove it
		setcookie('apaiser_search_terms_b', '', time() - 3600, '/');

		unset($_COOKIE['apaiser_search_terms_b']);
	}
	
	if($n=='2' || $n==2){

		// Set the cookie with a past expiration date to remove it
		setcookie('apaiser_search_terms_c', '', time() - 3600, '/');

		unset($_COOKIE['apaiser_search_terms_c']);
		
	}
	
	echo json_encode( $n );
	
	exit;
	
}


add_action('wp_ajax_clear_cookies', 'clear_cookies');
add_action('wp_ajax_nopriv_clear_cookies', 'clear_cookies');



 
 function get_largest_image_url($post_id) {
    // Get the post object
    $post = get_post($post_id);
    
    // Check if the post exists
    if (!$post) {
        return false;
    }

    // Get the post content
    $content = $post->post_content;

    // Use regex to find all image tags in the content
    preg_match_all('/<img[^>]+>/i', $content, $img_tags);

    // Initialize variables to track the largest image
    $largest_img_url = '';
    $largest_img_size = 0;

    // Loop through all image tags
    foreach ($img_tags[0] as $img_tag) {
        // Use regex to extract the src attribute from the image tag
        preg_match('/src=["\']?([^"\'>]+)["\']?/i', $img_tag, $img_url);

        // Get the image URL
        if (!empty($img_url[1])) {
            $img_url = $img_url[1];

            // Get the image size
            $img_size = getimagesize($img_url);

            // Check if the image size is greater than the current largest image size
            if ($img_size) {
                $img_area = $img_size[0] * $img_size[1]; // Calculate the image area (width * height)
                if ($img_area > $largest_img_size) {
                    $largest_img_size = $img_area;
                    $largest_img_url = $img_url;
                }
            }
        }
    }

    // Return the URL of the largest image
    return $largest_img_url;
}


 
 
 


 function get_custom_excerpt($post_id) {
    // Get the post object
    $post = get_post($post_id);
    
    // Check if the post has an excerpt
    if (has_excerpt($post_id)) {
        // Return the existing excerpt
		print "<!-- excerpt=post_excerpt -->";
        return $post->post_excerpt;
    } else {
        // Get the post content
        $content = $post->post_content;
        
        // Strip all HTML tags and shortcodes
        $content = wp_strip_all_tags(strip_shortcodes($content));
        
        // Split the content into sentences
        $sentences = preg_split('/(\.|\?|\!)(\s)/', $content, -1, PREG_SPLIT_DELIM_CAPTURE);
        
        // Check if there are enough sentences
        if (count($sentences) > 1) {
            // Combine the first 2 sentences
            $excerpt = $sentences[0] . $sentences[1] . $sentences[2] . $sentences[3];
			print "<!-- excerpt=sentences -->";
        } else {
            // Use the first 1 sentence if there are fewer than two
            $excerpt = $sentences[0] . $sentences[1];
			print "<!-- excerpt=sentence -->";
			
        }
        
        // Trim the excerpt to remove any extra spaces
        $excerpt = trim($excerpt);
        
        return $excerpt;
    }
}










	function remove_expander_maker_tags($content) {
		
		// Define the pattern to match the expander_maker tag and its attributes
		
		$pattern = '/\[expander_maker.*?\]/i';

		// Use preg_replace to remove the matched tags from the content
		
		$cleaned_content = preg_replace($pattern, '', $content);
		
		$pattern = '/\[contact-form-7.*?\]/i';
		$cleaned_content = preg_replace($pattern, '', $cleaned_content);

		// Use preg_replace to remove the shortcodes
		$pattern = '/\[smartslider3 slider="[^"]*"\]/';
		$cleaned_content = preg_replace($pattern, '', $cleaned_content);
		
		$pattern = '/\[metaslider.*?\]/i';
		$cleaned_content = preg_replace($pattern, '', $cleaned_content);


		$cleaned_content=strip_shortcodes($cleaned_content);
		
		return $cleaned_content;
		
	}






	function clean_up_old_post($html) {
		
		$cleaned_html = remove_expander_maker_tags($html);
		
		// remove [/expander_maker]
		
		$cleaned_html = str_replace("[/expander_maker]", "", $cleaned_html);
		
		$cleaned_html = str_replace("[/expander_maker]", "", $cleaned_html);
		
		//php function removes expander_maker id=”x″ (where x equal any number ) from a string contining html

		return $cleaned_html;
		
	}






/*


add_action( 'init', function() {
add_shortcode( 'site_url', function( $atts = null, $content = null ) {
    return site_url();
} );

});



*/





/**************************************************************/
// FacetsWP filtering
/**************************************************************/
/*
add_filter('facetwp_assets', function ($assets) {
	unset($assets['nouislider.css']);
	return $assets;
});

*/

/*


function cfp($atts, $content = null) {
    extract(shortcode_atts(array( "id" => "", "title" => "", "pwd" => "" ), $atts));

    if(empty($id) || empty($title)) return "";

    $cf7 = do_shortcode('
Error: Contact form not found.

');

    $pwd = explode(',', $pwd);
    foreach($pwd as $p) {
        $p = trim($p);

        $cf7 = preg_replace('/<input type="text" name="' . $p . '"/usi', '<input type="password" name="' . $p . '"', $cf7);
    }

    return $cf7;
}
add_shortcode('cfp', 'cfp');

*/



	function create_new_username($string){
		
		//print "<p>string=$string</p>";
		//
		$new_user_name = $string;
		$new_user_name = str_replace("@","-", $new_user_name);
		$new_user_name = str_replace(".com.au","", $new_user_name);
		$new_user_name = str_replace(".net.au","", $new_user_name);
		$new_user_name = str_replace(".org.au","", $new_user_name);
		$new_user_name = str_replace(".com","", $new_user_name);
		$new_user_name = str_replace(".net","", $new_user_name);
		$new_user_name = str_replace(".org","", $new_user_name);
		$new_user_name = str_replace("gmail","", $new_user_name);
		$new_user_name = str_replace("hotmail","", $new_user_name);
		$new_user_name = str_replace("outlook","", $new_user_name);
		$new_user_name = sanitize_user($new_user_name);
		//print "<p>1) new_user_name=$new_user_name</p>";
		//   check is already exist and append num or  change etc
		if ( username_exists( $new_user_name ) ) {
			$user_count = (get_user_count() + 1);
			$new_user_name = $new_user_name."-".$user_count;
		}		
		
		//print "<p>2) new_user_name=$new_user_name</p>";
				
		return $new_user_name;
	}


	$sent_professional_email  = 0;

	add_action('wpcf7_mail_sent', function ($cf7) {
		// Run code after the email has been sent
		
		global $sent_professional_email;
		
		$sent_professional_email = 1;
		
		
	});




// Add to your (child) theme's functions.php

add_action( 'wp_footer', function() {
?>
<script>
document.addEventListener('facetwp-refresh', function() {
    if (FWP.loaded) {
        FWP.setHash();
        window.location.reload();
    }
});
</script>
<?php
}, 100 );
















function give_numbers_leading_zero( $number ) {
    return sprintf("%02s", $number);
}












function add_custom_user_role() {
    add_role(
        'professional',
        'Professional',
        array(
            'read' => true,
            'edit_posts' => false,
            'delete_posts' => false,
            'publish_posts' => false,
            'upload_files' => false,
        )
    );
}
add_action('init', 'add_custom_user_role');







/* Restrict Professionals CF7 so that cannot sign up with free email service like outlook, gmail, hotmail etc */

function is_business_email($email)
{
    if (
        preg_match('/@hotmail.com/i', $email) ||
        preg_match('/@gmail.com/i', $email) ||
        preg_match('/@yahoo.co/i', $email) ||
        preg_match('/@yahoo.com/i', $email) ||
        preg_match('/@mailinator.com/i', $email) ||
        preg_match('/@gmail.co.in/i', $email) ||
        preg_match('/@aol.com/i', $email) ||
        preg_match('/@yandex.com/i', $email) ||
        preg_match('/@msn.com/i', $email) ||
        preg_match('/@gawab.com/i', $email) ||
        preg_match('/@inbox.com/i', $email) ||
        preg_match('/@gmx.com/i', $email) ||
        preg_match('/@rediffmail.com/i', $email) ||
        preg_match('/@in.com/i', $email) ||
        preg_match('/@live.com/i', $email) ||
        preg_match('/@hotmail.co.uk/i', $email) ||
        preg_match('/@hotmail.fr/i', $email) ||
        preg_match('/@yahoo.fr/i', $email) ||
        preg_match('/@wanadoo.fr/i', $email) ||
        preg_match('/@wanadoo.fr/i', $email) ||
        preg_match('/@comcast.net/i', $email) ||
        preg_match('/@yahoo.co.uk/i', $email) ||
        preg_match('/@yahoo.com.br/i', $email) ||
        preg_match('/@yahoo.co.in/i', $email) ||
        preg_match('/@rediffmail.com/i', $email) ||
        preg_match('/@free.fr/i', $email) ||
        preg_match('/@gmx.de/i', $email) ||
        preg_match('/@gmx.de/i', $email) ||
        preg_match('/@yandex.ru/i', $email) ||
        preg_match('/@ymail.com/i', $email) ||
        preg_match('/@libero.it/i', $email) ||
        preg_match('/@outlook.com/i', $email) ||
        preg_match('/@uol.com.br/i', $email) ||
        preg_match('/@bol.com.br/i', $email) ||
        preg_match('/@mail.ru/i', $email) ||
        preg_match('/@cox.net/i', $email) ||
        preg_match('/@hotmail.it/i', $email) ||
        preg_match('/@sbcglobal.net/i', $email) ||
        preg_match('/@sfr.fr/i', $email) ||
        preg_match('/@live.fr/i', $email) ||
        preg_match('/@verizon.net/i', $email) ||
        preg_match('/@live.co.uk/i', $email) ||
        preg_match('/@googlemail.com/i', $email) ||
        preg_match('/@yahoo.es/i', $email) ||
        preg_match('/@ig.com.br/i', $email) ||
        preg_match('/@live.nl/i', $email) ||
        preg_match('/@bigpond.com/i', $email) ||
        preg_match('/@terra.com.br/i', $email) ||
        preg_match('/@yahoo.it/i', $email) ||
        preg_match('/@neuf.fr/i', $email) ||
        preg_match('/@yahoo.de/i', $email) ||
        preg_match('/@aim.com/i', $email) ||
        preg_match('/@bigpond.net.au/i', $email)
    ) {
        return false; // It is a free email address
    } else {
        return true; // It is likely a business email address
    }
}



function custom_email_validation_filter($result, $tag)
{
    $field_name = 'professionals-email';
    $tag = new WPCF7_Shortcode($tag);
    if ($field_name == $tag->name) {
        $the_value = isset($_POST[$field_name]) ? trim($_POST[$field_name]) : "";
        if (!is_business_email($the_value)) {
            $result->invalidate($tag, "Please enter a valid business email");
        }
    }
    return $result;
}
add_filter('wpcf7_validate_email', 'custom_email_validation_filter', 10, 2);
add_filter('wpcf7_validate_email*', 'custom_email_validation_filter', 10, 2);

?>