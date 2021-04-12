<?php 
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH .  '/app/helpers/file_manger.php');
include(ROOT_PATH . '/app/helpers/middleware.php');
include(ROOT_PATH . '/app/helpers/validate.php');
$errors = array();
$error = array();

#plans error var
$errors['titlep'] = $titlep = $ROI = $min = $max = $dailyPercent = '';
$errors['ROI'] = $errors['min'] = $errors['max'] = $errors['dailyPercent'] = '';
$errors['titlei'] = '';

$errors['title'] = $titleP = $errors['empty'] = $errors['failed'] = $errors['type'] = '';

$table = 'plans';
$plans = selectAll($table);

if(isset($_GET['plan_id'])){
    $id = $_GET['plan_id'];
    $plan = selectOne($table, ['id' => $id]);
    $titlep = $plan['name'];
    $ROI = $plan['ROI'];
    $min = $plan['min'];
    $max = $plan['max'];
    $dailyPercent = $plan['dailyPercent'];
}

#addPlan
if(isset($_POST['addPlan'])){
    adminOnly();
    $genErrors = planVal($_POST);
    $errors = $genErrors[0];
    $subMainError = $genErrors[1];
    
    $genE = upload(ROOT_PATH . "/assets/dashboard/images/plan/", XIMAGE, 'image');
    $subMainError = array_merge($genE[0], $subMainError);
    $errors = array_merge($genE[1], $errors);

    #dd($subMainError);
    if(count($subMainError) === 0){
        $_POST['name'] = $_POST['titlep'];
        unset($_POST['addPlan'], $_POST['titlep']);
        $_POST['user_id'] = $_SESSION['id'];
        $plan_id = create($table, $_POST);
        $message = 'Admin ' . $_SESSION['firstname'] . ' created a new plan.';
        $feed_id = create('feeds', ['user_id' => $_POST['user_id'], 'message' => $message, 'type' => 'primary', 'status' => 1]);
        $_SESSION['message'] = 'Plan created successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/dashboard/admin/plans/');
        exit();
    }else{
        $titlep = $_POST['titlep'];
        $ROI = $_POST['ROI'];
        $min = $_POST['min'];
        $max = $_POST['max'];
        $dailyPercent = $_POST['dailyPercent'];
    }
}

#updatePlan
if(isset($_POST['updatePlan'])){
    adminOnly();
    $genErrors = planVal($_POST);
    $errors = $genErrors[0];
    $subMainError = $genErrors[1];
    if (empty($_FILES['image']['name'])) {
        $errors['empty'] = '';
        $errors['failed'] = '';
        $errors['type'] = '';
    }else{
        $genE = upload(ROOT_PATH . "/assets/dashboard/images/plan/", XIMAGE, 'image');
        $subMainError = array_merge($genE[0], $subMainError);
        $errors = array_merge($genE[1], $errors);
    }
    if(count($subMainError) === 0){
        $_POST['name'] = $_POST['titlep'];
        $id = $_POST['id'];
        $_POST['user_id'] = $_SESSION['id'];
        unset($_POST['updatePlan'], $_POST['id'], $_POST['titlep']);
        $plan_id = update($table, $id, $_POST);
        $message = 'Admin ' . $_SESSION['firstname'] . ' updated a plan:' . $_POST['name'];
        $feed_id = create('feeds', ['user_id' => $_POST['user_id'], 'message' => $message, 'type' => 'info', 'status' => 1]);
        $_SESSION['message'] = 'Plan updated successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/dashboard/admin/plans/');
        exit();
    }else{
        $id = $_POST['id'];
        $titlep = $_POST['title'];
        $ROI = $_POST['ROI'];
        $min = $_POST['min'];
        $max = $_POST['max'];
        $dailyPercent = $_POST['dailyPercent'];
    }
}

