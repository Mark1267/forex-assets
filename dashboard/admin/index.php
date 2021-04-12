<?php include('../../path.php');
include(ROOT_PATH . '/app/controllers/users.php');
adminOnly();

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
                <div class="row">
                                <?php include(ROOT_PATH . '/app/includes/message.php'); ?>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="info"><?php echo count(selectAll($table, ['admin' => 0])); ?></h3>
                                            <h6>Users</h6>
                                        </div>
                                        <div>
                                            <i class="icon-users info font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: <?php echo percentUsers(count(selectAll($table, ['admin' => 0])), count(selectAll($table, ['admin' => 1])), 'users');?>%" aria-valuenow="<?php echo percentUsers(count(selectAll($table, ['admin' => 0])), count(selectAll($table, ['admin' => 1])), 'users');?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="warning"><?php echo count(selectAll($table, ['admin' => 1])); ?></h3>
                                            <h6>Admins</h6>
                                        </div>
                                        <div>
                                            <i class="icon-user warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: <?php echo percentUsers(count(selectAll($table, ['admin' => 0])), count(selectAll($table, ['admin' => 1])), 'admin');?>%" aria-valuenow="<?php echo percentUsers(count(selectAll($table, ['admin' => 0])), count(selectAll($table, ['admin' => 1])), 'admin');?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $totalD = sum('transactions', 'amount', ['nature' => 1, 'status' => 1]); 
                          $totalDA = sum('transactions', 'amount', ['nature' => 1, 'status' => 0]); 
                          $totalW = sum('transactions', 'amount', ['nature' => 0, 'status' => 1]);
                          $totalWA = sum('transactions', 'amount', ['nature' => 0, 'status' => 0]);
                          $Dper = percentUsers($totalD['SUM(amount)'], $totalDA['SUM(amount)'], 'users'); //percentage deposit
                          $Wper = percentUsers($totalW['SUM(amount)'], $totalWA['SUM(amount)'], 'users'); //percentage withdrawals
                          
                          $transactions = selectAllLimits('transactions', [], 0, 15);
                          ?>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">$<?php echo $totalD['SUM(amount)']; ?></h3>
                                            <h6>Total Deposits</h6>
                                        </div>
                                        <div>
                                            <i class="icon-wallet success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: <?php echo $Dper; ?>%" aria-valuenow="<?php echo $Dper; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="danger">$<?php echo $totalW['SUM(amount)']; ?></h3>
                                            <h6>Total Withdrawals</h6>
                                        </div>
                                        <div>
                                            <i class="icon-bar-chart danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: <?php echo $Wper; ?>%" aria-valuenow="<?php echo $Wper; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ eCommerce statistic -->
                <!-- Recent Transactions -->
                <div class="row">
                    <div id="recent-transactions" class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Recent Transactions</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Nature</th>
                                                <th class="border-top-0">Trans. ID</th>
                                                <th class="border-top-0">Amount</th>
                                                <th class="border-top-0">Wallet ID</th>
                                                <th class="border-top-0">Time</th>
                                                <th class="border-top-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($transactions as $transaction):?>
                                                <!-- info >>> withdrawal success  -->
                                                <!-- primary >>> withdrawal pen  -->
                                                <!-- success >>> deposit success  -->
                                                <!-- warning >>> deposit pen  -->
                                                <?php if ($transaction['nature'] == 1) {$color = 'success';}else{$color = 'danger';}?>
                                                <tr class="bg-<?php echo $color; ?> bg-lighten-5">
                                                    <?php if($transaction['status'] == 1):?>
                                                        <td class="text-success">Paid</td>
                                                    <?php else:?>
                                                        <td class="text-warning">Unpaid</td>
                                                    <?php endif;?>
                                                    <td class="text-truncate">
                                                        <?php if($transaction['nature'] == 1):?>
                                                            <button type="button" class="btn btn-sm btn-outline-success round">Deposit</button>
                                                        <?php else:?>
                                                            <button type="button" class="btn btn-sm btn-outline-warning round">Withdrawal</button>
                                                        <?php endif;?>
                                                    </td>
                                                    <td class="text-truncate">
                                                        <?php echo $transaction['trans_id']; ?>
                                                    </td>
                                                    <td class="text-truncate">
                                                        $<?php echo $transaction['amount']; ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $transaction['receiver_address']; ?>
                                                    </td>
                                                    <td>
                                                    <?php echo date('F j, Y', strtotime($transaction['created_at'])); ?>
                                                    </td>
                                                    <td class="text-truncate">
                                                        <?php if($transaction['status'] == 1):?>
                                                            <?php if($transaction['nature'] == 1):?>
                                                                <a href="<?php echo BASE_URL . '/dashboard/admin/transactions/invest.php?id=' . $transaction['id'] . '&action=reverse'; ?>" class="btn btn-sm btn-outline-warning round">Reverse</a>
                                                            <?php else: ?>
                                                                <a href="<?php echo BASE_URL . '/dashboard/admin/transactions/withdrawals.php?with_id=' . $transaction['id'] . '&action=reverse'; ?>" class="btn btn-sm btn-outline-warning round">Reverse</a>
                                                            <?php endif;?>
                                                        <?php else: ?>
                                                            <?php if($transaction['nature'] == 1):?>
                                                                <a href="<?php echo BASE_URL . '/dashboard/admin/transactions/invest.php?id=' . $transaction['id'] . '&action=accept'; ?>" class="btn btn-sm btn-outline-success round">Accept</a>
                                                            <?php else: ?>
                                                                <a href="<?php echo BASE_URL . '/dashboard/admin/transactions/pwithdrawals.php?with_id=' . $transaction['id'] . '&action=accept'; ?>" class="btn btn-sm btn-outline-success round">Accept</a>
                                                            <?php endif;?>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Recent Transactions -->
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>