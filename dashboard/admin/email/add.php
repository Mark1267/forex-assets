<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/contacts.php');
adminOnly();

$title = 'Add Templates';
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
                                <?php include(ROOT_PATH . '/app/includes/message.php'); ?>
            
                <div class="col-xl-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h5>Template</h5><small>Add Template</small>
                        </div>
                        <div class="card-body">
                            <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                <div class="row">
                                    <small class="col-sm-12">Subject</small>
                                    <hr>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="subject">Subject</label>
                                            <input type="text" class="form-control" value="<?php echo $subject; ?>" name="subject" placeholder="Withdrawal Request Denailed" autocomplete="on">
                                            <small class="badge-light-danger text-danger"><?php echo $errors['subject']; ?></small>
                                            <small class="badge-light-danger text-danger"><?php echo $errors['subject_match']; ?></small>
                                        </div>
                                    </div>
                                    <small class="col-sm-12">HTML Code</small>
                                    <hr>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea rows="4" id="ckeditor" cols="7" class="form-control" name="body" placeholder="&lt;div class=&quot;..." autocomplete="on"><?php echo $body; ?></textarea>
                                        </div>
                                        <small class="badge-light-danger text-danger"><?php echo $errors['body']; ?></small>
                                    </div>
                                    <div class="col-sm-6 mx-auto">
                                        <button name="addTemp" type="submit" class="btn btn-block btn-success">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Keys</h5><small>Keys for adding Template</small>
                        </div>
                        <div class="card-body">
                            <dl class="dl-horizontal row">
                                <?php $user = selectOne('users', ['id' => $_SESSION['id']]); ?>
                                <?php foreach($user as $key => $value):?>
                                    <dt class="col-sm-3">{<?php echo $key;?>}</dt>
                                    <dd class="col-sm-3"><?php
                                        if($key === 'OTK'){$key = 'One Time Key';}
                                        if($key === 'ref'){$key = 'Reffered ID';}
                                        if($key === 'status'){$key = 'Admin or User';}
                                        if($key === 'balance'){$key = 'User Balance';}
                                        if($key === 'password'){$key = 'Password In SHA-MD5';}
                                        if($key === 'addressI'){$key = 'Address One';}
                                        if($key === 'addressII'){$key = 'Address Two';}
                                        if($key === 'created_at'){$key = 'Date and Time Joined';}
                                    echo $key;?></dd>
                                <?php endforeach; ?>
                            </dl>
                        </div>
                    </div>
            </div>
                <!-- [ Main Content ] end -->
                </div>
            </div>
    <!-- [ Main Content ] end -->
    </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>