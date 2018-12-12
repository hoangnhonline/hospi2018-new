<!DOCTYPE html>
<html ng-app="phptravelsApp">
  
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="author" content="HOSPI">
      <meta property="fb:app_id" content="159189514584032" />
      <title>Blog - Tôi yêu du lịch</title>
      <link rel="shortcut icon" href="https://www.hospi.vn/uploads/global/favicon.png">
      <link href="<?php echo $theme_url; ?>assets/css/bootstrap-modal.css" rel="stylesheet" media="screen">
      <link href="<?php echo $theme_url; ?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
      <link href="<?php echo $theme_url; ?>assets/css/bootstrap-slider.css" rel="stylesheet" media="screen">
      <link href="<?php echo $theme_url; ?>assets/css/custom.css" rel="stylesheet" media="screen">
      <!-- Duc add css file -->
      <link href="<?php echo $theme_url; ?>style.css" rel="stylesheet" media="screen">
        <link href="<?php echo $theme_url; ?>asset/css/styleNews.css" rel="stylesheet">
       <link href="<?php echo $theme_url; ?>asset/css/menu-blog.css" rel="stylesheet">
      <link href="<?php echo $theme_url; ?>asset/css/responsive-blog.css" rel="stylesheet">
      <!-- facebook --------> 
      <meta property="og:title" content="Blog - Tôi yêu du lịch"/>
      <meta property="og:site_name" content="HOSPI - Đặt phòng khách sạn"/>
      <meta property="og:description" content=""/>
      <meta property="og:publisher" content="https://www.facebook.com/HOSPI - Đặt phòng khách sạn"/>
      <script type="application/ld+json">{"@context":"http://schema.org/","@type":"Organization","name":"HOSPI - Đặt phòng khách sạn","url":"https://www.hospi.vn/","logo":"https://www.hospi.vn/uploads/global/favicon.png","sameAs":"https://www.facebook.com/HOSPI - Đặt phòng khách sạn","sameAs":"https://twitter.com/HOSPI - Đặt phòng khách sạn","sameAs":"https://www.pinterest.com/HOSPI - Đặt phòng khách sạn/","sameAs":"https://plus.google.com/u/0/HOSPI - Đặt phòng khách sạn/posts","contactPoint":{"@type":"ContactPoint","telephone":"028 3826 8797","contactType":"Customer Service"}}{"@context":"http://schema.org","@type":"WebSite","name":"HOSPI - Đặt phòng khách sạn","url":"https://www.hospi.vn"}  </script>
      <!--[if lt IE 9]>        <script src="/<?php echo $theme_url; ?>assets/js/html5shiv.js"></script> <script src="/<?php echo $theme_url; ?>assets/js/respond.min.js"></script><![endif]-->
      <!-- BASE CSS ---------> 
      <link href="<?php echo $theme_url; ?>style.css" rel="stylesheet">
      <style> @import "/<?php echo $theme_url; ?>childtheme/childstyle.css"; </style>
      <!-- Google Maps ------> <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAAgXXrHR9Rf4DY_zdtfkhlqplUtfaOonk&amp;libraries=places"></script>
      <!-- jQuery -----------> <script src="<?php echo $theme_url; ?>assets/js/jquery-1.11.2.min.js"></script>
       <script src="<?php echo $theme_url; ?>assets/js/wow.min.js"></script>
      <!-- RTL CSS ---------->     <!-- Mobile Redirect -->     <!--[if lt IE 7]>        
      <link rel="stylesheet" type="text/css" href="<?php echo $theme_url; ?>assets/css/font-awesome-ie7.css" media="screen" />
      <![endif]-->
      <link rel="stylesheet" href="<?php echo $theme_url; ?>assets/css/jquery-ui.css" />
   </head>
   <body id="top" class="blog">
      <div id="wait">
         <div class="lds-css ng-scope">
            <div style="width:100%;height:100%" class="lds-flickr">
               <!-- <div class="rotatingwait"></div> -->
               <div class="spinner">
                  <div class="dot1"></div>
                  <div class="dot2"></div>
                  <div class="dot3"></div>
               </div>
            </div>
         </div>
      </div>
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) return;
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=159189514584032";
         fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>
      <script src="//apis.google.com/js/platform.js" async defer></script>
          <?php $currenturl = base_url(uri_string());?>

      <!--hoangnhonline    <script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",59360]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>-->
      <!-- Duc add html header-top -->
      <div class="navbar navbar-static-top navbar-default">
         <div class="container">
            <div class="navbar row">
               <!-- Navigation-->
               <div class="col-md-3 col-xs-12 ">
                 <div class="navbar-header go-right hidden-xs">
                     <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                     <a href="blog.html" class="navbar-brand"><img src="<?php echo $theme_url;?>asset/img/logo-tintuc.png" alt="HOSPI - Đặt phòng khách sạn" class="logo"></a>
                  </div>
                   <div class="col-md-2 visible-xs">
                <div class="navbar-header go-right logo-mobile">
                       <a href="index.html" class="navbar-brand"><img src="<?php echo $theme_url;?>asset/img/logo-tintuc.png" alt="HOSPI - Đặt phòng khách sạn" class="logo"/></a>
                  </div>
                  <div class="menu-section clearfix" id="menumobilemain">
                     <div class="slicknav_menu">
                        <a href="#menumobile" data-type="menu" data-toggle="collapse" class="slicknav_btn">
                        <span class="icon-bar icon-1"></span>
                        <span class="icon-bar icon-2"></span>
                        <span class="icon-bar icon-3"></span>
                        <span class="slicknav_menutxt">MENU</span>
                        <span class="icon-down-menu ">
                        <i class="fa fa-caret-down"></i>
                        </span>
                        </a>
                        <ul class="slicknav_nav" aria-hidden="true" role="menu" id="menumobile" class="collapse out">
                           <li style="height: 95px">
                              <div class="col-md-3 cotent-tumlum col-xs-12">
                                 <span class="tum-lum-ks">Khách sạn</span>
                                 <span class="tum-lum-combo">Combo</span>
                                 <span class="tum-lum-uudai">Ưu đãi</span>
                                 <span class="tum-lum-bestch">Best choice</span>
                              </div>
                           </li>
                            <li><a data-type="menu" href="#"><i class="fa fa-angle-right"></i> Trang chủ</a></li>
                           <li>
                              <a data-type="menu" data-toggle="collapse" href="#menu-child-mobile" class="show-menu"><i class="fa fa-angle-right"></i> Điểm đến</a>
                              <ul class="menu-child" id="menu-child-mobile" class="collapse in">
                                 <li>
                                    <a href="">Du lịch cặp đôi</a>
                                 </li>
                                 <li>
                                    <a href="">Du lịch nước ngoài</a>
                                 </li>
                                 <li>
                                    <a href="">Du lịch tây nguyên</a>
                                 </li>
                              </ul>
                           </li>
                           <li><a data-type="menu" href="#"><i class="fa fa-angle-right"></i> Ẩm thực</a></li>
                           <li><a data-type="menu" href="#"><i class="fa fa-angle-right"></i> Kinh nghiệm</a></li>
                           <li><a data-type="menu" href="#"><i class="fa fa-angle-right"></i> Khách sạn & Resort</a></li>
                           <li><a data-type="menu" href="#"><i class="fa fa-angle-right"></i> Khuyến mãi</a></li>
                           <li><a data-type="menu" href="#"><i class="fa fa-angle-right"></i> Ảnh & Video</a></li>
                   
                           <li>
                              <div class="text-left item-contact">
                                 <div class="text-center class-hotrobandoc">Hỗ trợ bạn đọc</div>
                                 <div class="number-mobile text-center"><i class="fa fa-phone-square"></i> (028) 3826 8797</div>
                                
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>  
            </div>
               </div>
               <div class="col-md-5 col-xs-12">
                  <div class="col-md-2 class-button-baimoi col-xs-12">
                     <button>Bài mới</button>
                  </div>
                   <div class="col-md-10 col-xs-12 cau-hoi-mobile">
                     <ul class="top-baimoi">
                     <li><a href=""><i class="fa fa-square"></i>09 điểm lý tưởng cho bạn tại Châu Âu</a></li>
                     <li><a href=""><i class="fa fa-square"></i>09 điểm lý tưởng cho bạn tại Châu Âu</a></li>
                     <li><a href=""><i class="fa fa-square"></i>09 điểm lý tưởng cho bạn tại Châu Âu</a></li>
                       <li><a href=""><i class="fa fa-square"></i>Lại phải đi hội an để chụp 1000 kiểu ảnh quán mới...</a></li>
                  </ul>
                  </div>
                  
            </div>
            <div class="col-md-3 cotent-tumlum col-xs-12 hidden-xs">
               <span class="tum-lum-ks">Khách sạn</span>
               <span class="tum-lum-combo">Combo</span>
               <span class="tum-lum-uudai">Ưu đãi</span>
               <span class="tum-lum-bestch">Best choice</span>
            </div>
         </div>
         <div class="menu-blog hidden-xs row">
            <div class="container">
               <ul class="nav navbar2">
                  <li class="blog<?php echo $current == '' ? ' active' : '' ;?>">
                        <a href="<?php echo base_url('blog'); ?>"> Trang chủ </a>
                    </li>
                    <?php
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            echo '<li class="blog dropdown' . ($current == $category->slug ? ' active' : '') . '">'
                                . '<a class="dropdown-toggle" href="' . base_url('blog/category/' . $category->slug) . '"> ' . $category->name . ' </a>'
                            . '</li>';
                        }
                    }
                    ?>

               </ul>
            </div>
         </div>

      </div>
      <!-- End navbar -->