<?php
/**
 * The template for displaying the about page.
 *
 * Template name: Sustainability page
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
		$hero_image= get_field("hero_image", $post_id);
		$hero_title= get_field("hero_title", $post_id);
	?>
    <main>
        <!-- hero section -->
        <section class="hero sustainability_hero dark_grad" style="background-image: url(<?php echo $hero_image; ?>);">
            <div class="row">
                <div class="col">
                    <div class="hero-content">
                        <h1 class="subheading hidden"><?php echo $hero_title; ?></h1>
                    </div>
                </div>
            </div>
        </section>
		<!-- /section -->


<!-- section -->
<?php
	$section2_title= get_field("section2_title", $post_id);
	$section2_image= get_field("section2_image", $post_id);
	$section2_alt= get_field("section2_alt", $post_id);
	$section2_paragraph= get_field("section2_paragraph", $post_id);
?>
<section class="half_panel-img_padding">
    <div class="row ">

        <div class="col column">
            <div class="img_wrap ">
                <img src="<?php echo $section2_image; ?>" alt="<?php echo $section2_alt; ?>">
            </div>
        </div>

        <div class="col column">
            <div class="text_wrap">
            <blockquote><?php echo $section2_title; ?></blockquote>
            <?php echo $section2_paragraph; ?>
			</div>
        </div>
    </div>
</section>

<!-- /section -->

<!-- section --> 
<?php
	$section3_image= get_field("section3_image", $post_id);
	$section3_alt= get_field("section3_alt", $post_id);
	$section3_title= get_field("section3_title", $post_id);
	$section3_subtitle= get_field("section3_subtitle", $post_id);
?>
<section class="featured-hero full-width-bg grey_800_bg" style="">
    <div class="row">

        
        <div class="col column empty_column" >
            <div class="img_wrap">
                <img src="<?php echo $section3_image; ?>" alt="<?php echo $section3_alt; ?>" />
            </div>

        </div>  

        <div class="col column  " >
            <div class="card card-center">
                <div class="card-content ">
                    <h1 class=""><?php echo $section3_title; ?></h1>
                    <h2 class="subtitle "><?php echo $section3_subtitle; ?></h2>

                </div>
            </div>
        </div>
    

    </div>
</section>

<!-- /section -->


<!-- section -->

<section class="half_panel-img_padding">
    <div class="row ">
		<?php
		$section4_title= get_field("section4_title", $post_id);
		$section4_subtitle= get_field("section4_subtitle", $post_id);
		$section4_image= get_field("section4_image", $post_id);
		$section4_alt= get_field("section4_alt", $post_id);
		?>
        <div class="col column">            
            <div class="text_wrap">
                <blockquote>
                   <?php echo $section4_title ?>
                </blockquote>
            </div>
            <div class="text_wrap"><?php echo $section4_subtitle ?></div>
        </div>
        <div class="col column">
            <div class="img_wrap ">
                <img src="<?php echo $section4_image; ?>" alt="<?php echo $section4_alt; ?>">
            </div>
        </div>
    </div>
</section>


<!-- /section -->

<!-- fullwidth feature hero section -->
<?php
		$section5_title= get_field("section5_title", $post_id);
		$section5_image= get_field("section5_image", $post_id);
		
		?>
<section class="hero sustainability_feature dark_grad" style="background-image: url(<?php echo $section5_image; ?>);">
    <div class="row">
        <div class="col">
            <div class="hero-content">
                <h1><?php echo $section5_title; ?></h1>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p> -->
            </div>
        </div>
    </div>
</section>

<!-- / section -->

<!-- section -->
<?php
$section6_title= get_field("section6_title", $post_id);
$section6_subtitle= get_field("section6_subtitle", $post_id);
?>
<section class="half_panel ">
    <div class="row align-end">
        <div class="col column">
            <div class="text_wrap">
                <blockquote><?php echo $section6_title; ?></blockquote>
            </div>
        </div>
        <div class="col column">
            <div class="text_wrap"><?php echo $section6_subtitle; ?></div>
        </div>
    </div>
</section>

<!-- /section -->

<!-- section -->
<?php
$section7_image= get_field("section7_image", $post_id);
$section7_title= get_field("section7_title", $post_id);
$section7_text= get_field("section7_text", $post_id);

?>
<section class="fullwidth-feature dark_grad" style="background:url('<?php echo $section7_image; ?>')">
    <div class="row">
		
        <div class="col column " >
            <div class="text_wrap">
                <h2 class="no_case white"><?php echo $section7_title; ?></h2>
				
				<?php
					foreach($section7_text as $text){
						?>
						<h4 class="white"><?php echo $text['item']; ?></h4>
						<?php
					}
				?>
				
				
                <!-- <h4 class="white">ISO 9001/14001 Production</h4>
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
	
