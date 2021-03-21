    	                        <nav aria-label="..." class="my-3">
                                    <ul class="pagination pagination-sm justify-content-center">
                                    <?php for($x = 1; $x < $totalPages +1; $x++):?>
                                        <?php if(isset($_GET['page']) && $_GET['page'] == $x):?>
                                                <li class="page-item active">
                                                    <a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . $x; ?>" tabindex="-1"><?php echo $x; ?></a>
                                                </li>
                                        <?php else:?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . $x; ?>" tabindex="-1"><?php echo $x; ?></a>
                                                </li>
                                            <?php endif;?>
                                    <?php endfor;?>
                                    </ul>
                                </nav>