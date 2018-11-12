<div class="container" id="content">
      <!-- content-->
        <div class="panel panel-default">
  <div class="panel-heading">Quản lý vị trí</div>
  <div class="clearfix"></div>
  
    
   <div class="panel-body" style="padding-top:5px;">
    <div class="panel panel-default" style="margin-bottom:5px !important">
        <!-- <button type="button" style="background: #660033;margin-left: 15px;margin-top: 15px;" class="btn btn-primary" data-toggle="modal" data-target="#themdanhmuc"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tạo danh mục</button> -->
          <a href="<?php echo base_url() . 'admin/settings/widgets/add'; ?>" style="background: #660033;margin-left: 15px;margin-top: 15px;" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>Thêm mới</a>    
        <div class="panel-body" style="padding-top: 15px;">
          <form class="form-inline" id="searchForm" role="form" method="GET" action="https://www.hospi.vn/admin/hotels">
            <div class="form-group" style="width:200px;">              
            
              <div class="select2-container form-control chosen-select" id="s2id_autogen1" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Danh mục chính</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="form-control chosen-select select2-offscreen" name="hotel_city" tabindex="-1">
                <option value="">Danh mục chính</option>
                               
               </select>
            </div>
           
            <div class="form-group" style="width:200px;">              
              <div class="select2-container form-control chosen-select" id="s2id_autogen3" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Danh mục con</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen4"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="form-control chosen-select select2-offscreen" name="hotel_status" tabindex="-1">
                <option value="">Danh mục con</option>
                              
              </select>
            </div>             
 

            <button type="submit" class="btn btn-inverse btn-sm">Lọc</button>
          </form>         
        </div>
      </div>
     <div class="box">       
            <div class="btn-group pull-right padding-left-right-15">
                <a style="margin-bottom: 5px;" href="javascript: multiDelfunc('https://www.hospi.vn/admin/hotelajaxcalls/delMultipleHotels', 'checkboxcls')" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Xóa mục đã chọn</a> 

                  <a style="margin-bottom: 5px;margin-left: 20px;" href="" class="btn btn-default"><i class="glyphicon glyphicon-print"></i> In trang</a> 
                   <a style="margin-bottom: 5px;margin-left: 20px;" href="" class="btn btn-default"><i class="glyphicon glyphicon-file"></i> Xuất CSV</a> 
            </div>
                <div class="clearfix"></div>
        <!-- /.box-header -->
        <div class="box-body">
          
          <table class="table table-bordered" id="table-list-data">
            <tbody>
              <tr style="background: #d8d8d8">
                <th style="width: 1%">
                    <div class="icheckbox_square-grey" style="position: relative;"><input class="all" type="checkbox" value="" id="select_all" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </th>
                <th>Danh Mục Chính <i class="fa fa-caret-down"></i></th>
                <th>Danh Mục Con <i class="fa fa-caret-down"></i></th>      
                <th>Trạng thái</th>                              
                <th>Người Tạo</th>
                <th>Ngày Tạo</th>
                <th>Chỉnh Sửa</th>              
             
              </tr>
            </tbody>
            <tbody>
              <?php foreach ($categories['all'] as $cat) { 
                 $delLink =  base_url() . 'admin/ajaxcalls/delBlogCat';

                ?>

               <tr id="row-594" style="background: #e5e5e5">
                <td>
                 <div class="icheckbox_square-grey" style="position: relative;"><input type="checkbox" name="" class="checkboxcls" value="594" style="position: absolute; opacity: 0;"></div>
                </td>
                  
                <td>
                  <span><?php echo $cat->cat_name?></span>
                </td>          
                <td>
                   <?php echo $cat->cat_name?>
                </td>
                <td>     
                   <?php if($cat->cat_status =='Yes') {?>
                       <i class="fa fa-check cl-tim" aria-hidden="true"></i>
                   <?php }?>
                </td>
                <td>
                  Võ Đình Chi
                 </td>
                <td>
                  20/10/2017,09:10PM
                  </td>
                             
               
                <td style="white-space:nowrap; text-align:right">   
                  <a class="btn btn-info btn-sm" href="#cat<?php echo  $cat->cat_id ?>" title="Chỉnh sửa" data-toggle="modal"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-danger btn-sm" href="javascript: delfunc('<?php echo  $cat->cat_id ?>','<?php echo $delLink ; ?>')" title="DELETE" target="_self"><i class="fa fa-remove"></i></a>
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




<!--Add blog category Modal -->
<div class="modal fade" id="ADD_BLOG_CAT" tabindex="-1" role="dialog" aria-labelledby="ADD_BLOG_CAT" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add Blog Category Type</h4>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="row form-group">
                        <label class="col-md-3 control-label text-left">Category Name</label>
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 control-label text-left">Status</label>
                        <div class="col-md-8">
                            <select name="status" class="form-control">
                                <option value="Yes">Enable</option>
                                <option value="No">Disable</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 control-label text-left">Parent Name</label>
                        <div class="col-md-8">
                            <select data-placeholder="Select" name="parent" class="form-control">
                                <option value="">Select</option>
                                <?php foreach ($categoriesparent['all'] as $cat) { ?>
                                    <option value="<?php echo $cat->cat_id; ?>"> <?php echo $cat->cat_name; ?> </option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 control-label text-left">Layout</label>
                        <div class="col-md-8">
                            <select data-placeholder="Select" name="layout" class="form-control">
                                <option value="1">Layout 1</option>
                                <option value="2">Layout 2</option>
                                <option value="3">Layout 3</option>
                                <option value="4">Layout 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 control-label text-left">Class Name</label>
                        <div class="col-md-8">
                            <input type="text" name="classname" class="form-control" placeholder="Class Name" value="cat-blue">
                        </div>
                    </div>
                    <?php foreach ($languages as $lang => $val) {
                        if ($lang != DEFLANG) { ?>
                            <div class="row form-group">
                                <label class="col-md-3 control-label text-left"> Name in <img
                                            src="<?php echo PT_LANGUAGE_IMAGES . $lang . ".png" ?>" height="20" alt=""/>&nbsp;<?php echo $val['name']; ?>
                                </label>
                                <div class="col-md-8">
                                    <input type="text" name='<?php echo "translated[$lang][name]"; ?>'
                                           class="form-control" placeholder="Name" value="">
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="addcat" value="1"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-----end add category modal------>

<!-- edit Modal -->
<?php foreach ($categories['all'] as $cat) { ?>
    <div class="modal fade" id="cat<?php echo $cat->cat_id; ?>" tabindex="-1" role="dialog" aria-labelledby=""
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Update</h4>
                    </div>
                    <div class="modal-body form-horizontal">
                        <div class="row form-group">
                            <label class="col-md-3 control-label text-left">Category Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" placeholder="Name"
                                       value="<?php echo $cat->cat_name; ?>" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-3 control-label text-left">Status</label>
                            <div class="col-md-8">
                                <select name="status" class="form-control" id="">
                                    <option value="Yes" <?php makeSelected($cat->cat_status, "Yes"); ?>>Enabled</option>
                                    <option value="No" <?php makeSelected($cat->cat_status, "No"); ?> >Disable</option>
                                </select></div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 control-label text-left">Parent Name</label>
                            <div class="col-md-8">
                                <select data-placeholder="Select" name="parent" class="form-control" tabindex="2">
                                    <option value="">Select</option>
                                    <?php foreach ($categoriesparent['all'] as $parentcat) {
                                        if ($cat->cat_id != $parentcat->cat_id) { ?>
                                            <option value="<?php echo $parentcat->cat_id; ?>" <?php makeSelected($cat->cat_parent, $parentcat->cat_id); ?> > <?php echo $parentcat->cat_name; ?> </option>
                                        <?php }
                                    } ?>

                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 control-label text-left">Layout</label>
                            <div class="col-md-8">
                                <select data-placeholder="Select" name="layout" class="form-control">
                                    <option value="1" <?php makeSelected($cat->cat_layout, 1); ?>>Layout 1</option>
                                    <option value="2" <?php makeSelected($cat->cat_layout, 2); ?>>Layout 2</option>
                                    <option value="3" <?php makeSelected($cat->cat_layout, 3); ?>>Layout 3</option>
                                    <option value="4" <?php makeSelected($cat->cat_layout, 4); ?>>Layout 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 control-label text-left">Class Name</label>
                            <div class="col-md-8">
                                <input type="text" name="classname" class="form-control" placeholder="Class Name" value="<?php echo $cat->cat_classname; ?>">
                            </div>
                        </div>
                        <?php foreach ($languages as $lang => $val) {
                            if ($lang != DEFLANG) {
                                @$trans = getBlogCategoriesTranslation($lang, $cat->cat_id); ?>
                                <div class="row form-group">
                                    <label class="col-md-3 control-label text-left"> Name in <img
                                                src="<?php echo PT_LANGUAGE_IMAGES . $lang . ".png" ?>" height="20"
                                                alt=""/>&nbsp;<?php echo $val['name']; ?></label>
                                    <div class="col-md-8">
                                        <input type="text" name='<?php echo "translated[$lang][name]"; ?>'
                                               class="form-control" placeholder="Name"
                                               value="<?php echo @$trans[0]->cat_name; ?>">
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="updatecat" value="1"/>
                        <input type="hidden" name="categoryid" value="<?php echo $cat->cat_id; ?>"/>
                        <input type="hidden" name="slug" value="<?php echo $cat->cat_slug; ?>"/>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!----edit modal--->