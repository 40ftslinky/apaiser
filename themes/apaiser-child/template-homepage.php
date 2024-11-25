<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Essential Homepage (Front Page)
 *
 * @package storefront
 */

		$body_class="home";
		
		$template_class="home";
		
		$stylesheet_directory = basename(get_stylesheet_directory());
		
		$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
		
		get_header();
		


		


		global $wp_query;
		
		$post_id = $wp_query->post->ID;
		
		$hero_image  = get_field("hero_image", $post_id);
		
		$hero_title  = get_field("hero_title", $post_id);

		$headline = get_field("headline", $post_id);
		

	?>


    <main>

        <!-- hero section -->
        <section class="hero home_hero white_grad" style="background-image: url(<?php echo $hero_image; ?>);">
            <div class="row">
                <div class="col">
                    <div class="hero-content">

                        <h1 class="hidden"><?php echo $hero_title ?></h1>

                    </div>
                </div>
            </div>
        </section>

<!-- /section -->
<!-- section -->
		<?php
			
			$headline_credit= get_field("headline_credit", $post_id);
			$headline_image = get_field("headline_image", $post_id);
		
		
		?>
        <section class="overflow_section grey_900_bg circle_image_sect">
            <div class="row column-reverse-mob">
                <div class="col column">
                    <blockquote>
                        <p><?php echo $headline; ?></p>
                        <cite><?php echo $headline_credit; ?></cite>
                    </blockquote>
                </div>
                <div class="col column circle_image_col">
                    <div class="img_wrap bottom_overflow circle_image_wrap">
                        <img class="circle_image" src="<?php echo $headline_image; ?>" alt="<?php echo $headline; ?>">
                    </div>
                </div>
            </div>
        </section>
		<?php
			
		
			$harmony_title= get_field("harmony_with_nature_harmony_title", $post_id);
			
			$harmony_subtitle= get_field("harmony_with_nature_harmony_subtitle", $post_id);
			
			$harmony_image= get_field("harmony_with_nature_harmony_image", $post_id);

			$harmony_description= get_field("harmony_with_nature_harmony_description", $post_id);

			$harmony_button= get_field("harmony_with_nature_harmony_button", $post_id);
			
			//button_link
			$button_link= get_field("harmony_with_nature_button_link", $post_id);			
			
		?>
        <section class="overflow_section white_bg">
            <div class="row ">
                
                <div class="col column four-tenths">
                    <div class="img_wrap top_overflow">
                        <img src="<?php echo $harmony_image; ?>" alt="<?php echo $harmony_title; ?>">
                    </div>
                </div>
                <div class="col column">
                    <div class="card no_border">
                        <div class="card-content">
                            <h2 class="subtitle"><?php echo $harmony_title; ?></h2>
                            <h2><?php echo $harmony_subtitle; ?></h2>
                            <?php echo $harmony_description; ?>
							<a class="button-secondary" href="<?php echo $button_link ?>"><?php echo $harmony_button; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<!-- /section -->
<!-- section -->
		<?php
			
		
			$collections_group_collection_title= get_field("collections_group_collections_title", $post_id);
			
			$collections_group_collection_subtitle= get_field("collections_group_collections_subtitle", $post_id);
			
			$collections_group_collection_image= get_field("collections_group_collections_image", $post_id);

			$collections_group_collection_description= get_field("collections_group_collections_description", $post_id);

			$collections_group_collection_button= get_field("collections_group_collections_button", $post_id);
			
			//button_link
			$button_link= get_field("collections_group_button_link", $post_id);
		?>

        <section class="half_panel-hero collections">
            <div class="row">
                <div class="col column full-width-bg " style="background-image: url(<?php echo $collections_group_collection_image; ?>);">
                    <div class="card card-center">
                        <div class="card-content">
                            <h1><?php echo $collections_group_collection_title; ?></h1>
                            <h2 class="subtitle"><?php echo $collections_group_collection_subtitle; ?></h2>
                            <p><?php echo $collections_group_collection_description; ?></p>
                            <a class="button-secondary" href="<?php echo $button_link; ?>"><?php echo $collections_group_collection_button; ?></a>
                        </div>
                    </div>
                </div>
 				<?php
					$full_width_img= get_field("collections_group_full_width_img", $post_id);
					$full_width_img_alt= get_field("collections_group_full_width_img_alt", $post_id);
				?>           
                <div class="col column full-width-bg" >
                    <div class="img_wrap ">
                        <img src="<?php echo $full_width_img; ?>" alt="<?php echo $full_width_img_alt; ?>">
                    </div>
                </div>  

            </div>
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


<!-- section --> 
<?php

	$featured_hero_title= get_field("featured_hero_title", $post_id);
	$featured_hero_subtitle= get_field("featured_hero_subtitle", $post_id);
	$featured_hero_description= get_field("featured_hero_description", $post_id);
	
	$featured_hero_link= get_field("featured_hero_link", $post_id);
	$featured_hero_button= get_field("featured_hero_button", $post_id);
	$featured_hero_image= get_field("featured_hero_image", $post_id);	
?>   
        <section class="featured-hero full-width-bg" style="background-image: url(<?php echo $featured_hero_image; ?>);">
            <div class="row">

                
                <div class="col column empty_column" >
                    
                </div>  

                <div class="col column  " >
                    <div class="card card-center">
                        <div class="card-content ">
                            <h2 class="subtitle "><?php echo $featured_hero_title ?></h2>
                            <h1 class=""><?php echo $featured_hero_subtitle ?></h1>
                           <?php echo $featured_hero_description ?>
						   <a class="button-secondary" href="<?php echo $featured_hero_link ?>"><?php echo $featured_hero_button ?></a>
                        </div>
                    </div>
                </div>
            

            </div>
        </section>

<!-- /section -->
        
    </main>
<!-- /end main -->

	<?php

	
	
	get_footer();