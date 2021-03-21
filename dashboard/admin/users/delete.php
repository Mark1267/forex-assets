<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/users.php');
adminOnly();
$title = 'Delete';
if(isset($_GET['u_id'])){
    $user = selectOne('users', ['id' => $_GET['u_id']]);

}else{
    $_SESSION['message'] = 'No id selected';
    $_SESSION['type'] = 'danger';
    header('location:' . BASE_URL . '/dashboard/admin/users/');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH . '/app/includes/link_dash_top.php'); ?>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
 <?php include(ROOT_PATH . '/app/includes/nav_user_dash.php'); ?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">   
                <div class="row" style="height: 70vh;">
                    <div class="col-sm-12 col-md-5 mx-auto my-auto">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Are you sure?</h5>
                                <p class="card-text">Are you sure you want to delete <span style=" text-decoration: underline;"><?php echo $user['firstname']; ?></span>'s account?</p>
                                <a href="<?php echo BASE_URL . '/dashboard/admin/users/delete.php?del_au_id=' . $_GET['u_id']; ?>" class="btn btn-danger">Proceed</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- Required Js -->
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php');?>
</body>

</html>