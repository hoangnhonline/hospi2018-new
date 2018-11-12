<div class="container" id="content">
      <!-- content-->
         <div class="panel panel-default">
                      <ul class="nav nav-tabs nav-justified" role="tablist">
                          <li class="active"><a href="#GENERAL" data-toggle="tab" aria-expanded="true">Tạo bài viết</a></li>
                          <li class=""><a href="#FACILITIES" data-toggle="tab" aria-expanded="false">Dịch</a></li>
                          
                        
                      </ul>
                      <div class="panel-body">
                          <div class="tab-content ">
                              <div class="tab-pane wow fadeIn animated active" id="GENERAL">
                                 <div class="row">
        <div>
                                        <div class="col-md-12">
                                          <div class="panel panel-default">
                                           
                                            <div class="panel-body">
                                           
                                              <form role="form">
                                                <div class="col-md-5">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label">Tiêu đề</label>
                                                         
                                                             <input type="text" name="" class="form-control" placeholder="post Title">
                                                      </div>
                                                </div>
                                              
                                                <div class="col-md-6">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label">Permalink : https://hospi.vn/blog</label>
                                                           
                                                          <input type="text" name="" class="form-control" placeholder="Permalink">
                                                       
                                                  
                                                      </div>
                                                </div>
                                               <div class="clearfix"></div>

                                                    <div class="col-md-6">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label">Video</label>
                                                           
                                                          <div class="icheckbox_square-grey checked" style="position: relative;"><input type="checkbox" id="video-check" checked="checked" value="0" name="option" class="form-control checkboxcls showoption" style="position: absolute; visibility: hidden;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                                       
                                                  
                                                      </div>
                                                      <div id="content-video">
                                                          <div class="form-group">
                                                            <label for="select-standard" class="control-label">Link video</label>
                                                             
                                                            <input type="text" name="" class="form-control" placeholder="video">
                                                        </div>
                                                         <div class="form-group">
                                                            <label for="select-standard" class="control-label">Mô tả</label>
                                                             <textarea class="form-control" cols="4" rows="4"></textarea>
                                                            
                                                        </div>
                                                      </div>
                                                </div>
                                                <div class="col-md-6" id="education-box">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label">Slide Ảnh</label>
                                                           
                                                          <div class="icheckbox_square-grey" style="position: relative;"><input type="checkbox" id="slide-check" name="option" value="1" class="form-control checkboxcls showoption" style="position: absolute; visibility: hidden;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                                       
                                                  
                                                      </div>
                                                      <div id="content-slide" class="clonedEducation" style="display: none">
                                                         <div class="form-group">
                                                            <label for="select-standard" class="control-label">Hình ảnh</label>
                                                             
                                                            <input type="file" name="" id="hinhanh0" class="form-control">
                                                        </div>
                                                         <div class="form-group">
                                                            <label for="select-standard" class="control-label">Mô tả</label>
                                                             <textarea class="form-control" id="mota0" cols="4" rows="4"></textarea>
                                                            
                                                        </div>
                                                        <div class="noo-addable-actions">
                                                        <a class="noo-clone-fields-education pull-left">
                                                            <i class="fa fa-plus-circle text-primary"></i>
                                                            Thêm ảnh
                                                        </a>
                                                        <a class="noo-remove-fields-education pull-right">
                                                            <i class="fa fa-times-circle"></i>
                                                            Xoá
                                                        </a>
                                                      </div>
                                                      <div class="clearfix"></div>
                                                      </div>
                                                </div>
                                                  
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h3 class="panel-title">Cài đặt bài viết</h3>
                                              
                                            </div>
                                            <div class="panel-body">
                                              <form action="" method="POST">
      <label>Widget Name</label> <input type="text" class="form-control" name="title" value="<?php echo $details[0]->widget_name;?>" />
      <br>
      
      <label>Show on page</label>
      <select id="position" name="position" class="chosen-select">
                <option value="">Select...</option>
                <option value="Homepage" <?php makeSelected("Homepage", @$details[0]->widget_location); ?> >Home page</option>
                <option value="Tourpage" <?php makeSelected("Tourpage", @$details[0]->widget_location); ?> >Tour page</option>
                <option value="Honeymoon" <?php makeSelected("Honeymoon", @$details[0]->widget_location); ?> >Honeymoon page</option>
                <option value="Offer" <?php makeSelected("Offer", @$details[0]->widget_location); ?> >Offer page</option>
                <option value="Blog" <?php makeSelected("Blog", @$details[0]->widget_location); ?> >Blog page</option>
                <option value="Advert" <?php makeSelected("Advert", @$details[0]->widget_location); ?> >Hotel Search result</option>
            </select>
      <br><br>
      <div class="clearfix"></div>
      <div id="city" class="panel panel-default" style="display:none">
            <div class="panel-heading">Used with 'Hotel Search result' option</div>
            <div class="panel-body">
                
      <label>Show on specific city</label>
            <select name="widtitle" class="chosen-select">
                <option value="">Select...</option>
                <?php foreach($locations as $loc){ ?>
                <option value="<?php echo $loc->id; ?>" <?php makeSelected(@$loc->id, @$details[0]->widget_title); ?> ><?php echo $loc->location;?></option>
                <?php } ?>
              
            </select>
      <span class="help-block">Select city to show</span>
      
      </div>
      </div><br>
      <label>Widget Status</label>  

                      <select data-placeholder="Select" name="status" class="form-control" tabindex="2">
                        <option value="Yes" <?php if($details[0]->widget_status == "Yes"){ echo "selected";} ?> >Enable</option>
                        <option value="No" <?php if($details[0]->widget_status == "No"){ echo "selected";} ?>>Disable</option>
                      </select>
            
      <br>
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Widget Content</strong></div>
        <?php $this->ckeditor->editor('widgetbody', $details[0]->widget_content, $ckconfig,'widgetbody'); ?>
      </div>
      <input type="hidden" id="pageid" name="widgetid" value="<?php echo $widgetid;?>" />
      <input type="hidden" name="action" value="<?php echo $action; ?>" />
      <button type="submit" class="btn btn-primary" > <?php echo ucfirst($action);?> </button>
    </form>
    
                                              <form role="form" class="form-horizontal">
                                            
                                             
                                                <div class="col-md-4">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label col-md-4">Trạng thái</label>
                                                           <div class="col-md-8">
                                                            <select class="form-control">
                                                              <option>Hiện thị</option>
                                                            </select>
                                                        </div>
                                                  
                                                      </div>
                                                </div>
                                                  <div class="col-md-4">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label col-md-4">Danh mục</label>
                                                           <div class="col-md-8">
                                                            <select class="form-control">
                                                              <option>Ảnh &amp; Video</option>
                                                            </select>
                                                        </div>
                                                  
                                                      </div>
                                                </div>
                                                  <div class="col-md-4">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label col-md-4"></label>
                                                           <div class="col-md-8">
                                                            <select class="form-control">
                                                              <option>Chọn danh muc hiện thị</option>
                                                            </select>
                                                        </div>
                                                  
                                                      </div>
                                                </div>
                                                <div class="clearfix"></div>
                                               
                                              
                                                <div class="clearfix"></div>
                                                   <div class="col-md-6" style="padding-left: 60px;">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label">Ảnh đại diện</label>
                                                          <input type="file" name="" class="form-control">
                                                          <img src="/assets/img/no-img.png" style="width: 250px">
                                                         
                                                           
                                                        </div>
                                                  
                                                      </div>
                                                       
                                               
                                      
                                                
                                              </form>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-12">
                                          <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h3 class="panel-title">Từ khóa</h3>
                                              
                                            </div>
                                            <div class="panel-body">
                                              <form role="form" class="form-horizontal">
                                            
                                             
                                                <div class="col-md-12">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label col-md-3">Từ khóa tìm kiếm</label>
                                                           <div class="col-md-9">
                                                          <input type="text" class="form-control" name="">
                                                        </div>
                                                  
                                                      </div>
                                                </div>
                                                 <div class="col-md-12">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label col-md-3">Mô tả từ khóa bài viết</label>
                                                           <div class="col-md-9">
                                                          <input type="text" class="form-control" name="">
                                                        </div>
                                                  
                                                      </div>
                                                </div>
                                              
                                                      <div class="clearfix"></div>
                                                      <div class="col-md-12 text-center">
                                                       <button type="button" style="background: #660033;border: 1px solid white" class="btn btn-primary">Đăng Bài</button>
                                                      </div>
                                                       
                                              </form>
                                            </div>
                                          </div>
                                        </div>

          </div>
      <!-- end-->

    </div>
                                
                              </div>
                              <div class="tab-pane wow fadeIn animated" id="FACILITIES">
                                okmen aa
                                
                              </div>
                          </div>
                      </div>
                </div>

     
     
</div>