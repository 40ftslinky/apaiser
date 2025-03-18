<?php
/**
 * The template for displaying the about page.
 *
 * Template name: Professionals page
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

  <main>


<!-- hero section (text only) -->

        <section class="text_only" style="">
            <div class="row">
                <div class="col align-center">
                    <div class="hero-content">
                        <!-- <h1 class="subtitle">Contact</h1> -->
                        <h1>Coming Soon</h1>
                        <p>Sign up to join the apaiser family and be the first to know when we launch our Professionals Page. You'll gain exclusive access to download tech drawings, brochures, color samples, and more.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col column align-center">
                    <div class="content" id="professionals_content">
                        
                        <h3 class="center">Create an Account</h3>
                        
                        <div id="professionals_form"  class="outer_form">

                            <!-- [contact-form-7 id="1cfaa0d" title="Professionals Contact"] -->
                            
                            <?php 
							
								//	
							echo apply_shortcodes( '[contact-form-7 id="1cfaa0d" title="Professionals Contact"]' ); 
							
							//	echo apply_shortcodes( '[cfp id="1cfaa0d" title="Professionals Contact" pwd="password"]');
							
							
							?>


                            <!-- <form class="professionals_form">

                                <label for="Name">Name
                                    <input type="text" id="Name" name="Name" placeholder="Name" required>
                                </label>

                                <label for="Location">Location
                                    <input type="text" id="Location" name="Location" placeholder="Location">
                                </label>

                                <label for="Company">Company
                                    <input type="text" id="Company" name="Company" placeholder="Company">
                                </label>

                                <label for="email">Work Email
                                    <input type="email" id="email" name="email" placeholder="Work Email">
                                </label>

                                <label for="password">Create Password
                                    <input type="password" id="password" name="password" placeholder="*** *** ***">
                                </label>

                                <label for="password-confirm">Confirm
                                    <input type="password" id="password-confirm" name="password-confirm" placeholder="*** *** ***">
                                </label>
                                
                                <div class="checkbox_group">
                                    <input type="checkbox" id="checkbox" name="checkbox" required>                        
                                    <label for="checkbox"><span>By submitting this form I agree to the apaiser <a href="/privacy">Privacy Policy</a>, and to being contacted by apaiser for marketing purposes.<em>*</em></span></label>
                                </div>

                                <input type="submit" id="submit" name="submit" value="Join Now">

                                
                            </form> -->
                        </div>

                    </div>
                </div>
            </div>

        </section>

<!-- /section -->



        
    </main>
<!-- /end main -->



	<?php
		
		

		
		
		if($sent_professional_email == 1){
			
			if(!empty($_POST['professionals-email']) && !empty($_POST['password'])){
				
				// // CREATE NEW USER  


				$Email = $_POST['professionals-email'];
			
				$new_user_name = create_new_username($Email);
				
				$New_Password = $_POST['password'];

				// creates a new account 
				$user_id = wp_create_user($new_user_name, $New_Password, $Email);
				
				$this_user = new WP_User( $user_id );
				
				// Add 'professional' role to new user 

				$this_user->add_role( 'professional' );
				
				// Removed user notificatoin email // This can be handled with CF7
				//wp_new_user_notification( $user_id, $New_Password);
				

				
				
				?>
				<script>
				jQuery(document).ready( function($){
					var heroContentDiv = document.querySelector('.hero-content');

					if (heroContentDiv) {
						heroContentDiv.innerHTML = 'Thank you for creating a Professionals account';
						console.log('Element with class "hero-content" was  found.');
					} else {
						console.log('Element with class "hero-content" not found.');
					}
					
					jQuery("#professionals_content").hide();

				});
				</script>
				<?php

			}	
		}
		

		
	
	get_footer();
	
