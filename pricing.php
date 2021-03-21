<?php 
include('path.php');
include(ROOT_PATH . '/app/controllers/plans.php');

$title = 'Plans';
?>

<!doctype html>
<html lang="en">
<?php include(ROOT_PATH . '/app/includes/link_open_top.php'); ?>

<body>

<?php include(ROOT_PATH . '/app/includes/header_open.php'); ?>
    <section class="page_header" style="background-position: 50% -44px;">
        <div class="container">
            <div class="row">
            <div class="col-sm-12 text-center">
            <p>Our Investment Products</p>
            <h1 class="text-uppercase">Assets management</h1>
            </div>
            </div>
        </div>
    </section>
    <div class="page_linker">
        <div class="container">
            <div class="row">
            <div class="col-sm-12 text-center">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="icon-home6"></i>Home</a></li>
                <li class="active">Plans</li>
            </ul>
            </div>
            </div>
        </div>
    </div>
    <section id="team" class="pricesection padding-top padding-bottom-half light">
        <div class="row">
            <div class="col-sm-12 text-center wow fadeInDown animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInDown;">
                <h2 class="bottom10 text-capitalize">Our Investment <span class="blue_t">Products</span></h2>
                <p class="heading_space">We are trusted by thousands of investors across the globe.</p>
            </div>
        </div>
        <div class="pricing pricing-palden ">
            <?php foreach($plans as $plan): ?>
                <div class="pricing-item">
                    <div class="pricing-deco">
                                    <?php include(ROOT_PATH . '/assets/open/svg/pricing.svg'); ?>
                        <div class="pricing-price ">
                            <?php echo $plan['dailyPercent']; ?>%
                        </div>
                        <h3 class="pricing-title">Daily Profit</h3>
                        <h3 class="pricing-title"><?php echo $plan['name']; ?> </h3>
                    </div>
                    <ul class="pricing-feature-list " style="padding-top: -100px !important;">
                        <li class="pricing-feature">Min. Investment: $<?php echo $plan['min']; ?></li>
                        <li class="pricing-feature"> Max. Investment: $<?php echo $plan['max']; ?> </li>
                        <li class="pricing-feature"> ROI after <?php echo $plan['ROI']; ?> days</li>
                        <li class="pricing-feature">10% Referral Bonus</li>
                        <li class="pricing-feature">24/7 Customer Care</li>
                    </ul>
                    <button style="cursor: pointer;" onclick="window.location.href = 'signin'" class="pricing-action">Get Started</button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

<?php include(ROOT_PATH . '/app/includes/footer_open.php'); ?>

<?php include(ROOT_PATH . '/app/includes/link_open_bottom.php'); ?>
</body>