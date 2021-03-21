<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/contacts.php');
adminOnly();
$totalPages = count(selectAll($table)) / $results_per_page;
$contacts = selectAllLimits($table, [], $start, $results_per_page);

$title = 'Contacts';
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
                    <div class="col-xl-12 pb-3">
                        <div class="card">
                            <div class="card-header">
                                <h5>Reply User</h5><small>Send a message.</small>
                            </div>
                            <div class="card-body">
                                <form class="form" method="POST" enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <div class="row">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="floating-label" for="subject">Subject</label>
                                                <input type="text" class="form-control border-info" value="<?php echo $subject; ?>" name="subject" placeholder="Subject Goes Here" autocomplete="on">
                                            </div>
                                        </div>
                                        <small class="col-sm-12">Details</small>
                                        <hr>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label" for="firstname">First Name</label>
                                                <input disabled type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>" placeholder="John" autocomplete="on">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label" for="lastname">Last Name</label>
                                                <input disabled type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>" placeholder="Doe" autocomplete="on">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label" for="email">Email</label>
                                                <input disabled type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="example@gmail.ca" autocomplete="on">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="floating-label" for="phone">Phone Number</label>
                                                <input disabled type="tel" class="form-control" name="phone" value="<?php echo $phone; ?>" placeholder="+1(XX) XXX XXX XXX" autocomplete="on">
                                            </div>
                                        </div>
                                        <small class="col-sm-12">Message</small>
                                        <hr>
                                        <div class="col-sm-17">
                                            <div class="form-group">
                                                <label class="floating-label" for="message">Message:</label>
                                                <textarea rows="4" cols="7" class="form-control" name="reply" id="ckeditor" placeholder="Message Here" autocomplete="on"><?php echo $message; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mx-auto">
                                            <button type="submit" name="re-contact" class="btn btn-block btn-primary">Reply</button>
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