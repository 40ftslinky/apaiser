<?php
/**
 * The template for displaying the post.
 *
 * Template name: Collection Archive
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
	
	$stylesheet_directory = basename(get_stylesheet_directory());
	
	$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";

	
	?>


    <main >

<!-- section -->
<!-- hero section (text only) -->

        <section class="hero text_only dark_grad" style="background-image: url(<?php echo $child_themedir; ?>/assets/heros/collections_hero.jpg);">
            <div class="row">
                <div class="col">
                    <div class="hero-content">
                        <!-- <h1 class="subtitle">Explore</h1> -->
                        <h1>Collections</h1>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p> -->
                    </div>
                </div>
            </div>
        </section>

<!-- /section -->


<!-- section (text only) -->
<?php
$bq = get_field("blockquote", $post_id);
$in = get_field("intro", $post_id);

if(!empty($bq) || !empty($in)){
?>
<section class="half_panel ">
    <div class="row align-end">
        <?php
		if(!empty($bq)){
		
		?>
		<div class="col column">
            <div class="text_wrap">
                <blockquote>
                    <?php
					
						
						
						echo $bq;
					
					?>
                </blockquote>
            </div>
        </div>
		<?php
		}
		
		if(!empty($in)){
		?>
        <div class="col column">
            <div class="text_wrap"><?php
						echo $in;
					?></div>
        </div>
		<?php
		}
		?>
    </div>
</section>
<?php
}

?>
<!-- /section -->
 

<!-- section -->
<!-- GRID Collection Archive -->
<section class="grid-collection archive">
     

    <div class="row">
        
        <div class="grid-col column ">   
            
			<?php
			
			
			/////////////////////////////
			//
			//	LOOP 
			//
			///////////////////////////
			// Define the taxonomy
			$taxonomy = 'product_cat';

			// Get all terms for the specified taxonomy
			$terms = get_terms([
				'taxonomy' => $taxonomy,
				'hide_empty' => false, // Set to true to hide terms without posts
			]);

			// Check if there are any terms
			if (!empty($terms) && !is_wp_error($terms)) {
				// Loop through each term
				foreach ($terms as $term) {
				//	echo 'Term name: ' . $term->name . '<br>';
				//	echo 'Term slug: ' . $term->slug . '<br>';
				//	echo 'Term description: ' . $term->description . '<br>';
				//	echo 'Term ID: ' . $term->term_id . '<br>';
				//	echo 'Term count: ' . $term->count . '<br>';
				//	echo '<br>';
				
				$med='';
				
				$term_id=$term->term_id;
				$TN=$term->name;
				$Link = "/products-cat/".$term->slug;
				
					
			$hero_image = get_field('hero_image', 'product_cat_'.$term_id);
			
			print "<!-- hero_image: $hero_image -->";
			
			$hero_image2 = get_field('hero_image2', 'product_cat_'.$term_id);
			
			print "<!-- hero_image2: $hero_image2 -->";
			
			$category_image = get_field('category_image', 'product_cat_'.$term_id);
			
			if(isset($category_image['sizes'])){
				
				if(isset($category_image['sizes']['large'])){
					$med = $category_image['sizes']['large'];
					print "<!-- -large: $med -->";
				} elseif(isset($category_image['sizes']['medium'])){
					$med = $category_image['sizes']['medium'];
					print "<!-- medium: $med -->";
				}
			}
			
			
			if(empty($med)){
				if(empty($hero_image) && !empty($hero_image2)){
					

					$IMG = $hero_image2;
					
				} else {
					$IMG = $hero_image;
				}
			} else {
				
				$IMG = $med;
			}
			
			if(empty($IMG)){
				$stylesheet_directory = basename(get_stylesheet_directory());
				$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
				$IMG=$child_themedir."/assets/images/placeholder.jpg";
			}
				
			
			?>
            <!--  01 -->
            <a class="card_link" href="<?php echo $Link; ?>">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $IMG; ?>" alt="<?php echo $TN; ?>">
                    </div>
                    <div class="card-content">
                        <h3><?php echo $TN; ?></h3>
                        <button class="view_product-link">View Range</button>
                    </div>
                </div>
            </a>
			<?php
			
			/////////////////////////////
			//
			//	END LOOP 
			//
			///////////////////////////
				}
			} else {
				echo 'No terms found.';
			}

			
			
			?>






            
            <!-- 21 / per page default  -->
        </div>

    </div>

    <!-- <div class="row ">
        <div class="column align-center">
            <div class="pagination">
                <a href="" class="page previous"><span class="left_arrow">&#x2B60;</span></a> <a href="" class="page current">01</a> | <a href="" class="page">02</a> | <a href="" class="page">03</a> | <a href="" class="page">04</a> | <a href="" class="page more"><span class="right_arrow">&#x2B62;</span></a> 
            </div>
            
        </div>
    </div> -->


</section> 

<!-- /section -->


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

