<?php include_once ROOT . '/views/layouts/admin_header.php'; ?>
<a href="/admin/product/list" class="btn btn-default">
    <span class="glyphicon glyphicon-chevron-left"></span>Назад к списку товаров
</a>
<h4>Вы действительно хотите удалить этот товар?</h4>
<form method="POST" action="#">
    <div class="col-lg-4 col-md-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Код</td>
                    <td>Название</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['title']; ?></td>
                </tr>
            </tbody>
        </table>
            
                <p>
                <input type="submit" class=" btn btn-success" name ="submit" id="submit" value="Удалить" style="width:170px;"/>
                <a href="/admin/product/list" class="btn  btn-default pull-right" style="width:170px;">Нет</a>
                </p>
            
    </div>
</form>
<?php include_once ROOT . '/views/layouts/admin_footer.php'; ?>