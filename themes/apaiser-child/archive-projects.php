<?php
/**
 * The template for displaying the post.
 *
 * Template name: Projects Archive
 *
 * @package storefront
 */

	
	$body_class="post-list";
	
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
	$categoryName = $termDetails['name'];
	$term = get_term($term_id);
	$category = $term->slug;
	
	if(empty($hero_title)){
		
		$hero_title = $categoryName;
		
	}
	
	
	if(empty($category)){
		$category = "commercial";
	}



	// Count number of Posts in this Category 
    // Define the query arguments
    $args = [
        'post_type' => 'installations',
        'tax_query' => [
            [
                'taxonomy' => 'installation_cat',
                'field' => 'slug',
                'terms' => $category
            ]
        ],
        'post_status' => 'publish',
        'posts_per_page' => -1
    ];

    // Perform the query
    $query = new WP_Query($args);

    // Return the number of posts found
   $post_count= $query->found_posts;

	
	$posts_per_page = 9;
	
	
	?>

	    <main>

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

                    <a class="button-secondary"> <?php echo $intro_button; ?></a>

                </div>
				<?php
				if(!empty($image1)){
				?>
                <div class="col column">
                    <div class="img_wrap bottom_overflow">
                        <img src="<?php echo $image1; ?>"  alt="image">
                    </div>
                </div>
				<?php
				}
				?>				
            </div>
        </section>

        <section class="overflow_section white_bg">
            <div class="row ">
				<?php
				if(!empty($image2)){
				?>
                <div class="col column four-tenths">
                    <div class="img_wrap top_overflow">
                        <img src="<?php echo $image2; ?>" alt="image">
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

                    <a class="button-secondary"><?php echo $intro_button2 ?></a>
    
                </div>
            </div>
        </section>

<!-- /section -->

<!-- section -->
<!-- RECENT PROJECTS -->
        <section class="grid-projects archive">

            <div class="row ">
                <div class="col align-center">
                    <h2 class="center-align">Recent Projects</h2>
                </div>
            </div>
     
			<?php

			
			
			if(empty($category)){
				$category = "commercial";
			}
			
			
			// returns list of videos by author_id
			$Args2 = array(
				'post_type' => 'installations',
				'posts_per_page' => $posts_per_page,
				'post_status'       => array("publish"),
				'tax_query' => [ [ 'taxonomy' => 'installation_cat', 'field' => 'slug', 'terms' => $category ] ],
				'orderby' => 'id', 
				'order' => 'desc',		
			);
			$Projects = get_posts( $Args2 );
			
			
			
			

			?>
            <div class="row">
                
                <div class="grid-col column ">   
					<?php
					
					
					$XX = 0;
					
					foreach($Projects as $proj){
						
						//print_r($proj);

						
						$project_id = $proj->ID;
						$post_content = $proj->post_content;
						$post_name = $proj->post_name;
						$guid = $proj->guid;
						$title = $proj->post_title;
						
						$hero_subtitle = get_field('hero2_subtitle', $project_id);
						$alt = get_field('hero2_alt', $project_id);
						$description = get_field('description', $project_id);
						$perma_link =get_permalink($project_id);
						
						
						// 
						$image = get_field('hero2_background', $project_id);
						$images_thumbnail = get_field('thumbnail', $project_id)['url'];
						if(empty($image) && !empty($images_thumbnail)){
							$image = $images_thumbnail;
						}
						
						
					$proj_images = [];

					if (have_rows('installation_photos', $project_id)) :
						while (have_rows('installation_photos', $project_id)) :
							the_row();
							$proj_images[] = get_sub_field('photo');
						endwhile;
					else :
					endif;
					
					
					// Is this needed?
					$horizontal_alignment = get_field('thumbnail_horizontal_alignment', $project_id);
					$vertical_alignment = get_field('thumbnail_vertical_alignment', $project_id);
					
					

					

					
					// Cats
					$cat = get_the_terms($project_id, 'installation_cat');
					
					// Related Products
					$related = get_field('related_product', $project_id);
						
						
					?>
						<!-- 01....  -->
						<a class="card_link" id="card_link_<?php echo $XX; ?>">
							<div class="card center no_border"  id="card_<?php echo $XX; ?>">
								<div class="card-image">
									<img  id="card_image_<?php echo $XX; ?>" src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
								</div>
								<div class="card-content align-center">
									<h3 class="subtitle"  id="card_subtitle_<?php echo $XX; ?>"><?php echo $hero_subtitle; ?></h3>                
									<h3 id="card_title_<?php echo $XX; ?>"><?php echo $title; ?></h3>
									<p class="center-align"  id="card_description_<?php echo $XX; ?>"><?php echo $description; ?></p>
									<button class="button-outline pop-up-link" data="project-<?php echo $XX; ?>">Discover</button>
									<!-- hidden fields -->

									<?php

										
										$Z=0;
										// Regions
										$regions = get_the_terms($project_id, 'installation_region');
										$RegionStr = "";
										foreach ($regions as $region) {
											if(!empty($RegionStr)){
												$RegionStr = $RegionStr . ", ";
											}
											$regionName = $region->name;
											$RegionStr = $RegionStr . $regionName;
											$Z++;
										}
															

										
									?>
									<!-- end hidden fields -->
								</div>
							</div>
						</a>
				<?php
				
				
				
					?>
					
					


					<!-- Project Pop-up -->

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

								<div class="project-carousel  carousel" id="popup_project_carousel_<?php echo $XX; ?>">
									<?php
										foreach($proj_images as $p){
											$thumb = $p['sizes']['medium-large'];
											if(empty($thumb)){
												$thumb = $p['sizes']['large'];
											}
											?>
											<div class="carousel-cell project-image">
												<img src="<?php echo $thumb; ?>" alt="<?php echo $title; ?>">
											</div>
											<?php
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
									<div class="project-description" id="project_description_<?php echo $XX; ?>"><?php echo htmlentities($post_content); ?></div>
								</div>
								
							</div>
							
							
						</div>
					</div> 
				
				
				<?php
				
					$XX++;
					
					}
				
				?>
					
                </div>

            </div>
	
            <div class="row">
                <div class="column  justify-center align-center">
				<?php
				
					// PAGINATION 
					
					//number of pages (round up after division)
					
					$page_count = ceil($post_count / $posts_per_page);
					
					
					if(!isset($_GET['page'])){
						$current = 1;
						
					} else {
						$current =$_GET['page'];
					}
					
					$C = 0;
				
				?>
                    <div class="pagination">
                        <a href="" class="page previous load-more-link"  data="prev">
						<span class="left_arrow">&#x2B60;</span></a> 
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
							<a href="" class="<?php echo $class; ?>" data="<?php echo $C; ?>"><?php echo $n; ?></a>&nbsp;|&nbsp;
						<?php
						}
						?>
						<a class="page more load-more-link"  data="next"><span class="right_arrow">&#x2B62;</span></a> 
                    </div>
                    
                </div>
            </div>

        </section>
		<?php
		
		
		if(empty($category)){
			
				$category = 'commercial';
		}
		
		?>
		
		<script>
				document.addEventListener('DOMContentLoaded', function() {
				document.querySelectorAll('.load-more-link').forEach(function(link) {
					link.addEventListener('click', function(event) {

						
			
						event.preventDefault();
						
						var $n = 0;
						
						const dataValue = this.getAttribute('data');
						
						console.log(dataValue);
						
						//Check if the result is a number and not NaN return 
						
						var $isNumber = !isNaN(parseFloat(dataValue));
						
						console.log($isNumber);
						
						if($isNumber){
							$n = dataValue;
							
						} else {
							// prev or next TODO 
						}
						
							// use Ajax to get posts 
							$.ajax({
								type: 'POST',
								url: '<?php echo admin_url('admin-ajax.php');?>',
								dataType: "json", // add data type
								data: { action : 'get_ajax_posts', n: $n, category: '<?php echo $category; ?>' },
								success: function( response ) {
									console.log(response);
									
									$X=0;
									
									$.each( response, function( key, value ) {
										console.log( key, value ); // that's the posts data.
										ReplaceProjectData(key, value, $X);
										$X++;
									} );
								}
							});
						
						});
					});
				});
				
				
				function ReplaceProjectData(key, obj, $X){
					
					console.log("key:" + key);
					
					console.log("obj:"+ obj);
					
					console.log("X:"+$X);
					
					//var ID = value->ID;
					
					//	
					var post_title = obj['post_title'];

					// Select the element with the ID 'card_title_0'
					const cardTitle = document.getElementById('card_title_' + $X);
					// Replace the text content with the desired text
					cardTitle.textContent = post_title;
					
					//popup_project_title_
					const popup_project_title_ = document.getElementById('popup_project_title_' + $X);
					// Replace the text content with the desired text
					popup_project_title_.textContent = post_title;
					
					//card_image_
					const card_image_ = document.getElementById('card_image_' + $X);
					/*
						$image = get_field('hero2_background', $project_id);
						$images_thumbnail = get_field('thumbnail', $project_id)['url'];
						if(empty($image) && !empty($images_thumbnail)){
							$image = $images_thumbnail;
						}					
					*/
					
					//popup_project_regions_0

	
					/*
					for (const keys in obj) {
						if (obj.hasOwnProperty(keys)) {
							console.log(`${keys}: ${obj[keys]}`);
							
							
						}
					}
					*/
					
					
					
				}
		
		</script>
		
		
		<div id="posts-container"></div>

<!-- /section -->
<!-- hero section (text only) -->

<section class="hero text_only dark_grad" style="background-image: url(<?php echo $child_themedir; ?>/assets/projects/latest.jpg);">
    <div class="row">
        <div class="col column " >
                    
        </div>  
        <div class="col">
            <div class="hero-content">
                <!-- <h1 class="subtitle">Explore</h1> -->
                <h1>Our Latest Collections</h1>
                <a class="button-rev-outline" href="">Discover</a>
            </div>
        </div>
    </div>
</section>

<!-- /section -->
        
    </main>
<!-- /end main -->
	
	
	
	<?php







		get_footer();

