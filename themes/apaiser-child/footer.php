<?php

		$stylesheet_directory = basename(get_stylesheet_directory());
		
		$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";

?>

<!-- footer -->

    <footer>
            <div class="row footer_top">
                
                <div class="col">
				
                    <div class="text_wrap">
                        <h4>Make An Enquiry</h4>
                        <p>Get in touch and our team will connect with you to help bring your vision to life.</p>
                    </div>
					
                </div>
                <div class="col">
                    <div id="enquiry_form" class="form_wrap">
                        <?php echo apply_shortcodes( '[contact-form-7 id="ad4cf44" title="Enquiry Form"]' ); ?>
                        <!-- <form action="" method="post">

                            <div class="form_group">
                                <input type="text" name="name" id="name" placeholder="Name">
                                <input type="email" name="email" id="email" placeholder="Email">
                                <input type="tel" name="phone" id="phone" placeholder="Phone">
                            </div>

                            <button class="button-primary" type="submit">Enquire Now</button>

                        </form> -->
                    </div>
                </div>

            </div>

            <div class="row footer_main">
                <div class="col_group">
                    
                    
                    <div class="column">
                        <div class="logo_wrap">
                            <a class="site-logo-link" href="/">
                                <div class="logo" aria-label="Apaiser">

                                    <img src="<?php echo $child_themedir; ?>assets/brand/House_of_Apaiser.svg" alt="House of Apaiser">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row footer_main">

                <div class="column">
                    <div class="subscribe">
                        <p>Subscribe to receive news of our latest collections, new projects and inspiring designs.</p>
                        <button class="button-primary subscribe_link" >Subscribe</button>
                    </div>

                    <div class="address">
                        <h6>HQ</h6>
                            <p>Suite 203/26 Rokeby St, <br>
                            Collingwood, <br>
                            Victoria, 3066, Australia</p>
                        <a href="tel:+61 3 9421 5722">+61 3 9421 5722</a>
                    </div>
                    <div class="certifications">
                        <h6>Certifications</h6>
                        <div class="certifications_group">                        
                            <img src="<?php echo $child_themedir; ?>assets/brand/certifications/CE.svg" alt="CE">
                            <img src="<?php echo $child_themedir; ?>assets/brand/certifications/cUPC.svg" alt="cUPC">
                            <img src="<?php echo $child_themedir; ?>assets/brand/certifications/mark-of-trust-certified-ISO-9001-quality-management-systems.svg" alt="ISO-9001">
                        </div>
                    </div>
                </div>
                

                <div class="column">
                    <nav class="footer_nav">
                        <!-- simplified site map  -->
                        <div class="footer-menu_group">
                            <ul class="footer-menu">
                                <li class="footer-menu-item"><a href="/about" class="footer-menu-link">About</a></li>                                
                            
                                <li class="footer-menu-item"><a href="/contact/" class="footer-menu-link ">Contact</a></li>                        
                            
                                <li class="footer-menu-item"><a href="/sustainability" class="footer-menu-link ">Sustainability</a></li>                                
                            </ul>                            
                        </div>

                        <div class="footer-menu_group">
                            <ul class="footer-menu">                                
                                <li class="footer-menu-item"><a href="/products/" class="footer-menu-link">Products</a></li>                                
                            
                                <li class="footer-menu-item"><a href="/collections/" class="footer-menu-link">Collections</a></li>                                
                            
                                <li class="footer-menu-item"><a href="/projects/" class="footer-menu-link">Projects</a></li>                                
                            </ul>
                                                    
                        </div>

                        <div class="footer-menu_group">
                            <ul class="footer-menu">
                                <li class="footer-menu-item"><a href="/customisation" class="footer-menu-link">Customisation</a></li>                                
                            
                                <li class="footer-menu-item"><a href="/Journal" class="footer-menu-link">Journal</a></li>
                            
                                <li class="footer-menu-item"><a href="/privacy-policy/" class="footer-menu-link">Privacy Policy</a></li>

                                <li class="footer-menu-item"><a href="/explore/#warranty" class="footer-menu-link">Warranty</a></li>
                            </ul>
                           
                        </div>

                        <div class="footer-menu_group">
                            <ul class="footer-menu">
                                <li class="footer-menu-item"><a href="/explore/#installation" class="footer-menu-link">Installation & Care</a></li>                                
                            
                                <li class="footer-menu-item"><a href="/contact" class="footer-menu-link">Consult With Us</a></li>
                            
                                <li class="footer-menu-item"><a href="/projects" class="footer-menu-link">Projects</a></li>                                

                                <li class="footer-menu-item"><a href="/professionals" class="footer-menu-link">Professionals</a></li>                                
                            </ul>
                           
                        </div>

                    </nav>
                </div>

                
            </div>

            <div class="row footer_bottom">
                <div class="column_wrap">
    
                    <div class="column credits">
                        <div><p>&copy; 2024 Apaiser. All rights reserved.</p></div><div><a href="/conditions">Terms of Use</a></div><div><a href="/cookies">Cookies</a></div>
                    </div>
    
                    <div class="column">
                        <div class="social_wrap">
                            <a href="https://www.facebook.com/apaiserbathware" target="_blank" rel="noopener noreferrer" class="social-link">
                                <img src="<?php echo $child_themedir; ?>assets/brand/social/facebook.svg" alt="facebook social-icon">
                            </a>
                            <a href="https://www.instagram.com/apaiserbathware/" target="_blank" rel="noopener noreferrer" class="social-link">
                                <img src="<?php echo $child_themedir; ?>assets/brand/social/instagram.svg" alt="instagram social-icon">
                            </a>
                            <a href="https://www.linkedin.com/company/apaiser" target="_blank" rel="noopener noreferrer" class="social-link">
                                <img src="<?php echo $child_themedir; ?>assets/brand/social/linkedin.svg" alt="linkedin">
                            </a>
                            <!-- <a href="https://www.x.com/apaiser" target="_blank" rel="noopener noreferrer" class="social-link">
                                <img src="<?php echo $child_themedir; ?>assets/brand/social/x-twitter.svg" alt="x social-icon">
                            </a> -->
                            <a href="https://www.pinterest.com.au/apaiser_bathware/" target="_blank" rel="noopener noreferrer" class="social-link">
                                <img src="<?php echo $child_themedir; ?>assets/brand/social/pinterest.svg" alt="pintrest social-icon">
                            </a>
                        </div>
                    </div>

                </div>

            </div>


    </footer>









 <!--Search Popup-->
    <div id="search" class="search-pop-up">
        <div class="search-pop-up_wrapper">
            <div class="search-close">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.364 1.36395L1.63604 14.0919M1.63604 1.36395L14.364 14.0919" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                </div>                            
                        
            <!-- <h4 class="desc-copy_mlg "></h4> -->
            <!-- <p class="desc-copy _reg">To find out more about our process, contact us, and we’ll get back to you with more details.</p> -->

            <div class="search-content">
                
                <form class="search" action="/" method="get">
					<!-- Search form INPUT -->
                    <input type="text" name="s" id="search" placeholder="Search">
					
                    <button type="submit">Search</button>
                </form>

                <div class="search-details">
                
                    <!-- <h2 class="search-title">Search</h2> -->
                    <div class="search-heading">
                        <div class="search-subtitle">Recent Searches</div>
                        <div class="search-clear">Clear All</div>
                    </div>
					<?php
					

					
					?>
                    <div class="search-filters">
                        <ul class="search-list">
							<?php
							
								$terma = $_COOKIE['apaiser_search_terms_a'];
								
								$termb = $_COOKIE['apaiser_search_terms_b'];
								
								$termc = $_COOKIE['apaiser_search_terms_c'];
							
							?>
                            <li class="pre-filter">
								<a href="/?s=<?php echo $terma; ?>"><?php echo $terma; ?></a>
							</li>
                            <li class="pre-filter">
								<a href="/?s=<?php echo $termb; ?>"><?php echo $termb; ?></a>
							</li>
                            <li class="pre-filter">
								<a href="/?s=<?php echo $termc; ?>"><?php echo $termc; ?></a>
							</li>
                            <!-- <li class="pre-filter">White</li>
                            <li class="pre-filter">Stone</li> -->
                        </ul>
                    </div>

                   <!--  <p>lorem ipsum autlaciis pa dolesequae nempore mporesedic dior audit in re dus int pore ero volorporpost.</p> -->
                                        
                </div>
                
            </div>
            
            
        </div>
    </div>   

    
    <!--Subscribe Popup-->
    <div id="subscribe" class="subscribe-pop-up">
        <div class="subscribe-pop-up_wrapper">
            <div class="subscribe-close">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.364 1.36395L1.63604 14.0919M1.63604 1.36395L14.364 14.0919" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                </div>                            
                        
            <!-- <h4 class="desc-copy_mlg "></h4> -->
            <!-- <p class="desc-copy _reg">To find out more about our process, contact us, and we’ll get back to you with more details.</p> -->

            <div class="subscribe-content">
                
                <!-- <form class="subscribe" action="" method="get">
                    <input type="text" name="name" id="name" placeholder="Name">
                    <input type="email" name="email" id="email" placeholder="Email">
                    <button type="submit">Subscribe</button>
                </form> -->

                <?php echo apply_shortcodes( '[contact-form-7 id="833f64d" title="Subscribe"]' ); ?>

        
                
            </div>
            
            
        </div>
    </div> 



	
	
    
    <!-- <script src="js/scripts.js"></script> -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/gh/phucbm/flickity-responsive@2.0.6/flickity-responsive.min.js"></script> -->

    <script src="<?php echo $child_themedir; ?>/js/menu-active.js"></script>
    <script src="<?php echo $child_themedir; ?>/js/video-pause.js"></script>
   <!-- <script src="<?php echo $child_themedir; ?>/js/pop-up.js"></script> -->
    <script src="<?php echo $child_themedir; ?>/js/search-pop-up.js"></script>
    <script src="<?php echo $child_themedir; ?>/js/subscribe-pop-up.js"></script>
	<script src="<?php echo $child_themedir; ?>/js/project-pop-up.js"></script>
    <script src="<?php echo $child_themedir; ?>/js/truncate.js"></script>
    <script src="<?php echo $child_themedir; ?>/js/in-focus.js"></script>

    <script src="<?php echo $child_themedir; ?>/js/flickity_custom.js"></script>
	<!-- <script src="<?php echo $child_themedir; ?>/js/custom-ajax.js"></script> -->
	
	
	
	<?php
	
	
	wp_footer();
	
	
	
	?>
</body>
</html>