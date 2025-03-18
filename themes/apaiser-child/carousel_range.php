<?php



	// Get the ID of the front page
	$homepageId = get_option('page_on_front'); 


	$range_group_title= get_field("range_group_title", $homepageId);
	
	$full_width_img_alt= get_field("full_width_img_alt", $homepageId);

	$ranges = get_field('range_group_range', $homepageId);
	
	
	
?>   
<!-- RANGE CAROUSEL -->
        <section class="carousel_sect range_sect">
            <div class="row ">
                <div class="col align-center">
                    <h2 class="center-align"><?php echo $range_group_title ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col column range ">                        
                    <div class="carousel ">

						<?php

						foreach($ranges as $row){
						?>
                        <div class="carousel-cell column one-third">
                            <div class="card center no_border">
                                <div class="card-image">
                                    <img src="<?php echo $row['range_image']; ?>" alt="<?php echo $row['range_name'] ?>">
                                </div>
                                <div class="card-content align-center">                             
                                    <h3><?php echo $row['range_name'] ?></h3>
                                    <?php echo $row['range_description'] ?>
                                    <a class="button-outline" href="<?php echo $row['range_link'] ?>"><?php echo $row['range_button'] ?></a>
                                </div>
                            </div>
                        </div>
						<?php
						}
						?>						
                      
                        
                    </div>
                </div>
            </div>

        </section>

<!-- /section -->