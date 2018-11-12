

 <option value="">-- chọn --</option>
          <?php foreach( $combos as $combo ){ ?>
       <option value="<?php echo $combo->offer_id; ?>"><?php echo $combo->offer_title; ?></option>
  <?php } ?>