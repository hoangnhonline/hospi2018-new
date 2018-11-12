<?php //echo "<pre>";print_r($category_post );  echo "</pre>"; ?>
<div class="container margin_60 main-blog">
         <div class="block-adv-blog">
            <a href="#" title="">
            <img src="https://www.hospi.vn/themes/default/assets/img/bg-adv.jpg" style="width: 100%;" alt="">
            </a>
         </div>
         <div class="row">
            <div class="col-md-7 go-right categories-news categories-blog">
                <?php
            foreach ($category_post as $item) {
                $posts = $item['posts'];
                ?>
               <div class="block-news-<?php echo $item['category']->slug; ?> clearfix">
                    <div class="cat-line cat-blue cat-line-<?php echo $item['category']->class; ?>">
                     <ul class="nav nav-tabs nav-tabs-<?php echo $item['category']->class; ?>">
                         <li class="cate-news active"><a onclick ="loadSubCategoryData('<?php echo $item['category']->slug; ?>')"  data-toggle="tab" href="#diemden" aria-expanded="true"><?php echo $item['category']->name; ?></a></li>
                         <?php
                            if (!empty($item['child'])) {
                                foreach ($item['child'] as $child) {
                                    ?>
                                    <li class="cate-news"><a onclick ="loadSubCategoryData('<?php echo $child->slug; ?>')" data-toggle="tab" href="#<?php echo $child->slug; ?>" title="<?php echo $child->name; ?>"><?php echo $child->name; ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                       

                          <li class="icon">
                              <a href="<?php echo base_url().'blog/category/' .  $item['category']->slug ?>" title="">
                              <img src="https://www.hospi.vn/themes/default/assets/img/view-double.png" alt=""></a>
                        </li>
                    </ul>
                  </div>

                    <div class="tab-content">
                      <div id="diemden" class="tab-pane fade active in">
                          <?php
                    if (!empty($posts)) {
                        include('layout_' . $item['category']->layout . '.php');
                    }
                    ?>
                      </div>
                      <?php
                            if (!empty($item['child'])) {
                                foreach ($item['child'] as $child) {
                                    ?>
                                    <div id="<?php echo $child->slug; ?>" class="tab-pane fade">
                                          <?php
                                            if (!empty($posts)) {
                                                include('layout_' . $item['category']->layout . '.php');
                                            }
                                            ?>
                         
                                    </div>
                                    <?php
                                }
                            }
                       ?>
                     
            </div>
             
                  
         </div>
           <?php
            }
            ?>
             
            </div>
            <?php include('home_blog_sidebar.php');?>
            <!--//secondary-->
            <script type="text/javascript">//<![CDATA[
               $(window).load(function(){
               var tally = new Object();
               var idx;
               
               $.widget("custom.catcomplete", $.ui.autocomplete, {
                   _renderMenu: function(ul, items) {
                       var self = this,currentCategory = "";
                       $.each(items, function(index, item) {
                           if (item.category != currentCategory) {
                               /*ul.append("<li class='ui-autocomplete-category'>" + item.category + "(<span id='autocomplete_"+item.category+"'></span>)</li>");*/
                               ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                               currentCategory = item.category;
                           }
                           if(currentCategory!=''){
                               tally[currentCategory] = (tally[currentCategory]==undefined) ? 1 : tally[currentCategory]+1;}
                           self._renderItem(ul, item);
                           $(ul).append("<span title='" + item.address + "' class='desc'>" + item.desc + " <i class='fa fa-map-marker' aria-hidden='true'></i></span><div style='clearfix'></div>");
               
                       });
                       for(category in tally){
                           $('#autocomplete_'+category).html(tally[category]);
                       };
                   }
               
               });
               
               
             
               $( "#search" ).catcomplete({
                   source: data,
                   appendTo: "#autocomlete-container",
                   select: function(event, ui) {
                           $('#search').val(ui.item.label);
                           // and place the item.id into the hidden textfield called 'searching'. 
                           $('#searching').val(ui.item.id);
                           $('#modType').val(ui.item.modType);
                               return false;
                       }
               });
               
               });//]]> 
               
/*  
  function loadSubCategoryData(slug){
    url =  "<?php //echo base_url(); ?>blog/cate_front?slug="+slug ;
  $.ajax({
  url: url,
  type: 'GET',
  //dataType : 'json',
  success: function (response) {
      //alert(response);
  }
});
}*/
            </script>
         </div>
         <!-- End row-->
      </div>