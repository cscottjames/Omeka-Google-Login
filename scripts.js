jQuery(document).ready(function() {
    var clientId = jQuery('#login-form input[name="clientid"]').val();
    jQuery("head").append('<meta name="google-signin-client_id" content="' + clientId + '">');
    jQuery("#login-form").append('<div class="g-signin2" onclick="enableLogin()" data-onsuccess="onSignIn"></div>');
    jQuery("#login-form").append('<script src="https://apis.google.com/js/platform.js" async defer></script>');
    var clicked = false;
});

//prevent login until click
function enableLogin() {
    clicked = true;
}

function onSignIn(googleUser) {
    if(clicked === true) {
        var profile = googleUser.getBasicProfile();
        var email = profile.getEmail();
        var username = email.substring(0,email.indexOf("@"));
        jQuery("#login-form input[name='username']").val(username);
        jQuery("#login-form input[name='password']").val(email);
        jQuery("#login-form").submit();
    }
}