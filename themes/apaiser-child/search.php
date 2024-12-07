<?php
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
		
		$_press = search_results_section('press', 'Press Releases', 12);

		$_brochures = search_results_section('brochures', 'Brochures', 12);
		
		print '<div class="row search-results-tab-wrap">';
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
					print "<a class='search-results-tab-item $Class' href='$Link'>$Text ($Total)</a>";
				}
			
		}
		
		print '</div>';
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
		
		
		
		

		
			function search_custom_pages($search_term, $post_type, $count = 12) {
				
				$posts_per_page = $count;
				


				if(empty($_GET['_paged'])){
					
					$n = 0;
					
				} else {
					
					$n = (($_GET['_paged'] - 1) * $posts_per_page);
					
				}
				
				
				// Set up the query arguments
				$args = [
					'post_type' => $post_type,
					'posts_per_page' => $posts_per_page,
					'offset' => $n,
					's' => $search_term, // The search term
					'post_status' => 'publish', // Only published posts
					'fields' => 'all', // Retrieve all fields
				];

				// Perform the query
				$query = new WP_Query($args);
				
				$Posts = array();

				// Check if there are posts
				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();
						// Output the title (or customize as needed)
						//echo '<div>' . get_the_title() . '</div>';
						$Posts[] = get_post();
					}
				} else {
					//	echo 'No pages found matching the search term "' . esc_html($search_term) . '".';
				}

				// Reset post data
				wp_reset_postdata();
				
				// Define the query arguments
				$args['posts_per_page'] = -1;

				// Perform the query
				$query2 = new WP_Query($args);

				// Return the number of posts found
			   $post_count= $query2->found_posts;
				
				global $max_posts;
				
				if($post_count > $max_posts){
					
					$max_posts = $post_count;
					
				}
				
				global $Totals;
				
				$Totals[$post_type] = $post_count;
				
				return $Posts;
				
			}



	
	function show_the_post($my_post){
			
			$imgID = get_post_thumbnail_id( $my_post->ID );

			$post_id = $my_post->ID;


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
			
			$Pages = search_custom_pages($search_term, $post_type, $count);
			if(!empty($Pages)){
				
				//$HTML.="<h3>$title</h3>";
				//if($post_type == 'products')
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





		











	$template_name = "search-results";

	get_header();

	include_once "nav.php";
	
	
	$stylesheet_directory = basename(get_stylesheet_directory());
	
	$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
	
	
	

	global $wp_query;
	
	$total_results = $wp_query->found_posts;
	
	






	

	
	
	
			
			
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

                        <h4 class="" >Refine Search</h4>                      
                        
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

								

								
								<div class="push20">    
									 <h5 class="medium facet-label">Categories</h5>
									<?php echo do_shortcode('[facetwp facet="categories"]'); ?>
									
								</div>
								<?php
								if(!empty( $_GET['_post_types'] )){
									
									$Selected = $_GET['_post_types'];
									
								} else {
									
									$Selected = "products";
									
								}
								
								if($Selected=="products"){
									
									?>
									<div class="push20">
										 <h5 class="medium facet-label">Products</h5>
										<?php echo do_shortcode('[facetwp facet="product_types"]'); ?>
									</div>
									
									<div class="push20">
											
										<h5 class="medium facet-label" data-for="product_sizes_length">Length</h5>
										<?php echo do_shortcode('[facetwp facet="product_sizes_length"]'); ?>
										<h5 class="medium facet-label" data-for="product_sizes_length">Width</h5>
										<?php echo do_shortcode('[facetwp facet="product_sizes_width"]'); ?>
										<h5 class="medium facet-label" data-for="product_sizes_length">Height</h5>
										<?php echo do_shortcode('[facetwp facet="product_sizes_height"]'); ?>
										
									</div>
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
		
		
		
		//	_product_sizes_length=949.00%2C1845.00&
		//	_product_sizes_width=774.00%2C894.00&
		//	_product_sizes_height=586.00%2C744.00
		// _product_types
		
			$max_posts = 0;
				
		
		if(!empty( $_GET['_product_types']) || !empty($_GET['_product_sizes_length']) || !empty($_GET['_product_sizes_width']) || !empty($_GET['_product_sizes_height'])  || !empty($_GET['_categories']))
		{
			
			$product_search = 1;
			
			global $wp_query;
			
			$max_posts = $wp_query->found_posts;
			
			
			
			
		} else {
			
			$product_search = 0;
			
		}

		if (have_posts()){
				if($product_search == 1){
					//print "<h3>Products</h3>";
					
					//
					search_results_tabs();
					
					print ' <div class="row"><div class="grid-col column ">';
				}
		
			while (have_posts()) :
			
				the_post();
				
				if($product_search == 1){
					
					$HTML = show_the_post($post);
					
					echo $HTML;
					
				}
				
			endwhile;
			
			if($product_search == 1){	
				print "</div></div>";
			}
		
		}
		
		
		


		
		

		


		

		
	
		if($product_search == 0){	
		
			search_results_tabs();
		
		}
		
		

		$Selected =$_GET['_post_types'];
		
		if(empty($Selected)){
			
			$Selected ='products';
			
		}
		
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
		}
	
	//
	$posts_per_page = 12;
	
	$postCount = $Totals[$Selected];
	
	$page_count = ceil($postCount / $posts_per_page);
	


		
		if(!isset($_GET['page'])){
			$current = 1;
			
		} else {
			$current =$_GET['page'];
		}
		
		$C = 0;
	



	
	
	?>
    <div class="row ">
        <div class="column align-center">
           <!--  <div class="pagination">
                <a href="" class="page previous">
				<span class="left_arrow">&#x2B60;</span></a> 
				<a href="" class="page current">01</a> | <a href="" class="page">02</a> | 
				<a href="" class="page">03</a> | <a href="" class="page">04</a> | <a href="" class="page more">
				<span class="right_arrow">&#x2B62;</span></a> 
            </div> -->
			
					<?php
					if($product_search == 0){
					
							?>
							<div class="pagination">
							
								<a href="" class="page previous"  data="prev" id="prev">
								
								<span class="left_arrow">&#x2B60;</span></a> 
								
								<?php 
								
								
								if(empty($_GET['_paged'])){
									
									$current = 1;
									
								} else {
									
									$current = $_GET['_paged'];
								}

								for ($i = 1; $i <= $page_count; $i++){
									
									if($i==$current){
										$class="page current";
									} else {
										$class="page";
									}
									
									$n = $i;
									
									$C = ( $posts_per_page * ( $i - 1 ) );
									
									$n = str_pad($n, 2, '0',STR_PAD_LEFT);	// add leading zero to numbers under 10 
									

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
									
								?>
									<a href="<?php echo $link; ?>" class="<?php echo $class; ?>" data="<?php echo $C; ?>" id="<?php echo $i; ?>"><?php echo $n; ?></a>&nbsp;|&nbsp;
								<?php
								}
								?>
								
								<a class="page more load-more-link"  data="next" id="next"><span class="right_arrow">&#x2B62;</span></a> 
								
							</div>
							
							<?php
					
					}
					
					
					
					
						if($product_search == 1){

							if ($page_count > 1){
								
								print '<div class="pagination wp_pagination">';

								$current_page = max(1, get_query_var('paged'));
								

								add_filter( 'number_format_i18n', 'give_numbers_leading_zero' );
								
								$paginate_links = paginate_links(
									array(
										'base' => html_entity_decode(get_pagenum_link(1) . '%_%'),
										'format' => '&_paged=%#%',
										'current' => $current_page,
										'show_all'=> true,
										'total' => $page_count,
										'prev_text'    => __('&#x2B60;'),
										'next_text'    => __('&#x2B62;'),
										'type'=>'array'
									)
								);
								


								/*

								<div class="pagination wp_pagination">
								<span aria-current="page" class="page-numbers current">01</span>
								<a class="page-numbers" href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_categories=all&amp;_paged=2">02</a>
								<a class="page-numbers" href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_categories=all&amp;_paged=3">03</a>
								<a class="page-numbers" href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_categories=all&amp;_paged=4">04</a>
								<a class="page-numbers" href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_categories=all&amp;_paged=5">05</a>
								<a class="page-numbers" href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_categories=all&amp;_paged=6">06</a>
								<a class="page-numbers" href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_categories=all&amp;_paged=7">07</a>
								<a class="next page-numbers" href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_categories=all&amp;_paged=2">⭢</a></div>


								<div class="pagination">
								<a href="" class="page previous" data="prev" id="prev"><span class="left_arrow">⭠</span></a> 
								<a href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_=&amp;_paged=1" class="page current" data="0" id="1">01</a>&nbsp;|&nbsp;
								<a href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_=&amp;_paged=2" class="page" data="9" id="2">02</a>&nbsp;|&nbsp;
								<a href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_=&amp;_paged=3" class="page" data="18" id="3">03</a>&nbsp;|&nbsp;
								<a href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_=&amp;_paged=4" class="page" data="27" id="4">04</a>&nbsp;|&nbsp;
								<a href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_=&amp;_paged=5" class="page" data="36" id="5">05</a>&nbsp;|&nbsp;
								<a href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_=&amp;_paged=6" class="page" data="45" id="6">06</a>&nbsp;|&nbsp;
								<a href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_=&amp;_paged=7" class="page" data="54" id="7">07</a>&nbsp;|&nbsp;
								<a href="https://staging.apaiser.screenrage.com.au/?s=Bath&amp;_=&amp;_paged=8" class="page" data="63" id="8">08</a>&nbsp;|&nbsp;
																								
								<a class="page more load-more-link" data="next" id="next"><span class="right_arrow">⭢</span></a> 
								</div>



								*/

								$x=0;

								$Count = count($paginate_links);	

								foreach($paginate_links as $Link){
									
									
									// <span aria-current="page" class="page-numbers current">01</span>

									$Link = str_replace("<span", "<a", $Link);
									
									$Link = str_replace("</span>", "</a>", $Link);
																		
									$Link = str_replace('class="page-numbers"', 'class="page"', $Link);
									
									$Link = str_replace('class="prev page-numbers"', 'class="page"', $Link);
									
									$Link = str_replace('class="next page-numbers"', 'class="page"', $Link);
									
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
	
	get_footer();
	
	
	
