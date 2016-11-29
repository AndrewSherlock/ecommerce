<?php

?>
<main>
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="col-md-3"></div>
            <div class="col-md-6 site-map">
            <h2 class="text-center">Sitemap</h2>
            <ul>
                <li class="list_header"><a href="index.php?action=index">Home</a>
                    <ul>
                        <li class="list_second"><a href="index.php?action=about">About us</a></li>
                        <li class="list_second"><a href="index.php?action=contact">Contact Us</a></li>
                    </ul>
                </li>
                <li class="list_header"><a href="index.php?action=store">Store</a>
                    <ul>
                        <?php foreach ($categorys as $category) :?>
                        <li class="list_second"><a href="index.php?action=store&cat=<?=$category['id']?>"><?= ucfirst($category['category'])?></a></li>
                        <?php endforeach;?>
                    </ul>
                </li>
                <?php
                if(isset($_SESSION['account_type'])) :
                    if($_SESSION['account_type'] == 'admin' || $_SESSION['account_type'] == 'editor') :?>
                        <li>
                        <li class="list_header"><a href="index.php?action=admin">Admin</a></li>
                        <ul>
                            <li class="list_second"><a href="index.php?action=adminProducts">Admin Products</a></li>
                            <li class="list_second"><a href="index.php?action=adminUsers">Admin Users</a></li>
                            <li class="list_second"><a href="index.php?action=orderhistory">Order History</a></li>
                        </ul>
                        </li>
                <?php endif;
                    endif;?>
                <?php if(isset($_SESSION['user_name'])) : ?>
                <li class="list_header"><a href="index.php?action=myaccount">Account</a>
                <ul>
                    <li class="list_second"><a href="index.php?action=cart">Cart</a></li>
                    <li class="list_second"><a href="index.php?action=previousorder&id=<?=$_SESSION['id']?>">Previous Orders</a></li>
                </ul>
                </li>
                <?php endif;
                if(isset($_SESSION['user_name'])) :?>
                <li class="list_header"><a href="index.php?action=logout">Logout</a></li>
                <?php else : ?>
                <li class="list_header"><a href="index.php?action=login">Login</a></li>
                <?php endif;?>
            </ul>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12 sitemap_image">
                <div class="col-md-12">
                    <img src="images/sitemap_3.jpg" alt ="image">
                </div>
                <div class="col-md-12">
                    <img src="images/sitemap_2.jpg" alt ="image">
                </div>
            </div>
        </div>
    </div>
</main>
