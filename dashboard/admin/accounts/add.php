<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/accounts.php');
adminOnly();

$title = 'Add Account';
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<?php include(ROOT_PATH . '/app/includes/link_dash_top.php'); ?>

<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <?php include(ROOT_PATH . '/app/includes/nav_user_dash.php'); ?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-xl-10 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h5>Account</h5><small>Add an Account</small>
                            </div>
                            <div class="card-body">
                                <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label" for="name">Account Name</label>
                                                <input type="text" class="form-control border-primary" name="name" placeholder="Bitcoin" autocomplete="on" value="<?php echo $name; ?>">
                                                <small class="badge-light-danger text-danger"><?php echo $errors['name'];?></small>
                                                <small class="badge-light-danger text-danger"><?php echo $errors['exn'];?></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label" for="address">Account Address</label>
                                                <input type="text" class="form-control border-primary" name="address" placeholder="XCfr5RgbN7yX3exDrDx£2Okm8" autocomplete="on" value="<?php echo $address; ?>">
                                                <small class="badge-light-danger text-danger"><?php echo $errors['address'];?></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label" for="currency">Currency</label>
                                                <input type="text" class="form-control border-primary" name="currency" placeholder="BTC" autocomplete="on" value="<?php echo $currency; ?>">
                                                <small class="col-12">Eg. Bitcoin is BTC, Bitcoin Cash is BCH etc.<span class="text-danger"><br>Please Input the correct Symbol. Otherwise users will get an error message will depositing.</span></small>
                                                <small class="badge-light-danger text-danger border-danger rounded"><?php echo $errors['currency'];?></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mx-auto">
                                            <button type="submit" name="addAccount" class="btn btn-block btn-success">Add</button>
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