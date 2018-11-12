
  <?php //var_dump($room_list ) ; die;
       foreach ($model['room_list'] as $i => $value) {
 ?>
      <div class="clonedEducation" id = "div_room_<?php echo $i ?>">
          <div class="col-md-6">
                <div class="form-group">
                  <label for="hotel_city">Loai phong</label>
                  <select onchange ="onSelectRoom(this,<?php echo  $i?>)" class="form-control chosen-select" name = "room_list[<?php echo $i?>][room_id]" id="">
                        <?php foreach ($room_list as $room) { ?> 
                          <option value="<?php echo $room->id; ?>" <?php if( $room->id == $value['room_id']) echo "selected" ;?>> <?php echo $room->title; ?></option>
                        <?php } ?>
                  </select>
               </div>
            </div>
           <div class="col-md-3" style="margin-left: 30px">
             <div class="form-group">
                 <label class=" control-label font-weight-unset">Số lượng phòng</label>
               
                  <input onkeyup ="loadPrice()"  type="number" class="form-control" value="<?php echo $value['room_total']?>" name = "room_list[<?php echo $i?>][room_total]">
              </div>
          </div>
          <div class="clearfix"></div>
            <div class="col-md-4">
            <div class="form-group">
                <label class=" control-label font-weight-unset">Giường phụ</label>
                <input id="extra_bed_show_<?php echo  $i?>" type="text" class="form-control bk-ccc" value="<?php if( $value['extra_bed_price'] >0) {echo number_format($value['extra_bed_price']) ;}else{echo "Không áp dụng";}?>" name="">
                <input id="extra_bed_hid_<?php echo  $i?>" type="hidden"  value="<?php echo $value['extra_bed_price'] ?>" name="room_list[<?php echo $i?>][extra_bed_price]">
            </div>
          </div>
            <div class="col-md-3" style="margin-left: 10px">
            <div class="form-group">
                <label class=" control-label font-weight-unset">Số lượng</label>
                <input onkeyup ="loadPrice()" type="text" class="form-control" value="<?php echo $value['extra_bed']?>" name="room_list[<?php echo $i?>][extra_bed]">
            </div>
          </div>
           <div class="clearfix"></div>
          <div class="noo-addable-actions col-md-9 no-padding" style="margin-top: 5px;margin-bottom: 5px">
          <a class="noo-clone-fields-education pull-left" onclick="addRoom()">
                                                  <i class="fa fa-plus-circle text-primary"></i>
                                                  Thêm loại phòng
           </a>
          <a class="noo-remove-fields-education pull-right" onclick="removeRoom(<?php echo $i ?>)">
              <i class="fa fa-times-circle"></i>
              Xoá
          </a>
        </div>
        <div class="clearfix"></div>
    </div>


<?php   
  }?>
 
<script type="text/javascript">
     function onSelectRoom(sel,index){
        var room_id= $(sel).val();
         url = "<?php echo base_url();?>admin/bookings/changeRoom?room_id=" +room_id ;
        $.ajax({
            url: url, success: function (result) {//alert(result.price);
              if(result.price == '0'){
                $("#extra_bed_show_"+index).val('Không áp dụng');
              }else{
                $("#extra_bed_show_"+index).val(result.price_format);
              }
              $("#extra_bed_hid_"+index).val(result.price);
                //$("#hotels_select").html(result);
               // loadPrice();
            }
        });
     }

</script>