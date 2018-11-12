<script type="text/javascript">
$(document).ready(function(){
    $("#position").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue=="Advert"){
                $("#city").show();
            } else{
                $("#city").hide();
            }
        });
    }).change();
});
</script>
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
                   <form action="" method="POST">
                    <div class="col-md-3">
                           <div class="form-group">
                              <label for="select-standard" class="control-label">Trạng Thái</label>
                          <!--     
                             <div class="select2-container form-control chosen-select" id="s2id_autogen1" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Hiện Thị</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2"></div> -->

                               <select data-placeholder="Select" name="status" class="form-control chosen-select select2-offscreen" tabindex="2">
                              <option value="Yes" <?php if($details[0]->widget_status == "Yes"){ echo "selected";} ?> >Enable</option>
                              <option value="No" <?php if($details[0]->widget_status == "No"){ echo "selected";} ?>>Disable</option>
                            </select>

                          </div>
                    </div>
                   <div class="clearfix"></div>
                    <div class="col-md-6">
                           <div class="form-group">
                              <label for="select-standard" class="control-label">Tên Giao Diện</label>
                              <input type="text" class="form-control" name="title" value="<?php echo $details[0]->widget_name;?>" />

                          </div>
                    </div>
                     <div class="clearfix"></div>
                    <div class="col-md-3">
                           <div class="form-group">
                              <label for="select-standard" class="control-label">Vị trí giao diện</label>
                             <!-- 
                                <div class="select2-container form-control chosen-select" id="s2id_vitrigiaodien" style="width: 100%;">
                                  <a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Trang chủ</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a>
                                  <input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen3"></div> -->

                                <select name="position" class="form-control chosen-select select2-offscreen" id="vitrigiaodien" tabindex="-1">
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
                             <!--   <div class="select2-container form-control chosen-select" id="s2id_muconvitri" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Chọn</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen4"></div>

                               <select class="form-control chosen-select select2-offscreen" id="muconvitri" tabindex="-1">
                                  <option value="0">Chọn</option>
                                </select> -->
                                 <select name="widtitle" class="form-control chosen-select select2-offscreen">
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
                       <input type="hidden" id="pageid" name="widgetid" value="<?php echo $widgetid;?>" />
                       <input type="hidden" name="action" value="<?php echo $action; ?>" />
                          <button type="submit" style="background: #660033" class="btn btn-primary"><?php echo ucfirst($action);?></button>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
            

          </div>
      <!-- end-->

    </div>
</div>