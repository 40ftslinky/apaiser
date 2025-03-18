<?php
			
			$current_post_id = get_the_ID();
			
			$current_post_type = get_post_type($current_post_id);
			
			print "<!-- current_post_id = $current_post_id          -->";
			
			print "<!-- current_post_type = $current_post_type          -->";
			
			
			if($current_post_type == "post"){
				
				$pt = 'post';
				
			} else {
				
				$pt = 'projects';
				
			}
			

			// returns list of videos by author_id
			$Args2 = array(
				'post_type' => $pt,
				'posts_per_page' => 6,
				'post__not_in' => [$current_post_id],
				'post_status'       => array("publish"),
				'orderby' => 'id', 
				'order' => 'desc',		
			);
			
			$Projects = get_posts( $Args2 );


?>

<!-- RECENT PROJECTS -->
<section class="grid-projects archive grey_850_bg" id="other_projects">

    <div class="row ">
        <div class="col align-center">
            <h2 class="center-align">Projects</h2>
        </div>
    </div>


    <div class="row range">
        
        <div class="grid-col column carousel">   

			<?php
			
			foreach($Projects as $proj){
				
				//print_r($proj);

				
				$project_id = $proj->ID;
				
				print "<!--  project_id: $project_id              -->";
				
				$post_content = $proj->post_content;
				
				$post_name = $proj->post_name;
				
				$guid = $proj->guid;

				$title = $proj->post_title;
				
				print "<!--  title: $title              -->";
				
				$image = get_field('hero2_background', $project_id);
				
				print "<!--  image: $image              -->";
				
				if(empty($image)){
					
					$hero_image = get_field('hero3_image', $project_id);
					
					print "<!--  hero_image: $hero_image              -->";
					
					if(empty($hero_image)){
						
						$hero_image=getFeaturedImage($project_id);
						
						print "<!--  hero_image: ";
						
						print_r($hero_image);

						print "	-->";
						
					}
					
					if(!empty($hero_image)){
						
						$image = $hero_image;
						
					} else {
						
						//	$image = get_largest_image_url($project_id);
						
					}
					
					print "<!--  image: $image              -->";
					
				}
				
				
				$images = get_field('thumbnail', $project_id);
				
				if(!empty($images)){
				
					$images_url = get_field('thumbnail', $project_id)['url'];
				
					$images_medium = get_field('thumbnail', $project_id)['sizes']['medium'];
					
					$images_large = get_field('thumbnail', $project_id)['sizes']['large'];
				
				}
				

				
				
				print "<!--  image: $image              -->";
				
				
				print "<!--  images_url: $images_url              -->";
				
				print "<!--  images_medium: $images_medium              -->";
				
				print "<!--  images_large: $images_large              -->";
				
				
				if(empty($image) && !empty($images_url)){
					
					$image = $images_url;
					
				}
				
				if(empty($image) && !empty($images_large)){
					
					$image = $images_large;
					
				}
				
				if(empty($image) && !empty($images_medium)){
					
					$image = $images_medium;
					
				}
		
				print "<!--  image: $image              -->";
				
				$hero_subtitle = get_field('hero2_subtitle', $project_id);
				
				$alt = get_field('hero2_alt', $project_id);
				
				$description = get_field('description', $project_id);
				
				$perma_link =get_permalink($project_id);
				
				$yoast_description = get_post_meta($project_id, '_yoast_wpseo_metadesc', true);
				
				if(!empty($yoast_description)){
					
					$Des = $yoast_description;
					
				} else {
					
					$Des = $description;
					
				}
				
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
							
				
				
			?>
				<div class='carousel-cell column one-third'>
					<div class="card center no_border">
						<div class="card-image">
							<img src="<?php echo $image; ?>" alt="<?php echo $alt ?>">
						</div>
						<div class="card-content align-center">
							<h3 class="subtitle"><?php echo $RegionStr ?></h3>                
							<h3><?php echo $title ?></h3>
							<p class="center-align"><?php echo $Des; ?></p>
							<a class="button-outline pop-up-link card_link" href="<?php echo $perma_link ?>">Discover</a>
						</div>
					</div>
				</div>
				
			<?php
			}
			
			?>
			
			

        </div>

    </div>
	
	
	<!-- 
	TODO ROSS 
	
    <div class="row">
        <div class="column  justify-center align-center">
            <div class="pagination">
                <a href="" class="page previous"><span class="left_arrow">&#x2B60;</span></a> <a href="" class="page current">01</a> | <a href="" class="page">02</a> | <a href="" class="page">03</a> | <a href="" class="page">04</a> | <a href="" class="page more"><span class="right_arrow">&#x2B62;</span></a> 
            </div>
            
        </div>
    </div>
	
	-->

</section>






<style>
.archive .row.range .flickity-viewport{
	
	width: 100%;
	
	
}

</style>
<!--
<section class="grid-projects archive">

    <div class="row ">
        <div class="col align-center">
            <h2 class="center-align"><?php echo $projects_title ?></h2>
        </div>
    </div>


    <div class="row">
        
        <div class="grid-col column ">   
			<?php
				foreach($cards as $card){
				?>

				<a class="card_link" href="<?php echo $card['link'] ?>">
					<div class="card center no_border">
						<div class="card-image">
							<img src="<?php echo $card['image'] ?>" alt="<?php echo $card['alt'] ?>">
						</div>
						<div class="card-content align-center">
							<h3 class="subtitle"><?php echo $card['subtitle'] ?></h3>                
							<h3><?php echo $card['title'] ?></h3>
							<p class="center-align"><?php echo $card['text'] ?></p>
							<button class="button-outline"><?php echo $card['button'] ?></button>
						</div>
					</div>
				</a>
				<?php
				}
				?>
            


            
        </div>

    </div>

</section>
-->

<!-- /section -->
