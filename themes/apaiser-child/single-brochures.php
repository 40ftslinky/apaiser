<?php
/**
 * The template for displaying the post.
 *
 * Template name: Single Brochure
 *
 * @package storefront
 */



	
	global $wp_query;
	
	$post_id = $wp_query->post->ID;

	
	$file = get_field('file', $post_id);
	
	
	print_r($file);
	
	
	print "<HR>";
	
	$File_URL = $file['url'];
	


		// Parse the URL and get the path and query components
		$url_components = parse_url($File_URL);

		// Reconstruct the URL without the protocol and domain
		$path_and_query = $url_components['path'];
		if (isset($url_components['query'])) {
			$path_and_query .= '?' . $url_components['query'];
		}

	//	echo $path_and_query; // Output: /path/to/page?query=string

	$path = $_SERVER['DOCUMENT_ROOT'].$path_and_query;
	

	
	// Get the filename 
	$filename = basename($path);

	

	

	  header('Content-type: application/pdf');
	  
	  
	  header('Content-Disposition: inline; filename="' . $filename . '"');
	  
	  header('Content-Transfer-Encoding: binary');
	  
	  header('Accept-Ranges: bytes');
	  
	  echo file_get_contents($path);
	  
	




