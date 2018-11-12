  <html lang="en">
  
<!-- Mirrored from www.hospi.vn/admin by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jan 2018 09:46:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://www.hospi.vn/uploads/global/favicon.png">
    <title>Administator Login</title>
    <link href="<?php echo base_url(); ?>/assets_admin_new/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets_admin_new/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets_admin_new/css/login.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets_admin_new/css/facebook.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets_admin_new/css/admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets_admin_new/css/fa.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets_admin_new/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/include/login/ladda-themeless.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>/assets/js/jquery-1.11.2.js"></script>
    <script src="<?php echo base_url(); ?>/assets/include/login/spin.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/include/login/ladda.min.js"></script>
  </head>
  <style>
    body {
    width: 100%;
    height: 100%;
    background-color:#150A29;
    background-image: url('<?php echo base_url(); ?>assets_admin_new/img/11.png');
    background-size: cover;
    }
    #rotatingDiv {
    display: block;
    margin: 32px auto;
    height: 100px;
    width: 100px;
    -webkit-animation: rotation .9s infinite linear;
    -moz-animation: rotation .9s infinite linear;
    -o-animation: rotation .9s infinite linear;
    animation: rotation .9s infinite linear;
    border-left: 8px solid rgba(0,0,0,.20);
    border-right: 8px solid rgba(0,0,0,.20);
    border-bottom: 8px solid rgba(0,0,0,.20);
    border-top: 8px solid rgba(33,128,192,1);
    border-radius: 100%;
    }
    @keyframes rotation {
    from {
    transform: rotate(0deg);
    }
    to {
    transform: rotate(359deg);
    }
    }
    @-webkit-keyframes rotation {
    from {
    -webkit-transform: rotate(0deg);
    }
    to {
    -webkit-transform: rotate(359deg);
    }
    }
    @-moz-keyframes rotation {
    from {
    -moz-transform: rotate(0deg);
    }
    to {
    -moz-transform: rotate(359deg);
    }
    }
    @-o-keyframes rotation {
    from {
    -o-transform: rotate(0deg);
    }
    to {
    -o-transform: rotate(359deg);
    }
    }
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
    transition: background-color 5000s ease-in-out 5s;
    }
  </style>
  <script>
    $(function() {
      Login.init()
    });
  </script>
  <script type="text/javascript">
    $(function () {
       //login functionality
    $(".form-signin").on('submit',function(){
    $(".resultlogin").html("<div class='alert alert-info loading wow fadeOut animated'>Hold On...</div>");
    $.post("<?php echo base_url().$this->uri->segment(1);?>/login",$(".form-signin").serialize(), function(response){
     var resp = $.parseJSON(response);
      console.log(resp);
     if(!resp.status){
    $(".resultlogin").html("<div class='alert alert-danger loading wow fadeIn animated'>"+resp.msg+"</div>");
    }else{
    $(".resultlogin").html("<div class='alert alert-success login wow fadeIn animated'>Redirecting Please Wait...</div>");
    window.location.replace(resp.url);
     }

    }); });
    // end login functionality

    // start password reset functionality
    $(".resetbtn").on('click',function(){
    var resetemail = $("#resetemail").val();
    if(resetemail == ""){
      alert("Please Enter Email Address");
    }else{
     $(".resultreset").html("<div id='rotatingDiv'></div>");
    $.post("<?php echo base_url().$this->uri->segment(1);?>/resetpass",$("#passresetfrm").serialize(), function(response){

    if($.trim(response) == '1'){
    $(".resultreset").html("<div class='alert alert-success'>New Password sent to "+resetemail+", Kindly check email.</div>");

    }else{
    $(".resultreset").html("<div class='alert alert-danger'>Email Not Found</div>");

    } });
    }
     });
    // end password reset functionality

    });
  </script>
  <div class="container">
    <!-- BEGIN SIGNIN SECTION-->
    <form method="POST" role="form" style="" class="form-signin form-horizontal wow flipInX animated" style="display: block;" onsubmit="return false;">
      <!-- <div class="container">
        <div class="col-xs-12 text-center">
          <img src="<?php //echo base_url(); ?>assets_admin_new/img/logo-white.png" class="img-responsive">
        </div>
      </div> -->
      <img src="<?php echo base_url(); ?>assets_admin_new/img/admin.png" class="center-block" style="width:78px;height:60px" alt="" />
      <h2 class="form-heading text-center" style="font-size: 12px;">Vui lòng đăng nhập</h2>
       <div class="form-group">
          
          <input type="text" name="email" placeholder="Emailđăng nhập" required="" autofocus="" class="form-control">
        </div>
        <div class="form-group">
          
          <input type="password" name="password" placeholder="Mật khẩu" required="" class="form-control">
        </div>
        <div class="col-xs-6">
          <div class="form-group">
          
         <input type="checkbox" name="remember" value="remember-me"> Ghi nhớ mật khẩu
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
          
          <button type="submit" class="btn btn-primary btn-block ladda-button" data-style="zoom-in">Đăng nhập</button>
          </div>
        </div>
      
      <div class="forget-password">Bạn quên mật khẩu?
        <a id="link-forgot" href="#" style="color:#009999">(lấy lại mật khẩu)</a>
      </div>
      <div class="resultlogin"></div>
     
    </form>
     <div class="col-xs-12" id="shoeeee" style="color: white;text-align: center;    padding-left: 213px;
    padding-right: 247px;">
        <p>Đây là hệ thống bảo mật của HOSPI ,Tất cả các nhân viên khi được quyền truy cập phải tuân theo quy định công ty đề ra .và không được cho người thứ 2 biết mật khẩu cũng như thông tin đăng nhập vào hệ thống này</p>
      </div>
    <!--<p class="text-center" style="color:#ccc"> Powered by  <a target="_blank" style="color: #FCFCFC" href="http://phptravels.com"><b>PHPTRAVELS</b></a> <a href="http://phptravels.com/change-log/#v5.3"></a>v5.3</p>-->
    <!-- END SIGNIN SECTION-->
    <!-- BEGIN SIGNUP SECTION-->
    <!-- BEGIN FORGOT PASSWORD SECTION-->
    <form role="form" class="form-forgot form-horizontal wow flipInY animated" style="display: none; margin-top:180px;"  id="passresetfrm" onsubmit="return false;">
      <h2 class="form-heading text-center"> Bạn quên mật khẩu</h2>
      <div class="resultreset"></div>
      <div style="font-size: 12px;" class="text-center">Vui lòng nhập email để lấy lại mật khẩu</div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-envelope"></i>
        </span>
        <input type="email" id="resetemail" name="email" placeholder="Email" class="form-control">
      </div>
      <br>
      <div class="form-actions">
        <button type="button" class="btn btn-primary btn-back" style="color: #009999"><i class="fa fa-angle-left"></i>&nbsp;Trở lại</button>
        <button id="btn-forgot" type="button" class="btn btn-success pull-right resetbtn ladda-button">Lấy lại mật khẩu</button>
      </div>
    </form>
    <!-- END FORGOT PASSWORD SECTION-->
  </div>
  <script>
    // Bind normal buttons
    Ladda.bind( 'div:not(.progress-demo) button', { timeout: 2000 } );

    // Bind progress buttons and simulate loading progress
    Ladda.bind( '.progress-demo button', {
      callback: function( instance ) {
        var progress = 0;
        var interval = setInterval( function() {
          progress = Math.min( progress + Math.random() * 0.1, 1 );
          instance.setProgress( progress );
          if( progress === 1 ) {
            instance.stop();
            clearInterval( interval );
          }
        }, 200 );
      }
    } );
  </script>
  <script src="<?php echo base_url(); ?>/assets/js/login.js"></script>
  <!-- icheck -->
  <script src="<?php echo base_url(); ?>/assets/include/icheck/icheck.min.js"></script>
  <link href="<?php echo base_url(); ?>/assets/include/icheck/square/grey.css" rel="stylesheet">
  <script>
    var cb, optionSet1;
        $(".checkbox").iCheck({
          checkboxClass: "icheckbox_square-grey",
          radioClass: "iradio_square-grey"
        });

        $(".radio").iCheck({
          checkboxClass: "icheckbox_square-grey",
          radioClass: "iradio_square-grey"
        });
  </script>