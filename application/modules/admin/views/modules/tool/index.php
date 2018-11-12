<div class="container" id="content">
      <!-- content-->
        <div class="panel panel-default">
  <div class="panel-heading">Quản lý tiện ích giao diện</div>
  <div class="clearfix"></div>
  
    
   <div class="panel-body" style="padding-top:5px;">
    <div class="panel panel-default" style="margin-bottom:5px !important">
        <button type="button" style="background: #660033;margin-left: 15px;margin-top: 15px;" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>Thêm mới</button>
        <div class="panel-body" style="padding-top: 15px;">
          <form class="form-inline" id="searchForm" role="form" method="GET" action="https://www.hospi.vn/admin/hotels">
            <div class="form-group" style="width:200px;">              
            
              <div class="select2-container form-control chosen-select" id="s2id_hotel_city" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Thành phố</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen1"></div><select class="form-control chosen-select select2-offscreen" name="hotel_city" id="hotel_city" tabindex="-1">
                <option value="">Thành phố</option>
                               
               </select>
            </div>
           
            <div class="form-group" style="width:200px;">              
              <div class="select2-container form-control chosen-select" id="s2id_hotel_status" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Vị trí giao diện</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2"></div><select class="form-control chosen-select select2-offscreen" name="hotel_status" id="hotel_status" tabindex="-1">
                <option value="">Vị trí giao diện</option>
                              
              </select>
            </div>             
 

            <button type="submit" class="btn btn-inverse btn-sm">Lọc</button>
          </form>         
        </div>
      </div>
     <div class="box">       
       
                <div class="clearfix"></div>
        <!-- /.box-header -->
        <div class="box-body">
          
          <table class="table table-bordered" id="table-list-data">
            <tbody>
              <tr style="background: #d8d8d8">
                <th style="width: 1%">
                    <div class="icheckbox_square-grey" style="position: relative;"><input class="all" type="checkbox" value="" id="select_all" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </th>
                <th>Tên giao diện</th>
                <th>Code</th>      
                <th>Vị trí giao diện</th>                              
               
                <th>Chỉnh Sửa</th>              
             
              </tr>
            </tbody>
            <tbody>
                  
                         
          </tbody>
          </table>
            <div class="text-center"><ul class="pagination"><li class="active"><span>1<!--<span--></span></li><li><a href="https://www.hospi.vn/admin/hotels?page=2">2</a></li><li><a href="https://www.hospi.vn/admin/hotels?page=3">3</a></li><li class="disabled"><span>...</span></li><li><a href="https://www.hospi.vn/admin/hotels?page=5">5</a></li><li><a href="https://www.hospi.vn/admin/hotels?page=2">»</a></li></ul></div>
          </div>  
        </div>        
      </div>
   </div>
      <!-- end-->

    </div>