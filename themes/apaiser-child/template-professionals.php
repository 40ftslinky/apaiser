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
                        <p>Something exciting is coming! Our professionals section will give you exclusive access to technical information, brochures, colour samples and more.</p>
                        <p>Sign up now and be the first to know when we go live.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col column align-center">
                    <div class="content">
                        
                        <h3 class="center">Create an Account</h3>
                        
                        <div id="professionals_form"  class="outer_form">

                            <!-- [contact-form-7 id="1cfaa0d" title="Professionals Contact"] -->
                            
                            <?php echo apply_shortcodes( '[contact-form-7 id="1cfaa0d" title="Professionals Contact"]' ); ?>


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

	
	
	get_footer();
	
