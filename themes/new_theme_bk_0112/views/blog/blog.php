<div class="container margin_60 main-blog">
         <div class="block-adv-blog">
            <a href="#" title="">
            <img src="https://www.hospi.vn<?php echo $theme_url; ?>/assets/img/bg-adv.jpg" style="width: 100%;" alt="">
            </a>
         </div>
         <div class="row">
            <div class="col-md-12 go-right categories-news categories-blog">
               <div class="block-news-anh-video clearfix">
                    <div class="cat-line cat-blue cat-line-black">
                     <ul class="nav nav-tabs nav-tabs-black">
                         <li class="cate-news-black active"><a data-toggle="tab1" href="#diemden"><?php echo  $catname ; ?></a></li>
                        <?php foreach ($subCategoryVos as $key => $cate) {
                           # code...
                          ?>
                         <li class="cate-news-black hidden-xs"><a data-toggle="tab1" href="<?php echo base_url().'blog/category/' .  $cate->cat_slug ?>"><?php echo  $cate->cat_name ?></a></li>

                         <?php } ?>
                         </li>
                          <li class="icon">
                              <a href="https://www.hospi.vn/blog/category/" title="">
                              <img src="https://www.hospi.vn<?php echo $theme_url; ?>/assets/img/view-double.png" alt=""></a>
                        </li>
                    </ul>
                  </div>

                    <div class="tab-content">
                      <div id="diemden" class="tab-pane fade in active">
  
                        <div class="col-lg-9 no-padding-right-mobile no-padding">
                           <div class="listinews col-lg-12 no-padding-left margin-bottom-30 no-margin-bottom-mobile col-xs-12 no-padding-right-mobile no-padding-right">
                            <div class="newshot news-style news-style-blue newshot-blog newshot-blog-details no-padding-right-mobile">
                               <a href="<?php echo $url; ?>" title="<?php echo $title;?>">
                                <h2 style="font-size: 30px;"> <?php echo $title;?></h2>
                               </a>
                                <div class="post-left go-right">
                                     <ul class="go-right">
                                        <li class="view-blog"><i class="fa fa-eye" aria-hidden="true"></i><?php echo $view; ?></li>
                                        <li><span class="fb-like" data-href="<?php echo $url; ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></span></li>
                                     </ul>
                                  </div>
                                  <div class="clearfix"></div>
                               <div class="info">
                            
                                  <p class="RTL hidden-xs desc">
                                   <?php echo $title;?></h1>

                                  </p>
                                 
                               </div>
                               <div class="body-news">
                                    <?php echo $desc; ?>
                               </div>
                            </div>
                       
                        </div>
  
                      </div>
                              <?php include('bestchoice_sidebar.php'); ?>

            <!--//secondary-->
                       
                      </div>
                      <div id="dulichbien" class="tab-pane fade">
                       
                       
                     
                      </div>
                      <div id="dulichgiadinh" class="tab-pane fade">
                        
                      </div>
                      <div id="dulichcapdoi" class="tab-pane fade">
                        
                     </div>
            </div>
             
                  
         </div>
             
            </div>
            

         </div>
         <!-- End row-->
      </div>