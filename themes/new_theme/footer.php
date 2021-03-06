<?php  $CI = &get_instance(); $app_settings = $CI->settings_model->get_settings_data(); $lang_set = $CI->theme->_data['lang_set']; $allowsupplierreg = $app_settings[0]->allow_supplier_registration; ?>
<?php $currenturl = uri_string(); ?>
<?php $currenturl = base_url(uri_string());?>
<?php
if ($app_settings[0]->mobile_pic_status == "Yes") {
    ?>
    <div class="hidden-xs" style="position: fixed;width: 99px;height: 171px;right: 0;z-index: 9999;left: 0;top: 50%;margin-top: -85px;">
        <a href="<?php echo $app_settings[0]->mobile_pic_url; ?>" target="_blank"><img src="<?php echo $theme_url; ?>assets/img/app.png"  alt="phone application" /></a>
    </div>
    <?php
}
?>
<?php
if (strpos($currenturl, 'blog') === false) {
    ?>
    <div class="block-newsletter_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-5 text-center newsletter_footer"> <?php echo trans('0832');?></div>
                <div class="col-md-5">
                    <div class="relative input">
                        <input type="email" name="email" class="form-control fccustom2 sub_email" id="exampleInputEmail1" placeholder="<?php echo trans('0403');?>" required>
                        <div style="color:white" class="subscriberesponse"></div>
                        <button type="submit" class="btn btn-default btncustom sub_newsletter">Đăng Ký</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- block-newsletter_footer -->
    <?php
}
?>
<?php
if (strpos($currenturl, 'blog') !== false) {
    ?>
    <div id="footer" class="clearfix <?php echo @$hidden; ?> footerbg2" >
        <div class="container">
            <ul class="list-social">
                <li>Kết nối với chúng tôi</li>
                <li class="item-social youtube"><a href="https://www.youtube.com/channel/UCxfzWdfkaDPWGIVrI2vKchg" target="_blank"><i class="fa fa-play"></i> Youtube</a></li>
                <li class="item-social facebook"><a href="https://www.facebook.com/hospi.vn/" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
                <li class="item-social google"><a href="https://plus.google.com/104246180420952281462" target="_blank"><i class="fa fa-google-plus"></i> Google +</a></li>
            </ul>
            <div class="row">
                <!-- Blog -->
                <div class="footerblog">
                    <div class="row col-md-7">
                        <div class="col-md-5">
                            <a href="<?php echo base_url(); ?>blog"><img src="<?php echo PT_GLOBAL_IMAGES_FOLDER.$app_settings[0]->footer_logo_img;?>" class="img-responsive logo"/></a>
                        </div>
                        <div class="col-md-7">
                            <div class="fttle"><?php echo '"'.trans('0829').'"';?></div>
                        </div>
                    </div>
                    <div class="row col-md-5">
                        <div class="col-md-7 facebook-like footer-blog-center">
                            <div class="facebook-text"><?php echo trans('0830');?></div>
                            <div class="fb-like" data-href="https://www.facebook.com/hospi.vn" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                        </div>
                        <div class="col-md-5 footer-blog-center nowrap">
                            <div><?php echo trans('0831');?></div>
                            <div class="phone_footer"><?php echo $phone; ?></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <div class="hottest-news"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="ftitle">&copy; <?php echo $app_settings[0]->copyright;?></div>
                    </div>
                    <div class="col-md-2 footer-blog-center">
                        <div class="ftitle"><?php get_footer_menu_items(23,"chung-toi-la-ai","ftitle go-text-center","go-right go-text-center" );?></div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog-map ftitle go-text-right">
                            <?php if(!empty($address)){ echo $address; } else { echo trans('Address'); } ?>
                        </div>
                    </div>
                    <div class="row col-md-3">
                        <div class="blog-map go-text-right"><a class="purple" target="_blank" href="https://www.google.com/maps/place/124+Kh%C3%A1nh+H%E1%BB%99i,+ph%C6%B0%E1%BB%9Dng+6,+Qu%E1%BA%ADn+4,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam/@10.7572978,106.6982959,17z/data=!3m1!4b1!4m5!3m4!1s0x31752f6d4faf461f:0xcf0c2485be1d0fdc!8m2!3d10.7572925!4d106.7004846"><i style="margin-left: -3px;" class="icon-location-6 go-right"></i><?php echo trans('0707');?></a></div>
                    </div>
                </div>
                <!-- End Blog -->
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div id="footer" class="clearfix <?php echo @$hidden; ?> footerbg" >
        <div class="back-ft-po hidden-xs"></div>
        <div class="footer-link not-blog"></div>
        <div class="container">
            <a class="hidden-xs" href="<?php echo base_url(); ?>" style="display: block;margin-bottom: 5px;margin-top: 5px;"><img src="<?php echo $theme_url;?>asset/img/logo-ft.png" class="img-responsive logo"/></a>
             <!-- <div class="row"></div> -->
            <div class="row">
                <!-- Hotels -->
                <div class="col-md-4 go-right col-xs-12 hidden-xs" id="contact">
                    <div class="footer-brand">
                        <div style="color: #fff;"><?php echo $app_settings[0]->home_title;?></div>
                        <div class="ftitle go-text-right"><?php if(!empty($address)){ echo $address; } else { echo trans('Address'); } ?></div>
                        <div class="ftitle go-text-right">Tel: <?php if(!empty($phone)){ echo $phone; } else { echo "08 3826 8797"; } ?><?php //echo $tel; ?> - Fax: <?php if(!empty($fax)){ echo $fax; } else { echo "(08) 3826 8798"; } ?><?php //echo $fax; ?></div>
                        <div class="ftitle go-text-right"><a class="purple" target="_blank" href="https://www.google.com/maps/place/124+Kh%C3%A1nh+H%E1%BB%99i,+ph%C6%B0%E1%BB%9Dng+6,+Qu%E1%BA%ADn+4,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam/@10.7572978,106.6982959,17z/data=!3m1!4b1!4m5!3m4!1s0x31752f6d4faf461f:0xcf0c2485be1d0fdc!8m2!3d10.7572925!4d106.7004846"><i style="margin-left: -3px;" class="icon-location-6 go-right"></i><?php echo trans('0707');?></a></div>
                        <p style="color: #fff;">&copy; <?php echo $app_settings[0]->copyright;?></p>
                    </div>
                    <div class="scont"  style="font-family:arial">
                        <div class="clearfix"></div>
                        <div id="social_footer go-right">
                            <?php
                                $footersocials = pt_get_footer_socials();
                                foreach($footersocials as $fs){
                                ?>
                            <a href="<?php echo $fs->social_link;?>" target="_blank"><img src="<?php echo PT_SOCIAL_IMAGES; ?><?php echo $fs->social_icon;?>" class="social-icons-footer" /></a>
                            <?php } ?>
                        </div>
                       <!--  <img src="<?php //echo $theme_url; ?>/assets/img/bocongthuong.png" width="152" height="57" data-retina="true" class="congthuong img-responsive">
                        <span class=""><?php //echo trans('0575');?></span> -->
                        <p>2106 - Công ty TNHH Du lịch Hospi</p>
                        <p>Số ĐKKD 0314088534 do sở KHĐT Tp.HCM cấp ngày 31/10/2016</p>
                        <p>Người chịu trách nhiệm nội dung : Võ Đình Chi</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row col-md-8 col-xs-12 ">
                    <!-- End of column 1-->
                    <div class="col-xs-12 col-md-4 go-right">
                        <h2 class="ftitle go-text-right" style="margin-top: 15px"><strong><?php echo trans('0571');?></strong></h2>
                        <?php if(!empty($phone)){ ?>
                        <div class="phone_footer go-right"><i class="fa fa-phone-square"></i> <?php echo $phone; ?></div>
                        <?php } ?>
                        <!-- <div class="working-time">(8:00AM - 21:00PM)</div> -->
                        <a class="go-right ftitle " href="mailto:<?php echo $contactemail; ?>" id="email_footer"><i style="font-size:18px" class="icon-email"></i> <span ><?php echo $contactemail; ?></span></a>
                        <?php get_footer_menu_items(19,"ho-tro","ftitle go-text-right","footerlist go-right go-text-right" );?>
                    </div>
                    <div class="col-xs-12 col-md-4 go-right menu-link-ft hidden-xs">
                        <h2 class="ftitle go-text-right"><strong><?php echo trans('0572');?></strong></h2>
                        <?php get_footer_menu_items(3,"about-us","ftitle go-text-right","footerlist go-right go-text-right" );?>
                    </div>
                    <div class="col-xs-12 col-md-4 go-right menu-link-ft hidden-xs">
                        <h2 class="ftitle go-text-right"><strong>Liên kết nhanh</strong></h2>
                        <div class="about-us">
                            <!--<h2 class="ftitle go-text-right"><strong>About Us</strong></h2>-->
                            <ul class="footerlist go-right go-text-right">
                                <li><a href="<?php echo base_url()?>bestchoice"  title="Khuyến mãi">Khuyến mãi</a></li>
                                <li><a href="<?php echo base_url()?>offers" title="Deals - Giảm giá">Deals - Giảm giá</a></li>
                                <li><a href="<?php echo base_url()?>offers/bestchoice" title="Voucher">Voucher</a></li>
                                <li><a href="<?php echo base_url()?>hotels/honeymoon" title="Honeymoon">Honeymoon</a></li>
                                <li><a href="<?php echo base_url()?>tours" title="Tours">Tours</a></li>
                                <li><a href="<?php echo base_url()?>blog" title="Tôi yêu du lịch">Tôi yêu du lịch</a></li>
                                <li>
                                    <a href="#checkbookingform" data-toggle="modal" data-content="Kiểm tra booking" rel="popover" data-placement="top" data-original-title="Kiểm tra booking" data-trigger="hover">Kiểm tra booking</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                                
                <div class="visible-xs" style="width: 100%;clear: left;height: 25px"></div>
                <a href="https://www.hospi.vn" class="visible-xs" style="display: block;margin-bottom: 5px;margin-top: 5px;margin-left: 15px"><img src="https://www.hospi.vn/themes/default/assets/img/logo-ft.png" class="img-responsive logo"/></a>
                <div class="col-md-4 go-right col-xs-12 visible-xs" id="contact">
                  <div class="footer-brand">
                    <div style="color: #fff;">HOSPI.vn: Đặt phòng khách sạn giá rẻ, combo khách sạn</div>
                    <div class="ftitle go-text-right">Lầu 1, Số 124 Khánh Hội, P.6, Quận 4, Tp. Hồ Chí Minh</div>
                    <div class="ftitle go-text-right">Tel: 028 3826 8797 - Fax: (028) 3826 8798</div>
                    <div class="ftitle go-text-right"><a class="purple" target="_blank" href="https://www.google.com/maps/place/124+Khánh+Hội,+phường+6,+Quận+4,+Hồ+Chí+Minh,+Việt+Nam/@10.7572978,106.6982959,17z/data=!3m1!4b1!4m5!3m4!1s0x31752f6d4faf461f:0xcf0c2485be1d0fdc!8m2!3d10.7572925!4d106.7004846"><i style="margin-left: -3px;" class="icon-location-6 go-right"></i>Bản đồ đến văn phòng Hospi</a></div>
                    <p style="color: #fff;">&copy; Bản quyền của Hospi Travel Co., Ltd</p>
                  </div>
                  <div class="scont" style="font-family:arial">
                    <div class="clearfix"></div>
                    <div id="social_footer go-right">
                      <a href="https://www.facebook.com/hospi.vn/" target="_blank"><img src="https://www.hospi.vn/uploads/images/social/14mwk4qrczfkcw4g44.png" class="social-icons-footer" /></a>
                      <a href="https://plus.google.com/u/0/104246180420952281462" target="_blank"><img src="https://www.hospi.vn/uploads/images/social/nmuccodyt00cs88k4g.png" class="social-icons-footer" /></a>
                      <a href="https://www.youtube.com/channel/UCxfzWdfkaDPWGIVrI2vKchg" target="_blank"><img src="https://www.hospi.vn/uploads/images/social/g0xrz89bm7sw08848.png" class="social-icons-footer" /></a>
                      <a href="https://www.linkedin.com/in/hospi/" target="_blank"><img src="https://www.hospi.vn/uploads/images/social/1iodmuvjtwys0ook8.png" class="social-icons-footer" /></a>
                      <a href="https://twitter.com/HOSPITRAVEL" target="_blank"><img src="https://www.hospi.vn/uploads/images/social/2kvq766k0qm8oskkk8.png" class="social-icons-footer" /></a>
                    </div>
                   <!--  <img src="https://www.hospi.vn/themes/default//assets/img/bocongthuong.png" width="152" height="57" data-retina="true" class="congthuong img-responsive">
                    <span class="">Xem thông tin tại đây !</span> -->
                    <p>2016 - Công ty TNHH Du lịch Hospi</p>
                       <!--  <p>Số ĐKKD 0314088534 do sở KHĐT Tp.HCM cấp ngày 31/10/201</p>
                        <p>Người chịu trách nhiệm nội dung : Võ Đình Chi</p> -->
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

                <div class="container">
                    <div class="clearfix">
                        <a href="<?php echo base_url()?>" title="Về Trang Chủ" style="  display: block;margin-top: 30px;margin-bottom: 30px;color: #fff;">
                            <i class="fa fa-angle-double-right"></i> Về Trang Chủ
                        </a>
                    </div>
                    <!-- clearfix -->
                   <!--  <div class="row hidden-xs">
                        <div class="col-sm-7 col-xs-12 wg-bt">
                            <div class="row link-ft-bt">
                                <div class="col-sm-3 col-xs-6">
                                    <a href="<?php //echo base_url()?>hotels" title="Khách Sạn">Khách Sạn</a>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <a href="<?php //echo base_url()?>tours" title="Tours">Tours</a>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <a href="<?php //echo base_url()?>hotels/honeymoon" title="HoneyMoon">HoneyMoon</a>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <a href="<?php //echo base_url()?>blog" title="Tôi Yêu Du Lịch">Tôi Yêu Du Lịch</a>
                                </div>
                            </div>
                        </div>
                        <!-- col-sm-6 
                        <div class="col-sm-5 col-xs-12 wg-bt">
                            <div class="social-wg">
                                <ul class="list-inline">
                                    <li>KẾT NỐI VỚI CHÚNG TÔI:</li>
                                    <li class="icon"><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li class="icon"><a href="#" title="google"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="icon"><a href="#" title="youtube"><i class="fa fa-youtube"></i></a></li>
                                    <li class="icon"><a href="#" title="instagram"><i class="fa fa-instagram"></i></a></li>
                                    <li class="icon"><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- col-sm-6 
                    </div> -->
                </div>
                <!-- End Hotels -->
            </div>
        </div>
    </div>
    <?php
}
?>
<?php include 'scripts.php'; ?>
<?php echo $app_settings[0]->google; ?>
<!-- Subiz -->
<script>
  (function(s, u, b, i, z){
    u[i]=u[i]||function(){
      u[i].t=+new Date();
      (u[i].q=u[i].q||[]).push(arguments);
    };
    z=s.createElement('script');
    var zz=s.getElementsByTagName('script')[0];
    z.async=1; z.src=b; z.id='subiz-script';
    zz.parentNode.insertBefore(z,zz);
  })(document, window, 'https://widgetv4.subiz.com/static/js/app.js', 'subiz');
  subiz('setAccount', 'acppjoihtmoaeia84875');
</script>
<!-- End Subiz -->
<style type="text/css">
    .block-panel-info{
    line-height: 25px;
    }
</style>
</body>
</html>