<?php 
/*Template Name:Splash Page Video
*/
?>

<!--Sections for only displaying this page on desktop devices-->
<?php if ( !(wp_is_mobile()) ) : // remember to change this ?>

<html>

<head>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/videostyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/videoscripts.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link href="http://allfont.net/allfont.css?fonts=source-sans-pro-black" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Biryani:300" rel="stylesheet">
</head>

<body id="mainbody">



	<div class="video-container">
		<video loop muted autoplay poster="<?php echo get_template_directory_uri(); ?>/splashtools/splashpage.png" class="background-video">
			<source src="<?php echo get_template_directory_uri(); ?>/assets/Promovideo.mp4" type="video/mp4">
		</video>
	</div>
	
<div id="all-content">

	<div class="logo-tve-line">
		<img id="logo-tve" src="<?php echo get_template_directory_uri(); ?>/assets/images/oskiilogo.png">
	</div>

	<div class="headline-tve">
		<p id="byline-tve">The Video Encyclopedia of Sports.</p>
		<p id="tagline-tve">We Chronicle the Careers of Premiere Athletes.</p>
	</div>

	<div class="explore-line">
		<!--<a href="<?php echo get_bloginfo('url'); ?>/featured-athlete"><span id="explore-button">EXPLORE</span></a>-->
		<span id="explore-button">EXPLORE</span>
	</div>

	<div class="option-line">
		<span id="sound-button">SOUND <span id="sound-switch">OFF</span></span>
	</div>

	</div>

</div>

<div id="hidden-page">
</div>

</body>

</html>

<?php else: ?>

<?php
$location = get_template_directory_uri();

//$location = $location . '/featured-mobile.php'; 
$location = $location . '/products-mobile.php'; 

wp_redirect( $location );

exit();
?>

<html>

<!-- Section for calling all libraries and resources necessary-->
<head>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/videostyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/videoscripts.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link href="http://allfont.net/allfont.css?fonts=source-sans-pro-black" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Biryani:300" rel="stylesheet">
</head>


<body id="mobile-splash">

<!--Section for getting 18 images-->

<?php
// Generates custom arguments for the WP_Query
// Sets variable static for Featured, for now...
	$featured = 'YES';
		
	remove_all_filters('posts_orderby');
		
	// Generates custom arguments for the WP_Query
	$args = array(
		'numberposts' 			 => 18,
		'post_type' 			 => 'athlete',	
		'pagination'             => true,
		'paged'                  => $paged,
		'posts_per_page'         => 18,
		'ignore_sticky_posts'    => false,
		//'order'                  => 'DESC',
		'orderby'				 => 'rand',
		'meta_key'				 => 'featured_athlete',
		'meta_value'			 => $featured
		
	);

// Begins our new WP_query with our chosen args
$my_query = null;
$my_query = new WP_Query($args);

?>

<!--Section for displaying all images in a 3/row div -->

<div id="background-images">

<?php $count = 0; // begins a counter for the wrapper ?>

<?php // begin counters for tracking image placement 
	$image_row = 0;
	$image_col = 0;
?>

<?php if( $my_query->have_posts() ) : ?> 
	
	<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
  
		<!-- Adds the wrapper -->
	    <?php if( 0 == $count%3) : ?>
			<div class="threepostwrapper">
	    <?php endif; ?>
  
		<!-- find the images -->
		<?php // looks for thumbnail images for post
			$image = '';
			$image_url = '';
			//Look for Parent Thumnail Image
			if( get_field('thumbnail_image' ) ){ 
			$image = get_field('thumbnail_image');
			$image_url = $image['sizes']['medium'];}
		?>
		
		<?php //get an identifier for each image 
			$image_id = $image_row . "-" . $image_col;
		?>
		
		<!-- display the image -->
		<?php if($image_url !=''): // display the image ?>
			<img class="splash-image dark-image" id="<?php echo $image_id; ?>" src="<?php echo $image_url; ?>"/>	
			<?php $image_col++; ?>
		<?php endif; ?>
	
	
		<!-- ends the wrapper -->
		<?php if(( 2 == $count%3) || ($count == ($my_query->found_posts - 1))) : ?>
		  </div><br>
			<?php $image_row++; ?>
			<?php $image_col = 0; ?>
		<?php endif; ?>
	
		<?php $count++; // adds one to our counter ?>
		
  
    <?php endwhile; // end while for loop ?>

<?php endif; // end if for loop ?>

</div>

<script>var imageRows = <?php echo $image_row; ?>;</script>

<!--Section for the Oskii Text Overlay -->

<div id="oskii-text-overlay">

	<div class="logo-tve-line-mobile">
		<img id="logo-tve-mobile" src="<?php echo get_template_directory_uri(); ?>/assets/images/oskii-logo-beta.png">
	</div>
	
	<div class="headline-tve-mobile">
		<p id="byline-tve-mobile">mobile coming soon</p>
		<p id="tagline-tve-mobile">check us out on desktop</p>
	</div>
	
	<div class="explore-line-mobile">
		<span class="media-link">
			<a href="http://www.facebook.com">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook-icon.png">
			</a>
		</span>
		
		<span class="media-link">
			<a href="http://www.twitter.com">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-icon.png">
			</a>
		</span>
		
		<span class="media-link">
			<a href="http://www.instagram.com">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-icon.png">
			</a>
		</span>
	</div>
	
</div>

</body>

<script>
// for the window resize
	$(document).ready(function() {
		var contentwidth = Math.round( $( window ).width() );
		var postwidth = Math.round(contentwidth/3);
		$(".splash-image").height((postwidth)-2);
		$(".splash-image").width((postwidth)-3);
		
		$(".threepostwrapper").height((postwidth)-2);
	});

	$(window).resize(function() {
		var contentwidth = Math.round( $( window ).width() );
		var postwidth = Math.round(contentwidth/3);
		$(".splash-image").height((postwidth)-2);
		$(".splash-image").width((postwidth)-3);
		
		$(".threepostwrapper").height((postwidth)-2);
	});
</script>

</html>

<?php endif; ?>
