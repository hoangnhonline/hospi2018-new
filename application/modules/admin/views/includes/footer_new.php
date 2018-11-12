<!-- End Div Main-->
</div>
<!-- Bootstrap JS-->
<script src="<?php echo base_url(); ?>assets_admin_new/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin_new/js/bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin_new/js/sidebar.js"></script>
<script src="<?php echo base_url(); ?>assets_admin_new/js/panels.js"></script>


<!-- ckeditor -->


<!-- icheck -->
<script src="<?php echo base_url(); ?>assets_admin_new/include/icheck/icheck.min.js"></script>
<link href="<?php echo base_url(); ?>assets_admin_new/include/icheck/square/grey.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets_admin_new/js/jquery.number.min.js"></script>
<script>
    $(function () {
        setInterval(function () { /*getNotifications(); */
        }, 3000);

        var sideClass = $("#sidebarclass").prop('class');
        $('body').addClass(sideClass);
        $(".navtogglebtn").on('click', function () {
            var sidebar = '';
            if ($('body').hasClass('reduced-sidebar')) {
                sidebar = "";
            } else {
                sidebar = "reduced-sidebar";
            }

            $.post("<?php echo base_url(); ?>admin/ajaxcalls/reduceSidebar", {sidebar: sidebar}, function (resp) {

            });

        });

    });

    function getNotifications() {
        $.post("<?php echo base_url(); ?>admin/ajaxcalls/notifications", {}, function (response) {

            var resp = $.parseJSON(response);
            if (resp.totalReviews > 0) {

                $(".notifyRevCount").html(resp.totalReviews);
                $(".revnotifyHeader").show();
                /*if($("li").hasClass("notificationReviews")){

				}else{

				}*/
                $(".notificationReviews").remove();
                $(".revnotifyHeader").after(resp.revhtml);


            } else {
                $(".revnotifyHeader").hide();
                $(".notifyRevCount").html("");
            }

            //Supplier notifications
            if (resp.totalAccounts > 0) {
                $(".notifyAccountsCount").html(resp.totalAccounts);
                $(".accountsnotifyHeader").show();
                if ($("li").hasClass("notificationAccounts")) {

                } else {
                    $(".accountsnotifyHeader").after(resp.accountshtml);
                }

            } else {
                $(".accountsnotifyHeader").hide();
                $(".notifyAccountsCount").html("");
            }

            //Booking notifications
            if (resp.totalBookings > 0) {
                $(".notifyBookingsCount").html(resp.totalBookings);
                $(".bookingsnotifyHeader").show();
                if ($("li").hasClass("notificationBookings")) {

                } else {
                    $(".bookingsnotifyHeader").after(resp.bookingshtml);
                }

            } else {
                $(".bookingsnotifyHeader").hide();
                $(".notifyBookingsCount").html("");
            }

        });
    }

    var cb, optionSet1;

    $(function () {
        $('input.number').number(true, 0);
        var checkAll = $('input.all');
        var checkboxes = $('input.checkboxcls');

        $('input').iCheck({
            checkboxClass: "icheckbox_square-grey",
        });

        checkAll.on('ifChecked ifUnchecked', function (event) {
            if (event.type == 'ifChecked') {
                checkboxes.iCheck('check');
            } else {
                checkboxes.iCheck('uncheck');
            }
        });

        checkboxes.on('ifChanged', function (event) {
            if (checkboxes.filter(':checked').length == checkboxes.length) {
                checkAll.prop('checked', 'checked');
                var _typename = $(this).attr("name");
                if (_typename == "option") {
                    var _val = $(this).val();

                    if (_val == 0) {
                        $("#content-video").show();
                        $("#content-slide").hide();
                        $('#slide-check').iCheck('uncheck');
                    }
                    else {
                        $("#content-video").hide();
                        $("#content-slide").show();
                        $('#video-check').iCheck('uncheck');
                    }
                }
            } else {
                checkAll.removeProp('checked');
            }
            checkAll.iCheck('update');


        });
    });

    $(".radio").iCheck({
        checkboxClass: "icheckbox_square-grey",
        radioClass: "iradio_square-grey"
    });
</script>

<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets_admin_new/include/datepicker/datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin_new/include/datepicker/datepicker.css"/>

<script>
    var fmt = "dd/mm/yyyy";
    if (top.location != location) {
        top.location.href = document.location.href;
    }
    $(function () {
        window.prettyPrint && prettyPrint();
        $('.dob').datepicker({format: fmt, autoclose: true}).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });

        $('#dp1').datepicker();
        $('#dp2').datepicker();
        $('#dp3').datepicker();
        $('#dp4').datepicker();

// disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        var checkin = $('#fromdate1').datepicker({
            format: fmt, 
            onRender: function (date) {
           
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
              if (ev.date.valueOf() > checkout.date.valueOf()) {
                  var newDate = new Date(ev.date)
                  newDate.setDate(newDate.getDate() + 1);
                  checkout.setValue(newDate);              
              } 
            checkin.hide();
            $('#todate1')[0].focus();
        
        }).data('datepicker');
        var checkout = $('#todate1').datepicker({
            format: fmt,
            onRender: function (date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {

            checkout.hide();           
        }).data('datepicker');


        var checkin2 = $('#fromdate2').datepicker({
            format: fmt, 
            onRender: function (date) {
           
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {          
           if (ev.date.valueOf() > checkout2.date.valueOf()) {
                  var newDate = new Date(ev.date)
                  newDate.setDate(newDate.getDate() + 1);
                  checkout2.setValue(newDate);              
              }
            checkin2.hide();
            $('#todate2')[0].focus();
        }).data('datepicker');
        var checkout2 = $('#todate2').datepicker({
            format: fmt,
            onRender: function (date) {
                return date.valueOf() <= checkin2.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            checkout2.hide();
        }).data('datepicker');

        var checkin3 = $('#fromdate3').datepicker({
            format: fmt, 
            onRender: function (date) {
           
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {          
           if (ev.date.valueOf() > checkout3.date.valueOf()) {
                  var newDate = new Date(ev.date)
                  newDate.setDate(newDate.getDate() + 1);
                  checkout3.setValue(newDate);              
              }
            checkin3.hide();
            $('#todate3')[0].focus();
        }).data('datepicker');
        var checkout3 = $('#todate3').datepicker({
            format: fmt,
            onRender: function (date) {
                return date.valueOf() <= checkin3.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            checkout3.hide();
        }).data('datepicker');


        var checkin4 = $('#fromdate4').datepicker({
            format: fmt, 
            onRender: function (date) {
           
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {          
           if (ev.date.valueOf() > checkout4.date.valueOf()) {
                  var newDate = new Date(ev.date)
                  newDate.setDate(newDate.getDate() + 1);
                  checkout4.setValue(newDate);              
              }
            checkin4.hide();
            $('#todate4')[0].focus();
        }).data('datepicker');
        var checkout4 = $('#todate4').datepicker({
            format: fmt,
            onRender: function (date) {
                return date.valueOf() <= checkin4.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            checkout4.hide();
        }).data('datepicker');
       
    });
</script>

<!-- timepicker -->
<script src="<?php echo base_url(); ?>assets_admin_new/include/timepicker/timepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin_new/include/timepicker/timepicker.css"/>
<script>
    $(function () {
        $('.timepicker').clockface();
    });
</script>

<!-- dronzone -->
<link href="<?php echo base_url(); ?>assets_admin_new/include/dropzone/dropzone.css" type="text/css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>assets_admin_new/include/dropzone/dropzone.min.js"></script>


<!----Custom functions file---->
<script src="<?php echo base_url(); ?>assets_admin_new/js/funcs.js"></script>
<!----Custom functions file---->

<!-- pnotify -->
<script src="<?php echo base_url(); ?>assets_admin_new/include/pnotify/pnotify.custom.min.js"></script>
<link href="<?php echo base_url(); ?>assets_admin_new/include/pnotify/pnotify.custom.css" rel="stylesheet">


<!-- select2 -->
<link href="<?php echo base_url(); ?>assets_admin_new/include/select2/select2.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets_admin_new/include/select2/select2-default.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets_admin_new/include/select2/select2.min.js"></script>
<script>
    $(function () {
        $('.chosen-select').select2({width: '100%', maximumSelectionSize: 1});
        $(document).ready(function () {
            $(".chosen-multi-select").select2({width: '100%',});
        });
    });

    function slideout() {
        setTimeout(function () {
            $(".alert-success").fadeOut("slow", function () {
            });
            $(".alert-danger").fadeOut("slow", function () {
            });
        }, 4000);
    }
</script>

<!-- smothwhell starts-->
<script src="<?php echo base_url(); ?>assets_admin_new/include/smoothwheel/smoothwheel.js"></script>
<!-- smothwhell ends-->

<!-- jQuery slimScroll-->
<script src="<?php echo base_url(); ?>assets_admin_new/js/jquery.slimscroll.min.js"></script>
<script>
    window.jQuery.ui || document.write('<script src="<?php echo base_url(); ?>assets_admin_new/js/jquery.slimscroll.min.js"><\/script>')
</script>
<script src="<?php echo base_url(); ?>assets_admin_new/js/wow.min.js"></script>
<script>
    /*<![CDATA[*/
    $(function () {
        $(".social-sidebar").socialSidebar();
        $('.main').panels();
    });
    /*]]>*/
</script>
</body>
</html>