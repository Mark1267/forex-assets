<?php 
include('../../path.php');
include(ROOT_PATH . '/app/controllers/users.php');
adminOnly();
$totalPages = count(selectAll('feeds', ['user_id' => $_SESSION['id']])) / $results_per_page;
$feedsi = selectAllLimits('feeds', ['user_id' => $_SESSION['id']], $start, $results_per_page);

$title = 'Notifications';
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
                        <div class="col-xl-9 col-lg-9 col-12 mx-auto">
                            <div class="card p-1">
                                <div class="card-content">
                                    <?php foreach($feedsi as $feed):?>
                                        <a href="javascript:void(0)" class="">
                                            <div class="media p-md-2 p-1 bg-<?php echo $feed['type']; ?> bg-darken-2 mb-1">
                                                <div class="media-left align-self-center m-1"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading text-white"><?php echo $feed['message']; ?></h6>
                                                    <p class="notification-text font-small-3 text-white"><?php echo $feed['message']; ?></p>
                                                    <small>
                                                    <time class="media-meta text-white" datetime="2015-06-11T18:29:20+08:00"><?php echo date('F j, Y h:i:s a', strtotime($feed['created_at'])); ?></time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                        <?php endforeach; ?>
                                </div>
                                <?php include(ROOT_PATH . '/app/includes/page.php'); ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>