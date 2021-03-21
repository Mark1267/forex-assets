<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/plans.php');
adminOnly();
$plans = selectAll($table);

$title = 'Plans';
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
            <div class="content-body row">
                <?php include(ROOT_PATH . '/app/includes/message.php'); ?>
                <?php foreach($plans as $plan): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img class="img-fluid card-img-top" src="<?php echo BASE_URL . '/assets/dashboard/images/plan/' . $plan['image']; ?>" alt="<?php echo $plan['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $plan['name']; ?></h5>
                                <style>li{list-style: none;}</style>
                                    <ul class="col-12">
                                        <li><i class="fa fa-check-double text-success"></i><?php echo $plan['dailyPercent']?>% Daily Return</li>
                                        <li><i class="fa fa-check-double text-success"></i><?php echo $plan['ROI']?> Days Return On Investment</li>
                                        <li><i class="fa fa-check-double text-success"></i>$<?php echo $plan['min']?> Minimum Investment</li>
                                        <li><i class="fa fa-check-double text-success"></i>$<?php echo $plan['max']?> Maximum Investment</li>
                                        <li><i class="fa fa-check-double text-success"></i>10% Referal Bonus</li>
                                        <li><i class="fa fa-check-double text-success"></i>24/7 Customer Services</li>
                                    </ul>
                            </div>
                            <div class="card-footer text-center bg-amber bg-lighten-2">
                                <a href="<?php echo BASE_URL . '/dashboard/admin/plans/edit.php?plan_id=' . $plan['id']; ?>" class="btn btn-sm btn-outline-info"><i class="icon fas fa-info-circle"></i>&nbsp;Edit</a>
                                <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?del_id=' . $plan['id']; ?>" class="btn btn-sm btn-outline-danger"><i class="icon fas fa-plus-circle"></i>&nbsp;Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>