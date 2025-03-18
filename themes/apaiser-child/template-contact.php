<?php
/**
 * The template for displaying the about page.
 *
 * Template name: Contact page
 *
 * @package storefront
 */

		$body_class="contact";
		
		$template_class="contact";
		
		$stylesheet_directory = basename(get_stylesheet_directory());
		
		$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";
		
		get_header();


		global $wp_query;
		$post_id = $wp_query->post->ID;
		
		
		$post_content = get_the_content($post_id);
		
		
		$title = get_field('title', $post_id);
		
		$submit_your_details= get_field('submit_your_details', $post_id);

	?>


    <main>


<!-- hero section (text only) -->

<section class="text_only" >
            <div class="row">
                <div class="col align-center">
                    <div class="hero-content">
                        <!-- <h1 class="subtitle">Contact</h1> -->
                        <h1><?php echo $title ?></h1>
                        <!-- <p class="paragarph">Our team of brand ambassadors are standing by, ready to bring your bathroom vision to life. We would love to hear from you!</p> -->
						<?php
						
						echo $post_content;
						
						?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col column align-center">
                    <div class="content">
                        
                        <h3 class="center"><?php echo $submit_your_details ?></h3>
                        
                        <div id="contact_form" class="outer_form" >

                            <!-- [contact-form-7 id="baa4975" title="Contact Us"] -->

                            <?php echo apply_shortcodes( '[contact-form-7 id="baa4975" title="Contact Us"]' ); ?>


                        </div>

                    </div>
                </div>
            </div>

        </section>

<!-- /section -->
   

<!-- section -->

<section class="contact-info">

        <div class="row ">
            <?php
			
			$showrooms_title = get_field('showrooms_title', $post_id);
			
			
			?>
            <div id="our-headquarters" class="content col">
                <h3 id="our-showrooms"><?php echo $showrooms_title ?></h3>
                <div class="listing">
                    
					<?php
					
						$showrooms = get_field('showrooms_showroom', $post_id);
						
						foreach($showrooms as $item){
					
							print '<div class="showroom_address">
								<h4>'.$item['title'].'</h4>
								<p>'.$item['address'].'</p>
								<p><a href="tel:'.$item['phone'].'">'.$item['phone'].'</a><br>
									<a href="mailto:'.$item['email'].'">'.$item['email'].'</a></p>
								</p>
							</div>';
					
						}
					?>

					

                </div>
            </div>
            
        </div>

        <div class="row ">
			<?php

				$sales_offices_title = get_field('sales_offices_title', $post_id);

				?>
            <div id="salesoffices" class="content col">
                <h3><?php echo $sales_offices_title; ?></h3>

                <div class="listing">
				
				
					<?php
					
						$offices = get_field('sales_offices_office', $post_id);
						
						foreach($offices as $item){
					
							print '<div id="'.$item['slug'].'" class="salesoffice_address">
								<h4>'.$item['title'].'</h4>
								<a href="mailto:'.$item['email'].'">'.$item['email'].'</a>
								</div>';
					
						}
					?>
				
				
				
                   <!-- <div id="melbourne" class="salesoffice_address">
                        <h4>Melbourne</h4>
                        <a href="mailto:melbourne@apaiser.com">melbourne@apaiser.com</a>
                    </div>
                
                    <div id="london" class="salesoffice_address">
                        <h4>London</h4>
                        <a href="mailto:london@apaiser.com">london@apaiser.com</a>
                    </div>
                
                    <div id="new-york" class="salesoffice_address">
                        <h4>New York</h4>
                        <a href="mailto:us@apaiser.com">us@apaiser.com</a>
                    </div>

                    <div id="bangkok" class="salesoffice_address">
                        <h4>Bangkok</h4>
                        <a href="mailto:asia@apaiser.com">asia@apaiser.com</a>
                    </div>
                
                    <div id="singapore" class="salesoffice_address">
                        <h4>Singapore</h4>
                        <a href="mailto:singapore@apaiser.com">singapore@apaiser.com</a>
                    </div>
                
                    <div id="dubai" class="salesoffice_address">
                        <h4>Dubai</h4>
                        <a href="mailto:dubai@apaiser.com">dubai@apaiser.com</a>
                    </div>
               
				-->
                
				</div>
			</div>
        </div>

        <div class="row ">
            <?php
			
				$Gp_title = get_field('global_partners_title', $post_id);
				
				$Subtitle = get_field('global_partners_subtitle', $post_id);
				
				$GP = get_field('global_partners_partner', $post_id);
			
			?>
            <div id="our-partners" class="content col">
                <h3><?php echo $Gp_title ?></h3>

                <h4><?php echo $Subtitle ?></h4>
                
                <div class="listing">
				
					<?php
					
						foreach($GP as $item){

								print '<div class="globalpartners_address"><h5 class="partner-title">'.$item['title'].'</h5><p class="partner-location">'.$item['location'].'</p></div>';
					
						}
						
                    ?>
                 <!--   <div class="globalpartners_address">
                        <h5 class="partner-title">Bathroom Collective</h5>
                        <p class="partner-location">North Manly NSW</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Blackrock Tiles</h5>
                        <p class="partner-location">Fyshwick ACT</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Candana</h5>
                        <p class="partner-location">Woollahra NSW</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Design Bathware</h5>
                        <p class="partner-location">North Wollongong NSW</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Elite Bathware & Tiles</h5>
                        <p class="partner-location">East Brisbane QLD</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Harvey Norman Commercial</h5>
                        <p class="partner-location">Port Melbourne VIC</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Just Bathroomware</h5>
                        <p class="partner-location">Crows Nest NSW</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Lavare</h5>
                        <p class="partner-location">Claremont WA</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">NCP Bathroom Centre</h5>
                        <p class="partner-location">Maroochydore QLD</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">NCP Bathroom Centre</h5>
                        <p class="partner-location">Noosaville QLD</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Routleys Plumbing</h5>
                        <p class="partner-location">Malvern SA</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Shire Bathware</h5>
                        <p class="partner-location">Taren Point NSW</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Southern Innovations</h5>
                        <p class="partner-location">Fyshwick ACT</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Tuck Plumbing</h5>
                        <p class="partner-location">Osborne Park WA</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Robertson Bathware</h5>
                        <p class="partner-location">Auckland, NZ</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Robertson Bathware</h5>
                        <p class="partner-location">Wellington, NZ</p>
                    </div>
					-->
                    
                </div>
            <?php
			
				$Gp_title = get_field('global_partners_usa_subtitle', $post_id);
				

				
				$GP = get_field('global_partners_usa_partner', $post_id);
			
			?>
                <h4><?php echo $Gp_title ?></h4>
                
                <div class="listing">
					<?php
					
						foreach($GP as $item){

								print '<div class="globalpartners_address"><h5 class="partner-title">'.$item['title'].'</h5><p class="partner-location">'.$item['location'].'</p></div>';
					
						}
						
                    ?>
                    <!--<div class="globalpartners_address">
                        <h5 class="partner-title">RSSA</h5>
                        <p class="partner-location">Anaheim CA, USA</p>
                    </div>
                
                    <div class="globalpartners_address">
                        <h5 class="partner-title">The Bathroom Boutique</h5>
                        <p class="partner-location">Miami FL, USA</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Westside Kitchen and Bath</h5>
                        <p class="partner-location">Dallas TX, USA</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Aquavato</h5>
                        <p class="partner-location">Toronto, ONTARIO, Canada</p>
                    </div>-->
            
                </div>
            <?php
			
				$Gp_title = get_field('global_partners_asia_subtitle', $post_id);
				

				
				$GP = get_field('global_partners_asia_partner', $post_id);
			
			?>
                <h4><?php echo $Gp_title ?></h4>
                
                <div class="listing">
                   		<?php
					
						foreach($GP as $item){

								print '<div class="globalpartners_address"><h5 class="partner-title">'.$item['title'].'</h5><p class="partner-location">'.$item['location'].'</p></div>';
					
						}
						
                    ?>
                </div>
            <?php
			
				$Gp_title = get_field('global_partners_india_subtitle', $post_id);
				

				
				$GP = get_field('global_partners_india_partner', $post_id);
			
			?>
                <h4><?php echo $Gp_title ?></h4>
                
                <div class="listing">
                    					<?php
					
						foreach($GP as $item){

								print '<div class="globalpartners_address"><h5 class="partner-title">'.$item['title'].'</h5><p class="partner-location">'.$item['location'].'</p></div>';
					
						}
						
                    ?>
                </div>
            <?php
			
				$Gp_title = get_field('global_partners_uae_subtitle', $post_id);
				

				
				$GP = get_field('global_partners_uae_partner', $post_id);
			
			?>
                <h4><?php echo $Gp_title ?></h4>
                
                <div class="listing">
					<?php
					
						foreach($GP as $item){

								print '<div class="globalpartners_address"><h5 class="partner-title">'.$item['title'].'</h5><p class="partner-location">'.$item['location'].'</p></div>';
					
						}
						
                    ?>
                
                </div>
            <?php
			
				$Gp_title = get_field('global_partners_uk_subtitle', $post_id);
				

				
				$GP = get_field('global_partners_uk_partner', $post_id);
			
			?>
                <h4><?php echo $Gp_title ?></h4>
                
                <div class="listing">
					<?php
					
						foreach($GP as $item){

								print '<div class="globalpartners_address"><h5 class="partner-title">'.$item['title'].'</h5><p class="partner-location">'.$item['location'].'</p></div>';
					
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
	
