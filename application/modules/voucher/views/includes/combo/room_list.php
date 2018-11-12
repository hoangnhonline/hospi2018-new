                                                  
  <?php //var_dump($room_list ) ; 
       foreach ($model['room_list'] as $i => $value) {
 ?>
<div class="clonedEducation">
        <div class="col-md-6">
           <div class="form-group">
          <label for="hotel_city">Loai phong</label>
          <select class="form-control chosen-select" name = "room_list[<?php echo $i?>][room_id]" id="">
                <?php foreach ($room_list as $room) { ?> 
                  <option value="<?php echo $room->id; ?>" <?php if( $room->id == $value['room_id']) echo "selected" ;?>> <?php echo $room->title; ?></option>
                <?php } ?>
          </select>
       </div>
          </div>
         <div class="col-md-2" style="margin-left: 30px">
           <div class="form-group">
               <label class=" control-label font-weight-unset">Số lượng phòng</label>
             
               <input type="number" class="form-control" value="<?php echo $value['room_total']?>" name = "room_list[<?php echo $i?>][room_total]">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="noo-addable-actions col-md-9">
        <a class="noo-clone-fields-education pull-left" onclick="addRoom()">
            <i class="fa fa-plus-circle text-primary"></i>
            Thêm loại phòng
        </a>
         <a class="noo-remove-fields-education pull-right" onclick="removeRoom(<?php echo $value['room_id'] ?>)">
            <i class="fa fa-times-circle"></i>
            Xoá
        </a>
      </div>
      <div class="clearfix"></div>
  </div>

<?php   
  }?>
