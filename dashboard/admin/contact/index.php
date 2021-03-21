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
                    <?php foreach($contacts as $contact):?>
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h5><?php echo $contact['firstname'] . ' ' . $contact['lastname']; ?></h5>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="text-md-center"><?php echo $contact['subject']; ?></h5>
                                        </div>
                                        <div class="col-md-3"><a href="#!"><span><i class="ft ft-phone-forwarded"></i> <?php echo $contact['phone']; ?></span></a></div>
                                        <div class="col-md-3 mx-auto"><a href="#!"><span><i class="ft ft-message-square"></i> <?php echo $contact['email']; ?></span></a></div>
                                    </div>
                                </div>
                                <div class="card-body row">
                                    <div class="col-md-6">
                                    <?php echo html_entity_decode($contact['message']); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <dl class="dl-horizontal row">
                                            <dt class="col-sm-4 ">Ref ID</dt>
                                            <dd class="col-sm-8 "><?php echo $contact['ref_id']; ?></dd>
                                            <dt class="col-sm-4 ">Full Name</dt>
                                            <dd class="col-sm-8 "><?php echo $contact['firstname'] . ' ' . $contact['lastname']; ?></dd>
                                            <dt class="col-sm-4 ">Email</dt>
                                            <dd class="col-sm-8 "><?php echo $contact['email']; ?></dd>
                                            <dt class="col-sm-4 ">Phone Number</dt>
                                            <dd class="col-sm-8 "><?php echo $contact['phone']; ?></dd>
                                            <dt class="col-sm-4 ">Time</dt>
                                            <dd class="col-sm-8 "><?php echo date('F j, Y h:i:s a', strtotime($contact['created_at'])); ?></dd>
                                            <dt class="col-sm-4 ">Status</dt>
                                            <?php if($contact['status'] === 1):?>
                                                <dd class="col-sm-8 "><span class="btn btn-sm btn-outline-success round">Attended</span></dd>
                                            <?php else:?>
                                                <dd class="col-sm-8 "><span class="btn btn-sm btn-outline-warning round">Unattended</span></dd>
                                            <?php endif; ?>
                                        </dl>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="<?php echo BASE_URL . '/dashboard/admin/contact/reply.php?id=' . $contact['id']; ?>" class="btn btn-primary">Reply</a>
                                    <a href="<?php echo BASE_URL . '/dashboard/admin/contact/?del_id=' . $contact['id']; ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php include(ROOT_PATH . '/app/includes/page.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>