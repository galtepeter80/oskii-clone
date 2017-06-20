<!--
*****************************
Redirect to mobile-only page if viewing from mobile-only
*****************************
-->

<?php if ( (wp_is_mobile()) ) : ?>


<!-- get our Athlete ID -->
<script>
	var athlete = <?php echo get_the_ID(); ?>;
	console.log(athlete);
	
</script>

<?php 

$location = get_template_directory_uri();

$location = $location . '/single-athlete-mobile-template.php'; 

$athlete_id = get_the_ID();

$_SESSION['athlete'] = $athlete_id;

$_SESSION['athleteNumber'] = $_SERVER['REQUEST_URI'];

//Look for Athlete Image
if( get_field('cover_image' ) ){ 
	$cover_image = get_field('cover_image');
	$cover_image_url = $cover_image['sizes']['large'];
	$_SESSION['cover_image_url'] = $cover_image_url;
}

if (get_field('first_name')) {
	$first_name = get_field('first_name');
}

if (get_field('last_name')) {
	$last_name = get_field('last_name');
}





unset($_SESSION['height']);
unset($_SESSION['weight']);
unset($_SESSION['place_of_birth']);
unset($_SESSION['date_of_birth']);
unset($_SESSION['position']);
unset($_SESSION['high_school_name']);
unset($_SESSION['class_of']);
unset($_SESSION['club_team']);
unset($_SESSION['summer_team']);
unset($_SESSION['athlete_college']);
unset($_SESSION['hometown']);
unset($_SESSION['place_of_death']);
unset($_SESSION['athlete_grade_level']);
unset($_SESSION['date_of_death']);

if (get_field('place_of_death')) {
	$_SESSION['place_of_death'] = get_field('place_of_death');
}

if (get_field('date_of_death')) {
	$_SESSION['date_of_death'] = get_field('date_of_death');
}

if (get_field('athlete_grade_level')) {
	$_SESSION['athlete_grade_level'] = get_field('athlete_grade_level');
}

if (get_field('height')) {
	$_SESSION['height'] = get_field('height');
}

if (get_field('weight')) {
	$_SESSION['weight'] = get_field('weight');
}

if (get_field('place_of_birth')) {
	$_SESSION['place_of_birth'] = get_field('place_of_birth');
}

if (get_field('date_of_birth')) {
	$_SESSION['date_of_birth'] = get_field('date_of_birth');
}

if (get_field('position')) {
	$_SESSION['position'] = get_field('position');
}

if (get_field('high_school_name')) {
	$_SESSION['high_school_name'] = get_field('high_school_name');
}

if (get_field('class_of')) {
	$_SESSION['class_of'] = get_field('class_of');
}

if (get_field('club_team')) {
	$_SESSION['club_team'] = get_field('club_team');
}
if (get_field('summer_team')) {
	$_SESSION['summer_team'] = get_field('summer_team');
}
if (get_field('athlete_college')) {
	$_SESSION['athlete_college'] = get_field('athlete_college');
}

if (get_field('hometown')) {
	$_SESSION['hometown'] = get_field('hometown');
}

// unsets specific session variables for category ennumeration
unset($_SESSION['all videos']);
unset($_SESSION['Awards Ceremony']);
unset($_SESSION['Awards and Achievements']);
unset($_SESSION['Commercials']);
unset($_SESSION['Compilations']);
unset($_SESSION['Documentaries']);
unset($_SESSION['Event Highlights']);
unset($_SESSION['Fight Highlights']);
unset($_SESSION['Full Fights']);
unset($_SESSION['Full Games']);
unset($_SESSION['Game highlights']);
unset($_SESSION['Highlight videos']);
unset($_SESSION['Interviews']);
unset($_SESSION['Training']);
unset($_SESSION['TV Shows']);

// sets arrays for category ennumeration
$posttype = array('video', 'athlete', 'brand', 'team', 'league');
$categories = array(
				'Awards Ceremony',
				'Awards and Achievements',
				'Commercials',
				'Compilations',
				'Documentaries',
				'Event Highlights',
				'Fight Highlights',
				'Full Fights',
				'Full Games',
				'Game highlights',
				'Highlight videos',
				'Interviews',
				'Training',
				'TV Shows',
				'none'
			); 

// resets specific session variables for category ennumeration

$args = array(
		'cat' 					 => $cat_id,
		'numberposts'			 => -1,
		'post_type'  			 => $posttype,
		'meta_query' => array(
				array(
					'key' => 'athletes',
					'value' => '"' . $athlete_id . '"',
					'compare' => 'LIKE'
				)
			
			),
		
		);
		
$this_query = null;
$this_query = new WP_Query($args);	

$count = $this_query->found_posts;

$_SESSION['all videos'] = $count;

foreach($categories as $category) {
	
	// count the wordpress database counts
	$args = array(
			'cat' 					 => $cat_id,
			'numberposts'			 => -1,
			'post_type'  			 => $posttype,
			'meta_query' => array(
					'relation' => 'AND',
					array(
						'key' => 'athletes',
						'value' => '"' . $athlete_id . '"',
						'compare' => 'LIKE'
					),
					array(
						'key' => 'video_categories_mobile',
						'value' => $category,
						'compare' => 'LIKE'
					)
				
				),
			
			);
			
	$this_query = null;
	$this_query = new WP_Query($args);	

	$count = $this_query->found_posts;

	//count the custom database counts
	// All Athlete Videos
		
	global $wpdb;
	$stmt = "SELECT * FROM video_info_add WHERE athlete_id = " . $athlete_id . " AND video_categories = '" . $category . "'";
	$results = $wpdb->get_results($stmt);
	
	
	$sub_count = count($results);
	
	
	$_SESSION[$category] = $count + $sub_count;
	$_SESSION['all videos'] += $sub_count;
	

}


// tranfers variables to the new page

$_SESSION['athlete_name'] = '' . $first_name . ' ' . $last_name . '';

$location = $location . '?athlete=' . $athlete_id;

wp_redirect( $location );

exit();

?>

<!--
*****************************
If user is viewing from Desktop, load Desktop template
*****************************
-->

<?php else: ?>

<?php get_header(); ?>
<!--<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/athlete-profile.css"/>-->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/homepage.css"/>

<!-- get our Athlete ID -->
<script>
	athlete = <?php echo get_the_ID(); ?>;
	
</script>

<!-- Single Athlete Page -->

	<!-- Find the Athlete cover image, if there is one -->
	<?php 
		// clear variables
		$count = 0;
		$cover_image = '';
		$cover_image_url = '';
		
		//Look for Athlete Image
		if( get_field('cover_image' ) ){ 
		$cover_image = get_field('cover_image');
		$cover_image_url = $cover_image['sizes']['large'];}
	?>
	
	<!-- if we found an image -->
    <?php if($cover_image_url !=''): ?>	
        <div id="featured-bg" style="background-image:url('<?php echo $cover_image_url; ?>')">
		
	<!-- if we didn't -->
    <?php else: ?>
        <div id="featured-bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/images/tri-bg.png'); background-repeat:repeat;background-size: auto;">
		
    <?php endif; ?>
	
			<div class="top">
				<div class="swipearrow">
				</div>
			</div>
			
			<!-- Out Athlete's name -->
			<div id="athlete-name">
				<?php wp_title( '' ); ?> 
			</div>
	
		</div><!-- End Parallax BG -->
		
	<!-- Begin our Single Athlete content wrapper -->
	<div class="content-wrapper single-athlete-page">
    	<div class="featured-cover">
        
        </div>
		<div class="content">
    	<div id="newsstream" class="columns">
        
			
			<div class="next-posts-link-wrapper">
                <div class="next-posts-link" id="next-posts-link">
                
                </div>
            </div>
        </div>
        
		</div>
    	
	</div><!-- End Content Wrapper-->
    
<!-- we need the footer, too -->
<?php get_footer(); ?>

<script>
	
window.addEventListener('DOMContentLoaded', function() {
	
	<?php if ($_SESSION['postid'] != NULL) : ?>
	
		var back_url = '<?php echo $_SESSION['back_url']; ?>';
		back_url = '<?php echo $_SESSION['SERVER_NAME']; ?>' + '/athlete/' + back_url; 
	
		var videolink = "https://www.youtube.com/embed/CwrCYEgyjoY";
		var videolinkauto = videolink + '?autoplay=1';
	
		var videoopen = false;
		function loadVideo() {
			//alert("loading video...");
			
			//$('#video-layer').html("<iframe width='755' height='808' src='https://www.youtube.com/embed/CwrCYEgyjoY?autoplay=1' frameborder='0' allowfullscreen></iframe>");
			//$('#video-layer').html('<?php echo $_SESSION['transfer_embed']; ?>');
			$('#video-layer').html("<iframe frameborder='0' src='" + "<?php echo $_SESSION['embedded_url']; ?>" + "'></iframe>");
			$('#video-layer').addClass('active');
			$('#back-button').addClass('active');
			$('#full-screen-button').addClass('active');
			$(".horizontalContent").addClass('blurred');
			videoopen = true;
			pathname = window.location.pathname;
			history.pushState("", "",  ""+ back_url +"" );
			event.preventDefault();
		}
	
		$(function() {
			$('#video-layer').click(function(event) {
				$('#video-layer').html("");
				$('#video-layer').removeClass('active');
				$('#back-button').removeClass('active');
				$('#full-screen-button').removeClass('active');
				$(".horizontalContent").removeClass('blurred');
				videoopen = false;
				//history.back();
			});
			$('#back-button').click(function(event) {
				$('#video-layer').html("");
				$('#video-layer').removeClass('active');
				$('#back-button').removeClass('active');
				$('#full-screen-button').removeClass('active');
				$(".horizontalContent").removeClass('blurred');
				videoopen = false;
				//history.back();
				//window.location = '' + back_url + '';
			});
			$(window).on('popstate', function() {
				if(videoopen == true) {
					$('#video-layer').html("");
					$('#video-layer').removeClass('active');
					$('#back-button').removeClass('active');
					$(".horizontalContent").removeClass('blurred');
					videoopen = false;
				}
			});
			
		});
	
		setTimeout(loadVideo(), 100);				
		
	<?php $_SESSION['postid'] = []; session_unset; ?>
	
	<?php endif; ?>
	
});

</script> 

<?php endif; ?>

