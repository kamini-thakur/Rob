"use strict";

// Header submenu fix
window.onload = menufix;

function menufix() {
	var nav = document.getElementById('main-nav');
	var submenu = document.getElementsByClassName('submenu big-submenu');
	
	var navoffset = nav.getBoundingClientRect();
	
	for(var i=0;i<submenu.length;i++) {
		var smoffset = submenu[i].getBoundingClientRect();
		var fixedoffset = smoffset.left - navoffset.left;
		submenu[i].style.marginLeft = '-' + fixedoffset + 'px';
	}
}

// Currency dropdown

// Show/Hide Shop Grid or Shop List view
function grid_list(show, hide) {
		document.getElementById(show).style.display = 'block';
		document.getElementById(hide).style.display = 'none';
}
$('.featured-product').each(function() {
$('.add-to-cart.open').on('click', function(){
    $(this).parents('.p1').find('.actions').addClass('show');
    $(this).parents('.p1').find('.open').addClass('hide');
    $(this).parents('.p1').find('.close').addClass('show close');
});
 });

$('.featured-product').each(function() {
$('.add-to-cart.close').on('click', function(){
   $(this).parents('.p1').find('.actions').removeClass('show');
   $(this).parents('.p1').find('.open').removeClass('hide');
   $(this).parents('.p1').find('.close').removeClass('show');
});
 });

// function show_actions(product_id) {
// 	var product = document.getElementById(product_id);
// 	var actions = product.getElementsByClassName('actions')[0];
// 	var add_to_cart = product.getElementsByClassName('add-to-cart')[0];
// 	var close = product.getElementsByClassName('close')[0];
	
// 	actions.className = 'actions show';
// 	add_to_cart.className = 'add-to-cart hide';
// 	close.className = 'add-to-cart close show';
// }

// function hide_actions(product_id) {
// 	var product = document.getElementById(product_id);
// 	var actions = product.getElementsByClassName('actions')[0];
// 	var add_to_cart = product.getElementsByClassName('add-to-cart')[0];
// 	var close = product.getElementsByClassName('close')[0];
	
// 	actions.className = 'actions';
// 	add_to_cart.className = 'add-to-cart show';
// 	close.className = 'add-to-cart close';
// }


// Open big search
$(document).ready(function(){
	$('.search-open').on('click', function() {
		var search_container = $('#bigsearch');
		search_container.addClass('show');		
	});
	
	$('#bigsearch .close-search').on('click', function() {
		var search_container = $('#bigsearch');
		search_container.removeClass('show');		
	});
});

// Mobile navigation
$(document).ready(function(){
	$('.nav-open').click(function() {
		var nav = $('#mobile-nav');
		var logo = $('#mobile-header #logo');
		var nav_open = $('.nav-open');
		nav.toggleClass('opened');		
		
		if(nav.hasClass('opened')) {
			nav_open.css('left', nav.css('width'));
		} else {
			nav_open.css('left', '0');
		}
		
	});
});

function show_submenu(id) {
	var submenu = document.getElementById(id);
	if(submenu.style.height == 'auto') {
		submenu.style.height = '0';
	} else {
		submenu.style.height = 'auto';
	}
}

function open_cat(id) {
	var cat = document.getElementById(id);
	
	if(cat.style.height == 'auto') {
		cat.style.height = '0';
	} else {
		cat.style.height = 'auto';
	}
}


// Custom HTML select elements

// source: http://jsfiddle.net/BB3JK/47/

$(document).ready(function(){

	$('.custom-select').each(function () {

		var $this = $(this), numberOfOptions = $(this).children('option').length;

		$this.hide();
		$this.wrap('<div class="select-outer"></div>');
		$this.after('<div class="select-inner"></div>');
		var $select = $this.next('div.select-inner');
		$select.text($this.children('option').eq(0).text());

		var $list = $('<ul>', { 'class': 'options'}).insertAfter($select);

		for (var i = 0; i < numberOfOptions; i++) {
			$('<li>', {
				text: $this.children('option').eq(i).text(),
				rel: $this.children('option').eq(i).val()
			}).appendTo($list);
		}

		var $listItems = $list.children('li');

		$select.click(function(e) {
			e.stopPropagation();
			$(this).toggleClass('active').next('ul.options').slideToggle("fast");
		});

		$listItems.click(function() {
			$select.text($(this).text()).removeClass('active');
			$this.val($(this).attr('rel'));
			$list.slideUp('fast');
		});

		$(document).click(function () {
			$select.removeClass('active');
			$list.slideUp('fast');
		});

	});
});

// Payement table, payement description show animation (checkout page)

function show_payment(payment_id) {
	var hide_class = document.getElementsByClassName('payment-type');
	
	for (var i = 0; i < hide_class.length; i++){
        hide_class[i].className = 'payment-type';
    }
	
	document.getElementById(payment_id).className = 'payment-type show';
}

if($(window).width() < 1200 ){
    $('.visible-mobile').css({"display":"none"});
$(".visible-mobile").find('ul').find('li').click(function(){    
  $('.visible-mobile').css({"display":"none"});
});
$(".currency-click").click(function(){    
    if( ($('.visible-mobile').css("display")) != "none") { 
       $('.visible-mobile').css({"display":"none"});
  }
    else
    {
      $('.visible-mobile').css({"display":"block"});
    }
  });
}
$( document ).ready(function() {
    (function($){
      function fixButtonHeights() {
        var heights = new Array();

        // Loop to get all element heights
        $('.coll-info-height').each(function() { 
          // Need to let sizes be whatever they want so no overflow on resize
          $(this).css('min-height', '0');
          $(this).css('max-height', 'none');
          $(this).css('height', 'auto');

          // Then add size (no units) to array
          heights.push($(this).height());
        });

        // Find max height of all elements
        var max = Math.max.apply( Math, heights );

        // Set all heights to max height
        $('.coll-info-height').each(function() {
          $(this).css('height', max + 'px');
          // Note: IF box-sizing is border-box, would need to manually add border

        }); 
      }

      $(window).load(function() {
        // Fix heights on page load
        fixButtonHeights();

        // Fix heights on window resize
        $(window).resize(function() {
          // Needs to be a timeout function so it doesn't fire every ms of resize
          setTimeout(function() {
            fixButtonHeights();
          }, 100);
        });
      });
    })(jQuery);
  });


