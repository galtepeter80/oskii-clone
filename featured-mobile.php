<?php 
/*Template Name: Featured-Mobile Page
*/
?>

<?php //error_reporting(E_ALL); ?>



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
	var pageType = 'Featured';
</script>

<?php //if (!(isset($_GET['visited']))) : ?>

<div id="splash-page-trans">

	<div id="splash-wrapper-mobile">
		
		<div id="splash-logo-wrapper">
			<img id="splash-logo-mobile" style="width: 55%;" id="splash-logo-mobile" src="./assets/images/oskii-logo-beta.png">
		</div>
		
		<!--
		<p class="splash-info-mobile" style="padding: 0 6.5vw">
			<i>noun</i>&emsp;|&emsp;os*kii&emsp;|&emsp;/,a&#776ske&#772/&emsp;
			<img id="pronounce" src="./assets/images/pronounce.png">
		</p>
		
		<ul id="splash-list">
		<li><p class="splash-info-mobile indent">
			the video encyclopedia of sports
		</p>
		
		<li><p class="splash-info-mobile indent">
			a sports + technology company that creates software to help athletes chronicle their athletic career
		</p>
		</ul>
		<p>
		<br><br><br><br><br><br><br><br>
		<div class="explore-line">
		
			<span id="explore-button">
				EXPLORE
			</span>
		
		</div>
		</p>-->
	
	</div>

	<div id="loader-splash-container">
		<div id="percentage-loaded">0</div>
		<div class="loading-spinner-mobile"></div>
	</div>
	
</div>

<?php //endif; ?>

<?php require './footer-mobile.php'; ?>