<main>
<?php
    if(!isset($_GET['confirm']) || $_GET['confirm'] != 1):
?>
    <div class="col-md-12">
        <h2 class="text-center">Shipping Details</h2>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="index.php?action=checkout&confirm=1" method="post">
                <div class="form-group row">
                    <label for="user_name" class="col-xs-2 col-form-label">Name : </label>
                    <div class="col-xs-7">
                        <input type="text" name="user_name" id="user_name" class="form-control">
                    </div><span class="glyphicon glyphicon-asterisk text-danger"></span>
                </div>
                <div class="form-group row">
                    <label for="address_1" class="col-xs-2 col-form-label">Address : </label>
                    <div class="col-xs-7">
                        <input type="text" name="address_1" id="address_1" class="form-control">
                    </div><span class="glyphicon glyphicon-asterisk text-danger"></span>
                </div>
                <div class="form-group row">
                    <label for="city" class="col-xs-2 col-form-label">City : </label>
                    <div class="col-xs-7">
                        <input type="text" name="city" id="city" class="form-control">
                    </div><span class="glyphicon glyphicon-asterisk text-danger"></span>
                </div>
                <div class="form-group row">
                    <label for="county" class="col-xs-2 col-form-label">County : </label>
                    <div class="col-xs-7">
                        <input type="text" name="county" id="county" class="form-control">
                    </div><span class="glyphicon glyphicon-asterisk text-danger"></span>
                </div>
                <div class="form-group row">
                    <label for="country" class="col-xs-2 col-form-label">Country : </label>
                    <div class="col-xs-7">
                        <input type="text" name="country" id="country" class="form-control">
                    </div><span class="glyphicon glyphicon-asterisk text-danger"></span>
                </div>
                <div class="form-group row">
                    <label for="user_phone" class="col-md-2 pull-left">Phone : </label>
                    <div class="col-xs-7">
                        <input type="tel" pattern="\d{10}" title="Please Enter Your Number in the format 1231234567" name="user_phone" id="user_phone" class="form-control" value="<?= (($_GET['action'] == 'edituser'))? $prev['user_phone']:'';?>">
                    </div>
                    <span class="glyphicon glyphicon-asterisk text-danger">
                </div>
                <div class="col-md-9 text-center">
                    <input type="submit" class="btn btn-lg btn-success" value="Checkout">
                    <a href="index.php?action=cart" class="btn btn-lg btn-danger">Return</a>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
    <?php else:?>
    <div class="col-md-12">
        <h2 class="text-center">Confirm Order</h2>
        <div class="col-md-6">
            <div class="col-md-10">
                <h2 class="text-center">Cart Details</h2>
                <table class="table table-bordered table-condensed table-striped">
                    <thead>
                    <td>Product</td>
                    <td>Qty</td>
                    <td>Size</td>
                    <td>Price(each)</td>
                    <td>Item Total</td>
                    </thead>
                    <tbody>
                        <?php
                        $sum = 0;
                            for ($i = 0; $i < count($cartProducts); $i++ ) :
                                $sum += ($productToCheck[$i]['product_info']->getPrice() - ($productToCheck[$i]['product_info']->getPrice() * $productToCheck[$i]['product_discount'])) * $_SESSION['user_cart'][$i][3]; ?>
                            <tr class="text-center">
                                <td><?= $productToCheck[$i]['product_info']->getName();?></td>
                                <td><?= $_SESSION['user_cart'][$i][3];?></td>
                                <td><?=$_SESSION['user_cart'][$i][1]?></td>
                                <td><?= $text->displayMoney($productToCheck[$i]['product_info']->getPrice() - ($productToCheck[$i]['product_info']->getPrice() * $productToCheck[$i]['product_discount']));?></td>
                                <td><?= $text->displayMoney(($productToCheck[$i]['product_info']->getPrice() - ($productToCheck[$i]['product_info']->getPrice() * $productToCheck[$i]['product_discount'])) * $_SESSION['user_cart'][$i][3]);?></td>
                            </tr>
                            <?php endfor;
                        $tax = $sum / TAX_RATE;
                        $total = $sum + $tax;
                        ?>
                        <tr class="text-center">
                            <td colspan="2">Subtotal</td>
                            <td colspan="4"><?= $text->displayMoney($sum);?></td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">Tax @ (<?= TAX_RATE ?>%)</td>
                            <td colspan="4"><?= $text->displayMoney($tax);?></td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">Total(Inc Tax)</td>
                            <td colspan="4"><?= $text->displayMoney($total);?></td>
                        </tr>
                    </tbody>
                    </tbody>
                </table>
                <form action="index.php?action=process" method="post">
                    <script
                        src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
                        data-name="Akira Merchandise"
                        data-description="Your Cart Total : <?=($text->displayMoney($total));?>"
                        data-key="<?=TEST_PUBLISH_KEY;?>"
                        data-amount="<?=(round($total *100));?>">
                    </script>

                    <input type = "hidden" name="user_name" value="<?=$_POST['user_name']?>">
                    <input type = "hidden" name="address_1" value="<?=$_POST['address_1']?>">
                    <input type = "hidden" name="city" value="<?=$_POST['city']?>">
                    <input type = "hidden" name="county" value="<?=$_POST['county']?>">
                    <input type = "hidden" name="country" value="<?=$_POST['country']?>">
                    <input type = "hidden" name="user_phone" value="<?=$_POST['user_phone']?>">
                    <input type = "hidden" name="amount" value="<?=(round($total *100))?>">
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="text-center">Shipping Details</h2>
            <div class="col-md-10">
                <table class="table table-striped table-condensed table-bordered">
                    <tr>
                        <th colspan="2">Shipping Address</th>
                    </tr>
                    <tr>
                        <th>Name : </th>
                        <td><?=$_POST['user_name']?></td>
                    </tr>
                    <tr>
                        <th>Street : </th>
                        <td><?=$_POST['address_1']?></td>
                    </tr>
                    <tr>
                        <th>City : </th>
                        <td><?=$_POST['city']?></td>
                    </tr>
                    <tr>
                        <th>County : </th>
                        <td><?=$_POST['county']?></td>
                    </tr>
                    <tr>
                        <th>Country : </th>
                        <td><?=$_POST['country']?></td>
                    </tr>
                    <tr>
                        <th>Phone Number : </th>
                        <td><?=$_POST['user_phone']?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php endif;?>
</main>


