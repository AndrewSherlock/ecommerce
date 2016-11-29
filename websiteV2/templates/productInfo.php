
    <div class="container-fluid">
        <div class="col-md-12">
            <h2 class="text-center"><?= ($_GET['action'] == 'editproduct')? 'Edit' : 'Add A';?> Product</h2>
            <hr>
            <?php if($_GET['action'] == 'editproduct'):?>
            <div class="col-md-12">
                <h3 class="text-center">Current Image</h3>
                <img src="<?= $product['product_info']['product_image'];?>" alt="<?= $product['product_info']['product_name'];?>" style="width: 120px; height: auto;" class="center-block">
            </div>
            <?php endif;?>
            <div class="col-md-7">
                <form action="index.php?action=<?= ($_GET['action'] == 'editproduct')? 'updateproduct&id='.$product['id'] : 'addproduct';?>" method="post" enctype="multipart/form-data">
                    <h3 class="text-center">Product Information</h3>
                    <hr>
                    <div class="form-group row">
                        <label for="product_name" class="col-xs-2 col-form-label">Product Name : </label>
                        <div class="col-xs-7">
                            <input type="text" class="form-control"  name="product_name" id="product_name" value="<?= ($_GET['action'] == 'editproduct')? $product['product_info']['product_name']: '';?>">
                        </div> <span class="glyphicon glyphicon-asterisk text-danger col-xs-1"></span>
                    </div>
                    <div class="form-group row">
                        <label for="product_category" class="col-xs-2 col-form-label">Category : </label>
                        <div class="col-xs-3">
                           <select name="product_category" class="form-control">
                               <option value=""></option>
                               <?php foreach($categorys as $category) : ?>
                               <option value="<?= $category['id'];?>"<?= (isset($product) && $product['product_category'] == $category['id'])? 'selected': '';?>><?= ucfirst($category['category']);?></option>
                               <?php endforeach; ?>
                           </select>
                        </div><span class="glyphicon glyphicon-asterisk text-danger col-xs-1"></span>
                        <label for="product_price" min="0" class="col-xs-1 col-form-label">Price : </label>
                        <div class="col-xs-2">
                            <input type="number" step="any" class="form-control"  name="product_price" id="product_price" value="<?= ($_GET['action'] == 'editproduct')? $product['product_info']['product_price']: '';?>">
                        </div> <span class="glyphicon glyphicon-asterisk text-danger col-xs-1"></span>
                    </div>
                    <div class="form-group row">
                        <label for="product_desc" class="col-xs-2 col-form-label">Description : </label>
                        <div class="col-xs-7">
                            <textarea class="form-control" rows="6" name="product_desc" id="product_desc"><?= ($_GET['action'] == 'editproduct')? $product['product_info']['product_desc']: '';?></textarea>
                        </div> <span class="glyphicon glyphicon-asterisk text-danger col-xs-1"></span>
                    </div>
                    <div class="form-group row">
                        <label for="product_image" class="col-xs-2 col-form-label">Image : </label>
                        <div class="col-xs-7">
                            <input type="file" name="file_upload" id="file_upload">
                        </div>
                    </div>
            </div>
            <div class="col-md-5">
                <div class="form-group row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-4"><h3 class="text-center">Size</h3></div>
                    <div class="col-xs-4"><h3 class="text-center">Quantity</h3></div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-4">
                        <input type="text" class="form-control"  name="product_sizeA" id="product_sizeA" value="<?= ((isset($sizeArray[0])))? $sizeArray[0][0]:'';?>">
                    </div>
                    <div class="col-xs-4">
                        <input type="number" min="0" class="form-control"  name="product_qtyA" id="product_qtyA" value="<?= ((isset($sizeArray[0])))? $sizeArray[0][1]:'';?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-4">
                        <input type="text" class="form-control"  name="product_sizeB" id="product_sizeB" value="<?= ((isset($sizeArray[1])))? $sizeArray[1][0]:'';?>">
                    </div>
                    <div class="col-xs-4">
                        <input type="number" min="0" class="form-control"  name="product_qtyB" id="product_qtyB" value="<?= ((isset($sizeArray[1])))? $sizeArray[1][1]:'';?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-4">
                        <input type="text" class="form-control"  name="product_sizeC" id="product_sizeC" value="<?= ((isset($sizeArray[2])))? $sizeArray[2][0]:'';?>">
                    </div>
                    <div class="col-xs-4">
                        <input type="number" min="0" class="form-control"  name="product_qtyC" id="product_qtyC" value="<?= ((isset($sizeArray[2])))? $sizeArray[2][1]:'';?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-4">
                        <input type="text" class="form-control"  name="product_sizeD" id="product_sizeD" value="<?= ((isset($sizeArray[3])))? $sizeArray[3][0]:'';?>">
                    </div>
                    <div class="col-xs-4">
                        <input type="number" min="0" class="form-control"  name="product_qtyD" id="product_qtyD"value="<?= ((isset($sizeArray[3])))? $sizeArray[3][1]:'';?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-4">
                        <input type="text" class="form-control"  name="product_sizeE" id="product_sizeE" value="<?= ((isset($sizeArray[4])))? $sizeArray[4][0]:'';?>">
                    </div>
                    <div class="col-xs-4">
                        <input type="number" min="0" class="form-control"  name="product_qtyE" id="product_qtyE" value="<?= ((isset($sizeArray[4])))? $sizeArray[4][1]:'';?>">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 text-center row">
                <input type = "submit" value="<?= ($_GET['action'] == 'editproduct')? 'Edit' : 'Add';?> Product" class="btn btn-primary btn-lg">
                <a href="index.php?action=adminProducts" class="btn btn-primary btn-lg">Return To Products</a>
            </div>
            </form>
        </div>
    </div>
</main>
