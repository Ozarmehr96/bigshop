<?php include_once ROOT . '/views/layouts/admin_header.php'; ?>

<h3>Добро пожаловать на панель администратора!</h3>  
<div class="col-lg-4 col-md-4">
    <div class="list-group">
        <a href="/admin/product/list" class="list-group-item">Управление товарами<span class="badge"><?php echo $productcount; ?></span></a>
        <a href="/admin/catalog/list" class="list-group-item">Управлние категориями<span class="badge"><?php echo AdminCatalog::get_CatalogCount(); ?></span></a>
        <a href="/admin/order/list" class="list-group-item">Управление заказами<span class="badge"><?php echo AdminOrder::get_OrdersCount(); ?></span></a>
    </div>
</div>
<?php include_once ROOT . '/views/layouts/admin_footer.php'; ?>