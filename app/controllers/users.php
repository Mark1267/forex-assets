<?php 
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH .  '/app/helpers/funds.php');
include(ROOT_PATH .  '/app/helpers/math.php');
include(ROOT_PATH .  '/app/helpers/mailer.php');
include(ROOT_PATH .  '/app/helpers/middleware.php');
include(ROOT_PATH .  '/app/helpers/paging.php');
include(ROOT_PATH .  '/app/helpers/validate.php');
$errors = array();
$error = array();
$firstname = $lastname = $phone = $password = $cpassword = $email = $username = $code = $occupation = "";
/* Errors Variables */
$errors['ef'] = $errors['el'] = $errors['eme'] = $errors['emei'] = '';
$errors['unr'] = $errors['pr'] = $errors['pri'] = $errors['psl'] = '';
$errors['cps'] = $errors['cpse'] = $errors['exe'] = $errors['et'] = '';
$errors['efi'] = $errors['eli'] = $errors['em'] = $errors['emm'] = '';
$errors['img'] = $errors['euimg'] = $errors['ph'] = $errors['exph'] = '';
$errors['phone'] = $errors['eun'] = $errors['phi'] = '';

$table = 'users';


if(isset($_GET['del_u_id']) || isset($_GET['del_au_id'])){
    $user_id = isset($_GET['del_au_id']) ? $_GET['del_au_id'] : $_GET['del_u_id'];
    #transactions
    $transactions = selectAll('transactions', ['user_id' => $user_id]);
    foreach($transactions as $transaction){
        delete('transactions', $transaction['id']);
    }
    #feeds
    $feeds = selectAll('feeds', ['user_id' => $user_id]);
    foreach($feeds as $feed){
        delete('feeds', $feed['id']);
    }
    #contacts
    $contacts = selectAll('contacts', ['user_id' => $user_id]);
    foreach($contacts as $contact){
        delete('contacts', $contact['id']);
    }
    #codes
    $codes = selectAll('codes', ['user_id' => $user_id]);
    foreach($codes as $code){
        delete('codes', $code['id']);
    }
    #users
    delete($table, $user_id);

    #redirect
    if(isset($_GET['del_au_id'])){
        $_SESSION['message'] = 'User Deleted Successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/dashboard/admin/users/all.php');
        exit();
    }else{
        header('location:' . BASE_URL . '/');
        exit();
    }
}

#functions
#email Verify
function emailVerify($user_id){
    $user = selectOne('users', ['id' => $user_id]);
    $code = selectOne('codes', ['user_id' => $user['id']]);
    $V_LINK = BASE_URL . '/verify.php?key=' . $code['email'] . '&auth=' . $code['phone'];
    $template_file = 'emailVerify.php';
    $logo = BASE_URL . '/assets/open/images/logo-white.png';
    $swap_var = array(
        "#name#" => $user['firstname'],
        "#name2#" => $user['lastname'],
        "{EMAIL_TITLE}" => "Email Verification",
        "#verification_link#" => $V_LINK,
        "{TO_EMAIL}" => $user['email'],
        "#logo#" => $logo
    );
    mailing($template_file, $swap_var);
}

#login
function loginUser($user) {
    sessionDeclare($user);
    unset($_SESSION['password']);
    create('feeds', ['user_id' => $_SESSION['id'], 'message' => 'You Signed In', 'type' => 'success']);
    $_SESSION['message'] = 'You are now Logged In';
    $_SESSION['type'] = 'success';
    if($_SESSION['emailVerified'] === 0){
        emailVerify($_SESSION['id']);
        session_start();
        foreach($_SESSION as $key) {
            unset($_SESSION[$key]);
        }
        session_destroy();
        session_start();
        $_SESSION['message'] = "A Verification Mail has been sent to your account.<br> If you didn't see it in your inbox, check your spam folder. <br>Some mail severs forward our mail to spam folder.";
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/message.php');
        exit();
    }else{
        if ($_SESSION['admin'] === 1) {
            header('location:' . BASE_URL . '/dashboard/admin/');
            exit();
        }else{
            header('location:' . BASE_URL . '/dashboard/user/');
            exit();
        }
    }
    
}

#signup
/* If sign-up or admin-add button is clicked */
if (isset($_POST['signup']) || isset($_POST['adminAdd'])) {
    $genErrors = userVal($_POST);   //validate input fro POST and return errors as a multi dimensional array
    $errors = $genErrors[0];    // Printable errors declared
    $subMainError = $genErrors[1]; // Non printable(So that is will be counted for errors)
    #dd($subMainError);
    if(count($subMainError) === 0){    //if non printable errors is equal to zero meaning no errors found on the post inputs
        unset($_POST['cpassword']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['image'] = 'avatar-s-19.png';
        if(isset($_POST['adminAdd'])){
            adminOnly();
            unset($_POST['adminAdd']);
            $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
            $_POST['emailVerified']  = 1;
            #dd($_POST);
            $user_id = create($table, $_POST);
            if ($user_id > 0) {
                isset($_POST['admin']) ? $message = $_SESSION['firstname'] . ': Created an admin' : $message = $_SESSION['firstname'] . ': Created an user';
                $feed_id = create('feeds', ['user_id' => $user_id, 'message' => $message, 'type' => 'success', 'status' => 1]);
                $code = array('user_id' => $user_id, 'email' => generateRandomString($e_code, 32), 'phone' => generateRandomString($p_code, 9), 'ref' => generateRandomString($e_code, 7));
                $code_id = create('codes', $code);
                isset($_POST['admin']) ? $_SESSION['message'] = 'Admin addedd successfully' : $_SESSION['message'] = 'User addedd successfully';
                $_SESSION['type'] = 'success';
                header('location:' . BASE_URL . '/dashboard/admin/');
                exit();
            }else{
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $occupation = $_POST['occupation'];
           }
        }else{
            if(isset($_POST['ref'])){
                $ref_id = selectOne('codes', ['ref' => $_POST['ref']]);
                $_POST['ref'] = $ref_id['user_id'];
            }
            unset($_POST['signup']);
            $user_id = create($table, $_POST);
            if ($user_id > 0) {
                $feed = array('user_id' => $user_id, 'message' => 'You just Signed Up', 'type' => 'success');
                $feed_id = create('feeds', $feed);
                $code = array('user_id' => $user_id, 'email' => generateRandomString($e_code, 64), 'phone' => generateRandomString($p_code, 9), 'ref' => generateRandomString($e_code, 7));
                $code_id = create('codes', $code);
                $balance = create('funds', ['user_id' => $user_id, 'currentInvestment' => 0, 'plan_id' => 0]);
                emailVerify($user_id);
                $_SESSION['message'] = "A Verification Mail has been sent to your account.<br> If you didn't see it in your inbox, check your spam folder. <br>Some mail severs forward our mail to spam folder.";
                $_SESSION['type'] = 'success';
                header('location:' . BASE_URL . '/message.php');
                exit();
            }
        }
    }else{
         $firstname = $_POST['firstname'];
         $lastname = $_POST['lastname'];
         $phone = $_POST['phone'];
         $password = $_POST['password'];
         $cpassword = $_POST['cpassword'];
         $email = $_POST['email'];
         $username = $_POST['username'];
    }
}

#signin
if (isset($_POST['signin'])) {
    $genErrors = signinVal($_POST);
    $errors = $genErrors[0];
    $subMainError = $genErrors[1];
    if (count($subMainError) === 0) {
        unset($_POST['signin']);
        $user = selectOne($table, ['email' => $_POST['email']]);
        if ($user && password_verify($_POST['password'], $user['password'])) {
            // login and redirect
            loginUser($user);
            }else {
                $_SESSION['message'] = 'Wrong email address or password.';
                $_SESSION['type'] = 'danger';
                $email = $_POST['email'];
                $password = $_POST['password'];
            }
    }else{
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
}

#complete-profile
if (isset($_POST['complete-profile'])) {
    $genErrors = complete($_POST);
    $errors = $genErrors[0];
    $subMainError = $genErrors[1];
    if ($_SESSION['image'] === 'male-avatar.svg') {
        if (!empty($_FILES['image']['name'])) {
            $image_name = time() . '_' . $_FILES['image']['name'];
            $destination = ROOT_PATH . "/assets/dashboard/images/user/" . $image_name;

            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            if ($result) {
                $_POST['image'] = $image_name;
                $user_id = update($table, $_SESSION['id'], ['image' => $image_name]);
                $errors['euimg'] = '';
            } else {
                array_push($subMainError, 'Failed To Upload Images');
                $errors['euimg'] = 'Failed to upload image';
            }
        $errors['img'] = '';
        } else {
            array_push($subMainError, 'Post Image Required');
            $errors['img'] = 'Profile Image Required!!';
        }
    }elseif (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/dashboard/images/user/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
            $user_id = update($table, $_SESSION['id'], ['image' => $image_name]);
            $errors['euimg'] = '';
        } else {
            array_push($subMainError, 'Failed To Upload Image');
            $errors['euimg'] = 'Failed to upload image';
        }
    }
    if(empty($_POST['password'])){
        unset($_POST['password']);
    }else{
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
    if (count($subMainError) === 0) {
        unset($_POST['complete-profile'], $_POST['cpassword']);
        $user_id = update($table, $_SESSION['id'], $_POST);
        $feed = array('user_id' => $_SESSION['id'], 'message' => 'You just update your profile', 'type' => 'primary');
        $feed_id = create('feeds', $feed);
        $user = selectOne($table, ['id' => $_SESSION['id']]);
        loginUser($user);
    }else{
        sessionDeclare($_POST);
        $_SESSION['message'] = 'Something went wrong, Please resubmit your form<br>Please reselect your image if selected';
        $_SESSION['type'] = 'danger';
    }
}

if(isset($_POST['addFunds'])){
    adminOnly();
    $user = selectOne($table, ['email' => $_POST['email'], 'firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname']]);
    if($user){
        #deposits
        $pendingDeposits = sum('transactions', 'amount', ['user_id' => $user['id'], 'nature' => 1, 'status' => 0]);
        $allDeposits = sum('transactions', 'amount', ['user_id' => $user['id'], 'nature' => 1, 'status' => 1]);
        if(empty($allDeposits['SUM(amount)'])){
            $allDeposits['SUM(amount)'] = '0';
        }
        if(empty($pendingDeposits['SUM(amount)'])){
            $pendingDeposits['SUM(amount)'] = '0';
        }
        $C_BALANCE = sum('funds', 'currentInvestment', ['user_id' => $user['id']]);
        #withdrawals
        $pendingWithdrawals = sum('transactions', 'amount', ['user_id' => $user['id'], 'nature' => 0, 'status' => 0]);
        $allWithdrawals = sum('transactions', 'amount', ['user_id' => $user['id'], 'nature' => 0, 'status' => 1]);
        if(empty($allWithdrawals['SUM(amount)'])){
            $allWithdrawals['SUM(amount)'] = '0';
        }
        if(empty($pendingWithdrawals['SUM(amount)'])){
            $pendingWithdrawals['SUM(amount)'] = '0';
        }
        if(empty($C_BALANCE['SUM(currentInvestment)'])){
            $C_BALANCE['SUM(currentInvestment)'] = '0';
        }      
        $oldBalance = $user['balance'];
        $newBalance = $oldBalance + $_POST['amount'];
        $user_id = update($table, $user['id'], ['balance' => $newBalance]);
        $template_file = '../mail/bonus.php';
        $logo = BASE_URL . '/assets/open/images/logo-white.png';
        $swap_var = array(
            "#fullname#" => $_POST['firstname'],
            "{TITLE}" => $_POST['subject'],
            "{EMAIL_TITLE}" => $_POST['subject'],
            "{TO_NAME}" => $_POST['firstname'] . ' ' . $_POST['lastname'],
            "{TO_EMAIL}" => $_POST['email'],
            "{LOGO}" => $logo,
            "{REASON}" => 'BONUS',
            "{MESSAGE}" => $_POST['reason'],
            "{C_BALANCE}" => $C_BALANCE['SUM(currentInvestment)'],
            "{A_BALANCE}" => $oldBalance . ' + $' . $_POST['amount'],
            "{P_DEPOSIT}" => $pendingDeposits['SUM(amount)'],
            "{T_DEPOSIT}" => $allDeposits['SUM(amount)'],
            "{P_WITHDRAWALS}" => $pendingWithdrawals['SUM(amount)'],
            "{T_WITHDRAWALS}" => $allWithdrawals['SUM(amount)'],
            "#remarks#" => "Successfull",
            "#datetime" => date('F j, Y h:i:s')
        );
        mailing($template_file, $swap_var);
        
        $_SESSION['message'] = 'Fund added successfully: $' . $_POST['amount'] . ' to ' . $user['firstname'] . ' ' . $user['lastname'];
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/dashboard/admin/users/view.php?id=' . $user['id']);
        exit();
    }else{
        $_SESSION['message'] = 'No such User';
        $_SESSION['type']  = 'danger';
        header('location:' . BASE_URL . '/dashboard/admin/');
        exit();
    }
}

if(isset($_POST['phoneVal'])){
    $errors = $error = array();
    if(empty($_POST['phone'])){
        array_push($error, 'll');
        $errors['phone'] = 'Cannot Be empty';
    }else{
        $errors['phone'] = '';
    }
    if(count($error) === 0){
        $_POST['phone'] = str_replace(' ', '', $_POST['phone']);
        $_POST['phone'] = str_replace('(', '', $_POST['phone']);
        $_POST['phone'] = str_replace(')', '', $_POST['phone']);
        #dd($_POST['phone']);
        update($table, $_SESSION['id'], ['phone' => $_POST['phone']]);
        $phone = $_POST['phone'];
        $coder = selectOne('codes', ['user_id' => $_SESSION['id']]);
        $code = $coder['phone'];
        #send code
        phoneVal($phone, $code);

        $_SESSION['message'] = 'A verification code has been sent to your phone number';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/dashboard/user/phone/verify.php');
        exit();
    }else{
        $phone = $_POST['phone'];
    }
}

if(isset($_POST['valPhone'])){
    $errors = $error = array();
    if(empty($_POST['code'])){
        array_push($error, 'll');
        $errors['phone'] = 'Cannot Be empty';
    }else{
        $errors['phone'] = '';
    }
    if(count($error) === 0){
        $code = selectOne('codes', ['phone' => $_POST['code']]);
        if ($code) {
            $user = selectOne($table, ['id' => $code['user_id']]);
            update($table, $user['id'], ['phoneVerified' => 1]);
            $_SESSION['message'] = 'Phon Number Verified Successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . '/dashboard/user/');
            exit();
        }else{
            $_SESSION['message'] = 'Code Does not Match';
            $_SESSION['type'] = 'danger';
        }
    }else{
        $code = $_POST['code'];
    }
}


#reset password request
if(isset($_POST['forget-mail'])){
    if(empty($_POST['email'])){
        $_SESSION['message'] = 'Mail box can not be empty';
        $_SESSION['type'] = 'danger';
    }elseif(!selectOne($table, ['email' => $_POST['email']])){
        $_SESSION['message'] = 'Mail does not exit in our database';
        $_SESSION['type'] = 'danger';
        $email = $_POST['email'];
    }else{
        $code = generateRandomString($user_key, 64);
        $time = strtotime(date('Y-m-d H:i:s'));
        $currentTime = time();
        $timeToAdd = 2 * 60 * 60;
        $expireTime = $currentTime + $timeToAdd;
        $user = selectOne($table, ['email' => $_POST['email']]);
        update($table, $user['id'], ['OTK' => $code]);
        $V_LINK = BASE_URL . '/forget/reset.php?key=' . $code . '&session=' . $expireTime;
        $template_file = 'mail.php';
        $logo = BASE_URL . '/assets/open/images/logo-white.png';
        $swap_var = array(
            "{FNAME}" => $user['firstname'],
            "{TITLE}" => 'Password Reset',
            "{EMAIL_TITLE}" => 'Password Reset',
            "{TO_EMAIL}" => $user['email'],
            "#logo#" => $logo,
            "{V_LINK}" => $V_LINK

        );
        mailing($template_file, $swap_var);
    }
}

#reset password
if(isset($_POST['reset-password'])){
    $genErrors = passVal($_POST);
    $errors = $genErrors[0];
    $subMainError = $genErrors[1];
    if(count($subMainError) === 0){
        $user = selectOne($table, ['OTK' => $_POST['key']]);
        $OTK = generateRandomString($user_key, 64);
        $time = time();
        $endTime = $_POST['session'];
        $session = $endTime - $time;
        if($user && $session >= 0){
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            update($table, $user['id'], ['password' => $_POST['password'], 'OTK' => $OTK]);
            $_SESSION['message'] = 'PASSWORD RESET SUCCESSFUL';
            $_SESSION['type'] = 'success';
            header('location: ' .  BASE_URL . '/signin.php');
            exit();
        }else{
            header('location: ' .  BASE_URL . '/');
            exit();
        }
    }else{
        $key = $_POST['key'];
        $session = $_POST['session'];
        $_SESSION['message'] = 'Error';
        $_SESSION['type'] = 'danger';
    }
}


?>