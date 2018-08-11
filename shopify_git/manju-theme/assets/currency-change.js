$(document).ready(function(){


   jQuery('.currencies li').on('click', function() {
    jQuery('.currencies li').removeClass('active');
    jQuery(this).addClass('active');
    
    var selectedValue = jQuery(this).find('input[type=hidden]').val();
     
    jQuery('.currency-picker option').attr('selected', false);
    jQuery('.currency-picker option[value='+selectedValue+']').attr('selected', true);
    //jQuery('.currency_wrapper').find('.currency_code').find('span').addClass('flg');
    Currency.convertAll(Currency.currentCurrency, selectedValue);
    
    
    jQuery('.currency_code').html($(this).find('a').html());
     price_flt();
  });

$(".currencies").find('li').each(function() {
 
    if($( this ).attr('value') ==  cookieCurrency )
    {
        jQuery('.currency_code').html($(this).find('a').html());
      //$('.selecter-selected').html($(this).html());
     
    }
  
  if(cookieCurrency == null){
//   alert(cookieCurrency);
//     alert($('.currency-picker').html());
//     var selectval = ( ".currency-picker option:selected" ).text();
//     alert(selectval);
    //$('.currency_code').find('.flag-'+selectval).addClass('active');
  }
});
  
  
    
});
