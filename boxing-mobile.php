<?php 
/*Template Name: Boxing-Mobile Page
*/
?>

<?php error_reporting(E_ALL); ?>



<?php require './header-mobile.php'; ?>

<?php $_SESSION['athlete'] = ""; ?>

<!--
*************************************
Oskiisports.com Youth Page for Mobile 
*************************************
-->

<div class="content-wrapper">
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
	var pageType = 'Boxing';
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