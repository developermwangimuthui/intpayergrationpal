jQuery('#services').change(function () {
    var services = jQuery(this).val();
    if ( services == 'Other' ){
        jQuery("#other-wrap").css("display", "block");
    }else{
        jQuery("#other-wrap").css("display", "none");
    }
});
jQuery("#submit-form").click(function () {
    var firstname       = jQuery( '#first-name' ).val();
    var lastname        = jQuery( '#last-name' ).val();
    var emailaddress    = jQuery( '#email-address' ).val();
    var services        = jQuery( '#services' ).val();
    var otherservices   = jQuery( '#service-name-input' ).val();
    var amount          = jQuery( '#enter-amount' ).val();
    var currency        = jQuery( '#currency-type' ).val();
    
    if( services == "other" ){
        service = otherservices;
    }else{
        service = services;
    }
    
    if( firstname == '' ){
        jQuery( ".fn" ).css( 'display', 'block' );
    }else{
        jQuery( ".fn" ).css( 'display', 'none' );
    }
    
    if( lastname == '' ){
        jQuery( ".ln" ).css( 'display', 'block' );
    }else{
        jQuery( ".ln" ).css( 'display', 'none' );
    }
    
    if( emailaddress == '' ){
        jQuery( ".pay" ).css( 'display', 'block' );
    }else{
        jQuery( ".pay" ).css( 'display', 'none' );
    }
    
    if( services == '' ){
        jQuery( ".sel" ).css( 'display', 'block' );
    }else{
        jQuery( ".sel" ).css( 'display', 'none' );
    }
    
    if( amount == '' ){
        jQuery( ".amo" ).css( 'display', 'block' );
    }else{
        jQuery( ".amo" ).css( 'display', 'none' );
    }
    
    if( currency == '' ){
        jQuery( ".cur" ).css( 'display', 'block' );
    }else{
        jQuery( ".cur" ).css( 'display', 'none' );
    }
    
    var regexTest = /^\d+(?:\.\d\d?)?$/;
    var ok = regexTest.test(amount);

    if( firstname == '' || lastname == '' || emailaddress == '' || services == '' || amount == '' || currency == '' ){
        return false;
    }
    
    if(!ok){
        jQuery( '.amo-war' ).css( 'display', 'block' );
        return false;
    }else{
        jQuery( '.amo-war' ).css( 'display', 'none' );
    }
    
    jQuery( '.first-name' ).text( firstname );
    jQuery( '.last-name' ).text( lastname );
    jQuery( '.email-address' ).text( emailaddress );
    jQuery( '.service' ).text( service );
    jQuery( '.amount' ).text( amount );
    jQuery( '.currency' ).text( currency);
    
    jQuery(".business").val(emailaddress);
    jQuery(".item_name").val(service);
    jQuery(".amount-paypal").val(amount);
    jQuery(".currency_code").val(currency);
    
    jQuery( '.popup-window' ).css( 'display', 'block' );
    
});
    
jQuery( '.popup-close' ).click(function(){
    jQuery( '.popup-window' ).css( 'display', 'none' );
});
    
jQuery("#submit-forms").click(function (e) {
    var _services           = '';
    var _first_name         = $( '#first-name' ).val();
    var _last_name          = $( '#last-name').val();
    var _email_address      = $( '#email-address' ).val();
    var _services_select    = $( '#services').val();
    var _services_input     = $( '#service-name-input' ).val();
    var _enter_amount       = $( '#enter-amount').val();
    var _currency_type      = $( '#currency-type' ).val();
    
    if( _services_select == "other" ){
        _services = _services_input;
        
    }else{
        _services = _services_select;
    }
    
    jQuery.ajax({
		url:'ajax.php',
		type:'POST',
		data:{'first_name':_first_name,'last_name':_last_name,'email_address':_email_address,'services':_services,'enter_amount':_enter_amount,'currency_type':_currency_type
        },
		success:function(response){
            jQuery('form').attr('action', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
            jQuery('form').submit();
		}
	});
    
});
    
var typingTimer;                
var doneTypingInterval = 100;  
    
jQuery('#enter-amount').keyup(function(){
    clearTimeout(typingTimer);
    if (jQuery('#enter-amount').val) {
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    }
});
    
function doneTyping () {
    var vale = jQuery('#enter-amount').val();
    var regexTest = /^\d+(?:\.\d\d?)?$/;
    var ok = regexTest.test(vale);
    
    if(!ok){
        jQuery( '.if-error' ).addClass( 'has-error' );
        jQuery( '.my-warning' ).css( 'display', 'block' );
    }else{
        jQuery( '.if-error' ).removeClass( 'has-error' );
        jQuery( '.my-warning' ).css( 'display', 'none' );
    }
}

jQuery(document).ready(function($){
    $("#enter-amount").focusin(function(){
        //$(this).css("background-color", "#FFFFCC");
        //console.log( 'focusin' );
    });
    $("#enter-amount").focusout(function(){
        var val = $(this).val();
        //console.log( addZeroes(val) );
        $(this).val( addZeroes(val) );
    });
});

function addZeroes(num) {
    // Cast as number
    var num = Number(num);
    // If not a number, return 0
    if (isNaN(num)) {
        return 0;
    }
    // If there is no decimal, or the decimal is less than 2 digits, toFixed
    if (String(num).split(".").length < 2 || String(num).split(".")[1].length<=2 ){
        num = num.toFixed(2);
    }
    // Return the number
    return num;
}