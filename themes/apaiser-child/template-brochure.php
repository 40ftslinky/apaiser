<?php
/**
 * The template for displaying the about page.
 *
 * Template name: Brochure single page
 *
 * @package storefront
 */


		$stylesheet_directory = basename(get_stylesheet_directory());
		
		$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
		

		global $wp_query;
		
		$post_id = $wp_query->post->ID;
		
		
		
		
		function search_media_library_by_filepath($search_string) {
			global $wpdb;

			// Construct the SQL query
			$query = $wpdb->prepare(
				"SELECT * FROM $wpdb->posts
				WHERE post_type = 'attachment'
			
				AND guid LIKE %s",

				'%' . $wpdb->esc_like($search_string) . '%'
			);

			// Execute the query
			$results = $wpdb->get_results($query);
			
			$Returns = [];

			// Check if any results were found
			if (!empty($results)) {
				foreach ($results as $result) {
					//echo 'ID: ' . $result->ID . ' | URL: ' . $result->guid . '<br>';
					
					$Returns[] = $result->guid;
					
				}
			} else {
					//	echo 'No media library entries found containing the searched string.';
			}
			
			
			return $Returns;
		}



		
		if(!empty($_GET)){
			
			if(!empty($_GET['f'])){
				
				$File = $_GET['f'];

				$Media = search_media_library_by_filepath($File);
				
				
				if(!empty($Media[0])){
					
					$File_URL = $Media[0];
					
				}


				
			}

		}


if(!empty($File_URL)){
	
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
	  
} else {
	
	print "<p>The requested file could not be found</p>";
	
	
}
	  