<?php
$class1 = str_replace('-', '', $item['category']->class)   ;

$i = 0;
    foreach ($posts as $post) {$i++;
        if($i%2==1){$pos="left";}else{$pos="right";}
        ?>

                           <div class="listinews col-lg-6 no-padding-<?php echo $pos;?>">
                              <div class="newshot news-style news-style-blue col-lg-12 item-news-no-padding style-<?php echo $class1;?>">
                                 <a href="<?php echo base_url('blog/' . $post->post_slug); ?>" title="<?php echo $post->post_title; ?>"><img src="<?php echo pt_post_full($post->post_id); ?>" alt="<?php echo $post->post_title; ?>" class="img-responsive"></a>
                                 <div class="info">
                                      <a href="<?php echo base_url('blog/' . $post->post_slug); ?>" title="<?php echo $post->post_title; ?>">
                                    <h2><?php echo $post->post_title; ?></h2>
                                    </a>
                                   <p class="RTL"><?php echo character_limiter(strip_tags($post->post_desc), 250); ?></p>

                                    <div class="post-left go-right">
                                       <ul class="go-right">
                                         <li><span class="date-create"><?php echo date('d/m/Y', $post->post_created_at); ?></span></li>
                                        <li><span class="fb-like fb_iframe_widget" data-href="<?php echo base_url('blog/' . $post->post_slug); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></span></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                                 
                           </div>
                           
   <?php
    }
    ?>
