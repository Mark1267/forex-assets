<?php include('../../../path.php');
include(ROOT_PATH . '/app/controllers/users.php');
adminOnly();

$users = selectAll($table, ['admin' => 0]);
$title = 'Dashboard';
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
                <?php include(ROOT_PATH . '/app/includes/message.php'); ?>
                
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Users</h5>
                                    <span class="d-block m-t-5">All your <code>users</code> are here</span>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered dom-jQuery-events table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Balance</th>
                                                    <th>View</th>
                                                    <th>Contact</th>
                                                    <th>Delete</th>
                                                    <th>Joined</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($users as $key => $user):?>
                                                    <tr>
                                                        <td><?php echo $key + 1;?></td>
                                                        <td><?php echo $user['firstname']; ?></td>
                                                        <td><?php echo $user['lastname']; ?></td>
                                                        <td><?php echo $user['email']; ?></td>
                                                        <td>$<?php echo $user['balance']; ?></td>
                                                        <td><a href="<?php echo BASE_URL . '/dashboard/admin/users/view.php?id=' . $user['id']; ?>" class="btn btn-sm btn-outline-warning">View</a></td>
                                                        <td><a href="<?php echo BASE_URL . '/dashboard/admin/users/contact.php?u_id=' . $user['id']; ?>" class="btn btn-sm btn-outline-info">Contact</a></td>
                                                        <td><a href="<?php echo BASE_URL . '/dashboard/admin/users/del.php?id=' . $user['id']; ?>" class="btn btn-sm btn-outline-danger">Delete</a></td>
                                                        <td><?php echo date('F j, Y', strtotime($user['created_at'])); ?></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Balance</th>
                                                    <th>View</th>
                                                    <th>Contact</th>
                                                    <th>Delete</th>
                                                    <th>Joined</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- DOM - jQuery events table -->
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>
