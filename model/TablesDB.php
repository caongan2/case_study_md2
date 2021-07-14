<?php


namespace Model;


use PDO;

class TablesDB
{
    public $connection;
    public function __construct()
    {
        $this->connection = new DBConnection();
    }

    public function getAllTables(): array
    {
        $sql = "SELECT * FROM tables ORDER BY id_table ASC ";
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt->fetchAll();
    }

    public function getAllTablesUnpaid(): array
    {
        $sql = "SELECT * FROM tables WHERE status = 'empty' ORDER BY id_table ASC ";
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt->fetchAll();
    }

    public function getTables($id): array
    {
        $sql = "SELECT * FROM tables WHERE id_table = $id";
        $stmt = $this->connection->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $tables = [];
        foreach ($result as $item) {
            $table = new Tables($item);
            $table->setIdTable($item['id_table']);
            $tables[] = $table;
        }
        return $tables;
    }

    public function setStatusFull($id)
    {
        $sql = "UPDATE tables SET status = 'full' WHERE id_table = $id";
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();
    }

    public function setStatusEmpty($id)
    {
        $sql = "UPDATE tables SET status = 'empty' WHERE id_table = $id";
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();
    }


}