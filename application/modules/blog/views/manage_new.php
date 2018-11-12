<script type="text/javascript">
  $(function(){
    $("#image_default").change(function(){
      var preview_default = $('.default_preview_img');

   preview_default.fadeOut();

    /* html FileRender Api */
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image_default").files[0]);

    oFReader.onload = function (oFREvent) {
      preview_default.attr('src', oFREvent.target.result).fadeIn();

    };

  });
  })

</script>

<script type="text/javascript">
$(function(){
  $(".posttitle").blur(function(){
    var title = $(this).val();
    var postid = $("#postid").val();
    $.post("<?php echo base_url();?>admin/ajaxcalls/createBlogPermalink",{title: title, postid: postid},function(response){
        $(".permalink").val(response);
    });
  })
})
</script>
<div class="container" id="content">
     <form method="post" action="" enctype="multipart/form-data" >
      <!-- content-->
      <?php $validationerrors = validation_errors();
       if(isset($errormsg) || !empty($validationerrors)){  ?>
    <div class="alert alert-danger">
      <i class="fa fa-times-circle"></i>
      <?php
        echo @$errormsg;
        echo $validationerrors; ?>
    </div>
    <?php  } ?>
         <div class="panel panel-default">
                      <ul class="nav nav-tabs nav-justified" role="tablist">
                          <li class="active"><a href="#GENERAL" data-toggle="tab"><?php echo ucfirst($action) == 'Update' ? "Cập nhật" : "Tạo mới";?> bài viết</a></li>
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
                                                <div class="col-md-5">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label">Tiêu đề</label>
                                                          <input class="form-control " type="text" placeholder="Post Title" name="title" value="<?php echo  @$pdata[0]->post_title;?>">
                                                      </div>
                                                </div>
                                              
                                                <div class="col-md-6">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label">Permalink : <?php echo base_url();?>/blog</label>

                                                         <input class="form-control " type="text" placeholder="Permalink" name="slug" value="<?php echo  @$pdata[0]->post_slug;?>">

                                                  
                                                      </div>
                                                </div>
                                               <div class="clearfix"></div>

                                                    <div class="col-md-12">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label">Nội dung bài viết</label>
                                                           <?php $this->ckeditor->editor('desc', @$pdata[0]->post_desc, $ckconfig,'desc'); ?>
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
<!--                                               <form role="form">
 -->                                            
                                             
                                                <div class="col-md-4">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label">Trạng thái</label>
                                                            <select data-placeholder="Select" name="status" class="form-control" tabindex="2">
                                                              <option value="Yes" <?php if(@$pdata[0]->post_status == "Yes"){ echo "selected";} ?> >Hiển thị</option>
                                                              <option value="No" <?php if(@$pdata[0]->post_status == "No"){ echo "selected";} ?>>Ẩn</option>
                                                            </select>
                                                      </div>
                                                </div>
                                                  <div class="col-md-4">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label">Danh mục</label>
                                                            <select class="form-control" name="category" >
                                                                <option value="">-Chọn-</option>
                                                                 <?php foreach($categories as $cat){ ?>
                                                                   <option value="<?php echo $cat->cat_id;?>" <?php if(@$pdata[0]->post_category == $cat->cat_id){ echo "selected"; } ?> > <?php echo $cat->cat_name;?> </option>
                                                                 <?php } ?>                                                      
                                                             </select>
                                                       
                                                  
                                                      </div>
                                                </div>
                                                  <div class="col-md-4">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label"></label>
                                                          
                                                            <select class="form-control">
                                                              <option>Chọn danh muc hiện thị</option>
                                                            </select>
                                                       
                                                  
                                                      </div>
                                                </div>
                                                <div class="clearfix"></div>
                                               
                                              
                                                <div class="clearfix"></div>
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                          <label for="select-standard" class="control-label">Bài viết liên quan</label>
                                                          <select multiple class="chosen-multi-select" name="relatedposts[]">
                                                          <?php if(!empty($all_posts)){
                                                                foreach($all_posts as $p):
                                                              ?>
                                                            <option value="<?php echo $p->post_id;?>"  <?php if(in_array($p->post_id,$related_selected)){ echo "selected"; } ?> ><?php echo $p->post_title;?></option>
                                                            <?php endforeach; } ?>

                                                            </select>
<!--                                                          <input type="text" class="form-control" name="">
 -->                                                  
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="select-standard" class="control-label">bạn đang quan tâm</label>
                                                          
                                                            <select class="form-control">
                                                              <option>Không chọn</option>
                                                            </select>
                                                       
                                                  
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="select-standard" class="control-label">Chia sẽ kinh nghiệm</label>
                                                          
                                                            <select class="form-control">
                                                              <option>Không chọn</option>
                                                            </select>
                                                       
                                                  
                                                      </div>
                                                </div>
                                                   <div class="col-md-6" style="padding-left: 60px;">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label">Ảnh đại diện</label>
                                                           <input  type="file" name="defaultphoto" class="form-control" id="image_default" >

                                                     <?php if(!empty($pdata[0]->post_img)){ ?>
                                                        <img src="<?php echo PT_BLOG_IMAGES.$pdata[0]->post_img; ?>" style="width: 250px" />
                                                     <?php   }else{  ?>
                                                        <img src="<?php echo PT_BLANK; ?>" style="width: 250px" />
                                                     <?php  } ?>
                                                        </div>
                                                  
                                                      </div>
                                                       
                                               
                                      
                                                
<!--                                               </form>
 -->                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h3 class="panel-title">Quảng cáo</h3>
                                              
                                            </div>
                                            <div class="panel-body">
                                              <form role="form" class="form-horizontal">
                                            
                                             
                                                <div class="col-md-12">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label col-md-2 text-left">Khách sạn</label>
                                                             <div class="col-md-2">
                                                                 <select class="form-control">
                                                              <option value="0">Hiển thị</option>
                                                              <option value="1">Ẩn</option>
                                                            </select>
                                                              </div>
                                                            <div class="col-md-6">
                                                                      <input type="text" class="form-control" name="">
                                                                    </div>
                                                             
                                                               <div class="col-md-2">
                                                                     <label for="select-standard" class="control-label font-weight-unset" style="font-size: 12px;">(xuất hiện giữa bài viết)</label>
                                                                    
                                                              </div>
                                                            </div>
                                                </div>
                                                 <div class="col-md-12">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label col-md-2 text-left">Combo</label>
                                                            <div class="col-md-2">
                                                          <select class="form-control">
                                                             <option value="0">Hiển thị</option>
                                                              <option value="1">Ẩn</option>
                                                          </select>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <input type="text" class="form-control" name="">
                                                      </div>
                                                      <div class="col-md-2">
                                                          <label for="select-standard" class="control-label font-weight-unset" style="font-size: 12px;">(xuất hiện cuối bài viết)</label>
                                                                    
                                                      </div>
                                                  
                                                      </div>
                                                    
                                                </div>
                                              
                                                      <div class="clearfix"></div>
                                                      
                                                       
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h3 class="panel-title">Từ khóa</h3>
                                              
                                            </div>
                                            <div class="panel-body form-horizontal">
<!--                                               <form role="form" class="form-horizontal">
 -->                                            
                                             
                                                <div class="col-md-12">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label col-md-2 text-left">Từ khóa tìm kiếm</label>
                                                           <div class="col-md-10">
                                                          <input class="form-control" type="text" name="keywords" value="<?php echo @$pdata[0]->post_meta_keywords; ?>" placeholder="Keywords">

                                                        </div>
                                                  
                                                      </div>
                                                </div>
                                                 <div class="col-md-12">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label col-md-2 text-left">Mô tả từ khóa bài viết</label>
                                                           <div class="col-md-3">
                                                          <input class="form-control" type="text" name="metadesc" value="<?php echo @$pdata[0]->post_meta_desc; ?>" placeholder="Description">
                                                        </div>
                                                  
                                                      </div>
                                                </div>
                                              
                                                      <div class="clearfix"></div>
                                                      <div class="col-md-12 text-center">
                                                         <input type="hidden" name="action" value="<?php echo $action;?>" />
                                                          <input type="hidden" id="postid" name="postid" value="<?php echo @$pdata[0]->post_id;?>" />
                                                          <input type="hidden" name="defimg" value="<?php echo @$pdata[0]->post_img; ?>" /> 
                                                          <button type="submit" style="background: #660033;border: 1px solid white" class="btn btn-primary">Đăng Bài</button>
                                                      </div>
                                                       
                                            </div>
                                          </div>
                                        </div>

          </div>
      <!-- end-->

    </div>
                                
                              </div>
                              <div class="tab-pane wow fadeIn animated" id="FACILITIES">
                                 <?php foreach($languages as $lang => $val){ if($lang != "vi"){ @$trans = getBackBlogTranslation($lang,$pdata[0]->post_id);  ?>
                    <div class="panel panel-default">
                        <div class="panel-heading"><img src="<?php echo PT_LANGUAGE_IMAGES.$lang.".png"?>" height="20" alt="" /> <?php echo $val['name']; ?></div>
                        <div class="panel-body">
                            <div class="row form-group">
                                <label class="col-md-2 control-label text-left">Tiêu đề</label>
                                <div class="col-md-4">
                                    <input name='<?php echo "translated[$lang][title]"; ?>' type="text" placeholder="Post Title" class="form-control" value="<?php echo @$trans[0]->trans_title;?>" />
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-md-2 control-label text-left">Nội dung</label>
                                <div class="col-md-10">
                                 <?php $this->ckeditor->editor("translated[$lang][desc]", @$trans[0]->trans_desc, $ckconfig,"translated[$lang][desc]"); ?>

                                </div>
                            </div>

                            <hr>


                            <div class="row form-group">
                                <label class="col-md-2 control-label text-left">Meta Keywords</label>
                                <div class="col-md-6">
                                    <textarea name='<?php echo "translated[$lang][keywords]"; ?>' placeholder="Keywords" class="form-control" id="" cols="30" rows="2"><?php echo @$trans[0]->trans_keywords;?></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-md-2 control-label text-left">Meta Description</label>
                                <div class="col-md-6">
                                    <textarea name='<?php echo "translated[$lang][metadesc]"; ?>' placeholder="Description" class="form-control" id="" cols="30" rows="4"><?php echo @$trans[0]->trans_meta_desc;?></textarea>
                                </div>
                            </div>


                        </div>
                    </div>
                    <?php } } ?>
                                
                              </div>
                          </div>
                      </div>
                </div>

     
       </form>

</div>