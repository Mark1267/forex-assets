<?php include('../../path.php'); 
include(ROOT_PATH . '/app/controllers/users.php');
usersOnly();

$title = 'Profile';
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
                <div class="col-md-10 mx-auto col-12">
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">User Profile</h4>
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

                            <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-eye"></i> About User</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                            <label for="image">Profile Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="firstname">Fist Name</label>
                                            <input type="text" id="firstname" class="form-control border-primary" placeholder="First Name"
                                            name="firstname" value="<?php echo $_SESSION['firstname']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" id="lastname" class="form-control border-primary" placeholder="Last Name"
                                            name="lastname" value="<?php echo $_SESSION['lastname']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" id="username" class="form-control border-primary" placeholder="Username"
                                            name="username" value="<?php echo $_SESSION['username']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="occupation">Occupation</label>
                                            <input type="text" id="occupation" class="form-control border-primary" placeholder="Investor"
                                            name="occupation" value="<?php echo $_SESSION['occupation']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" id="address" class="form-control border-primary" placeholder="5th Ave. Missipi" name="address" value="<?php echo $_SESSION['address']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="addressII">Address II(Optional)</label>
                                            <input type="text" id="addressII" class="form-control border-primary" placeholder="15th Ave. Missipi" name="addressII" value="<?php echo $_SESSION['addressII']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" id="city" class="form-control border-primary" placeholder="Leeds" name="city" value="<?php echo $_SESSION['city']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="zip">Zip Code</label>
                                                <input type="text" id="zip" class="form-control border-primary" placeholder="C0VW UP0" name="zip" value="<?php echo $_SESSION['zip']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" id="state" class="form-control border-primary" placeholder="London" name="state" value="<?php echo $_SESSION['state']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" id="country" class="form-control border-primary" placeholder="United Kingdom" name="country" value="<?php echo $_SESSION['country']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="form-section"><i class="ft-trending-up"></i> Finacials</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="btc">BTC Wallet ID</label>
                                            <input type="text" id="btc" class="form-control border-primary" placeholder="T5dcY78skmI5dawQ1Vtfds5MkO02Xrf" name="btc" value="<?php echo $_SESSION['btc']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="btc">ETH Wallet ID</label>
                                            <input type="text" id="eth" class="form-control border-primary" placeholder="T5dcY78skmI5dawQ1Vtfds5MkO02Xrf" name="eth" value="<?php echo $_SESSION['eth']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="btc">XPR Wallet ID</label>
                                            <input type="text" id="xpr" class="form-control border-primary" placeholder="T5dcY78skmI5dawQ1Vtfds5MkO02Xrf" name="xpr" value="<?php echo $_SESSION['xpr']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="btc">Lite Coin Wallet ID</label>
                                            <input type="text" id="ltc" class="form-control border-primary" placeholder="T5dcY78skmI5dawQ1Vtfds5MkO02Xrf" name="ltc" value="<?php echo $_SESSION['ltc']; ?>">
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
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="cpassword">Confirm Password</label>
                                            <input type="password" name="cpassword" id="cpassword" class="form-control border-primary" placeholder="Confirm New Password">
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="form-section"><i class="ft-mail"></i> Contact Info & Bio</h4>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control border-primary" type="email" name="email" placeholder="Email" id="email" value="<?php echo $_SESSION['email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input class="form-control border-primary" name="phone" id="phone" type="tel" placeholder="Phone Number" value="<?php echo $_SESSION['phone']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="about">Bio</label>
                                        <textarea id="about" name='about' rows="5" class="form-control border-primary" placeholder="Bio"><?php echo $_SESSION['about']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-actions center">
                                    <button type="submit" class="btn btn-success btn-lg" name="complete-profile">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
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