<?php include "header.php"; ?>


<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="<?php echo base_url(); ?>assets/img/logo_white.png" alt=""/>
            <h3>Welcome</h3>

        </div>
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#register" role="tab" aria-controls="home" aria-selected="true">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#login_form" role="tab" aria-controls="profile" aria-selected="false">Login</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show" id="register" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Sign Up</h3>
                    <form id="user_registration_form" method="post" action="<?php echo base_url(); ?>home/register">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name *" id="user_name" name="user_name" />
                                    <span id="user_name_span" class="span_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address *" id="address" name="address" />
                                    <span id="address_span" class="span_error"></span>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" value="" id="password" name="password" />
                                    <span id="password_span" class="span_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control"  placeholder="Confirm Password *" id="confirm_password" name="confirm_password" />
                                    <span id="confirm_password_span" class="span_error"></span>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="user_email" name="user_email" />
                                    <span id="user_email_span" class="span_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Your Phone *" id="mobile_no" name="mobile_no" />
                                    <span id="mobile_no_span" class="span_error"></span>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="profile_name" name="profile_name">
                                        <option value="0" class="hidden"  selected disabled>Please select Profile</option>
                                        <option value="UI Developer">UI Developer</option>
                                        <option value="Mean Stack Developer">Mean Stack Developer</option>
                                        <option value="Full Stack Developer">Full Stack Developer</option>
                                        <option value="Tester">Tester</option>
                                    </select>
                                    <span id="profile_name_span" class="span_error"></span>
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline"> 
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> Male </span> 
                                        </label>
                                        <label class="radio inline"> 
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span> 
                                        </label>
                                    </div>
                                </div>
                                <button type="button" class="btnRegister" onclick="vallidate_registration()">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade show active" id="login_form" role="tabpanel" aria-labelledby="profile-tab">
                    <h3  class="register-heading">Login</h3>
                    <form id="login_form_data" method="post" action="<?php echo base_url(); ?>login/check_login">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email *" id="login_email" name="login_email" />
                                    <span id="login_email_span" class="span_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Password *" id="login_password" name="login_password" />
                                    <span id="login_password_span" class="span_error"></span>
                                </div>
                                <button type="button" class="btnRegister" onclick="vallidate_login()">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include "footer.php"; ?>
