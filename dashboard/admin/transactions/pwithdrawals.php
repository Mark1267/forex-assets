<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/accounts.php');
adminOnly();
$transactions = selectAll($table2, ['nature' => 0, 'status' => 0]);

$title = 'Pending Withdrawals';
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
                    <section id="configuration" style="width: 100% !important;">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Pending Withdrawals</h4>
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
                                                        <th>Trans ID</th>
                                                        <th>Amount</th>
                                                        <th>Wallet ID</th>
                                                        <th>Time</th>
                                                        <th>Accept</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($transactions as $key => $transaction):?>
                                                        <?php $user = selectOne('users', ['id' => $transaction['user_id']]);?>
                                                        <tr>
                                                            <td><?php echo $key + 1;?></td>
                                                            <td><?php echo $user['firstname']; ?></td>
                                                            <td><?php echo $transaction['trans_id']; ?></td>
                                                            <td>$<?php echo $transaction['amount']; ?></td>
                                                            <td><?php echo $transaction['receiver_address']; ?></td>
                                                            <td><?php echo date('F j, Y h:i:s a', strtotime($transaction['created_at'])); ?></td>
                                                            <td><a href="<?php echo BASE_URL . '/dashboard/admin/transactions/pinvest.php?id=' . $transaction['id'] . '&action=accept'; ?>" class="btn btn-sm btn-outline-success round">Accept</a></td>
                                                            <td><a href="<?php echo BASE_URL . '/dashboard/admin/transactions/pinvest.php?del_id=' . $transaction['id']; ?>" class="btn btn-sm btn-outline-danger round">Delete</a></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>First Name</th>
                                                        <th>Trans ID</th>
                                                        <th>Amount</th>
                                                        <th>Wallet ID</th>
                                                        <th>Time</th>
                                                        <th>Accept</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--/ Recent Transactions -->
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>