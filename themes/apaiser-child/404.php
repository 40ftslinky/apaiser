<?php
/**
 * The template for displaying 404 pages (not found).
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

	?>



		<main id="main" class="site-main" role="main">


        <!-- section -->

    <section class="text_only" style="">
        <div class="row">
            <div class="col align-center">
                <div class="hero-content">
                    <!-- <h1 class="subtitle">Contact</h1> -->
                    <h1>404</h1>
                    <h2>That page could not be found</h2>
                </div>
            </div>
        </div>
    </section>

<!-- /section -->

			<!-- /section -->
        <section class="text_only" style="">
            <div class="row">

					
					<p><?php esc_html_e( 'Nothing was found at this location. Try searching, or check out the links below.', 'storefront' ); ?></p>



		</div>
		<div class="row">
					<?php


						get_search_form();



					?>	 
		</div>
	</section>

		</main><!-- #main -->


<?php
get_footer();
