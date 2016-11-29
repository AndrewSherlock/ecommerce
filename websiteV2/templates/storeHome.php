<?php

?>

<main>
    <div class="col-md-12">

        <div class="col-md-2">
            <h3 class="text-center">Cart</h3>
        <table class="table table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <td>Qty</td>
                    <td>Product</td>
                    <td>Price(each)</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sum = 0;
                if(!empty($_SESSION['user_name'])) :
                for ($i = 0; $i < count($cart); $i++) : ?>
                    <tr>
                        <td><?= $cart[$i][3];?></td>
                        <td><?= $productInfoToGet[$i]['product_info']->getName();?></td>
                        <td><?= $text->displayMoney($productInfoToGet[$i]['product_info']->getPrice()-($productInfoToGet[$i]['product_info']->getPrice() * $productInfoToGet[$i]['product_discount']));?></td>
                    </tr>
                    <?php
                    $sum += $productInfoToGet[$i]['product_info']->getPrice() * $cart[$i][3];
                endfor;
                $count = 0;
                $sum = 0;
                $itemInfo =[];
                foreach ($cart as $item) :
                    for ($i = 0; $i < count($cart); $i++ )
                    {
                        if($cart[$i][0] == $item[0])
                        {
                            $itemInfo = $cart[$i];
                            $sum += $itemInfo[2] * $item[3];
                        }
                    }
                    ?>

                <?php
                $count++;
                endforeach;
                endif;
                if(empty($_SESSION['user_cart']) || empty($_SESSION['id'])) :
                ?>
                <tr>
                    <td colspan="3">Cart Is Empty..</td>
                </tr>
                <?php endif;?>
                <tr>
                    <td colspan="2">Price</td>
                    <td><?= $text->displayMoney($sum);?></td>
                </tr>
                <tr class="text-center">
                    <td colspan="3"><a href="index.php?action=cart" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="col-md-10">
            <div class="col-md-3"></div>
            <div class="col-md-6"><h2 class="text-center store_header"><?=((!isset($_GET['favourites']))?((isset($_GET['cat'])))? strtoupper($categorys[($_GET['cat']-1)][1]) :'Featured Products' : 'Best Selling');?></h2></div>
            <div class="col-md-3"><a href="index.php?action=<?=((!isset($_GET['favourites'])?"store&favourites=true" : 'store'));?>" class="btn btn-default btn-lg text-right buttn_fav"><?=((!isset($_GET['favourites'])?"Best Selling" : 'See our favourites'));?></a></div>

               <?php
               foreach ($newProducts as $newProduct) : ;?>
            <div class="col-md-3 product_details">
                <a href="index.php?action=product&prodid=<?=$newProduct[0];?>"><h4 class="text-center product_title"><?= $newProduct[2]->getName();?></h4></a>
                <a href="index.php?action=product&prodid=<?=$newProduct[0];?>"><img class="center-block" id="store_product_image" src="<?=$newProduct[2]->getImage();?>"></a>
                <div class="col-md-12 percent_area">
                    <?php if($newProduct['product_discount'] > 0) :?>
                            <p class="text-center"><span class="sale_text">SALE :</span><span class="percentage"><?= $text->getPercentFromFloat($newProduct['product_discount']);?> OFF</span> </p>
                    <?php endif;?>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                       <p><span class="percentage"><?=$text->displayMoney($newProduct[2]->getPrice()-($newProduct[2]->getPrice() * $newProduct['product_discount']));?></span></p>
                    </div>
                    <div class="col-md-6">
                        <a href="index.php?action=product&prodid=<?=$newProduct[0];?>" class="btn btn-default pull-right" id="store_product_btn">See product</a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</main>

