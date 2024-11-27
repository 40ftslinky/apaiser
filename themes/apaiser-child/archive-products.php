<?php
/**
 * The template for displaying the post.
 *
 * Template name: Products Archive
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
	
	
	
	// ACF


	
	
	?>

    <main >

<!-- section -->
<!-- hero section (text only) -->

        <section class="hero text_only dark_grad" style="background-image: url(<?php echo $child_themedir; ?>/assets/heros/baths_hero.jpg);">
            <div class="row">
                <div class="col">
                    <div class="hero-content">
                        <h1 class="subtitle category-title">Stone Bath</h1>
                        <h1 class="product-title">Baths</h1>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p> -->
                    </div>
                </div>
            </div>
        </section>

<!-- /section -->


<!-- section (text only) -->

<section class="half_panel ">
    <div class="row align-end">
        <div class="col column">
            <div class="text_wrap">
                <blockquote>
                    <p>We are the experts in crafting sumptuous, immersive stone bathtubs designed to elevate the bathing experience. Discover our collection of handmade, luxury freestanding baths. Divine pieces of functional bathroom art.</p>
                </blockquote>
            </div>
        </div>
        <div class="col column">
            <div class="text_wrap">
                <p>Each luxury stone bath is handcrafted in our atelier from apaiserMARBLE® – a blend of reclaimed marble, enriched with minerals sourced from the rich soils of the Australian Barossa Region. Through years of research and development, our high-performing material is stain-resistant, warm to touch and lighter than natural stone, making our luxury baths ideal for both commercial and residential bathrooms around the world.</p>
                <p>Every apaiser piece is available in a palette of 18 organic apaiserMARBLE® finishes and designed to work as a complete collection or combined to create your own personal bathroom experience. Embrace a new definition of bathroom luxury with your own sanctuary in stone.</p>
            </div>
        </div>
    </div>
</section>

<!-- /section -->
 

<!-- section -->
<!-- GRID product  -->
<section class="grid-collection ">
     

    <div class="row">
        
        <div class="grid-col column ">   
            
            <!--  01 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/baths/thumbs/chameleon.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3 class="product-title">A-Series Chameleon Bath</h3>
                        <button class="view_product-link">View Product</button>
                    </div>
                </div>
            </a>

            <!--  02 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/baths/thumbs/Allegra.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3 class="product-title">Allegra Bath</h3>
                        <button class="view_product-link">View Product</button>
                    </div>
                </div>
            </a>

            <!--  03 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/baths/thumbs/Chi.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3 class="product-title">Chi Bath</h3>
                        <button class="view_product-link">View Product</button>
                    </div>
                </div>
            </a>

            <!--  04 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/baths/thumbs/Eclipse.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3 class="product-title">Eclipse Bath</h3>
                        <button class="view_product-link">View Product</button>
                    </div>
                </div>
            </a>

            <!--  05 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image ">
                        <img src="<?php echo $child_themedir; ?>/assets/baths/thumbs/Emerald.jpg" alt="image">
                    </div>

                    <div class="card-content">
                        <h3 class="product-title">Emerald Bath</h3>
                        <button class="view_product-link">View Product</button>

                    </div>
                </div>
            </a>

            <!--  06 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/baths/thumbs/Haven.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3 class="product-title">Haven Bath</h3>
                        <button class="view_product-link">View Product</button>
                    </div>
                </div>
            </a>

            <!--  07 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image ">
                        <img src="<?php echo $child_themedir; ?>/assets/baths/thumbs/Lotus.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3 class="product-title">Lotus Bath</h3>
                        <button class="view_product-link">View Product</button>
                    </div>
                </div>
            </a>


            <!--  08 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/baths/thumbs/Lunar.jpg" alt="image 08">
                    </div>
                    <div class="card-content">
                        <h3 class="product-title">Lunar Bath</h3>
                        <button class="view_product-link">View Product</button>
                    </div>
                </div>
            </a>

            <!--  09 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/baths/thumbs/Ode.jpg" alt="image 09">
                    </div>
                    <div class="card-content">
                        <h3 class="product-title">Ode Bath</h3>
                        <button class="view_product-link">View Product</button>
                    </div>
                </div>
            </a>

            
            
            
            <!-- 09 / per page default  -->
        </div>

    </div>

    <div class="row ">
        <div class="column align-center">
            <div class="pagination">
                <a href="" class="page previous"><span class="left_arrow">&#x2B60;</span></a> <a href="" class="page current">01</a> | <a href="" class="page">02</a> | <a href="" class="page">03</a> | <a href="" class="page">04</a> | <a href="" class="page more"><span class="right_arrow">&#x2B62;</span></a> 
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


    </main>
<!-- /end main -->
	
	
	
	<?php







		get_footer();

