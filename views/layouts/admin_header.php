<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="/templates/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/templates/css/admin.css">
        
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-top" id="menu">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">BigShop</a>
                </div>
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li  class="<?php if($_SERVER['REQUEST_URI'] === '/admin' ) echo 'active';?>"> <a href="/admin">Админпанель</a></li>
                        <?php if($_SERVER['REQUEST_URI'] != '/admin' ): ?>
                        <li><a <?php if($_SERVER['REQUEST_URI'] === '/admin/product/list' ) echo 'class="active" style="color:white;"';?> href="/admin/product/list" >Управление товарами <span class="badge"> <?php echo " ". AdminProduct::get_ProductsCount(); ?></span></a></li>
                        <li><a <?php if($_SERVER['REQUEST_URI'] === '/admin/catalog/list' ) echo 'class="active" style="color:white;"';?> href="/admin/catalog/list" >Управлние категориями <span class="badge"> <?php echo AdminCatalog::get_CatalogCount(); ?></span></a></li>
                        <li><a <?php if($_SERVER['REQUEST_URI'] === '/admin/order/list' ) echo 'class="active" style="color:white;"';?>   href="/admin/order/list" >Управление заказами <span class="badge"> <?php echo " ".AdminOrder::get_OrdersCount(); ?></span></a></li>
                        <?php endif; ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="/">На главную</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container">

