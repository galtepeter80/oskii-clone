<?php 
/*Template Name: Single-Athlete-Mobile Page
*/
?>

<?php //error_reporting(E_ALL); ?>

<?php require './header-mobile.php'; ?>

<!--
*************************************
Oskiisports.com Single-Athlete Page for Mobile 
*************************************
-->

<!-- Find the Athlete cover image, if there is one -->
<?php 
if ($_SESSION['athlete']) {
	$athlete = $_SESSION['athlete'];
}

if ($_SESSION['cover_image_url']) {
	$cover_image_url = $_SESSION['cover_image_url'];
}

if ($_SESSION['athlete_name']) {
	$athlete_name = $_SESSION['athlete_name'];
}

unset($_SESSION['video_category']);

if (isset($_GET['category'])) : ?>
	<?php $video_category = $_GET['category']; ?>
	<?php $_SESSION['video_category'] = $video_category; ?>
	<script>
	console.log('<?php echo $_SESSION['video_category']; ?>');
	var videoCategory = '<?php echo $_SESSION['video_category']; ?>';
	</script>
<?php else: ?>
	<script>
	var videoCategory = 'none';
	console.log(videoCategory);
	</script>
<?php endif; ?>


<div id="upload-form">

	<div id="upload-text">
	
	<p id="upload-overview">
	If you'd like to upload a video to the Oskii Profile of <?php echo $athlete_name; ?>, please fill out the following form. Please be sure to fill in every field. Thank you!
	</p>
	<br>

	<script type="text/javascript" src="wp-content/plugins/gravity-forms-advanced-file-uploader/inc/js/plupload/plupload.full.min.js"></script>
	<script type="text/javascript" src="/wp-content/plugins/gravity-forms-advance…s/plupload/jquery.plupload.queue/jquery.plupload.queue.min.js"></script>
	<script type="text/javascript" src="/wp-content/plugins/gravity-forms-advanced-file-uploader/inc/js/init_plupload_queue.js"></script>
	
	<?php 
		gravity_form( 1, false, false, false, null, false, '', true); 

	?>

	</div>

</div>


<!-- if we found an image -->
<?php if($cover_image_url !=''): ?>	
	<div id="featured-bg-mobile" style="background-image:url('<?php echo $cover_image_url; ?>')">
	
<!-- if we didn't -->
<?php else: ?>
	<div id="featured-bg-mobile" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/images/tri-bg.png'); background-repeat:repeat;background-size: auto;">
	
<?php endif; ?>

	<div class="top">
		<div class="swipearrow">
		</div>
	</div>

	<!-- Out Athlete's name -->
	<div id="athlete-name">
		<?php //echo $athlete_name; ?> 
	</div>

</div>

<script>
	var athleteName = '<?php echo $athlete_name; ?>';
	console.log("athleteName=" + athleteName);
</script>

<div class="content-wrapper-athlete">
    <div class="content">	
	
        <div id="newsstream" class="columns">
		
			<!-- Append more posts -->
            <div class="next-posts-link-wrapper">
                <div class="next-posts-link" id="next-posts-link">
                
                </div>
            </div>
        </div>
        
    </div>
</div>

<script>
	var pageType = 'athlete';
</script>

<!-- Initial Loading Page -->
<div id="splash-page-trans">

	<div id="splash-wrapper-mobile">
		
		<div id="splash-logo-wrapper">
			<img id="splash-logo-mobile" style="width: 55%;" id="splash-logo-mobile" src="./assets/images/oskii-logo-beta.png">
		</div>
		
	
	</div>

	<div id="loader-splash-container">
		<div id="percentage-loaded">0</div>
		<div class="loading-spinner-mobile"></div>
	</div>
	
</div>

<?php require './footer-mobile.php'; ?>