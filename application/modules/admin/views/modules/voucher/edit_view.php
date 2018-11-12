<!-- content-->
<div id="content_edit">
	<?php
	include "edit_data.php";
	?>
</div>
<!-- eq 4-->
<script type="text/javascript">
    $(document).ready(function () {
        var type = '<?=$type?>';
        changeType(type);
    });

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
        if (val == "combo") {
            $("#div_combo").show("slow");
        } else {
            $("#div_combo").hide("slow");
        }
    }

    function editVoucher() {
        simpleAjaxPost(
            "<?php echo base_url();?>admin/voucher/edit",
            "#content_edit",
            function (res) {
                window.location.replace(res.index_link);
            },
            function (res) {
                $("#content_edit").html(res.content);
                var message = "";
                $.each(res.error_message, function (index, value) {
                    message += value + '\n';
                    $("input[name=" + index + "]").css("border", "1px solid red");
                    $("select[name=" + index + "]").css("border", "1px solid red");
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