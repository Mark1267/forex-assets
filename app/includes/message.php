                <?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible fade show col-12" role="alert">
                        <span><?php echo $_SESSION['message']; ?></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                <?php endif; 
                unset($_SESSION['message'], $_SESSION['type']);
                ?>