<?php 
include('../../path.php');
include(ROOT_PATH . '/app/controllers/users.php');
$code = selectOne('codes', ['user_id' => $_SESSION['id']]);
$totalPages = count(selectAll($table, ['ref' => $_SESSION['id']])) / $results_per_page;
$users = selectAllLimits($table, ['ref' => $_SESSION['id']], $start, $results_per_page);

$title = 'Referrals';
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

                    <div class="col-sm-12 col-md-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Referrals Link</h5>
                                <p class="card-text p-1 bg-light inline-block">
                                    <?php echo BASE_URL . '/signup.php?ref=' . $code['ref']; ?>
                                </p>
                                <div class="btn i-block btn-success" data-clipboard-text="<?php echo BASE_URL . '/signup.php?ref=' . $code['ref']; ?>" data-filter="copy" data-toggle="tooltip" data-orignal-title="copy"><i data-feather="copy"></i>&nbsp;Copy Link</div>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Users Referrals</h5>
                                    <span class="d-block m-t-5">All your <code>referred</code> are here</span>
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
                                                    <th>T. Deposit</th>
                                                    <th>P. Deposit</th>
                                                    <th>Earnings</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($users as $key => $user):?>
                                                    <?php $totalD = sum('transactions', 'amount', ['user_id' => $user['id'], 'nature' => 1, 'status' => 1]); 
                                                        if(empty($totalD)){
                                                            $totalD['SUM(amount)'] = '0';
                                                        }
                                                        $totalP = sum('transactions', 'amount', ['user_id' => $user['id'], 'nature' => 1, 'status' => 0]); 
                                                        if(empty($totalP)){
                                                            $totalP['SUM(amount)'] = '0';
                                                        }
                                                        $earnings = 0.1 * $totalD['SUM(amount)'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $key + 1;?></td>
                                                        <td><?php echo $user['firstname']; ?></td>
                                                        <td><?php echo $user['lastname']; ?></td>
                                                        <td><?php echo $user['email']; ?></td>
                                                        <td>$<?php echo $totalD['SUM(amount)']; ?></td>
                                                        <td>$<?php echo $totalP['SUM(amount)']; ?></td>
                                                        <td>$<?php echo $earnings; ?></td>
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
                                                    <th>T. Deposit</th>
                                                    <th>P. Deposit</th>
                                                    <th>Earnings</th>
                                                    <th>Time</th>
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