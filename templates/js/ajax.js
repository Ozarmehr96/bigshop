$(document).ready(function(){
     getUserId = $("#header").attr("data-id");
//************     // при нажатии на кнопку "Добавить в карзину"    ********************************************
    $(".addtocart").click(function(e){
        e.preventDefault();
        /**
         * проверяем, существует ли пользователь в Сессии
         * если да, то добавляем в карзину
         * если нет, то выводим показываем диалоговое окно для входа/регистрации
         */
       if (getUserId === 'Yes')
       {
           var name = $(this).attr("data-name");
            var id = $(this).attr("data-id");
            $.post("/cart/add/"+id, {name:name},function(result)
            {
                if (result == 1)
                {
                    ShowMessage("Товар успешно добавлен в карзину.");
                }
           }); 
       }
       else
       {
            $("#myCheckModal").modal();
       }
    });
  //****************************************************************************************************************
    CartView();
    var userid;
    // Модифицированые данные пользователя  --------------------------------------------------------------------
        $("#saveuserdata").click(function(){
           userid = $("#well").attr("data-id");
        var name = $("#name").val();
        var password = $("#password").val();
        var check = true;
        if(name.length <= 2)
        {
            $("#name").next().text("Имя не должно быть короче 2 символов");
            check = false;
        }
        else {
           $("#name").next().text("");
           check = true;
            
        }
        if (password.length <= 5) {
            $("#password").next().text("Пароль не должна быть меньше 6 символов");
            check = false;
        }
        
        else {
             $("#password").next().text("");
             check = true;
        }
        if (check == true){
             $("#name").next().text("");
            $("#password").next().text("");
             $.post('/user/edit/data/'+userid, {name :name, password:password}, function (result) {
                if  (result == 1){
                    $(".card-title").text(name);
                    ShowMessage("Данные сохранены!");
                }
            });
        }
        
});


    
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});

    /**
     * Выравнивание vмодал по центру
     * @returns {undefined}
     */
    function alignModal(){
        var modalDialog = $(this).find(".modal-dialog");
        
        // Applying the top margin on modal dialog to align it vertically center
        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
    }
    // Align modal when it is displayed
    $(".modal").on("shown.bs.modal", alignModal);
    
    // Align modal when user resize the window
    $(window).on("resize", function(){
        $(".modal:visible").each(alignModal);
    }); 
});

function ShowMessage(string)
{
       al = '<div class="alert alert-success alert-dismissable " style = " width :311.44px;" role="alert"  id="beautyalert"><a class="close" data-dismiss="alert" aria-label="close" id="closeMe">x</a>'+string+'</div>';
 $("#alertcol").append(al);
               AutoClose();
}
var userid;
var counto;
var productid;
function EditCart(a)
{
    var query = "edit";
    userid = $("#mytable").attr("data-id");
   $(".okk").remove();
   $("#myModal").modal('show');
   var t = '<tr class = "okk"><th>1</th><th>'+$(a).data('id')+'</th><th>'+$(a).data('name')+'</th><th>'+$(a).data('price')+'</th><th class = "lp"><input type="text"  id="me" name="me"></th></tr>';
    
     productid = $(a).data('id');
   $("#editmodalho").append(t);  
    
}
function AutoClose() {
   window.setTimeout(function() {
    $("#beautyalert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000); 
}


var cartList = [];
var totalProductCount = [];
var oldCount = 0;
function CartView()
{
    
    $(".cartlist").remove();
    var go = 9;
     
      userid = $("#mytable").attr("data-id");
    $.getJSON({
         type : "POST",
         url: '/cart/add/live/'+userid,
         data:   {view:go},
         error: function(xhr) {
            console.log('Ошибка!'+xhr.status+' '+xhr.statusText); 
    },
    success: function(result)
    {
        var num = 1;
          oldCount =   CheckOldCount();
        $.each(result, function(key, val){
            cartList = [{key : val.productid}];
            $("#mytable").append('\n\
             <tr class = "cartlist" id = "'+val.productid+'">\n\
                <td>'+num+++'</td>\n\
                <td>'+ val.productid +'</td>\n\
                <td><a href = "/product/view/'+ val.productid +'">'+ val.name +'</a></td>\n\
                <td>'+ val.newprice +'</td>\n\
                <td>'+ val.count +'</td>\n\
                <td data-id = "'+val.productid+'" onclick = "DeleteCart(this)"><i class="glyphicon glyphicon-remove" data-id = "'+val.productid+'" aria-hidden="true"></i></td>\n\
                \n\
                <td onclick = "EditCart(this)" data-id ="'+val.productid+'" data-name = "'+val.name+'" data-price = "'+val.newprice+'">\n\
                    <i class="glyphicon glyphicon-edit"  data-id = "'+val.productid+'" aria-hidden="true"></i></td>\n\
            </tr>');
        });
    }
      
  });
}
//--------------------------        Удаление товара из корзины *************************************
function DeleteCart(dateName)
{
    var productid =  $(dateName).data("id");
    $.post('/user/deletecart/'+userid+'/'+productid, function (result){
       if (result == 1)
       {
           $("#"+productid+"").remove();
           ShowMessage("Товар усшено удален из корзины!");
       }
       
   });
}
  
setInterval(function() {
 // CartView();
}, 2000);
function Save()
{
    var ok = document.getElementById("me").value;
   $.ajax({
        type : "POST",
        url: '/cart/edit/live/'+userid+'/'+productid+'/'+ok+'/',
        
        error: function(xhr) {
        console.log('Ошибка!'+xhr.status+' '+xhr.statusText); 
    },
        success: function (data) {
          if (data == 1)
          {
              CartView();
              ShowMessage("Данные сохранены!");
          }  
           
        }
    });
}

var cartnewList = [];

setInterval(function() {
  CheckNewCount();
}, 1000);

function SaveUserData()
{
    var name = $("#name").val();
    var password = $("#password").val();
    
    $.post('user/edit/data/'+userid, {name :name, password:password},function (result) {
        if (result === 1)
        {
            $(".card-title").text(result);
            
        }
    });
}
var productTotal;
function CheckNewCount(){
    $.post('/user/checktotalproduct/'+userid, function(result){
       productTotal = result;
      if (productTotal != oldCount)
      {
            CartView();
      }
    });
    
};

function CheckOldCount(){
    $.post('/user/checktotalproduct/'+userid, function(result){
       oldCount = result;
    });
};