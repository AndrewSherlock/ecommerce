
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="col-md-3" style="margin-top: 10px;">
                <a href="index.php?action=adminProducts<?=((isset($_GET['list']) && $_GET['list'] == 'archived')) ? '' :'&list=archived' ;?>" class="btn btn-primary btn-lg"><?=((isset($_GET['list']) && $_GET['list'] == 'archived')) ? 'Products' :'Archived Products' ;?></a>
            </div>
            <div class="col-md-6">
                <h2 class="text-center">Products Panel</h2>
            </div>
            <div class="col-md-3" style="margin-top: 10px;">
                <a href="index.php?action=add" class="btn btn-primary btn-lg">Add A Product</a>
                <a href="index.php?action=admin" class="btn btn-primary btn-lg">Return To Admin</a>
            </div>
        </div>
            <div class="col-md-12" style="margin-top: 10px;">
                <table class="table table-bordered table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Title</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Discount</th>
                            <th class="text-center">Stock & Size</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Featured</th>
                            <th class="text-center">Number Sold</th>
                            <th class="text-center">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 0; $i < count($search); $i++) : ;?>
                            <tr>
                                <td><?= $search[$i][2]['product_name']; ?></td>
                                <td class="text-capitalize"><?= $rp->getCategoryFromDatabase($search[$i]['product_category']);?></td>
                                <td><?= $search[$i][2]['product_price']; ?></td>
                                <?php if(isset($_GET['discount']) && $_GET['id'] == $search[$i][0]) : ?>
                                    <form action="index.php?action=adminProducts&discount=true&id=<?=$search[$i][0];?>" method="post">
                                     <td><input type="number" step="any" name="discount_amount" value=" <?= $text->getPercentFromFloat($search[$i][6]); ?>"></td>
                                <?php else: ?>
                                    <td><?= $text->getPercentFromFloat($search[$i][6]); ?></td>
                                <?php endif;?>
                                <td class="text-center"><?= (($search[$i]['product_category'] == 3)? $text->buildSizeString($search[$i][2]['product_size']) : ucfirst($search[$i][2]['product_size'])); ?></td>
                                <td><?= $search[$i][2]['product_image']; ?></td>
                                <td class="text-center"><a href="index.php?action=feature&id=<?=$search[$i]['id']?>" class="btn btn-sm btn-default"><span class= "glyphicon
<?=$rp->getFeatureSettings($search[$i]['product_featured']);?>"></span></a></td>
                                <td><?= $search[$i]['product_sold']; ?></td>

                                    <?php if(isset($_GET['discount']) && $_GET['id'] == $search[$i][0]): ?>
                                        <td class="text-center">
                                        <input type="submit" value="Update Product" class="btn btn-sm btn-default">
                                        </td>
                                    </form>
                                <?php else: ?>
                                <td class="text-center">
                                    <a href="index.php?action=editproduct&id=<?= $search[$i]['id'];?>" class="btn btn-sm btn-default"><span class="glyphicon-pencil glyphicon"></span></a>
                                    <a href="index.php?action=adminProducts&discount=true&id=<?= $search[$i][0]; ?>" class="btn btn-sm btn-default"><span class="glyphicon-tag glyphicon"></span></a>
                                    <a href="index.php?action=archive&id=<?= $search[$i]['id'];?>" class="btn btn-sm btn-default"><span class="glyphicon-remove glyphicon"></span></a>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
