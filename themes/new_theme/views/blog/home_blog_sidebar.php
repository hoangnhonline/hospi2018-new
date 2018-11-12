<div class="secondary col-md-5 add_bottom_30 go-left secondary-blog">
               <div class="row">
                  <div class="col-md-6 go-left">
                     <div class="popular-bg">
                        <div class="popular-post title-quan-tam xemnhieu">Xem nhiều</div>
                        <div class="">
                           <div class="content">
                               <?php
                                  foreach($popular_posts as $post):
                                  $bloglib->set_id($post->post_id);
                                  $bloglib->post_short_details(); ?>
                              <div class="row featured">
                                 <a href="<?php echo base_url().'blog/'.$post->post_slug;?>" class="col-md-12 col-sm-12 col-xs-12 go-right">
                                 <img class="img-responsive post-img img-fade" src="<?php echo pt_post_thumbnail($post->post_id); ?>" alt=" <?php echo $bloglib->title;?>">
                                 </a>
                                 <div class="desc col-md-12 col-sm-12 col-xs-12 go-left">
                                    <h4 style="margin-top: 0px;" class="go-text-right purple">
                                       <a href="<?php echo base_url().'blog/'.$post->post_slug;?>">
                                    <?php echo $bloglib->title;?></a>
                                 </h4>
                                    <span> <?php echo character_limiter(strip_tags($bloglib->desc), 100);?>…</span>
                                 </div>
                                 <!--//desc-->
                              </div>
                              <!--//item-->
                              <hr style="margin-top: 5px;margin-bottom: 10px;color: #cccccc;border-top: 1px solid #cccccc;">
                              
                              <?php endforeach; ?>
                              <!--//item-->
                              
                           </div>
                           <!--//content-->
                        </div>
                     </div>
                     <div class="popular-bg border-px">
                        <div class="popular-post title-quan-tam chiasekinhnghiem">Chia sẻ kinh nghiệm</div>
                        <div class="col-lg-12 conetnt-chiasec">
                           <div class="content">
                           <?php foreach($camnang['all'] as $cn):?>
                              <div class="row featured">
                                 <div class="desc col-md-12 col-sm-12 col-xs-12 go-left">
                                    <h4 style="margin-top: 0px;" class="go-text-right purple">
                                       <a href="<?php echo base_url().'blog/'.$cn->post_slug;?>">
                                       <?php echo $cn->post_title;?></a>
                                    </h4>
                                 </div>
                                 <a href="<?php echo $cn->post_title;?>" class="col-md-12 col-sm-12 col-xs-12 go-right">
                                 <img class="img-responsive post-img img-fade" src="<?php echo pt_post_thumbnail($cn->post_id); ?>"
                                  alt="<?php echo $cn->post_title;?>">
                                 </a>
                                 <!--//desc-->
                              </div>
                              <!--//item-->
                               <hr style="margin-top: 5px;margin-bottom: 10px;color: #cccccc;border-top: 1px solid #cccccc;margin-left: -10px;margin-right: -10px;">
                            <?php endforeach;   ?>
                             
                              
                           </div>
                           <!--//content-->
                        </div>
                     </div>
                     <div class="col-lg-12 col-xs-12 no-padding content-quan-tam">
 <div class="list-group">
                        <div class="panel panel-default">
                           <div class="panel-heading go-text-right title-quan-tam">Bạn đang quan tâm</div>
                             <?php
                                foreach($feature_posts as $post):
                                  $bloglib->set_id($post->post_id);
                                  $bloglib->post_short_details(); ?>
  
                           <div class="col-lg-12 col-xs-12 no-padding-right padding-left-3 margin-top-10">
                              <div class="col-lg-4 col-xs-4 no-padding-left">
                                 <img class="img-responsive post-img img-fade" src="<?php echo pt_post_thumbnail($post->post_id); ?>" class="">
                              </div>
                              <div class="col-lg-8 col-xs-8 no-padding-right font-size-15 no-padding-left-mobile">
                                  <a href="<?php echo base_url().'blog/'.$post->post_slug;?>" class="">

                              <strong class="go-right"><?php echo $bloglib->title;?></strong>
                              <div class="clearfix"></div>
                           </a>
                              </div>
                           </div>
                           
                              <?php  endforeach;  ?>
                         
                        </div>
                     </div>
                     </div>
                    
                  </div>
                  <div class="col-md-6 go-left">
                     <form action="https://www.hospi.vn/blog/search" method="GET">
                        <div class="input-group RTL">
                           <input type="text" name="s" required="" placeholder="Tìm điểm đến, bài viết" class="form-control sub_email form">
                           <span class="input-group-btn">
                           <button class="btn btn-action" type="submit"><i class="fa fa-search"></i></button>
                           </span>
                        </div>
                     </form>
                     
                     
                    
                     <div class="clearfix"></div>

                        <div class="popular-bg bg-combox">
                        <div class="popular-post title-combo">Combo khách sạn</div>
                        <div class="">
                           <div class="content">
                              <div class="featured">
                                 <a href="https://www.hospi.vn/blog/tron-goi-3-ngay-2-dem-o-the-cliff-mui-ne-resort-ve-tau-khu-hoi" class="col-md-12 col-sm-12 col-xs-12 go-right no-padding">
                                 <img class="img-responsive post-img img-fade" src="https://www.hospi.vn/uploads/images/blog/457384_1487411265_the-cliff-resort-residences-mui-ne---hospi-(1).jpg" alt="Trọn gói 3 ngày 2 đêm ở The Cliff Mũi Né Resort (+ vé tàu khứ hồi)">
                                 </a>
                                 <div class="desc col-md-12 col-sm-12 col-xs-12 go-left">
                                    <h4 style="margin-top: 0px;" class="go-text-right purple"><a href="https://www.hospi.vn/blog/tron-goi-3-ngay-2-dem-o-the-cliff-mui-ne-resort-ve-tau-khu-hoi">Trọn gói 3 ngày 2 đêm ở The Cliff Mũi Né Resort (+ vé tàu khứ hồi)</a></h4>
                                    <span>Chương trình trọn gói ưu đãi 3 ngày 2 đêm</span>
                                    
                                 </div>
                                 <div class="col-lg-12 text-center class-chitiet"><span class="text-center"><a href=""> <i class="fa fa-angle-double-right"></i>chi tiết</a></span></div>
                                 <!--//desc-->
                              </div>
                              <!--//item-->
                             
                              <div class=" featured">
                                 <a href="https://www.hospi.vn/blog/lap-team-cam-trai-voi-dia-diem-du-lich-gan-sat-sai-gon-nao" class="col-md-12 col-sm-12 col-xs-12 go-right no-padding">
                                 <img class="img-responsive post-img img-fade" src="https://www.hospi.vn/uploads/images/blog/275031_1488512253_khu-du-lịch-Cao-Minh---Hospi-(11).jpg" alt="Lập team cắm trại với địa điểm du lịch gần sát Sài Gòn nào">
                                 </a>
                                 <div class="desc col-md-12 col-sm-12 col-xs-12 go-left">
                                    <h4 style="margin-top: 0px;" class="go-text-right purple"><a href="https://www.hospi.vn/blog/lap-team-cam-trai-voi-dia-diem-du-lich-gan-sat-sai-gon-nao">Lập team cắm trại với địa điểm du lịch gần sát Sài Gòn nào</a></h4><span>
                                    Chỉ cách TP.HCM (Q.Thủ Đức) hơn 40km, khu du lịch sinh thái&nbsp;Cao Minh sẽ…</span>     
                                 </div>
                                   <div class="col-lg-12 text-center class-chitiet"><span class="text-center"><a href=""> <i class="fa fa-angle-double-right"></i>chi tiết</a></span></div>
                                 <!--//desc-->
                              </div>
                              <!--//item-->
                             
                              <div class=" featured">
                                 <a href="https://www.hospi.vn/blog/uu-dai-1-dem-bbq-buffet-sai-san-cho-2-khach-tai-pullman-vung-tau" class="col-md-12 col-sm-12 col-xs-12 go-right no-padding">
                                 <img class="img-responsive post-img img-fade" src="https://www.hospi.vn/uploads/images/blog/thumbs/618452_1491935655_789607_Khach-san-Pullman-Vung-Tau---Hospi-(33).jpg" alt="Ưu đãi 1 đêm + BBQ Buffet sải sản cho 2 khách tại Pullman Vũng Tàu">
                                 </a>
                                 <div class="desc col-md-12 col-sm-12 col-xs-12 go-left">
                                    <h4 style="margin-top: 0px;" class="go-text-right purple"><a href="https://www.hospi.vn/blog/uu-dai-1-dem-bbq-buffet-sai-san-cho-2-khach-tai-pullman-vung-tau">Ưu đãi 1 đêm + BBQ Buffet sải sản cho 2 khách tại Pullman Vũng Tàu</a></h4>
                                    <span>
                                    Chỉ với &nbsp;3.749.000/2 khách.&nbsp;Bạn sẽ được tận hưởng 2N1Đ ở&nbsp;khách…          </span>
                                 </div>
                                  <div class="col-lg-12 text-center class-chitiet"><span class="text-center"><a href=""> <i class="fa fa-angle-double-right"></i>chi tiết</a></span></div>
                                 <!--//desc-->
                              </div>
                              <!--//item-->
                              
                              <div class="featured">
                                 <a href="https://www.hospi.vn/blog/check-in-homestay-sieu-moi-toanh-tai-vung-tau-dep-nhu-tranh" class="col-md-12 col-sm-12 col-xs-12 go-right no-padding">
                                 <img class="img-responsive post-img img-fade" src="https://www.hospi.vn/uploads/images/blog/316097_1488266984_Check-in-Homestay-siêu-mới-toanh-tại-vũng-tàu-đẹp-như-tranh---Hospi-(1).jpg" alt="Check in Homestay siêu mới toanh tại Vũng Tàu đẹp như tranh">
                                 </a>
                                 <div class="desc col-md-12 col-sm-12 col-xs-12 go-left">
                                    <h4 style="margin-top: 0px;" class="go-text-right purple"><a href="https://www.hospi.vn/blog/check-in-homestay-sieu-moi-toanh-tai-vung-tau-dep-nhu-tranh">Check in Homestay siêu mới toanh tại Vũng Tàu đẹp như tranh</a></h4>
                                    <span>
                                    Sea La Vie, một homestay trắng tinh nhỏ nhắn xinh xắn nằm trên 1 con dốc nho nhỏ…</span>          
                                 </div>
                                  <div class="col-lg-12 text-center class-chitiet"><span class="text-center"><a href=""> <i class="fa fa-angle-double-right"></i>chi tiết</a></span></div>
                                 <!--//desc-->
                              </div>
                              <!--//item-->
                             
                              
                           </div>
                           <!--//content-->
                        </div>
                     </div>
                     <div class="popular-bg best-choise">
                        <div class="popular-post title-best-choice">Best choice</div>
                        <div class="">
                           <div class="content">
                              <div class="featured">
                                
                                 <a href="https://www.hospi.vn/blog/tron-goi-3-ngay-2-dem-o-the-cliff-mui-ne-resort-ve-tau-khu-hoi" class="col-md-12 col-sm-12 col-xs-12 go-right no-padding">
                                 <img class="img-responsive post-img img-fade" src="https://www.hospi.vn/uploads/images/blog/457384_1487411265_the-cliff-resort-residences-mui-ne---hospi-(1).jpg" alt="Trọn gói 3 ngày 2 đêm ở The Cliff Mũi Né Resort (+ vé tàu khứ hồi)">
                                  <img class="icon-best-choise" src="<?php echo $theme_url;?>images/icon-bestchoise-big.png ">
                                  <span class="positon-icon-map"><i class="fa fa-map-marker" aria-hidden="true"></i> Đà nẵng<span>
                                 </span></span></a>

                                 <div class="desc col-md-12 col-sm-12 col-xs-12 go-left">
                                    <h4 style="margin-top: 0px;" class="go-text-right purple"><a href="https://www.hospi.vn/blog/tron-goi-3-ngay-2-dem-o-the-cliff-mui-ne-resort-ve-tau-khu-hoi">Amanoi Ninh Thuan Resort</a></h4>
                                    
                                 </div>
                                 <div class="clearfix"></div>
                                 <div class="col-lg-12 class-best-chois-txt">nếu hổi đâu là nơi thiên đường nghỉ dưỡng sang chảnh và xa xỉ nhất Việt Nam ,thì có lẻ chưa cần ở - nhưng sẽ có 90%  mọi người sẽ nhắc</div>
                                  <div class="col-lg-12 text-center class-chitiet"><span class="text-center"><a href=""> <i class="fa fa-angle-double-right"></i>chi tiết</a></span></div>
                                 <!--//desc-->
                              </div>
                              <!--//item-->
                             
                              <div class=" featured">
                                 <a href="https://www.hospi.vn/blog/lap-team-cam-trai-voi-dia-diem-du-lich-gan-sat-sai-gon-nao" class="col-md-12 col-sm-12 col-xs-12 go-right no-padding">
                                 <img class="img-responsive post-img img-fade" src="https://www.hospi.vn/uploads/images/blog/275031_1488512253_khu-du-lịch-Cao-Minh---Hospi-(11).jpg" alt="Lập team cắm trại với địa điểm du lịch gần sát Sài Gòn nào">
                                   <img class="icon-best-choise" src="<?php echo $theme_url;?>images/icon-bestchoise-big.png ">
                                  <span class="positon-icon-map"><i class="fa fa-map-marker" aria-hidden="true"></i> Đà nẵng<span>
                                 </span></span></a>
                                 <div class="desc col-md-12 col-sm-12 col-xs-12 go-left">
                                    <h4 style="margin-top: 0px;" class="go-text-right purple"><a href="https://www.hospi.vn/blog/lap-team-cam-trai-voi-dia-diem-du-lich-gan-sat-sai-gon-nao">Lập team cắm trại với địa điểm du lịch gần sát Sài Gòn nào</a></h4>
                                 </div>
                                   <div class="clearfix"></div>
                                 <div class="col-lg-12 class-best-chois-txt">nếu hổi đâu là nơi thiên đường nghỉ dưỡng sang chảnh và xa xỉ nhất Việt Nam ,thì có lẻ chưa cần ở - nhưng sẽ có 90%  mọi người sẽ nhắc</div>
                                  <div class="col-lg-12 text-center class-chitiet"><span class="text-center"><a href=""> <i class="fa fa-angle-double-right"></i>chi tiết</a></span></div>
                                 <!--//desc-->
                              </div>
                              <!--//item-->
                            
                              <div class=" featured">
                                 <a href="https://www.hospi.vn/blog/uu-dai-1-dem-bbq-buffet-sai-san-cho-2-khach-tai-pullman-vung-tau" class="col-md-12 col-sm-12 col-xs-12 go-right no-padding">
                                 <img class="img-responsive post-img img-fade" src="https://www.hospi.vn/uploads/images/blog/thumbs/618452_1491935655_789607_Khach-san-Pullman-Vung-Tau---Hospi-(33).jpg" alt="Ưu đãi 1 đêm + BBQ Buffet sải sản cho 2 khách tại Pullman Vũng Tàu">
                                   <img class="icon-best-choise" src="<?php echo $theme_url;?>images/icon-bestchoise-big.png ">
                                  <span class="positon-icon-map"><i class="fa fa-map-marker" aria-hidden="true"></i> Đà nẵng<span>
                                 </span></span></a>
                                 <div class="desc col-md-12 col-sm-12 col-xs-12 go-left">
                                    <h4 style="margin-top: 0px;" class="go-text-right purple"><a href="https://www.hospi.vn/blog/uu-dai-1-dem-bbq-buffet-sai-san-cho-2-khach-tai-pullman-vung-tau">Ưu đãi 1 đêm + BBQ Buffet sải sản cho 2 khách tại Pullman Vũng Tàu</a></h4>
                                   
                                 </div>
                                   <div class="clearfix"></div>
                                 <div class="col-lg-12 class-best-chois-txt">nếu hổi đâu là nơi thiên đường nghỉ dưỡng sang chảnh và xa xỉ nhất Việt Nam ,thì có lẻ chưa cần ở - nhưng sẽ có 90%  mọi người sẽ nhắc</div>
                                  <div class="col-lg-12 text-center class-chitiet"><span class="text-center"><a href=""> <i class="fa fa-angle-double-right"></i>chi tiết</a></span></div>
                                 <!--//desc-->
                              </div>
                              <!--//item-->
                             
                              <div class=" featured">
                                 <a href="https://www.hospi.vn/blog/check-in-homestay-sieu-moi-toanh-tai-vung-tau-dep-nhu-tranh" class="col-md-12 col-sm-12 col-xs-12 go-right no-padding">
                                 <img class="img-responsive post-img img-fade" src="https://www.hospi.vn/uploads/images/blog/316097_1488266984_Check-in-Homestay-siêu-mới-toanh-tại-vũng-tàu-đẹp-như-tranh---Hospi-(1).jpg" alt="Check in Homestay siêu mới toanh tại Vũng Tàu đẹp như tranh">
                                   <img class="icon-best-choise" src="<?php echo $theme_url;?>images/icon-bestchoise-big.png ">
                                  <span class="positon-icon-map"><i class="fa fa-map-marker" aria-hidden="true"></i> Đà nẵng<span>
                                 </span></span></a>
                                 <div class="desc col-md-12 col-sm-12 col-xs-12 go-left">
                                    <h4 style="margin-top: 0px;" class="go-text-right purple"><a href="https://www.hospi.vn/blog/check-in-homestay-sieu-moi-toanh-tai-vung-tau-dep-nhu-tranh">Check in Homestay siêu mới toanh tại Vũng Tàu đẹp như tranh</a></h4>
                                              
                                 </div>
                                   <div class="clearfix"></div>
                                 <div class="col-lg-12 class-best-chois-txt">nếu hổi đâu là nơi thiên đường nghỉ dưỡng sang chảnh và xa xỉ nhất Việt Nam ,thì có lẻ chưa cần ở - nhưng sẽ có 90%  mọi người sẽ nhắc</div>
                                  <div class="col-lg-12 text-center class-chitiet"><span class="text-center"><a href=""> <i class="fa fa-angle-double-right"></i>chi tiết</a></span></div>
                                 <!--//desc-->
                              </div>
                              <!--//item-->
                             
                              
                           </div>
                           <!--//content-->
                        </div>
                     </div>

              
                  </div>
                  
               </div>
            </div>