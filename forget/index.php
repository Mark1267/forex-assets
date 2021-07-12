<?php 
include('../path.php');
include(ROOT_PATH . '/app/controllers/users.php');
$_SESSION['admin'] = 0;
$title = "Password Reset";

#dd($_SESSION);
?>
<!DOCTYPE html>
<html lang="en" class="loading" lang="en" data-textdirection="ltr">
<?php include(ROOT_PATH . '/app/includes/link_dash_top.php'); ?>
	<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
				<section class="flexbox-container">
					<div class="col-12 d-flex align-items-center justify-content-center mt-md-5 mt-1 p-0 p-md-2">
						<div class="col-md-4 col-12 box-shadow-2 p-0">
							<div class="card border-grey border-lighten-3 px-1 py-1 m-0">
								<div class="card-header border-0">
									<div class="card-title text-center">
										<img src="<?php echo LOGO;?>" class="dash-logo" style="width: 100px;" alt="branding logo">
									</div>
									<h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
										<span>Reset password!</span>
									</h6>
								</div>
								<div class="card-content">
									<div class="card-body">
										<?php include(ROOT_PATH . '/app/includes/message.php'); ?>
										<form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
											<fieldset class="form-group position-relative has-icon-left">
											<input type="email" class="form-control" tabindex="1" value="<?php echo $email; ?>" id="email" name="email" required data-validation-required-message="Please enter your email." placeholder="Your Email">
												<div class="form-control-position">
												<i class="ft-mail"></i>
												</div>
                                                    <div class="help-block font-small-3"></div>
                                                    <small class="text-danger"><?php echo $errors['em']; ?></small>
                                                    <small class="text-danger"><?php echo $errors['emm']; ?></small>
											</fieldset>
											<button type="submit" name="forget-mail" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Recover Password</button>
										</form>
									</div>
								</div>
								<div class="card-footer border-0"><hr>
								<p class="float-sm-left text-center"><a href="<?php echo BASE_URL . '/signin'; ?>" class="btn btn-danger">Login</a></p>
								<p class="float-sm-right text-center">New to WievaTrade? <a href="<?php echo BASE_URL . '/signup'; ?>" class="card-link">Create Account</a></p>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
        </div>
    </div>
<!-- Required Js -->
<?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php');?>


</body>

</html>
