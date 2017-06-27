<?php

return array(
    // USER
    'user/deletecart/([0-9]+)/([0-9]+)'=> 'user/deletecart/$1/$2',
    'user/cart/product/order' =>    'order/index',
    'user/edit/data/([0-9]+)'   => 'user/edituserdata/$1',
    'user/checktotalproduct/([0-9]+)' => 'user/checktotalproduct/$1',
    'user/login' => 'user/login',
    'user/check_in' => 'user/checkin',
    'user/account' => 'user/account',
    'user/log_out'=>    'user/out',
    //  ORDERS
    'cart/add/live/([0-9]+)'    => 'user/addtocartlive/$1',
    'cart/edit/live/([0-9]+)/([0-9]+)/([0-9]+)'    => 'user/ed/$1/$2/$3',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    //  PRODUCTS
    'search/product' => 'product/search/$1', //a-zA-Z0-9А-Яа-я
    'product/view/([0-9]+)' => 'product/view/$1',
    'product/view/all' => 'product/viewAll',
    'catalog/view/([0-9]+)' => 'catalog/view/$1',
    //  Админ панель (Заказы)
    'admin/order/view/([0-9]+)'  =>  'adminOrder/view/$1',
    'admin/order/delete/([0-9]+)'  =>  'adminOrder/delete/$1',
    'admin/order/update/([0-9]+)'  =>  'adminOrder/update/$1',
    'admin/order/list'  =>  'adminOrder/read',
     //  Админ панель (Католог)
    'admin/catalog/create'    => 'adminCatalog/create',
    'admin/catalog/list'    => 'adminCatalog/read',
    'admin/catalog/update/([0-9]+)'    => 'adminCatalog/update/$1',
    'admin/catalog/delete/([0-9]+)'    => 'adminCatalog/delete/$1',
    //  Админ панель (Товар)
    'admin/product/create' => 'adminProduct/create',
    'admin/product/list' => 'adminProduct/read',
    'admin/update/product/([0-9]+)' =>  'adminProduct/update/$1',
    'admin/delete/product/([0-9]+)' =>  'adminProduct/delete/$1',
    'admin' =>  'admin/index',
    
    'contact' => 'site/contact',
    '' => 'site/index', //actionIndex() в SiteController
);

// Тут все в норме 
/*return array(
    
    'admin/product/list' => 'adminProduct/read',
    'user/deletecart/([0-9]+)/([0-9]+)'=> 'user/deletecart/$1/$2',
    'user/cart/product/order' =>    'order/index',
    'user/edit/data/([0-9]+)'   => 'user/edituserdata/$1',
    'user/checktotalproduct/([0-9]+)' => 'user/checktotalproduct/$1',
    'cart/add/live/([0-9]+)'    => 'user/addtocartlive/$1',
    'cart/edit/live/([0-9]+)/([0-9]+)/([0-9]+)'    => 'user/ed/$1/$2/$3',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'product/view/([0-9]+)' => 'product/view/$1',
    'catalog/view/([0-9]+)' => 'catalog/view/$1',
    'user/login' => 'user/login',
    'user/check_in' => 'user/checkin',
    'user/account' => 'user/account',
    //  Админ панель
    'admin' =>  'admin/index',
    
    '' => 'site/index', //actionIndex() в SiteController
);*/