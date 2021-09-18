<?php

use Controller\ProductController;
use Controller\TableController;
use Controller\UserController;

$userController = new UserController();
$productController = new ProductController();
$tableController = new TableController();
$orderController = new \Controller\OrderController();
$detailsController = new \Controller\OrderDetailsContrller();
$page = $_REQUEST['page'] ?? null;
$name = $_REQUEST['name'] ?? null;
switch ($page) {
    case 'register':
        $userController->registerUser();
        break;
    case 'login':
        $userController->loginUser();
        break;
    case 'profile':
        $userController->getProfile();
        break;
    case 'home':
        $productController->home();
        break;
    case 'add':
        $productController->addNewProduct();
        break;
    case 'list':
        $productController->getProduct();
        break;
    case 'delete':
        $productController->delete();
        break;
    case 'edit':
        $productController->editProduct();
        break;
    case 'search':
        $productController->search($name);
        break;
    case 'table':
        $tableController->getTable();
        break;
    case 'unpaid':
        $tableController->getTableUnpaid();
        break;
    case 'addOrder':
        $orderController->addNewOrder();
        break;
    case 'orderProduct':
        $orderController->orderProduct();
        break;
    case 'orderList':
        $orderController->getAllOrder();
        break;
    case 'addDetails':
        $detailsController->addOrderDetails();
        break;
    case 'editPass':
        $userController->updateProfile();
        break;
    case 'paid':
        $orderController->setStatus();
        break;
    case 'getOrder':
        $orderController->getOrder();
        break;
    case 'allList':
        $orderController->getAll();
        break;
}