<?php 
include('path.php');
include(ROOT_PATH . '/app/controllers/users.php');
$title = 'Alert';
?>
<!DOCTYPE html>
<html lang="en">
<?php include(ROOT_PATH . '/app/includes/link_dash_top.php'); ?>
<body>
<?php //include(ROOT_PATH . '/app/includes/nav_user_dash.php'); ?>
<div class="row" style="height: 100%;">
            <div class="col-md-9 mx-auto my-auto">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title text-<?php echo $_SESSION['type']; ?>">Alert</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-10 mx-auto center text-center">
                        <div class="alert alert-icon-left alert-<?php echo $_SESSION['type']; ?> alert-dismissible mb-2" role="alert">
                          <span class="alert-icon"><i class="la la-<?php 
                          if($_SESSION['type'] === 'success'){
                              echo 'thumbs-o-up';
                          }elseif($_SESSION['type'] === 'danger'){
                            echo 'thumbs-o-down';
                          }elseif($_SESSION['type'] === 'warning'){
                            echo 'warning';
                          }elseif($_SESSION['type'] === 'primary'){
                            echo 'heart';
                          }else{
                            echo 'info-circle';
                          }
                          ?>"></i></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <?php echo $_SESSION['message']; ?>
                          <?php unset($_SESSION['message'], $_SESSION['type']); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
<?php include(ROOT_PATH . '/app/includes/link_dash_bottom.php'); ?>
</body>
</html>