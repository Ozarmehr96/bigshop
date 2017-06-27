<?php include_once ROOT.'/views/layouts/header.php';?>
<div class="shoes-grid">
    <div class="product-left">
                    <?php foreach ($productList as $product):?>
                        <div class="col-md-4 chain-grid">
                            <a href="/product/view/<?php echo $product['id'];?>">
                                <img class="myImage img-responsive chain" src="<?php echo Product::get_ImageByID($product['id']); ?>" alt=" " />
                            </a>
                                <?php if ($product['is_new'] == 1): ?>
                                    <span class="star"> </span>
                                <?php endif;?>
                            <div class="grid-chain-bottom">
                                <h6><a href="/product/view/<?php echo $product['id'];?>"><?php echo Product::get_StringReturnNormalLength($product['title']);?></a></h6>
                                <div class="star-price" data-id = "<?php echo $product['id'] ; ?>">
                                    <div class="dolor-grid"> 
                                        <span class="actual"><?php echo $product['newprice'];?></span>
                                        <?php if ($product['is_new'] == 1): ?>
                                            <span class="reducedfrom"><?php echo $product['lastprise'];?></span> 
                                        <?php endif;?>руб.
                                    </div>
                                    <a class="now-get get-cart addtocart" href="#" data-name ="<?php echo $product['title'];?>" id="addToCart" data-id = "<?php echo $product['id'];?>">В карзину</a> 
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                   
                    
                    <div class="clearfix"> </div>
                </div>
</div>
                

<?php include_once ROOT.'/views/layouts/footer.php';?>