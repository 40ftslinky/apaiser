<?php
/**
 * The template for displaying the post.
 *
 * Template name: Post Archive
 *
 * @package storefront
 */


$posts_per_page = 9;

$post_count = 0;










function get_posts_from_categories($term_ids = []) {
    
	global $posts_per_page;
	
	global $post_count;
	
	if(empty($_GET['pg'])){
		
		$n = 0;
		
	} else {
		
		$n = (($_GET['pg'] - 1) * $posts_per_page);
		
	}
	
	
	// Define the query arguments
    $args = [
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'orderby' => 'date',
        'order' => 'DESC',
		'offset'         => $n,
        'tax_query' => [
            [
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $term_ids,
            ],
        ],
    ];

    // Perform the query
    $query = new WP_Query($args);

    // Check if there are posts
    if ($query->have_posts()) {
		
        while ($query->have_posts()) {
			
            $query->the_post();
			
            // Customize the output as needed
			
			$post_id =get_the_id();
			
			$post_content = get_the_content($post_id);
			
			$yoast_description = get_post_meta($post_id, '_yoast_wpseo_metadesc', true);
			
			if(!empty($yoast_description)){
				
				$excerpt = $yoast_description;
				print "<!-- excerpt=yoast_description -->";
				
			} else {
				
				$excerpt = get_custom_excerpt($post_id);
				
			}

			$link=get_the_permalink($post_id);
			
			
			$hero_subtitle = get_field('hero_subtitle', $post_id);
			
			if(empty($hero_subtitle)){
				
				$hero_subtitle = get_field('hero2_subtitle', $post_id);
				
			}
			
			if(empty($hero_subtitle)){
				
				$hero_subtitle = get_field('hero3_subtitle', $post_id);
				
			}
			

			
			
			// images 
			
			$imageUrl = get_the_post_thumbnail_url($post_id);

			if(empty($imageUrl)){
				
				$imageUrl = get_field('hero_image', $post_id);
				
				if(empty($imageUrl)){
					
					$imageUrl = get_field('hero3_image', $post_id);
					
				}
				if(empty($imageUrl)){
					
					$imageUrl = get_field('hero_background', $post_id);
					
				}
				if(empty($imageUrl)){
					
					$imageUrl = get_field('hero2_background', $post_id);
					
				}

			}
			
			
			
			if(empty($imageUrl)){
				
				//	$imageUrl = get_largest_image_url($post_id);

				if(empty($imageUrl)){
				
					global $child_themedir;
					
					$default=$child_themedir."/assets/images/placeholder.jpg";
					
					$imageUrl =$default;
				
				}
				
			}
			
			
			
			?>
			<a class="card_link" href="<?php echo $link ?>">
				<div class="card center no_border">
					<div class="card-image">
						<img src="<?php echo $imageUrl; ?>" loading="lazy"  alt="<?php get_the_title() ?>">
					</div>
					<div class="card-content align-center">
					<?php
						if(!empty($hero_subtitle)){
							?>
							<!-- <h3 class="subtitle"><?php echo $hero_subtitle; ?></h3>       -->  
							<?php
						}
					?>
						<!-- <h3>One&Only</h3> -->
						<?php echo '<h3>' . get_the_title() . '</h3>'; ?>
						<p class="center-align"><!-- excerpt-01 -->
							<?php echo $excerpt; ?>
						</p>
						<button class="button-outline pop-up-link">Discover</button>
					</div>
				</div>
			</a>
			
			<?php
        }
		
    } else {
		
        echo 'No posts found.';
		
    }

		// Reset post data
		wp_reset_postdata();
		
		
		
		
		// Count number of Posts in this Category 
		// Define the query arguments
		$args['posts_per_page'] = -1;

		// Perform the query
		$query = new WP_Query($args);

		// Return the number of posts found
	   $post_count= $query->found_posts;
	
	
		wp_reset_postdata();
	
	
}


	
	$body_class="post-list";
	
	$template_class="blog";

	get_header();

	include_once "nav.php";
	
	global $wp_query;
	
	$post_id = $wp_query->post->ID;
	
	$post_title=get_the_title($post_id);
	


	$stylesheet_directory = basename(get_stylesheet_directory());
	
	$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
	
	
	// ACF
	$title=get_the_title($post_id);
	
	$hero_title= get_field("hero_title", $post_id);
	
	$hero_subtitle= get_field("hero_subtitle", $post_id);

	$image= get_field("image", $post_id);
	

	$_cats= get_field("cat", $post_id);
	
	
	$cat = array();
	
	if(!empty($_GET['cat'])){
		
					
			$taxonomy = 'category';
			
			$slug = $_GET['cat'];
			
		
			// Get the term by its slug
			$term = get_term_by('slug', $slug, $taxonomy);

			// Check if the term was found
			if ($term) {
				$term_id =  $term->term_id;
				
				$TermName = $term->name;
				
				print "<!-- TermName=$TermName               -->";
				
				$cat[] = $term_id;
				
				
			} else {
				$term_id = 0;
			}

		
	
	}

	// post_content
	
	if(empty($hero_title)){
		
		$hero_title = $title;
		
	}
	
	$post_content = get_the_content($post_id);
	

	if(empty($image)){
		
		$default=$child_themedir."/assets/images/placeholder.jpg";
		
	} else {		
		
		$large = $image['sizes']['large'];
		
		$medium = $image['sizes']['medium_large'];
		
		$medium_large = $image['sizes']['medium_large'];
		
		$thumbnail = $image['sizes']['thumbnail'];
		
		$huge =$image['sizes']['2048x2048'];
		
		if(!empty($huge)){
			
			$image_url=$huge;
			
		} elseif(!empty($large)){
			
			$image_url=$large;
			
		} elseif(!empty($medium_large)) {
			
			$image_url=$medium_large;
			
		}elseif(!empty($medium)){
			
			$image_url=$medium;
			
		} else {
			
			$image_url=$thumbnail;
			
		}
	}
	?>

		<main>

			<!-- hero section -->
			<section class="hero projects_hero dark_grad" style="background-image: url(<?php echo $image_url; ?>);">
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


	<!-- section -->
	<!-- RECENT PROJECTS -->
			<section class="grid-projects archive">
				<?php
				
				$recent_articles = get_field("recent_articles", $post_id);
				
				
				if(!empty($TermName)){
					
					$recent_articles = $TermName;
					
				}
				
				if(empty($recent_articles)){
					
					$recent_articles = "Recent Articles";
					
				}
				
				?>
				<div class="row ">
					<div class="col align-center">
						<h2 class="center-align"><?php echo $recent_articles; ?></h2>
					</div>
				</div>
				
            <div class="row article-results-tab-wrap">
				<?php
				if(!empty($_GET['cat'])){
					
					$Cat = $_GET['cat'];
					
				} else {
					
					$Cat = 'all';
					
				}
				
				?>
                <a href="/journal/"><button class="article-results-tab-item <?php if($Cat=='all'){ echo "active";} ?>">All</button></a>
                <a href="/journal?cat=new-arrivals"><button class="article-results-tab-item <?php if($Cat=='new-arrivals'){ echo "active";} ?>">New Arrivals</button></a>
                <a href="/journal?cat=news"><button class="article-results-tab-item <?php if($Cat=='news'){ echo "active";} ?>">News</button></a>
                <a href="/journal?cat=in-the-press"><button class="article-results-tab-item <?php if($Cat=='in-the-press'){ echo "active";} ?>">Press Releases</button></a>
                <a href="/journal?cat=events-exhibitions"><button class="article-results-tab-item <?php if($Cat=='events-exhibitions'){ echo "active";} ?>">Exhibitions + Events</button></a>
                    
            </div>
				
				
		 

				<div class="row">
					
					<div class="grid-col column ">   
					
					
					
			
						<!-- 01  -->
						<?php
						
						if(empty($cat)){
							
							if(!empty($_cats)){
								
								// use the selection from the ACF group 
								
								$cat = $_cats;
								
							} else {
								
								// an empty Array will return post in all cats 
								
								$cat = array();
								
							}
						}
						

						
						// get all the posts for the matching cat 
						
						get_posts_from_categories($cat);
						
						?>



						<!-- 9 / per page default  -->
					</div>

				</div>


				<!--  TODO -->
				
				<!--
				
				
				<div class="row">
					<div class="column  justify-center align-center">
						<div class="pagination">
							<a href="" class="page previous"><span class="left_arrow">&#x2B60;</span></a> <a href="" class="page current">01</a> | <a href="" class="page">02</a> | <a href="" class="page">03</a> | <a href="" class="page">04</a> | <a href="" class="page more"><span class="right_arrow">&#x2B62;</span></a> 
						</div>
						
					</div>
				</div>
				
				
				-->
				
            <div class="row">
                <div class="column  justify-center align-center">
				<?php
				
					// PAGINATION 
					
					//number of pages (round up after division)
					
					print "<!--   posts_per_page = $posts_per_page              -->";
					
					$page_count = ceil($post_count / $posts_per_page);
					
					print "<!--   post_count = $post_count              -->";
					
					print "<!--   page_count = $page_count              -->";
					
					
					if(!isset($_GET['pg'])){
						$current = 1;
						
					} else {
						$current =$_GET['pg'];
					}
					
					$C = 0;
				
				?>
                    <div class="pagination">
					
                        <a href="" class="page previous"  data="prev" id="prev">
						
						<span class="left_arrow">&#x2B60;</span></a> 
						
						<?php 

						for ($i = 1; $i <= $page_count; $i++){
							
							if($i==$current){
								$class="page current";
							} else {
								$class="page";
							}
							
							$n = $i;
							
							$C = ( $posts_per_page * ( $i - 1 ) );
							
							$n = str_pad($n, 2, '0',STR_PAD_LEFT);	// add leading zero to numbers under 10 
							
							if(!empty($_GET['cat'])){
								
								$slug = $_GET['cat'];
								
							} else {
								
								$slug = "";
								
							}
							
							
						?>
							<a href="/journal/?cat=<?php echo $slug; ?>&pg=<?php echo $i; ?>" class="<?php echo $class; ?>" data="<?php echo $C; ?>" id="<?php echo $i; ?>"><?php echo $n; ?></a>&nbsp;|&nbsp;
						<?php
						}
						?>
						
						<a class="page more"  data="next" id="next"><span class="right_arrow">&#x2B62;</span></a> 
						
                    </div>
                    
                </div>
				
            </div>
				
				

			</section>

	<!-- /section -->

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

	
		//print_r($_GET);





		get_footer();

