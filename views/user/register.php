<?php include_once ROOT . '/views/layouts/header.php'; ?>

<div class="register">
    <?php if ($result == true):?>
            <div class="register-top-grid">
                <h3 style="text-align:center">Успешно зарегисрировались!</h3>
            </div>
         <?php else :?>
    <form action="#" method="POST"> 
        <div class="register-top-grid">
            <h3>Регистрация</h3>
           <?php  if(isset($errors) && is_array($errors)):?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li>- <?php echo $error ?></li>
                <?php endforeach;?>
            </ul>
           <?php endif;?>
            <div class="mation">  
                <span>Имя<label>*</label></span>
                <input type="text" name="name" id="name" value="<?php echo $name?>">
                
                <span>Email Адрес<label>*</label></span>
                <input type="email" name="email" id="email"  value="<?php echo $email?>"> 
            </div>
            <div class="clearfix"> </div>
            
        </div>
        <div class="  register-bottom-grid">
            <h3>Параметры входа</h3>
            <div class="mation">
                <span>Пароль<label>*</label></span>
                <input type="password" name="password" id="password" class="password">
                <span>Подтвердите пароль<label>*</label></span>
                <input type="password" name="repassword" id="repassword">
            </div>
        </div>
    
    <div class="clearfix"> </div>
    <div class="register-but">
            <input type="submit" value="Зарегистрироваться" name="submit" id="submit">
            <div class="clearfix"> </div>
        
    </div>
    
    </form>
    <?php endif;?>
</div>
<?php include_once ROOT . '/views/layouts/footer.php'; ?>