<?php 

$feeds = selectAll('feeds', ['user_id' => $_SESSION['id'], 'status' => 0]);

#deposits
$pendingDeposits = sum('transactions', 'amount', ['user_id' => $_SESSION['id'], 'nature' => 1, 'status' => 0]);
$allDeposits = sum('transactions', 'amount', ['user_id' => $_SESSION['id'], 'nature' => 1, 'status' => 1]);
if(empty($allDeposits['SUM(amount)'])){
    $allDeposits['SUM(amount)'] = '0';
}
if(empty($pendingDeposits['SUM(amount)'])){
    $pendingDeposits['SUM(amount)'] = '0';
}

#withdrawals
$pendingWithdrawals = sum('transactions', 'amount', ['user_id' => $_SESSION['id'], 'nature' => 0, 'status' => 0]);
$allWithdrawals = sum('transactions', 'amount', ['user_id' => $_SESSION['id'], 'nature' => 0, 'status' => 1]);
if(empty($allWithdrawals['SUM(amount)'])){
    $allWithdrawals['SUM(amount)'] = '0';
}
if(empty($pendingWithdrawals['SUM(amount)'])){
    $pendingWithdrawals['SUM(amount)'] = '0';
}

#totalProfits
$totalWithdrawals = sum('transactions', 'amount', ['nature' => 0, 'status' => 1]);
$totalDeposits = sum('transactions', 'amount', ['nature' => 1, 'status' => 1]);
if(empty($totalWithdrawals['SUM(amount)'])){
    $totalWithdrawals['SUM(amount)'] = '0';
}
if(empty($totalDeposits['SUM(amount)'])){
    $totalDeposits['SUM(amount)'] = '0';
}
$totalProfits = $totalWithdrawals['SUM(amount)'] - $totalDeposits['SUM(amount)'];

#averagePayout
$averagePayout = avg('transactions', 'amount', ['nature' => 0, 'status' => 1]);
if(empty($averagePayout['AVG(amount)'])){
    $averagePayout['AVG(amount)'] = '0';
}else{
    $averagePayout['AVG(amount)'] = round($averagePayout['AVG(amount)'], 2);
}

if(isset($_GET['invest_id'])){
    $user = selectOne('users', ['id' => $_SESSION['id']]);
    $OldTransaction = selectOne('transactions', ['id' => $_GET['invest_id']]); //to get old transaction details
    $balance = $user['balance'] - $OldTransaction['amount']; //check if balance is enough for reinvest
    if($balance >= 0){
        $plan = selectOne('plans', ['id' => $OldTransaction['plan_id']]);
        $start = date('Y-m-d');
        $end = date('Y-m-d', strtotime($start . ' + '. $plan['ROI'] . ' days'));
        unset($OldTransaction['id'], $OldTransaction['trans_id'], $OldTransaction['created_at']);
        $OldTransaction['trans_id'] = generateRandomString($p_code, 5);
        $newTransaction = create('transactions', $OldTransaction);
        $fund = create('funds', ['user_id' => $_SESSION['id'], 'currentInvestment' => $OldTransaction['amount'], 'plan_id' => $OldTransaction['plan_id'], 'trans_id' => $OldTransaction['trans_id'], 'start' => date('Y-m-d'), 'end' => $end]);
        $newUser = update('users', $_SESSION['id'], ['balance' => $balance]);
        $_SESSION['balance'] = $balance;
        $message = 'You Re-Invested: Transaction ID:' . $OldTransaction['trans_id'];
        $feeds = create('feeds', ['user_id' => $_SESSION['id'], 'type' => 'success', 'message' => $message, 'status' => 1]);
        $_SESSION['message'] = 'Re-Invested Successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/dashboard/user/');
        exit();
    }else{
        $_SESSION['message'] = 'Re-Invested Failed: Insuficent Balance';
        $_SESSION['type'] = 'danger';
        header('location:' . BASE_URL . '/dashboard/user/');
        exit();
    }
}






?>