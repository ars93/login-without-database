function vallidate_registration() {
    error_flag = 0;
    $user_name = $('#user_name').val();
    $address = $('#address').val();
    $pass = $('#password').val();
    $c_password = $('#confirm_password').val();
    $user_email = $('#user_email').val();
    $mobile_no = $('#mobile_no').val();
    $profile_name = $('#profile_name').val();

    if ($user_name == '') {
        error_flag = 1;
        $('#user_name_span').text("Insert Name");
    } else {
        $('#user_name_span').text("");
    }
    if ($address == '') {
        error_flag = 1;
        $('#address_span').text("Insert Address");
    } else {
        $('#address_span').text("");
    }
    if ($pass == '') {
        error_flag = 1;
        $('#password_span').text("Insert Password");
    } else {
        $('#password_span').text("");
    }
    if ($c_password == '') {
        error_flag = 1;
        $('#confirm_password_span').text("Insert Confirm Password");
    } else {
        $('#confirm_password_span').text("");
    }
    if ($user_email == '') {
        error_flag = 1;
        $('#user_email_span').text("Insert Email");
    } else {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($("#user_email").val())) {
        $('#user_email_span').text('');
    } else {
        error_flag = 1;
        $('#user_email_span').text('Insert Vallid email');
    }
     
    }
    if ($mobile_no == '') {
        error_flag = 1;
        $('#mobile_no_span').text("Insert Mobile No");
    } else {
        $('#mobile_no_span').text("");
    }
    if ($profile_name == null) {
        error_flag = 1;
        $('#profile_name_span').text("Select Profile");
    } else {
        $('#profile_name_span').text("");
    }
    if ($pass == $c_password) {
        $('#confirm_password_span').text("");
    } else {
        error_flag = 1;
        $('#confirm_password_span').text("Password Not match");
    }
    if (error_flag == 0) {
        $('#user_registration_form').submit();
    }

}
function vallidate_login() {
    error_flag = 0;
    $user_name = $('#login_email').val();
    $pass = $('#login_password').val();
    if ($user_name == '') {
        error_flag = 1;
        $('#login_email_span').text("Insert Email");
    } else {
        $('#login_email_span').text("");
    }
    if ($pass == '') {
        error_flag = 1;
        $('#login_password_span').text("Insert Password");
    } else {
        $('#login_password_span').text("");
    }
    if (error_flag == 0) {
        $('#login_form_data').submit();
    }
}
