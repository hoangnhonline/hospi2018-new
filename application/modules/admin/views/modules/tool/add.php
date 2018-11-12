<div class="container" id="content">
      <!-- content-->
       <div class="row">
        <div>
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Thêm Tiện Ích</h3>
                  
                </div>
                <div class="panel-body">
          
       <form role="form" action="" method="POST">
                    <div class="col-md-3">
                           <div class="form-group">
                              <label for="select-standard" class="control-label">Trạng Thái</label>
                              
                              <select data-placeholder="Select" name="status" class="form-control chosen-select select2-offscreen" tabindex="-1">
                                <option value="Yes" <?php if($details[0]->widget_status == "Yes"){ echo "selected";} ?> >Hiển thị</option>
                                <option value="No" <?php if($details[0]->widget_status == "No"){ echo "selected";} ?>>Ẩn</option>
                              </select>
                      
                          </div>
                    </div>
                   <div class="clearfix"></div>
                    <div class="col-md-6">
                           <div class="form-group">
                              <label for="select-standard" class="control-label">Tên Giao Diện</label>
                              
                              <input type="text" name="title" class="form-control">

                      
                          </div>
                    </div>
                     <div class="clearfix"></div>
                    <div class="col-md-3">
                           <div class="form-group">
                              <label for="select-standard" class="control-label">Vị trí giao diện</label>
                                <select  name="position" class="form-control chosen-select select2-offscreen" id="vitrigiaodien" tabindex="-1">
                                  <option value="">Select...</option>
                                  <option value="Homepage" <?php makeSelected("Homepage", @$details[0]->widget_location); ?> >Home page</option>
                                  <option value="Tourpage" <?php makeSelected("Tourpage", @$details[0]->widget_location); ?> >Tour page</option>
                                  <option value="Honeymoon" <?php makeSelected("Honeymoon", @$details[0]->widget_location); ?> >Honeymoon page</option>
                                  <option value="Offer" <?php makeSelected("Offer", @$details[0]->widget_location); ?> >Offer page</option>
                                  <option value="Blog" <?php makeSelected("Blog", @$details[0]->widget_location); ?> >Blog page</option>
                                  <option value="Advert" <?php makeSelected("Advert", @$details[0]->widget_location); ?> >Hotel Search result</option>
                              </select>
                      
                          </div>
                    </div>

                     <div class="col-md-3">
                           <div class="form-group">
                              <label for="select-standard" class="control-label ">Mục con vị trí</label>
                             
                                <select name="widtitle" class="form-control chosen-select select2-offscreen"  id="muconvitri" tabindex="-1">
                                    <option value="">Select...</option>
                                    <?php foreach($locations as $loc){ ?>
                                    <option value="<?php echo $loc->id; ?>" <?php makeSelected(@$loc->id, @$details[0]->widget_title); ?> ><?php echo $loc->location;?></option>
                                    <?php } ?>
                                  
                                </select>
                      
                          </div>
                    </div>
                      <div class="clearfix"></div>

                       <div class="col-md-12">
                           <div class="form-group">
                              <label for="select-standard" class="control-label">Thêm hình ảnh và đường link</label>
                               <?php $this->ckeditor->editor('widgetbody', $details[0]->widget_content, $ckconfig,'widgetbody'); ?>
                          </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-md-12 text-center" style="margin-top: 40px">
<!--                           <button type="button" style="background: #660033" class="btn btn-primary">Thêm mới</button>
 -->
                          <input type="hidden" id="pageid" name="widgetid" value="<?php echo $widgetid;?>" />
                          <input type="hidden" name="action" value="<?php echo $action; ?>" />
                          <button type="submit" style="background: #660033" class="btn btn-primary" > Thêm mới </button>

                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
            

          </div>
      <!-- end-->

    </div>
</div>