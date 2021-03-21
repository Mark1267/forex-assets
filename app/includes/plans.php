<?php foreach($plans as $key => $plan): ?>
                                    <?php switch ($key) {
                                        case 0:
                                            $color = 'danger';
                                            break;
                                        case 1:
                                            $color = 'success';
                                            break;
                                        case 2:
                                            $color = 'danger';
                                            break;
                                        default:
                                            $color = 'warning';
                                    }?>
                                        <div class="card bg-<?php echo $color; ?>">
                                            <img class="img-fluid card-img-top" src="<?php echo BASE_URL . '/assets/dashboard/images/user/' .$plan['image']; ?>" alt="Card image cap">
                                            <div class="card-body bg-white">
                                                <h5 class="card-title"><?php echo $plan['name']; ?></h5>
                                                <h5 class="card-title"><?php echo $plan['dailyPercent']; ?> Daily Profit</h5>
                                                <ul class="">
                                                    <li><i data-feather="check" class="text-success"></i> Min Investment: $<?php echo $plan['min']; ?>.00</li>
                                                    <li><i data-feather="check" class="text-success"></i> Max. Investment: $<?php echo $plan['max']; ?>.00</li>
                                                    <li><i data-feather="check" class="text-success"></i> ROI after <?php echo $plan['ROI']; ?> days</li>
                                                    <li><i data-feather="check" class="text-success"></i> 10% Referral Bonus</li>
                                                    <li><i data-feather="check" class="text-success"></i> 24/7 Customer Care</li>
                                                </ul>
                                            </div>
                                            <div class="card-footer text-center bg-success">
                                                <?php if($_SESSION['status'] > 1):?>
                                                <a href="<?php echo BASE_URL . '/dashboard/admin/plan/edit.php?plan_id=' . $plan['id']; ?>" class="text-white px-5 py-2 plan-btn border border-white"><i class="icon fas fa-plus-circle"></i>&nbsp;Edit</a>
                                                <?php else:?>
                                                <a href="<?php echo BASE_URL . '/dashboard/user/deposit.php'; ?>" class="text-white px-5 py-2 plan-btn border border-white"><i class="icon fas fa-plus-circle"></i>&nbsp;Invest</a>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                <?php endforeach; ?>