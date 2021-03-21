
                        <div class="feed-scroll" style="height:385px;position:relative;">
                            <div class="card-body">
                                <?php foreach($feeds as $feed):?>
                                <div class="row m-b-25 align-items-center">
                                    <?php 
                                    $date1 = strtotime($feed['created_at']);  
                                    $date2 = strtotime(date("Y-m-d H:i:s"));  
                                    $diff = abs($date2 - $date1);  
                                    $years = floor($diff / (365*60*60*24));  
                                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
                                    $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60)); 
                                    $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
                                    $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));  
                                    ?> 
                                    <div class="col-auto p-r-0">
                                        <i data-feather="bell" class="badge-light-<?php echo $feed['type']; ?> feed-icon"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#!">
                                            <h6 class="m-b-5 text-<?php echo $feed['type']; ?>"><?php echo $feed['message']; ?><span class="text-muted float-right f-14"><?php echo $days . 'days ' . $hours . 'hr ' . $minutes . 'min ' . $seconds . ' sec ago.'; ?></span></h6>
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>