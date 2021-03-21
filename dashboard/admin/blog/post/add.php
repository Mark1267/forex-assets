<?php 
include('../../../../path.php');
include(ROOT_PATH . '/app/controllers/blog.php');
adminOnly();

$title = 'Add Post';
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
                                <h5>Blog Post</h5><small>Add a blog post</small>
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
                                    <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                                        <div class="row">
                                            <small class="col-sm-12">Image</small>
                                            <hr>
                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image">
                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                    </div>
                                                </div>
                                                <small class="badge-light-danger text-danger"><?php echo $errors['image']; ?></small>
                                            </div>
                                            <small class="col-sm-12">Title</small>
                                            <hr>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="floating-label" for="title">Title</label>
                                                    <input type="text" class="form-control" name="title" placeholder="Privacy & Policy" autocomplete="on" value="<?php echo $titlee; ?>">
                                                <small class="badge-light-danger text-danger"><?php echo $errors['title']; ?></small>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="cat_id">Category</label>
                                                    <select class="form-control" name="cat_id">
                                                        <option></option>
                                                        <?php foreach($categories as $category):?>
                                                            <?php if(!empty($cat_id) && $cat_id = $category['id']):?>
                                                                <option selected value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
                                                            <?php else:?>
                                                                <option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
                                                            <?php endif;?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <small class="text-danger badge-light-danger"><?php echo $errors['cat_id']; ?></small>
                                                </div>
                                            </div>
                                            <small class="col-sm-12">Post</small>
                                            <hr>
                                            <div class="col-sm-12 mx-auto">
                                                <div class="form-group">
                                                    <label class="floating-label" for="postBody">Body</label>
                                                    <textarea name="body" id="ckeditor" cols="30" rows="15" class="ckeditor" class="form-control" placeholder="Post Body Here..." autocomplete="on"><?php echo $body; ?></textarea>
                                                <small class="badge-light-danger text-danger"><?php echo $errors['body']; ?></small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" name="addPost" class="btn btn-block btn-success">Add</button>
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