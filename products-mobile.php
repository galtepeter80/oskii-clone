<?php 
/*Template Name: Products-Mobile Page
*/
?>

<?php //error_reporting(E_ALL); ?>



<?php require './header-mobile.php'; ?>

<?php $_SESSION['athlete'] = ""; ?>

<!--
*************************************
Oskiisports.com Products Page for Mobile 
*************************************
-->

<div id="products-wrapper">
	
	<!-- Products Slide Picker
	<div id="products-slide-picker">
		<div id="products-slide-athlete" class="products-slide">
		</div>
		<div id="products-slide-team" class="products-slide">
		</div>
	</div>-->
	
	<!-- Products Athlete Section -->
	<div id="products-athlete-section">
		<div class="products-section">
			<br>
			<div id="products-image-section">
				<img src='assets/images/iphone-athlete.png' id="products-iphone-pic"/>
			</div>
			<div class="products-text-section">
			
				<p class="products-headline">
					ALL YOUR SPORTS VIDEOS, IN ONE PLACE
				</p>
				<p class="products-description">
					Oskii is the home for your sports videos. Use Oskii to gather, share and archive video footage from your athletic career in one easy online platform - no matter what sport or level of competition you play. Your videos are safe and accessible no matter where or when you need them.
				</p>
				
				<p class="products-byline">
					CHRONICLE YOUR CAREER

				</p>
				<p class="products-description">
					Your profile is a personal, dedicated web page that features your video library and any personal information that you would like to display such as your height, weight and grade level.
				</p>
				
				<p class="products-byline">
					PLENTY OF SPACE
				</p>
				<p class="products-description">
					With unlimited video uploads, you can securely gather and store all of your sports videos from current and past seasons from any computer or mobile device. Keep everything safe and in one place.
				</p>
				
				<p class="products-byline">
					KEEP FANS ENGAGED
				</p>
				<p class="products-description">
					Keep fans and supporters engaged by sharing the link to your profile page each time you post a new video. You can post the link on social media or send it directly to teammates, family, friends and recruiters.
				</p>
				
				<p class="products-headline">
					THERE ARE LOTS OF ATHLETES ON OSK<span style="text-transform: lowercase;">ii</span> <br>
					HERE ARE JUST A FEW:
				</p>
				
			</div>
			
			<div class="products-image-section" id="products-athlete-scroller">
				
				<div id="products-scroller-outside" onscroll="scrollColor()">
					
					<div id="products-scroller-inside">
					
						<div class="products-scroller-section" id="products-scroller-section-left">
							<a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/athlete/brandon-biggs">
								<img src='assets/images/brandon-biggs-circle.png' class="products-image-circle"/>
							</a>
							<p class="products-byline scroller">
								Brandon Biggs
							</p>
							<p class="products-subheading">
								6th Grade
							</p>
							
						</div>
						
						<div class="products-scroller-section scroller" id="products-scroller-section-right">
							<img src='assets/images/jordan-white-circle.png' class="products-image-circle"/>
							<p class="products-byline scroller">
								Jordan White
							</p>
							<p class="products-subheading">
								High School
							</p>
							
						</div>
					
					</div>
				
				</div>
			
			</div>
			
			<div class="products-progress-bar" id="products-athlete-progress-bar">
				<div id="products-progress-left" class="products-progress-color-blue">
				</div>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<div id="products-progress-right" class="products-progress-color-gray">
				</div>
			</div>
			
			<br><Br>
			
			<div class="products-text-section">
				
				<p class="products-headline">
				FREQUENTLY ASKED QUESTIONS
				</p>
				
				<p class="products-byline">
					HOW MANY VIDEOS CAN I UPLOAD?
				</p>
			
				<p class="products-description">
					You can upload an unlimited amount of videos to your profile. The purpose of your profile is to chronicle your entire athletic career, so we encourage users to upload all of the relevant footage they have in their possession from current and past seasons. 
				</p>
				
				<p class="products-byline">
					ARE THERE ANY RESTRICTIONS FOR VIDEO UPLOADS?
				</p>
			
				<p class="products-description">
					By default, you can upload videos that are up to 15 minutes long and the supported file formats are listed below:
					<br><br>
					.MOV <br>
					.MPEG4 <br>
					.MP4 <br>
					.AVI <br>
					.WMV <br>
					.MPEGPS <br>
					.FLV <br>
				</p>
				
				<p class="products-byline">
					DO I NEED TO BUY A CAMERA TO RECORD MY GAMES? 
				</p>
			
				<p class="products-description">
					No. There's no need for expensive equipment. Record games, and training sessions with your mobile phone, tablet or hard drive camera.
				</p>
			</div>
			
			<p class="products-headline">
				Ready to Get Started?
			</p>
			
			<a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/oskii/signup-mobile.php">
			<button id="products-button">Click here to Sign Up</button></a>
			<br><Br><br><br><Br><br><br><br><br><br><br>
			
		</div>
	</div>
	
	<!-- Products Team Section 
	<div id="products-athlete-section">
		<div class="products-section">
			<div class="products-image-section">
				Team Image
			</div>
			<div class="products-text-section">
				Text
			</div>
			<div class="products-image-section" id="products-team-scroller">
				Team Scroller
			</div>
			<div class="products-progress-bar" id="products-athlete-progress-bar">
				Progress
			</div>
			<div class="products-text-section">
				Text
			</div>
		</div>
	</div>-->
	
</div>

<script>
	var pageType = 'Products';
</script>

<script>
	function scrollColor() {
		var outside = document.getElementById("products-scroller-outside");
		var a = outside.scrollLeft;
		var b = outside.scrollWidth - outside.clientWidth;
		var c = a / b;
		if (c < 0.5) {
			$("#products-progress-left").removeClass("products-progress-color-gray");
			$("#products-progress-left").addClass("products-progress-color-blue");
			$("#products-progress-right").removeClass("products-progress-color-blue");
			$("#products-progress-right").addClass("products-progress-color-gray");
		}
		else {
			$("#products-progress-right").removeClass("products-progress-color-gray");
			$("#products-progress-right").addClass("products-progress-color-blue");
			$("#products-progress-left").removeClass("products-progress-color-blue");
			$("#products-progress-left").addClass("products-progress-color-gray");
		}
	}
</script>

<?php require './footer-mobile.php'; ?>