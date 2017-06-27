<?php include_once ROOT . '/views/layouts/header.php'; ?>
<div class="account_grid">
    <?php if ($checkresult == TRUE):?>
    <h3>Спасибо за Ваш заказ.</h3>
    <p>Мы свяжемся с вами в ближайшее время</p>
    <?php else: ?>
    <h3>Оформления заказа</h3>
    <p>Для оформления заказа заполните форму. Мы в ближайшее время свяжемся с вами.</p>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="name" >Ваше имя</label>
            <input type="text" class="form-control" id ="nameorder" name="nameorder" value="<?php echo $userorderedname;?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Номер Вашего телефона</label>
            <input type="text" class="form-control" id ="phone" name="phone" value="<?php echo $phone;?>" required pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$">
        </div>
        <div class="form-group">
            <label for="comment">Комментарий к заказу</label>
            <textarea class="form-control" rows="5" id="comment" name="comment" value = "<?php echo $comment;?>"><?php echo $comment;?></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" id="submit" name="submit" value="Оформить"/>
        </div>
    </form>
    <?php endif; ?>
</div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>

