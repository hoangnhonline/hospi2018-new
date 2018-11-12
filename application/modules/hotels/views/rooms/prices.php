<?php 
$roomDetail = $room[0];
$priceMainDetail = $priceKmDetail = $priceExtraDetail = $priceUudaiDetail = [];
if(!empty($detailPrice)){
  $tmp = $detailPrice[0];
  if($tmp->type == 1){
    $priceMainDetail = $tmp;
  }elseif($tmp->type == 2){
    $priceKmDetail = $tmp;
  }elseif($tmp->type == 3){
    $priceExtraDetail = $tmp;
  }elseif($tmp->type == 4){
    $priceUudaiDetail = $tmp;
  }
}
//var_dump($roomDetail);die;
?>
<a href="<?php echo base_url(); ?>admin/hotels/rooms?room_hotel=<?php echo $roomDetail->hotel_id; ?>" class="btn btn-default btn-sm">Quay lại</a>
<h3 style="margin-top: 5px;color:#0073aa"><?php echo $roomDetail->room_title; ?> - <?php echo $roomDetail->hotel_title; ?></h3>
<?php echo $errormsg;?>

<?php include 'application/modules/hotels/views/rooms/price-main.php'; ?>

<?php include 'application/modules/hotels/views/rooms/price-km.php'; ?>

<?php include 'application/modules/hotels/views/rooms/price-extra.php'; ?>

<?php include 'application/modules/hotels/views/rooms/price-uudai.php'; ?>

<style>
 .panel-body h4{
    font-size: 14px;
  }
  .col-md-1{
    width: 122px !important;
  }
  .input {
  width:60px;
  }
  .input-day{
    width: 120px;
  }
  .input-day-mon{
    width: 170px;
  }
  .datepicker{
    left: 30px !important;
    margin-top: 60px !important;
  }
  .panel-body table td, .panel-body table th{
    vertical-align: middle !important;
  }
  .panel-default > .panel-heading {
      color: #FFF;
      background-color: #660033;
      border-color: #FFF;
      text-transform: uppercase;
  }
  .panel-body{
    padding-top: 0px !important;
  }
  .panel-heading  a{
    color: #FFF !important;
    text-decoration: none;
  }
  .panel-heading  a:before {
     font-family: 'Glyphicons Halflings';
     content: "\e114";
     float: right;
     transition: all 0.5s;
  }
  .panel-heading.active a:before {
    -webkit-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    transform: rotate(180deg);
  } 
  .panel{
    margin-bottom: 0px;
  }
</style>
<script type="text/javascript">
$(function(){

   $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
  $(".delete").click(function(){
      var id =  $(this).attr('id');
      $.alert.open('confirm', 'Bạn chắc chắn muốn xóa?', function(answer) {
         if (answer == 'yes'){
            $.post("<?php echo $delurl;?>", { id: id }, function(theResponse){
            $("#tr_"+id).fadeOut('slow');
         });
       }
        });
    });
    $('.copyPrice').click(function(){      
      obj = $(this);
      value = obj.parent().find('.price-copy').val();      
      parent = obj.parents('.gia_main_div');
      parent.find('.week').val(value);
    });
    $('.copyPriceProfit').click(function(){      
      obj = $(this);
      value = obj.parent().find('.price-copy-profit').val();      
      parent = obj.parents('.loi_nhuan_div');
      parent.find('.week').val(value);
    });
  });
 $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });

</script>