<div class="panel panel-default" id="p-main">    
  <div class="panel-heading" role="tab">     
      <a role="button" data-toggle="collapse" href="#collapse1">
        GIá phòng
      </a>     
  </div>
  <div class="panel-body panel-collapse <?php if($tab_active == 'main'){ ?> in <?php }else{ echo "collapse"; } ?>" id="collapse1">
  <form action="" method="POST" >  
    <h4 style="color: #660033;padding-bottom: 10px;margin-bottom: 10px;border-bottom: 1px solid #660033">THÊM GIÁ NET</h4>
    <input type="hidden" name="hotel_id" value="<?php echo $roomDetail->hotel_id; ?>">
    <div class="col-md-3">
      <div class="form-group">
        <label class="required">Từ ngày</label>
        <input  autocomplete="off"  type="text" id="fromdate1" placeholder="" name="fromdate" class="form-control input-sm" value="<?php echo empty($priceMainDetail) ? set_value('fromdate') : date('d/m/Y', strtotime($priceMainDetail->date_from)); ?>"/>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label class="required">Đến ngày</label>
        <input  autocomplete="off" type="text" id="todate1" placeholder="" name="todate" class="form-control input-sm" value="<?php echo empty($priceMainDetail) ? set_value('todate')  : date('d/m/Y', strtotime($priceMainDetail->date_to)); ?>"/>
      </div>
    </div>
    
    <div class="col-md-3">
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
      <div class="col-md-3">
        <div class="form-group">
          <label class="required">Phí giường phụ</label>
          <input  placeholder="" name="bedcharges" <?php if($roomDetail->extra_bed == 0) echo "readonly=readonly"; ?> class="form-control input-sm number" value="<?php echo empty($priceMainDetail) ? $roomDetail->extra_bed_charges : $priceMainDetail->extra_bed_charge - $loiNhuanMoneyArr[1];?>" <?php if($roomDetail->extra_bed < 1){ echo "readonly"; } ?> />
        </div>
      </div>      
      
      <div class="clearfix"></div>
    <div class="gia_main_div">
      <div class="col-md-2" style="width:150px;margin-right: 20px">
        <label class="required">Thứ 2</label>
      <div class="input-group" >
      
      <input name="mon" id="new_mon" class="form-control input input-day-mon  input-sm number price-copy" placeholder="" style="width:120px;" value="<?php echo @($priceMainDetail->mon- $loiNhuanMoneyArr[2]); ?>" ><span class="input-group-addon pointer copyPrice"><i class="fa fa-angle-double-right"></i></span>

      </div>

      </div>

      <div class="col-md-1">
        <div class="form-group">
          <label class="required">Thứ 3</label>
          <input id="new_tue" name="tue" value="<?php echo @($priceMainDetail->tue - $loiNhuanMoneyArr[3]); ?>" placeholder="" class="form-control input input-day input-sm number week"/>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <label class="required">Thứ 4</label>
          <input id="new_wed" name="wed" value="<?php echo @($priceMainDetail->wed - $loiNhuanMoneyArr[4]); ?>" placeholder="" class="form-control input input-day input-sm number week"/>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <label class="required">Thứ 5</label>
          <input id="new_thu" name="thu" value="<?php echo @($priceMainDetail->thu - $loiNhuanMoneyArr[5]); ?>" placeholder="" class="form-control input input-day input-sm number week"/>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <label class="required">Thứ 6</label>
          <input id="new_fri" name="fri" value="<?php echo @($priceMainDetail->fri - $loiNhuanMoneyArr[6]); ?>" placeholder="" class="form-control input input-day input-sm number week"/>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <label class="required">Thứ 7</label>
          <input id="new_sat" name="sat" value="<?php echo @($priceMainDetail->sat - $loiNhuanMoneyArr[7]); ?>" placeholder="" class="form-control input input-day input-sm number week"/>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
          <label class="required">Chủ nhật</label>
          <input id="new_sun" name="sun" value="<?php echo @($priceMainDetail->sun - $loiNhuanMoneyArr[8]); ?>" placeholder="" class="form-control input input-day input-sm number week"/>
        </div>
      </div>
      <div class="clearfix"></div>
      <h4 style="color: #660033;padding-bottom: 10px;margin-bottom: 10px;border-bottom: 1px solid #660033">LỢI NHUẬN</h4>
        <div class="col-md-3">
            <div class="form-group">
              <label class="required">Kiểu áp dụng</label>
              <select name="loi_nhuan[]" class="form-control input-sm" id="p_type_apply" style="width: 100%">
               
              <option value="2" <?php echo ($loiNhuanArr[0] == 2) ? "selected" : ""; ?>>Thành tiền</option>
              <option value="1" <?php echo ($loiNhuanArr[0] == 1) ? "selected" : ""; ?>>%</option>
                            
            </select>
            </div>
          </div>      
          <div class="col-md-3">
            <div class="form-group">
              <label class="required">Giường phụ</label>
              <input  placeholder="" name="loi_nhuan[]" <?php if($roomDetail->extra_bed == 0) echo "readonly=readonly"; ?> class="form-control input-sm number" value="<?php echo @$loiNhuanArr[1];?>" <?php if($roomDetail->extra_bed < 1){ echo "readonly"; } ?> />
            </div>
          </div>      
        </div>
          <div class="clearfix"></div>
        <div class="loi_nhuan_div">
          <div class="col-md-2" style="width:150px;margin-right: 20px">
            <label class="required">Thứ 2</label>
          <div class="input-group" >
          
          <input name="loi_nhuan[]" id="p_new_mon" class="form-control input input-day-mon  input-sm number price-copy-profit" placeholder="" style="width:120px;" value="<?php echo @$loiNhuanArr[2]; ?>" ><span class="input-group-addon pointer copyPriceProfit"><i class="fa fa-angle-double-right"></i></span>

          </div>

          </div>

          <div class="col-md-1">
            <div class="form-group">
              <label class="required">Thứ 3</label>
              <input id="p_new_tue" name="loi_nhuan[]" value="<?php echo @$loiNhuanArr[3]; ?>" placeholder="" class="form-control input input-day input-sm number week"/>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label class="required">Thứ 4</label>
              <input id="p_new_wed" name="loi_nhuan[]" value="<?php echo @$loiNhuanArr[4]; ?>" placeholder="" class="form-control input input-day input-sm number week"/>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label class="required">Thứ 5</label>
              <input id="p_new_thu" name="loi_nhuan[]" value="<?php echo @$loiNhuanArr[5]; ?>" placeholder="" class="form-control input input-day input-sm number week"/>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label class="required">Thứ 6</label>
              <input id="p_new_fri" name="loi_nhuan[]" value="<?php echo @$loiNhuanArr[6]; ?>" placeholder="" class="form-control input input-day input-sm number week"/>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label class="required">Thứ 7</label>
              <input id="p_new_sat" name="loi_nhuan[]" value="<?php echo @$loiNhuanArr[7]; ?>" placeholder="" class="form-control input input-day input-sm number week"/>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label class="required">Chủ nhật</label>
              <input id="p_new_sun" name="loi_nhuan[]" value="<?php echo @$loiNhuanArr[8]; ?>" placeholder="" class="form-control input input-day input-sm number week"/>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <div>&nbsp;</div>
              <input type="hidden" name="action" value="<?php echo empty($priceMainDetail) ? "add" : "update"; ?>" />
              <?php if(!empty($priceMainDetail)){ ?>
                <input type="hidden" name="price_id" value="<?php echo $priceMainDetail->id; ?>">
                <?php } ?>
              <input type="hidden" name="roomid" value="<?php echo $roomid;?>" />
              <input type="hidden" name="type" value="1" />
              <input type="hidden" name="dateformat" value="<?php echo $appSettings->dateFormat;?>" />
              
              <button class="btn btn-primary btn-sm" type="submit" style="margin-top:4px"><?php  echo empty($priceMainDetail) ? "Thêm" : "Cập nhật" ;?></button>
              <?php if(!empty($priceMainDetail)){ ?>
                <a style="margin-top:5px" class="btn btn-default btn-sm" href="<?php echo base_url() . 'admin/hotels/rooms/prices/'.$roomDetail->room_id; ?>#p_main" onclick="return confirm('Chắc chắn hủy?');">Hủy</a>
              <?php } ?>
            </div>
         
          <div class="clearfix"></div>
        </div>
    </form>
    <div class="clearfix"></div>      
    <table class="table table-bordered form-horizontal">
      <thead>
        <tr>
          <th style="white-space:nowrap">Từ ngày - đến ngày</th>         
          <th class="text-right">Giường phụ</th>     
          <th class="text-right">Thứ 2</th>
          <th class="text-right">Thứ 3</th>
          <th class="text-right">Thứ 4</th>
          <th class="text-right">Thứ 5</th>
          <th class="text-right">Thứ 6</th>
          <th class="text-right">Thứ 7</th>
          <th class="text-right">Chủ nhật</th>           
          <th ></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($prices as $p): 
      if($p->type == 1):
        $loiNhuan = json_decode($p->profit, true);
        $loiNhuanMoney = json_decode($p->profit_money, true);
        if(empty($loiNhuan)){
          $loiNhuan = array(0,0,0,0,0,0,0,0,0);
        }
        if(empty($loiNhuanMoney)){
          $loiNhuanMoney = array(
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
            '6' => 0,
            '7' => 0,
            '8' => 0,
          );
        }
        
      	?>
        <tr id="tr_<?php echo $p->id;?>">
          <td style="white-space:nowrap"><span style="color: #660033;font-weight: bold"><?php echo date('d/m/Y', strtotime($p->date_from)); ?> - <?php echo date('d/m/Y', strtotime($p->date_to)); ?></span><br>
            Lợi nhuận<br>
            Giá bán
            

          </td>          
          <td class="text-right"><?php echo number_format($p->extra_bed_charge  - $loiNhuanMoney[1]);?><br>
            <?php echo number_format($loiNhuan[1]); ?><?php if($loiNhuan[0]==1) echo " %"; ?><br>
            <strong><?php echo number_format($p->extra_bed_charge); ?></strong>
          </td>
         
          <td style="width:120px;" class="text-right">            
            <?php echo number_format($p->mon - $loiNhuanMoney[2]);?><br>
            <?php echo number_format($loiNhuan[2]); ?><?php if($loiNhuan[0]==1) echo " %"; ?><br>
            <strong><?php echo number_format($p->mon); ?></strong>
            </td>
          <td style="width:120px;" class="text-right"><?php echo number_format($p->tue - $loiNhuanMoney[3]);?><br>
            <?php echo number_format($loiNhuan[3]); ?><?php if($loiNhuan[0]==1) echo " %"; ?><br>
            <strong><?php echo number_format($p->tue); ?></strong>
            </td>
          <td style="width:120px;" class="text-right"><?php echo number_format($p->wed - $loiNhuanMoney[4]);?><br>
            <?php echo number_format($loiNhuan[4]); ?><?php if($loiNhuan[0]==1) echo " %"; ?><br>
            <strong><?php echo number_format($p->wed); ?></strong>
            </td>
          <td style="width:120px;" class="text-right"><?php echo number_format($p->thu - $loiNhuanMoney[5]);?><br>
            <?php echo number_format($loiNhuan[5]); ?><?php if($loiNhuan[0]==1) echo " %"; ?><br>
            <strong><?php echo number_format($p->thu); ?></strong>
            </td>
          <td style="width:120px;" class="text-right"><?php echo number_format($p->fri - $loiNhuanMoney[6]);?><br>
            <?php echo number_format($loiNhuan[6]); ?><?php if($loiNhuan[0]==1) echo " %"; ?><br>
            <strong><?php echo number_format($p->fri); ?></strong>
            </td>
          <td style="width:120px;" class="text-right"><?php echo number_format($p->sat - $loiNhuanMoney[7]);?><br>
            <?php echo number_format($loiNhuan[7]); ?><?php if($loiNhuan[0]==1) echo " %"; ?><br>
            <strong><?php echo number_format($p->sat); ?></strong>
            </td>
          <td style="width:120px;" class="text-right"><?php echo number_format($p->sun - $loiNhuanMoney[8]);?><br>
            <?php echo number_format($loiNhuan[8]); ?><?php if($loiNhuan[0]==1) echo " %"; ?><br>
            <strong><?php echo number_format($p->sun); ?></strong>
            </td>          
          <td style="white-space:nowrap;text-align: center;">
            <?php echo date('d/m/Y H:i', strtotime($p->updated_at)); ?><br>
          <?php echo $p->ai_first_name. " ". $p->ai_last_name; ?><br>
          <a href="<?php echo base_url() . 'admin/hotels/rooms/prices/'.$roomDetail->room_id; ?>?price_id=<?php echo $p->id; ?>&tab=main#p_main" class="btn btn-warning btn-sm" ><i class="fa fa-edit"></i></a>
          <span class="btn btn-sm btn-danger delete" id="<?php echo $p->id;?>"><i class="fa fa-trash-o fa-lg"></i></span>
          </td>
        </tr>
       <?php 
       endif;
       endforeach; ?>


      </tbody>
    </table>

  </div>
 
 
</div>