<?php include_once ROOT . '/views/layouts/header.php'; ?>
<div class="account_grid">
    <?php if (isset($_SESSION['user'])): ?>
    <div class=" login-right">
        <h3>Вы зарегистрированы</h3>
    </div>
    <?php else:?>

    <div class=" login-right">
        <h3>Авторизация</h3>
        <p>Если у вас есть аккаунт, пожалуйста, войдите в систему.</p>
        <?php if (isset($err) && is_array($err)):?>  
            <ul>
                    <?php foreach ($err as $error):?>
                        <li><?php  echo $error;?><li>
                    <?php endforeach;?>
            </ul>
        <?php endif;?>
        <form action="#" method="POST">
            <div>
                <span>Email Адрес<label>*</label></span>
                <input type="email" name="email" id="email" value="<?php echo $email; ?>" required> 
            </div>
            <div>
                <span>Пароль<label>*</label></span>
                <input type="password" name="password" id="password" required> 
            </div>
            <a class="forgot" href="#">Забыли пароль?</a>
            <input type="submit" value="Войти" id="submit" name="submit">
        </form>
    </div>	
    <div class=" login-left">
        <h3>Создание аккаунта</h3>
        <p>Создавая учетную запись, вы сможете оформить заказа быстрее, хранить несколько адресов доставки, просматривать и отслеживать заказы в вашем аккаунте и многое другое.</p>
        <a class="acount-btn" href="register.html">Создать аккаунт</a>
    </div>
    <?php endif;?>
    <div class="clearfix"> </div>
</div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>
