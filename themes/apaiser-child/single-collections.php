<?php
/**
 * The template for displaying the post.
 *
 * Template name: Single Collection.
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



	
	?>

    <main >
        <!-- hero section (half panel) -->
        <!-- section -->
         <!-- ##### -->
          <!-- incorrect header - full width image only ? -->
		<!--
        <section class="half_panel-hero">
            <div class="row">                
            
                <div class="col column full-width-bg" >
                    <div class="img_wrap ">
                        <img src="<?php echo $child_themedir; ?>/assets/collections/ode/placeholder.jpg" alt="image">
                    </div>
                </div>  

                <div class="col column full-width-bg " style="background-image: url(<?php echo $child_themedir; ?>/assets/collections/ode/placeholder.jpg);">
                    <div class="card card-center">
                        <div class="card-content">
                            <h1 class="subtitle">Collection</h1>
                            <h1 >Ode</h1>
                        </div>
                    </div>
                </div>

            </div>
        </section> -->
		
		<!-- hero section (text only -right) -->

	<section class="hero text_only_right dark_grad_right" style="background-image: url(<?php echo $hero_image; ?>);">
		<div class="row">
			<div class="col">
				<div class="hero-content">
					<h1 class="subtitle"><?php echo $hero_subtitle; ?></h1>
					<h1><?php echo $termDetails['name']; ?></h1>
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p> -->
				</div>
			</div>
		</div>
	</section>

		<!-- /section -->
				



<!-- section -->

        <!-- **** removed .plain + added .text_wrap around blockquote -->
        <section class="half_panel ">
            <div class="row align-end">
                <div class="col column">
                    <div class="text_wrap">
                        <blockquote>
                            <p>Emblematic of the textural qualities of the humble corrugated iron, the Ode Collection references the iconic undulations in a series of subtle, minimalistic lines.</p>
                        </blockquote>
                    </div>
                </div>
                <div class="col column ">
                    <div class="text_wrap">
                        <p>Elegant in its restraint, the collection was designed to echo the adaptability of its muse, suited to an array of settings – industrial, minimal, maximal, traditional or modern. The collection features a freestanding bath, countertop and pedestal basin, each hand crafted from our sustainable, apaiserMARBLE®</p>

                        <p>Every apaiser piece is available in a palette of 18 organic apaiserMARBLE® finishes and designed to work as a complete collection or combined to create your own personal bathroom experience. Embrace a new definition of bathroom luxury with your own sanctuary in stone.</p>

                    </div>
                </div>
            </div>
        </section>

<!-- /section -->


<!-- section -->
<!-- GRID Collection  -->
<section class="grid-collection plain">

     <!-- <div class="row">
        <div class="column align-center no_gap">
            <h2 class="center-align collection-title">Ode Collection</h2>            
        </div>
    </div> -->

    <div class="row">
        
        <div class="grid-col column ">   
            


            <!--  01 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3 class="product-title">Heading 01</h3>
                        <button class="view_product-link">View Product</button>
                    </div>
                </div>
            </a>

            <!--  02 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3 class="product-title">Heading 02</h3>
                    </div>
                </div>
            </a>

            <!--  03 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3 class="product-title">Heading 03 abcde fghig klmno pqrstuv asdasd asdasda asdasd asdasd asdas</h3>
                    </div>
                </div>
            </a>
            
            <!-- 3 / per page default  -->
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

