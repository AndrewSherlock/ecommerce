<?php
    require_once __DIR__.'/../vendor/autoload.php';
    if(session_id() == '')
    {
        session_start();
    }
    $categorys = $productRp->getCategorys();

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
<nav class="my_nav">
    <div class="top_nav">
        <div class="text-left">
            <h3>Akira Fan Shop</h3>
        </div>
        <div class="nav_links">
            <ul>
                <li class="<?=$current[0] ?>"><a href="index.php?action=index">Home</a></li>
                <li class="<?= $current[1] ?>"><a href="index.php?action=store">Store</a></li>
                <?php if(isset($_SESSION['account_type']) && ($_SESSION['account_type'] == 'admin' || $_SESSION['account_type'] == 'editor')) :?>
                    <li class="<?= $current[2] ?>"><a href="index.php?action=admin">Admin</a></li>
                <?php endif;?>
                <li class="<?= $current[3] ?>"><a href="index.php?action=myaccount">Account</a></li>
                <li class="<?= $current[4] ?>"><a href="index.php?action=<?= ((isset($_SESSION['account_type']) && $_SESSION['id']) != '' )? 'logout':'login'; ?>"><?= ((isset($_SESSION['account_type']) && $_SESSION['id']) != '' )? 'Logout':'Login'; ?></a></li>
            </ul>
        </div>
        <div class="account_info">
            <ul>
                <?php if(isset($_SESSION['user_name'])) :?>
                <li><a href="index.php?action=changestyle&style=<?=$_SESSION['style']?>"><span class="glyphicon glyphicon-cog"></span></a></li>
                <?php endif;?>
                <li><a href="index.php?action=myaccount"><span class="glyphicon glyphicon-user"></span></a></li>
                <li><a href="index.php?action=cart"><span class="glyphicon glyphicon-shopping-cart"><?=((isset($_SESSION['user_cart'])))?count($_SESSION['user_cart']) : '0';?></span></a></li>
            </ul>
        </div>
    </div>
    <div class="bottom_nav">
        <div class="user_login_info">
            <p>Hello, <?=((isset($_SESSION['user_name']))? $_SESSION['user_name']:' Guest' ); ?>
                <?php if(isset($_SESSION['user_name']) == '') :?>
                <a href="index.php?action=adduser">Sign Up Today</a></p>
                <?php endif;?>
        </div>
        <div class="second_nav">
            <ul>
                <?php
                    require_once '../templates/_secondnav.php';
                ?>
            </ul>
        </div>
    </div>
</nav>
    <main>
    <?php if(!empty($_SESSION['error'])) : ?>
<div class="col-md-12 text-center bg-danger alert">
    <?php
        $_SESSION['error'] = $text2->displayStatus($_SESSION['error']);
    ?>
</div>
        <?php
    endif;

    if(!empty($_SESSION['success'])) : ?>
    <div class="col-md-12 text-center bg-success alert">
        <?php
        $_SESSION['success'] = $text2->displayStatus($_SESSION['success']);
        ?>
</div>
        <?php
    endif; ?>




