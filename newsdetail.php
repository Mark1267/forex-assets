<?php 
include('path.php');
include(ROOT_PATH . '/app/controllers/blog.php');
if(isset($_GET['id'])){
$id = $_GET['id'];
$post = selectOne($table, ['id' => $id]);
$category = selectOne($table2, ['id' => $post['cat_id']]);
$title = $post['title'];
}else{
  header('location: ' . BASE_URL . '/404');
  exit();
}
?>
<!doctype html>
<html lang="en">
<?php include(ROOT_PATH . '/app/includes/link_open_top.php'); ?>

<body>

<?php include(ROOT_PATH . '/app/includes/header_open.php'); ?>


<!-- PAGE TITLE -->
<section class="page_header">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
       <p>News / Blog</p>
       <h1 class="text-uppercase">latest News</h1>
      </div>
    </div>
  </div>
</section>
<div class="page_linker">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
       <ul class="breadcrumb">
        <li><a href="<?php echo BASE_URL . '/'?>"><i class="icon-home6"></i>Home</a></li>
        <li>Blog</li>
        <li class="active">Blog Detail</li>
      </ul>
      </div>
    </div>
  </div>
</div>
<!-- PAGE TITLE ends -->


<!--BLOG DETAILS-->
<section id="blog" class="padding-top">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 bottom40">
        <div class="blog_item">
          <div class="blog_image bottom20">
             <img class="img-responsive" src="<?php echo BASE_URL . '/assets/dashboard/images/posts/' . $post['image']; ?>" alt="<?php echo $post['title']; ?>">
          </div>
          <h3>Post Description</h3>
          <ul class="blog_date bottom15">
            <li><a href="javascript:void(0)"><?php echo $category['title']; ?></a></li>
            <li><a href="javascript:void(0)"><?php echo date('F j, Y h:i:s a', strtotime($post['created_at'])); ?></a></li>
          </ul>
          <div class="col-md-12" style="word-wrap: break-word;">
          <?php echo html_entity_decode($post['body']); ?>
          </div>
          <!-- <h3 class="b bottom30">Leave a Reply</h3>
          <form class="callus">
          <div class="row">
            <div class="col-sm-4 form-group">
               <input type="text" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="col-sm-4 form-group">
               <input type="enail" class="form-control" placeholder="Email" required>
            </div>
            <div class="col-sm-4 form-group">
               <input type="text" class="form-control" placeholder="Website">
            </div>
            <div class="col-sm-12 form-group">
               <textarea placeholder="Commment" class="form-control"></textarea>
               <button type="submit" class="btn-green top10 border_radius text-uppercase">Post Comment</button>
            </div>
          </div>
        </form> -->
        </div>
      </div>
      <?php include(ROOT_PATH . '/app/includes/blog.php');?>
    </div>
  </div>
</section>
<!--BLOG DETAILS ends-->

<?php include(ROOT_PATH . '/app/includes/footer_open.php'); ?>
<?php include(ROOT_PATH . '/app/includes/link_open_bottom.php'); ?>
</body>
</html>
