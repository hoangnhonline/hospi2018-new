<div class="container" id="content">
      <!-- content-->
        <div class="panel panel-default">
  <div class="panel-heading">Quản lý tiện ích giao diện</div>
  <div class="clearfix"></div>
  
    
   <div class="panel-body" style="padding-top:5px;">
    <div class="panel panel-default" style="margin-bottom:5px !important">



        <a href="<?php echo base_url() . 'admin/settings/widgets/add' ?>" type="button" style="background: #660033;margin-left: 15px;margin-top: 15px;" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>Thêm mới</a>
        <div class="panel-body" style="padding-top: 15px;">
          <form class="form-inline" id="searchForm" role="form" method="GET" action="https://www.hospi.vn/admin/hotels">
            <div class="form-group" style="width:200px;">              
            
              <div class="select2-container form-control chosen-select" id="s2id_hotel_city" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Thành phố</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen1"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="form-control chosen-select select2-offscreen" name="hotel_city" id="hotel_city" tabindex="-1">
                <option value="">Thành phố</option>
                               
               </select>
            </div>
           
            <div class="form-group" style="width:200px;">              
              <div class="select2-container form-control chosen-select" id="s2id_hotel_status" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Vị trí giao diện</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="form-control chosen-select select2-offscreen" name="hotel_status" id="hotel_status" tabindex="-1">
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
                    <div class="icheckbox_square-grey" style="position: relative;">
                      <input class="all" type="checkbox" value="" id="select_all" style="position: absolute; opacity: 0;"></div>
                </th>
                <th>Tên giao diện</th>
                <th>Code</th>      
                <th>Vị trí giao diện</th>                              
               
                <th>Chỉnh Sửa</th>              
             
              </tr>
            </tbody>
            <tbody>
                  
                <?php foreach ($datas as $data) { 
                 $delLink =  base_url() . 'admin/ajaxcalls/delBlogCat';
                 $editLink =  base_url() . 'admin/settings/widgets/edit/'.$data->widget_id ;
                ?>

               <tr id="row-594" style="background: #e5e5e5">
                <td>
                 <div class="icheckbox_square-grey" style="position: relative;">
                  <input type="checkbox" name="" class="checkboxcls" value="<?php echo $data->widget_id?>" style="position: absolute; opacity: 0;"></div>
                </td>
                  
                <td>
                  <span><?php echo $data->widget_name?></span>
                </td>          
                <td>
                   <?php echo $data->widget_name?>
                </td>
                <td>     
                    <?php echo $data->widget_location?>

                </td>
                <td style="white-space:nowrap; text-align:right">   
                  <a class="btn btn-info btn-sm" href="<?php echo  $editLink ?>" title="Chỉnh sửa" ><i class="fa fa-edit"></i></a>
                  <a class="btn btn-danger btn-sm" href="javascript: delfunc('<?php echo  $data->widget_id ?>','<?php echo $delLink ; ?>')" title="DELETE" target="_self"><i class="fa fa-remove"></i></a>
                 </td>
              </tr> 
              <?php } ?>          
          </tbody>
          </table>
                            <div class="text-center"><?php echo createPagination($info); ?></div>

          </div>  
        </div>        
      </div>
   </div>
      <!-- end-->

    </div>