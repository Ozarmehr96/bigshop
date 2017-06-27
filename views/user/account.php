<?php include_once ROOT . '/views/layouts/header.php'; ?>

<!--<link href="/templates/css/userpage.css" rel="stylesheet" type="text/css" media="all" />-->	
<form action="#" method="POST">
<div class="col-lg-8 col-sm-8 pull-right" style="padding-top: 7px;width: 797px;" onload="CartView()">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <img alt="" src="<?php echo $user['image']; ?>">
        </div>
        <div class="card-info"> <span class="card-title" ><?php echo $user['name']; ?></span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary but ok" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                <div class="hidden-xs">Моя карзина</div>
            </button>
        </div>
        
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default but" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Мои заказы</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default but" href="#tab4" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Настройки</div>
            </button>
        </div>
    </div>
    
        <div class="well" id="well" data-id = "<?php echo $_SESSION['user']; ?>">
            <div class="tab-content">
                <div class="tab-pane fade in active clearfix" id="tab1">
                    <?php if ($countProducts <= 0 ): ?>
                    <h3>Ваша корзина пуста:(</h3>
                    <?php else: ?>
                    <div class="table-responsive">          
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Код</th>
                                    <th>Название</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                    <th>Удалить</th>
                                    <th>Изменить</th>
                                </tr>
                            </thead>
                            <tbody id="mytable" data-id = "<?php echo $_SESSION['user']; ?>">


                            </tbody>
                        </table>
                    </div>
                    <a href="/user/cart/product/order" class="btn btn-primary pull-left " id="orderbutton" >Оформить заказ</a>
                    <?php endif; ?>
                </div>
                <div class="tab-pane fade in" id="tab3">
                    <h3>This is tab 2</h3>
                </div>
                
                <div class="tab-pane fade clearfix" id="tab4">
                    <div class="col-md-6 ">
                    <div class="form-group">
                      <label for="usr">Имя:</label>
                      <input type="text" class="form-control" id="name" value="<?php echo $user['name']; ?>">
                      <h4 style="color:red;font-size: 14px;"></h4>
                    </div>
                    <div class="form-group">
                      <label for="pwd">Пароль:</label>
                      <input type="password" class="form-control" id="password">
                      <h4 style="color:red; font-size: 14px;"></h4>
                    </div>
                     <div class="form-group">
                         <input type="button" class="btn btn-success" id ="saveuserdata"  value="Сохранить">
                    </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- Modal изменение -->
<div class="modal fade " id="myModal" role="dialog">
    
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Редактирование заказа</h4>
            </div>
            <div class="modal-body">

                <div class="table-responsive">          
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Код</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Количество</th>
                                
                            </tr>
                        </thead>
                        <tbody id = "editmodalho">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary pull-left"  onclick="Save()" data-dismiss="modal">Cохранить</button>
            </div>
        </div>

    </div>
        
</div>
</form>
<script>
    $(document).ready(function () {
        $(".btn-pref .btn").click(function () {
            $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
            // $(".tab").addClass("active"); // instead of this do the below 
            $(this).removeClass("btn-default").addClass("btn-primary");
        });

    });
 

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include_once ROOT . '/views/layouts/footer.php'; ?>

<style>
    .table thead tr>th, .table tbody tr>td{
        text-align: center !important;
    }
    .table tbody tr:hover{
        background-color: #1dbaa5;
    }
    .table tbody tr>th{
        text-align: center !important;
    }
    #orderbutton:hover
    {    
        background-color: #1dbaa5;
        border-color: #1dbaa5;
    }
    #orderbutton{
        background-color: black;
        color: #fff;
         border-color: #fff;
    }
</style>
