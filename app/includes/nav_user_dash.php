    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item">
                        <?php if($_SESSION['admin'] == 1):?>
                            <a class="navbar-brand" href="<?php echo BASE_URL . '/dashboard/admin/'; ?>">
                        <?php else:?>
                            <a class="navbar-brand" href="<?php echo BASE_URL . '/dashboard/user/'; ?>">
                        <?php endif; ?>
                            <img class="brand-logo" alt="modern admin logo" src="<?php echo BASE_URL . '/assets/dashboard/'?>images/logo/logo.png">
                            <h3 class="brand-text">Rocktera Assets</h3>
                        </a>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore Rocktera...">
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></span>
                                </span>
                                <span class="avatar avatar-online">
                  <img src="<?php echo BASE_URL . '/assets/dashboard/images/user/' . $_SESSION['image']; ?>" alt="avatar"><i></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo BASE_URL . '/dashboard/user/profile'; ?>"><i class="ft-user"></i> Edit Profile</a>
                                <a class="dropdown-item" href="<?php echo BASE_URL . '/dashboard/user/notifications.php'; ?>"><i class="ft-mail"></i> My Inbox</a>
                                <a class="dropdown-item" href="<?php echo BASE_URL . '/dashboard/user/contact.php'; ?>"><i class="ft-message-square"></i> Support</a>
                                <a class="dropdown-item" href="<?php echo BASE_URL . '/dashboard/user/invest.php'; ?>"><i class="ft-check-square"></i> Inestments</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo BASE_URL . '/logout.php'; ?>"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a>
                                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a>
                                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a>
                                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a>
                            </div>
                        </li>
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
              </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0">
                                        <span class="grey darken-2">Notifications</span>
                                    </h6>
                                    <span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>
                                </li>
                                <li class="scrollable-container media-list w-100">
                                    <?php 
                                     $feeds = selectAllLimits('feeds', ['user_id' => $_SESSION['id'], 'status' => 0], 0, 10);?>
                                    <?php foreach($feeds as $feed): ?>
                                        <a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-<?php echo $feed['type']; ?>"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading"><?php echo $feed['message']; ?></h6>
                                                    <p class="notification-text font-small-3 text-muted"><?php echo $feed['message']; ?></p>
                                                    <small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00"><?php echo date('F j, Y h:i:s a', strtotime($feed['created_at'])); ?></time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header">
                    <span data-i18n="nav.dash.main">Main</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Dashboard"></i>
                </li>
                <?php if($_SESSION['admin'] == 0):?>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/user/'; ?>"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a></li>
                    <li class=" navigation-header">
                        <span data-i18n="nav.dash.main">Personal</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Personal"></i>
                    </li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/user/'; ?>profile.php"><i class="la la-user"></i><span class="menu-title" data-i18n="nav.user.main">Profile</span></a></li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/user/'; ?>notifications.php"><i class="la la-bell"></i><span class="menu-title" data-i18n="nav.user.main">Notifications</span></a>
                        <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
                    </li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/user/'; ?>plans.php"><i class="la la-bar-chart"></i><span class="menu-title" data-i18n="nav.user.main">Plans</span></a></li>
                    <li class=" navigation-header">
                        <span data-i18n="nav.dash.main">Transactions</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Transactions"></i>
                    </li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/user/'; ?>invest.php"><i class="la la-dollar"></i><span class="menu-title" data-i18n="nav.trans.main">Invest</span></a></li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/user/'; ?>withdraw.php"><i class="la la-money"></i><span class="menu-title" data-i18n="nav.trans.main">Withdraw</span></a></li>
                    <li class=" nav-item"><a href="#"><i class="la la-th-list"></i><span class="menu-title" data-i18n="nav.trans.main">Transactions</span></a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/user/'; ?>history/invest.php" data-i18n="nav.templates.vert.classic_menu">All Investments</a>
                            </li>
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/user/'; ?>history/withdrawals.php" data-i18n="nav.templates.vert.compact_menu">All Withdrawals</a>
                            </li>
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/user/'; ?>history/pinvest.php" data-i18n="nav.templates.vert.content_menu">Pending Investments</a>
                            </li>
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/user/'; ?>history/pwithdrawals.php" data-i18n="nav.templates.vert.overlay_menu">Pending Withdrawals</a>
                            </li>
                        </ul>
                    </li>
                    <li class=" navigation-header">
                        <span data-i18n="nav.others.main">Others</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Others"></i>
                    </li>

                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/user/'; ?>contact.php"><i class="la la-envelope"></i><span class="menu-title" data-i18n="nav.others.main">Contact Admin</span></a></li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/user/'; ?>ref.php"><i class="la la-group"></i><span class="menu-title" data-i18n="nav.others.main">Refferal</span></a></li>

                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/user/'; ?>del.php"><i class="la la-remove"></i><span class="menu-title" data-i18n="nav.others.main">Delete Account</span></a></li>
                <?php else: ?>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/admin/'; ?>"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a></li>
                    <li class=" navigation-header bg-info bg-lighten-5">
                        <span data-i18n="nav.dash.main">Users</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Users"></i>
                    </li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/admin/'; ?>profile.php"><i class="la la-user"></i><span class="menu-title" data-i18n="nav.user.main">Profile</span></a></li>
                    <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.trans.main">Users</span></a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/'; ?>users/" data-i18n="nav.templates.vert.classic_menu">All Users</a>
                            </li>
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/'; ?>users/admin.php" data-i18n="nav.templates.vert.compact_menu">All Admins</a>
                            </li>
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/'; ?>users/invest.php" data-i18n="nav.templates.vert.content_menu">All Invest</a>
                            </li>
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/'; ?>users/add.php" data-i18n="nav.templates.vert.overlay_menu">Add User/Admin</a>
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/admin/'; ?>notifications.php"><i class="la la-bell"></i><span class="menu-title" data-i18n="nav.user.main">Notifications</span></a>
                        <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
                    </li>
                    <li class=" navigation-header">
                        <span data-i18n="nav.dash.main">Transactions</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Transactions"></i>
                    </li>
                    <li class=" nav-item"><a href="#"><i class="la la-check-circle-o"></i><span class="menu-title" data-i18n="nav.invest.main">Investments</span></a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/'; ?>transactions/invest.php" data-i18n="nav.templates.vert.classic_menu"><i class="la la-folder-open"></i> All</a>
                            </li>
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/'; ?>transactions/pinvest.php" data-i18n="nav.templates.vert.compact_menu"><i class="la la-gavel"></i> Pending</a>
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item"><a href="#"><i class="la la-bank"></i><span class="menu-title" data-i18n="nav.trans.main">Withdrawals</span></a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/'; ?>transactions/withdrawals.php" data-i18n="nav.templates.vert.classic_menu"><i class="la la-folder-open"></i> All</a>
                            </li>
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/'; ?>transactions/pwithdrawals.php" data-i18n="nav.templates.vert.compact_menu"><i class="la la-gavel"></i> Pending</a>
                            </li>
                        </ul>
                    </li>
                    <li class=" navigation-header">
                        <span data-i18n="nav.plan.main">Plans</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Plan"></i>
                    </li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/admin/'?>plans/add.php"><i class="la la-flag-checkered"></i><span class="menu-title" data-i18n="nav.others.main">Add Plans</span></a></li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/admin/'?>plans/"><i class="la la-flag"></i><span class="menu-title" data-i18n="nav.others.main">All Plans</span></a></li>
                    <li class=" nav-item"><a href="#"><i class="la la-list-alt"></i><span class="menu-title" data-i18n="nav.trans.main">Plans</span></a>
                        <ul class="menu-content">
                            <?php $plans = selectAll('plans'); ?>
                            <?php foreach($plans as $plan): ?>
                                <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/plans/edit.php?plan_id=' . $plan['id']; ?>" data-i18n="nav.templates.vert.classic_menu"><?php echo $plan['name']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class=" navigation-header">
                        <span data-i18n="nav.account.main">Account</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Account"></i>
                    </li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/admin/accounts/add.php'?>"><i class="la la-get-pocket"></i><span class="menu-title" data-i18n="nav.others.main">Add Account</span></a></li>
                    <li class=" nav-item"><a href="#"><i class="la la-rupee"></i><span class="menu-title" data-i18n="nav.account.main">Accounts</span></a>
                        <ul class="menu-content">
                            <?php $accounts = selectAll('accounts');?>
                            <?php foreach($accounts as $account): ?>
                                <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/accounts/edit.php?acc_id=' . $account['id']; ?>" data-i18n="nav.templates.vert.classic_menu"><?php echo $account['name']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class=" navigation-header">
                        <span data-i18n="nav.post.main">Blog</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Blog"></i>
                    </li>
                    <li class=" nav-item"><a href="#"><i class="la la-file-text"></i><span class="menu-title" data-i18n="nav.post.main">Posts</span></a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/'; ?>blog/post/add.php" data-i18n="nav.templates.vert.classic_menu">Add</a>
                            </li>
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/'; ?>blog/post/" data-i18n="nav.templates.vert.compact_menu">All</a>
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item"><a href="#"><i class="la la-gg-circle"></i><span class="menu-title" data-i18n="nav.post.main">Category</span></a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/'; ?>blog/category/add.php" data-i18n="nav.templates.vert.classic_menu">Add</a>
                            </li>
                            <li><a class="menu-item" href="<?php echo BASE_URL . '/dashboard/admin/'; ?>blog/category/" data-i18n="nav.templates.vert.compact_menu">All</a>
                            </li>
                        </ul>
                    </li>
                    <li class=" navigation-header">
                        <span data-i18n="nav.post.main">Email</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Email"></i>
                    </li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/admin/email/add.php'; ?>"><i class="la la-file-text"></i><span class="menu-title" data-i18n="nav.post.main">Add</span></a>
                    </li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/admin/email/'; ?>"><i class="la la-gg-circle"></i><span class="menu-title" data-i18n="nav.post.main">All</span></a></li>
                    <li class=" navigation-header">
                        <span data-i18n="nav.others.main">Others</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Others"></i>
                    </li>
                    <li class=" nav-item"><a href="<?php echo BASE_URL . '/dashboard/admin/'; ?>contact/"><i class="la la-envelope"></i><span class="menu-title" data-i18n="nav.others.main">Messages</span></a></li>
                <?php endif; ?>
                <li class=" nav-item"><a href="<?php echo BASE_URL . '/'; ?>logout.php"><i class="la la-lock"></i><span class="menu-title" data-i18n="nav.others.main">Log Out</span></a></li>
            </ul>

            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item col-12 text-center">
                        <a class="navbar-brand" href="index.html">
                            <img class="brand-logo" alt="modern admin logo" src="<?php echo BASE_URL . '/assets/dashboard/'?>images/logo/logo.png" style="width: 100px;">
                            <h3 class="brand-text">Rocktera Assets</h3>
                        </a>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>