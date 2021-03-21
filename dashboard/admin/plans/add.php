<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/plans.php');
adminOnly();

$title = 'Add Plan';
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
                                <h5>Plan</h5><small>Add a Plan</small>
                            </div>
                            <div class="card-body">
                                <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <small class="col-sm-12">Image</small>
                                        <hr>
                                        <div class="col-sm-12">
                                            <div class="input-group mb-1">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image">
                                                    <label class="custom-file-label border-primary" for="image">Choose file 1</label>
                                                </div>
                                            </div>
                                            <small class="badge-light-danger text-danger"><?php echo $errors['image'];?></small>
                                            <small class="badge-light-danger text-danger"><?php echo $errors['image1'];?></small>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label" for="titlep">Name</label>
                                                <input type="text" class="form-control border-primary" name="titlep" placeholder="Starter" autocomplete="on" value="<?php echo $titlep; ?>">
                                                <small class="badge-light-danger text-danger"><?php echo $errors['titlep'];?></small>
                                                <small class="badge-light-danger text-danger"><?php echo $errors['titlei'];?></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label" for="min">Minimum Investment</label>
                                                <input type="number" class="form-control border-primary" name="min" placeholder="100" autocomplete="on" value="<?php echo $min; ?>">
                                                <small class="badge-light-danger text-danger"><?php echo $errors['min'];?></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label" for="max">Maximum Investment</label>
                                                <input type="number" class="form-control border-primary" name="max" placeholder="10000" autocomplete="on" value="<?php echo $max; ?>">
                                                <small class="badge-light-danger text-danger"><?php echo $errors['max'];?></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="floating-label" for="dailyPercent">Daily Percentage Interest</label>
                                                    <input type="text" class="form-control border-primary" name="dailyPercent" placeholder="2.8" value="<?php echo $dailyPercent; ?>" autocomplete="on">
                                                    <small class="badge-light-danger text-danger"><?php echo $errors['dailyPercent'];?></small>
                                                </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label" for="ROI">ROI (Days)</label>
                                                <input type="number" class="form-control border-primary" name="ROI" placeholder="10" autocomplete="on" value="<?php echo $ROI; ?>">
                                                <small class="badge-light-danger text-danger"><?php echo $errors['ROI'];?></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mx-auto">
                                            <button type="submit" name="addPlan" class="btn btn-block btn-success">Submit</button>
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