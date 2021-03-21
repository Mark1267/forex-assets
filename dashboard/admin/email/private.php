<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/contacts.php');
adminOnly();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $mail = selectOne($table2, ['id' => $id]);
    $subject = $mail['subject'];

    $users = selectAll('users', ['admin' => 0]);
}else{
    $_SESSION['message'] = 'Please Select a mail Template';
    $_SESSION['type'] = 'danger';
    header('location: ' . BASE_URL . '/dashboard/admin/email/');
    exit();
}

$title = 'View';
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
                                <?php include(ROOT_PATH . '/app/includes/message.php'); ?>
                <div class="col-xl-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h5>Private Mail</h5><small>Send Mail to only one user</small>
                        </div>
                        <div class="card-body">
                            <?php include(ROOT_PATH . '/app/includes/message.php'); ?>
                            <form class="form-v2" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <small class="col-sm-12">Subject</small>
                                    <hr>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="subject">Subject</label>
                                            <input type="text" disabled class="form-control" value="<?php echo $subject; ?>" name="subject" placeholder="Withdrawal Request Denailed" autocomplete="on">
                                            <small class="badge-light-danger text-danger"><?php echo $errors['subject']; ?></small>
                                            <small class="badge-light-danger text-danger"><?php echo $errors['subject_match']; ?></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3">
                                            <select class="custom-select" name="email">
                                                <option value="0">Select User...</option>
                                                <?php foreach($users as $user): ?>
                                                    <option value="<?php echo $user['id']; ?>"><?php echo $user['email']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="email">Email</label>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-sm-6 mx-auto">
                                        <button type="submit" name="privateSend" class="btn btn-block btn-success">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>