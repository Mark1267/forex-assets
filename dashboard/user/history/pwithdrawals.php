<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/accounts.php');
$transactions = selectAll('transactions', ['nature' => 0, 'user_id' => $_SESSION['id'], 'status' => 0]);
$totalD = sum('transactions', 'amount', ['nature' => 0, 'user_id' => $_SESSION['id'], 'status' => 0]);
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
                <!-- Sell Orders & Buy Order -->
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo $title; ?></h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted">Total : $<?php echo $totalD['SUM(amount)']; ?></p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                            <tr class="bg-primary bg-lighten-2 text-white">
                                                <th>S/N</th>
                                                <th>Trans. ID</th>
                                                <th>Amount</th>
                                                <th>Wallet ID</th>
                                                <th>Status</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                                <tbody>
                                                    <?php foreach($transactions as $key => $transaction):?>
                                                    <tr>
                                                        <td><?php echo $key + 1; ?></td>
                                                        <td><?php echo $transaction['trans_id']; ?></td>
                                                        <td>$<?php echo $transaction['amount']; ?></td>
                                                        <td><?php echo $transaction['receiver_address']; ?></td>
                                                        <?php if($transaction['status'] == 1):?>
                                                            <td class="badge-light-success">Success</td>
                                                        <?php else:?>
                                                            <td class="badge-light-warning">Pending</td>
                                                        <?php endif;?>
                                                        <td><?php echo date('F j, Y', strtotime($transaction['created_at'])); ?></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Sell Orders & Buy Order -->
            </div>
        </div>
    </div>
<?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>