/*!
 * Product:        Social - Premium Responsive Admin Template
 * Version:        2.1.3
 * Copyright:      2015 cesarlab.com
 * License:        http://themeforest.net/licenses
 * Live Preview:   http://go.cesarlab.com/SocialAdminTemplate2
 * Purchase:       http://go.cesarlab.com/PurchaseSocial2
 */
if (typeof jQuery === 'undefined') { throw new Error('Social\'s JavaScript requires jQuery'); }

var Login;

Login = (function($) {
  "use strict";
  var init;
  init = function() {
    $("#btn-register-form").click(function() {
      $(".form-signup").show();
      $(".form-signin").hide();
      $("#shoeeee").hide();
    });
    $(".form-signup .btn-back").click(function() {
      $(".form-signup").hide();
      $(".form-signin").show();
      $("#shoeeee").show();
    });
    $("#link-forgot").click(function() {
      $(".form-forgot").show();
      $(".form-signin").hide();
      $("#shoeeee").hide();
    });
    $(".form-forgot .btn-back").click(function() {
      $(".form-forgot").hide();
      $(".form-signin").show();
      $("#shoeeee").show();
    });
  };
  return {
    init: init
  };
})(jQuery);
