<?php

		$stylesheet_directory = basename(get_stylesheet_directory());
		
		$child_themedir = "/wp-content/themes/".$stylesheet_directory."/";

?>

<!-- footer -->

    <footer>
            <div class="row footer_top">
                
                <div class="col">
					<?php
					
					$homepage_id = getHomepagePostId();
					
					$make_an_enquiry =get_field('enquiry_make_an_enquiry', $homepage_id);
					
					$footer_intro_text =get_field('enquiry_footer_intro_text', $homepage_id);
					
					$enquiry_subscribe_text =get_field('enquiry_subscribe_text', $homepage_id);
					
					$enquiry_subscribe_button =get_field('enquiry_subscribe_button', $homepage_id);
					
					?>
                    <div class="text_wrap">
                        <h4><?php echo $make_an_enquiry; ?></h4>
                        <p><?php echo $footer_intro_text; ?></p>
                    </div>
					
                </div>
                <div class="col">
                    <div id="enquiry_form" class="form_wrap">
                        <?php echo apply_shortcodes( '[contact-form-7 id="ad4cf44" title="Enquiry Form"]' ); ?>

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
                        <p><?php echo $enquiry_subscribe_text ?></p>
                        <button class="button-primary subscribe_link" ><?php echo $enquiry_subscribe_button ?></button>
                    </div>

                    <div class="address">
                        <h6>

						<?php
						
								$rows = get_field('address_location', $homepage_id);
								
								if($rows){
									
									$Z = 0;
									
									$count = count($rows);
									
									foreach($rows as $key=> $row)
									{
											
											echo '<a class="email-link" href="/contact#salesoffices">'.$row['location_name'].'</a>';
											
											$Z++;
											
											if($Z != $count){
												
												echo "&nbsp;|&nbsp;";
											}
											
									}

								}
														
						$street_address = get_field('address_street_address', $homepage_id);
						
						$address_phone = get_field('address_phone', $homepage_id);
						
						$phone_link = get_field('address_phone_link', $homepage_id);
						?>
                        </h6>
                        <p><?php echo $street_address ?></p>
                        <a href="tel:<?php echo $phone_link ?>"><?php echo $address_phone ?></a>
                    </div>
                    <div class="certifications">
					<?php
					$certification_name = get_field('certification_name', $homepage_id);
					
					$certification_images = get_field('certification_images', $homepage_id);
					
					$copyright = get_field('copyright', $homepage_id);
					
					
					?>
                        <h6><?php echo $certification_name ?></h6>
                        <div class="certifications_group">
						<?php

							foreach($certification_images as $image){
								
								print '<img src="'.$image['logo'].'" alt="'.$image['alt'].'" class="footer_logo">';
							}
							
							
							?>
                        </div>
                    </div>
                </div>
                

                <div class="column">
                    <nav class="footer_nav">
                        <!-- simplified site map  -->
                        <div class="footer-menu_group">
                            <ul class="footer-menu">
							<?php
							
							$menu_items = wp_get_nav_menu_items('footer-group-01');

							foreach($menu_items as $menu_item){

								$title = $menu_item->title;
								
								$url = $menu_item->url;
								
								echo '<li class="footer-menu-item"><a href="'.$url.'" class="footer-menu-link">'.$title.'</a></li>';
								
								echo "\n";

							}
							
							?>
                            </ul>                            
                        </div>

                        <div class="footer-menu_group">
                            <ul class="footer-menu">           

							<?php
							
							$menu_items = wp_get_nav_menu_items('footer-group-02');

							foreach($menu_items as $menu_item){

								$title = $menu_item->title;
								
								$url = $menu_item->url;
								
								echo '<li class="footer-menu-item"><a href="'.$url.'" class="footer-menu-link">'.$title.'</a></li>';
								
								echo "\n";

							}
							
							?>								
                            </ul>
                                                    
                        </div>

                        <div class="footer-menu_group">
                            <ul class="footer-menu">
							<?php
							
							$menu_items = wp_get_nav_menu_items('footer-group-03');

							foreach($menu_items as $menu_item){

								$title = $menu_item->title;
								
								$url = $menu_item->url;
								
								echo '<li class="footer-menu-item"><a href="'.$url.'" class="footer-menu-link">'.$title.'</a></li>';
								
								echo "\n";

							}
							
							?>			
                            </ul>
                           
                        </div>

                        <div class="footer-menu_group">
                            <ul class="footer-menu">
							
							<?php
							
							$menu_items = wp_get_nav_menu_items('footer-group-04');

							foreach($menu_items as $menu_item){

								$title = $menu_item->title;
								
								$url = $menu_item->url;
								
								echo '<li class="footer-menu-item"><a href="'.$url.'" class="footer-menu-link">'.$title.'</a></li>';
								
								echo "\n";

							}
							
							?>											
                            </ul>
                           
                        </div>

                    </nav>
                </div>

                
            </div>

            <div class="row footer_bottom">
                <div class="column_wrap">

                    <div class="column credits">
                        <div><p>&copy; <?php echo $copyright ?></p></div>
						<?php
							$footer_links = get_field('footer_links', $homepage_id);

							foreach($footer_links as $link){
								
								print '<div class="footer_link"><a href="'.$link['url'].'">'.$link['text'].'</a></div>';
							}
						?>

                    </div>
    
                    <div class="column">
                        <div class="social_wrap">
						<?php
							
							$socials = get_field('socials', $homepage_id);
							
							foreach($socials as $link){
								
								print '<a href="'.$link['url'].'" target="_blank" rel="noopener noreferrer" class="social-link">';
								
								print '<img src="'.$link['image'].'" alt="'.$link['alt'].'">';
								
								print '</a>';
								
							}

							
							?>
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
				
					<?php
					
						$terma = $_COOKIE['apaiser_search_terms_a'];
						
						$termb = $_COOKIE['apaiser_search_terms_b'];
						
						$termc = $_COOKIE['apaiser_search_terms_c'];
					
					?>				
                
                    <!-- <h2 class="search-title">Search</h2> -->
                    <div class="search-heading">
					<?php
					
						if(!empty($terma) || !empty($termb) || !empty($termc)){
					
							?>
							<div class="search-subtitle">Recent Searches</div>
							<div class="search-clear" onclick="clear_all_cookies();">Clear All</div>
							<?php
						
						}
						?>
                    </div>
					<?php
					

					
					?>
                    <div class="search-filters">
                        <ul class="search-list">

							<?php
							
							if(!empty($terma)){
							
								?>
								<li class="pre-filter">
									<a href="/?s=<?php echo $terma; ?>"><?php echo $terma; ?></a>
								</li>
								<?php
							}
							
							if(!empty($termb)){
							
								?>
								<li class="pre-filter">
									<a href="/?s=<?php echo $termb; ?>"><?php echo $termb; ?></a>
								</li>
								<?php
							}
							
							if(!empty($termc)){
							
								?>							
								<li class="pre-filter">
									<a href="/?s=<?php echo $termc; ?>"><?php echo $termc; ?></a>
								</li>
								<?php
							
							}
							?>
                            <!-- <li class="pre-filter">White</li>
                            <li class="pre-filter">Stone</li> -->
                        </ul>
                    </div>

                                        
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
	<style>
	
	.pre-filter a[data-has-after]::after { pointer-events: auto; /* Make the pseudo-element clickable */ }
	
	</style>
	
	<script>

				document.querySelectorAll('.pre-filter a').forEach(anchor => {
					anchor.setAttribute('data-has-after', 'true');
				});

				document.addEventListener('click', function(event) {
					if (event.target.matches('li.pre-filter') && !event.target.matches('li.pre-filter a')) {
						
							var parentUl = event.target.parentElement; 
							
							var index = Array.prototype.indexOf.call(parentUl.children, event.target); 
							
							console.log('Position of clicked li:', index);
						
						
						
						clear_search_cookie(index);
					}
				});

				// Function to be called
				function clear_search_cookie(index) {
					console.log('clear_search_cookie called');
					
						// use Ajax to get posts 
						$.ajax({
							type: 'POST',
							url: '<?php echo admin_url('admin-ajax.php');?>',
							dataType: "json", // add data type
							data: { action : 'clear_cookies', n: index },
							success: function( response ) {
								
								console.log(response);
								
								var X = Number(response);	// covert str to num 
								
								if (!isNaN(X) && typeof X === 'number') {
									
									var searchList = document.querySelector('.search-filters .search-list');
									
									// hide appropriate LI in UL 
									searchList.children[X].style.display = 'none'
									
								}

								
							}
					
						});
					
					
				}




			function clear_all_cookies(){
				
				clear_search_cookie(0);
				
				clear_search_cookie(1);
				
				clear_search_cookie(2);
				
			}

	</script>

	<?php
	
	wp_footer();

	?>
	
	
	
</body>
</html>