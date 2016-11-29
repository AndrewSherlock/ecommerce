<?php
$page_id = 'Index';
$second_nav = filter_input(INPUT_GET,'action');

if(in_array($second_nav,['index','about','contact','sitemap']))
{
    ?>
    <li><a href="index.php?action=about">About Us</a></li>
    <li><a href="index.php?action=contact">Contact</a></li>
    <li><a href="index.php?action=sitemap">Sitemap</a></li>
    <?php
}

if(in_array($second_nav,['admin','adminProducts','adminUserList','adminUsers','orderhistory','add', 'editproduct', 'adduser', 'edituser', 'orderinfo']))
{
    ?>
    <li><a href="index.php?action=adminProducts">Products</a></li>
    <li><a href="index.php?action=adminUsers">Users</a></li>
    <li><a href="index.php?action=orderhistory">Order History</a></li>
    <?php
}

if(in_array($second_nav,['storehome','store', 'product']))
{
    foreach ($categorys as $category) :  ?>
        <li><a href="index.php?action=store&cat=<?=$category['id']?>"><?=ucfirst($category['category']);?></a></li>
    <?php endforeach;
}

if(in_array($second_nav,['cart','orders','myaccount', 'previousorder']))
{
    ?>
    <li><a href="index.php?action=cart">View Cart</a></li>
    <li><a href="index.php?action=previousorder&id=<?=$_SESSION['id']?>">Previous Orders</a></li>
    <li><a href="index.php?action=myaccount">My Account</a></li>
    <?php
}
?>

