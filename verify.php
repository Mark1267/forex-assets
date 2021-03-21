<?php 
include('path.php');
include(ROOT_PATH . '/app/controllers/users.php');

if(isset($_GET['key']) && isset($_GET['auth'])){
    $code = selectOne('codes', ['email' => $_GET['key'], 'phone' => $_GET['auth']]);
    if($code){
        $user =  selectOne('users', ['id' => $code['user_id'], 'emailVerified' => 1]);
        if($user){
            $_SESSION['message'] = 'Already Verified, Sign In';
            $_SESSION['type'] = 'info';
            header('location:' . BASE_URL . '/signin');
            exit();
        }
        $user_id = update('users', $code['user_id'], ['emailVerified' => 1]);
        $v_user = selectOne('users', ['id' => $code['user_id'], 'emailVerified' => 1]);
        loginUser($v_user);
        $_SESSION['message'] = $_SESSION['firstname'] . ', your account verified successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/dashboard/user/');
        exit();
    }else{
        $_SESSION['message'] = 'Invalid Verification Code';
        $_SESSION['type'] = 'danger';
        header('location:' . BASE_URL . '/message.php');
        exit();
    }
}

?>