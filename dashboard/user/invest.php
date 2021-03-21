<?php 
include('../../path.php');
include(ROOT_PATH . '/app/controllers/accounts.php');
usersOnly();
$plans = selectAll('plans');
if(isset($_GET['plan_id'])){
    $plan_id = $_GET['plan_id'];
}

$title = 'Invest';
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
                <div class="col-md-10 mx-auto col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-colored-form-control">UserDeposit</h4>
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
                            <style>small{display: block; width: 100% !important;}</style>
                            <form class="form-v2" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                <div class="row">
                                    <small class="col-sm-12">Select Plan</small>
                                    <hr>
                                    <div class="col-sm-12">
                                        <fieldset class="form-group">
                                            <label for="plan_id">Plans</label>
                                            <select class="custom-select border-primary" name="plan_id">
                                                <option>Open plan menu</option>
                                                <?php foreach($plans as $plan):?>
                                                    <?php if(!empty($plan_id) && $plan['id'] == $plan_id):?>
                                                        <option selected value="<?php echo $plan['id'];?>"><?php echo $plan['name']; ?></option>
                                                    <?php else:?>
                                                        <option value="<?php echo $plan['id'];?>"><?php echo $plan['name']; ?></option>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="badge-light-danger text-danger"><?php echo $errors['plan_id']; ?></small>
                                        </fieldset>
                                    </div>
                                    <small class="col-sm-12">Deposit Amount</small>
                                    <hr>
                                    <div class="col-sm-12 mx-auto">
                                        <fieldset class="form-group">
                                            <label class="floating-label" for="amount">Amount</label>
                                            <input type="number" class="form-control border-primary" name="amount" placeholder="400" autocomplete="on">
                                        </fieldset>
                                        <small class="text-danger badge-light-danger"><?php echo $errors['amount']; ?></small>
                                        <small class="text-danger badge-light-danger"><?php echo $errors['enough']; ?></small>
                                    </div>
                                    <small class="col-sm-12">Currencies</small>
                                    <hr>
                                    <div class="col-sm-12 mx-auto">
                                        <fieldset class="form-group">
                                            <label for="account_id">Currency</label>
                                            <select class="form-control border-primary" name="account_id">
                                                <option></option>
                                                <?php foreach($accounts as $account):?>
                                                    <?php if(!empty($account_id) && $account_id = $account['id']):?>
                                                        <option selected value="<?php echo $account['id']; ?>"><?php echo $account['name'] . '--->' . $account['currency'];?></option>
                                                    <?php else:?>
                                                        <option value="<?php echo $account['id']; ?>"><?php echo $account['name'] . '--->' . $account['currency'];?></option>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger badge-light-danger"><?php echo $errors['account']; ?></small>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 mx-auto">
                                        <button type="submit" class="btn btn-block btn-success btn-lg" name="deposit-btn"><i class="la la-money"></i> Deposit</button>
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