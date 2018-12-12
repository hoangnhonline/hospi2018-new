<div class="container margin_60 main-blog">
         <div class="block-adv-blog">
            <a href="#" title="">
            <img src="https://www.hospi.vn/themes/default/assets/img/bg-adv.jpg" style="width: 100%;" alt="">
            </a>
         </div>
         <div class="row">
            <div class="col-md-12 go-right categories-news categories-blog">
               <div class="block-news-anh-video clearfix">
                    <div class="cat-line cat-blue cat-line-black">
                     <ul class="nav nav-tabs nav-tabs-black">
                         <li class="cate-news-black active"><a data-toggle="tab1" href="#diemden"><?php echo  $categoryname ?> </a></li>
                         <?php foreach ($subCategoryVos as $key => $cate) {
                           # code...
                          ?>
                         <li class="cate-news-black"><a data-toggle="tab1" href="<?php echo base_url().'blog/category/' .  $cate->cat_slug ?>"><?php echo  $cate->cat_name ?></a></li>
                         <?php } ?>
                          <li class="icon">
                              <a href="https://www.hospi.vn/blog/category/" title="">
                              <img src="https://www.hospi.vn/themes/default/assets/img/view-double.png" alt=""></a>
                        </li>
                    </ul>
                  </div>

                    <div class="tab-content">
                      <div id="diemden" class="tab-pane fade in active">
                         <?php $posts = $allposts['all'] ; //echo "<pre>";print_r($posts);  echo "</pre>"?>

                        <div class="image-top">
                           
                          <?php $first = array_shift($posts);  $bloglib->set_id($first->post_id); $bloglib->post_short_details();?>
                              <img src="<?php echo pt_post_thumbnail($first->post_id); ?>" class="img-responsive">
                              <div class="line-white"></div>
                            <div class="caption">
                              <h2><?php echo $bloglib->title;?></h2>
                            </div>
                           

                        </div>
                        <div class="col-lg-6 no-padding-left margin-top-30 margin-bottom-30 image-top no-padding-right-mobile margin-bottom-15-mobile">
                              <?php $second = array_shift($posts);  $bloglib->set_id($second->post_id); $bloglib->post_short_details();?>

                             <img src="<?php echo pt_post_thumbnail($second->post_id); ?>" class="img-responsive">
                             <div class="line-white-child"></div>
                           <div class="caption-child">
                              <h2><?php echo $bloglib->title;?> </h2>
                            </div>
                         
                        </div>
                        <div class="col-lg-6 no-padding-right margin-top-30 margin-bottom-30 image-top no-padding-left-mobile margin-bottom-15-mobile margin-top-30-mobile">
                             <?php $third = array_shift($posts);   $bloglib->set_id($third->post_id); $bloglib->post_short_details();?>

                          <img src="<?php echo pt_post_thumbnail($third->post_id); ?>" class="img-responsive">
                          <div class="line-white-child"></div>
                           <div class="caption-child">
                              <h2><?php echo $bloglib->title;?></h2>
                            </div>
                        </div>

                        <div class="col-lg-9 col-xs-12 no-padding-left no-padding-right-mobile">
                          <?php if(!empty($allposts['all'])){
                          $i=0;
                           foreach($allposts['all'] as $post):
                            $i++;
                              if($i%2==1) {$position ='left';}else{$position ='right';}
                            $bloglib->set_id($post->post_id);
                            $bloglib->post_short_details();
                            if($i<3){ 
                            ?>

                            <?php }else{?>
                           <div class="listinews col-lg-6 no-padding-<?php echo $position ;?> margin-bottom-30 no-margin-bottom-mobile col-xs-6 no-padding-right-mobile">
                            <div class="newshot news-style news-style-blue newshot-blog img-left">
                               <a href="<?php echo base_url().'blog/'.$post->post_slug;?>" title="<?php echo $bloglib->title;?>"><img src="<?php echo pt_post_thumbnail($post->post_id); ?>" alt="<?php echo $bloglib->title;?>" class="img-responsive"></a>
                               <div class="info">
                                  <a href="https://www.hospi.vn/blog/du-lich-yeu-tan-huong-va-nhan-tien-" title="Du lịch, Yêu , Tận hưởng và Nhận tiền">
                                     <h2><?php echo $bloglib->title;?></h2>
                                  </a>
                                  <p class="RTL hidden-xs"><?php echo character_limiter(strip_tags($bloglib->desc), 120);?>...</p>
                                  <div class="post-left go-right hidden-xs">
                                     <ul class="go-right">
                                        <li><span class="date-create"><?php echo $bloglib->date; ?></span></li>
                                        <li><span class="fb-like" data-href="<?php echo base_url().'blog/'.$post->post_slug;?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></span></li>
                                     </ul>
                                  </div>
                               </div>
                            </div>
                       
                        </div>
                       <?php }
                         $i++; endforeach;  }
                     ?>      
                                 
                      </div>
                    
               <div class="col-md-12 go-right margin-top-15-mobile no-padding visible-xs">            
                <div class="block-pagination">
                    <ul class="pagination"><li class="active"><span>1<!--<span--></span></li><li><a href="javascript:;" data-url="javascript:;">2</a></li><li><a href="javascript:;" data-url="javascript:;">3</a></li><li class="disabled"><span>...</span></li><li><a href="javascript:;" data-url="javascript:;">67</a></li><li><a href="javascript:;" data-url="javascript:;">»</a></li></ul></div>
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
            <div class="container hidden-xs">
               <div class="col-md-12 go-right margin-top-15-mobile">            
                <div class="block-pagination">
                    <ul class="pagination"><li class="active"><span>1<!--<span--></span></li><li><a href="javascript:;" data-url="javascript:;">2</a></li><li><a href="javascript:;" data-url="javascript:;">3</a></li><li class="disabled"><span>...</span></li><li><a href="javascript:;" data-url="javascript:;">67</a></li><li><a href="javascript:;" data-url="javascript:;">»</a></li></ul></div>
                </div>
            </div>
           

            <script type="text/javascript">//<![CDATA[
               $(window).load(function(){
               var tally = new Object();
               var idx;
               
               $.widget("custom.catcomplete", $.ui.autocomplete, {
                   _renderMenu: function(ul, items) {
                       var self = this,currentCategory = "";
                       $.each(items, function(index, item) {
                           if (item.category != currentCategory) {
                               /*ul.append("<li class='ui-autocomplete-category'>" + item.category + "(<span id='autocomplete_"+item.category+"'></span>)</li>");*/
                               ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                               currentCategory = item.category;
                           }
                           if(currentCategory!=''){
                               tally[currentCategory] = (tally[currentCategory]==undefined) ? 1 : tally[currentCategory]+1;}
                           self._renderItem(ul, item);
                           $(ul).append("<span title='" + item.address + "' class='desc'>" + item.desc + " <i class='fa fa-map-marker' aria-hidden='true'></i></span><div style='clearfix'></div>");
               
                       });
                       for(category in tally){
                           $('#autocomplete_'+category).html(tally[category]);
                       };
                   }
               
               });

           
               
               });//]]> 
               
            </script>
         </div>
         <!-- End row-->
      </div>