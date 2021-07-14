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
        <div class="card-header">
            Thêm đồ uống
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table table-bordered" style="text-align: center; border-collapse: collapse">
                    <thead>
                    <tr>
                        <th>IMAGE</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($result as $key => $product): ?>
                    <tr>
                        <td><img src="view/product/uploads/<?php echo $product->image ?>" style="width: 200px; height: 250px" alt="Error"></td>
                        <td><?php echo $product->name ?></td>
                        <td><?php echo $product->price ?></td>
                        <td>
                            <a href="index.php?page=addDetails&id=<?php echo $product->id?>" class="btn btn-primary btn-sm">ADD</a>
                        </td>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>