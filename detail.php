<?php include('path.php'); 
include(ROOT_PATH . '/app/controllers/contacts.php');
$title = 'Our Services';
?>
<!doctype html>
<html lang="en">
<?php include(ROOT_PATH . '/app/includes/link_open_top.php'); ?>

<body>

<?php include(ROOT_PATH . '/app/includes/header_open.php'); ?>



<!--PAGE TITLE-->
<section class="page_header" style="background-image: url(<?php echo BASE_URL . '/assets/open/images/14.jpg'?>) !important;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
       <p>What We Do</p>
       <h1 class="text-uppercase">Services</h1>
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
        <li class="active">Services</li>
      </ul>
      </div>
    </div>
  </div>
</div>
<!--PAGE TITLE ends-->


<!--Services-->
<section id="service" class="padding">
  <div class="container services">
    <div class="row">
      <div class="col-md-3 col-sm-4">
        <ul class="tabs heading_space">
          <li class="active" rel="tab1">Single-Asset Products</li>
          <li rel="tab2">Diversified Products</li>
        </ul>
        <div class="testinomial_wrap heading_space">
          <div class="testinomial_text" style="text-align: center;"> <img style="width: 188px;" alt="testinomial" src="<?php echo BASE_URL . '/assets/open/images/logo-dark.png'; ?>" class="quote">
            <p>With WievaTrade, our aim is to help the financial sector with the opportunities and challenges of the blockchain technology by offering outstanding solutions in the field of distributed ledgers, cryptocurrencies and digital assets.</p>
          </div>
          <div class="testinomial_pic"> <img width="58px" alt="testinomial" src="<?php echo BASE_URL . '/assets/dashboard/images/user/avatar-s-19.png'; ?>" class=""> <span class="color">Bard Markson</span> <span class="post_img">Client</span> </div>
        </div>
      </div>
      <div class="col-md-9 col-sm-8">
        <div class="tab_container">
          <h3 class="d_active tab_drawer_heading" rel="tab1">Single-Asset Products</h3>
          <div id="tab1" class="tab_content">
            <div class="services_content">
              <div class="row">
                <div class="col-md-8"> <img src="<?php echo BASE_URL . '/assets/open/images/13.jpg'?>" alt="service details" class="img-responsive"> </div>
                <div class="col-md-4">
                  <div class="owl-carousel bottom20" id="service_slider">
                    <div class="item">
                      <h4 class="bottom20">We Have Essential Plans For Commodities Trading.</h4>
                      <h4 class="bottom15"> <span class="blue_t">1) What is Investments ?</span></h4>
                      <p class="bottom10">Investment management is the professional asset management of various securities and other assets, such as Digital Assets, in order to meet specified investment goals for the benefit of the investors. Investors may be institutions or private investors.</p>
                    </div>
                  </div>
                </div>
              </div>
              <h3 class="bottom20">Single-Asset Products</h3>
              <p class="bottom30"> WievaTrade Bitcoin Trust.  WievaTrade's flagship product, the Bitcoin Investment Trust (symbol: RBTC), is a private, open-ended trust that is invested exclusively in bitcoin and derives its value solely from the price of bitcoin. It enables investors to gain exposure to the price movement of bitcoin without the challenges of buying, storing, and safekeeping bitcoins.</p>

<p class="bottom40">• WievaTrade Bitcoin Cash Trust. An alternative approach for electronic cash.</p>

<p class="bottom40">• WievaTrade Ethereum Trust. A decentralized, smart-contract platform.</p>

<p class="bottom40">• WievaTrade Ethereum Classic Trust. A flexible currency for the Internet of Things.</p>

<p class="bottom40">• WievaTrade Litecoin Trust. A digital currency for fast, low-cost payments.</p>

<p class="bottom40">• WievaTrade Stellar Lumens Trust. A platform that connects banks, payment systems, and people.
</p>
              <div class="row">
                <div class="col-md-5">
                  <h2 class="bottom10">Key<span class="blue_t">Benefits</span></h2>
                  <div class="accordion-container">
                    <div class="accordion_title"> <a href="javascript:void(0)" class="active">Our Mission<i class="fa fa-plus"></i></a>
                      <div class="content" style="display:block;">
                        <p class="bottom20">Our mission is to be a trusted partner for our clients and a respected leader in global asset management.</p>
                        <p class="bottom0">Our mission is to add value with active portfolio management to help our clients reach their long-term financial goals. We achieve this through our investment strategies, adhering to our values and investment principles, and offering employees a challenging and rewarding place to build a career.</p>
                      </div>
                    </div>
                    <div class="accordion_title"> <a href="javascript:void(0)">Our Goals<i class="fa fa-plus"></i></a>
                      <div class="content">
                        <p class="bottom20">Our goal is to be a trusted partner for our clients and a respected leader in global asset management.</p>
                      </div>
                    </div>
                    <div class="accordion_title"> <a href="javascript:void(0)">About Fin Growth <i class="fa fa-plus"></i></a>
                      <div class="content">
                        <!--<p class="bottom20">Standing idle is not an option when your core business is security. <a href="https://zenexassets.com" class="text-info">ZENEX</a> is proud to partner with WievaTradebecause our goals converge around a common pillar of trust. The projects in prospect are exciting and we are looking forward to providing an expanded portfolio of solutions, including distributed ledger and cryptographic technologies to respond to our clients’ shifting needs.</p> -->
                        <p class="bottom0">We are independent 
We will remain a privately owned, independent firm to ensure that we act in the best interest of our clients and employees.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <h2 class="bottom10">Request a Free<span class="blue_t">Consultation</span></h2>
                  <p class="bottom15">We will respond as soon as possible.</p>
                  <form class="callus" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    
          <div class="form-group"><div id="result"></div></div>
            <div class="form-group">
              <label>Your First Name *  <span class="text-danger"><?php echo $errors['firstname']; ?></span></label>
              <div class="input-group">
                <input type="text" class ="form-control" required name="firstname" id="firstname" value="<?php echo $firstname; ?>">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label>Your Last Name * <span class="text-danger"><?php echo $errors['lastname']; ?></span></label>
              <div class="input-group">
                <input type="text" class ="form-control" required name="lastname" id="lastname" value="<?php echo $lastname; ?>">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label>Phone Number * <span class="text-danger"><?php echo $errors['phone']; ?></span></label>
              <div class="input-group">
                <input type="number" class ="form-control" required name="phone" id="phone" value="<?php echo $phone; ?>">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label>Email Address * <span class="text-danger"><?php echo $errors['email']; ?></span></label>
              <div class="input-group">
                <input type="email" class ="form-control" required name="email" id="email" value="<?php echo $email; ?>">
                <span class="input-group-addon"><i class="icon-envelope2"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label>Message * <span class="text-danger"><?php echo $errors['message']; ?></span></label>
              <div class="input-group">
                <textarea class="form-control" name="message" id="message"><?php echo $message; ?></textarea>
                <span class="input-group-addon"><i class=" icon-comments"></i></span>
              </div>
            </div>
            <button type="submit" class="btn-green border_radius" name="fullOpenContact">Submit</button>
                   
                  </form>
                </div>
              </div>
            </div>
          </div>
          <h3 class="tab_drawer_heading" rel="tab2">Diversified Products</h3>
          <div id="tab2" class="tab_content">
            <div class="services_content">
              <div class="row">
                <div class="col-md-8"> <img src="<?php echo BASE_URL . '/assets/open/images/14.jpg'?>" class="img-responsive"> 
                </div>
                <div class="col-md-4">
                  <div class="owl-carousel bottom20" id="service_slider">
                    <div class="item">
                      <h4 class="bottom20">We Have Essential Plans For Commodities Trading.</h4>
                      <h4 class="bottom15"> <span class="blue_t">1) What is Investments ?</span></h4>
                      <p class="bottom10">Investment management is the professional asset management of various securities and other assets, such as Digital Assets, in order to meet specified investment goals for the benefit of the investors. Investors may be institutions or private investors.</p>
                    </div>
                  </div>
                </div>
              </div>
              <h3 class="bottom20">Diversified Products</h3>
              <p class="bottom30">• WievaTrade Digital Large Cap Fund. A strategic large cap fund for diversified exposure.</p>
              <div class="row">
                <div class="col-md-5">
                  <h2 class="bottom10">Key<span class="blue_t">Benefits</span></h2>
                  <div class="accordion-container">
                    <div class="accordion_title"> <a href="javascript:void(0)" class="active">Our Mission<i class="fa fa-plus"></i></a>
                      <div class="content" style="display:block;">
                        <p class="bottom20">Our mission is to be a trusted partner for our clients and a respected leader in global asset management.</p>
                        <p class="bottom0">Our mission is to add value with active portfolio management to help our clients reach their long-term financial goals. We achieve this through our investment strategies, adhering to our values and investment principles, and offering employees a challenging and rewarding place to build a career.</p>
                      </div>
                    </div>
                    <div class="accordion_title"> <a href="javascript:void(0)">Our Goals<i class="fa fa-plus"></i></a>
                      <div class="content">
                        <p class="bottom20">Our goal is to be a trusted partner for our clients and a respected leader in global asset management.</p>
                      </div>
                    </div>
                    <div class="accordion_title"> <a href="javascript:void(0)">About Fin Growth <i class="fa fa-plus"></i></a>
                      <div class="content">
                        <!-- <p class="bottom20">Standing idle is not an option when your core business is security. <a href="https://zenexassets.com" class="text-info">ZENEX</a> is proud to partner with WievaTradebecause our goals converge around a common pillar of trust. The projects in prospect are exciting and we are looking forward to providing an expanded portfolio of solutions, including distributed ledger and cryptographic technologies to respond to our clients’ shifting needs.</p> -->
                        <p class="bottom0">We are independent 
We will remain a privately owned, independent firm to ensure that we act in the best interest of our clients and employees.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <h2 class="bottom10">Request a Free<span class="blue_t">Consultation</span></h2>
                  <p class="bottom15">We will respond as soon as possible.</p>
                  <form class="callus" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    
          <div class="form-group"><div id="result"></div></div>
            <div class="form-group">
              <label>Your First Name *  <span class="text-danger"><?php echo $errors['firstname']; ?></span></label>
              <div class="input-group">
                <input type="text" class ="form-control" required name="firstname" id="firstname" value="<?php echo $firstname; ?>">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label>Your Last Name * <span class="text-danger"><?php echo $errors['lastname']; ?></span></label>
              <div class="input-group">
                <input type="text" class ="form-control" required name="lastname" id="lastname" value="<?php echo $lastname; ?>">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label>Phone Number * <span class="text-danger"><?php echo $errors['phone']; ?></span></label>
              <div class="input-group">
                <input type="number" class ="form-control" required name="phone" id="phone" value="<?php echo $phone; ?>">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label>Email Address * <span class="text-danger"><?php echo $errors['email']; ?></span></label>
              <div class="input-group">
                <input type="email" class ="form-control" required name="email" id="email" value="<?php echo $email; ?>">
                <span class="input-group-addon"><i class="icon-envelope2"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label>Message * <span class="text-danger"><?php echo $errors['message']; ?></span></label>
              <div class="input-group">
                <textarea class="form-control" name="message" id="message"><?php echo $message; ?></textarea>
                <span class="input-group-addon"><i class=" icon-comments"></i></span>
              </div>
            </div>
            <button type="submit" class="btn-green border_radius" name="fullOpenContact">Submit</button>
                   
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Services Ends-->


<?php include(ROOT_PATH . '/app/includes/footer_open.php'); ?>

<?php include(ROOT_PATH . '/app/includes/link_open_bottom.php'); ?>

</body>
</html>
