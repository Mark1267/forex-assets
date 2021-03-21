<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/contacts.php');
adminOnly();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $mail = selectOne($table2, ['id' => $id]);
    $subject = $mail['subject'];
    $body1 = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Document</title><link rel="preconnect" href="https://fonts.gstatic.com"><link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"></head><body style="background: background: rgb(248, 248, 248); font-family: "Quicksand", sans-serif; font-size: 15px; margin: 0; @import url("https://fonts.googleapis.com/css2?family=Quicksand&display=swap");"><div class="container" style="background-color:white; max-width: 1000px; margin: 0px auto; position: relative"><div class="row" style=" padding: 10px; background: #bde884; margin-bottom: 10px;"><div class="col-4 mx-auto" style="margin: 0px auto; width: 33.33% !important;"><img src="https://rocktera-assets.com/assets/open/images/logo-home5.png" alt="rockteraassets_logo" class="img-fluid{LOGO}" style="width: 100%; vertical-align: middle;"></div></div>';
        $body2 = '<a href="https://rocktera-assets.com/signin" class="btn" style="margin: 15px auto; display: inline-block; text-align: center; padding: 16px 30px; border-radius: 4px; color: white; background-color: #73ae20; text-decoration: none;">Dashboard</a><p>If you have any questions, please reply to this email. I’m always happy to help!</p><footer style="background-color: white; color: #c7c7c7; text-align: center; font-size: 10px;"><div style="background-color: #73ae20; color: white; padding: 20px 0px;"><p>Great to have you on board</p></div><center style="padding: 10px;"><p>Dalton House, 60 Windsor Ave, London SW19 2RR, United Kingdom</p><span style="margin: 3px 7px;">Mail: support@rocktera-assets.com</span></center></footer></div></body></html>';
    $body = str_replace($body1,"",$mail['body']);
    $body = str_replace($body2,"",$body);
}

$title = 'Update';
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
                <div class="col-xl-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h5>Template</h5><small>Update Template</small>
                        </div>
                        <div class="card-body">
                            <form class="form-v2" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                                            <label class="floating-label" for="body">HTML Code</label>
                                            <textarea rows="4" cols="7" class="form-control" id="ckeditor" name="body" placeholder="&lt;div class=&quot;..." autocomplete="on"><?php echo $body; ?></textarea>
                                        </div>
                                        <small class="badge-light-danger text-danger"><?php echo $errors['body']; ?></small>
                                    </div>
                                    <div class="col-sm-6 mx-auto">
                                        <button name="updateTemp" type="submit" class="btn btn-block btn-success">Update</button>
                                    </div>
                                </div>
                        </form>
                    </div></div></div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>