<?php 
include('path.php');
include(ROOT_PATH . '/app/controllers/blog.php');
$posts = selectAll($table);
$title = 'Blog Posts';

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
        <li><a href="<?php echo BASE_URL . '/';?>"><i class="icon-home6"></i>Home</a></li>
        <li class="active">Blog</li>
      </ul>
      </div>
    </div>
  </div>
</div>


<!--Blog/ News-->
<section id="blog" class="padding-top">
  <div class="container">
    <div class="row">
      <style>.blog_item {
    width: 100%;
    display: flex;}.media-body {
    width: 100%;
}</style>
      <div class="col-sm-9 bottom40">
        <?php foreach($posts as $post):?>
          <?php $category = selectOne($table2, ['id' => $post['cat_id']]);?>
          <div class="blog_item media heading_space">
            <div class="media-left">
              <a href="<?php echo BASE_URL . '/newsdetail.php?id=' . $post['id']; ?>">
                <img class="media-object my-auto" width="300px" src="<?php echo BASE_URL . '/assets/dashboard/images/posts/' . $post['image']; ?>" alt="<?php echo $post['title']; ?>">
              </a>
            </div>
            <div class="media-body" style="word-wrap: break-word;">
              <h3><a href="<?php echo BASE_URL . '/newsdetail.php?id=' . $post['id']; ?>"><?php echo $post['title']; ?></a></h3>
              <ul class="blog_date bottom30">
                <li><a href="javascript:void(0)"><?php echo $category['title']; ?></a></li>
                <li><a href="javascript:void(0)"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></a></li>
              </ul>
            <span class="bottom30"><?php echo html_entity_decode(substr($post['body'], 0, 750) . '...'); ?></span>
            <a href="<?php echo BASE_URL . '/newsdetail.php?id=' . $post['id']; ?>" class="text-uppercase continue">Continue Reading</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php include(ROOT_PATH . '/app/includes/blog.php'); ?>
    </div>
  </div>
</section>


<?php include(ROOT_PATH . '/app/includes/footer_open.php'); ?>
<?php include(ROOT_PATH . '/app/includes/link_open_bottom.php'); ?>
</body>
</html>
