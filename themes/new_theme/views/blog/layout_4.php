<div class="list-news list-news2">
    <ul>
        <?php
        foreach ($posts as $index => $post) {
            if ($index % 2 == 0) {
                ?>
                <li class="news-style news-style-blue news-style-list clearfix style-kinhnghiem">
                    <div class="col-lg-4 no-padding-left">
                                    <a href="<?php echo base_url('blog/' . $post->post_slug); ?>" title="<?php echo $post->post_title; ?>"><img src="<?php echo pt_post_full($post->post_id); ?>" alt="<?php echo $post->post_title; ?>" class="img-responsive"></a>
                   </div>
                   <div class="info-news col-lg-8 no-padding-left no-padding-right">
                        <a href="<?php echo base_url('blog/' . $post->post_slug); ?>" title="<?php echo $post->post_title; ?>">
                           <h2><?php echo $post->post_title; ?></h2>
                        </a>
                        <div>
                           <p class="RTL"><?php echo character_limiter(strip_tags($post->post_desc), 200); ?>…</p>
                           <div class="post-left go-right">
                              <ul class="go-right">
                                 <li><span class="date-create"><?php echo date('d/m/Y', $post->post_created_at); ?></span></li>
                                 <li><span class="fb-like fb_iframe_widget" data-href="<?php echo base_url('blog/' . $post->post_slug); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></span></li>
                              </ul>
                           </div>
                        </div>
                    </div>
                </li>
                <?php
            } else {
                ?>
                <li class="news-style news-style-blue news-style-list clearfix style-kinhnghiem">
                   <div class="info-news col-lg-8 no-padding-left">
                        <a href="<?php echo base_url('blog/' . $post->post_slug); ?>" title="<?php echo $post->post_title; ?>">
                           <h2><?php echo $post->post_title; ?></h2>
                        </a>
                        <div>
                           <p class="RTL"><?php echo character_limiter(strip_tags($post->post_desc), 200); ?>…</p>
                           <div class="post-left go-right">
                              <ul class="go-right">
                                 <li><span class="date-create"><?php echo date('d/m/Y', $post->post_created_at); ?></span></li>
                                 <li><span class="fb-like fb_iframe_widget" data-href="<?php echo base_url('blog/' . $post->post_slug); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></span></li>
                              </ul>
                           </div>
                        </div>
                    </div>
                    <div class="col-lg-4 no-padding-left no-padding-right">
                        <a href="<?php echo base_url('blog/' . $post->post_slug); ?>" title="<?php echo $post->post_title; ?>"><img src="<?php echo pt_post_full($post->post_id); ?>" alt="<?php echo $post->post_title; ?>" class="img-responsive"></a>
                   </div>
                </li>
                <?php
            }
            ?>
            <?php
        }
        ?>
    </ul>
</div>