<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		// wp_head();
		// add_filter( 'wpseo_debug_markers', '__return_false' );
		// add_filter( 'wpseo_canonical', '__return_false' );
		// add_filter( 'wpseo_opengraph_url', '__return_false' );
		// add_filter( 'wpseo_twitter_url', '__return_false' );
		// 
		$stylesheet_directory = basename(get_stylesheet_directory());
		
		$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
		
		$post_id = $wp_query->post->ID;
		$page_title = $wp_query->post->post_title;				

	?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


<body class="home">
<?php

		$nav_file = $_SERVER['DOCUMENT_ROOT'].$child_themedir."/nav.php";
		if(is_file($nav_file)){
			print "<!-- INCLUDE: ".$nav_file." -->";
			include $nav_file;
		} else {
			print "<!-- NOT A FILE ".$nav_file." -->";
		}


?>