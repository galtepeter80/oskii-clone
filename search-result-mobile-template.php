<?php 
/*Template Name:Search Result Mobile Template
*/
?>
    <?php
        remove_all_filters('posts_orderby');
		$posttype = array('video', 'athlete', 'brand', 'team', 'league'); //default post type is everything
		if ($_GET['posttype']) {
			$posttype = $_GET['posttype'] ;
		}
		
		$search = [];
		
		$search_count = 0;
		
		foreach ($_GET as $search_key => $search_value) {
			$search[$search_count] = $search_value;
			$search_count++;
		}
		
		
		/*if ($_GET['search']) {
			$search = $_GET['search'] ;
		}*/
		
		// we only want to see Athletes in our Search filter
		//$posttype = 'athlete';
		$posttype = array('athlete', 'team');
		
		$args = array(
				'post_type' => $posttype,
				'pagination'             => true,
				'paged'                  => $paged,
				'posts_per_page'         => '24',
				'ignore_sticky_posts'    => false,
				'orderby'				=> 'name',
				'order'					=> 'ASC',
				's' 				    => $search[0]				
			);
			
		
        $my_query = null;
        $my_query = new WP_Query($args);
		
		for ($num_queries = 1; $num_queries < $search_count; $num_queries++) {
		
			if ($search_count > $num_queries) {
				$args = array(
					'post_type' => $posttype,
					'pagination'             => true,
					'paged'                  => $paged,
					'posts_per_page'         => '24',
					'ignore_sticky_posts'    => false,
					'orderby'				=> 'name',
					'order'					=> 'ASC',
					's' 				    => $search[$num_queries]				
				);
				
				$second_query = null;
				$second_query = new WP_Query($args);
				
				$my_query->posts = array_unique( array_merge( $my_query->posts, $second_query->posts ), SORT_REGULAR );
				
				$my_query->post_count = count( $my_query->posts );
				
				//asort($my_query->posts);
			}
		
		}
		
		if ($search_count > 1) {
			$args = array(
					'post_type' => $posttype,
					'pagination'             => true,
					'paged'                  => $paged,
					'posts_per_page'         => '24',
					'ignore_sticky_posts'    => false,
					'orderby'				=> 'name',
					'order'					=> 'ASC',
					'meta_query'	=> array(
						'relation'	=> 'AND',
						array(
							'key'	=> 'first_name',
							'value'	=> $search[0],
							'compare' => 'LIKE',
						),
						array(
							'key'	=> 'last_name',
							'value'	=> $search[1],
							'compare' => 'LIKE',
						)
					)				
				);
				
			$refined_query = null;
			$refined_query = new WP_Query($args);
			
			$my_query->posts = array_unique( array_merge( $refined_query->posts, $my_query->posts ), SORT_REGULAR );
				
			$my_query->post_count = count( $my_query->posts );
		}
		
        if( $my_query->have_posts() ) {
          while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<!-- testing -->
	
	<?php $check_empty = get_the_id(); ?>
	<?php if (!(empty($check_empty))) : ?>
	
	
	   <!-- 
		<a href="<?php echo get_permalink(); ?>" class="<?php echo get_post_type(); ?>" postid="<?php echo get_the_id(); ?>">
		<li class="post">
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
					<img src="<?php echo $image_url; ?>"/>	
				<?php endif; ?>
			</div>
			<div class="icon-overlay <?php echo get_post_type( $post ) ?>-icon">
				<div class="post-type-wrapper">
					<div class="post-type-label <?php echo get_post_type( $post ) ?>"><?php echo get_post_type( $post ) ?></div>
					<?php 
					$posttype = get_post_type( $post );
					if($posttype == 'video') : ?>
						<div class="video-time"><?php echo get_field('video_duration'); ?></div>
					<?php endif; ?>
				</div>
				<div class="title-overlay"><?php the_title(); ?></div>
			</div>
		</li>
		</a>-->
		
		<a href="<?php echo get_permalink(); ?>" class="search-link-mobile" postid="<?php echo get_the_id(); ?>">
		<div>
			
			<?php 
				$image = '';
				$image_url = '';
				//Look for Parent Thumnail Image
				if( get_field('thumbnail_image' ) ){ 
				$image = get_field('thumbnail_image');
				$image_url = $image['sizes']['medium'];}
			?>
			<?php if($image_url !=''): ?>
				<img src="<?php echo $image_url; ?>" class="search-pic-mobile"/>	
			<?php endif; ?>
			
			<?php $athlete_search_id = get_the_id(); ?>
			
			<?php 
			
			$postTypeCount = get_post_type($post);
			
			if ($postTypeCount == "athlete") {
			
				$new_args = null;
				
				$new_args = array(
					'cat' 					 => $cat_id,
					'numberposts'			 => -1,
					'post_type'  			 => 'video',
					'meta_query' => array(
							array(
								'key' => 'athletes',
								'value' => '"' . $athlete_search_id . '"',
								'compare' => 'LIKE'
							)
						
						),
					
					);
					
				$new_query = null;
				$new_query = new WP_Query($new_args);	

				$video_count = $new_query->found_posts;
			
			}
			
			if ($postTypeCount == "team") {
				
				$video_count = ' ';
				
			}
?>
			
			<li class="search-item-mobile">
			<div class="search-name-div"><?php the_title(); ?><span class="video-count"><?php echo $video_count; ?></span></div>
			
		</li>
		</div>
		</a>
	
	 
	
	<?php endif; ?>
	   
    <?php
          endwhile;
        }
        wp_reset_query();  // Restore global post data stomped by the_post().
        ?>
    <!--<div class="next-posts-link-wrapper">
        <div class="next-posts-link" id="next-posts-link">
        </div>
    </div>-->
<script>
// for the window resize
	$(document).ready(function() {
		var contentheight = Math.round( $(".horizontalContent .content").height() );
		var postheight = Math.round(contentheight/3);
		$(".post").height((postheight)-2);
		$(".post").width((postheight)+1);
		$("#newsstream").width((postheight));
		
		var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
	
		if (iOS) {
			$('.search-link-mobile').addClass('search-link-ios-adjust');
			$('.search-pic-mobile').addClass('search-pic-ios-adjust');
		}
	});
	
	
</script>