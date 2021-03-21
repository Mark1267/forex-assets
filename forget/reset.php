<?php 
include('../path.php');
include(ROOT_PATH . '/app/controllers/users.php');
$title = "Password Reset";

if(isset($_GET['key']) && isset($_GET['session'])){
    $key = $_GET['key'];
    $session = $_GET['session'];
}
if(isset($_GET['error'])){

}
?>
<!DOCTYPE html>
<html lang="en" class="loading" data-textdirection="ltr">
<?php include(ROOT_PATH . '/app/includes/link_dash_top.php'); ?>
	<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
				<!-- [ auth-signin ] start -->
				<div class="auth-wrapper" style="background-color:transparent;">
					<div class="auth-content col-md-4 mx-auto">
						<div class="card">
							<div class="row align-items-center text-center">
								<div class="col-md-12">
									<style>small{display: block; width: 100% !important;}</style>
									<div class="card-body">
										<img src="<?php echo BASE_URL . '/assets/dashboard/images/favi.png'?>"  alt="" class="img-fluid mb-4 col-6 mx-auto">
										<h5 class="mb-3 f-w-400">Reset Password</h5>
										<?php include(ROOT_PATH . '/app/includes/message.php'); ?>
										<form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
										<input type="hidden" name="key" value="<?php echo $key;?>">
										<input type="hidden" name="session" value="<?php echo $session; ?>">
											<div class="input-group mb-4 col-12 p-0">
												<div class="input-group-prepend">
													<span class="input-group-text"><i data-feather="lock"></i></span>
												</div>
												<input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="New Password">
												<small class="badge-light-danger text-danger"><?php echo $errors['pr'] ; ?></small>
												<small class="badge-light-danger text-danger"><?php echo $errors['pri'] ; ?></small>
												<small class="badge-light-danger text-danger"><?php echo $errors['psl'] ; ?></small>
											</div>
											<div class="input-group mb-4 col-12 p-0">
												<div class="input-group-prepend">
													<span class="input-group-text"><i data-feather="pocket"></i></span>
												</div>
												<input type="password" name="cpassword" class="form-control" value="<?php echo $cpassword; ?>" placeholder="Confirm Password">
												<small class="badge-light-danger text-danger"><?php echo $errors['cps'] ; ?></small>
												<small class="badge-light-danger text-danger"><?php echo $errors['cpse'] ; ?></small>
											</div>
										<button class="btn btn-block btn-primary my-4" name="reset-password">Reset</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- [ auth-signin ] end -->
			</div>
		</div>
	</div>

<!-- Required Js -->
<?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php');?>


</body>

</html>
