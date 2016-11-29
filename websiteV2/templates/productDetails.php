
    <div class="col-md-12 product_info">
        <div class="col-md-5">
            <img class="center-block" src="<?=$product['product_info']->getImage();?>" alt="<?=$product['product_info']->getName();?>">
        </div>
        <div class="col-md-5">
           <h2 class="text-center"><?=$product['product_info']->getName();?></h2>
            <p class="product_text_block">
                <?= wordwrap($product['product_info']->getDescription(),90, '<br>', true);?>
            </p>
            <p class="product_cat_block">Category : <?= strtoupper($cat['category']);?></p>
            <?php if($product['product_discount'] > 0) :?>
                <p class="discount_area">
                    <span class="ad_sale_text">Product discount :</span> <span class="percentage_ad"><?= $text->getPercentFromFloat($product['product_discount'])?> OFF<br>
                    Previous Price : </span>
                    <span class="prev_price"><?=$text->displayMoney($product['product_info']->getPrice())?></span>
                </p>
            <?php endif;?>

            <p class="product_price">
                Price : <?=$text->displayMoney($product['product_info']->getPrice() -($product['product_info']->getPrice() * $product['product_discount']));?>
            </p>
            <form action="index.php?action=addtocart" method="post">
            <?php if($product['product_category'] == 3):?>
                <label for = "size">Size : </label>
                <select name = "size">
                    <option value=""></option>
                    <?php for ($i = 0; $i < count($sizeArray); $i++) :?>
                        <option value="<?=$sizeArray[$i][0]?>"><?=ucfirst($sizeArray[$i][0])?> : (<?=$sizeArray[$i][1]?> available)</option>
                    <?php endfor;?>
                </select>
            <?php else : ?>
                <input type="hidden" name="size" value="unit">
                <p class="product_price">Stock : <?=$sizeArray[0][1];?></p>
            <?php endif;?>
                        <label for ="qty">Quantity</label>
                        <input type="number" min="0" name="qty">
                        <input type="hidden" name="price" value="<?=$product['product_info']->getPrice() -($product['product_info']->getPrice() * $product['product_discount']);?>">
                        <input type="hidden" name="product_id" value="<?=$product['id'];?>">
                    <div class="col-md-12 text-center product_button">
                        <input type="submit" class="btn-default btn btn-lg" value="Add To Cart">
                        <a href="index.php?action=store" class="btn-default btn btn-lg">Return to store</a>
                    </div>
                </div>
              </form>
        </div>
    </div>
</main>
