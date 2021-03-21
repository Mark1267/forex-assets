<?php include('../../../path.php');
include(ROOT_PATH . '/app/controllers/users.php');
adminOnly();


if(isset($_GET['id'])){
    $user = selectOne($table, ['id' => $_GET['id']]);
}else{
    $_SESSION['message'] = 'Please Select a user';
    $_SESSION['type'] = 'danger';
    header('location: ' . BASE_URL . '/dashboard/admin/users/add.php');
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
                <?php include(ROOT_PATH . '/app/includes/message.php'); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="<?php echo BASE_URL . '/assets/dashboard/images/user/' . $user['image']; ?>" style="height: 90px; width: 90px; border-radius: 100%;" alt="" class="img-fluid card-img-top">
                            <h5 class="text-left"><?php echo $user['firstname']; ?>'s Profile</h5>
                        </div>
                        <div class="card-body">
                            <dl class="dl-horizontal row">
                                <?php 
                                unset($user['password'], $user['OTK']);
                                ?>
                                <?php foreach($user as $key => $value):?>
                                    <?php if($key === 'balance'):?>
                                        <dt class="col-sm-4"><?php echo $key; ?></dt>
                                        <dd class="col-sm-8"><?php echo '$' . $value; ?></dd>
                                    <?php elseif($key === 'created_at'): ?>
                                        <dt class="col-sm-4"><?php echo $key; ?></dt>
                                        <dd class="col-sm-8"><?php echo date('F j, Y', strtotime($value)); ?></dd>
                                    <?php else:?>
                                        <dt class="col-sm-4"><?php echo $key; ?></dt>
                                        <dd class="col-sm-8"><?php echo $value; ?></dd>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </dl>
                        </div>
                        <div class="card-footer row">
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_URL . '/dashboard/admin/users/addfunds.php?u_id=' . $user['id']; ?>" class="btn btn-info btn-block">Add Funds</a>
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_URL . '/dashboard/admin/users/contact.php?u_id=' . $user['id']; ?>" class="btn btn-primary btn-block">Contact</a>
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_URL . '/dashboard/admin/users/delete.php?u_id=' . $user['id']; ?>" class="btn btn-danger btn-block">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>All Deposit</h5>
                            <span class="d-block m-t-5">All your <code>deposits</code> are here</span>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <?php 
                                $totalPages = count(selectAll('transactions', ['nature' => 1, 'user_id' => $user['id'], 'status' => 1])) / $results_per_page;
                                $deposits = selectAllLimits('transactions', ['nature' => 1, 'user_id' => $user['id'], 'status' => 1], $start, $results_per_page);
                                
                                ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Trans. ID</th>
                                            <th>Plan</th>
                                            <th>Amount</th>
                                            <th>Receiver Acc. ID</th>
                                            <th>Sender</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($deposits as $key => $deposit):?>
                                            <?php $plan = selectOne('plans', ['id' => $deposit['plan_id']]);
                                                  $account = selectOne('accounts', ['id' => $deposit['account_id']]);?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $deposit['trans_id']; ?></td>
                                                <td><?php echo $plan['name']; ?></td>
                                                <td>$<?php echo $deposit['amount']; ?></td>
                                                <td><?php echo $account['address']; ?></td>
                                                <td><?php echo $deposit['receiver_address']; ?></td>
                                                <td><?php echo date('F j, Y h:i:s a', strtotime($deposit['created_at'])); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php include(ROOT_PATH . '/app/includes/page.php'); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>All Withdrawals</h5>
                            <span class="d-block m-t-5">All your <code>withdrawals</code> are here</span>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                            <?php 
                                $totalPages = count(selectAll('transactions', ['nature' => 0, 'user_id' => $user['id'], 'status' => 1])) / $results_per_page;
                                $withdraws = selectAllLimits('transactions', ['nature' => 0, 'user_id' => $user['id'], 'status' => 1], $start, $results_per_page);
                                
                                ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Trans. ID</th>
                                            <th>Amount</th>
                                            <th>Receiver Acc. ID</th>
                                            <th>Sender</th>
                                            <th>Transaction Hash</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($withdraws as $key => $withdraw):?>
                                            <?php $account = selectOne('accounts', ['id' => $withdraw['account_id']]);?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $withdraw['trans_id']; ?></td>
                                                <td>$<?php echo $withdraw['amount']; ?></td>
                                                <td><?php echo $withdraw['receiver_address']; ?></td>
                                                <td><?php echo $account['address']; ?></td>
                                                <td><?php echo $withdraw['trans_hash']; ?></td>
                                                <td><?php echo date('F j, Y', strtotime($deposit['created_at'])); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php include(ROOT_PATH . '/app/includes/page.php'); ?>
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
