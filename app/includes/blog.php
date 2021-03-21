
      <aside class="col-sm-3">
        <div class="widget heading_space">
          <form class="widget_search border-radius">
          <div class="input-group">
            <input class="form-control" type="search" required placeholder="Search Here">
            <i class="input-group-addon icon-search5"></i>
          </div>
          </form>
        </div>
        <div class="widget heading_space">
            <h4 class="bottom10">Blog Posts</h4>
            <?php $posts = selectAllLimits($table, [], 0, 5); ?>
                <?php foreach($posts as $post): ?>
                    <div class="single_post bottom15">
                        <a href="<?php echo BASE_URL . '/newsdetail.php?id=' . $post['id']; ?>" class="post"><img class=" img-responsive" src="<?php echo BASE_URL . '/assets/dashboard/images/posts/' . $post['image']; ?>" alt="post image"></a>
                        <div class="text col-12" style="display: block;">
                            <a href="<?php echo BASE_URL . '/newsdetail.php?id=' . $post['id']; ?>"><?php echo $post['title']; ?></a>
                            <p><?php echo date('F j, Y h:i:s a', strtotime($post['created_at'])); ?></p>
                        </div>
                    </div>
                <?php endforeach;?>
        </div>
        <div class="widget heading_space">
          <h4 class="bottom10">Categories</h4>
          <ul class="category">
              <?php foreach($categories as $category): ?>
                <li><a href="#>"><?php echo $category['title']; ?></a></li>
            <?php endforeach;?>
          </ul>
        </div>
      </aside>