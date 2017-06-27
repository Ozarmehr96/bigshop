<?php include_once ROOT . '/views/layouts/header.php'; ?>

<div class=" single_top">
    <div class="single_grid">
        <div class="grid images_3_of_2">
            <ul id="etalage">
                <li>
                    <a href="optionallink.html">
                        <img class="etalage_thumb_image" src="<?php echo Product::get_ImageByID($singlePRoduct['id']); ?>" class="img-responsive" />
                        <img class="etalage_source_image" src="<?php echo Product::get_ImageByID($singlePRoduct['id']); ?>" class="img-responsive" title="" />
                    </a>
                </li>
            </ul>
            <div class="clearfix"> </div>		
        </div> 
        <div class="desc1 span_3_of_2">


            <h4><?php echo $singlePRoduct['title']; ?></h4>
            <div class="cart-b">
                <div class="left-n "><?php echo $singlePRoduct['newprice']; ?> руб.</div>
                <a class="now-get get-cart-in addtocart"  href="#" data-name ="<?php echo $singlePRoduct['title'];?>" id="addToCart" data-id = "<?php echo $singlePRoduct['id'];?>">Добавить в карзину</a> 
                <div class="clearfix"></div>
            </div>
            <?php if ( $singlePRoduct['count_in_stock'] != 0):?>
            <h6><?php echo $singlePRoduct['count_in_stock']; ?> штук на скаладе</h6>
            <?php endif;?>
            <p><?php echo $singlePRoduct['discription']; ?></p>
            <div class="share">
                <h5>Поделиться:</h5>
                <ul class="share_nav">
                    <li><a href="#"><img src="/templates/images/facebook.png" title="facebook"></a></li>
                    <li><a href="#"><img src="/templates/images/twitter.png" title="Twiiter"></a></li>
                    <li><a href="#"><img src="/templates/images/rss.png" title="Rss"></a></li>
                    <li><a href="#"><img src="/templates/images/gpluse.png" title="Google+"></a></li>
                </ul>
            </div>


        </div>
        <div class="clearfix"> </div>
    </div>
    <ul id="flexiselDemo1">
        <li><img src="/templates/images/pi.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
        <li><img src="/templates/images/pi1.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
        <li><img src="/templates/images/pi2.jpg" /><div class="grid-flex"><a href="#">Zumba</a><p>Rs 850</p></div></li>
        <li><img src="/templates/images/pi3.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
        <li><img src="/templates/images/pi4.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
    </ul>
    <script type="text/javascript">
        $(window).load(function () {
            $("#flexiselDemo1").flexisel({
                visibleItems: 5,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });

        });
    </script>
    <script type="text/javascript" src="/templates/js/jquery.flexisel.js"></script>

    <div class="toogle">
        <h3 class="m_3">Детали товара</h3>
        <p class="m_text"><?php echo $singlePRoduct['details']; ?></p>
    </div>	
</div>
<?php include_once ROOT . '/views/layouts/footer.php'; ?>