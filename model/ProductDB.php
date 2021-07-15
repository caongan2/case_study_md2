<?php


namespace Model;


use PDO;

class ProductDB
{
    public DBConnection $connection;
    public function __construct()
    {
        $this->connection = new DBConnection();
    }

    public function addProduct(object $product)
    {
        try {
            $sql = "INSERT INTO products(`name`, price, image) VALUES (?,?, ?)";
            $stmt = $this->connection->connect()->prepare($sql);
            $stmt->bindParam(1, $product->name);
            $stmt->bindParam(2, $product->price);
            $stmt->bindParam(3, $product->image);
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            die();
        }
    }

    public function getAllProduct(): array
    {

        $sql = "SELECT * FROM products ORDER BY id ASC";
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt->fetchAll();
    }

    public function detailProduct($id): array
    {
        $sql = "SELECT * FROM products WHERE id =".$id;
        $stmt = $this->connection->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $products = [];
        foreach ($result as $item) {
            $product = new Product($item);
            $product->setId($item['id']);
            $products[] = $product;
        }
        return $products;
    }

    public function deleteProduct($id)
    {
        try {
            $sql = "DELETE FROM products WHERE id = $id";
            $stmt = $this->connection->connect()->query($sql);
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo "Không thể xoá sản phẩm này";
            die();
        }
    }

    public function updateProduct($id, $product)
    {
        $sql = "UPDATE products SET `name` = ?, price = ?, image = ? WHERE  id = ?";
        $stmt = $this->connection->connect()->prepare($sql);
        $stmt->bindParam(1, $product->name);
        $stmt->bindParam(2, $product->price);
        $stmt->bindParam(3, $product->image);
        $stmt->bindParam(4, $id);
        return $stmt->execute();
    }

    public function getImage($id)
    {
        $sql = "SELECT image FROM products WHERE id = $id";
        $stmt = $this->connection->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result[0]['image'];
    }

    public function searchProduct($name): array
    {
        $products = [];
        $sql = "SELECT * FROM products WHERE `name` LIKE '%' '$name' '%'";
        $stmt = $this->connection->connect()->query($sql);
        $stmt ->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $item) {
            $product = new Product($item);
            $product->setName($item['name']);
            $product->setId($item['id']);
            $products[] = $product;
        }
        return $products;
    }
}