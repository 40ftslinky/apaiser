<?php 



	if(empty($taxonomy_name)){
		//$tax_type='product_type';
		$taxonomy_name = 'product_cat';
	}


	$body_class="post";
	$template_class="post";
	

	get_header();

	include_once "nav.php";
	
	$stylesheet_directory = basename(get_stylesheet_directory());
	
	$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
	



	$term_id = get_queried_object_id();
	



	$termDetails = getTaxonomyTermDetails($term_id);
	if (is_array($termDetails)) {
		//echo 'Name: ' . $termDetails['name'] . '<br>';
	//	echo 'Description: ' . $termDetails['description'];
	} else {
		//echo $termDetails; // Output error message
	}

			
	$Description = $termDetails['description'];
	


//$products = getProductsByTermId($term_id);
/*
if (is_string($products)) {
    //echo $products; // Output error message or 'No posts found.'
} else {
    foreach ($products as $product) {
        echo 'Product ID: ' . $product->ID . ' - Title: ' . $product->post_title . '<br>';
    }
}
*/
	

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
			<!-- <section class="half_panel-hero">
				<div class="row">                
					<div class="col column full-width-bg" >
						<div class="img_wrap ">
							<img src="<?php echo $hero_image; ?>" alt="image">
						</div>
					</div>  
					<div class="col column full-width-bg " style="background-image: url(<?php echo $hero_image2; ?>);">
						<div class="card card-center">
							<div class="card-content">
									<?php
									if(!empty($hero_subtitle)){
										?>
										<h1 class="subtitle"><?php echo $hero_subtitle ?></h1>
										<?php
									}
									?>
								<h1 ><?php echo $termDetails['name'] ?></h1>
							</div>
						</div>
					</div>
				</div>
			</section> -->
			
	<section class="hero text_only_right dark_grad_right" style="background-image: url(<?php echo $hero_image; ?>);">
		<div class="row">
			<div class="col">
				<div class="hero-content">
					<h1 class="subtitle"><?php echo $hero_subtitle ?></h1>
					<h1><?php echo $termDetails['name'] ?></h1>
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p> -->
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

	<!-- commented out by jez 19/10 -->
	<!--     
	<div class="row">
        <div class="column align-center no_gap">
            <h2 class="center-align collection-title"><?php echo $termDetails['name'] ?> Collection</h2>            
        </div>
    </div> 
	-->

    <div class="row">
        
        <div class="grid-col column ">   
            
<?php

	$default=$child_themedir."/assets/images/placeholder.jpg";

	 if (have_posts()) {
		
		query_posts($query_string . '&posts_per_page=20&orderby=menu_order&order=ASC');
		
		while (have_posts()) :
		//foreach ($products as $product) {

			the_post(); 
			
			$prod_id = $post->ID;
			$prod_post_title = $post->post_title;
			$image = getFeaturedImage($prod_id);
			//$Link = the_permalink(); 
			$Link =  get_permalink( $prod_id );
			if(empty($image)){
				$image = $default;
			}
			
	?>

				<!--  01 -->
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



<!--





<div class="moveToFront">
	<section class="layer-sticky" data-load-css="modules/layer-content" data-css-ver="1.0.3">
		<nav id="breadcrump">
			<a href="<?php echo home_url(); ?>/">Home</a> > <a href="<?php echo home_url(); ?>/collections/">Collections</a> >

			<?php

			$current_term       = get_term_by('id', $term_id, $taxonomy_name);

			// last level
			//..........................................................

			$parent_term_id     = $current_term->parent;

			if ($parent_term_id) {
				$parent_term        = get_term_by('id', $parent_term_id, $taxonomy_name);
				$parent_term_id     = $parent_term->term_id;
				$parent_term_name   = $parent_term->name;
				$parent_term_slug   = $parent_term->slug;
				$grand_parent_term_id   = $parent_term->parent;

				// 2nd last level
				//..........................................................


				if ($grand_parent_term_id) {
					$grand_parent_term = get_term_by('id', $grand_parent_term_id, $taxonomy_name);
					$grand_parent_term_name     = $grand_parent_term->name;
					$grand_parent_term_slug     = $grand_parent_term->slug;
				}
			}


			if ($parent_term_id) {
				if ($grand_parent_term_id) {
					echo '<a href="' . get_term_link($grand_parent_term_slug, $taxonomy_name) . '">' . $grand_parent_term_name . '</a> > ';
				}

				echo '<a href="' . get_term_link($parent_term_slug, $taxonomy_name) . '">' . $parent_term_name . '</a> > ';
			}





			single_cat_title(); ?>
		</nav>

		<div class="layer-header bg-dark clearfix">
			<div class="row">
				<div class="prod-info bg-dark col-sm-12 col-md-5">
					<h2 class="large_copy dash left nomar">
						Collections
					</h2>
					<h1 class="section_headline_large futura">

						<?php
						if (get_cat_name($term_id)) {
							$current_cat_title = get_cat_name($term_id);
						} else {
							$current_cat_title = single_cat_title('', false);
						}

						echo $current_cat_title;
						?>

					</h1>

					<?php have_rows('category_text_slider', $taxonomy . '_' . $term_id); ?>
					<?php if (have_rows('category_text_slider', $taxonomy . '_' . $term_id)) { ?>
						<div class="swiper-container--feature-copy">
							<div class="swiper-container">
								<div class="swiper-wrapper">

									<?php while (have_rows('category_text_slider', $taxonomy . '_' . $term_id)) :
										the_row(); ?>

										<div class="swiper-slide">
											<div class="lowerCase"><?php the_sub_field('copy'); ?></div>
										</div>

									<?php endwhile; ?>

								</div>
							</div>
							<div class="swiper-pagination"></div>
							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>
						</div>

					<?php } else { ?>
						<div class="lowerCase"><?php the_archive_description(); ?></div>

					<?php } ?>

				</div>
			</div>
		</div>

		<div class="layer-content-sticky">
			<nav class="accordion bg-dark async col-md-5">
				<div class="accordion-list accordion-smallfont squeez slideOut" id="rangeList" data-load="accordion-multilevel">
					<ul class="accordion-multilevel">
						<?php

						$taxonomy       = get_taxonomy($taxonomy_name);
						$taxonomy_slug  = $taxonomy->rewrite['slug'];

						$parents = get_terms(array(
							'taxonomy'      => 'product_cat',
							'hide_empty'    => false,
							'parent'        => 0,
						));

						foreach ($parents as $parent) {
							$current_id     = $parent->term_id;
							$current_name   = $parent->name;
							$current_url    = $parent->slug;
							$draft          = get_field('draft', 'product_cat_' . $current_id);

							if ($current_cat_title == $current_name) {
								$class = "active opened";
							} else {
								$class = '';
							}

							if (!$draft) {
								echo '<li class="' . $class . '"><a href="' . home_url() . '/' . $taxonomy_slug . '/' . $current_url . '/">' . $current_name . '</a>';
							}


							$args = array(
								'taxonomy'      => 'product_cat',
								'hide_empty'    => false,
								'parent'        => $current_id,
							);

							// 2 level
							//..........................................................

							if ($children = get_terms($args)) {
								echo '<ul class="secondlevel">';

								foreach ($children as $child) {
									$current_child_id       = $child->term_id;
									$current_child_name     = $child->name;
									$current_child_url      = $child->slug;
									$draft                  = get_field('draft', 'product_cat_' . $current_child_id);

									if ($current_cat_title == $current_child_name) {
										$class = "active";
									} else {
										$class = '';
									}


									if (!$draft) {
										echo '<li class="' . $class . '"><a href="' . home_url() . '/' . $taxonomy_slug . '/' . $current_child_url . '/">' . $current_child_name . '</a>';
									}


									$args_grand = array(
										'taxonomy'      => 'product_cat',
										'hide_empty'    => false,
										'parent'        => $current_child_id,
									);

									// 3 level
									//..........................................................

									if ($grand_children = get_terms($args_grand)) {
										echo '<ul class="thirdlevel">';

										foreach ($grand_children as $grand_child) {
											$current_grand_child_id     = $grand_child->term_id;
											$current_grand_child_name   = $grand_child->name;
											$current_grand_child_url    = $grand_child->slug;
											$draft                      = get_field('draft', 'product_cat_' . $current_grand_child_id);

											if ($current_cat_title == $current_grand_child_name) {
												$class = "active";
											} else {
												$class = '';
											}

											if (!$draft) {
												echo '<li class="' . $class . '"><a href="' . home_url() . '/' . $taxonomy_slug . '/' . $current_grand_child_url . '/">' . $current_grand_child_name . '</a>';
											}
										}

										echo '</ul>';
									}
									echo '</li>';
								}
								echo '</ul>';
							}

							echo '</li>'; // end 1 level
						}

						?>
					</ul>
				</div>
			</nav>
		</div>
	</section>

	<section class="layer-content mosaic async" data-load-css="modules/zoomIn">
		<div class="row">
			<div class="col-md-11 col-md-offset-5">
				<div class="row">

					<div class="style-spacer"></div>

					<div class="style-list clearfix">

						<?php

						/**************************************************************/
						// if categorys archive
						/**************************************************************/

						if ($term_children_id) {
							$amount = count($term_children);

							foreach ($term_children as $child) {
								//get the featured image of the category from ACF
								$term           = $child;
								$cat_img_obj    = get_field('category_image', 'product_cat_' . $term->term_taxonomy_id);

								if ($amount <= 2) {
									$class = 'col-xs-16';
									$cat_img_large          = $cat_img_obj['sizes']['large_1_9'];
								} else {
									$class = 'col-xs-16 col-sm-8';
									$cat_img_large          = $cat_img_obj['sizes']['small_1_5'];
								}

								if ($cat_img_obj) {
									$cat_img_large_width    = $cat_img_obj['sizes']['large_1_9-width'];
									$cat_img_large_height   = $cat_img_obj['sizes']['large_1_9-height'];
									$cat_img_large_ratio    = $cat_img_large_height / $cat_img_large_width * 100;
									$cat_img_small          = $cat_img_obj['sizes']['small_1_5'];
								} ?>

								<div class="<?php echo $class; ?>">
									<div class="img_caption">
										<?php if ($cat_img_obj) { ?>
											<img class="push20 fullWidth" data-img-lazy-mobile="<?php echo $cat_img_small; ?>" data-img-lazy="<?php echo $cat_img_large; ?>" alt="Discover Maison Apaiser Collections" style="padding-bottom: <?php echo $cat_img_large_ratio ?>%" width="<?php echo $cat_img_large_width; ?>" />
										<?php } else {
											$image = get_field('placeholder_img', 'option');
											echo '<img data-img-lazy="' . $image['sizes']['small_1_5'] . '"  /> ';
										} ?>

										<div class="caption caption-hidden optimised_for_mobile">
											<?php
											$url = get_term_link($child, $taxonomy_name);
											$url = str_replace('products-cat', $taxonomy_slug, $url);

											?>
											<a href="<?php echo $url; ?>">
												<div class="center-v-md">
													<h3 class="text-dash dash-center widget_headline italic lowerCase"><?php echo $term->name; ?></h3>
													<p>view range</p>
												</div>
											</a>

										</div>
									</div>
								</div>
							<?php }

							/**************************************************************/
							// if subcategory archive with products
							/**************************************************************/
						} else { ?>


							<?php if (have_posts()) :
								query_posts($query_string . '&posts_per_page=-1&orderby=menu_order&order=ASC');
								while (have_posts()) :
									the_post();  ?>

									<?php
									$imgID          = get_post_thumbnail_id($post->ID);
									$imgSizesMobile = wp_get_attachment_image_src($imgID, "small_1_5");

									if ($imgSizesMobile) {
										$imageMobile    = $imgSizesMobile['0'];
										$imgWidth       = $imgSizesMobile[1];
										$imgRatio       = $imgSizesMobile[2] / $imgWidth * 100;
									}

									?>

									<div class="col-sm-8 col-xs-16">
										<div class="img_caption zoomIn">
											<?php if ($imgSizesMobile) { ?>
												<img data-img-lazy="<?php echo $imageMobile; ?>" alt="Our Collections - offers a curated selection of baths, basins, vanities and showerbases, as well as a range of accessries for your bathroom" style="padding-bottom: <?php echo $imgRatio . '%'; ?>" width="<?php echo $imgWidth; ?>" />
											<?php } else {
												$image = get_field('placeholder_img', 'option');
												echo '<img data-img-lazy="' . $image['sizes']['small_1_5'] . '"  /> ';
											}
											?>

											<div class="caption caption-simple">
												<a class="clearfix" href="<?php the_permalink(); ?>">
													<div class="row rel">
														<h3 class="col-xs-10 img_headline italic lowerCase nomar text-left"><?php the_title(); ?>
														</h3>
														<div class="col-xs-6 text-right center-v caption-centered-label">
															<span class="cta_small">view product</span>
														</div>
													</div>
												</a>

											</div>
										</div>
									</div>

							<?php endwhile;
							endif; ?>
						<?php } ?>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>

-->

<?php get_footer(); ?>
