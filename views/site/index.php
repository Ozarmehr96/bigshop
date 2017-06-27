<?php include_once ROOT.'/views/layouts/header.php';?>

            <div class="shoes-grid">
                    <div class="wrap-in">
                        <div class="wmuSlider example1 slide-grid">		 
                            <div class="wmuSliderWrapper">
                               <?php foreach ($resForAdd as $article):?>
                                    <article style="position: absolute; width: 100%; opacity: 0;">					
                                        <div class="banner-matter">
                                            <div class="col-md-5 banner-bag">
                                                <img class="img-responsive " src="<?php echo Product::get_ImageByID($article['id'])?>" alt=" " />
                                            </div>
                                            <div class="col-md-7 banner-off">							
                                                <h2></h2>
                                                <label>Распродажа</label>
                                                <p><?php echo $article['title']; ?></p>					
                                                <a href="/product/view/<?php echo $article['id']; ?>"><span class="on-get">Посмотреть</span></a>
                                            </div>

                                            <div class="clearfix"> </div>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                            
                            <ul class="wmuSliderPagination">
                                <li><a href="#" class="">0</a></li>
                                <li><a href="#" class="">1</a></li>
                                <li><a href="#" class="">2</a></li>
                            </ul>
                            <script src="/templates/js/jquery.wmuSlider.js"></script> 
                <!---->
                <div class="shoes-grid-left">
                    <a href="single.html">				 
                        <div class="col-md-6 con-sed-grid">
                            <script>
                                $('.example1').wmuSlider();
                            </script> 
                        </div>
                    </div>
                </a>

                            

                            <div class="clearfix"> </div>

                        </div>
                    
                    
                </div>
                <div class="products">
                    <h5 class="latest-product">Рекомендуемые товары</h5>	
                    		     
                </div>
                <div class="product-left">
                    <?php foreach ($is_recomendedList as $recomendedProduct):?>
                        <div class="col-md-4 chain-grid">
                            <a href="/product/view/<?php echo $recomendedProduct['id'];?>">
                                <img class="myImage img-responsive chain " src="<?php echo Product::get_ImageByID($recomendedProduct['id']); ?>" alt=" " class=""/>
                            </a>
                                <?php if ($recomendedProduct['is_new'] == 1): ?>
                                    <span class="star"> </span>
                                <?php endif;?>
                            <div class="grid-chain-bottom">
                                <h6><a href="/product/view/<?php echo $recomendedProduct['id'];?>"><?php echo Product::get_StringReturnNormalLength($recomendedProduct['title']);?></a></h6>
                                <div class="star-price">
                                    <div class="dolor-grid"> 
                                        <span class="actual"><?php echo $recomendedProduct['newprice'];?></span>
                                        <span class="reducedfrom"><?php echo $recomendedProduct['lastprise'];?></span>
                                    </div>
                                    <a class="now-get get-cart addtocart" href="#" data-name ="<?php echo $recomendedProduct['title'];?>" id="addToCart" data-id = "<?php echo $recomendedProduct['id'];?>">В карзину</a> 
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                   
                    
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>   


<?php include_once ROOT.'/views/layouts/footer.php';?>

