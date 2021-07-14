<?php


namespace Controller;


use Model\DBConnection;
use Model\TablesDB;

class TableController
{
    public TablesDB $tableDB;
    public function __construct()
    {
        $connection = new DBConnection();
        $this->tableDB = new TablesDB();
    }

    public function getTable()
    {
        $result = $this->tableDB->getAllTables();
        include_once "view/tables/list.php";
    }

    public function getTableUnpaid()
    {
        $result = $this->tableDB->getAllTablesUnpaid();
        include_once "view/tables/list.php";
    }


}