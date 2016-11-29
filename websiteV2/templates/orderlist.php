<?php
?>
    <div class="col-md-12">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2 class="text-center"><?=(($_GET['action'] == 'previousorder')? 'Your Previous Orders' : ($_GET['action'] == 'orderhistory')?'Dispatched Orders':'Orders To Dispatch');?></h2>
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
                <?php
                    if(count($orders) > 0) :
                    foreach ($orders as $order) : ?>
                        <tr>
                            <td><?= $validateF->sanitize($order['date_ordered']); ?></td>
                            <td><?= $validateF->sanitize($order['order_status']); ?></td>
                            <td><?= $validateF->sanitize($text->displayMoney($order['user_total'])); ?></td>
                            <td><a href="index.php?action=orderinfo&id=<?= $validateF->sanitize($order['order_id']); ?><?=($_GET['action'] == 'orderhistory')?'&history=1':''?>"><span class="glyphicon glyphicon glyphicon-chevron-right"></span></a></td>
                        </tr>
                    <?php endforeach;
                    else: ?>
                <tr>
                    <td colspan="4">No previous orders</td>
                </tr>
                <?php endif;?>
                </tbody>
            </table>
            <a href="index.php?action=admin" class="btn btn-lg btn-primary">Return</a>
        </div>
        <div class="col-md-3"></div>
    </div>
</main>