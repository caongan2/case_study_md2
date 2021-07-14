<?php


namespace Model;


class OrderDetails
{
    public $orderNumber;
    public $id_product;
    public $quantity;
    public function __construct($data)
    {
        $this->orderNumber = $data['orderNumber'];
        $this->id_product = $data['id_product'];
        $this->quantity = $data['quantity'];
    }
}