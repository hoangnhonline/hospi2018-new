<div class="container" id="content">
      
      <!-- content-->
 
         <div class="panel panel-default col-md-12">
                      <ul class="nav nav-tabs nav-justified" role="tablist">
                          <li class="active"><a href="#thongtinchung" class="text-left" data-toggle="tab" aria-expanded="true">Thông tin chung</a></li>
                          <li class=""><a href="#dieukien" class="text-left" data-toggle="tab" aria-expanded="false">Điều kiện</a></li>
                          <li class=""><a href="#dich" class="text-left" data-toggle="tab" aria-expanded="false">Dịch</a></li>
                        
                      </ul>
                      <div class="panel-body">
                          <div class="tab-content ">
                              <div class="tab-pane wow fadeIn animated active" id="thongtinchung">
                                 <div class="row">
                                <div>
                                        <div class="col-md-12">
                                          <div class="panel panel-default">
                                           
                                            <div class="panel-body" style="padding-top: 0px">
                                           
                                              <form action="" method="POST" role="form" class="form-horizontal">
                                            
                                              <div class="col-md-6">
                                                   <div class="form-group">
                                                          <label for="select-standard" class="control-label col-md-4 font-weight-unset text-left">Trạng thái</label>
                                                          <div class="col-md-8">
                                                            <!--  <div class="select2-container form-control chosen-select" id="s2id_autogen1" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Hiện thị</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div> -->

                                                             <!-- <select class="form-control chosen-select select2-offscreen" tabindex="-1">
                                                             <option>Hiện thị</option>
                                                           </select> -->
                                                           <select data-placeholder="Select" class="form-control chosen-select select2-offscreen" name="offerstatus">
                                                              <option value="Yes" <?php if (@$offerdata[0]->offer_status == "Yes") {
                                                                  echo "selected";
                                                              } ?> >Hiển thị</option>
                                                              <option value="No" <?php if (@$offerdata[0]->offer_status == "No") { echo "selected";
                                                              } ?> >Ẩn</option>

                                                          </select>
                                                          </div>
                                                          
                                                      </div>
                                                       
                                                      
                                                </div>
                                                  <div class="col-md-6">
                                                   <div class="form-group ">
                                                          <label for="select-standard" class="control-label font-weight-unset col-md-4">Yêu thích</label>
                                                           <div class="col-md-8">
                                                          <!--  <div class="select2-container form-control chosen-select" id="s2id_autogen3" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Có</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen4"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div> -->

                                                           <select class="form-control chosen-select select2-offscreen" name="is_like">
                                                             <option value="1" <?php if (@$offerdata[0]->is_like == "1") {
                                                                  echo "selected";
                                                              } ?> >Có</option>
                                                              <option value="0" <?php if (@$offerdata[0]->is_like == "0") { echo "selected";
                                                              } ?> >Không</option>
                                                           </select>
                                                         </div>
                                                      </div>
                                                       
                                                      
                                                </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-12">
                                                 <div class="form-group">
                                                     <label for="username0" class="font-weight-unset col-md-2">Tên honeymoon</label>
                                                   <div class="col-md-9">
                                                      <input name="offertitle" type="text" placeholder="" class="form-control" value="<?php echo @$offerdata[0]->offer_title; ?>" />
                                                   </div>
                                                    
                                                  </div>
                                              </div>
                                               <div class="clearfix"></div>
                                               <div class="col-md-12">
                                                 <div class="form-group">
                                                     <label for="username0" class=" font-weight-unset col-md-2">Tên khách sạn</label>
                                                   <div class="col-md-9">
                                                     <!-- <div class="select2-container form-control chosen-select" id="s2id_autogen5" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Chọn khách sạn</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen6"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div> -->

                                                    <!--  <select class="form-control chosen-select select2-offscreen" tabindex="-1">
                                                         <option>Chọn khách sạn</option>
                                                     </select> -->

                                                     <select  name="relatedhotels[]"   class="form-control chosen-select select2-offscreen" required>
                                                        <option value="">-Chọn khách sạn-</option>
                                                           
                                                          <?php foreach ($hotels as $hotel) { ?>
                                                             <option value="<?php echo $hotel->hotel_id; ?>"   <?php makeSelected(@$hotel->hotel_id, @$offerdata[0]->hotel_related); ?>  >
                                                            <?php echo $hotel->hotel_title; ?>
                                                             </option>
                                                        <?php } ?>
                                                    </select>
                                                   </div>
                                                    
                                                  </div>
                                              </div>
                                               <div class="clearfix"></div>
                                              <div class="col-md-12">
                                                 <div class="form-group">
                                                     <label for="username0" class="font-weight-unset col-md-2">Tên Vị trí</label>
                                                   <div class="col-md-9">
                                                    <!--  <div class="select2-container form-control chosen-select" id="s2id_autogen7" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Chọn thành phố</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen8"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="form-control chosen-select select2-offscreen" tabindex="-1">
                                                       <option>Chọn thành phố</option>
                                                     </select> -->

                                                        <select class="form-control chosen-select select2-offscreen" name="offercity">
                                                                  <option value="">-Chọn-</option>
                                                                   <?php foreach ($locations as $loc) { ?>
                                                        <option value="<?php echo $loc->id; ?>" <?php makeSelected(@$loc->id, @$offerdata[0]->offer_city); ?> ><?php echo $loc->location; ?></option>
                                                            <?php } ?>
                                                                
                                                              </select>
                                                   </div>
                                                    
                                                  </div>
                                              </div>
                                              <div class="clearfix"></div>
                                              <div class="col-md-12">
                                                 <div class="form-group">
                                                     <label for="username0" class="font-weight-unset col-md-2">Áp dụng</label>
                                                   <div class="col-md-4">
                                                   <input name="ofrom" type="text" placeholder="Từ ngày" class="form-control dpd3" value="<?php echo @$ofrom; ?>" />

                                                   </div>
                                                     <div class="col-md-4">
                                                     <input name="oto" type="text" placeholder="Đến ngày" class="form-control dpd4" value="<?php echo @$oto; ?>" />
                                                   </div>
                                                  </div>
                                              </div>
                                          
                                              <div class="clearfix"></div>
                                              <div class="col-md-12">
                                                 <div class="form-group">
                                                     <label for="username0" class=" font-weight-unset col-md-2">Mô tả</label>
                                                   <div class="col-md-9">
                                                         <?php $this->ckeditor->editor('offerdesc', @$offerdata[0]->offer_desc, $ckconfig, 'offerdesc'); ?>

                                                   </div>
                                                   
                                                  </div>
                                              </div>
                                           <div class="clearfix"></div>
                                                <div class="col-md-5">
                                                 <div class="form-group">
                                                     <label for="username0" class=" font-weight-unset col-md-5">Giá honeymoom</label>
                                                   <div class="col-md-7" style="padding-left: 7px">
   <input name="offerprice" type="text" placeholder="" class="form-control number" value="<?php echo @$offerdata[0]->offer_price; ?>" />                                                   </div>
                                                    
                                                  </div>
                                              </div>
                                                <div class="col-md-5">
                                                 <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset col-md-4">Số khách</label>
                                                   <div class="col-md-8">
                                                     <input type="text" class="form-control" name="">
                                                   </div>
                                                    
                                                  </div>
                                              </div>   
                                               <div class="col-md-2">
                                                 <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset col-md-1"></label>
                                                   <div class="col-md-11">
                                                     <div class="icheckbox_square-grey" style="position: relative;"><input type="checkbox" class="form-control checkboxcls" name="" style="position: absolute; visibility: hidden;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Hiện thị giá
                                                   </div>
                                                    
                                                  </div>
                                              </div>  
                                               <div class="clearfix"></div>
                                                <div class="col-md-12">

                                                  <div class="col-md-2">
                                                    
                                                   <div class="form-group">
                                                     <label for="username0" class="font-weight-unset col-md-12">Giá phụ thu</label>
                                                    
                                                  </div>
                                                  </div>
                                                  <div class="col-md-10" style="margin-left: -10px;" id="education-box">
                                                    <div class="clonedEducation">
                                                       <div class="col-md-4">
                                                       <div class="form-group">
                                                           <label for="username0" class=" control-label font-weight-unset">Loại phụ thu</label>
                                                         
                                                           <input type="text" class="form-control" name="">
                                                         
                                                          
                                                        </div>
                                                    </div>
                                                      <div class="col-md-4">
                                                       <div class="form-group" style="margin-left: 0px">
                                                           <label for="username0" class=" control-label font-weight-unset">Giá</label>
                                                         
                                                           <input type="text" class="form-control" name="">
                                                         
                                                          
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4" style="margin-top: 25px;">
                                                       <div class="form-group" style="margin-left: 0px">
                                                           <label for="username0" class=" control-label font-weight-unset col-md-1"></label>
                                                         <div class="col-md-11">
                                                           <div class="icheckbox_square-grey" style="position: relative;"><input type="checkbox" class="form-control checkboxcls" name="" style="position: absolute; visibility: hidden;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Hiện thị giá
                                                         </div>
                                                          
                                                        </div>
                                                    </div> 
                                                    <div class="clearfix"></div>
                                                         <div class="noo-addable-actions">
                                                        <a class="noo-clone-fields-education pull-left">
                                                            <i class="fa fa-plus-circle text-primary"></i>
                                                            Thêm giá phụ thu
                                                        </a>
                                                        <a class="noo-remove-fields-education pull-right">
                                                            <i class="fa fa-times-circle"></i>
                                                            Xoá
                                                        </a>
                                                      </div>
                                                    </div>
                                                     <div class="clearfix"></div>




                                                  </div>
                                                 
                                              </div>  
                                              <div class="col-md-12 text-center">
                                                
            <input type="hidden" id="slug" value="<?php echo @$offerdata[0]->offer_slug; ?>" />
            <input type="hidden" name="submittype" value="<?php echo $submittype; ?>" />
            <input type="hidden" name="offerid" value="<?php echo @$offerid; ?>" />
            <input type="hidden" name="offer_type" value="3">
            <button class="btn-tim submitfrm" style="padding-left: 15px;padding-right: 15px;padding-top: 5px;padding-bottom: 5px;margin-top: 40px;" id="<?php echo $submittype; ?>">Lưu</button>
                                              </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                            <!-- end-->

                          </div>
                                
                              </div>
                              <div class="tab-pane wow fadeIn animated" id="dieukien">
                                <form class="form-horizontal">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                           <label for="username0" class=" control-label font-weight-unset col-md-2">Điều kiện sử dụng</label>
                                           <div class="col-md-10">
                                              <textarea class="form-control" cols="4" rows="8"></textarea>
                                           </div>
                                        
                                          
                                        
                                          
                                        </div>
                                         <div class="form-group">
                                           <label for="username0" class=" control-label font-weight-unset col-md-2">Điều kiện hủy</label>
                                           <div class="col-md-10">
                                              <textarea class="form-control" cols="4" rows="8"></textarea>
                                           </div>
                                        
                                          
                                        
                                          
                                        </div>
                                  </div>
                                </form>
                                
                              </div>
                          </div>
                      </div>

                     
                      <!-- end -->


                </div>
              
                <!-- eq 4-->

                <div class="clearfix"></div>
</div>

