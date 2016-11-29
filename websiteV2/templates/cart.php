<?php

?>
<main>
    <div class="col-md-12">
        <div class="col-md-8 text-center">
            <h3 class="text-center">Cart</h3>
            <table class="table table-condensed table-striped table-bordered">
                <thead>
                <tr class="text-center">
                    <td>Product</td>
                    <td>Qty</td>
                    <td>Size</td>
                    <td>Price(each)</td>
                    <td>Item Total</td>
                    <td>Options</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $sum = 0;
                for ($i = 0; $i < count($cart); $i++) : ?>
                    <tr class="text-center">
                        <td><?= $productToGetInfo[$i]['product_info']->getName();?></td>
                        <td><?= $cart[$i][3];?></td>
                        <td><?=$cart[$i][1]?></td>
                        <td><?= $text->displayMoney($productToGetInfo[$i]['product_info']->getPrice() - ($productToGetInfo[$i]['product_info']->getPrice() * $productToGetInfo[$i]['product_discount']));?></td>
                        <td><?= $text->displayMoney(($productToGetInfo[$i]['product_info']->getPrice() - ($productToGetInfo[$i]['product_info']->getPrice() * $productToGetInfo[$i]['product_discount'])) * $cart[$i][3]);?></td>
                        <td><a href="index.php?action=removeitem&prod=<?=$cart[$i][0];?>" class="btn-xs btn btn-default"><span class="glyphicon-remove glyphicon"></span></a></td>
                    </tr>
                    <?php
                $sum += ($productToGetInfo[$i]['product_info']->getPrice() - ($productToGetInfo[$i]['product_info']->getPrice() * $productToGetInfo[$i]['product_discount'])) * $cart[$i][3];
                endfor;
                if(empty($_SESSION['user_cart'])) :
                    ?>
                    <tr class="text-center">
                        <td colspan="6">Cart Is Empty..</td>
                    </tr>
                <?php endif;?>
                <tr class="text-center">
                    <td colspan="2">Subtotal</td>
                    <td colspan="4"><?= $text->displayMoney($sum);?></td>
                </tr>
                <tr class="text-center">
                    <td colspan="2">Tax @ (<?= TAX_RATE ?>%)</td>
                    <td colspan="4"><?= $text->displayMoney($sum / TAX_RATE);?></td>
                </tr>
                <tr class="text-center">
                    <td colspan="2">Total(Inc Tax)</td>
                    <td colspan="4"><?= $text->displayMoney($sum +($sum / TAX_RATE));?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 text-center" style="margin-top: 50px">
            <a href="index.php?action=checkout" class="btn btn-default btn-lg">Checkout</a>
            <a href="index.php?action=emptycart" class="btn btn-default btn-lg">Empty Cart</a>
        </div>
    </div>
</main>
