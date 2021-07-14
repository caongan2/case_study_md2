<?php


namespace Model;


class Tables
{
    public $id_table;
    public $name;
    public $status;
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->status = $data['status'];
    }

    /**
     * @return mixed
     */
    public function getIdTable(): mixed
    {
        return $this->id_table;
    }

    /**
     * @param mixed $id_table
     */
    public function setIdTable($id_table): void
    {
        $this->id_table = $id_table;
    }

    /**
     * @return mixed
     */
    public function getName(): mixed
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(mixed $name): void
    {
        $this->name = $name;
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


}