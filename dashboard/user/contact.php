<?php 
include('../../path.php');
include(ROOT_PATH . '/app/controllers/contacts.php');

$title = 'Contact Admin';
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
                    <div class="col-12 col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h5>Contact Admin</h5><small>Send us a message and we will get back to you as soon as possible.</small>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <style>small{display: block; width: 100% !important;}</style>
                            <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                <div class="row">
                                    <small class="col-sm-12">Subject</small>
                                    <hr>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="subject">Subject</label>
                                            <input type="text" class="form-control" value="<?php echo $subject; ?>" name="subject" placeholder="Subject Goes Here" autocomplete="on">
                                        </div>
                                        <small class="text-danger badge-light-danger"><?php echo $errors['subject']; ?></small>
                                    </div>
                                    <small class="col-sm-12">Details</small>
                                    <hr>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="firstname">First Name</label>
                                            <input type="text" class="form-control" name="firstname" value="<?php echo $_SESSION['firstname']; ?>" placeholder="John" autocomplete="on">
                                        </div>
                                        <small class="text-danger badge-light-danger"><?php echo $errors['firstname']; ?></small>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="lastname">Last Name</label>
                                            <input type="text" class="form-control" name="lastname" value="<?php echo $_SESSION['lastname']; ?>" placeholder="Doe" autocomplete="on">
                                        </div>
                                        <small class="text-danger badge-light-danger"><?php echo $errors['lastname']; ?></small>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="email">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="example@gmail.ca" autocomplete="on">
                                        </div>
                                        <small class="text-danger badge-light-danger"><?php echo $errors['email']; ?></small>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="phone">Phone Number</label>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $_SESSION['phone']; ?>" placeholder="+1(XX) XXX XXX XXX" autocomplete="on">
                                        </div>
                                        <small class="text-danger badge-light-danger"><?php echo $errors['phone']; ?></small>
                                    </div>
                                    <small class="col-sm-12">Message</small>
                                    <hr>
                                    <div class="col-sm-10 mx-auto">
                                        <div class="form-group">
                                            <label class="floating-label" for="message">Message:</label>
                                            <textarea rows="4" cols="7" class="form-control" name="message" placeholder="Message Here" autocomplete="one"><?php echo $message; ?></textarea>
                                        </div>
                                        <small class="text-danger badge-light-danger"><?php echo $errors['message']; ?></small>
                                    </div>
                                    <div class="col-sm-6 mx-auto">
                                        <button type="submit" name="contact-user" class="btn btn-block btn-primary">Contact</button>
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