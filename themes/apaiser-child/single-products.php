<?php
/**
 * The template for displaying the post.
 *
 * Template name: Single Product.
 *
 * @package storefront
 */

	function replace_special_quotes($html) {
		// Define the characters to be replaced and their replacements
		$search1 = '”';	
		$search2 = '″';	
		$replace = '"';

		// Use str_replace to replace all instances of ” with "
		$html = str_replace($search1, $replace, $html);
		
		$html = str_replace($search2, $replace, $html);
		

		return $html;
	}













		
	$body_class="post";
	$template_class="post";
	
	global $post;
	
	$slug = $post->post_name;
	

	if(!empty($slug)){
		
		$template_name=$slug;
		
	} else {
		
		$template_name='product';
		
	}
	
	get_header();

	include_once "nav.php";
	
	global $wp_query;
	

	
	$stylesheet_directory = basename(get_stylesheet_directory());
	
	$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
	
	
	// ACF
	/*
	$post_hero_image = get_field('post_hero_image', $post_id);
	
	
	$carousel_image = get_field('carousel_image', $post_id);
	
	$archive_image = get_field('archive_image', $post_id);
	
	
	if(!empty($post_hero_image)){
		$IMAGE = $post_hero_image;
		
	} elseif(!empty($carousel_image)){
		$IMAGE = $carousel_image;
	} elseif(!empty($archive_image)){
		$IMAGE = $archive_image;
	}		
		

	*/
	
	$post_id = $wp_query->post->ID;
	
	
	
	$post_content = get_the_content($post_id);
	
	$default=$child_themedir."assets/images/placeholder.jpg";
	
	$FeaturedImage = getFeaturedImage($post_id); 
	
	if(!empty($FeaturedImage)){
		$default=$FeaturedImage;
	}
	
	//Get page title
	$post_title=get_the_title($post_id);
	$hero_title = get_field('hero_title', $post_id);
	if(empty($hero_title)){
		$hero_title= $post_title;
	}
	$sub_heading_h2 =  get_field('sub_heading_h2', $post_id);
	$hero_image = get_field('hero_image', $post_id);
	$hero_image_bg = get_field('hero_image_bg', $post_id);
	
	if(empty($hero_image)){
		$hero_image=$default;
		$Def = 1;
	}
	
	$terms = wp_get_post_terms($post_id, 'product_type');
	
	// Check if terms were found 
	if (!empty($terms) && !is_wp_error($terms)) { 
		//   the first term's name (assuming a post has only one 'product_type') 
		$term_id =  $terms[0]->term_id;
		
		$term_bg = get_field('hero_image2', 'product_cat_'.$term_id);
		
		if(!empty($term_bg)){
			$hero_image_bg=$term_bg;
		}
	}
	
	if(empty($hero_image_bg) && !isset($Def)){
		$hero_image_bg=$default;
	}
	

	
	?>

    <main >
        <!-- hero section (half panel) single-products.php  -->
        <!-- section -->

        <section class="half_panel-hero product">
            <div class="row">                
            
                <div class="col column full-width-bg" >
                    <div class="img_wrap ">
                        <img src="<?php echo $hero_image; ?>" alt="image">
                    </div>
                </div>  

                <div class="col column full-width-bg " style="background-image: url(<?php echo $hero_image_bg; ?>);">
                    <div class="card card-center">
                        <div class="card-content">
                            <h1><?php echo $hero_title; ?></h1>
                            <h2 class="subtitle"><?php echo $sub_heading_h2; ?></h2>
                        </div>
                    </div>
                </div>

            </div>
        </section>

<!-- /section -->

<!-- section -->
	
	<?php
	
	$cols_visible = true;
	//blockquote
	$cols_blockquote = get_field('cols_blockquote', $post_id);


	$product_blockquote = get_field('product_blockquote', 'product_cat_'.$term_id);

	
	if(!empty($cols_blockquote)){
		
		$p1 = $cols_blockquote;
		
	} else {
		
		$p1 = $product_blockquote;
		
	}
	
	//paragraph	
	
	$cols_paragraph = get_field('cols_paragraph', $post_id);	
	
	$product_paragraph = get_field('product_paragraph', 'product_cat_'.$term_id);	
	

		
		$p2 = $cols_paragraph . $product_paragraph;
		
		//$p2 = $product_paragraph;
		
		
		//$p2 = $post_content . $product_paragraph;
		
		//$p2 = $product_paragraph;
		
		

	
	$p2 = clean_up_old_post($p2);
	
	
	if($cols_visible){
	?>
    <!-- **** removed .plain + added .text_wrap around blockquote -->
    <section class="half_panel ">
        <div class="row">
                <div class="col column">
                    <div class="text_wrap">
                        <blockquote>
                         <?php echo $p1; ?>
                        </blockquote>
                    </div>
                </div>
                <div class="col column ">
                    <div class="text_wrap">
						<div class="content">
						   <?php echo $p2; ?>
						</div>
					</div>
                </div>
            </div>
        </section>
	<?php
	}
	
	
	
	



	
	
	
	
	
		/*
	
		// DEFAULT WORDPRESS CONTENT APPEARS HERE 
		if(!empty($post_content)){
					




			
			?><!--
			<section class="panel ">
				<div class="row align-end">

						<div class="col column ">
							<div class="text_wrap">
								<div class="content">
									<?php echo $post_content; ?>
								</div>
							</div>
						</div>
					</div>
				</section> -->
			<?php
		
		
	}
	
	*/
	
	
	?>
<!-- /section -->


<?php

				///////////////////////////////////////////////////////////////////
				//
				//
				// COLOURS 
				//
				//
				/////////////////////////////////////////////////////////////////////
				
				
				// get the colour palettes for this product.
				
				$colour_palettes = wp_get_post_terms($post_id, 'product_colors');
				
				
				/*
				Array ( 
				[0] => WP_Term Object ( 
					[term_id] => 87 
					[name] => Australian Colour Palette 
					[slug] => australian-colour-palette 
					[term_group] => 0 [term_taxonomy_id] => 87 
					[taxonomy] => product_colors [description] => [parent] => 0 [count] => 59 [filter] => raw ) 
				[1] => WP_Term Object ( [term_id] => 86 
					[name] => Standard Colour Palette 
					[slug] => standard-colour-palette [term_group] => 0 [term_taxonomy_id] => 86 [taxonomy] => product_colors [description] => [parent] => 0 [count] => 59 [filter] => raw ) ) 
				*/


?>
<!-- section --> 
<!-- GRID Colour Palette -->
<section class="grid-colours plain">

	<?php
	
	//	
	foreach($colour_palettes as $palette){
		

	
	
	?>
     <div class="row">
        <div class="column align-center no_gap">
            <h2 class="center-align"><?php echo $palette->name;  ?></h2>
            <p style="color:#5A5A5A">(colours are indicative and for reference purposes only)</p>

        </div>
    </div>

    <div class="row">
        
        <div class="grid-col column ">   
            

			<?php
			
				$slug = $palette->slug;
				
				$term_id = $palette->term_id;
				
				//$product_blockquote = get_field('product_blockquote', 'product_cat_'.$term_id);
				
			//	$colours = get_field('colours_name', 'product_cat_'.$term_id);
				
			//	$colours_image = get_field('colours_image', 'product_cat_'.$term_id);
				
                /*
				

				
				*/
				/*
				
				$term = get_queried_object();
                $taxonomy = $term->taxonomy;
                $term_id = $term->term_id;  
				*/
				
				$taxonomy = "product_colour";
				
                if( have_rows('colours_name', $taxonomy . '_' . $term_id) ){
					while(have_rows('colours_name', $taxonomy . '_' . $term_id)){
						
						//the_row(); 
						
						print "<h3> $term_id </h3>";
					
					}
				
				}
				//
				
								
				 // name of repeater field
				  $repeater = 'colours'; 

				  // get taxonomy id
				  $taxonomy_id = get_queried_object_id(); 
				  


				  // get repeater data from term meta
				  $post_meta = get_term_meta($term_id, $repeater, true);
				  


				  // count items in repeater
				  $count = intval(get_term_meta($term_id, $repeater, true));
				  
				  /*
				  // loop + apply filter the_content to preserve html formatting
				  for ($i=0; $i<$count; $i++) {
					  $Name= get_term_meta($term_id, $repeater.'_'.$i.'_'.'name', true);
					  $Image= get_term_meta($term_id, $repeater.'_'.$i.'_'.'image', true);
					}
					

				*/
					
								
								
								
				
				
				
				
				



			// START LOOP
			for ($i=0; $i<$count; $i++) {

				?>
				<!--  01 -->
				<a class="card_link" href="#link">
					<div class="card">                        
						<div class="card-image">
						<?php
						//$ColourNameStr = str_replace(" ","-",$ColourName);
						//$ColourNameStr = str_replace("'","-",$ColourNameStr);
						
						//$FILE = $_SERVER['DOCUMENT_ROOT']."/".$child_themedir."assets/palette/".$ColourNameStr.".png";
						
						//$FILE2 = $_SERVER['DOCUMENT_ROOT']."/".$child_themedir."assets/palette/".$ColourNameStr.".jpg";
							
					  $ColourName= get_term_meta($term_id, $repeater.'_'.$i.'_'.'name', true);
					  
					  $image_id= get_term_meta($term_id, $repeater.'_'.$i.'_'.'image', true);
					  
					  $IMG = wp_get_attachment_url($image_id);
					  
					  

					  

						
						
						?>
							<img src="<?php echo $IMG; ?>" alt="<?php echo $ColourName ?>">
						</div>
						<div class="card-content">
							<h3><?php echo $ColourName ?></h3>
						</div>
					</div>
				</a>
				<?php
				
			}		// END LOOP.
			

			?>
    
            <!-- 6 / per page default  -->
        </div>

    </div>

<?php

	}

?>


</section> 

<!-- /section -->
<?php

				///////////////////////////////////////////////////////////////////
				//
				//
				// END COLOURS 
				//
				//
				/////////////////////////////////////////////////////////////////////


?>
<?php


	////////////////////////// FILES //////////////////////
	
	/*
	$TheFile = get_sub_field('file');
	
	
	print "<!--   TheFile ::::   ";
	
	
	
	print_r($TheFile);
	
	print " -->";
	
	
	$FileURL = get_sub_field('file')['url'];

	print "<!-- FileURL=$FileURL   -->";

	// product_specs

	$product_specs  = get_sub_field('product_specs');
	
	print "<!-- product_specs=$product_specs   -->";
	*/


?>
<!-- section -->
<!-- product details -->
 <section class="product-details plain table_section">
    <div class="row">
        <div class="col column align-center">
            <h2>Product Details</h2>
        </div>
    </div>
    <div class="row">
        <div class="col column">
            <div class="table_wrap">
                <h4>DOWNLOADS</h4>
                <div class="table">
				<?php
				
				
				
				function outputFileRow($FileURL, $file_title, $sizeInfo=[]){
					
					$path_info = pathinfo($FileURL); 
					
					$extension = strtoupper($path_info['extension']);
						
					
					
					?>
					<div class="table_row">
					
						<div class="table_cell">
						
							<div class="download_title"><?php echo $file_title; ?></div>
							<?php
							
							if(!empty($sizeInfo)){
								?>
								<div class="col-xs-8 col-sm-10 equalize">

									<?php echo $sizeInfo['length']; ?>mm x
									<?php echo $sizeInfo['width']; ?>mm x
									<?php echo $sizeInfo['height']; ?>mm
									Code: <?php echo $sizeInfo['product_code']; ?>
								</div>
								
								<?php
							} else {
							
								?>
								<div class="download_type"><?php echo $extension ?></div>
								
								<?php
							
							}
							
							?>
							
						</div>
						
						<div class="table_cell download_cell"><a  href="<?php echo $FileURL; ?>" class="download-link-left">Download</a></div>
						
					</div>
					
					<?php
				}
				
				
				///////////////////////////////////////////////////////////////////
				//
				//  DOCUMENTS - COLOURS 
				//
				/////////////////////////////////////////////////////////////////////
				
				if (have_rows('colours')) {
					
					while (have_rows('colours')) :
					
						the_row();	
						
						$FileURL = get_sub_field('file')['url'];
						
						$file_title = get_sub_field('file')['title'];
						
						
						if(!empty($FileURL) && !empty($file_title)){
							
							outputFileRow($FileURL, $file_title);
							
						}
						
						endwhile;
						
					}
					
					
					
					//sizes 
					
					if (have_rows('sizes')) {

						while (have_rows('sizes')) :
						
							the_row();
							
							$file = get_sub_field('product_specs');
							
							$file_title = get_sub_field('product_name');
							
							/*
																<?php the_sub_field('length'); ?>mm x
									<?php the_sub_field('width'); ?>mm x
									<?php the_sub_field('height'); ?>mm
									Code: <?php the_sub_field('product_code'); ?>
									
									*/
							
							$sizeInfo= array();
							
							$sizeInfo['length'] = get_sub_field('length');
							
							$sizeInfo['height'] = get_sub_field('height');
							
							$sizeInfo['width'] = get_sub_field('width');
							
							$sizeInfo['product_code'] = get_sub_field('product_code');
							
							

							
							

							if(!empty($file) && !empty($file_title)){
								
								outputFileRow($file, $file_title, $sizeInfo);
								
							}
					
						endwhile;
						
					}
					
					
					// downloads
					if (have_rows('downloads')) {

						while (have_rows('downloads')) :
						
							the_row();
							
							$file = get_sub_field('file');
							
							$file_title = get_sub_field('file_name');
								
							if(!empty($file) && !empty($file_title)){
								
								outputFileRow($file, $file_title);
								
							}
					
						endwhile;
						
					}
					
					
					
					
				/////////////////////////////////////////////////////////////////////
				//
				//  DOCUMENTS - COMMON  
				//
				/////////////////////////////////////////////////////////////////////
				
				$terms = wp_get_post_terms($post_id, "product_type");
				

				
				$term_Slug = $terms[0]->slug;
				$term_ID = $terms[0]->term_id;
				

				

			if(!empty($term_ID)){
			// Arguments for the query

			
			$args = array(
			
				'post_type' => 'product_files',
				
				'posts_per_page' => -1,
				
				'post_status'       => array("publish"),	

				'tax_query' => array(
				
					array(
						'taxonomy' => 'product_type',
						'field'    => 'term_id',
						'terms'    => $term_ID,
					),
					
				),

			);

			// Execute the query
			$query = new WP_Query($args);
			
			$TypeFiles = array();

			// Check if there are any posts
			if ($query->have_posts()) {
				
				while ($query->have_posts()) {
					
					$query->the_post();
					
					$Post_id = $query->post->ID;
					
					$TypeFiles[$Post_id]=array();
					
					$T = get_the_title();
					
					$F = get_field('file', $Post_id);

					$TypeFiles[$Post_id][]= $T;
					
					$TypeFiles[$Post_id][]= $F;
					
				}
				
			} else {
				
				echo '<!-- No posts found for the given term ID. -->';
				
			}

				// Reset post data
				wp_reset_postdata();
			}

			foreach($TypeFiles as $FILE){
				
				$Title = $FILE[0];
				
				$Url = $FILE[1]['url'];

				outputFileRow($Url, $Title);
				
			}
			
				
				
					
					?>
                </div>
                
            </div>
        </div>

        <div class="col column">
            <div class="table_wrap">
                <h4>OTHER PIECES IN THE COLLECTION</h4>
				<?php
					
					function get_related_posts_by_taxonomy($post_id, $taxonomy = 'product_cat') {
						// Get the terms for the given post
						$terms = wp_get_post_terms($post_id, $taxonomy);
						


						if (!empty($terms) && !is_wp_error($terms)) {
							// Get the term IDs
							$term_ids = wp_list_pluck($terms, 'term_id');
							

							
							
							// Set up the query arguments
							$args = [
								'post_type' => 'products', 
								'posts_per_page' => -1, // Change the number to limit results
								'post__not_in' => [$post_id], // Exclude the current post
								'tax_query' => [
									[
										'taxonomy' => $taxonomy,
										'field' => 'term_id',
										'terms' => $term_ids,
									],
								],
							];

							// Perform the query
							$related_posts = new WP_Query($args);
			

							// Check if there are posts
							if ($related_posts->have_posts()) {
								while ($related_posts->have_posts()) {
									$related_posts->the_post();
									// Output the title (or customize as needed)
									//echo '<div>' . get_the_title() . '</div>';
									
									$title = get_the_title();
									
									$link=get_the_permalink();
									
									?>
									
									<div class="table_row">
										<div class="table_cell"><?php echo $title; ?></div>
										<div class="table_cell download_cell"><a  href="<?php echo $link; ?>" class="read_more-link">Discover</a></div>
									</div>
													
									<?php
									
								}
							} else {
								echo 'No related posts found.';
							}

							// Reset post data
							wp_reset_postdata();
						} else {
							echo 'No terms found for the specified post.';
						}
					}


				
				
				?>
                <div class="table">

					<?php
					
					get_related_posts_by_taxonomy($post_id);

                    ?>
					
                </div>
                
            </div>
        </div>
    </div>
</section>

<!-- /section -->


<!-- section -->
<!-- RANGE CAROUSEL -->
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
	<script>

	
	function adjustHeight() {
    if (window.innerWidth < 880) {
        // Get the height of the div with class "img_wrap"
        var imgWrapHeight = document.querySelector('.img_wrap')?.offsetHeight || 0;
		
        // Get the height of the div with class "card-center"
        var cardCenterHeight = document.querySelector('.card-center')?.offsetHeight || 0;

        // Get the first div with class "full-width-bg"
        var fullWidthBgFirst = document.querySelector('.full-width-bg');
        var paddingTop = parseFloat(window.getComputedStyle(fullWidthBgFirst).paddingTop) || 0;
        var paddingBottom = parseFloat(window.getComputedStyle(fullWidthBgFirst).paddingBottom) || 0;

        // Calculate the total height
        var totalHeight = imgWrapHeight + cardCenterHeight + paddingTop + paddingBottom;

        // Set the height of the  div with class "full-width-bg"
        var fullWidthBgSecond0 = document.querySelectorAll('.full-width-bg')[0];
        if (fullWidthBgSecond0) {
            fullWidthBgSecond0.style.height = totalHeight + 'px';
        }		
		
        var fullWidthBgSecond = document.querySelectorAll('.full-width-bg')[1];
        if (fullWidthBgSecond) {
            fullWidthBgSecond.style.height = totalHeight + 'px';
			//fullWidthBgSecond.style.top = '0';
			//fullWidthBgSecond.style.position = 'absolute';
        }
    } else {
		
			// remove attributes when 880px or above
			document.querySelectorAll('.full-width-bg').forEach(function(div) {
				div.style.removeProperty('height');
				//div.style.removeProperty('top');
				//div.style.removeProperty('position');
			});

		
	}
}

jQuery( document ).ready(function($) {
	
	// Run the function when the window is resized
	
	window.addEventListener('resize', adjustHeight);

	// Run the function on initial load
	
	adjustHeight();
	
	
});


	
	</script>
	<?php








		get_footer();














