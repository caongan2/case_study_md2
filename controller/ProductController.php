<?php


namespace Controller;


use Model\DBConnection;
use Model\Product;
use Model\ProductDB;

class ProductController
{
    public ProductDB $productDB;
    public function __construct()
    {
        $connection = new DBConnection();
        $this->productDB = new ProductDB();
    }

    public function addNewProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "view/product/add.php";
        } else {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $target_dir = "view/product/uploads/";
            $filename = $_FILES['image']['name'];
            $target_file = $target_dir.basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            $image = $filename;
            $data = [
                'name' => $name,
                'price' => $price,
                'image' => $image
            ];
            $product = new Product($data);
            $this->productDB->addProduct($product);
            header("location:index.php?page=list");
        }
    }

    public function getProduct()
    {
        $result = $this->productDB->getAllProduct();
        include_once "view/product/list.php";
    }


    public function home()
    {
        header("location:home.php");
    }

    public function delete()
    {
        $id =$_REQUEST['id'];
        $this->productDB->deleteProduct($id);
        header("location:index.php?page=list");
    }

    public function editProduct()
    {
        $id =$_REQUEST['id'];
        $products = $this->productDB->detailProduct($id);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "view/product/edit.php";
        } else {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $target_dir = "view/product/uploads/";
            $filename = $_FILES['image']['name'];
            $target_file = $target_dir.basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            $newImage = $filename;
            $data = [
                'name' => $name,
                'price' => $price,
                'image' => $newImage
            ];
            $products = new Product($data);
            $image = $this->productDB->getImage($id);
            if (empty($newImage)) {
                $newImage = $image;
            } else {
                unlink($target_dir.$image);
                $this->productDB->updateProduct($id, $products);
            }
            header("location:index.php?page=list");
        }
    }

    public function search($name)
    {
        if (empty($name)) {
            $result = $this->productDB->getAllProduct();
            include_once "view/product/list.php";
        } else {
            $result = $this->productDB->searchProduct($name);
            include_once "view/product/list.php";
        }
    }


}