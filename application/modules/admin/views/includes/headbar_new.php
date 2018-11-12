  <header>
    <!-- BEGIN NAVBAR-->
  <input type="hidden" id="sidebarclass" class="">
  <nav role="navigation" class="navbar navbar-fixed-top navbar-super social-navbar">
    <div class="navbar-header">
      <a href="https://www.hospi.vn/admin" class="navbar-brand">
      <i class="fa fa-inbox light"></i>
      <span>Dashboard</span>
      </a>
    </div>
    <div class="navbar-toggle navtogglebtn"><i class="fa fa-align-justify"></i>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="dropdown navbar-super-fw hidden-xs">
          <a>
            <span>
              <script> function startTime() { var today=new Date(); var h=today.getHours(); var m=today.getMinutes(); var s=today.getSeconds(); m=checkTime(m); s=checkTime(s); document.getElementById('txt').innerHTML=h+":"+m+":"+s; t=setTimeout(function(){startTime()},500); } function checkTime(i) { if (i<10) { i="0" + i; } return i; } </script>
              <strong>
                <body onload="startTime()" class=""></body>
                <div class="pull-left  wow fadeInLeft animated" id="txt"></div>
              </strong>
              &nbsp;|&nbsp;
              <small class="pull-right wow fadeInRight animated">
                <script> var tD = new Date(); var datestr =  tD.getDate(); document.write(""+datestr+""); </script> <script type="text/javascript"> var d=new Date(); var weekday=new Array("","","","","","", ""); var monthname=new Array("January","February","March","April","May","June","July","August","September","Octobar","November","December"); document.write(monthname[d.getMonth()] + " "); </script>
                <script> var tD = new Date(); var datestr = tD.getFullYear(); document.write(""+datestr+""); </script>
              </small>
            </span>
          </a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- END DROPDOWN MESSAGES-->
        <li class="divider-vertical"></li>
        <!-- BEGIN EXTRA DROPDOWN-->
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle"><i class="fa fa-caret-down fa-lg"></i>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="<?php echo base_url(); ?>admin/profile/"><i class="glyphicon glyphicon-user"></i>&nbsp;My Profile</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/logout"><i class="fa fa-sign-out"></i>&nbsp;Log Out</a>
            </li>
            <!--<li class="divider"></li>
            <li>
              <a href="//phptravels.org/submitticket.php?step=2&deptid=1" target="_blank"><i class="fa fa-info"></i>&nbsp;Help</a>
            </li>-->
          </ul>
        </li>
        <!-- END EXTRA DROPDOWN-->
      </ul>
            <!--<div class="nav-indicators">
        <ul class="nav navbar-nav navbar-right nav-indicators-body">
          <li class="dropdown nav-notifications">
            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle">
            <span class="badge notifyRevCount"></span><i class="fa fa-comments fa-lg"></i>
            </a>
            <ul class="dropdown-menu revdropdown">
              <li class="nav-notifications-header revnotifyHeader">
                <a tabindex="-1" href="javascript:void(0)">You have <strong><span class="notifyRevCount"></span></strong> Pending Reviews</a>
              </li>
            </ul>
          </li>
          <li class="dropdown nav-messages">
            <a href="javascript:void(0)" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle">
            <span class="badge notifyAccountsCount"></span><i class="fa fa-user fa-lg"></i>
            </a>
            <ul class="dropdown-menu accountsdropdown">
              <li class="nav-messages-header accountsnotifyHeader">
                <a tabindex="-1" href="javascript:void(0)">You have <strong><span class="notifyAccountsCount"></span></strong> Pending Supplier(s)</a>
              </li>
              <li class="nav-messages-footer">
                <a tabindex="-1" href="https://www.hospi.vn/admin/accounts/suppliers/">View all Suppliers</a>
              </li>
            </ul>
          </li>
          <li class="dropdown nav-messages">
            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle">
            <span class="badge notifyBookingsCount"></span><i class="fa fa-file-text fa-lg"></i>
            </a>
            <ul class="dropdown-menu bookingsdropdown">
              <li class="nav-messages-header bookingsnotifyHeader">
                <a tabindex="-1" href="javascript:void(0)">You have <strong><span class="notifyBookingsCount"></span></strong> new bookings</a>
              </li>
              <li class="nav-messages-footer">
                <a tabindex="-1" href="https://www.hospi.vn/admin/bookings/">View all Bookings</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>-->
          </div>
    <!-- /.navbar-collapse-->
  </nav>
  <!-- END NAVBAR-->
</header>