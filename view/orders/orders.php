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
            The list of ĐỒ UỐNG
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Check in</th>
                        <th>Check out</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($result as $key => $order): ?>
                    <tr>
                        <td><?php echo $order->orderNumber ?></td>
                        <td><?php echo $order->orderDate ?></td>
                        <td><?php echo $order->checkin ?></td>
                        <td><?php echo $order->checkout ?></td>
                        <td><?php echo $order->status ?></td>
                        <td>
                            <a href="index.php?page=addDetails&id=<?php echo $order->orderNumber?>" class="btn btn-primary btn-sm">Update</a>
                            <a href="index.php?page=paid&id=<?php echo $order->orderNumber?>" class="btn btn-primary btn-sm">Pay</a>
                        </td>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
