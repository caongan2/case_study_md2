<?php
include_once "vendor/autoload.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}
if (isset($_REQUEST['logOut'])) {
    session_destroy();
    header("location:index.php");
}
?>

<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="btn btn-success">
            The list of ĐỒ UỐNG
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($result as $key => $product): ?>
                    <tr>
                        <td><?php echo ++$key?></td>
                        <td><img src="view/product/uploads/<?php echo $product->image ?>" style="width: 250px; height: 250px" alt="Error"></td>
                        <td><?php echo $product->name ?></td>
                        <td><?php echo $product->price ?></td>
                        <td>
                            <a href="index.php?page=edit&id=<?php echo $product->id; ?>" class="btn btn-primary btn-sm">Update</a>
                            <a href="index.php?page=delete&id=<?php echo $product->id; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php include_once "phantrang.php"?>
            </div>
        </div>
    </div>