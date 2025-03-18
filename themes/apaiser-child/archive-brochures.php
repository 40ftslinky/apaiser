<?php
/**
 * The template for displaying the post.
 *
 * Template name: Brochures Archive
 *
 * @package storefront
 */



	if(!empty($_GET)){
		
		print_r($_GET);
		
		
	}



	$posts_per_page = 15;



	if(empty($_GET['pg'])){
		
		$page = 1;
		
	} else {
		
		$page = $_GET['pg'];
		
	}


	print "<!-- *page=$page -->";

	function get_brochures_by_type($taxonomy_value) {
		
		global $posts_per_page;
		
		
		if(empty($_GET['pg'])){
			
			$n = 0;
			
		} else {
			
			$n = (($_GET['pg'] - 1) * $posts_per_page);
			
		}
		
		
		
		// Set up the query arguments
		$args = [
			'post_type'      => 'brochures',
			'offset'	=>	$n,
			'posts_per_page' => $posts_per_page,
			'tax_query'      => [
				[
					'taxonomy' => 'brochures_type',
					'field'    => 'slug',
					'terms'    => $taxonomy_value,
				],
			],
		];

		// Perform the query
		$query = new WP_Query($args);
		
		
		$Array = [];
		
		

		// Check if there are posts
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				
				$query->the_post();

			   $Title = get_the_title();
			   
			   $ID = $post->ID;
			   
			   $File = get_field('file',  $ID);
			   
			   $Image = get_field('image',  $ID);
			   
			   $Array[] = [$ID, $Title, $File, $Image];
			}
		} else {
			//echo 'No brochures found for the brochures_type "' . esc_html($taxonomy_value) . '".';
		}

		// Reset post data
		wp_reset_postdata();
		
		return  $Array;
		
	}




	function brochure_pagination($taxonomy_value='brochures'){

			
			global $slug;
			
			global $page;
			
			if(empty($_GET['pg'])){
				
				$page = 1;
				
			} else {
				
				$page = $_GET['pg'];
				
			}
					
			global $posts_per_page;
			
			
		// Count number of Posts in this Category 
		
		// Define the query arguments
		
		$args = [

			'post_status' => 'publish',
			'post_type'      => 'brochures',
			'posts_per_page' => $posts_per_page,
			'tax_query'      => [
				[
					'taxonomy' => 'brochures_type',
					'field'    => 'slug',
					'terms'    => $taxonomy_value,
				],
			]
		];

		// Perform the query
		$query = new WP_Query($args);

		// Return the number of posts found
	   $post_count= $query->found_posts;
	   
		//number of pages (round up after division)
		
		$page_count = ceil($post_count / $posts_per_page);
		
		print "<!--  post_count = $post_count          -->";
		
		print "<!--  posts_per_page = $posts_per_page          -->";
		
		print "<!--  page_count = $page_count          -->";

	   if($page_count>1){

				?>
					<div class="row ">
						<div class="column align-center">
							<div class="pagination">
								<?php
								
									if($page>1){
										
										$prev = $page - 1;
										
									} else {
										
										$prev = 1;
										
									}
								
								?>
								<a href="/<?php echo $slug; ?>?pg=<?php echo $prev; ?>" class="page previous">&larrb;</a> 
								<?php

								for ($i = 1; $i <= $page_count; $i++){
									
									$n = $i;
									
									$n = str_pad($n, 2, '0',STR_PAD_LEFT);	// add leading zero to numbers under 10 
									
									print "<!-- *page=$page -->";
									
									if($i==$page){
										
										$class="page current";
										
									} else {
										
										$class="page";
										
									}
									?>
									<a href="/<?php echo $slug; ?>?pg=<?php echo $i; ?>" class="<?php echo $class; ?>">
										<?php echo $n; ?>
									</a><?php if($i==$page){ echo " "; } else { echo " | "; } ?>
									<?php
								
								}

								
									if($page<$page_count){
										
										$next = $page + 1;
										
									} else {
										
										$next = $page_count;
										
									}
								
								?>
								<a href="/<?php echo $slug; ?>?pg=<?php echo $next; ?>" class="page more">»</a> 
							</div>
						</div>
					</div>
				<?php
	   }
	   

	   

	}










	
	$body_class="post-list";
	
	$template_class="blog";

	get_header();

	include_once "nav.php";
	
	global $wp_query;
	
	$post_id = $wp_query->post->ID;
	
	$slug = $wp_query->post->post_name;
	
	$post_title=get_the_title($post_id);
	
	$stylesheet_directory = basename(get_stylesheet_directory());
	
	$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";


	$hero_image = get_field('hero_image', $post_id);
	

	
		
	
	?>


    <main>

        <!-- hero section (text only) -->
        <section class="hero dark_grad" style="background-image: url(<?php echo $hero_image['url']; ?>);">
            <div class="row">
                <div class="col">
                    <div class="hero-content">
                        <h1><?php echo $post_title; ?>	</h1>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p> -->
                    </div>
                </div>
            </div>
        </section>

<!-- /section -->

<!-- section -->

<!-- GRID ARCHIVE - Colour Palettes -->
<?php

	$palettes_title = get_field('Palettes_title', $post_id);
	
	$brochures_title = get_field('brochures_title', $post_id);
	

	$taxonomy_value = 'palette'; // The term slug
	
	$Brochures = get_brochures_by_type($taxonomy_value);
	
	$BCount = count($Brochures);
	
	if($BCount > 0){
	

?>
<section  id="house-palettes" class="grid-archive plain">

    <div class="row">
        <div class="column justify-center">
            <h2 class=""><?php echo $palettes_title ?></h2>


        </div>
    </div>

    <div class="row">
        
        <div class="grid-col column ">   
			<?php



			
			foreach($Brochures as $Brochure){

					//print_r($Brochure[2]);	// File

					//print_r($Brochure[3]);	// Image
					
					$filename = $Brochure[2]['filename'];
					
					$url = $Brochure[2]['url'];
					
					?>			
					<!--  01 -->
					<a class="card_link" href="<?php echo $url; ?>">
						<div class="card">                        
							<div class="card-image">
								<img src="<?php echo $Brochure[3]['url']; ?>" alt="<?php echo $Brochure[1]; ?>">
							</div>
							<div class="card-content">
								<h3><?php echo $Brochure[1]; ?></h3>
								<button class="download-link">View Colours </button>
							</div>
						</div>
					</a>
				<?php

			
			}
			
			?>

            <!-- 2 / per page default  -->
        </div>

    </div>

		<?php

		brochure_pagination('palette');


		?>

</section> 
<?php
	}
	
?>
	
	
<!-- / -->

<!-- section --> 
<!-- GRID ARCHIVE - Brochures -->

<?php

	$taxonomy_value = 'brochures'; // The term slug
	
	$Brochures = get_brochures_by_type($taxonomy_value);

	$BCount = count($Brochures);
	
	if($BCount > 0){
		
		?>
		
		<section id="brochures" class="grid-archive plain">

			 <div class="row">
			 
				<div class="column justify-center">
				
					<h2 class=""><?php echo $brochures_title; ?></h2>

				</div>
				
			</div>

			<div class="row">
				
				<div class="grid-col column ">   
					
					<?php




					
					foreach($Brochures as $Brochure){


							
							$filename = $Brochure[2]['filename'];
							
							$url = $Brochure[2]['url'];
							
							$Title = $Brochure[1];
							
							$ThumbURL = $Brochure[3]['url'];
							
							?>	

					<!--  01 -->
					<a class="card_link" href="<?php echo $url; ?>">
						<div class="card">                        
							<div class="card-image">
								<img src="<?php echo $ThumbURL; ?>" alt="<?php echo $Title; ?>">
							</div>
							<div class="card-content">
								<h3><?php echo $Title; ?></h3>
								<button class="download-link">View Brochure</button>
							</div>
						</div>
					</a>

				<?php
				
					}
					
					
					?>


				</div>

			</div>
			
		<?php

			brochure_pagination('brochures');
			
		?>

		</section> 
			<!-- /section -->
			
	<?php

	}

?>
<?php
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//
		//			RANGE CAROUSEL
		//
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			include "carousel_range.php";

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//
		//			END RANGE CAROUSEL
		//
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////



?>
        
    </main>
	<!-- /end main -->

	
	
	
	
	<?php







		get_footer();

