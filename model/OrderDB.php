<?php


namespace Model;


use JetBrains\PhpStorm\Pure;
use PDO;

class OrderDB
{
    public $connection;

    #[Pure] public function __construct()
    {
        $this->connection = new DBConnection();
    }

    public function addOrder(object $order)
    {
        $sql = "INSERT INTO orders(orderDate, checkin, checkout, status, id_table) VALUES (?,?,?,?,?)";
        $stmt = $this->connection->connect()->prepare($sql);
        $stmt->bindParam(1, $order->orderDate);
        $stmt->bindParam(2, $order->checkin);
        $stmt->bindParam(3, $order->checkout);
        $stmt->bindParam(4, $order->status);
        $stmt->bindParam(5, $order->id_table);
        $stmt->execute();
    }


    public function getAllOrder($id): array
    {
        $sql = "SELECT * FROM orders WHERE id_table = $id ORDER BY orderNumber DESC ";
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt->fetchAll();
    }


    public function getDetailOrder($id): array
    {
        $sql = "SELECT * FROM details WHERE id_table = $id ORDER BY orderNumber DESC ";
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt->fetchAll();
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM details ORDER BY orderNumber DESC ";
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt->fetchAll();
    }

    public function setStatus($id)
    {
        $sql = "UPDATE orders SET status = 'paid' WHERE orderNumber = $id";
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();

    }

    public function getIdTable($id)
    {
        $sql = "SELECT id_table FROM orders WHERE orderNumber = $id";
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function payDing($id)
    {
        $sql = "SELECT SUM(products.price * orderDetails.quantity) AS total    
                FROM `orders` JOIN orderDetails on orderDetails.orderNumber = orders.orderNumber
                JOIN products ON orderDetails.id_product = products.id
                WHERE orders.orderNumber = $id";
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}