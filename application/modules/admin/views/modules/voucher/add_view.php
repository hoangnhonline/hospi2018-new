<!-- content-->
<div id="content_add">
	<?php
	include "add_data.php";
	?>
</div>
<!-- eq 4-->
<script type="text/javascript">

	$(document).ready(function(){
        $("#div_combo").hide("slow");
	});

    function calculateDem() {
        alert("a");
        var start_date = $("#txt_start_date").val();
        var end_date = $("#txt_end_date").val();
        simpleAjaxPost(
            "<?php echo base_url();?>admin/voucher/calculate_dem?start_date=" + start_date + "&end_date=" + end_date,
            null,
            function (res) {
                $("#b_so_dem").html(res.sodem);
            }
        );

    }

    function changeHotel() {
        simpleAjaxPost(
            "<?php echo base_url();?>admin/voucher/get_room_by_hotel_id",
            "#div_hotel",
            function (res) {
                $("#education-box").html(res.content);
                //$("#txt_info").html(res.hotel_detail.hotel_desc);
                $("#txt_cancel_condition").html(res.hotel_detail.hotel_policy);
                $("#div_combo").html(res.combos);
            }
        );
    }

    function changeType(val) {
        if(val == "combo"){
            $("#div_combo").show("slow");
        }else{
            $("#div_combo").hide("slow");
        }
    }

    function createVoucher() {
        simpleAjaxPost(
            "<?php echo base_url();?>admin/voucher/add",
            "#content_add",
            function (res) {
                window.location.replace(res.index_link);
            },
	        function (res) {
				$("#content_add").html(res.content);
				var message = "";
                $.each(res.error_message, function( index, value ) {
                    message += value + '\n';
                    $("input[name="+index+"]").css("border", "1px solid red");
                    $("select[name="+index+"]").css("border", "1px solid red");
                });
                alert(message);
            }
        );
    }

    function addRoom(element) {
        simpleAjaxPost(
            "<?php echo base_url();?>admin/voucher/get_room_by_hotel_id",
            "#div_hotel",
            function (res) {
                $("#education-box").append(res.content);
            }
        );
    }

    function removeRoom(element) {
        element.parents('.clonedEducation').remove();
    }

</script>