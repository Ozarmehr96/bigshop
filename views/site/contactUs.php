<?php include_once ROOT . '/views/layouts/header.php'; ?>

<div class="main"> 
    <div class="reservation_top">          
        <div class=" contact_right">
            <h3>Форма обратной связи</h3>
            <div class="contact-form">
                <form method="post" action="#">
                    <input type="text" class="textbox" placeholder="Имя" value="<?php if (isset($_SESSION['user'])) echo $getUser['name'];?>" name="name" id="name">
                    <input type="text" class="textbox" placeholder="Email" value="<?php if (isset($_SESSION['user'])) echo $getUser['email'];?>" name="email" id="email">
                    <textarea placeholder="Сообщения" name="message" id="message"></textarea>
                    <input type="submit" value="Отправить" name="submit" id="submit">
                    <div class="clearfix"></div>
                </form>
                <address class="address">
                    <p>9870 St Vincent Place, <br>Glasgow, DC 45 Fr 45.</p>
                    <dl>
                        <dt> </dt>
                        <dd>Freephone:<span> +1 800 254 2478</span></dd>
                        <dd>Telephone:<span> +1 800 547 5478</span></dd>
                        <dd>FAX: <span>+1 800 658 5784</span></dd>
                        <dd>E-mail:&nbsp; <a href="mailto@vintage.com">info(at)bigshop.com</a></dd>
                    </dl>
                </address>
            </div>
        </div>
    </div>
</div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>

