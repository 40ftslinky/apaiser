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

	?>


    <main>


<!-- hero section (text only) -->

<section class="text_only" >
            <div class="row">
                <div class="col align-center">
                    <div class="hero-content">
                        <!-- <h1 class="subtitle">Contact</h1> -->
                        <h1>Contact Us</h1>
                        <p>Our team of brand ambassadors are standing by, ready to bring your bathroom vision to life. We would love to hear from you!</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col column align-center">
                    <div class="content">
                        
                        <h3 class="center">Submit your details</h3>
                        
                        <div id="contact_form" class="outer_form" >

                            <!-- [contact-form-7 id="baa4975" title="Contact Us"] -->

                            <?php echo apply_shortcodes( '[contact-form-7 id="baa4975" title="Contact Us"]' ); ?>

                            <!-- <form class="form">

                                <label for="Name">Name
                                    <input type="text" id="Name" name="Name" placeholder="Name" required>
                                </label>

                                <label for="email">Email Address
                                    <input type="email" id="email" name="email" placeholder="Email">
                                </label>

                                <label for="tel">Phone Number
                                    <input type="tel" id="tel" name="tel" placeholder="(+61) Phone Number">
                                </label>

                                <label for="textarea">Message
                                    <textarea id="textarea" name="textarea" placeholder="Leave a Message"></textarea>
                                </label>

                                <div class="checkbox_group">
                                    <input type="checkbox" id="checkbox" name="checkbox" required>                        
                                    <label for="checkbox"><span>By submitting this form I agree to the apaiser <a href="/privacy">Privacy Policy</a>, and to being contacted by apaiser for marketing purposes.<em>*</em></span></label>
                                </div>

                                <input type="submit" id="submit" name="submit" value="Submit">
                                
                            </form> -->
                        </div>

                    </div>
                </div>
            </div>

        </section>

<!-- /section -->
   

<!-- section -->

<section class="contact-info">
        <!-- 
        <div class="row ">
            <div class="intro-content">               
                <h2 class="intro-title">Locations</h2> 
                <p class="intro">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga blanditiis ratione in eligendi cumque nihil numquam, optio aut veniam ullam voluptatum soluta velit, beatae vitae, quibusdam molestiae temporibus. Impedit, a!</p>
            </div>
        </div>
        -->

        <div class="row ">
            
            <div id="headquarters" class="content col">
                <h3>Showrooms</h3>
                <div class="listing">
                    <div class="showroom_address">
                        <h4>Headquarters</h4>
                        <p>Suite 203/26 Rokeby St, <br>Collingwood, Victoria, 3066, <br>Australia</p>
                        <p><a href="tel:+61 3 9421 5722">+61 3 9421 5722</a><br>
                        <a href="mailto:info@apaiser.com">info@apaiser.com</a></p>
                        </p>
                    </div>
                
                    <div class="showroom_address">
                        <h4>Australia</h4>
                        <p>344 Burnley St, <br>Richmond, Victoria</p>
                        <p><a href="tel:+61 3 9421 5722">+61 3 9421 5722</a><br>
                            <a href="mailto:melbourne@apaiser.com">melbourne@apaiser.com</a></p>
                    </div>
                    <div class="showroom_address">
                        <h4>Singapore</h4>
                        <p>38 Eng Hoon St, <br>Singapore 169783</p>
                        <p><a href="tel:+65 6223 2378">+65 6223 2378</a><br>
                            <a href="mailto:singapore@apaiser.com">singapore@apaiser.com</a></p>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row ">
            
            <div id="salesoffices" class="content col">
                <h3>Sales Offices</h3>

                <div class="listing">
                    <div id="melbourne" class="salesoffice_address">
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
                </div>
                
            </div>
        
        
        </div>

        <div class="row ">
            
            <div id="globalpartners" class="content col">
                <h3>Global Partners</h3>

                <h4>Australia & New Zealand</h4>
                
                <div class="listing">
                    
                    <div class="globalpartners_address">
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

                    
                </div>

                <h4>North America</h4>
                
                <div class="listing">
                    <div class="globalpartners_address">
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
                    </div>
            
                </div>

                <h4>Asia</h4>
                
                <div class="listing">
                    <div class="globalpartners_address">
                        <h5 class="partner-title">Bathroom Gallery</h5>
                        <p class="partner-location">Singapore</p>
                    </div>
                
                    <div class="globalpartners_address">
                        <h5 class="partner-title">Bathworld</h5>
                        <p class="partner-location">Singapore</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Bretz & Co</h5>
                        <p class="partner-location">Singapore</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Belfry Echo</h5>
                        <p class="partner-location">Kowloon, Hong Kong</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">Homely</h5>
                        <p class="partner-location">Taipei, Taiwan</p>
                    </div>
                </div>

                <h4>India</h4>
                
                <div class="listing">
                    <div class="globalpartners_address">
                        <h5 class="partner-title">FCML</h5>
                        <p class="partner-location">Ahmadabad</p>
                    </div>
                
                    <div class="globalpartners_address">
                        <h5 class="partner-title">FCML</h5>
                        <p class="partner-location">Bangalore</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">FCML</h5>
                        <p class="partner-location">Delhi</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">FCML</h5>
                        <p class="partner-location">Lucknow</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">FCML</h5>
                        <p class="partner-location">Mumbai</p>
                    </div>

                    <div class="globalpartners_address">
                        <h5 class="partner-title">FCML</h5>
                        <p class="partner-location">Raipur</p>
                    </div>
                </div>

                <h4>United Arab Emirates</h4>
                
                <div class="listing">
                    <div class="globalpartners_address">
                        <h5 class="partner-title">Alshaya Group</h5>
                        <p class="partner-location">Dubai</p>
                    </div>
                
                    <div class="globalpartners_address">
                        <h5 class="partner-title">Sara Group</h5>
                        <p class="partner-location">Dubai</p>
                    </div>
                
                </div>

                <h4>United Kingdom</h4>
                
                <div class="listing">
                    <div class="globalpartners_address">
                        <h5 class="partner-title">Soaks Bathroom</h5>
                        <p class="partner-location">Belfast, Ireland</p>
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
	
