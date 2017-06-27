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
<h3><p>Список товаров</p></h3>  
<div class="col-lg-12 col-md-12">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>ID-товара</td>
                <td>Артикуль</td>
                <td>Название</td>
                <td>Цена</td>
                <td>Изменить</td>
                <td>Удалить</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productList as $product):?>
                <tr>
                <td><?php echo $product['id'];?></td>
                <td><?php echo $product['code'];?></td>
                <td><?php echo $product['title'];?></td>
                <td><?php echo $product['newprice'];?></td>
                <td><a href ="/admin/update/product/<?php echo $product['id'];?>"><i class="glyphicon glyphicon-edit"></i></a></td>
                <td><a href ="/admin/delete/product/<?php echo $product['id'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

<?php include_once ROOT . '/views/layouts/admin_footer.php'; ?>