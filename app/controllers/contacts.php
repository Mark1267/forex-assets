<?php 
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/helpers/paging.php');
include(ROOT_PATH . '/app/helpers/mailer.php');
include(ROOT_PATH . '/app/helpers/middleware.php');
include(ROOT_PATH . '/app/helpers/validate.php');

$error = array();
$errors = array();

#error variables
$errors['subject'] = $errors['firstname'] = $errors['lastname'] = $errors['phone'] = $errors['email'] = $errors['message'] = '';
$subject = $firstname = $lastname = $phone = $email = $message = $body = $errors['body'] = '';
$errors['subject_match'] = '';


#tables
$table = 'contacts';
$table2 = 'mail';

$mails = selectAll($table2);

#functionalities
if(isset($_GET['MAR_id'])){
    $id = $_GET['MAR_id'];
    update($table, $id, ['status' => 1]);
    $contact = selectOne($table, ['id' => $id]);
    $_SESSION['message'] = 'Message of Ref ID: ' . $contact['ref_id'] . '. Marked as Read';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/dashboard/admin/contact/users/');
    exit();
}

if(isset($_GET['MAU_id'])){
    $id = $_GET['MAU_id'];
    update($table, $id, ['status' => 0]);
    $contact = selectOne($table, ['id' => $id]);
    $_SESSION['message'] = 'Message of Ref ID: ' . $contact['ref_id'] . '. Marked as Unread';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/dashboard/admin/contact/users/');
    exit();
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $contact = selectOne($table, ['id' => $id]);
    if($contact){
        $message = $contact['message'];
        $subject = $contact['subject'];
        $firstname = $contact['firstname'];
        $lastname = $contact['lastname'];
        $phone = $contact['phone'];
        $email = $contact['email'];
    }else{
        $_SESSION['message'] = 'Message not found!';
        $_SESSION['type'] = 'danger';
        header('location: ' . BASE_URL . '/dashboard/admin/contact/');
        exit();
    }
}

#User contact
if(isset($_POST['contact-user'])){
    usersOnly();
    $genErrors = contactVal($_POST);
    $errors = $genErrors[0];
    $subMainError = $genErrors[1];
    if(count($subMainError) === 0){
        unset($_POST['contact-user']);
        $_POST['user'] = $_SESSION['id'];
        $_POST['ref_id'] = generateRandomString($user_key, 11);
        $contact_id = create($table, $_POST);
        $feeds = create('feeds', ['user_id' => $_SESSION['id'], 'message' => 'You contacted an admin', 'type' => 'primary', 'status' => 0]);
        $template_file = '../../app/lib/reply.php';
        $logo = BASE_URL . "/assets/open/images/logo-home5.png";
        $swap_var = array(
            "{FNAME}" => $_SESSION['firstname'],
            "{TITLE}" => $_POST['subject'],
            "{EMAIL_TITLE}" => $_POST['subject'],
            "{TO_NAME}" => $_POST['firstname'] . ' ' . $_POST['lastname'],
            "{TO_EMAIL}" => $_SESSION['email'],
            "{LOGO}" => $logo,
            "{MESSAGE}" => $_POST['message']
        );
        mailing($template_file, $swap_var);
        $_SESSION['message'] = 'Admin Contacted successfully';
        $_SESSION['type'] = 'primary';
        header('location:' . BASE_URL . '/dashboard/user/');
        exit();
    }else{
        $subject = $_POST['subject']; 
        $message = $_POST['message'];
    }
}

#admin Reply
if(isset($_POST['re-contact'])){
    adminOnly();
    $id = $_POST['id'];
    unset($_POST['re-contact'], $_POST['id']);
    $_POST['status'] = 1;
    $_POST['reid'] = $_SESSION['id'];
    $contact = update($table, $id, $_POST);
    /*$template_file = 'reply.php';
        $logo = BASE_URL . "/assets/open/images/logo-home5.png";
        $swap_var = array(
            "{FNAME}" => $_POST['firstname'],
            "{TITLE}" => "RE: " . $_POST['subject'],
            "{EMAIL_TITLE}" => "RE: " . $_POST['firstname'] . " on " . $_POST['subject'],
            "{TO_NAME}" => $_POST['firstname'] . ' ' . $_POST['lastname'],
            "{TO_EMAIL}" => $_POST['email'],
            "{LOGO}" => $logo,
            "{MESSAGE}" => $_POST['message']
        );
        mailing($template_file, $swap_var); */
    $_SESSION['message'] = 'User Contacted successfully';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . '/dashboard/admin/contact/');
    exit();
}

#submit
if(isset($_POST['openContact']) || isset($_POST['fullOpenContact'])){
    $_POST['user'] = 0;
    $_POST['ref_id'] = generateRandomString($user_key, 11);
    if (isset($_POST['openContact'])) {
        unset($_POST['openContact']);
        $message = create('contacts', $_POST);
        $_SESSION['message'] = 'Admin Contacted Successfully!<br>Your Reference ID: <code class="">' . $_POST['ref_id'] . '</code><br>You can get started by clicking the button below<br><a href="./signup" class="btn btn-primary btn-sm">Get Started</a>';
        $_SESSION['type'] = 'danger';
        header('location: ' . BASE_URL . '/message.php');
        exit();
    }else{
        $_POST['subject'] = 'Non User Contact';
        $genErrors = contactVal($_POST);
        $errors = $genErrors[0];
        $subMainError = $genErrors[1];
        if (count($subMainError) === 0) {
            unset($_POST['fullOpenContact']);
            $message = create('contacts', $_POST);
            $_SESSION['message'] = 'Admin Contacted Successfully!<br>Your Reference ID: <code class="">' . $_POST['ref_id'] . '</code><br>You can get started by clicking the button below<br><a href="./signup" class="btn btn-primary btn-sm">Get Started</a>';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . '/message.php');
            exit();
        }else{
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $message = $_POST['message'];
        }
    }
}

if(isset($_POST['adminContactU'])){
    adminOnly();
    $user = selectOne('users', ['firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname'], 'email' => $_POST['email']]);
    $template_file = '../../../app/lib/reply.php';
    $logo = BASE_URL . "/assets/open/images/logo-home5.png";
    $swap_var = array(
        "#fullname#" => $_POST['firstname'] . ' ' . $_POST['lastname'],
        "{TITLE}" => $_POST['subject'],
        "{EMAIL_TITLE}" => $_POST['subject'],
        "{TO_NAME}" => $_POST['firstname'] . ' ' . $_POST['lastname'],
        "{TO_EMAIL}" => $_POST['email'],
        "{LOGO}" => $logo,
        "{MESSAGE}" => $_POST['message']
    );
    mailing($template_file, $swap_var);
    $_SESSION['message'] = 'User Contacted successfully';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . '/dashboard/admin/users/view.php?id=' . $user['id']);
    exit();
}

/* 8888888888888888888888888888888888888888888888888888888888888888888888888888888888888 */

#addTemp
if(isset($_POST['addTemp'])){
    adminOnly();
    $genErrors = tempVal($_POST);
    $errors = $genErrors[0];
    $subMainError = $genErrors[1];
    if(count($subMainError) === 0){
        unset($_POST['addTemp']);
        $body1 = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Document</title><link rel="preconnect" href="https://fonts.gstatic.com"><link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"></head><body style="background: background: rgb(248, 248, 248); font-family: "Quicksand", sans-serif; font-size: 15px; margin: 0; @import url("https://fonts.googleapis.com/css2?family=Quicksand&display=swap");"><div class="container" style="background-color:white; max-width: 1000px; margin: 0px auto; position: relative"><div class="row" style=" padding: 10px; background: #bde884; margin-bottom: 10px;"><div class="col-4 mx-auto" style="margin: 0px auto; width: 33.33% !important;"><img src="https://rocktera-assets.com/assets/open/images/logo-home5.png" alt="rockteraassets_logo" class="img-fluid{LOGO}" style="width: 100%; vertical-align: middle;"></div></div>';
        $body2 = '<a href="https://rocktera-assets.com/signin" class="btn" style="margin: 15px auto; display: inline-block; text-align: center; padding: 16px 30px; border-radius: 4px; color: white; background-color: #73ae20; text-decoration: none;">Dashboard</a><p>If you have any questions, please reply to this email. I’m always happy to help!</p><footer style="background-color: white; color: #c7c7c7; text-align: center; font-size: 10px;"><div style="background-color: #73ae20; color: white; padding: 20px 0px;"><p>Great to have you on board</p></div><center style="padding: 10px;"><p>Dalton House, 60 Windsor Ave, London SW19 2RR, United Kingdom</p><span style="margin: 3px 7px;">Mail: support@rocktera-assets.com</span></center></footer></div></body></html>';
        $body = $body1 . $_POST['body'] . $body2;
        $_POST['body'] = $body;
        $_POST['user_id'] = $_SESSION['id'];
        $mail = create($table2, $_POST);
        $_POST['subject'] = str_replace(' ', '', $_POST['subject']);
        $filename = $_POST['subject'] . '.php';
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $content = $_POST['body'];
        fwrite($myfile, $content);
        fclose($myfile);
        $message = 'Admin ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . ' created a template';
        $feeds = create('feeds', ['user_id' => $_SESSION['id'], 'type' => 'primary', 'status' => 1, 'message' => $message]);
        $_SESSION['message'] = $message;
        $_SESSION['type'] = 'primary';
        header('location: ' . BASE_URL . '/dashboard/admin/email/');
        exit();
    }else{
        $subject = $_POST['subject'];
        $body = $_POST['body'];
    }
}

#updateTemp
if(isset($_POST['updateTemp'])){
    adminOnly();
    $genErrors = tempVal($_POST);
    $errors = $genErrors[0];
    $subMainError = $genErrors[1];
    if(count($subMainError) === 0){
        $id = $_POST['id'];
        unset($_POST['updateTemp'], $_POST['id']);
        $body1 = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Document</title><link rel="preconnect" href="https://fonts.gstatic.com"><link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"></head><body style="background: background: rgb(248, 248, 248); font-family: "Quicksand", sans-serif; font-size: 15px; margin: 0; @import url("https://fonts.googleapis.com/css2?family=Quicksand&display=swap");"><div class="container" style="background-color:white; max-width: 1000px; margin: 0px auto; position: relative"><div class="row" style=" padding: 10px; background: #bde884; margin-bottom: 10px;"><div class="col-4 mx-auto" style="margin: 0px auto; width: 33.33% !important;"><img src="https://rocktera-assets.com/assets/open/images/logo-home5.png" alt="rockteraassets_logo" class="img-fluid{LOGO}" style="width: 100%; vertical-align: middle;"></div></div>';
        $body2 = '<a href="https://rocktera-assets.com/signin" class="btn" style="margin: 15px auto; display: inline-block; text-align: center; padding: 16px 30px; border-radius: 4px; color: white; background-color: #73ae20; text-decoration: none;">Dashboard</a><p>If you have any questions, please reply to this email. I’m always happy to help!</p><footer style="background-color: white; color: #c7c7c7; text-align: center; font-size: 10px;"><div style="background-color: #73ae20; color: white; padding: 20px 0px;"><p>Great to have you on board</p></div><center style="padding: 10px;"><p>Dalton House, 60 Windsor Ave, London SW19 2RR, United Kingdom</p><span style="margin: 3px 7px;">Mail: support@rocktera-assets.com</span></center></footer></div></body></html>';
        $body = $body1 . $_POST['body'] . $body2;
        $_POST['body'] = $body;
        $_POST['user_id'] = $_SESSION['id'];
        $mail = update($table2, $id, $_POST);
        $_POST['subject'] = str_replace(' ', '', $_POST['subject']);
        $filename = $_POST['subject'] . '.php';
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $content = $_POST['body'];
        fwrite($myfile, $content);
        fclose($myfile);
        $message = 'Admin ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . ' updated a template';
        $feeds = create('feeds', ['user_id' => $_SESSION['id'], 'type' => 'primary', 'status' => 1, 'message' => $message]);
        $_SESSION['message'] = $message;
        $_SESSION['type'] = 'info';
        header('location: ' . BASE_URL . '/dashboard/admin/email/');
        exit();
    }else{
        $subject = $_POST['subject'];
        $body = $_POST['body'];
    }
}

#privateSend
if(isset($_POST['privateSend'])){
    if($_POST['email'] == 0){
        $_SESSION['message'] = 'Please Select an Email';
        $_SESSION['type'] = 'danger';
        header('location: ' . BASE_URL . '/dashboard/admin/email/private.php?id=' . $_POST['id']);
        exit();
    }else{
        $mail = selectOne($table2, ['id' => $_POST['id']]);
        $user = selectOne('users', ['id' => $_POST['email']]);
        $filename = str_replace(' ', '', $mail['subject']);
        $template_file = $filename . '.php';
        $email_from = $user['email'];
        $logo = BASE_URL . "/assets/open/images/logo-home5.png";
        $swap_var = array(
            "{id}" => $user['id'], "{firstname}" => $user['firstname'], "{lastname}" => $user['lastname'],
            "{email}" => $user['email'], "{phone}" => $user['phone'], "{occupation}" => $user['occupation'],
            "{address}" => $user['address'], "{addressII}" => $user['addressII'], "{city}" => $user['city'],
            "{image}" => $user['image'], "{zip}" => $user['zip'], "{state}" => $user['state'],
            "{country}" => $user['country'], "{OTK}" => $user['OTK'], "{ref}" => $user['ref'],
            "{btc}" => $user['btc'], "{eth}" => $user['eth'], 
            "{ltc}" => $user['ltc'], "{xpr}" => $user['xpr'], "{password}" => $user['password'], "{about}" => $user['about'],
            "{balance}" => $user['balance'], "{username}" => $user['username'], "{admin}" => $user['admin'],
            "{emailVerified}" => $user['emailVerified'], "{created_at}" => $user['created_at'], "{TITLE}" => $mail['subject'],
            "{EMAIL_TITLE}" => $mail['subject'], "{TO_NAME}" => $user['firstname'] . ' ' . $user['lastname'], "{TO_EMAIL}" => $email_from,
            "{LOGO}" => $logo
        );
        mailing($template_file, $swap_var);
        $_SESSION['message'] = 'User : ' . $user['firstname'] . ' ' . $user['lastname'] . ' Mail sent Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/dashboard/admin/email/');
        exit();
    }
}

#send to all
if(isset($_GET['all_id'])){
    $mail_id = $_GET['all_id'];
    $mail = selectOne($table2, ['id' => $mail_id]);
    $users = selectAll('users', ['admin' => 0]);
    $filename = str_replace(' ', '', $mail['subject']);
    $template_file = $filename . '.php';
    $logo = BASE_URL . "/assets/open/images/logo-home5.png";
    foreach($users as $user){
        $swap_var = array(
            "{id}" => $user['id'], "{firstname}" => $user['firstname'], "{lastname}" => $user['lastname'],
            "{email}" => $user['email'], "{phone}" => $user['phone'], "{occupation}" => $user['occupation'],
            "{address}" => $user['address'], "{addressII}" => $user['addressII'], "{city}" => $user['city'],
            "{image}" => $user['image'], "{zip}" => $user['zip'], "{state}" => $user['state'],
            "{country}" => $user['country'], "{OTK}" => $user['OTK'], "{ref}" => $user['ref'],
            "{btc}" => $user['btc'], "{eth}" => $user['eth'], 
            "{ltc}" => $user['ltc'], "{xpr}" => $user['xpr'], "{password}" => $user['password'], "{about}" => $user['about'],
            "{balance}" => $user['balance'], "{username}" => $user['username'], "{admin}" => $user['admin'],
            "{emailVerified}" => $user['emailVerified'], "{created_at}" => $user['created_at'], "{TITLE}" => $mail['subject'],
            "{EMAIL_TITLE}" => $mail['subject'], "{TO_NAME}" => $user['firstname'] . ' ' . $user['lastname'], "{TO_EMAIL}" => $user['email'],
            "{LOGO}" => $logo
        );
        mailing($template_file, $swap_var);
    }
    $_SESSION['message'] = 'Mail sent to all users Successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/dashboard/admin/email/');
    exit();
}

#delete template
if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $mail = selectOne($table2, ['id' => $id]);
    $filename = str_replace(' ', '', $mail['subject']) . '.php';
    delete($table2, $id);
    unlink($filename);
    $_SESSION['message'] = 'Mail Template deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/dashboard/admin/email/');
    exit();
}




?>