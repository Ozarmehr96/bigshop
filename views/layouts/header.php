<!DOCTYPE html>
<html>
    <head>
        <title>Big shope A Ecommerce Category Flat Bootstarp Resposive Website Template | Single :: w3layouts</title>
        <link href="/templates/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!--theme-style-->
        <link href="/templates/css/style.css" rel="stylesheet" type="text/css" media="all" />	
        <link rel="stylesheet" href="/templates/css/etalage.css" type="text/css" media="all" />
        <link href="/templates/css/userpage.css" rel="stylesheet" type="text/css" media="all" />
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"charset="utf8">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--//fonts-->
        
        <script src="/templates/js/jquery.min.js"></script>

        <script src="/templates/js/jquery.etalage.min.js"></script>
        <script>
            jQuery(document).ready(function ($) {

                $('#etalage').etalage({
                    thumb_image_width: 300,
                    thumb_image_height: 400,
                    source_image_width: 900,
                    source_image_height: 1200,
                    show_hint: true,
                    click_callback: function (image_anchor, instance_id) {
                        alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
                    }
                });

            });
        </script>

    </head>
    <body> 
        
        <!--header-->
        <div class="header" data-id = "<?php echo User::CheckIsThereUserID(); ?>" id="header">
            <div class="top-header">
                <div class="container">
                    <div class="top-header-left">
                        <ul class="nav navbar-nav">
                            <li><a href="#"></span>Защита Покупателя</a></li>
                            <li><a href="/contact">Обратная связь</a></li>
                            <li><a href="#"></a></li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="clearfix"> </div>		
                </div>
            </div>
            <div class="bottom-header">
                <div class="container">
                    <div class="header-bottom-left">
                        <div class="logo">
                            <a href="/"><img src="/templates/images/logo.png" alt=" " /></a>
                        </div>

                        <div class="row search">
                            <form action="/search/product" method="POST">
                            <div class = "col-lg-12 go" >
                                <div class = "input-group">
                                    <input type = "text" class = "form-control" id="textseach" name="textseach" required>
                                    <span class = "input-group-btn">
                                        <button class = "btn btn-default" type = "submit" id="searchburtton" name="searchburtton">
                                            Поиск
                                        </button>
                                    </span>
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                            </form>
                        </div>


                        <div class="clearfix"> </div>

                    </div>
                    <div class="header-bottom-right">
                        <div class="account"><a href="/user/account"><span> </span>Аккаунт</a></div>
                        <div class="cart"><a href="#"><span> </span>Корзина</a></div>
                        <?php if (isset($_SESSION['user'])):?>
                        <div class="cart"><a href="/user/log_out"><span> </span>Выход</a></div>
                        <?php else:?>
                        <ul class="login">
                            <li><a href="/user/login"><span> </span>Вход</a></li> |
                            <li ><a href="/user/check_in">Регистрация</a></li>
                        </ul>
                        <?php endif;?>
                       
                        <div class="clearfix"> </div>
                    </div>
                    <div class="clearfix"> </div>	
                </div>
            </div>
        </div>
        <!---->
        <div class="container">
            <div class="modal fade" id="myCheckModal" role="dialog" >
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body">
                            <h4>Войдите в систему пожалуйста.</h4>
                            <a class="btn btn-success" href="/user/login">Вход</a>
                            <a class="btn btn-primary" href="/user/check_in">Регистрация</a>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"  id="close" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
