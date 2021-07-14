<?php


namespace Model;


class Orders
{
    public $orderNumber;
    public $orderDate;
    public $checkin;
    public $checkout;
    public $status;
    public $id_table;

    public function __construct($data)
    {
        $this->orderDate = $data['orderDate'];
        $this->checkin = $data['checkin'];
        $this->checkout = $data['checkout'];
        $this->status = $data['status'];
        $this->id_table = $data['id_table'];
    }

    /**
     * @return mixed
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param mixed $orderNumber
     */
    public function setOrderNumber($orderNumber): void
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @return string[]
     */
    public function getOrderDate(): array
    {
        return $this->orderDate;
    }

    /**
     * @param string[] $orderDate
     */
    public function setOrderDate(array $orderDate): void
    {
        $this->orderDate = $orderDate;
    }

    /**
     * @return mixed
     */
    public function getCheckin(): mixed
    {
        return $this->checkin;
    }

    /**
     * @param mixed $checkin
     */
    public function setCheckin(mixed $checkin): void
    {
        $this->checkin = $checkin;
    }

    /**
     * @return mixed
     */
    public function getCheckout(): mixed
    {
        return $this->checkout;
    }

    /**
     * @param mixed $checkout
     */
    public function setCheckout(mixed $checkout): void
    {
        $this->checkout = $checkout;
    }

    /**
     * @return mixed
     */
    public function getStatus(): mixed
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus(mixed $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string[]
     */
    public function getIdTable(): array
    {
        return $this->id_table;
    }

    /**
     * @param string[] $id_table
     */
    public function setIdTable(array $id_table): void
    {
        $this->id_table = $id_table;
    }


}