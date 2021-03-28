<?php include('../../path.php'); 
include(ROOT_PATH . '/app/controllers/accounts.php');

$title = 'Deposit';
#dd($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH . '/app/includes/link_dash_top.php'); ?>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
<?php include(ROOT_PATH . '/app/includes/nav_user_dash.php'); ?>
    <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <div class="row" style="height: 70vh;">
                        <?php include(ROOT_PATH . '/app/includes/message.php'); ?>
                        <?php if(isset($_GET['trans_id'])):?>
                            <?php $deposit = selectOne('transactions', ['trans_id' => $_GET['trans_id']]);
                            $account = selectOne('accounts', ['id' => $deposit['account_id']]);
                            $dAmount = depositAmount($account['currency'], $deposit['amount']);
                            ?>
                            <div class="col-sm-12 col-md-5 my-auto mx-auto">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Deposit Request</h5>
                                        <p class="card-text" style="line-height: 30px;">Deposit exactly  <code><?php echo $dAmount; ?></code>  <?php echo $account['currency']; ?> to the wallet address <code class="active bg-light"><?php echo $account['address']; ?></code></p>
                                        <div class="btn i-block btn-primary" data-clipboard-text="<?php echo $account['address']; ?>" data-filter="copy" data-toggle="tooltip" data-orignal-title="copy"><i data-feather="copy"></i>&nbsp;Copy Wallet</div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- Required Js -->
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php');?>
</body>

</html>