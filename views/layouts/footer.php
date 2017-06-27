<div class="sub-cate">
    <div class=" top-nav rsidebar span_1_of_left">
        <h3 class="cate">Категории</h3>
        <ul class="menu">
            <li>
                <ul class="kid-menu">
                    <?php foreach ($categoryList as $menu): ?>
                        <li><a href="/catalog/view/<?php echo $menu['id']; ?>" style="<?php if (!isset($categoryid)) $categoryid = 0;
                    if ($categoryid == $menu['id']) echo "background-color: #1DBAA5" ?>">
                        <?php echo $menu['category_title']; ?></a>
                        </li>
<?php endforeach; ?>
                </ul>
            <li>
        </ul>
    </div>
    <!--initiate accordion-->

    <div class=" chain-grid menu-chain">
        <a href="single.html"><img class="img-responsive chain" src="/templates/images/wat.jpg" alt=" " /></a>	   		     		
        <div class="grid-chain-bottom chain-watch">
            <span class="actual dolor-left-grid"><?php echo $singleLeftProduct['newprice'] ?></span>
            <span class="reducedfrom"><?php echo $singleLeftProduct['lastprise'] ?></span>  
            <h6><a href="single.html"><?php echo $singleLeftProduct['title'] ?></a></h6>  		     			   		     										
        </div>
    </div>
    <a class="view-all all-product" href="/product/view/all">Просмотр всех товаров<span> </span></a> 	
</div>
<div class="clearfix"> </div> 
</div>	


<!---->
<div class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="latter">
                <h6>NEWS-LETTER</h6>
                <div class="sub-left-right">
                    <form>
                        <input type="text" value="Email адрес" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Email адрес';
                                }" />
                        <input type="submit" value="Подписатся" />
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="latter-right">
                <p>Поделится</p>
                <ul class="face-in-to">
                    <li><a href="#"><span> </span></a></li>
                    <li><a href="#"><span class="facebook-in"> </span></a></li>
                    <div class="clearfix"> </div>
                </ul>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-cate">
                <h6>Категории</h6>
                <ul>
                    <?php foreach ($categoryList as $menu): ?>
                        <li><a href="/catalog/view/<?php echo $menu['id']; ?>"><?php echo $menu['category_title']; ?></a></li>
<?php endforeach; ?>
                </ul>
            </div>
            <div class="footer-bottom-cate bottom-grid-cat">
                <h6>Наши проекты</h6>
                <ul>

                    <li><a href="#">Ultrices id du</a></li>
                    <li><a href="#">Commodo sit</a></li>
                </ul>
            </div>
            <div class="footer-bottom-cate">
                <h6>Лучшие бренды</h6>
                <ul>
                    <li><a href="#">Curabitur sapien</a></li>
                    <li><a href="#">Dignissim purus</a></li>
                    <li><a href="#">Tempus pretium</a></li>
                    <li ><a href="#">Dignissim neque</a></li>
                    <li ><a href="#">Ornared id aliquet</a></li>

                </ul>
            </div>
            <div class="footer-bottom-cate cate-bottom">
                <h6>Наш адрес</h6>
                <ul>
                    <li>Aliquam metus  dui. </li>
                    <li>orci, ornareidquet</li>
                    <li> ut,DUI.</li>
                    <li >nisi, dignissim</li>
                    <li >gravida at.</li>
                    <li class="phone">PH : 6985792466</li>
                    <li class="temp"> <p class="footer-class"> <a href="/admin" target="_blank">Администраторам</a> </p></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
            <div class="beautyalert" style="position:fixed;bottom:0;z-index:999; margin-left: -17px;">
                <div class="col-md-12" id="alertcol">
        
                </div>
            </div>
        </div>
    </div>
    <script src="/templates/js/ajax.js"></script>
    
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
