<?php 



	if(empty($taxonomy_name)){
		//$tax_type='product_type';
		$taxonomy_name = 'product_cat';
	}


	$body_class="post";
	$template_class="post";
	
	
	//$template_name
	


	
	$stylesheet_directory = basename(get_stylesheet_directory());
	
	$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
	



	$term_id = get_queried_object_id();
	



	$termDetails = getTaxonomyTermDetails($term_id);
	
	
	global $PageName;
	
	
	if (is_array($termDetails)) {
		
		$PageName = $termDetails['name'];

		//	print "<p>^PageName=$PageName</p>";
		
	} 
	
	$Description = $termDetails['description'];	
	
	
	get_header();

	include_once "nav.php";
			


	

?>
    <main >
        <!-- hero section (half panel) -->
        <!-- section -->
         <!-- ##### -->
          <!-- incorrect header - full width image only ? -->
		<?php
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//
		//			HERO
		//
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$default=$child_themedir."/assets/images/placeholder.jpg";
		$hero_image = get_field('hero_image', 'product_cat_'.$term_id);
		$hero_image2 = get_field('hero_image2', 'product_cat_'.$term_id);
		$hero_subtitle = get_field('hero_subtitle', 'product_cat_'.$term_id);
		
		if(empty($hero_image)){
			$hero_image = $default;
		}
		if(empty($hero_image2)){
			$hero_image2 = $default;
		}
		
		if(empty($hero_subtitle)){
			$hero_subtitle="Collection";
		}
		
		if($taxonomy_name=="product_cat"){
			// This is the hero for Product_cat 
			?>
		
			
	<section class="hero text_only_right dark_grad_right" style="background-image: url(<?php echo $hero_image; ?>);">
		<div class="row">
			<div class="col">
				<div class="hero-content">
					
					<h1><?php echo $termDetails['name'] ?></h1>
					<h1 class="subtitle"><?php echo $hero_subtitle ?></h1>
					

				</div>
			</div>
		</div>
	</section>

			
			
			<!-- /section -->


		<?php
		
		} else {
			
			// product_type single 
			?>	
			
			
				<section class="hero text_only dark_grad" style="background-image: url(<?php echo $hero_image; ?>);">
					<div class="row">
						<div class="col">
							<div class="hero-content">
								<h1 class="subtitle category-title"><?php echo $hero_subtitle ?></h1>
								<h1 class="product-title"><?php echo $termDetails['name'] ?></h1>
							</div>
						</div>
					</div>
				</section>
			
			
			
			<?php	
			
		}
		
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//
		//			END HERO
		//
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//
		//			INTRO
		//
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		
		$paragraph = get_field('intro_paragraph', 'product_cat_'.$term_id);
		
		$blockquote = get_field('intro_blockquote',  'product_cat_'.$term_id);
		
		
		?>
		<?php
		if(!empty($blockquote) || !empty($paragraph)){
			?>		
			<!-- **** removed .plain + added .text_wrap around blockquote -->
			<section class="half_panel ">
				<div class="row align-end">
				<?php
				if(!empty($blockquote)){
				?>
					<div class="col column">
						<div class="text_wrap">
							<blockquote>
							   <?php echo $blockquote ?>
							</blockquote>
						</div>
					</div>
					<?php
				}
				?>
				<?php
				if(!empty($paragraph)){
				?>			
					<div class="col column ">
						<div class="text_wrap"><?php echo $paragraph ?></div>
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

<?php

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//
		//			END INTRO
		//
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//
		//			COLLECTION GRID 
		//
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
<!-- section -->
<!-- GRID Collection  -->
<section class="grid-collection plain">

    <!--  <div class="row">
        <div class="column align-center no_gap">
           <h2 class="center-align collection-title"><?php echo $termDetails['name'] ?></h2>     
        </div>
    </div>       -->

    <div class="row">
        
        <div class="grid-col column ">   
            
<?php

	$default=$child_themedir."/assets/images/placeholder.jpg";

	 if (have_posts()) {
		
		query_posts($query_string . '&posts_per_page=20&orderby=menu_order&order=ASC&post_type=products');
		
		while (have_posts()) :
		//foreach ($products as $product) {

			the_post(); 
			
			$prod_id = $post->ID;
			$prod_post_title = $post->post_title;
			$image = getFeaturedImage($prod_id);

			$Link =  get_permalink( $prod_id );
			if(empty($image)){
				$image = $default;
			}
			
	?>

				<!--  01**  -->
				<a class="card_link" href="<?php echo $Link; ?>">
					<div class="card">                        
						<div class="card-image">
							<img src="<?php echo $image; ?>" alt="<?php echo $prod_post_title ?>">
						</div>
						<div class="card-content">
							<h3 class="product-title"><?php echo $prod_post_title ?></h3>
							<button class="view_product-link">View Product</button>
						</div>
					</div>
				</a>

	<?php

		endwhile;
	 }

	?>
            <!-- 3 / per page default  -->
        </div>
    </div>
</section> 

<!-- /section -->
<?php

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//
		//			END COLLECTION GRID 
		//
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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



<?php get_footer(); ?>