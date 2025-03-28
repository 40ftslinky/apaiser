<?php

		
		if(!empty($_GET['_post_types'])){
		
			$GetPostType = $_GET['_post_types'];
		
		} else {
			
			$GetPostType = "";
					
			
		}



	// Limit SearchWP results to Posts and Pages.
	add_filter( 'searchwp\query\mods', function( $mods, $query ) {
		
		
		


		
		$PT = $_GET['_post_types'];
		
		


		
	
	
	if(empty($PT)){
		
		$PT = "products";
	}
	
		
	if($PT=="products")
	{
			$ARRAY = [\SearchWP\Utils::get_post_type_source_name( 'products' )];
		
	} elseif ($PT=="post"){
		
		
			$ARRAY = [\SearchWP\Utils::get_post_type_source_name( 'post' )];
		
		
	} elseif ($PT=="projects" ){
		
		
			$ARRAY = [\SearchWP\Utils::get_post_type_source_name( 'projects' )];

	} elseif (	$PT=="press" ){
		
			$ARRAY = [\SearchWP\Utils::get_post_type_source_name( 'press' )];
	
	} elseif (	$PT=="brochures" ){

			$ARRAY = [\SearchWP\Utils::get_post_type_source_name( 'brochures' )];

	} else {

			$ARRAY = [
				\SearchWP\Utils::get_post_type_source_name( 'products' ),
				\SearchWP\Utils::get_post_type_source_name( 'post' ),
				\SearchWP\Utils::get_post_type_source_name( 'projects' ),
				\SearchWP\Utils::get_post_type_source_name( 'press' ),
				\SearchWP\Utils::get_post_type_source_name( 'brochures' )
			];

	}	
	
	

	  $mod = new \SearchWP\Mod();
	  
	  
		

	  $mod->set_where( [ [
		'column'  => 'source',
		'value'   => $ARRAY,
		'compare' => 'IN',
	  ] ] );
	  

	  
	  
	  $mods[] = $mod;



	

	
	foreach ( $query->get_engine()->get_sources() as $source ) {
		
			

			$sourceName = $source->get_name();
			print "<!-- :::sourceName::: ";
			
			print_r($sourceName);
			
			print " -->";
			

		
			$flag = 'post' . SEARCHWP_SEPARATOR;
			if ( 'post.' !== substr( $sourceName, 0, strlen( $flag ) ) ) {
				continue;
			}
			

			
		
		
			$mod = new \SearchWP\Mod($source);
  

				if(!empty($_GET['_sort'])){

							
							if($_GET['_sort'] == "date_desc" || $_GET['_sort'] == "title_desc")
							{
								
								$Order = 'DESC';
								
							} else {
								
								$Order = 'ASC';
								
							}

							
							print "<!-- :Order=$Order             -->";
							global $wpdb;
							
							$Pref = $wpdb->prefix;
							
							if($_GET['_sort'] == "date_desc" || $_GET['_sort'] == "date_asc")
							{
								$mod->order_by( function( $mod ) {
									return $mod->get_local_table_alias() . ".post_date";
								}, "$Order", 1 );
								
							} else {


								$mod->order_by( function( $mod ) {
									return $mod->get_local_table_alias() . ".post_title";
								}, "$Order", 1 );
							
							}
				
					
				}
			  
			  
			  $mods[] = $mod;
			  

	}
	

  
  return $mods;
  
}, 10, 2 );











	function search_results_tabs(){
		
		global $_products;
		global $_posts;
		global $_projects;
		global $_brochures;
		global $_press;
		global $Totals;
		
		
		$_products = search_results_section('products', 'Products', 12);	
		
		$_posts = search_results_section('post', 'Journal', 12);

		$_projects = search_results_section('projects', 'Projects', 12);
		
		//print "<hr>_projects:::";
		//print_r($_projects);
		//print "<hr>";
		
		$_press = search_results_section('press', 'Press Releases', 12);

		$_brochures = search_results_section('brochures', 'Brochures', 12);
		
		print '<div class="row search-results-tab-wrap" id="search-results-tab-wrap" style="display:none;">';
		print '<div class="search-results-tab-filters-wrap">';

		foreach($Totals as $Type=> $Total){
			  // Convert to lowercase first, then capitalize each word
			$Text = strtolower($Type);
			$Text = ucwords($Text);
			
			$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
			
			// Get the host
			$host = $_SERVER['HTTP_HOST'];
			
			// Get the request URI
			$request_uri = $_SERVER['REQUEST_URI'];

			// Regular expression to match "/page/x" where x is any number
			$pattern = '/\/page\/\d+/';

			// Remove the matched pattern from the string

			$PostType = "&_post_types=$Type";


			// Construct the full URL
			$Link = $protocol . $host . $request_uri. $PostType;	

			$Link = remove_query_args($Link, '_paged');			
			
			$Link = remove_query_args($Link, '_product_sizes_width');	
			
			$Link = remove_query_args($Link, '_product_sizes_height');	
			
			$Link = remove_query_args($Link, '_product_sizes_length');	
			
			$Link = remove_query_args($Link, '_categories');	
			
			$Link = remove_query_args($Link, '_product_types');	
			
			$Link = remove_query_args($Link, '_product_shapes');	
			
			// add active class on 
			  
			  $Selected =$_GET['_post_types'];
			  
			  
				if(empty($Selected)){
					$Selected ='products';
				}
				
				if($Selected == $Type){
					$Class = 'active';
				} else {
					$Class = '';
				}
					  
				if($Total>0){
					print "<a class='search-results-tab-item $Class' href='$Link' data-value='$Type'><span class='post_type_label'>$Text </span><span class='counter'>($Total)</span></a>";
				}
			
		}
		
		print '</div>';
		
			?>			
			<div class="async facetwp-sort-select-wrapper">
				<?php echo do_shortcode( '[facetwp sort="true"]' ); ?>
			</div>					
			<?php		
		
		print "<a class='filter-toggle' id='filter-toggle' title='filter selction'>
					<svg class='filter-svg' width='21' height='14' viewBox='0 0 21 14' fill='none' xmlns='http://www.w3.org/2000/svg'>
						<path fill-rule='evenodd' clip-rule='evenodd' d='M5.455 8.05471C6.65364 8.05471 7.6836 8.90544 7.91 10.0825H21V11.0825H7.95C7.75555 12.3126 6.68544 13.212 5.44026 13.1918C4.19509 13.1717 3.15459 12.2382 3 11.0025H0V10.0025L3 10.0825C3.2264 8.90544 4.25636 8.05471 5.455 8.05471ZM5.46 9.08251C4.63157 9.08251 3.96 9.75408 3.96 10.5825C3.96521 10.9839 4.13107 11.3664 4.42049 11.6446C4.70991 11.9227 5.09874 12.0732 5.5 12.0625L5.46 12.0825C6.28843 12.0825 6.96 11.4109 6.96 10.5825C6.96 9.75408 6.28843 9.08251 5.46 9.08251ZM15.45 0C16.6389 0 17.6634 0.837344 17.9 2.00251H21V3.00251H17.95C17.7159 4.16881 16.6896 5.00666 15.5 5.00251C14.2917 5.03093 13.2375 4.18756 13 3.00251H0V2.00251H13C13.2366 0.837344 14.2611 0 15.45 0ZM15.5 1.00251C14.6716 1.00251 14 1.67408 14 2.50251C14 3.33093 14.6716 4.00251 15.5 4.00251C16.3284 4.00251 17 3.33093 17 2.50251C17 1.67408 16.3284 1.00251 15.5 1.00251Z' fill='#212121'/>
					</svg>
				</a>";
		print '</div>';
		

		
	}

		




		function remove_query_args($url, $key_to_remove) {
			// Parse the URL and extract the query part
			$url_parts = parse_url($url);

			// Parse the query string into an associative array
			parse_str($url_parts['query'], $query_array);

			// Remove the specific key from the query array
			if (isset($query_array[$key_to_remove])) {
				unset($query_array[$key_to_remove]);
			}

			// Rebuild the query string without the removed key
			$new_query_string = http_build_query($query_array);

			// Reconstruct the URL
			$new_url = $url_parts['scheme'] . '://' . $url_parts['host'] . $url_parts['path'] . '?' . $new_query_string;

			return $new_url;
		}
		
		
		
		
			
			//	$current_post_type = '';
		
		
			function search_custom_pages($search_term, $post_type, $count = 12) {
				
				$posts_per_page = $count;
				
				if(empty($_GET['_post_types'])){
					$_GET['_post_types'] = $post_type;
				}
				
				//
				//print "post_type=".$post_type."<br>";

				if(empty($_GET['_paged'])){
					
					$n = 0;
					
				} else {
					
					$n = (($_GET['_paged'] - 1) * $posts_per_page);
					
				}
				

				global $wpdb;
				
				$Posts = array();

				$search_term = esc_sql($search_term); // Sanitize the search term
				$post_type = esc_sql($post_type); // Sanitize post type
				
				//print "search_term=".$search_term."<br>";
				//print "post_type=".$post_type."<br>";
					

				if(!isset($_GET['_sort'])){
					//	$_GET['_sort'] = "date_desc";
				} 
				
				if($_GET['_sort'] == "date_desc" || $_GET['_sort'] == "date_asc")
				{
					$OrderBy = 'post_date';
				} else {
					
					$OrderBy = 'post_title';
				}
				
				if($_GET['_sort'] == "date_desc" || $_GET['_sort'] == "title_desc")
				{
					$Order = 'DESC';
				} else {
					
					$Order = 'ASC';
				}
				
							 
	
					
					
					global $post;
					
					print "<!--  :::posts_per_page=$posts_per_page     -->";
					
					print "<!--  :::_GET['_paged']=".$_GET['_paged']."     -->";
					
					print "<!--  :::OrderBy=$OrderBy     -->";
					//print "OrderBy=".$OrderBy."<br>";
					
					print "<!--  :::Order=$Order     -->";
					//print "Order=".$Order."<br>";
					$paged = $_GET['_paged'];
					//print "paged=".$paged."<br>";

					$search = new \SearchWP\Query($search_term, 
					[
					'engine'   => 'default',
					'per_page' => $posts_per_page,
					'page '=>$_GET['_paged'],
					'fields'   => 'all',
					]
					);
					

					//print_r($search);	
					


					
	
					$results = $search->results; // Array of results.
					
					
					
										
					$CountResults = count($results);
					
					print "<!--  :::CountResults=$CountResults  -->";
					
					//print "CountResults=".$CountResults."<br>";
					
					
					foreach($results as $result){
						
						print "<!--  ";
						
						//	print_r($result);	
						
						print " -->";
						
						//print "result=".$result."<br>";
					}
					
					//print_r($search);
					

					foreach ($results as $post) {
						setup_postdata($post);
						// Do something with the post object
						
						$Posts[] =$post;
						
					}

				wp_reset_postdata();

				/*
				
				*/
				
				
				$query2 = "SELECT COUNT(DISTINCT p.ID) as match_count FROM $wpdb->posts p 
				INNER JOIN $wpdb->term_relationships tr ON (p.ID = tr.object_id) 
				INNER JOIN $wpdb->term_taxonomy tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id) 
				INNER JOIN $wpdb->terms t ON (tt.term_id = t.term_id) WHERE p.post_type = '{$post_type}' 
				AND p.post_status = 'publish' AND ( 
				p.post_title REGEXP '[[:<:]]{$search_term}[[:>:]]' 
				OR p.post_content REGEXP '[[:<:]]{$search_term}[[:>:]]'
				OR p.post_name REGEXP '[[:<:]]{$search_term}[[:>:]]' 
				OR t.name REGEXP '[[:<:]]{$search_term}[[:>:]]' ) ";

				$results2 = $wpdb->get_results($query2); 
				

				
				
				$match_count = $results2[0]->match_count;
				
				

				
				global $max_posts;
				
				if($match_count > $max_posts){
					
					$max_posts = $match_count;
					
				}
				
				global $Totals;
				
				$Totals[$post_type] = $match_count;
				
				return $Posts;
				
			}



	
	function show_the_post($my_post){
			
			$imgID = get_post_thumbnail_id( $my_post->ID );

			$post_id = $my_post->ID;
			
			print "<!-- show_the_post ::::post_id=$post_id  -->";


			if ($imgID) {
				$imgSizes = wp_get_attachment_image_src( $imgID, 'small_1_5' );
				
				if(!empty($imgSizes)){
					
					$image    = $imgSizes['0'];
					
					$imgWidth = $imgSizes[1];
					
					if(!empty($imgSizes[2]) && !empty($imgWidth)){
						$imgRatio = $imgSizes[2] / $imgWidth * 100;
					
					} else {
						$imgRatio =1;
					}
				}
			}	
			
			if(empty($image)){
				
				$image = get_field('thumbnail', $post_id)['url'];
				
			}
			
			if(empty($image)){
				
				$stylesheet_directory = basename(get_stylesheet_directory());
				
				$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
				
				$image=$child_themedir."/assets/images/placeholder.jpg";
				
				//$image = get_largest_image_url($post_id);
				
			}
		
			$yoast_description = get_post_meta($post_id, '_yoast_wpseo_metadesc', true);
		
			if(!empty($yoast_description)){
				
				$Excerpt = $yoast_description;
				

				
			} else {
				
				$Excerpt = get_custom_excerpt( $post_id );
				
			}
			
			
			
			$PostTitle=get_the_title( $post_id );
			
			print "<!-- show_the_post ::::PostTitle=$PostTitle  -->";
			
			$HTML="";
			$PL = get_permalink($post_id);
			
		
            	$HTML.='<a class="card_link" href="'.$PL.'">';
                $HTML.='<div class="card"><div class="card-image">';
				
               $HTML.='<img src="'.$image.'" alt="image">';
			   $HTML.='</div>';
               $HTML.='<div class="card-content">';
               $HTML.='<h3 class="product-title">'.$PostTitle.'</h3>';
              $HTML.='<p class="product-description">'.$Excerpt.'</p>';
				$HTML.='<button class="view_result-link">View Result</button></div></div></a>';
			
			return $HTML;
		
	}
	

	function search_results_section($post_type = 'products', $title='Products', $count=12){

			$search_term = $_GET['s'];
			$HTML='';
			
			//print "search_term=".$search_term."<br>";
			//
			//print "post_type=".$post_type."<br>";
			//
			//print "count=".$count."<br>";
			
			$Pages = search_custom_pages($search_term, $post_type, $count);
			
			//print_r($Pages);
			//
			//print "<br>";
			
			$CountPages = count($Pages);
			
			//print "CountPages=".$CountPages;
			//
			//print "<br>";
			
			//print "<!-- CountPages=$CountPages  -->";
			
			
			if(!empty($Pages)){
				

					if($post_type=='products'){
						$C= "grid-col";
					} else {
						$C = "grid-col-horiz";
					}
				$HTML.='<div class="row" id="'.$post_type.'"><div class="'.$C.' column ">';
				foreach($Pages as $a_post){
					$HTML.= show_the_post($a_post);
				}
				$HTML.="</div></div>";
			}

			return $HTML;
			
	}





		








	$PageName = "Search";

	$template_name = "search-results";

	get_header();

	include_once "nav.php";
	
	
	$stylesheet_directory = basename(get_stylesheet_directory());
	
	$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
	
	
	

	global $wp_query;
	
	$total_results = $wp_query->found_posts;
	
	print "<!-- found_posts (total_results) = $found_posts -->";


			
			
		?>
    <main >

<!-- section -->

    <section class="text_only" style="">
        <div class="row">
            <div class="col align-center">
                <div class="hero-content">
                    <!-- <h1 class="subtitle">Contact</h1> -->
                    <h1>Search Results</h1>
					
                   <!-- 
				   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga blanditiis ratione in eligendi cumque nihil numquam, optio aut veniam ullam voluptatum soluta velit, beatae vitae, quibusdam molestiae temporibus. Impedit, a!</p>
				   -->
				   
                </div>
            </div>
        </div>
    </section>

<!-- /section -->

<div class="filter_wrap"  id="facetWP-container">
    <div class="row">
        <div class="col column">
            <div class="content">

                <div class="filter">

                    <div class="sidebar" id="search-filters"  data-load-css="modules/search-filters" data-load="facetWP-custom">

                        <div class="refine_search_outer">
							<h4 class="" >Refine Search</h4>                      
							<span class="clear_search" onclick="reset_search_filter_options()">Clear Filter</span>
						</div>
                        <div id="refine">
                            

							
							
						
							<div class="push20">
								<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
									<div class="input-wrapper">
										<input type="search" id="s" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr( get_search_query() ); ?>" />
											<div class="submit-wrapper">
												<input type="submit" id="searchsubmit" value="search">
											</div>
									</div>
								</form>
							</div>
						
							
							<?php
							

							
							
							?>
									
							<div id="refine-search" class="refine-search ">

								

								
								<div class="push20" id="search_filter_categories">    
									 <h5 class="medium facet-label" id='facet-label-categories' style="display:none">Categories</h5>
									<?php echo do_shortcode('[facetwp facet="categories"]'); ?>
									
								</div>
								
								
								<div class="push20" id="search_filter_post_types" style='display:none'>    
									 <h5 class="medium facet-label" id='facet-label-post_types' style="display:none">Post Types</h5>
									<?php echo do_shortcode('[facetwp facet="post_types"]'); ?>
									
								</div>
								
								
								
								<script>
										
										function reset_search_filter_options(){
											
											console.log("reset_search_filter_options");
																						
											document.querySelectorAll('#refine .checked').forEach(function(element) {
												element.classList.remove('checked');
											});

											document.getElementById('searchform').submit();

										}	
																		
								
										function hide_or_show_h3(ID,Type){
										// Select the target node
										var targetNode = document.getElementById(ID);

										if (targetNode) {
											// Options for the observer (which mutations to observe)
											var config = { childList: true, subtree: true, characterData: true };

											// Callback function to execute when mutations are observed
											var callback = function(mutationsList, observer) {
												for(var mutation of mutationsList) {
													if (mutation.type === 'childList' || mutation.type === 'characterData') {

														
														
														var parentDiv = document.querySelector('div[data-name="'+Type+'"]');
														if (parentDiv) {
															var childDivs = parentDiv.querySelectorAll('div');
															var Counts= childDivs.length;
														} else {
															var Counts= 0; // If the parent div is not found
														}
														console.log("Counts="+Counts);
														
														if(Counts==0){
															jQuery('#facet-label-' + Type).hide();
														} else {
															jQuery('#facet-label-' + Type).show();
														}



													}
												}
											};

											// Create an observer instance linked to the callback function
											var observer = new MutationObserver(callback);

											// Start observing the target node for configured mutations
											observer.observe(targetNode, config);

											// To stop observing
											// observer.disconnect();
										} 							
								
								}
								
								
								hide_or_show_h3('search_filter_categories', 'categories');
								
								
								let PostTypeCounter=[];
								// Javascript listener for when div with the class of "facetwp-facet-post_types" content changes , find all inner divs with the class "facetwp-checkbox" and get the "data-value" value of this div and the   content of the div within with the class of "facetwp-counter". Find the div with class "search-results-tab-item" and matching "data-value" and replace the content of the span within (with the class of "counter") with that found previously in  "facetwp-counter".
								
								// Function to handle updates
								function updateSearchResults() {
									document.querySelectorAll('.facetwp-facet-post_types .facetwp-checkbox').forEach(function(checkbox) {
										

										
										var dataValue = checkbox.getAttribute('data-value');
										
										console.log("*** var  dataValue = " + dataValue);
										
										PostTypeCounter.push( dataValue );
			
										
										console.log("PostTypeCounter=" + PostTypeCounter);
										
										var counterContent = checkbox.querySelector('.facetwp-counter').textContent;
										
										console.log("var  counterContent = " + counterContent);
										
										// Find the corresponding search-results-tab-item and update the counter span
										var searchResultItem = document.querySelector('.search-results-tab-item[data-value="' + dataValue + '"]');										
										
										if(counterContent !="(0)"){
										

											if (searchResultItem) {
												var counterSpan = searchResultItem.querySelector('.counter');
												if (counterSpan) {
													counterSpan.textContent = counterContent;
													
													// set cookie 
													document.cookie = "tab_"+dataValue+"="+counterContent;
													
													console.log("set cookie tab_"+dataValue+"="+counterContent);
													
												}
											}
										} else {
											var cookieX = getCookie("tab_"+dataValue);
											console.log("tab_" + dataValue + " cookieX="+cookieX);
											if(cookieX!=""){
												
												var counterSpan = searchResultItem.querySelector('.counter');
												if (counterSpan) {
													counterSpan.textContent = cookieX;
												}
												
											}
											
										}
										
									});
									
									jQuery("#search-results-tab-wrap").show();
									
								}

								// Select the target node
								var targetNode = document.querySelector('.facetwp-facet-post_types');

								if (targetNode) {
									// Options for the observer (which mutations to observe)
									var config = { childList: true, subtree: true, characterData: true };

									// Callback function to execute when mutations are observed
									var callback = function(mutationsList) {
										for (var mutation of mutationsList) {
											if (mutation.type === 'childList' || mutation.type === 'characterData') {
												updateSearchResults();
											}
										}
										
										let PostTypesArray = ['products', 'post', 'projects', 'press' ,'brochures'];
										
										console.log("PostTypesArray="+PostTypesArray);
										
										console.log("PostTypeCounter="+PostTypeCounter);
										
										let updateURL = 0;
										//alert("!");
										
										if (!PostTypeCounter.includes('products')) {
											for (let i = 0; i < PostTypesArray.length; i++) {
												if (PostTypeCounter.includes(PostTypesArray[i]) && updateURL==0) {
													//if(PostTypesArray[i]!='products'){
														// if first results not products change url , refresh page 
														// Get the current URL
														let currentUrl = window.location.href;
														//
														console.log("PostTypesArray[i]=" + PostTypesArray[i]);

														// Check if '_post_types=' is not already in the URL
														if (!currentUrl.includes('_post_types=')) {
														  // Check if the query string already exists
														  if (currentUrl.indexOf('?') === -1) {
															// If no query string, add one with the parameter
															currentUrl += '?_post_types=' + PostTypesArray[i];
														  } else {
															// If a query string exists, append the new parameter
															currentUrl += '&_post_types=' + PostTypesArray[i];
														  }
															updateURL = 1;
														  // Reload the page with the new URL
														  window.location.href = currentUrl;
														}
													//}
												}
											}
										}
										
										
										
									};
									
									
									
									
									

									// Create an observer instance linked to the callback function
									var observer = new MutationObserver(callback);

									// Start observing the target node for configured mutations
									observer.observe(targetNode, config);

									// To stop observing
									// observer.disconnect();
								} else {
									console.log('Element with class "facetwp-facet-post_types" not found.');
								}



								function getCookie(cname) {
								  let name = cname + "=";
								  let decodedCookie = decodeURIComponent(document.cookie);
								  let ca = decodedCookie.split(';');
								  for(let i = 0; i <ca.length; i++) {
									let c = ca[i];
									while (c.charAt(0) == ' ') {
									  c = c.substring(1);
									}
									if (c.indexOf(name) == 0) {
									  return c.substring(name.length, c.length);
									}
								  }
								  return "";
								}


								</script>
								<?php
								if(!empty( $_GET['_post_types'] )){
									
									$Selected = $_GET['_post_types'];
									
								} else {
									
									$Selected = "products";
									
								}
								
								if($Selected=="products"){
									
									?>
									<div class="push20"  id="search_filter_product_types">
										 <h5 class="medium facet-label" id="facet-label-product_types" style="display:none">Products</h5>
										<?php echo do_shortcode('[facetwp facet="product_types"]'); ?>
									</div>
									
									<div class="push20"  id="search_filter_product_shapes">
										 <h5 class="medium facet-label" id="facet-label-product_shapes" style="display:none">Shapes</h5>
										<?php echo do_shortcode('[facetwp facet="product_shapes"]'); ?>
									</div>
									
									
									<div class="push20">
										<div  id="search_filter_product_sizes_length">	
											<h5 class="medium facet-label" data-for="product_sizes_length"  id="facet-label-product_sizes_length"  style="display:block">Length</h5>
											<?php echo do_shortcode('[facetwp facet="product_sizes_length"]'); ?>
										</div>
										
										<div  id="search_filter_product_sizes_width">	
											<h5 class="medium facet-label" data-for="product_sizes_width"  id="facet-label-product_sizes_width"  style="display:block">Width</h5>
											<?php echo do_shortcode('[facetwp facet="product_sizes_width"]'); ?>
										</div>
										
										<div  id="search_filter_product_sizes_height">	
											<h5 class="medium facet-label" data-for="product_sizes_height"  id="facet-label-product_sizes_height"  style="display:block">Height</h5>
											<?php echo do_shortcode('[facetwp facet="product_sizes_height"]'); ?>
										</div>
										
									</div>
									
								<script>
									hide_or_show_h3('search_filter_product_types', 'product_types');
									
									hide_or_show_h3('search_filter_product_shapes', 'product_shapes');
									
									/*
									
									hide_or_show_h3('search_filter_product_sizes_width', 'product_sizes_width');
									
									hide_or_show_h3('search_filter_product_sizes_height', 'product_sizes_height');
									
									hide_or_show_h3('search_filter_product_sizes_length', 'product_sizes_length');
									
									*/
								jQuery(document).ready( function($){	
									
									var target_node = document.getElementById("search_filter_product_sizes_height");

									if (target_node) {
										// Options for the observer (which mutations to observe)
										var config = { childList: true, subtree: true, characterData: true };

										// Callback function to execute when mutations are observed
										var callback = function(mutationsList, observer2) {
											for(var mutation of mutationsList) {
												if (mutation.type === 'childList' || mutation.type === 'characterData') {
													
													var X = jQuery("#search_filter_product_sizes_length .facetwp-slider-label").html();
													
													if(X==0){
														jQuery("#search_filter_product_sizes_length").hide();
													} else {
														jQuery("#search_filter_product_sizes_length").show();
													}
													
													var Y = jQuery("#search_filter_product_sizes_width .facetwp-slider-label").html();
													
													if(Y==0){
														jQuery("#search_filter_product_sizes_width").hide();
													} else {
														jQuery("#search_filter_product_sizes_width").show();
													}
													
													var Z = jQuery("#search_filter_product_sizes_height .facetwp-slider-label").html();
													
													if(Z==0){
														jQuery("#search_filter_product_sizes_height").hide();
													} else {
														jQuery("#search_filter_product_sizes_height").show();
													}
													
												}
												
												console.log('mutationsList');
											}
											console.log('callback');
										}
										
										console.log('target_node');
										
									}	
									
									var observer2 = new MutationObserver(callback);

									// Start observing the target node for configured mutations
									observer2.observe(target_node, config);
									
									
									
								});	
									
									
									
								</script>
									
									<?php
								}
								
								?>
								<div class="close-filter" id="close-filter">
									<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M14.364 1.36395L1.63604 14.0919M1.63604 1.36395L14.364 14.0919" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
									</svg>
								</div>
							</div>
							

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


<!-- section -->
<!-- GRID product  -->
<section class="grid-results ">
     
		<?php
		$Totals = [];
		$_press="";
		$_projects="";		
		$_products='';
		$_posts ='';
		$_brochures="";
		
		
		

			$max_posts = 0;
				
		
		if(!empty( $_GET['_product_types']) || !empty( $_GET['_product_shapes']) || !empty($_GET['_product_sizes_length']) || !empty($_GET['_product_sizes_width']) || !empty($_GET['_product_sizes_height'])  || !empty($_GET['_categories']))
		{
			
			$product_search = 1;
			
			global $wp_query;
			
			$max_posts = $wp_query->found_posts;
			
			
			
			
		} else {
			
			$product_search = 0;
			
		}
		
		

			if ( have_posts() ) :
				// Start the Loop
				while ( have_posts() ) : the_post();
					// Your loop content
				endwhile;
				// Total number of matching posts
				$total_matching_posts = $wp_query->found_posts;
				echo '<!-- ::total_matching_posts: ' . $total_matching_posts." -->";
			else :
				//	echo 'No posts found.';
			endif;




		

		if (have_posts()){
			
			
				$count_posts = wp_count_posts();

				if ( $count_posts ) {
					$_count_posts = $count_posts->publish;
					print "<!-- _count_posts = $_count_posts -->";
				}
			
			
			
			
				if($product_search == 1){
					//print "<h3>Products</h3>";
					
					//
					search_results_tabs();
	
					
					print ' <div class="row"><div class="grid-col column ">';
				}
				
				$pagePostCount =0;
		
			while (have_posts()) :
			
				the_post();
				
				if($product_search == 1){
					
					
					
					$HTML = show_the_post($post);
					
					echo $HTML;
					
					$pagePostCount++;
					
				}
				
			endwhile;
			
			if($product_search == 1){	
				print "</div></div>";
			}
		
		}
		
		
		


		
		

		


		

		
	
		if($product_search == 0){	
		
			search_results_tabs();
		
		}
		
		if(empty($_GET['_post_types'])){
			if(!empty($Totals['products'])){
				$_GET['_post_types'] = 'products';
			} else if(!empty($Totals['post'])) {
				$_GET['_post_types'] = 'posts';
			} else if(!empty($Totals['projects'])) {
				$_GET['_post_types'] = 'projects';
			} else if(!empty($Totals['press'])) {
				$_GET['_post_types'] = 'press';
			} else if(!empty($Totals['brochures'])) {
				$_GET['_post_types'] = 'brochures';
			}
			
		}		

		/*
		
		
		print_r($Totals);
		print "<hr>";
		
		print_r($_GET);


		*/
		

		$Selected =$_GET['_post_types'];
		
		
		if(empty($Selected)){
			
			if(!empty($_products)){$Selected ='products';}
			elseif(!empty($_posts)){$Selected ='post';}
			elseif(!empty($_projects)){$Selected ='projects';}
			elseif(!empty($_press)){$Selected ='press';}
			elseif(!empty($_brochures)){$Selected ='brochures';}
			else {$Selected ="none";}
		}
		
		//	print "<p>product_search=$product_search</p>";
		
		if($product_search == 0){
			
			if(!empty($_products) && $Selected=='products'){
				
				echo $_products;
				
			}
			
			if(!empty($_posts) && $Selected=='post'){
				
				echo $_posts;
				
			}
			
			if(!empty($_projects)&& $Selected=='projects'){
				
				echo $_projects;
				
			}
			
			if(!empty($_press)&& $Selected=='press'){
				
				echo $_press;
				
			}
			
			if(!empty($_brochures)&& $Selected=='brochures'){
				
				echo $_brochures;
				
			}
			
			if($Selected=="none"){
				
				print "<p>Sorry. No pages match your search criteria.</p>";
				// hide the navigation 
				?>
				<script>
				jQuery(document).ready( function($){	
					jQuery(".column .pagination").hide();
				});
				</script>
				<?php
			}
		}
	
	//
	$posts_per_page = 12;
	
	print "<!-- ::pagePostCount=$pagePostCount   -->";
	



	if(empty($_GET['_post_types'])){
		
		//$_GET['_post_types'] = 'products';

		
		global $wp_query;
		
		
		query_posts($query_string . '&post_type=products&post_types=products');
		
		$total_matching_products = $wp_query->found_posts;
		
		print "<!-- total_matching_products =  $total_matching_products --> ";	
		
		
		if(!empty($total_matching_products)){
			
			$total_matching_posts = $total_matching_products;
		}
		
	}
	
	print "<!-- ::total_matching_posts=$total_matching_posts  -->";
	print "<!-- ::Totals[$Selected]=".$Totals[$Selected]."  -->";
	
	print "<!-- ";
	print_r($_GET);
	print " -->";
	
	global $GetPostType;
	
	print "<!-- ::GetPostType=".$GetPostType."  -->";
	
	if(empty( $_GET['_product_types']) && empty( $GetPostType )  && empty( $_GET['_product_shapes'])  && empty($_GET['_product_sizes_length']) && empty($_GET['_product_sizes_width']) && empty($_GET['_product_sizes_height'])  && empty($_GET['_categories']))
	{

		$filtered= 0;

	} else {
		
		$filtered= 1;
	}
	
	print "<!-- ::filtered=".$filtered."  -->";
	
	
		
	if(!empty($total_matching_posts) && $filtered==1 ){
		
		$postCount =$total_matching_posts;
		
		print "<!-- ****::total_matching_posts=$total_matching_posts  -->";
		
		
		
		
	} else {
		
		$postCount = $Totals[$Selected];
		
		print "<!-- ****::Totals[$Selected]=".$Totals[$Selected]."  -->";
	}
	
	print "<!-- ::total_matching_posts=$total_matching_posts  -->";
	print "<!-- ::Totals[$Selected]=".$Totals[$Selected]."  -->";
	
	
	$page_count = ceil($postCount / $posts_per_page);
	
	//$max_posts
	
	print "<!-- ::postCount=$postCount  -->";
	print "<!-- ::posts_per_page=$posts_per_page  -->";
	print "<!-- ::page_count=$page_count  -->";
	

		
		if(!isset($_GET['page'])){
			$current = 1;
			
		} else {
			$current =$_GET['page'];
		}
		
		$C = 0;
	
	print "<!-- ::current=$current  -->";
	

	print "<!-- TOTALS::: ";
	
	
	print_r($Totals);
	
	print " -->";
	
	?>
    <div class="row ">
        <div class="column align-center">

					<?php
					
					function make_pagination_link($i){
						
						$link ='';
						
						// Get the protocol (http or https)
						$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
						
						// Get the host
						$host = $_SERVER['HTTP_HOST'];
						
						// Get the request URI
						$request_uri = $_SERVER['REQUEST_URI'];

						// Regular expression to match "/page/x" where x is any number
						$pattern = '/\/page\/\d+/';

						// Remove the matched pattern from the string
						$request_uri = preg_replace($pattern, '', $request_uri);

						
						$page_1 ="";

						// Construct the full URL
						$current_url = $protocol . $host . $page_1. $request_uri;			


						$current_url = remove_query_args($current_url, '_paged');
						
						
						$link = $current_url."&_paged=".$i;
						
						
						$link = str_replace("///?", "/?" , $link);
						
						$link = str_replace("//?", "/?" , $link);
						
						
						
						return $link;
						
					}
					
					
					
					if($product_search == 0 && $page_count > 1){
					
							
								
								if(empty($_GET['_paged'])){
									
									$current = 1;
									
									$previous = 0;
									
								} else {
									
									$current = $_GET['_paged'];
									
									$previous = $current - 1;
								}
								
								



							
							
							?>
							<div class="pagination pagination_1">
								<?php
								
								if($previous > 0){
									
									$previous_link = make_pagination_link($previous);
									
									?>
									<a href="<?php echo $previous_link ?>" class="page previous"  data="prev" id="prev">
									
									<span class="left_arrow">&#x2B60;</span></a> 
									
									<?php 
								
								}								
								
								print "<!-- ::current=$current  -->";

								for ($i = 1; $i <= $page_count; $i++){
									
									if($i==$current){
										$class="page current";
									} else {
										$class="page";
									}
									
									$n = $i;
									
									$C = ( $posts_per_page * ( $i - 1 ) );
									
									$n = str_pad($n, 2, '0',STR_PAD_LEFT);	// add leading zero to numbers under 10 
									
									$link = make_pagination_link($i);

									?>
									<a href="<?php echo $link; ?>" class="<?php echo $class; ?>" data="<?php echo $C; ?>" id="<?php echo $i; ?>"><?php echo $n; ?></a>
									<?php
									
									// only show pipe if not last link
									if( $i < $page_count ){
										print "&nbsp;|&nbsp;";
									}
									
								}	// end for loop 
								
								
								$next = $current + 1;
								
								$next_link = make_pagination_link($next);
								
								if($next <= $page_count){
									?>
									<a href="<?php echo $next_link; ?>" class="page more load-more-link"  data="next" id="next"><span class="right_arrow">&#x2B62;</span></a> 
									<?php
								}
								?>
								
							</div>
							
							<?php
					
					}
					
					
					
					
						if($product_search == 1){

							if ($page_count > 1){
								
								print '<div class="pagination wp_pagination pagination_product_search">';
								
								
								print "<!-- ::_GET['_paged']=".$_GET['_paged']."  -->";

								if(!empty($_GET['_paged'])){
									$current_page = $_GET['_paged'];
								} else {
									$current_page = max(1, get_query_var('paged'));
								}
								
								
								print "<!-- ::current_page=$current_page  -->";
								
								$nLink = get_pagenum_link(1);
								
								print "<!-- ::nLink=$nLink  -->";

								add_filter( 'number_format_i18n', 'give_numbers_leading_zero' );
								
								$paginate_links = paginate_links(
									array(
										'base' => html_entity_decode($nLink . '%_%'),
										'format' => '&_paged=%#%',
										'current' => $current_page,
										'show_all'=> true,
										'total' => $page_count,
										'prev_text'    => __('&#x2B60;'),
										'next_text'    => __('&#x2B62;'),
										'type'=>'array'
									)
								);
								
								
								print "<!-- :::paginate_links    ";

								print_r($paginate_links);
						
						
								print "  -->";

								$x=0;

								$Count = count($paginate_links);	
								
								print "<!-- ::Count=$Count  -->";

								foreach($paginate_links as $Link){
									
							

									$Link = str_replace("<span", "<a", $Link);
									
									$Link = str_replace("</span>", "</a>", $Link);
																		
									$Link = str_replace('class="page-numbers"', 'class="page"', $Link);
									
									$Link = str_replace('class="prev page-numbers"', 'class="page"', $Link);
									
									$Link = str_replace('class="next page-numbers"', 'class="page"', $Link);
									
									print "<!-- ::Link=$Link  -->";
									
									echo $Link;
									
									$x++;
									
									if($x!=$Count){
										
										echo "&nbsp;|&nbsp;";
										
									}

								}

								
								remove_filter( 'number_format_i18n', 'give_numbers_leading_zero' );
								

								print '</div>';
								
							}    
											
						}
					
					
					?>
                    
			
            
        </div>
    </div>


</section> 

<!-- /section -->



    </main>
<!-- /end main -->


<script>

document.getElementById('filter-toggle').addEventListener('click', function() {
    document.querySelector('#refine-search').classList.add('show-filter');
});

document.getElementById('close-filter').addEventListener('click', function() {
    document.querySelector('#refine-search').classList.remove('show-filter');
});


</script>



<?php
	
	
	
	
	
	
	
?>

<!-- swp_query -->

<?php








	
	
	
	
	
	
	
	
	
	
	get_footer();
	
	
	
