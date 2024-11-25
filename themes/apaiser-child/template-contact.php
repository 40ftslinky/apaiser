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
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga blanditiis ratione in eligendi cumque nihil numquam, optio aut veniam ullam voluptatum soluta velit, beatae vitae, quibusdam molestiae temporibus. Impedit, a!</p>
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
        <div class="row align-start">
            <div id="our-headquarters" class="col">
                <div class="content">
                    <h3>Our Headquarters</h3>
                    <p>Suite 203/26 Rokeby St, <br>Collingwood, Victoria, 3066, <br>Australia</p>
                    <p><a href="tel:+61 3 9421 5722">+61 3 9421 5722</a></p>
                </div>
            </div>
            <div id="our-showrooms" class="col ">
                <div class="content">
                    <h3>Our Showrooms</h3>
                    <div><a href="#showroom_melbourne">apaiser Melbourne</a></div>
                    <div><a href="#showroom_singapore">apaiser Singapore</a></div>
                </div>
            </div>
            <div id="our-partners" class="col ">
                <div class="content">
                    <h3>Our Partners</h3>
                    <div><a href="#partners_australia">Australia</a></div>
                    <div><a href="#partners_canada">Canada</a></div>
                    <div><a href="#partners_hongkong">Hong Kong</a></div>
                    <div><a href="#partners_india">India</a></div>
                    <div><a href="#partners_nz">New Zealand</a></div>
                    <div><a href="#partners_singapore">Singapore</a></div>
                    <div><a href="#partners_nz">New Zealand</a></div>
                    <div><a href="#partners_taiwan">Taiwan</a></div>
                    <div><a href="#partners_uae">United Arab Emirites</a></div>
                    <div><a href="#partners_uk">United Kingdom</a></div>
                    <div><a href="#partners_us">United States</a></div>
                </div>
            </div>
        </div>
    </section>

<!-- /section -->

<!-- section -->

<section class="location-info">
    <div class="row ">
        <div id="location-partners" class="col">
            <div class="content">
                <div class="content-group">
                    <h3>Showrooms</h3>
                    
                    <div  id="showroom_melbourne" class="showroom_group">
                        <div class="country">Australia</div>
                        <div class="showrooms">
                            <div class="showroom">
                                <div class="address">344 Burnley St,<br>Richmond, Victoria</div>
                                <div class="contact-details">
                                    <a class="phone-link" href="tel:+61 3 9421 5722">TEL: +61 3 9421 5722</a>
                                    <button data-link="melbourne@apaiser.com" class="showroom-link">Contact us</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="showroom_singapore" class="showroom_group">
                        <div class="country">Singapore</div>
                        <div class="showrooms">
                            <div class="showroom">
                                <div class="address">38 Eng Hoon St,<br>Singapore 169783</div>
                                <div class="contact-details">
                                    <a class="phone-link" href="tel:+65 6223 2378">TEL: +65 6223 2378</a>
                                    <button data-link="singapore@apaiser.com" class="showroom-link">Contact us</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-group">
                    <h3>Offices</h3>
                    
                    <div class="offices_group">
                        <div class="country">Head office</div>
                        <div class="offices">
                            <div class="office">
                                <div class="address">Suite 203/26 Rokeby St,<br>Collingwood, Victoria, 3066,<br>Australia</div>
                                <div class="contact-details">
                                    <a class="phone-link" href="tel:+61 3 9421 5722">TEL: +61 3 9421 5722</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="offices_group">
                        <div class="country">Sales offices</div>
                        <div class="offices">
                            <div class="office">
                                <div class="address">Melbourne:</div>
                                <button class="office-link" data-link="melbourne@apaiser.com">Contact Us</button>
                            </div>
                            <div class="office">
                                <div class="address">London:</div>
                                <button class="office-link" data-link="uk@apaiser.com" >Contact Us</button>
                            </div>
                            <div class="office">
                                <div class="address">New York:</div>
                                <button class="office-link" data-link="usa@apaiser.com">Contact Us</button>
                            </div>
                            <div class="office">
                                <div class="address">Singapore:</div>
                                <button class="office-link" data-link="asia@apaiser.com">Contact Us</button>
                            </div>
                            <div class="office">
                                <div class="address">Dubai:</div>
                                <button class="office-link" data-link="dubai@apaiser.com">Contact Us</div>
                            </div>
                        </div>
                    </div>


                <div class="content-group">
                    <h3>Our Global Partners</h3>
                    
                    <div id="partners_australia" class="partner_group">
                        <div class="country">Australia</div>
                    
                        <div class="partners">
                            <div class="partner">
                                <div class="company">Bathroom Collective</div>
                                <div class="location">North Manly NSW</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">Blackrock Tiles</div>
                                <div class="location">Fyshwick ACT</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">Candana</div>
                                <div class="location">Woollahra NSW</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">Design Bathware</div>
                                <div class="location">North Wollongong NSW</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">Elite Bathware & Tiles</div>
                                <div class="location">East Brisbane QLD</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">Harvey Norman Commercial</div>
                                <div class="location">Port Melbourne VIC</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">Just Bathroomware</div>
                                <div class="location">Crows Nest NSW</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">Lavare</div>
                                <div class="location">Claremont WA</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">NCP Bathroom Centre</div>
                                <div class="location">Maroochydore QLD</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">NCP Bathroom Centre</div>
                                <div class="location">Noosaville QLD</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">Routleys Plumbing</div>
                                <div class="location">Malvern SA</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">Shire Bathware</div>
                                <div class="location">Taren Point NSW</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">Southern Innovations</div>
                                <div class="location">Fyshwick ACT</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">Tuck Plumbing</div>
                                <div class="location">Osborne Park WA</div>
                            </div>
                        </div>
                    </div>
                    <div id="partners_canada" class="partner_group">
                        <div class="country">Canada</div>
                    
                        <div class="partners">
                            <div class="partner">
                                <div class="company">Aquavato</div>
                                <div class="location">Toronto</div>
                            </div>
                        </div>
                    </div>
                    <div id="partners_hongkong" class="partner_group">
                        <div class="country">Hong Kong</div>
                    
                        <div class="partners">
                            <div class="partner">
                                <div class="company">Belfry Echo</div>
                                <div class="location">Kowloon</div>
                            </div>
                        </div>
                    </div>
                    <div id="partners_india" class="partner_group">
                        <div class="country">India</div>
                    
                        <div class="partners">
                            <div class="partner">
                                <div class="company">FCML</div>
                                <div class="location">Ahmadabad</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">FCML</div>
                                <div class="location">Bangalore</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">FCML</div>
                                <div class="location">Delhi</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">FCML</div>
                                <div class="location">Lucknow</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">FCML</div>
                                <div class="location">Mumbai</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">FCML</div>
                                <div class="location">Raipur</div>
                            </div>
                        </div>
                    </div>
                    <div id="partners_nz" class="partner_group">
                        <div class="country">New Zealand</div>
                    
                        <div class="partners">
                            <div class="partner">
                                <div class="company">Robertson Bathware</div>
                                <div class="location">Auckland</div>
                            </div>
                            <div class="partner">
                                <div class="company">Robertson Bathware</div>
                                <div class="location">Wellington</div>
                            </div>
                        </div>
                    </div>
                    <div id="partners_singapore" class="partner_group">
                        <div class="country">Singapore</div>
                    
                        <div class="partners">
                            <div class="partner">
                                <div class="company">Bathroom Gallery</div>
                            </div>
                    
                            <div class="partner">
                                <div class="company">Bathworld</div>
                            </div>
                    
                            <div class="partner">
                                <div class="company">Bretz & Co</div>
                            </div>
                        </div>
                    </div>
                    <div id="partners_taiwan" class="partner_group">
                        <div class="country">Taiwan</div>
                    
                        <div class="partners">
                            <div class="partner">
                                <div class="company">Homely</div>
                                <div class="location">Taipei</div>
                            </div>
                        </div>
                    </div>
                    <div id="partners_uae" class="partner_group">
                        <div class="country">United Arab Emirates</div>
                    
                        <div class="partners">
                            <div class="partner">
                                <div class="company">Alshaya Group</div>
                                <div class="location">Dubai</div>
                            </div>
                    
                    
                            <div class="partner">
                                <div class="company">Sara Group</div>
                                <div class="location">Dubai</div>
                            </div>
                        </div>
                    </div>
                    <div id="partners_uk" class="partner_group">
                        <div class="country">United Kingdom</div>
                    
                        <div class="partners">
                            <div class="partner">
                                <div class="company">Soaks Bathroom</div>
                                <div class="location">Belfast</div>
                            </div>
                        </div>
                    </div>
                    <div id="partners_us" class="partner_group">
                            <div class="country">United States</div>
                    
                            <div class="partners">
                                <div class="partner">
                                    <div class="company">RSSA</div>
                                    <div class="location">Anaheim CA</div>
                                </div>
                    
                    
                                <div class="partner">
                                    <div class="company">The Bathroom Boutique</div>
                                    <div class="location">Miami FL</div>
                                </div>
                    
                    
                                <div class="partner">
                                    <div class="company">Westside Kitchen and Bath</div>
                                    <div class="location">Dallas TX</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
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
	
