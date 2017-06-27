<?php include_once ROOT . '/views/layouts/admin_header.php'; ?>
<a href="/admin/product/create" class="btn btn-success">
   <span class="glyphicon glyphicon-plus"></span> Добавить товар
</a>
<a href="/admin/catalog/create" class="btn btn-success">
   <span class="glyphicon glyphicon-plus"></span> Добавить категорию
</a>
<a href="/admin/order/list" class="btn btn-success">
   <span class="glyphicon glyphicon-list"></span> Список заказов
</a>
<h3><p>Список категории</p></h3> 
<div class="col-lg-4 col-md-4">
    <table class="table table-hover">
        <thead>
            <tr>
                <td>Код</td>
                <td>Назвнание</td>
                <td>Статус</td>
                <td>Изменить</td>
                <td>Удалить</td>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categoryList as $catalog):?>
            <tr data-id = "<?php echo $catalog['id'];?>" id="<?php echo $catalog['id']; ?>">
                <td><?php echo $catalog['id'];?></td>
                <td><?php echo $catalog['category_title'];?></td>
                <td><?php if ($catalog['category_status'] == 1) echo "Отображается"; else echo "Скрыть";?></td>
                <td><a href ="/admin/catalog/update/<?php echo $catalog['id'];?>"><i class="glyphicon glyphicon-edit"></i></a></td>
                <td class="openModal" data-id = "<?php echo $catalog['id'];?>" data-toggle="modal" data-target="#myModal"><a id = "change"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
 <!-- Modal -->
 
  <script>
 $(document).ready(function (){
     var hr,tr,color, status;
     $(".openModal").click(function(){
         status = "opened";
         hr = $(this).attr("data-id");
         color = $(this).css("backgroundColor");
         
         tr = $("#"+hr).attr("data-id");
         
         if(hr == tr){
             $("#"+tr).css("background-color", "#d9534f");
             $("#"+tr).css("color", "white");
         }
          $("#ok").attr("href", '/admin/catalog/delete/'+hr);
        
     });
     $("#close").click(function (){
         if(hr == tr){
             $("#"+tr).css("background-color", "#ffffff");
             $("#"+tr).css("color", "black");
             color = "";
         }
     });
      $(".close").click(function (){
         if(hr == tr){
             $("#"+tr).css("background-color", "#ffffff");
             $("#"+tr).css("color", "black");
             color = "";
         }
     });
 });
 </script>
</div>
<div class="container">
    <div class="modal fade" id="myModal" role="dialog" data-keyboard = "false" data-backdrop = "static">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Подтверждение удаления</h4>
                </div>
                <div class="modal-body">
                    <h4>Вы действительно хотите удалить этот товар?</h4>
                </div>
                <div class="modal-footer">
                    <a type="submit" id="ok" class="btn btn-danger pull-left" >Удалить</a>
                    <button type="submit"  id="close" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

<?php include_once ROOT . '/views/layouts/admin_footer.php'; ?>