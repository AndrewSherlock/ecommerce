<?php
require_once __DIR__.'/../vendor/autoload.php';
if(session_id() == '') {
    session_start();
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Akira Shop - <?= $page_id?></title>
    <link type="text/css" rel="stylesheet" href='css/bootstrap.css'/>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <?php if(isset($_SESSION['style'])):
        if($_SESSION['style'] == 0) : ?>
            <link type="text/css" rel="stylesheet" href='css/custom.css'/>
        <?php else: ?>
            <link type="text/css" rel="stylesheet" href='css/custom1.css'/>
            <?php
        endif;
    else :?>
        <link type="text/css" rel="stylesheet" href='css/custom.css'/>
    <?php endif;?>
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption" rel="stylesheet">
    <script src="js/jquery.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="mynav">

    </div>
    <div class="main">
        <main>
            <div class="col-md-12">
                <h2 class="text-center">Order Successful</h2>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <p>Your Order has been successfully processed. We will dispatch this within the next few working days. A receipt has been sent to your email. Thank You</p>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="col-md-12">
                <h2 class="text-center">Order Successful</h2>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <p>Your Order has been successfully processed. We will dispatch this within the next few working days. A receipt has been sent to your email. Thank You</p>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="col-md-12">
                <h2 class="text-center">Order Successful</h2>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <p>Your Order has been successfully processed. We will dispatch this within the next few working days. A receipt has been sent to your email. Thank You</p>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="col-md-12">
                <h2 class="text-center">Order Successful</h2>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <p>Your Order has been successfully processed. We will dispatch this within the next few working days. A receipt has been sent to your email. Thank You</p>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="col-md-12">
                <h2 class="text-center">Order Successful</h2>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <p>Your Order has been successfully processed. We will dispatch this within the next few working days. A receipt has been sent to your email. Thank You</p>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="col-md-12">
                <h2 class="text-center">Order Successful</h2>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <p>Your Order has been successfully processed. We will dispatch this within the next few working days. A receipt has been sent to your email. Thank You</p>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="col-md-12">
                <h2 class="text-center">Order Successful</h2>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <p>Your Order has been successfully processed. We will dispatch this within the next few working days. A receipt has been sent to your email. Thank You</p>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="col-md-12">
                <h2 class="text-center">Order Successful</h2>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <p>Your Order has been successfully processed. We will dispatch this within the next few working days. A receipt has been sent to your email. Thank You</p>
                </div>
                <div class="col-md-3"></div>
            </div>
        </main>
         </div>
        <div class="footer">
            <footer>
                <h1 class="text-center">&copy;Andrew Sherlock</h1>
            </footer>
        </div>
    </div>
</body>