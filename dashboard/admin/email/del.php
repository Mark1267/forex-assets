<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/contacts.php');
$title = 'Delete';
if(isset($_GET['id'])){
    $mail = selectOne('mail', ['id' => $_GET['id']]);

}else{
    $_SESSION['message'] = 'No id selected';
    $_SESSION['type'] = 'danger';
    header('location:' . BASE_URL . '/dashboard/admin/email/');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH . '/app/includes/link_dash_top.php'); ?>

<body class="">
 <?php include(ROOT_PATH . '/app/includes/nav_user_dash.php'); ?>
            <div class="row">
                <div class="col-sm-12 col-md-5 mx-auto my-auto"><br>
                    <hr><br>
                    <hr>
                    <div class="card text-center mt-2">
                        <div class="card-body">
                            <h5 class="card-title">Are you sure?</h5>
                            <p class="card-text">Are you sure you want to delete the mail template <?php echo $mail['subject']; ?>? We will miss you.</p>
                            <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?del_id=' . $_GET['id']; ?>" class="btn  btn-danger">Proceed</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
    </div>
    <!-- [ Main Content ] end -->
    </div>
    <!-- Required Js -->
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php');?>
</body>

</html>