<?php
/**
 * The template for displaying the post.
 *
 * Template name: Single Post
 *
 * @package storefront
 */

	

		get_header();

		include_once "nav.php";
	
		global $wp_query;
		
		$post_id = $wp_query->post->ID;
		
		$post_title=get_the_title($post_id);

	
		$stylesheet_directory = basename(get_stylesheet_directory());
	
		$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
	
		
		$post_content = get_the_content($post_id);
		
		$post_content = clean_up_old_post($post_content);
		
	

	?>
 <main>



		<!--  POST CONTENT -->

			<section class="legacy_post" style="">
				<div class="row">
					<div class="col align-center"><div class="content">
					<?php
					
						print "<h1>$post_title</h1>";
						
					
						echo $post_content;
						
						
						
					?>				
					</div></div>
				</div>
			</section>



</main>
<!-- /end main -->

<?php







		get_footer();

