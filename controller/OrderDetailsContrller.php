<?php


namespace Controller;


use Model\OrderDB;
use Model\OrderDetails;
use Model\OrderDetailsDB;
use Model\ProductDB;

class OrderDetailsContrller
{
    public $detailsDB;
    public $productDB;
    public $ordersDB;
    public function __construct()
    {
        $this->productDB = new ProductDB();
        $this->detailsDB = new OrderDetailsDB();
        $this->ordersDB = new OrderDB();
    }

    public function addOrderDetails()
    {
        $id = $_REQUEST['id'];
        $orders = $this->ordersDB->getAllOrder($id);
        $products = $this->productDB->getAllProduct();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "view/orderDetails/add.php";
        } else {
            $orderNumber = $_POST['orderNumber'];
            $id_product = $_POST['id_product'];
            $quantity = $_POST['quantity'];

            $data = [
                'orderNumber' => $orderNumber,
                'id_product' => $id_product,
                'quantity' => $quantity
            ];

            $orderDetails = new OrderDetails($data);
            $this->detailsDB->addNewDetails($orderDetails);
            header("location:index.php?page=table");
        }
    }
}