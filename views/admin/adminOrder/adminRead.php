
<?php include_once ROOT . '/views/layouts/admin_header.php'; ?>
<a href="/admin/product/create" class="btn btn-success">
   <span class="glyphicon glyphicon-plus"></span> Добавить товар
</a>
<a href="/admin/catalog/create" class="btn btn-success">
   <span class="glyphicon glyphicon-plus"></span> Добавить категорию
</a>
<h3><p>Список заказов</p></h3> 
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <td>ID заказа</td>
                <td>Имя покупателя</td>
                <td>Телефон покупателя</td>
                <td>Дата оформления</td>
                <td>Статус</td>
                <td>Посмотреть</td>
                <td>Изменить</td>
                <td>Удалить</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order):?>
            <tr data-id = "<?php echo $order['id']; ?>" id="<?php echo $order['id']; ?>">
                    <td><?php echo $order['id']; ?></td>
                    <td><?php  echo $order['username']; ?></td>
                    <td><?php echo $order['userphone'];?></td>
                    <td><?php echo $order['date'];?></td>
                    <td><?php echo  AdminOrder::get_Status($order['status']); ?></td>
                    <td><a href="/admin/order/view/<?php echo $order['id']; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                    <td><a href="/admin/order/update/<?php echo $order['id']; ?>"><span class="glyphicon glyphicon-check"></span></a></td>
                    <td class="openModal" data-id = "<?php echo $order['id']; ?>" data-toggle="modal" data-target="#myModal"><a id = "change" ><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
            <?php endforeach;?>
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
         $("#ok").attr("href", '/admin/order/delete/'+hr);
        
     });
     $("#close").click(function (){
         if(hr == tr){
             $("#"+tr).css("background-color", "#ffffff");
             $("#"+tr).css("color", "black");
         }
     });
      $(".close").click(function (){
         if(hr == tr){
             $("#"+tr).css("background-color", "#ffffff");
             $("#"+tr).css("color", "black");
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