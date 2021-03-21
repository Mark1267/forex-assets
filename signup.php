<?php 
include('path.php');
include(ROOT_PATH . '/app/controllers/users.php');

$title = 'Sign Up';
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<?php include(ROOT_PATH . '/app/includes/link_dash_top.php'); ?>
<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu" data-col="1-column">
  <!--../../../../../../../..///////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-7 col-12 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                    <img src="<?php echo BASE_URL . '/assets/dashboard/'?>images/logo/logo-dark.png" style="width: 100px;" alt="branding logo">
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Easily Using</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" novalidate>
                      <div class="row">
                        <?php if(isset($_GET['ref'])):?>
                          <input type="hidden" name="ref" value="<?php echo $_GET['ref']; ?>">
                        <?php endif;?>
                        <div class="col-12 col-sm-6 col-md-6">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="text" name="firstname" id="firstname" class="form-control input-lg"
                            placeholder="First Name" tabindex="1" required data-validation-required-message="Please enter first name." value="<?php echo $firstname; ?>">
                            <div class="form-control-position">
                              <i class="ft-user"></i>
                            </div>
                        <div class="help-block font-small-3"></div>
                        <small class="text-danger"><?php echo $errors['ef']; ?></small>
                        <small class="text-danger"><?php echo $errors['efi']; ?></small>
                          </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="text" name="lastname" id="lastname" class="form-control input-lg"
                            placeholder="Last Name" tabindex="2" required data-validation-required-message="Please enter your last name." value="<?php echo $lastname; ?>">
                            <div class="form-control-position">
                              <i class="ft-user"></i>
                            </div>
                        <div class="help-block font-small-3"></div>
                        <small class="text-danger"><?php echo $errors['el']; ?></small>
                        <small class="text-danger"><?php echo $errors['eli']; ?></small>
                          </fieldset>
                        </div>
                      </div>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" name="username" id="username" class="form-control input-lg"
                        placeholder="UserName" tabindex="3" required data-validation-required-message="Please enter a username." value="<?php echo $username; ?>">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                        <small class="text-danger"><?php echo $errors['unr']; ?></small>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address"
                        tabindex="4" required data-validation-required-message="Please enter email address." value="<?php echo $email; ?>">
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                        <small class="text-danger"><?php echo $errors['exe']; ?></small>
                        <small class="text-danger"><?php echo $errors['eme']; ?></small>
                        <small class="text-danger"><?php echo $errors['emei']; ?></small>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="tel" name="phone" id="phone" class="form-control input-lg" placeholder="Phone Number"
                        tabindex="4" required data-validation-required-message="Please enter phone number." value="<?php echo $phone; ?>">
                        <div class="form-control-position">
                          <i class="ft-phone"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                        <small class="text-danger"><?php echo $errors['exph']; ?></small>
                        <small class="text-danger"><?php echo $errors['ph']; ?></small>
                      </fieldset>
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" name="password" id="password" class="form-control input-lg"
                            placeholder="Password" tabindex="5" required value="<?php echo $password; ?>">
                            <div class="form-control-position">
                              <i class="la la-key"></i>
                            </div>
                            <div class="help-block font-small-3"></div>
                          </fieldset>
                        </div>
                        <div class="col-12 col-md-6">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" name="cpassword" id="cpassword" class="form-control input-lg"
                            placeholder="Confirm Password" tabindex="6" data-validation-matches-match="password"
                            data-validation-matches-message="Password & Confirm Password must be the same." value="<?php echo $cpassword; ?>">
                            <div class="form-control-position">
                              <i class="la la-key"></i>
                            </div>
                            <div class="help-block font-small-3"></div>
                          </fieldset>
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-8 col-sm-3 col-md-3">
                          <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember">
                            <label for="remember-me"> I Agree</label>
                          </fieldset>
                        </div>
                        <div class="col-10 col-sm-9 col-md-9">
                          <p class="font-small-3">By clicking Register, you agree to the <a href="#" data-toggle="modal"
                            data-target="#t_and_c_m">Terms and Conditions</a> set
                            out by this site, including our Cookie Use.</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 mx-auto">
                          <button type="submit" class="btn btn-info btn-lg btn-block" name="signup"><i class="ft-user"></i> Register</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer">
                       <h6 class="card-subtitle line-on-side mt-0 text-muted text-center font-small-3 pt-2">
                            <span>Or</span>
                        </h6>
                    <a href="<?php echo BASE_URL . '/signin'; ?>" class="btn btn-outline-danger btn-block"><i class="ft-unlock"></i> Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ../../../../../../../..///////-->
<?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>
</html>