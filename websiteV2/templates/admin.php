<?php
?>
<main>
    <div class="col-md-12">
        <div class="col-md-5">
            <h2 class="text-center">Orders To Dispatch</h2>
            <table class="table table-bordered table-striped table-condensed">
                <thead class="text-center">
                    <tr>
                        <th>Date Ordered</th>
                        <th>Order Status</th>
                        <th>Order Total</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?= $validateF->sanitize($order['date_ordered']); ?></td>
                        <td><?= $validateF->sanitize($order['order_status']); ?></td>
                        <td><?= $validateF->sanitize($text->displayMoney($order['user_total'])); ?></td>
                        <td><a href="index.php?action=orderinfo&id=<?= $validateF->sanitize($order['order_id']); ?>"><span class="glyphicon glyphicon glyphicon-chevron-right"></span></a></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            <a href="index.php?action=allorders" class="btn btn-lg btn-primary">See All Orders</a>
        </div>
        <div class="col-md-3">
            <h2 class="text-center">Yearly Figures</h2>
            <table class="table table-striped table-condensed table-bordered">
                <tr class="text-center">
                    <th>Month</th>
                    <th>Number Of Orders</th>
                    <th>Amount</th>
                </tr>
                <?php
                    for ($i = 1; $i <= 12; $i++) :
                        $monthSum = 0;
                        $numOfOrders = 0;
                        foreach ($ordersData as $item)
                        {   $date =  date('m',strtotime($item['date_ordered']));
                            if($date == $i)
                            {
                                $monthSum += $item['user_total'];
                                $numOfOrders++;
                            }
                        }
                        ?>
                        <tr class="text-center">
                            <td><?= date("F" ,strtotime("December + $i months"));?></td>
                            <td><?= $numOfOrders;?></td>
                            <td><?= $text->displayMoney($monthSum);?></td>
                        </tr>
                <?php endfor; ?>
                </table>
        </div>
        <div class="col-md-4">
            <h2 class="text-center">Low Stock Inventory</h2>
            <table class="table table-striped table-condensed table-bordered">
                <thead  class="text-center">
                    <tr>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Stock Left</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                <?php foreach ($lowStock as $item):?>
                    <tr>
                        <td><?= $item[0];?></td>
                        <td><?= $item[1];?></td>
                        <td><?= $item[2];?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</main>
