<?php 
include('../../path.php');
include(ROOT_PATH . '/app/controllers/users.php');
usersOnly();

$title = 'Delete Account';
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<?php include(ROOT_PATH . '/app/includes/link_dash_top.php'); ?>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <?php include(ROOT_PATH . '/app/includes/nav_user_dash.php'); ?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-sm-12 col-md-5 mx-auto my-auto">
                        <div class="card text-center mt-2">
                            <div class="card-body">
                                <h5 class="card-title">Are you sure?</h5>
                                <p class="card-text">Are you sure you want to delete your account? We will miss you.</p>
                                <a href="<?php echo BASE_URL . '/dashboard/user/delete.php?del_u_id=' . $_SESSION['id']; ?>" class="btn btn-danger">Proceed</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>