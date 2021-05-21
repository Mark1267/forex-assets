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
					<div class="auth-content col-md-4 mx-auto p-0">
						<div class="card">
							<div class="row align-items-center text-center">
								<div class="col-md-12 p-md-1 p-0">
									<style>small{display: block; width: 100% !important;}</style>
									<div class="card-body py-5">
										<img src="<?php echo BASE_URL . '/assets/open/';?>images/logo-dark.png"  alt="" class="img-fluid col-6 mx-auto">
										<h5 class="my-1 f-w-400">Reset Password</h5>
										<?php include(ROOT_PATH . '/app/includes/message.php'); ?>
										<form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
										<input type="hidden" name="key" value="<?php echo $key;?>">
										<input type="hidden" name="session" value="<?php echo $session; ?>">
											<div class="input-group col-12 p-0">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="la la-key"></i></span>
												</div>
												<input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="New Password">
												<small class="badge-light-danger text-danger"><?php echo $errors['pr'] ; ?></small>
											</div>
											<div class="input-group col-12 p-0">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="la la-key"></i></span>
												</div>
												<input type="password" name="cpassword" class="form-control" value="<?php echo $cpassword; ?>" placeholder="Confirm Password">
												<small class="badge-light-danger text-danger"><?php echo $errors['cps'] ; ?></small>
												<small class="badge-light-danger text-danger"><?php echo $errors['cpse'] ; ?></small>
											</div>
											<div class="col-md-6 col-12 float-sm-left text-right my-1"><a href="<?php echo BASE_URL . '/signin'; ?>" class="underline card-link">Login Instead?</a></div>
										<button class="btn btn-block btn-success" name="reset-password">Reset</button>
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
