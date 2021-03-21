<?php 
include('../../../../path.php');
include(ROOT_PATH . '/app/controllers/blog.php');
adminOnly();

$title = 'Add Categories';
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
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Category</h5><small>Add a category for blog post</small>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                        <div class="row">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="floating-label" for="title">Title</label>
                                                    <input value="<?php echo $titlep; ?>" type="text" class="form-control" name="title" placeholder="Privacy & Policy" autocomplete="on">
                                                    <small class="text-danger"><?php echo $errors['title']; ?></small>
                                                </div>
                                            </div>
                                            <small class="col-sm-12">Description</small>
                                            <hr>
                                            <div class="col-sm-12 mx-auto">
                                                <div class="form-group">
                                                    <label class="floating-label" for="about">Description</label>
                                                    <textarea name="about" id="ckeditor" cols="30" rows="15" class="ckeditor form-control" placeholder="Post Body Here..." autocomplete="on"><?php echo $about; ?></textarea>
                                                    <small class="text-danger"><?php echo $errors['about']; ?></small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" name="addCategory" class="btn btn-block btn-success">Add</button>
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
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>

</body>

</html>