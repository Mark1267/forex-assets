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
<section class="page_header">
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


<!--SERVICES-->
<section id="team" class="padding-top">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="service_wrap heading_space">
          <div class="image bottom10">
            <img src="https://www.cmswire.com/-/media/4f09da9235da4e3fa49a4c24d824bd99.ashx" alt="our Team">
            <div class="overlay">
              <a href="<?php echo BASE_URL . '/detail'; ?>" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
            </div>
          </div>
          <h3 class="bottom10">Single-Asset Products</h3>
          <p class="bottom15">ForexAssets Bitcoin Trust.  ForexAssets's flagship product, the Bitcoin Investment Trust (symbol: RBTC), is a private, open-ended trust that is invested exclusively in bitcoin and derives its value solely from the price of bitcoin...</p>
          <a href="<?php echo BASE_URL . '/detail'; ?>" class="btn-border border_radius text-uppercase">Learn More</a>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="service_wrap heading_space">
          <div class="image bottom10">
            <img src="https://thumbor.forbes.com/thumbor/fit-in/1200x0/filters%3Aformat%28jpg%29/https%3A%2F%2Fspecials-images.forbesimg.com%2Fdam%2Fimageserve%2F1145044938%2F0x0.jpg%3Ffit%3Dscale" alt="our Team">
            <div class="overlay">
              <a href="<?php echo BASE_URL . '/detail'; ?>" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
            </div>
          </div>
          <h3 class="bottom10">Diversified Products</h3>
          <p class="bottom15">ForexAssets Digital Large Cap Fund. A strategic large cap fund for diversified exposure.</p>
          <a href="<?php echo BASE_URL . '/detail'; ?>" class="btn-border border_radius text-uppercase">Learn More</a>
        </div>
      </div>
      <!-- <div class="col-sm-4">
        <div class="service_wrap heading_space">
          <div class="image bottom10">
            <img src="images/service3.jpg" alt="our Team">
            <div class="overlay">
              <a href="services_detail.html" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
            </div>
          </div>
          <h3 class="bottom10">Investments Management</h3>
          <p class="bottom15">Phasellus lorem enim, luctus ut velit eget, convallis egestas eros. 
          Sed ornare ligula Progressively generate synergistic eget.</p>
          <a href="services_detail.html" class="btn-border border_radius text-uppercase">Learn More</a>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="service_wrap heading_space">
          <div class="image bottom10">
            <img src="images/service4.jpg" alt="our Team">
            <div class="overlay">
              <a href="services_detail.html" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
            </div>
          </div>
          <h3 class="bottom10">Car Insurance</h3>
          <p class="bottom15">Phasellus lorem enim, luctus ut velit eget, convallis egestas eros. 
          Sed ornare ligula Progressively generate synergistic eget.</p>
          <a href="services_detail.html" class="btn-border border_radius text-uppercase">Learn More</a>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="service_wrap heading_space">
          <div class="image bottom10">
            <img src="images/service5.jpg" alt="our Team">
            <div class="overlay">
              <a href="services_detail.html" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
            </div>
          </div>
          <h3 class="bottom10">Business Loan</h3>
          <p class="bottom15">Phasellus lorem enim, luctus ut velit eget, convallis egestas eros. 
          Sed ornare ligula Progressively generate synergistic eget.</p>
          <a href="services_detail.html" class="btn-border border_radius text-uppercase">Learn More</a>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="service_wrap heading_space">
          <div class="image bottom10">
            <img src="images/service6.jpg" alt="our Team">
            <div class="overlay">
              <a href="services_detail.html" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
            </div>
          </div>
          <h3 class="bottom10">Future Planning Services</h3>
          <p class="bottom15">Phasellus lorem enim, luctus ut velit eget, convallis egestas eros. 
          Sed ornare ligula Progressively generate synergistic eget.</p>
          <a href="services_detail.html" class="btn-border border_radius text-uppercase">Learn More</a>
        </div>
      </div> -->
    </div>
  </div>
</section>
<!-- SERVICES ends -->


<?php include(ROOT_PATH . '/app/includes/footer_open.php'); ?>

<?php include(ROOT_PATH . '/app/includes/link_open_bottom.php'); ?>
</body>
</html>
