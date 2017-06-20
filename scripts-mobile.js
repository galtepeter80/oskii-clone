

// Function to Reset and Disappear all Menus
function resetAllMenus() {
	
	// remove blue
	if ($('.bottom-nav-button#bottom-nav-menu').hasClass('bottom-nav-blue')) {
		$('.bottom-nav-button#bottom-nav-menu').removeClass('bottom-nav-blue');
	}
	if ($('.bottom-nav-button#bottom-nav-search').hasClass('bottom-nav-blue')) {
		$('.bottom-nav-button#bottom-nav-search').removeClass('bottom-nav-blue');
	}
	if ($('.bottom-nav-button#bottom-nav-upload').hasClass('bottom-nav-blue')) {
		$('.bottom-nav-button#bottom-nav-upload').removeClass('bottom-nav-blue');
	}
	if ($('.bottom-nav-button#bottom-nav-bookmark').hasClass('bottom-nav-blue')) {
		$('.bottom-nav-button#bottom-nav-bookmark').removeClass('bottom-nav-blue');
	}
	if ($('.bottom-nav-button#bottom-nav-profile').hasClass('bottom-nav-blue')) {
		$('.bottom-nav-button#bottom-nav-profile').removeClass('bottom-nav-blue');
	}
	if ($('#share-button-mobile').hasClass('shareblue')) {
		$('#share-button-mobile').removeClass('shareblue');
	}
	if ($('#video-counter-mobile').hasClass('counterblue')) {
		$('#video-counter-mobile').removeClass('counterblue');
	}
	if ($('#video-counter-mobile').hasClass('select')) {
		$('#video-counter-mobile').removeClass('select');
	}
	if ($('#video-counter-mobile').hasClass('select-blue')) {
		$('#video-counter-mobile').removeClass('select-blue');
	}
	
	// restore bottom nav, if needed
	if ($('#bottom-nav-wrapper').hasClass('gone')) {
		$('#bottom-nav-wrapper').removeClass('gone');
	}
	
	// remove menus
	if (!$('#athlete-categories').hasClass('invisible')) {
		$('#athlete-categories').addClass('invisible');
	}
	if (!$('#share-menu-mobile').hasClass('invisible')) {
		$('#share-menu-mobile').addClass('invisible');
	}
	if (!$("#athlete-infobox").hasClass('invisible')) {
		$("#athlete-infobox").addClass('invisible');
	}
	if (!$("#team-infobox").hasClass('invisible')) {
		$("#team-infobox").addClass('invisible');
	}
	if ($("#dropdown-wrapper-mobile").hasClass('active')) {
		$("#dropdown-wrapper-mobile").removeClass('active');
	}
	if ($("#search-wrapper-mobile").hasClass('active')) {
		$("#search-wrapper-mobile").removeClass('active');
	}
	if (!$('#clipboard-to-copy').hasClass('invis')) {
		$('#clipboard-to-copy').addClass('invis');
	}
	if ($("#upload-form").hasClass("gone")) {
		$("#upload-form").removeClass("gone");
	}
	
	//correct the invisible menu 
	if (pageType != 'athlete') {
		if (!$('#video-counter-mobile').hasClass('invisible')) {
		$('#video-counter-mobile').addClass('invisible');
	}
	}
	
	//console.log("Script Athlete Name = " + athleteName);
	
	// restore headline
	if (pageType == 'athlete') {
		$('#headline-text-mobile').html(athleteName + '<img id="headline-text-arrow" src="./assets/images/white-dropdown-arrow-down.png">');
	}
	else if (pageType == 'team') {
		$('#headline-text-mobile').html(athleteName + '<img id="headline-text-arrow" src="./assets/images/white-dropdown-arrow-down.png">');
	}
	else {
		$('#headline-text-mobile').html(pageType);
	}
}

$(function() {
	
	// Set initial function to find if object is on screen
	$.fn.isOnScreen = function(){
		
		var win = $(window);
		
		var viewport = {
			top : win.scrollTop(),
			left : win.scrollLeft()
		};
		viewport.right = viewport.left + win.width();
		viewport.bottom = viewport.top + win.height();
		
		var bounds = this.offset();
		bounds.right = bounds.left + this.outerWidth();
		bounds.bottom = bounds.top + this.outerHeight();
		
		return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
		
	};

	var page = 1;

	// loads next content page if next-posts-link is on screen
	$(document).ready(function(){
			if ($('.next-posts-link').length) {
				if( $('.next-posts-link').isOnScreen() == true ) {
					if( pageType != '' && pageType != null)
						{appendage = '?pageType=' + pageType};
					$.get('/content-loader-mobile/page/' + page +'/' + appendage ,function(data) {
						$('#newsstream').append(data);
						page++;
					});
					
					$('.next-posts-link').replaceWith('');
					$('.next-posts-link-wrapper').delay(2000).replaceWith('');
					
				}
			}
			
	});
	
	$(window).scroll(function(){
			if ($('.next-posts-link').length) {
				if( $('.next-posts-link').isOnScreen() == true ) {
					if( pageType != '' && pageType != null)
						{appendage = '?pageType=' + pageType};
					$.get('/content-loader-mobile/page/' + page +'/' + appendage ,function(data) {
						$('#newsstream').append(data);
						page++;
					});
					
					$('.next-posts-link').replaceWith('');
					$('.next-posts-link-wrapper').delay(2000).replaceWith('');
				}
			}
			
	});
	
	// toggling the upload form
	$('.bottom-nav-button#bottom-nav-upload').click(function() {
		if ($("#upload-form").hasClass('gone')) {
			$("#upload-form").removeClass("gone");
		}
		else {
			resetAllMenus();
			$("#upload-form").addClass("gone");
		}
	});
	
	// for toggling the nav-button and search-button
	$(document).ready(function() {

		// bottom nav button
		$('#bottom-nav-menu').click(function() {
			
			if ($('#dropdown-wrapper-mobile').hasClass('active')) {
				resetAllMenus();
			}
			else {
				resetAllMenus();
				$('#dropdown-wrapper-mobile').addClass('active');
				$('.bottom-nav-button#bottom-nav-menu').addClass('bottom-nav-blue');
				$('#headline-text-mobile').html('Categories');
				$('#bottom-nav-wrapper').addClass('gone');
			}
			
			
		});	
		
		// close bottom nav
		$('#dropdown-large-close').click(function() {
			resetAllMenus();
		});
		
		// search menu scripts
		
		$('#bottom-nav-search').click(function() {
		
			if ($('#search-wrapper-mobile').hasClass('active')) {
				resetAllMenus();
			}
			else {
				resetAllMenus();
				$('#search-wrapper-mobile').addClass('active');
				$('.bottom-nav-button#bottom-nav-search').addClass('bottom-nav-blue');
				$("#search-box-mobile input").focus();
				$('#headline-text-mobile').html('Find Athletes');
				$('#share-button-mobile').addClass('shareblue');
			}
			
		});	
		
		// search menu remover button 'cancel'
		$('#search-close-button-mobile').click(function() {
			$("#search-box-mobile input").val('');
			$( "#search-results-mobile ul" ).html('');
			$("#search-box-mobile input").focus();
		});
		
		
		
	});
	
});

$(function() {
 
    $('#search-box-mobile').keyup(function() {
        // getting the value that user typed
        var searchString    = $("#search_box-mobile").val();
         
		 //console.log(searchString);
		 
        // if searchString is not empty
        if(searchString) {
            // ajax call
			
			$( "#search-results-mobile ul" ).html('');
			var tempURL = "/search-mobile-results?";
			
			if (searchString != null) {
				//tempURL = tempURL + "search=" + searchString;
				
				//check if search string has multiple strings
				if (searchString.search(' ') != -1) {
					
					// split the searchString into multiple values
					var searchTerms = searchString.split(' ');
					
					// go through each search term 
					for (var terms = 0; terms < searchTerms.length; terms++) {
						
						// check for an empty search term
						if (searchTerms[terms] != "") {
							
							// add all search terms into the tempURL
							if (terms > 0) {
								tempURL += '&';
							}
							tempURL += 'search' + terms + '=' + searchTerms[terms];
							
						}
						
					}
					
				}
				
				// if not a multiple search term value
				else {
					tempURL = tempURL + "search=" + searchString;
				}
				
				//console.log(tempURL);
				
			};
			$( "#search-results-mobile ul" ).load(tempURL);
			$( "#search-results-mobile ul" ).fadeIn();  
			//console.log(tempURL);
        }
	
		
        return false;
    });
	
	// for closing the search menu
	$("#search-box-mobile .close-button-mobile").click(function(){
		$("#search-box-mobile input").val('');
		$( "#search-results-mobile ul" ).html('');
		$("#search-wrapper-mobile input").focus();
	});
});

//$(function() {
	/*	
	$("#headline-text-mobile").click(function() {
		//console.log("clicked");
		if (pageType == 'athlete') {
			//console.log("athlete page");
			/*
			if ($("#athlete-infobox").hasClass('invisible')) {
				$("#athlete-infobox").removeClass('invisible');
				$("#headline-text-arrow").attr('src', './assets/images/white-dropdown-arrow-up.png');
			}
			else {
				$("#athlete-infobox").addClass('invisible');
				$("#headline-text-arrow").attr('src', './assets/images/white-dropdown-arrow-down.png');
			}*/
			/*
			if ($("#athlete-categories").hasClass('invisible')) {
				$("#athlete-categories").removeClass('invisible');
				$("#headline-text-arrow").attr('src', './assets/images/white-dropdown-arrow-up.png');
			}
			else {
				$("#athlete-categories").addClass('invisible');
				$("#headline-text-arrow").attr('src', './assets/images/white-dropdown-arrow-down.png');
			}
			
			// disappear search menu
			if ($('#search-mobile').hasClass('active')) {
				$("#search-icon-mobile").removeClass("icon icon-cross-mobile");
				$("#search-icon-mobile").addClass("icon icon-mag-icon-mobile");
				$("#search-mobile").toggleClass('active');
				$("#search-wrapper-mobile").toggleClass('active');
				
				if (pageType == 'athlete') {
					//$('#headline-text-mobile').html(athleteName);
					$('#headline-text-mobile').html(athleteName + '<img id="headline-text-arrow" src="./assets/images/white-dropdown-arrow-up.png">');
				}
				else {
					$('#headline-text-mobile').html(pageType);
				}
			}
			
			// disappear filter menu
			if ($('#filter-mobile').hasClass('active')) {
				$("#filter-mobile").toggleClass('active');
				$("#dropdown-wrapper-mobile").toggleClass('active');
				$("#filter-icon-mobile").removeClass("icon icon-cross-mobile");
				$("#filter-icon-mobile").addClass("icon icon-mag-icon-mobile");
				
				if (pageType == 'athlete') {
					$('#headline-text-mobile').html(athleteName + '<img id="headline-text-arrow" src="./assets/images/white-dropdown-arrow-up.png">');
				}
				else {
					$('#headline-text-mobile').html(pageType);
				}
			}
		
		}
		
	});
	
});
*/

$(function() {
	
	$("#coming-soon").click(function() {
		
		$("#coming-soon").addClass("blue");
		$("#coming-soon").html("Coming Soon");
		setTimeout(function() {
			$("#coming-soon").removeClass("blue");
			$("#coming-soon").html("products");
		}, 3000);
		
	});
	
});

/*
$(function() {
	
	$("#explore-button").click(function() {
		
		$("#splash-page-trans").addClass('gone');
		$("#splash-wrapper-mobile").addClass('gone');
		
		setTimeout(function() {
			$("#splash-wrapper-mobile").addClass('none');
		}, 1000);
		
	});
	
});
*/


$(function() {
	
	$('#video-counter-mobile').click(function() {	
		if ($("#video-counter-mobile").hasClass("select")) {
			
			$("#video-counter-mobile").addClass("select-blue");
			
			/* The following solution found at:
				http://stackoverflow.com/questions/985272/selecting-text-in-an-element-akin-to-highlighting-with-your-mouse
				
			*/
			
			var doc = document, text = doc.getElementById('clipboard-to-copy-text'), range, selection
			;    
			if (doc.body.createTextRange) {
				range = document.body.createTextRange();
				range.moveToElementText(text);
				range.select();
			} else if (window.getSelection) {
				selection = window.getSelection();        
				range = document.createRange();
				range.selectNodeContents(text);
				selection.removeAllRanges();
				selection.addRange(range);
			}
			
			/* End Found Solution */
			
		}
	});
	
});


// Top Menu Navigation Scripts

$(function() {
	
	if (pageType == 'team') {
				
				
		$("#headline-text-mobile").click(function() {
			if ($("#team-infobox").hasClass('invisible')) {
				resetAllMenus();
				$("#team-infobox").removeClass('invisible');
				$("#headline-text-arrow").attr('src', './assets/images/white-dropdown-arrow-up.png');
			}
			else {
				$("#team-infobox").addClass('invisible');
				$("#headline-text-arrow").attr('src', './assets/images/white-dropdown-arrow-down.png');
			}
		});
	}
	
	if (pageType == 'athlete') {
		
		$('#video-counter-mobile').click(function() {
		
			if (!$("#video-counter-mobile").hasClass("select")) {
		
				if ($('#athlete-categories').hasClass('invisible')) {
					resetAllMenus();
					$('#athlete-categories').removeClass('invisible');
					$('#video-counter-mobile').addClass('counterblue');
				}
				else {
					//$('#athlete-categories').addClass('invisible');
					resetAllMenus();
				}
			
			}
		});
		
		$("#headline-text-mobile").click(function() {
			
			if (pageType == 'athlete') {
				
				if ($("#athlete-infobox").hasClass('invisible')) {
					resetAllMenus();
					$("#athlete-infobox").removeClass('invisible');
					$("#headline-text-arrow").attr('src', './assets/images/white-dropdown-arrow-up.png');
				}
				else {
					$("#athlete-infobox").addClass('invisible');
					$("#headline-text-arrow").attr('src', './assets/images/white-dropdown-arrow-down.png');
				}
			}
			
			
		});
		
	}
	
	$('#share-button-mobile').click(function() {
		
		/*if ($('#share-menu-mobile').hasClass('invisible')) {
			resetAllMenus();
			$('#share-menu-mobile').removeClass('invisible');
			$('#share-button-mobile').addClass('shareblue');
		}
		else {
			//$('#share-menu-mobile').addClass('invisible');
			resetAllMenus();
		}*/
		
		if ($('#share-button-mobile').hasClass('shareblue')) {
		//resetAllMenus();
		}
		else {
			//resetAllMenus();
			//if ($('#share-menu-mobile').hasClass('invisible')) {
			//resetAllMenus();
			//$('#share-menu-mobile').removeClass('invisible');
			//$('#share-button-mobile').addClass('shareblue');
		}
		//}

	});
});

// Bottom Navigation Menu Scripts

$(function() {
	
	// dynamic resizing
	$(document).ready(function() {
		var bottomWidth = Math.floor( $( window ).width() );
		var bottomButtonWidth = Math.floor(bottomWidth/5);
		$('.bottom-nav-button').width( (bottomButtonWidth) - 4);
	});
	
	$(window).resize(function() {
		var bottomWidth = Math.floor( $( window ).width() );
		var bottomButtonWidth = Math.floor(bottomWidth/5);
		$('.bottom-nav-button').width( (bottomButtonWidth) - 4);
	});
	
	// for button clicking
	$('.bottom-nav-button#bottom-nav-menu').click(function() {
		if ($('.bottom-nav-button#bottom-nav-menu').hasClass('bottom-nav-blue')) {
			$('.bottom-nav-button#bottom-nav-menu').removeClass('bottom-nav-blue');
		}
		else {
			$('.bottom-nav-button').removeClass('bottom-nav-blue');
			$('.bottom-nav-button#bottom-nav-menu').addClass('bottom-nav-blue');
		}
	});
	
	$('.bottom-nav-button#bottom-nav-search').click(function() {
		if ($('.bottom-nav-button#bottom-nav-search').hasClass('bottom-nav-blue')) {
			$('.bottom-nav-button#bottom-nav-search').removeClass('bottom-nav-blue');
		}
		else {
			$('.bottom-nav-button').removeClass('bottom-nav-blue');
			$('.bottom-nav-button#bottom-nav-search').addClass('bottom-nav-blue');
			//$('#share-button-mobile').addClass('shareblue');
		}
	});

	$('.bottom-nav-button#bottom-nav-upload').click(function() {
		if (pageType == 'athlete') {
		if ($('.bottom-nav-button#bottom-nav-upload').hasClass('bottom-nav-blue')) {
			$('.bottom-nav-button#bottom-nav-upload').removeClass('bottom-nav-blue');
		}
		else {
			//resetAllMenus();
			$('.bottom-nav-button').removeClass('bottom-nav-blue');
			$('.bottom-nav-button#bottom-nav-upload').addClass('bottom-nav-blue');
		}
		}
	});
	
	/*
	$('.bottom-nav-button#bottom-nav-bookmark').click(function() {
		
		if ($('.bottom-nav-button#bottom-nav-bookmark').hasClass('bottom-nav-blue')) {
			$('.bottom-nav-button#bottom-nav-bookmark').removeClass('bottom-nav-blue');
		}
		else {
			resetAllMenus();
			$('.bottom-nav-button').removeClass('bottom-nav-blue');
			$('.bottom-nav-button#bottom-nav-bookmark').addClass('bottom-nav-blue');
		}
	});
	
	$('.bottom-nav-button#bottom-nav-profile').click(function() {
		if ($('.bottom-nav-button#bottom-nav-profile').hasClass('bottom-nav-blue')) {
			$('.bottom-nav-button#bottom-nav-profile').removeClass('bottom-nav-blue');
		}
		else {
			resetAllMenus();
			$('.bottom-nav-button').removeClass('bottom-nav-blue');
			$('.bottom-nav-button#bottom-nav-profile').addClass('bottom-nav-blue');
		}
	});
	*/
	
	
});

// Sets the Splash Page Loading Spinner and Counter
$(function() {
	
	$(document).ready(function() {
	
		var percentageLoaded = 0;
		
		function loaderCount() {
			$('#percentage-loaded').html(percentageLoaded);
			percentageLoaded++;
		}
	
		var percent = setInterval(function() {
			if (percentageLoaded < 101) {
				loaderCount();
			}
			else {
				$("#splash-page-trans").addClass('gone');
				$("#splash-wrapper-mobile").addClass('gone');
				
				setTimeout(function() {
					$("#splash-wrapper-mobile").addClass('none');
				}, 1000);
				
				clearInterval(percent);
			}
		}, 12.5);
		
	
	});
		
});

// for the device orientation checker
$(function() {
	/*
	$(window).resize(function() {	
		if (window.innerHeight < window.innerWidth) {
			$('#device-orientation-checker').addClass("visible");
		}
		else {
			if ($('#device-orientation-checker').hasClass("visible")) {
				$('#device-orientation-checker').removeClass("visible");
			}
		}
	});
	*/
	$(window).on("orientationchange", function() {
		if (window.orientation != 0) {
			$('#device-orientation-checker').addClass("visible");
		}
		else {
			if ($('#device-orientation-checker').hasClass("visible")) {
				$('#device-orientation-checker').removeClass("visible");
			}
		}
	});
	
});

$(function() {

	// for the in-line video player
	$(document).on('click', '.video', function(e) {
		e.preventDefault();
		//console.log('taco');
		$('#video-layer-mobile').removeClass('invisible');
		$('#video-layer-mobile').html("<iframe style='width: 100%; height: 100%; overflow: hidden;' frameborder='0' src='" + this.href + "' allowfullscreen></iframe>");
		$('#close-button').removeClass('invisible');
		$('#video-layer-canvas').removeClass('invis');
	});

	$(document).on('click', '#close-button', function() {
		$('#video-layer-mobile').addClass('invisible');
		$('#video-layer-mobile').html('');
		$('#close-button').addClass('invisible');
		$('#video-layer-canvas').addClass('invis');
	});

	$(document).on('click', '#video-layer-canvas', function() {
		$('#video-layer-mobile').addClass('invisible');
		$('#video-layer-mobile').html('');
		$('#close-button').addClass('invisible');
		$('#video-layer-canvas').addClass('invis');
	});

});
