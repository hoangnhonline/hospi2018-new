<form  class="hospifilter" action="<?php echo base_url() . $appModule; ?>/search" method="GET" role="search" id="formSearchAjax">
    <!--<a class="btn btn-block btn-default" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap"><i class="icon_set_1_icon-41"></i> <?php echo trans('067'); ?></a>-->
    <!-- TOP TIP
        <div class="filtertip">
          <div class="padding20">
            <h4 class="size24 text-center"><i class="icon_set_1_icon-95 go-right"></i><span><?php echo trans('0191'); ?></span> <span class="countprice"></span></h4>
          </div>
          <div class="clearfix"></div>
        </div>-->
    <div class="block-md-item">
        <!-- Star ratings -->
        <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse1">
        <?php //echo trans('0137'); ?> <?php echo trans('069'); ?> <span class="collapsearrow"></span>
        </button>
        <div id="collapse1" class="collapse in collapse-br">
            <div class="block-content">
                <div class="hpadding20">
                    <br>
                    <?php $star = '<i class="star text-warning fa fa-star voted"></i>'; ?>
                    <?php $stars = '<i class="fa fa-star-o"></i>'; 
                        $arrStar =@$_GET['stars'];                                
                        ?>
                    <div  class="rating" style="font-size: 14px;">
                        <div class="block-check-sale-sb go-right">
                            <label class="go-left" for="1">
                            <input id="1" type="checkbox" name="stars[]" class="go-right radio filter" value="1" <?php if (in_array(1, $arrStar)) {echo "checked";} ?>>
                            <span></span>
                            <?php echo $star; ?><?php for ($i = 1; $i <= 4; $i++) { ?> <?php echo $stars; ?> <?php } ?>
                            </label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="block-check-sale-sb go-right">
                            <label class="go-left" for="2">
                            <input id="2" type="checkbox" name="stars[]" class="radio go-right filter" value="2" <?php if (in_array(2, $arrStar)) {echo "checked";} ?>>
                            <span></span>
                            <?php for ($i = 1; $i <= 2; $i++) { ?> <?php echo $star; ?> <?php } ?><?php for ($i = 1; $i <= 3; $i++) { ?> <?php echo $stars; ?> <?php } ?>
                            </label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="block-check-sale-sb go-right">
                            <label class="go-left" for="3">
                            <input id="3" type="checkbox" name="stars[]" class="radio filter" value="3" <?php if (in_array(3, $arrStar)) {echo "checked";} ?>>
                            <span></span>
                            <?php for ($i = 1; $i <= 3; $i++) { ?> <?php echo $star; ?> <?php } ?><?php for ($i = 1; $i <= 2; $i++) { ?> <?php echo $stars; ?> <?php } ?>
                            </label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="block-check-sale-sb go-right">
                            <label class="go-left" for="4">
                            <input id="4" type="checkbox" name="stars[]" class="radio filter" value="4" <?php if (in_array(4, $arrStar)) {echo "checked";} ?>>
                            <span></span>
                            <?php for ($i = 1; $i <= 4; $i++) { ?> <?php echo $star; ?> <?php } ?><?php for ($i = 1; $i <= 1; $i++) { ?> <?php echo $stars; ?> <?php } ?></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="block-check-sale-sb go-right">
                            <label class="go-left" for="5">
                            <input id="5" type="checkbox" name="stars[]" class="radio filter" value="5" <?php if (in_array(5, $arrStar)) {echo "checked";} ?>>
                            <span></span>
                            <?php for ($i = 1; $i <= 5; $i++) { ?> <?php echo $star; ?> <?php } ?>
                            </label>
                        </div>
                        <!--<div class="clearfix"></div>
                            <div class="go-right"><input id="7" type="radio" name="stars" class="radio" value="7" <?php if (@$_GET['stars'] == "7") {
                                echo "checked";
                                } ?>>&nbsp;&nbsp;<label class="go-left" for="7"><?php for ($i = 1; $i <= 7; $i++) { ?> <?php echo $star; ?> <?php } ?></label></div>-->
                    </div>
                </div>
                <div class="clearfix"></div>
                <br>
            </div>
        </div>
        <!-- End of Star ratings -->
    </div>
    <!-- block-md-item -->
    <div class="block-md-item">
        <!-- Price range -->
        <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse2">Giá phòng <span class="collapsearrow"></span>
        </button>
        <div id="collapse2" class="collapse in collapse-br">
            <div class="block-content">
                <div class="hpadding20">
                    <br>
                    <div class="clearfix"></div>
                    <div class="block-check-sale-sb go-right">
                        <label for="Dưới 500.000" class="css-label go-left">
                        <input type="checkbox" value="0;500000"  name="price" id="Dưới 500.000" class="go-right radio filter-price" />
                        <span></span>
                        Dưới 500.000
                        </label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="block-check-sale-sb go-right">
                        <label for="Từ 500.000 - 1,000.000" class="css-label go-left">
                        <input type="checkbox" value="500000;1000000"  name="price" id="Từ 500.000 - 1,000.000" class="go-right radio filter-price" />
                        <span></span>
                        Từ 500.000 - 1,000.000
                        </label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="block-check-sale-sb go-right">
                        <label for="Từ 1,000.000 - 2,000.000" class="css-label go-left">
                        <input type="checkbox" value="1000000;2000000"  name="price" id="Từ 1,000.000 - 2,000.000" class="go-right radio filter-price" />
                        <span></span>
                        Từ 1,000.000 - 2,000.000
                        </label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="block-check-sale-sb go-right">
                        <label for="Từ 2,000.000 - 4,000.000" class="css-label go-left">
                        <input type="checkbox" value="2000000;4000000"  name="price" id="Từ 2,000.000 - 4,000.000" class="go-right radio filter-price" />
                        <span></span>
                        Từ 2,000.000 - 4,000.000
                        </label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="block-check-sale-sb go-right">
                        <label for="Trên  4,000.000" class="css-label go-left">
                        <input type="checkbox" value="4000000;100000000"  name="price" id="Trên  4,000.000" class="go-right radio filter-price" />
                        <span></span>
                        Trên  4,000.000
                        </label>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                </div>
            </div>
        </div>
        <!-- End of Price range -->
    </div>
    <!-- block-md-item -->
    <div class="block-md-item">
        <!-- Advance types -->
        <?php if ($appModule == "hotels") { ?>
        <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapseadvance">
        <?php echo trans('0708'); ?> <span class="collapsearrow"></span>
        </button>
        <div id="collapseadvance" class="collapse in collapse-br">
            <div class="block-content">
                <div class="hpadding20">
                    <br>
                    <div class="clearfix"></div>
                    <?php
                        @$varsaleoff = $_GET['issale'];
                        if (empty($varsaleoff)) {
                            $varsaleoff = "";
                        }
                        @$varuudai = $_GET['uudai'];
                        if (empty($varuudai)) {
                            $varuudai = "";
                        }
                        @$honeymoon = $_GET['honeymoon'];
                        if (empty($honeymoon)) {
                            $honeymoon = "";
                        }
                        @$varpickup = $_GET['pickup'];
                        if (empty($varpickup)) {
                            $varpickup = "";
                        }
                        ?>
                    <div class="block-check-sale-sb go-right">
                        <label for="issale" class="css-label go-left">
                        <input type="checkbox" value="yes" <?php if ($varsaleoff == "yes") {echo "checked";} ?> name="issale" id="issale" class="checkbox  filter" />
                        <span></span>
                        <?php echo trans('0709'); ?>
                        </label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="block-check-sale-sb go-right">
                        <label for="uudai" class="css-label go-left">
                        <input type="checkbox" value="yes" <?php if ($uudai == "yes") {echo "checked";} ?> name="uudai" id="uudai" class="checkbox  filter" />
                        <span></span>
                        <?php echo trans('0710'); ?>
                        </label>
                    </div>
                    <input type="hidden" name="page" value="1" id="page">
                    <div class="clearfix"></div>
                    <div class="block-check-sale-sb go-right">
                        <label for="honeymoon" class="css-label go-left">
                        <input type="checkbox" value="yes" <?php if ($honeymoon == "yes") {echo "checked";} ?> name="honeymoon" id="honeymoon" class="checkbox  filter" />
                        <span></span>
                        <?php echo trans('0567'); ?>
                        </label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="block-check-sale-sb go-right">
                        <label for="pickup" class="css-label go-left">
                        <input type="checkbox" value="yes" <?php if ($varpickup == "yes") {echo "checked";} ?> name="pickup" id="pickup" class="checkbox  filter" />
                        <span></span>
                        <?php echo trans('0711'); ?>
                        </label>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php } ?>
        <!-- End of Advance Types -->
    </div>
    <!-- block-md-item -->
    <div class="block-md-item">
        <!-- Module types -->
        <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse3">
        <?php if ($appModule == "hotels") {
            echo trans('0478');
            } else if ($appModule == "tours") {
            echo trans('0366');
            } else if ($appModule == "cars") {
            echo trans('0214');
            } ?> <span class="collapsearrow"></span>
        </button>
        <div id="collapse3" class="collapse in collapse-br">
            <div class="block-content">
                <div class="hpadding20">
                    <br>
                    <div class="clearfix"></div>
                    <?php
                        @$vartype = $_GET['type'];
                        if (empty($vartype)) {
                            $vartype = array();
                        }
                        foreach ($moduleTypes as $mtype) {
                            if (!empty($mtype->name)) {
                                if ($appModule == "hotels") {
                                    ?>
                    <div class="block-check-sale-sb go-right">
                        <label for="<?php echo $mtype->name; ?>" class="css-label go-left">
                        <input type="checkbox" value="<?php echo $mtype->id; ?>" <?php if (in_array($mtype->id, $vartype)) {echo "checked";} ?> name="type[]" id="<?php echo $mtype->name; ?>" class="checkbox  filter" />
                        <span></span>
                        <?php echo $mtype->name; ?>
                        </label>
                    </div>
                    <div class="clearfix"></div>
                    <?php } else if ($appModule == "tours" || $appModule == "cars") { ?>
                    <div class="block-check-sale-sb go-right">
                        <label for="<?php echo $mtype->name; ?>" class="css-label go-left">
                        <input class="radio" type="radio" value="<?php echo $mtype->id; ?>" name="type" id="<?php echo $mtype->name; ?>" class="checkbox go-right  filter" <?php if ($mtype->id == $vartype) {echo "checked";} ?> />
                        <span></span>
                        <?php echo $mtype->name; ?> 
                        </label>
                    </div>
                    <div class="clearfix"></div>
                    <?php }
                        }
                        } ?>
                    <br>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- End of Module Types -->
    </div>
    <!-- block-md-item -->
    <div class="block-md-item">
        <!-- Hotel Nearby -->
        <div class="clearfix"></div>
        <?php if (!empty($nears) && $_GET['modType'] != "") { ?>
        <button type="button" class="collapsebtn last go-text-right" data-toggle="collapse" data-target="#collapse5">
        <?php echo trans('0601'); ?> <span class="collapsearrow"></span>
        </button>
        <div id="collapse5" class="collapse in collapse-br">
            <div class="block-content">
                <div class="hpadding20">
                    <br>
                    <?php
                        @$varNear = $_GET['near'];
                        if (empty($varNear)) {
                            $varNear = array();
                        }
                        foreach ($nears as $near) {
                            $eachnear = explode(',', $near->near);
                            foreach ($eachnear as $item) {
                                ?>
                    <div class="block-check-sale-sb go-right">
                        <label for="<?php echo trim($item); ?>" class="css-label go-left">
                        <input type="checkbox" value="<?php echo trim($item); ?>" <?php if (trim($item) == str_replace("+", ' ', $varNear)) {echo "checked";} ?> name="near" id="<?php echo trim($item); ?>" class="checkbox filter-near" />
                        <span></span>
                        <?php echo trim($item); ?>
                        </label>
                    </div>
                    <?php }
                        } ?>
                    <br>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- End Hotel Nearby -->
    </div>
    <!-- block-md-item -->
    <div class="block-md-item">
        <!-- Hotel Amenities -->
        <?php if (!empty($amenities)) { ?>
        <button type="button" class="collapsebtn last go-text-right" data-toggle="collapse" data-target="#collapse4">
        <?php echo trans('0249'); ?> <span class="collapsearrow"></span>
        </button>
        <div id="collapse4" class="collapse in collapse-br">
            <div class="block-content">
                <div class="hpadding20">
                    <br>
                    <div class="clearfix"></div>
                    <?php
                        @$varAmt = $_GET['amenities'];
                        if (empty($varAmt)) {
                            $varAmt = array();
                        }
                        foreach ($amenities as $hamt) {
                            ?>
                    <div class="block-check-sale-sb go-right">
                        <label for="<?php echo $hamt->name; ?>" class="css-label go-left">
                        <input type="checkbox" value="<?php echo $hamt->id; ?>" <?php if (in_array($hamt->id, $varAmt)) {echo "checked";} ?> name="amenities[]" id="<?php echo $hamt->name; ?>" class="checkbox  filter" />
                        <span></span>
                        <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="<?php echo $hamt->icon; ?>">  <?php echo $hamt->name; ?>
                        </label>
                    </div>
                    <div class="clearfix"></div>
                    <?php } ?>
                    <br>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php } ?>
    </div>
    <!-- block-md-item -->
    <div class="block-md-item">
        <?php if ($appModule == "cars") { ?>
        <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse5">
        <?php echo trans('0207'); ?> <span class="collapsearrow"></span>
        </button>
        <div id="collapse5" class="collapse in collapse-br">
            <div class="block-content">
                <div class="hpadding20">
                    <br>
                    <div class="clearfix"></div>
                    <select class="selectx" name="pickup">
                        <option value=""> <?php echo trans('0158'); ?></option>
                        <option value="yes" <?php echo makeSelected($selectedPickup, "yes"); ?>  ><?php echo trans('0363'); ?></option>
                        <option value="no" <?php echo makeSelected($selectedPickup, "no"); ?> ><?php echo trans('0364'); ?></option>
                    </select>
                    <br>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- End of Hotel Amenities -->
    </div>
    <!-- block-md-item -->
    <div class="block-md-item">
        <div class="clearfix"></div>
        <br/>                   
        <input type="hidden" name="txtSearch" value="<?php if (!empty($_GET['txtSearch'])) {
            echo $_GET['txtSearch'];
            } ?>">
        <input type="hidden" name="modType" value="<?php echo $modType ?>">
        <input type="hidden" name="city" value="<?php echo $city; ?>">
        <!-- <input type="hidden" name="checkin" value="<?php echo $checkin; ?>">
        <input type="hidden" name="checkout" value="<?php echo $checkout; ?>"> -->
        <input type="hidden" name="childages" value="<?php echo $childAges; ?>">
        <input type="hidden" name="adults" value="<?php echo $adults; ?>">
        <input type="hidden" name="searching" value="<?php echo $cityid; ?>">
        <input name="sortby" type="hidden" id="sortbyajax" class="sortby" value="<?php if (!empty($_GET['sortby'])) {
            echo $_GET['sortby'];
            } ?>">                   
    </div>
    <!-- block-md-item -->
</form>