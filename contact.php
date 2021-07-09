<?php 
include('path.php');
include(ROOT_PATH . '/app/controllers/contacts.php');
$title = 'Contact Us';

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
       <p>We'll love to hear from you.</p>
       <h1>Contact Us</h1>
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
        <li class="active">Contact Us</li>
      </ul>
      </div>
    </div>
  </div>
</div>
<!-- Page Title ends -->

<!-- CONTACT -->
<section class="padding-bottom-half padding-top contact">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
         <div class="contact_detail padding-bottom">
           <h3 class="bottom20">Contact us</h3>
           <p class="bottom30">Want to work with us or need more details about our platform, you can fill the form below to get in touch with us. We have a team of seasoned customer care agents who are there round the clock to make sure we serve you at any point in time you need our attention.</p>
           <p class="bottom20">Our innovative pricing, pooled liquidity, and execution algorithm to seek the best price help remove the hassles of trading on a crypto Exchange. Our experts takes care of all the Works for you.</p>
           <h3 class="bottom20">Our Address</h3>
           <p>We made several channels available to make it quick and easy to get in touch with us at any given time. All of the channels are available on a 24/7 base.</p>
            <div class="row">
              <div class="col-sm-6">
                <div class="address">
                <span><i class="icon-phone4"></i></span>
                <div class="text">
                  <h4>Phone</h4>
                  <p>(+44) 791-921-4075</p>
                </div>
               </div>
              </div>
              <div class="col-sm-6">
                <div class="address">
                <span><i class="icon-mail"></i></span>
                <div class="text">
                  <h4>Email Address</h4>
                  <p><a href="#.">info@WievaTrade.com</a></p>
                </div>
               </div>
              </div>
              <div class="col-sm-6">
                <div class="address">
                <span><i class="icon-location"></i></span>
                <div class="text">
                  <h4>Address</h4>
                  <p>Dalton House, 60 Windsor Ave, SW19 2RR London, UK</p>
                </div>
               </div>
              </div>
            </div>
         </div>
      </div>
      <div class="col-sm-6">
         <h3 class="bottom20">Let’s Talk To Us</h3>
        <form class="callus padding-bottom" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

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
          <label>Email Addres * <span class="text-danger"><?php echo $errors['email']; ?></span></label>
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
      <div class="col-sm-12">
        <div class="col-sm-12">
        <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Dalton House 60 Windsor Ave London SW19 2RR UK&amp;t=&amp;z=11&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://embedgooglemap.xyz/">embed google map</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}</style></div>
      </div>
      </div>
    </div>
  </div>
</section>
<!-- CONTACT ends -->


<?php include(ROOT_PATH . '/app/includes/footer_open.php'); ?>

<?php include(ROOT_PATH . '/app/includes/link_open_bottom.php'); ?>
</body>
</html>
