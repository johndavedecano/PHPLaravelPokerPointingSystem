jQuery(document).ready(function(event){
    
    window.login_validated = true;
    
    jQuery('#email,#password').click(function(){
        if(window.login_validated == false)
        {
            jQuery(this).removeClass('uk-form-danger');
            jQuery(this).val(''); 
        }
    });
    

/*
    jQuery(window).keypress(function(event){
        if(event.keyCode == 13){
            login();
        }
    });
 */
    
});


var login = function(){
    
    var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
    var email = jQuery('#email').val();
    
    var password = jQuery('#password').val();
    
    var remember = jQuery('#remember').val();
    
    window.login_validated = true;
    
    jQuery('#error-message').html('');
    jQuery('#error-message').hide('fast');
    
    if(regex.test(email) == false)
    {
        jQuery('#email').addClass('uk-form-danger');
        window.login_validated = false;
    }else{
        window.login_validated = true;
    }
    
    if(password == '')
    {
        jQuery('#password').addClass('uk-form-danger');
        window.login_validated = false;
    }else{
        window.login_validated = true;
    }
    /*
     * Continue AJAX Request
     */
    if(window.login_validated == true)
    {
        jQuery.ajax({
            url:'/auth/login',
            type:'POST',
            data: 'remember='+remember+'&email='+email+'&password='+password,
            success:function(data){
                if(data.status == 'error')
                {
                    window.login_validated = false;
                    jQuery('#error-message').html(data.message);
                    jQuery('#error-message').fadeIn();
                }else{
                    window.login_validated = true;
                    window.location = '/';
                }
            }
        });
    }
}