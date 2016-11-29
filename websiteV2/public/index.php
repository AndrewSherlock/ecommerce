<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once '../vendor/stripe/stripe-php/lib/stripe.php';

    \Stripe\Stripe::setApiKey('sk_test_zcTUdUpjBty0SsXdBFcsdEyj');

    /********************* CONSTANT VARIABLES******************/
    define('DEFAULT_IMAGE','/images/users/default_user.png');
    define('DEFAULT_PRODUCT_IMAGE','/images/products/default_product.jpg');
    define('TAX_RATE', 13.5);
    define('TEST_SECRETS_KEY','sk_test_zcTUdUpjBty0SsXdBFcsdEyj ');
    define('TEST_PUBLISH_KEY','pk_test_QiOGhtU4pLbz1Zb0Al9IOzNc');
    /********************END OF CONSTANT VARIABLES****************/


    $validateF = new Itb\ValidateFunctions();
    $mainC = new Itb\MainController();

    session_start();

    if(isset($_SESSION['id']))
    {
        $cartRp = new Itb\CartRepository();
        $logF = new Itb\LoginFunctions();
        $_SESSION['user_cart'] = $cartRp->getCurrentCart($validateF->sanitize($_SESSION['id']));
        if(!isset($_COOKIE['user_login']))
        {
            $logF->endSession();
            session_start();
            $_SESSION['success'] = ['Your session has expired'];
            $mainC->indexAction();

        }
    }
    $action = filter_input(INPUT_GET, 'action');


    switch ($action)
    {
        case 'index':
            $mainC->indexAction();
            break;
        case 'login':
           $mainC->loginAction();
            break;
        case 'logout':
            $mainC->logoutAction();
            $mainC->indexAction();
            break;
        case 'adduser':
            $mainC->addUserAction();
            break;
        case 'feature':
            $mainC->featureAction();
            break;
        case 'admin':
            $mainC->adminAction();
            break;
        case 'adminProducts':
            $mainC->adminProductsAction();
            break;
        case 'archive':
            $mainC->archiveAction();
            break;
        case 'add':
            $mainC->addProductsAction();
            break;
        case 'addproduct':
            $mainC->processProductAction();
            break;
        case 'updateproduct':
            $mainC->updateProductAction();
            break;
        case 'editproduct':
            $mainC->editProductAction();
            break;
        case 'adminUsers':
            $mainC->adminUserAction();
            break;
        case 'delete':
            $mainC->deleteUserAction();
            break;
        case 'edituser':
            $mainC->editUserAction();
            break;
        case 'store':
            $mainC->getStoreHomeAction();
            break;
        case 'product':
            $mainC->getProductDetailsAction();
            break;
        case 'addtocart':
            $mainC->addToCartAction();
            break;
        case 'cart':
            $mainC->viewCartAction();
            break;
        case 'removeitem':
            $mainC->removeProductAction();
            break;
        case 'emptycart':
            $mainC->emptyCartAction();
            break;
        case 'checkout':
            $mainC->checkoutAction();
            break;
        case 'process':
            $mainC->processCheckoutAction();
            break;
        case 'thankyou':
            $mainC->getProcessPage();
            break;
        case 'allorders':
            $mainC->allOrdersAction();
            break;
        case 'orderinfo':
            $mainC->getOrderInformationAction();
            break;
        case 'myaccount':
            $mainC->myAccountAction();
            break;
        case 'updatestatus':
            $mainC->updateStatusAction();
            break;
        case 'dispatch':
            $mainC->dispatchAction();
            break;
        case 'orderhistory':
            $mainC->orderHistoryAction();
            break;
        case 'contact':
            $mainC->contactFormAction();
            break;
        case  'previousorder':
            $mainC->previousOrderAction();
            break;
        case   'sitemap':
            $mainC->getSiteMap();
            break;
        case 'changestyle':
            $mainC->changeLook();
            break;
        default:
            $mainC->indexAction();
    }
