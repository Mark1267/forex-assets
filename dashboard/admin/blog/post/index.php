<?php 
include('../../../../path.php');
include(ROOT_PATH . '/app/controllers/blog.php');
adminOnly();

$title = 'All Posts';
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
                <?php include(ROOT_PATH . '/app/includes/message.php'); ?>
                <div class="row">
                    <?php foreach($posts as $post):?>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <img class="img-fluid card-img-top" src="<?php echo BASE_URL . '/assets/dashboard/images/posts/' . $post['image']; ?>" alt="<?php echo $post['title']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $post['title']; ?></h5>
                                    <p class="card-text">
                                        <?php 
                                        $string_len = strlen($post['body']); $newlen = $string_len / 2;
                                        echo html_entity_decode(substr($post['body'], 0, $newlen) . '...'); ?>
                                    </p></p>
                                    <p class="card-text"><small class="text-muted">Posted On <?php echo date('F j, Y h:i:s a', strtotime($post['created_at'])); ?></small></p>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="<?php echo BASE_URL . '/dashboard/admin/blog/post/edit.php?p_id='. $post['id']; ?>" class="btn btn-info">Update</a>
                                    <a href="<?php echo BASE_URL . '/dashboard/admin/blog/post/?del_p_id='. $post['id']; ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>