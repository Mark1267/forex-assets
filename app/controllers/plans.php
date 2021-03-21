<?php 
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/helpers/middleware.php');
include(ROOT_PATH . '/app/helpers/validate.php');
$errors = array();
$error = array();

#plans error var
$errors['titlep'] = $titlep = $ROI = $min = $max = $dailyPercent = $errors['image'] = $errors['image1'] = '';
$errors['ROI'] = $errors['min'] = $errors['max'] = $errors['dailyPercent'] = '';
$errors['titlei'] = '';

$errors['image'] = $errors['title'] = '';
$titleP = '';

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
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/dashboard/images/plan/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            $errors['image'] = '';
        if ($result) {
            $_POST['image'] = $image_name;
            $errors['image1'] = '';
        } else {
            array_push($subMainError, 'Failed To Upload Image');
            $errors['image1'] = 'Failed to upload image';
        }
    } else {
        array_push($subMainError, 'Post Image Required');
        $errors['image'] = 'Plan Image Required!!';
        $errors['image1'] = '';
    }
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
    if (!empty($_FILES['image']['name']) || !empty($_FILES['imageII']['name'])) {
        if (!empty($_FILES['image']['name'])) {
            $image_name = time() . '_' . $_FILES['image']['name'];
            $destination = ROOT_PATH . "/assets/dashboard/images/plan/" . $image_name;
    
            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    
                $errors['image'] = '';
            if ($result) {
                $_POST['image'] = $image_name;
                $errors['image1'] = '';
            } else {
                array_push($subMainError, 'Failed To Upload Image');
                $errors['image1'] = 'Failed to upload image';
            }
        } else {
            array_push($subMainError, 'Post Image Required');
            $errors['image'] = 'Plan Image Required!!';
            $errors['image1'] = '';
        }
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

