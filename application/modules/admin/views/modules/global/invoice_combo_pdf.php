<?php
if($invoice->status =='paid'){
  $payment_status ="Đã thanh toán";
}elseif($invoice->status =='unpaid'){
   $payment_status ="Chưa thanh toán";
}elseif($invoice->status =='reserved'){
   $payment_status ="Đã cọc";
}elseif($invoice->status =='unpaid'){
   $payment_status ="Đã Hủy";
}
?>
<!DOCTYPE html>
<html>
<body>
<style>
tr:hover {background-color: #f5f5f5;}
th, td {
    border-bottom: 1px solid #ddd;
    padding:10px;
    text-align: left;
}
</style>
<table style="width:100%">
  <tr>
    <td><img src="https://www.hospi.vn/themes/default/assets/img/logo.png" alt="HOSPI - Đặt phòng khách sạn" class="logo"></td>
    <td>Hỗ trợ khách hàng (028) 3826 8797<br>
Hotline 09 6868 0106</td> 
  </tr>
  <tr>
    <th><img src="http://thietkewebdalat.net/assets/img/logo-voucher.png" class="img-responsive"></th>
    <td>Phiếu xác nhận thanh toán<br>Ngày 27/01/2018</td>
  </tr>
</table>
<table style="width:100%">
  <tr>
    <th>Mã booking: </th>
    <td>HP109817</td> 
  </tr>
  <tr>
    <th>Tình trạng: </th>
    <td>Chưa thanh toán</td>
  </tr>
</table>
<table style="width:100%">
  <tr>
    <th><button>In invoice</button></th>
    <td><button>Tải file PDF</button></td> 
  </tr>
</table>
<h2>Thông tin cá nhân</h2>

<table style="width:100%">
  <tr>
    <th>Họ tên của bạn</th>
    <td>Võ đình chi</td> 
  </tr>
  <tr>
    <th>Email</th>
    <td>dinhchi@hospi.vn</td> 
  </tr>
  <tr>
    <th>Số điện thoại</th>
    <td>0903455152</td> 
  </tr>
  <tr>
    <th>Địa chỉ</th>
  <td>Lầu 1,phòng 101, số 124 khánh hội ,quận 4, Tp.Hồ Chí Minh, Việt Nam</td>
  </tr>
    <tr>
    <th>Yêu cầu khác</th>
  <td>Sắp xếp phòng gần nhau</td>
  </tr>
</table>
<h2>Thông tin hoá đơn</h2>

<table style="width:100%">
  <tr>
    <th>Tên công ty</th>
    <td>Công Ty TNHH Du Lịch Hospi</td> 
  </tr> 
  <tr>
    <th>Mã số thuế</th>
    <td>03140885434</td> 
  </tr>
  <tr>
    <th>Địa chỉ</th>
  <td>Lầu 1,phòng 101, số 124 khánh hội ,quận 4, Tp.Hồ Chí Minh, Việt Nam</td>
  </tr>

</table>
<h2>Phương thức thanh toán</h2>

<table style="width:100%">
  <tr><td>Quý khách đã chọn hình thức thanh toán Thanh toán tại nhà</td></tr> 
   <tr><td>Quý khách đã lựa chọn phương thức thanh toán tại nhà.Hospi chỉ hỗ trợ thu tiền tại Tp.Hồ Chí Minh và mức thu phí được áp dụng</td></tr>
   <tr><td>Quận 1,Quận 3,Quận 4 ,Quận 5 thu phí 10.000 VND (miễn phí cho đơn phòng trên 5.000.000 VND) * Quận 10,Quận 7,Quận 11 ,Quận Bình Thạnh,Quận Tân Bình,Phú Nhuận thu phí 20.000 VND (miễn phí cho đơn phòng trên 10.000.000 VND)</td></tr>
   <tr><td>* Quận Tân Phú,Bình Tân,Quận 2 ,Quận Thủ Đức thu phí 50.000 VND (miễn phí cho đơn phòng trên 20.000.000 VND)</td></tr> 
   <tr><td>* Đối với các quận còn lại sẽ báo mức thu phí qua điện thoại mức giá tùy thuộc vào đơn phòng được gửi vào email của quý khách để tiện cho việc thanh toán dễ dàng</td></tr> 
   <tr><td>Quý khách đã chọn hình thức thanh toán Thanh toán tại nhà</td></tr>

</table>
<table style="width:100%">
  <tr>
    <th>Địa chỉ thu tiền</th>
    <td>Lầu 1,phòng 101, số 124 khánh hội ,quận 4, Tp.Hồ Chí Minh, Việt Nam</td> 
  </tr> 
  </table>
  <h2>Ghi chú</h2>

<table style="width:100%">
  <tr><td>Quý khách đã chọn hình thức thanh toán Thanh toán tại nhà</td></tr> 
   <tr><td>Quý khách đã lựa chọn phương thức thanh toán tại nhà.Hospi chỉ hỗ trợ thu tiền tại Tp.Hồ Chí Minh và mức thu phí được áp dụng</td></tr>
   <tr><td>Quận 1,Quận 3,Quận 4 ,Quận 5 thu phí 10.000 VND (miễn phí cho đơn phòng trên 5.000.000 VND) * Quận 10,Quận 7,Quận 11 ,Quận Bình Thạnh,Quận Tân Bình,Phú Nhuận thu phí 20.000 VND (miễn phí cho đơn phòng trên 10.000.000 VND)</td></tr>
   <tr><td>* Quận Tân Phú,Bình Tân,Quận 2 ,Quận Thủ Đức thu phí 50.000 VND (miễn phí cho đơn phòng trên 20.000.000 VND)</td></tr> 
   <tr><td>* Đối với các quận còn lại sẽ báo mức thu phí qua điện thoại mức giá tùy thuộc vào đơn phòng được gửi vào email của quý khách để tiện cho việc thanh toán dễ dàng</td></tr> 
   <tr><td>Quý khách đã chọn hình thức thanh toán Thanh toán tại nhà</td></tr>


</table>
  <h2>Lưu ý</h2>

<table style="width:100%">
  <tr><td>Theo quy định của khách sạn giờ nhận phòng: 14:00 PM và Giờ trả phòng: 12:00 PM</td></tr> 
   <tr><td>Trong trường hợp đến khách sạn, resort sớm và muốn nhận phòng sớm hơn theo quy định. Vui lòng liên hệ với tiếp tân để được hỗ trợ và việc check-in sớm còn tùy thuộc vào tình trạng phòng trống ngày bạn đến. Không được xác nhận trước.</td></tr>
   <tr><td>Quý khách vui lòng mang CMND, Hộ chiếu....(Giấy tờ tùy thân theo luật pháp Việt Nam) và Phiếu xác nhận của HOSPI giao cho tiếp tân khi làm thủ tục nhận phòng.</td></tr> 
   <tr><td>Theo Quy định của luật pháp Việt Nam. Khi 1 người mang quốc tịch Việt Nam và một người mang quốc tịch nước ngoài ở chung phòng thì phải có giấy kết hôn.</td></tr> 
   <tr><td>Nếu Quý khách cần hỗ trợ thông tin về (Vật nuôi, xe lăn, nôi em bé...) Vui lòng gọi: (028) 3826 8797 hoặc Hotline: 09 6868 0106</td></tr>
</table>
  <h2>Đơn phòng</h2>
  <table style="width:100%">
  <tr><td><img src="https://www.hospi.vn/uploads/images/hotels/slider/thumbs/528771_Novotel-Phu-Quoc-Resort-(50).jpg" alt="Novotel Phú Quốc Resort" width="108"></td></tr> 
   <tr><td>Novotel Phu Quoc Resort, Phu Quoc, Vietnam</td></tr>
   <tr><td>*****</td></tr> 

</table>
<table style="width:100%">
  <tr>
    <th>Ngày nhận phòng:</th>
    <td>24/01/2018</td> 
  </tr>
  <tr>
    <th>Ngày trả phòng:</th>
    <td>25/01/2018</td> 
  </tr>
  <tr>
    <th>Số đêm:</th>
    <td>01</td> 
  </tr>
  <tr>
    <th>Người lớn:</th>
  <td>02</td>
  </tr>
    <tr>
    <th>Trẻ em:</th>
  <td>01</td>
  </tr>
    <tr>
    <th>Số lượng phòng:</th>
  <td>01</td>
  </tr>
    <tr>
    <th>Giường phụ:</th>
  <td>01</td>
  </tr>
</table>
<table style="width:100%">
  <tr>
    <th>Combo 2N1Đ + Vé máy bay khứ hồi cho 2 khách tại Six Senses Côn Đảo</th>  
  </tr>
  <tr>
  <th>9,800,000 x 1 (đêm) x 3 (phòng) =29,400,000 VND</th> 
  </tr>
  </table>
<table style="width:100%">
  <tr>
    <th>Thành tiền</th>
    <td>54,390,000 VND</td> 
  </tr>
  <tr>
    <th>Phí VAT</th>
    <td>0 VND</td> 
  </tr>
  <tr>
    <th>Phí dịch vụ</th>
    <td>0 VND</td> 
  </tr>
  <tr>
    <th>Chi phí khác</th>
  <td>0 VND</td>
  </tr>
    <tr>
    <th>Thanh toán</th>
  <td>54,390,000 VND</td>
  </tr>
    <tr>
    <th>Bạn có mã giảm giá.</th>
  <td>667788 (Mã giảm giá 667788 được áp dụng .Bạn đã giảm được 1%/tổng đơn phòng. Số tiền giảm sẽ thể hiện trong hóa đơn)</td>
  </tr>
    <tr>
    <th>Giảm giá</th>
  <td>543,200 VND</td>
  </tr>
      <tr>
    <th>Tổng thanh toán</th>
  <td>53,776,000 VND</td>
  </tr>
</table>
<h2>Điều kiện huỷ</h2>

<table style="width:100%">
  <tr>
    <td>Hủy phòng trước 24 ngày trước khách đến (trừ thứ 7 ,chủ nhật và lễ ,tết): không tính phí</td> 
  </tr>
    <tr>
    <td>Hủy phòng trước 23 ngày đến 13 ngày trước khách đến (trừ thứ 7 ,chủ nhật và lễ ,tết): tính 50% tổng tiền phòng</td> 
  </tr>
    <tr>
    <td>Hủy phòng trong vòng 12 ngày trước khách đến (trừ thứ 7 ,chủ nhật và lễ ,tết): tính 100% tổng tiền phòng</td> 
  </tr>
    <tr>
    <td>Các booking ngày Lễ ,Tết không hủy,không đổi,không hoàn</td> 
  </tr>
</table>
<h2>Điều kiện sử dụng</h2>

<table style="width:100%">
  <tr>
    <td>Combo chỉ sử dụng một lần trước khi hết hạn</td> 
  </tr>
    <tr>
    <td>Combo chỉ áp dụng cho khách mang quốc tịch Việt Nam</td> 
  </tr>
    <tr>
    <td>Combo này không áp dụng chung với chương trình khuyến mãi khác</td> 
  </tr>
    <tr>
    <td>Giá combo chỉ hiệu lực tai web Hospi.vn</td> 
  </tr>
      <tr>
    <td>Không áp dụng cho ngày lễ,tết</td> 
  </tr>
      <tr>
    <td>Combo đi vào cuối tuần T7 phụ thu theo quy định</td> 
  </tr>
</table>
</body>
</html>
