<?php
/**
 * The template for displaying the post.
 *
 * Template name: Products Archive (Products)
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
	
	
	$Heroes = array();
	
	
	// ACF

	if (have_rows('hero')) {
		
					
					while (have_rows('hero')) :
					
							the_row();	
							
							$image = get_sub_field('image');
							
							$link = get_sub_field('link');
							
							$title = get_sub_field('title');
							
							$subtitle = get_sub_field('subtitle');
						
							//	print_r($image);

							$Heroes[] = array($image, $link, $title, $subtitle);
						
						endwhile;
		
		
	}
	
	
	?>

    <main >



<!-- triage hero section (double half panel) -->

        <section class="double half_panel-hero">
            <div class="row">     
					<?php
					foreach($Heroes as $Hero){
						//$image, $link, $title, $subtitle
						
						/*

						Array ( 
						[ID] => 21940 
						[id] => 21940 
						[title] => projects_residential_hero 
						[filename] => projects_residential_hero.jpg 
						[filesize] => 190067 
						[url] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/projects_residential_hero.jpg 
						[link] => https://staging.apaiser.screenrage.com.au/projects-residential/projects_residential_hero/ 
						[alt] => [author] => 2 [description] => [caption] => [name] => projects_residential_hero [status] => inherit [uploaded_to] => 19863 [date] => 2024-11-10 23:29:26 [modified] => 2024-11-10 23:29:26 [menu_order] => 0 [mime_type] => image/jpeg [type] => image [subtype] => jpeg [icon] => https://staging.apaiser.screenrage.com.au/wp-includes/images/media/default.png [width] => 1920 [height] => 992 [sizes] => Array ( [thumbnail] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/projects_residential_hero-150x150.jpg [thumbnail-width] => 150 [thumbnail-height] => 150 [medium] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/projects_residential_hero-300x155.jpg [medium-width] => 300 [medium-height] => 155 [medium_large] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/projects_residential_hero-768x397.jpg [medium_large-width] => 768 [medium_large-height] => 397 [large] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/projects_residential_hero-1024x529.jpg [large-width] => 1024 [large-height] => 529 [1536x1536] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/projects_residential_hero-1536x794.jpg [1536x1536-width] => 1536 [1536x1536-height] => 794 [2048x2048] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/projects_residential_hero.jpg [2048x2048-width] => 1920 [2048x2048-height] => 992 ) )
						*/
						
						$image_url = $Hero[0]['url'];
						
						$image_large = $Hero[0]['sizes']['large'];
						
						$image_medium = $Hero[0]['sizes']['medium'];
						
						$thumbnail = $Hero[0]['sizes']['thumbnail'];
						
						$link = $Hero[1];
						
						$title = $Hero[2];
						
						$sub = $Hero[3];
		
						
						?>			
						<div class="col column full-width-bg " style="background-image: url(<?php echo $image_url ?>);">
							<a href="<?php echo $link ?>">

								<div class="card card-center">
									<div class="card-content">
										<h1><?php echo $title; ?></h1>
										<h2 class="subtitle"><?php echo $sub; ?></h2>
									</div>
								</div>
							</a>

						</div>  
						<?php
					}
					
					?>
                    <!-- 
					
                    <div class="col column full-width-bg " style="background-image: url(assets/projects/heros/projects_residential_hero.jpg);">
                        <a href="projects-residential.html">
                            <div class="card card-center">
                                <div class="card-content">
                                    <h1>Residential</h1>
                                    <h2 class="subtitle">Projects</h2>
                                </div>
                            </div>
                        </a>

                    </div>
					
					-->
            </div>
        </section>

<!-- /section -->


        







    </main>
<!-- /end main -->
	
	
	
	<?php







		get_footer();

