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
            The list of BÀN
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table table-bordered" style="text-align: center; border-collapse: collapse">
                    <thead>
                    <tr>
                        <th>VIP</th>
                        <th>STATUS</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($result as $key => $table): ?>
                    <tr>
                        <td><?php echo $table->name ?></td>
                        <td><?php echo $table->status ?></td>
                        <td>
                            <a href="index.php?page=getOrder&id=<?php echo $table->id_table ?>" class="btn btn-primary btn-sm">Order</a>
                            <a href="index.php?page=orderList&id=<?php echo $table->id_table ?>" class="btn btn-primary btn-sm">Detail</a>
                            <a href="index.php?page=addOrder&id=<?php echo $table->id_table?>" class="btn btn-primary btn-sm">Update</a>
                        </td>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>