$(document).ready(function(e){
	// alert('hello');
	$('.vairients-image-tab ul').find("li:first").removeClass('active');
	$('.vairients-image-tab').find("img.prodVariant:first").addClass('activeImg');

});
$('.prodVariant').click(function(e){
		
  		var variantImg = $(this).attr('data-variant-src');
  		$('.prodVariant').removeClass('activeImg');
  		$(this).addClass('activeImg');
  		$('.mainProdImage').attr('src',variantImg);
});

$(".SpeakToSpecialists").click(function() {
    $('html,body').animate({
        scrollTop: $("#form-section").offset().top},
        'slow');
});

$('.openPage').click(function(e){
          //alert('hello');
                var whichPage = $(this).attr('data-which-page');
                window.location = whichPage;
                $('.openPage').removeClass('activePage');
                $(this).addClass('activePage');
                // $('[id^=page]').hide();
                // $('#'+whichPage).css('display','block');

});


$('.sendEmail').click( function(e){
	// alert('hi');
	e.preventDefault();
	var data = $('form.contact_form').serialize();
	//alert(data);
		$.ajax({ 
			url: "sendEmail.php", 
			type: "POST", 
			data: data, 
			success: function(result) { 
				// $(body).html(result);
				// alert(result);
				$('.successDisplay').css('display','block');
				$("form.contact_form")[0].reset(); 
				setTimeout(function(){ $('.successDisplay').hide(); }, 3000);
			}

	}); 
});

var maxLen = 14;
 $('#inputPhone').keypress(function(event){
   var Length = $(this).val().length;
//alert(Length);
    if(Length >= maxLen){
     if (event.which != 8) {
       return false;
     }
   }
 });