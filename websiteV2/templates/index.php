<main>
    <div class="container-fluid">
        <div id="spacer"></div>
        <div id="carousel-ad_panel" class="myclass carousel slide" data-ride="carousel" data-interval="5000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-ad_panel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-ad_panel" data-slide-to="1"></li>
                <li data-target="#carousel-ad_panel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <a href="index.php?action=product&prodid=29"><img src="images/front_ad_dvd.jpg" alt="ad_1"></a>
                </div>
                <div class="item">
                    <a href="index.php?action=product&prodid=20"><img src="images/front_ad_jacket.jpg" alt="ad_2"></a>
                </div>
                <div class="item">
                    <a href="ndex.php?action=store&cat=4"><img src="images/front_ad_figures.jpg" alt="ad_3"></a>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-ad_panel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-ad_panel role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div> <!-- Carousel -->
    </div>
    <div class="col-md-12">
        <?php if(!empty($productObjs)) :?>
        <h2 class="text-center">Sale Items</h2>
        <?php foreach ($productObjs as $productObj) : ;?>
            <div class="col-md-3 product_details">
                <a href="index.php?action=product&prodid=<?=$productObj[0];?>"><h4 class="text-center product_title"><?= $productObj[2]->getName();?></h4></a>
                <a href="index.php?action=product&prodid=<?=$productObj[0];?>"><img class="center-block" id="store_product_image" src="<?=$productObj[2]->getImage();?>"></a>
                <div class="col-md-12 percent_area">
                    <?php if($productObj['product_discount'] > 0) :?>
                        <p class="text-center"><span class="sale_text">SALE :</span><span class="percentage"><?= $text->getPercentFromFloat($productObj['product_discount']);?> OFF</span> </p>
                    <?php endif;?>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <p><span class="percentage"><?=$text->displayMoney($productObj[2]->getPrice()-($productObj[2]->getPrice() * $productObj['product_discount']));?></span></p>
                    </div>
                    <div class="col-md-6">
                        <a href="index.php?action=product&prodid=<?=$productObj[0];?>" class="btn btn-default pull-right" id="store_product_btn">See product</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        <?php endif;?>
    </div>
</main>

<script>
    $('.carousel').carousel({
        interval: 5000
    })
</script>
