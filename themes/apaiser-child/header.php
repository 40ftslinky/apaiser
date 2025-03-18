<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
	<!-- start wp_head(); -->
	

	
	<?php
	
	

		
		if(!empty($_GET['s'])){
			
			
			$S = ucwords(strtolower($_GET['s']));
			
			if(!isset($_COOKIE['apaiser_search_terms_a'])){
				
				setcookie('apaiser_search_terms_a', $S, time() + 31536000, "/"); 	// expires in a year (31536000 second)
				
				//setcookie('apaiser_search_terms_b', "Baths", time() + 31536000, "/"); 	// expires in a year (31536000 second)
				
				//setcookie('apaiser_search_terms_c', "Basins", time() + 31536000, "/"); 	// expires in a year (31536000 second)
				
				
			} else {
				
				if(($_COOKIE['apaiser_search_terms_a']!=$S) && ($_COOKIE['apaiser_search_terms_b']!=$S)  && ($_COOKIE['apaiser_search_terms_c']!=$S)){
				
					setcookie('apaiser_search_terms_c', $_COOKIE['apaiser_search_terms_b'], time() + 31536000, "/"); 	// expires in a year (31536000 second)
					
					setcookie('apaiser_search_terms_b', $_COOKIE['apaiser_search_terms_a'], time() + 31536000, "/"); 	// expires in a year (31536000 second)
					
					setcookie('apaiser_search_terms_a', $S, time() + 31536000, "/"); 	// expires in a year (31536000 second)
					
				}
				
				
			}
			
		} else {

			if(!isset($_COOKIE['apaiser_search_terms_a'])){	

				//
				//setcookie('apaiser_search_terms_a', "Baths", time() + 31536000, "/"); 	// expires in a year (31536000 second)
				
				//
				//setcookie('apaiser_search_terms_b', "Basins", time() + 31536000, "/"); 	// expires in a year (31536000 second)
				
				//
				//setcookie('apaiser_search_terms_c', "Vanities", time() + 31536000, "/");
				
			}
			
		}

		wp_head();
		





		
		// add_filter( 'wpseo_debug_markers', '__return_false' );
		// other options
		// add_filter( 'wpseo_canonical', '__return_false' );
		// add_filter( 'wpseo_opengraph_url', '__return_false' );
		// add_filter( 'wpseo_twitter_url', '__return_false' );
		// 
		$stylesheet_directory = basename(get_stylesheet_directory());
		
		$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
		
		$post_id = $wp_query->post->ID;
		
		$page_title = $wp_query->post->post_title;				

		$slug = $wp_query->post->post_name;
		
	?>
	<!-- end wp_head(); -->
	
	<script type="text/javascript" src="/wp-includes/js/dist/hooks.min.js" id="wp-hooks-js"></script>
	<script type="text/javascript" src="/wp-includes/js/dist/i18n.min.js" id="wp-i18n-js"></script>
	<script type="text/javascript" src="/wp-includes/js/dist/dom-ready.min.js" id="wp-dom-ready-js"></script>
	<script type="text/javascript" src="/wp-includes/js/dist/a11y.min.js" id="wp-a11y-js"></script>
	<script type="text/javascript" src="/wp-includes/js/jquery/ui/core.min.js" id="jquery-ui-core-js"></script>
	
	
	
    <meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		
		global $PageName;
	
		if(!empty($PageName)){
			
			$page_title = $PageName;
			
		}

	
	?>
    <title><?php echo $page_title ?> | Apaiser</title>

    <link rel="icon" href="assets/fav/favicon.ico">
    <!-- <link rel="icon" href="assets/fav/favicon.png"> -->
    <link rel="icon" href="assets/fav/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script src="https://kit.fontawesome.com/08e8c4f6cf.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="<?php echo $child_themedir; ?>/css/styles.css?v=1.0">
	
	
	
	

</head>
<?php

	global $template_name;

	if(!empty($template_name)){
		
		$body_class = $template_name;
		
	} else {
		
		$slug = $wp_query->post->post_name;
		
		$body_class = $slug;
		
	}



?>

<body class="<?php echo $body_class; ?>">
<!-- ::nav:: -->
<?php

		$nav_file = $_SERVER['DOCUMENT_ROOT'].$child_themedir."/nav.php";
		
		if(is_file($nav_file)){

			include $nav_file;
			
		} 


?>