<?php

$hero2_image= get_field("hero2_image", $post_id);

$hero2_title= get_field("hero2_title", $post_id);

$hero2_link= get_field("hero2_link", $post_id);

$hero2_button= get_field("hero2_button", $post_id);


if(empty($hero2_button)){

	$hero2_button = "Discover";

}

if(empty($hero2_title)){

	$hero2_title = "Our Latest Collections";

}

if(empty($hero2_link)){

	$hero2_link = "/collections";

}

$default_image ="/wp-content/themes/".$stylesheet_directory."/assets/images/placeholder.jpg";



if(empty($hero2_image)){
	
	$stylesheet_directory = basename(get_stylesheet_directory());
	

	
	

	$IMAGE = $default_image;

} else {
	
	/*
	
	Array ( [ID] => 22037 [id] => 22037 [title] => collection_reflection [filename] => collection_reflection.jpg 
	[filesize] => 206161 [url] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/collection_reflection.jpg 
	[link] => https://staging.apaiser.screenrage.com.au/projects-commercial/collection_reflection/ [alt] => [author] => 2 [description] => 
	[caption] => [name] => collection_reflection [status] => inherit [uploaded_to] => 19861 [date] => 2024-11-13 06:00:32 
	[modified] => 2024-11-14 02:15:16 [menu_order] => 0 [mime_type] => image/jpeg [type] => image 
	[subtype] => jpeg [icon] => https://staging.apaiser.screenrage.com.au/wp-includes/images/media/default.png [width] => 1920 [height] => 1280 
	[sizes] => Array ( 
	[thumbnail] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/collection_reflection-150x150.jpg 
	[thumbnail-width] => 150 [thumbnail-height] => 150 
	[medium] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/collection_reflection-300x200.jpg [medium-width] => 300 
	[medium-height] => 200 [medium_large] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/collection_reflection-768x512.jpg 
	[medium_large-width] => 768 [medium_large-height] => 512 [large] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/collection_reflection-1024x683.jpg
	[large-width] => 1024 [large-height] => 683 [1536x1536] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/collection_reflection-1536x1024.jpg 
	[1536x1536-width] => 1536 [1536x1536-height] => 1024 [2048x2048] => https://staging.apaiser.screenrage.com.au/wp-content/uploads/2024/11/collection_reflection.jpg 
	[2048x2048-width] => 1920 [2048x2048-height] => 1280 ) ) 
	
	
	*/
	if(is_array($hero2_image)){
		

		if(!empty($hero2_image['sizes']['2048x2048'])){
		
			$IMAGE = $hero2_image['sizes']['2048x2048'];
		
		} elseif(!empty($hero2_image['url'])){
			
			$IMAGE = $hero2_image['url'];
			
		} elseif(!empty($hero2_image['sizes']['large'])){
			
			$IMAGE = $hero2_image['sizes']['large'];
			
		} elseif(!empty($hero2_image['sizes']['medium'])){
			
			$IMAGE = $hero2_image['sizes']['medium'];
			
		} else {
			
			$IMAGE = $default_image;
		}
		

		
		
	} else {
		
		$IMAGE = $hero2_image;
		
	}
	
	
	
}


?>

<!-- hero section (text only) -->
<section class="hero text_only dark_grad_right" style="background-image: url(<?php echo $IMAGE; ?>);">
    <div class="row">
        <div class="col column " >
                    
        </div>  
        <div class="col">
            <div class="hero-content">
                <!-- <h1 class="subtitle">Explore</h1> -->
                <h1><?php echo $hero2_title; ?></h1>
                <a class="button-rev-outline" href="<?php echo $hero2_link; ?>"><?php echo $hero2_button; ?></a>
            </div>
        </div>
    </div>
</section>

<!-- /section -->