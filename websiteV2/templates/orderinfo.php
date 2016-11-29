<?php
?>
<main>
    <div class="col-md-12">
        <h2 class="text-center">Order Information</h2>
        <div class="col-md-6">
            <h2 class="text-center">User Information</h2>
            <table class="table table-bordered table-striped table-condensed">
                <tbody>
                    <tr>
                        <th>Date ordered : </th>
                        <td><?= $order[0]['date_ordered'];?></td>
                    </tr>
                    <tr>
                        <th>Name : </th>
                        <td><?= $address[0];?></td>
                    </tr>
                    <tr>
                        <th>Address : </th>
                        <td><?= $address[1];?></td>
                    </tr>
                    <tr>
                        <th>Town : </th>
                        <td><?= $address[2];?></td>
                    </tr>
                    <tr>
                        <th>County : </th>
                        <td><?= $address[3];?></td>
                    </tr>
                    <tr>
                        <th>Country : </th>
                        <td><?= $address[4];?></td>
                    </tr>
                    <tr>
                        <th>Contact : </th>
                        <td><?= $order[0]['user_phone'];?></td>
                    </tr>
                    <tr>
                        <th>Total : </th>
                        <td><?= $text->displayMoney($order[0]['user_total']);?></td>
                    </tr>
                    <tr>
                        <th>Name : </th>
                        <td><?= $address[1];?></td>
                    </tr>
                </tbody>
            </table>
            <?php if(!isset($_GET['history'])) : ?>
            <div class="col-md-12">
                <a href="index.php?action=dispatch&id=<?=$_GET['id']?>" class="btn btn-lg btn-primary">Dispatch Order</a>
                <a href="index.php?action=allorders" class="btn btn-lg btn-primary">Return</a>
            </div>
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <h2 class="text-center">Order Items</h2>
            <table class="table table-bordered table-striped table-condensed">
                <thead  class="text-center">
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody  class="text-center">
                <?php
                $sum = 0;
                $tax = 0;
                for($i = 0; $i < count($productInfo); $i++) : ?>
                <tr>
                    <td><?= $productInfo[$i]['product_info']->getName();?></td>
                    <td><?= $decodedCart[$i][3]; ?></td>
                    <td><?= $decodedCart[$i][1]; ?></td>
                    <td><?= $text->displayMoney($productInfo[$i]['product_info']->getPrice());?></td>
                    <td><?= $text->displayMoney($productInfo[$i]['product_info']->getPrice() * $decodedCart[$i][3]);?></td>
                </tr>
                <?php
                    $sum += $productInfo[$i]['product_info']->getPrice() * $decodedCart[$i][3];
                endfor;
                    $tax = $sum / TAX_RATE;
                ?>
                <tr>
                    <th colspan="3" class="text-center"> Cart Total</th>
                    <td colspan="2"><?= $text->displayMoney($sum)?></td>
                </tr>
                <tr>
                    <th colspan="3" class="text-center"> Tax</th>
                    <td colspan="2"><?= $text->displayMoney($tax)?></td>
                </tr>
                <tr>
                    <th colspan="3" class="text-center"> Tax</th>
                    <td colspan="2"><?= $text->displayMoney($sum + $tax)?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h2 class="text-center">Order Information</h2>
            <form action="index.php?action=updatestatus&id=<?=$validateF->sanitize($_GET['id'])?>" method="post">
                <div class="form-group row">
                    <label for="order_status" class="col-xs-2 col-form-label">Status : </label>
                    <div class="col-xs-9">
                        <textarea id = "order_status" class="form-control" <?=((isset($_GET['history']))?'readonly':'' );?> name = "order_status"><?=$order[0]['order_status']?></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php if(!isset($_GET['history'])) : ?>
                    <input type="submit" class="btn btn-lg btn-primary center-block">
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</main>
