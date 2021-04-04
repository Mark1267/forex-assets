<?php include('path.php');
include(ROOT_PATH . '/app/controllers/users.php');

$title = 'Sign In';
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<?php include(ROOT_PATH . '/app/includes/link_dash_top.php'); ?>

<body class="vertical-layout vertical-menu 1-column bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- ../../../../../../../../../-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="<?php echo BASE_URL . '/assets/open/';?>images/logo-dark.png" style="width: 100px;" alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>Easily Using</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                    <?php include(ROOT_PATH . '/app/includes/message.php'); ?>
                                        <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" name="email" placeholder="Your Email" required>
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-12 text-center text-sm-left mt-1">
                                                        <fieldset>
                                                            <input type="checkbox" id="remember-me" class="chk-remember">
                                                            <label for="remember-me"> Remember Me</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="<?php echo BASE_URL . '/forget/'; ?>" class="card-link">Forgot Password?</a></div>
                                                </div>
                                                <button type="submit" name="signin" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                                        </form>
                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                        <span>New to Forex-Assets?</span>
                                    </p>
                                    <div class="card-body">
                                        <a href="<?php echo BASE_URL . '/signup'; ?>" class="btn btn-outline-danger btn-block"><i class="ft-user"></i> Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- //////////////////////////////////////////////////// -->
<?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>