<?php
/**
 * The template for displaying the post.
 *
 * Template name: Single Post
 *
 * @package storefront
 */


		
	$body_class="post";
	$template_class="post";
	

	get_header();

	include_once "nav.php";
	
	global $wp_query;
	
	$post_id = $wp_query->post->ID;
	
	$post_title=get_the_title($post_id);
	
	$post_content = get_the_content($post_id);
	
	
	$stylesheet_directory = basename(get_stylesheet_directory());
	
	$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
	
	// ACF
	/*
	$post_hero_image = get_field('post_hero_image', $post_id);
	
	
*/
	$hero_visible = get_field('hero_visible', $post_id);
	$hero_background = get_field('hero_background', $post_id);
	
	
	$hero_image = get_field('hero_image', $post_id);
	
	

	
	
	
		
	$hero_alt = get_field('hero_alt', $post_id);
	$hero_title = get_field('hero_title', $post_id);
	$hero_subtitle = get_field('hero_subtitle', $post_id);
	
	if(empty($hero_title)){
		$hero_title = $post_title;
	}
	if(empty($hero_image)){
		$hero_image=getFeaturedImage($post_id);
	}
	if(empty($hero_background)){
		$hero_background =$child_themedir."/assets/projects/thumbs/placeholder.jpg";
	}	
	?>
 <main>
 <?php
 
	$hero_count = 0;
 
 ?>

<!-- hero section v01-->
		<?php
		if($hero_visible){
			?>
			<section class="half_panel-hero">
				<div class="row">                
					<?php
					if(!empty($hero_image)){
						if(empty($hero_alt)){
							$hero_alt = $hero_title;
						}
						?>
						<div class="col column full-width-bg" >
							<div class="img_wrap ">
								<img src="<?php echo $hero_image; ?>" alt="<?php echo $hero_alt; ?>">
							</div>
						</div>  
						<?php
					}
					?>
					<div class="col column full-width-bg " style="background-image: url(<?php echo $hero_background; ?>);">
						<div class="card card-center">
							<div class="card-content">
								<h1><?php echo $hero_title ?></h1>
								<?php
								
								if(!empty($hero_subtitle)){
									?>
									<h2 class="subtitle"><?php echo $hero_subtitle ?></h2>
									<?php
								}
								?>
							</div>
						</div>
					</div>

				</div>
			</section>
			<?php
			$hero_count++;
		} 
		?>
<!-- /section -->

<?php
	$hero_visible = get_field('hero2_visible', $post_id);
	$hero_background = get_field('hero2_background', $post_id);

	$hero_title = get_field('hero2_title', $post_id);
	$hero_subtitle = get_field('hero2_subtitle', $post_id);
	if(empty($hero_title)){
		$hero_title = $post_title;
	}
	if(empty($hero_background)){
		$hero_background =$child_themedir."/assets/projects/thumbs/placeholder.jpg";
	}		
?>
<?php
		if($hero_visible){
			?>
			<!-- hero section v02 -->

				<section class="hero projects_hero dark_grad" style="background-image: url(<?php echo $hero_background; ?>);">
					<div class="row">
						<div class="col">
							<div class="hero-content">
								<?php
								if(!empty($hero_subtitle)){
									?>
									<h1 class="subtitle"><?php echo $hero_subtitle; ?></h1>
									<?php
								}
								?>
								<h1 class=""><?php echo $hero_title; ?></h1>
							</div>
						</div>
					</div>
				</section>

			<!-- /section -->
		<?php
		$hero_count++;
}
?>


<?php

	$hero_visible = get_field('hero3_visible', $post_id);
	
	$hero_image = get_field('hero3_image', $post_id);
	
	$hero_alt = get_field('hero3_alt', $post_id);
	
	$hero_title = get_field('hero3_title', $post_id);
	
	$hero_subtitle = get_field('hero3_subtitle', $post_id);
	
	if(empty($hero_title)){
		
		$hero_title = $post_title;
		
	}
	
	if(empty($hero_alt)){
		
		$hero_alt = $post_title;
		
	}	
	
	if(empty($hero_image)){
		
		$hero_image=getFeaturedImage($post_id);
		
	}
	
	if(empty($hero_image)){
	//	$hero_image =$child_themedir."/assets/projects/thumbs/placeholder.jpg";
	}		
?>
<?php
		if($hero_visible){
			?>
		<!-- hero section v03 -->

				<section class="half_panel-hero" >
					<div class="row">
						<?php
						if(!empty($hero_image)){
							
							?>
						<div class="col column">
							<div class="img_wrap ">
								<img src="<?php echo $hero_image; ?>" alt="<?php echo $hero_alt; ?>">
							</div>
						</div>
						<?php
						}
						?>
						<div class="col column">
							<div class="hero-content">             
						<?php
							if(!empty($hero_subtitle)){
							
								?>
								<h1 class="subtitle"><?php echo $hero_subtitle; ?></h1>
								<?php
							}
						?>								
								<h1 class="center"><?php echo $hero_title; ?></h1>
							</div>
						</div>
					</div>
				</section>

		<!-- /section -->
		<?php
		$hero_count++;
		}
?>


		<!--  POST CONTENT -->
		<?php
		
		$post_content = get_the_content($post_id);
		
		$post_content = clean_up_old_post($post_content);
		
		if(!empty($post_content)){
		
			if($hero_count==0 && !empty($post_title)){
				
				
				$hero_image = get_field('hero_image', $post_id);
				
				if(empty($hero_image)){
				
					$hero_image = get_field('hero3_image', $post_id);
				
				}
							


				if(empty($hero_image)){
					$hero_image = get_field('hero2_background', $post_id);
				}
				
				if(empty($hero_image)){
					$hero_image = getFeaturedImage($post_id);
				}
				
				if(empty($hero_image)){
					//	$hero_image = get_largest_image_url($post_id);
				}
				
				
				if(is_array($hero_image)){
					
					
					print_r($hero_image);
					
				}


				$subTitle = get_custom_excerpt($post_id);
				
				
				
				?>
					<section class="hero projects_hero legacy_hero"  style="background-image: url(<?php echo $hero_image; ?>);">
					
						<div class="row">
						
							<div class="col">
							
								<div class="hero-content">
								
									<h1 class=""><?php echo $post_title; ?></h1>
									<h1 class="subtitle"><?php echo $subTitle ?></h1>
									
								</div>
								
							</div>
						</div>
					</section>
				<?php
				
			}
			
			?>
			<section class="legacy_post" style="">
				<div class="row">
					<div class="col align-center"><div class="content">
					<?php
						echo $post_content;
					?>				
					</div></div>
				</div>
			</section>
			<?php
		}
		?>



<!-- section text-left / img-right -->
<?php


$cols = get_field('cols', $post_id);
$visible =$cols['visible'];

if($visible){

	foreach($cols['row'] as $row){
		
				$align = $row['align'];
				$visible = $row['visible'];
				$image = $row['image'];
				$title = $row['title'];
				$cite = $row['cite'];
				$text = $row['text'];
				$alt = $row['alt'];
				$padding = $row['padding'];
				if($padding){
					$class = "half_panel-img_padding";
				} else {
					$class = "half_panel";
				}
				if(empty($alt)){
					$alt=$title;
				}

				if($visible){
					if($align=='right'){
							?>
							<section class="<?php echo $class ?>">
								<div class="row">
									<div class="col column " >
										<div class="text_wrap">
											<blockquote>
												<p><?php echo $title; ?></p>
												<?php
												if(!empty($cite)){
												?>
													<cite><?php echo $cite; ?></cite>
												<?php
												}
												?>											
											</blockquote>
												<?php
												if(!empty($text)){
													echo $text;  
												}
												?>	
										</div>
									</div>
									<?php 
										if(!empty($image)){
										?>
										<div class="col column " >
											<div class="img_wrap ">
												<img class="" src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
											</div>
										</div>  
										<?php
									}
									?>
								</div>
							</section>
							<!-- /section -->
				<?php
					} else {
					?>
							<!-- section  image left / text right -->
									<section class="<?php echo $class ?>">
										<div class="row ">
											<?php 
												if(!empty($image)){
											?>									
											<div class="col column">
												<div class="img_wrap ">
													<img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
												</div>
											</div>
											<?php
											}
											?>											
										
											<div class="col column">
												<div class="text_wrap">
											<blockquote>
												<p><?php echo $title; ?></p>
												<?php
												if(!empty($cite)){
												?>
													<cite><?php echo $cite; ?></cite>
												<?php
												}
												?>											
												</blockquote>
												<?php
												if(!empty($text)){
													echo $text;  
												}
												?>	
												</div>
											</div>
										</div>
									</section>
							<!-- /section -->
							<?php
					}	
				}			
			?>

			<?php

	}	// end foreach 

}
?>



<!-- section -->
<?php

$cols = get_field('cols3', $post_id);
$visible =$cols['visible'];


if($visible){
	foreach($cols['row'] as $row){

		$image_1 = $row['image_1'];
		$alt_1 = $row['alt_1'];
		$image_2 = $row['image_2'];
		$alt_2 = $row['alt_2'];
		$image_3 = $row['image_3'];
		$alt_3 = $row['alt_3'];
		?>
		<section class="three_col">
			<div class="row">
				<?php
				if(!empty($image_1)){
				?>
				<div class="col column-third">
					<div class="img_wrap">
						<img src="<?php echo $image_1; ?>" alt="<?php echo $alt_1; ?>" />
					</div>
				</div>
				<?php
				}
				?>
				<?php
				if(!empty($image_2)){
				?>			
				<div class="col column-third">
					<div class="img_wrap">
						<img src="<?php echo $image_2; ?>" alt="<?php echo $alt_2; ?>" />
					</div>
				</div>
				<?php
				}
				?>
				<?php
				if(!empty($image_3)){
				?>			
				<div class="col column-third">
					<div class="img_wrap">
						<img src="<?php echo $image_3; ?>" alt="<?php echo $alt_3; ?>" />
					</div>
				</div>
				<?php
				}
				?>			
			</div>
		</section>
		<?php

	}
}

?>

<!-- /section -->


<?php
$cols = get_field('cols2', $post_id);
$visible =$cols['visible'];

if($visible){
	foreach($cols['row'] as $row){
		

		$align = $row['align'];
		if(empty($align)){
			$align='right';
		}
		$visible = $row['visible'];
		$image = $row['image'];
		$title = $row['title'];
		$cite = $row['cite'];
		$text = $row['text'];
		$text_2= $row['text_2'];
		$alt = $row['alt'];
		$padding = $row['padding'];
		if($padding){
			$class = "half_panel-img_padding";
			
		} else {
			$class = "half_panel";
		}
		if(empty($alt)){
			$alt=$title;
		}

		if($visible){
		
		
				?>
				<!-- section text left / image right-->

						<section class="<?php echo $class ?>">
							<div class="row ">
							
								<?php
								if(($align=='left')){
									if(!empty($image)){
									?>
									<div class="col column">
										<div class="img_wrap ">
											<img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
										</div>
									</div>
									<?php
									}
								}
								?>
							
							

								<div class="col column">
									<div class="text_wrap">
										<?php
										if(!empty($title)){
											echo "<blockquote><p>";
											echo $title ;
											echo "</p>";
											if(!empty($cite)){
												echo "<cite>".$cite."</cite>";
											}
											echo "</blockquote>";
										}
										
										if(!empty($text)){
											echo $text;
										}
										
										?>
									</div>
									<?php
									
									if(!empty($text_2)){
										?>
										<div class="text_wrap">
											<?php
												echo $text_2;
											?>
										</div>
										<?php
									}
									?>
								</div>
								<?php
								if($align=='right'){
									if(!empty($image)){
									?>
									<div class="col column">
										<div class="img_wrap ">
											<img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
										</div>
									</div>
									<?php
									}
								}
								?>
								

							</div>
						</section>

				<!-- /section -->
				<?php
		}
	}	// end foreacjh
	
}
	?>




<?php
$visible = get_field('fw_image1_visible', $post_id);
$image = get_field('fw_image1_image', $post_id);
$alt = get_field('fw_image1_alt', $post_id);
$padding = get_field('fw_image1_padding', $post_id);
if($padding){
	$class='full-width-img-padding';
} else {
	$class='full-width-img';
}

if($visible){
?>
		<!-- section -->
        <section class="<?php echo $class; ?>"><div class="row">
            <div class="column">
                <div class="img_wrap"><img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">        </img></div>
            </div>
        </div></section>

<!-- /section -->
<?php
}
?>


<?php

$visible = get_field('half_panel_visible', $post_id);

$text = get_field('half_panel_text', $post_id);

$align = get_field('half_panel_align', $post_id);

if($visible){
	
	if(!empty($text)){
		
				if($align=='right'){
					
				?>
					<section class="half_panel ">
						<div class="row align-end">
							<div class="col column">
							</div>
							<div class="col column">
								<div class="text_wrap">
									<?php
										echo $text;
									?>
								</div>
							</div>
						</div>
					</section>
			<?php
				} else {
				?>
				<section class="half_panel ">
					<div class="row align-end">
						<div class="col column">
							<div class="text_wrap">
							<?php
								echo $text;
							?>
							</div>
						</div>
					</div>
				</section>
				<?php
				}
		}
	}

?>




<?php

	$visible = get_field('fw_image2_visible', $post_id);

	$image = get_field('fw_image2_image', $post_id);

	$alt = get_field('fw_image2_alt', $post_id);

	$padding = get_field('fw_image2_padding', $post_id);

	if($padding){
		
		$class='full-width-img-padding';
		
	} else {
		
		$class='full-width-img';
		
	}

if($visible){
?>
		<!-- section -->
        <section class="<?php echo $class; ?>"><div class="row">
            <div class="column">
                <div class="img_wrap"><img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">        </img></div>
            </div>
        </div></section>

<!-- /section -->
<?php
}
?>


<?php
$visible = get_field('half_panel2_visible', $post_id);
$text = get_field('half_panel2_text', $post_id);
$align = get_field('half_panel2_align', $post_id);
	if($visible){
		if(!empty($text)){
				if($align=='right'){
				?>
					<section class="half_panel ">
						<div class="row align-end">
							<div class="col column">
							</div>
							<div class="col column">
								<div class="text_wrap">
									<?php
										echo $text;
									?>
								</div>
							</div>
						</div>
					</section>
			<?php
				} else {
				?>
				<section class="half_panel ">
					<div class="row align-end">
						<div class="col column">
							<div class="text_wrap">
							<?php
								echo $text;
							?>
							</div>
						</div>
					</div>
				</section>
				<?php
				}
		}
	}

?>



<!-- section -->



<!-- /section -->
	<?php
	
	
		include_once "other_projects_section.php";
	
	
	?>


        
    </main>
<!-- /end main -->

	
	<?php







		get_footer();

