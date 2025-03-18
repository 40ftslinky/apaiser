<?php
/**
 * The template for displaying the post.
 *
 * Template name: Projects Archive (Single Residential & Commercial)
 *
 * @package storefront
 */



function project_pop_up($project_id, $XX, $title, $RegionStr, $_images, $related, $post_content)
{
	
		?>
		<div id="project-<?php echo $XX; ?>" class="project-pop-up">
			<div class="project-pop-up_wrapper">
				<div class="close">
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14.364 1.36395L1.63604 14.0919M1.63604 1.36395L14.364 14.0919" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</div>                            
							
				<div class="project-content">
				
					<div class="project-header">
					
						<h2 class="project-title" id="popup_project_title_<?php echo $XX; ?>"><?php echo $title; ?></h2>
						<h2 class="subtitle" id="popup_project_regions_<?php echo $XX; ?>"><?php echo $RegionStr; ?></h2>

					</div>

					<div class="project-carousel flickity-js carousel" id="popup_project_carousel_<?php echo $XX; ?>">
						<?php
							//foreach($proj_images[$project_id] as $p){
								
							foreach($_images as $p){
								
								$thumb = "";
								
								
								if(isset($p['sizes']['medium-large'])){
									
									$thumb = $p['sizes']['medium-large'];
									
								}
								
								if(empty($thumb)){
									
									if(isset($p['sizes']['large'])){
										
										$thumb = $p['sizes']['large'];
										
									}
									
								}
								if(!empty($thumb)){
									
									?>
									
									<div class="carousel-cell project-image">

										<img src="<?php echo $thumb; ?>"   alt="<?php echo $title; ?>">

									</div>
									
									<?php
									
								}
								
								$X++;
							}
					
						?>
					</div>
					<div class="project-bottom">
						<div class="project-details">
							<h4 class="project-feature" >Featured Products</h4>
							<div class="project_featured_products" id="project_featured_products_<?php echo $XX; ?>">
							<?php
							
								foreach ($related as $relat) {
									
									$relName = htmlentities($relat->post_title);
									
									$relID=$relat->ID;
									
									$rel_url = get_permalink( $relID );
									
									$Y=0;
									
									$item = '<p><a href="'.$rel_url.'">'.$relName.'</a></p>';
									
									echo $item;
									
									$Y++;
									
								}
							?>
							</div>
						</div>
						<div class="project-description" id="project_description_<?php echo $XX; ?>"><?php echo $post_content; ?></div>
					</div>
				</div>
			</div>
		</div> 
	<?php

}
	
	$body_class="post-list";
	
	print "<!-- :::project_id_2 body_class=$body_class       -->";
	
	$template_class="blog";

	get_header();

	include_once "nav.php";
	
	global $wp_query;
	
	$post_id = $wp_query->post->ID;
	
	$post_title=get_the_title($post_id);
	

	// ACF

	$stylesheet_directory = basename(get_stylesheet_directory());
	
	$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
	
	$post_id = $wp_query->post->ID;
	
	$hero_image= get_field("hero_image", $post_id);
	
	$hero_title= get_field("hero_title", $post_id);

	$hero_subtitle= get_field("hero_subtitle", $post_id);
	
	$term_id= get_field("category", $post_id);
	
	$termDetails = getTaxonomyTermDetails($term_id);
	
	if(is_array($termDetails)){
		
		if(isset($termDetails['name'])){
		
			$categoryName = $termDetails['name'];
		
		}
		
	}
	
	$term = get_term($term_id);
	
	$category = $term->slug;
	
	if(empty($hero_title)){
		
		$hero_title = $categoryName;
		
	}
	
	
	if(empty($category)){
		//$category = "all";
		

		// Count number of Posts in this Category 
		// Define the query arguments
		$args = [
			'post_type' => 'projects',
			'post_status' => 'publish',
			'posts_per_page' => -1
		];
		
		
	} else {
		

		// Count number of Posts in this Category 
		// Define the query arguments
		$args = [
			'post_type' => 'projects',
			'tax_query' => [
				[
					'taxonomy' => 'project_cat',
					'field' => 'slug',
					'terms' => $category
				]
			],
			'post_status' => 'publish',
			'posts_per_page' => -1
		];
		
	}




    // Perform the query
    $query = new WP_Query($args);

    // Return the number of posts found
   $post_count= $query->found_posts;

	
	$posts_per_page = 9;
	
	
	?>

	    <main>
		<?php
		
		if(!empty($hero_title)){
			?>
			<!-- hero section -->
			<section class="hero projects_hero no_grad" style="background-image: url(<?php echo $hero_image; ?>);">
				<div class="row">
					<div class="col">
						<div class="hero-content">
							
							<h1 class="subtitle"><?php echo $hero_subtitle; ?></h1>
							<h1 class=""><?php echo $hero_title; ?></h1>
						</div>
					</div>
				</div>
			</section>
			<!-- /section -->
		<?php
		}
		?>

<!-- section -->
		<?php
		
		$intro_title= get_field("intro_title", $post_id);
		
		$intro_paragraph= get_field("intro_paragraph", $post_id);
		
		$intro_button= get_field("intro_button", $post_id);
		
		$intro_title2= get_field("intro_title2", $post_id);
		
		$intro_paragraph2= get_field("intro_paragraph2", $post_id);	
		
		$intro_button2= get_field("intro_button2", $post_id);
		

		
		$image1= get_field("intro_image1", $post_id);
		
		$image2= get_field("intro_image2", $post_id);
		
		
		
		
		$intro_link_1= get_field("intro_link_1", $post_id);
		
		$intro_link_2= get_field("intro_link_2", $post_id);
		

		

		
		$project_id_1 = $intro_link_1->ID;
		
		$title_1 =  $intro_link_1->post_title;
		
		$RegionStr_1='';
		
		$Z=0;
		// Regions
		$regions = get_the_terms($project_id_1, 'project_region');
		$RegionStr_1 = "";
		foreach ($regions as $region) {
			if(!empty($RegionStr_1)){
				$RegionStr_1 = $RegionStr_1 . ", ";
			}
			$regionName = $region->name;
			$RegionStr_1 = $RegionStr_1 . $regionName;
			$Z++;
		}
		
		
		$_images_1 = array();
		


		if (have_rows('installation_photos', $project_id_1)) :
			while (have_rows('installation_photos', $project_id_1)) :
				the_row();
				$_images_1[] = get_sub_field('photo');
			endwhile;
			
		endif;
		
		
		
		$related_1 = get_field('related_product', $project_id_1);
		
		$post_content_1 =  $intro_link_1->post_content;
		

		
		$title_2 =  $intro_link_2->post_title;
		
		$project_id_2 = $intro_link_2->ID;
		
		
		
		

		$Z=0;
		// Regions
		$regions = get_the_terms($project_id_2, 'project_region');
		$RegionStr_2 = "";
		foreach ($regions as $region) {
			if(!empty($RegionStr_2)){
				$RegionStr_2 = $RegionStr_2 . ", ";
			}
			$regionName = $region->name;
			$RegionStr_2 = $RegionStr_2 . $regionName;
			$Z++;
		}


		$_images_2 = array();
		
		print "<!-- :::project_id_2 =$project_id_2       -->";
		
		if (have_rows('installation_photos', $project_id_2)) :
			print "<!-- :::have_rows =$project_id_2       -->";
			while (have_rows('installation_photos', $project_id_2)) :
				the_row();
				$_images_2[] = get_sub_field('photo');
				print "<!-- ::: _images_2::: ";
				print_r($_images_2);
				print "	-->";
			endwhile;
		endif;
		
		$related_2 = get_field('related_product', $project_id_2);
		
		$post_content_2 =  $intro_link_2->post_content;

		if(!empty($intro_title) || !empty($intro_paragraph)){
			?>
			<section class="overflow_section grey_900_bg">
				<div class="row column-reverse-mob">
					<div class="col column">
						<div class="text_wrap">
							<blockquote>
								<?php echo $intro_title ?>
							</blockquote>
							<?php echo $intro_paragraph; ?>
						</div>
						<!-- discover_button 1 -->
						<a class="button-secondary pop-up-link-2 "> <?php echo $intro_button; ?></a>


					</div>
					<?php
					if(!empty($image1)){
					?>
					<div class="col column">
						<div class="img_wrap bottom_overflow">
							<img src="<?php echo $image1; ?>" loading="lazy" alt="image">
						</div>
					</div>
					<?php
					}
					?>				
				</div>

				
			</section>
			<?php
		}
		
		if(!empty($intro_title2) || !empty($intro_paragraph2)){
			?>
			<section class="overflow_section white_bg">
				<div class="row ">
					<?php
					if(!empty($image2)){
					?>
					
					<div class="col column four-tenths">
					
						<div class="img_wrap top_overflow">
						
							<img src="<?php echo $image2; ?>" loading="lazy" alt="image">
							
						</div>
						
					</div>
					
					<?php
					}
					?>				
					
					<div class="col column">
					
						<div class="text_wrap">
						
							<blockquote>
							
							   <?php echo $intro_title2 ?>
							   
							</blockquote>
							
							 <?php echo $intro_paragraph2 ?>
							 
						</div>

						<a class="button-secondary pop-up-link-2"><?php echo $intro_button2 ?></a>
		
					</div>
					
				</div>

			</section>
			<!-- /section -->
			<?php
			
		}
		
		?>



<!-- section -->
<!-- RECENT PROJECTS -->
        <section id="recent_projects" class="grid-projects archive">

            <div class="row ">
			
                <div class="col align-center">
				
                    <h2 class="center-align">Recent Projects</h2>
					
                </div>
				
            </div>
     
			<?php

			
			if(empty($category)){
				
				//
				$category = "all";
				// returns list of videos by author_id
				$Args2 = array(
					'post_type' => 'projects',
					'posts_per_page' => $posts_per_page,
					'post_status'       => array("publish"),
					'orderby' => 'id', 
					'order' => 'desc',		
				);
				

				
				
				
			} else {
			
				// returns list of videos by author_id
				$Args2 = array(
					'post_type' => 'projects',
					'posts_per_page' => $posts_per_page,
					'post_status'       => array("publish"),
					'tax_query' => [ [ 'taxonomy' => 'project_cat', 'field' => 'slug', 'terms' => $category ] ],
					'orderby' => 'id', 
					'order' => 'desc',		
				);
				
			}
			
			$Projects = get_posts( $Args2 );

			?>
            <div class="row">
                
                <div class="grid-col column " id="projects_div">   
				
					<?php
					
					$XX = 0;
					
					$proj_images=[];
					
					
					foreach($Projects as $proj){
						
						$project_id = $proj->ID;
						
						$post_content = $proj->post_content;
						
						$post_name = $proj->post_name;
						
						$guid = $proj->guid;
						
						$title = $proj->post_title;
						
						$hero_subtitle = get_field('hero2_subtitle', $project_id);
						
						$alt = get_field('hero2_alt', $project_id);
						
						$description = get_field('description', $project_id);
						
						
						$yoast_description = get_post_meta($project_id, '_yoast_wpseo_metadesc', true);
						
						$perma_link =get_permalink($project_id);
						
						$image = get_field('hero2_background', $project_id);
						
						$images_thumbnail = get_field('thumbnail', $project_id)['url'];
						
						if(empty($image) && !empty($images_thumbnail)){
							
							$image = $images_thumbnail;
							
						}
						

						
						
					$proj_images[$project_id] = [];

					if (have_rows('installation_photos', $project_id)) :
					
						while (have_rows('installation_photos', $project_id)) :
						
							the_row();
							
							$proj_images[$project_id][] = get_sub_field('photo');
							
						endwhile;
						

					
					endif;
					

					
					
					// Is this needed?
					
					$horizontal_alignment = get_field('thumbnail_horizontal_alignment', $project_id);
					
					$vertical_alignment = get_field('thumbnail_vertical_alignment', $project_id);
					
					// Cats
					
					$cat = get_the_terms($project_id, 'project_cat');
					
					// Related Products
					
					$related = get_field('related_product', $project_id);
					
					
					$Z=0;
					// Regions
					$regions = get_the_terms($project_id, 'project_region');
					$RegionStr = "";
					foreach ($regions as $region) {
						if(!empty($RegionStr)){
							$RegionStr = $RegionStr . ", ";
						}
						$regionName = $region->name;
						
						$RegionStr = $RegionStr . $regionName;
						
						$Z++;
					}
										
						if(!empty($yoast_description)){
							
							$Des = $yoast_description;
							
						} else {
							
							$Des = $description;
							
						}
						
					?>
						<!-- 01....  -->
						<a class="card_link" id="card_link_<?php echo $XX; ?>">
							<div class="card center no_border"  id="card_<?php echo $XX; ?>">
								<div class="card-image">
									<img  id="card_image_<?php echo $XX; ?>" loading="lazy" src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
								</div>
								<div class="card-content align-center">
									<h3 class="subtitle"  id="card_subtitle_<?php echo $XX; ?>"><?php echo $RegionStr; ?></h3>                
									<h3 id="card_title_<?php echo $XX; ?>"><?php echo $title; ?></h3>
									<p class="center-align"  id="card_description_<?php echo $XX; ?>"><?php echo $Des; ?></p>
									<button class="button-outline pop-up-link"  onclick="refresh_flickity(<?php echo $XX ?>)" data="project-<?php echo $XX; ?>">Discover</button>
									<!-- hidden fields -->


									<!-- end hidden fields -->
								</div>
							</div>
						</a>


					<!-- Project Pop-up -->
					
					<?php
					
					
					$_images = $proj_images[$project_id];
					
					project_pop_up($project_id, $XX, $title, $RegionStr, $_images, $related, $post_content);
					

				
					$XX++;
					
					}
					
								

					
				
				?>
					
                </div>

            </div>
			
			
			<?php
			
			//	project_pop_up($project_id_1, 10, $title_1, $RegionStr_1, $_images_1, $related_1, $post_content_1);
			

			
			project_pop_up($project_id_2, 11, $title_2, $RegionStr_2, $_images_2, $related_2, $post_content_2);
			
			?>
			
			
			
	
            <div class="row">
                <div class="column  justify-center align-center">
				<?php
				
					// PAGINATION 
					
					//number of pages (round up after division)
					
					$page_count = ceil($post_count / $posts_per_page);
					
					print "<!--  post_count = $post_count          -->";
					
					print "<!--  posts_per_page = $posts_per_page          -->";
					
					print "<!--  page_count = $page_count          -->";
					
					
					if(!isset($_GET['page'])){
						$current = 1;
						
					} else {
						$current =$_GET['page'];
					}
					
					$C = 0;
				
				?>
                    <div class="pagination">
						<?php
						print "<!-- :::current=$current  -->";
						if($current>1){
							?>
							<a href="" class="page previous load-more-link"  data="prev" id="prev">
							<span class="left_arrow">&#x2B60;</span></a> 
							<?php
						}
						?>
						
						
						
						<?php 

						for ($i = 1; $i <= $page_count; $i++){
							
							if($i==$current){
								$class="page load-more-link current";
							} else {
								$class="page load-more-link";
							}
							
							$n = $i;
							
							$C = ( $posts_per_page * ( $i - 1 ) );
							
							$n = str_pad($n, 2, '0',STR_PAD_LEFT);	// add leading zero to numbers under 10 
							
						?>
							<a href="" class="<?php echo $class; ?>" data="<?php echo $C; ?>" id="<?php echo $i; ?>"><?php echo $n; ?></a>&nbsp;|&nbsp;
						<?php
						}
						?>
						
						<a class="page more load-more-link"  data="next" id="next"><span class="right_arrow">&#x2B62;</span></a> 
						
                    </div>
                    
                </div>
				
            </div>

        </section>
		<?php
		
		
		if(empty($category)){
			
				$category = 'all';
		}
		
		?>
		
		<script>
		
				var Curr = 1;
				
				//console.log("Curr:" + Curr);
				
				document.addEventListener('DOMContentLoaded', function() {
				
				document.querySelectorAll('.load-more-link').forEach(function(link) {
					
					link.addEventListener('click', function(event) {

			
						event.preventDefault();
						
						// Hide All Projects 
						// Select all elements with the class 'card_link'
						const elements = document.querySelectorAll('.card_link');

						// Loop through each element and set its display property to 'none'
						elements.forEach(function(element) {
							element.style.display = 'none';
						});


						
						
						var $n = 0;
						
						const dataValue = this.getAttribute('data');
						
						//Check if the result is a number and not NaN return 
						
						var $isNumber = !isNaN(parseFloat(dataValue));
						
						const idValue = this.getAttribute('id');
						
						if($isNumber){
							
						
							Curr = idValue;
							
						} else {
							
							
						}
						
						//console.log("idValue=" + idValue);
						
						//console.log("Curr=" + Curr);

						//console.log($isNumber);
						
						var MaxPage = <?php echo $page_count; ?>;
						
						if($isNumber){
							
							$n = dataValue;
							
							Curr = idValue;
							
						} else {
							
							// prev or next TODO 
							
							//console.log("dataValue=" + dataValue);
							
							if( dataValue == "next" ){
							
								Curr++;
								
								if( Curr > MaxPage ){
									
									Curr = MaxPage;
									
								}
							
								$n = Curr;
							
							} else {
								
								if(Curr <= 2 ){
								
									Curr = 1;
								
								} else {
									
									Curr = Curr - 1;
									
								}
								
								
								$n = Curr;
								
							}
								
							
							
						}
						
							// use Ajax to get posts 
							$.ajax({
								type: 'POST',
								url: '<?php echo admin_url('admin-ajax.php');?>',
								dataType: "json", // add data type
								data: { action : 'get_ajax_posts', n: $n, category: '<?php echo $category; ?>' },
								success: function( response ) {
									
									//console.log(response);
									
									$X=0;
									
									$.each( response, function( key, value ) {
																				
										ReplaceProjectData(key, value, $X);
										
										$X++;
										
									} );
								}
							});
							
							// remove class current from all with class load-more-link

							// Select all elements with the class 'load-more-link'
							const elements1 = document.querySelectorAll('.load-more-link');

							// Loop through each element and remove the 'current' class
							
							elements1.forEach(function(element) {
								
								element.classList.remove('current');
								
							});
							
							if($isNumber){

								// add current to this one 
								
								this.classList.add('current');
							
							} else {
								
								const Elem = document.getElementById($n);
								
								Elem.classList.add('current');
								
							}
						
						});
						
					});
					
				});
				
				
				function ReplaceProjectData(key, obj, $X){
					

					var title = obj['title'];

					// Select the element with the ID 'card_title_0'
					const cardTitle = document.getElementById('card_title_' + $X);
					console.log("X=" + $X);
					if(cardTitle){
						// Replace the text content with the desired text
						cardTitle.textContent = title;
					}
					
					//popup_project_title_
					const popup_project_title_ = document.getElementById('popup_project_title_' + $X);
					// Replace the text content with the desired text
					if(popup_project_title_){
						popup_project_title_.textContent = title;
					}
					
					//card_image_
					var image = obj['image'];
					var card_image = document.getElementById('card_image_' + $X);
					if(card_image){
						card_image.src = image;
					}
					
					
					
					//popup_project_regions_0
					const popup_project_regions = document.getElementById('popup_project_regions_' + $X);
					// Replace the text content with the desired text
					popup_project_regions.textContent = obj['subtitle'];
					

					//project_description_7
					const project_description  = document.getElementById('project_description_' + $X);  
					project_description.textContent = obj['description'];
					
					
					// Related
					
					var related = obj['related'];
					

					

					const project_related_products  = document.getElementById('project_featured_products_' + $X);  
					
					// remove inner html from related product div 
					
					project_related_products.innerHTML = '';
					

					
						for (const row of related) { 
							//for (const item of row) { 
							
								const strToAppend = '<p><a href="'+row[2]+'">'+row[1]+'</a></p>';
								project_related_products.innerHTML +=strToAppend;
							//}
						}

					//////////////////////////
					//
					// Slides
					//
					//////////////////////////
					
					var slides = obj['slides'];
					
					// remove current Slides	// popup_project_carousel_7
					
					const popup_project_carousel  = document.getElementById('popup_project_carousel_' + $X);  
					




					// Select all divs with the class 'carousel-cell' within the selected element
					const carouselCells = popup_project_carousel.querySelectorAll('.carousel-cell');

					// Loop through each element and remove it
					carouselCells.forEach(function(cell) {
						cell.remove();
					});



					//	popup_project_carousel.innerHTML = '';
					
					// remove classes	//	flickity-enabled is-draggable
					
					popup_project_carousel.classList.remove('flickity-enabled');
					
					popup_project_carousel.classList.remove('is-draggable');
					
					var flkty = Flickity.data(popup_project_carousel);
					
					if (flkty) {
						flkty.destroy();
					}
					

					// Loop through Slides for this Project 
					
					for (const row of slides) { 
						
						var IMG_URL = row['url'];
						
						var LINK = row['link'];
						
						var SIZES = row['sizes'];
						
						// Append HTML for each carousel slide 
						
						var HTML_to_append  = "";
						
						HTML_to_append = HTML_to_append + '<div class="carousel-cell project-image">';
						
						// loading="lazy"
						
						var popup_project_title_z = "image";
						
						HTML_to_append = HTML_to_append + '<img  src="'+IMG_URL+'" alt="'+popup_project_title_z+'">';
						
						HTML_to_append = HTML_to_append + '</div>';
						
						popup_project_carousel.innerHTML +=HTML_to_append;

					
					}
					
					
					refresh_flickity($X);
					
					
					
					// Show the Card 

					var TheCard = document.getElementById('card_link_' + $X);
					
					TheCard.style.display = 'block';

					// Select the div element by its ID
					const projectsDiv = document.getElementById('projects_div');

					// Check if the div element exists
					if (projectsDiv) {
						// Get the position of the div element
						const divPosition = projectsDiv.getBoundingClientRect().top + window.scrollY;
						
						// Scroll to the div element plus 100px offset
						window.scrollTo({
							top: divPosition - 150,
							behavior: 'smooth'
						});
					} else {
						console.error('Element with ID "projects_div" not found.');
					}

					
					
					
				}
				
				
				function refresh_flickity(i){
					
					

					
					var nodeList = document.querySelectorAll('.flickity-js');

					
					//for (var i = 0, t = nodeList.length; i < t; i++) {
						
						console.log(nodeList);
						
						var flkty = Flickity.data(nodeList[i]);
						
						console.log(flkty);
						
						//if (!flkty) {
							// Check if element had flickity options specified in data attribute.
							
							var flktyData = nodeList[i].getAttribute('data-flickity');
							
							console.log(flktyData);
							
							if (flktyData) {
								
								var flktyOptions = JSON.parse(flktyData);
								
								
								
								new Flickity(nodeList[i], flktyOptions);
								
							} else {
								
									
									var project_Carousel = nodeList[i];
									
									var proj_flkty = new Flickity(project_Carousel, {
										// options
										cellAlign: 'left',
										contain: true,
										prevNextButtons: true,
										pageDots: true,
										arrowShape: 'M60.5689 0.5L66 6L21.363 50.2884L66 94.5L60.6455 100L10.6348 50.2884L60.5689 0.5Z'
									});
									
									
									//var carousel = document.querySelector('.project-carousel');
									
									var flkty = Flickity.data(project_Carousel);
									if (flkty) {
										proj_flkty.resize();
									}
								
							}
				
					
					
					
					
					//}	// end for loop 
				}	// end function 
		
		</script>
		
		
		<div id="posts-container"></div>

<!-- /section -->
<!-- hero section (text only) -->

	<?php
	
	
	///////////////////////////////////////////////////////////////////////////////
	//
	//			OUR LATEST COLLECTIONS 
	//
	/////////////////////////////////////////////////////////////////////////////

	include "section_our_latest_collections.php";
	
	///////////////////////////////////////////////////////////////////////////////
	//
	//			END OUR LATEST COLLECTIONS 
	//
	/////////////////////////////////////////////////////////////////////////////
	

	
	
		?>

        
    </main>
<!-- /end main -->
	
	
	
	<?php







		get_footer();

