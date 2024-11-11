<?php
/**
 * The template for displaying the post.
 *
 * Template name: Brochure Archive
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


	
	?>


    <main>

        <!-- hero section (text only) -->
        <section class="hero dark_grad" style="background-image: url(<?php echo $child_themedir; ?>/assets/brochures/apaiser_021_1 2.png);">
            <div class="row">
                <div class="col">
                    <div class="hero-content">
                        <h1>House Palettes & Brochures</h1>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p> -->
                    </div>
                </div>
            </div>
        </section>

<!-- /section -->

<!-- section -->

<!-- GRID ARCHIVE - Colour Palettes -->

<section  id="house-palettes" class="grid-archive plain">

    <div class="row">
        <div class="column justify-center">
            <h2 class="">House Palettes</h2>
            <!-- <h4 class="semibold">Lorem Ipsum dolor sit amet.</h4> -->
            <!-- <div class="tags categories">
                <div class="title">Categories:</div>
                <a href="#tag" class="tag active">Tag 01</a>
                <a href="#tag" class="tag">Tag 02</a>
                <a href="#tag" class="tag">Tag 03</a>
                <a href="#tag" class="tag">Tag 04</a>
                <a href="#tag" class="tag">Tag 05</a>
            </div> -->

        </div>
    </div>

    <div class="row">
        
        <div class="grid-col column ">   
            


            <!--  01 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 01</h3>
                        <button class="download-link">View Colours </button>
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
                        <h3>Heading 02</h3>
                        <button class="download-link">View Colours </button>
                    </div>
                </div>
            </a>


            <!-- 2 / per page default  -->
        </div>

    </div>

    <!-- <div class="row ">
        <div class="column align-center">
            <div class="pagination">
                <a href="" class="page previous">&larrb;</a> <a href="" class="page current">01</a> | <a href="" class="page">02</a> | <a href="" class="page">03</a> | <a href="" class="page">04</a> | <a href="" class="page more">»</a> 
            </div>
            
        </div>
    </div> -->


</section> 

<!-- / -->

<!-- section --> 
<!-- GRID ARCHIVE - Brochures -->
<section id="brochures" class="grid-archive plain">

     <div class="row">
        <div class="column justify-center">
            <h2 class="">Brochures</h2>
            <!-- <h4 class="semibold">Lorem Ipsum dolor sit amet.</h4> -->
            <!-- <div class="tags categories">
                <div class="title">Categories:</div>
                <a href="#tag" class="tag active">Tag 01</a>
                <a href="#tag" class="tag">Tag 02</a>
                <a href="#tag" class="tag">Tag 03</a>
                <a href="#tag" class="tag">Tag 04</a>
                <a href="#tag" class="tag">Tag 05</a>
            </div> -->

        </div>
    </div>

    <div class="row">
        
        <div class="grid-col column ">   
            


            <!--  01 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 01</h3>
                        <button class="download-link">View Brochure</button>
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
                        <h3>Heading 02</h3>
                        <button class="download-link">View Brochure</button>
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
                        <h3>Heading 03 abcde fghig klmno pqrstuv asdasd asdasda asdasd asdasd asdas</h3>
                        <button class="download-link">View Brochure</button>
                    </div>
                </div>
            </a>

            <!--  04 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 04</h3>
                        <button class="download-link">View Brochure</button>
                    </div>
                </div>
            </a>

            <!--  05 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 05</h3>
                        <button class="download-link">View Brochure</button>
                    </div>
                </div>
            </a>

            <!--  06 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="<?php echo $child_themedir; ?>/assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 06</h3>
                        <button class="download-link">View Brochure</button>
                    </div>
                </div>
            </a>
            

            <!-- 6 / per page default  -->
        </div>

    </div>

    <div class="row ">
        <div class="column align-center">
            <div class="pagination">
                <a href="" class="page previous">&larrb;</a> <a href="" class="page current">01</a> | <a href="" class="page">02</a> | <a href="" class="page">03</a> | <a href="" class="page">04</a> | <a href="" class="page more">»</a> 
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

