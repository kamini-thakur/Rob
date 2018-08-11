/*  Table of Contents 
01. MENU ACTIVATION
02. GALLERY JAVASCRIPT
03. FITVIDES RESPONSIVE VIDEOS
04. MOBILE SELECT MENU
05. HEADER OPACITY
06. Scroll to Top
07. TRANPARENT SLIDER BUTTON + PORTFOLIO
08. CHECKOUT HOVER
*/
/*
=============================================== 01. MENU ACTIVATION  ===============================================
*/
jQuery(document).ready(function($) {
	 'use strict';
	jQuery("ul.sf-menu").supersubs({ 
	        minWidth:    5,   // minimum width of sub-menus in em units 
	        maxWidth:    25,   // maximum width of sub-menus in em units 
	        extraWidth:  1     // extra width can ensure lines don't sometimes turn over 
	                           // due to slight rounding differences and font-family 
	    }).superfish({ 
			animationOut:  {opacity:'show'},
			speed:         200,           // speed of the opening animation. Equivalent to second parameter of jQuery’s .animate() method
			speedOut:      'fast',
			autoArrows:    true,               // if true, arrow mark-up generated automatically = cleaner source code at expense of initialisation performance 
			dropShadows:   false,               // completely disable drop shadows by setting this to false 
			delay:     400               // 1.2 second delay on mouseout 
		});
});



/*
=============================================== 02. GALLERY JAVASCRIPT  ===============================================
*/
jQuery(document).ready(function($) {
	 'use strict';
    $('.gallery-progression').flexslider({
		animation: "fade",      
		slideDirection: "horizontal", 
		slideshow: false,         
		slideshowSpeed: 7000,  
		animationDuration: 200,        
		directionNav: true,             
		controlNav: true               
    });
});


/*
=============================================== 03. FITVIDES RESPONSIVE VIDEOS  ===============================================
*/
jQuery(document).ready(function($) {  
	 'use strict';
$("body").fitVids();
});

/*
=============================================== 04. MOBILE SELECT MENU  ===============================================
*/





/*
=============================================== 06. Scroll to Top  ===============================================
*/
jQuery(document).ready(function($) {
	 'use strict';
    $(window).scroll(function(){ 
       });
       $('.scrollup').click(function(){
           $("html, body").animate({ scrollTop: 0 }, 300);
           return false;
       });
     
});



/*
=============================================== 07. TRANPARENT SLIDER BUTTON + PORTFOLIO  ===============================================
*/
/*
jQuery(window).load(function() {
*/

jQuery(document).ready(function($) {
	 'use strict';
	$('.portfolio-index-padding').transify({opacityOrig:0.8, percentWidth:'100%'});
});

/*
});
*/


/*
=============================================== 08. CHECKOUT HOVER  ===============================================
*/
jQuery(document).ready(function($) {
	 'use strict';
    var hide = false;
    $(".cart-hover-div").hover(function(){
        if (hide) clearTimeout(hide);
        $("#checkout-basket-iceberg").fadeIn();
    }, function() {
        hide = setTimeout(function() {$("#checkout-basket-iceberg").fadeOut("slow");}, 250);
    });
    $("#checkout-basket-iceberg").hover(function(){
        if (hide) clearTimeout(hide);
    }, function() {
        hide = setTimeout(function() {$("#checkout-basket-iceberg").fadeOut("slow");}, 250);
    });
});


/*
=============================================== 09. Header Scroll to Fixed Option  ===============================================
*/
jQuery(document).ready(function($) {
	 'use strict';
    $('#pro-header-fixed').scrollToFixed({ 
		spacerClass: 'pro-header-spacing',
		zIndex:'9999', dontSetWidth:'false'});
});

