<div class="container" id="content">
      <!-- content-->
        <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">

       <div class="row">
        <div>
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Vị trí</h3>
                  
                </div>
                <div class="panel-body">

                    <div class="col-md-6">
                           <div class="form-group">
                              <label for="select-standard" class="control-label col-md-3">Quốc gia</label>
                              <div class="col-md-9">
                                 <select name="country" class="form-control chosen-select select2-offscreen" tabindex="-1" id="" required>
                                    <option value="">Quốc gia</option>
                                    <?php foreach($countries as $country){ ?>
                                    <option value="<?php echo $country->short_name; ?>" <?php makeSelected(@$location->country, $country->short_name); ?> ><?php echo $country->short_name; ?></option>
                                    <?php } ?>
                                    
                                  </select>
                              </div>
                             
                      
                          </div>
                    </div>
                   <div class="clearfix"></div>
                    <div class="col-md-6">
                           <div class="form-group">
                              <label for="select-standard" class="control-label col-md-3">Vị Trí</label>
                               <div class="col-md-9">
                              <input type="text" name="city" class="form-control Places"  id="location"  placeholder="Location" value="<?php echo @$location->city;?>" required=""  autocomplete="off">
                            </div>
                      
                          </div>
                    </div>
                    <div class="col-md-3">
                           <div class="form-group">
                              <label for="select-standard" class="control-label col-md-4">Kinh độ</label>
                              <div class="col-md-8">
                                <input type="text" name="longitude" class="form-control" id="long"  placeholder=""  value="<?php echo @$location->longitude;?>">
                            </div>
                      
                          </div>
                    </div>
                     <div class="col-md-3">
                           <div class="form-group">
                              <label for="select-standard" class="control-label col-md-4">Vĩ độ</label>
                              <div class="col-md-8">
                                <input type="text" name="latitude" class="form-control" id="lat"  placeholder="" value="<?php echo @$location->latitude;?>">
                            </div>
                      
                          </div>
                    </div>
                       <div class="col-md-6">
                           <div class="form-group">
                              <label for="select-standard" class="control-label col-md-3">Trạng thái</label>
                              <div class="col-md-9">
                               <select  name="status" class="form-control chosen-select select2-offscreen" tabindex="-1">
                                <option value="Yes" <?php makeSelected(@$location->status,"Yes"); ?> > Hiển thị </option>
                                  <option value="No" <?php  makeSelected(@$location->status,"No"); ?> > Ẩn </option>
                               </select> 

                            </div>
                      
                          </div>
                    </div>
          
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">khách sạn</h3>
                  
                </div>
                <div class="panel-body">
<!--                   <form role="form" class="form-horizontal">
 -->                
                 
                    <div class="col-md-6">
                           <div class="form-group">
                              <label for="select-standard" class="control-label col-md-3">khu Vực</label>
                               <div class="col-md-9">
                              <input type="text" name="near" id="near" class="form-control" placeholder="Nhập tên khu vực cách nhau bằng dấu ,"  value="<?php echo @$location->near;?>" >
                            </div>
                          </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                           <div class="form-group">
                              <label for="select-standard" class="control-label col-md-5">Giá khách sạn/trung bình</label>
                              <div class="col-md-7">
                                <input type="text" name="best_price" class="form-control" id="best_price" placeholder="VNĐ" value="<?php echo @$location->best_price;?>" />

                            </div>
                      
                          </div>
                    </div>
                     <div class="col-md-6 text-left">
                           <div class="form-group text-left">
                              <label for="select-standard" class="control-label col-md-12 text-left font-weight-unset"><i>Show ở trang chủ -&gt;Bạn muốn đặt khách sạn ở đâu</i></label>
                           
                      
                          </div>
                    </div>
                    <div class="clearfix"></div>
                       <div class="col-md-6" style="padding-left: 60px;">
                           <div class="form-group">
                              <label for="select-standard" class="control-label font-weight-unset">Hình top trang khách sạn</label>
                             <input  type="file" name="hotelphoto"  id="image_hotel" >
                                 <?php if(!empty(@$location->hotelimage)){ ?>
                                      <img src="<?php echo PT_LOCATION_IMAGES_THUMBS.$location->hotelimage; ?>" class="img-rounded thumbnail img-responsive default_preview_img" />
                                       <?php   }else{  ?>
                                    <img src="<?php echo PT_BLANK; ?>" class="img-rounded thumbnail img-responsive default_preview_img" />
                                  <?php  } ?>
                                  <img src="/assets/img/no-img.png" style="width: 250px">
                               <span class="help-block">(kích thước 1125 x 147)</span>
                            </div>
                      
                          </div>
                           <div class="col-md-6">
                             <div class="form-group">
                                <label for="select-standard" class="control-label font-weight-unset">Hình honeymoon 
                                    <div class="icheckbox_square-grey" style="position: relative;">
                                      <input type="checkbox" class="checkboxcls" name="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Điểm đến yêu thích
                                </label>
                                    <input type="file" name="">
                                    <img src="/assets/img/no-img.png" style="width: 250px">
                                    <span class="help-block">(kích thước 600x600)</span>
                               
                              </div>
                      
                           </div>
                   
          
                    
<!--                   </form>
 -->                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Tour du lịch</h3>
                  
                </div>
                <div class="panel-body">
<!--                   <form role="form" class="form-horizontal">
 -->                
                 
                    <div class="col-md-12">
                           <div class="form-group">
                              <label for="select-standard" class="control-label col-md-3">Điểm đến yêu thích</label>
                               <div class="col-md-4">
                              <div class="select2-container form-control chosen-select" id="s2id_autogen5" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Hiện thị</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen6"></div><select class="form-control chosen-select select2-offscreen" tabindex="-1">
                                <option value="0">Hiện thị</option>
                              </select> 
                            </div>
                      
                          </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                           <div class="form-group">
                              <label for="select-standard" class="control-label col-md-3">Mô tả ngắn điểm đến yêu thích</label>
                              <div class="col-md-9">
                                <textarea class="form-control" cols="4" rows="5"></textarea>
                                
                            </div>
                      
                          </div>
                    </div>
                    <div class="col-md-3"></div>
                   
                       <div class="col-md-6" style="padding-left: 30px">
                           <div class="form-group">
                              <label for="select-standard" class="control-label font-weight-unset">Hình điểm đến</label>
                              <input type="file" name="defaultphoto" class="btn btn-default" id="image_default" >
                              <?php if(!empty(@$location->image)){ ?>
                                      <img src="<?php echo PT_LOCATION_IMAGES_THUMBS.$location->image; ?>" class="img-rounded thumbnail img-responsive default_preview_img" />
                                       <?php   }else{  ?>
                                    <img src="<?php echo PT_BLANK; ?>" class="img-rounded thumbnail img-responsive default_preview_img" />
                                           <?php  } ?>
                              <img src="/assets/img/no-img.png" style="width: 250px">
                               <span class="help-block">(kích thước 1125 x 147)</span>
                            </div>
                      
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-12 text-center">
                            <input type="hidden" name="submittype" value="<?php echo $submittype; ?>">
                            <input type="hidden" name="locationid" value="<?php echo $id; ?>">
<!--                               <button type="submit" class="btn btn-primary">Submit</button>
 -->                           <button type="submit" style="background: #660033" class="btn btn-primary">Cập nhật</button>
                          </div>
                           
<!--                   </form>
 -->                </div>
              </div>
            </div>

          </div>
      <!-- end-->

    </div>
     </form>
</div>


<!-- google places -->
<script type='text/javascript' src="//maps.googleapis.com/maps/api/js?key=<?php echo $appSettings->mapApi; ?>&libraries=places"></script>
<script type='text/javascript'>//<![CDATA[
  $(window).load(function(){
   var autocomplete
  getPlace_dynamic();
  function getPlace_dynamic() {
  var input = document.getElementsByClassName('Places');
  var location = $("#location").val(); 
  for (i = 0; i < input.length; i++) {
  autocomplete = new google.maps.places.Autocomplete(input[i]);

  }

  google.maps.event.addListener(autocomplete, 'place_changed', function() {

      var place = autocomplete.getPlace();
       $('#lat').val(place.geometry.location.lat());
       $('#long').val(place.geometry.location.lng());

    });

  }

  });//]]>

</script>