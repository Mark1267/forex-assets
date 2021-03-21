<?php 
include('../../path.php');
include(ROOT_PATH . '/app/controllers/accounts.php');
usersOnly();
include(ROOT_PATH . '/app/includes/user_dash_dependances.php');
$currentInvest = sum('funds', 'currentInvestment', ['user_id' => $_SESSION['id']]);
$accounts = selectAll('accounts');
$userAccount = array('Bitcoin' => $_SESSION['btc'], 'Ethereum' => $_SESSION['eth'], 'Lite Coin' => $_SESSION['ltc'], 'XPR' => $_SESSION['xpr']);
#dd($userAccount);
$fund = sum('funds', 'currentInvestment', ['user_id' => $_SESSION['id']]);

$title = 'Withdrawal';
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
                <section id="icon-section-bg-gradient">
                    <div class="row">
                        <div class="col-12 mt-3 mb-1">
                            <div class="card p-1">
                                <div class="card-header">
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
                                <h4 class="text-uppercase">Overall User Account Overview</h4>
                                <p>Quick overview of your account. Default currency is dollar.</p>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Balance</p>
                                    </div>
                        <div class="col-xl-4 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-info bg-darken-2 rounded-left">
                                            <i class="icon-briefcase font-large-2 text-white"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-info text-white media-body rounded-right">
                                            <h5 class="text-white">Current Balance</h5>
                                            <h5 class="text-white text-bold-400 mb-0">$<?php echo $_SESSION['balance'] + $currentInvest['SUM(currentInvestment)']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-success bg-darken-2 rounded-left">
                                            <i class="icon-grid font-large-2 text-white"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-success text-white media-body rounded-right">
                                            <h5 class="text-white">Available Balance</h5>
                                            <h5 class="text-white text-bold-400 mb-0">$<?php echo $_SESSION['balance']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-warning bg-darken-2 rounded-left">
                                            <i class="icon-bar-chart font-large-2 text-white"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-warning text-white media-body rounded-right">
                                            <h5 class="text-white">Active Investments</h5>
                                            <h5 class="text-white text-bold-400 mb-0">$<?php echo $currentInvest['SUM(currentInvestment)']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Icon section with gradient bg color section end -->
                <div class="col-md-10 mx-auto col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-colored-form-control">User Withdraw</h4>
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
                        <div class="card-body">
                            <div class="card-text">
                                <p>Fill the Withdrawal Form</p>
                            </div>
                                <style>small{display: block; width: 100% !important;}</style>
                            <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                <div class="row form-body">
                                    <small class="col-sm-12">Currencies</small>
                                    <hr>
                                    <div class="col-sm-10 mx-auto">
                                        <div class="form-group">
                                            <label for="currency">Currency</label>
                                            <select class="form-control" name="currency">
                                                <option></option>
                                                <?php foreach($accounts as $key => $account):?>
                                                    <?php if(!empty($currency) && $account['id'] == $currency):?>
                                                        <option selected value="<?php echo $account['id']; ?>"><?php echo $account['name'] . '-->' . $account['currency']; ?></option>
                                                    <?php else:?>
                                                        <option value="<?php echo $account['id']; ?>"><?php echo $account['name'] . '-->' . $account['currency']; ?></option>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <small class="badge-light-danger text-danger"><?php echo $errors['currency']; ?></small>
                                    </div>
                                    <small class="col-sm-12">Amount</small>
                                    <hr>
                                    <div class="col-sm-10 mx-auto">
                                        <div class="form-group">
                                            <label class="floating-label" for="amount">Amount</label>
                                            <input type="number" max="<?php echo $_SESSION['balance']; ?>" class="form-control" name="amount" value="<?php echo $amount; ?>" placeholder="400" autocomplete="on">
                                        </div>
                                        <small class="badge-light-danger text-danger"><?php echo $errors['amount']; ?></small>
                                    </div>
                                    <small class="col-sm-12">Payment ID/Wallets</small>
                                    <hr>
                                    <div class="col-sm-10 mx-auto">
                                        <div class="form-group">
                                            <label for="account">ID/Wallets</label>
                                            <select class="form-control" name="account">
                                                <option></option>
                                                <?php foreach($userAccount as $key => $user):?>
                                                    <?php if(!empty($account) && $key === $account):?>
                                                        <option selected value="<?php echo $user;?>"><?php echo $key; ?>&nbsp;-->&nbsp;<?php echo $user;?></option>
                                                    <?php else:?>
                                                        <option value="<?php echo $user;?>"><?php echo $key; ?>&nbsp;-->&nbsp;<?php echo $user;?></option>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-warning">*If the address provided is incorrect, update your profile</small>
                                            <small class="badge-light-danger text-danger"><?php echo $errors['account']; ?></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mx-auto">
                                        <button type="submit" name="withdraw" class="btn btn-block btn-success btn-lg"><i class="la la-bank"></i> Request</button>
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
<?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>