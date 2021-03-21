<?php 
include('path.php');
include(ROOT_PATH . '/app/controllers/contacts.php');

$title = 'FAQ';

?>
<!doctype html>
<html lang="en">

<?php include(ROOT_PATH . '/app/includes/link_open_top.php'); ?>

<body>

<?php include(ROOT_PATH . '/app/includes/header_open.php'); ?>


    <!-- Page Title -->
    <section class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>How it works</p>
                    <h1 class="text-uppercase">faq’s</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="page_linker">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <ul class="breadcrumb">
                        <li><a href="index.html"><i class="icon-home6"></i>Home</a></li>
                        <li>Pages</li>
                        <li class="active">faq’s</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title ends -->


    <!--FAQ-->
    <section id="faq" class="padding-top padding-bottom-half">
  <h3 class="hidden"> hidden</h3>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="accordion-container">
            <div class="accordion_title">
              <a href="javascript:void(0)" class="active">
                 What is this website about? Is this an ICO?<i class="fa fa-minus"></i>
              </a>
              <div class="content" style="display:block;">
                  <p class="bottom20">No. This is not an Initial Coin Offering. We believe that ICO's should be approached with caution as the majority of "Alt coins" do not offer any benefits to more established crypto currencies such as Bitcoin, Ethereum, etc. ForexAssets is a managed cryptocurrency trading platform with user friendly interface and attractive offer.</p>
              </div>
            </div>
            <div class="accordion_title">
              <a href="javascript:void(0)">What Markets do you trade?<i class="fa fa-plus"></i></a>
              <div class="content">
                <p class="bottom20">Tradeable Coins: Bitcoin, Litecoin, Ethereum, Bitcoin Cash and XRP.</p>
              </div>
            </div>
            <div class="accordion_title">
              <a href="javascript:void(0)">What is the risk for my investment?<i class="fa fa-plus"></i></a>
              <div class="content">
                <p class="bottom20">There is no risk whatsoever. Just invest and enjoy the financial freedom..</p>
              </div>
            </div>
            <div class="accordion_title">
              <a href="javascript:void(0)">How can I access the account?<i class="fa fa-plus"></i></a>
              <div class="content">
                <p class="bottom20">If you are a registered user of ForexAssets, please enter your username and password in the appropriate fields at the top of the website and click the "Login to Account" button. You will be redirected to your account automatically as soon as you have done the above.</p>
              </div>
            </div>
            <div class="accordion_title">
              <a href="javascript:void(0)">Are there any limits for an investment amount? How can I keep my account safe?<i class="fa fa-plus"></i></a>
              <div class="content">
                <p class="bottom20">We take all security measures to protect your account and keep it safe from third parties intrusion.</p>
              </div>
            </div>
            <div class="accordion_title">
              <a href="javascript:void(0)">What is the process of investing?<i class="fa fa-plus"></i></a>
              <div class="content">
                <p class="bottom20">To make investments you should register with ForexAssets, create an account and then you can make your deposit. All the investments are made in your personal account after login</p>
              </div>
            </div>
          </div>
      </div>
      <div class="col-sm-6">
        <div class="accordion-container">
            <div class="accordion_title">
              <a href="javascript:void(0)" class="active">
                I forgot my password. What should I do?
                <i class="fa fa-minus"></i>
              </a>
              <div class="content" style="display:block;">
                <p class="bottom20">Go to Password Reminder section, enter your registration e-mail address and follow the instructions.</p>
              </div>
            </div>
            <div class="accordion_title">
              <a href="javascript:void(0)">How to create a new account?<i class="fa fa-plus"></i></a>
              <div class="content">
                <p class="bottom20">It's not difficult at all. Click on the following button, fill in the registration form and create a new account.</p>
              </div>
            </div>
            <div class="accordion_title">
              <a href="javascript:void(0)">May I create more than one account?<i class="fa fa-plus"></i></a>
              <div class="content">
                <p class="bottom20">No. you are allowed to create only one account. For special situations please contact our Customer Support.</p>
              </div>
            </div>

          </div>
      </div>
    </div>
  </div>
</section>

    <!-- FAQ ends -->

    <?php include(ROOT_PATH . '/app/includes/footer_open.php'); ?>
    <?php include(ROOT_PATH . '/app/includes/link_open_bottom.php'); ?>

</body>

</html>