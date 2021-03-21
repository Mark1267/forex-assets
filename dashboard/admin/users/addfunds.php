<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/users.php');
adminOnly();
if(isset($_GET['u_id'])){
    $user = selectOne($table, ['id' => $_GET['u_id']]);
}else{
    $_SESSION['message'] = 'No id selected';
    $_SESSION['type'] = 'danger';
    header('location:' . BASE_URL . '/dashboard/admin/users/');
    exit();
}
$title = 'Users';

?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH . '/app/includes/link_dash_top.php');?>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <?php include(ROOT_PATH . '/app/includes/nav_user_dash.php'); ?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">      
                <div class="row">
                    <div class="col-xl-12 pb-3">
                        <div class="card">
                            <div class="card-header">
                                <h5>Add Funds to Ugochukwu</h5><small>Add Funds to your clients or users account balance</small>
                            </div>
                            <div class="card-body">
                                <form class="form-v2" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                    <div class="row">
                                        <small class="col-sm-12">Subject</small>
                                        <hr>
                                        <div class="col-sm-10 mx-auto">
                                            <div class="form-group">
                                                <label class="floating-label" for="subject">Subject</label>
                                                <input type="text" class="form-control" name="subject" placeholder="Black Friday Bouns" autocomplete="on">
                                            </div>
                                        </div>
                                        <small class="col-sm-12">Details</small>
                                        <hr>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label" for="firstname">First Name</label>
                                                <input type="text" class="form-control" name="firstname" value="<?php echo $user['firstname']; ?>" placeholder="John" autocomplete="on">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label" for="lastname">Last Name</label>
                                                <input type="text" class="form-control" name="lastname" value="<?php echo $user['lastname']; ?>" placeholder="Doe" autocomplete="on">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label" for="email">Email</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" placeholder="example@gmail.ca" autocomplete="on">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label" for="amount">Amount</label>
                                                <input type="number" class="form-control" name="amount" placeholder="500" autocomplete="on">
                                            </div>
                                        </div>
                                        <small class="col-sm-12">Reason</small>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label" for="reason">Reason:</label>
                                                <textarea rows="4" cols="7" id="ckeditor" class="form-control" name="reason" placeholder="Reason Here" autocomplete="one"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mx-auto">
                                            <button type="submit" name="addFunds" class="btn btn-block btn-primary">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Required Js -->
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>