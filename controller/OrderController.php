<?php


namespace Controller;


use Model\DBConnection;
use Model\OrderDB;
use Model\Orders;
use Model\ProductDB;
use Model\Tables;
use Model\TablesDB;

class OrderController
{
    public $tableDB;
    public OrderDB $orderDB;
    public $productDB;
    public function __construct()
    {
        $connection = new DBConnection();
        $this->orderDB = new OrderDB();
        $this->tableDB = new TablesDB();
        $this->productDB = new ProductDB();
    }

    public function addNewOrder()
    {
        $tableDB = new \Model\TablesDB();
        $id = $_REQUEST['id'];
        $tables = $tableDB->getTables($id);

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "view/orders/add.php";
        } else {
            $orderDate = $_POST['orderDate'];
            $checkin = $_POST['checkin'];
            $checkout = $_POST['checkout'];
            $status = $_POST['status'];
            $id_table = $_POST['id_table'];

            $data = [
                'orderDate' => $orderDate,
                'checkin' => $checkin,
                'checkout' => $checkout,
                'status' => $status,
                'id_table' => $id_table
            ];
            $order = new Orders($data);
            $this->orderDB->addOrder($order);
            $this->tableDB->setStatusFull($id);
            header("location:index.php?page=table");
        }
    }

    public function getAllOrder()
    {
        $id = $_REQUEST['id'];
        $result = $this->orderDB->getDetailOrder($id);
        include_once "view/orders/list.php";
    }

    public function getAll()
    {
        $result = $this->orderDB->getAll();
        include_once "view/orders/list.php";
    }

    public function getOrder()
    {
        $id = $_REQUEST['id'];
        $result = $this->orderDB->getAllOrder($id);
        include_once "view/orders/orders.php";
    }

    public function setStatus()
    {
        $id = $_REQUEST['id'];
        $id_table = $this->orderDB->getIdTable($id);
        $table = $id_table['id_table'];
        $this->orderDB->setStatus($id);
        $this->tableDB->setStatusEmpty($table);
        header("location:index.php?page=table");
    }

    public function orderProduct()
    {
        $result = $this->productDB->getAllProduct();
        include_once "view/product/order_product.php";
    }
}