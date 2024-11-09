<?php
/**
 * The template for displaying the about page.
 *
 * Template name: Customisation page
 *
 * @package storefront
 */

		$body_class="customisation";
		
		$template_class="customisation";
		
		$stylesheet_directory = basename(get_stylesheet_directory());
		
		$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
		get_header();
		global $wp_query;
		$post_id = $wp_query->post->ID;
		// ACF
		$hero_image= get_field("hero_image", $post_id);
		$hero_hidden_text_1= get_field("hero_hidden_text_1", $post_id);
		$hero_hidden_text_2= get_field("hero_hidden_text_2", $post_id);
	?>
    <main>
        <!-- hero section -->
        <section class="hero customisation_hero dark_grad" style="background-image: url(<?php echo $hero_image; ?>);">
            <div class="row">
                <div class="col">
                    <div class="hero-content">

                        <h1 class="subheading hidden"><?php echo $hero_hidden_text_1; ?></h1>
                        <h1 class="hidden"><?php echo $hero_hidden_text_2; ?></h1>
                    </div>
                </div>
            </div>
        </section>

<!-- /section -->

<!-- section -->

<section class="half_panel-img_padding secondary_bg">
    <div class="row ">

        <div class="col column">

            <div class="text_wrap">
                <?php
				$section2_title= get_field("section2_title", $post_id);
				$section2_cite= get_field("section2_cite", $post_id);
				$section2_blockquote= get_field("section2_blockquote", $post_id);
				//blockquote
				?>
                <h2><?php echo $section2_title ?></h2>
                <cite><?php echo $section2_cite ?></cite>
                <blockquote><?php echo $section2_blockquote ?></blockquote>
            </div>
        </div>

        <div class="col column">
			<?php
				$section2_image= get_field("section2_image", $post_id);
				$section2_alt_tag= get_field("section2_alt_tag", $post_id);
				$section2_paragraph= get_field("section2_paragraph", $post_id);
				$section2_link= get_field("section2_link", $post_id);
				$section2_button= get_field("section2_button", $post_id);
			?>
            <div class="img_wrap ">
                <img src="<?php echo $section2_image; ?>" alt="<?php echo $section2_alt_tag; ?>">
            </div>
            <div class="text_wrap align-start">
                <?php echo $section2_paragraph ?>
				<a class="button-secondary" href="<?php echo $section2_link ?>"><?php echo $section2_button ?></a>
            </div>
        </div>
		
    </div>
</section>

<!-- /section -->

<!-- section -->

<section class="half_panel-img_padding">
    <div class="row ">
		<?php
		$section3_image= get_field("section3_image", $post_id);
		$section3_alt_tag= get_field("section3_alt_tag", $post_id);
		$section3_blockquote= get_field("section3_blockquote", $post_id);
		$section3_paragraph= get_field("section3_paragraph", $post_id);
		?>
        <div class="col column">
            <div class="img_wrap ">
                <img src="<?php echo $section3_image; ?>" alt="<?php echo $section3_alt_tag; ?>">
            </div>
        </div>

        <div class="col column">            
            <div class="text_wrap">
                <blockquote>
                   <?php echo $section3_blockquote; ?>
                </blockquote>
            </div>
            <div class="text_wrap"><?php echo $section3_paragraph; ?></div>
        </div>

    </div>
</section>

<!-- /section -->

<!-- section -->
<?php
	$section3_full_width_image= get_field("section3_full_width_image", $post_id);
	$section3_alt_tag_2= get_field("section3_alt_tag_2", $post_id);
?>
<section class="full-width-img"><div class="row">
    <div class="column">
        <div class="img_wrap"><img src="<?php echo $section3_full_width_image; ?>" alt="<?php echo $section3_alt_tag_2; ?>">        </img></div>
    </div>
</div></section>
<!-- /section -->


<!-- section -->
<!-- RECENT PROJECTS -->
<section class="grid-projects archive">
	<?php
	$process_title= get_field("process_title", $post_id);
	$process_cards= get_field("process_cards", $post_id);
	?>
    <div class="row ">
        <div class="col align-center">
            <h2 class="center-align"><?php echo $process_title ?></h2>
        </div>
    </div>

    <div class="row">
        
        <div class="grid-col column ">   
			<?php
			foreach($process_cards as $card){
			?>
				<!-- 01  -->
				<a class="card_link" href="<?php echo $card['link'] ?>">
					<div class="card align-center no_border">
						<div class="card-image">
							<img src="<?php echo $card['image'] ?>" alt="<?php echo $card['alt'] ?>">
						</div>
						<div class="card-content align-center">
							<h3><?php echo $card['title'] ?></h3>
							<p class="center-align"><?php echo $card['text'] ?></p>
						</div>
					</div>
				</a>
			<?php
			}
			?>

        </div>

    </div>

</section>

<!-- /section -->

<!-- section --> 
<?php
$palette_image= get_field("palette_image_1", $post_id);
$palette_alt= get_field("palette_alt_1", $post_id);

$palette_image2= get_field("palette_image_2", $post_id);
$palette_alt2= get_field("palette_alt_2", $post_id);
$hidden_text =get_field("palette_hidden_text", $post_id);
?>
<section class="featured-hero full-width-bg palettes" style="">
    <div class="row">

        
        <div class="col column" >
            <div class="img_wrap">
                <img src="<?php echo $palette_image; ?>" alt="<?php echo $palette_alt; ?>" />
            </div>

        </div>  

        <div class="col column  primary_bg" >
            
            <div class="hero-content">
                <div class="img_wrap">
                    <img src="<?php echo $palette_image2; ?>" alt="<?php echo $palette_alt2; ?>" />
                </div>
                <h1 class="hidden"><?php echo $hidden_text ?></h1>
            </div>
			<?php
			$palette_paragraph =get_field("palette_paragraph", $post_id);
			$palette_button =get_field("palette_button", $post_id);
			$palette_link =get_field("palette_link", $post_id);
			?>
            <div class="text_wrap align-center">
                <p class="white center"><?php echo $palette_paragraph ?></p>
                <a class="button-rev-outline" href="<?php echo $palette_link ?>"><?php echo $palette_button ?></a>

            </div>
                
        </div>
    

    </div>
</section>

<!-- /section -->
	<?php
	$projects_title= get_field("projects_title", $post_id);
	$cards= get_field("projects_cards", $post_id);
	?>

<!-- section -->
<!-- RECENT PROJECTS -->
<section class="grid-projects archive">

    <div class="row ">
        <div class="col align-center">
            <h2 class="center-align"><?php echo $projects_title ?></h2>
        </div>
    </div>


    <div class="row">
        
        <div class="grid-col column ">   
			<?php
				foreach($cards as $card){
				?>
				<!-- 01  -->
				<a class="card_link" href="<?php echo $card['link'] ?>">
					<div class="card center no_border">
						<div class="card-image">
							<img src="<?php echo $card['image'] ?>" alt="<?php echo $card['alt'] ?>">
						</div>
						<div class="card-content align-center">
							<h3 class="subtitle"><?php echo $card['subtitle'] ?></h3>                
							<h3><?php echo $card['title'] ?></h3>
							<p class="center-align"><?php echo $card['text'] ?></p>
							<button class="button-outline"><?php echo $card['button'] ?></button>
						</div>
					</div>
				</a>
				<?php
				}
				?>
            
            <!-- 03 -->

            
        </div>

    </div>

</section>

<!-- /section -->

<!-- hero section (text only) -->
<?php

$hero2_image= get_field("hero2_image", $post_id);
$hero2_title= get_field("hero2_title", $post_id);
$hero2_link= get_field("hero2_link", $post_id);
$hero2_button= get_field("hero2_button", $post_id);

?>
<section class="hero text_only dark_grad" style="background-image: url(<?php echo $hero2_image; ?>);">
    <div class="row">
        <div class="col column " >
                    
        </div>  
        <div class="col">
            <div class="hero-content">
                <!-- <h1 class="subtitle">Explore</h1> -->
                <h1><?php echo $hero2_title; ?></h1>
                <a class="button-rev-outline" href="<?php echo $hero2_link; ?>"><?php echo $hero2_button; ?></a>
            </div>
        </div>
    </div>
</section>

<!-- /section -->

        
    </main>
<!-- /end main -->



	<?php

	
	
	get_footer();
	
