<?php include_once ROOT . '/views/layouts/admin_header.php'; ?>
<a href="/admin/product/create" class="btn btn-success">
   <span class="glyphicon glyphicon-plus"></span> Добавить товар
</a>
<h3><p>Добавление категории</p></h3> 
<div class="col-lg-4 col-md-4">
    <form action="#" method="POST">
        <div class="form-group">
            <label for="title">Название*</label>
            <input type="text" class="form-control" name="title" id="title" required/>
        </div>
        <div class="form-group">
            <label for="status">Статус*</label>
            <select class="form-control" id="status" name="status">
                <option value="1">Отображать</option>
                <option value="0">Скрыть</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-success" name="submit" id="submit" value="Добавить"/>
        </div>
    </form>
</div>
<?php include_once ROOT . '/views/layouts/admin_footer.php'; ?>