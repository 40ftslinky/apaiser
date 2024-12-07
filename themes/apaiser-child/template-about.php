<?php
/**
 * The template for displaying the about page.
 *
 * Template name: About page
 *
 * @package storefront
 */

		$body_class="about";
		
		$template_class="about";
		
		$stylesheet_directory = basename(get_stylesheet_directory());
		
		$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
		
		get_header();


		global $wp_query;
		$post_id = $wp_query->post->ID;


	$hero_title= get_field("hero_title", $post_id);
	$hero_hidden_title= get_field("hero_hidden_title", $post_id);
	$hero_image= get_field("hero_image", $post_id);

	?>

    <main>

        <!-- hero section -->
        <section class="hero about_hero dark_grad" style="background-image: url(<?php echo $hero_image; ?>);">
            <div class="row">
                <div class="col">
                    <div class="hero-content">

                        <h1 class="subheading hidden"><?php echo $hero_title; ?></h1>
                        <h1 class="hidden"><?php echo $hero_hidden_title; ?></h1>

                    </div>
                </div>
            </div>
        </section>

<!-- /section -->


<!-- section -->
<?php
	$welcome_blockquote= get_field("welcome_blockquote", $post_id);
	$welcome_paragraph= get_field("welcome_paragraph", $post_id);
?>
<section id="our-story" class="half_panel grey_900_bg">
    <div class="row align-end">
        <div class="col column">
            <div class="text_wrap">
                <blockquote><?php echo $welcome_blockquote; ?></blockquote>
            </div>
        </div>
        <div class="col column">
            <div class="text_wrap"><?php echo $welcome_paragraph; ?></div>
        </div>
    </div>
</section>


<!-- /section -->

<!-- section -->
<?php
	$section3_blockquote= get_field("section3_blockquote", $post_id);
	$section3_paragraph= get_field("section3_paragraph", $post_id);
	$section3_image= get_field("section3_image", $post_id);
	$section3_image_description_alt_tag= get_field("section3_image_description_alt_tag", $post_id);
	$section3_full_width_image= get_field("section3_full_width_image", $post_id);
	$section3_full_width_image_alt_tag= get_field("section3_full_width_image_alt_tag", $post_id);
?>
<section id="our-atelier" class="half_panel-img_padding">
    <div class="row ">

        <div class="col column">
            <div class="img_wrap ">
                <img src="<?php echo $section3_image; ?>" alt="<?php echo $section3_image_description_alt_tag; ?>">
            </div>
        </div>

        <div class="col column">
            <div class="text_wrap">

				<blockquote>
					<?php echo $section3_blockquote; ?>
				</blockquote>
               <?php echo $section3_paragraph; ?>
			   </div>
        </div>

    </div>
</section>

<!-- /section -->


<!-- section -->


<section class="full-width-img">
    <div class="row">
        <div class="column">
            <div class="img_wrap"><img src="<?php echo $section3_full_width_image; ?>" alt="<?php echo $section3_full_width_image_alt_tag; ?>">        </img></div>
        </div>
    </div>
</section> 


<!-- /section -->

<!-- section -->
<?php
	$section4_paragraph1= get_field("section4_paragraph1", $post_id);
	$section4_paragraph2= get_field("section4_paragraph2", $post_id);
	$section4_image= get_field("section4_image", $post_id);
	$section4_image_alt= get_field("section4_image_alt", $post_id);
?>
<section id="apaisermarble" class="half_panel-img_padding">
    <div class="row ">

        <div class="col column">            
            <div class="text_wrap">
				<?php echo $section4_paragraph1; ?>
		   </div>
            <div class="text_wrap">
				<?php echo $section4_paragraph2; ?>
			</div>
        </div>

        <div class="col column">
            <div class="img_wrap padding-left-nil">
                <img src="<?php echo $section4_image; ?>" alt="<?php echo $section4_image_alt; ?>">
            </div>
        </div>

    </div>
</section>


<!-- /section -->


<!-- section -->
<?php
	// image
	// 
	$section5_image= get_field("section5_image", $post_id);
	// image_alt
	$section5_image_alt= get_field("section5_image_alt", $post_id);
	// hidden_text
	$section5_hidden_text= get_field("section5_hidden_text", $post_id);
	
?>
<!-- 
<section class="banner_section grey_900_bg">
    <div class="row ">

        <div class="col column" >
            <div class="banner-content">

                <div class="img_wrap">
                    <img src="<?php echo $section5_image; ?>" alt="<?php echo $section5_image_alt; ?>">
                </div>
                
                <h1 class="hidden"><?php echo $section5_hidden_text; ?></h1>
            </div>
        </div>
    </div>
</section> -->

<!-- /section -->

<!-- section -->
<?php
	$section5_large_image= get_field("section5_large_image", $post_id);
	$section5_large_image_alt= get_field("section5_large_image_alt", $post_id);
	$section5_blockquote= get_field("section5_blockquote", $post_id);
	$section5_paragraph= get_field("section5_paragraph", $post_id);
?>
<section id="globalbrand" class="half_panel-img_padding grey_900_bg">
    <div class="row">

        <div class="col column " >
            <!-- <div class="column-content" style="background-image: url(assets/about/designed_in_australia_lrg.jpg);"></div> -->
            <div class="img_wrap padding-right-nil">
                <img class="object-position-right" src="<?php echo $section5_large_image; ?>" alt="<?php echo $section5_large_image_alt; ?>">
            </div>
        </div>  
        <div class="col column " >
            <div class="text_wrap">
                <blockquote>
                   <?php echo $section5_blockquote; ?>
                </blockquote>
				<?php echo $section5_paragraph; ?>
            </div>
        </div>
    
    </div>
</section>

<!-- /section -->

<!-- section -->
<?php
$section6_image= get_field("section6_image", $post_id);
$section6_title= get_field("section6_title", $post_id);
$section6_text= get_field("section6_text", $post_id);
?>
<section id="earth" class="fullwidth-feature dark_grad" style="background:url('<?php echo $section6_image; ?>')">
    <div class="row">

        <div class="col column " >
            <div class="text_wrap">
                <h2 class="no_case white"><?php echo $section6_title; ?></h2>
				<?php
					foreach($section6_text as $text){
						?>
						<h4 class="white"><?php echo $text['item']; ?></h4>
						<?php
					}
				?>
               <!--
			   <h4 class="white">Durable and resurfaceable</h4>
                <h4 class="white">Ethically sourced sustainable marble</h4>
                <h4 class="white">100% recyclable</h4>
                <h4 class="white">Low emission supply chain</h4>
                <h4 class="white">Marble is a natural surface</h4>
                <h4 class="white">Naturally low-silica</h4>
				-->
            </div>
        </div>              

    </div>
</section>

<!-- /section -->
<?php
	$homepageId = getHomepagePostId();
	
	$range_group_title= get_field("range_group_title", $homepageId);
	$full_width_img_alt= get_field("full_width_img_alt", $homepageId);

	$ranges = get_field('range_group_range', $homepageId);
	
?>
<!-- section -->
<!-- RANGE CAROUSEL -->
        <section class="carousel_sect range_sect">
            <div class="row ">
                <div class="col align-center">
                    <h2 class="center-align"><?php echo $range_group_title ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col column range ">                        
                    <div class="carousel ">

						<?php

						foreach($ranges as $row){
						?>
                        <div class="carousel-cell column one-third">
                            <div class="card center no_border">
                                <div class="card-image">
                                    <img src="<?php echo $row['range_image']; ?>" alt="<?php echo $row['range_name'] ?>">
                                </div>
                                <div class="card-content align-center">                             
                                    <h3><?php echo $row['range_name'] ?></h3>
                                    <?php echo $row['range_description'] ?>
                                    <a class="button-outline" href="<?php echo $row['range_link'] ?>"><?php echo $row['range_button'] ?></a>
                                </div>
                            </div>
                        </div>
						<?php
						}
						?>						
                      
                        
                    </div>
                </div>
            </div>

        </section>

	<!-- /section -->

        
    </main>
<!-- /end main -->




	<?php

	
	
	get_footer();
	
