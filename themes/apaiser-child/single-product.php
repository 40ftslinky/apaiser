<?php
/**
 * The template for displaying the post.
 *
 * Template name: Single Product.
 *
 * @package storefront
 */


		
	$body_class="post";
	$template_class="post";
	
	$template_name='product';
	

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
	
	
	$carousel_image = get_field('carousel_image', $post_id);
	
	$archive_image = get_field('archive_image', $post_id);
	
	
	if(!empty($post_hero_image)){
		$IMAGE = $post_hero_image;
		
	} elseif(!empty($carousel_image)){
		$IMAGE = $carousel_image;
	} elseif(!empty($archive_image)){
		$IMAGE = $archive_image;
	}		
		

	*/
	
	
	
	?>

    <main >
        <!-- hero section (half panel) single-product.php -->
        <!-- section -->

        <section class="half_panel-hero">
            <div class="row">                
            
                <div class="col column full-width-bg" >
                    <div class="img_wrap ">
                        <img src="assets/products/SolBathStool.png" alt="image">
                    </div>
                </div>  

                <div class="col column full-width-bg " style="background-image: url(assets/products/Sol_Landscape.png);">
                    <div class="card card-center">
                        <div class="card-content">
                            <h1>Sòl<br>BATH<br>STOOL</h1>
                            <h2 class="subtitle">Bathware Accessories</h2>
                        </div>
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
                            <p>“Our collection of bathware accessories is designed by our apaiser studio to add the functional finishing touch to your bathing experience”</p>
                        </blockquote>
                    </div>
                </div>
                <div class="col column ">
                    <div class="text_wrap">
                        <p>Sustainably handcrafted in our atelier by master artisans, each piece is made to order with precision and care, especially for your project.</p>

                        <p>Our pieces are made from our own material, apaiserMARBLE®, a luxurious blend of repurposed marble and stone, crafted for performance while retaining the natural feel and experience of stone.</p>
                        
                        <p>Available in18 organic shades from our House palettes.</p>
                        
                        <p>The apaiser collections are UPC certified, and our atelier is ISO9001 & ISO14001certified.</p>
                    </div>
                </div>
            </div>
        </section>

<!-- /section -->

<!-- section --> 
<!-- GRID Colour Palette -->
<section class="grid-colours plain">

     <div class="row">
        <div class="column align-center no_gap">
            <h2 class="center-align">House Palette</h2>
            <p style="color:#5A5A5A">(colours are indicative and for reference purposes only)</p>
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
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 01</h3>
                    </div>
                </div>
            </a>

            <!--  02 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 02</h3>
                    </div>
                </div>
            </a>

            <!--  03 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 03 abcde fghig klmno pqrstuv asdasd asdasda asdasd asdasd asdas</h3>
                    </div>
                </div>
            </a>

            <!--  04 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 04</h3>
                    </div>
                </div>
            </a>

            <!--  05 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 05</h3>
                    </div>
                </div>
            </a>

            <!--  06 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 06</h3>
                    </div>
                </div>
            </a>

            <!--  07 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 07</h3>
                    </div>
                </div>
            </a>

            <!--  08 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 08</h3>
                    </div>
                </div>
            </a>

            <!--  09 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 09 abcde fghig klmno pqrstuv asdasd asdasda asdasd asdasd asdas</h3>
                    </div>
                </div>
            </a>

            <!--  10 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 10</h3>
                    </div>
                </div>
            </a>

            <!--  11 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 11</h3>
                    </div>
                </div>
            </a>

            <!--  12 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 12</h3>
                    </div>
                </div>
            </a>

            <!--  13 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 13</h3>
                    </div>
                </div>
            </a>

            <!--  14 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 14</h3>
                    </div>
                </div>
            </a>

            <!--  15 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 15</h3>
                    </div>
                </div>
            </a>

            <!--  16 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 16</h3>
                    </div>
                </div>
            </a>

            <!--  17 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 17</h3>
                    </div>
                </div>
            </a>

            <!--  18 -->
            <a class="card_link" href="#link">
                <div class="card">                        
                    <div class="card-image">
                        <img src="assets/images/placeholder.jpg" alt="image">
                    </div>
                    <div class="card-content">
                        <h3>Heading 18</h3>
                    </div>
                </div>
            </a>
            

            <!-- 6 / per page default  -->
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

<!-- /section -->

<!-- section -->
<!-- product details -->
 <section class="product-details plain table_section">
    <div class="row">
        <div class="col column align-center">
            <h2>Product Details</h2>
        </div>
    </div>
    <div class="row">
        <div class="col column">
            <div class="table_wrap">
                <h4>DOWNLOADS</h4>
                <div class="table">
                    <div class="table_row">
                        <div class="table_cell">
                            <div class="download_title">Standard Colour Palette</div>
                            <div class="download_type">PDF</div>
                        </div>
                        <div class="table_cell download_cell"><a class="download-link-left">Download</a></div>
                    </div>

                    <div class="table_row">
                        <div class="table_cell">Lorem Ipsum</div>
                        <div class="table_cell download_cell"><a class="download-link-left">Download</a></div>
                    </div>

                    
                </div>
                
            </div>
        </div>

        <div class="col column">
            <div class="table_wrap">
                <h4>OTHER PIECES IN THE COLLECTION</h4>
                <div class="table">
                    <div class="table_row">
                        <div class="table_cell">Lorem Ipsum</div>
                        <div class="table_cell download_cell"><a class="read_more-link">Discover</a></div>
                    </div>

                    <div class="table_row">
                        <div class="table_cell">Lorem Ipsum</div>
                        <div class="table_cell download_cell"><a class="read_more-link">Discover</a></div>
                    </div>

                    
                </div>
                
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

