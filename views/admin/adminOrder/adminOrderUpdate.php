<?php include_once ROOT . '/views/layouts/admin_header.php'; ?>
<a href="/admin/order/list" class="btn btn-default">
   <span class="glyphicon glyphicon-chevron-left"></span> Назад к списку заказов
</a>
<a href="/admin/product/create" class="btn btn-success">
   <span class="glyphicon glyphicon-plus"></span> Добавить товар
</a>
<a href="/admin/catalog/create" class="btn btn-success">
   <span class="glyphicon glyphicon-plus"></span> Добавить категорию
</a>
<h3><p>Редактирование заказа</p></h3> 
<div class="col-lg-4 col-md-4">
    <form action="#" method="POST">
        <div class="form-group">
            <label for="name">Имя клиента*</label>
            <input type="text" class="form-control" name="name" id="name" value = "<?php echo $singleoreder['username']; ?>" required/>
        </div>
        
        <div class="form-group">
            <label for="phone">Телефон *</label>
            <input type="text" class="form-control" name="phone" id="phone" value = "<?php echo $singleoreder['userphone']; ?>" required/>
        </div>
        <div class="form-group">
            <label for="comment">Комментарии клиента *</label>
            <textarea type="text" cols="5" rows="5" class="form-control" name="comment" id="comment" value = "" required/><?php echo $singleoreder['usercomment']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="date">Дата заказа *</label>
            <input type="text" class="form-control" name="date" id="date" value = "<?php echo $singleoreder['date']; ?>" required/>
        </div>
        <div class="form-group">
            <label for="status">Статус*</label>
            <select class="form-control" id="status" name="status">
                <option value="1" <?php if ($singleoreder['status'] == 1) echo 'selected';?>>Новый заказ</option>
                <option value="2" <?php if ($singleoreder['status'] == 2) echo 'selected';?>>В обработке</option>
                <option value="3" <?php if ($singleoreder['status'] == 3) echo 'selected';?>>Доставляется</option>
                <option value="4" <?php if ($singleoreder['status'] == 4) echo 'selected';?>>Закрыт</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" name="submit" id="submit" value="Сохранить"/>
        </div>
    </form>
</div>
<?php include_once ROOT . '/views/layouts/admin_footer.php'; ?>