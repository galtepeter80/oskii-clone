<?php 
/*Template Name:Content Loader Mobile
*/
?>

<script>console.log("running content loader");</script>

<?php

// set initial counter for our threepostwraper
$count = 0;

// remove all initial filters present
remove_all_filters('posts_orderby');

// sets an initial posttype array, in case one isn't found by GET
$posttype = array('video', 'athlete', 'brand', 'team', 'league'); //default post type is everything

// Check for a posttype through GET
if ($_GET['pageType']) {
	$pageType = $_GET['pageType'] ;
}

// adds pagination to the posts, if not present
$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
if ($_GET['paged']) {
	$paged = $_GET['paged'] ;
}



// sets initial arguments, in case post isn't Athlete or Sport
$args = array(
	'cat' 					 => $cat_id,
	'post_type' 			 => $posttype,
	'numberposts'			=> -1,
	'pagination'             => true,
	'orderby'   			 => 'rand',
	  'order'    			 => 'ASC',
	'paged'                  => $paged,
	'posts_per_page'         => 24,
	'ignore_sticky_posts'    => false
);

if ($pageType == 'Teams') {
	
		
	// Generates custom arguments for the WP_Query
	$args = array(
		'numberposts' => -1,
		'post_type' => 'team',
		'pagination'             => true,
		'paged'                  => $paged,
		'posts_per_page'         => 24,
		'ignore_sticky_posts'    => false,
		'order'                  => 'DESC',
		'orderby'                => 'rand',
	);
	
}

if ($pageType == 'Youth') {
	
	// Sets variable static for Youth, for now...
	$amateur_level = 'Youth';
		
	// Generates custom arguments for the WP_Query
	$args = array(
		'numberposts' => -1,
		'post_type' => array('video', 'athlete', 'team'),
		'pagination'             => true,
		'paged'                  => $paged,
		'posts_per_page'         => 24,
		'ignore_sticky_posts'    => false,
		'order'                  => 'DESC',
		'orderby'                => 'rand',
		'meta_key'				 => 'amateur_level',
		'meta_value'			 => $amateur_level
	);
	
}

if ($pageType == 'NFL') {
	
	$sport_category = 'nfl';
	
	// Generates custom arguments for the WP_Query
	$args = array(
		'numberposts' => -1,
		'post_type' => array('video', 'athlete', 'team'),
		'pagination'             => true,
		'paged'                  => $paged,
		'posts_per_page'         => 24,
		'ignore_sticky_posts'    => false,
		'order'                  => 'ASC',
		'meta_query'			 => array (
			array (
				'key'	=>	'sport_category',
				'value'	=> $sport_category,
				'compare' => 'LIKE'
			)
		)
		
	);
	
}

if ($pageType == 'MLB') {
	
	$sport_category = 'mlb';
	
	// Generates custom arguments for the WP_Query
	$args = array(
		'numberposts' => -1,
		'post_type' => array('video', 'athlete', 'team'),
		'pagination'             => true,
		'paged'                  => $paged,
		'posts_per_page'         => 24,
		'ignore_sticky_posts'    => false,
		'order'                  => 'ASC',
		'meta_query'			 => array (
			array (
				'key'	=>	'sport_category',
				'value'	=> $sport_category,
				'compare' => 'LIKE'
			)
		)
		
	);
	
}

if ($pageType == 'NHL') {
	
	$sport_category = 'nhl';
	
	// Generates custom arguments for the WP_Query
	$args = array(
		'numberposts' => -1,
		'post_type' => array('video', 'athlete', 'team'),
		'pagination'             => true,
		'paged'                  => $paged,
		'posts_per_page'         => 24,
		'ignore_sticky_posts'    => false,
		'order'                  => 'ASC',
		'meta_query'			 => array (
			array (
				'key'	=>	'sport_category',
				'value'	=> $sport_category,
				'compare' => 'LIKE'
			)
		)
		
	);
	
}

if ($pageType == 'NBA') {
	
	$sport_category = 'nba';
	
	// Generates custom arguments for the WP_Query
	$args = array(
		'numberposts' => -1,
		'post_type' => array('video', 'athlete', 'team'),
		'pagination'             => true,
		'paged'                  => $paged,
		'posts_per_page'         => 24,
		'ignore_sticky_posts'    => false,
		'order'                  => 'ASC',
		'meta_query'			 => array (
			array (
				'key'	=>	'sport_category',
				'value'	=> $sport_category,
				'compare' => 'LIKE'
			)
		)
		
	);
	
}

if ($pageType == 'Olympic') {
	
	// Sets variable static for Olympic, for now...
	$sport_category = 'Olympic';
		
	// Generates custom arguments for the WP_Query
	$args = array(
		'numberposts' => -1,
		'post_type' => array('video', 'athlete', 'team'),
		'pagination'             => true,
		'paged'                  => $paged,
		'posts_per_page'         => 24,
		'ignore_sticky_posts'    => false,
		'order'                  => 'DESC',
		//'orderby'                => 'rand',
		'meta_query'			 => array (
			'relation'		=> 'OR',
			array (
				'key'	=>	'Olympian',
				'value'	=> 'Summer Olympics',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'Olympian',
				'value'	=> 'Winter Olympics',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'amateur_level',
				'value'	=> 'Olympic',
				'compare' => 'LIKE'
			)
		)
		
	);
	
}

if ($pageType == 'More Sports') {
	
	// Generates custom arguments for the WP_Query
	$args = array(
		'numberposts' => -1,
		'post_type' => array('video', 'athlete', 'team'),
		'pagination'             => true,
		'paged'                  => $paged,
		'posts_per_page'         => 24,
		'ignore_sticky_posts'    => false,
		'order'                  => 'DESC',
		'orderby'                => 'rand',
		'meta_query'			 => array (
			'relation'		=> 'OR',
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Base Jumping',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'BMX',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Cycling',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Golf',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Gymnastics',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Motocross',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Skateboarding',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Skiing',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Skydiving',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Snowboarding',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Soccer',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Surfing',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Swimming',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Tennis',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Track and Field',
				'compare' => 'LIKE'
			),
			array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Volleyball',
				'compare' => 'LIKE'
			),
			/*array (
				'key'	=>	'other_sports_category',
				'value'	=> 'Wrestling',
				'compare' => 'LIKE'
			)*/
		)
	);
	
}

if ($pageType == 'Boxing') {
	
	// Sets variable static for MMA, for now...
	$sport_category = 'Boxing';
		
	// Generates custom arguments for the WP_Query
	$args = array(
		'numberposts' => -1,
		'post_type' => array('video', 'athlete', 'team'),
		'pagination'             => true,
		'paged'                  => $paged,
		'posts_per_page'         => 24,
		'ignore_sticky_posts'    => false,
		'order'                  => 'DESC',
		//'orderby'                => 'rand',
		'meta_query'			 => array (
			array (
				'key'	=>	'sport_category',
				'value'	=> $sport_category,
				'compare' => 'LIKE'
			)
		)
		//'meta_key'				 => 'sport_category',
		//'meta_value'			 => $sport_category
	);
	
}

if ($pageType == 'MMA') {
	
	// Sets variable static for MMA, for now...
	$sport_category = 'MMA';
		
	// Generates custom arguments for the WP_Query
	$args = array(
		'numberposts' => -1,
		'post_type' => array('video', 'athlete', 'team'),
		'pagination'             => true,
		'paged'                  => $paged,
		'posts_per_page'         => 24,
		'ignore_sticky_posts'    => false,
		'order'                  => 'DESC',
		//'orderby'                => 'rand',
		'meta_query'			 => array (
			array (
				'key'	=>	'sport_category',
				'value'	=> $sport_category,
				'compare' => 'LIKE'
			)
		)
		//'meta_key'				 => 'sport_category',
		//'meta_value'			 => $sport_category
	);
	
}

if ($pageType == 'Featured') {
	
	// Sets variable static for Featured, for now...
	$featured = 'YES';
		
	// Generates custom arguments for the WP_Query
	$args = array(
		'numberposts' => -1,
		'post_type' => array('video', 'athlete', 'team'),
		'pagination'             => true,
		'paged'                  => $paged,
		'posts_per_page'         => 24,
		'ignore_sticky_posts'    => false,
		'order'                  => 'DESC',
		//'post__not_in'			=> $_SESSION["duplicates"],
		//'orderby'                => 'rand',
		//'exclude'				=> $_SESSION["duplicates"],
		'meta_key'				 => 'featured_athlete',
		'meta_value'			 => $featured
		/*'meta_query'			=>	array (
			'relation'	=> 'AND',
			array (
				'key'		=> 'featured_athlete',
				'value'		=> $featured,
				'compare'	=> 'LIKE'
			),
			array (
				'key'		=> 'ID',
				'value'		=> $_SESSION["duplicates"],
				'compare'	=> 'NOT IN'
			)
		)*/
	);
	
}

if ($_SESSION['athlete']) {
	$athlete = $_SESSION['athlete'];
	//$_SESSION['athlete'] = "";
}

if ($_SESSION['video_category']) {
	$category = $_SESSION['video_category'];
}


// Set args for Athlete post
if ($athlete != null) {
$args = array(
	'cat' 					 => $cat_id,
	'numberposts'			 => -1,
	'post_type'  			 => $posttype,
	'pagination'             => true,
	//'orderby'				 => 'rand',
	'paged'                  => $paged,
	'posts_per_page'         => 24,
	'ignore_sticky_posts'    => false,
	'meta_query' => array(
			array(
				'key' => 'athletes',
				'value' => '"' . $athlete . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
				'compare' => 'LIKE'
			)
		),
	
	);
}

if ($pageType == "team") {

	if ($_SESSION['team']) {
		$team = $_SESSION['team'];
	}

	?>
	<script>console.log('<?php echo $team; ?>');</script>
	<?php

	// Set args for Team post
	if ($team != null) {
		// custom filter to replace '=' with 'LIKE'
		function my_posts_where( $where )
		{
			$where = str_replace("meta_key = 'sport_profile_%_team_id'", "meta_key LIKE 'sport_profile_%_team_id'", $where);
		 
			return $where;
		}
		 
		add_filter('posts_where', 'my_posts_where');
		 
		// args
		$args = array(
			'numberposts' => -1,
			'post_type' => array('video', 'athlete'),
			'pagination'             => true,
			'paged'                  => $paged,
			'posts_per_page'         => 24,
			'ignore_sticky_posts'    => false,
			'meta_key'				 => 'last_name',
			'order'                  => 'ASC',
			'orderby'                => 'meta_value',
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => 'sport_profile_%_team_id',
					'value' => '"' . $team . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
					'compare' => 'LIKE'
				),
				array(
					'key' => 'team',
					'value' => '"' . $team . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
					'compare' => 'LIKE'
				)
			)
		);
	}

}
	
if ($category != null) {
	
	if ($category != 'all videos') {

		// Set args for Athlete post
		if ($athlete != null) {
		$args = array(
			'cat' 					 => $cat_id,
			'numberposts'			 => -1,
			'post_type'  			 => $posttype,
			'pagination'             => true,
			//'orderby'				 => 'rand',
			'paged'                  => $paged,
			'posts_per_page'         => 24,
			'ignore_sticky_posts'    => false,
			'meta_query' => array(
					'relation' => 'AND',
					array(
						'key' => 'athletes',
						'value' => '"' . $athlete . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
						'compare' => 'LIKE'
					),
					array(
						'key' => 'video_categories_mobile',
						'value' => $category, 
						'compare' => 'LIKE'
					)
				),
			
			);
		}
	}
}
?>



<?php 
/* Executes Custom SQL Commands for User-uploaded Videos */

$sub_count = 0;

// All Athlete Videos
if ($athlete != null) {
	
	global $wpdb;
	//$stmt = "SELECT * FROM video_info_add WHERE athlete_id = " . $athlete;
	$stmt = "SELECT * FROM video_info_add WHERE athlete_id = " . $athlete . " ORDER BY video_date DESC";
	$results = $wpdb->get_results($stmt);
	
	// get a count of what we got
	$sub_count = count($results);
}

// Custom Categories
if ($category != null) {
	
	if ($category != 'all videos') {
		
		global $wpdb;
		$stmt = "SELECT * FROM video_info_add WHERE athlete_id = " . $athlete . " AND video_categories = '" . $category . "'" . " ORDER BY video_date DESC";
		$results = $wpdb->get_results($stmt);
		
		// get a count of what we got
		$sub_count = count($results);
	}
	
}

// display such information
$count = 0;



?>

<?php if (($athlete != null) && ($paged == 1)): ?>

<?php foreach($results as $result) : ?>

	
	<!-- three post wrapper -->
	<?php if( 0 == $count%3) : ?>
		<div class="threepostwrapper">
	<?php endif; ?>

	<a href="<?php echo $result->video_path; ?>" class="video" >
	
		<!-- The actual post -->
		<div class="post">
		
			<!-- The  thumbnail image, if present -->
			<div class="img-holder">
				<?php
					$image_url = $result->thumbnail_path;
				?>
				<?php if($image_url !=''): ?>
					<img class="thumbnail-image-mobile" src="<?php echo $image_url; ?>"/>	
				<?php endif; ?>
			</div>
		
			<!-- Overlays for the thumbnail image -->
			<div class="icon-overlay video-icon">
			
				<!-- video overlay, if applicable -->
				<div class="post-type-wrapper">

					<div class="video-time">
						<?php 
						$time = $result->video_duration;
						$time = substr_replace($time, ':', -2, 0);
						echo $time; 
						?>
					</div>
					
				</div>
				
				
			</div> <!-- end main thumbnail overlay -->
		
		</div> <!-- end post overlay -->
	
	</a>
	
	<!-- ends the wrapper -->
	<?php if(( 2 == $count%3) ) : ?>
	  </div><br>
	<?php endif; ?>

	<?php $count++; // adds one to our counter ?>

<?php endforeach; ?>

<?php endif; ?>



<?php
// Begins our new WP_query with our chosen args
$my_query = null;
$my_query = new WP_Query($args);

$post_holder = array();

// Begin the WP LOOP
// Runs WP Loop and captures $post data in an array ?>
<?php if( $my_query->have_posts() ) : ?>
	
	<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
  
		<?php array_push($post_holder, $post); ?>
  
    <?php endwhile; // end while for loop ?>

<?php endif; // end if for loop?>

<?php 
	// shuffles post order for single pages, if not athlete profile videos
	if (($athlete == null) && ($pageType != 'team')) {
	  shuffle($post_holder); 
	} 
?>

<!-- Runs through the posts as a psuedo-loop for WP -->
<?php foreach ($post_holder as $post) : ?>
	
	
	
	<!-- Adds the wrapper -->
	    <?php if( 0 == $count%3) : ?>
			<div class="threepostwrapper">
	    <?php endif; ?>
  
		<!-- This link around the entire thumbnail -->
		<a href="<?php echo get_permalink(); ?>" class="<?php echo get_post_type(); ?>" postid="<?php echo get_the_id(); ?>">
		
			<!-- The actual post -->
			<div class="post">
			
				<!-- The  thumbnail image, if present -->
				<div class="img-holder">
					<?php 
						$image = '';
						$image_url = '';
						//Look for Parent Thumnail Image
						if( get_field('thumbnail_image' ) ){ 
						$image = get_field('thumbnail_image');
						$image_url = $image['sizes']['medium'];}
					?>
					<?php if($image_url !=''): ?>
						<img class="thumbnail-image-mobile" src="<?php echo $image_url; ?>"/>	
					<?php endif; ?>
				</div>
				
				<!-- Overlays for the thumbnail image -->
				<div class="icon-overlay <?php echo get_post_type( $post ) ?>-icon">
				
					<!-- video overlay, if applicable -->
					<div class="post-type-wrapper">
						
						<?php 
						$posttype = get_post_type( $post );
						if($posttype == 'video') : ?>
							<div class="video-time"><?php echo get_field('video_duration'); ?></div>
						<?php endif; ?>
					</div>
					
					<!-- title overlay, if applicable -->
					<?php if ($posttype != 'video') : ?>
						<div class="title-overlay">
						
							<?php the_title();  ?>

						</div> <!-- end title-overlay -->
					<?php endif; ?>
					
				</div> <!-- end main thumbnail overlay -->
				
			</div> <!-- end post overlay -->
			
		</a> <!-- end post hyperlink -->
	
	
		<!-- ends the wrapper -->
		<?php if(( 2 == $count%3) || ($count == (($my_query->found_posts - 1) + $sub_count))) : ?>
		  </div><br>
		<?php endif; ?>
	
		<?php $count++; // adds one to our counter ?>

	

<?php endforeach; ?>

<!-- Append more posts -->
	<div class="next-posts-link-wrapper">
		<div class="next-posts-link" id="next-posts-link">
		
		</div>
	</div>

<script>
// for the window resize
$(document).ready(function() {
	//var contentwidth = Math.round( $( window ).width() );
	//var postwidth = Math.round(contentwidth/3);
	var contentwidth = Math.floor( $( window ).width() );
	var postwidth = Math.floor(contentwidth/3);
	$(".post").height((postwidth)-2);
	$(".post").width((postwidth)-4);
	//$("img").height((postwidth)-2);
	//$("img").width((postwidth)-4);
	$(".thumbnail-image-mobile").height((postwidth)-2);
	$(".thumbnail-image-mobile").width((postwidth)-4);
	$(".threepostwrapper").height((postwidth)-2);
	
	//$("#splash-logo-mobile").width((contentwidth)*0.65);
	//$("#splash-logo-mobile").height((contentwidth)*0.30);
});

$(window).resize(function() {
	//var contentwidth = Math.round( $( window ).width() );
	//var postwidth = Math.round(contentwidth/3);
	var contentwidth = Math.floor( $( window ).width() );
	var postwidth = Math.floor(contentwidth/3);
	$(".post").height((postwidth)-2);
	$(".post").width((postwidth)-4);
	//$("img").height((postwidth)-2);
	//$("img").width((postwidth)-4);
	$(".thumbnail-image-mobile").height((postwidth)-2);
	$(".thumbnail-image-mobile").width((postwidth)-4);
	$(".threepostwrapper").height((postwidth)-2);
	
	//$("#splash-logo-mobile").width((contentwidth)*0.65);
	//$("#splash-logo-mobile").height((contentwidth)*0.30);
});
</script>
