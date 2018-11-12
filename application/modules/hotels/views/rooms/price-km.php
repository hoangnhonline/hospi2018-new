<div class="panel panel-default" id="p_km">  
  <div class="panel-heading" role="tab">     
      <a role="button" data-toggle="collapse" href="#collapse2">
         Giá khuyến mãi
      </a>     
  </div>
  <div class="panel-body panel-collapse collapse <?php if($tab_active == 'km'){ ?> in <?php } ?>" id="collapse2">
  <form action="" method="POST" class="gia_main_div" style="padding-bottom: 15px">
    <input type="hidden" name="hotel_id" value="<?php echo $roomDetail->hotel_id; ?>">
    <div class="clearfix" style="margin-bottom: 15px"></div>
    <div class="col-md-2">
        <div class="form-group">
          <label class="required">Kiểu khuyến mãi</label>
          <select name="type_apply" class="form-control input-sm" id="type_apply" style="width: 100%">
            <option value="2" <?php echo (!empty($priceKmDetail) && $priceKmDetail->type_apply == 2) ? "selected" : ""; ?>>Thành tiền</option>  
            <option value="1" <?php echo (!empty($priceKmDetail) && $priceKmDetail->type_apply == 1) ? "selected" : ""; ?>>%</option>
                        
          </select>
        </div>
      </div>            
    <div class="col-md-3">
      <div class="form-group">
        <label class="required">Từ ngày</label>
        <input id="fromdate2" autocomplete="off" type="text" placeholder="" name="fromdate" class="form-control input-sm" value="<?php echo empty($priceKmDetail) ? set_value('fromdate') : date('d/m/Y', strtotime($priceKmDetail->date_from)); ?>"/>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label class="required">Đến ngày</label>
        <input id="todate2"  autocomplete="off" type="text" placeholder="" name="todate" class="form-control input-sm" value="<?php echo empty($priceKmDetail) ? set_value('todate')  : date('d/m/Y', strtotime($priceKmDetail->date_to)); ?>"/>
      </div>
    </div>
    
    <div class="col-md-2">
        <div class="form-group">
          <label class="required">Giường phụ</label>
          <select name="isExtraBed" class="form-control input-sm" id="isExtraBed" style="width: 100%">         
          <?php if($roomDetail->extra_bed == 0){ ?>   
            <option value="0" >Không áp dụng</option>            
            <?php }else{ ?>
            <option value="1" >Áp dụng</option>  
              <?php } ?>
          </select>
        </div>
      </div>      
      <div class="col-md-2">
        <div class="form-group">
          <label class="required">Phí giường phụ</label>
          <input  placeholder="" name="bedcharges" <?php if($roomDetail->extra_bed == 0) echo "readonly=readonly"; ?> class="form-control input-sm number" value="<?php echo @$priceKmDetail->extra_bed_charge;?>" <?php if($roomDetail->extra_bed < 1){ echo "readonly"; } ?> />
        </div>
      </div>      
      
      <div class="clearfix"></div>
    <div class="">
      <div class="col-md-2" style="width:150px;margin-right: 20px">
        <label class="required">Thứ 2</label>
      <div class="input-group" >
      
      <input name="mon" id="new_mon" class="form-control input input-day-mon  input-sm number price-copy" placeholder="" style="width:120px;" value="<?php echo @$priceKmDetail->mon; ?>" ><span class="input-group-addon pointer copyPrice"  ><i class="fa fa-angle-double-right"></i></span>

      </div>

      </div>

      <div class="col-md-1">
        <div class="form-group">
          <label class="required">Thứ 3</label>
          <input id="new_tue" name="tue" value="<?php echo @$priceKmDetail->tue; ?>" placeholder="" class="form-control input input-day input-sm number week"/>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <label class="required">Thứ 4</label>
          <input id="new_wed" name="wed" value="<?php echo @$priceKmDetail->wed; ?>" placeholder="" class="form-control input input-day input-sm number week"/>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <label class="required">Thứ 5</label>
          <input id="new_thu" name="thu" value="<?php echo @$priceKmDetail->thu; ?>" placeholder="" class="form-control input input-day input-sm number week"/>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <label class="required">Thứ 6</label>
          <input id="new_fri" name="fri" value="<?php echo @$priceKmDetail->fri; ?>" placeholder="" class="form-control input input-day input-sm number week"/>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <label class="required">Thứ 7</label>
          <input id="new_sat" name="sat" value="<?php echo @$priceKmDetail->sat; ?>" placeholder="" class="form-control input input-day input-sm number week"/>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <label class="required">Chủ nhật</label>
          <input id="new_sun" name="sun" value="<?php echo @$priceKmDetail->sun; ?>" placeholder="" class="form-control input input-day input-sm number week"/>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <div>&nbsp;</div>
          <input type="hidden" name="action" value="<?php echo empty($priceKmDetail) ? "add" : "update"; ?>" />
          <?php if(!empty($priceKmDetail)){ ?>
            <input type="hidden" name="price_id" value="<?php echo $priceKmDetail->id; ?>">
            <?php } ?>
          <input type="hidden" name="roomid" value="<?php echo $roomid;?>" />
          <input type="hidden" name="type" value="2" />          
          <input type="hidden" name="dateformat" value="<?php echo $appSettings->dateFormat;?>" />
          
          <button class="btn btn-primary btn-sm" type="submit" style="margin-top:4px"><?php  echo empty($priceKmDetail) ? "Thêm" : "Cập nhật" ;?></button>
          <?php if(!empty($priceKmDetail)){ ?>
            <a style="margin-top:5px" class="btn btn-default btn-sm" href="<?php echo base_url() . 'admin/hotels/rooms/prices/'.$roomDetail->room_id; ?>#p_km" onclick="return confirm('Chắc chắn hủy?');">Hủy</a>
          <?php } ?>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    </form>
    <div class="clearfix"></div>      
    <table class="table table-bordered form-horizontal">
      <thead>
        <tr>
          <th>Từ ngày - đến ngày</th>         
          <th style="white-space:nowrap" class="text-right">Giường phụ</th>     
          <th class="text-right">Thứ 2</th>
          <th class="text-right">Thứ 3</th>
          <th class="text-right">Thứ 4</th>
          <th class="text-right">Thứ 5</th>
          <th class="text-right">Thứ 6</th>
          <th class="text-right">Thứ 7</th>
          <th class="text-right">Chủ nhật</th>          
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($prices as $p): 
      if($p->type == 2):
      ?>
        <tr id="tr_<?php echo $p->id;?>">
          <th style="white-space:nowrap"><?php echo date('d/m/Y', strtotime($p->date_from)); ?> - <?php echo date('d/m/Y', strtotime($p->date_to)); ?>
          </th>          
          <td class="text-right"><?php echo number_format($p->extra_bed_charge);?></td>
         
          <td style="width:120px;" class="text-right"><?php echo number_format($p->mon);?><?php echo $p->type_apply == 1 ? "%" : ""; ?></td>
          <td style="width:120px;" class="text-right"><?php echo number_format($p->tue);?><?php echo $p->type_apply == 1 ? "%" : ""; ?></td>
          <td style="width:120px;" class="text-right"><?php echo number_format($p->wed);?><?php echo $p->type_apply == 1 ? "%" : ""; ?></td>
          <td style="width:120px;" class="text-right"><?php echo number_format($p->thu);?><?php echo $p->type_apply == 1 ? "%" : ""; ?></td>
          <td style="width:120px;" class="text-right"><?php echo number_format($p->fri);?><?php echo $p->type_apply == 1 ? "%" : ""; ?></td>
          <td style="width:120px;" class="text-right"><?php echo number_format($p->sat);?><?php echo $p->type_apply == 1 ? "%" : ""; ?></td>
          <td style="width:120px;" class="text-right"><?php echo number_format($p->sun);?><?php echo $p->type_apply == 1 ? "%" : ""; ?></td>                    
          <td style="white-space:nowrap;text-align: center;">
            <?php echo date('d/m/Y H:i', strtotime($p->updated_at)); ?><br>
          <?php echo $p->ai_first_name. " ". $p->ai_last_name; ?><br>
          <a href="<?php echo base_url() . 'admin/hotels/rooms/prices/'.$roomDetail->room_id; ?>?price_id=<?php echo $p->id; ?>&tab=km#p_km" class="btn btn-warning btn-sm" ><i class="fa fa-edit"></i></a>
          <span class="btn btn-sm btn-danger delete" id="<?php echo $p->id;?>"><i class="fa fa-trash-o fa-lg"></i></span>
          </td>
        </tr>
      <?php endif; ?>
       <?php endforeach; ?>


      </tbody>
    </table>

  </div>
 
 
</div>