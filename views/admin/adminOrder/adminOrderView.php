<?php include_once ROOT . '/views/layouts/admin_header.php'; ?>

<a href="/admin/order/list" class="btn btn-default">
    <span class="glyphicon glyphicon-chevron-left"></span> Список заказов
</a>
<a href="/admin/product/create" class="btn btn-success">
    <span class="glyphicon glyphicon-plus"></span> Добавить товар
</a>
<a href="/admin/catalog/create" class="btn btn-success">
    <span class="glyphicon glyphicon-plus"></span> Добавить категорию
</a>
<h3>Просмотр заказа № <?php echo $order_id; ?></h3>

<div class="col-lg-4 col-md-4">
    <h4>Информация о заказе</h4>
    <table class="table table-hover table-bordered">
        <tbody>
            <tr>
                <th>Номер заказа</th>
                <td><?php echo $order_id; ?></td>
            </tr>
            <tr>
                <th>ID-клиента</th>
                <td><?php echo $order['userid']; ?></td>
            </tr>
            <tr>
                <th>Имя клиента</th>
                <td><?php echo $order['username']; ?></td>
            </tr>
            <tr>
                <th>Статус заказа</th>
                <td><?php echo  AdminOrder::get_Status($order['status']); ?></td>
            </tr>
            <tr>
                <th>Дата заказа</th>
                <td><?php echo $order['date'] ?></td>
            </tr>
            <tr>
                <th>Комментарии к заказу</th>
                <td><?php echo $order['usercomment'] ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-lg-8 col-md-8">
    <h4>Товари в заказе</h4>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <td>ID товара</td>
                <td>Артикуль товара</td>
                <td>Название</td>
                <td>Цена</td>
                <td>Количество</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getOrder as $rr): ?>
                <tr>
                    <td><?php  echo $rr['id']; ?></td>
                    <td><?php  echo $rr['code']; ?></td>
                    <td><?php  echo $rr['title']; ?></td>
                    <td><?php  echo $rr['newprice']; ?></td>
                    <td><?php  echo $rr['count']; ?></td>
                </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include_once ROOT . '/views/layouts/admin_footer.php'; ?>
