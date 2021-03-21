
    <div class="popup_wrap popup_registration bg_tint_light" id="popup_registration">
        <a class="popup_close" href="#"></a>
        <div class="form_wrap">
            <form class="popup_form registration_form" id="registration_for" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="registration_form">
                <input name="redirect_to" type="hidden" value="#">
                <div class="form_left">
                    <div class="logo">
                        <a href="index.html"><img alt="" class="logo_login" src="<?php echo BASE_URL . '/assets/open/';?>images/logo_dark.png"></a>
                    </div>
                    <div class="registration_socials_title">
                        You can register using your social profile
                    </div>
                    <div class="registration_socials_list">
                        <div class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                            <div class="sc_socials_item">
                                <a class="social_icons social_facebook" href="#" target="_blank"><span class="icon-facebook"></span></a>
                            </div>
                            <div class="sc_socials_item">
                                <a class="social_icons social_twitter" href="#" target="_blank"><span class="icon-twitter"></span></a>
                            </div>
                            <div class="sc_socials_item">
                                <a class="social_icons social_gplus" href="#" target="_blank"><span class="icon-gplus"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="registration_socials_or">
                        <span>or</span>
                    </div>
                    <div class="popup_form_field login_field iconed_field">
                        <input id="username" name="username" placeholder="User name (login)" type="text" value="">
                    </div>
                    <div class="popup_form_field email_field iconed_field">
                        <input id="email" name="email" placeholder="E-mail" type="text" value="">
                    </div>
                </div>
                <div class="form_right">
                    <div class="popup_form_field password_field iconed_field">
                        <input id="password" name="registration_pwd" placeholder="Password" type="password" value="">
                    </div>
                    <div class="popup_form_field password_field iconed_field">
                        <input id="cpassword" name="cpassword" placeholder="Confirm Password" type="password" value="">
                    </div>
                    <div class="popup_form_field agree_field">
                        <input id="agree" name="agree" type="checkbox" value="agree"> <label for="registration_agree">I agree with</label> <a href="#">Terms &amp; Conditions</a>
                    </div>
                    <div class="popup_form_field submit_field">
                        <input class="submit_button" name="signin" type="submit" value="Registration">
                    </div>
                </div>
            </form>
            <div class="result message_block"></div>
        </div>
        <!-- /.registration_wrap -->
    </div>
    <!-- /.user-popUp -->
    <div class="popup_wrap popup_login bg_tint_light" id="popup_login">
        <a class="popup_close" href="#"></a>
        <div class="form_wrap">
            <div class="form_right">
                <div class="logo">
                    <a href="#"><img alt="" class="logo_login" src="<?php echo BASE_URL . '/assets/open/';?>images/logo_dark.png"></a>
                </div>
                <div class="login_socials_title">
                    You can login using your social profile
                </div>
                <div class="login_socials_list">
                    <div class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                        <div class="sc_socials_item">
                            <a class="social_icons social_facebook" href="#" target="_blank"><span class="icon-facebook"></span></a>
                        </div>
                        <div class="sc_socials_item">
                            <a class="social_icons social_twitter" href="#" target="_blank"><span class="icon-twitter"></span></a>
                        </div>
                        <div class="sc_socials_item">
                            <a class="social_icons social_gplus" href="#" target="_blank"><span class="icon-gplus"></span></a>
                        </div>
                    </div>
                </div>
                <div class="login_socials_or">
                    <span>or</span>
                </div>
                <div class="result message_block"></div>
            </div>
            <div class="form_left">
                <form action="#" class="popup_form login_form" id="login_form" method="post" name="login_form">
                    <input name="redirect_to" type="hidden" value="#">
                    <div class="popup_form_field login_field iconed_field">
                        <input id="log" name="log" placeholder="Login or Email" type="text" value="">
                    </div>
                    <div class="popup_form_field password_field iconed_field">
                        <input id="password" name="pwd" placeholder="Password" type="password" value="">
                    </div>
                    <div class="popup_form_field remember_field">
                        <a class="forgot_password" href="#">Forgot password?</a> <input id="rememberme" name="rememberme" type="checkbox" value="forever"> <label for="rememberme">Remember me</label>
                    </div>
                    <div class="popup_form_field submit_field">
                        <input class="submit_button" type="submit" value="Login">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.login_wrap -->
    </div>
    <!-- /.popup_login -->
    <div class="popup_wrap_bg"></div>