<?php 
include('path.php');
include(ROOT_PATH . '/app/controllers/contacts.php');

$title = '404';

?>
<!doctype html>
<html lang="en">
<?php include(ROOT_PATH . '/app/includes/link_open_top.php'); ?>

<body>

<?php include(ROOT_PATH . '/app/includes/header_open.php'); ?>


<!--Page Title -->
<section class="page_header">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
       <p>Ops...</p>
       <h1> 404 Error</h1>
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
        <li class="active">404 Error</li>
      </ul>
      </div>
    </div>
  </div>
</div>
<!--Page Title ends -->


<!--ERROR-->
<section id="error" class="text-center padding-bottom-half padding-top">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
      <img src="<?php echo BASE_URL . '/assets/open/'?>images/404.png" alt="404" class="error_inner img-responsive">
      <div class="content">
          <h2> 404 Error</h2>
          <p>The page you are looking for does not exist.</p>
          </div>
      </div>
      <a href="<?php echo BASE_URL . '/'; ?>" class="btn-green text-uppercase border_radius top40">go back to home page</a>
    </div>
  </div>
</section>
<!--ERROR ends-->


<?php include(ROOT_PATH . '/app/includes/footer_open.php'); ?>

<?php include(ROOT_PATH . '/app/includes/link_open_bottom.php'); ?>
</body>
</html>
