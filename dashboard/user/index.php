<?php include('../../path.php'); 
include(ROOT_PATH . '/app/controllers/users.php');
usersOnly();
include(ROOT_PATH . '/app/includes/user_dash_dependances.php');
$currentInvest = sum('funds', 'currentInvestment', ['user_id' => $_SESSION['id']]);
$title = 'Dashboard';
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
                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>BTC</h4>
                                            <h6 class="text-muted">Bitcoin</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$<?php $all = coinPrice('BTC'); echo number_format($all[0], 2); ?></h4>
                                            <?php if($all[1] > 1):?>
                                                <h6 class="success darken-4"><?php echo sigFig($all[1], 3);?>% <i class="la la-arrow-up"></i></h6>
                                            <?php else: ?>
                                                <h6 class="danger darken-4"><?php echo sigFig($all[1], 3);?>% <i class="la la-arrow-down"></i></h6>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>ETH</h4>
                                            <h6 class="text-muted">Ethereum</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$<?php $all = coinPrice('ETH'); echo number_format($all[0], 2); ?></h4>
                                            <?php if($all[1] > 1):?>
                                                <h6 class="success darken-4"><?php echo sigFig($all[1], 3);?>% <i class="la la-arrow-up"></i></h6>
                                            <?php else: ?>
                                                <h6 class="danger darken-4"><?php echo sigFig($all[1], 3);?>% <i class="la la-arrow-down"></i></h6>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>XRP</h4>
                                            <h6 class="text-muted">Ripple</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$<?php $all = coinPrice('XRP'); echo number_format($all[0], 2); ?></h4>
                                            <?php if($all[1] > 1):?>
                                                <h6 class="success darken-4"><?php echo sigFig($all[1], 3);?>% <i class="la la-arrow-up"></i></h6>
                                            <?php else: ?>
                                                <h6 class="danger darken-4"><?php echo sigFig($all[1], 3);?>% <i class="la la-arrow-down"></i></h6>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Candlestick Multi Level Control Chart -->

                <section id="icon-section-bg-gradient">
                    <div class="row">
                        <div class="col-12 mt-3 mb-1">
                    <?php include(ROOT_PATH . '/app/includes/message.php');?>
                            <h4 class="text-uppercase">Overall User Account Overview</h4>
                            <p>Quick overview of your account. Default currency is dollar.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Balance</p>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-info bg-darken-2 rounded-left">
                                            <i class="icon-briefcase font-large-2 text-white"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-info text-white media-body rounded-right">
                                            <h5 class="text-white">Current Balance</h5>
                                            <h5 class="text-white text-bold-400 mb-0">$<?php echo $_SESSION['balance'] + $currentInvest['SUM(currentInvestment)']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-success bg-darken-2 rounded-left">
                                            <i class="icon-grid font-large-2 text-white"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-success text-white media-body rounded-right">
                                            <h5 class="text-white">Available Balance</h5>
                                            <h5 class="text-white text-bold-400 mb-0">$<?php echo $_SESSION['balance']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-warning bg-darken-2 rounded-left">
                                            <i class="icon-bar-chart font-large-2 text-white"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-warning text-white media-body rounded-right">
                                            <h5 class="text-white">Active Investments</h5>
                                            <h5 class="text-white text-bold-400 mb-0">$<?php echo $currentInvest['SUM(currentInvestment)']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Deposits</p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-success bg-darken-2 rounded-left">
                                            <i class="icon-wallet font-large-2 text-white"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-success text-white media-body rounded-right">
                                            <h5 class="text-white">Total Deposits</h5>
                                            <h5 class="text-white text-bold-400 mb-0">$<?php echo $allDeposits['SUM(amount)']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-warning bg-darken-2 rounded-left">
                                            <i class="icon-equalizer font-large-2 text-white"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-warning text-white media-body rounded-right">
                                            <h5 class="text-white">Pending Deposits</h5>
                                            <h5 class="text-white text-bold-400 mb-0">$<?php echo $pendingDeposits['SUM(amount)']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Withdrawals</p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-success bg-darken-2 rounded-left">
                                            <i class="icon-credit-card font-large-2 text-white"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-success text-white media-body rounded-right">
                                            <h5 class="text-white">Total Withdrawals</h5>
                                            <h5 class="text-white text-bold-400 mb-0">$<?php echo $allWithdrawals['SUM(amount)']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-primary bg-darken-2 rounded-left">
                                            <i class="icon-handbag font-large-2 text-white"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-primary text-white media-body rounded-right">
                                            <h5 class="text-white">Pending Withdrawals</h5>
                                            <h5 class="text-white text-bold-400 mb-0">$<?php echo $pendingWithdrawals['SUM(amount)']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Icon section with gradient bg color section end -->
                <!-- Active Orders -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Active Investments</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                <?php $totalPages = count(selectAll('transactions', ['user_id' => $_SESSION['id'], 'nature' => 1, 'status' => 1])) / $results_per_page;
                                $transactions = selectAllLimits('transactions', ['user_id' => $_SESSION['id'], 'nature' => 1, 'status' => 1], $start, $results_per_page);?>
                                    <table class="table table-de mb-0">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Plan</th>
                                                <th>Rate (%)</th>
                                                <th>Amount</th>
                                                <th>Earnings</th>
                                                <th>Days Remaing</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($transactions as $key => $transaction):?>
                                            <?php $plan = selectOne('plans', ['id' => $transaction['plan_id']]);
                                            $fund = selectOne('funds', ['user_id' => $transaction['user_id'], 'trans_id' => $transaction['trans_id']]);
                                            $time1 = strtotime($fund['end']) - strtotime(date('Y-m-d'));
                                            $currentTime = ceil($time1 / 86400);
                                            $timeT = strtotime($fund['end']) - strtotime(date('Y-m-d h:i:s'));
                                            $currentTime = $plan['ROI'] - $currentTime + 0.00001;
                                            $earing = round(earnings($transaction['amount'], $plan['dailyPercent'], abs($currentTime)), 2);
                                            if($timeT <= 0){
                                                $timeT = 0;
                                                $earing = $plan['dailyPercent'] / 100; 
                                                $earing *=  $transaction['amount'];
                                                $earing *= $plan['ROI'];/* Hello HI */
                                            }else{
                                                $timeT = ceil($time1 / 86400);
                                            }
                                            ?>
                                                <tr>
                                                    <td><?php echo date('F j, Y h:i:s', strtotime($transaction['created_at'])); ?></td>
                                                    <td class="success"><?php echo $plan['name']; ?></td>
                                                    <td><?php echo $plan['dailyPercent']; ?>%</td>
                                                    <td>$<?php echo $transaction['amount']; ?></td>
                                                    <td>$<?php echo $earing; ?></td>
                                                    <td><?php echo $timeT; ?></td>
                                                    <?php if(strtotime($fund['end']) > strtotime(date('Y-m-d'))):?>
                                                        <td><a href="#!" class="btn btn-sm round btn-outline-info disabled">Ongoing</a></td>                                     
                                                        <?php else:?>                                         
                                                        <?php $trans = selectOne('funds', ['user_id' => $transaction['user_id'], 'trans_id' => $transaction['trans_id']]);
                                                            $newBalance = $trans['currentInvestment'] + $earing + $_SESSION['balance'];
                                                            if($trans['status'] != 1 && $trans['paid'] != 1){
                                                                update('funds', $trans['id'], ['status' => 1, 'currentInvestment' => 0, 'paid' => 1]);
                                                                $newTrans = update('users', $trans['user_id'], ['balance' => $newBalance]);
                                                                $_SESSION['balance'] = $newBalance;
                                                            }
                                                        ?>                                            
                                                            <td><a href="<?php echo BASE_URL . '/dashboard/user/';?>withdraw.php" class="btn btn-sm round btn-outline-success">Withdraw</a></td>
                                                            <td><a href="<?php echo BASE_URL . '/dashboard/user/index.php?invest_id=' . $transaction['id'] . '&earning=' . $earing;?>" class="btn btn-sm round btn-outline-primary">RE-Invest</a></td>
                                                        <?php endif;?>
                                                    <!--<td>
                                                        <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                                    </td>-->
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?php include(ROOT_PATH . '/app/includes/page.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Active Orders -->

                <!-- Slaes & Purchase Order -->
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div id="accordionCrypto" role="tablist" aria-multiselectable="true">
                            <div class="card collapse-icon accordion-icon-rotate">
                                <div id="heading31" class="card-header bg-info p-1 bg-lighten-1">
                                    <a data-toggle="collapse" data-parent="#accordionCrypto" href="#accordionBTC" aria-expanded="true" aria-controls="accordionBTC" class="card-title lead white">BTC</a>
                                </div>
                                <div id="accordionBTC" role="tabpanel" aria-labelledby="heading31" class="card-collapse collapse show" aria-expanded="true">
                                    <div class="card-content">
                                        <div class="card-body p-0">
                                            <div class="media-list list-group">
                                                <div class="list-group-item list-group-item-action media p-1">
                                                    <?php $all = coinPrice("BTC");?>
                                                    <a class="media-link" href="#">
                                                        <span class="media-left">
                                                            <p class="text-bold-600 m-0">BTC/USD</p>
                                                            <p class="font-small-2 text-muted m-0">Market Cap</p>
                                                            <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                        </span>
                                                        <span class="media-body text-right">
                                                            <p class="text-bold-600 m-0"><?php echo number_format($all[0], 2);?></p>
                                                            <p class="font-small-2 text-muted m-0 success"><?php echo intdiv($all[3], 1000000000); ?>B USD (<?php echo sigFig($all[1], 3);?>%)</p>
                                                            <p class="font-small-2 text-muted m-0 text-bold-600"><?php echo intdiv($all[2], 1000000000) . "B";?> USD</p>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="heading32" class="card-header bg-info p-1 bg-lighten-1 my-1">
                                    <a data-toggle="collapse" data-parent="#accordionCrypto" href="#accordionETH" aria-expanded="false" aria-controls="accordionETH" class="card-title lead white collapsed">ETH</a>
                                </div>
                                <div id="accordionETH" role="tabpanel" aria-labelledby="heading32" class="card-collapse collapse" aria-expanded="false">
                                    <div class="card-content">
                                        <div class="card-body p-0">
                                            <div class="media-list list-group">
                                                <div class="list-group-item list-group-item-action media p-1">
                                                   <?php $all = coinPrice("ETH");?>
                                                    <a class="media-link" href="#">
                                                        <span class="media-left">
                                                            <p class="text-bold-600 m-0">ETH/USD</p>
                                                            <p class="font-small-2 text-muted m-0">Market Cap</p>
                                                            <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                        </span>
                                                        <span class="media-body text-right">
                                                            <p class="text-bold-600 m-0"><?php echo number_format($all[0], 2);?></p>
                                                            <p class="font-small-2 text-muted m-0 success"><?php echo intdiv($all[3], 1000000000); ?>B USD (<?php echo sigFig($all[1], 3);?>%)</p>
                                                            <p class="font-small-2 text-muted m-0 text-bold-600"><?php echo intdiv($all[2], 1000000000) . "B";?> USD</p>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="heading33" class="card-header bg-info p-1 bg-lighten-1">
                                    <a data-toggle="collapse" data-parent="#accordionCrypto" href="#accordionXRP" aria-expanded="false" aria-controls="accordionXRP" class="card-title lead white collapsed">XRP</a>
                                </div>
                                <div id="accordionXRP" role="tabpanel" aria-labelledby="heading33" class="card-collapse collapse" aria-expanded="false">
                                    <div class="card-content">
                                        <div class="card-body p-0">
                                            <div class="media-list list-group">
                                                <div class="list-group-item list-group-item-action media p-1">
                                                    <?php $all = coinPrice("XRP");?>
                                                    <a class="media-link" href="#">
                                                        <span class="media-left">
                                                            <p class="text-bold-600 m-0">BTC/USD</p>
                                                            <p class="font-small-2 text-muted m-0">Market Cap</p>
                                                            <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                        </span>
                                                        <span class="media-body text-right">
                                                            <p class="text-bold-600 m-0"><?php echo number_format($all[0], 2);?></p>
                                                            <p class="font-small-2 text-muted m-0 success"><?php echo intdiv($all[3], 1000000000); ?>B USD (<?php echo sigFig($all[1], 3);?>%)</p>
                                                            <p class="font-small-2 text-muted m-0 text-bold-600"><?php echo intdiv($all[2], 1000000000) . "B";?> USD</p>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">BTC/USD</h4><?php $all = coinPrice("BTC"); ?>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li class="text-center mr-4">
                                            <h6 class="text-muted">Last price</h6>
                                            <p class="text-bold-600 mb-0">$<?php $all = coinPrice('BTC'); echo number_format($all[0], 2); ?></p>
                                        </li>
                                        <li class="text-center mr-4">
                                            <h6 class="text-muted">Daily change</h6>
                                            <p class="text-bold-600 mb-0"><?php echo sigFig($all[1], 3);?>%</p>
                                        </li>
                                        <li class="text-center">
                                            <h6 class="text-muted">24h volume</h6>
                                            <p class="text-bold-600 mb-0"><i class="cc BTC-alt" title="BTC"></i> <?php echo intdiv($all[2], 1000000000) . "B";?> USD</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-1 card-content collapse show">
                                <div class="card-body pt-0" style="overflow: scroll;">
                                    <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_149bc"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BTCUSD/?exchange=COINBASE" rel="noopener" target="_blank"><span class="blue-text">BTCUSD Chart</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": 580,
  "height": 410,
  "symbol": "COINBASE:BTCUSD",
  "interval": "60",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "hide_top_toolbar": true,
  "save_image": false,
  "container_id": "tradingview_149bc"
}
  );
  </script>
</div>
<!-- TradingView Widget END -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sell Orders & Buy Order -->
                <div class="row match-height">
                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Withdrawals</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted">Total : <?php echo '$' . $allWithdrawals['SUM(amount)']; ?></p>
                                </div>
                            </div>
                                <?php $totalPages = count(selectAll('transactions', ['user_id' => $_SESSION['id'], 'nature' => 0])) / $results_per_page;
                                $transactionsw = selectAllLimits('transactions', ['user_id' => $_SESSION['id'], 'nature' => 0], $start, $results_per_page);?>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Trans. ID</th>
                                                <th>Amount</th>
                                                <th>Wallet ID</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($transactionsw as $key => $transaction): ?>
                                                <?php if($transaction['status'] == 1):?>
                                                    <tr class="bg-success bg-lighten-5">
                                                <?php else: ?>
                                                    <tr class="bg-warning bg-lighten-5">
                                                <?php endif;?>
                                                        <td><?php echo $key + 1; ?></td>
                                                        <td><?php echo $transaction['trans_id']; ?></td>
                                                        <td><?php echo '$' . $transaction['amount']; ?></td>
                                                        <td><?php echo $transaction['receiver_address']; ?></td>
                                                        <td><?php echo date('F j, Y', strtotime($transaction['created_at'])); ?></td>
                                                    </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?php include(ROOT_PATH . '/app/includes/page.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Deposits</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted">Total : <?php echo '$' . $allDeposits['SUM(amount)']; ?></p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                <?php $totalPages = count(selectAll('transactions', ['user_id' => $_SESSION['id'], 'nature' => 1])) / $results_per_page;
                                $transactionsd = selectAllLimits('transactions', ['user_id' => $_SESSION['id'], 'nature' => 1], $start, $results_per_page);?>
                                    <table class="table table-de mb-0">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Trans. ID</th>
                                                <th>Plan</th>
                                                <th>Amount</th>
                                                <th>Wallet ID</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($transactionsd as $key => $transaction): ?>
                                            <?php $plan = selectOne('plans', ['id' => $transaction['plan_id']]); ?>
                                                <?php if($transaction['status'] == 1):?>
                                                    <tr class="bg-success bg-lighten-5">
                                                <?php else: ?>
                                                    <tr class="bg-warning bg-lighten-5">
                                                <?php endif;?>
                                                        <td><?php echo $key + 1; ?></td>
                                                        <td><?php echo $transaction['trans_id']; ?></td>
                                                        <td><?php echo $plan['name']; ?></td>
                                                        <td><?php echo '$' . $transaction['amount']; ?></td>
                                                        <td><?php echo $transaction['receiver_address']; ?></td>
                                                        <td><?php echo date('F j, Y', strtotime($transaction['created_at'])); ?></td>
                                                    </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?php include(ROOT_PATH . '/app/includes/page.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Sell Orders & Buy Order -->
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>

</html>