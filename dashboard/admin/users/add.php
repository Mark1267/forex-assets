<?php include('../../../path.php');
include(ROOT_PATH . '/app/controllers/users.php');
adminOnly();

$users = selectAll($table, ['admin' => 0]);
$title = 'Dashboard';
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
                
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Add User</h5>
                                    <span class="d-block m-t-5">Add new <code>admin</code> here</span>
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
                                <div class="card-content collapse show">
                                <div class="card-body">
                                <div class="card-text">
                                    <p>View and Update your profile.</p>
                                </div>                        <?php include(ROOT_PATH . '/app/includes/message.php');?>

                                <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="la la-eye"></i> About User</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="firstname">Fist Name</label>
                                                    <input type="text" id="firstname" class="form-control border-primary" placeholder="First Name" name="firstname" value="<?php echo $firstname; ?>">
                                                </div>
                                                <small class="badge badge-default badge-info"><?php echo $errors['ef']; ?></small>
                                                <small class="badge badge-default badge-info"><?php echo $errors['efi']; ?></small>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="lastname">Last Name</label>
                                                <input type="text" id="lastname" class="form-control border-primary" placeholder="Last Name"
                                                name="lastname" value="<?php echo $lastname; ?>">
                                                </div>
                                                <small class="badge badge-default badge-info"><?php echo $errors['el']; ?></small>
                                                <small class="badge badge-default badge-info"><?php echo $errors['eli']; ?></small>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" id="username" class="form-control border-primary" placeholder="Username"
                                                name="username" value="<?php echo $username; ?>">
                                                </div>                                                
                                                <small class="badge badge-default badge-info"><?php echo $errors['unr']; ?></small>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="occupation">Occupation</label>
                                                <input type="text" id="occupation" class="form-control border-primary" placeholder="Investor"
                                                name="occupation" value="<?php echo $occupation; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="form-section"><i class="ft-trending-up"></i> Security</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" id="password" class="form-control border-primary" placeholder="New Password">
                                                </div>
                                                <small class="badge badge-default badge-info"><?php echo $errors['pr']; ?></small>
                                                <small class="badge badge-default badge-info"><?php echo $errors['pri']; ?></small>
                                                <small class="badge badge-default badge-info"><?php echo $errors['psl']; ?></small>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="cpassword">Confirm Password</label>
                                                <input type="password" name="cpassword" id="cpassword" class="form-control border-primary" placeholder="Confirm New Password" value="<?php echo $cpassword; ?>">
                                                </div>
                                                <small class="badge badge-default badge-info"><?php echo $errors['cpse']; ?></small>
                                                <small class="badge badge-default badge-info"><?php echo $errors['cps']; ?></small>
                                            </div>
                                        </div>
                                        <h4 class="form-section"><i class="ft-mail"></i> Contact Info & Bio</h4>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input class="form-control border-primary" type="email" name="email" placeholder="Email" id="email" value="<?php echo $email; ?>">
                                            <small class="badge badge-default badge-info"><?php echo $errors['eme']; ?></small>
                                            <small class="badge badge-default badge-info"><?php echo $errors['emei']; ?></small>
                                            <small class="badge badge-default badge-info"><?php echo $errors['exe']; ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input class="form-control border-primary" name="phone" id="phone" type="tel" placeholder="Phone Number" value="<?php echo $phone; ?>">
                                        </div>
                                        <fieldset class="radio">
                                        <label>
                                            <input type="radio" name="admin" value=""> Admin
                                        </label>
                                        </fieldset>
                                    </div>
                                    <div class="form-actions center">
                                        <button type="submit" class="btn btn-success btn-sm" name="adminAdd">
                                            <i class="la la-check-square-o"></i> Add
                                        </button>
                                    </div>
                                </div>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- DOM - jQuery events table -->
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>