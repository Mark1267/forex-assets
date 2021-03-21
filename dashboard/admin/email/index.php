<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/contacts.php');
adminOnly();

$title = 'Mail Templates';
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
                            <h5>User Mail Template</h5>
                            <span class="d-block m-t-5">All users <code>mail templates</code> are here</span>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject</th>
                                            <th colspan="5">Actions</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($mails as $key => $mail): ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $mail['subject']; ?></td>
                                                <td class="badge-light-success"><a href="<?php echo BASE_URL . '/dashboard/admin/email/view.php?id=' . $mail['id']; ?>" class="text-success">View</a></td>
                                                <td class="badge-light-primary"><a href="<?php echo BASE_URL . '/dashboard/admin/email/update.php?id=' . $mail['id']; ?>" class="text-primary">Update</a></td>
                                                <td class="badge-light-info"><a href="<?php echo BASE_URL . '/dashboard/admin/email/private.php?id=' . $mail['id']; ?>" class="text-info">Send Private</a></td>
                                                <td class="badge-light-warning"><a href="<?php echo BASE_URL . '/dashboard/admin/email/?all_id=' . $mail['id']; ?>" class="text-warning">Send All</a></td>
                                                <td class="badge-light-danger"><a href="<?php echo BASE_URL . '/dashboard/admin/email/del.php?id=' . $mail['id']; ?>" class="text-danger">Delete</a></td>
                                                <td><?php echo date('F j, Y h:s:i a', strtotime($mail['created_at'])); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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