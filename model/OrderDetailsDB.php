<?php


namespace Model;


class OrderDetailsDB
{
    public $connection;
    public function __construct()
    {
        $this->connection = new DBConnection();
    }

    public function addNewDetails(object $product)
    {
        $sql = "INSERT INTO orderDetails(orderNumber, id_product, quantity) VALUES (?,?,?)";
        $stmt = $this->connection->connect()->prepare($sql);
        $stmt->bindParam(1, $product->orderNumber);
        $stmt->bindParam(2, $product->id_product);
        $stmt->bindParam(3, $product->quantity);
        $stmt->execute();
    }


}