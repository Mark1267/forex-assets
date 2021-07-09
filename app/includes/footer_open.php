<!--Contact Info-->
<div class="container bg_contact bg_one border_radius wow bounceInUp">
  <div class="row">
    <div class="col-sm-3">
      <div class="contact_inner">
        <i class="icon-phone4"></i>
        <h5><strong>(+44) 791-921-4075</strong></h5>
        <a href="#.">support@wievatrade.com</a>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="contact_inner">
        <i class="icon-icons20"></i>
        <h5><strong>Mon - Sat 8.00 - 17.00</strong></h5>
        <h5>Sunday Closed</h5>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="contact_inner">
        <i class="icon-location"></i>
        <h5><strong>18, 6 Wester Hailes Park,</strong></h5>
        <h5>Edinburgh EH14 3AF, UK</h5>
      </div>
    </div>
  </div>
</div>
<!--Contact info ends-->

<!--Footer-->
<footer class="footer_top padding-top">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 footer_panel heading_space">
        <a href="<?php echo BASE_URL . '/'; ?>"  class="footer_logo bottom30" style="padding: 5px; border-radius: 3px;"><img src="<?php echo BASE_URL . '/assets/open/';?>images/logo-white.png" style="width: 140px;" alt="WievaTrade"></a>
        <p class="bottom30">WievaTrade Digital Asset Management is an investment manager connecting traditional finance with the digital assets market. The firm deploys highly sophisticated low-latency algorithmic trading, pursuing a range of arbitrage strategies in both spot and derivative markets, as well as a range of directional buy-and-hold products. </p>
        <ul class="social_icon">
          <li><a href="#." class="facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#." class="instagram"><i class="icon-instagram"></i></a></li>
        </ul>
      </div>
      <div class="col-sm-4 footer_panel heading_space">
      <h3 class="heading bottom30">Useful <span class="green_t">Links</span></h3>
        <ul class="links">
          <li><a href="<?php echo BASE_URL . '/'; ?>"><i class="icon-chevron-small-right"></i>Home</a></li>
          <li><a href="<?php echo BASE_URL . '/services'; ?>"><i class="icon-chevron-small-right"></i>Services</a></li>
          <!-- <li><a href="<?php //echo BASE_URL . '/team.php'; ?>"><i class="icon-chevron-small-right"></i>Our Team</a></li> -->
          <li><a href="<?php echo BASE_URL . '/about'; ?>"><i class="icon-chevron-small-right"></i>Company History</a></li>
          <li><a href="<?php echo BASE_URL . '/contact'; ?>"><i class="icon-chevron-small-right"></i>Contact Us</a></li>
          <li><a href="<?php echo BASE_URL . '/news'; ?>"><i class="icon-chevron-small-right"></i>Blog</a></li>
        </ul>
      </div>
      <div class="col-sm-4 footer_panel heading_space">
       <h3 class="bottom30 heading"> Recent <span class="green_t">Posts</span></h3>
       <?php $posts = selectAllLimits('posts', [], 0, 3); 
            foreach($posts as $post): ?>
            <div class="media">
                <div class="media-left">
                  <a href="<?php echo BASE_URL . '/newsdetail/' . $post['id']; ?>"><img class="media-object" src="<?php echo BASE_URL . '/assets/dashboard/images/posts/' . $post['image']; ?>" width="40px" alt="<?php echo substr($post['title'], 0, 10) . '...'; ?>"></a>
                </div>
                <div class="media-body">
                  <p><a href="<?php echo BASE_URL . '/newsdetail/' . $post['id']; ?>"><?php echo $post['title']; ?></a></p>
                  <span><i class="icon-calendar"></i><?php echo date('F j, Y h:i:s a', strtotime($post['created_at'])); ?></span>
                </div>
            </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</footer>
<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>Copyright &copy; <?php echo date('Y'); ?> <a href="#.">WievaTrade</a>. all rights reserved.</p>
      </div>
    </div>
  </div>
</div>