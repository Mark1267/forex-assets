<?php 
include('../../../../path.php');
include(ROOT_PATH . '/app/controllers/blog.php');
adminOnly();

$title = 'All Categories';
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
                <div class="col-xl-12">
                    <?php include(ROOT_PATH . '/app/includes/message.php'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h5>Category Table</h5>
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
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($categories as $key => $category):?>
                                        <tr>
                                            <td>
                                                <?php echo $key + 1; ?>
                                            </td>
                                            <td>
                                                <?php echo $category['title']; ?>
                                            </td>
                                            <td>
                                                <?php echo html_entity_decode(substr($category['about'], 0, 150) . '...'); ?>
                                            </td>
                                            <td class="badge-light-success"><a class="text-success" href="<?php echo BASE_URL . '/dashboard/admin/blog/category/edit.php?cat_id=' . $category['id'];?>">Edit</a></td>
                                            <td class="badge-light-danger"><a href="<?php echo BASE_URL . '/dashboard/admin/blog/category/?del_cat_id=' . $category['id']; ?>" class="text-danger">Delete</a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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